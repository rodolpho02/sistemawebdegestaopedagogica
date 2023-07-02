-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2023 às 18:53
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `nomecompleto` varchar(50) NOT NULL,
  `nomesocial` varchar(50) NOT NULL,
  `aniversario` varchar(10) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `escola` varchar(50) NOT NULL,
  `turmaescolar` varchar(8) NOT NULL,
  `nivelescolar` varchar(15) NOT NULL,
  `anoescolar` varchar(15) NOT NULL,
  `certidaonasc` varchar(50) NOT NULL,
  `cpfresponsavel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `imagem`, `nomecompleto`, `nomesocial`, `aniversario`, `genero`, `rg`, `cpf`, `telefone`, `celular`, `email`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `whatsapp`, `escola`, `turmaescolar`, `nivelescolar`, `anoescolar`, `certidaonasc`, `cpfresponsavel`) VALUES
(56, 'coloridos-desenho-caricatura-ícone-rosto-mulher-vetor-clip-arte_csp77040465.jpg', 'Milena Mota Oliveira Cadastro', 'Milena Oliveira', '2013-06-12', 'Feminino', '255555555', '82384775731', '2135645454', '21999586337', 'milenadamota@gmail.com', '21215-540', 'Taquari', '80', 'casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ', '21999586337', 'Escola Municipal Edmundo Lins', '1201', 'Funtamental-II', '3° ano', '17770401552021151652694976016371', '13448181706'),
(57, 'como-desenhar-uma-garota.png', 'Daniela Status de Oliveira', 'Daniela Stattus', '2003-07-13', 'Feminino', '225255255', '43423774037', '1135645454', '21999586363', 'daniela02@gmail.com', '78052-853', 'T-1 ', '50', '', 'Residencial Nova Canaã', 'Cuiabá', 'MT', '21999586363', 'Sonia Segia Scudese', '1201', 'Funtamental-II', '2º', '17770401552021151652694976016387', ''),
(72, 'acd8a55bfc1d7e3975b27b2c60b208b4.png', 'Diogo de Oliveiras Barbosa', 'Diogo de Oliveira', '2000-05-01', 'Masculino', '302004725', '24189933708', '', '21989894545', 'diogo02@gmail.com', '25525-190', 'Artur de Azevedo', '149', '', 'Vila Rosali', 'São João de Meriti', 'RJ', '', 'Escola M. Carlos Mello', '1021', 'Médio', '2', '', ''),
(80, 'semfoto.jpg', 'Roberto Carlos da Silva ', 'Roberto Carlos', '2003-06-12', 'Masculino', '307567895', '15643839113', '2134855456', '21956656558', 'roberto02@gmail.com', '21215-500', 'Nova Cultura', '32', 'Casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ', '21956656558', 'Escola M. Brasil', '3001', 'Médio', '3°', '', ''),
(81, 'semfoto.jpg', 'Cabebe thiago Aragão', 'Calabe Thiago', '2000-06-12', 'Masculino', '191078219', '92793667692', '2135854555', '21995822456', 'cabele02@gmail.com', '21021-520', 'Leopoldina Rego', '101', 'Casa', 'Ramos', 'Rio de Janeiro', 'RJ', '21995822456', 'Escola M. João MArques', '1201', 'Funtamental-I', '2°', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `dataaula` date NOT NULL,
  `titulo_aula` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_turma`, `id_disciplina`, `dataaula`, `titulo_aula`, `descricao`) VALUES
(275, 35, 80, '2023-06-12', 'Subtração', ''),
(276, 35, 80, '2023-06-15', 'Divição', ''),
(277, 39, 80, '2023-06-15', 'Multiplição', ''),
(278, 39, 80, '2023-06-16', 'Soma', ''),
(279, 37, 79, '2023-06-12', 'Word', ''),
(280, 37, 79, '2023-06-13', 'Excel', ''),
(286, 35, 79, '2023-06-04', 'Excel', ''),
(287, 35, 86, '2023-06-12', 'Processador', ''),
(288, 35, 86, '2023-06-04', 'O que é hardware', ''),
(290, 39, 79, '2023-06-12', 'Word', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamada`
--

CREATE TABLE `chamada` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `presenca` varchar(10) NOT NULL,
  `datachamada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamada`
--

INSERT INTO `chamada` (`id`, `id_turma`, `id_aula`, `id_aluno`, `presenca`, `datachamada`) VALUES
(155, 39, 278, 72, 'Presenca', '2023-06-10'),
(156, 39, 290, 72, 'Presenca', '2023-06-10'),
(157, 35, 276, 57, 'Falta', '2023-06-15'),
(158, 35, 276, 56, 'Presenca', '2023-06-15'),
(159, 35, 275, 57, 'Presenca', '2023-06-11'),
(160, 35, 286, 57, 'Falta', '2023-06-16'),
(161, 35, 286, 56, 'Falta', '2023-06-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias`
--

CREATE TABLE `dias` (
  `id` int(8) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `turno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dias`
--

INSERT INTO `dias` (`id`, `dia`, `turno`) VALUES
(360, 'Segunda-feira', 'Tarde'),
(368, 'Domingo', 'Manhã');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `materia` varchar(30) NOT NULL,
  `id_professor` varchar(50) NOT NULL,
  `obs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `materia`, `id_professor`, `obs`) VALUES
(79, 'Informática Básica', '36', ''),
(80, 'Matemática', '36', ''),
(83, 'Inglês', '45', ''),
(93, 'História', '50', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `nomesocial` varchar(50) NOT NULL,
  `nomecompleto` varchar(50) NOT NULL,
  `aniversario` varchar(10) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `admissao` varchar(20) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `whatsapp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `imagem`, `nomesocial`, `nomecompleto`, `aniversario`, `genero`, `rg`, `cpf`, `telefone`, `celular`, `email`, `cargo`, `admissao`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `whatsapp`) VALUES
(244, 'retrato-de-um-jovem-com-barba-e-estilo-de-cabelo-avatar-masculino-ilustracao-vetorial_266660-423.jpg', 'Marcelo Oliveiro', 'Marcelo Oliveira Perreira', '1985-06-12', 'Masculino', '125479799', '45726238052', '2135687979', '21944897998', 'marcelo@gmail.com', 'Supervisor Escolar', '2007-06-12', '21070-830', 'Soldado Paiva', '35', '', 'Penha', 'Rio de Janeiro', 'RJ', '21945545789'),
(246, 'semfoto.jpg', 'Amanda Kellen', 'Amanda Kellen Alves Conegundes', '2000-06-12', 'Feminino', '191182588', '60275089061', '2155487497', '21968787894', 'amanda02@gmail.com', 'Secretária', '2015-06-12', '21215-540', 'Taquari', '49', 'casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ', '21991329842'),
(247, 'homem01.jpeg', 'Affonso Martins', 'Affonso Martins da Silva rocha', '1997-06-12', 'Masculino', '421168894', '91069681040', '2194848948', '21999522124', 'affonso02@gmail.com', 'Secretário', '2003-06-12', '21215-570', 'Francisco Venâncio Filho', '17', 'Ap - 170', 'Penha Circular', 'Rio de Janeiro', 'RJ', '21985484877'),
(249, 'images.jpeg', 'Fernanda Aline', 'Fernanda  Romero Ramos', '1988-06-12', 'Feminino', '389810885', '28219102071', '2133555455', '21995355885', 'fernanda02@gmail.com', 'Diretora', '2023-01-12', '21515-540', 'Amizade', '50', 'Frente', 'Costa Barros', 'Rio de Janeiro', 'RJ', '21995355885');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `id_dia` varchar(11) NOT NULL,
  `id_turma` varchar(50) DEFAULT NULL,
  `primeiro_tempo` varchar(50) NOT NULL,
  `pri_professor` varchar(50) NOT NULL,
  `segundo_tempo` varchar(50) NOT NULL,
  `seg_professor` varchar(50) NOT NULL,
  `terceiro_tempo` varchar(50) NOT NULL,
  `ter_professor` varchar(50) NOT NULL,
  `quarto_tempo` varchar(50) NOT NULL,
  `quar_professor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grades`
--

INSERT INTO `grades` (`id`, `id_dia`, `id_turma`, `primeiro_tempo`, `pri_professor`, `segundo_tempo`, `seg_professor`, `terceiro_tempo`, `ter_professor`, `quarto_tempo`, `quar_professor`) VALUES
(1020, '360', '35', '83', '45', '80', '36', '79', '36', '79', '36'),
(1032, '360', '39', '80', '36', '80', '36', '83', '45', '83', '45'),
(1036, '368', '35', '83', '45', '80', '36', '79', '36', '83', '45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `data_matri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `id_turma`, `id_aluno`, `data_matri`) VALUES
(367, 35, 57, '2023-06-11'),
(368, 35, 56, '2023-06-11'),
(369, 39, 72, '2023-06-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `nomecompleto` varchar(50) NOT NULL,
  `nomesocial` varchar(50) NOT NULL,
  `aniversario` varchar(10) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `formacao` varchar(50) NOT NULL,
  `admissao` varchar(12) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `whatsapp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `imagem`, `nomecompleto`, `nomesocial`, `aniversario`, `genero`, `rg`, `cpf`, `telefone`, `celular`, `email`, `cargo`, `formacao`, `admissao`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `whatsapp`) VALUES
(36, 'menina-de-cabelo-longo-e-escuro-uma-mulher-fundo-branco-ilustração-vetorial-rapariga-191683961.jpg', 'Glauce Basto da Silva', 'Glauce Basto', '1985-06-12', 'Feminino', '212584221', '61553083067', '2154548779', '54945646455', 'glauce02@gmail.com', 'Professor de Matemática', '', '2003-06-12', '21070-700', 'João de Deus', '15', 'Apto 106', 'Penha', 'Rio de Janeiro', 'RJ', '21954984897'),
(45, 'semfoto.jpg', 'Ana Maria Mendes Morão', 'Ana Maria', '1990-06-18', 'Feminino', '215875647', '14171521092', '2135454879', '54948778789', 'anamaria@gmail.com', 'Professora de Inglês', '', '', '21215-300', 'Idume', '49', '', 'Brás de Pina', 'Rio de Janeiro', 'RJ', '45946548789'),
(50, 'desenho_rosto_feminino_by_vanbutterfly_d1ay1d3-fullview.jpg', 'Maria Elizabeth Castro', 'Maria Elizabeth', '1997-06-12', 'Feminino', '157696443', '02775284027', '', '21953533545', 'Elizabeth02@gmail.com', 'Professor de História', '', '2022-06-17', '21215-420', 'Valdemar Mangini', '11', 'Casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ', ''),
(53, 'imagem04.jpg', 'Carla Yasmin da Silva', 'Carlos Yasmin', '1956-06-17', 'Feminino', '307867213', '50333042166', '2133856654', '21995452587', 'carla02@gmail.com', 'Professor Espanhol', '', '2020-06-12', '21215-540', 'Taquari', '101', 'Casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ', '21995452587');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `nomesocial` varchar(50) NOT NULL,
  `escolaridade` varchar(30) NOT NULL,
  `profissao` varchar(50) NOT NULL,
  `nomeresponsavel` varchar(100) NOT NULL,
  `aniversario` date NOT NULL,
  `genero` varchar(20) NOT NULL,
  `parentesco` varchar(30) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(30) NOT NULL,
  `nomerecado` varchar(100) NOT NULL,
  `celular2` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `imagem`, `nomesocial`, `escolaridade`, `profissao`, `nomeresponsavel`, `aniversario`, `genero`, `parentesco`, `rg`, `cpf`, `telefone`, `celular`, `email`, `whatsapp`, `nomerecado`, `celular2`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(28, 'avatar-linda-garota-adulta-em-desenho-de-oculos_128665-24.jpg', 'Neuza Medeiros', 'Nenhuma', 'Do lar', 'Neuza Oliveira Medeiros', '1993-06-12', 'Masculino', 'Pai', '154554848', '13448181706', '2137254589', '21999984565', 'neuza02@gmail.com', '21999984565', 'Rafeal Olivera', '21995545558', '21215-540', 'Taquari', '80', 'casa', 'Brás de Pina', 'Rio de Janeiro', 'RJ'),
(29, 'semfoto.jpg', 'Pedro Santos', 'Primário Completo', 'Lojista', 'Pedro Nelson Santos', '1951-01-14', 'Masculino', '', '282468894', '66002447717', '', '21987543543', 'pedro02@gmail.com', '21987543543', '', '', '64000-240', 'Desembargador Freitas', '48', 'Casa', 'Centro', 'Rio de Janeiro', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `obs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `numero`, `obs`) VALUES
(17, 'Sala 28', 'Informa Básica / Inglês Online'),
(18, 'Sala 22', 'Geografia / Língua Português');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `turma` varchar(50) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `obs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `turma`, `turno`, `obs`) VALUES
(35, 'Turma B', 'Tarde', 'Das 13 às 17 horas'),
(39, 'Turma C', 'Tarde', 'Das 13h às 17 horas'),
(61, 'Turma F', 'Tarde', 'Das 13 às 17horas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `nomesocial` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nivel` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `cpf`, `nomesocial`, `email`, `nivel`, `senha`) VALUES
(334, '45726238052', 'Marcelo Oliveiro', 'marcelo@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(335, '61553083067', 'Glauce Basto', 'glauce02@gmail.com', 'professor', 'bada1f8b66c59b0d389bba0d5c3a1cbc'),
(340, 'vazio', 'Rodolpho Magalhães', 'adm.ajn@gmail.com', 'admin', 'bada1f8b66c59b0d389bba0d5c3a1cbc'),
(348, '14171521092', 'Ana Maria', 'anamaria@gmail.com', 'professor', '202cb962ac59075b964b07152d234b70'),
(351, '60275089061', 'Amanda Kellen', 'amanda02@gmail.com', 'admin', 'a3c2e16db4f214ec081391937d2a044c'),
(352, '91069681040', 'Affonso Martins', 'affonso02@gmail.com', 'secretaria', 'bada1f8b66c59b0d389bba0d5c3a1cbc'),
(357, '28219102071', 'Fernanda Aline', 'fernanda02@gmail.com', 'admin', 'a0705aa8a74025de81beb5acca57ba0e'),
(358, '02775284027', 'Maria Elizabeth', 'Elizabeth02@gmail.com', 'professor', '63d5030df41ce7105e4cce070b238ab9'),
(363, '50333042166', 'Carlos Yasmin', 'carla02@gmail.com', 'professor', '16b8fa096293e7d62b0d0f84f95a8cfe');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamada`
--
ALTER TABLE `chamada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de tabela `chamada`
--
ALTER TABLE `chamada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de tabela `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de tabela `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
