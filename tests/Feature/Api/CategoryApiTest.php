<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Franchise;
use App\Models\Era;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_categories_list()
    {
        Category::factory()->count(5)->create();

        $response = $this->getJson(route('categories.index'));

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

    public function test_can_create_category()
    {
        Storage::fake('public');

        $era = Era::factory()->create();
        $franchise = Franchise::factory()->create();

        $data = [
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
            'name' => 'New Category',
            'img' => UploadedFile::fake()->image('category.jpg'),
        ];

        $response = $this->postJson(route('categories.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Category created successfully',
            ]);

        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }

    public function test_can_view_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson(route('categories.show', $category->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $category->name]);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();
        $era = Era::factory()->create();
        $franchise = Franchise::factory()->create();

        $updateData = [
            'era_id' => $era->id,
            'franchise_id' => $franchise->id,
            'name' => 'Updated Category',
        ];

        $response = $this->putJson(route('categories.update', $category->id), $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Category updated successfully',
            ]);

        $this->assertDatabaseHas('categories', ['name' => 'Updated Category']);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson(route('categories.destroy', $category->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Category deleted successfully',
            ]);

        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }

    public function test_search_categories()
    {
        Category::factory()->create(['name' => 'Action']);

        $response = $this->getJson(route('categories.index', ['search' => 'Action']));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Action']);
    }
}
