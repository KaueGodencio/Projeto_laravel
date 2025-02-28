# Projeto em Laravel

## Requisitos
Certifique-se de ter os seguintes requisitos instalados:https://github.com/KaueGodencio
- Composer
- MySQL ou PostgreSQL (ou outro banco de dados suportado)
- Node.js e NPM (se usar Vite ou frontend com JavaScript)

## Como Rodar o Projeto

1. **Clone o repositório**
   ```bash
   git clone https://github.com/KaueGodencio/Projeto_laravel.git
   
  
2. **Instale as dependências**
   
   composer install
   ```

3. **Configure o ambiente**
   - Copie o arquivo de exemplo:
     ```bash
     cp .env.example .env
     ```
   - Edite o `.env` e configure o banco de dados (`DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

4. **Execute as migrações**
   ```bash
   php artisan migrate
   ```

   Caso precise popular o banco com dados iniciais:
   ```bash
   php artisan migrate --seed
   ```

5. **Inicie o servidor**
   ```bash
   php artisan serve
   ```
  


