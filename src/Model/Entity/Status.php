<?php
namespace TicketSystem\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity.
 */
class Status extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'priority' => true,
        'tickets' => true,
    ];
}
