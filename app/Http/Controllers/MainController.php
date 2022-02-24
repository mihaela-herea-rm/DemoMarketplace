<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Enums\Gender;

class MainController extends Controller
{
    public function index()
    {
        return view('homepage.welcome', [
            'services' => Service::orderBy('id', 'DESC')->take(6)->get(),
            'categories' => Category::all(),
            'gender' => [
                'male' => Gender::MALE,
                'female' => Gender::FEMALE,
                'any' => Gender::ANY,
            ]
        ]);
    }
}
