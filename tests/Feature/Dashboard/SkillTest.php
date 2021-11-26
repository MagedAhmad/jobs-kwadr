<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_skills()
    {
        $this->actingAsAdmin();

        Skill::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.skills.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_skill_details()
    {
        $this->actingAsAdmin();

        $skill = Skill::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.skills.show', $skill))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_skills_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.skills.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_skill()
    {
        $this->actingAsAdmin();

        $skillsCount = Skill::count();

        $response = $this->post(
            route('dashboard.skills.store'),
            Skill::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $skill = Skill::all()->last();

        $this->assertEquals(Skill::count(), $skillsCount + 1);

        $this->assertEquals($skill->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_skills_edit_form()
    {
        $this->actingAsAdmin();

        $skill = Skill::factory()->create();

        $this->get(route('dashboard.skills.edit', $skill))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_skill()
    {
        $this->actingAsAdmin();

        $skill = Skill::factory()->create();

        $response = $this->put(
            route('dashboard.skills.update', $skill),
            Skill::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $skill->refresh();

        $response->assertRedirect();

        $this->assertEquals($skill->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_skill()
    {
        $this->actingAsAdmin();

        $skill = Skill::factory()->create();

        $skillsCount = Skill::count();

        $response = $this->delete(route('dashboard.skills.destroy', $skill));

        $response->assertRedirect();

        $this->assertEquals(Skill::count(), $skillsCount - 1);
    }

    /** @test */
    public function it_can_filter_skills_by_name()
    {
        $this->actingAsAdmin();

        Skill::factory()->create([
            'name' => 'Foo',
        ]);

        Skill::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.skills.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('skills.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
