<?php

namespace Controllers;

/**
 * Description of text
 *
 * @author Ionut
 */
class Text  extends \Library\Controller{
    
    const  RADIUS = 3;
    const  ITEMS_ON_PAGE = 8;
    public $currentPage;
    public $start;
    public $totalPages;
    public $totalItems;
    
    public function __construct() {
        parent::__construct();
        
        $this->view->items = array(0,0,0,0,0);
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
        
        $this->view->test = $this->totalPages;
        $this->view->render('text/index');
    }
    
    public function read($id){
        
        $this->view->car = $this->model->read($id);
        $this->view->render('text/read');
    }
    
    public function add(){
        
        $this->setTotalItems();
        $this->setTotalPages();
        $data['id']     = $this->totalItems + 1;
        $data['mark']   = $_POST['mark'];
        $data['model']  = $_POST['model'];
        $data['year']   = substr($_POST['year'], 0, 4);
        $data['price']  = $_POST['price'];
        $data['color']  = $_POST['color'];
        
        $this->model->add($data);
        header('location: ' . URL . 'text/index/' . $this->totalPages);
    }
    
    public function save($id){
        
        $data['mark']   = $_POST['mark'];
        $data['model']  = $_POST['model'];
        $data['year']   = substr($_POST['year'], 0, 4);
        $data['price']  = $_POST['price'];
        $data['color']  = $_POST['color'];
        
        $this->model->save($data, $id);
        header('location: ' . URL . 'text/index/1');
        return;
    }
    
    public function delete($id){
        $data['mark']   = NULL;
        $data['model']  = NULL;
        $data['year']   = NULL;
        $data['price']  = NULL;
        $data['color']  = NULL;
        $this->model->save($data, $id, TRUE);
        header('location: ' . URL . 'text/index/1');
        return;
    }

    public function edit($id){
        
        $this->view->car = $this->model->read($id);
        $this->view->render('text/edit');
    }

    private function setTotalItems(){
        $this->totalItems = $this->model->totalItems();
    }
    
    private function setStart(){
        $this->start = ($this->currentPage - 1) * self::ITEMS_ON_PAGE;
    }
    
    private function setTotalPages(){
        $this->totalPages = ceil($this->totalItems / self::ITEMS_ON_PAGE);
    }
}
