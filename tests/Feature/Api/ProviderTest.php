<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProviderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_providers()
    {
        $this->actingAsAdmin();

        Provider::factory()->count(2)->create();

        $this->getJson(route('api.providers.index'))
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
    public function test_providers_select2_api()
    {
        Provider::factory()->count(5)->create();

        $response = $this->getJson(route('api.providers.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.providers.select', ['selected_id' => 4]))
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
    public function it_can_display_the_provider_details()
    {
        $this->actingAsAdmin();

        $provider = Provider::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.providers.show', $provider))
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
