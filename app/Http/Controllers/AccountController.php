<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class AccountController extends Controller
{
function accountpanel()
 {
 $user = DB::table("users")->whereRaw("id=?",[Auth::user()->id])->first();

return view("vidusach.account",compact("user"));
}
}