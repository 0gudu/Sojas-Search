-- Drop da tabela dados, se existir
DROP TABLE IF EXISTS dados;

-- Criação da tabela dados
CREATE TABLE IF NOT EXISTS dados (
  id_dados INT NOT NULL AUTO_INCREMENT,
  fds VARCHAR(85) NOT NULL,
  urls LONGTEXT NOT NULL,
  email LONGTEXT NOT NULL,
  senha LONGTEXT NOT NULL,
  PRIMARY KEY (id_dados)
);

-- Adicionando índices na tabela dados
CREATE INDEX idx_fds ON dados (fds);
CREATE INDEX idx_urls ON dados (urls);
CREATE INDEX idx_email ON dados (email);
CREATE INDEX idx_senha ON dados (senha);

-- Dumping data for table dados
INSERT INTO dados (fds, urls, email, senha) VALUES ("http","//ww.exemplo1.com","g@g.com1","senha1");
INSERT INTO dados (fds, urls, email, senha) VALUES ("http","//ww.exemplo2.com","g@g.com2","senha2");
INSERT INTO dados (fds, urls, email, senha) VALUES ("http","//ww.exemplo3.com","g@g.com3","senha3");
-- ...

-- Drop da tabela databasess, se existir
DROP TABLE IF EXISTS databasess;

-- Criação da tabela databasess
CREATE TABLE IF NOT EXISTS databasess (
  id_database INT NOT NULL AUTO_INCREMENT,
  names VARCHAR(85) NOT NULL,
  PRIMARY KEY (id_database)
);

-- Dumping data for table databasess
INSERT INTO databasess (id_database, names) VALUES
(2, 'a');
