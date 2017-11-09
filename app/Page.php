<?php

namespace App;

class Page extends \Eloquent
{
    public function tabs()
    {
        return $this->hasMany('App\Tab');
    }
}
