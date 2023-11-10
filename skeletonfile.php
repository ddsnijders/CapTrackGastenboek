<?php declare(strict_types = 1);
// include("classes.php");

interface CreateFile{

    
        // createJson();
        // addPost();
    }
    

class Post implements CreateFile{
    //properties

    //methods


    public function createJson(){ 
        $file;
        $current;

        if(!file_exists('files/users.json')) {   
            fopen('files/users.json', 'w'); 
            
            $file =file_put_contents('files/users.json', json_encode('{}'));
            json_encode('{}');
            // echo "creating file one moment please......" . "<br>";
            // echo (new Post())->addPost();     
        }
    }
    public function addPost(){

        $objjson = [json_encode(new stdClass)];
        echo print_r($objjson) . '<br>';
        echo var_dump($objjson) . '<br>';
        echo " check if  array" . is_array ($objjson);
        echo "--------------------------------------" . '<br>';



        // file_get_contents(filename: 'files/users.json', use_include_path: true);
        // echo print_r($file) . '<br>';
        // echo var_dump($ile) . '<br>';
        // echo is_string($file);
        // echo "--------------------------------------" . '<br>';
        // file = json_encode('[]');
        // $file = file_put_contents(filename: 'files/users.json', use_include_path: true);
        // $tempArray = json_decode($file, true);$
        // $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        
        // echo print_r(file) . '<br>';
        // echo var_dump($baseArray) . '<br>';
        // echo is_array($tempArray);
        // echo "--------------------------------------" . '<br>';
        // $name = $_POST['name'];
        // $message = $_POST['message'];
        // $postArray = array('name'=>$name, 'message'=>$message);
        // $finalArray = array_push($tempArray, $postArray);
        // $converToObject = ToObject($finalArray);
        // $json = json_encode($converToObject);
        // $obj3 = (object)[];
        // echo $obj3;
        // echo var_dump($obj3);
        // file_put_contents('files/users.json', json_encode($object), FILE_APPEND);
    }
    function ToObject($Array) {
     
        // Create new stdClass object
        $object = new stdClass();
         

        // Use loop to convert array into
        // stdClass object
        foreach ($Array as $key => $value) {
            if (is_array($value)) {
                $value = ToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }

    public function getPost(){
        $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        $toJson = json_encode($file);
        $stringToArray = json_decode($toJson, True);
    }
    public function jsonSerialize(){
        return $this->stringToArray;
 
    }

    public function saveMessageToFile(){
   
    }


    public function getMessageFromFile(){

    }   

}
// echo (new Post())->createJson();
// echo print_r($convertedObj);
echo (new Post())->addPost();
// echo (new Post())->getPost();
// echo (new Post())->showPost();

    ?>


