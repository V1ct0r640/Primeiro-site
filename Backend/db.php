<?php
// db.php: Conexão com o banco de dados SQLite
try {
    $db = new PDO('sqlite:users.db');  // Conectando ao banco de dados SQLite
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Ativar o modo de erro para exceções
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit();
}

// Criar a tabela 'users' caso não exista
try {
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL,
        telefone TEXT NOT NULL,
        conteudo TEXT NOT NULL,
        data TEXT NOT NULL,
        feminino TEXT NOT NULL,
        masculino TEXT NOT NULL,
        outro TEXT NOT NULL
    )");
    echo "Tabela 'users' criada com sucesso";
} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage();
}
?>
