<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Category;
use App\Models\Data;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Imports\DataImport;
use PHPUnit\Framework\Attributes\Test;

class DataTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat permission yang dibutuhkan controller
        $permissions = [
            'view-data',
            'create-data',
            'edit-data',
            'delete-data',
            'delete-all-data',
            'soft-delete-data',
            'soft-delete-all-data',
            'restore-data',
            'restore-all-data',
            'import-data',
            'export-data',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Buat role dan assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        // Buat user dan assign role
        $this->admin = User::factory()->create(['email_verified_at' => now()]);
        $this->admin->assignRole($adminRole);
    }

    #[Test]
    public function it_redirects_non_admin_users()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.data.index'))
            ->assertForbidden();
    }

    #[Test]
    public function admin_can_view_data_list()
    {
        Data::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get(route('admin.data.index'))
            ->assertStatus(200)
            ->assertViewHas('datas');
    }

    #[Test]
    public function admin_can_store_a_new_data()
    {
        $this->actingAs($this->admin);

        $category = Category::factory()->create();

        $data = [
            'category_id' => $category->id,
            'name' => 'New Data',
        ];

        $response = $this->post(route('admin.data.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Create Data!');
        $this->assertDatabaseHas('datas', ['name' => 'New Data']);
    }

    #[Test]
    public function admin_can_update_a_data()
    {
        $this->actingAs($this->admin);

        $data = Data::factory()->create();
        $category = Category::factory()->create();

        $update_data = [
            'category_id' => $category->id,
            'name' => 'Updated Data',
        ];

        $response = $this->put(route('admin.data.update', $data->id), $update_data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Edit Data!');
        $this->assertDatabaseHas('datas', [
            'id' => $data->id,
            'category_id' => $category->id,
        ]);
    }

    #[Test]
    public function admin_can_soft_delete_a_data()
    {
        $data = Data::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.data.softDelete', $data->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data!');

        $this->assertSoftDeleted('datas', ['id' => $data->id]);
    }

    #[Test]
    public function admin_can_restore_a_deleted_data()
    {
        $this->actingAs($this->admin);

        $data = Data::factory()->create();
        $data->delete();

        $response = $this->put(route('admin.data.restore', $data->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Restore Data!');
        $this->assertDatabaseHas('datas', ['id' => $data->id]);
    }

    #[Test]
    public function admin_can_permanently_delete_a_data()
    {
        $data = Data::factory()->create();
        $data->delete();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.data.destroy', $data->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data!');

        $this->assertDatabaseMissing('datas', ['id' => $data->id]);
    }

    #[Test]
    public function admin_can_import_datas()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('datas.xlsx');

        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.data.import'), ['file' => $file]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Import Data!');

        Excel::assertImported('datas.xlsx', function (DataImport $import) {
            return true;
        });
    }

    #[Test]
    public function admin_can_export_datas()
    {
        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.data.exportExcel'));

        $response->assertStatus(200);

        Excel::assertDownloaded('Data.xlsx', function (DataExport $export) {
            return true;
        });
    }

    #[Test]
    public function admin_can_view_data_page_with_search()
    {
        Data::factory()->create(['name' => 'Special Data']);

        $response = $this->actingAs($this->admin)
            ->get(route('admin.data.index', ['search' => 'Special']));

        $response->assertStatus(200)
            ->assertSee('Special Data');
    }
}
