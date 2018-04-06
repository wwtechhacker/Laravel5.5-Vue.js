<?php

namespace App;

use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole
{
    //

    static function findName($name)
    {
        return static::where('name', $name)->first();

    }
}
