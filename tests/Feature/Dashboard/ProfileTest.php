<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_profiles()
    {
        $this->actingAsAdmin();

        Profile::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.profiles.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_profile_details()
    {
        $this->actingAsAdmin();

        $profile = Profile::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.profiles.show', $profile))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_profiles_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.profiles.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_profile()
    {
        $this->actingAsAdmin();

        $profilesCount = Profile::count();

        $response = $this->post(
            route('dashboard.profiles.store'),
            Profile::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $profile = Profile::all()->last();

        $this->assertEquals(Profile::count(), $profilesCount + 1);

        $this->assertEquals($profile->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_profiles_edit_form()
    {
        $this->actingAsAdmin();

        $profile = Profile::factory()->create();

        $this->get(route('dashboard.profiles.edit', $profile))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_profile()
    {
        $this->actingAsAdmin();

        $profile = Profile::factory()->create();

        $response = $this->put(
            route('dashboard.profiles.update', $profile),
            Profile::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $profile->refresh();

        $response->assertRedirect();

        $this->assertEquals($profile->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_profile()
    {
        $this->actingAsAdmin();

        $profile = Profile::factory()->create();

        $profilesCount = Profile::count();

        $response = $this->delete(route('dashboard.profiles.destroy', $profile));

        $response->assertRedirect();

        $this->assertEquals(Profile::count(), $profilesCount - 1);
    }

    /** @test */
    public function it_can_filter_profiles_by_name()
    {
        $this->actingAsAdmin();

        Profile::factory()->create([
            'name' => 'Foo',
        ]);

        Profile::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.profiles.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('profiles.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
