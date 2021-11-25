<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Martial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class MartialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_martials()
    {
        $this->actingAsAdmin();

        Martial::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.martials.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_martial_details()
    {
        $this->actingAsAdmin();

        $martial = Martial::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.martials.show', $martial))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_martials_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.martials.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_martial()
    {
        $this->actingAsAdmin();

        $martialsCount = Martial::count();

        $response = $this->post(
            route('dashboard.martials.store'),
            Martial::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $martial = Martial::all()->last();

        $this->assertEquals(Martial::count(), $martialsCount + 1);

        $this->assertEquals($martial->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_martials_edit_form()
    {
        $this->actingAsAdmin();

        $martial = Martial::factory()->create();

        $this->get(route('dashboard.martials.edit', $martial))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_martial()
    {
        $this->actingAsAdmin();

        $martial = Martial::factory()->create();

        $response = $this->put(
            route('dashboard.martials.update', $martial),
            Martial::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $martial->refresh();

        $response->assertRedirect();

        $this->assertEquals($martial->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_martial()
    {
        $this->actingAsAdmin();

        $martial = Martial::factory()->create();

        $martialsCount = Martial::count();

        $response = $this->delete(route('dashboard.martials.destroy', $martial));

        $response->assertRedirect();

        $this->assertEquals(Martial::count(), $martialsCount - 1);
    }

    /** @test */
    public function it_can_filter_martials_by_name()
    {
        $this->actingAsAdmin();

        Martial::factory()->create([
            'name' => 'Foo',
        ]);

        Martial::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.martials.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('martials.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
