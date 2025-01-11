<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};

class UserInfiniteLoadingController extends Controller
{
    //

    public function userList(Request $request){
        $users = User::paginate(10);

        if($request->ajax()){
            $view = view('ajax.user', compact('users'))->render();
            return response()->json(['html' => $view]);
        }

        return view('user.list', compact('users'));
    }
}
