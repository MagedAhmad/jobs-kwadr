<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\JobType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_job_types()
    {
        $this->actingAsAdmin();

        JobType::factory()->count(2)->create();

        $this->getJson(route('api.job_types.index'))
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
    public function test_job_types_select2_api()
    {
        JobType::factory()->count(5)->create();

        $response = $this->getJson(route('api.job_types.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.job_types.select', ['selected_id' => 4]))
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
    public function it_can_display_the_job_type_details()
    {
        $this->actingAsAdmin();

        $job_type = JobType::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.job_types.show', $job_type))
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
