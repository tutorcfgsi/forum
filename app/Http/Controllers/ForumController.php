<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index(){
        $forums = Forum::latest()->paginate(5);

        return view('forums.index',compact('forums'));
    }
}
