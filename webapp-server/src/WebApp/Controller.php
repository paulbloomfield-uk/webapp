<?php
/**
 * WebApp application container.
 *
 * @copyright Copyright © 2016 [Paul Bloomfield](https://paulbloomfield-uk.github.io).
 * @license   [MIT](https://github.com/paulbloomfield-uk/webapp/LICENSE.md).
**/
namespace WebApp;

use Symfony\Component\HttpFoundation\Request;

class Controller {
// -------------------------------------------------------------------------- PUBLIC METHODS -------
/**
 * Handle a request.
 *
 * @param  Request           Symfony request object.
 * @param  string            Resource id from the request path.
 * @return (Response|string) The response.
**/
public function dispatch($id, Request $request) {
    $method = 'dispatch' . ucfirst(strtolower($request->getMethod()));
    return $this->$method($id, $request);
}

};
