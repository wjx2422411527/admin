<?php
namespace controllers;
use PDO;
class BannerController{
    // 显示视图
    public function list(){
        view("banner/banner-list");
    }
    // 添加显示
    public function toadd(){
        view("banner/banner-add");
    }
    // 添加
    public function add(){
        $model = new \models\Banner;
        $data = $model->add();
        echo json_encode($data);
    }
    // 修改
    public function edit(){
        view("banner/banner-edit");
    }

}