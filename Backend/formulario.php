<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];
    $feminino = $_POST['feminino'];
    $masculino = $_POST['masculino'];
    $outro = $_POST['outro'];

    $hashed_password = password_hash(password: $password, algo: PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare(query: "INSERT INTO users (nome, email, telefone, conteudo, data, feminino, masculino, outro) VALUES (:nome, :email. :telefone, :conteudo, :data, :feminino, :masculino, :outro)");
        $stmt->bindParam(param: ':nome', var: $nome);
        $stmt->bindParam(param: ':email', var: $email);
        $stmt->bindParam(param: ':telefone', var: $telefone);
        $stmt->bindParam(param: ':conteudo', var: $conteudo);
        $stmt->bindParam(param: ':data', var: $data);
        $stmt->bindParam(param: ':feminino', var: $feminino);
        $stmt->bindParam(param: ':masculino', var: $masculino);
        $stmt->bindParam(param: ':outro', var: $outro);
        $stmt->execute();
        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>