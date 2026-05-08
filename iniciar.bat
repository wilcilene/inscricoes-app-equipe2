#!/bin/bash

set -e

# ========================================
# Cores
# ========================================
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "${GREEN}"
echo "========================================"
echo "🚀 Inicializando projeto Laravel"
echo "========================================"
echo -e "${NC}"

# ========================================
# Verificações
# ========================================

if ! command -v composer &> /dev/null; then
    echo -e "${RED}❌ Composer não encontrado.${NC}"
    exit 1
fi

if ! command -v php &> /dev/null; then
    echo -e "${RED}❌ PHP não encontrado.${NC}"
    exit 1
fi

if ! command -v npm &> /dev/null; then
    echo -e "${RED}❌ NPM não encontrado.${NC}"
    exit 1
fi

# ========================================
# Composer
# ========================================

echo -e "${YELLOW}📦 Instalando dependências PHP...${NC}"
composer install --no-interaction

# ========================================
# .env
# ========================================

if [ ! -f ".env" ]; then

    if [ ! -f ".env.example" ]; then
        echo -e "${RED}❌ .env.example não encontrado.${NC}"
        exit 1
    fi

    echo -e "${YELLOW}⚠️ Criando .env a partir do .env.example...${NC}"
    cp .env.example .env
fi

echo -e "${BLUE}"
echo "========================================"
echo "⚠️ Configure o arquivo .env:"
echo ""
echo "DB_DATABASE="
echo "DB_USERNAME="
echo "DB_PASSWORD="
echo "========================================"
echo -e "${NC}"

read -p "Pressione ENTER após configurar o .env..."

# ========================================
# Laravel
# ========================================

echo -e "${YELLOW}🔑 Gerando APP_KEY...${NC}"
php artisan key:generate

echo -e "${YELLOW}🧹 Limpando caches...${NC}"
php artisan optimize:clear

# ========================================
# Banco
# ========================================

read -p "Deseja rodar as migrations? (s/n): " RUN_MIGRATIONS

if [[ "$RUN_MIGRATIONS" =~ ^[Ss]$ ]]; then
    echo -e "${YELLOW}🗄️ Rodando migrations...${NC}"
    php artisan migrate
fi

# ========================================
# Frontend
# ========================================

echo -e "${YELLOW}📦 Instalando dependências frontend...${NC}"
npm install

echo -e "${YELLOW}⚡ Buildando assets...${NC}"
npm run build

# ========================================
# Finalização
# ========================================

echo -e "${GREEN}"
echo "========================================"
echo "✅ Projeto pronto!"
echo "========================================"
echo -e "${NC}"

echo -e "${BLUE}Para iniciar o servidor:${NC}"
echo "php artisan serve"