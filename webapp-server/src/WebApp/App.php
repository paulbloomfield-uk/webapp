<?php
/**
 * WebApp application container.
 *
 * @copyright Copyright © 2016 [Paul Bloomfield](https://paulbloomfield-uk.github.io).
 * @license   [MIT](https://github.com/paulbloomfield-uk/webapp/LICENSE.md).
**/
namespace WebApp;
use Silex\Application as Silex;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

class App {
// -------------------------------------------------------------------------- PRIVATE PROPERTIES ---
/** @var array Instantiated services */
protected $_services = [];

// -------------------------------------------------------------------------- PUBLIC METHODS -------
/**
 * Get a service.
 * @param   string  The name of the service.
 * @return  object  The requested service.
**/
public function __get($name) {
    return $this->_services[$name];
}
/**
 * Dispatch a request.
 * @param   string|null      The resource type from the request path.
 * @param   string|null      The resource id from the request path.
 * @param   Request          The Symfony request object.
 * @return (Response|string) The response.
**/
public function dispatch($type, $id, Request $request) {
    if (null === $type) {
        // request is /
        return (new DefaultController)->dispatch($id, $request);
    } else {
        // get the class for the resource
        $class = $this->getControllerClass($type);
        if (false === $class) {
            // if the class for the resource doesn't exist, use the default path
            if (null === $id) {
                return (new DefaultController)->dispatch($controller, $request);
            } else {
                return $this->silex->abort(404);
            }
        } else {
            return (new $class)->dispatch($id, $request);
        }
    }
}

/**
 * Run the application.
**/
public function run() {
    $silex = new Silex;
    $silex['debug'] = true;
    ErrorHandler::register();
    ExceptionHandler::register();
    $this->_services['silex'] = $silex;
    $silex->match('{type}/{id}', [$this, 'dispatch']);
    $silex->match('{type}', [$this, 'dispatch']);
    $silex->match(null, [$this, 'dispatch']);
    $silex->run();
}

// -------------------------------------------------------------------------- PRIVATE METHODS ------
/**
 * Dispatch a request.
 * @return (Response|string) The response.
**/
protected function getControllerClass($type) {
    try {
        $reflect = new \ReflectionClass(__NAMESPACE__.'\\Controllers\Controller_'.$type);
        return $reflect->getName();
    } catch (\ReflectionException $e) {
        return false;
    }
}

};
