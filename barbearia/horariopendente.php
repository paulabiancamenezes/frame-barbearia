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
	    $stmt = $db->query("SELECT * FROM agendamentos WHERE status_agendamento = 'Pendente'");
	    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	    echo "Erro ao recuperar os agendamentos: " . $e->getMessage();
	    exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="icon" href="../img/penteado.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Horários Pendentes</title>
	<style type="text/css">	
	    strong.status{
	            color: #0077b6;
		}
	</style>		
</head>
<body>			
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
            <li class="item-menu home-ativo">
                <a href="horariopendente.php">
                    <span class="icon"><i class="bi bi-clock"></i></span>
                    <span class="txt-link">Pendentes</span>
                </a>
            </li>
            <li class="item-menu">
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
						<h1>Agendamentos Pendentes.</h1><br>
						<div class="card-content">
							<p>Aqui você pode acessar os horários que os seus clientes agendaram, você pode confirmar ou cancelar o horário, ah e fique tranquilo, seu cliente será notificado da sua decisão.</p>
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
									echo '<a href="aceitar.php?id=' . $agendamento["id"] . '"><button class="confirma"><i class="bi bi-check2"></i></button></a>';
                            		echo '<a href="recusar.php?id=' . $agendamento["id"] . '"><button class="rejeita"><i class="bi bi-x-lg"></i></button></a>';
									echo '</div>';
			                        echo '</div>';
			                    }
		                	}else{
			                	echo '<div class="card-hora pendente">';
                                echo '<div class="card-info">';
                                echo "<strong>Ainda não houve agendamentos</strong>";
                                echo '</div>';
                                echo '</div>';
			                }
						?>
					</div>
				</div><!--flex-->
			</div><!--interface-->
		</section>

	</main>

<script>
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
</body>
</html>