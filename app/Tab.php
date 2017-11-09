<?php

namespace App;

class Tab extends \Eloquent
{
    public function translations() {
        return $this->hasMany('App\TabTranslation');
    }
}
