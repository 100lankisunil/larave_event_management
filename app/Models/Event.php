<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function sessions()
    {
        return $this->hasMany(EventSession::class);
    }
}
