<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Supporter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupporterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_supporters()
    {
        $this->actingAsAdmin();

        Supporter::factory()->count(2)->create();

        $this->getJson(route('api.supporters.index'))
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
    public function test_supporters_select2_api()
    {
        Supporter::factory()->count(5)->create();

        $response = $this->getJson(route('api.supporters.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.supporters.select', ['selected_id' => 4]))
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
    public function it_can_display_the_supporter_details()
    {
        $this->actingAsAdmin();

        $supporter = Supporter::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.supporters.show', $supporter))
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
