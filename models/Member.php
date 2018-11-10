<?php
namespace models;
use PDO;
class Member{
     public function blog(){
         $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
         $pdo->exec('SET NAMES utf8');
        //  查询出所有数据
        $sql= "SELECT * FROM member";
        if($_GET['username']){
            // 拼接搜索SQL语句
            $sql .= " where email like '%".$_GET['username']."%' or phone like '%".$_GET['username']."%' or address like '%".$_GET['username']."%'";
        }
        // 查询SQL
        $stmt = $pdo->query($sql);
        // 取出所有数据
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($stmt);die;
        return $data;
     }
     // 添加
    public function insert(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        $pdo->exec('SET NAMES utf8');
        // 获取邮箱
        $email = $_POST['email'];
        // 获取用户名
        $username = $_POST['username'];
        // var_dump($username);die;
        //添加到数据
        $stmt = $pdo->exec("INSERT INTO member(user,email) VALUES('$username','$email')");
        // var_dump("INSERT INTO member(user,email) VALUES('$username','$email')");die;
        return $stmt;
    }
    // 显示修改
    public function update(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        $pdo->exec('SET NAMES utf8');
        $id = $_GET['id']; //获取id根据id查询出数据
        $stmt = $pdo->query("SELECT * FROM member WHERE id=".$id);//根据id查询出数据
        $data = $stmt->fetch(PDO::FETCH_ASSOC);//取出一条数据
        $data['id'] = $id;
        return $data;
    }
    // 修改
    public function doupdate(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        $pdo->exec('SET NAMES utf8');
        $email = $_POST['email'];// 获取邮箱
        $user = $_POST['username']; // 获取用户名
        $city = $_POST['city']; // 获取地址
        $sex = $_POST['sex'];// 获取性别
        $sign = $_POST['sign'];// 获取电话
        $id = $_GET['id'];// 获取id
        $article = $_POST['article']; //获取个性签名
        // 执行修改SQL语句          表名      字段名  新值                                                                                   根据id修改
        $stmt = $pdo->exec("UPDATE member SET user='$user',email='$email',address='$city',phone='$sign',sex='$sex',article='$article' WHERE id=".$id);
        // 返回值
        return $stmt;
    }
    // 删除
    public function del(){
        // 连接数据库
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 获取id
        // 根据id进行删除
        $id = $_GET['id'];
        // 返回值
        return $stmt;
    }
    // 详情页
    public function show(){
        // 连接数据库
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 获取id
        // 根据id查询出要显示的详情页
        $id = $_GET['id'];
        // 查询语句
        $data = $pdo->query("SELECT * FROM member WHERE id=".$id);
        // 取出数据
        $stmt = $data->fetch(PDO::FETCH_ASSOC);
        // var_dump($stmt);die;
        // 返回数据
        return $stmt;
    }
}