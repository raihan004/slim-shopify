<?php 

use Slim\Http\Request;
use Slim\Http\Response;

$app->get("/api/customers",function(Request $request,Response $response,Array $args){
    echo "Hello CUstomer";
});