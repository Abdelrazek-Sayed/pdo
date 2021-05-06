
<?php



try {
    $conn = new PDO("mysql:host=localhost;dbname=pdo", 'root', '');
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}
