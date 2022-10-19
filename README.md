# Logar-Cadastrar

Formulários de cadastro e login sempre foram muito comuns nos sites. Eles são responsáveis por permitir que um usuário registrado tenha acesso a sua página restrita.

Nesse projeto mostro como criar uma tela simples de cadastro e login, como fazer a conexão com o banco de dados e a verificação se o usuário já está cadastrado.

## Demo

![](https://github.com/jacksoncastilho/Logar-Cadastrar/blob/main/img/Screenshot%20from%202020-12-22%2013-03-18.png)

![](https://github.com/jacksoncastilho/Logar-Cadastrar/blob/main/img/Screenshot%20from%202020-12-22%2013-03-22.png)

## Como Parametrizar Seu Banco de Dados

Criar o banco de dados e a tabela em que os dados vão ficar armazenados. Os nomes ```registro``` e ```cadastroUsuarios``` podem ser substituidos, assim como os nomes das colunas da tabela.

```sql
CREATE DATABASE registros;

USE registros;

CREATE TABLE cadastroUsuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,           
    username VARCHAR(80) NOT NULL,                       
    password VARCHAR(52) NOT NULL,                       
    confPassword VARCHAR(52) NOT NULL);

```
