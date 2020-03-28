<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Define routes. */
Router::any('', 'Controllers\Welcome@index');
Router::any('home', 'Controllers\Welcome@index');
Router::any('subpage', 'Controllers\Welcome@subPage');
Router::any('blog', 'Controllers\Common\Common@blog');
Router::any('company', 'Controllers\Common\Common@company');
Router::any('press', 'Controllers\Common\Common@company');
Router::any('career', 'Controllers\Common\Common@company');
Router::any('support', 'Controllers\Common\Common@company');
Router::any('request_quote', 'Controllers\Common\Common@send_quote_request_email');
Router::any('hotel', 'Controllers\Common\Common@hotel');


 
/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
