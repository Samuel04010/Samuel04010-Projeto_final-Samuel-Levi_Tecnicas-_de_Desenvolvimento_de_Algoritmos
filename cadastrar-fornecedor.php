<h1>Cadastrar Fornecedor</h1>
<form action="?page=salvar-fornecedor" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_fornecedor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>CNPJ</label>
        <input type="text" name="cnpj" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>