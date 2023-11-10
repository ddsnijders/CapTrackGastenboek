<?php declare(strict_types = 1);


class Post
{
public function addPost(){

if(!file_exists('files/users.json')) {   
    fopen('files/users.json', 'w'); 
    
    // $file =file_put_contents('files/users.json', json_encode());
    
    // echo "creating file one moment please......" . "<br>";
    // echo (new Post())->addPost();     
}




$file = file_get_contents(filename: 'files/users.json', use_include_path: true);
   $jsonArray = json_decode($file,true);
   $baseArray = array(array());
   
    // $objjson = [];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $postArray = array('name'=>$name, 'message'=>$message);
    foreach ($baseArray as $arrayValue){
          array_push($baseArray, $postArray);
    }

    // for($i = 0; $i < count($baseArray); $i++){
    //     array_push($baseArray, $arrayValue[i]);
    // }
    // echo array_push($jsonArray, $postArray);
    echo print_r($jsonArray) . '<br>';
    echo var_dump($jsonArray) . '<br>';
    // echo " check if  array" . is_array ($objjson);
    echo "--------------------------------------" . '<br>';
    file_put_contents('files/users.json', json_encode($baseArray));

    file_get_contents(filename: 'files/users.json', use_include_path: true);
    
}
}


    
echo (new Post())->addPost();

?>