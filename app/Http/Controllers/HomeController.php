<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/* Inico de configuracion personalizada*/


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

   
}
