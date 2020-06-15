<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data=user::query();

        $user= $data->select('id', 'email', 'name')->get();
        return Datatables::of($user)
            ->addColumn('action', function ($user){
                return '<button class="btn btn-xs btn-info edit_user" data-toggle="modal" data-id_user"'.$user->id.'"><i class="fa fa-pencil"></i>Edit</button></<button> '.
                '<button class="btn btn-xs btn-danger delete_user" id="id_user" data-toggle="modal" data-id_user="'.$user->id.'"><i class="fa fa-trash"></i>Delete</button>';
            })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        if($user){
            return response()->json(['status' => 'succes'], 200);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return new JsonResponse(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
