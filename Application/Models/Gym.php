<?php

namespace Application\Models;

use Application\ORM\Entity;

class Gym extends Entity {

    protected $tableName = 'gyms';

    public $id;

    public $name;
}
