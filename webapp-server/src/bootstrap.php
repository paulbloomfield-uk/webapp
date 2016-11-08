<?php
/**
 * Bootstrap WebApp application server.
 *
 * @copyright Copyright © 2016 [Paul Bloomfield](https://paulbloomfield-uk.github.io).
 * @license   [MIT](https://github.com/paulbloomfield-uk/webapp/LICENSE.md).
**/

// the application namespace
namespace WebApp;

// register the Composer autoloader
$loader = require __DIR__.'/../vendor/autoload.php';

// register the application namespace
$loader->setPsr4(__NAMESPACE__.'\\', __DIR__.DIRECTORY_SEPARATOR.__NAMESPACE__);

(new App())->run();
