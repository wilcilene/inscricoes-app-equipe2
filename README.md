<p align="center">
    <h1> Sistema de Gerenciamento de Inscrições e Editais </h1>
</p>

<p align="center">
    <a href="#demo">
      <img src="https://i.imgur.com/ezNrNOo.png" width="200">
    </a>
</p>

---

### Alunos participantes:
Ana Luiza Corrêa, César Castro, Daniel Mendes, Henrique Avancini, Laura Mondin, Leonardo Denck, Lucas Pitta, Victor Conti, Vitor de Souza, Saulo Resende e William Sant' Ana. 

--- 

Este projeto é uma plataforma para gestão de editais, permitindo desde a criação de conta do candidato até a verificação automatizada de resultados (aprovação ou reprovação). 

---
## 1.  Sobre o Projeto
O sistema visa simplificar o processo de inscrição em processos seletivos. Ele valida os dados do usuário, processa a candidatura em editais ativos e gera uma lista de classificação baseada em critérios pré-definidos.

## 2. Tecnologias

* **Backend:** PHP / Laravel
* **Frontend:** Blade, Bootstrap, JavaScript
* **Autenticação:** Laravel Breeze
* **Build Tool:** Vite
* **Banco de Dados:** MySQL
* **Gerenciamento de Dependências:** Composer e NPM
* **Servidor Local:** XAMPP
* **Versionamento:** Git e GitHub
* **Caso não queira o XAMPP:** Laragon

## 3. Funcionalidades
- [x] **Cadastro de Usuários:** Criação de conta com validação de CPF/E-mail.
- [x] **Gestão de Editais:** Visualização de editais abertos e encerrados.
- [x] **Inscrição:** Fluxo de submissão de documentos e formulários.
- [x] **Painel de Resultados:** Verificação de status (Aprovado/Reprovado) com busca por nome ou documento.
- [x] **Painel Administrativo:** Área dedicada para gestão de editais e acompanhamento das inscrições recebidas.

<a id="demo"></a>

## 4. Demonstração
### Tela de Mural de editais

<p align="center">
  <a href="https://www.figma.com/proto/Eyk1Fny59tbVx6ez68RLpq/Prot%C3%B3tipo---Inscri%C3%A7%C3%B5es?node-id=339-550" target="_blank">
    <img src="https://i.imgur.com/BNVjDVp.png" width="700">
  </a>
</p>

*Legenda: Interface principal onde o usuário escolhe o edital disponível.*

## 5. Instalação e Configuração

### Pré-requisitos

Antes de iniciar, é necessário ter instalado:

- PHP 8.x
- Composer
- Node.js e NPM
- MySQL
- XAMPP (ou outro ambiente Apache/MySQL)
- Git

- Caso não queria instalar o Node.js, inserir os seguintes comandos:

  - No PowerShell:
    
         Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned

  - No vscode:
 
         npm install

         npm run dev

### Passo a Passo

1. **Clone o repositório**
```bash
git clone https://github.com/wilcilene/inscricoes-app-equipe2.git
```

2. **Acesse a pasta do projeto**
```bash
cd nome-do-projeto
```

3. **Instale as dependências do PHP**
```bash
composer install
```

4. **Instale as dependências do front-end**
```bash
npm install
```

5. **Crie o arquivo `.env`**
```bash
cp .env.example .env
```

6. **Configure o banco de dados**

Abra o arquivo `.env` e configure:

```env
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=
```

7. **Gere a chave da aplicação**
```bash
php artisan key:generate
```

8. **Execute as migrations**
```bash
php artisan migrate
```

9. **Inicie o servidor**
```bash
php artisan serve
```

10. **Inicie o Vite**
```bash
npm run dev
```

Após isso, o sistema estará disponível em:

```txt
http://127.0.0.1:8000
```
