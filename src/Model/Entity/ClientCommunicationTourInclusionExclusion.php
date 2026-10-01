<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class ClientCommunicationTourInclusionExclusion extends Entity
{
    protected $_accessible = [
        'client_communication_tour_id' => true,
        'inclusion_exclusion_id' => true,
        'inc_exc_type' => true,
        'order_sequence' => true,
        'modified' => true,
        'client_communication_tours' => true,
        'tbls_inclusion_exclusion' => true,
    ];
}
