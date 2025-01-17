<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'name'    => config('app.name'),
        'version' => '1.0.0',
        'author'  => 'Dung',
        'email'   => 'dungnt3@s-connnect.net',
        'website' => 'http://sconnect.com.vn',
    ];
});
