<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_skills()
    {
        $this->actingAsAdmin();

        Skill::factory()->count(2)->create();

        $this->getJson(route('api.skills.index'))
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
    public function test_skills_select2_api()
    {
        Skill::factory()->count(5)->create();

        $response = $this->getJson(route('api.skills.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.skills.select', ['selected_id' => 4]))
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
    public function it_can_display_the_skill_details()
    {
        $this->actingAsAdmin();

        $skill = Skill::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.skills.show', $skill))
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
