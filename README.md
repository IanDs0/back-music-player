# Projeto de Gerenciamento de Músicas

Este projeto é uma aplicação Laravel para gerenciar músicas e álbuns.

### Requisitos

1) Ver lista de álbuns e faixas
2) Pesquisar álbuns e faixas por nome
3) Adicionar um novo álbum
4) Adicionar uma nova faixa em um álbum
5) Excluir uma faixa
6) Excluir um álbum

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/IanDs0/back-music-player.git
    cd ./back-music-player
    ```

2. Instale as dependências do projeto:
    ```bash
    composer install
    ```

3. Copie o arquivo `.env.example` para `.env`:
    ```bash
    cp .env.example .env
    ```

4. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

## Configuração do Banco de Dados

1. No arquivo `.env`, configure o banco de dados para usar SQLite:
    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/caminho/para/database.sqlite
    ```

2. Crie o arquivo `database.sqlite` no diretório `database`:
    ```bash
    touch database/database.sqlite
    ```

## Executar Migrations e Seeds

1. Execute as migrations para criar as tabelas no banco de dados:
    ```bash
    php artisan migrate
    ```

2. Execute os seeds para popular o banco de dados com dados iniciais:
    ```bash
    php artisan db:seed
    ```

## Executar o Projeto

1. Inicie o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```

2. Acesse a aplicação no navegador:
    ```
    http://localhost:8000
    ```

3. Link do Postman
    ```
    https://www.postman.com/research-explorer-40527870/workspace/teste-de-conhecimento-para-programador-trainee/collection/25669223-e19f2923-6145-4e2e-a40d-a7de02967698?action=share&creator=25669223
    ```

## Justificativa para o Uso do SQLite

Escolhemos o SQLite porque ele permite modelar o banco de dados de forma simples e rápida. Além disso, o SQLite é um banco de dados leve e não requer configuração de servidor, o que facilita o desenvolvimento inicial. Posteriormente, será fácil migrar para o PostgreSQL ou MySQL, pois as queries no banco de dados estão sendo gerenciadas pelo Laravel, que oferece suporte a múltiplos bancos de dados.

## Melhorias Futuras

### Implementação de Sessão de Usuário:

Poderíamos utilizar o modelo User que veio por padrão quando o projeto foi criado para implementar a funcionalidade de sessão. Isso permitiria que diferentes usuários criassem e gerenciassem seus próprios álbuns e faixas. Cada usuário teria uma experiência personalizada e segura, com acesso apenas aos seus próprios dados.

### Cache nas Buscas da API:

Implementar cache nas buscas da API para melhorar a performance. Como as buscas podem ser repetitivas e os dados não mudam com tanta frequência, o uso de cache reduziria a carga no banco de dados e aceleraria o tempo de resposta das requisições.

### Cache no Banco de Dados:

Implementar um sistema de cache no banco de dados para armazenar resultados de consultas que são frequentemente acessadas. Isso é especialmente útil neste caso de uso, onde o número de leituras é extremamente maior que o número de escritas. Em um projeto em larga escala, essa abordagem pode melhorar significativamente a performance e a escalabilidade da aplicação.

