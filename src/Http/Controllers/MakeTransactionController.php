<?php

namespace Wincash\Payment\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Wincash\Payment\Helpers\WincashpayHelper;

class MakeTransactionController extends CoinPaymentController {

    protected $helper;

    public function __construct(WincashpayHelper $helper) {
        parent::__construct();
        $this->helper = $helper;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('wincashpay::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($payload) {
        try{
            $this->arraychekc($payload);
            $data['payload'] = $payload;
            return view('wincashpay::transaction.make.show', $data);
        }catch(Exception $e) {
            return response($e->getMessage(), 500);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('wincashpay::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    protected function arraychekc($payload) {
        $array = $this->helper->getrawtransaction($payload);
        if(empty($array['amountTotal'])){
            throw new Exception('Oops!, index [amountTotal] not found!');
        }
        if(empty($array['note'])){
            throw new Exception('Oops!, index [note] not found!');
        }
        if(empty($array['items'])){
            throw new Exception('Oops!, index [items] not found!');
        }
    }
}
