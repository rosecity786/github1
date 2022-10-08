<?php


use App\Models\Post;

use App\Models\User;
use Spatie\Emoji\Emoji;
use Spatie\Glide\GlideImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\SEOMeta;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Mailgun\Mailgun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/user1', [\App\Http\Controllers\queueController::class, 'index']);

Route::get('/', function () {

    $mg = Mailgun::create('key-example'); // For US servers

    $mg->messages()->send('example.com', [
        'from'    => 'imran.khaliq052@gmail.com',
        'to'      => 'imran.khaliq052@gmail.com',
        'subject' => 'The PHP SDK is awesome!',
        'text'    => 'It is so simple to send a message.'
      ]);
      return "done";
});
Route::mailPreview();
Route::resource('user', \App\Http\Controllers\UserController::class);

Route::resource('post', App\Http\Controllers\PostController::class)->only('index', 'store');

