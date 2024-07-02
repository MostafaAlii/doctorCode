<?php

use Illuminate\Support\Facades\{Route, DB};

Route::get('/', function () {
    //dd(DB::table('tenants')->get()->toArray());

    return view('welcome');
});
