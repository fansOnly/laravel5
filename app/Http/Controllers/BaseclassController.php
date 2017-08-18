<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baseclass;

class BaseclassController extends Controller
{
    public function index(Request $request,$id){
        $id = $request->id;
        // dd($id);
        $categorys = Baseclass::with('childCategory')->where('parent_id',$id)->get();
        // dd($categorys);
        if($id==1){
            $parent_id = 1;
        }else{
            $parent_id = Baseclass::with('childCategory')->where('id',$id)->get(['parent_id'])->toArray();
            // dd($parent_id[0]['parent_id']);
            $parent_id = $parent_id[0]['parent_id'];
        }
        return view('admin/base/index')->with(['base'=>$categorys,'id'=>$id,'parent_id'=>$parent_id]);
    }

    public function create(Request $request, $id){
        $id = $request->id;
        if($id==1){
            $info_state = '0,1,2,3';
        }else{
            $categorys = Baseclass::with('childCategory')->where('id',$id)->get()->toArray();
            $info_state = $categorys[0]['info_state'];
        }
        return view('admin/base/create',['id'=>$id,'info_state'=>$info_state]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'sortnum' => 'required|integer|min:0',
            'name' => 'required|max:50',
            'en_name' => 'max:50'
        ]);
        $Baseclass = new Baseclass;
        $Baseclass->parent_id = $request->get('parent_id');
        $Baseclass->sortnum = $request->get('sortnum');
        $Baseclass->name = $request->get('name');
        $Baseclass->en_name = $request->get('en_name');
        $Baseclass->hasSecond = $request->get('hasSecond');
        // $Baseclass->hasThird = $request->get('hasThird');
        $Baseclass->info_state =implode(',',$request->get('info_state'));
        $Baseclass->set_info_state = $request->get('set_info_state');
        if($Baseclass->save()){
            return redirect('admin/base/'.$Baseclass->parent_id);
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id){}

    public function edit($id){
        $Baseclass = Baseclass::find($id);
        return view('admin/base/edit')->with('base',$Baseclass);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'sortnum' => 'required|integer|min:0',
            'name' => 'required|max:50',
            'en_name' => 'max:50'
        ]);
        $Baseclass  = new Baseclass;
        $parent_id  = $request->get('parent_id');
        $sortnum    = $request->get('sortnum');
        $name       = $request->get('name');
        $en_name    = $request->get('en_name');
        $hasSecond  = $request->get('hasSecond');
        // $hasThird   = $request->get('hasThird');
        $info_state = $request->get('info_state');
        $info_state = implode(',',$info_state);
        // dd($info_state);
        $set_info_state = $request->get('set_info_state');
        $data = ['parent_id'=>trim($parent_id),'sortnum'=>trim($sortnum),'name'=>trim($name),'en_name'=>trim($en_name),'hasSecond'=>trim($hasSecond),'info_state'=>trim($info_state),'set_info_state'=>trim($set_info_state)];
        if($Baseclass->where('id',$id)->update($data)){
            return redirect('admin/base/'.$parent_id);
        }else{
            return redirect()->back()->withInput()->withErrors('保存信息失败！');
        }
    }

    public function destroy($id){
        $categorys = Baseclass::with('childCategory')->where('parent_id',$id)->get()->toArray();
        // dd($categorys);
        if($categorys!==[]){
            return redirect()->back()->withInput()->withErrors('请先删除子栏目！');
        }else{
            Baseclass::find($id)->delete();
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }
    }
}
