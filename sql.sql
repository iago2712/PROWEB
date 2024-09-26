drop database pokemon;

create database pokemon;

use pokemon;

create table trainer(
    id int AUTO_INCREMENT primary key,
    nome varchar(20),
    idade int,
    email varchar(25),
    senha varchar(100)
);

create table pokemon(
    id int AUTO_INCREMENT primary key,
    nome VARCHAR(50),
    descricao varchar(150),
    img varchar(50),
    nivel int
);

create table evolucao(
    id_evolucao int AUTO_INCREMENT primary key,
    id_poke_base int,
    id_poke_evoluido int,
    nivel int,
    FOREIGN KEY (id_poke_base) REFERENCES pokemon(id),
    FOREIGN KEY (id_poke_evoluido) REFERENCES pokemon(id)
);

create table ttype(
    id int AUTO_INCREMENT primary key,
    nome varchar(10)
);

create table poke_type(
    id_poke int,
    id_type int,
    FOREIGN KEY (id_poke) REFERENCES pokemon(id),
    FOREIGN KEY (id_type) REFERENCES ttype(id),
    PRIMARY KEY (id_poke,id_type)
);

create table poke_trainer(
    id_poke int,
    id_trainer int,
    FOREIGN KEY (id_poke) REFERENCES pokemon(id),
    FOREIGN KEY (id_trainer) REFERENCES trainer(id),
    PRIMARY KEY (id_poke, id_trainer)
);

use pokemon;

INSERT INTO trainer(nome, senha) values("William", "teste");
INSERT INTO trainer(nome, senha) values("Camila", "senha");
INSERT INTO trainer(nome, senha) values("Iago", "I4g0");

INSERT INTO pokemon (nome, descricao, nivel) values ("Charmander", "Rato pequeno de fogo",5);
INSERT INTO pokemon (nome, descricao, nivel) values ("Charmileon", "Rato medio de fogo",20);
INSERT INTO pokemon (nome, descricao, nivel) values ("Pikachu", "Rato eletrico", 10);
INSERT INTO pokemon (nome, descricao, nivel) values ("Snorlax", "Rato Obeso", 30);
INSERT INTO pokemon (nome, descricao, nivel) values ("Venossauro", "Rato gigantesco de grama que come cu de curioso.",40);

INSERT INTO ttype (nome) values ("Fogo");
INSERT INTO ttype (nome) values ("Grama");
INSERT INTO ttype (nome) values ("Agua");
INSERT INTO ttype (nome) values ("Dragão");
INSERT INTO ttype (nome) values ("Raio");
INSERT INTO ttype (nome) values ("Normal");


INSERT INTO poke_type (id_poke, id_type) values (1,1);
INSERT INTO poke_type (id_poke, id_type) values (2,1);
INSERT INTO poke_type (id_poke, id_type) values (3,5);
INSERT INTO poke_type (id_poke, id_type) values (4,6);
INSERT INTO poke_type (id_poke, id_type) values (5,2);

INSERT INTO evolucao (id_poke_base, id_poke_evoluido, nivel) values (1,2,16);


INSERT INTO poke_trainer(id_poke, id_trainer) values (1,1);
INSERT INTO poke_trainer(id_poke, id_trainer) values (5,1);
INSERT INTO poke_trainer(id_poke, id_trainer) values (3,2);
INSERT INTO poke_trainer(id_poke, id_trainer) values (4,3);


--1) Query para buscar quais pessoas tem quais pokemon
use pokemon;
SELECT t.nome as Trainer, p.nome as Pokémon
    FROM trainer t, pokemon p, poke_trainer pt 
    WHERE t.id = pt.id_trainer 
        and pt.id_poke = p.id;