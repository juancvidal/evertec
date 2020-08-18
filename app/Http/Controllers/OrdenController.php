<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{

    protected $placetopay;

    public function __construct()
    {
        $this->placetopay = new PlacetoPay([
            'login' => \config('pay.login'),
            'tranKey' => \config('pay.trankey'),
            'url' => \config('pay.url'),
            'rest' => [
                'timeout' => 45, // (optional) 15 by default
                'connect_timeout' => 30, // (optional) 5 by default
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')->paginate(10);
        echo 'ordenes';
        return view('orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        request()->validate([
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_email' => 'required|email',
            'customer_mobile' => 'required'
        ]);


        try {
            $reference = 'TEST_' . time();
            $requestPay = setJsonRequest(
                request('customer_name'),
                request('customer_email'),
                request('customer_address'),
                request('customer_mobile'),
                $reference
            );
            $response = $this->placetopay->request($requestPay);

            if ($response->isSuccessful()) {
                $order = Orders::create(
                    array_merge(
                        $request->all(),
                        [
                            'status' => 'CREATED',
                            'request_id' => $response->requestId,
                            'process_url' => $response->processUrl,
                            'total' => 50000,
                            'reference' => $reference
                        ]
                    )
                );
                return view('resumen', compact('order'));
            } else {
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the specified state in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function state($reference)
    {
        $order = Orders::where('reference', $reference)->first();
        $response = $this->placetopay->query($order->request_id);

        if ($response->isSuccessful()) {
            $order->status = $response->status()->status();
            $order->save();
        } else {
            // There was some error with the connection so check the message
            print_r($response->status()->message() . "\n");
        }
        return view('state', compact('order'));
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
}
