<?php

use Illuminate\Support\Facades\Route;
use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;
use GuzzleHttp\Client as GuzzleClient;

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

    // Configure API key authorization: bearerAuth
    $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey(
        "Authorization",
        env("DEVCYCLE_SERVER_SDK_KEY")
    );

    $devcycle_client = new DevCycleClient(
        $config,
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleClient(),
    );

    $user_data = new DevCycleUser(array(
        "user_id" => "my-user"
    ));

    return view('welcome', compact('user_data', 'devcycle_client'));
});
