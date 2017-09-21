<?php

/**
 * @SWG\Parameter(
 *      description="ID of data",
 *      format="int64",
 *      in="path",
 *      name="id",
 *      required=true,
 *      type="integer"
 * )
 */

$versiSatu = "../routes/versiSatu";

$routes = [];
foreach (glob("{$versiSatu}/*.php") as $filename) {
    $route = require($filename);
    $routes = array_merge($routes, $route);
}

return $routes;