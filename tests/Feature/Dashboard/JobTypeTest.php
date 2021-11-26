<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\JobType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class JobTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_job_types()
    {
        $this->actingAsAdmin();

        JobType::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.job_types.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_job_type_details()
    {
        $this->actingAsAdmin();

        $job_type = JobType::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.job_types.show', $job_type))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_job_types_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.job_types.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_job_type()
    {
        $this->actingAsAdmin();

        $job_typesCount = JobType::count();

        $response = $this->post(
            route('dashboard.job_types.store'),
            JobType::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $job_type = JobType::all()->last();

        $this->assertEquals(JobType::count(), $job_typesCount + 1);

        $this->assertEquals($job_type->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_job_types_edit_form()
    {
        $this->actingAsAdmin();

        $job_type = JobType::factory()->create();

        $this->get(route('dashboard.job_types.edit', $job_type))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_job_type()
    {
        $this->actingAsAdmin();

        $job_type = JobType::factory()->create();

        $response = $this->put(
            route('dashboard.job_types.update', $job_type),
            JobType::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $job_type->refresh();

        $response->assertRedirect();

        $this->assertEquals($job_type->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_job_type()
    {
        $this->actingAsAdmin();

        $job_type = JobType::factory()->create();

        $job_typesCount = JobType::count();

        $response = $this->delete(route('dashboard.job_types.destroy', $job_type));

        $response->assertRedirect();

        $this->assertEquals(JobType::count(), $job_typesCount - 1);
    }

    /** @test */
    public function it_can_filter_job_types_by_name()
    {
        $this->actingAsAdmin();

        JobType::factory()->create([
            'name' => 'Foo',
        ]);

        JobType::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.job_types.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('job_types.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
