<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Employer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_employers()
    {
        $this->actingAsAdmin();

        Employer::factory()->count(2)->create();

        $this->getJson(route('api.employers.index'))
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
    public function test_employers_select2_api()
    {
        Employer::factory()->count(5)->create();

        $response = $this->getJson(route('api.employers.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.employers.select', ['selected_id' => 4]))
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
    public function it_can_display_the_employer_details()
    {
        $this->actingAsAdmin();

        $employer = Employer::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.employers.show', $employer))
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
