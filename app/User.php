<?php

namespace App;

use App\Item;

class User extends Item
{
    protected $table = "users";

    /**
     *
     *   This an other object type models were intended to extend the Item class
     *  to restrict relations between objects, so a device can only be connected
     *  to an User or a Server, but not directly to an Endpoint, for instance.
     *
     */
}
