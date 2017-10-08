create table ingredients
(
	id int auto_increment,
	name varchar(50) not null,
	cost float not null
)
;

create unique index ingredients_id_pk
	on ingredients (id)
;

create table pizza
(
	id int auto_increment,
	name varchar(50) not null,
	cost float not null
)
;

create unique index pizza_id_pk
	on pizza (id)
;

create table pizza_ingredient
(
	id int auto_increment,
	pizza_id int null,
	ingredient_id int null
)
;

create index pizza_ingredient_pizza_id_fk
	on pizza_ingredient (pizza_id)
;

create index pizza_ingredient_ingredients_id_fk
	on pizza_ingredient (ingredient_id)
;

