<?php
include 'db.php';

try {
    $db->exec(statement: "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    email TEXT NOT NULL,
    telefone TEXT NOT NULL,
    conteudo TEXT NOT NULL,
    data TEXT NOT NULL,
    feminino TEXT NOT NULL,
    masculino TEXT NOT NULL,
    outro TEXT NOT NULL,
    )");
    echo "Tabela 'users' criada com sucesso";
} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage();
}
?>