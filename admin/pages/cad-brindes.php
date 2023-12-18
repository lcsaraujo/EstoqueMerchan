<script type="text/javascript">
jQuery(function($){
   $("#date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
});



</script>
<div class="  ">   
                <div class="flex flex-wrap text-2xl">
	      				<i class=" fa fa-file pe-5"></i>
	      				<h3 class="justify-center text-2xl font-montserrat">Cadastrar Brindes</h3>
	  				</div> <!-- /widget-header -->
                     			
	      			<div class="">	      				
			      		
                        <?php
	  	if(isset($_POST['cadastrar'])){
			$codproduto 		= trim(strip_tags($_POST['codproduto']));
			$descricao 			= trim(strip_tags($_POST['descricao']));
			$quantidade 		= trim(strip_tags($_POST['quantidade']));
			$tipo 				= trim(strip_tags($_POST['tipo']));
			$fan_forn		= trim(strip_tags($_POST['fan_forn']));
			$data 			= trim(strip_tags($_POST['data']));
			
			
			$insert = "INSERT into produtos (codproduto, descricao, quantidade, tipo, fan_forn, data ) VALUES (:codproduto, :descricao, :quantidade, :tipo, :fan_forn, :data)";
		
		try{
			$result = $conexao->prepare($insert);
			$result->bindParam(':codproduto', $codproduto, PDO::PARAM_STR);
			$result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
			$result->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
			$result->bindParam(':tipo', $tipo, PDO::PARAM_STR);
			$result->bindParam(':fan_forn', $fan_forn, PDO::PARAM_STR);
			$result->bindParam(':data', $data, PDO::PARAM_STR);
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				echo '<div class="alert alert-success">
                      <button type="button" class="close" dat-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O produto foi cadastrado.
                </div>';
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" dat-dismiss="alert">×</button>
                      <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o produto.
                </div>';
			}			
		}catch(PDOException $e){
			echo $e;
		}
	}
	 ?>
     	
                        <div class="flex justify-start  " id="formcontrols">
								<form id="edit-profile" class="flex justify-start p-10  rounded-md" action="" method="post" enctype="multipart/form-descricao">
									<div class="-mx-3">
										
										<div class="">											
											<label class="font-montserrat font-bold">Codigo do Produto</label>
											<div class="controls">
												<input type="text" class="w-40 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" id="codproduto" value="" name="codproduto" onChange="javascript:this.value=this.value.toUpperCase();">
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->
										
										
										<div class="py-5">											
											<label class="font-bold font-montserrat">Nome do Produto</label>
											<div class="controls">
												<input type="text" class="w-96 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" id="nomeproduto" value="" name="descricao" onChange="javascript:this.value=this.value.toUpperCase();">
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->
										
										<div class="">											
											<label class="font-bold font-montserrat" for="username">Quantidade</label>
											<div class="controls">
												<input type="text" class="w-40 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" id="quantidade" value="" name="quantidade">
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->
                                        
                                        
                                        <div class="py-5 ">											
											<label class="font-bold font-montserrat" for="username">Tipo</label>
											<div id="tipo" class="justify-center">
												<input type="text" value="Material" id="tipo" class="w-20 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" name="tipo"></input>


												<div class="valor-tipo">
	
												</div>
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->

										
										
										<div class="">											
											<label class="font-bold font-montserrat" for="email">Fornecedor</label>
											<div class="controls">
												<select class="w-60 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" id="fan_forn" name="fan_forn">
													<option></option>
													<?php

													$sql = "SELECT id, fan_forn from fornecedores ORDER BY id ASC";

													$resultado = $conexao->query($sql);

													while($dados = $resultado->fetch()){
														echo "<option value=",$dados['fan_forn'],">", $dados['fan_forn'],"</option>";
													}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->

                                        <div class="pt-5">
											<label class="font-montserrat font-bold">Imagem do Brinde</label>
                                            <div>
												<input type="file" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-md file:border-0
      file:text-sm file:font-semibold
      file:bg-base-200 file:text-sky-500
      hover:file:bg-base-100">
                                            </div>
                                        </div>

										<div class="py-5">											
											<label class="font-bold">Data</label>
											<div class="controls">
												<input type="data" name="data" class="w-40 rounded-md bg-base-100 border-b-2 border-sky-400 hover:border-b-2 hover:border-indigo-800 focus:outline-none" id="date" value="<?php $data = date("d/m/Y"); echo "$data"; ?>" name="data">
											</div> <!-- /controls -->				
										</div> <!-- /flex-1 -->
										
                        				<div class="my-8">
											<input type="reset" onclick="volta()" class="btn btn-sm bg-red-500 hover:bg-red-700 text-black" value="Cancelar">
											<input type="submit" name="cadastrar" class="btn btn-sm bg-green-500 hover:bg-green-700 text-black" value="Salvar">
										</div> <!-- /form-actions -->
                  				</form>
						</div>
                        
 


<script>
    function volta(){
        window.history.back();
    }

	const product = document.getElementById("codproduto");
	const qtd = document.getElementById("quantidade");

product.addEventListener("keypress", somenteNumeros);
qtd.addEventListener("keypress", somenteNumeros);
date.addEventListener("keypress", somenteNumeros);

function somenteNumeros(e) {
			
	var charCode = (e.which) ? e.which : e.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	e.preventDefault();
}

</script>