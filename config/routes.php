<?php
use Cake\Routing\Router;

Router::plugin('TicketSystem', function ($routes) {
    $routes->fallbacks();
});
