<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store()
    {
        $attributes = $this->validateData();
        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Service::create($attributes);
        return redirect('/');
    }

    public function edit(Service $service)
    {
        $city = City::all()->firstWhere('id', $service->city_id);
        return view('admin.services.edit', [
            'service' => $service,
            'countyId' => $city->county_id
        ]);
    }

    public function update(Service $service)
    {
        $attributes = $this->validateData($service);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $service->update($attributes);
        return redirect('/admin/services')->with('success', 'Service updated!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted!');
    }

    protected function validateData(?Service $service = null): array
    {
        $service ??= new Service();
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('services', 'slug')->ignore($service)],
            'thumbnail' => $service->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
