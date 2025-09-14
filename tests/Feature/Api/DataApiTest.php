<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Data;
use App\Models\Category;

class DataApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_datas_list()
    {
        Data::factory()->count(5)->create();

        $response = $this->getJson(route('datas.index'));

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

    public function test_can_create_data()
    {
        $category = Category::factory()->create();

        $data = [
            'category_id' => $category->id,
            'name' => 'New Data',
        ];

        $response = $this->postJson(route('datas.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Data created successfully',
            ]);

        $this->assertDatabaseHas('datas', ['name' => 'New Data']);
    }

    public function test_can_view_data()
    {
        $data = Data::factory()->create();

        $response = $this->getJson(route('datas.show', $data->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $data->name]);
    }

    public function test_can_update_data()
    {
        $data = Data::factory()->create();
        $category = Category::factory()->create();

        $updateData = [
            'category_id' => $category->id,
            'name' => 'Updated Data',
        ];

        $response = $this->putJson(route('datas.update', $data->id), $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Data updated successfully',
            ]);

        $this->assertDatabaseHas('datas', ['name' => 'Updated Data']);
    }

    public function test_can_delete_data()
    {
        $data = Data::factory()->create();

        $response = $this->deleteJson(route('datas.destroy', $data->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Data deleted successfully',
            ]);

        $this->assertSoftDeleted('datas', ['id' => $data->id]);
    }

    public function test_search_datas()
    {
        Data::factory()->create(['name' => 'Action']);

        $response = $this->getJson(route('datas.index', ['search' => 'Action']));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Action']);
    }
}
