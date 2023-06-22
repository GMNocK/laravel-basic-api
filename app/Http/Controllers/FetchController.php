<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchController extends Controller
{
    public function index()
    {
        // $response = Http::get('http://127.0.0.1:1000/api/customers');
        $response = [
                "asd" => "asd"
        ];
        $data = json_encode($response);
        dd($data);
    }
}
