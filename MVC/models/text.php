<?php

namespace Models;

/**
 * Description of text
 *
 * @author Ionut
 */
class Text extends \Library\Model{
    
    const FILE_PATH = 'public/file/cars.txt';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function totalItems(){
        
        $open = fopen(self::FILE_PATH, "rb");
        $items = 0;
        while (!feof($open)) {
            $items++;
            fgets($open, 256); 
        }
        fclose($open);
        return $items;
    }
    
    public function getItemsForPagination($start, $items){
        
        $open = fopen(self::FILE_PATH, "rb");
        $line = 0;
        while (!feof($open)) {
            $line++;
            if($line >= $start && $line <= ($start + $items)){
                $content[] = explode(', ', fgets($open, 256));
            }
            else{
                fgets($open, 256);
            }
            if($line > ($start + $items)){
                break;
            }
        }
        fclose($open);
        return $content;
    }
    
    public function read($id){
        $open = fopen(self::FILE_PATH, "rb");
        $line = 0;
        while (!feof($open)) {
            $line = explode(', ', fgets($open, 500));
            if($line[0] == $id){
                $content = $line;
            }
            
            if($line[0] > $id){ break; }
        }
        fclose($open);
        return $content;
    }
    
    public function add($data){
        
        $text = " \n" .
                $data['id'] . ', ' . 
                $data['mark'] . ', ' . 
                $data['model'] . ', ' . 
                $data['year'] . ', ' . 
                $data['price'] . ', ' . 
                $data['color'] . ', ';
        
        $open = fopen(self::FILE_PATH, "ab");
        
	fwrite($open, $text);
        fclose($open);
    }
    
    public function save($data, $id, $delete = False){
        $text = $id .', '. $data['mark'] .', '. $data['model'] .', '. $data['year'] .', '. $data['price'] .', '. $data['color'] .", \n";
        $content = file(self::FILE_PATH);

        foreach ($content as $index => $value){
            $line = explode(', ', $value);
            if($line[0] == $id){
                if($delete){ unset($content[$index]); }
                else{ $content[$index] = $text; }
                break;
            }
        }
        
        $open = fopen(self::FILE_PATH, "w");
        $text = NULL;
        for($i = 0; $i < count($content); $i++){
            $text .= $content[$i];
        }
        fwrite($open, $text);
        fclose($open);
        return;
    }
}
