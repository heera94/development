<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    public static function getStatus()
    {
        return [
            ['1' => 'Active'],
            ['0' => 'Inactive']
        ];
    }
}
