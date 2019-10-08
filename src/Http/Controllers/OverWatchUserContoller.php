<?php

namespace Tallmancode\OverWatch\Http\Controllers;

use Illuminate\Http\Request;
use Tallmancode\OverWatch\Models\User;

class OverWatchUserContoller extends Controller
{
    public function index(){
        return view('OverWatch::users.browse.index');
    }

    public function getUsers(){
        $users = User::all();

        $output['data'] = array();

        foreach($users as $user){
            $output['data'][] = array(
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => date('j M Y - g:i A', strtotime($user->created_at)),
                'role' => 'Administrator',
                'actions' => '<a href="" class="btn btn-sm btn-danger pull-right delete">Delete</a>
                              <a href=""  class="btn btn-sm btn-primary pull-right edit">Edit</a>
                              <a href=""  class="btn btn-sm btn-warning pull-right view">View</a>',
            );
        }

        return response()->json($output);

    }
}
