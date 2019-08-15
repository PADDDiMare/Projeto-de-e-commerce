-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Ago-2019 às 14:27
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `cod_cat` int(11) NOT NULL,
  `nome_cat` varchar(60) DEFAULT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `categorias`:
--

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`cod_cat`, `nome_cat`, `ativo`) VALUES
(1, 'RefeiÃ§Ãµes', b'1'),
(2, 'Bebidas', b'1'),
(3, 'Aves', b'1'),
(4, 'Carnes', b'1'),
(5, 'Peixes', b'1'),
(6, 'Saladas', b'1'),
(7, 'Sopas e Caldos', b'1'),
(9, 'Sucos', b'1'),
(10, 'GuarniÃ§Ãµes', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `ddd` int(2) DEFAULT NULL,
  `telefone` int(8) DEFAULT NULL,
  `endereco` varchar(70) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `login` varchar(12) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `news` varchar(8) DEFAULT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `cep` char(8) NOT NULL,
  `data_inclusao` datetime NOT NULL,
  `data_alteracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `clientes`:
--

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `sexo`, `ddd`, `telefone`, `endereco`, `cidade`, `estado`, `bairro`, `pais`, `login`, `senha`, `news`, `ativo`, `cep`, `data_inclusao`, `data_alteracao`) VALUES
(1, 'Haroldo Barbosa', 'hab@ism.com.br', 'Masculino', 21, 997355817, 'Largo SÃ£o Francisco de Paula, 26', 'Rio de Janeiro', 'RJ', 'Centro', 'Brasil', 'haroldo', '04fd998b189e', 'ATIVO', b'1', '20051070', '2019-07-25 12:28:21', '2019-07-25 12:28:21'),
(2, 'Maria Madalena', 'madalena@brasil', 'Masculino', 21, 121212121, 'Rua Jardim BotÃ¢nico, 69', 'Rio de Janeiro', 'RJ', 'Jardim BotÃ¢nico', 'Brasil', 'madalena', '8a68f8adbce9', 'ATIVO', b'1', '23850063', '2019-07-25 12:28:44', '2019-07-25 12:28:44'),
(4, 'Andressa Carioca', 'andressa@brasil.com', 'Masculino', 21, 2147483647, 'Rua da Carioca, 59', 'Rio de Janeiro', 'RJ', 'Centro', 'Brasil', 'andressa', '56505a8239a9', 'ATIVO', b'1', '12345678', '2019-07-25 12:32:47', '2019-07-25 12:32:47'),
(5, 'Luiza Ambel', 'luiza@email.com', 'Masculino', 21, 98598, 'Rua Rodrigo Silva, 45', 'Rio de Janeiro', 'RJ', 'EstÃ¡cio', 'Brasil', 'luizaambel', '7141e8d7b951', 'ATIVO', b'1', '25845-00', '2019-07-30 01:15:58', '2019-07-30 01:15:58'),
(6, 'Dani Calabresa', 'dani@glogo.com', 'Masculino', 21, 2147483647, 'Av. Copacabana, 1085', 'Rio de Janeiro', 'RJ', 'Copacabana', 'Brasil', 'calabresa', '56505a8239a9', 'ATIVO', b'1', '22813-09', '2019-07-31 21:33:19', '2019-07-31 21:33:19'),
(7, 'Silvio Santos', 'silvio@sbt.com.br', 'Masculino', 11, 25263, 'Rua Augusta, 11', 'SÃ£o Paulo', 'SP', 'Jardins', 'Brasil', 'silvio', 'b3eaef1d41cd', 'ATIVO', b'1', '11123-00', '2019-08-02 06:55:24', '2019-08-02 06:55:24'),
(8, 'Marina Silva', 'marina@acre.com', 'Feminino', 43, 236598147, 'Rua do Acre, 100', 'Capital do Acre', 'AC', 'JibÃ³ia', 'Brasil', 'marinasilva', '827ccb0eea8a', 'ATIVO', b'1', '35800-00', '2019-08-02 15:42:38', '2019-08-02 15:42:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `cep` char(8) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `nomebairro` varchar(60) NOT NULL,
  `nomecidade` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `endereco`:
--

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`cep`, `logradouro`, `ativo`, `nomebairro`, `nomecidade`) VALUES
('19815366', 'Rua Dois', b'0', 'Catete', 'Rio de Janeiro'),
('2001201', 'Rua das Marrecas', b'1', 'Centro', 'Rio de Janeiro'),
('20013001', 'Rua Leandro Dias', b'1', 'Centro', 'Rio de Janeiro'),
('20051070', 'Largo SÃ£o Francisco de Paula', b'1', 'Centro', 'Rio de Janeiro'),
('2005171', 'Rua Uruguaiana', b'1', 'Centro', 'Rio de Janeiro'),
('20230170', 'Rua Azeredo Coutinho', b'1', 'Centro', 'Rio de Janeiro/RJ'),
('22410003', 'Rua das CamÃ©lias', b'1', 'Jardim BotÃ¢nico', 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pag`
--

DROP TABLE IF EXISTS `forma_pag`;
CREATE TABLE `forma_pag` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `forma_pag`:
--

--
-- Extraindo dados da tabela `forma_pag`
--

INSERT INTO `forma_pag` (`id`, `nome`, `ativo`) VALUES
(1, 'DINHEIRO', b'1'),
(3, 'CARTAO DE DÃ‰BITO', b'1'),
(4, 'CARTÃƒO DE CRÃ‰DITO', b'1'),
(5, 'TICKET REFEIÃ‡ÃƒO', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` decimal(6,2) DEFAULT NULL,
  `preco` decimal(6,2) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `itens`:
--   `pedido_id`
--       `pedido` -> `ID`
--   `produto_id`
--       `produtos` -> `id`
--

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `pedido_id`, `produto_id`, `quantidade`, `preco`, `total`) VALUES
(2, 2, 1, '4.00', '2.50', '10.00'),
(3, 2, 2, '2.00', '90.00', '180.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `mesa` char(2) NOT NULL,
  `forma_pag_id` int(11) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `cliente_id` int(11) DEFAULT NULL,
  `desconto` decimal(12,2) DEFAULT NULL,
  `acrescimo` decimal(12,2) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `data_abertura` datetime DEFAULT NULL,
  `data_fechamento` datetime DEFAULT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `data_cancelamento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pedido`:
--   `forma_pag_id`
--       `forma_pag` -> `id`
--

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `mesa`, `forma_pag_id`, `ativo`, `cliente_id`, `desconto`, `acrescimo`, `subtotal`, `total`, `data_abertura`, `data_fechamento`, `data_entrega`, `data_cancelamento`) VALUES
(2, '1', 1, b'1', 1, '0.00', '0.00', '0.00', '0.00', '2019-08-15 09:12:41', NULL, NULL, NULL),
(4, '1', 1, b'1', 2, '0.00', '0.00', '0.00', '0.00', '2019-08-15 09:12:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` decimal(6,2) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `codcat_id` int(11) NOT NULL,
  `data_inclusao` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `produtos`:
--

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `foto`, `ativo`, `codcat_id`, `data_inclusao`, `data_alteracao`, `descricao`) VALUES
(1, 'COCA COLA 290 ML', '5.00', 'fotos/cocacola_dois_litros.jpg', b'1', 2, NULL, NULL, ''),
(2, 'GALETO', '90.00', 'fotos/frango_grelhado.jpg', b'1', 1, NULL, NULL, 'Galeto para duas pessoas, com arroz, fritas, farofa e molho Ã  campanha.'),
(3, 'MINEIRINHO 250 ML', '15.00', 'fotos/mineirinho_250_ml.jpg', b'1', 1, NULL, NULL, ''),
(4, 'CONTRA-FILÃ‰', '22.55', 'fotos/bife_a_cavalo.jpg', b'1', 1, NULL, NULL, 'Contra-filÃ©, arroz, feijÃ£o, fritas, salada de alface e tomate e ovos.'),
(5, 'FEIJOADA', '30.00', 'fotos/feijoada2.jpg', b'1', 1, NULL, NULL, 'Feijoada completa para duas pessoas, caipirinha arroz e farofa'),
(6, 'STROGONOFF DE CARNE', '22.55', 'fotos/estrogonofe-de-carne.jpg', b'1', 4, NULL, NULL, 'Estrogonefe de carne, arroz e fritas'),
(7, 'OMELETE', '18.90', 'fotos/omelete.jpg', b'1', 1, NULL, NULL, 'OpÃ§Ãµes: camarÃ£o, queijo, queijo e presunto e sardinha'),
(8, 'FILE A PARMEDIANA', '30.00', 'fotos/file-a-parmegiana.jpg', b'1', 1, NULL, NULL, 'FilÃ© de carne Ã  parmediana, fritas e arroz.'),
(9, 'COSTELA SUINA', '30.00', 'fotos/costela suina.jpg', b'1', 1, NULL, NULL, 'Costela Suina para duas pessoas, molho Ã  campanha e farofa.'),
(11, 'MOCOTÃ“', '30.00', 'fotos/mocoto.jpg', b'1', 1, NULL, NULL, 'MocotÃ³ completo com arroz'),
(12, 'STROGONOFF DE FRANGO', '22.55', 'fotos/talharim-a-bolonhesa.jpg', b'1', 1, NULL, NULL, 'Estrogonofe de frango e arroz.'),
(13, 'SKINCA 1 LITRO', '10.00', 'fotos/skinka.jpg', b'1', 2, NULL, NULL, NULL),
(14, 'BOBÃ“ DE CAMARÃƒO', '35.00', 'fotos/bobo de camarao.jpg', b'1', 1, NULL, NULL, 'BobÃ³ de CamarÃ£o e Arroz'),
(15, 'CHURRASQUINHO', '36.00', 'fotos/churrasquinho.jpg', b'1', 1, NULL, NULL, 'Churrasquinho, arraoz, feijÃ£o, fritas, salada de alface e tomate e farofa.'),
(16, 'BIFE DE FIGADO ACEBOLADO', '28.00', 'fotos/bife_de_figado_acebolado.jpg', b'1', 1, NULL, NULL, 'Bife de FÃ­gado, arroz, feijÃ£o, fritas e salada de legumes.'),
(17, 'FRANGO XADREZ', '22.55', 'fotos/frango-xadrez.jpg', b'1', 1, NULL, NULL, 'Frango xadrez e arroz'),
(18, 'CHURRASCO MISTO', '60.00', 'fotos/churrasco-misto.jpg', b'1', 1, NULL, NULL, 'Churrasco misto para trÃªs pessoas, arroz, feijÃ£o, fritas,farofa, salada de alface e tomate e ovos.'),
(19, 'FAROFA', '8.00', 'fotos/', b'1', 10, NULL, NULL, ''),
(20, 'ARROZ', '10.00', 'fotos/', b'1', 10, NULL, NULL, 'Arroz branco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `usuario`:
--

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `email`, `ativo`) VALUES
(1, 'haroldo', 'hb', '827ccb0eea8a706c4c34a16891f84e7b', 'hb@senac.com', b'1'),
(2, 'marcos', 'marcos', '827ccb0eea8a706c4c34a16891f84e7b', 'marcos@senac.com', b'1'),
(3, 'paulo', 'paulo', '827ccb0eea8a706c4c34a16891f84e7b', 'paulo@senac.com', b'1'),
(5, 'TaÃ­na', 'tna', '84ddfb34126fc3a48ee38d7044e87276', 'tna@brasil.com', b'1'),
(6, 'Andressa', 'andressa', 'd41d8cd98f00b204e9800998ecf8427e', 'anressa@brasil.com', b'1'),
(9, 'Renata Gomes', 'renata', '827ccb0eea8a706c4c34a16891f84e7b', 'renata@brasil.com', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cod_cat`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`cep`);

--
-- Indexes for table `forma_pag`
--
ALTER TABLE `forma_pag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forma_pag_id` (`forma_pag_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cod_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forma_pag`
--
ALTER TABLE `forma_pag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`forma_pag_id`) REFERENCES `forma_pag` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
