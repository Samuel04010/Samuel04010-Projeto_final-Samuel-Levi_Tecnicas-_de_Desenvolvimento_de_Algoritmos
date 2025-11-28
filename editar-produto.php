<h1>Editar Produto</h1>
<?php
    // 1. Busca do Produto
    $sql_prod = "SELECT * FROM produtos WHERE id_produto=?";
    $stmt_prod = $conn->prepare($sql_prod);
    $stmt_prod->bind_param("i", $_REQUEST["id_produto"]);
    $stmt_prod->execute();
    $res_prod = $stmt_prod->get_result();
    $row_prod = $res_prod->fetch_object();
    $stmt_prod->close();
?>
<form action="?page=salvar-produto" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_produto" value="<?php print $row_prod->id_produto; ?>">
    <div class="mb-3">
        <label>Nome do Produto</label>
        <input type="text" name="nome_produto" value="<?php print $row_prod->nome_produto; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Código de Barras</label>
        <input type="text" name="codigo_barras" value="<?php print $row_prod->codigo_barras; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Preço de Venda (R$)</label>
        <input type="number" step="0.01" name="preco_venda" value="<?php print $row_prod->preco_venda; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade_estoque" value="<?php print $row_prod->quantidade_estoque; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <select name="fornecedor_id_fornecedor" class="form-control" required>
            <option value="">Escolha um Fornecedor</option>
            <?php
                // 2. Busca dos Fornecedores
                $sql_forn = "SELECT * FROM fornecedores ORDER BY nome_fornecedor";
                $res_forn = $conn->query($sql_forn);
                while($row_forn = $res_forn->fetch_object()){
                    $selected = ($row_forn->id_fornecedor == $row_prod->fornecedor_id_fornecedor) ? 'selected' : '';
                    print "<option value='".$row_forn->id_fornecedor."' ".$selected.">".$row_forn->nome_fornecedor."</option>";
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>