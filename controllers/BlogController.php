<?php
namespace controllers;
use PDO;
class BlogController{
    public function blog(){
        view('/blog/question-add');
    }
    // 增
    public function insert(){
        $model = new \models\Blog;
        $data = $model->blog();
        // 判断是否插入成功
        if($data){
            // 插入成功就跳转
            header('location:/blog/doinsert');
        }else{
            //失败
            echo "<script>alert('插入失败'); location.href='/blog/blog';</script>";
        }
    }
    // 查询
    public function doinsert(){
        $model = new \models\Blog;
        $data = $model->doinsert();
        // var_dump($data);
        // die;
        view('/list/question-list',[
            'data'=>$data
        ]);
    }
    // 删除
    public function del(){
        $model = new \models\Blog;
        $data = $model->del();
        // var_dump($data);
        if($data){
           echo '删除ok';
        }else{
          echo '删除on';
        }
    }
    // 显示要修改的页面
    public function update(){
        $model = new \models\Blog;
        $data = $model->update();
        // var_dump($data);die;
        view("chenge/question-edit",[
            'data'=>$data
        ]);
    }
    // 修改页面
    public function doupdate(){
        $model = new \models\Blog;
        $data = $model->doupdate();
        // var_dump($data);die;
        if($data){
            header('location:/blog/doinsert');
        }else{
            echo "<script>alert('修改失败'); location.href='/blog/update';</script>";
        }
    }
}