<?php

namespace Controllers;

/**
 * Description of mysql
 *
 * @author Ionut
 */
class Mysql extends \Library\Controller{
    
    const  RADIUS = 3;
    const  ITEMS_ON_PAGE = 8;
    public $currentPage;
    public $start;
    public $totalPages;
    public $totalItems;

    public function __construct() {
        parent::__construct();
    }
    
    public function index($data = 1){
        
        $this->setTotalItems();
        $this->currentPage = $data;
        $this->setStart();
        $this->setTotalPages();
        
        $this->view->currentPage = $this->currentPage;
        $this->view->radius = self::RADIUS;
        $this->view->totalPages = $this->totalPages;
        $this->view->items = $this->model->getItemsForPagination($this->start, self::ITEMS_ON_PAGE);
        $this->view->render('mysql/index');
    }
    
    public function add(){
        $data['mark']   = $_POST['mark'];
        $data['model']  = $_POST['model'];
        $data['year']   = substr($_POST['year'], 0, 4);
        $data['price']  = $_POST['price'];
        $data['color']  = $_POST['color'];
        
        $this->model->add($data);
        header('location: ' . URL . 'mysql/index/1');
    }
    
    public function delete($id){
        if(\Library\Session::get('function') != 'owner'){
            header('location: ' . URL . 'mysql/index/1');
            exit;
        }
        $this->model->delete($id);
        header('location: ' . URL . 'mysql/index/1');
    }
    
    public function save($id){
        $data['mark']   = $_POST['mark'];
        $data['model']  = $_POST['model'];
        $data['year']   = substr($_POST['year'], 0, 4);
        $data['price']  = $_POST['price'];
        $data['color']  = $_POST['color'];
        
        $this->model->edit($id, $data);
        header('location: ' . URL . 'mysql/index/1');
    }

    public function edit($id){
        if(\Library\Session::get('function') != 'owner'){
            header('location: ' . URL . 'mysql/index/1');
            exit;
        }
        $this->view->car = $this->model->read($id);
        $this->view->render('mysql/edit');
    }

    public function read($id){
        $this->view->car = $this->model->read($id);
        $this->view->render('mysql/read');
    }

    private function setTotalItems(){
        $this->totalItems = $this->model->setTotalItems();
    }
    
    private function setStart(){
        $this->start = ($this->currentPage - 1) * self::ITEMS_ON_PAGE;
    }
    
    private function setTotalPages(){
        $this->totalPages = ceil($this->totalItems / self::ITEMS_ON_PAGE);
    }
}
