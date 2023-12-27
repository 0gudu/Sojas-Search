SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

-- Pode ser necessário ajustar ou remover as seguintes linhas dependendo do banco de dados.
-- Essas linhas são específicas do MySQL.
-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

-- O comando SET NAMES utf8mb4 também pode não ser necessário em alguns bancos de dados.
-- SET NAMES utf8mb4;

-- Database: `bd`

-- Table structure for table `dados`
DROP TABLE IF EXISTS dados;
CREATE TABLE IF NOT EXISTS dados (
  id_dados INT NOT NULL AUTO_INCREMENT,
  fds VARCHAR(85) NOT NULL,
  urls LONGTEXT NOT NULL,
  email LONGTEXT NOT NULL,
  senha LONGTEXT NOT NULL,
  PRIMARY KEY (id_dados)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `dados`
INSERT INTO dados (id_dados, fds, urls, email, senha) VALUES
(1, '', 'siteexemplo.com', 'emailexemplo@ex.com', 'senhaex123'),
(2, '', 'url1', 'email1', 'senha1'),
(3, '', 'url2', 'email2', 'senha2'),
(4, '', 'url3', 'email3', 'senha3'),
(5, 'url1', 'email1', 'senha1', 'ui\r'),
(6, 'url2', 'email2', 'senha2', 'ui\r'),
(7, 'url3', 'email3', 'senha3', 'ui\r'),
(8, 'url1', 'email1', 'senha1', 'ui\r'),
(9, 'url2', 'email2', 'senha2', 'ui\r'),
(10, 'url3', 'email3', 'senha3', 'ui\r');

-- Table structure for table `databasess`
DROP TABLE IF EXISTS databasess;
CREATE TABLE IF NOT EXISTS databasess (
  id_database INT NOT NULL AUTO_INCREMENT,
  names VARCHAR(85) NOT NULL,
  PRIMARY KEY (id_database)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table `databasess`
INSERT INTO databasess (id_database, names) VALUES
(2, 'a');

-- Pode ser necessário ajustar ou remover a seguinte linha dependendo do banco de dados.
-- COMMIT;

-- Pode ser necessário ajustar ou remover as seguintes linhas dependendo do banco de dados.
-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
