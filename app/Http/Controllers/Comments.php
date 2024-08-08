<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\StoreRequest;
use App\Models\Car;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class Comments extends Controller
{
    public function store(StoreRequest $request, $type, $id)
    {

        if($type === 'post') {
            $commentable = Post::findOrFail($id);
        } elseif ($type === 'car') {
            $commentable = Car::findOrFail($id);
        } else {
            return redirect()->back()->withErrors('Invalid comment type');
        }

        $commentable->comments()->create($request->validated());

        return redirect()->back()->with('status', 'Comment added successfully');
    }
}
