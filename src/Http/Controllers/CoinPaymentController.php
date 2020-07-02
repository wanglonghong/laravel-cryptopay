<?php

namespace Wincash\Payment\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class CoinPaymentController extends Controller {
  public function __construct() {
    $this->middleware(config('wincashpay.middleware'));
  }
}
