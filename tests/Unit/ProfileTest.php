<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use App\Profile;

class ExampleTest extends TestCase
{
    /** @test */
    public function imageProfile_returns_a_default_image()
    {
        $defaultImage = '/storage/uploads/DoBmIAXq9b1fBKK4rCYCbIeCPPsaFXr07EyCL3fd.jpeg';
        $profile = new Profile;
        $image = $profile->profileImage();
        $this->assertEquals($defaultImage, $image);
    }
}
