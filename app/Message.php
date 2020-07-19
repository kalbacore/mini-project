<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function to()
    {
        return User::find($this->user_id)->name;
    }

    public function from()
    {
        return User::find($this->creator_id)->name;
    }
}
