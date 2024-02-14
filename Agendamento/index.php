<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barbearia</title>
	<link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/barbeiro.png" type="image/x-icon">

    <!-- fontes do google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- fim do fontes do google -->

	 <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- fim icons bootstrap -->
</head>
<body>
	<header>
		<div class="interface"><!--interface-->
			<div class="logo"> <!--logo-->
				<a href="index.php"><img class="logo1" src="img/logo.png"></a>
			</div><!--logo-->
		
			<nav class="menu-desktop">
				<ul>
					<li><a href="agendamento.php">Agendamento</a></li>
					<li><a href="#sobre">Sobre</a></li>
					<li><a href="#serviços">Serviços</a></li>
					<li><a href="#contato">Contato</a></li>
				</ul>
			</nav>
		</div><!--interface-->
	</header>

	<!-- conteudo principal do site -->
	<main>
		<section class="page1" id="incio">
			 <div class="interface">
                <div class="flex">
			<div class="img-topo-site efeito-img-topo">
				<img class="fototopo" src="img/fundo.jpg" alt="">
			 </div><!--img-topo-site-->

			 <div class="txt-topo-site efeito-txt-topo">
                        <h1>Barbearia</h1>
                        <p>Sinta-se mais!</p>
                            <div class="btn-contato btn-repositorio">
                                <a href="Agendamento.php">
                                    <button class="btn-agendar">Agende seu horário!</button>
                                </a>
                            </div> 
                    </div> <!--text-topo-site-->
                </div><!--flex-->
            </div><!--interface-->        
		</section>

		<section class="page2" id="serviços">
            <div class="interface">
                <h2 class="titulo">Nossos <span>Serviços.</span></h2>
                <div class="flex">
                    <div class="especialidades-box efeito-especialidades1">
                        <i class="bi bi-scissors"></i>
                        <div class="linha-horizontal"></div>
                        <h3>Serviços $$</h3>
                        

                    </div> <!--especialidades-box-->
                    <div class="especialidades-box efeito-especialidades2">
                        <<i class="bi bi-scissors"></i>
                        <div class="linha-horizontal"></div>
                        <h3>Serviços $$</h3>
                        
                        
                    </div> <!--especialidades-box-->
                    <div class="especialidades-box efeito-especialidades3">
                        <i class="bi bi-scissors"></i>
                        <div class="linha-horizontal"></div>
                        <h3>Serviços $$</h3>

                        
                    </div> <!--especialidades-box-->
                </div> <!--flex-->
            </div> <!--interface-->
        </section> <!--especialidades-->

		
		<section class="page3" id="sobre">
			<div class="interface">
                <div class="flex">
                <div class="txt-sobre efeito-txt-sobre">
                    <h2 class="titulo">Sobre a <span>Barbearia.</span></h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a 
                        </p>
                        <p>galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                </div> <!--txt-sobre--> 
                <div class="img-sobre efeito-img-sobre">
                        <img class="foto1" src="img/corte.png" alt="devguru__">
                    </div> <!--img-sobre-->
                </div> <!--flex-->
            </div> <!--interface-->
		</section>


		<section class="page4" id="contato">
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
					 		<li><a href="#inicio">Inicio</a></li>
					 		<li><a href="agendamento.php">Agendamento</a></li>
					 		<li><a href="#serviços">Serviços</a></li>
					 		<li><a href="#sobre">Sobre</a></li>
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
	</div>
	</main>
</body>
</html>