<?php
/**
 * WebApp application container.
 *
 * @copyright Copyright © 2016 [Paul Bloomfield](https://paulbloomfield-uk.github.io).
 * @license   [MIT](https://github.com/paulbloomfield-uk/webapp/LICENSE.md).
**/
namespace WebApp\Controllers;

use WebApp\Controller;
use Symfony\Component\HttpFoundation\Request;

class Controller_thing extends Controller {

// -------------------------------------------------------------------------- PUBLIC METHODS -------
/**
 * Dispatch a request.
 * @return (Response|string) The response.
**/
public function dispatchGet($id, Request $request) {
    return "this is thing " . $id;
}

};
