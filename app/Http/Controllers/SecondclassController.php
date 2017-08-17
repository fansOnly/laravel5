<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Secondclass;
use App\Baseclass;

class SecondclassController extends Controller
{
    public function getBaseId(Request $request){
        $base_id = $request->route('base_id');
        return Baseclass::find($base_id)->id;
    }

    public function index(Request $request){
        dd($request->url());
        return view('admin/second/index')->with(['second'=>Secondclass::all()]);
    }

    public function show($id){}

    public function create(){
        $base_id = $this->getBaseId();
        return view('admin/second/create')->with('base_id',$base_id);
    }

    public function store(Request $request){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}
}
