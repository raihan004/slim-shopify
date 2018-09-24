<?php
    useSlimHttpRequest;
    useSlimHttpResponse;

    // Routes

    $app->get("/products", function(Request $request, Response $response, array $args) {
        $api  = new ShopifyClient('98c97f22e3fd8005a651dbb245a609c6', '', 'mgp-paris.myshopify.com/admin', '2aa80ae737b94ba9a9f031936d91f9a1');
        $data = $api->call('products.json?limit=2&page=12', 'GET');
        $response->getBody()->write($data);
        return $response;
    });
    $app->get("/products/create", function(Request $request, Response $response, array $args) {
        $api     = new ShopifyClient('98c97f22e3fd8005a651dbb245a609c6', '', 'mgp-paris.myshopify.com/admin', '2aa80ae737b94ba9a9f031936d91f9a1');
        $product = array(
            'product' => array(
                "title" => "New product title"
            )
        );
        $data    = $api->call("products.json", 'POST', $product);
        $response->getBody()->write($data);
        return $response;
    });
    $app->get("/products/{id}", function(Request $request, Response $response, array $args) {
        $id   = $request->getAttribute('id');
        $api  = new ShopifyClient('98c97f22e3fd8005a651dbb245a609c6', '', 'mgp-paris.myshopify.com/admin', '2aa80ae737b94ba9a9f031936d91f9a1');
        $data = $api->call("products/$id.json", 'GET');
        $response->getBody()->write($data);
        return $response;
    });
    $app->get("/products/{id}/update", function(Request $request, Response $response, array $args) {
        $id      = $request->getAttribute('id');
        $api     = new ShopifyClient('98c97f22e3fd8005a651dbb245a609c6', '', 'mgp-paris.myshopify.com/admin', '2aa80ae737b94ba9a9f031936d91f9a1');
        $product = array(
            'product' => array(
                "id" => $id,
                "title" => "New product title"
            )
        );
        $data    = $api->call("products/$id.json", 'PUT', $product);
        $response->getBody()->write($data);
        return $response;
    });
    $app->get("/products/{id}/delete", function(Request $request, Response $response, array $args) {
        $id   = $request->getAttribute('id');
        $api  = new ShopifyClient('98c97f22e3fd8005a651dbb245a609c6', '', 'mgp-paris.myshopify.com/admin', '2aa80ae737b94ba9a9f031936d91f9a1');
        $data = $api->call("products/$id.json", 'DELETE');
        $response->getBody()->write($data);
        return $response;
    });