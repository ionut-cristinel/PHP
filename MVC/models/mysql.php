<?php

namespace Models;

/**
 * Description of Mysql
 *
 * @author Ionut
 */
class Mysql extends \Library\Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setTotalItems(){
        $count = $this->dataBase->prepare("SELECT COUNT(`id`) FROM cars;");
        $count->execute();
        return $count->fetchColumn();
    }
    
    public function getItemsForPagination($start, $items){
        $select = $this->dataBase->prepare("SELECT * FROM cars ORDER BY `ID` DESC LIMIT $start, $items;");
        $select->execute();
        return $select->fetchAll();
    }
    
    public function add($data){
        $insert = $this->dataBase->prepare("INSERT INTO cars (`mark`, `model`, `color`, `price`, `year`) VALUES (:mark, :model, :color, :price, :year);");
        $insert->execute(array(
            ':mark'     =>$data['mark'], 
            ':model'    =>$data['model'], 
            ':color'    =>$data['color'], 
            ':price'    =>$data['price'], 
            ':year'     =>$data['year']
        ));
    }
    
    public function read($id){
        $select = $this->dataBase->prepare("SELECT * FROM cars WHERE `id`=:id;");
        $select->execute(array(':id'=>$id));
        return $select->fetchAll();
    }
    
    public function delete($id){
        $delete = $this->dataBase->prepare("DELETE FROM cars WHERE `id`=:id;");
        $delete->execute(array(':id'=>$id));
    }
    
    public function edit($id, $data){
        $update = $this->dataBase->prepare("UPDATE cars SET `mark`=:mark, `model`=:model, `color`=:color, `price`=:price, `year`=:year WHERE `id`=:id;");
        $update->execute(array(
            ':mark'   =>$data['mark'], 
            ':model'  =>$data['model'], 
            ':color'  =>$data['color'], 
            ':price'  =>$data['price'], 
            ':year'   =>$data['year'], 
            ':id'     =>$id
        ));
    }
}
