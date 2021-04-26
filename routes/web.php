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
use App\Comment;
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
    $post->save();

    $profile = Profile::where('profile_user_id', '=', Auth::user()->id)->firstOrFail();

    $profile->profile_post_count = $profile->profile_post_count + 1;

    $profile->save();

    return redirect('/my');
});

//поиск пользователя
Route::get('/search', function () {
    $user = new User;
    $user->id = 0;
    $profile = new Profile;
    $profile->profile_id = 0;
    return view('search', ['user' => $user, 'profile'=>$profile]);
});

//ввод пользователя для поиска
Route::post('/search', function (Request $request) {
    $users = User::orderBy('created_at', 'asc')->get();

    foreach ($users as $user) {
        if ($user->name == $request->name) {
            $profile = Profile::where('profile_user_id', '=', $user->id)->firstOrFail();
            return view('search', ['user' => $user, 'profile'=>$profile]);
        }
    }
    $user = new User;
    $user->id = 0;
    $profile = new Profile;
    $profile->profile_id = 0;
    return view('/search', ['user' => $user, 'profile'=>$profile]);
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
    $name = $user->name;
    return view('subProfile', ['posts' => $posts, 'user' => $me, 'name' => $name]);
});

Route::delete('/sub/{sub}', function (Sub $sub) {
    $sub->delete();
    return redirect('/subs');
});

//удаление поста
Route::delete('/postDel/{post}', function (Post $post) {
    $post->delete();

    $profile = Profile::where('profile_user_id', '=', Auth::user()->id)->firstOrFail();

    $profile->profile_post_count = $profile->profile_post_count - 1;

    $profile->save();

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


Route::get('/postView/{post}', function (Post $post) {

    $comments = Comment::select('*')
        ->Join('users', 'comments.comment_user_id', '=', 'users.id')
        ->Join('profile', 'profile.profile_user_id', '=', 'users.id')
        ->where('comments.comment_post_id', $post->post_id)
        ->get();

    return view('postView', ['post' => $post, 'comments'=>$comments]);
});

Route::post('/comment/{post}', function (Post $post, Request $request) {

    $comment = new Comment();
    $comment->comment_user_id = Auth::user()->id;
    $comment->comment_text = $request->text;
    $comment->comment_post_id = $post->post_id;
    $comment->save();


    return redirect('/postView/' . $comment->comment_post_id);
});

Route::delete('/comment/{comment}', function (Comment $comment) {
    if ($comment->comment_user_id == Auth::user()->id){
        $comment->delete();
    }


    return redirect('/postView/' . $comment->comment_post_id);
});

//
Route::get('/list', function () {
    $posts = array();
    $posts1 = Post::orderBy('created_at', 'asc')
        ->where('posts.post_user_id', Auth::user()->id)
        ->get();

    foreach ($posts1 as $post1){
        array_push($posts, $post1);
    }

    $subs = User::select('*')
        ->Join('subscribers', 'subscribers.sub_subscriber_id', '=', 'users.id')
        ->Join('profile', 'profile.profile_user_id', '=', 'users.id')
        ->where('subscribers.sub_author_id', Auth::user()->id)
        ->get();

    foreach ($subs as $sub) {
        $posts2 = Post::orderBy('created_at', 'asc')
            ->where('posts.post_user_id', $sub->sub_subscriber_id)
            ->get();

        foreach ($posts2 as $post2){
            array_push($posts, $post2);
        }

    }

    $posts = collect($posts)->sortByDesc('created_at');


    $me = Profile::orderBy('created_at', 'asc')->where('profile_user_id', Auth::user()->id)->first();
    return view('lenta', ['posts' => $posts, 'me' => $me]);
});


// Auth::routes();
Route::post('/image/upload', 'ImgController@upload')->name('image.upload');

Route::get('/home', 'HomeController@index')->name('home');
