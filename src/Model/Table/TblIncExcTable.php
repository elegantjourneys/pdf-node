<?php
declare(strict_types=1);namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class TblIncExcTable  extends Table{
    public function initialize(array $config): void    {
        parent::initialize($config);        // Table name
        $this->setTable('tbl_inc_exc');
    }
}
