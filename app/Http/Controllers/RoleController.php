<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $role = Role::all();
        $result = [
            "payload" => $role,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function edit($id) {
        $role = Role::find($id);
        if($role == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $result = [
            "payload" => $role,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function store(Request $request) {
        
        $validator = $this->validate($request, [
            'role_name' => 'required',
            'status' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        $role = new Role();
        $role->role_name = $request->role_name;
        $role->status = $request->status;
        $role->save();
        
        $result = [
            "payload" => $role,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function update(Request $request, $id) {
        $validator = $this->validate($request, [
            'role_name' => 'required',
            'status' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        $role = Role::find($id);
        if($role == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $role->role_name = $request->role_name;
        $role->status = $request->status;
        $role->save();
        $result = [
            "payload" => $role,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function delete($id) {
        $role = Role::find($id);
        if($role == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $role->delete();
        $result = [
            "payload" => $role,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

}
