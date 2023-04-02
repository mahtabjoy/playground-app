<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use App\Models\BackendAdmin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
// admin dashboard
    public function dashboard()
    {
        return view('backend_admin.dashboard');
    }

// admin dashboard login
    public function login(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $custommessages = [
                'email.required' => 'Email Address Is Required',
                'email.email' => 'Valid Email Address Is Required',
                'password.required' => 'Password Is Required',
            ];
            $this->validate($request,$rules,$custommessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1'])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }
        return view('backend_admin.login');
    }

// admin dashboard logout
    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

// admin create
    public function create()
    {
        return view('backend_admin.admin.admin_create');
    }

    //admin store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'  => 'required|string|max:255',
            'password'   => 'required',
            'mobile'      => 'required|string|max:11|min:11',
            'type'      => 'required|string',
            'image'      => 'nullable',
            'status'      => 'required',
        ]);
        try {
            $input = $request->all();
            $admin = new admin();
            $admin->name = $input['name'];
            $admin->email = $input['email'];
            $admin->password = Hash::make($request->password);
            $admin->mobile = $input['mobile'];
            $admin->type = $input['type'];
            $admin->status = $input['status'];

            $adminImage = $request->file('image')->store('admin_image', 'public');

            $admin->image = $adminImage;
            $admin->save();

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return redirect()->back()->with('success_message','Admin Added Successfully');
    }

// admin list
    public function list()
    {
        $admins = Admin::all();
        return view('backend_admin.admin.admin_list',compact('admins'));
    }

// admin edit
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('backend_admin.admin.admin_edit',compact('admin'));
    }

// admin update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'  => 'required|string|max:255',
            'mobile'      => 'required|string|max:11|min:11',
            'type'      => 'required|string',
            'image'      => 'nullable',
            'status'      => 'required',
        ]);
        try {
            $input = $request->all();
            $admin =Admin::find($id);
            $admin->name = $input['name'];
            $admin->email = $input['email'];
            $admin->password = Hash::make($request->password);
            $admin->mobile = $input['mobile'];
            $admin->type = $input['type'];
            $admin->status = $input['status'];

            if($request->hasFile('image')){
                $adminImage = $request->file('image')->store('admin_image', 'public');
//                $file = $request->file('suppliers_photo');
//                $filename = $file->getClientOriginalName();
//                $supplierImage= $file->storeAs('public/supplier',$filename);
////                return redirect('/uploadfile');
                $admin->image = $adminImage;
            }
            $admin->save();

            } catch (\Exception $e) {
                return response()->json($e->getMessage());
            }
        return redirect()->back()->with('success_message','Admin Updated Successfully');
    }

// admin delete
    public function destroy($id)
    {
//        try {
            $admin = Admin::find($id);
            $admin->delete();
////            dd($admin);
//            if(empty($admin)) {
//                $responseArr['status'] = 'error';
//                $responseArr['statusMsg'] = 'Error!';
//                $responseArr['message'] = 'No Data found. Please try again';
//            } else {
//                $admin->delete();
//                $responseArr['status'] = 'success';
//                $responseArr['statusMsg'] = 'Deleted!';
//                $responseArr['message'] = 'Deleted successfully';
//            }
//            return response()->json($responseArr);
//
//        } catch (\Exception $e) {
//            return response()->json($e->getMessage());
//        }
//        return redirect()->back()->with('success_message','Admin Deleted Successfully');
    }
}
