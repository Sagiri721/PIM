<?php

class Book {

    public $id, $name, $subtitle, $authors, $date, $pages, $googleBooks, $categories, $outline, $image, $language;
    private $rawData;

    public function __construct($information){

        $this->rawData = $information;

        $this->id = $information["/id"];
        
        $this->image =  valueOf($information["imageLinks/thumbnail"]);
        $this->name = $information["volumeInfo/title"];
        $this->subtitle = valueOf($information["volumeInfo/subtitle"]);
        $this->language = valueOf($information["volumeInfo/language"]);

        $flag = 0;
        while ($flag >= 0) {
            
            if (!isset($information["authors/".$flag])){

                $flag = -1;
                break;
            }
            
            $this->authors[$flag] = $information["authors/".$flag];
            $flag += 1;
        }

        $this->date = valueOf($information["volumeInfo/publishedDate"]);
        $this->pages = valueOf($information["volumeInfo/pageCount"]);

        $this->googleBooks = valueOf($information["/selfLink"]);

        if (isset($information["categories/0"])){
    
            $flag = 0;
            while ($flag >= 0) {
                
                if (!isset($information["categories/".$flag])){

                    if($flag == 0) $this->categories[0] = "Autor desconhecido";
                    $flag = -1;
                    break;
                }
                
                $this->categories[$flag] = $information["categories/".$flag];
                $flag += 1;
            }
        }

        $this->outline = valueOf($information["volumeInfo/description"]);
    }
}

function valueOf($value){

    return isset($value) ?  $value : NULL;
}