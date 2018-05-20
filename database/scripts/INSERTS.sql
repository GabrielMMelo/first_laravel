use pcd;

### CARGOS ###
INSERT INTO cargo (nome, direx) VALUES ('Diretor Presidente', true);
INSERT INTO cargo (nome, direx) VALUES ('Diretor Vice-presidente', true);
INSERT INTO cargo (nome, direx) VALUES ('Diretor de Processos Internos', true);
INSERT INTO cargo (nome, direx) VALUES ('Diretor de Negócios', true);
INSERT INTO cargo (nome, direx) VALUES ('Diretor de Projetos', true);
INSERT INTO cargo (nome, direx) VALUES ('Gerente de Marketing', false);
INSERT INTO cargo (nome, direx) VALUES ('Gerente de Produtos Internos', false);
INSERT INTO cargo (nome, direx) VALUES ('Membro', false);
INSERT INTO cargo (nome, direx) VALUES ('Trainee', false);

### MEMBROS ###
INSERT INTO membro (nome, cargo, cpf, rg, email, pass) VALUES ('Gabriel Marques de Melo', 1, 02132449694, 'MG-16.191.021', 'gabrielmelocomp@gmail.com', md5('12345678'));

### TIPO DE ADVERTENCIAS ###
INSERT INTO tipo_advertencia (nome, pontos) VALUES ('Atraso em reunião (Geral, projeto, assembleia e demais eventos)', 6);
INSERT INTO tipo_advertencia (nome, pontos) VALUES ('Ausência em reunião (Geral, projeto, assembleia e demais eventos)', 10);

### STATUS DE ADVERTENCIAS ###
INSERT INTO status_advertencia (nome) VALUES ('Deferida');
INSERT INTO status_advertencia (nome) VALUES ('Indeferida');
INSERT INTO status_advertencia (nome) VALUES ('Em processo');

### ADVERTENCIAS ###
INSERT INTO advertencia (tipo, penalizado, responsável, data, descricao, status) VALUES (1, 'Gabriel Marques de Melo', 'Gabriel Marques de Melo', '22-02-18', 'Atraso na reunião geral', 3);