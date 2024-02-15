<?php
  session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $senha = $_POST['senha']; 
      
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
        $stmt = $db->prepare("SELECT id, nome_barbeiro FROM barbeiro WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $result['id'];
            header("Location: barbearia\index.php");
            exit();
        } else {
            // envia um aviso
            echo '<script> alert("Opa! E-mail e/ou senha estão incorretos.")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/penteado.png" type="image/x-icon">
    <!-- fontes do google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- fim do fontes do google -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      body{
        display: flex;
        justify-content: center;
        flex-direction: column;
      }
    </style>
    <title>Login</title>
  </head>
  <body>
    <section class="form">
      <div class="form-header">
          <h3>Olá barbeiro! Bem vindo de volta</h3>
        </div>
      <div class="login">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">E-mail:</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu e-mail" name="email" required>
            </div>
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha:</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="senha" required maxlength="20" minlength="8">
            </div>
          </div>
          <div class="form-group form-check">
          </div>
          <button type="submit" class="btn">Entrar</button>
          <span>Não possui conta? Crie <a href="cadastro.php">aqui mesmo</a></span>
        </form>
      </div>
    </section>
  </body>
</html>