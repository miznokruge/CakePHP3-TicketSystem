<?php
namespace TicketSystem\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity.
 */
class Ticket extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status_id' => true,
        'user_id' => true,
        'title' => true,
        'content' => true,
        'status' => true,
        'user' => true,
    ];
}
