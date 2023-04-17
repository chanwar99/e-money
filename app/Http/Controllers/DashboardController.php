<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function show()
    {
        $page = "Dashboard";
        $user = User::with('account')->find(auth()->id());
        return view('pages.dashboard', compact('user', 'page'));
    }
}
?>