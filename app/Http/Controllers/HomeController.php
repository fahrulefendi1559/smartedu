<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function data()
    {
        $data = User::query();

        //dd($data->get());

        $user = $data->select('id','name','email')->get();
        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return  '<button class="btn btn-xs btn-info edit_user" id="id_user" data-toggle="modal" data-id_user="'.$user->id.'"><i class="fa fa-pencil"></i>Edit</button></<button> '.
                    '   <button class="btn btn-xs btn-danger delete_user" id="id_user" data-toggle="modal" data-id_user="'.$user->id.'"><i class="fa fa-trash"></i>Delete</button>';
            })->make(true);
    }

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

    public function edit(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
