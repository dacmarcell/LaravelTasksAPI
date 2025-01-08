# LaravelTasksAPI

Projeto CRUD de Tarefas em Laravel

## Stack

![php](https://shields.io/badge/-PHP-3776AB?style=flat&logo=php)
![laravel](https://img.shields.io/badge/Laravel-v11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![postgresql](https://img.shields.io/badge/postgresql-4169e1?style=for-the-badge&logo=postgresql&logoColor=white)

#### Versões

PHP v8

Laravel v11

PostgreSQL v17

## Documentação da API

#### Retorna todas as tarefas

```http
  GET /api/tasks
```

#### Retorna uma tarefa por ID

```http
  GET /api/tasks/${id}
```

| Parâmetro | Tipo     | Descrição                                   |
| :-------- | :------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### Cria uma tarefa

```http
  POST /api/tasks
```

| Parâmetro     | Tipo     | Descrição                                           |
| :------------ | :------- | :-------------------------------------------------- |
| `title`       | `string` | **Obrigatório**. O título da tarefa a ser criada    |
| `description` | `string` | **Obrigatório**. A descrição da tarefa a ser criada |
| `status`      | `string` | **Obrigatório**. O status da tarefa a ser criada    |

#### Atualiza uma tarefa

```http
  PUT /api/tasks
```

| Parâmetro     | Tipo     | Descrição                              |
| :------------ | :------- | :------------------------------------- |
| `title`       | `string` | O título da tarefa a ser atualizada    |
| `description` | `string` | A descrição da tarefa a ser atualizada |
| `status`      | `string` | O status da tarefa a ser atualizada    |

#### Deleta uma tarefa

```http
  DELETE /api/tasks/${id}
```

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/dacmarcell/LaravelTasksAPI
```

Entre no diretório do projeto

```bash
  cd LaravelTasksAPI
```

Instale as dependências

```bash
  composer install
```

Rode as migrações

```bash
  php artisan migrate
```

Inicie o servidor

```bash
  php artisan serve
```
