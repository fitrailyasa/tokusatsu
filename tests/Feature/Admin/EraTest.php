<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Era;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EraExport;
use App\Imports\EraImport;
use PHPUnit\Framework\Attributes\Test;

class EraTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user admin untuk melewati middleware
        $this->admin = User::factory()->create([
            'role' => 'admin',
            'status' => 'aktif',
        ]);
    }

    #[Test]
    public function it_redirects_non_admin_users()
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get(route('admin.era.index'))
            ->assertRedirect(route('login'));
    }

    #[Test]
    public function admin_can_view_era_list()
    {
        Era::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get(route('admin.era.index'))
            ->assertStatus(200)
            ->assertViewHas('eras');
    }

    #[Test]
    public function admin_can_store_a_new_era()
    {
        $this->actingAs($this->admin);

        $data = [
            'name' => 'New Era',
            'desc' => 'This is a test Era',
        ];

        $response = $this->post(route('admin.era.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Tambah Data Era!');
        $this->assertDatabaseHas('eras', ['name' => 'New Era']);
    }

    #[Test]
    public function admin_can_update_a_era()
    {
        $this->actingAs($this->admin);

        $era = Era::factory()->create();

        $data = [
            'name' => 'Updated Era',
            'desc' => 'This is a test Era',
        ];

        $response = $this->put(route('admin.era.update', $era->id), $data);

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Edit Data Era!');
        $this->assertDatabaseHas('eras', [
            'id' => $era->id,
            'name' => 'Updated Era',
            'desc' => 'This is a test Era',
        ]);
    }

    #[Test]
    public function admin_can_soft_delete_a_era()
    {
        $era = Era::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.era.softDelete', $era->id));

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Hapus Data Era!');

        $this->assertSoftDeleted('eras', ['id' => $era->id]);
    }

    #[Test]
    public function admin_can_restore_a_deleted_era()
    {
        $this->actingAs($this->admin);

        $era = Era::factory()->create();
        $era->delete();

        $response = $this->put(route('admin.era.restore', $era->id));

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Restore Era!');
        $this->assertDatabaseHas('eras', ['id' => $era->id]);
    }

    #[Test]
    public function admin_can_permanently_delete_a_era()
    {
        $era = Era::factory()->create();
        $era->delete();

        $response = $this->actingAs($this->admin)
            ->delete(route('admin.era.destroy', $era->id));

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Hapus Data Era!');

        $this->assertDatabaseMissing('eras', ['id' => $era->id]);
    }

    #[Test]
    public function admin_can_import_eras()
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->create('eras.xlsx');

        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.era.import'), ['file' => $file]);

        $response->assertRedirect();
        $response->assertSessionHas('message', 'Berhasil Import Data Era!');

        Excel::assertImported('eras.xlsx', function (EraImport $import) {
            return true;
        });
    }

    #[Test]
    public function admin_can_export_eras()
    {
        Excel::fake();

        $response = $this->actingAs($this->admin)
            ->get(route('admin.era.export'));

        $response->assertStatus(200);

        Excel::assertDownloaded('Data Era.xlsx', function (EraExport $export) {
            return true;
        });
    }

    #[Test]
    public function admin_can_view_era_page_with_search()
    {
        Era::factory()->create(['name' => 'Special Era']);

        $response = $this->actingAs($this->admin)
            ->get(route('admin.era.index', ['search' => 'Special']));

        $response->assertStatus(200)
            ->assertSee('Special Era');
    }
}
