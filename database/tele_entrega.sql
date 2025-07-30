-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/07/2025 às 19:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
(10, 'Contador', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Programador', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_funcionarios`
--

CREATE TABLE `cad_funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `nome_pai` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `endereco` varchar(220) DEFAULT NULL,
  `habilitacao` varchar(100) DEFAULT NULL,
  `ctps` varchar(30) DEFAULT NULL,
  `org_emissor` varchar(10) DEFAULT NULL,
  `pis` varchar(20) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `data_atualizacao` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_funcionarios`
--

INSERT INTO `cad_funcionarios` (`id_funcionario`, `nome`, `apelido`, `sexo`, `cpf`, `rg`, `nome_mae`, `nome_pai`, `data_nascimento`, `email`, `telefone`, `cargo`, `endereco`, `habilitacao`, `ctps`, `org_emissor`, `pis`, `data_admissao`, `ativo`, `data_cadastro`, `data_atualizacao`) VALUES
(1, 'Ricardo Bandeira de Mello Filho', 'Ricardo Filho', 'M', '00000000000', '12314123141231', 'testa da silva junior', 'testo da silva junior', '2003-06-16', 'teste@teste.com.br', '8585858585', 'teste', 'testeeeee', '2347823648736439', '2346287346', 'ssp', '46234872834', '2025-06-01', 1, '2025-06-16 14:13:10', '2025-06-23 15:13:58'),
(2, 'Antonio Mickael Santiago', 'Mickael Santiago', 'F', '2873462843', '3523353', 'mickaela santiaga', 'mickael santiago pai', '1972-06-13', 'mickaelsantiago@gmail.com', '12312312313', 'teste', 'Av. Heráclito Graça, 1177 - Aldeota', '2342342351', '46345456345', 'ssp', '34234242', '2025-06-01', 1, '2025-06-17 14:51:32', '2025-06-23 15:13:30'),
(3, 'Willlyan Carlos Ferreira da Silva', 'Willyan Ferreira', 'M', '03888063847', '2006010154795', 'Francisca Gercy Ferreira Lima', 'Antonio Carlos Nunes da Silva', '1989-01-17', 'willyanworker@gmail.com', '85991766018', 'Auxiliar Administrativo', 'Rua 1090, 65 - Conjunto Ceará - Fortaleza-ce', 'A/B', '01', 'ssp', '002', '2024-12-02', 1, '2025-07-21 15:11:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_gestores`
--

CREATE TABLE `cad_gestores` (
  `id_gestor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_gestores`
--

INSERT INTO `cad_gestores` (`id_gestor`, `nome`, `email`, `empresa`, `telefone`, `ativo`, `data_cadastro`) VALUES
(1, 'Clarck Kent', 'homemdeaco@dc.com', 'Liga da justiça', '85912334555', 1, '2025-06-17 17:06:21'),
(2, 'Bruce Wayne', 'batman@dc.com', 'Liga da Justiça', '85964793201', 1, '2025-06-17 17:11:40'),
(11, 'Joab', 'joab@gmail.com', 'Capital Locação de Veiculos LTDA', '8585858585', 1, '2025-06-09 15:59:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_itens_orcamento`
--

CREATE TABLE `cad_itens_orcamento` (
  `id_item` int(15) NOT NULL,
  `id_orcamento` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_itens_orcamento`
--

INSERT INTO `cad_itens_orcamento` (`id_item`, `id_orcamento`, `item`, `descricao`, `valor`) VALUES
(1, 2, 'Óleo', 'Óleo do motor', 350),
(2, 1, 'Pastilha de freio', 'Compra de pastilha de freio bla bla bla bla', 250);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_locacoes`
--

CREATE TABLE `cad_locacoes` (
  `id_locacao` int(11) NOT NULL,
  `locacao` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `inicio_locacao` date NOT NULL,
  `fim_locacao` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_locacoes`
--

INSERT INTO `cad_locacoes` (`id_locacao`, `locacao`, `descricao`, `empresa`, `id_motorista`, `inicio_locacao`, `fim_locacao`, `ativo`) VALUES
(1, 'Tele Entrega Serviços LTDA', '', '', 0, '2025-06-10', NULL, 0),
(2, 'Central', '', '', 0, '2025-06-01', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_manutencao`
--

CREATE TABLE `cad_manutencao` (
  `id_manutencao` int(15) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `id_funcionario_gestor` int(11) NOT NULL,
  `data` date NOT NULL,
  `aprovado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_motivo`
--

CREATE TABLE `cad_motivo` (
  `id_motivo` int(15) NOT NULL,
  `desc_motivo` varchar(255) DEFAULT NULL,
  `acidente` tinyint(1) NOT NULL,
  `gasto_emprest` tinyint(1) NOT NULL,
  `manutencao` tinyint(1) NOT NULL,
  `multas` tinyint(1) NOT NULL,
  `outros` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_motivo`
--

INSERT INTO `cad_motivo` (`id_motivo`, `desc_motivo`, `acidente`, `gasto_emprest`, `manutencao`, `multas`, `outros`, `ativo`) VALUES
(1, 'Falta', 0, 0, 0, 0, 0, 1),
(2, 'Licença', 0, 0, 0, 0, 0, 1);

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
-- Estrutura para tabela `cad_motoristas`
--

CREATE TABLE `cad_motoristas` (
  `id_motorista` int(11) NOT NULL,
  `nome_motorista` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cnh` varchar(20) NOT NULL,
  `categoria` varchar(10) DEFAULT NULL,
  `validade_cnh` date DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_motoristas`
--

INSERT INTO `cad_motoristas` (`id_motorista`, `nome_motorista`, `cpf`, `rg`, `cnh`, `categoria`, `validade_cnh`, `data_nascimento`, `email`, `telefone`, `endereco`, `ativo`, `data_cadastro`, `data_alteracao`) VALUES
(1, 'Will', '00011122234', '2006000012345', '133654789', 'AB', '2012-12-12', '1989-01-17', 'app@teleentrega.com.br', '85932124569', 'Rua Vinte e Cinco de Marco 151 Centro Fortaleza Ceará', 1, '2025-06-17 16:52:57', '2025-06-18 17:13:01'),
(2, 'Alfred Pennyworth', '70584809581', '199975077', '51.678.049/0001-39', '', '0000-00-00', '0000-00-00', 'alfred@gmail.com', '85988916904', 'Gotham City', 1, '2025-06-18 17:11:19', '2025-06-18 17:14:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_oficinas`
--

CREATE TABLE `cad_oficinas` (
  `id_oficina` int(15) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_oficinas`
--

INSERT INTO `cad_oficinas` (`id_oficina`, `nome`, `endereco`, `responsavel`, `whatsapp`, `ativo`) VALUES
(1, 'HC Pneus', 'Av. Heráclito Graça, 1177', 'Fulano', '85981032228', 1),
(2, 'Cavalcante Martelinho', 'Costa Barros, 901', 'Cicrano', '85999969525', 0),
(3, 'Neto Motos', 'Rua Vinte e Cinco de Março, 126', 'Neto ', '85981032227', 1),
(4, 'Oficina TE', 'Rua Vinte e Cinco de Marco 151 Centro Fortaleza Ceará', 'Ninguém', '85912348765', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_orcamento`
--

CREATE TABLE `cad_orcamento` (
  `id_orcamento` int(15) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data_cotacao` date NOT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL,
  `status_aprovado` tinyint(4) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_orcamento`
--

INSERT INTO `cad_orcamento` (`id_orcamento`, `id_oficina`, `id_veiculo`, `data_cotacao`, `data_aprovacao`, `data_conclusao`, `status_aprovado`, `ativo`) VALUES
(1, 1, 1, '2025-06-01', '2025-06-02', '2025-06-05', 1, 1),
(2, 3, 1, '2025-06-02', '2025-06-04', '2025-06-05', 1, 1);

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
(0, 'TI', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
  `id_funcionario_falta` int(11) NOT NULL,
  `id_funcionario_substituto` int(11) NOT NULL,
  `id_locacao` int(11) NOT NULL,
  `data` date NOT NULL,
  `custo_sub` double NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_subs`
--

INSERT INTO `cad_subs` (`id_substituto`, `id_funcionario_falta`, `id_funcionario_substituto`, `id_locacao`, `data`, `custo_sub`, `ativo`) VALUES
(1, 2, 1, 2, '2025-07-21', 0, 1),
(2, 1, 2, 2, '2025-06-25', 374, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_veiculos`
--

CREATE TABLE `cad_veiculos` (
  `id_veiculo` int(15) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `fabricante` varchar(100) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `titular_veiculo` varchar(100) DEFAULT NULL,
  `ano_fab` year(4) NOT NULL,
  `vencimento_doc` date NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cad_veiculos`
--

INSERT INTO `cad_veiculos` (`id_veiculo`, `id_motorista`, `placa`, `modelo`, `fabricante`, `cor`, `tipo`, `titular_veiculo`, `ano_fab`, `vencimento_doc`, `ativo`) VALUES
(2, 0, 'ABC1234', 'Fusquinha', 'Volkswagen', 'Preto', 'Carro', 'Dono', '1990', '2012-12-12', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ck_veiculos`
--

CREATE TABLE `ck_veiculos` (
  `id_veiculo` int(15) NOT NULL,
  `itens_desgaste` tinyint(1) NOT NULL,
  `itens_externos` tinyint(1) NOT NULL,
  `itens_iluminacao` tinyint(1) NOT NULL,
  `itens_seguranca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 2, 10, 6, 0, 2, '2025-06-01 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) DEFAULT NULL,
  `cnpj` varchar(20) NOT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome_empresa`, `nome_fantasia`, `cnpj`, `cep`, `endereco`, `data_abertura`, `ativo`, `telefone`, `email`) VALUES
(1, 'Tele Entrega Soluções Logísticas', 'Tele Entrega', '63300578000183', '60060120', 'Rua Vinte e Cinco de Marco 151 Centro Fortaleza ', '2025-06-18', 0, '8532533000', 'comercial@teleentrega.com.br'),
(2, 'Capital Rádio Táxi', 'Rádio Táxi', '45428707000131', '60060120', 'Rua Vinte e Cinco de Março 149B Centro Fortaleza ', '0000-00-00', 1, '8532545554', 'radiotaxi@gmail.com'),
(3, 'Oficina Tele Entrega', 'Oficina TE', '12.657.079/0001-07', '60060120', 'Rua Vinte e Cinco de Marco 151 Centro Fortaleza ', '2025-06-18', 1, '8532321234', 'oficina@teleentrega.com.br'),
(4, 'Gelados do Barão', 'Barão', '94.919.674/0001-38', '60060120', 'Rua vinte e Cinco de Marco Fica em frente a TE Centro Fortaleza ', '2025-06-17', 1, '85901239874', 'barao@geladosdobarao.com.br'),
(12, 'assdasd', 'ssdasd', 'asdsasd', 'asdsasd', 'asdassd assdasd   asdsasd-', '2025-06-18', 0, 'sdsad', ''),
(22, 'Tele Entrega Soluções logísticas', 'Tele Entrega', '63.300.578/001', '60600120', 'Rua Vinte e Cinco de Marco 151  Centro Fortaleza-CE', '1986-02-18', 1, '85912349874', 'comercial@teleentrega.com.br'),
(32, 'Congelados do Barão', 'Congelados2 do Barão', '63.300.572/000', '60600220', 'Rua 25 de Marco 151 Centro Fortaleza-CE', '2025-06-18', 1, '85933669988', 'barao@gmail.com'),
(33, '', '', '', '', 'Teste    -', '2025-07-21', 0, '', ''),
(34, '', '', '', '', 'Mudança de liderança  R$ 5.00,00  -', '2025-07-21', 0, '', ''),
(35, '', '', '', '', 'Mudança de liderança  R$ 5.00,00  -', '2025-07-21', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(15) NOT NULL,
  `id_admissao` int(11) NOT NULL,
  `veic_proprio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_intercorrencia` int(15) NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `gerou_custo` tinyint(1) NOT NULL,
  `gravidade` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `id_funcionario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `intercorrencias`
--

INSERT INTO `intercorrencias` (`id_intercorrencia`, `data_ocorrencia`, `descricao`, `gerou_custo`, `gravidade`, `id_motivo`, `id_sub`, `ativo`, `id_funcionario`) VALUES
(1, '0000-00-00', '', 0, 0, 1, 0, 0, 0),
(2, '2025-07-21', 'Testando a descrição', 0, 1, 1, 2, 0, 3),
(4, '0000-00-00', '', 0, 0, 1, 0, 0, 1),
(5, '0000-00-00', 'Mudança de liderança', 0, 0, 1, 0, 0, 1),
(6, '1989-01-17', 'Mudança de país', 0, 1, 1, 2, 0, 3),
(7, '2025-07-21', 'Mudança de Dev', 0, 1, 1, 0, 0, 1),
(8, '2025-07-21', 'Teste 100', 0, 1, 1, 1, 0, 2),
(9, '2025-07-20', 'Mudança de gestão', 0, 1, 1, 3, 0, 2),
(10, '2025-07-14', 'a', 0, 2, 1, 2, 0, 2),
(11, '2025-07-04', 'a', 0, 1, 1, 2, 0, 1),
(12, '2025-07-05', 'h', 0, 1, 1, 1, 0, 2),
(13, '2025-06-30', 'Teste 3000', 0, 1, 1, 1, 0, 2),
(14, '2025-07-21', 'Mudança de Empresa', 0, 1, 1, 2, 0, 3),
(15, '2024-01-17', 'Mudança de setor', 0, 1, 1, 1, 0, 3),
(16, '2025-07-21', 'Teste 01', 0, 1, 1, 3, 0, 2),
(17, '2025-07-15', 'Teste final de edição', 0, 1, 1, 2, 1, 3),
(18, '2025-07-08', 'Teste 007', 0, 1, 1, 2, 1, 1),
(19, '2025-07-19', 'Teste final de cadastro', 0, 1, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos_acesso`
--

CREATE TABLE `modulos_acesso` (
  `id_acesso` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `modulos_acesso`
--

INSERT INTO `modulos_acesso` (`id_acesso`, `id_funcionario`, `id_modulo`, `tipo`, `id_grupo`, `data_cadastro`) VALUES
(0, 2, 1, 'visua', 0, '2025-07-21 14:49:10'),
(0, 3, 3, 'exclu', 0, '2025-07-23 11:15:42'),
(3, 2, 3, '1', 0, '2025-07-24 11:19:26'),
(4, 2, 2, '2', 0, '2025-07-24 11:19:26'),
(5, 2, 1, '4', 0, '2025-07-24 11:19:26'),
(6, 1, 3, 'ved', 0, '2025-07-25 09:55:27'),
(7, 1, 2, 'ved', 0, '2025-07-25 09:55:27'),
(8, 1, 1, 'ved', 0, '2025-07-25 09:55:27');

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
(3, 'movimentação de veiculos', 'modulo de movimentação de veículos', 1, '2025-07-17 16:11:29'),
(0, 'Modulo Teste', 'Teste 001', 1, '2025-07-23 11:17:35'),
(1, 'teste', 'teste', 1, '2025-07-16 15:25:49'),
(2, 'veiculos', 'modulo de veiculos', 1, '2025-07-16 17:20:39'),
(3, 'movimentação de veiculos', 'modulo de movimentação de veículos', 1, '2025-07-17 16:11:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mvo_veiculos`
--

CREATE TABLE `mvo_veiculos` (
  `id_mvo` int(15) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `valor_aluguel` double NOT NULL,
  `parcelas` int(11) NOT NULL,
  `doc_moto` varchar(255) DEFAULT NULL,
  `data_situacao` date NOT NULL,
  `data_entrega` date NOT NULL,
  `contrato_assinado` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `mvo_veiculos`
--

INSERT INTO `mvo_veiculos` (`id_mvo`, `id_funcionario`, `id_veiculo`, `valor_aluguel`, `parcelas`, `doc_moto`, `data_situacao`, `data_entrega`, `contrato_assinado`, `ativo`) VALUES
(1, 1, 1, 350, 36, '9835498534875438', '0000-00-00', '2025-06-01', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int(15) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `gravidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Administrador', 'Acesso total ao sistema', 1, '2025-07-14 16:31:45'),
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
  `id_permissao` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `confirmado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_funcionario`, `cpf`, `senha`, `id_permissao`, `ativo`, `data_cadastro`, `confirmado`) VALUES
(1, 2, '2873462843', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2025-07-15 14:57:01', 1),
(2, 1, '00000000000', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2025-07-15 15:01:21', 1);

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
  `pneu_dianteiro_esquerdo_observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculo_checklists`
--

INSERT INTO `veiculo_checklists` (`id_checklist`, `id_veiculo`, `data_checklist`, `observacoes`, `assinatura_motorista`, `pneu_traseiro_esquerdo_qualidade`, `pneu_traseiro_esquerdo_observacao`, `pneu_traseiro_esquerdo_foto`, `freios_qualidade`, `freios_observacao`, `freios_foto`, `oleo_qualidade`, `oleo_observacao`, `oleo_foto`, `luzes_qualidade`, `luzes_observacao`, `luzes_foto`, `lataria_qualidade`, `lataria_observacao`, `lataria_foto`, `nivel_agua_qualidade`, `nivel_agua_observacao`, `nivel_agua_foto`, `equipamentos_seguranca_qualidade`, `equipamentos_seguranca_observacao`, `equipamentos_seguranca_foto`, `origem`, `pneu_traseiro_direito_foto`, `pneu_dianteiro_esquerdo_foto`, `pneu_dianteiro_direito_foto`, `pneu_traseiro_direito_qualidade`, `pneu_dianteiro_direito_qualidade`, `pneu_dianteiro_esquerdo_qualidade`, `pneu_traseiro_direito_observacao`, `pneu_dianteiro_direito_observacao`, `pneu_dianteiro_esquerdo_observacao`) VALUES
(6, 2, '2025-07-01 00:00:00', 'Verificando a funcionalidade do checklist', 'Willyan Carlos', 'ruim', 'Teste de observação pneu 1', '6887906f5e375_download.png', 'ruim', 'Teste de observação freios 1', '6887906f5e7e9_Captura de tela 2025-07-25 112637.png', 'ruim', 'Teste de observação oleo 1', '6887906f5eaea_Captura de tela 2025-07-25 162309.png', 'ruim', 'Teste de observação luzes 1', '6887906f5ed6b_Captura de tela 2025-07-28 101208.png', 'ruim', 'Teste de observação lataria 1', '6887906f5f00d_WhatsApp Image 2025-05-23 at 09.23.52.jpeg', 'ruim', 'Teste de observação agua 1', '6887906f5f21a_WhatsApp Image 2025-05-23 at 15.08.19.jpeg', 'ruim', 'Teste de observação Equipamentos de Segurança 1', '6887906f5f446_WhatsApp Image 2025-05-27 at 08.47.16.jpeg', 'interno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, '2025-07-01 00:00:00', 'Teste para registrarmos as fotos dos 4 pneus do veículo.', 'Willyan Carlos', 'ruim', 'PTE OBS1', '688a4a8287e12_17538931506141148208895095709273.jpg', 'ruim', 'Freios OBS 1', '688a4a8287f71_17538931842804731600350053794122.jpg', 'ruim', 'NO OBS 1', '688a4a82881cf_17538932404953369473434508890162.jpg', 'ruim', 'Luz OBS 1', '688a4a82884cc_17538932703813303317802630815154.jpg', 'ruim', 'Lataria OBS 1', '688a4a82889a3_17538933067825945884358555361907.jpg', 'bom', 'NA OBS 1', '688a4a8288cce_17538933442817725267536875252882.jpg', 'regular', 'ES OBS 1', '688a4a8288ea0_17538933825481273318398766026331.jpg', 'interno', '688a4a8287cac_17538931176804811928833647010711.jpg', '688a4a8287b22_17538930842807277224403028711728.jpg', '688a4a82875ac_17538930397648316702428662610628.jpg', 'ruim', 'ruim', 'ruim', 'PTD OBS1', 'PDD OBS1', 'PDE OBS 1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cad_cargos`
--
ALTER TABLE `cad_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices de tabela `cad_funcionarios`
--
ALTER TABLE `cad_funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Índices de tabela `cad_motivo`
--
ALTER TABLE `cad_motivo`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Índices de tabela `cad_motoristas`
--
ALTER TABLE `cad_motoristas`
  ADD PRIMARY KEY (`id_motorista`);

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
-- Índices de tabela `ck_veiculos`
--
ALTER TABLE `ck_veiculos`
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
-- Índices de tabela `intercorrencias`
--
ALTER TABLE `intercorrencias`
  ADD PRIMARY KEY (`id_intercorrencia`);

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
-- Índices de tabela `veiculo_checklists`
--
ALTER TABLE `veiculo_checklists`
  ADD PRIMARY KEY (`id_checklist`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cad_cargos`
--
ALTER TABLE `cad_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cad_funcionarios`
--
ALTER TABLE `cad_funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cad_gestores`
--
ALTER TABLE `cad_gestores`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT de tabela `cad_motivo`
--
ALTER TABLE `cad_motivo`
  MODIFY `id_motivo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_motoristas`
--
ALTER TABLE `cad_motoristas`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_oficinas`
--
ALTER TABLE `cad_oficinas`
  MODIFY `id_oficina` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cad_orcamento`
--
ALTER TABLE `cad_orcamento`
  MODIFY `id_orcamento` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_subs`
--
ALTER TABLE `cad_subs`
  MODIFY `id_substituto` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cad_veiculos`
--
ALTER TABLE `cad_veiculos`
  MODIFY `id_veiculo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ck_veiculos`
--
ALTER TABLE `ck_veiculos`
  MODIFY `id_veiculo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `intercorrencias`
--
ALTER TABLE `intercorrencias`
  MODIFY `id_intercorrencia` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT de tabela `veiculo_checklists`
--
ALTER TABLE `veiculo_checklists`
  MODIFY `id_checklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
