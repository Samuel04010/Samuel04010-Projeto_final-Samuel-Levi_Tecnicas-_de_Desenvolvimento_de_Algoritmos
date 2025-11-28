<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome_fornecedor"];
        $cnpj = $_POST["cnpj"];
        $tel = $_POST["telefone"];

        $sql = "INSERT INTO fornecedores (nome_fornecedor, cnpj, telefone) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $cnpj, $tel);
        
        if($stmt->execute()) {
            print "<script>alert('Fornecedor cadastrado com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao cadastrar fornecedor: ". $stmt->error ."');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-fornecedor';</script>";
        break;

    case 'editar':
        $nome = $_POST["nome_fornecedor"];
        $cnpj = $_POST["cnpj"];
        $tel = $_POST["telefone"];
        $id = $_POST["id_fornecedor"];

        $sql = "UPDATE fornecedores SET nome_fornecedor=?, cnpj=?, telefone=? WHERE id_fornecedor=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nome, $cnpj, $tel, $id);

        if($stmt->execute()) {
            print "<script>alert('Fornecedor editado com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao editar fornecedor: ". $stmt->error ."');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-fornecedor';</script>";
        break;

    case 'excluir':
        $sql = "DELETE FROM fornecedores WHERE id_fornecedor=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_REQUEST["id_fornecedor"]);
        
        if($stmt->execute()) {
            print "<script>alert('Fornecedor excluído com sucesso!');</script>";
        } else {
            print "<script>alert('Erro ao excluir fornecedor. Verifique se há produtos vinculados.');</script>";
        }
        $stmt->close();
        print "<script>location.href='?page=listar-fornecedor';</script>";
        break;
}
?>