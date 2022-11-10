<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branch_store";

    public function user() {
        return $this->hasMany('App\Models\User');
    }
}
