# Samuel04010-Projeto_final-Samuel-Levi_Tecnicas-_de_Desenvolvimento_de_Algoritmos

# 💊 Sistema de Gestão de Farmácia

Este projeto consiste no desenvolvimento de um Sistema de Gestão de Farmácia utilizando PHP, MySQL e Bootstrap 5.  
O sistema permite gerenciar fornecedores e produtos, oferecendo funcionalidades completas de CRUD (Cadastrar, Listar, Editar e Excluir), com tratamento de erros e integridade de dados.  

O objetivo principal é fornecer uma aplicação prática para controle de estoque, fornecedores e produtos, demonstrando conceitos de banco de dados relacional e lógica de programação.

---

## Funcionalidades

### Módulo Fornecedores
| Funcionalidade | Descrição |
|----------------|-----------|
| Cadastrar      | Cadastro de fornecedores com nome, CNPJ e telefone. |
| Listar         | Exibe todos os fornecedores cadastrados. |
| Editar         | Permite alterar informações do fornecedor. |
| Excluir        | Remove fornecedor, impedindo exclusão se houver produtos vinculados. |

### Módulo Produtos
| Funcionalidade | Descrição |
|----------------|-----------|
| Cadastrar      | Cadastro de produtos com nome, código de barras, preço, quantidade e fornecedor. |
| Listar         | Exibe todos os produtos em estoque com o nome do fornecedor. |
| Editar         | Permite alterar informações do produto. |
| Excluir        | Remove produtos do estoque. |

---

## Estrutura do Sistema
- Navegação baseada em **rotas internas** via parâmetro `?page=`:?page=cadastrar-fornecedor
- ?page=listar-fornecedor
- ?page=editar-fornecedor
- ?page=salvar-fornecedor
- ?page=cadastrar-produto
- ?page=listar-produto
- ?page=editar-produto
- ?page=salvar-produto

```Pseudocode
INICIO

CONECTAR ao banco de dados

LER parâmetro PAGE

SE PAGE = "cadastrar-fornecedor" ENTAO
    EXIBIR formulário de cadastro

SENAO SE PAGE = "listar-fornecedor" ENTAO
    CONSULTAR todos fornecedores
    EXIBIR tabela

SENAO SE PAGE = "salvar-fornecedor" ENTAO
    LER ACAO

    SE ACAO = "cadastrar" ENTAO
        LER dados
        INSERIR no banco
        EXIBIR mensagem e redirecionar

    SE ACAO = "editar" ENTAO
        LER dados
        ATUALIZAR fornecedor
        EXIBIR mensagem e redirecionar

    SE ACAO = "excluir" ENTAO
        TENTAR excluir
        SE der erro por FK
            EXIBIR "Erro: existem produtos vinculados"
        SENAO
            EXIBIR "Fornecedor excluído"

SENAO SE PAGE = "editar-fornecedor" ENTAO
    CONSULTAR fornecedor por ID
    EXIBIR formulário preenchido

SENAO SE PAGE = "cadastrar-produto" ENTAO
    CONSULTAR fornecedores
    EXIBIR formulário de produto

SENAO SE PAGE = "listar-produto" ENTAO
    CONSULTAR produtos com JOIN fornecedores
    EXIBIR tabela

SENAO SE PAGE = "salvar-produto" ENTAO
    LER ACAO
    EXECUTAR (INSERT, UPDATE ou DELETE)
    EXIBIR mensagem e redirecionar

SENAO
    EXIBIR mensagem de boas-vindas

FIM

```Fluxograma
 ┌──────────┐
 │  INÍCIO  │
 └────┬─────┘
      │
      ▼
 ┌──────────────────────┐
 │ Conectar ao Banco    │
 └────┬─────────────────┘
      │ sucesso / erro?
      ▼
 ┌──────────────────────┐
 │ Ler parâmetro 'page' │
 └────┬─────────────────┘
      │
      ▼
 ┌────────────────────────────────────┐
 │ É página de Fornecedor ou Produto?│
 └────┬───────────────┬──────────────┘
      │Fornecedor      │Produto
      ▼                ▼
 ┌────────────────┐  ┌────────────────┐
 │ Menu Fornecedor│  │ Menu Produto   │
 └───┬────────────┘  └──────┬─────────┘
     │                      │
     ▼                      ▼
┌───────────────┐     ┌───────────────┐
│Cadastrar?      │     │Cadastrar?      │
└─────┬──────────┘     └─────┬─────────┘
      │sim                     │sim
      ▼                        ▼
┌───────────────┐      ┌───────────────┐
│Exibir Form     │      │Exibir Form     │
│Salvar          │      │Salvar          │
└──────┬─────────┘      └──────┬────────┘
       │                        │
       ▼                        ▼
   (volta ao menu)          (volta ao menu)


