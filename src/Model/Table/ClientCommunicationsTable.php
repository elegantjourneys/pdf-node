<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientCommunicationsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('client_communications');
        $this->setPrimaryKey('id');
        $this->setDisplayField('id');

        $this->hasMany('ClientCommunicationHotels', [
            'foreignKey' => 'client_communication_id',
        ]);

        $this->hasMany('ClientCommunicationHotelGroups', [
            'foreignKey' => 'client_communication_id',
        ]);

        $this->hasMany('ClientCommunicationTours', [
            'foreignKey' => 'client_communication_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator->allowEmptyString('system_comment');
        $validator->allowEmptyString('user_comment');

        return $validator;
    }
}
