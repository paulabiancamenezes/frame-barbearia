<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
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
	<title>Anotações do Atendimento</title>
<style type="text/css">
	h3.title{
		font-weight: 400;
		font-size: 35px;
	}
	form{
		border-radius: 5px;
		width: 35%;
		height: 100%;
		box-shadow: 0px 2px 4px 1px #0005;
	}
	input , textarea{
		border-radius: 8px;
		border: 0.5px solid #adb5bd;
		outline: none;
		width: 100%;
		height: 45px;
		margin-top: 8%;
	}
	input::placeholder, textarea::placeholder{
		padding: 2% 4%;
		font-size: 14px;
	}
	.flex-form{
		padding: 8% 10%;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	button{
	cursor: pointer;
	margin-top: 10%;
	width: 150px;
	height: 50px;
	border: none;
	border-radius: 5px;
	background: #FF0F0F;
	color: #fff;
	font-size: 17px;
	font-weight: 400;
	transition: 0.2s;
	}
	button:hover{
		background-color: #8d0801;
	}
		@media screen and (max-width:500px){
	section{
		padding: 30px 0px 0px 20%;
	}
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
	                    <h1>Anotações do Atendimento.</h1><br>
	                    	<div class="card-content">
	                        	<p>Aqui você pode realizar anotações sobre o atendimento e todos os pontos que deseja ressaltar, essa sessão é totalmente opicional caso deseje registrar algum acontecimento.</p>
                    		</div><!--CARD CONTENT-->
                	</div><!--CARD DESATIVADO-->
            	</div><!--Flex-->
        	</div><!--Interface-->
    	</section>
    	<section>
    		<div class="interface">
    			<div class="flex">.
			    	<form method="post">
			    		<div class="flex-form">
							<h3>Formulário do Atendimento.</h3>
							<input type="text" placeholder="Quem conduziu o atendimento?">
				    		<textarea placeholder="Como foi o atendimento?"></textarea>
							<button class="btn-anota">Salvar</button>
			    		</div>
			    	</form>
			    </div>
		    </div>
		</section>		    	
</body>
</html>
