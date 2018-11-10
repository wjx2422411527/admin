<?php
namespace models;
use PDO;
class Blog{
    // 增
    public function blog(){
        // 连接数据库
        $pdo = new PDO('mysql:host=localhost;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 获取title值
        $title = $_POST['title'];
        // 获取content值
        $content = $_POST['content'];
        // 插入数据库
        $ret = $pdo->exec("INSERT INTO blog(title,content) VALUES('$title','$content')");
        // 返回数据
        return $ret;
    }
    // 查询
    public function doinsert(){
        // 查询数据库
           $pdo = new PDO('mysql:host=localhost;dbname=admin','root','123456');
        //  设置编码
           $pdo->exec('SET NAMES utf8');
        // 查询数据库中所有数据
           $sql='SELECT * FROM blog';
        // 判断搜索框有没有值如果有就进行SQL查询
        if(@$_GET['username']){
            //        条件    内容字段           用户输入的内容           标题   读取       用户输入的内容 
            $sql .=  " where content like '%".$_POST['username']."%' or title like '%".$_POST['username']."%'";    
        }
        //  拼接查询语句
           $stmt = $pdo->query($sql);
        //    取出全部数据
           $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //    返回数据
            return $data;
    }
    // 删除
    public function del(){
        // 连接数据库
        $pdo = new PDO('mysql:host=localhost;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES uf8');
        // get范式获取id
        $id = $_POST['id'];
        // 数据库删除数据
        $stmt = $pdo->exec("DELETE FROM blog WHERE id = $id");
        // var_dump($stmt);
        return $stmt;
    }
    // 显示要修改的页面
    public function update(){
        // 连接数据库
        $pdo = new PDO('mysql:host=localhost;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 获取id
        $id = $_GET['id'];
        // 根据id查询数据
        $stmt = $pdo->query('SELECT * FROM blog WHERE id='.$id);
        // 取出数据
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // 返回数据
        return $data;
    }
    // 修改 
    public function doupdate(){
        // var_dump($_GET);
        // 连接数据库
        $pdo = new PDO('mysql:host=localhost;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 获取要修改的标题
        $title = $_POST['title'];
        // 获取要修改的内容
        $content = $_POST['content'];
        // 获取id 根据id来修改以前的内容
        // var_dump($_POST);die;
        $id = $_POST['bid'];
        // 执行SQL修改语句
        $stmt = $pdo->exec("UPDATE blog SET title='$title',content='$content' WHERE id=".$id);
        // 返回数据
        return $stmt;
    }
}