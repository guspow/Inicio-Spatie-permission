<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function user(){

        $users = User::select('id', 'name', 'email', 'id as ident')->get();
        return datatables($users)->toJson();
    }
}
