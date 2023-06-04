<?php include("includes/header.php");?>
</head>
<body>
<?php include("includes/topo.php");?>



<?php
		
	if($nivelLogado ==0){
			include("usuario.php");
		}
	else if($nivelLogado ==1){
		if(isset($_GET['acao'])){
			$acao = $_GET['acao'];	

				if($acao=='welcome' || $acao=='home'){include("pages/inicio.php");}	
				
				// cadastro produto
				if($acao=='cad-produto'){include("pages/cad-produto.php");}	
				
				// exibir produto
				if($acao=='ver-produto'){include("pages/ver-produto.php");}
				
				// editar produto
				if($acao=='editar-produto'){include("pages/edt-produto.php");}



				//cadastrar fornecedores
				if($acao=='cad-fornecedores'){include("pages/cad-fornecedores.php");}

				//exibir fornecedores
				if($acao=='ver-fornecedores'){include("pages/ver-fornecedores.php");}

				//editar fornecedores
				if($acao=='editar-fornecedores'){include("pages/edt-fornecedores.php");}

				
			
	}
	else{
		include("pages/inicio.php");
	}
}
?>




<?php include("includes/footer.php");?>
</body>
</html>
