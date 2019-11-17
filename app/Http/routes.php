<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('test', function () {
    /*
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
    */

    $options = array(
        'cluster' => 'eu',
        'useTLS' => true
    );
    $pusher = new \Pushe(
        'af39e113f3568d47c39d',
        '29870192f9c17745f097',
        '592809',
        $options
    );

    $data['order_id'] = 10;
    $pusher->trigger('orderschannel', 'ordersevent', $data);
    return "notification send";

});
