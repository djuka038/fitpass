<?php

namespace Application\Models;

use Application\ORM\Entity;

class User extends Entity {

    protected $tableName = 'users';

    public $id;

    public $name;

    public $surname;
}
