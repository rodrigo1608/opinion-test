<img src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg" alt="Logo Opinion Box" width="200">

--- 

Teste Técnico


### Sistema de Cadastro de Usuários com Validação

Um sistema de cadastro de usuários desenvolvido em Laravel 12 com validações  de CPF e integração com a API dos Correios para preenchimento automático de endereços via CEP.

<br>

**Funcionalidades Principais**
- Cadastro de Usuários com nome completo
  
- Validação de CPF
- Integração com API dos Correios para busca de endereços
- Preenchimento Automático de campos de endereço via CEP
- Persistência em MySQL com migrations e seeders
- Validações de Formulário

<br>

**Tecnologias Utilizadas**
- Laravel 12
      
- MySQL 
- API dos Correios - Consulta de CEP
- Tailwind

<br>

**Pré-requisitos**
- PHP 8.2+
- Composer

---

### Instalação

**Clone o repositório**

  `git clone [https://github.com/rodrigo1608/opinion-test.git](https://github.com/rodrigo1608/opinion-test.git)`

ou

  `git clone git@github.com:rodrigo1608/opinion-test.git`
  
**Instale as dependências**

`composer install`

**Configure o ambiente**

`cp .env.example .env`

`php artisan key:generate`

**Configure o banco de dados no arquivo .env**

`DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha`

**Execute as migrations**

`php artisan migrate`

**Inicie o servidor**

`php artisan serve`

--- 


