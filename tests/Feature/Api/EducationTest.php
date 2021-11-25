<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Education;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_education()
    {
        $this->actingAsAdmin();

        Education::factory()->count(2)->create();

        $this->getJson(route('api.education.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }

    /** @test */
    public function test_education_select2_api()
    {
        Education::factory()->count(5)->create();

        $response = $this->getJson(route('api.education.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.education.select', ['selected_id' => 4]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 4);

        $this->assertCount(5, $response->json('data'));
    }

    /** @test */
    public function it_can_display_the_education_details()
    {
        $this->actingAsAdmin();

        $education = Education::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.education.show', $education))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }
}
