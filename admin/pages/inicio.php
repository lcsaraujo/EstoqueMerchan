
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
     
     		
            <div class="span12">
            
            <?php
				if(isset($_GET['acao'])){
					$acao = $_GET['acao'];
					if($acao=='welcome'){
						echo 
               '<div class="alert alert-info">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Olá, '.$nomeLogado.'!</strong> Seja Bem vindo ao <strong>Dashboard</strong> !
               </div>';
					}
				}
			 ?>  
      		</div>
            
            
            <div class="span12">	      		
	      		<div id="target-1" class="widget">	      			
	      			<div class="widget-content">	      				
			      		<h1><strong>Seja Bem vindo <?php echo $nomeLogado ?></strong> </h1>			      		
			      		<p> 
		      		</div> <!-- /widget-content -->
	      		</div> <!-- /widget -->
      		</div><!-- span 12 -->
            
            
    </div><!-- row -->  
    
    
   
<?php
	//excluir
	if(isset($_GET['delete'])){
		$id_delete = $_GET['delete'];
		
		// seleciona a imagem
		$seleciona = "SELECT * from produtos WHERE id= :id_delete";
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
				$seleciona = "DELETE from produtos WHERE id=:id_delete";
				try{
					$result = $conexao->prepare($seleciona);
					$result->bindParam('id_delete',$id_delete, PDO::PARAM_INT);				
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O post foi excluído.
                </div>';
					}else{
						echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Não foi possível excluir o post.
                </div>';	
					}				
					
					}catch (PDOWException $erro){ echo $erro;}			}			
		}catch (PDOWException $erro){ echo $erro;}
			
	}

?> 

           
     
        
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Últimos Produtos Cadastrados</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Codigo</th>
                    <th> Nome do Produto </th>
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
$select = "SELECT * from produtos ORDER BY id DESC LIMIT 5";
		
		try{
			$result = $conexao->prepare($select);			
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				while($mostra = $result->FETCH(PDO::FETCH_OBJ)){
?>           
                  <tr>
                  	<td><?php echo $mostra->codproduto;?></td>
                    <td> <?php echo limitarTexto($mostra->descricao, $limite=200)?> </td>
                    <td> <?php echo $mostra->quantidade;?> </td>
										<td> <?php echo $mostra->tipo;?> </td>
										<td> <?php echo $mostra->data;?> </td>
										<td> <?php echo $mostra->nomefornecedor;?> </td>
                    <td class="td-actions"><a href="home.php?acao=editar-produto&id=<?php echo $mostra->id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                    <a href="home.php?delete=<?php echo $mostra->id;?>" class="btn btn-danger btn-small" onClick="return confirm('Deseja realmente excluir o post?')"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
<?php
}				
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Aviso!</strong> Não há produtos cadastrado em nosso banco de dados.
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
          </div>
          <!-- /widget --> 
          
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