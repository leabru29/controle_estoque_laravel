# Sistema de Controle de Estoque em Laravel com Sail

Este é um sistema de controle de estoque desenvolvido em Laravel, uma estrutura de aplicativo da web em PHP, que roda com o ambiente de desenvolvimento Sail. O sistema permite que você gerencie produtos, categorias, fornecedores e o estoque de sua empresa de forma eficiente.

## Requisitos do Sistema

Antes de iniciar, verifique se seu ambiente atende aos seguintes requisitos:

- Docker (para executar o ambiente Sail)
- Git

## Instalação

Siga estas etapas para configurar e executar o sistema em sua máquina local usando o Laravel Sail:

1. Clone este repositório para o seu ambiente de desenvolvimento:

   ```bash
   git clone https://github.com/leabru29/controle_estoque_laravel.git
2. Acesse o diretório do projeto:

   ```bash
   cd controle_estoque_laravel
3. Copie o arquivo .env.example para .env:

   ```bash
   cp .env.example .env
4. Inicialize o ambiente Sail e inicie os contêineres Docker:

   ```bash
   ./vendor/bin/sail up
5. Rode o Npm :

   ```bash
   npm install && npm run dev