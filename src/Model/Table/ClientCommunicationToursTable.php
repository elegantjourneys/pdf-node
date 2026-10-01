<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class ClientCommunicationToursTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communication_tour');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClientCommunications', [
            'foreignKey' => 'client_communication_id',
        ]);

        $this->hasMany('ClientCommunicationTourDayPlans', [
            'foreignKey' => 'client_communication_tour_id',
        ]);
    }
}
