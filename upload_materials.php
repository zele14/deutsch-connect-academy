<?php
include 'admin_check.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['material'])) {
        $file = $_FILES['material'];
        $uploadDir = 'materials/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo 'Material successfully uploaded.';
        } else {
            echo 'Failed to upload material.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Materials</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Upload Materials</h1>
    </header>
    <main>
        <form action="upload_materials.php" method="POST" enctype="multipart/form-data">
            <label for="material">Choose material file:</label>
            <input type="file" id="material" name="material" required>
            <button type="submit">Upload</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Deutsch Connect Academy</p>
    </footer>
</body>
</html>
