<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Era;

class EraApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_eras_list()
    {
        Era::factory()->count(5)->create();

        $response = $this->getJson(route('eras.index'));

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

    public function test_can_create_era()
    {
        $data = [
            'name' => 'New Era',
            'description' => 'This is a test Era',
        ];

        $response = $this->postJson(route('eras.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Era created successfully',
            ]);

        $this->assertDatabaseHas('eras', ['name' => 'New Era']);
    }

    public function test_can_view_era()
    {
        $era = Era::factory()->create();

        $response = $this->getJson(route('eras.show', $era->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $era->name]);
    }

    public function test_can_update_era()
    {
        $era = Era::factory()->create();

        $updateData = [
            'name' => 'Updated Era',
            'description' => 'This is a test Era',
        ];

        $response = $this->putJson(route('eras.update', $era->id), $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Era updated successfully',
            ]);

        $this->assertDatabaseHas('eras', ['name' => 'Updated Era']);
    }

    public function test_can_delete_era()
    {
        $era = Era::factory()->create();

        $response = $this->deleteJson(route('eras.destroy', $era->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Era deleted successfully',
            ]);

        $this->assertSoftDeleted('eras', ['id' => $era->id]);
    }

    public function test_search_eras()
    {
        Era::factory()->create(['name' => 'Action']);

        $response = $this->getJson(route('eras.index', ['search' => 'Action']));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Action']);
    }
}
