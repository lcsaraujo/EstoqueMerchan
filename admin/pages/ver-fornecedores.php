<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="span12">
					<?php



					//excluir
					if (isset($_GET['delete'])) {
						$id_delete = $_GET['delete'];


						if ($nivelLogado == 1) {

							// seleciona a imagem
							$seleciona = "SELECT * from fornecedores WHERE id= :id_delete";
							try {
								$result = $conexao->prepare($seleciona);
								$result->bindParam('id_delete', $id_delete, PDO::PARAM_INT);
								$result->execute();
								$contar = $result->rowCount();
								if ($contar > 0) {
									$loop = $result->fetchAll();
									foreach ($loop as $exibir) {
									}

									// exclui o registo
									$seleciona = "DELETE from fornecedores WHERE id=:id_delete";
									try {
										$result = $conexao->prepare($seleciona);
										$result->bindParam('id_delete', $id_delete, PDO::PARAM_INT);
										$result->execute();
										$contar = $result->rowCount();
										if ($contar > 0) {
											echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O usuario foi excluído.
                </div>';
										} else {
											echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Não foi possível excluir o usuario.
                </div>';
										}
									} catch (PDOException $erro) {
										echo $erro;
									}
								}
							} catch (PDOException $erro) {
								echo $erro;
							}
						} else {
							echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Seu nível de usuário não permite a exclusão de registro.
                </div>';
						}
					}

					?>

				</div>



				<div class="font-semibold uppercase px-4 w-100">
					<div class="widget widget-table action-table">
					<div class="w-100 h-100 join items-center flex flex-row"> <i class="fa fa-list p-4"></i><h3 class="text-xl">Visualizar Fornecedores</h3></div>
					<div class="w-100 text-end pb-5">
						<a class="btn btn-primary w-30 h-4" href="home.php?acao=cad-fornecedores">Cadastrar</a>
					</div>	
					
					<form action="home.php?acao=ver-fornecedores" method="post" enctype="multipart/form-data" class=" col-end-3 p-0 m-0 w-100 text-center sm:text-end">
						<input type="search" class="focus:outline-none input-sm  border-s-2 border-y-2 pe-0 rounded-s-xl border-indigo-500 join-item " style="line-height: 0;" name="palavra-busca" placeholder="Pesquisar..."><button class="btn-sm btn-primary join-item rounded-e-xl ">Procurar</button>

					</form>
						<!-- /widget-header -->
						<div class="overflow-x-auto pt-4">
							<table class="table table-xs table-zebra border-collapse border border-base-300 text-center">
								<thead>
									<tr class="border border-slate-600">
										<th class="border border-slate-600"> Codigo</th>
										<th class="border border-slate-600"> Nome</th>
										<th class="td-actions">Editar/Remover</th>
									</tr>
								</thead>
								<tbody>
									<?PHP
									include("functions/limita-texto.php");

									if (empty($_GET['pg'])) {
									} else {
										$pg = $_GET['pg'];
										if (!is_numeric($pg)) {

											echo '<script language= "JavaScript">
					location.href="home.php?acao=ver-fornecedores";
		</script>';
										}
									}


									if (isset($pg)) {
										$pg = $_GET['pg'];
									} else {
										$pg = 1;
									}

									if (isset($_POST['palavra-busca'])) {
										$quantidade = 10000;
									} else {
										$quantidade = 10;
									}


									$inicio = ($pg * $quantidade) - $quantidade;

									if (isset($_POST['palavra-busca'])) {
										$busca = addslashes($_POST['palavra-busca']);
										$select = "SELECT * from fornecedores WHERE nomefornecedor LIKE '%$busca%' ORDER BY id DESC LIMIT $inicio, $quantidade";
									} else {
										$select = "SELECT * from fornecedores ORDER BY id DESC LIMIT $inicio, $quantidade";
									}


									$contagem = $inicio + 1;

									try {
										$result = $conexao->prepare($select);
										$result->execute();
										$contar = $result->rowCount();
										if ($contar > 0) {
											while ($mostra = $result->FETCH(PDO::FETCH_OBJ)) {
									?>
												<tr class="border border-slate-600 text-center">
													<td class="border border-slate-600"><?php echo $mostra->id; ?></td>
													<td class="border border-slate-600"> <?php echo $mostra->nomefornecedor; ?> </td>
													<td class="td-actions"><a href="home.php?acao=edt-fornecedores&id=<?php echo $mostra->id; ?>" class="btn w-5 btn-primary"><i class="fa fa-edit"> </i></a>
														<a href="home.php?acao=ver-fornecedores&pg=<?php echo $pg; ?>&delete=<?php echo $mostra->id; ?>" class="btn btn-error w-5" onClick="return confirm('Deseja realmente excluir o fornecedor?')"><i class="fa fa-remove"> </i></a>
													</td>
												</tr>
									<?php
											}
										} else {
											echo '<div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Aviso!</strong> Não há fornecedores cadastrado em nosso banco de dados ou a página não existe.
                </div>';
										}
									} catch (PDOException $e) {
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

							.paginas {
								width: 100%;
								padding: 10px 0;
								text-align: center;
								background: #fff;
								height: auto;
								margin: 10px auto;
							}

							.paginas a {
								width: auto;
								padding: 4px 10px;
								background: #eee;
								color: #333;
								margin: 0px 2.5px;
							}

							.paginas a:hover {
								text-decoration: none;
								background: #00BA8B;
								color: #fff;
							}

							<?php
							if (isset($_GET['pg'])) {
								$num_pg = $_GET['pg'];
							} else {
								$num_pg = 1;
							}
							?>.paginas a.ativo<?php echo $num_pg; ?> {
								background: #00BA8B;
								color: #fff;
							}
						</style>


						<?php
						if (isset($_POST['palavra-busca'])) {
							$busca = addslashes($_POST['palavra-busca']);
							$sql = "SELECT * from fornecedores WHERE nomefornecedor LIKE '%$busca%'";
						} else {
							$sql = "SELECT * from fornecedores";
						}

						try {
							$result = $conexao->prepare($sql);
							$result->execute();
							$totalRegistros = $result->rowCount();
						} catch (PDOException $e) {
							echo $e;
						}

						if ($totalRegistros <= $quantidade) {
						} else {
							$paginas = ceil($totalRegistros / $quantidade);
							if ($pg > $paginas) {
								echo '<script language= "JavaScript">
					location.href="home.php?acao=ver-fornecedores";
					</script>';
							}
							$links = 5;

							if (isset($i)) {
							} else {
								$i = '1';
							}

						?>

							<div class="paginas">

								<a href="home.php?acao=ver-fornecedores&pg=1">Primeira Página</a>

								<?php
								if (isset($_GET['pg'])) {
									$num_pg = $_GET['pg'];
								}

								for ($i = $pg - $links; $i <= $pg - 1; $i++) {
									if ($i <= 0) {
									} else {
								?>

										<a href="home.php?acao=ver-fornecedores&pg=<?php echo $i; ?>" class="ativo<?php echo $i; ?>"><?php echo $i; ?></a>


								<?php  }
								} ?>


								<a href="home.php?acao=ver-fornecedores&pg=<?php echo $pg; ?>" class="ativo<?php echo $i; ?>"><?php echo $pg; ?></a>


								<?php
								for ($i = $pg + 1; $i <= $pg + $links; $i++) {
									if ($i > $paginas) {
									} else {
								?>

										<a href="home.php?acao=ver-fornecedores&pg=<?php echo $i; ?>" class="ativo<?php echo $i; ?>"><?php echo $i; ?></a>

								<?php
									}
								}
								?>

								<a href="home.php?acao=ver-fornecedores&pg=<?php echo $paginas; ?>">Última página</a>



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
	bkLib.onDomLoaded(function() {
		nicEditors.allTextAreas()
	});
</script>