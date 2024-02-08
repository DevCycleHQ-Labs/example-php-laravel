<?php

use Illuminate\Support\Facades\Route;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $options = new DevCycleOptions();

    $devcycle_client = new DevCycleClient(
        sdkKey: env("DEVCYCLE_SERVER_SDK_KEY"),
        dvcOptions: $options
    );

    $user_data = new DevCycleUser(array(
        "user_id" => "my-user"
    ));

    return view('welcome', compact('user_data', 'devcycle_client'));
});
