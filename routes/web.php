<?php



use App\Http\Controllers;
use App\Http\Controllers\AuthController;


/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

    
    /********* Begining of Role routes ********/

    
        // $router->post('login', 'AuthController@login');
        // $router->post('logout', 'AuthController@logout');
        // $router->post('refresh', 'AuthController@refresh');
        // $router->post('user-profile', 'AuthController@me');
    

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->post('logout', 'AuthController@logout');


//$router->group(['middleware' => 'createRole:1'], function () use ($router) {

$router->get('/roles', 'RoleController@index');
$router->get('/roles/{id}', 'RoleController@show');
$router->post('/roles/create', 'RoleController@store');
$router->post('/roles/update/{id}', 'RoleController@update');
$router->delete('/roles/delete/{id}', 'RoleController@destroy');
//});

    /********* end of Role routes ******* */
    
$router->get('/organizations', 'OrganizationController@index');
$router->get('/organizations/{id}', 'OrganizationController@show');
$router->post('/organizations/create', 'OrganizationController@store');
$router->post('/organizations/update/{id}', 'OrganizationController@update');
$router->delete('/organizations/delete/{id}', 'OrganizationController@destroy');

    
    /********* Begining of Permission routes ********/
    
$router->get('/permissions', 'Permissioncontroller@index');
$router->get('/permissions/{id}', 'Permissioncontroller@show');
$router->post('/permissions/create', 'Permissioncontroller@store');
$router->post('/permissions/update/{id}', 'Permissioncontroller@update');
$router->delete('/permissions/delete/{id}', 'Permissioncontroller@destroy');

    /********* end of Permission routes ******* */

$router->get('/', function () use ($router) {
    return $router->app->version();
});
