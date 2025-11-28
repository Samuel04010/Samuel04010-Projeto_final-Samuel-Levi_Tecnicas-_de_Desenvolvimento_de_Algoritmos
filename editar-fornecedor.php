<h1>Editar Fornecedor</h1>
<?php
    $sql = "SELECT * FROM fornecedores WHERE id_fornecedor=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_REQUEST["id_fornecedor"]);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_object();
    $stmt->close();
?>
<form action="?page=salvar-fornecedor" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_fornecedor" value="<?php print $row->id_fornecedor; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_fornecedor" value="<?php print $row->nome_fornecedor; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>CNPJ</label>
        <input type="text" name="cnpj" value="<?php print $row->cnpj; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php print $row->telefone; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>