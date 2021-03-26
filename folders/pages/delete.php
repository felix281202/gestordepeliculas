<?php 

include '../../folders/business/logic.php';

session_start();

$peliculad=$_SESSION['pelicula'];

if(isset($_GET['id'])) {

    $peliculaId_2=$_GET['id'];
    $elementId = deleteElement($peliculad, 'id', $peliculaId_2);
    unset($peliculad[$elementId]);

    $_SESSION['pelicula'] = $peliculad;

}

header("location: ../../index.php");
exit();

?>