<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\ComList;
use App\Post;
use App\Profile;
use App\Sub;
use App\User;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


// Route::group(['middleware' => ['web']], function () {

//     Route::get('/', function () {
//         return view('welcome');
//     })->middleware('guest');

//     Route::get('/tasks', 'TaskController@index');
//     Route::post('/task', 'TaskController@store');
//     Route::delete('/task/{task}', 'TaskController@destroy');

//     Route::auth();

// });

// Маршруты аутентификации...
/**
 * Маршруты аутентификации
 */
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('auth');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

/**
 * Маршруты регистрации
 */
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::auth();

Route::get('/menu', function () {
    return view('menu');
});


//подписки
Route::get('/subs', function () {
    $subs = User::select('*')
        ->Join('subscribers', 'subscribers.sub_subscriber_id', '=', 'users.id')
        ->Join('profile', 'profile.profile_user_id', '=', 'users.id')
        ->where('subscribers.sub_author_id', Auth::user()->id)
        ->get();
    return view('subs', ['subs' => $subs]);
});

//мои посты
Route::get('/my', function () {
    $posts = Post::orderBy('created_at', 'asc')
        ->where('posts.post_user_id', Auth::user()->id)
        ->get();
    return view('my', ['posts' => $posts]);
});

//мои посты добавить пост
Route::post('/post', function (Request $request) {
    $comList = new ComList;
    $comList->save();


    $post = new Post;
    $post->post_name = $request->name;
    $post->post_text = $request->text;
    $post->post_user_id = Auth::user()->id;
    $post->post_com_list_id = $comList->com_lists_id;
    $post->save();

    return redirect('/my');
});

//поиск пользователя
Route::get('/search', function () {
    $user = new User;
    $user->id = 0;
    return view('search', ['user' => $user]);
});

//ввод пользователя для поиска
Route::post('/search', function (Request $request) {
    $users = User::orderBy('created_at', 'asc')->get();

    foreach ($users as $user) {
        if ($user->name == $request->name) {
            return view('search', ['user' => $user]);
        }
    }
    $user = new User;
    $user->id = 0;
    return view('/search', ['user' => $user]);
});

//подписка
Route::post('/subs', function (Request $request) {
    $sub = new Sub;
    $sub->sub_author_id = Auth::user()->id;
    $sub->sub_subscriber_id = $request->id;
    $sub->save();
    return redirect('/menu');
});

//мой профиль
Route::get('/myProfile', function () {
    $posts = Post::orderBy('created_at', 'asc')
        ->where('posts.post_user_id', Auth::user()->id)
        ->get();

    $me = Profile::orderBy('created_at', 'asc')->where('profile_user_id', Auth::user()->id)->first();
    return view('myProfile', ['posts' => $posts, 'me' => $me]);
});

Route::get('/myProfileEdit', function () {
    $me = Profile::orderBy('created_at', 'asc')->where('profile_user_id', Auth::user()->id)->first();
    return view('myProfileEdit', ['me' => $me]);
});

//изменение профиля
Route::post('/myProfileEdit', function (Request $request) {
    $users = User::orderBy('created_at', 'asc')->get();

    foreach ($users as $user) {
        if ($user->name == $request->name) {
            return view('search', ['user' => $user]);
        }
    }
    $user = new User;
    $user->id = 0;
    return view('/search', ['user' => $user]);
});

//просмотр чужого профиля
Route::get('/subProfile/{user}', function (User $user) {
    $posts = Post::orderBy('created_at', 'asc')
        ->where('posts.post_user_id', $user->id)
        ->get();

    $me = Profile::orderBy('created_at', 'asc')->where('profile_user_id', $user->id)->first();
    return view('subProfile', ['posts' => $posts, 'user' => $me]);
});

//удаление поста
Route::delete('/postDel/{post}', function (Post $post) {
    $post->delete();

    return redirect('/my');
});

//изменение поста
Route::get('/postEdit/{post}', function (Post $post) {

    return view('postEdit', ['post' => $post]);
});

Route::post('/postEdit/{post}', function (Post $post, Request $request) {

//    $post->update([
//        'post_name' => $request->name,
//        'post_text' => $request->text,
//    ]);

    $post2 = Post::orderBy('created_at', 'asc')->where('post_id', $post->post_id)->first();

    $post2->update([
        'post_name' => $request->name,
        'post_text' => $request->text,
    ]);

    return redirect('/my');
});


// Auth::routes();
Route::post('/image/upload', 'ImgController@upload')->name('image.upload');

Route::get('/home', 'HomeController@index')->name('home');
