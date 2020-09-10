# Exercícios de Banco de Dados I

Para todos os contextos a seguir elabore:  
• MER  
• Mapeamento para o Modelo Relacional, indicando as chaves primárias, chaves estrangeiras, tipos de especializações, etc.  

## 1 Biblioteca  

Considere o cenário de uma biblioteca. Nela é possível cadastra, alterar, excluir e listar os usuários, livros, autores e empréstimos. Para o usuário deve ser armazenado seu nome, telefone, CPF e data de nascimento. Para o livro deve ser armazenado o nome, lista de autores e data de publicação. Sobre os autores deve-se armazenar o nome e país de origem. Para os empréstimos é importante controlar a data de empréstimo e devolução. Não existem reservas de livros e o prazo de devolução é de 15 dias. O leitor pode ter no máximo 3 livros emprestados. O sistema deve permitir a consulta da bibliotecária ou do leitor ao acervo, indicando se o livro está retirado ou disponível.

## 2 Banco  

Um banco pretende criar uma base de dados para gerir parte das informações relativas aos seus clientes e estrutura interna do banco. O banco possui dois tipos de clientes, os comuns e os especiais. Para os clientes comuns, deve-se armazenar seu CPF, RG, nome, endereço, e-mails e telefones. Para os clientes especiais, deseja-se saber seu CPF, RG, nome, endereço, e-mails, telefones e renda mensal. Os clientes possuem contas no banco. Essas contas podem ser conta corrente ou conta poupança. Para as contas corrente, é de interesse armazenar seu número e o limite do cheque especial. Para as contas poupança, pretende-se armazenar seu número, data de aniversário e o rendimento mensal. Uma vez que o cliente abriu uma conta no banco, ele pode ou não solicitar um cartão, o qual pode ser usado para movimentar a conta ou como cartão de crédito. Portanto, o cartão é vinculado a um cliente e a uma determinada conta. Sobre o cartão, deve-se guardar o seu número, data de validade e código de proteção. Cada cliente especial possui um gerente particular. Sobre os gerentes, deve-se armazenar seu CPF, RG, nome, endereço, data de contratação, tempo de serviço no banco e salário.

## 3 Sistema Escolar  

Considere os requisitos a seguir sobre um sistema escolar:

1. Sobre os departamentos deseja-se armazenar seu código e nome. Todo departamento possui um professor como responsável, e um professor só pode ser responsável por um único departamento.1. Sobre os professores, deve-se armazenar seu CPF, nome, endereço (que é composto por rua, número, CEP, cidade e UF), salário e titulação (um professor pode possui diversos títulos). Além disso, quando um professor possuir dependentes, ele tem direito a um valor extra, calculado de acordo com o número de dependentes que possui. Assim, deve-se armazenar as seguintes informações sobre seus dependentes: nome, data de nascimento e CPF.
1. Um professor pode ministrar várias disciplinas e uma disciplina pode ter vários professores ao longo dos semestres letivos. Então, quando um professor ministra uma disciplina é importante saber o semestre e ano que ele está lecionando a mesma. Um professor pode ministrar a mesma disciplina em semestres/anos diferentes.
1. Sobre os alunos, deseja-se armazenar seu RA, nome, endereço e sexo, data de nascimento e idade, sendo que a idade é calculada em função de sua data de nascimento. Eles podem se matricular em várias disciplinas oferecidas pelos professores no semestre. Cada disciplina possui pré-requisitos, isto é, um conjunto de disciplinas que o aluno deve ter sido aprovado para poder cursá-la. É preciso guardar a nota do aluno para cada disciplina cursada por ele.  
1. Alguns alunos podem ser alunos de pós-graduação também e, nesse caso, eles devem possuir um professor orientador. Para os alunos de pós-graduação deve-se armazenar o título de seu trabalho, a área de atuação, data de início e data de término do seu trabalho de pós. Um professor pode orientar vários alunos de pós-graduação.  
1. Para cada disciplina deseja-se armazenar seu código, nome, ementa e número de créditos.  

## 4 Turismo  

Deseja-se criar um banco de dados para agência de turismo, contendo informações sobre recursos oferecidos pelas cidades que fazem parte da programação de turismo da agência. As informações a serem mantidas sobre cada cidade referem-se a hotéis, restaurantes e pontos turísticos.
Sobre os hotéis que a cidade possui deseja-se guardar o código, o nome, o endereço, categoria (sem estrela, 1 estrela, 2 estrelasm, ...), os tipos de quartos que os formam (por exemplo, luxo, superluxo, master, ...), o número dos quartos e o valor da diária de acordo com o tipo do quarto.
Sobre cada cidade deve-se armazenas seu nome, seu estado e a população. Além disso, quando uma nova cidade é cadastrada no banco de dados da agência, um código é a ela oferecido.
Cada restaurante da cidade possui um código que o indentifica, um nome, um endereço e o tipo de sua categoria (por exemplo, luxo, simples, ...). Além disso, um restaurante pode pertencer a um hotel somente pode ser associado a um restaurante.
Diferentes pontos turísticos da cidade estão cadastrados no sistema: igrejas, casas de show e museus. A agência de turismo somente trabalha com estes três tipos de pontos turísticos. Nenhum outro é possível. Além da descrição e o do endereço, igrejas devem possuir como característica a data e o estilo de construção. Já casas de show devem armazenar o horário de início do show (igual para todos os dias da semana) e o dia de fechamento (apenas um único dia na semana), além da descrição e do seu endereço. Finalmente, os museus devem armazenar o seu endereço, descrição, data de fundação e número de salas. Um museu pode ter sido fundado por vários fundadores. Para estes, deve-se armazenar o seu nome, a data de nascimento e a data da morte (se houver), a nacionalidade e a atividade profissional que desenvolvia. Além disso, um mesmo fundador pode ter fundado vários museus. Quando qualquer ponto turístico é cadastrado no sistema, ele etambém recebe um código que o indentifica. O mesmo é valido para fundadores.

Finalmente, casas de show podem possuir restaurante. Quando o cliente da agência reserva um passeio para uma casa de show, ele já sabe se esta possui restaurante e qual o preço médio da refeição, além da especialidade (comida chinesa, japonesa, brasileira, italiana, ...). Dentro de uma casa de show, apenas um único restaurante pode existir.

## 5 Palestras

Uma determinada faculdade irá promover uma semana de palestras de informática e decidiu automatizar o processo de armazenamento de seminários, de palestrantes, as salas e horários. Paratanto, sabe-se que:  

1. O evento terá muitas palestras. Sobre as palestras, deve-se armazenar o título, a área(por exemplo: banco de dados, programação, redes, etc), a data e o horário da apresentação.  
1. Sobre os palestrantes,deseja-se armazenar o CPF, RG, nome, endereço e telefone(s).
Cada palestrante pode proferir mais de uma palestra e cada palestra pode ser proferida por mais de um palestrante.
1. As palestras serão apresentadas em algumas salas da faculdade.
1. Sobre estas salas, é importante armazenar o número da sala, recursos que ela disponibiliza (Datashow, DVD, Lousa, etc) e lotação máxima. Em cada sala, existe um presidente que irá administrar as apresentações no que se refere a tempo e perguntas. Esses presidentes são professores da faculdade. Sobre eles, é necessário guardar o número da matrícula, nome e titulação (especialista, mestre, doutor, etc).

## 6 Processo Seletivo  

Uma empresa deseja automatizar o processo seletivo para contratação de seus funcionários. Paratanto, sabe-se que esta empresa está organizada em vários departamentos, os quais possuem vários cargos. Sobre os departamentos, é necessário guardar o seu código e descrição. Para os cargos, é preciso armazenar o código do cargo, descrição, salário e carga horária semanal. Um cargo está sempre associado a um departamento. Quando um cargo está vago, a empresa abre o processo seletivo para contratação de funcionários. Os processos seletivos possuem um código, a data da entrevista e o cargo em aberto, obviamente. Ainda no processo seletivo é preciso saber quais os candidatos que se inscreveram. Sobre os candidatos, a empresa deseja saber inicialmente seu CPF, nome, endereço e tempo de experiência no cargo para o qual ele se candidatou. Cada candidato pode se inscrever em vários processos seletivos. Para cada candidato, é preciso guardar a nota que ele obteve no(s) processo(s) que ele participou.

## 7 Universidade  

Em um banco de dados de universidade representamos dados sobre alunos e professores. Para alunos, representamos o código, nome, idade, sexo, cidade e estado de origem, cidade e estado de residência de suas famílias. Representamos também disciplinas que estão frequentando neste ano e para cada dia semana, as salas e horários que disciplinas são oferecidas (cada disciplina é oferecida no máximo uma vez ao dia). Para alunos graduados, representamos o nome do orientador e o número total de créditos do último ano. Para alunos de doutorado, representamos o título e área de pesquisa de suas teses. Para professores, representamos o último nome, idade, cidade e estado de origem, título, estado civil, áreas de pesquisa e o departamento a que pertencem. Todo departamento possui número, nome e telefone.
