<?php

use App\Card;
use App\Events\UserReachedNegativePoints;
use App\Jobs\DoSomething;
use App\PostCardSendingService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
    [
        'namespace' => '\Haruncpi\LaravelLogReader\Controllers'],
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

Route::get('/realtimefacades', function () {
    return Apple::publish('my note');
});
