<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TagExport;
use App\Imports\TagImport;
use PHPUnit\Framework\Attributes\Test;

class TagTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat permission yang dibutuhkan controller
        $permissions = [
            'view-tag',
            'create-tag',
            'edit-tag',
            'delete-tag',
            'delete-all-tag',
            'soft-delete-tag',
            'soft-delete-all-tag',
            'restore-tag',
            'restore-all-tag',
            'import-tag',
            'export-tag',
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
            ->get(route('admin.tag.index'))
            ->assertForbidden();
    }

    #[Test]
    public function admin_can_view_tag_list()
    {
        Tag::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get(route('admin.tag.index'))
            ->assertStatus(200)
            ->assertViewHas('tags');
    }

    #[Test]
    public function admin_can_store_a_new_tag()
    {
        $this->actingAs($this->admin);

        $data = [
            'name' => 'New Tag',
        ];

        $response = $this->post(route('admin.tag.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Create Data Tag!');
        $this->assertDatabaseHas('tags', ['name' => 'New Tag']);
    }

    #[Test]
    public function admin_can_update_a_tag()
    {
        $this->actingAs($this->admin);

        $Tag = Tag::factory()->create();

        $data = [
            'name' => 'Updated Tag',
        ];

        $response = $this->put(route('admin.tag.update', $Tag->id), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Edit Data Tag!');
        $this->assertDatabaseHas('tags', [
            'id' => $Tag->id,
            'name' => 'Updated Tag',
        ]);
    }

    #[Test]
    public function admin_can_soft_delete_a_tag()
    {
        $Tag = Tag::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.tag.softDelete', $Tag->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data Tag!');

        $this->assertSoftDeleted('tags', ['id' => $Tag->id]);
    }

    #[Test]
    public function admin_can_restore_a_deleted_tag()
    {
        $this->actingAs($this->admin);

        $Tag = Tag::factory()->create();
        $Tag->delete();

        $response = $this->put(route('admin.tag.restore', $Tag->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Restore Tag!');
        $this->assertDatabaseHas('tags', ['id' => $Tag->id]);
    }

    #[Test]
    public function admin_can_permanently_delete_a_tag()
    {
        $Tag = Tag::factory()->create();
        $Tag->delete();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.tag.destroy', $Tag->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data Tag!');

        $this->assertDatabaseMissing('tags', ['id' => $Tag->id]);
    }

    #[Test]
    public function admin_can_import_tags()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('Tags.xlsx');

        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.tag.import'), ['file' => $file]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Import Data Tag!');

        Excel::assertImported('Tags.xlsx', function (TagImport $import) {
            return true;
        });
    }

    #[Test]
    public function admin_can_export_tags()
    {
        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.tag.exportExcel'));

        $response->assertStatus(200);

        Excel::assertDownloaded('Data Tag.xlsx', function (TagExport $export) {
            return true;
        });
    }

    #[Test]
    public function admin_can_view_tag_page_with_search()
    {
        Tag::factory()->create(['name' => 'Special Tag']);

        $response = $this->actingAs($this->admin)
            ->get(route('admin.tag.index', ['search' => 'Special']));

        $response->assertStatus(200)
            ->assertSee('Special Tag');
    }
}
