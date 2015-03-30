<?php
namespace TicketSystem\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use TicketSystem\Model\Table\AppTable as Table;
use Cake\Validation\Validator;
use TicketSystem\Model\Entity\Status;

/**
 * Statuses Model
 */
class StatusesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('statuses');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Tickets', [
            'foreignKey' => 'status_id',
            'className' => 'TicketSystem.Tickets'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('priority', 'valid', ['rule' => 'numeric'])
            ->requirePresence('priority', 'create')
            ->notEmpty('priority');

        return $validator;
    }
}
