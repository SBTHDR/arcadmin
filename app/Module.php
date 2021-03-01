<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
