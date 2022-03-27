<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\ClasificacionController;
use Controllers\PaginasController;
 
$router = New Router();

//Zona privada para administradores
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/clasificaciones/crear', [ClasificacionController::class, 'crear']);
$router->post('/clasificaciones/crear', [ClasificacionController::class, 'crear']);
$router->get('/clasificaciones/actualizar', [ClasificacionController::class, 'actualizar']);
$router->post('/clasificaciones/actualizar', [ClasificacionController::class, 'actualizar']);
$router->post('/clasificaciones/eliminar', [ClasificacionController::class, 'eliminar']);

//Zona publica para visitantes
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/carta', [PaginasController::class, 'carta']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();