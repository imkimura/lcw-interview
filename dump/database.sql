create database imkimura_vendas;

use imkimura_vendas;

create table seller (
    id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL,

    CONSTRAINT pk_seller_id
    PRIMARY KEY (id)
);

create table sale (
    id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL,
    seller_id TINYINT UNSIGNED NOT NULL,
    value DECIMAL(6, 2) NOT NULL,
    sale_date TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

    CONSTRAINT pk_sale_id
    PRIMARY KEY (id),

    CONSTRAINT fk_sale_seller_id
    FOREIGN KEY (seller_id)
    REFERENCES seller(id)
);