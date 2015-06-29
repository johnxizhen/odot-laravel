<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
  $data = [
      "name" => "John", 
      "email" => "johnxizhen@hotmail.com",
      "location" => "Vancouver",
      "last_name" => "Li"
      ];
	// return View::make("hello", array("name" => "friend"));
  return View::make("hello")->withData($data);
});
 */


/* Route::get('/hello/{name?}', function($name = "World")
{
	// return View::make("hello", array("name" => "friend"));
  // return View::make("hello")->with("name",$name);
  return View::make("hello")->withData($data);
});
 */


/*
 * / = home
 * /todos - all lists
 * /todos/1 - show
 * /todos/1/edit - edit and update
 * /todos/create - create new list
 */

Route::get('/', 'TodoListController@index');
Route::resource('todos', 'TodoListController');
Route::resource('todos.items', 'TodoItemController', ['except' => ['index', 'show']]);
Route::patch('/todos/{todos}/items/{items}/complete', 
             ['as' => 'todos.items.complete', 'uses' => 'TodoItemController@complete']);

//Event::listen('illuminate.query', function($query){
//    var_dump($query);
//});
