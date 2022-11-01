<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function showAll() {
        $users = User::all();
        $result = [
            "payload" => $users,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function show($id) {
        $user = User::find($id);
        if($user == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $result = [
            "payload" => $user,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function store(Request $request) {
        
        $validator = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->save();
        
        $result = [
            "payload" => $user,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $result = [
            "payload" => $user,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function delete($id) {
        $user = User::find($id);
        if($user == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $user->delete();
        $result = [
            "payload" => $user,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    
}
