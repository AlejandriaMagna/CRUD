<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  $imagen = $_FILES['imagen']['name'];
  $tmp = $_FILES['imagen']['tmp_name'];
  move_uploaded_file($tmp, "uploads/$imagen");

  $sql = "INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) 
          VALUES ('$titulo', '$descripcion', '$url_github', '$url_produccion', '$imagen')";

  $conn->query($sql);
  header("Location: index.php");
  exit;
}
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">Agregar Nuevo Proyecto</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Título del Proyecto</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Ej: Sistema de Gestión" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Descripción</label>
                                <textarea name="descripcion" maxlength="200" class="form-control" rows="3" placeholder="Descripción (máx 200 palabras)" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">URL GitHub</label>
                                <input type="url" name="url_github" class="form-control" placeholder="https://github.com/usuario/proyecto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">URL Producción</label>
                                <input type="url" name="url_produccion" class="form-control" placeholder="https://misitio.com/proyecto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Imagen del Proyecto</label>
                                <input type="file" name="imagen" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Guardar Proyecto</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-outline-primary">Volver al Portafolio</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>