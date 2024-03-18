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
        $stmt = $db->query("SELECT * FROM agendamentos WHERE status_agendamento = 'Confirmado'");
        $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao recuperar os agendamentos: " . $e->getMessage();
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/penteado.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Horarios Confirmados</title>
    <style type="text/css">
        strong.status {
            color: #319835;
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
            <li class="item-menu home-ativo">
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

    <section class="agenda">
        <div class="interface">
            <div class="flex">
                <div class="card-desativado">
                    <h1>Agendamentos Confirmados.</h1><br>
                    <div class="card-content">
                        <p>Aqui você pode visualizar os horários que você confirmou para atendimento. Os próximos horário irão subir até que cheguem no topo.</p>
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
                                    echo'<div class="btn-confirma">';
                                    echo'<a href="encerrado.php?id=' . $agendamento["id"] . '"><button class="confirma"><i class="bi bi-check2-square"></i></button></a>';
                                    echo'<a href="anota.php"><button class="anotacao"><i class="bi bi-pencil-square"></i></button></a>';
                                    echo'</div>';
                                    echo'</div>';
                                    }
                                }else{
                                    echo '<div class="card-hora">';
                                    echo '<div class="card-info">';
                                    echo "<strong>Você ainda não confirmou nenhum agendamento.</strong>";
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                </div>
            </div><!--flex-->
        </div><!--interface-->
    </section>
</body>
</html>