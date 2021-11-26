<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\TrainingType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class TrainingTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_training_types()
    {
        $this->actingAsAdmin();

        TrainingType::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.training_types.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_training_type_details()
    {
        $this->actingAsAdmin();

        $training_type = TrainingType::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.training_types.show', $training_type))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_training_types_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.training_types.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_training_type()
    {
        $this->actingAsAdmin();

        $training_typesCount = TrainingType::count();

        $response = $this->post(
            route('dashboard.training_types.store'),
            TrainingType::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $training_type = TrainingType::all()->last();

        $this->assertEquals(TrainingType::count(), $training_typesCount + 1);

        $this->assertEquals($training_type->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_training_types_edit_form()
    {
        $this->actingAsAdmin();

        $training_type = TrainingType::factory()->create();

        $this->get(route('dashboard.training_types.edit', $training_type))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_training_type()
    {
        $this->actingAsAdmin();

        $training_type = TrainingType::factory()->create();

        $response = $this->put(
            route('dashboard.training_types.update', $training_type),
            TrainingType::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $training_type->refresh();

        $response->assertRedirect();

        $this->assertEquals($training_type->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_training_type()
    {
        $this->actingAsAdmin();

        $training_type = TrainingType::factory()->create();

        $training_typesCount = TrainingType::count();

        $response = $this->delete(route('dashboard.training_types.destroy', $training_type));

        $response->assertRedirect();

        $this->assertEquals(TrainingType::count(), $training_typesCount - 1);
    }

    /** @test */
    public function it_can_filter_training_types_by_name()
    {
        $this->actingAsAdmin();

        TrainingType::factory()->create([
            'name' => 'Foo',
        ]);

        TrainingType::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.training_types.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('training_types.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
