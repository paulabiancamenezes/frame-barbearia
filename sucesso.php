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
        $stmt = $db->prepare("SELECT nome_barbeiro FROM barbeiro WHERE id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $user_data['nome_barbeiro'];
    } else {
        die("Você não está logado então o conteúdo está oculto!<p><a href=\"login.php\">Tela de login</a></p>");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loading.css">
    <title>Página com Loading</title>
    <style>
    	span{
    		font-size: 26px;
    		color: #ff0f0f;
    	}
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0; 
        }

        .spinner {
            position: relative;
            width: 15.7px;
            height: 15.7px;
        }

        .spinner div {
            animation: spinner-4t3wzl 1.875s infinite backwards;
            background-color: #ff0f0f;
            border-radius: 50%;
            height: 100%;
            position: absolute;
            width: 100%;
        }

        .spinner div:nth-child(1) {
            animation-delay: 0.15s;
            background-color: rgba(255, 15, 15, 0.9);
        }

        .spinner div:nth-child(2) {
            animation-delay: 0.3s;
            background-color: rgba(255, 15, 15, 0.8);
        }

        .spinner div:nth-child(3) {
            animation-delay: 0.45s;
            background-color: rgba(255, 15, 15, 0.7);
        }

        .spinner div:nth-child(4) {
            animation-delay: 0.6s;
            background-color: rgba(255, 15, 15, 0.6);
        }

        .spinner div:nth-child(5) {
            animation-delay: 0.75s;
            background-color: rgba(255, 15, 15, 0.5);
        }

        @keyframes spinner-4t3wzl {
            0% {
                transform: rotate(0deg) translateY(-200%);
            }

            60%, 100% {
                transform: rotate(360deg) translateY(-200%);
            }
        }

        .content.hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="spinner" id="loading">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="content hidden" id="page-content">
        <!-- Conteúdo da página aqui -->
        <h1>Olá <span><?php echo $nome?></span></h1>
        <p>Seu login/Cadastro foi executado com sucesso.</p>
        <br>
        <a href="logout.php">Voltar</a>
    </div>

    <script>
    	document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById("loading").style.display = "none";
        document.getElementById("page-content").style.display = "block";
    }, 4000);
});
	</script>
</body>
</html>
