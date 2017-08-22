<?php

$versiSatu = "../routes/versiSatu";

$routes = [];
foreach (glob("{$versiSatu}/*.php") as $filename) {
    $route = require($filename);
    $routes = array_merge($routes, $route);
}

return $routes;