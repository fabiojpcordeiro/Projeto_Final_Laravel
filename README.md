Este é meu projeto final da disciplina de Programação Orientada a Objetos para Web

O objetivo da aplicação é promover um canal entre empresas que precisam de mão de obra temporária ou
intermitente e pessoas que não tem um trabalho fico ou querem uma renda extra.

O backend consiste em uma api que usa Sanctum para autenticação do aplicativo mobile feito em Flutter,
e também usa o Breeze/Livewire para a autenticação das rotas Web.
Componentes Livewire de autenticação foram aproveitados e outros componentes foram criados quando
foi oportuno, requisições Ajax foram usadas para melhorar usabilidade em certas ocasiões.

Para baixar o projeto, em uma pasta nova abra um terminal e use o comando

git clone https://github.com/fabiojpcordeiro/Projeto_Final_Laravel.git

Após o termino do download navegue até a pasta usando

cd Projeto_Final_Laravel

Em seguida instale as dependências com:

Composer install
npm install

Gere uma chave de aplicação com:
php artisan key:generate

E rode as migrations:
php artisan migrate

Para popular as tabelas de cidades e estados use o comando php artisan ibge:import, ele irá
consumir a API do ibge e popular essas tabelas.

A seguir basta copiar o env.example para um novo arquivo .env e configurar de acordo com seu ambiente
No meu projeto foi usado um banco de dados mySql.

Aí basta apenas rodar o server do laravel e vite
npm run dev
php artisan serve

O projeto usa arquivos de pdf como currículo dos cantidados e tem fotos de perfil também, eu não fiz
o upload desses arquivos então a aplicação tentará puxar os placeholders.