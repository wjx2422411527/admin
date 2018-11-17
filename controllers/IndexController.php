<?php
namespace controllers;
class IndexController{
    public function index(){
       view('index/index');
    }
    public function del(){
        view("member-del");
    }
    public function category(){
        view("category");
    }
    public function questiondel(){
        view("question-del");
    }
    public function commentlist(){
        view("comment-list");
    }
    public function feedbacklist(){
        view("feedback-list");
    }
    public function memberlevel(){
        view("member-level");
    }
    public function memberkiss(){
        view("member-kiss");
    }
    public function memberview(){
        view("member-view");
    }
    public function memberadd(){
        view("member-add");
    }
    public function questionedit(){
        view("question-edit");
    }
    public function welcome(){
        view("welcome");
    }
}

