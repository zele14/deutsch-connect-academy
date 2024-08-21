<?php
include 'admin_check.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['test'])) {
        $file = $_FILES['test'];
        $uploadDir = 'tests/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo 'Test successfully uploaded.';
        } else {
            echo 'Failed to upload test.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Tests</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Upload Tests</h1>
    </header>
    <main>
        <form action="upload_tests.php" method="POST" enctype="multipart/form-data">
            <label for="test">Choose test file:</label>
            <input type="file" id="test" name="test" required>
            <button type="submit">Upload</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Deutsch Connect Academy</p>
    </footer>
</body>
</html>
