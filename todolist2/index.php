<?php
include 'logic.php';
session_start();

// Inisialisasi array jika belum ada
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Tambah tugas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tugas'])) {
    tambahTugas($_POST['tugas']);
}

// Ubah status tugas
if (isset($_GET['selesai'])) {
    ubahStatus($_GET['selesai']);
}

// Hapus tugas
if (isset($_GET['hapus'])) {
    hapusTugas($_GET['hapus']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm rounded-4 p-4">
            <h2 class="text-center mb-4 text-primary">📝 ToDo List</h2>

            <!-- Form Tambah -->
            <form method="POST" class="input-group mb-4">
                <input type="text" name="tugas" class="form-control" placeholder="Isi ToDo List" required>
                <button type="submit" class="btn btn-outline-primary">Tambah</button>
            </form>

            <!-- Daftar Tugas -->
            <?php tampilkanDaftar(); ?>
        </div>
    </div>
</body>
</html>
