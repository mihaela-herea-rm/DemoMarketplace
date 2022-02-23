<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\County;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('homepage.welcome', [
            'services' => Service::orderBy('id', 'DESC')->take(6)->get(),
            'categories' => Category::all(),
            'counties' => County::with(['city'])->filter(request(['city']))->get(),
            'cities' => City::with(['county'])->filter(request(['county']))->get(),
        ]);
    }
}
