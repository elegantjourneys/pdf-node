<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientCommunicationTourCitiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communication_tour_cities');
        $this->setPrimaryKey('id');

        // Associations
        $this->belongsTo('ClientCommunications', [
            'foreignKey' => 'client_communication_id',
        ]);

        $this->belongsTo('ClientCommunicationTour', [
            'foreignKey' => 'client_communication_tour_id',
        ]);

        $this->belongsTo('TblsCity', [
            'foreignKey' => 'city_id',
        ]);
    }

    
}
