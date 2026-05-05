📅 Agenda de Clientes

Sistema web desenvolvido em Laravel para gestão de clientes e controlo de aniversários, com autenticação segura e interface moderna em Tailwind CSS.

🎯 Visão geral

A Agenda de Clientes é uma aplicação criada para simplificar a gestão de contactos e datas importantes, permitindo organizar clientes e acompanhar aniversários de forma eficiente.

O sistema foi desenvolvido com foco em:

Simplicidade de uso
Interface moderna e responsiva
Base sólida para expansão futura
Boas práticas de desenvolvimento Laravel
✨ Funcionalidades
🔐 Autenticação
Registo de utilizadores
Login / Logout
Gestão de perfil
👥 Gestão de clientes
Criar clientes
Listar clientes
Editar informações
Eliminar clientes
📊 Dashboard
Visão geral do sistema
Acesso rápido às funcionalidades principais
🎂Controlo de aniversários
Registo de datas de aniversário
Preparado para alertas futuros (email/notificações)

🛠️ Stack utilizada
Laravel 12+
PHP 8.3+
Blade Templates
Laravel Breeze (auth)
Tailwind CSS
Vite
MySQL / SQLite
Node.js

🏗️ Arquitetura do projeto
app/                → Lógica da aplicação (Models, Controllers)
routes/             → Rotas web
resources/views/    → Interfaces Blade
resources/css/      → Estilos Tailwind
resources/js/       → Scripts frontend
database/migrations → Estrutura da base de dados
public/images/      → Imagens e assets (logo, etc.)

⚙️ Requisitos do sistema

Antes de instalar, garante:
PHP >= 8.3
Composer
Node.js (LTS recomendado)
MySQL ou SQLite
Git

🚀 Instalação
Clonar o projeto
git clone https://github.com/francisco-artur-dev/agenda-clientes.git
cd agenda-clientes

Instalar dependências PHP
composer install

Instalar dependências frontend
npm install

Configurar ambiente
cp .env.example .env

Editar o .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agenda_clientes
DB_USERNAME=root
DB_PASSWORD=

Gerar chave da aplicação
php artisan key:generate

Executar migrations
php artisan migrate

Compilar assets frontend
npm run dev

Iniciar servidor
php artisan serve

🌐 Acesso ao sistema
http://127.0.0.1:8000

🖼️ Assets (logo e imagens)
Coloca os ficheiros em:
public/images/

Exemplo de utilização:
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20">

🔧 Boas práticas
Executar npm run dev durante desenvolvimento
Verificar sempre o .env
Limpar cache quando necessário:
php artisan config:clear
php artisan cache:clear

- 🚀 Roadmap (melhorias futuras)
📧 Notificações automáticas por email
📤 Exportação de clientes (PDF / Excel)
📱 API para aplicação mobile
📊 Gráficos no dashboard
🔎 Filtros avançados de clientes

👨‍💻 Autor:
Desenvolvido por Eng. Francisco Artur