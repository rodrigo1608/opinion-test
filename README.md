# Teste Técnico Opinion Box
### Sistema de Cadastro de Usuários com Validação

Um sistema de cadastro de usuários desenvolvido em Laravel 12 com validações  de CPF e integração com a API dos Correios para preenchimento automático de endereços via CEP.

**Funcionalidades Principais**

- Cadastro de Usuários com nome completo
- Validação de CPF
- Integração com API dos Correios para busca de endereços
- Preenchimento Automático de campos de endereço via CEP
- Persistência em MySQL com migrations e seeders
- Validações de Formulário

** Tecnologias Utilizadas **

    Laravel 12 - Framework PHP

    MySQL - Banco de dados relacional

    API dos Correios - Consulta de CEP

    Tailwind    

** Pré-requisitos **

    PHP 8.2+

    Composer

###Instalação
bash

** Clone o repositório **
git clone https://github.com/rodrigo1608/opinion-test.git
ou
git clone git@github.com:rodrigo1608/opinion-test.git

** Instale as dependências **
composer install

** Configure o ambiente **
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no arquivo .env
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Execute as migrations
php artisan migrate

# Inicie o servidor
php artisan serve

🎯 Como Funciona
Validação de CPF

O sistema implementa o algoritmo oficial de validação de CPF, verificando:

    Formatação correta (11 dígitos)

    Dígitos verificadores

    CPFs inválidos conhecidos

Busca por CEP

Ao digitar o CEP, o sistema:

    Faz uma requisição para a API dos Correios

    Retorna automaticamente:

        Logradouro

        Bairro

        Cidade

        Estado

    Preenche os campos correspondentes

    MySQL 5.7+

    Node.js (para assets frontend)
