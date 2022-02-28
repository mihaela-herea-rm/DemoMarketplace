<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Service $service)
    {
        request()->validate([
            'body' =>'required'
        ]);
        $service->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return back();
    }
}
