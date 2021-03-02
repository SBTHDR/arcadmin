<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    protected $guarded = ['id'];

    protected function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
