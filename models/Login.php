<?php
namespace models;
use PDO;
class Login{
    public function login($post){
        // 连接数据库
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=admin','root','123456');
        // 设置编码
        $pdo->exec('SET NAMES utf8');
        // 接受username保存到变量
        $user = $post['username'];
        // 接受pass保存到变量
        $pwd = md5($post['pass']);
        $stmt = $pdo->query("SELECT * FROM dologin WHERE user = '$user' AND password = '$pwd'");
        // 取出一条数据
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        // 判断用户名和密码是否存在
        if($arr['user']==$user && $arr['password']==$pwd){
            $_SESSION['id'] = $data['id'];
            header('location:/index/index');
        }else{
            echo "<script>alert('登录失败'); location.href='/login/login';</script>";
        }
    }
}