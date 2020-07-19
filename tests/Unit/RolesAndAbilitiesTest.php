<?php

namespace Tests\Unit;

use App\Ability;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Role;

class RolesAndAbilitiesTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $role;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->role = factory(Role::class)->create();
    }

    /** @test */
    public function a_role_can_have_many_abilities()
    {
        $this->role = factory(Role::class)->create();

        $this->role->isAllowedTo(
            factory(Ability::class, 4)->create()->take(3)->pluck('name')->toArray()
        );

        $this->assertSame($this->role->abilities->count(), 3);
    }

    /** @test */
    public function a_user_can_be_assigned_a_role()
    {
        $this->user->assignRole($this->role->name);

        $this->assertSame(
            $this->user->roles()->first()->name,
            $this->role->name
        );
    }

    /** @test */
    public function a_user_can_be_assigned_many_roles()
    {
        $this->user->assignRoles([
            $this->role->name,
            factory(Role::class)->create()->name
        ]);

        $this->assertSame($this->user->roles()->count(), 2);
    }
}
