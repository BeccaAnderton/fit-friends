<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('account.index', compact('sports'));
    }

    public function update(UpdateAccountRequest $request)
    {
        $user = Auth::user();

        $user->name = request()->get('name');
        $user->email = request()->get('email');
        $user->age = request()->get('age');
        $user->postcode = request()->get('postcode');
        $user->bio = request()->get('bio');
        $user->gender = request()->get('gender');
        $user->sports()->sync(request()->get('sports'));

        $user->save();

        return redirect('account');
    }
}
