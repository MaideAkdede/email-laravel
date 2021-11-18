<?php

use App\Events\CommentPosted;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/comment', function () {
    $comment = new Comment();
    $comment->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium adipisci aperiam aspernatur excepturi ipsam, magnam maiores omnis possimus quidem quisquam reiciendis veniam voluptate. Accusantium commodi ducimus pariatur praesentium vel!';
    $start = microtime(true);

    //émettre l'évenement 'un nvx comm a été créer et envoyer email de ça à l'admin
    CommentPosted::dispatch($comment);
    $end = microtime(true);
    return $end - $start;
});
