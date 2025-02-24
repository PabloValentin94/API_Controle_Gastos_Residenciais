# API - Sistema de Controle de Gastos Residenciais

Desenvolvimento de uma API de suporte para um sistema que permite que pessoas possam gerenciar suas transações monetárias.

## Funcionalidades (Aplicação C#)

- Cadastro de pessoas (Inserção, deleção e listagem.);

- Cadastro de transações (Inserção e listagem.);

- Consulta/Listagem de gastos totais separados por tipos (Total de despesas, total de receitas e saldo total.).

## Estrutura - Banco de Dados

- Tabela Pessoa: id, nome e idade;

- Tabela Transacao: id, descricao, valor, tipo e id da pessoa (Criador da transação.).

## Consulta de Totais de Gastos

A API retornará um JSON contendo a listagem de todas as pessoas e seus gastos. Gastos calculados:

- Total de despesas de cada pessoa;

- Total de receitas de cada pessoa;

- Saldo total de cada pessoa (Receitas - despesas.).

## Como Executar a API

- Abra, através de um terminal, a pasta **"Api"** do projeto, como especificado abaixo:

```bash
cd\

cd "Caminho, desde a raíz, até a pasta do repositório."/Api
```

- Execute o seguinte comando no terminal, após o passo anterior:

```bash
php -S 0.0.0.0:8000
```

O host especificado acima permite que o PHP aceite requisições de hosts de outros dispositivos além do da máquina onde está rodando. Como o emulador android é considerado um host separado da máquina que o executa, essa configuração é obrigatória.

Para que o ambiente esteja pronto para uso, o terminal deve exibir uma saída parecida com essa:

```bash
Development Server (http://0.0.0.0:8000) started
```

Tenha em mente que para o funcionamento correto, é preciso possuir o PHP instalado na máquina e ter o caminho até seu executável declarado no **PATH** das variáveis de ambiente do sistema operacional. A API não funcionará se for executada em uma pasta que não seja a especificada anteriormente.

## Como Rodar o Banco de Dados da API

- Abra algum SGBD (MySQL Workbench, SQLyog, etc.) e execute o arquivo **"DDL.sql"**, localizado na pasta **"Database"**;

- Se necessário, altere os parâmetros de conexão com o banco de dados localizados no arquivo **"Config.php"**, dentro da pasta **"Api"**.

## Tutoriais - PHP (Fonte: [Tiago A. Silva](https://www.youtube.com/@prof.tiagotas))

- Instalação: [Clique aqui](https://www.youtube.com/watch?v=16Efwzm1944&list=PLHVpcBDJr5dn5xP1FWclsDgSSVNLzPit7&index=1&pp=iAQB);

- Visual Studio Code: [Clique aqui](https://www.youtube.com/watch?v=kk0VxU3dh5Q&list=PLHVpcBDJr5dn5xP1FWclsDgSSVNLzPit7&index=2&pp=iAQB);

- Configuração: [Clique aqui](https://www.youtube.com/watch?v=VUF6rJJERqs&list=PLHVpcBDJr5dn5xP1FWclsDgSSVNLzPit7&index=3&pp=iAQB).