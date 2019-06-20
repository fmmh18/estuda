# estuda
Teste para o Estuda
Teste de seleção para desenvolvedor PHP

Regras:
● Prazo de sete dias corridos a partir do envio do teste. Após o término do prazo,
pode-se submeter o código mesmo que incompleto.
● O sistema deve ser feito na linguagem PHP e com o banco de dados MySQL.
● Não se pode usar qualquer framework em PHP para desenvolver o projeto, como
Laravel, Symfony, CakePHP, Yii e etc.
● O código deve estar disponível no GitHub, Gitlab ou Bitbucket.
● Deve ter o “Readme” com as instruções.
● Pode se usar qualquer biblioteca de frontend (Bootstrap, Semantic, Materialize,
Foundation, CSS, Sass, Less, Javascript, jQuery, Vue.js, React...)
Diferenciais e análise:
● Uso das PSRs.
● Estrutura do projeto, código organizado, comentado e limpo.
● Uso de alguma biblioteca frontend (Vue.js, React e etc).

Objetivo:
Desenvolver um sistema de pedidos. O sistema deverá conter as seguintes funcionalidades:
Cadastro de clientes
Abaixo os requisitos da funcionalidade:
● Deve ter a listagem com busca, cadastro, edição e exclusão de cliente.
● Campos: ID, nome, telefone, e-mail, data de nascimento e gênero.
● Campos obrigatórios: Nome e E-mail.
● Um cliente pode estar ligado a muitos pedidos.
Cadastro de produtos
Abaixo os requisitos da funcionalidade:
● Deve ter a listagem com busca, cadastro, edição e exclusão do produto.
● Campos: ID, Descrição do produto e valor.
● Campos obrigatórios: Descrição e valor.
● Um produto pode estar ligado a muitos pedidos.
Pedidos
Abaixo os requisitos da funcionalidade:
● Deve ter a listagem com busca, cadastro, edição e exclusão do pedido.
● Campos: ID, Data do pedido, Total de itens, Total do pedido, Situação do pedido.
● Campos obrigatórios: ID, Data e Situação.

● Um pedido deve:
○ Estar ligado à apenas um cliente.
○ Conter os itens do pedido, onde cada item está ligado a um produto.
○ Exibir o total de itens.
○ Exibir o valor total do pedido.
● Observações:
○ Cada item do pedido tem os seguintes campos: ID, ID do pedido, ID do
produto, Quantidade do produto, Valor do item e Valor total.

Tabelas necessárias:
● Clientes
● Produtos
● Pedidos
● Itens do pedido
