<?php

namespace App;

class Client extends \Eloquent
{
    public function translations()
    {
        return $this->hasMany('App\ClientTranslation');
    }
}
