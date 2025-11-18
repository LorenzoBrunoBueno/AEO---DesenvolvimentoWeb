INSTRUÇÕES DE EXECUÇÃO (BACKEND - PHP + MYSQL)

1) LOCAL DO PROJETO:
   Coloque as pastas em:
   C:\xampp\htdocs\quasetudogostoso\

   Estrutura recomendada:
   C:\xampp\htdocs\quasetudogostoso\Frontend\
   C:\xampp\htdocs\quasetudogostoso\backend\

2) FRONTEND:
   Dentro de:
   C:\xampp\htdocs\quasetudogostoso\Frontend\
   Coloque:
      - cadastro.html
      - CSS/
      - IMG/

3) BACKEND:
   Dentro de:
   C:\xampp\htdocs\quasetudogostoso\backend\
   Coloque:
      - db.php
      - salvar_usuario.php
      - README.txt (este arquivo)

4) EXECUTANDO:
   Abra o XAMPP
     - Clique em START no Apache
     - Clique em START no MySQL

   No navegador, acesse:
     http://localhost/quasetudogostoso/Frontend/cadastro.html

5) FUNCIONAMENTO:
   - Preencha o form
   - Clique em Cadastrar
   - O PHP do backend executa o insert no banco
   - Exibe “Usuário cadastrado com sucesso”

6) BANCO DE DADOS:
   Importe o arquivo:
     script_criacao_Quase_tudo_gostoso.sql
   Usando o MySQL Workbench ou phpMyAdmin.

7) IMPORTANTE:
   NÃO use Live Server (porta 5500).
   Para funcionar, o site deve ser acessado via:
     http://localhost/
