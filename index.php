<?php 
declare(strict_types = 1);
include_once("logic.php");
include_once("classes.php");
include_once("filemanager.php");
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fontfaces.css">

<div class="span-page primary-theme" id="header">
    <h2>Gastenboek</h2>
</div>

<div id="elements-container">

    <div id="submission-container">
        <form method="POST">
            <h1>Laat een berichtje achter!</h1>
            <div class="flex-col">
                <label for="name">Naam</label>
                <input type="text" name="name" required id="name-input">
                <label for="text">Tekst</label>
                <textarea name="text" id="text-input" required></textarea>
                <input type="submit" class="btn" name="submit" value="Plaats bericht">
            </div>
        </form> 
    </div>

    <div id="message-container">
        <?php
            $pagemanager = new PageManager();
            $listofids = $pagemanager->getSubmitIDs();
            if (!empty($_POST)){
                foreach($_POST as $delete => $postvalue){
                    if (strpos($delete, 'delete') === 0){
                        $id = str_replace('delete', '', $delete);
                        $pagemanager->deleteMessage($id);
                    }
                }
            }
            if (empty($_POST['submit'])){
                $pagemanager->displayMessages();
            }
            if (!empty($_POST['submit'])){
                $pagemanager->onSubmitPress();
                $pagemanager->displayMessages();
                header('Location: index.php'); //This is so posting doesn't reoccur every time
            }
        ?>
    </div>

</div>

<div class="span-page primary-theme" id="footer">
</div>

