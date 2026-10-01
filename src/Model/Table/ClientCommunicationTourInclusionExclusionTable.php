<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientCommunicationTourInclusionExclusionTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Table name
        $this->setTable('client_communication_tour_inclusion_exclusion');
        $this->setPrimaryKey('id');
        $this->setDisplayField('id');

        // Behaviors
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'modified' => 'always'
                ]
            ]
        ]);

        // Associations
        $this->belongsTo('ClientCommunicationTours', [
            'foreignKey' => 'client_communication_tour_id',
        ]);

        $this->belongsTo('TblsInclusionExclusion', [
            'className' => 'TblsInclusionExclusion',
            'foreignKey' => 'inclusion_exclusion_id',
            'joinType' => 'LEFT',
        ]);
    }

    /* public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('client_communication_tour_id')
            ->allowEmptyFileld('client_communication_tour_id');

        $validator
            ->integer('inclusion_exclusion_id')
            ->allowEmptyString('inclusion_exclusion_id');

        $validator
            ->inList('inc_exc_type', ['inclusion', 'exclusion'])
            ->allowEmptyString('inc_exc_type');

        $validator
            ->integer('order_sequence')
            ->allowEmptyString('order_sequence');

        return $validator;
    } */
}
