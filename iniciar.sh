#!/bin/bash

# Cores
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # Sem cor

echo -e "${GREEN}"
echo "========================================"
echo "🚀 Inicializando projeto Laravel"
echo "========================================"
echo -e "${NC}"

# Verificar se composer existe
if ! command -v composer &> /dev/null
then
    echo -e "${RED}❌ Composer não encontrado. Instale antes de continuar.${NC}"
    exit 1
fi

# Verificar se php existe
if ! command -v php &> /dev/null
then
    echo -e "${RED}❌ PHP não encontrado.${NC}"
    exit 1
fi

echo -e "${YELLOW}📦 Instalando dependências (composer install)...${NC}"
composer install

# Verificar .env
if [ ! -f ".env" ]; then
    echo -e "${YELLOW}⚠️ Arquivo .env não encontrado. Criando a partir do .env.example...${NC}"
    cp .env.example .env
fi

echo -e "${YELLOW}"
echo "⚠️ IMPORTANTE: Configure seu arquivo .env antes de continuar:"
echo "   - DB_DATABASE"
echo "   - DB_USERNAME"
echo "   - DB_PASSWORD"
echo -e "${NC}"

read -p "Pressione ENTER para continuar após configurar o .env..."

echo -e "${YELLOW}🔑 Gerando chave da aplicação...${NC}"
php artisan key:generate

echo -e "${YELLOW}🧹 Limpando cache...${NC}"
php artisan config:clear

echo -e "${YELLOW}🗄️ Rodando migrations...${NC}"
php artisan migrate

echo -e "${YELLOW}⚡ Buildando assets (Vite)...${NC}"
npm run build

echo -e "${GREEN}"
echo "========================================"
echo "✅ Projeto pronto!"
echo "========================================"
echo -e "${NC}"