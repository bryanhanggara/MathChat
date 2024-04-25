<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $userCount = User::count();
        $discussionCount = Discussion::count();
        return view("pages.admin.index", compact('userCount', 'discussionCount'));
    }
}
