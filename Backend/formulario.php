<?php
include 'db.php';  // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];
    $feminino = isset($_POST['feminino']) ? 'Sim' : 'Não';
    $masculino = isset($_POST['masculino']) ? 'Sim' : 'Não';
    $outro = isset($_POST['outro']) ? 'Sim' : 'Não';

    try {
        // Prepara a query para inserir os dados no banco de dados
        $stmt = $db->prepare("INSERT INTO users (nome, email, telefone, conteudo, data, feminino, masculino, outro) 
                              VALUES (:nome, :email, :telefone, :conteudo, :data, :feminino, :masculino, :outro)");
        // Faz o bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':feminino', $feminino);
        $stmt->bindParam(':masculino', $masculino);
        $stmt->bindParam(':outro', $outro);

        // Executa a query
        $stmt->execute();
        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>
