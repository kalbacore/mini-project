<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user may be assigned many roles.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Assign a new role to the user.
     */
    public function assignRole(string $role): void
    {
        $this->roles()->syncWithoutDetaching(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Assign many new roles to the user.
     */
    public function assignRoles(array $roles): void
    {
        foreach ($roles as $role) {
            $this->assignRole($role);
        }
    }

    /**
     * Get all abilities the usee has.
     */
    public function abilities(): Collection
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    /**
     * Check if the user has a super admin role.
     */
    public function isMasterAdmin(): bool
    {
        return (bool) $this->roles->where('master_admin', true)->first();
    }
}
