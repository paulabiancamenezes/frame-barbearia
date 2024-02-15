<?php
$servername = "localhost";
$dbname = "banco";
$username = "root";
$password = "Sprtuoe243";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $email = $_POST['email'];
    $stmt = $db->prepare("INSERT INTO agendamentos
            (nome, numero, servico, data, hora, email)
             VALUES (:nome, :numero, :servico, :data, :hora, :email)");
            $stmt->execute(['nome' => $nome, 'numero' => $numero,'servico' => $servico, 'data' => $data, 'hora' => $hora, 'email' => $email]); 
        
            echo '<script> alert("Agendamento enviado para o profissional, ele responderá no seu email!")</script>';
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Agendamento</title>
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

        .interface{
            width: 90%;
            margin: 0 auto;
        }

        header{
            background: #FFF;
            box-shadow: 0px 6px 14.7px 0px rgba(0, 0, 0, 0.25);
            padding: 15px 0%;
        }

        img.logo1{
            width: 170px;
        }

        header .interface{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        section{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 80px 5%;
        }
        .agendamento{
            width: 70%;
            background-color: #fff;
            padding: 40px 4%;
            box-shadow: 0px 5px 20px 4px rgba(0, 0, 0, 0.20);
            border-radius: 5px;
        }
        .btn{
            background-color: #ff0f0f;
            color: #fff;
            transition: .5s;
        }
        .btn:hover{
            background-color: #9d0208;
        }
        input{
            outline: none;
            width: 500px;
        }

        section.form i{
            color: #ff0f0f;
        }

        i#eye-icon, #confirm-eye-icon{
            cursor: pointer;
        }

        .form-header{
            box-shadow: 0px 5px 10px 2px rgba(0, 0, 0, 0.20);
            background-color: #ff0f0f;
            color: #fff;
            width: 70%;
            text-align: center;
            border-radius: 5px;
            padding: 50px;
            margin-bottom: 2%;
        }

        /*RODAPÉ*/

        .page4{
            background-color: #00061D ;
            height: 90vh;
            color: #fff;
        }
        .page4 .flex{
            justify-content: space-around;
        }

        .page4 a{
            color: #fff;
            text-decoration: none;
        }

        .page4 img{
            width: 250px;
            margin-bottom: 5%;
        }

        .page4 h3{
            font-size: 40px;
        }

        .page4 p{
            font-size: 25px;
            padding: 5%;
        }

        .page4 li{
            padding: 10px 0px;
        }

        ul.social li{
            padding: 0px 15px;
            display: inline-block;
        }
        .social i{
            transition: .5s;
            font-size: 35px;
        }
        .social i:hover{
            color: #d9d9d9;

        }.page4 .linha-rodape{
            border-top: 1px solid #fff; 
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .page4 p{
            text-align: center;
            color: #FFFFFF95;
        }
@media screen and (max-width: 600px){

    .agendamento{
        width: 100%;
    }
    section{
        padding: 80px 4%;
    }
    .form-header{
        margin-bottom: 6%;
        width: 100%;
        padding: 25px;
    }
    h3{
        font-size: 20px;
    }
}
    </style>
</head>
<body>

	<header>
		<div class="interface"><!--interface-->
			<div class="logo"> <!--logo-->
				<a href="index.php"><img class="logo1" src="img/logo.png"></a>
			</div><!--logo-->
		</div><!--interface-->
	</header>

	<main>
	   <section class="form">
          <div class="form-header">
              <h3>Agende seu horário aqui!</h3>
            </div>
          <div class="agendamento">
            <form method="post">
              <div class="form-group">
                <label for="exampleInputText">Nome:</label>
                <div class="input-group">
                  <span class="input-group-prepend"><div class="input-group-text"><i class="bi bi-person-fill"></i></div></span>
                  <input type="text" class="form-control" id="exampleInputText" required placeholder="Digite seu nome ou apelido conhecido" name="nome">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">E-mail:</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Digite seu e-mail" name="email">
                </div>
                <small id="emailHelp" class="form-text text-muted">Usaremos para enviar a confirmação do profissional.</small>
              </div>

              <div class="form-group">
                <label for="exampleInputText">Número:</label>
                <div class="input-group">
                  <span class="input-group-prepend"><div class="input-group-text"><i class="bi bi-whatsapp"></i></div></span>
                  <input type="text" class="form-control" id="exampleInputText" required placeholder="Digite seu número de telefone" name="numero">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputText">Serviço:</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-scissors"></i></span>
                  <input type="text" class="form-control" id="exampleInputText" required placeholder="Digite o serviço desejado" name="servico">
                </div>
                <small id="emailHelp" class="form-text text-muted">Corte de cabelo, Manicure, Química (progressiva, botox...) etc</small>
              </div>

               <div class="form-group">
                <label for="exampleInputText">Data do agendamento:</label>
                <div class="input-group">
                  <input type="date" class="form-control" id="exampleInputDate" required name="data">
                </div>
              </div>

               <div class="form-group">
                <label for="exampleInputText">Horário do agendamento:</label>
                <div class="input-group">              <input type="time" class="form-control" id="exampleInputTime" name="hora" required>
                </div>
              </div>

              <div class="form-group form-check">
              </div>
              <button type="submit" class="btn">Agendar</button>
            </form>
      </div>
    </section>
	</main>
    <section class="page4">
            <div class="interface">
                <div class="rodape">
                    <img src="img/rodape.png">
                </div>

                <div class="flex">

                     <div class="contato">
                        <h3>Contato</h3>
                            <ul>
                                <li>Barbearia</li>
                                <li>Av. Flacidez Ferreira</li>
                                <li>Gaivotas - Itanhaém, SP</li>
                                <li>Telefone: (00) 12345-6789</li>
                            </ul>
                     </div>

                     <div class="Paginas">
                        <h3>Blog</h3>
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="">Agendamento</a></li>
                            <li><a href="index.php">Serviços</a></li>
                            <li><a href="index.php">Sobre</a></li>
                        </ul>
                     </div>

                     <div class="social">
                         <ul class="social">
                            <li><a href=""><i class="bi bi-whatsapp"></i></a></li>
                            <li><a href=""><i class="bi bi-instagram"></i></a></li>
                            <li><a href=""><i class="bi bi-facebook"></i></a></li>
                            <li><a href=""><i class="bi bi-linkedin"></i></a></li>
                            <li><a href=""><i class="bi bi-tiktok"></i></a></li>
                        </ul>       
                     </div>
                </div>
                <div class="linha-rodape"></div>
                    <p>Todos os direitos reservados por @Barbearia</p>
            </div>
        </section>
</body>