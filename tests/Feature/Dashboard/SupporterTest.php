<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Supporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class SupporterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_supporters()
    {
        $this->actingAsAdmin();

        Supporter::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.supporters.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_supporter_details()
    {
        $this->actingAsAdmin();

        $supporter = Supporter::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.supporters.show', $supporter))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_supporters_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.supporters.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_supporter()
    {
        $this->actingAsAdmin();

        $supportersCount = Supporter::count();

        $response = $this->post(
            route('dashboard.supporters.store'),
            Supporter::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $supporter = Supporter::all()->last();

        $this->assertEquals(Supporter::count(), $supportersCount + 1);

        $this->assertEquals($supporter->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_supporters_edit_form()
    {
        $this->actingAsAdmin();

        $supporter = Supporter::factory()->create();

        $this->get(route('dashboard.supporters.edit', $supporter))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_supporter()
    {
        $this->actingAsAdmin();

        $supporter = Supporter::factory()->create();

        $response = $this->put(
            route('dashboard.supporters.update', $supporter),
            Supporter::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $supporter->refresh();

        $response->assertRedirect();

        $this->assertEquals($supporter->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_supporter()
    {
        $this->actingAsAdmin();

        $supporter = Supporter::factory()->create();

        $supportersCount = Supporter::count();

        $response = $this->delete(route('dashboard.supporters.destroy', $supporter));

        $response->assertRedirect();

        $this->assertEquals(Supporter::count(), $supportersCount - 1);
    }

    /** @test */
    public function it_can_filter_supporters_by_name()
    {
        $this->actingAsAdmin();

        Supporter::factory()->create([
            'name' => 'Foo',
        ]);

        Supporter::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.supporters.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('supporters.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
