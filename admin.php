<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h2>Dashboard Administrador</h2>
    <a href="add.php" class="btn btn-success mb-3">+ Agregar Proyecto</a>
    <a href="logout.php" class="btn btn-outline-danger mb-3 ms-2">Cerrar sesión</a>
    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="uploads/<?= htmlspecialchars($row['imagen']) ?>" class="card-img-top" alt="Imagen del proyecto">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['titulo']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= htmlspecialchars($row['url_github']) ?>" class="btn btn-primary btn-sm" target="_blank">GitHub</a>
                    <a href="<?= htmlspecialchars($row['url_produccion']) ?>" class="btn btn-info btn-sm" target="_blank">Enlace</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>