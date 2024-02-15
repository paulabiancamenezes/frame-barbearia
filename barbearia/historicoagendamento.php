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
        section.hora i{
            color: #ff0f0f;
            font-size: 40px;
        }
        strong.status {
            color: #ff0f0f;
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
                                    echo'<div class="btn-tempo">';
                                    echo'<button class="temp"><i class="bi bi-clock-history"></i></button>';
                                    echo'</div>';
                                    echo'</div>';
                                    }
                                }else{
                                    echo '<div class="card-hora">';
                                    echo '<div class="card-info">';
                                    echo "<strong>Ainda não houve agendamentos</strong>";
                                    echo'<div class="btn-tempo">';
                                    echo'<button class="btn-tempo"><i class="bi bi-hourglass-split"></i></button>';
                                    echo'</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                    </div>
                </div><!--flex-->
            </div><!--interface-->
        </section>
    </main>
</body>
</html>