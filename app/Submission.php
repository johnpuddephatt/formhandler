<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
  protected $fillable = ['_after','name','email','_subject','cc','bcc','message'];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
