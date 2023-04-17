<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function show()
    {
        $page = "Account";
        $user = User::with('account')->find(auth()->id());
        return view('pages.account', compact('user', 'page'));
    }

    // Update user profile
    public function update(Request $request)
    {
        $user = User::with('account')->find(auth()->id());

        $this->validate($request, [
            'fullname' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'pin_number' => 'required|numeric|digits:6',
            // 'password' => 'required|confirmed|min:6',
        ]);

        $user->account->fullname = $request->input('fullname');
        $user->account->address = $request->input('address');
        $user->account->phone_number = $request->input('phone_number');
        $user->account->pin_number = $request->input('pin_number');
        $user->account->save();

        return redirect()->route('account.show')->with('update_success', 'Account successfully updated.');
    }

    public function pinNumberUpdate(Request $request)
    {
        $user = User::with('account')->find(auth()->id());

        $this->validate($request, [
            'pin_number' => 'required|numeric|digits:6',
        ]);

        $user->account->pin_number = $request->input('pin_number');
        $user->account->save();

        return redirect()->back()->with('update_success', 'The Pin number has been created, you can make transactions!');
    }
}