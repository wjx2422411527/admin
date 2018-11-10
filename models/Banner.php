<?php
namespace models;
use PDO;
class Banner{
    // 添加数据
    public function add(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        $pdo->exec('SET NANMES utf8');
        // 获取连接
        $url = $_POST['url'];
        // 获取描述
        $describe = $_POST['desc'];
        // $type = [
        //     ''
        // ];

        return $_FILES;

        if(isset($_FILES['file'])){
            $logo = $_FILES['file'];
        // var_dump($logo);die;
        }

        // 执行插入数据SQL
        $data = $pdo->exec("INSERT INTO banner(url,describe,logo) VALUES('$url','$describe')");
        // 返回数据
        return $data;
    }
}