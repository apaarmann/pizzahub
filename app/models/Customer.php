<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class Customer extends Eloquent implements UserInterface {

    use UserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
}
