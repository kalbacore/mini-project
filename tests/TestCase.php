<?php

namespace Tests;

use Illuminate\Foundation\Mix;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Swap out the Mix manifest implementation, so we don't need
        // to run the npm commands to generate a manifest file for
        // the assets in order to run tests that return views.
        $this->swap(Mix::class, function () {
            return '';
        });
    }

    protected function createUserWithRoleAndAbility(array $ability, array $role, array $user = [])
    {
        // create the abilities
        factory(\App\Ability::class)->create($ability);

        // then the role
        factory(\App\Role::class)->create($role)->isAllowedTo($ability['name']);

        // then the user
        $user = factory(\App\User::class)->create();

        // assign the role
        $user->assignRole($role['name']);

        return $user;
    }
}
