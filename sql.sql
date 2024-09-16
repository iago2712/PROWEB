drop table programas;

create table programas (
    id int AUTO_INCREMENT primary key,
    nome VARCHAR(50),
    descricao varchar(50),
    foto longblob
);

insert into programas (nome, descricao, foto) values ("Charizard", "Rato gigante de fogo", "img/charizard.png");
insert into programas (nome, descricao, foto) values ("Pikachu", "Rato eletrico", "img/pikachu.jpg");

select * from programas;