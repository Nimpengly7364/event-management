<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

protected $fillable = [
        'event_id',
        'user_id',
        'name',
        'email',
    ];
    public function event()
{
    return $this->belongsTo(Event::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
