<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
}
