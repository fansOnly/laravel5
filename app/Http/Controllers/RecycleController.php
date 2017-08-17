<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class RecycleController extends Controller
{
    /**
     * 获取删除模型列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/recycle')->withArticles(Article::onlyTrashed()->get());
    }

    /**
     * 单一模型还原
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $article = new Article;
        if($article->where('id',$id)->restore()){
            return redirect('admin/recycle');
        } else {
            return redirect()->back()->withInput()->withErrors('还原失败！');
        }
    }

    /**
     * 模型批量还原
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreAll()
    {
        $article = new Article;
        if($article->onlyTrashed()->restore()){
            return redirect('admin/recycle');
        } else {
            return redirect()->back()->withInput()->withErrors('还原失败！');
        }
    }

    /**
     * 彻底删除单个模型
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article = new Article;
        $article->where('id',$id)->forceDelete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    /**
     * 彻底删除模型
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        $article = new Article;
        $article->onlyTrashed()->forceDelete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
