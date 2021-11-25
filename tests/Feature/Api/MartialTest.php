<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Martial;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MartialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_martials()
    {
        $this->actingAsAdmin();

        Martial::factory()->count(2)->create();

        $this->getJson(route('api.martials.index'))
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
    public function test_martials_select2_api()
    {
        Martial::factory()->count(5)->create();

        $response = $this->getJson(route('api.martials.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.martials.select', ['selected_id' => 4]))
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
    public function it_can_display_the_martial_details()
    {
        $this->actingAsAdmin();

        $martial = Martial::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.martials.show', $martial))
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
