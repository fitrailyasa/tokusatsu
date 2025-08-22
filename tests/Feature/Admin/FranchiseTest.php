<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Franchise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FranchiseExport;
use App\Imports\FranchiseImport;
use PHPUnit\Framework\Attributes\Test;

class FranchiseTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat permission yang dibutuhkan controller
        $permissions = [
            'view:franchise',
            'create:franchise',
            'edit:franchise',
            'delete:franchise',
            'delete-all:franchise',
            'soft-delete:franchise',
            'soft-delete-all:franchise',
            'restore:franchise',
            'restore-all:franchise',
            'import:franchise',
            'export:franchise',
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
            ->get(route('admin.franchise.index'))
            ->assertRedirect(route('verification.notice'));
    }

    #[Test]
    public function admin_can_view_franchise_list()
    {
        Franchise::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get(route('admin.franchise.index'))
            ->assertStatus(200)
            ->assertViewHas('franchises');
    }

    #[Test]
    public function admin_can_store_a_new_franchise()
    {
        $this->actingAs($this->admin);

        $data = [
            'name' => 'New Franchise',
            'description' => 'This is a test Franchise',
        ];

        $response = $this->post(route('admin.franchise.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Create Data Franchise!');
        $this->assertDatabaseHas('franchises', ['name' => 'New Franchise']);
    }

    #[Test]
    public function admin_can_update_a_franchise()
    {
        $this->actingAs($this->admin);

        $franchise = Franchise::factory()->create();

        $data = [
            'name' => 'Updated Franchise',
            'description' => 'This is a test Franchise',
        ];

        $response = $this->put(route('admin.franchise.update', $franchise->id), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Edit Data Franchise!');
        $this->assertDatabaseHas('franchises', [
            'id' => $franchise->id,
            'name' => 'Updated Franchise',
            'description' => 'This is a test Franchise',
        ]);
    }

    #[Test]
    public function admin_can_soft_delete_a_franchise()
    {
        $franchise = Franchise::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.franchise.softDelete', $franchise->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data Franchise!');

        $this->assertSoftDeleted('franchises', ['id' => $franchise->id]);
    }

    #[Test]
    public function admin_can_restore_a_deleted_franchise()
    {
        $this->actingAs($this->admin);

        $franchise = Franchise::factory()->create();
        $franchise->delete();

        $response = $this->put(route('admin.franchise.restore', $franchise->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Restore Franchise!');
        $this->assertDatabaseHas('franchises', ['id' => $franchise->id]);
    }

    #[Test]
    public function admin_can_permanently_delete_a_franchise()
    {
        $franchise = Franchise::factory()->create();
        $franchise->delete();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.franchise.destroy', $franchise->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Delete Data Franchise!');

        $this->assertDatabaseMissing('franchises', ['id' => $franchise->id]);
    }

    #[Test]
    public function admin_can_import_franchises()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('Franchises.xlsx');

        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.franchise.import'), ['file' => $file]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Successfully Import Data Franchise!');

        Excel::assertImported('Franchises.xlsx', function (FranchiseImport $import) {
            return true;
        });
    }

    #[Test]
    public function admin_can_export_franchises()
    {
        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.franchise.exportExcel'));

        $response->assertStatus(200);

        Excel::assertDownloaded('Data Franchise.xlsx', function (FranchiseExport $export) {
            return true;
        });
    }

    #[Test]
    public function admin_can_view_franchise_page_with_search()
    {
        Franchise::factory()->create(['name' => 'Special Franchise']);

        $response = $this->actingAs($this->admin)
            ->get(route('admin.franchise.index', ['search' => 'Special']));

        $response->assertStatus(200)
            ->assertSee('Special Franchise');
    }
}
