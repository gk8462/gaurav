<?php
$link = mysqli_connect('localhost', 'root', '', 'cricket');

if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}



?>