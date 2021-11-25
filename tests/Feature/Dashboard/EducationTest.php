<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Education;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class EducationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_education()
    {
        $this->actingAsAdmin();

        Education::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.education.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_education_details()
    {
        $this->actingAsAdmin();

        $education = Education::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.education.show', $education))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_education_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.education.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_education()
    {
        $this->actingAsAdmin();

        $educationCount = Education::count();

        $response = $this->post(
            route('dashboard.education.store'),
            Education::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $education = Education::all()->last();

        $this->assertEquals(Education::count(), $educationCount + 1);

        $this->assertEquals($education->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_education_edit_form()
    {
        $this->actingAsAdmin();

        $education = Education::factory()->create();

        $this->get(route('dashboard.education.edit', $education))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_education()
    {
        $this->actingAsAdmin();

        $education = Education::factory()->create();

        $response = $this->put(
            route('dashboard.education.update', $education),
            Education::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $education->refresh();

        $response->assertRedirect();

        $this->assertEquals($education->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_education()
    {
        $this->actingAsAdmin();

        $education = Education::factory()->create();

        $educationCount = Education::count();

        $response = $this->delete(route('dashboard.education.destroy', $education));

        $response->assertRedirect();

        $this->assertEquals(Education::count(), $educationCount - 1);
    }

    /** @test */
    public function it_can_filter_education_by_name()
    {
        $this->actingAsAdmin();

        Education::factory()->create([
            'name' => 'Foo',
        ]);

        Education::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.education.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('education.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
