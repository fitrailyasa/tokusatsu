<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Franchise;
use App\Models\Era;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use PHPUnit\Framework\Attributes\Test;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat permission yang dibutuhkan controller
        $permissions = [
            'view-category',
            'create-category',
            'edit-category',
            'delete-category',
            'delete-all-category',
            'soft-delete-category',
            'soft-delete-all-category',
            'restore-category',
            'restore-all-category',
            'import-category',
            'export-category',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Buat role dan assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        // Buat user dan assign role
        $this->admin = User::factory()->create(['status' => 'aktif']);
        $this->admin->assignRole($adminRole);
    }

    #[Test]
    public function it_redirects_non_admin_users()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.category.index'))
            ->assertForbidden();
    }

    #[Test]
    public function admin_can_view_category_list()
    {
        Category::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get(route('admin.category.index'))
            ->assertStatus(200)
            ->assertViewHas('categories');
    }

    #[Test]
    public function admin_can_store_a_new_category()
    {
        $this->actingAs($this->admin);

        $era = Era::factory()->create();
        $franchise = Franchise::factory()->create();

        $data = [
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
            'name' => 'New Category',
            'desc' => 'This is a test category',
        ];

        $response = $this->post(route('admin.category.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Tambah Data Category!');
        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }

    #[Test]
    public function admin_can_update_a_category()
    {
        $this->actingAs($this->admin);

        $category = Category::factory()->create();
        $era = Era::factory()->create();
        $franchise = Franchise::factory()->create();

        $data = [
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
            'name' => 'Updated Category',
            'desc' => 'This is a test category',
        ];

        $response = $this->put(route('admin.category.update', $category->id), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Edit Data Category!');
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
            'name' => 'Updated Category',
            'desc' => 'This is a test category',
        ]);
    }

    #[Test]
    public function admin_can_soft_delete_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.category.softDelete', $category->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Hapus Data Category!');

        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }

    #[Test]
    public function admin_can_restore_a_deleted_category()
    {
        $this->actingAs($this->admin);

        $category = Category::factory()->create();
        $category->delete();

        $response = $this->put(route('admin.category.restore', $category->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Restore Category!');
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }

    #[Test]
    public function admin_can_permanently_delete_a_category()
    {
        $category = Category::factory()->create();
        $category->delete();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.category.destroy', $category->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Hapus Data Category!');

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    #[Test]
    public function admin_can_import_categories()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('categories.xlsx');

        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.category.import'), ['file' => $file]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Berhasil Import Data Category!');

        Excel::assertImported('categories.xlsx', function (CategoryImport $import) {
            return true;
        });
    }

    #[Test]
    public function admin_can_export_categories()
    {
        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.category.exportExcel'));

        $response->assertStatus(200);

        Excel::assertDownloaded('Data Category.xlsx', function (CategoryExport $export) {
            return true;
        });
    }

    #[Test]
    public function admin_can_view_category_page_with_search()
    {
        Category::factory()->create(['name' => 'Special Category']);

        $response = $this->actingAs($this->admin)
            ->get(route('admin.category.index', ['search' => 'Special']));

        $response->assertStatus(200)
            ->assertSee('Special Category');
    }
}
