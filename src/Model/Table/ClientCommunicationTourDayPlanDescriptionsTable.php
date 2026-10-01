<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class ClientCommunicationTourDayPlanDescriptionsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communication_tour_day_plan_descriptions');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClientCommunicationTourDayPlans', [
            'foreignKey' => 'client_communication_tour_day_plan_id',
        ]);
    }
}
