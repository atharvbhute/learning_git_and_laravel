<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class DeleteController extends Controller
{
    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect(route('users.index'));
    }
}
