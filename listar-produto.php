<h1>Listar Produtos em Estoque</h1>
<?php
    $sql = "SELECT p.*, f.nome_fornecedor 
            FROM produtos AS p
            INNER JOIN fornecedores AS f
            ON p.fornecedor_id_fornecedor = f.id_fornecedor
            ORDER BY p.nome_produto";
            
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>ID</th>";
            print "<th>Nome</th>";
            print "<th>Cód. Barras</th>";
            print "<th>Preço Venda (R$)</th>";
            print "<th>Qtd. Estoque</th>";
            print "<th>Fornecedor</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_produto."</td>";
            print "<td>".$row->nome_produto."</td>";
            print "<td>".$row->codigo_barras."</td>";
            print "<td>R$ ".number_format($row->preco_venda, 2, ',', '.')."</td>";
            print "<td>".$row->quantidade_estoque."</td>";
            print "<td>".$row->nome_fornecedor."</td>";
            print "<td>
                   <button onclick=\"location.href='?page=editar-produto&id_produto=".$row->id_produto."';\" class='btn btn-success btn-sm'>Editar</button>
                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-produto&acao=excluir&id_produto=".$row->id_produto."';}else{false;}\" class='btn btn-danger btn-sm'>Excluir</button>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou produtos cadastrados!</p>";
    }
?>