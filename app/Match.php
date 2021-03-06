<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Match extends Model {
    protected $fillable = [
      'sport_id', 'nplayers', 'date', 'place', 'comment', 'user_id', 'photo'
    ];

    public function user() {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sport() {
      return $this->belongsTo(Sport::class, 'sport_id', 'id');
    }

}
