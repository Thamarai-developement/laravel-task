<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;
use App\Models\Contact;

class UserController extends Controller
{
     /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index(Request $request)
        {
            $users = User::latest()->paginate(5);
    
            return view('user.userList',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view('user.userCreate');
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
            $request->validate([
                'user_name' => 'required|min:5',
                'user_email' => 'required|email|unique:users,email',
            ]);

            $data = New User;
            $data->name = $request->user_name;
            $data->email = $request->user_email; 
            $data->password = null; 
            $data->save();
            return redirect('user/list')->with('success','User created successfully.');        
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show(Request $request,$id)
        {
            $user=User::find($id);
            return view('user.userShow',compact('user'));
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit(Request $request,$id)
        {
            $user=User::find($id);
            return view('user.userEdit',compact('user'));
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request)
        {
            $request->validate([
                'user_name' => 'required|min:5',
                'user_email' => 'required|email|unique:users,email,'.$request->id
            ]);

            $data = User::find($request->id);
            $data->name = $request->user_name;
            $data->email = $request->user_email;  
            $data->save();
            return  redirect('/user/list')->with('success', $request->user_name.' has updated successfully');
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            $data = User::find($id);
            $contact= Contact::where('user_id',$id)->delete();
            $data->delete();
            return redirect('/user/list')->with('success', 'Deleted successfully');     
        }
}
