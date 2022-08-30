<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/posts', function () {
//     return response()->json([
//         'posts' => [
//             [
//                 'title' => 'Post one'
//             ]
//         ]
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
