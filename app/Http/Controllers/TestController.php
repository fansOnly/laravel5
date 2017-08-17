<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\User;

class TestController extends Controller
{
    public function index(){
        // Laravel 数据库之：数据库请求构建器

        // 1->从数据表中获取所有的数据列#
        echo('1->从数据表中获取所有的数据列#<br />');
        // $users = DB::table('users')->get();
        // return view('admin/test',['users'=>$users]);
        echo '<hr />';

        // 2->从数据表中获取单个列或行#
        echo('2->从数据表中获取单个列或行#<br />');
        $user = DB::table('users')->first(); // -> test
        $user = DB::table('users')->where('name','john')->first();  // ->john
        echo $user->name .'<br /><hr />';
        $email = DB::table('users')->where('name','john')->value('email');  // ->john@qq.com
        echo $email .'<br /><hr />';

        // 3->获取一列的值#  pluck
        echo('3->获取一列的值#  pluck<br />');
        $titles = DB::table('users')->pluck('name');
        foreach ($titles as $title){
            echo $title .'<br />';
        }
        echo '<hr />';

        $roles = DB::table('users')->pluck('email','name');
        foreach ($roles as $email => $e) {
            echo $e .'<br />';
        }
        echo '<hr />';

        // 4->结果分块#
        echo('4->结果分块#<br />');
        DB::table('users')->OrderBy('id','desc')->chunk(2,function($users){
            foreach ($users as $user) {
                echo $user->name .'<br />';
                // break;
            }
            echo '<hr />';
        });

        // 5->聚合#   count、 max、 min、 avg 、 sum
        echo('5->聚合#   count、 max、 min、 avg 、 sum<br />');
        $len = DB::table('users')->count();
        echo $len .'<br />';
        $maxid = Db::table('users')->max('id');
        echo $maxid .'<br />';
        $avgid = DB::table('users')->avg('id');
        echo $avgid .'<br />';
        echo '<hr />';

        // Selects#
        // 6->指定一个 Select 子句#
        echo('6->指定一个 Select 子句#<br />');
        $articles = DB::table('articles')->select('title','body as content')->get();
        foreach ($articles as $article) {
            echo $article->content .'<br />';
        }
        echo '----------------------------------------------------------------------<br />';
        // distinct 方法允许你强制让查询返回不重复的结果：
        $articles = DB::table('articles')->distinct()->get();
        foreach ($articles as $article) {
            echo $article->title .'<br />';
        }
        echo '----------------------------------------------------------------------<br />';
        $query = DB::table('articles')->select('title');
        $articles = $query->addSelect('body')->get();
        foreach ($articles as $article) {
            echo $article->body .'<br />';
        }
        echo '<hr />';

        // 7->原始表达式#
        echo('7->原始表达式#<br />');
        $users = DB::table('users')->select(DB::raw('count(*) as user_count'))->where('id',">","1")->get();
        foreach ($users as $user) {
            echo $user->user_count .'<br />';
        }
        echo '<hr />';
    }
}
