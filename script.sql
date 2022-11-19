create table candidatos(
codigo int not null unique auto_increment,
nome varchar(45),
partido varchar(45),
numero int
votos int
)

INSERT INTO candidatos (nome, partido, numero) VALUES 
('José', 'AP', 50),
('Maria', 'MA', 90),
('Anita', 'PO', 53),
('Michael', 'SC', 60)