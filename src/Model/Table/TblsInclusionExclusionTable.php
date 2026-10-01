<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TblsInclusionExclusionTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Table name
        $this->setTable('tbls_inclusion_exclusion');
        $this->setPrimaryKey('id');
        $this->setDisplayField('incexcdesc');

        // Associations (optional)
        $this->hasMany('ClientCommunicationTourInclusionExclusion', [
            'foreignKey' => 'inclusion_exclusion_id',
        ]);
    }

    /* public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('incexctype')
            ->requirePresence('incexctype', 'create')
            ->notEmptyString('incexctype');

        $validator
            ->scalar('incexcdesc')
            ->maxLength('incexcdesc', 255)
            ->requirePresence('incexcdesc', 'create')
            ->notEmptyString('incexcdesc');

        $validator
            ->scalar('use_default')
            ->maxLength('use_default', 1)
            ->allowEmptyString('use_default');

        $validator
            ->integer('order_sequence')
            ->allowEmptyString('order_sequence');

        return $validator;
    } */
}
