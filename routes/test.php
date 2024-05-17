<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    $contributors = [
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/1?v=4',
            'handle' => 'johndoe',
            'email' => 'johndoe@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/2?v=4',
            'handle' => 'alice',
            'email' => 'alice@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/3?v=4',
            'handle' => 'bob',
            'email' => 'bob@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/4?v=4',
            'handle' => 'charlie',
            'email' => 'charlie@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/5?v=5',
            'handle' => 'dave',
            'email' => 'dave@me.com',
        ],
    ];
    return view('test', compact('contributors'));
});
