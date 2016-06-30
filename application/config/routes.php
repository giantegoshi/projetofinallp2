<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['admin'] = 'admin/login';
$route['admin/recuperaSenha'] = 'admin/recuperaSenha';

$route['admin/home'] = 'admin/index';
$route['admin/alterarHome'] = 'admin/alterarHome';

$route['admin/sobre'] = 'admin/sobre';
$route['admin/alterarSobre'] = 'admin/alterarSobre';

$route['admin/formacao'] = 'admin/formacao';
$route['admin/alterarFormacao'] = 'admin/alterarFormacao';
$route['admin/inserirFormacao'] = 'admin/inserirFormacao';
$route['admin/deletarFormacao'] = 'admin/deletarFormacao';

$route['admin/trabalho'] = 'admin/trabalho';
$route['admin/alterarTrabalho'] = 'admin/alterarTrabalho';
$route['admin/inserirTrabalho'] = 'admin/inserirTrabalho';
$route['admin/deletarTrabalho'] = 'admin/deletarTrabalho';

$route['admin/contato'] = 'admin/contato';
$route['inserirContato'] = 'principal/inserirContato';
$route['admin/deletarContato'] = 'admin/deletarContato';

$route['admin/usuario'] = 'admin/usuario';
$route['admin/alterarUsuario'] = 'admin/alterarUsuario';


$route['Sobre'] = 'principal/sobre';
$route['Contato'] = 'principal/contato';
$route['Trabalho'] = 'principal/trabalho';
$route['Formacao'] = 'principal/formacao';
$route['PDF'] = 'principal/pdf';
$route['default_controller'] = 'principal/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['test/(:any)'] = 'test/$1';