<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionSpeaker extends Model
{
    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(EventSession::class);
    }
}
