<h1>Listar Fornecedores</h1>
<?php
    $sql = "SELECT * FROM fornecedores";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>CNPJ</th>";
            print "<th>Telefone</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_fornecedor."</td>";
            print "<td>".$row->nome_fornecedor."</td>";
            print "<td>".$row->cnpj."</td>";
            print "<td>".$row->telefone."</td>";
            print "<td>
                   <button onclick=\"location.href='?page=editar-fornecedor&id_fornecedor=".$row->id_fornecedor."';\" class='btn btn-success btn-sm'>Editar</button>
                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-fornecedor&acao=excluir&id_fornecedor=".$row->id_fornecedor."';}else{false;}\" class='btn btn-danger btn-sm'>Excluir</button>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou fornecedores cadastrados!</p>";
    }
?>