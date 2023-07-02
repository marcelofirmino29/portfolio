<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Variáveis dos campos do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configurações do email
    $destinatario = 'marc.firmino@gmail.com';
    $assunto = 'Mensagem do formulário de contato';
    $corpoEmail = "Nome: $nome\nEmail: $email\nMensagem: $mensagem";

    // Configurações adicionais para o envio de email
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "X-Priority: 1\r\n";

    // Enviar o email
    $enviouEmail = mail($destinatario, $assunto, $corpoEmail, $headers);

    if ($enviouEmail) {
        echo 'Email enviado com sucesso!';
    } else {
        echo 'Ocorreu um erro ao enviar o email.';
    }
}
?>

<form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" id="mensagem" rows="4" required></textarea>

    <button type="submit">Enviar</button>
</form>
