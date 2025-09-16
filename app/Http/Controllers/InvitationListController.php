<?php

namespace App\Http\Controllers;

use App\Models\InvitationList;
use Illuminate\Http\Request;
use DataTables;

class InvitationListController extends Controller
{
    public function index()
    {
        return view('user.invitation-list');
    }

    protected function  validationData($data){
        $message = [
            'required' => ':attribute Cannot be Empty',
            'unique' => ':attribute Cannot be Same',
            'exists' => ':attribute Not Exist'
        ];
        return validator($data, [
            'name' => 'required',
        ], $message);
    }

    public function input(Request $request){
        $validation = $this->validationData($request->input());
        if($validation->passes()){
            $data = new InvitationList();
            $data->wedding_id = auth()->user()->wedding_id;
            $data->name = $request->name;
            $data->whatsapp_number = $request->whatsapp_number;
            if($data->save()){
                return json_encode(array('success'=>'Invitation saved successfully'));
            }else{
                return json_encode(array('error'=>'Error while saving Invitation Data'));
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
            $data = InvitationList::where('id', $id)->first();
            $data->name = $request->name;
            $data->whatsapp_number = $request->whatsapp_number;
            if($data->update()){
                return json_encode(array('success' => 'Invitation Updated Successfully'));
            }else{
                return json_encode(array('error' => 'Error while updating Invitation data'));
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

    public function invitationListTable(){
        $data = InvitationList::where('wedding_id', auth()->user()->wedding_id)->with('wedding')->orderBy('created_at', 'DESC');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return "
    				<a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\" style=\"padding-bottom: 1px;\"><i class=\"fe-edit\"></i> Edit</a>
    				<a href=\"#\" class=\"btn btn-outline-primary btn-sm legitRipple\" id=\"open_link\" style=\"padding-bottom: 1px;\"><i class=\"fe-external-link\"></i> Open</a>
                    <a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\" style=\"padding-bottom: 1px;\"><i class=\"fe-trash\"></i> Delete</a>
                ";
            })
            ->make(true);
    }

    public function delete($id){
        $data = InvitationList::where('id', $id)->first();
        if($data->delete()){
            return json_encode(array("success"=>"Invitation deleted Successfully"));
        }else{
            return json_encode(array("error"=>"Failed when deleting Invitation"));
        }
    }
}
