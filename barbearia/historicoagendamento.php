<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banco";    
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
        exit();
    }
    try {
        $stmt = $db->query("SELECT * FROM agendamentos");
        $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        echo "Erro ao recuperar os agendamentos: " . $e->getMessage();
        exit();
    }
        try {
        $stmt = $db->query("SELECT * FROM agendamentos WHERE status_agendamento = 'Recusado' OR status_agendamento ='Encerrado'");
        $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao recuperar os agendamentos: " . $e->getMessage();
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/penteado.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Histórico de Agendamentos</title>
    <style>
        strong.status {
            color: #ff0f0f;
        }
        /*MODAL*/

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        border-radius:10px;
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 0;
        width: 35%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }

        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
        margin-top: -7px;
        transition: .3s;
        color: white;
        float: right;
        font-size: 35px;
        font-weight: 400;
        }

        .close:hover,
        .close:focus {
          text-decoration: none;
          cursor: pointer;
        }

        .modal-header {
        border-radius:10px 10px 0px 0px;
          padding: 16px 16px;
          background-color: #202020;
          color: white;
          text-align: center;
        }

        .modal-body {
            text-align:center;
            padding: 15px 16px;
            font-size: 18px;
        }

        .modal-footer {
          padding: 2px 16px;
          color: white;
        }
        .modal .btn-confirma{
            gap:20px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .btn-confirma button{
          border-radius: 5px;
          width: 60px;
          height: 50px;
          cursor: pointer;
          border: none;
          font-size: 22px;
          transition: .3s;
          padding: 2%;
          }
        .modal button.confirma{     
           margin-bottom: 5%;
           color: #fff;
           background-color: #0077b6;
        }
        .modal button.confirma:hover{
           background-color: #023e8a;
        }
        .modal button.rejeita:hover{
           background-color: #810000;
        }
        .modal button.rejeita {
        color: #fff;
           background-color: #d13535;
        }
        /*FIM DO MODAL*/
    </style>
</head>
<body>
    <!-- Modal content -->
    <!-- <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Deseja excluir esse agendamento do seu histórico?</h2>
            </div>
            <div class="modal-body">
                <p>Caso confirme, essa opção <strong>não</strong> poderá ser revertida.</p>
            </div>
            <div class="modal-footer">
                <div class="btn-confirma">
                <button class="confirma" type="submit"><i class="bi bi-check2"></i></button>
                <button class="rejeita" id="fechar"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>
        </div>
    </div>
 -->    <!-- Fim do Modal -->
    <nav class="menu-lateral">
        <ul>
            <li class="item-menu">
                <a href="index.php">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="txt-link">Home</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="horarioconfirmado.php">
                    <span class="icon"><i class="bi bi-calendar-check"></i></span>
                    <span class="txt-link">Horários</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="horariopendente.php">
                    <span class="icon"><i class="bi bi-clock"></i></span>
                    <span class="txt-link">Pendentes</span>
                </a>
            </li>
            <li class="item-menu home-ativo">
                <a href="historicoagendamento.php">
                    <span class="icon"><i class="bi bi-archive"></i></span>
                    <span class="txt-link">Histórico</span>
                </a>
            </li>
            <li class="item-menu">
                     <a href="configuracao.php">
                        <span class="icon"><i class="bi bi-gear"></i></span>
                        <span class="txt-link">Configurações</span>
                    </a>
                </li>
            <li class="item-menu">
                <a href="..\logout.php">
                    <span class="icon"><i class="bi bi-box-arrow-in-right"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="agenda">
            <div class="interface">
                <div class="flex">
                    <div class="card-desativado">
                        <h1>Histórico de Agendamentos.</h1><br>
                        <div class="card-content">
                            <p>Aqui você pode visualizar o seu histórico de agendamentos, onde terá acesso aos clientes que atendeu, o dia e o horário.</p>
                        </div><!--CARD CONTENT-->
                    </div><!--CARD DESATIVADO-->
                </div><!--Flex-->
            </div><!--Interface-->
        </section>

        <section class="hora">
            <div class="interface">
                <div class="flex">
                    <div class="hora-group">
                       <?php
                            if ($agendamentos) {
                                foreach ($agendamentos as $agendamento) {
                                    echo '<div class="card-hora">';
                                    echo '<div class="card-info">';
                                    echo '<p>Nome: <strong>' . htmlspecialchars($agendamento["nome"]) . '</strong></p>';
                                    echo '<p>Nº Celular: <strong>' . htmlspecialchars($agendamento["numero"]) . '</strong></p>';
                                    echo '<p>Serviço: <strong>' . htmlspecialchars($agendamento["servico"]) . '</strong></p>';
                                    echo '<p>horario: <strong>' . htmlspecialchars($agendamento["hora"]) . '</strong></p>';
                                    echo '<p>Data: <strong>' . htmlspecialchars($agendamento["data"]) . '</strong></p>';
                                    echo '<p>Status: <strong class="status">' . htmlspecialchars($agendamento["status_agendamento"]) . '</strong></p>';
                                    echo '</div>';
                                    echo '<div class="btn-confirma">';
                                    echo '<a href="anotacoes.php"><button class="anotacao"><i class="bi bi-journal"></i></button></a>';
                                    echo '<a href="deleta.php?id=' . $agendamento["id"] . '"><button class="rejeita"><i class="bi bi-trash2"></i></button></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    }
                                }else{
                                    echo '<div class="card-hora">';
                                    echo '<div class="card-info">';
                                    echo '<strong>Seu histórico está vazio por enquanto.</strong>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                    </div>
                </div><!--flex-->
            </div><!--interface-->
        </section>
    </main> 
<!-- <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var botaoFechar = document.getElementById("fechar");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

 // Adiciona um ouvinte de eventos para o clique no botão de fechar
  botaoFechar.addEventListener("click", function() {
    // Oculta o modal ao definir o estilo de exibição como "none"
    modal.style.display = "none";
  });

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
 --></body>
</html>