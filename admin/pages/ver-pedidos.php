
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
<div class="span12">     
<?php

	if($nivelLogado ==0){
			header("Location: home.php");exit;
		}

	//excluir
	if(isset($_GET['delete'])){
		$id_delete = $_GET['delete'];
		
		
		if($nivelLogado ==1){
		
		// seleciona a imagem
		$seleciona = "SELECT * from pedidos WHERE id= :id_delete";
		try{
			$result = $conexao->prepare($seleciona);	
			$result->bindParam('id_delete',$id_delete, PDO::PARAM_INT);		
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				$loop = $result->fetchAll();
				foreach ($loop as $exibir){
				}
			
				
				// exclui o registo
				$seleciona = "DELETE from pedidos WHERE id=:id_delete";
				try{
					$result = $conexao->prepare($seleciona);
					$result->bindParam('id_delete',$id_delete, PDO::PARAM_INT);				
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O pedido foi excluído.
                </div>';
					}else{
						echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Não foi possível excluir o pedido.
                </div>';	
					}
					
					
					}catch (PDOException $erro){ echo $erro;}
			}
			
		}catch (PDOException $erro){ echo $erro;}
	}else{
		echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Seu nível de usuário não permite a exclusão de registro.
                </div>';	
	}
			
	}

?> 

</div>    
     
     
     
            <div class="span12">	      		
	      		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3 class="text-slate-400 hover:text-sky-400">Visualizar Posts</h3>
			<form action="home.php?acao=ver-pedido" method="post" enctype="multipart/form-data" class="navbar-search pull-right">
          		<input type="text" class="search-query" name="palavra-busca" placeholder="Pesquisar..." style="margin-bottom:10px; border:1px solid black;">
        	</form>
            </div>

            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
				<tr>
                    <th> Codigo</th>
                    <th> Nome do pedido </th>
                    <th> Quantidade</th>
                    <th> Tipo</th>
					<th> Data Cadastro </th>
					<th> Fornecedor </th>
                    <th class="td-actions">Editar/Remover </th>
                  </tr>
                </thead>
                <tbody>
<?PHP
include("functions/limita-texto.php");
$select = "SELECT * from pedidos ORDER BY id DESC LIMIT 5";
		

if(empty($_GET['pg'])){}
	else{ 
	$pg =$_GET['pg'];
	if(!is_numeric($pg)){
		
		echo '<script language= "JavaScript">
						location.href="home.php?acao=ver-pedido";
			</script>';
	}
	
	}
	
	
	if(isset($pg)){ $pg = $_GET['pg'];}else{ $pg = 1;}
	
	if(isset($_POST['palavra-busca'])){
		$quantidade = 10000;
	}else{
		$quantidade = 10;
	}
	
	
	$inicio = ($pg*$quantidade) - $quantidade;
	
	if(isset($_POST['palavra-busca'])){
		$busca = addslashes($_POST['palavra-busca']);
		$select = "SELECT * from pedidos WHERE descricao LIKE '%$busca%' ORDER BY id DESC LIMIT $inicio, $quantidade";	
	}else{
		$select = "SELECT * from pedidos ORDER BY id DESC LIMIT $inicio, $quantidade";
	}
	
	
	$contagem =$inicio + 1;

		try{
			$result = $conexao->prepare($select);			
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				while($mostra = $result->FETCH(PDO::FETCH_OBJ)){
?>           
                  <tr>
                  	<td><?php echo $mostra->codpedido;?></td>
                    <td> <?php echo $mostra->descricao;?> </td>
                    <td> <?php echo $mostra->quantidade;?> </td>
                    <td> <?php echo limitarTexto($mostra->descricao, $limite=200)?> </td>
					<td> <?php echo $mostra->data;?> </td>
					<td> <?php echo $mostra->nomefornecedor;?> </td>
                    <td class="td-actions"><a href="home.php?acao=editar-pedido&id=<?php echo $mostra->id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                    <a href="home.php?delete=<?php echo $mostra->id;?>" class="btn btn-danger btn-small" onClick="return confirm('Deseja realmente excluir o post?')"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
<?php
}				
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Aviso!</strong> Não há pedidos cadastrado em nosso banco de dados.
                </div>';
			}
			
		}catch(PDOException $e){
			echo $e;
		}
?>                  
                  
                
                </tbody>
              </table>  
            </div> 
            <!-- /widget-content --> 

<!-- inicio botoes -->

<style>
/* paginacao */

.paginas{width:100%;padding:10px 0;text-align:center;background:#fff;height:auto;margin:10px auto;}
.paginas a{width:auto;padding:4px 10px;background:#eee;color:#333;margin:0px 2.5px; }
.paginas a:hover{text-decoration:none;background:#00BA8B; color:#fff;}

<?php
	if(isset($_GET['pg'])){
		$num_pg = $_GET['pg'];	
	}else{$num_pg = 1;}
?>

.paginas a.ativo<?php echo $num_pg;?>{background:#00BA8B; color:#fff;}

</style>


<?php
if(isset($_POST['palavra-busca'])){
	$busca = addslashes($_POST['palavra-busca']);
	$sql = "SELECT * from pedidos WHERE descricao LIKE '%$busca%'";	
}else{
	$sql = "SELECT * from pedidos";
}
	
	try{
			$result = $conexao->prepare($sql);			
			$result->execute();
			$totalRegistros = $result->rowCount();
		}catch(PDOException $e){
			echo $e;
		}
		
		if($totalRegistros <=$quantidade){}
		else{
			$paginas = ceil($totalRegistros/$quantidade);
			if($pg > $paginas){
				echo '<script language= "JavaScript">
					location.href="home.php?acao=ver-pedido";
					</script>';}
			$links = 5;	
			
			if(isset($i)){}
			else{$i = '1';}

?>

<div class="paginas">

	<a href="home.php?acao=ver-pedido&pg=1">Primeira Página</a>
    
    <?php
		if(isset($_GET['pg'])){
			$num_pg = $_GET['pg'];	
		}
		
		for($i = $pg-$links; $i <= $pg-1; $i++){
			if($i<=0){}
			else{ 
	?>
     
    <a href="home.php?acao=ver-pedido&pg=<?php echo $i;?>"  class="ativo<?php echo $i;?>"><?php echo $i;?></a>
     
         
<?php  }} ?>
    
    
    <a href="home.php?acao=ver-pedido&pg=<?php echo $pg;?>" class="ativo<?php echo $i;?>"><?php echo $pg;?></a>
    

<?php
	for($i = $pg+1; $i <= $pg+$links; $i++){
		if($i>$paginas){}
		else{
?>
			
	<a href="home.php?acao=ver-pedido&pg=<?php echo $i;?>" class="ativo<?php echo $i;?>"><?php echo $i;?></a>		
		
<?php
		}
	}
?>

<a href="home.php?acao=ver-pedido&pg=<?php echo $paginas;?>">Última página</a>		

    

</div><!-- paginas -->





<?php
		}
?>

<!-- fim botoes paginacao -->            


          </div>
          <!-- /widget --> 
      		</div><!-- span 12 -->
            
            
    </div><!-- row -->        
     
      
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<script type="text/javascript" src="editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>