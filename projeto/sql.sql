--PARA CRIAÇÃO DO BANCO PARA INICIALIZAÇÃO DO SITE, SELECIONE

-------------- DAQUI ---------------
 
drop database if exists pokemon;

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
    img MEDIUMTEXT NOT NULL,
    nivel int
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

INSERT INTO trainer (nome, idade, email, senha) VALUES ('admin', 20, 'admin@testes', '123');

INSERT INTO ttype (nome) values ("Fogo");
INSERT INTO ttype (nome) values ("Grama");
INSERT INTO ttype (nome) values ("Pedra");
INSERT INTO ttype (nome) values ("Agua");
INSERT INTO ttype (nome) values ("Dragão");
INSERT INTO ttype (nome) values ("Raio");
INSERT INTO ttype (nome) values ("Normal");
INSERT INTO ttype (nome) values ("Fada");

------------ ATÉ AQUI ---------------



--------------- INSERTS PARA POPULAR TABELAS PARA TESTE (NÃO NECESSÁRIO MAIS AGORA O BANCO ESTÁ 100% INTEGRADO NO SITE) -----------
-- use pokemon;

-- INSERT INTO trainer(nome, senha) values("William", "teste");
-- INSERT INTO trainer(nome, senha) values("Camila", "senha");
-- INSERT INTO trainer(nome, senha) values("Iago", "I4g0");

-- INSERT INTO pokemon (nome, descricao, img, nivel) values ("Charmander", "Rato pequeno de fogo", 'http://localhost/img/charmander.png',5);
-- INSERT INTO pokemon (nome, descricao, nivel) values ("Charmileon", "Rato medio de fogo",20);
-- INSERT INTO pokemon (nome, descricao, nivel) values ("Pikachu", "Rato eletrico", 10);
-- INSERT INTO pokemon (nome, descricao, nivel) values ("Snorlax", "Rato Obeso", 30);
-- INSERT INTO pokemon (nome, descricao, nivel) values ("Venossauro", "Rato gigantesco de grama que come cu de curioso.",40);




-- INSERT INTO poke_type (id_poke, id_type) values (1,1);
-- INSERT INTO poke_type (id_poke, id_type) values (2,1);
-- INSERT INTO poke_type (id_poke, id_type) values (3,5);
-- INSERT INTO poke_type (id_poke, id_type) values (4,6);
-- INSERT INTO poke_type (id_poke, id_type) values (5,2);



-- use pokemon;
-- INSERT INTO poke_trainer(id_poke, id_trainer) values (1,1);
-- INSERT INTO poke_trainer(id_poke, id_trainer) values (5,1);
-- INSERT INTO poke_trainer(id_poke, id_trainer) values (3,2);
-- INSERT INTO poke_trainer(id_poke, id_trainer) values (4,3);

-------------------------------------------------------------------------------------------------


--1) Query para buscar quais pessoas tem quais pokemon
use pokemon;
SELECT t.nome as Trainer, p.nome as Pokémon
    FROM trainer t, pokemon p, poke_trainer pt 
    WHERE t.id = pt.id_trainer 
        and pt.id_poke = p.id;

use pokemon;    
SELECT t.nome as trainer, p.nome, p.img, p.descricao 
            FROM pokemon p, trainer t, poke_trainer pt 
                WHERE p.id = pt.id_poke AND t.id = pt.id_trainer
                AND t.nome = t.nome;

use pokemon;      
SELECT t.nome as trainer, p.nome, p.img, p.descricao 
                FROM pokemon p, trainer t, poke_trainer pt 
                    WHERE p.id = pt.id_poke AND t.id = pt.id_trainer
                        AND t.nome = 'William';

use pokemon;
SELECT pokemon.* FROM pokemon, poke_type, ttype 
    WHERE poke_type.id_type = ttype.id AND poke_type.id_poke = pokemon.id
        AND ttype.nome = 'Fogo';

use pokemon;
SELECT * FROM pokemon;

use pokemon;
SELECT * FROM trainer;

use pokemon;
SELECT * FROM poke_trainer;

use pokemon;
SELECT * FROM poke_type;

use pokemon;
SELECT * FROM ttype;