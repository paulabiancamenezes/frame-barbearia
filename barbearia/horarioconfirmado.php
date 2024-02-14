<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/penteado.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Horarios Confirmados</title>
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
                    <div class="card-hora">
                        <div class="card-info">
                             <p>Nome: <strong>João Victor</strong></p>
                                <p>Nº Telefone: <strong>(12)123654987</strong> </p>
                                <p>hora: <strong>10:00</strong></p>
                                <p>Data: <strong>28/02 - (Segunda-Feira)</strong></p>
                        </div>
                        <div class="btn-tempo">
                            <button class="tempo urgente"><i class="bi bi-stopwatch-fill"></i></button>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="card-hora">
                        <div class="card-info">
                             <p>Nome: <strong>João Victor</strong></p>
                                <p>Nº Telefone: <strong>(12)123654987</strong> </p>
                                <p>hora: <strong>10:00</strong></p>
                                <p>Data: <strong>28/02 - (Segunda-Feira)</strong></p>
                        </div>
                        <div class="btn-tempo">
                            <button class="tempo"><i class="bi bi-stopwatch-fill"></i></button>
                        </div>
                    </div>
                    <div class="card-hora">
                        <div class="card-info">
                             <p>Nome: <strong>João Victor</strong></p>
                                <p>Nº Telefone: <strong>(12)123654987</strong> </p>
                                <p>hora: <strong>10:00</strong></p>
                                <p>Data: <strong>28/02 - (Segunda-Feira)</strong></p>
                        </div>
                        <div class="btn-tempo">
                            <button class="tempo"><i class="bi bi-stopwatch-fill"></i></button>
                            
                        </div>
                    </div>
                </div>
            </div><!--flex-->
        </div><!--interface-->
    </section>
</body>
</html>