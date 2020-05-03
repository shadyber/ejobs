<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

     public function deposit()
    {
        //
        return view('account.deposit');
         
        
    }

     public function withdraw()
    {
        //
        
      return view('account.withdraw');
        
    }
}
