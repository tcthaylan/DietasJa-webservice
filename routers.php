<?php
global $routes;
$routes = array();

// Users
$routes['users/login']      = '/users/login';		
$routes['users/new'] 	    = '/users/new_record';	
$routes['users/{id}']	    = '/users/view/:id';	
$routes['users/{id}/meals'] = '/users/meals/:id'; 
$routes['users/{id}/foods'] = '/users/foods/:id'; 

// Meals
$routes['meals/new']        = '/meals/new_record';		
$routes['meals/{id}'] 	    = '/meals/view/:id';		

// Foods
$routes['foods/new']        = '/foods/new_record';		
$routes['foods/{id}'] 	    = '/foods/view/:id';	

/*
* ROTAS
* ====================================
* Users
* =======
* users/login 		(POST) 		= adiciona um novo usuário
* users/new 		(POST)   	= cria um novo usuário
* users/{id} 		(GET)   	= informações do usuário {id}
* users/{id}  		(PUT)  		= editar usuário {id}
* users/{id}  		(DELETE)	= excluir usuário {id} 
* users/{id}/meals  (GET)		= refeições do usuário {id}
* users/{id}/foods  (GET)		= alimentos do usuário {id}
* =======
* Meals
* =======
* meals/new					= adiciona uma nova refeição
* meals/{id} (GET)			= informações da refeição {id}
* meals/{id} (PUT)			= edita refeição {id}
* meals/{id} (DELETE)		= deleta refeição {id}
* =======
* Foods
* =======
* foods/new 	(POST)		= adiciona um novo alimento
* foods/{id} 	(GET)		= informações do alimento {id}
* foods/{id} 	(PUT)		= edita alimento {id}
* foods/{id} 	(DELETE)	= deleta alimento {id}
* 
*/