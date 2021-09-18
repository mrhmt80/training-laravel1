<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "setting";

    private $settings = [];


    public function loadAll()
    {
        foreach(Setting::all() as $setting){
            $this->settings[$setting->meta_key] = $setting->meta_value;
        }
    }

    public function array_get($key)
    {
        return $this->array_get($this->settings, $key);
    }

    public function array_get($array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : default;
    }
}
