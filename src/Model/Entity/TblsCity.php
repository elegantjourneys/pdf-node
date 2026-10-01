<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class TblsCity extends Entity
{
    protected $_accessible = [
        'city_name' => true,
        'client_communication_tour_cities' => true,
    ];
}
