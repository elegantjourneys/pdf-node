<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class TblsInclusionExclusion extends Entity
{
    protected $_accessible = [
        'incexctype' => true,
        'incexcdesc' => true,
        'use_default' => true,
        'order_sequence' => true,
        'client_communication_tour_inclusion_exclusion' => true,
    ];
}
