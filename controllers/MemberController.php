<?php
namespace controllers;
use PDO;
class MemberController{
    // 显示页面
    public function blog(){
        $model = new \models\Member;
        $data = $model->blog();
        // 显示视图                 接受return返回过来的值
        view('member/member-list',['data'=>$data]);
    }
    // 添加 用户名和邮箱
    public function insert(){
        view('member/member-add',['data'=>$data]);
    }
    // 显示修改
    public function update(){
        $model = new \models\Member;
        $data = $model->update();
        view('member/member-edit',['data'=>$data]);
    }
    // 修改
    public function doupdate(){
        $model = new \models\Member;
        $data = $model->doupdate();
        // 判断修改是否成功
       if($data){
        // 如果修改成功就进行跳转
        header('location:/member/blog');
        }else{
            // 如果失败就进行提示
            echo '修改失败';
        }
    }
    // 删除
    public function del(){
        $model = new \models\Member;
        $data = $model->del();
        // 判断是否删除成功
        if($data){
            // 如果删除成功就跳转
            header('location:/member/blog'); 
        }
        else
        {
            // 不成功就进行提示
            echo "删除失败";
        }
    }
    // 显示详情页
    public function show(){
        $model = new \models\Member;
        $data = $model->show();
        view('member/member-show',[
            'data'=>$data
            ]);
    }
}