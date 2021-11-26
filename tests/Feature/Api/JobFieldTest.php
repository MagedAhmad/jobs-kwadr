<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\JobField;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFieldTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_job_fields()
    {
        $this->actingAsAdmin();

        JobField::factory()->count(2)->create();

        $this->getJson(route('api.job_fields.index'))
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
    public function test_job_fields_select2_api()
    {
        JobField::factory()->count(5)->create();

        $response = $this->getJson(route('api.job_fields.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.job_fields.select', ['selected_id' => 4]))
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
    public function it_can_display_the_job_field_details()
    {
        $this->actingAsAdmin();

        $job_field = JobField::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.job_fields.show', $job_field))
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
