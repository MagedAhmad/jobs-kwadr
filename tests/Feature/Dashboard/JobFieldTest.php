<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\JobField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class JobFieldTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_job_fields()
    {
        $this->actingAsAdmin();

        JobField::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.job_fields.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_job_field_details()
    {
        $this->actingAsAdmin();

        $job_field = JobField::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.job_fields.show', $job_field))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_job_fields_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.job_fields.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_job_field()
    {
        $this->actingAsAdmin();

        $job_fieldsCount = JobField::count();

        $response = $this->post(
            route('dashboard.job_fields.store'),
            JobField::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $job_field = JobField::all()->last();

        $this->assertEquals(JobField::count(), $job_fieldsCount + 1);

        $this->assertEquals($job_field->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_job_fields_edit_form()
    {
        $this->actingAsAdmin();

        $job_field = JobField::factory()->create();

        $this->get(route('dashboard.job_fields.edit', $job_field))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_job_field()
    {
        $this->actingAsAdmin();

        $job_field = JobField::factory()->create();

        $response = $this->put(
            route('dashboard.job_fields.update', $job_field),
            JobField::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $job_field->refresh();

        $response->assertRedirect();

        $this->assertEquals($job_field->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_job_field()
    {
        $this->actingAsAdmin();

        $job_field = JobField::factory()->create();

        $job_fieldsCount = JobField::count();

        $response = $this->delete(route('dashboard.job_fields.destroy', $job_field));

        $response->assertRedirect();

        $this->assertEquals(JobField::count(), $job_fieldsCount - 1);
    }

    /** @test */
    public function it_can_filter_job_fields_by_name()
    {
        $this->actingAsAdmin();

        JobField::factory()->create([
            'name' => 'Foo',
        ]);

        JobField::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.job_fields.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('job_fields.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
