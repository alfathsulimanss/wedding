<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class ManageWeddingController extends Controller
{
    public function index()
    {
        return view('admin.manage-wedding');
    }

    protected function  validationData($data){
        $message = [
            'required' => ':attribute Cannot be Empty',
            'unique' => ':attribute Cannot be Same',
            'exists' => ':attribute Not Exist'
        ];
        return validator($data, [
            'email' => 'required',
            'slug' => 'required',
            'catin_1' => 'required',
            'catin_2' => 'required',
            'bio_catin_1' => 'required',
            'bio_catin_2' => 'required',
            'ayah_catin1' => 'required',
            'ibu_catin1' => 'required',
            'ayah_catin2' => 'required',
            'ibu_catin2' => 'required',
            'reception' => 'required',
            'reception_address' => 'required',
            'ceremony' => 'required',
            'ceremony_address' => 'required',
            'party' => 'required',
            'party_address' => 'required',
            'google_maps_url' => 'nullable|url',
            'waze_url' => 'nullable|url',
            'bank_account' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'account_holder' => 'nullable|string',
            'image_catin_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_catin_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $message);
    }

    public function input(Request $request){
        $validation = $this->validationData($request->input());
        if($validation->passes()){
            $data = new Wedding();
            $data->slug = $request->slug;
            $data->catin_1 = $request->catin_1;
            $data->catin_2 = $request->catin_2;
            $data->bio_catin_1 = $request->bio_catin_1;
            $data->bio_catin_2 = $request->bio_catin_2;

            // Handle Catin 1 image upload
            if ($request->hasFile('image_catin_1')) {
                $imagePath = $request->file('image_catin_1')->store('wedding-catins', 'public');
                $data->image_catin_1 = $imagePath;
            }
        
            // Handle Catin 2 image upload
            if ($request->hasFile('image_catin_2')) {
                $imagePath = $request->file('image_catin_2')->store('wedding-catins', 'public');
                $data->image_catin_2 = $imagePath;
            }
            $data->ayah_catin1 = $request->ayah_catin1;
            $data->ibu_catin1 = $request->ibu_catin1;
            $data->ayah_catin2 = $request->ayah_catin2;
            $data->ibu_catin2 = $request->ibu_catin2;
            $data->reception = $request->reception;
            $data->reception_address = $request->reception_address;
            $data->ceremony = $request->ceremony;
            $data->ceremony_address = $request->ceremony_address;
            $data->party = $request->party;
            $data->party_address = $request->party_address;
            $data->google_maps_url = $request->google_maps_url;
            $data->waze_url = $request->waze_url;
            $data->bank_account = $request->bank_account;
            $data->bank_name = $request->bank_name;
            $data->account_holder = $request->account_holder;
            $data->present_counter = $request->present_counter ?? 0;
            $data->not_present_counter = $request->not_present_counter ?? 0;
            if($data->save()){
                $user = new User();
                $user->name = $request->slug;
                $user->email = $request->email;
                $user->wedding_id = $data->id;
                $user->roles = 'user';
                $user->password = bcrypt('password123');
                if ($user->save()){
                    return json_encode(array('success'=>'Wedding Project saved successfully'));
                }
            }else{
                return json_encode(array('error'=>'Error while saving Wedding Project Data'));
            }
        }else{
            $msg = $validation->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }
            return json_encode(array('error' =>$err));
        }
    }

    public function edit($id, Request $request){
        $validation = $this->validationData($request->input());
        if($validation->passes()){
            $data = Wedding::where('id', $id)->first();
            $data->slug = $request->slug;
            $data->catin_1 = $request->catin_1;
            $data->catin_2 = $request->catin_2;
            $data->bio_catin_1 = $request->bio_catin_1;
            $data->bio_catin_2 = $request->bio_catin_2;
            // Handle Catin 1 image upload
            if ($request->hasFile('image_catin_1')) {
                // Delete old image if exists
                if ($data->image_catin_1) {
                    Storage::disk('public')->delete($data->image_catin_1);
                }
                $imagePath = $request->file('image_catin_1')->store('wedding-catins', 'public');
                $data->image_catin_1 = $imagePath;
            }
            
            // Handle Catin 2 image upload
            if ($request->hasFile('image_catin_2')) {
                // Delete old image if exists
                if ($data->image_catin_2) {
                    Storage::disk('public')->delete($data->image_catin_2);
                }
                $imagePath = $request->file('image_catin_2')->store('wedding-catins', 'public');
                $data->image_catin_2 = $imagePath;
            }
            $data->ayah_catin1 = $request->ayah_catin1;
            $data->ibu_catin1 = $request->ibu_catin1;
            $data->ayah_catin2 = $request->ayah_catin2;
            $data->ibu_catin2 = $request->ibu_catin2;
            $data->reception = $request->reception;
            $data->reception_address = $request->reception_address;
            $data->ceremony = $request->ceremony;
            $data->ceremony_address = $request->ceremony_address;
            $data->party = $request->party;
            $data->party_address = $request->party_address;
            $data->google_maps_url = $request->google_maps_url;
            $data->waze_url = $request->waze_url;
            $data->bank_account = $request->bank_account;
            $data->bank_name = $request->bank_name;
            $data->account_holder = $request->account_holder;
            $data->present_counter = $request->present_counter ?? 0;
            $data->not_present_counter = $request->not_present_counter ?? 0;
            if($data->update()){
                return json_encode(array('success' => 'Wedding Project Updated Successfully'));
            }else{
                return json_encode(array('error' => 'Error while updating Wedding Project data'));
            }
        }else{
            $msg = $validation->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }
            return json_encode(array("error"=>$err));
        }
    }

    public function weddingProjectTable(){
        $data = User::where('roles', 'user')->with('wedding');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return "
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\" style=\"padding-bottom: 1px;\"><i class=\"fe-edit\"></i> Edit</a>
                    <a href=\"#\" class=\"btn btn-outline-primary btn-sm legitRipple\" id=\"manage_banner\" style=\"padding-bottom: 1px;\"><i class=\"fe-image\"></i> Banner</a>
                    <a href=\"#\" class=\"btn btn-outline-info btn-sm legitRipple\" id=\"manage_love_story\" style=\"padding-bottom: 1px;\"><i class=\"fe-heart\"></i> Love Story</a>
                    <a href=\"#\" class=\"btn btn-outline-warning btn-sm legitRipple\" id=\"manage_gallery\" style=\"padding-bottom: 1px;\"><i class=\"fe-camera\"></i> Gallery</a>
                    <a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\" style=\"padding-bottom: 1px;\"><i class=\"fe-trash\"></i> Delete</a>
                ";
            })
            ->make(true);
    }

    public function delete($id){
        $data = Wedding::where('id', $id)->first();
        if($data->delete()){
            return json_encode(array("success"=>"Successfully deleted App Master"));
        }else{
            return json_encode(array("error"=>"Failed when deleting App Master"));
        }
    }
}
