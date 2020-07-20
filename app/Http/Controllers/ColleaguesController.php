<?php

namespace App\Http\Controllers;

use App\Colleague;
use App\Religion;
use Illuminate\Http\Request;

class ColleaguesController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }
    public function createList() {
        return view("colleagues.create-list");
    }
    public function edit($id) {
        $colleague = Colleague::findOrFail($id);
        $religions = Religion::pluck("name","id");
        return view("colleagues.edit",compact("colleague","religions"));
    }

    // store colleageus
    public function store(Request $request) {
        $request->validate([
            "full_name" => "bail|required|string|min:2|max:60",
            "country" => "bail|required|string|min:2|max:60",
            "work_country" => "bail|required|string|min:2|max:60",
            "office_name" => "bail|required|string|min:2|max:190",
            "position" => "bail|required|string|min:2|max:190",
            "email" => "bail|required|email|max:190|unique:colleagues,email",
            "phone1" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "phone2" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "phone3" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "website" => "bail|string|nullable|max:190",
            "address" => "bail|required|string|max:190",
            "religion_id" => "bail|required|integer"
        ]);

        $add = Colleague::create($request->all());
        if($add) {
            return back()->with("colleaguesAddSuccess","New Colleague Has Been Added!");
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            "full_name" => "bail|required|string|min:2|max:60",
            "country" => "bail|required|string|min:2|max:60",
            "work_country" => "bail|required|string|min:2|max:60",
            "office_name" => "bail|required|string|min:2|max:190",
            "position" => "bail|required|string|min:2|max:190",
            "email" => "bail|required|email|max:190|unique:colleagues,email," . $id ,
            "phone1" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "phone2" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "phone3" => "bail|nullable|regex:/^[0-9()+-]+$/i",
            "website" => "bail|string|nullable|max:190",
            "address" => "bail|required|string|max:190",
            "religion_id" => "bail|required|integer"
        ]);   

        $update = Colleague::findOrFail($id)->update($request->all());
        if($update) {
            return back()->with("colleaguesUpdateSuccess","Colleague Has Been Updated!");
        }
    }

    // change status
    public function changeStatus(Request $request) {
        $colleague = Colleague::findOrFail($request->id);
        $status = $colleague->status;
        if($status == 1) {
            $colleague->update(["status"=>0]);
        }else if($status == 0) {
            $colleague->update(["status"=>1]);
        }

        return response()->json(["Cstatus"=>$colleague->status]);
    }

    // delete colleagues
    public function delete(Request $request) {
        $colleague = Colleague::findOrFail($request->id);
        $colleague->delete();

        return response()->json(["message"=>"Deleted!"]);
    }


    // search Colleagues
    public function search(Request $request) {
        $value = $request->value;
        $by = $request->by;
        $statusType = $request->statusType;
        $result = [];
        
        if(strlen($value) < 1 ){
            if($statusType == "both") {
                $result = Colleague::with("religion")->get();
            }else {
                $result = Colleague::where("status","$statusType")->with("religion")->get();
            }  
        }else {
            if($by == "religion"){
                if($statusType == 'both'){
                    $result = Colleague::whereHas('religion',function($query) use ($value){
                        $query->where("name","LIKE", "%{$value}%");
                    })->with('religion')->get();
                }else {
                    $result = Colleague::where("status","$statusType")->whereHas('religion',function($query) use ($value){
                        $query->where("name","LIKE", "%{$value}%");
                    })->with('religion')->get();
                }    
            }else{
                if($statusType == "both"){
                    $result = Colleague::query()->where("$by","LIKE","%{$value}%")->with("religion")->get();
                }else {
                    $result = Colleague::query()->where("status","$statusType")->where("$by","LIKE","%{$value}%")->with("religion")->get();   
                }
                
            }
        }   

       
        if($result->count() > 0){
            return response()->json(["result"=>$result]);
        }else {
            return response()->json(["empty"=>"Not Found"]);
        }
       


    }

}
