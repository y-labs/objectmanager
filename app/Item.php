<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public const ITEM_TYPE_ARRAY = array('USER', 'DEVICE', 'SERVER', 'ENDPOINT');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function __toString()
    {
        return "'" . $this->name . "' (" . $this->type . ")";
    }
}
