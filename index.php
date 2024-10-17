<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Faz conexão com o banco de dados (exemplo usando MySQL)
    $servername = "localhost";
    $username = "root"; // Altere conforme o seu ambiente
    $password = "";     // Altere conforme o seu ambiente
    $dbname = "meu_banco"; // Nome do banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Criptografa a senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara o SQL para inserir os dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";

    // Executa o SQL e verifica se deu certo
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
