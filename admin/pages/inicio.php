<script>

</script>

<?php
function saudacao($nomeLogado = '')
{
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('H');
    if ($hora >= 6 && $hora <= 12) {
        return 'Bom dia' . (empty($nomeLogado) ? '' : ', ' . $nomeLogado);
    } elseif ($hora > 12 && $hora <= 18) {
        return 'Boa tarde' . (empty($nomeLogado) ? '' : ', ' . $nomeLogado);
    } else {
        return 'Boa noite' . (empty($nomeLogado) ? '' : ', ' . $nomeLogado);
    }
}
?>



<main>
    <div class="container my-8 bg-base-100 p-6 w-100">
        <span class="text-3xl font-sans font-semibold"><?php echo saudacao($nomeLogado) ?> :)</span>
    </div><!-- span 12 -->


    </div><!-- row -->



    <?php

    //excluir
    if (isset($_GET['delete'])) {
        $id_delete = $_GET['delete'];

        // seleciona a imagem
        $seleciona = "SELECT * from produtos WHERE id= :id_delete";
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
                $seleciona = "DELETE from produtos WHERE id=:id_delete";
                try {
                    $result = $conexao->prepare($seleciona);
                    $result->bindParam('id_delete', $id_delete, PDO::PARAM_INT);
                    $result->execute();
                    $contar = $result->rowCount();
                    if ($contar > 0) {
                        echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O produto foi excluído.
                </div>';
                    } else {
                        echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Não foi possível excluir o produto.
                </div>';
                    }
                } catch (PDOException $erro) {
                    echo $erro;
                }
            }
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    ?>




    <div class="font-semibold uppercase px-6 w-100">
        <div class="inline text-center">
            <span class=""><i class="fa fa-list"></i> Últimos Produtos Cadastrados</span>
        </div>
        <div class="overflow-x-auto pt-6">
            <table class="table table-xs table-zebra border-collapse border border-base-300 text-center">
                <thead>
                    <tr class="border border-slate-600">
                        <th class="border border-slate-600 text-center"> Codigo</th>
                        <th class="border border-slate-600"> Descrição</th>
                        <th class="border border-slate-600 p-1"> Qtd</th>
                        <th class="border border-slate-600"> Tipo</th>
                        <th class="border border-slate-600 "> Data Cadastro</th>
                        <th class="border border-slate-600 p-1"> Fornecedor</th>
                        <th class="border border-slate-600">Editar/Remover </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("functions/limita-texto.php");
                    $select = "SELECT * from produtos ORDER BY id DESC LIMIT 5";

                    try {
                        $result = $conexao->prepare($select);
                        $result->execute();
                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            while ($mostra = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                                <tr class="border border-slate-600 text-center">
                                    <td class="border border-slate-600"><?php echo $mostra->codproduto; ?></td>
                                    <td class="border border-slate-600"> <?php echo limitarTexto($mostra->descricao, $limite = 200) ?> </td>
                                    <td class="border border-slate-600"> <?php echo $mostra->quantidade; ?> </td>
                                    <td class="border border-slate-600"> <?php echo $mostra->tipo; ?> </td>
                                    <td class="border border-slate-600"> <?php echo $mostra->data; ?> </td>
                                    <td class="border border-slate-600"> <?php echo $mostra->fan_forn; ?> </td>
                                    <td class="border border-slate-600"><a href="home.php?acao=editar-produto&id=<?php echo $mostra->id; ?>" class="btn w-5 btn-primary"><i class="fa fa-edit p-0"> </i></a>
                                        <a href="home.php?delete=<?php echo $mostra->id; ?>" class="btn btn-error w-5" onClick="return confirm('Deseja realmente excluir ?')"><i class="fa fa-remove"> </i></a>
                                    </td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo '<div class="alert alert-error">
                      <strong>Aviso!</strong> Não há produtos cadastrado em nosso banco de dados.
                </div>';
                        }
                    } catch (PDOException $e) {
                        echo $e;
                    }
                    ?>


                </tbody>
            </table>
</main>