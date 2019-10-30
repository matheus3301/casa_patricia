
# Casa de Patrícia

  ![Casa de Patrícia - Logo](https://i.imgsafe.org/9d/9de07e6e69.png)

O sistema foi desenvolvido durante o meu Estágio Curricular Obrigatório enquanto eu estudava na EEEP Walter Ramos de Araújo. O Sistema foi criado para a *Associação Salão de Leitura Antônio Sales* para suprir as necessidades do projeto *Casa de Patrícia* e ajudar na organização dos eventos realizados pela associação e gerenciar de forma mais fácil todos as pessoas atingidas pelo projeto.

![Home](https://i.imgsafe.org/9d/9de8b14d57.png)

O sistema foi criado exatamente com base nas necessidades levantadas tanto por mim quanto pela Anastácia Martins, minha supervisora de estágio.

  

## Instalação

  

O projeto foi todo desenvolvido em PHP, usando o Banco de Dados MySQL.

  

#### Requisitos

  

* XAMPP
* Composer
* Git

#### Passo a Passo

 1. Primeiramente, é necessário clonar o repositório. Para tanto, copie a url e execute o seguinte comando na sua pasta *htdocs*

    $ git clone https://github.com/matheus3301/casa_patricia.git
![Cloning the repository](https://i.imgsafe.org/9d/9dfa794158.gif)

2. Em seguida, é necessário instalar as dependências/pacotes do composer. Acesse o repositório que você clonou e em seguida execute a instalação:

    $ cd casa_patricia
    $ composer install

![Instaling dependencies](https://i.imgsafe.org/9e/9e07479384.gif)

3. Agora é necessário fazer a instalação do banco de dados que será acessado. Inicie seu servidor Apache e seu SGBD, em seguida acesse o phpMyAdmin (normalmente o link é [esse](localhost/phpmyadmin)) e crie o banco de dados db_patricia, acesse o banco e importe o arquivo *db_patricia.sql* que está localizado na pasta *sql* dentro do repositório.

![Importing database](https://i.imgsafe.org/9e/9e17c1d788.gif)

4. Agora, para acessar o sistema, acesse o seu navegador e digite a url

    http://localhost/casa_patricia
	
	

	:heart_eyes:

## Funcionalidades