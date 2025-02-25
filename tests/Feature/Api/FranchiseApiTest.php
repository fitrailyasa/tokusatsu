<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Franchise;

class FranchiseApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_franchises_list()
    {
        Franchise::factory()->count(5)->create();

        $response = $this->getJson(route('franchises.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'pagination' => [
                    'current_page',
                    'total',
                    'per_page',
                    'last_page',
                    'next_page_url',
                    'prev_page_url',
                ],
            ]);
    }

    public function test_can_create_Franchise()
    {
        $data = [
            'name' => 'New Franchise',
            'desc' => 'This is a test Franchise',
        ];

        $response = $this->postJson(route('franchises.store'), $data);

        $response->assertStatus(200)
            ->assertJson(['alert' => 'Berhasil Tambah Franchise!']);

        $this->assertDatabaseHas('franchises', ['name' => 'New Franchise']);
    }

    public function test_can_view_Franchise()
    {
        $franchise = Franchise::factory()->create();

        $response = $this->getJson(route('franchises.show', $franchise->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $franchise->name]);
    }

    public function test_can_update_Franchise()
    {
        $franchise = Franchise::factory()->create();

        $updateData = [
            'name' => 'Updated Franchise',
            'desc' => 'This is a test Franchise',
        ];

        $response = $this->putJson(route('franchises.update', $franchise->id), $updateData);

        $response->assertStatus(200)
            ->assertJson(['alert' => 'Berhasil Edit Franchise!']);

        $this->assertDatabaseHas('franchises', ['name' => 'Updated Franchise']);
    }

    public function test_can_delete_Franchise()
    {
        $franchise = Franchise::factory()->create();

        $response = $this->deleteJson(route('franchises.destroy', $franchise->id));

        $response->assertStatus(200)
            ->assertJson(['alert' => 'Berhasil Hapus Franchise!']);

        $this->assertSoftDeleted('franchises', ['id' => $franchise->id]);
    }

    public function test_search_franchises()
    {
        Franchise::factory()->create(['name' => 'Action']);

        $response = $this->getJson(route('franchises.index', ['search' => 'Action']));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Action']);
    }
}
