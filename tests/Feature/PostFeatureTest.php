<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use App\Post;


class PostFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function the_authenticaded_user_can_post_a_picture()
    {

        $this->actingAs($this->user);

        $response = $this->post('/p', [
            'caption' => 'Lorem ipsum',
            'image' => UploadedFile::fake()->create('test.jpg'),
        ]);



        //$this->assertDatabaseHas('posts', ['caption' => 'Lorem ipsum']);
        //$response->assertRedirect("/p/{$this->user->id}");
    }
}
