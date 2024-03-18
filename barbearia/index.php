<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
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

    // // Consulta para obter o número total de registros na tabela "agendamentos"
    // $queryCount = "SELECT COUNT(*) as total_registros FROM agendamentos";
    // $stmtCount = $db->prepare($queryCount);
    // $stmtCount->execute();
    // $resultadoCount = $stmtCount->fetch(PDO::FETCH_ASSOC);
    // $total_registros = $resultadoCount['total_registros'];

    $stmt = $db->prepare("SELECT nome_barbeiro, nome_salao, id FROM barbeiro WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $user_data['nome_barbeiro'];
    $salao = $user_data['nome_salao'];
    $id = $user_data['id'];
} else {
    die("Você não está logado então o conteúdo está oculto!<p><a href=\"..\login.php\">Tela de login</a></p>");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial=scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="icon" href="../img/penteado.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Inicio</title>
<style type="text/css">
	h3.title{
		font-weight: 400;
		font-size: 35px;
	}
	@media screen and (max-width:500px){
	section{
		padding: 30px 0px 0px 20%;
	}
	.group-info{
		max-width: 100%;
		margin: 0;
		padding: 0px 10%;
	}
	.info{
		width: 100%;
		padding: 5%;
	}
	.card-group h3{
		font-size: 16px;
	}
	.card-dois{
		display: none;
	}
}
	}
</style>
</head>
<body>
		<nav class="menu-lateral">
			<ul>
				<li class="item-menu home-ativo">
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
		<section class="inicio">
			<div class="interface">
				<div class="group-desativado group-info">	
					<div class="card-desativado info">
						<h3>Olá <?php echo "$nome";?>!</h3><br>
						<div class="card-content">
							<p>Nome do Estabelecimento: <?php echo "<strong>$salao</strong>"; ?></p>
							<p>ID do usuário: <?php echo "<strong>$id</strong>"; ?></p>
						</div><!--CARD CONTENT-->
					</div><!--CARD DESATIVADO-->
						<div class="card-desativado card-dois">
							<h3>Informações complementares:</h3><br>
							<div class="card-content">
								<p>Info complementares serão inseridas aqui.</p>
							</div><!--CARD CONTENT-->
					</div><!--CARD DESATIVADO-->
				</div>	<!---Grupo desativado--> 
				<div class="flex">
					<div class="card-group">
							<div class="flex-card">
							<a href="horariopendente.php">
								<div class="card card-ativado">
									<div class="card-header">
										<h3>Agendamentos Pendentes</h3>
									</div>
										<div class="card-content">
											<i class="bi bi-clock-fill"></i>	
										</div>
								</div><!--card-->
							</a>
							<a href="horarioconfirmado.php">
								<div class="card card-ativado">
									<div class="card-header">
										<h3>Horários Confirmados</h3>
									</div>
										<div class="card-content">
											<i class="bi bi-calendar-check-fill"></i>
										</div>
								</div><!--card-->
							</a>
							<a href="historicoagendamento.php">	
								<div class="card card-ativado">
									<div class="card-header">
										<h3>Histórico de Agendamentos</h3>
									</div>
										<div class="card-content">
											<i class="bi bi-archive-fill"></i>
										</div>
								</div><!--card-->
							</a>
							<a>
								<div class="card card-desativado">
									<div class="card-header">
										<h3>Funcionários</h3>
									</div>
										<div class="card-content">
											<i class="bi bi-people-fill"></i>
										</div>
								</div><!--card-->
							</a>
							<a>	
								<div class="card card-desativado">
									<div class="card-header">
										<h3>Estoque de Produtos</h3>	
									</div>
										<div class="card-content">
											<i class="bi bi-box-seam-fill"></i>
										</div>
								</div><!--card-->
							</a>
							<a>
								<div class="card card-desativado">
									<div class="card-header">
										<h3>Controle Financeiro</h3>
									</div>
										<div class="card-content">
											<i class="bi bi-wallet2"></i>	
										</div>
								</div><!--card-->
							</a>	
						</div><!--Flex-card-->
					</div><!--Card-Group-->
				</div><!--Flex-->
			</div><!--Interface-->
		</section>
	</main>
</body>
</html>