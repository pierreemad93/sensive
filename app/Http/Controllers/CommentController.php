<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    //
    public function store(CommentRequest $request)
    {
        Comment::create($request->validated());
        notyf()->success('Your comment has been saved.');
        return redirect()->back();
    }
}
