<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class TagApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_tags_list()
    {
        Tag::factory()->count(5)->create();

        $response = $this->getJson(route('tags.index'));

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

    public function test_can_create_tag()
    {
        Storage::fake('public');

        $data = [
            'name' => 'New Tag',
        ];

        $response = $this->postJson(route('tags.store'), $data);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Tag created successfully',
            ]);

        $this->assertDatabaseHas('tags', ['name' => 'New Tag']);
    }

    public function test_can_view_tag()
    {
        $tag = Tag::factory()->create();

        $response = $this->getJson(route('tags.show', $tag->id));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $tag->name]);
    }

    public function test_can_update_tag()
    {
        $tag = Tag::factory()->create();

        $updateData = [
            'name' => 'Updated Tag',
        ];

        $response = $this->putJson(route('tags.update', $tag->id), $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Tag updated successfully',
            ]);

        $this->assertDatabaseHas('tags', ['name' => 'Updated Tag']);
    }

    public function test_can_delete_tag()
    {
        $tag = Tag::factory()->create();

        $response = $this->deleteJson(route('tags.destroy', $tag->id));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Tag deleted successfully',
            ]);

        $this->assertSoftDeleted('tags', ['id' => $tag->id]);
    }

    public function test_search_tags()
    {
        Tag::factory()->create(['name' => 'Action']);

        $response = $this->getJson(route('tags.index', ['search' => 'Action']));

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Action']);
    }
}
