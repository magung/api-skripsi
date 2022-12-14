<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        $users = User::with(['branch', 'role'])->get();
        $result = [
            "payload" => $users,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function edit($id) {
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
            'password' => 'required',
            'branch_id' => 'required',
            'role_id' => 'required'
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
        $user->branch_id = $request->branch_id;
        $user->role_id = $request->role_id;
        
        $user->save();
        
        $result = [
            "payload" => $user,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function update(Request $request, $id) {
        $validator = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'branch_id' => 'required',
            'role_id' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        $user = User::find($id);
        if($user == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->branch_id = $request->branch_id;
        $user->role_id = $request->role_id;
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
