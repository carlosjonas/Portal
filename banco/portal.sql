-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Fev-2022 às 20:45
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `imagem` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `imagem`, `titulo`, `descricao`, `ativo`, `data`) VALUES
(32, 'image/android-chrome-192x192.png', 'Escravidão segue longe de ser abolida no mundo e persiste na África, Ásia e também no Brasil', 'A organização Temedt luta para acabar com a escravidão por hereditariedade no Mali. \"Como organização de defesa dos direitos humanos, denunciamos o fenômeno desde 2006. Mas não tivemos um único caso de escravidão que foi parar nos tribunais. As autoridades sempre encontram desculpas\", critica Raichatou Walet Altanata, vice-presidente da fundação. Segundo ela, a Justiça trata as ocorrências como ato de violência ou crime, mas a causa real do problema — a escravidão — não é considerada.', 's', '2022-02-07 23:27:01'),
(33, 'image/android-chrome-192x192.png', 'Linn da Quebrada: crise na música e na política', 'Participando na edição deste ano do BBB, Linn da Quebrada vem marcando o cenário da música brasileira há pelo menos cinco anos. Em 2018, a cantora e atriz nos contou sobre cantar as próprias crises.', 's', '2022-02-07 23:28:30');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
