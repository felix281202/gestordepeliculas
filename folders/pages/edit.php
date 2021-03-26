<?php

include '..\..\folders\layouts\layouts.php';
include '..\..\folders\business\logic.php';

session_start();

if (isset($_GET['id'])) {

    $peliculaId = $_GET['id'];

    $_SESSION['pelicula'] = isset($_SESSION['pelicula']) ? $_SESSION['pelicula'] : array();

    $pelicula = $_SESSION['pelicula'];

    $modify = careerFilter($pelicula, 'id', $peliculaId)[0];
    $modifyIndex = deleteElement($pelicula, 'id', $peliculaId);


    if (isset($_POST["name2"]) && isset($_POST["description2"]) && isset($_POST["genero2"])) {
        if (isset($_POST["status2"])) {
            $_POST["status2"] = "Activo";
        } else {
            $_POST["status2"] = "Inactivo";
        }

        $newPelicula= [ "id" => $peliculaId, "name" => $_POST["name2"], "description" => $_POST["description2"], "genero" => $_POST["genero2"], "status" => $_POST["status2"] ];

        $pelicula[$modifyIndex] = $newPelicula;

        $_SESSION['pelicula'] = $pelicula;

        header("location: ../../index.php");
        exit();
    } 

} else {

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
        <form action="edit.php?<?php echo $modify['id'] ?>" method="POST">
            <div class="form-group">
                <label for="name2">Nombre</label>
                <input class="form-control" id="name2" name="name2" value="<?php echo $modify['name'] ?>">
            </div>
            <div class="form-group">
                <label for="description2">Descripcion</label>
                <input class="form-control" id="description2" name="description2" value="<?php echo $modify['description'] ?>">
            </div>
            <div class="form-group">
                <label for="genero2">Genero</label>
                <select class="form-control" name="genero2" id="genero2">
                    <?php foreach ($generos as $genero) : ?>
                        <?php if ($modify['genero'] == $genero): ?>
                            <option selected value='<?php echo $genero ?>'><?php echo $genero ?></option>";
                        <?php else : ?>
                            <option value='<?php echo $genero ?>'><?php echo $genero ?></option>";
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="status2" name="status2">
                <label class="form-check-label" for="status2">Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>



<?php

printFooter(true);

?>