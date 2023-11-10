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

$objjson = [json_encode(new stdClass)];


$file = file_get_contents(filename: 'files/users.json', use_include_path: true);
    $name = $_POST['name'];
    $message = $_POST['message'];
    $postArray = array('name'=>$name, 'message'=>$message);
    array_push($objjson, $postArray);
    echo print_r($objjson) . '<br>';
    echo var_dump($objjson) . '<br>';
    echo " check if  array" . is_array ($objjson);
    echo "--------------------------------------" . '<br>';
    file_put_contents('files/users.json', json_encode($objjson));
}
}


    
echo (new Post())->addPost();

?>