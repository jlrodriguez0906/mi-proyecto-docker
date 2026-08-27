<?php
// Archivo: src/index.php
$host = 'db'; // Nombre del servicio definido en docker-compose
$db = 'mi_base_datos';
$user = 'usuario_demo';
$pass = 'clave_secreta_123';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();
$status = "Conexión exitosa a MySQL";
$status_color = "#16a34a";
} catch (\PDOException $e) {
$status = "Error de conexión: " . $e->getMessage();
$status_color = "#dc2626";
$usuarios = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Prueba Docker PHP + MySQL</title>
<style>
body { font-family: Arial, sans-serif; background: #f8fafc; padding: 20px; }
.card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px
rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
.status { padding: 10px; border-radius: 4px; color: white; font-weight: bold; marginbottom: 15px; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
th, td { border: 1px solid #cbd5e1; padding: 8px; text-align: left; }
th { background: #0284c7; color: white; }
</style>
</head>
<body>
<div class="card">
<h2 style="border:none; padding:0; color:#0f172a;">🚀 Demostración PHP + MySQL con
Docker</h2>
<div class="status" style="background-color: <?= $status_color ?>;">
<?= $status ?>
</div>
<h3 style="color:#0f172a;">Lista de Usuarios desde la BD:</h3>
<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
</tr>
<?php foreach ($usuarios as $u): ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= htmlspecialchars($u['nombre']) ?></td>
<td><?= htmlspecialchars($u['email']) ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>
</body>
</html>