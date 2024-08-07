# CRUD de Clientes e Ordens de Serviço

Este projeto é uma aplicação web simples para gerenciar clientes e ordens de serviço. A aplicação permite cadastrar, listar, editar e excluir clientes e ordens de serviço. É desenvolvida em PHP e utiliza MySQL como banco de dados.

## Objetivo

Este projeto foi criado para a implementação de estudos do CRUD (Create, Read, Update, Delete) em PHP, validação e manipulação de dados com MySQL. CRUD é um acrônimo para as quatro operações básicas de persistência de dados em banco de dados: criar, ler, atualizar e deletar. Este projeto fornece uma base prática para entender como essas operações são realizadas, juntamente com a validação de dados de entrada e a manipulação de dados utilizando o banco de dados MySQL.

## Funcionalidades

1. **Clientes**:
    - Cadastro de clientes com nome, e-mail, telefone e data de nascimento.
    - Validação de dados de entrada.
    - Listagem de clientes cadastrados.
    - Edição de dados de clientes
    - Exclusão de clientes.

2. **Ordens de Serviço (O.S.)**:
    - Cadastro de ordens de serviço com número, nome do cliente, descrição do serviço, valores de materiais e mão de obra.
    - Cálculo automático do orçamento total.
    - Validação de dados de entrada.
    - Listagem de ordens de serviço cadastradas.
    - Edição de dados de clientes
    - Exclusão de clientes.

## Endpoints

### Clientes

- **Listar Clientes**
    - **URL**: `clientes.php`
    - **Método**: GET
    - **Descrição**: Lista todos os clientes cadastrados.

- **Cadastrar Cliente**

    - **URL**: `cadastrar_cliente.php`
    - **Método**: POST
    - **Parâmetros**:
        - `nome`: Nome do cliente.
        - `email`: E-mail do cliente.
        - `telefone`: Telefone do cliente.
        - `nascimento`: Data de nascimento do cliente (formato dia/mês/ano).

    - ***Descrição***: Cadastra um novo cliente.

    **Editar Cliente**
    - Método: POST
    - URL: /editar_cliente.php?id={id}
    - Parâmetros:
    - nome: Nome do cliente
    - email: E-mail do cliente
    - telefone: Telefone do cliente
    - nascimento: Data de nascimento
  
    **Excluir Cliente**
    - Excluir Cliente
    - Método: GET
    - URL: /excluir_cliente.php?id={id}

### Ordens de Serviço

- **Listar Ordens de Serviço**
    - **URL**: `ordemdeservico.php`
    - **Método**: GET
    - **Descrição**: Lista todas as ordens de serviço cadastradas.

- **Cadastrar Ordem de Serviço**
    - **URL**: `cadastrar_os.php`
    - **Método**: POST
    - **Parâmetros**:
        - `id`: Número da O.S.
        - `nome_os`: Nome do cliente.
        - `servico`: Descrição do serviço a ser executado.
        - `materiais`: Valor dos materiais.
        - `mao_de_obra`: Valor da mão de obra.

    - ***Descrição***: Cadastra uma nova ordem de serviço.

   **Editar O.S.**

        - Método: POST
        - URL: /editar_os.php?id={id}
        - Parâmetros:
        - nome_os: Nome do cliente
        - servico: Descrição do serviço
        - materiais: Valor dos materiais
        - mao_de_obra: Valor da mão de obra
        - orcamento_total: Orçamento total

    **Excluir O.S.**

    - Método: GET
    - URL: /excluir_os.php?id={id}

## Estrutura do Projeto

├── database <br>
├── ├── dump.sql<br> 
├── images/<br>
├── styles/<br>
├── ├── style.css<br>
├── index.html<br>
├── cadastrar_cliente.php<br>
├── cadastrar_os.php<br>
├── clientes.php<br>
├── conexao.php<br>
├── deletar_cliente.php<br>
├── deletar_os.php<br>
├── ordemdeservico.php<br>
├── editar_cliente.php<br>
├── Editar_os.php<br>
├── ordemdeservico.php<br>
├── os.php<br>
└── conexao.php<br>

**Requisitos**
- PHP 7.0+
- MySQL
- Servidor Web (Apache, Nginx, etc.)
- Configuração
- Clone o repositório para o seu servidor web.
- Configure o banco de dados MySQL:
- Crie o banco de dados e as tabelas necessárias.
- Configure o arquivo conexao.php com as credenciais do banco de dados.

## Validação e Sanitização de Dados

A validação e sanitização de dados são realizadas nas seguintes funções e verificações:

- **limpar_texto($str)**: Remove caracteres não numéricos de uma string.
- **Validação do Nome**: Verifica se o campo nome não está vazio.
- **Validação do E-mail**: Verifica se o campo e-mail não está vazio e se está no formato correto.
- **Validação do Telefone**: Verifica se o telefone está no formato correto (11 dígitos).
- **Validação da Data de Nascimento**: Verifica se a data de nascimento está no formato correto (dia/mês/ano).
- **Validação dos Valores de Materiais e Mão de Obra**: Verifica se os valores são numéricos.

## Como Executar

1. Clone o repositório para o seu servidor web.
2. Configure a conexão com o banco de dados no arquivo `conexao.php`.
3. Certifique-se de que as tabelas `clientes` e `ordem_de_servico` estão criadas no banco de dados.
4. Acesse os endpoints através do navegador ou de uma ferramenta de API, como Postman.


**Contribuição**
- Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

**Licença**
Este projeto está licenciado sob a MIT License.