## SISTEMA DE SELEÇÃO CONTEMPLADOS DO MCMV – VANETE ALMEIDA

1. **Sobre o sistema**

  O Sistema foi desenvolvido pelo Núcleo de Tecnologia da Informação da Prefeitura de Serra Talhada e tem como objetivo realizar o processo de seleção dos ganhadores das habitações do empreendimento Vanete Almeida, do programa Minha Casa Minha Vida. Para a realização deste processo, o sistema seguiu as especificações da portaria Nº 412, de 06 de agosto de 2015, do Ministério das Cidades.

2. **Geração do número único e realização do sorteio**

  Cada participante receberá um número único que será utilizado como senha no processo de sorteio. Esse número será gerado a partir de um algoritmo que garante aleatoriedade do mesmo.

  2.1.	**Critérios de geração do número único**
  
     Critérios de geração do número único:
  
    *	O número único é gerado com base em duas variáveis para determinar o menor e o maior número gerado;
    *	A primeira variável é o número da loteria federal do concurso anterior ao sorteio;
    *	A segunda variável é a soma da primeira variável com o número total de participantes do sorteio;
    *	Após isso, cada participante receberá aleatoriamente, como senha única, um número do intervalo entre as duas variáveis;
    *	Os ganhadores serão aqueles que possuírem os menores números (que mais se aproximaram do número da loteria federal) dentro do grupo ao qual pertença.  
  
  
   2.2. **Algoritmo de geração do número único**
  
   **Classe NumeroUnico**
      1.	O sistema gera e salva em arquivo, utilizando a função numeros($args), uma lista¹ com as senhas que serão utilizadas para os sorteios;
      2.	Para cada sorteio² a ser realizado será utilizado a função atribuiNumeroUnico($args). Esta função sorteia aleatoriamente as senhas da lista¹ (tópico a) utilizando a função shuffle³ e seleciona no banco de dados os candidatos participantes do sorteio em questão;
      3.	Após obter a lista¹ aleatória de senhas e a lista de participantes do sorteio (tópico b), a função atribuiNumeroUnico($args) também atribui a cada participante uma senha, obedecendo a sequência de ambas as listas, adicionando esta senha no banco de dados;

   **Classe Sorteio**
      1.	Depois de todos os participantes receberem suas senhas, a função sorteia($args) é utilizada para determinar os contemplados², selecionando aqueles que possuírem como senhas os valores que mais se aproximarem do número da loteria federal<sup>4</sup>;
      
      
    <sup>1</sup> Array com os números do intervalo entre as duas variáveis descritas na sessão 2.1.
    
    <sup>2</sup> Organização e quantidade de contemplados dos sorteios definidos no edital (http://serratalhada.pe.gov.br/wp-content/uploads/2017/03/EDITAL-DE-SORTEIO-VANETE-ALMEIDA.pdf). 
    
    <sup>3</sup> Função PHP que mistura os elementos de um array. (Documentação da função: http://php.net/manual/pt_BR/function.shuffle.php).
    
    <sup>4</sup> Concurso da loteria federal realizado no sábado anterior ao dia do sorteio.
