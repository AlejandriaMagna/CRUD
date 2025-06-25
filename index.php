<?php
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h2>Proyectos</h2>
    <br>
    
    <a href="login.php" class="btn btn-primary mb-3">Ingresar como administrador</a>
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
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<h2 class="text-center text-primary fw-bold mb-4">Regístrate como usuario</h2>

<form id="registroForm" action="procesar.php" method="POST" onsubmit="return validarFormulario()" class="p-4 rounded shadow bg-white">
  <div class="mb-3">
    <label class="form-label fw-semibold">Nombre completo</label>
    <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
  </div>
  <div class="mb-3">
    <label class="form-label fw-semibold">Correo electrónico</label>
    <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
  </div>
  <div class="mb-3">
    <label class="form-label fw-semibold">Contraseña</label>
    <input type="password" name="clave" class="form-control" placeholder="Contraseña (mínimo 6 caracteres)" required>
  </div>
  <div class="mb-4">
    <label class="form-label fw-semibold">Repetir contraseña</label>
    <input type="password" name="clave2" class="form-control" placeholder="Repetir contraseña" required>
  </div>
  <div class="d-grid">
    <button type="submit" class="btn btn-success btn-lg">Registrarse</button>
  </div>
</form>

<script src="script.js"></script>


</body>
</html>