<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class ClientCommunicationHotelsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communication_hotel');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClientCommunications', [
            'foreignKey' => 'client_communication_id',
        ]);

        $this->belongsTo('ClientCommunicationHotelGroups', [
            'foreignKey' => 'client_communication_hotel_group_id',
        ]);
    }
}
