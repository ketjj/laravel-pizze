<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('pizzas', 'Api\PageController@index');