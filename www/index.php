<?php
/**
 * Entry point for WebApp application server.
 *
 * @copyright Copyright © 2016 [Paul Bloomfield](https://paulbloomfield-uk.github.io).
 * @license   [MIT](https://github.com/paulbloomfield-uk/webapp/LICENSE.md).
**/
ini_set('display_errors', 1);
// include local settings
require __DIR__.'/../local/webapp-local.php';
// bootstrap the application
require __DIR__.'/../webapp-server/src/bootstrap.php';
