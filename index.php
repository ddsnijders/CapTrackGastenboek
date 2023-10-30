<?php 
declare(strict_types = 1);
?>

<div>
    <form method="POST">
        <h1>Laat je naam en een stukje tekst achter</h1>
        <label for="name">Naam</label>
        <input type="text" name="name">
        <label for="text">Tekst</label>
        <input type="text" name="text">
        <input type="submit" name="submit">
</div>

<?php
    include("classes.php");
    include("logic.php");

    if (!empty($_POST['submit'])){
        onSubmitPress();
    }
?>

