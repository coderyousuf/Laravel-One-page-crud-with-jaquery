<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use DB;

class userController extends Controller
{
    public function mainView(){
        $data=array();
        $data['qr']=userModel::get();
        echo view("main", $data);
    }
    public function store(Request $request){
        $data=$request->all();
        userModel::create($data);
        // dd($data);
        return redirect('/');
    }
    public function destroy(Request $request){
        $id=$request->id;
        $data=userModel::find($id);
        $data->delete();
        return redirect('/');
    }
    public function update_form(Request $request){
$id=$request->id;
$data['qr']=userModel::find($id);
echo json_encode($data);
    }
    public function modify(Request $request){
        $id=$request->id;
        $up=$request->all();
        $data=userModel::find($id);
        $data->update($up);
    }
}
