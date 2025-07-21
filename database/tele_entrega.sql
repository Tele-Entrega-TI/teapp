-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2025 às 22:09
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
(2, 'Antonio Mickael Santiago', 'Mickael Santiago', 'F', '2873462843', '3523353', 'mickaela santiaga', 'mickael santiago pai', '1972-06-13', 'mickaelsantiago@gmail.com', '12312312313', 'teste', 'Av. Heráclito Graça, 1177 - Aldeota', '2342342351', '46345456345', 'ssp', '34234242', '2025-06-01', 1, '2025-06-17 14:51:32', '2025-06-23 15:13:30');

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
-- Estrutura para tabela `cad_motivo`
--

CREATE TABLE `cad_motivo` (
  `id_motivo` int(15) NOT NULL,
  `multas` tinyint(1) NOT NULL DEFAULT 1,
  `manutencao` tinyint(1) NOT NULL DEFAULT 1,
  `acidente` tinyint(1) NOT NULL DEFAULT 1,
  `gasto_emprest` tinyint(1) NOT NULL DEFAULT 1,
  `outros` tinyint(1) NOT NULL DEFAULT 1,
  `desc_motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de motivos diversos';

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_motoristas`
--

CREATE TABLE `cad_motoristas` (
  `id_motorista` int(11) NOT NULL,
  `nome_motorista` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `categoria` varchar(5) NOT NULL,
  `validade_cnh` date NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` text NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tabela de cadastro de motoristas';

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
(1, 1, 2, 374.00, '2025-06-25', 2, 0);

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
  `ano_fab` year(4) NOT NULL,
  `vencimento_doc` date NOT NULL,
  `id_funcionario` int(15) DEFAULT NULL,
  `titular_veiculo` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para cadastro de veículos ';

--
-- Despejando dados para a tabela `cad_veiculos`
--

INSERT INTO `cad_veiculos` (`id_veiculo`, `placa`, `modelo`, `tipo`, `cor`, `fabricante`, `ano_fab`, `vencimento_doc`, `id_funcionario`, `titular_veiculo`, `ativo`) VALUES
(1, 'SBD7I65', 'Polo', 'Carro', 'Branco', 'Volkswagen', '2022', '2026-06-09', NULL, 'Ricardo Filho', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ck_veiculos`
--

CREATE TABLE `ck_veiculos` (
  `id_veiculo` int(15) NOT NULL,
  `itens_externos` tinyint(1) NOT NULL DEFAULT 1,
  `itens_seguranca` tinyint(1) NOT NULL DEFAULT 1,
  `itens_iluminacao` tinyint(1) NOT NULL DEFAULT 1,
  `itens_desgaste` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para checklist de veículos';

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
-- Estrutura para tabela `veiculo_checklists`
--

CREATE TABLE `veiculo_checklists` (
  `id_checklist` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data_checklist` datetime DEFAULT current_timestamp(),
  `pneus_ok` tinyint(1) DEFAULT 0,
  `freios_ok` tinyint(1) DEFAULT 0,
  `oleo_ok` tinyint(1) DEFAULT 0,
  `luzes_ok` tinyint(1) DEFAULT 0,
  `lataria_ok` tinyint(1) DEFAULT 0,
  `nivel_agua_ok` tinyint(1) DEFAULT 0,
  `equipamentos_seguranca_ok` tinyint(1) DEFAULT 0,
  `observacoes` text DEFAULT NULL,
  `assinatura_motorista` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculo_checklists`
--

INSERT INTO `veiculo_checklists` (`id_checklist`, `id_veiculo`, `data_checklist`, `pneus_ok`, `freios_ok`, `oleo_ok`, `luzes_ok`, `lataria_ok`, `nivel_agua_ok`, `equipamentos_seguranca_ok`, `observacoes`, `assinatura_motorista`) VALUES
(1, 14, '2025-06-05 00:00:00', 1, 1, 1, 1, 1, 1, 1, 'rttyyerterfreee', 'rtyrtyerterter'),
(2, 14, '2025-06-05 00:00:00', 1, 1, 1, 1, 1, 1, 1, 'rttyyerterfreee', 'rtyrtyerterter'),
(3, 13, '2025-06-04 00:00:00', 1, 1, 0, 0, 0, 1, 1, '123123', '123123'),
(4, 8, '2025-06-04 00:00:00', 1, 0, 1, 0, 1, 1, 0, '123123', '123123'),
(5, 1, '2025-06-17 00:00:00', 1, 1, 1, 1, 1, 1, 1, 'tudo ok!', 'teste');

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
  ADD PRIMARY KEY (`id_funcionario`);

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
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cad_funcionarios`
--
ALTER TABLE `cad_funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de tabela `cad_motivo`
--
ALTER TABLE `cad_motivo`
  MODIFY `id_motivo` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_motoristas`
--
ALTER TABLE `cad_motoristas`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_substituto` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cad_veiculos`
--
ALTER TABLE `cad_veiculos`
  MODIFY `id_veiculo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ck_veiculos`
--
ALTER TABLE `ck_veiculos`
  MODIFY `id_veiculo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `dados_profissionais`
--
ALTER TABLE `dados_profissionais`
  MODIFY `id_dado_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de tabela `intercorrencias`
--
ALTER TABLE `intercorrencias`
  MODIFY `id_funcionario` int(15) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_checklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
