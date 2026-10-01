<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TblsCityTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Table name
        $this->setTable('tbls_city');
        $this->setPrimaryKey('id');
        $this->setDisplayField('city_name');

        // Associations
        $this->hasMany('ClientCommunicationTourCities', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('ClientCommunicationTourDayPlans', [
            'foreignKey' => 'city_id'
        ]);
    }

   /*  public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('city_name')
            ->maxLength('city_name', 255)
            ->requirePresence('city_name', 'create')
            ->notEmptyString('city_name');

        return $validator;
    } */
}
