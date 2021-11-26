<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\TrainingType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainingTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_training_types()
    {
        $this->actingAsAdmin();

        TrainingType::factory()->count(2)->create();

        $this->getJson(route('api.training_types.index'))
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
    public function test_training_types_select2_api()
    {
        TrainingType::factory()->count(5)->create();

        $response = $this->getJson(route('api.training_types.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.training_types.select', ['selected_id' => 4]))
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
    public function it_can_display_the_training_type_details()
    {
        $this->actingAsAdmin();

        $training_type = TrainingType::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.training_types.show', $training_type))
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
