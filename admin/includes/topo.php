<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="home.php">CDE Merchan - Painel <?php if($nivelLogado == 0){echo "do Usuario";}else if($nivelLogado == 1){echo "Admistrativo";}?></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Opções <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Adicionar Usuários</a></li>
              <li><a href="javascript:;">Site em Manutenção</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $nomeLogado;?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Perfil</a></li>
              <li><a href="?sair" onClick="return confirm('Deseja realmente sair do Sistema?')">Sair</a></li>
            </ul>
          </li>
        </ul>

        <?php if($nivelLogado==1){?>
        <form action="home.php?acao=ver-produtos" method="post" enctype="multipart/form-data" class="navbar-search pull-right">
          <input type="text" class="search-query" name="palavra-busca" placeholder="pesquisar">
        </form>
        <?php }?>

        <?php if($nivelLogado==0){?>
        <form action="home.php?acao=ver-atividades" method="post" enctype="multipart/form-data" class="navbar-search pull-right">
          <input type="text" class="search-query" name="palavra-busca" placeholder="pesquisar">
        </form>
        <?php }?>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
<?php if(isset($_GET['acao'])){	$acao = $_GET['acao'];}else{$acao ='home';}?>    
    
      <ul class="mainnav">
      <li <?php if($acao =="welcome" || ($acao =="home")){echo 'class="active"';}?>><a href="home.php"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>

        
        <?php if($nivelLogado ==1){?>
        <li class="<?php if($acao =="ver-produto" || ($acao =="cad-produto")){echo "active";}?> dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Produtos</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="home.php?acao=ver-produto">Visualizar</a></li>
            <li><a href="home.php?acao=cad-produto">Cadastrar</a></li>
          </ul>
        </li>
        
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Fornecedores</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="home.php?acao=ver-fornecedores">Visualizar</a></li>
            <li><a href="home.php?acao=cad-fornecedores">Cadastrar</a></li>
          </ul>
        </li>
      <?php }?>
       
      <?php if($nivelLogado ==0){?>
        
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gamepad"></i><span>Atividades</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Lições</a></li>
            <li><a href="#">Visualizar</a></li>
            <li><a href="#">Perfil</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="icon-globe"></i><span>Outros</span> </a></li>
        <li></li>
      </ul>
      <?php }?>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->