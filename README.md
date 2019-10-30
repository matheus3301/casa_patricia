
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

#### Cadastro de Pessoa
É possível cadastrar as pessoas vinculdas a associação, informando os mais diversos dados que são muito importantes, incluindo uma foto, xerox de documentos e até as doenças que cada pessoa possui, para o gerenciamento e organização. Os cadastrados são divididos em: Idosos, Deficientes e Associados(podendo também ser idosos).
![Cadastro](https://i.imgsafe.org/9e/9ecd63329c.gif)

#### Consulta de Cadastros
É possível consultar todos os registros, fazendo buscas por qualquer campo, como por exemplo o Nome. Na tabela de cadastros é possível acessar a xerox dos documentos, alterar algum cadastro e até mesmo inativar algum cadastro.
![Consulta](https://i.imgsafe.org/9e/9ed88298a5.png)

#### Inativar Cadastrado
Essa parte é muito importante, pois como é uma associação que cuida de idosos e deficientes, as vezes alguns vem à óbito e se torna necessário fazer tal registro. Para inativar alguém, é necessário informar um motivo, que será armazenado, e todo histórico de ativações e inativações de um cadastro será exibido ao clicar no botão *Histórico*, localizado em cada linha da tabela de consulta.
![Inativar](https://i.imgsafe.org/9e/9ee74b1fb2.gif)
![Historico](https://i.imgsafe.org/9e/9eec6cd656.png)

#### Alterar Cadastro
Também é possível alterar qualquer cadastro já feito, basta somente clicar no botão alterar e editar os campos que sejam precisos e então clicar no botão *Salvar*.
![Alterar](https://i.imgsafe.org/9e/9edfd1f2a4.gif)


#### Controle de Frequência
A partir do sistema, é possível controlar a frequência de todos idosos e deficientes à associação. Para tanto, basta selecionar o Mês e Ano (caso não selecione, automaticamente é selecionado o mês atual) e clicar em cima dos dias referentes às presenças de cada pessoa e em seguida clicar no botão *Salvar*.
![Frequencia](https://i.imgsafe.org/9e/9efec5592d.gif)

#### Observações no Mês
É possível adicionar observações específicas para cada mês, basta ir em *Controle de Frequência* e nas *Observações do Mês* clicar no *+*.
![Observações](https://i.imgsafe.org/9f/9f69fa30ea.gif)

#### Controle de Eventos
Para organizar e programar a rotina da associação, podem-se criar eventos na aba *Calendário de Eventos*.Os eventos podem ser divididos em Internos e Externos, após criados, aparecerão nos meses em que foram definidos e no calendário da própria página.
![Calendário](https://i.imgsafe.org/9f/9f8388fe8d.gif)

#### Imprimir Ficha Individual
Para cada cadastrado, é possível gerar uma ficha individual contento todos os dados do cadastro e a foto de cadastro. A ficha será gerada automaticamente em PDF pronta para ser impressa ou salva.
![Ficha](https://i.imgsafe.org/9f/9f8c943214.gif)

#### Relatórios Personalizados
Em casos de necessidades específicas, é possível gerar relatórios contendo campos selecionados e com tipos diferentes de cadastros. O Relatório é gerado em PDF e é baixado automaticamente para a máquina do usuário, podendo ser impresso facilmente.
![Relatorio](https://i.imgsafe.org/9f/9faa541cce.gif)

#### Ficha de Frequência Manual
Para facilitar a dinâmica dentro da associação, é possível gerar folhas de frequência para serem impressas e serem preenchidas manualmente e depois as informações podem ser passadas para o sistema. As fichas de frequência são dividas entre Deficientes e Idosos e cada uma contém somente os cadastros respectivos aos tipos.
![Frequencia Manual](https://i.imgsafe.org/9f/9fb3275b82.png)

#### Folha de Cadastro Manual
A fim de ter um registro mais rápido, o usuário pode baixar a Folha de Cadastro Manual que contém os campos do cadastro e que pode ser impressa facilmente.
![Cadastro Manual](https://i.imgsafe.org/9f/9fbc42affc.png)

## Considerações
Para mim esse sistema é muito importante, pois é o primeiro sistema que eu desenvolvi que realmente está em produção(está sendo usado na vida real), é uma sensação incrível ver que as pessoas realmente estão gostando e estão sentindo que o sistema veio para melhorar a dinâmica dentro da associação. Se eu já gostava de programar, agora eu amo.

## Contribuições
Qualquer contribuição é EXTREMAMENTE bem-vinda. Se você tem alguma idéia, correção(tem muuuita coisa pra corrigir :sob: ) ou mesmo quer melhorar essa documentação, esteja a vontade para dar um fork nesse projeto e em seguida mandar aquele lindo pull-request :smiley:. 