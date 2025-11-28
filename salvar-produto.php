<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome_produto"];
        $cod = $_POST["codigo_barras"];
        $preco = $_POST["preco_venda"];
        $qtd = $_POST["quantidade_estoque"];
        $id_fornecedor = $_POST["fornecedor_id_fornecedor"];

        $sql = "INSERT INTO produtos (nome_produto, codigo_barras, preco_venda, quantidade_estoque, fornecedor_id_fornecedor) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        // Tipos: s (string), s (string), d (double/float), i (integer), i (integer)
        $stmt->bind_param("ssdsi", $nome, $cod, $preco, $qtd, $id_fornecedor);

        if($stmt->execute()) {
            print "<script>alert('Produto cadastrado com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao cadastrar produto: ". $stmt->error ."');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-produto';</script>";
        break;

    case 'editar':
        $nome = $_POST["nome_produto"];
        $cod = $_POST["codigo_barras"];
        $preco = $_POST["preco_venda"];
        $qtd = $_POST["quantidade_estoque"];
        $id_fornecedor = $_POST["fornecedor_id_fornecedor"];
        $id_produto = $_POST["id_produto"];

        $sql = "UPDATE produtos SET nome_produto=?, codigo_barras=?, preco_venda=?, quantidade_estoque=?, fornecedor_id_fornecedor=? WHERE id_produto=?";
        
        $stmt = $conn->prepare($sql);
        // Tipos: s (string), s (string), d (double/float), i (integer), i (integer), i (integer)
        $stmt->bind_param("ssdsii", $nome, $cod, $preco, $qtd, $id_fornecedor, $id_produto);

        if($stmt->execute()) {
            print "<script>alert('Produto editado com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao editar produto: ". $stmt->error ."');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-produto';</script>";
        break;

    case 'excluir':
        $sql = "DELETE FROM produtos WHERE id_produto=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_REQUEST["id_produto"]);

        if($stmt->execute()) {
            print "<script>alert('Produto excluído com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao excluir produto.');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-produto';</script>";
        break;
}
?>