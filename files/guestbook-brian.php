<?
// if (isset($_POST['name'])) { $name = getName($_POST['name']); }
if (isset($_POST['message'])) { $message = getMessage($_POST['message']); }

function getMessage(){
    $fileName = file_get_contents('./files/users.txt', use_include_path: true);
    if (!empty($_POST['message'])) {
       
    }
    
    file_put_contents($file, $message);
    // $firstJson = json_decode($file);
   
}

// if (isset($_POST)) {
//     getMessage();
//      echo "uitkomst" . $firstJson;
// }

?>