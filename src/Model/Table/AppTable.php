<?php
namespace TicketSystem\Model\Table;

use Cake\Core\Configure;
use Cake\ORM\Table;

/**
 * App Model
 */
class AppTable extends Table
{
    protected $app_config;

    public function initialize(array $config)
    {
        $this->app_config = Configure::read('TicketSystem');
        if(!$this->app_config){
            throw new \InvalidArgumentException('You must provide a TicketSystem configuration.');
        }
        $required_keys = ['user_table', 'user_display'];

        foreach($required_keys as $key){
            if(!isset($this->app_config[$key]) || empty($this->app_config[$key])){
                throw new \InvalidArgumentException('You must provide a TicketSystem-'.$key.' key configuration.');
            }
        }

    }
}