<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class delegatetableController extends Controller
{
    //
    public function delegatetable(){
        $delegate = User::all()->where('role','delegate');
        return view("Admin.delegatetable")->with('dele',$delegate);
    }
}
