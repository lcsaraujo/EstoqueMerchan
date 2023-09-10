<?php
ob_start();
session_start();
if (!isset($_SESSION['usuariowva']) && (!isset($_SESSION['senhawva']))) {
    header("Location: ../index.php?acao=negado");
    exit;
}
include("conexao/conecta.php");
include("includes/logout.php");

$usuarioLogado = $_SESSION['usuariowva'];
$senhaLogado = $_SESSION['senhawva'];

// seleciona a usuario logado
$selecionaLogado = "SELECT * from login WHERE usuario=:usuarioLogado AND senha=:senhaLogado";
try {
    $result = $conexao->prepare($selecionaLogado);
    $result->bindParam('usuarioLogado', $usuarioLogado, PDO::PARAM_STR);
    $result->bindParam('senhaLogado', $senhaLogado, PDO::PARAM_STR);
    $result->execute();
    $contar = $result->rowCount();

    if ($contar = 1) {
        $loop = $result->fetchAll();
        foreach ($loop as $show) {
            $nomeLogado = $show['nome'];
            $userLogado = $show['usuario'];
            $senhaLogado = $show['senha'];
            $nivelLogado = $show['nivel'];
        }
    }
} catch (PDOException $erro) {
    echo $erro;
}

?>

<!DOCTYPE html>
<html data-theme="light" lang="pt-br" class="h-screen w-screen">

<head>
    <meta charset="utf-8">
    <title>CDE - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.0/dist/full.css" rel="stylesheet" type="text/css" /> -->
    <link href="css/output.css" rel="stylesheet">
    <link href="css/merchan.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="node_modules/daisyui/dist/full.css" rel="stylesheet">

    <!-- JS -->
    <script src="js/style.js"></script>
    <script src="js/tailwind.config.js"></script>
    <!-- <script src="https://kit.fontawesome.com/6f555f06ed.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>

</head>
<header>
    <nav class="navbar bg-base-300 text-base-content">
        <div class="navbar-start w-100">
            <i class="fa fa-house px-2">
                <a class="font-sans text-sm font-semibold md:text-xl"></i>Painel <?php if ($nivelLogado == 0) {
                                                                                        echo "do Usuario";
                                                                                    } elseif ($nivelLogado == 1) {
                                                                                        echo "Admistrativo";
                                                                                    } ?></a>
        </div>

        <div class="navbar-end h-3 pe-4 ps-8">
            <?php if ($nivelLogado == 1) { ?>
                <div class="dropdown dropdown-end p-6">

                    <label tabindex="0" class="p-2">
                        <i class="fa fa-bars"></i>
                    </label>

                    <ul class="menu menu-sm dropdown-content shadow bg-base-100 rounded-box w-100 " style="z-index: 1;" tabindex="0">
                        <li class="px-20 invisible"></li>
                        <li class="w-100"><a class="text-xs w-100 inline" href="home.php?acao=cad-produto">Entrada Mercadorias</a></li>
                        <li class="w-100"><a class="text-xs w-100 inline" href="home.php?acao=cad-pedidos">Saída Mercadorias</a></li>
                        <li class=" "></li>
                        <li class="w-100 "><a class="text-xs w-100 inline" href="home.php?acao=cad-usuarios">Cadastrar Usuários</a></li>
                        <li class="w-100"><a class="text-xs w-100 inline" href="home.php?acao=cad-fornecedores">Cadastrar Fornecedores</a></li>
                        <li class=" "></li>
                        <li><a onClick="my_modal_1.showModal()" class="text-xs">Sair</a></li>
                    </ul>
                <?php } ?>
                <?php if ($nivelLogado == 0) { ?>
                    <div class="dropdown dropdown-end p-6">
                        <label tabindex="0" class="p-2">
                            <i class="fa fa-bars"></i>
                        </label>
                        <ul class="menu menu-xs dropdown-content shadow bg-base-100 rounded-box " tabindex="0">
                            <li><a onClick="my_modal_1.showModal()" class="text-xs">Sair</a></li>
                        </ul>
                    <?php } ?>
                    </div>
                </div>
                <!-- modal de saída de sistema -->
                <dialog id="my_modal_1" class="modal">
                    <form method="dialog" class="modal-box">
                        <h3 class="font-bold text-lg">Sair do sistema</h3>
                        <p class="py-4">Você deseja sair do sistema ?</p>
                        <div class="modal-action">
                            <a class="btn btn-primary w-24" href="?sair">Sair</a>
                            <button class="btn btn-error w-24">Voltar</button>
                        </div>
                    </form>
                </dialog>

                
    </nav>
</header>