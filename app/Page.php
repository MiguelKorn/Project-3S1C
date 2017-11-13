<?php

namespace App;

class Page extends \Eloquent
{
    public function tabs()
    {
        return $this->hasMany('App\Tab');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
