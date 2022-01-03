<?php

namespace Application\Models;

use Application\ORM\Entity;

class CardHistory extends Entity
{
    protected $tableName = 'card_history';

    public $id;

    public $cardId;
}
