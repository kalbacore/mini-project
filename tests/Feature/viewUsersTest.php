<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewUsersTest extends TestCase
{
    use RefreshDatabase;

    protected $guest;

    public function setUp(): void
    {
        parent::setUp();

        $this->guest = factory(User::class)->create();
        $this->agent = $this->createUserWithRoleAndAbility([
            'name' => 'view users'
        ], [
            'name' => 'agent'
        ]);
    }

    /** @test */
    public function a_component_exists_when_an_admin_is_viewing_a_user()
    {
        $this->actingAs($this->agent);

        $this->get('users')
            ->assertSuccessful()
            ->assertSeeLivewire('users-table');
    }

    /** @test */
    public function a_guest_cannot_see_the_users_table()
    {
        $this->actingAs($this->guest);

        $this->get('users')
            ->assertForbidden();
    }
}
