<?php

include 'folders\layouts\layouts.php';
include 'folders\business\logic.php';

session_start();

$_SESSION['pelicula']=isset($_SESSION['pelicula']) ? $_SESSION['pelicula'] : array();

$peliculaList = $_SESSION['pelicula'];

if(!empty($peliculaList)) {

    if(isset($_GET["genero"])) {
        $peliculaList=careerFilter($peliculaList, "genero", $_GET["genero"]);
    }
}

?>

<?php

printHeader();

?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Registro de Peliculas</h1>
            <p class="lead text-muted">Aquí se podrá apreciar la lista de Peliculas agregadas.</p>
            <p>
                <a href="folders\pages\add.php" class="btn btn-primary my-2">Agregar Pelicula</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row" style="margin-bottom: 12px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div class="btn-group">
                        <a href="index.php?genero=Accion" class="btn btn-dark text-light">Accion</a>
                        <a href="index.php?genero=Terror" class="btn btn-dark text-light">Terror</a>
                        <a href="index.php?genero=Comedia" class="btn btn-dark text-light">Comedia</a>
                        <a href="index.php?genero=Suspenso" class="btn btn-dark text-light">Suspenso</a>
                        <a href="index.php?genero=Documentales" class="btn btn-dark text-light">Documentales</a>
                        <a href="index.php" class="btn btn-dark text-light">TODOS</a>
                        </div>
                    </div>
                </div>

            <div class="row">

            <?php if(empty($peliculaList)): ?>

                <h2>No hay peliculas registradas.</h2>

            <?php else : ?>

                <?php foreach($peliculaList as $peliculas): ?>

                    <div class="col-md-4 bg-dark" style="margin-right: 8px; margin-bottom: 8px;">
                    <div class="card mb-4 shadow-sm bg-dark text-light">
                        <div class="card-body size-letter">
                            <p>Nombre: <?php echo $peliculas["name"] ?></p>
                            <p>Descripcion: <?php echo $peliculas["description"] ?></p>
                        </div>
                        <div class="card-body text-light">
                            <p>Genero: <?php echo $peliculas["genero"] ?></p>
                            <p>Status: <?php echo $peliculas["status"] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <hr>
                                </hr>
                                <div class="btn-group">
                                    <a href="folders\pages\delete.php?id=<?php echo $peliculas['id']; ?>" class="btn btn-sm btn-outline-secondary text-light">Borrar</a>
                                    <a href="folders\pages\edit.php?id=<?php echo $peliculas['id']; ?>" class="btn btn-sm btn-outline-secondary text-light">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            <?php endif; ?>


            </div>
        </div>
    </div>

</main>

<?php

printFooter();

?>