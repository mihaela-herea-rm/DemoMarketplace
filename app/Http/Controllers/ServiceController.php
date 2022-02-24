<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list()
    {
        request()->validate(
            [
                'category' => 'required',
                'county' =>'required',
                'gender' =>'required',
            ],
            [
                'category.required' => 'Please select a category',
                'county.required' => 'Please select a county',
                'gender.required' => 'Please select a gender'
            ]
        );
        return view('services.list', [
            'services' => Service::latest()
                ->filter(request(['city', 'category', 'gender']))
                ->paginate(9)
                ->withQuerystring(),
        ]);
    }

    public function details(Service $service)
    {
        return view('services.details', [
            'service' => $service,
        ]);
    }
}
