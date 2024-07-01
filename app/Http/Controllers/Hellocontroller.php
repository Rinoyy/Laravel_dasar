<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hellocontroller extends Controller
{
    function index(){
        echo "hello Rino";
    }

    function world_message()  {
        echo "World";
    }

  
}
