<?php

use Tonis\Router\Collection;

return function (Collection $routes) {
    $routes->get('/foo', 'handler');
};