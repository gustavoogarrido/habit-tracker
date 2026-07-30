<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $name = 'gustavo nome porra';

        $habits = ['comer', 'beber', 'dormir'];

        return view('home', [
            'name' => $name,
            'habits' => $habits
        ]);
    }
}
