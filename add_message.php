<?php
$db_file = 'database.db';

try {
    $conn = new PDO("sqlite:$db_file");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer le contenu du message
    $content = $_POST['content'];

    // Insérer le message dans la table (vulnérabilité XSS si le contenu n'est pas échappé)
    $sql = "INSERT INTO messages (content) VALUES ('$content')";
    $conn->exec($sql);

    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
