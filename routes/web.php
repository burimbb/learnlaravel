<?php

use App\Card;
use App\Comment;
use App\Events\UserReachedNegativePoints;
use App\Exceptions\PostIsPrivate;
use App\Http\Controllers\PayOrderController;
use App\Jobs\DoSomething;
use App\Mail\OrderShipped;
use App\Newsletter;
use App\PostCardSendingService;
use App\Rules\ThreeCharLength;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

Route::get('/', function () {
    /* dd(Str::partNumber(44454741354)); */
    dd('routeeeeeee');
    dd(Str::prefix(44454741354, 'ABCDE-'));
});

Route::get('/pay', 'PayOrderController@store');

Route::get('/postcards', function (PostCardSendingService $postCardService) {
    $postCardService->hello('Hello, im sending this message to you!!', 'admin@admin.com');
});

Route::get('/facades', function () {
    Card::test('Hello im here in facade', 'hello@world');
});

Route::get('/apples', 'AppleController@show');
Route::get('/pipelines', 'AppleController@index');

Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/update', 'UserController@update');

Route::get('/pay/{pay}', 'PayOrderController@index')->where('pay', '[0-9]+');

Route::get('/send/mail/{user}', 'MailController@store');

Route::get('/payment', 'PayOrderController@payment');
Route::get('/payment/pay/{user}', 'PayOrderController@pay');

Route::get('/vueslot', function () {
    return view('vueslot');
});

Route::get('/carousel', function () {
    return view('carousel');
});

Route::get('/testimonials', function () {
    return view('testimonials');
});

Route::get('/navbar', function () {
    return view('welcome');
});

//shows the support button for showing modal
Route::get('/showmodal', function () {
    return view('showmodal');
});

//adds a message support to database
Route::post('/support', 'SupportFormController@store');

Route::get('/support/partials', 'SupportFormController@partials');

Route::get('/serverfetch', function () {
    return view('serverfetchpage', [
        'cachedPartials' => Cache::get('support-partials'),
    ]);
});

Route::get('/sendallmails', function () {
    $users = User::all();

    foreach ($users as $user) {
        event(new UserReachedNegativePoints($user));
    }
});

Route::get('/download/daily_user_reports_pdf', function () {
    /* $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML(view('pdf.user_reporting_pdf', ['users' => User::all()])->render());
    return $pdf->stream(); */

    $pdf = PDF::loadView('pdf.user_reporting_pdf', ['users' => User::all()]);
    return $pdf->download('daily_user_reports.pdf');

    /* $html = view('pdf.user_reporting_pdf', ['users' => User::all()])->render();
    $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
    return $pdf->download('daily_user_reports.pdf'); */
});

Route::get('/generatepdf', function () {
    return view('pdf.view_users_reporting')->withUsers(User::all());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{user}', function ($user) {
    Auth::loginUsingId($user);
});

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/middleware', function () {
    dd('You have passed this middleware!!!!!!!!!');
})->middleware('isadmin:5');

Route::get('/write', function () {
    $path = storage_path('write.txt');

    $handle = fopen($path, 'w') or die("Can't create file");

    $text = 'Testing Php fwrite';

    fwrite($handle, $text);

    fclose($handle);
});

Route::get('/read', function () {
    $path = storage_path('readwrite\test.txt');

    $handle = fopen($path, 'r');

    echo fread($handle, filesize($path));

    fclose($handle);
});

Route::get('/fileputcontent', function () {
    $path = storage_path('test.txt');
    $path1 = storage_path('test1.txt');

    file_put_contents($path, 'Hello World');
    file_put_contents($path1, 'Hello World', FILE_APPEND);
});

Route::get('/dispatchjob', function () {
    DoSomething::dispatchNow(5);

    dispatch(new DoSomething(10));
});

Route::group(
    ['namespace' => '\Haruncpi\LaravelLogReader\Controllers'],
    function () {
        Route::get(config('laravel-log-reader.view_route_path'), 'LogReaderController@getIndex');
        Route::post(config('laravel-log-reader.view_route_path'), 'LogReaderController@postDelete');
        Route::get(config('laravel-log-reader.api_route_path'), 'LogReaderController@getLogs');
    }
);

Route::get('/turbolink', function () {
    return view('turbolink');
});

Route::get('/useguzzle', 'UseGuzzle@index');

Route::get('/jsonencode', function () {
    $arr = [
        'name' => 'burim',
        'email' => 'burim@bushi'
    ];

    $encoded = json_encode($arr);
    dump('Encoded array!');
    dump($encoded);

    dump('After Decoded that json!');

    $decoded = json_decode($encoded);
    dump($decoded);
    dump(config());
    dump('Name of object: ' . $decoded->name);
});

Route::get('/getcontent/{file}', function ($file = '/') {
    dump(base_path($file));
    dump(__DIR__ . ($file));
});

Route::get('/testingbranch', function () {
    return 'hello from branching';
});

Route::get('/firstcommit', function () {
    return 'hello from branching';
});

Route::get('/secondcommit', function () {
    return 'hello from branching';
});

Route::get('/tasks', function () {
    return view('tasks');
});

Route::get('/filefinder', function () {
    $files = Finder::create()
        ->files()
        ->name('*.test')
        ->in(base_path('/storage'));

    foreach ($files as $file) {
        dump(file_get_contents($file));

        dump($file->getPathName());
        dump($file->getRealPath());
        dump((new SplFileInfo($file))->getPath());
    }
});

Route::get('/unlinkfiles', function () {
    $files = Finder::create()
        ->files()
        ->in(base_path('/storage'))
        ->name('*.test');

    foreach ($files as $file) {
        unlink($file->getPathName());
    }
});

Route::get('/page', function () {
    return view('mypage');
});

Route::post('/pagepost', function () {
    return 'You typed ' . request()->name;
});

/* -------------------------------------------------- */
/* Passport routes exepts in authprovider routes */
//Create edit passport page
Route::get('/passport', function () {
    return view('passport.index');
});
/* -------------------------------------------------- */
Route::get('/web/passport', function () {
    return view('passport.test');
});
/* -------------------------------------------------- */
/* Routes that will be in your site ex. consumer.dev */
/* Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => '1',
        'redirect_uri' => 'http://laravel6.test/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://learnlaravel.test/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://learnlaravel.test/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '1',
            'client_secret' => 'iiyEuBM0GZUXjPkXFm0m6ZIiDNn2WK2U9HUBBMBp',
            'redirect_uri' => 'http://laravel6.test/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
}); */
/* -------------------------------------------------- */

Route::get('/form', function () {
    return view('form');
});

Route::post('/form', function () {
    return request()->all();
})->name('form.post');

use Facades\App\Apple;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\LazyCollection;

Route::get('/realtimefacades', function () {
    return Apple::publish('my note');
});

//-------------------Whats new in Laravel 6---------------------
Route::get('/lazycollection', function () {
    DB::listen(function ($query) {
        dump($query);
    });

    $users = User::cursor();

    //when calling first than will be excecuted a query
    /* dump($users->first()); */
    dump($users->first());

    return 'done';
});

/**
 * Create new public function
 */
function readFromFile($path)
{
    $file = fopen($path, 'r');

    while ($line = fgets($file)) {
        yield $line;
    }
}

Route::get('/generator/readfromfile', function () {
    $path = storage_path('logs/laravel-2020-04-07.log');

    foreach (readFromFile($path) as $line) {
        dump($line);
    }

    return 'done';
});

Route::get('/lazy/readfromfile', function () {
    LazyCollection::make(function () {
        $path = storage_path('logs/laravel-2020-04-07.log');
        $file = fopen($path, 'r');

        while ($line = fgets($file)) {
            yield $line;
        }
    })
    ->each(function ($line) {
        dump($line);
    });

    return 'done';
});

//Subquery
Route::get('/subquery', function () {
    /* DB::listen(function ($query) {
        dump($query);
    }); */

    return User::orderBy(function ($query) {
        $query->select('created_at')
            ->from('adjustments')
            ->latest()
            ->whereColumn('user_id', 'users.id')
            ->limit(1);
    })->find([1, 2]);

    return User::addSelect(['last_adjustment' => function ($query) {
        $query->select('id')
            ->from('adjustments')
            ->whereColumn('user_id', 'users.id')
            ->limit(1)
            ->latest();
    }])->find([1, 2]);
});

//Password Reconfirm to any route you want
Route::get('/want/passwordconfirm', function () {
    dump(session('auth'));
    /* dump(app('session')->forget(array_keys(session('auth'))[0]));  //not working */
    return 'Done';
})->middleware('password.confirm');

//if not want to define routes of confirmation
/* Auth::routes(['confirm' => false]); */
/* Auth::routes(['reset' => false]); */

Route::get('/withoutoptimizedquery', function () {
    return view('queries.index', [
        'users' => User::all(),
    ]);
});

Route::get('/optimizedquery', function () {
    return view('queries.optimized', [
        'users' => User::with('comments')->get(), //optimized
    ]);
});

Route::get('/bigoptimizedquery', function () {
    /* DB::listen(function ($query) {
        dump($query);
    }); */

    return view('queries.bigoptimized', [
        'users' => User::query()
                    ->addSelect(['last_comment' => Comment::select('created_at')
                            ->whereColumn('commentable_id', 'users.id')
                            ->latest()
                            ->take(1)
                    ])->get(), // big optimized
    ]);
});

//-------------------Whats new in Laravel 5.8---------------------
//Autodiscovery Policy
/* Auth::loginUsingId(1); //If you have no seed please remove this to add seeds */
Route::get('/comments/{comment}', function (Comment $comment) {
    return $comment;
})->middleware('can:view,comment');

Route::get('/comments/{comment}/update', 'CommentController@update');

//Cache ttl in seconds
Route::get('cache', function () {
    return Cache::remember('Hello', 20, function () {
        return [1, 2, 3];
    });
});

Route::get('getcache', function () {
    return Cache::get('Hello');
});

//Mocking in testing
Route::get('/newsletter', function (Newsletter $newsletter) {
    $newsletter->subscribeTo('members', auth()->user());

    return 'Done';
})->middleware('auth');

//event auto discovery
Route::get('/register-a-user', function () {
    $user = factory('App\User')->create();

    return $user;
});

//-------------------Whats new in Laravel 5.7---------------------
//must verify middleware
Auth::routes(['verify' => true]);

Route::get('/mustverify', function () {
    return 'You are verified!!';
})->middleware('verified');

//Added XRay Package for viewing blades on front end for bigger projects

//Dump server package

Route::get('/actions', function () {
    return action([PayOrderController::class, 'store']); //new 5.7

    return action('PayOrderController@store'); //older
});

//-------------------Whats new in Laravel 5.6---------------------
Route::get('/casting', function () {
    return User::find(2);
});

Route::get('/slack-logging', function () {
    Log::critical('Something has gone wrong!!. Check it out.');
    Log::stack(['monthly, slack'])->critical('Monthly has gone wrong!!. Check it out.');

    return 'Logged!.';
});

/* Auth::loginUsingId(1); */
Route::middleware('throttle:rate_limit,1')->get('/dynamic-rate-limiting', function () {
    return 'Hello World!';
});

Route::get('/logoutOtherDevices', function () {
    Auth::logoutOtherDevices('admin1234');

    return back();
});

//create api controllers ex.FooController

//-------------------Whats new in Laravel 5.5---------------------

//validate data from request $validated = $request->validate();
//added migrate:fresh drop all tables without rollback and rerun migration

//Laravel package autodisovery serviceproviders and aliases

Route::get('/laracast-flash', function () {
    flash('Hello world qkemii');

    /* dd(session()->all()); */

    return view('flashexample');
});

//if you want to make a class that renders only need to implement renderable
class TestRenderable implements Renderable
{
    /**
     * Create new public function
     */
    public function render()
    {
        return '<h2>Hello World</h2>';
    }
}

Route::get('/testmailable', function () {
    return new TestRenderable;

    return new OrderShipped(User::first());
});

//custom rules
Route::get('/testrule', function(){
    return view('testrule');
});
Route::post('/testrule', function(Request $request){
    /* $request->validate([
        'name' => 'required|min:3'
    ]); */
    
    $request->validate([
        'name' => ['required', new ThreeCharLength]
    ]);

    return back();
});

//dump on collections
Route::get('/dumpcollection', function(){
    $users = User::all();

    return $users->shuffle()
        ->dump()
        ->filter(function($user){
            return $user->id < 10;
        })
        ->dump()
        ->pluck('name')
        ->dump();
});

//make factories for generating data for models

Route::get('/custom-blade-directive', function(){
    return view('custom-blade');
});

//commands autodiscovery

Route::get('/tapfunction', function(){
    return tap(1, function($number){
        return $number == 2;
    });
});

//@auth and @guest blade directive added

//custom route helpers
Route::redirect('/me', '/home');
Route::view('/cblade', 'custom-blade');

Route::get('/bubleexception', function(){
    throw new PostIsPrivate();
});

//optional function optional();



//-------------------Whats new in Laravel---------------------
