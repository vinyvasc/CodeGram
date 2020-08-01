<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Profile;
use App\User;
use UserSeeder;

class ProfileFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_profile_should_be_created_automaticaly_for_a_user()
    {
        $user = factory(User::class)->create();
        $this->assertNotCount(0, Profile::all());
    }

    /** @test */
    public function a_profile_can_be_updated_by_the_authenticated_user()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        Storage::fake('uploads');

        $response = $this->patch('/profile/' . $user->id, $data = [
            'description' => 'lorem ipsum',
            'url' => 'http://www.exemple.com',
            //'image' => UploadedFile::fake()->create('test.jpg'),
        ]);

        $this->assertDatabaseHas('profiles', [
            'description' => 'lorem ipsum',
            'url' => 'http://www.exemple.com',
            ]);

        $response->assertRedirect("/profile/{$user->id}");

    }
    /** @test */
    public function a_profile_can_be_seen_by_other_users()
    {
        $user = factory(User::class, 2)->create();
        $response = $this->actingAs($user->find(1))->get('/profile/' . $user->find(2)->id);
        $response->assertOk();
    }
}

