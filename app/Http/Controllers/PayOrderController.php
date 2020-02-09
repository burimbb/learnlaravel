<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Notifications\UserWelcome;
use App\Orders\OrderDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PayOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pay)
    {
        $redis = Redis::connection();
        $redis->set('tt', 'tes');
        return $redis->get('tt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {
        $orderDetails->all();

        dd($paymentGateway->charge(500));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Create new public function
     */
    public function payment()
    {
        return \view('payment');
    }

    /**
     * Create new public function
     */
    public function pay(User $user)
    {   
        $user->notify((new UserWelcome())->delay(now()->addMinute()));

        dd("Notification Sent");
    }
}
