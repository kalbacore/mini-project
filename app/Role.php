<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A role may have many abilities.
     */
    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    /**
     * Give a role the ability to.
     */
    public function isAllowedTo($abilities): void
    {
        foreach ((array) $abilities as $ability) {
            $this->abilities()->syncWithoutDetaching(
                Ability::whereName($ability)->firstOrFail()
            );
        }
    }
}
