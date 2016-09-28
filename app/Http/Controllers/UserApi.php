<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Hash;

class UserApi extends Controller
{
    public function get(Request $req){
    	$page = 1;
    	if($req->page){
    		$page = $req->page;
    	}
    	return User::skip(($page - 1) * 10)->limit(10)->get();
    }

    public function show($id){
    	return User::find($id);
    }

    public function create(Request $req){
    	$req['password'] = Hash::make('12345678');
    	User::insert($req->input());
    	return $req->input();
    }

    public function update(Request $req, $id){
    	User::where('id', $id)->update($req->input());
    	return $req->input();
    }

    public function delete($id){
    	User::where('id', $id)->delete();
    }
}
