<?php
try {
    $db = new PDO(dsn: 'sqlite:users.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o  banco de dados: " . $e->getMessage();
    exit();
}
?>