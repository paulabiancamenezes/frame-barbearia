<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "Sprtuoe243";
$dbname = "banco";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $salao = $_POST['salao'];
  $email = $_POST['email'];
  $nome = $_POST['nome'];
  $senha = $_POST['senha'];
  $confirmasenha = $_POST['confirmasenha'];

  $stmt = $db->prepare("SELECT * FROM barbeiro WHERE email = :email"); 
        $stmt->execute(['email' => $email]);
        $barbeiro = $stmt->fetch();

  $stmt = $db->prepare("SELECT * FROM barbeiro WHERE nome_salao = :salao"); 
        $stmt->execute(['salao' => $salao]);
        $nomesalao = $stmt->fetch();      

  if($barbeiro){
    echo '<script> alert("Este e-mail já está sendo utilizado!")</script>';
  }else if ($nomesalao){
    echo '<script> alert("Já existe um nome igual ao seu salão. Use outro nome!")</script>';
  }else if($senha != $confirmasenha){   
    echo '<script> alert("Senhas não coincidem!")</script>';
  }else{
    $stmt = $db->prepare("INSERT INTO barbeiro
            (nome_salao, email, nome_barbeiro, senha)
             VALUES (:salao, :email, :nome, :senha)");
            $stmt->execute(['salao' => $salao, 'email' => $email,'nome' => $nome, 'senha' => $senha]); 
        
            $_SESSION['user_id'] = $db->lastInsertId();
            header("Location: barbearia\index.php");
            exit();
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/penteado.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      *{
        font-family: 'Barlow', sans-serif;
      }
    </style>
    <title>Cadastre-se</title>
  </head>
  <body>

    <section class="form">
      <div class="form-header">
          <h3>Olá barbeiro! Crie sua conta aqui</h3>
        </div>
      <div class="login">
        
        <form method="post">
          <div class="form-group">
            <label for="exampleInputText">Salão:</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-shop-window"></i></span>
              <input type="text" class="form-control" id="exampleInputText" required placeholder="Digite o nome do salão ou barbearia" name="salao">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">E-mail:</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Digite seu e-mail" name="email">
            </div>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email.</small>
          </div>

          <div class="form-group">
            <label for="inlineFormInputGroupUsername">Nome:</label>
            <div class="input-group">
              <span class="input-group-prepend"><div class="input-group-text"><i class="bi bi-person"></i></div></span>
              <input type="text" class="form-control" id="inlineFormInputGroupUsername" required placeholder="Digite seu nome completo" name="nome">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Senha:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" required placeholder="Digite sua senha" maxlength="20" minlength="8" name="senha">
                <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                    <i class="bi bi-eye-fill" id="eye-icon"></i>
                </span>
            </div>
            <small id="passwordHelpInline" class="text-muted">Deve ter entre 8 e 20 caracteres.</small>
        </div>

          <div class="form-group">
            <label for="exampleInputPassword2">Confirme sua senha:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirmPassword" required placeholder="Digite sua senha" name="confirmasenha">
                <span class="input-group-text password-toggle" onclick="togglePassword('confirmPassword')">
                    <i class="bi bi-eye-fill" id="confirm-eye-icon"></i>
                </span>
            </div>
          </div>

          <div class="form-group form-check">
          </div>
          <button type="submit" class="btn">Enviar</button>
          <span>Já possui conta? Acesse-a <a href="login.php">aqui mesmo</a></span>
        </form>
      </div>
    </section>
    
    <script>
      function togglePassword(inputId) {
          const passwordInput = document.getElementById(inputId);
          const eyeIcon = document.getElementById(inputId === 'password' ? 'eye-icon' : 'confirm-eye-icon');
  
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
              eyeIcon.classList.remove('bi-eye-fill');
              eyeIcon.classList.add('bi-eye-slash-fill');
          } else {
              passwordInput.type = 'password';
              eyeIcon.classList.remove('bi-eye-slash-fill');
              eyeIcon.classList.add('bi-eye-fill');
          }
      }
    </script>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>