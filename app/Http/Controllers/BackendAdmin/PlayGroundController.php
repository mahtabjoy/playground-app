<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackendAdmin\PlayGround;

class PlayGroundController extends Controller
{

// play ground create
    public function create()
    {
        return view('backend_admin.play_ground.create');
    }

    // play ground edit
    public function store(Request $request)
    {
        $request->validate([
            'ground_location' => 'required|string|max:255',
            'ground_description'  => 'required|string|max:255',
            'ground_image'   => 'nullable',
            'ground_slot_time'      => 'required|string',
        ]);
        try {
            $input = $request->all();
            $play_ground = new PlayGround;
            $play_ground->ground_location = $input['ground_location'];
            $play_ground->ground_description = $input['ground_description'];
            $play_ground->ground_slot_time = $input['ground_slot_time'];

            $playGroundImage = $request->file('ground_image')->store('play_ground_image', 'public');

            $play_ground->ground_image = $playGroundImage;
            $play_ground->save();

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return redirect()->back()->with('success_message','Play Ground Added Successfully');
    }
// play ground list
    public function list()
    {
        $play_grounds = PlayGround::all();
        return view('backend_admin.play_ground.list',compact('play_grounds'));
    }
// play ground edit
    public function edit($id)
    {
        $play_ground = PlayGround::find($id);
        return view('backend_admin.play_ground.edit',compact('play_ground'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ground_location' => 'required|string|max:255',
            'ground_description'  => 'required|string|max:255',
            'ground_image'   => 'nullable',
            'ground_slot_time'   => 'required|string',
        ]);
        try {
            $input = $request->all();
            $play_ground = PlayGround::find($id);
            $play_ground->ground_location = $input['ground_location'];
            $play_ground->ground_description = $input['ground_description'];
            $play_ground->ground_slot_time = $input['ground_slot_time'];

            if($request->hasFile('ground_image')){
                $playGroundImage = $request->file('ground_image')->store('play_ground_image', 'public');
//                $file = $request->file('suppliers_photo');
//                $filename = $file->getClientOriginalName();
//                $supplierImage= $file->storeAs('public/supplier',$filename);
////                return redirect('/uploadfile');
                $play_ground->ground_image = $playGroundImage;
            }
            $play_ground->save();

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return redirect()->back()->with('success_message','Play Ground Updated Successfully');
    }
// play ground delete
    public function destroy($id)
    {
        try {
            $play_ground = PlayGround::find($id);

            if(empty($play_ground)) {
                $responseArr['status'] = 'error';
                $responseArr['statusMsg'] = 'Error!';
                $responseArr['message'] = 'No Data found. Please try again';
            } else {
                $play_ground->delete();
                $responseArr['status'] = 'success';
                $responseArr['statusMsg'] = 'Deleted!';
                $responseArr['message'] = 'Deleted successfully';
            }
            return response()->json($responseArr);

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
