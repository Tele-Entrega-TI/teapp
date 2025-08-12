-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/08/2025 às 14:37
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tele_entrega`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_cargos`
--

CREATE TABLE `cad_cargos` (
  `id_cargo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_cargos`
--

INSERT INTO `cad_cargos` (`id_cargo`, `nome`, `descricao`, `ativo`, `data_cadastro`, `data_alteracao`) VALUES
(1, 'Motoboy ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Motoboy - PM 52', '', 0, '0000-00-00 00:00:00', '2025-06-23 14:21:03'),
(3, 'Motorista - Central', '', 0, '0000-00-00 00:00:00', '2025-06-23 14:06:56'),
(5, 'Operacional', '', 0, '0000-00-00 00:00:00', '2025-06-18 15:08:48'),
(6, 'Operacional', '', 0, '0000-00-00 00:00:00', '2025-06-18 15:09:50'),
(7, 'Motorista', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Auxiliar Administrativo', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Diretor', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Contador', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_funcionarios`
--

CREATE TABLE `cad_funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` date NOT NULL,
  `nome_mae` varchar(100) DEFAULT NULL,
  `nome_pai` varchar(100) DEFAULT NULL,
  `nome_esposa` varchar(220) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `nome_emergencia` varchar(220) DEFAULT NULL,
  `telefone_emergencia` varchar(220) DEFAULT NULL,
  `rua` varchar(220) DEFAULT NULL,
  `numero_casa` varchar(30) DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `bairro` varchar(220) DEFAULT NULL,
  `cidade` varchar(220) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `org_emissor` varchar(30) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `ctps` varchar(10) NOT NULL,
  `pis` varchar(20) NOT NULL,
  `admissao` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `data_atualizacao` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `matricula` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_funcionarios`
--

INSERT INTO `cad_funcionarios` (`id_funcionario`, `nome`, `apelido`, `sexo`, `nascimento`, `nome_mae`, `nome_pai`, `nome_esposa`, `email`, `telefone`, `nome_emergencia`, `telefone_emergencia`, `rua`, `numero_casa`, `complemento`, `cep`, `bairro`, `cidade`, `uf`, `rg`, `cpf`, `org_emissor`, `cnh`, `ctps`, `pis`, `admissao`, `ativo`, `data_cadastro`, `data_atualizacao`, `matricula`, `id_cargo`) VALUES
(1, 'Ricardo Bandeira de Mello Filho', 'Ricardo Filho', 'M', '2001-07-22', 'Marcia Cardoso Bandeira de Mello', 'Ricardo Bandeira de Mello', 'Laís Vidal Pessoa Araujo Fontes', 'ricardo@gmail.com', '8585858585', 'Laís Vidal Pessoa Araujo Fontes', '123456789', 'Rua dos Viados', '69', '', '60690-200', 'Aldeota', 'Fortaleza', 'ce', '294163967', '63938324015', 'sspds/ce', '23222661450', '', '45764501267', '2025-08-06', 1, '2025-06-16 14:13:10', '2025-08-06 15:53:56', 1, NULL),
(2, 'Antonio Mickael Santiago', 'Mickael Santiago', 'F', '0000-00-00', 'mickaela santiaga', 'mickael santiago pai', '1972-06-13', 'mickaelsantiago@gmail.com', '12312312313', 'teste', 'Av. Heráclito Graça, 1177 - Aldeota', '2342342351', '46345456345', 'ssp', '34234242', '2025-06-01', '', '', '', '', '', '', '', '', NULL, 1, '2025-06-17 14:51:32', '2025-06-30 10:32:16', 2, NULL),
(3, 'Raylan Carneiro', 'Raylan Alves', 'Masculino', '2005-10-08', 'Ilza Maria Alves dos Santos', 'Francisco José Alves dos Santos', 'Jamille Bernardo Alves dos Santos', 'Raylan@gmail.com', '85997787703', 'Jamille Bernardo Alves dos Santos', '85 98503-8323', 'Rua Xavier da Silveira', '4009', '', '60540212', 'Granja Lisboa', 'Fortaleza', 'CE', '403744544', '12345678900', 'teste', '34685043821', '5252196101', '87452337882', '2025-04-22', 1, '2025-08-08 14:45:41', '2025-08-08 17:03:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_gestores`
--

CREATE TABLE `cad_gestores` (
  `id_gestor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_gestores`
--

INSERT INTO `cad_gestores` (`id_gestor`, `nome`, `email`, `telefone`, `empresa`, `ativo`, `data_cadastro`) VALUES
(1, 'Joab', 'joab@gmail.com', '8585858585', 'Capital Locação de Veiculos LTDA', 1, '2025-06-09 15:59:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_itens_orcamento`
--

CREATE TABLE `cad_itens_orcamento` (
  `id_item` int(15) NOT NULL,
  `id_orcamento` int(15) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de itens de orçamentos';

--
-- Despejando dados para a tabela `cad_itens_orcamento`
--

INSERT INTO `cad_itens_orcamento` (`id_item`, `id_orcamento`, `item`, `descricao`, `valor`) VALUES
(1, 2, 'Óleo', 'Óleo do motor', 350.00),
(2, 1, 'Pastilha de freio', 'Compra de pastilha de freio bla bla bla bla', 250.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_locacoes`
--

CREATE TABLE `cad_locacoes` (
  `id_locacao` int(11) NOT NULL,
  `locacao` varchar(100) NOT NULL,
  `inicio_locacao` date NOT NULL,
  `fim_locacao` date DEFAULT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tabela de cadastro de locações ';

--
-- Despejando dados para a tabela `cad_locacoes`
--

INSERT INTO `cad_locacoes` (`id_locacao`, `locacao`, `inicio_locacao`, `fim_locacao`, `descricao`, `ativo`) VALUES
(1, 'Tele Entrega Serviços LTDA', '2025-06-10', NULL, '', 0),
(2, 'Central', '2025-06-01', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_manutencao`
--

CREATE TABLE `cad_manutencao` (
  `id_manutencao` int(15) NOT NULL,
  `id_veiculo` int(15) NOT NULL,
  `id_orcamento` int(15) NOT NULL,
  `aprovado` tinyint(1) NOT NULL DEFAULT 1,
  `data` date NOT NULL,
  `id_funcionario_gestor` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de manutenções';

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_motivos`
--

CREATE TABLE `cad_motivos` (
  `id_motivo` int(15) NOT NULL,
  `motivo` varchar(220) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de motivos diversos';

--
-- Despejando dados para a tabela `cad_motivos`
--

INSERT INTO `cad_motivos` (`id_motivo`, `motivo`, `ativo`) VALUES
(1, '', 0),
(2, 'Falta', 0),
(3, 'Falta', 1),
(4, 'Acidente', 1),
(5, 'Manutenção', 1),
(6, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_oficinas`
--

CREATE TABLE `cad_oficinas` (
  `id_oficina` int(15) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de oficinas';

--
-- Despejando dados para a tabela `cad_oficinas`
--

INSERT INTO `cad_oficinas` (`id_oficina`, `nome`, `endereco`, `responsavel`, `whatsapp`, `ativo`) VALUES
(1, 'HC Pneus', 'Av. Heráclito Graça, 1177', 'Fulano', '85981032228', 1),
(2, 'Cavalcante Martelinho', 'Costa Barros, 901', 'Cicrano', '85999969525', 0),
(3, 'Neto Motos', 'Rua Vinte e Cinco de Março, 126', 'Neto ', '85981032227', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_orcamento`
--

CREATE TABLE `cad_orcamento` (
  `id_orcamento` int(15) NOT NULL,
  `id_oficina` int(15) NOT NULL,
  `id_veiculo` int(15) NOT NULL,
  `status_aprovado` tinyint(1) NOT NULL,
  `data_cotacao` date NOT NULL,
  `data_aprovacao` date NOT NULL,
  `data_conclusao` date NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de orçamento de veiculos';

--
-- Despejando dados para a tabela `cad_orcamento`
--

INSERT INTO `cad_orcamento` (`id_orcamento`, `id_oficina`, `id_veiculo`, `status_aprovado`, `data_cotacao`, `data_aprovacao`, `data_conclusao`, `ativo`) VALUES
(1, 1, 1, 1, '2025-06-01', '2025-06-02', '2025-06-05', 1),
(2, 3, 1, 1, '2025-06-02', '2025-06-04', '2025-06-05', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_setores`
--

CREATE TABLE `cad_setores` (
  `id_setor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_setores`
--

INSERT INTO `cad_setores` (`id_setor`, `nome`, `descricao`, `ativo`, `data_cadastro`, `data_alteracao`) VALUES
(1, 'Operacional', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Financeiro', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Recursos Humanos', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Departamento Pessoal', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Entregadores', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Contabilidade', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_subs`
--

CREATE TABLE `cad_subs` (
  `id_substituto` int(15) NOT NULL,
  `id_funcionario_falta` int(15) NOT NULL,
  `id_funcionario_substituto` int(15) NOT NULL,
  `custo_sub` double(10,2) NOT NULL,
  `data` date NOT NULL,
  `id_locacao` int(15) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de substitutos';

--
-- Despejando dados para a tabela `cad_subs`
--

INSERT INTO `cad_subs` (`id_substituto`, `id_funcionario_falta`, `id_funcionario_substituto`, `custo_sub`, `data`, `id_locacao`, `ativo`) VALUES
(2, 1, 2, 374.00, '2025-06-25', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_veiculos`
--

CREATE TABLE `cad_veiculos` (
  `id_veiculo` int(15) NOT NULL,
  `placa` varchar(7) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `cor` varchar(15) DEFAULT NULL,
  `fabricante` varchar(20) DEFAULT NULL,
  `ano_fab` varchar(9) NOT NULL,
  `vencimento_doc` date NOT NULL,
  `id_funcionario` int(15) DEFAULT NULL,
  `titular_veiculo` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de veículos ';

--
-- Despejando dados para a tabela `cad_veiculos`
--

INSERT INTO `cad_veiculos` (`id_veiculo`, `placa`, `modelo`, `tipo`, `cor`, `fabricante`, `ano_fab`, `vencimento_doc`, `id_funcionario`, `titular_veiculo`, `ativo`) VALUES
(1, 'pob1245', 'ma maa 750', 'carroça', '', 'não consta', '2019/2019', '0000-00-00', NULL, '', 1),
(2, 'pob1335', ' ma maa 750', 'carroça', '', 'não consta', '2019/2019', '0000-00-00', NULL, '', 1),
(3, 'pow3415', ' ma maa 750', 'carroça', '', 'não consta', '2019/2019', '0000-00-00', NULL, '', 1),
(4, 'pow3625', ' ma maa 750', 'carroça', '', 'não consta', '2019/2019', '0000-00-00', NULL, '', 1),
(5, 'thn3a22', 'compass', 'suv', '', 'jeep', '2025/2025', '0000-00-00', NULL, '', 1),
(6, 'pnwoi53', 'ducato ', 'van', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(7, 'pnx0593', 'ducato ', 'van', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(8, 'pnx0853', 'ducato ', 'van', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(9, 'pop9d13', 'expert', 'furgão', '', 'peugeot', '2019/2020', '0000-00-00', NULL, '', 1),
(10, 'orz0d33', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(11, 'pml8g68', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(12, 'pnu4c33', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(13, 'pnw2b63', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(14, 'pnw8i43', 'strada', 'picape', '', 'fiat', '2019/2020', '0000-00-00', NULL, '', 1),
(15, 'pnx1b52', 'strada', 'picape', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(16, 'pnx2393', 'strada', 'picape', '', 'fiat', '2019/2020', '0000-00-00', NULL, '', 1),
(17, 'pnx8j83', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(18, 'pnx9e33', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(19, 'pny1542', 'strada', 'picape', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(20, 'poa8j43', 'strada', 'picape', '', 'fiat', '2019/2019', '0000-00-00', NULL, '', 1),
(21, 'poa9133', 'strada', 'picape', '', 'fiat', '2019/2020', '0000-00-00', NULL, '', 1),
(22, 'pop8b33', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(23, 'pop8d93', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(24, 'poq3f53', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(25, 'poq3i93', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(26, 'poq4i23', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(27, 'poq6b53', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(28, 'por0e44', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(29, 'por5797', 'strada', 'picape', '', 'fiat', '2018/2019', '0000-00-00', NULL, '', 1),
(30, 'pot2h44', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(31, 'pox3h02', 'strada', 'picape', '', 'fiat', '2020/2020', '0000-00-00', NULL, '', 1),
(32, 'poy6h26', 'strada', 'picape', '', 'fiat', '2019/2020', '0000-00-00', NULL, '', 1),
(33, 'ric9d95', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(34, 'rid4j05', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(35, 'rid6a25', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(36, 'rid7h95', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(37, 'rid8e65', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(38, 'rid9d15', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(39, 'rid9j05', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(40, 'rie8b85', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(41, 'sba1e80', 'strada', 'picape', '', 'fiat', '2021/2022', '0000-00-00', NULL, '', 1),
(42, 'sba2e60', 'strada', 'picape', '', 'fiat', '2021/2022', '0000-00-00', NULL, '', 1),
(43, 'sbm9g13', 'strada', 'picape', '', 'fiat', '2024/2024', '0000-00-00', NULL, '', 1),
(44, 'sbt1h43', 'strada', 'picape', '', 'fiat', '2024/2024', '0000-00-00', NULL, '', 1),
(45, 'sbt3a33', 'strada', 'picape', '', 'fiat', '2024/2024', '0000-00-00', NULL, '', 1),
(46, 'thw1b05', 'strada', 'picape', '', 'fiat', '2025/2025', '0000-00-00', NULL, '', 1),
(47, 'thw4e35', 'strada', 'picape', '', 'fiat', '2025/2026', '0000-00-00', NULL, '', 1),
(48, 'thw6j25', 'strada', 'picape', '', 'fiat', '2025/2026', '0000-00-00', NULL, '', 1),
(49, 'thw8h15', 'strada', 'picape', '', 'fiat', '2025/2026', '0000-00-00', NULL, '', 1),
(50, 'tid5i28', 'strada', 'picape', '', 'fiat', '2024/2025', '0000-00-00', NULL, '', 1),
(51, 'pop0e44', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(52, 'pop6g23', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(53, 'poq3a23', 'strada', 'picape', '', 'fiat', '2020/2021', '0000-00-00', NULL, '', 1),
(54, 'sba3i10', 'strada', 'picape', '', 'fiat', '2021/2022', '0000-00-00', NULL, '', 1),
(55, '0ia4216', 'uno', 'carro', '', 'fiat', '2013/2013', '0000-00-00', NULL, '', 1),
(56, 'dsv4h54', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(57, 'eej5c14', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(58, 'ejo4f54', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(59, 'evd3d24', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(60, 'flt5c14', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(61, 'fph1h84', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(62, 'frc5e64', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(63, 'frj1d04', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(64, 'gbh2h84', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(65, 'gbj7b24', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(66, 'gde3d04', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(67, 'gfv5c94', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(68, 'ghb5j14', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(69, 'saz4f40', 'formigão', 'tuk tuk', '', 'cicloway', '2019/2019', '0000-00-00', NULL, '', 1),
(70, 'hxa0550', 'hilux', 'picape', 'verde', 'toyota', '1998/1998', '0000-00-00', NULL, '', 1),
(71, 'qml6f19', 'daily 35-150cs', 'caminhão', '', 'iveco', '2021/2022', '0000-00-00', NULL, '', 1),
(72, 'sbr4b85', 'daily 35-150cs', 'caminhão', '', 'iveco', '2021/2022', '0000-00-00', NULL, '', 1),
(73, 'pmt4689', 'daily 70c17hdcs', 'caminhão', '', 'iveco', '2014/2014', '0000-00-00', NULL, '', 1),
(74, 'rii9e60', 'daily 30-130cs', 'caminhão', '', 'iveco', '2021/2022', '0000-00-00', NULL, '', 1),
(75, 'sau5b00', 'daily 30-130cs', 'caminhão', '', 'iveco', '2021/2022', '0000-00-00', NULL, '', 1),
(76, 'pog4355', 'kia', 'caminhão', '', ' bongo', '2019/2020', '0000-00-00', NULL, '', 1),
(77, 'oil4e00', 'kia', 'caminhão', '', ' bongo', '2019/2020', '0000-00-00', NULL, '', 1),
(78, 'pnf4a00', 'kia', 'caminhão', '', ' bongo', '2019/2020', '0000-00-00', NULL, '', 1),
(79, 'poo5c63', 'kia', 'caminhão', '', ' bongo', '2019/2020', '0000-00-00', NULL, '', 1),
(80, 'pou4129', 'kia', 'caminhão', '', ' bongo', '2018/2019', '0000-00-00', NULL, '', 1),
(81, 'pox2a32', 'kia', 'caminhão', '', ' bongo', '2019/2020', '0000-00-00', NULL, '', 1),
(82, 'rif3b67', 'kia', 'caminhão', '', ' bongo', '2021/2021', '0000-00-00', NULL, '', 1),
(83, 'rig1c47', 'kia', 'caminhão', '', ' bongo', '2021/2021', '0000-00-00', NULL, '', 1),
(84, 'ofj9283', 'sprinter 313 cdi', 'van', '', 'mercedes-benz', '2011/2012', '0000-00-00', NULL, '', 1),
(85, 'nwy3h26', 'sprinter 313 cdi', 'van', '', 'mercedes-benz', '2010/2011', '0000-00-00', NULL, '', 1),
(86, 'pnb3i77', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(87, 'nvd5002', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(88, 'nuu8h04', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(89, 'nuu1457', 'cargo', 'moto', '', 'honda', '2010/2011', '0000-00-00', NULL, '', 1),
(90, 'ocd3655', 'cargo', 'moto', '', 'honda', '2011/2011', '0000-00-00', NULL, '', 1),
(91, 'oig5h44', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(92, 'nvd5i22', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(93, 'nra7b42', 'cargo', 'moto', '', 'honda', '2009/2009', '0000-00-00', NULL, '', 1),
(94, 'nra6h32', 'cargo', 'moto', '', 'honda', '2009/2009', '0000-00-00', NULL, '', 1),
(95, 'nuz5g90', 'cargo', 'moto', '', 'honda', '2011/2011', '0000-00-00', NULL, '', 1),
(96, 'nqt0b53', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(97, 'nuz8109', 'cargo', 'moto', '', 'honda', '2009/2009', '0000-00-00', NULL, '', 1),
(98, 'oiq5a54', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(99, 'oiq4054', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(100, 'oiq7354', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(101, 'ocp0039', 'cargo', 'moto', '', 'honda', '2011/2012', '0000-00-00', NULL, '', 1),
(102, 'oco9329', 'cargo', 'moto', '', 'honda', '2011/2012', '0000-00-00', NULL, '', 1),
(103, 'oiq4694', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(104, 'ocj1f01', 'cargo', 'moto', '', 'honda', '2011/2011', '0000-00-00', NULL, '', 1),
(105, 'ocp6202', 'cargo', 'moto', '', 'honda', '2011/2011', '0000-00-00', NULL, '', 1),
(106, 'ocm5672', 'cargo', 'moto', '', 'honda', '2011/2011', '0000-00-00', NULL, '', 1),
(107, 'hwn5504', 'cargo', 'moto', '', 'honda', '2006/2006', '0000-00-00', NULL, '', 1),
(108, 'ory9e30', 'cargo', 'moto', '', 'honda', '2012/2013', '0000-00-00', NULL, '', 1),
(109, 'oif5c19', 'cargo', 'moto', '', 'honda', '2012/2013', '0000-00-00', NULL, '', 1),
(110, 'oio9735', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(111, 'ocp0b69', 'cargo', 'moto', '', 'honda', '2011/2012', '0000-00-00', NULL, '', 1),
(112, 'qkr4d81', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(113, 'qkp6i32', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(114, 'pdu2b16', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(115, 'pne2f14', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(116, 'pjk0a99', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(117, 'pmp7b48', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(118, 'pmp6e28', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(119, 'qld7d59', 'cargo', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(120, 'pdu7f66', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(121, 'ork5e17', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(122, 'qkp7d84', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(123, 'pmp3i78', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(124, 'ork5g77', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(125, 'qkp8i24', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(126, 'pnp0h84', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(127, 'pjk3f91', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(128, 'pnp1e24', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(129, 'oza8i24', 'cargo', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(130, 'pnp0i94', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(131, 'pmy5e08', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(132, 'pmq9j50', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(133, 'pmw6a32', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(134, 'ork3g97', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(135, 'pmr1a90', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(136, 'pnk9g58', 'cargo', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(137, 'qkv9d56', 'cargo', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(138, 'qkp7b22', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(139, 'pmr0g40', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(140, 'nqt0g13', 'cargo', 'moto', '', 'honda', '2010/2010', '0000-00-00', NULL, '', 1),
(141, 'oiq1i44', 'cargo', 'moto', '', 'honda', '2012/2012', '0000-00-00', NULL, '', 1),
(142, 'oxx8c96', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(143, 'pmp7h78', 'cargo', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(144, 'pnv4h78', 'cg 125', 'moto', '', 'honda', '2017/2017', '0000-00-00', NULL, '', 1),
(145, 'pmp4a66', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(146, 'pog2b34', 'cg 125', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(147, 'pov8g78', 'cg 125', 'moto', '', 'honda', '2018/2018', '0000-00-00', NULL, '', 1),
(148, 'pom0i20', 'cg 125', 'moto', '', 'honda', '2016/2017', '0000-00-00', NULL, '', 1),
(149, 'pok1c68', 'cg 125', 'moto', '', 'honda', '2018/2018', '0000-00-00', NULL, '', 1),
(150, 'pmz4c13', 'cg 125', 'moto', '', 'honda', '2017/2018', '0000-00-00', NULL, '', 1),
(151, 'pmb6b27', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(152, 'pmy2c34', 'cg 125', 'moto', '', 'honda', '2017/2017', '0000-00-00', NULL, '', 1),
(153, 'pmv7i28', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(154, 'pml3f08', 'cg 125', 'moto', '', 'honda', '2014/2015', '0000-00-00', NULL, '', 1),
(155, 'pno7e31', 'cg 125', 'moto', '', 'honda', '2016/2017', '0000-00-00', NULL, '', 1),
(156, 'psx5e93', 'cg 125', 'moto', '', 'honda', '2017/2017', '0000-00-00', NULL, '', 1),
(157, 'pmv9f79', 'cg 125', 'moto', '', 'honda', '2014/2015', '0000-00-00', NULL, '', 1),
(158, 'ovw7c03', 'cg 125', 'moto', '', 'honda', '2013/2014', '0000-00-00', NULL, '', 1),
(159, 'pnf9a18', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(160, 'pmi2j84', 'cg 125', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(161, 'osf7j00', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(162, 'pmr0h60', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(163, 'pmg3g50', 'cg 125', 'moto', '', 'honda', '2014/2015', '0000-00-00', NULL, '', 1),
(164, 'pmp7e89', 'cg 125', 'moto', '', 'honda', '2014/2015', '0000-00-00', NULL, '', 1),
(165, 'ork5e47', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(166, 'pmg6d04', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(167, 'pnb3i77', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(168, 'oio4a20', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(169, 'qgd6b29', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(170, 'pmg8i64', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(171, 'osh1780', 'cg 125', 'moto', '', 'honda', '2014/2015', '0000-00-00', NULL, '', 1),
(172, 'ory9e30', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(173, 'oza0e66', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(174, 'pmd4c50', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(175, 'orz2c07', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(176, 'pno1e76', 'cg 125', 'moto', '', 'honda', '2015/2015', '0000-00-00', NULL, '', 1),
(177, 'pof4f61', 'cg 125', 'moto', '', 'honda', '2016/2016', '0000-00-00', NULL, '', 1),
(178, 'osc6h87', 'cg 125', 'moto', '', 'honda', '2013/2014', '0000-00-00', NULL, '', 1),
(179, 'oso6h10', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(180, 'osu9c55', 'cg 125', 'moto', '', 'honda', '2013/2014', '0000-00-00', NULL, '', 1),
(181, 'pmm1a40', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(182, 'osr8g10', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(183, 'poy5i38', 'cg 125', 'moto', '', 'honda', '2017/2018', '0000-00-00', NULL, '', 1),
(184, 'oro5f47', 'cg 125', 'moto', '', 'honda', '2013/2014', '0000-00-00', NULL, '', 1),
(185, 'oro5c20', 'cg 125', 'moto', '', 'honda', '2014/2014', '0000-00-00', NULL, '', 1),
(186, 'pme8i99', 'cg 160', 'moto', '', 'honda', '2020/2020', '0000-00-00', NULL, '', 1),
(187, 'pnw5c72', 'cg 160', 'moto', '', 'honda', '2019/2019', '0000-00-00', NULL, '', 1),
(188, 'pnv6j47', 'cg 160', 'moto', '', 'honda', '2017/2017', '0000-00-00', NULL, '', 1),
(189, 'pnx8a10', 'cg 160', 'moto', '', 'honda', '2016/2017', '0000-00-00', NULL, '', 1),
(190, 'pou0b39', 'cg 160', 'moto', '', 'honda', '2018/2019', '0000-00-00', NULL, '', 1),
(191, 'skv1d88', 'pop 110', 'moto', '', 'honda', '2023/2023', '0000-00-00', NULL, '', 1),
(192, 'slc1j29', 'pop 110', 'moto', '', 'honda', '2023/2023', '0000-00-00', NULL, '', 1),
(193, 'oco9519', 'cargo', 'moto', '', 'honda', '2011/2012', '0000-00-00', NULL, '', 1),
(194, 'hys0d31', 'cg 150 job', 'moto', 'branca', 'honda', '2006/2007', '2025-08-05', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_profissionais`
--

CREATE TABLE `dados_profissionais` (
  `id_dado_profissional` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_setor` int(11) NOT NULL,
  `id_locacao` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `data_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `data_fim` datetime DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dados_profissionais`
--

INSERT INTO `dados_profissionais` (`id_dado_profissional`, `id_funcionario`, `id_cargo`, `id_setor`, `id_locacao`, `id_empresa`, `data_inicio`, `data_fim`, `ativo`) VALUES
(1, 1, 1, 1, 2, 3, '2025-06-03 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 10, 6, 0, 2, '2025-06-01 00:00:00', '0000-00-00 00:00:00', 1),
(3, 3, 1, 5, 2, 2, '2025-08-10 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(220) NOT NULL,
  `nome_fantasia` varchar(220) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(220) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `data_abertura` date NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tabela de cadastro de empresas referentes a Tele Entrega';

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome_empresa`, `nome_fantasia`, `cnpj`, `endereco`, `cep`, `data_abertura`, `ativo`, `telefone`, `email`) VALUES
(1, 'asdasd', 'sdasd', 'asdasd', 'asdasd asdasd   asdasd-', 'asdasd', '2025-06-18', 0, 'sdsad', ''),
(2, 'Tele Entrega Soluções logísticas', 'Tele Entrega', '63.300.578/000', 'Rua Vinte e Cinco de Marco 151  Centro Fortaleza-CE', '60600120', '1986-02-18', 1, '85912349874', 'comercial@teleentrega.com.br'),
(3, 'Congelados do Barão', 'Congelados do Barão', '63.300.578/000', 'Rua 25 de Marco 151 Centro Fortaleza-CE', '60600120', '2025-06-18', 1, '85933669988', 'barao@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(15) NOT NULL,
  `id_admissao` int(15) NOT NULL,
  `veic_proprio` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para criação de cadastro de funcionarios';

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nome`) VALUES
(2, 'Operacional'),
(3, 'RH'),
(4, 'Financeiro'),
(5, 'Comercial'),
(6, 'Atendimento'),
(7, 'Administração'),
(8, 'Estagiários'),
(9, 'Controladoria'),
(10, 'Manutenção');

-- --------------------------------------------------------

--
-- Estrutura para tabela `intercorrencias`
--

CREATE TABLE `intercorrencias` (
  `id_funcionario` int(15) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `gravidade` int(11) NOT NULL,
  `gerou_custo` tinyint(1) NOT NULL DEFAULT 1,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de intercorrências';

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos_acesso`
--

CREATE TABLE `modulos_acesso` (
  `id_acesso` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `modulos_acesso`
--

INSERT INTO `modulos_acesso` (`id_acesso`, `id_funcionario`, `id_modulo`, `tipo`, `id_grupo`, `data_cadastro`, `ativo`) VALUES
(125, 1, 23, 'ved', 0, '2025-08-07 09:12:21', 1),
(126, 1, 22, 'ved', 0, '2025-08-07 09:12:21', 1),
(127, 1, 21, 'ved', 0, '2025-08-07 09:12:21', 1),
(128, 1, 20, 'ved', 0, '2025-08-07 09:12:21', 1),
(129, 1, 19, 'ved', 0, '2025-08-07 09:12:21', 1),
(130, 1, 18, 'ved', 0, '2025-08-07 09:12:21', 1),
(131, 1, 17, 'ved', 0, '2025-08-07 09:12:21', 1),
(132, 1, 16, 'ved', 0, '2025-08-07 09:12:21', 1),
(133, 1, 15, 'ved', 0, '2025-08-07 09:12:21', 1),
(134, 1, 14, 'ved', 0, '2025-08-07 09:12:21', 1),
(135, 1, 13, 'ved', 0, '2025-08-07 09:12:21', 1),
(136, 1, 12, 'ved', 0, '2025-08-07 09:12:21', 1),
(137, 1, 11, 'ved', 0, '2025-08-07 09:12:21', 1),
(138, 1, 10, 'ved', 0, '2025-08-07 09:12:21', 1),
(139, 1, 9, 'ved', 0, '2025-08-07 09:12:21', 1),
(140, 1, 8, 'ved', 0, '2025-08-07 09:12:21', 1),
(141, 1, 7, 'ved', 0, '2025-08-07 09:12:21', 1),
(142, 1, 6, 'ved', 0, '2025-08-07 09:12:21', 1),
(143, 1, 5, 'ved', 0, '2025-08-07 09:12:21', 1),
(144, 1, 4, 'ved', 0, '2025-08-07 09:12:21', 1),
(145, 1, 3, 'ved', 0, '2025-08-07 09:12:21', 1),
(146, 1, 2, 'ved', 0, '2025-08-07 09:12:21', 1),
(147, 1, 1, 've', 0, '2025-08-07 09:12:21', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos_sys`
--

CREATE TABLE `modulos_sys` (
  `id_modulo` int(11) NOT NULL,
  `nome_modulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `modulos_sys`
--

INSERT INTO `modulos_sys` (`id_modulo`, `nome_modulo`, `descricao`, `ativo`, `data_cadastro`) VALUES
(1, 'teste', 'teste', 1, '2025-07-16 15:25:49'),
(2, 'veiculos', 'modulo de veiculos', 1, '2025-07-16 17:20:39'),
(3, 'movimentacao', 'modulo de movimentação de veículos', 1, '2025-07-17 16:11:29'),
(4, 'cargos', 'modulo de cargos', 1, '2025-07-29 16:38:30'),
(5, 'checklist', 'modulo de checklist', 1, '2025-07-29 16:41:51'),
(6, 'dados profissionais', 'modulo de dados profissionais', 1, '2025-07-29 16:46:37'),
(7, 'usuarios', 'módulo de usuários', 1, '2025-07-31 16:36:34'),
(8, 'permissoes', 'módulo de permissões', 1, '2025-07-31 16:36:34'),
(9, 'ocorrencias', 'módulo de ocorrências', 1, '2025-07-31 16:36:34'),
(10, 'manutencao', 'módulo de manutenção de veículos', 1, '2025-07-31 16:36:34'),
(11, 'orcamentos', 'módulo de orçamentos', 1, '2025-07-31 16:36:34'),
(12, 'subs', 'módulo de substituições', 1, '2025-07-31 16:36:34'),
(13, 'motivos', 'módulo de motivos', 1, '2025-07-31 16:36:34'),
(14, 'funcionarios', 'módulo de funcionários', 1, '2025-07-31 16:36:34'),
(15, 'setores', 'módulo de setores', 1, '2025-07-31 16:59:39'),
(16, 'gestores', 'módulo de gestores', 1, '2025-07-31 16:59:39'),
(17, 'locacoes', 'módulo de locações', 1, '2025-07-31 16:59:39'),
(18, 'oficinas', 'módulo de oficinas', 1, '2025-07-31 16:59:39'),
(19, 'itens_orcamento', 'módulo de itens de orçamento', 1, '2025-07-31 16:59:39'),
(20, 'empresas', 'módulo de empresas', 1, '2025-07-31 16:59:39'),
(21, 'grupos', 'módulo de grupos', 1, '2025-07-31 16:59:39'),
(22, 'intercorrencias', 'módulo de intercorrências', 1, '2025-07-31 16:59:39'),
(23, 'modulos', 'Cadastro de Modulos', 1, '2025-07-31 17:36:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mvo_veiculos`
--

CREATE TABLE `mvo_veiculos` (
  `id_mvo` int(15) NOT NULL,
  `id_veiculo` int(15) NOT NULL,
  `id_funcionario` int(15) NOT NULL,
  `data_entrega` date NOT NULL,
  `doc_moto` varchar(255) DEFAULT NULL,
  `valor_aluguel` double(10,2) NOT NULL,
  `parcelas` int(15) NOT NULL,
  `contrato_assinado` tinyint(1) NOT NULL DEFAULT 1,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_situacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela de movimentação dos alugueis de veículos';

--
-- Despejando dados para a tabela `mvo_veiculos`
--

INSERT INTO `mvo_veiculos` (`id_mvo`, `id_veiculo`, `id_funcionario`, `data_entrega`, `doc_moto`, `valor_aluguel`, `parcelas`, `contrato_assinado`, `ativo`, `data_situacao`) VALUES
(1, 1, 1, '2025-06-01', '9835498534875438', 350.00, 36, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int(15) NOT NULL,
  `id_motivo` int(15) NOT NULL,
  `id_funcionario` int(15) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `gravidade` varchar(255) DEFAULT NULL,
  `data_ocorrencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de ocorrências dos funcionários';

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id_permissao` int(11) NOT NULL,
  `nome_permissao` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `permissoes`
--

INSERT INTO `permissoes` (`id_permissao`, `nome_permissao`, `descricao`, `ativo`, `data_cadastro`) VALUES
(1, 'Administrador', 'Acesso total ao sistema', 1, '2025-07-14 16:31:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `confirmado` tinyint(1) DEFAULT 0,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_funcionario`, `cpf`, `senha`, `ativo`, `data_cadastro`, `confirmado`, `id_grupo`) VALUES
(3, 1, '00000000000', 'e10adc3949ba59abbe56e057f20f883e', 1, '2025-07-23 16:47:36', 1, NULL),
(5, 2, '2873462843', NULL, 1, '2025-08-05 15:26:56', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo_checklists`
--

CREATE TABLE `veiculo_checklists` (
  `id_checklist` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data_checklist` datetime DEFAULT current_timestamp(),
  `observacoes` text DEFAULT NULL,
  `assinatura_motorista` varchar(255) DEFAULT NULL,
  `pneu_traseiro_esquerdo_qualidade` varchar(10) DEFAULT NULL,
  `pneu_traseiro_esquerdo_observacao` text DEFAULT NULL,
  `pneu_traseiro_esquerdo_foto` varchar(255) DEFAULT NULL,
  `freios_qualidade` varchar(10) DEFAULT NULL,
  `freios_observacao` text DEFAULT NULL,
  `freios_foto` varchar(255) DEFAULT NULL,
  `oleo_qualidade` varchar(10) DEFAULT NULL,
  `oleo_observacao` text DEFAULT NULL,
  `oleo_foto` varchar(255) DEFAULT NULL,
  `luzes_qualidade` varchar(10) DEFAULT NULL,
  `luzes_observacao` text DEFAULT NULL,
  `luzes_foto` varchar(255) DEFAULT NULL,
  `lataria_qualidade` varchar(10) DEFAULT NULL,
  `lataria_observacao` text DEFAULT NULL,
  `lataria_foto` varchar(255) DEFAULT NULL,
  `nivel_agua_qualidade` varchar(10) DEFAULT NULL,
  `nivel_agua_observacao` text DEFAULT NULL,
  `nivel_agua_foto` varchar(255) DEFAULT NULL,
  `equipamentos_seguranca_qualidade` varchar(10) DEFAULT NULL,
  `equipamentos_seguranca_observacao` text DEFAULT NULL,
  `equipamentos_seguranca_foto` varchar(255) DEFAULT NULL,
  `origem` enum('publico','interno') DEFAULT 'interno',
  `pneu_traseiro_direito_foto` varchar(255) DEFAULT NULL,
  `pneu_dianteiro_esquerdo_foto` varchar(255) DEFAULT NULL,
  `pneu_dianteiro_direito_foto` varchar(255) DEFAULT NULL,
  `pneu_traseiro_direito_qualidade` varchar(10) DEFAULT NULL,
  `pneu_dianteiro_direito_qualidade` varchar(10) DEFAULT NULL,
  `pneu_dianteiro_esquerdo_qualidade` varchar(10) DEFAULT NULL,
  `pneu_traseiro_direito_observacao` text DEFAULT NULL,
  `pneu_dianteiro_direito_observacao` text DEFAULT NULL,
  `pneu_dianteiro_esquerdo_observacao` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculo_checklists`
--

INSERT INTO `veiculo_checklists` (`id_checklist`, `id_veiculo`, `data_checklist`, `observacoes`, `assinatura_motorista`, `pneu_traseiro_esquerdo_qualidade`, `pneu_traseiro_esquerdo_observacao`, `pneu_traseiro_esquerdo_foto`, `freios_qualidade`, `freios_observacao`, `freios_foto`, `oleo_qualidade`, `oleo_observacao`, `oleo_foto`, `luzes_qualidade`, `luzes_observacao`, `luzes_foto`, `lataria_qualidade`, `lataria_observacao`, `lataria_foto`, `nivel_agua_qualidade`, `nivel_agua_observacao`, `nivel_agua_foto`, `equipamentos_seguranca_qualidade`, `equipamentos_seguranca_observacao`, `equipamentos_seguranca_foto`, `origem`, `pneu_traseiro_direito_foto`, `pneu_dianteiro_esquerdo_foto`, `pneu_dianteiro_direito_foto`, `pneu_traseiro_direito_qualidade`, `pneu_dianteiro_direito_qualidade`, `pneu_dianteiro_esquerdo_qualidade`, `pneu_traseiro_direito_observacao`, `pneu_dianteiro_direito_observacao`, `pneu_dianteiro_esquerdo_observacao`, `ativo`) VALUES
(6, 2, '2025-07-01 00:00:00', 'Verificando a funcionalidade do checklist', 'Willyan Carlos, editou', 'ruim', 'Teste de observação pneu 1', '68920e34d3584_PTE.webp', 'ruim', 'Teste de observação freios 1', '68920e34d39b8_freios.webp', 'ruim', 'Teste de observação oleo 1', '68920e34d4633_nivelOleo.webp', 'ruim', 'Teste de observação luzes 1', '68920e34d49ce_Captura de tela 2025-07-28 173520.png', 'ruim', 'Teste de observação lataria 1', '68920e34d4db6_lataria.jpg', 'ruim', 'Teste de observação agua 1', '68920e34d519e_nivelAgua.jpg', 'ruim', 'Teste de observação Equipamentos de Segurança 1', '68920e34d5565_equipamentosSeguranca.jpg', 'interno', '68920e34d3214_PTD.webp', '68920e34d2fab_PDE.webp', '68920feb66961_PDD.webp', 'bom', 'bom', 'bom', 'a', 'a', 'a', 1),
(7, 2, '2025-07-01 00:00:00', 'Teste para registrarmos as fotos dos 4 pneus do veículo.', 'Willyan Carlos', 'ruim', 'PTE OBS1', '688a4a8287e12_17538931506141148208895095709273.jpg', 'ruim', 'Freios OBS 1', '688a4a8287f71_17538931842804731600350053794122.jpg', 'ruim', 'NO OBS 1', '688a4a82881cf_17538932404953369473434508890162.jpg', 'ruim', 'Luz OBS 1', '688a4a82884cc_17538932703813303317802630815154.jpg', 'ruim', 'Lataria OBS 1', '688a4a82889a3_17538933067825945884358555361907.jpg', 'bom', 'NA OBS 1', '688a4a8288cce_17538933442817725267536875252882.jpg', 'regular', 'ES OBS 1', '688a4a8288ea0_17538933825481273318398766026331.jpg', 'interno', '688a4a8287cac_17538931176804811928833647010711.jpg', '688a4a8287b22_17538930842807277224403028711728.jpg', '688a4a82875ac_17538930397648316702428662610628.jpg', 'ruim', 'ruim', 'ruim', 'PTD OBS1', 'PDD OBS1', 'PDE OBS 1', 0),
(8, 3, '2025-08-01 00:00:00', 'Testando Edição', 'Willyan Carlos Ferreira Da Silva, editou', 'regular', 'Editou muito bom', '689208bb21c2f_freios.webp', 'ruim', 'Editou muito regular', '68920b7b3faf7_', 'regular', 'Editou muito bom', '68920b7b3fafa_', 'regular', 'Editou muito bom', '68920b7b3fafb_', 'regular', 'Editou muito bom', '68920b7b3fafd_', 'regular', 'Editou muito bom', '68920b7b3fafe_', 'regular', 'Editou muito bem', '68920b7b3fb00_', 'interno', '68920b7b3ee76_download.png', '68920b7b3ee71_', '68920b7b3ed3a_', 'bom', 'regular', 'ruim', 'Editou muito ruim', 'Editou muito bem as', 'Editou muito regular', 0),
(9, 4, '2025-08-02 00:00:00', 'Aiaiaiaiaiaiai', 'Will', 'bom', '', '6892197fcee01_download.png', 'bom', '', '6892197fcef63_download.png', 'bom', '', '6892197fcf090_download.png', 'bom', '', '6892197fcf1c8_download.png', 'bom', '', '6892197fcf3cb_download.png', 'bom', '', '6892197fcf522_download.png', 'bom', '', '6892197fcf78e_download.png', 'interno', '6892197fcec03_download.png', '6892197fcea45_download.png', '6892197fce719_download.png', 'bom', 'bom', 'bom', '', '', '', 1),
(10, 4, '2025-08-03 00:00:00', 'Procurando erro', 'Will Carl', 'regular', 'd', '68921df1835ee_download.png', 'bom', 'e', '68921df183beb_nivelOleo.webp', 'bom', 'f', '68921df184013_PDE.webp', 'bom', 'g', '68921df184781_download.png', 'bom', 'h', '68921df184b12_download.png', 'bom', 'i', '68921df184f1b_freios.webp', 'bom', 'j', '68921df1854af_nivelOleo.webp', 'interno', '68921df1827e9_download.png', '68921df1820d2_download.png', '68921df180d46_download.png', 'bom', 'bom', 'bom', 'c', 'a', 'b', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cad_cargos`
--
ALTER TABLE `cad_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices de tabela `cad_gestores`
--
ALTER TABLE `cad_gestores`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Índices de tabela `cad_itens_orcamento`
--
ALTER TABLE `cad_itens_orcamento`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices de tabela `cad_locacoes`
--
ALTER TABLE `cad_locacoes`
  ADD PRIMARY KEY (`id_locacao`);

--
-- Índices de tabela `cad_manutencao`
--
ALTER TABLE `cad_manutencao`
  ADD PRIMARY KEY (`id_manutencao`);

--
-- Índices de tabela `cad_motivos`
--
ALTER TABLE `cad_motivos`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Índices de tabela `cad_oficinas`
--
ALTER TABLE `cad_oficinas`
  ADD PRIMARY KEY (`id_oficina`);

--
-- Índices de tabela `cad_orcamento`
--
ALTER TABLE `cad_orcamento`
  ADD PRIMARY KEY (`id_orcamento`);

--
-- Índices de tabela `cad_setores`
--
ALTER TABLE `cad_setores`
  ADD PRIMARY KEY (`id_setor`);

--
-- Índices de tabela `cad_subs`
--
ALTER TABLE `cad_subs`
  ADD PRIMARY KEY (`id_substituto`);

--
-- Índices de tabela `cad_veiculos`
--
ALTER TABLE `cad_veiculos`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- Índices de tabela `dados_profissionais`
--
ALTER TABLE `dados_profissionais`
  ADD PRIMARY KEY (`id_dado_profissional`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices de tabela `intercorrencias`
--
ALTER TABLE `intercorrencias`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `modulos_acesso`
--
ALTER TABLE `modulos_acesso`
  ADD PRIMARY KEY (`id_acesso`);

--
-- Índices de tabela `modulos_sys`
--
ALTER TABLE `modulos_sys`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Índices de tabela `mvo_veiculos`
--
ALTER TABLE `mvo_veiculos`
  ADD PRIMARY KEY (`id_mvo`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cad_cargos`
--
ALTER TABLE `cad_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cad_gestores`
--
ALTER TABLE `cad_gestores`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cad_itens_orcamento`
--
ALTER TABLE `cad_itens_orcamento`
  MODIFY `id_item` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_locacoes`
--
ALTER TABLE `cad_locacoes`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_manutencao`
--
ALTER TABLE `cad_manutencao`
  MODIFY `id_manutencao` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_motivos`
--
ALTER TABLE `cad_motivos`
  MODIFY `id_motivo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cad_oficinas`
--
ALTER TABLE `cad_oficinas`
  MODIFY `id_oficina` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cad_orcamento`
--
ALTER TABLE `cad_orcamento`
  MODIFY `id_orcamento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_setores`
--
ALTER TABLE `cad_setores`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cad_subs`
--
ALTER TABLE `cad_subs`
  MODIFY `id_substituto` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_veiculos`
--
ALTER TABLE `cad_veiculos`
  MODIFY `id_veiculo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de tabela `dados_profissionais`
--
ALTER TABLE `dados_profissionais`
  MODIFY `id_dado_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `intercorrencias`
--
ALTER TABLE `intercorrencias`
  MODIFY `id_funcionario` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modulos_acesso`
--
ALTER TABLE `modulos_acesso`
  MODIFY `id_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de tabela `modulos_sys`
--
ALTER TABLE `modulos_sys`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `mvo_veiculos`
--
ALTER TABLE `mvo_veiculos`
  MODIFY `id_mvo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id_ocorrencia` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
