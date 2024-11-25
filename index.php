<?php
$db_file = 'database.db';

try {
    $conn = new PDO("sqlite:$db_file");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les messages
    $sql = "SELECT * FROM messages ORDER BY id DESC";
    $stmt = $conn->query($sql);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livre d'or</title>
</head>
<body>
  <h1>Livre d'or</h1>

  <h2>Messages :</h2>
  <ul>
    <?php foreach ($messages as $message): ?>
      <li><?= htmlspecialchars($message['content']) ?></li>
    <?php endforeach; ?>
  </ul>

  <h2>Ajouter un message :</h2>
  <form action="add_message.php" method="post">
    <label for="message">Message :</label>
    <textarea id="message" name="content" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" value="Ajouter">
  </form>
</body>
</html>
