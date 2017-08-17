<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    // 初始化文章首页
    public function index(){
        return view('admin/article/index')->withArticles(Article::all());
    }

    // 新增文章
    public function create(){
        return view('admin/article/create');
    }

    // 新增文章请求
    public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
    {
        // 数据验证
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255', // 必填、在 articles 表中唯一、最大长度 255
            'body' => 'required', // 必填
        ]);

        // 通过 Article Model 插入一条数据进 articles 表
        $article = new Article; // 初始化 Article 对象
        $article->title = $request->get('title'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $article->body = $request->get('body'); // 同上
        $article->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article->save()) {
            return redirect('admin/article'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    // 编辑文章
    public function edit($id){
        $article = Article::find($id);
        return view('admin/article/edit')->with('article',$article);
    }

    public function show($id){}

    // 保存编辑
    public function update($id, Request $request){
        $this->validate($request, [ // 排除掉当前编辑的数据
            'title' => 'required|unique:articles,title,' . $id . '|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $data = ['title'=>$request->get('title'),'body'=>$request->get('body')];
        // dd($data);
        if ($article->where("id",$id)->update($data)) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存信息失败！');
        }
    }

    // 删除文章
    public function destroy($id){
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}