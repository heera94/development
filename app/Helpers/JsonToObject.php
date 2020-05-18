<?php

namespace App\Helpers;

class JsonToObject
{
    public function __construct($json = false) {
        if ($json) $this->set(json_decode($json, true));
    }

    public function set($data) {
        foreach ($data AS $key => $value) {
            if (is_array($value)) {
                $sub = new JsonToObject;
                $sub->set($value);
                $value = $sub;
            }
            $this->{$key} = $value;
        }
    }
}
