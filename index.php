<?php
ob_start();
session_start();
if(isset($_SESSION['usuariowva']) && (isset($_SESSION['senhawva']))) {
    header("Location: admin/home.php");
    exit;
}
include("admin/conexao/conecta.php");
?>
<!DOCTYPE html>
<html lang="br">
  
<head>
    <meta charset="utf-8">
    <title>Login - CDE MERCHAN </title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.0/dist/full.css" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" href="admin/css/style.css">
	<link rel="stylesheet" href="admin/css/merchan.css">
	<link rel="stylesheet" href="admin/css/output.css">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="admin/css/all.css" rel="stylesheet" >
    <link href="node_modules/daisyui/dist/full.css" rel="stylesheet">
	<script src="admin/css/teste.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://kit.fontawesome.com/6f555f06ed.js" crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script> -->
	<script src="admin/js/tailwind.config.js"></script>
	<script src="admin/js/style.js"></script>
</head>

<body >
	<div class="flex flex-auto justify-center items-center h-screen w-screen ">
	<div class="bg-white w-96 h-auto shadow-md rounded-2xl">
		<form class="text-center h-full w-full pt-8" action="#" method="post" enctype="multipart/form-data">
			
			<div class=" font-bold aliasing font-sans bg-clip-text text-indigo-500 pb-8">
					<i class="fa fa-box-open"></i>
					<h1 class="flex flex-auto items-center justify-center text-xl uppercase ">controle de</h1>
					<h1 class="flex flex-auto items-center justify-center text-3xl uppercase ">estoque</h1>
					
				</div>

				<div class="flex flex-auto justify-center items-center">
					<span class="border-b-2 border-base-500 w-72"></span>
				</div>

		<?php
            if(isset($_GET['acao'])) {

                if(!isset($_POST['logar'])) {

                    $acao = $_GET['acao'];
                    if($acao=='negado') {
                        echo '<div class="alert alert-error flex flex-auto justify-center mx-auto items-center w-80 py-2">
						<svg xmlns="http://www.w3.org/2000/svg" class=" stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
						<span>Erro! Você precisa estar logado para acessar o sistema.</span>
					</div>';
                    }
                }
            }
            // se clicar no botão entrar no sistema
?>	
			<?php
        if(isset($_POST['logar'])) {
            // RECUPERAR DADOS FORM
            $usuario = trim(strip_tags($_POST['usuario']));
            $senha	 = trim(strip_tags($_POST['senha']));

            // SELECIONAR BANCO DE DADOS

            $select = "SELECT * from login WHERE BINARY usuario=:usuario AND BINARY senha=:senha ";

            try {
                $result = $conexao->prepare($select);
                $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $result->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result->execute();
                $contar = $result->rowCount();
                if($contar>0) {
                    $usuario = $_POST['usuario'];
                    $senha	 = $_POST['senha'];
                    $_SESSION['usuariowva'] = $usuario;
                    $_SESSION['senhawva'] = $senha;

                    echo '<div class="alert alert-success flex flex-auto justify-center mx-auto items-center w-80 py-2">
						<div class="waveform">
							<div class="waveform__bar"></div>
							<div class="waveform__bar"></div>
							<div class="waveform__bar"></div>
							<div class="waveform__bar"></div>
						</div>							
					
						<span>Logado com sucesso!</span>
						</div>';

                    header("Refresh: 1, admin/home.php?acao=welcome");
                } else {
                    echo '
					<div class="alert alert-error flex flex-auto justify-center mx-auto items-center w-80 py-2">
						<svg xmlns="http://www.w3.org/2000/svg" class=" stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
						<span>Erro! Usuario ou senha incorretos.</span>
					</div>';
                }

            } catch(PDOException $e) {
                echo $e;
            }



        }
?>

				<!--<span class="inline-block ps-12 px-32 border bg-indigo-400 "></span>-->
				<div class="py-8">
				
				<span>Usuario</span>
					<div class="mb-4 flex flex-auto justify-center ">
					
						<input type="text" id="username" name="usuario" value="" class="bg-white/0 hover:bg-white/0 px-16 mt-0 block rounded text-center apperance-none px-0.5  text-indigo-700 border-0 border-b-2 border-indigo-400 hover:border-b-4 focus:border-indigo-600 focus:outline-none" />
					</div> <!-- /field -->
					<span>Senha</span>
					<div class="mb-4 flex flex-auto justify-center">
						<input type="password" id="password" name="senha" value="" class="bg-white/0 px-16 mt-0 block rounded text-center apperance-none px-0.5  text-indigo-700 border-0 border-b-2 border-indigo-400 hover:border-b-4 focus:border-indigo-600 focus:outline-none"/>
					</div> <!-- /password -->
					
				</div> <!-- /login-fields -->
				
				<div class="w-full flex flex-auto items-center justify-center ">
										
					<button type="submit" name="logar" class="mb-20 py-4 px-14 text-white bg-blue-600/40 hover:bg-indigo-700 text-xl font-sans hover:font-semibold rounded-xl  ">Entrar no Sistema</button>
					
				</div> <!-- .actions -->
			</form>
			
		</div> <!-- /content -->
		
	</div> <!-- /account-container -->
	</div>
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
		<defs>
			<linearGradient id="bg">
				<stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
				<stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
				<stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
			</linearGradient>
			<path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
		</defs>
		<g>
			<use xlink:href='#wave' opacity=".3">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="10s"
          calcMode="spline"
          values="270 230; -334 180; 270 230"
          keyTimes="0; .5; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacity=".6">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="8s"
          calcMode="spline"
          values="-270 230;243 220;-270 230"
          keyTimes="0; .6; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacty=".9">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="6s"
          calcMode="spline"
          values="0 230;-140 200;0 230"
          keyTimes="0; .4; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
		</g>
	</svg>


</body>

</html>
