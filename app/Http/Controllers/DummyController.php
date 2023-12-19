<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DummyController extends Controller
{
    //
    public function index(){
        return Log::info('Log data');
    }
}
