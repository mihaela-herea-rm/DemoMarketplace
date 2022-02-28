<?php

namespace App\Http\Controllers;

use App\Enums\UserRoles;
use App\Models\User;

class ProfileController extends Controller
{
    public function get(User $user)
    {
        if (auth()->user()->getUserType() != UserRoles::SUPERADMIN && auth()->user()->id != $user->id) {
            return back()->with('warning', 'Permission denied!');
        }
        return view('admin.profile.index', [
            'user' => $user
        ]);
    }

}
