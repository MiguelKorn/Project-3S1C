<?php

namespace App;

class Project extends \Eloquent
{
    public function translations()
    {
        return $this->hasMany('App\ProjectTranslation');
    }
}
