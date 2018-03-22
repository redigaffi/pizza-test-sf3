CREATE DATABASE IF NOT EXISTS app;

USE app;

create table ingredients
(
	id int auto_increment,
	name varchar(50) not null,
	cost float not null,
    primary key(id)
)
;

INSERT INTO ingredients (name, cost) VALUES ('zanaoria', 1.20);
INSERT INTO ingredients (name, cost) VALUES ('tomate', 0.99);
INSERT INTO ingredients (name, cost) VALUES ('pepino', 4.8);
INSERT INTO ingredients (name, cost) VALUES ('acelga', 3.4);
INSERT INTO ingredients (name, cost) VALUES ('brecol', 2.5);
INSERT INTO ingredients (name, cost) VALUES ('calabacin', 2);
INSERT INTO ingredients (name, cost) VALUES ('coliflor', 2);
INSERT INTO ingredients (name, cost) VALUES ('maiz', 1.5);
INSERT INTO ingredients (name, cost) VALUES ('judias', 1.8);

create unique index ingredients_id_pk
	on ingredients (id)
;

create table pizza
(
	id int auto_increment,
	name varchar(50) not null,
	cost float not null,
    primary key(id)
)
;

create unique index pizza_id_pk
	on pizza (id)
;

create table pizza_ingredient
(
	id int auto_increment,
	pizza_id int null,
	ingredient_id int null,
    primary key(id)
)
;

create index pizza_ingredient_pizza_id_fk
	on pizza_ingredient (pizza_id)
;

create index pizza_ingredient_ingredients_id_fk
	on pizza_ingredient (ingredient_id)
;

