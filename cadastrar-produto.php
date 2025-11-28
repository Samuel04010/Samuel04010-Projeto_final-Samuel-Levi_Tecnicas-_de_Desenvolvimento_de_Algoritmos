<h1>Cadastrar Produto</h1>
<form action="?page=salvar-produto" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome do Produto</label>
        <input type="text" name="nome_produto" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Código de Barras</label>
        <input type="text" name="codigo_barras" class="form-control">
    </div>
    <div class="mb-3">
        <label>Preço de Venda (R$)</label>
        <input type="number" step="0.01" name="preco_venda" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade_estoque" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <select name="fornecedor_id_fornecedor" class="form-control" required>
            <option value="">Escolha um Fornecedor</option>
            <?php
                $sql = "SELECT * FROM fornecedores ORDER BY nome_fornecedor";
                $res = $conn->query($sql);
                while($row = $res->fetch_object()){
                    print "<option value='".$row->id_fornecedor."'>".$row->nome_fornecedor."</option>";
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>