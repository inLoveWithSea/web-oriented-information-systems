<?php
include_once("model/Model.php");

class Controller{
    public $model;

    public function __construct (){
        $this->model = new Model();
    }

    public function invoke (){
        if (isset($_GET['search'])) {
            $books=$this->model->search($_GET['search']);
            include 'view/booklist.php';
        }
        else if (!isset($_GET['book'])) {
            //list of all availiable books
            $books=$this->model->getBookList();
            include 'view/booklist.php';
        }
        else{
            //show requested book
            $book = $this->model->getBook($_GET['book']);
            include 'view/viewbook.php';
        }
    }
}
?>