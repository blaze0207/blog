<?php

use Illuminate\Http\Request;
use App\Follow;
use App\Question;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/topics', function (Request $request) {
    $topics = \App\Topic::select(['id', 'name'])->where('name', 'like', '%' . $request->query('q') . '%')->get();
    return $topics;
});

Route::middleware('auth:api')->post('/question/follower', function (Request $request) {
    $user = Auth::guard('api')->user();
    $followed = $user->followed($request->question);
    if ($followed) {
        return response()->json(['followed' => true]);
    }

    return response()->json(['followed' => false]);
});

Route::middleware('auth:api')->post('/question/follow', function (Request $request) {
    $user = Auth::guard('api')->user();
    $question = Question::find($request->question);
    $followed = $user->followThis($question->id);

    if (count($followed['detached']) > 0) {
        $question->decrement('followers_count');
        return response()->json(['followed' => false]);
    }

    $question->increment('followers_count');
    return response()->json(['followed' => true]);
});

Route::get('/user/followers/{id}', 'FollowersController@index');
Route::post('/user/follow', 'FollowersController@follow');
