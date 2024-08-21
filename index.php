<?php
// Check if a language is set in the URL
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// Include the appropriate language file
if ($lang == 'de') {
    $content_file = 'de.php';
} else {
    $content_file = 'en.php';
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deutsch Connect Academy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Deutsch Connect Academy Logo" id="logo">
        <h1 id="header-title"><?php include($content_file); ?></h1>
        <nav>
            <a href="?lang=en">English</a> | <a href="?lang=de">Deutsch</a>
        </nav>
    </header>
    <main>
        <?php include($content_file); ?>
    </main>
    <footer>
        <p id="footer-text"><?php include($content_file); ?></p>
    </footer>
</body>
</html>
