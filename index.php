<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestão de Farmácia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">💊 Farmácia Central</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Fornecedores</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-fornecedor">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-fornecedor">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Produtos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-produto">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-produto">Listar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <?php
                    include("config.php");
                    switch(@$_REQUEST["page"]){
                        // Rotas de Fornecedores
                        case "cadastrar-fornecedor":
                            include("cadastrar-fornecedor.php");
                        break;
                        case "listar-fornecedor":
                            include("listar-fornecedor.php");
                        break;
                        case "salvar-fornecedor":
                            include("salvar-fornecedor.php");
                        break;
                        case "editar-fornecedor":
                            include("editar-fornecedor.php");
                        break;

                        // Rotas de Produtos
                        case "cadastrar-produto":
                            include("cadastrar-produto.php");
                        break;
                        case "listar-produto":
                            include("listar-produto.php");
                        break;
                        case "salvar-produto":
                            include("salvar-produto.php");
                        break;
                        case "editar-produto":
                            include("editar-produto.php");
                        break;

                        default:
                            print "<h1>Bem vindo ao Sistema de Gestão de Farmácia!</h1>";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>