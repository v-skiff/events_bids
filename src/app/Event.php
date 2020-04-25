<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function bids() {
        return $this->hasMany('App\Bid');
    }
}
