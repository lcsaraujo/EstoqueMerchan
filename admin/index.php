<?php
ob_start();
session_start();
if(isset($_SESSION['usuariowva']) && (isset($_SESSION['senhawva']))){
	header("Location: admin/home.php");exit;
}
	include("admin/conexao/conecta.php");
?>
<!DOCTYPE html>
<html lang="br">
  
<head>
    <meta charset="utf-8">
    <title>Login - CDE MERCHAN </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> 
<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
<!--<link href="css/pages/signin.css" rel="stylesheet" type="text/css">-->
<link href="css/output.css" rel="stylesheet" type="text/css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/6f555f06ed.js" crossorigin="anonymous"></script>
</head>

<body style="background-image: linear-gradient(to right, #536976, #292E49" class="flex items-align justify-center">

	<div class="navbar navbar-fixed-top ">
	
	<div class="navbar-inner">
		
		<div class="container">
				
			
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
<!--<div class="bg-[url('img/bg.jpg')] w-full h-full md:h-screen  ">-->		

<div class="flex justify-center pt-60 items-end container ">

	<div class="mx-auto w-full max-w-sm shadow shadow-3xl backdrop-blur-md bg-white/30 block flex flex-auto rounded drop-shadow-2xl container">
	
		<form class="m-4 shadow-m-2xl text-center w-full" action="#" method="post" enctype="multipart/form-data">
		<div class=" font-bold aliasing font-sans bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-yellow-600 ">
				<h1 class="flex flex-auto items-center justify-center text-3xl uppercase ">controle de estoque</h1>
				<h1 class="flex flex-auto items-center justify-center text-3xl  mb-5 uppercase">merchan matriz</h1>
			</div>
		 
		
	<?php
		if(isset($_GET['acao'])){
			
			if(!isset($_POST['logar'])){
			
				$acao = $_GET['acao'];
				if($acao=='negado'){
					echo '				<div id="toast-warning" class="flex items-center w-full p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
					<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Warning icon</span>
					</div>
					<div class="ml-3 text-sm font-normal"><strong>Erro ao acessar !</strong> Você precisa estar logar para acessar o sistema..</div>
					<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
						<span class="sr-only">Close</span>
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				</div>';	
				}
			}
		}
		// se clicar no botão entrar no sistema
		?>	
		<?php	
	if(isset($_POST['logar'])){
		// RECUPERAR DADOS FORM
		$usuario = trim(strip_tags($_POST['usuario']));
		$senha	 = trim(strip_tags($_POST['senha']));
		
		// SELECIONAR BANCO DE DADOS
		
		$select = "SELECT * from login WHERE BINARY usuario=:usuario AND BINARY senha=:senha ";
		
		try{
			$result = $conexao->prepare($select);
			$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
			$result->bindParam(':senha', $senha, PDO::PARAM_STR);
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				$usuario = $_POST['usuario'];
				$senha	 = $_POST['senha'];
				$_SESSION['usuariowva'] = $usuario;
				$_SESSION['senhawva'] = $senha;
				
				echo '<div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
				<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Check icon</span>
				</div>
				<div class="ml-3 text-sm font-normal"><strong>Logado com sucesso !</strong> Redirecionando para o sistema.</div>
				<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>';
				
				header("Refresh: 1, home.php?acao=welcome");
			}else{
				echo '
				<div id="toast-warning" class="flex items-center w-full p-2 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
					<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Warning icon</span>
					</div>
					<div class="ml-3 text-sm font-normal"><strong>Erro !</strong> Usuario ou senha incorretos.</div>
					<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
						<span class="sr-only">Close</span>
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				</div>';
			}
			
		}catch(PDOException $e){
			echo $e;
		}
		
		
		
	}
	?>

			<!--<span class="inline-block ps-12 px-32 border bg-red-400 "></span>-->
			<div class="py-6">
			<span>Usuario</span>
				<div class="mb-4 flex flex-auto justify-center w-full">
				
					<input type="text" id="username" name="usuario" value="" class="bg-white/0 mt-0 block rounded text-center apperance-none px-0.5 w-full text-red-700 border-0 border-b-2 border-red-400 hover:border-b-4 focus:border-red-600 focus:outline-none" />
				</div> <!-- /field -->
				<span>Senha</span>
				<div class="mb-4 flex flex-auto justify-center w-full">
					<input type="password" id="password" name="senha" value="" class="bg-white/0 sm:px-6 mt-0 block rounded text-center apperance-none px-0.5 w-full text-red-700 border-0 border-b-2 border-red-400 hover:border-b-4 focus:border-red-600 focus:outline-none"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="w-full flex flex-auto items-center justify-center ">
									
				<button type="submit" name="logar" class="py-2 px-5 text-white bg-red-600/40 hover:bg-red-700 font-sans hover:font-semibold rounded-full  ">Entrar no Sistema</button>
				
			</div> <!-- .actions -->
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<script>
	function selector() {
  $(".alert").fadeTo(1, 1).removeClass('hidden');
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(".alert").addClass('hidden');
    });
  }, 1000); 
}
</script>


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
