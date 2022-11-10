<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() {
        $branch = Branch::all();
        $result = [
            "payload" => $branch,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function edit($id) {
        $branch = Branch::find($id);
        if($branch == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $result = [
            "payload" => $branch,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function store(Request $request) {
        
        $validator = $this->validate($request, [
            'branch_name' => 'required',
            'branch_address' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        $branch = new Branch();
        $branch->branch_name = $request->branch_name;
        $branch->branch_address = $request->branch_address;
        $branch->save();
        
        $result = [
            "payload" => $branch,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function update(Request $request, $id) {
        $validator = $this->validate($request, [
            'branch_name' => 'required',
            'branch_address' => 'required'
        ]);

        $result = [
            "payload" => $validator,
            "error_code" => 422,
            "message" => "sukses"
        ];

        $branch = Branch::find($id);
        if($branch == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $branch->branch_name = $request->branch_name;
        $branch->branch_address = $request->branch_address;
        $branch->save();
        $result = [
            "payload" => $branch,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }

    public function delete($id) {
        $branch = Branch::find($id);
        if($branch == null) {
            $result = [
                "payload" => null,
                "error_code" => 404,
                "message" => "not found"
            ];
            return response()->json($result);
        }
        $branch->delete();
        $result = [
            "payload" => $branch,
            "error_code" => 200,
            "message" => "sukses"
        ];
        return response()->json($result);
    }
}
