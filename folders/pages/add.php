<?php

include '..\..\folders\layouts\layouts.php';
include '..\..\folders\business\logic.php';

session_start();

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["genero"])) {
    if(isset($_POST["status"])) {
        $_POST["status"]="Activo";
    } else {
        $_POST["status"]="Inactivo";
    }

    $_SESSION['pelicula']=isset($_SESSION['pelicula']) ? $_SESSION['pelicula'] : array();
    $pelicula=$_SESSION['pelicula'];

    $peliculaId=1;

    if(!empty($pelicula)) {
        $lastIdElement = lastID($pelicula);
        $peliculaId = $lastIdElement["id"] + 1;
    }

    array_push($pelicula, [ "id"=>$peliculaId, "name"=>$_POST["name"], "description"=>$_POST["description"], "genero"=>$_POST["genero"], "status"=>$_POST["status"] ]);
    $_SESSION['pelicula']=$pelicula;

    header("location: ../../index.php");
    exit();
}


?>


<?php

printHeader(true);

?>

<div style="margin-top: 8px;" class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form action="add.php" method="POST">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="name">Descripcion</label>
                <input class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="name">Genero</label>
                <select class="form-control" name="genero" id="genero">
                    <?php foreach ($generos as $genero) :
                        echo "<option value='$genero'>$genero</option>";
                    ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status">
                <label class="form-check-label" for="status">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>



<?php

printFooter(true);

?>