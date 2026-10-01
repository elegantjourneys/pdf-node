<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class ClientCommunicationTourDayPlansTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communication_tour_day_plans');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClientCommunicationTours', [
            'foreignKey' => 'client_communication_tour_id',
        ]);

        $this->hasMany('ClientCommunicationTourDayPlanDescriptions', [
            'foreignKey' => 'client_communication_tour_day_plan_id',
        ]);
        $this->belongsTo('TblsCity', [
            'foreignKey' => 'city_id',
        ]);
    }
}
