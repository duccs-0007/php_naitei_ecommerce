<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Request\Admin\AdminCreateRequest;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getdata()
    {
        $users = User::select('id', 'name', 'email', 'created_at');
        return Datatables::of($users)
            ->addColumn('action', function($user){
                return '<a href="#" class="genric-btn success circle edit" id="'.$user->id.'"><i class="far fa-edit"></i> '.trans('content.edit').'</a><a href="#" class="genric-btn danger circle delete" id="'.$user->id.'"><i class="fas fa-trash"></i> '.trans('content.delete').'</a>';
            })
            ->make(true);
    }

    public function view()
    {
        return view('backend.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(User $user, AdminCreateRequest $request){
    }

    public function edit(){
        return view('admin.users.edit');
    }

    public function update(User $user, AdminEditRequest $request){

    }

    public function delete(Request $request){
        $user = User::find($request->input('id'));
        if($user->delete())
        {
            return response()->json([ 'deleted' => trans('user.deleted') ]);
        }
    }
}
