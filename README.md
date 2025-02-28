# Projeto em Laravel

## Requisitos
Certifique-se de ter os seguintes requisitos instalados:
- Composer
- MySQL ou PostgreSQL (ou outro banco de dados suportado)
- Node.js e NPM (se usar Vite ou frontend com JavaScript)

## Como Rodar o Projeto

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seu-usuario/seu-projeto.git
   cd seu-projeto
   ```

2. **Instale as dependências**
   ```bash
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
   O projeto estará rodando em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Comandos Adicionais
- Se o projeto usa NPM/Vite:
  ```bash
  npm install
  npm run dev
  ```
- Se precisar rodar filas:
  ```bash
  php artisan queue:work
  ```
- Se houver erro de permissão:
  ```bash
  chmod -R 777 storage bootstrap/cache
  ```

---
Se precisar de mais informações, consulte a [documentação do Laravel](https://laravel.com/docs).

