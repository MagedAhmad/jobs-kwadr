<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Employer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class EmployerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_employers()
    {
        $this->actingAsAdmin();

        Employer::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.employers.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_employer_details()
    {
        $this->actingAsAdmin();

        $employer = Employer::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.employers.show', $employer))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_employers_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.employers.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_employer()
    {
        $this->actingAsAdmin();

        $employersCount = Employer::count();

        $response = $this->post(
            route('dashboard.employers.store'),
            Employer::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $employer = Employer::all()->last();

        $this->assertEquals(Employer::count(), $employersCount + 1);

        $this->assertEquals($employer->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_employers_edit_form()
    {
        $this->actingAsAdmin();

        $employer = Employer::factory()->create();

        $this->get(route('dashboard.employers.edit', $employer))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_employer()
    {
        $this->actingAsAdmin();

        $employer = Employer::factory()->create();

        $response = $this->put(
            route('dashboard.employers.update', $employer),
            Employer::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $employer->refresh();

        $response->assertRedirect();

        $this->assertEquals($employer->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_employer()
    {
        $this->actingAsAdmin();

        $employer = Employer::factory()->create();

        $employersCount = Employer::count();

        $response = $this->delete(route('dashboard.employers.destroy', $employer));

        $response->assertRedirect();

        $this->assertEquals(Employer::count(), $employersCount - 1);
    }

    /** @test */
    public function it_can_filter_employers_by_name()
    {
        $this->actingAsAdmin();

        Employer::factory()->create([
            'name' => 'Foo',
        ]);

        Employer::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.employers.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('employers.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
