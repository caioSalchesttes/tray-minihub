# Instalação e Execução do Minihub

Este guia irá te ensinar como instalar e rodar o Minihub, começando pela clonagem do projeto, passando pela configuração usando o Sail e verificando o funcionamento adequado.

## Pré-requisitos

1. Ter o Composer instalado em sua máquina.
2. Ter o Docker instalado e configurado em sua máquina.

## Passo a Passo

### 1. Clonando o Projeto

Primeiro, clone o repositório do projeto para sua máquina local:

```bash
git clone <link_do_repositorio> minihub
cd minihub
```

### 2. Instalação com Sail
   Com o projeto clonado, vamos configurar e instalar usando o Sail e Composer:


```bash
composer install
./vendor/bin/sail up -d
```

### 3. Verificando a Instalação
   Após a instalação, verifique se tudo está funcionando corretamente acessando o healthcheck:


http://localhost/healthcheck
Se tudo estiver OK, você pode seguir para as próximas etapas.

### 4. Executando Migrações e Seeds
   Execute as migrações e seeds para configurar o banco de dados:

```bash
php artisan migrate
php artisan db:seed
```

### 5. Enviando o Hook
   Agora, envie um hook para a seguinte URL:


http://localhost/webhook/product
Com o seguinte corpo de requisição:

```json
{
"product_ref": ""
}
```

Nota: Certifique-se de preencher o campo product_ref com a referência desejada do produto.

### 6. Rodando a Fila
   Por fim, inicie o trabalhador da fila para processar os jobs:

```bash
php artisan queue:work
```
