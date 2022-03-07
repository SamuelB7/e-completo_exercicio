## Teste e-completo 

Para rodar o teste e verificar as rotas:

1 - Crie um arquivo <em>.env</em> a partir do <em> .env.example</em> e preencha com as credencias de acesso ao banco de dados e chave API.<br>

Exemplo:<br>
<img src='https://i.imgur.com/qCTWHNw.png'>

2 - Rode o seguinte comando para criar e popular as tabelas no banco de dados:<br>

<em>php artisan migrate:fresh --seed</em> <br>

Foram utilizados os mesmos dados fornecidos pelo exercício, eles estão em: database/seeders/DatabaseSeeder.php

3 - Testar as rotas:<br>
    - Rode o comando: <em>php artisan serve</em> para iniciar a aplicação<br>
    - Utilize o insomnia ou o postman para testar as rotas


O teste possui duas rotas:

### Essa rota vai processar os pagamentos individualmente de acordo com o seu ID:
http://localhost:8000/api/process_payment/{id_pedido}

Caso o pedido não esteja dentro das condições solicitadas, o pagamento não será processado e será mandado um erro como resposta. Caso dê certo será enviado uma mensagem de sucesso.

Exemplo: <br>

<img src="https://i.imgur.com/GjTaZoq.png"> <br>


### Essa outra rota vai processar todos os pagamentos pendentes de uma vez, desde que eles se enquadrem nos requisitos:
http://localhost:8000/api/process_all_payments

Exemplo:

<img src="https://i.imgur.com/GuYsVty.png">

