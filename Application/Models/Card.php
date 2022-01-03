<?php

namespace Application\Models;

use Application\ORM\Entity;

class Card extends Entity
{
    protected $tableName = 'cards';

    public $id;

    public $userId;

    public $gymId;
}
