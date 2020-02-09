<?php

use App\Card;
use App\Events\UserReachedNegativePoints;
use App\PostCardSendingService;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
