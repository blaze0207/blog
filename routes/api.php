<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/topics', function (Request $request) {
    $topics = \App\Topic::select(['id', 'name'])->where('name', 'like', '%' . $request->query('q') . '%')->get();
    return $topics;
});
