<?php

require_once("controller/DatabaseAccess.php");

function displayImages() {

    $database = new DatabaseAccess();
    $connection = $database->get_connection();

    $query = "SELECT DISTINCT staff_id, email FROM staff WHERE active = 1";

    $staff_list = $connection->query($query);

    echo "<ul>";

    foreach ($staff_list as $key => $value) {

        $staff_image_path = getImagePath($value['email']);

        $result = "<li><img class='staff' src=\"$staff_image_path\"></img></li>";

        echo $result;
    }
    echo "</ul>";

    echo "<link rel='stylesheet' type='text/css' href='css/styles.css' />";
}

function getImagePath($email){
    global $subjectsplusPath;
    $user = "_" . explode("@", $email)[0];
    $imagePath = $subjectsplusPath . "" . "/assets/users/$user/headshot_large.jpg\"";
    return $imagePath;
}

displayImages();