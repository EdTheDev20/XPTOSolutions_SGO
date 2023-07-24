-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 24-Jul-2023 às 05:16
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
-- Banco de dados: `xptosolutions_sgo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcomuna`
--

CREATE TABLE `tcomuna` (
  `idtcomuna` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `fk_idtmunicipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tcomuna`
--

INSERT INTO `tcomuna` (`idtcomuna`, `nome`, `fk_idtmunicipio`) VALUES
(1, 'Barra do Dande', 1),
(2, 'Cabiri', 1),
(3, 'Caxito', 1),
(4, 'Kakalo', 1),
(5, 'Mabubas', 1),
(6, 'Babaera', 2),
(7, 'Baia Azul', 2),
(8, 'Balombo', 2),
(9, 'Benguela', 2),
(10, 'Bocoio', 2),
(11, 'Andulo', 3),
(12, 'Camacupa', 3),
(13, 'Chicala-Cholohanga', 3),
(14, 'Cunhinga', 3),
(15, 'Cuemba', 3),
(16, 'Buco Zau', 4),
(17, 'Cacongo', 4),
(18, 'Caio Litoral', 4),
(19, 'Caio', 4),
(20, 'Cabinda', 4),
(21, 'Calai', 5),
(22, 'Cuito Cuanavale', 5),
(23, 'Cuangar', 5),
(24, 'Dirico', 5),
(25, 'Mavinga', 5),
(26, 'Aldeia Nova', 6),
(27, 'Banga', 6),
(28, 'Bolongongo', 6),
(29, 'Cazengo', 6),
(30, 'Golungo Alto', 6),
(31, 'Amboim', 7),
(32, 'Cachyopembe', 7),
(33, 'Cassongue', 7),
(34, 'Conda', 7),
(35, 'Ebo', 7),
(36, 'Cahama', 8),
(37, 'Cuanhama', 8),
(38, 'Curoca', 8),
(39, 'Cuvelai', 8),
(40, 'Namacunde', 8),
(41, 'Alto Hama', 9),
(42, 'Bailundo', 9),
(43, 'Catchiungo', 9),
(44, 'Chicala-Cholohanga', 9),
(45, 'Chinjenje', 9),
(46, 'Caconda', 10),
(47, 'Caluquembe', 10),
(48, 'Capunda-Cavilongo', 10),
(49, 'Chiange', 10),
(50, 'Chibia', 10),
(51, 'Belas', 11),
(52, 'Cacuaco', 11),
(53, 'Cazenga', 11),
(54, 'Ícolo e Bengo', 11),
(55, 'Luanda', 11),
(56, 'Caungula', 12),
(57, 'Chitato', 12),
(58, 'Cuango', 12),
(59, 'Lubalo', 12),
(60, 'Xá Muteba', 12),
(61, 'Cacolo', 13),
(62, 'Dala', 13),
(63, 'Muconda', 13),
(64, 'Saurimo', 13),
(65, 'Xassengue', 13),
(66, 'Cacuso', 14),
(67, 'Calandula', 14),
(68, 'Cangandala', 14),
(69, 'Cunda-Dia-Baze', 14),
(70, 'Malanje', 14),
(71, 'Alto Luau', 15),
(72, 'Bundas', 15),
(73, 'Camanongue', 15),
(74, 'Léua', 15),
(75, 'Lumeje', 15),
(76, 'Bibala', 16),
(77, 'Camucuio', 16),
(78, 'Moçâmedes', 16),
(79, 'Tômbwa', 16),
(80, 'Virei', 16),
(81, 'Ambuíla', 17),
(82, 'Bembe', 17),
(83, 'Buengas', 17),
(84, 'Macocola', 17),
(85, 'Negage', 17),
(86, 'Cuimba', 18),
(87, 'Luvo', 18),
(88, 'M\'Banza Congo', 18),
(89, 'N\'Zeto', 18),
(90, 'Soyo', 18),
(91, 'Talatona', 51),
(92, 'Kilamba Kiaxi', 51),
(93, 'Benfica', 51),
(94, 'Cidade Universitária', 51),
(95, 'Cacuaco', 52),
(96, 'Sequele', 52),
(97, 'Mulenvos de Baixo', 52),
(98, 'Mulenvos de Cima', 52),
(99, 'Cazenga', 53),
(100, 'Tala Hady', 53),
(101, 'Hoji ya Henda', 53),
(102, 'Rangel', 53),
(103, 'Catete', 54),
(104, 'Zango', 54),
(105, 'Viana', 54),
(106, 'Mabo', 54),
(107, 'Cabiri', 54),
(108, 'Kinaxixi', 91),
(109, 'Ilha do Cabo', 91),
(110, 'São Paulo', 91),
(111, 'Rocha Pinto', 91),
(112, 'Ingombota', 55),
(113, 'Maianga', 55),
(114, 'Sambizanga', 55),
(115, 'Neves Bendinha', 55),
(116, 'Ramiros', 55),
(117, 'Ilha de Luanda', 55),
(118, 'Quifangondo', 92),
(119, 'Bom Jesus', 92),
(120, 'Barra do Cuanza', 92),
(121, 'Dande', 92);

-- --------------------------------------------------------

--
-- Estrutura da tabela `testadocliente`
--

CREATE TABLE `testadocliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testadocliente`
--

INSERT INTO `testadocliente` (`id`, `nome`) VALUES
(1, 'Activo'),
(2, 'Bloqueado'),
(3, 'Não Confirmado'),
(4, 'Anomalia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testadosoutdoors`
--

CREATE TABLE `testadosoutdoors` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testadosoutdoors`
--

INSERT INTO `testadosoutdoors` (`id`, `nome`) VALUES
(1, 'Disponível'),
(2, ' A aguardar pagamento'),
(3, 'Por Validar Pagamento'),
(4, 'Ocupado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tmunicipio`
--

CREATE TABLE `tmunicipio` (
  `idtmunicipio` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `fk_idprovincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tmunicipio`
--

INSERT INTO `tmunicipio` (`idtmunicipio`, `nome`, `fk_idprovincia`) VALUES
(1, 'Ambriz', 1),
(2, 'Bula Atumba', 1),
(3, 'Dande', 1),
(4, 'Dembos', 1),
(5, 'Nambuangongo', 1),
(6, 'Baía Farta', 2),
(7, 'Balombo', 2),
(8, 'Benguela', 2),
(9, 'Bocoio', 2),
(10, 'Caimbambo', 2),
(11, 'Andulo', 3),
(12, 'Camacupa', 3),
(13, 'Catabola', 3),
(14, 'Chitembo', 3),
(15, 'Cuemba', 3),
(16, 'Belize', 4),
(17, 'Buco-Zau', 4),
(18, 'Cabinda', 4),
(19, 'Cacongo', 4),
(20, 'Landana', 4),
(21, 'Calai', 5),
(22, 'Cuangar', 5),
(23, 'Cuchi', 5),
(24, 'Cuito Cuanavale', 5),
(25, 'Dirico', 5),
(26, 'Ambaca', 6),
(27, 'Banga', 6),
(28, 'Bolongongo', 6),
(29, 'Cambambe', 6),
(30, 'Cazengo', 6),
(31, 'Amboim', 7),
(32, 'Cassongue', 7),
(33, 'Conda', 7),
(34, 'Ebo', 7),
(35, 'Libolo', 7),
(36, 'Cahama', 8),
(37, 'Cuanhama', 8),
(38, 'Curoca', 8),
(39, 'Cuvelai', 8),
(40, 'Ombadja', 8),
(41, 'Bailundo', 9),
(42, 'Caála', 9),
(43, 'Catchiungo', 9),
(44, 'Chicala-Cholohanga', 9),
(45, 'Chinjenje', 9),
(46, 'Caconda', 10),
(47, 'Caluquembe', 10),
(48, 'Chiange', 10),
(49, 'Chibia', 10),
(50, 'Chicomba', 10),
(51, 'Belas', 11),
(52, 'Cacuaco', 11),
(53, 'Cazenga', 11),
(54, 'Ícolo e Bengo', 11),
(55, 'Luanda', 11),
(56, 'Cambulo', 12),
(57, 'Capenda-Camulemba', 12),
(58, 'Caungula', 12),
(59, 'Chitato', 12),
(60, 'Cuango', 12),
(61, 'Cacolo', 13),
(62, 'Dala', 13),
(63, 'Muconda', 13),
(64, 'Saurimo', 13),
(65, 'Vuilco', 13),
(66, 'Cacuso', 14),
(67, 'Calandula', 14),
(68, 'Cangandala', 14),
(69, 'Cuaba Nzogo', 14),
(70, 'Malanje', 14),
(71, 'Alto Zambeze', 15),
(72, 'Bundas', 15),
(73, 'Camanongue', 15),
(74, 'Léua', 15),
(75, 'Luacano', 15),
(76, 'Bibala', 16),
(77, 'Camucuio', 16),
(78, 'Moçâmedes', 16),
(79, 'Tômbwa', 16),
(80, 'Virei', 16),
(81, 'Ambuila', 17),
(82, 'Bembe', 17),
(83, 'Buengas', 17),
(84, 'Negage', 17),
(85, 'Sanza Pombo', 17),
(86, 'Cuimba', 18),
(87, 'M`banza Congo', 18),
(88, 'N`zeto', 18),
(89, 'Noqui', 18),
(90, 'Soyo', 18),
(91, 'Kimbanza', 11),
(92, 'Quiçama', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tnacionalidade`
--

CREATE TABLE `tnacionalidade` (
  `idtnacionalidade` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tnacionalidade`
--

INSERT INTO `tnacionalidade` (`idtnacionalidade`, `nome`) VALUES
(1, 'Afegã(o)'),
(2, 'Sul-Africano(a)'),
(3, 'Albanês(esa)'),
(4, 'Alemão(a)'),
(5, 'Andorrano(a)'),
(6, 'Angolano(a)'),
(7, 'Antiguano(a) e Barbudense'),
(8, 'Saudita'),
(9, 'Argelino(a)'),
(10, 'Argentino(a)'),
(11, 'Armênio(a)'),
(12, 'Australiano(a)'),
(13, 'Austríaco(a)'),
(14, 'Azerbaijano(a)'),
(15, 'Bahamense'),
(16, 'Barenita'),
(17, 'Bangladeshi'),
(18, 'Barbadiano(a)'),
(19, 'Bielorrusso(a)'),
(20, 'Belga'),
(21, 'Belizenho(a)'),
(22, 'Beninense'),
(23, 'Boliviano(a)'),
(24, 'Bósnio(a) e Herzegovino'),
(25, 'Botsuanês(a)'),
(26, 'Brasileiro(a)'),
(27, 'Bruneano(a)'),
(28, 'Búlgaro(a)'),
(29, 'Burquinês(a)'),
(30, 'Burundinês(a)'),
(31, 'Butanês(a)'),
(32, 'Cabo-verdiano(a)'),
(33, 'Camaronês(a)'),
(34, 'Cambojano(a)'),
(35, 'Canadense'),
(36, 'Catariano(a)'),
(37, 'Cazaque'),
(38, 'Chadiano(a)'),
(39, 'Chileno(a)'),
(40, 'Chinês(a)'),
(41, 'Cipriota'),
(42, 'Colombiano(a)'),
(43, 'Comoriano(a)'),
(44, 'Congolês(a)'),
(45, 'Norte-coreano(a)'),
(46, 'Sul-coreano(a)'),
(47, 'Marfinense'),
(48, 'Costarriquenho(a)'),
(49, 'Croata'),
(50, 'Cubano(a)'),
(51, 'Dinamarquês(a)'),
(52, 'Djibutiano(a)'),
(53, 'Dominiquense'),
(54, 'Egípcio(a)'),
(55, 'Salvadorenho(a)'),
(56, 'Emiradense'),
(57, 'Equatoriano(a)'),
(58, 'Eritreiano(a)'),
(59, 'Eslovaco(a)'),
(60, 'Esloveno(a)'),
(61, 'Espanhol(a)'),
(62, 'Estadunidense'),
(63, 'Estoniano(a)'),
(64, 'Esvatiniano(a)'),
(65, 'Etíope'),
(66, 'Fijiano(a)'),
(67, 'Filipino(a)'),
(68, 'Finlandês(a)'),
(69, 'Francês(a)'),
(70, 'Gabonês(a)'),
(71, 'Gambiano(a)'),
(72, 'Ganês(a)'),
(73, 'Georgiano(a)'),
(74, 'Granadino(a)'),
(75, 'Grego(a)'),
(76, 'Guatemalteco(a)'),
(77, 'Guianês(a)'),
(78, 'Guineense'),
(79, 'Equato-Guineense'),
(80, 'Bissau-Guineense'),
(81, 'Haitiano(a)'),
(82, 'Holandês(a)'),
(83, 'Hondurenho(a)'),
(84, 'Húngaro(a)'),
(85, 'Iemenita'),
(86, 'Marshallino(a)'),
(87, 'Salomonense'),
(88, 'Indiano(a)'),
(89, 'Indonésio(a)'),
(90, 'Iraniano(a)'),
(91, 'Iraquiano(a)'),
(92, 'Irlandês(a)'),
(93, 'Islandês(a)'),
(94, 'Israelense'),
(95, 'Italiano(a)'),
(96, 'Jamaicano(a)'),
(97, 'Japonês(a)'),
(98, 'Jordaniano(a)'),
(99, 'Kiribatiano(a)'),
(100, 'Kuwaitiano(a)'),
(101, 'Laosiano(a)'),
(102, 'Lesotiano(a)'),
(103, 'Letão(a)'),
(104, 'Libanês(a)'),
(105, 'Liberiano(a)'),
(106, 'Líbio(a)'),
(107, 'Liechtensteiniano(a)'),
(108, 'Lituano(a)'),
(109, 'Luxemburguês(a)'),
(110, 'Malgaxe'),
(111, 'Malaio(a)'),
(112, 'Malauiano(a)'),
(113, 'Maldivo(a)'),
(114, 'Malinês(a)'),
(115, 'Maltês(a)'),
(116, 'Marroquino(a)'),
(117, 'Mauriciano(a)'),
(118, 'Mauritano(a)'),
(119, 'Mexicano(a)'),
(120, 'Mianmarense'),
(121, 'Micronésio(a)'),
(122, 'Moçambicano(a)'),
(123, 'Moldávio(a)'),
(124, 'Monegasco(a)'),
(125, 'Mongol(a)'),
(126, 'Montenegrino(a)'),
(127, 'Namibiano(a)'),
(128, 'Nauruano(a)'),
(129, 'Nepalês(a)'),
(130, 'Nicaraguense'),
(131, 'Nigerino(a)'),
(132, 'Nigeriano(a)'),
(133, 'Norueguês(a)'),
(134, 'Neozelandês(a)'),
(135, 'Omanense'),
(136, 'Palauense'),
(137, 'Panamenho(a)'),
(138, 'Papuásio(a)-Novo-Guineense'),
(139, 'Paquistanês(a)'),
(140, 'Paraguaio(a)'),
(141, 'Peruano(a)'),
(142, 'Polonês(a)'),
(143, 'Português(a)'),
(144, 'Queniano(a)'),
(145, 'Quirguiz(a)'),
(146, 'Britânico(a)'),
(147, 'Centro-africano(a)'),
(148, 'Dominicano(a)'),
(149, 'Tcheco(a)'),
(150, 'Romeno(a)'),
(151, 'Ruandês(a)'),
(152, 'Russo(a)'),
(153, 'Samoano(a)'),
(154, 'Sanmarinense'),
(155, 'Santa-lucense'),
(156, 'São-cristovense'),
(157, 'Santomense'),
(158, 'São-vicentino(a)'),
(159, 'Senegalês(a)'),
(160, 'Sérvio(a)'),
(161, 'Seichelense'),
(162, 'Serra-leonês(a)'),
(163, 'Cingapuriano(a)'),
(164, 'Sírio(a)'),
(165, 'Somali(a)'),
(166, 'Sri-lanquês(a)'),
(167, 'Suazi(a)'),
(168, 'Sudanês(a)'),
(169, 'Sul-sudanês(a)'),
(170, 'Sueco(a)'),
(171, 'Suíço(a)'),
(172, 'Surinamês(a)'),
(173, 'Tailandês(a)'),
(174, 'Taiwanês(a)'),
(175, 'Tajique'),
(176, 'Tanzaniano(a)'),
(177, 'Timorense'),
(178, 'Togolês(a)'),
(179, 'Tonganês(a)'),
(180, 'Trinitário(a)-tobaguense'),
(181, 'Tunisiano(a)'),
(182, 'Turcomeno(a)'),
(183, 'Turco(a)'),
(184, 'Tuvaluano(a)'),
(185, 'Ucraniano(a)'),
(186, 'Ugandense'),
(187, 'Uruguaio(a)'),
(188, 'Uzbeque'),
(189, 'Vanuatuense'),
(190, 'Vaticano(a)'),
(191, 'Venezuelano(a)'),
(192, 'Vietnamita'),
(193, 'Zambiano(a)'),
(194, 'Zimbabuano(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `toutdoor`
--

CREATE TABLE `toutdoor` (
  `id` int(11) NOT NULL,
  `fk_tipo` int(11) DEFAULT NULL,
  `fk_tprovincia` int(11) DEFAULT NULL,
  `fk_tmunicipio` int(11) DEFAULT NULL,
  `fk_tcomuna` int(11) DEFAULT NULL,
  `datain` date DEFAULT NULL,
  `datafim` date DEFAULT NULL,
  `imgpath` varchar(255) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `fk_estado` int(11) DEFAULT NULL,
  `fk_gestid` int(11) DEFAULT NULL,
  `comprovpath` varchar(255) DEFAULT NULL,
  `fk_userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `toutdoor`
--

INSERT INTO `toutdoor` (`id`, `fk_tipo`, `fk_tprovincia`, `fk_tmunicipio`, `fk_tcomuna`, `datain`, `datafim`, `imgpath`, `preco`, `fk_estado`, `fk_gestid`, `comprovpath`, `fk_userid`) VALUES
(1, 3, 4, 17, 81, '2023-06-28', '2023-07-27', 'Uploads/58DA15999147C4D620D97767ACAB560F.jpg', 100, 2, NULL, 'null', 14),
(2, 2, 11, 55, 114, '2023-07-14', '2023-07-30', 'Uploads/depositphotos_75108665-Slanting-lines-background.jpg', 100, 2, NULL, 'null', 14),
(3, 2, 11, 53, 99, '2023-07-01', '2023-07-31', 'Uploads/58DA15999147C4D620D97767ACAB560F.jpg', 100, 2, NULL, 'null', 14),
(4, 3, 11, 53, 102, '2023-07-08', '2023-07-30', 'Uploads/apple-lightning-3.5mm-audio-jack-adapater-2.jpg', 100, 2, NULL, 'null', 14),
(9, 1, 3, 12, 57, '2023-07-14', '2023-07-29', 'Uploads/H019e07a9131a46fda498ea6f00943f87t.jpg', 100, 2, NULL, 'null', 14),
(10, 2, 3, 12, 57, '2023-07-01', '2023-07-30', 'Uploads/H019e07a9131a46fda498ea6f00943f87t.jpg', 100, 2, 8, 'null', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tprovincia`
--

CREATE TABLE `tprovincia` (
  `idtprovincia` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tprovincia`
--

INSERT INTO `tprovincia` (`idtprovincia`, `nome`) VALUES
(1, 'Bengo'),
(2, 'Benguela'),
(3, 'Bié'),
(4, 'Cabinda'),
(5, 'Cuando Cubango'),
(6, 'Cuanza Norte'),
(7, 'Cuanza Sul'),
(8, 'Cunene'),
(9, 'Huambo'),
(10, 'Huíla'),
(11, 'Luanda'),
(12, 'Lunda Norte'),
(13, 'Lunda Sul'),
(14, 'Malanje'),
(15, 'Moxico'),
(16, 'Namibe'),
(17, 'Uíge'),
(18, 'Zaire');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ttipodecliente`
--

CREATE TABLE `ttipodecliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ttipodecliente`
--

INSERT INTO `ttipodecliente` (`id`, `nome`) VALUES
(1, 'Particular'),
(2, 'Empresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ttipodeusuario`
--

CREATE TABLE `ttipodeusuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ttipodeusuario`
--

INSERT INTO `ttipodeusuario` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Gestor'),
(3, 'UserRegistrado'),
(4, 'Visitante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ttipooutdoors`
--

CREATE TABLE `ttipooutdoors` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ttipooutdoors`
--

INSERT INTO `ttipooutdoors` (`id`, `nome`) VALUES
(1, 'Paineis Luminosos'),
(2, 'Paineis Não Luminosos'),
(3, 'Faixadas'),
(4, 'Placas Indicativas'),
(5, 'Lampoles');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL,
  `numTel` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `empresaActividade` varchar(300) DEFAULT NULL,
  `fk_prov` int(11) DEFAULT NULL,
  `fk_mun` int(11) DEFAULT NULL,
  `fk_com` int(11) DEFAULT NULL,
  `fk_tTipoCliente` int(11) DEFAULT NULL,
  `fk_tNacionalidade` int(11) DEFAULT NULL,
  `fk_tTipoDeUsuario` int(11) DEFAULT NULL,
  `fk_tEstadoConta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tuser`
--

INSERT INTO `tuser` (`id`, `nome`, `email`, `morada`, `numTel`, `username`, `password`, `empresaActividade`, `fk_prov`, `fk_mun`, `fk_com`, `fk_tTipoCliente`, `fk_tNacionalidade`, `fk_tTipoDeUsuario`, `fk_tEstadoConta`) VALUES
(1, 'Edgar Cardoso', 'edgarsnake1@gmail.com', 'Benfica,Rua E', '936721457', 'EdTheDev', '123Pass', 'Ya', 11, 51, 91, 2, 6, 3, 1),
(2, 'Edgar C', 'edga@gmail.com', 'Belas, Rua E', '936721457', 'Log', '123Pass', 'eej', 11, 52, 96, 2, 7, 3, 1),
(3, 'edgaradmin', 'admin@admin.com', 'eij', '936721457', 'admin', '123Pass', 'null', 11, 51, 91, 1, 6, 3, 1),
(4, 'JPIJPIJ', 'admin@gmail.com', 'kokj', '937213801', 'pijup', '123Pass', 'kpo', 11, 51, 91, 2, 6, 3, 3),
(5, 'admin', 'adminxptosolutions1@exelica.com', 'Rua E Casa 13A', '936721457', 'adminxpto', 'admin123', NULL, 11, 51, 91, 2, 6, 1, 1),
(6, 'hijhwijhp', 'edgar@gmail.com', 'benfica,rua E', '936721457', 'EdTheDev20', '123Pass', 'null', 11, 51, 91, 1, 6, 3, 2),
(7, 'Edgar Cardoso', 'edgar@gmail.com', 'edg', '936721457', 'EdTheDev2000', '123P', 'null', 11, 51, 91, 1, 6, 3, 3),
(8, 'pojpo', 'pijpijpo@gmail.com', 'elkoke', '936721457', 'kjpoj', '123Pass', 'null', 11, 51, 91, 1, 6, 2, 3),
(9, 'Test XPTO', 'hiropainxd@test.com', 'Rua E, Casa 13A', '936721457', 'LeTest20', '123Pass', 'null', 11, 51, 93, 1, 6, 3, 2),
(10, 'Edgar Cardoso', 'edga@gmail.com', 'Rua E, Casa 13A', '936721457', 'LeDevTest00', '123Pass', 'null', 11, 51, 91, 1, 6, 3, 3),
(11, 'MrTheBean', 'ed@rmia.com', 'ek', '936721457', 'Mr.Bean', '12Pass', 'null', 11, 55, 114, 1, 13, 2, 3),
(12, 'EdgarEid', 'oe@gmail.com', 'RuaD,Casa12', '936721457', 'opEdd', '123Pass', 'null', 11, 55, 116, 1, 15, 3, 3),
(13, 'jepijepj', 'derby@exemplo.com', 'jeniojpi', '936721457', 'Derby', '123Pass', 'null', 11, 52, 96, 1, 6, 3, 3),
(14, 'EdgarCardoso', 'ehe@gmail.com', '    Benfica', '936721456', 'DarkerThanGamer', '123p011', 'null', 3, 14, 68, 1, 17, 3, 1),
(15, 'Gestor 1', 'gestor@gmail.com', 'eioh', '937213801', 'TheGestor', 'gest123', NULL, 4, 17, 82, NULL, NULL, 2, 1),
(16, 'EdgarCardoso', 'pojpj@gmail.com', 'ijhp', '936724127', '+pejk\'', '123p', NULL, 2, 7, 31, NULL, NULL, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tcomuna`
--
ALTER TABLE `tcomuna`
  ADD PRIMARY KEY (`idtcomuna`),
  ADD KEY `fk_idtmunicipio` (`fk_idtmunicipio`);

--
-- Índices para tabela `testadocliente`
--
ALTER TABLE `testadocliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testadosoutdoors`
--
ALTER TABLE `testadosoutdoors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD PRIMARY KEY (`idtmunicipio`),
  ADD KEY `fk_idprovincia` (`fk_idprovincia`);

--
-- Índices para tabela `tnacionalidade`
--
ALTER TABLE `tnacionalidade`
  ADD PRIMARY KEY (`idtnacionalidade`);

--
-- Índices para tabela `toutdoor`
--
ALTER TABLE `toutdoor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo` (`fk_tipo`),
  ADD KEY `fk_tprovincia` (`fk_tprovincia`),
  ADD KEY `fk_tmunicipio` (`fk_tmunicipio`),
  ADD KEY `fk_tcomuna` (`fk_tcomuna`),
  ADD KEY `fk_estado` (`fk_estado`),
  ADD KEY `fk_gestid` (`fk_gestid`),
  ADD KEY `fk_userid` (`fk_userid`);

--
-- Índices para tabela `tprovincia`
--
ALTER TABLE `tprovincia`
  ADD PRIMARY KEY (`idtprovincia`);

--
-- Índices para tabela `ttipodecliente`
--
ALTER TABLE `ttipodecliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ttipodeusuario`
--
ALTER TABLE `ttipodeusuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ttipooutdoors`
--
ALTER TABLE `ttipooutdoors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tTipoCliente` (`fk_tTipoCliente`),
  ADD KEY `fk_tNacionalidade` (`fk_tNacionalidade`),
  ADD KEY `fk_tTipoDeUsuario` (`fk_tTipoDeUsuario`),
  ADD KEY `fk_tEstadoConta` (`fk_tEstadoConta`),
  ADD KEY `fk_com` (`fk_com`),
  ADD KEY `fk_mun` (`fk_mun`),
  ADD KEY `fk_prov` (`fk_prov`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tcomuna`
--
ALTER TABLE `tcomuna`
  MODIFY `idtcomuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `testadocliente`
--
ALTER TABLE `testadocliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `testadosoutdoors`
--
ALTER TABLE `testadosoutdoors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tmunicipio`
--
ALTER TABLE `tmunicipio`
  MODIFY `idtmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `tnacionalidade`
--
ALTER TABLE `tnacionalidade`
  MODIFY `idtnacionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de tabela `toutdoor`
--
ALTER TABLE `toutdoor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tprovincia`
--
ALTER TABLE `tprovincia`
  MODIFY `idtprovincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `ttipodecliente`
--
ALTER TABLE `ttipodecliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ttipodeusuario`
--
ALTER TABLE `ttipodeusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ttipooutdoors`
--
ALTER TABLE `ttipooutdoors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tcomuna`
--
ALTER TABLE `tcomuna`
  ADD CONSTRAINT `tcomuna_ibfk_1` FOREIGN KEY (`fk_idtmunicipio`) REFERENCES `tmunicipio` (`idtmunicipio`);

--
-- Limitadores para a tabela `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD CONSTRAINT `tmunicipio_ibfk_1` FOREIGN KEY (`fk_idprovincia`) REFERENCES `tprovincia` (`idtprovincia`);

--
-- Limitadores para a tabela `toutdoor`
--
ALTER TABLE `toutdoor`
  ADD CONSTRAINT `toutdoor_ibfk_1` FOREIGN KEY (`fk_tipo`) REFERENCES `ttipooutdoors` (`id`),
  ADD CONSTRAINT `toutdoor_ibfk_2` FOREIGN KEY (`fk_tprovincia`) REFERENCES `tprovincia` (`idtprovincia`),
  ADD CONSTRAINT `toutdoor_ibfk_3` FOREIGN KEY (`fk_tmunicipio`) REFERENCES `tmunicipio` (`idtmunicipio`),
  ADD CONSTRAINT `toutdoor_ibfk_4` FOREIGN KEY (`fk_tcomuna`) REFERENCES `tcomuna` (`idtcomuna`),
  ADD CONSTRAINT `toutdoor_ibfk_5` FOREIGN KEY (`fk_estado`) REFERENCES `testadosoutdoors` (`id`),
  ADD CONSTRAINT `toutdoor_ibfk_6` FOREIGN KEY (`fk_gestid`) REFERENCES `tuser` (`id`),
  ADD CONSTRAINT `toutdoor_ibfk_7` FOREIGN KEY (`fk_userid`) REFERENCES `tuser` (`id`);

--
-- Limitadores para a tabela `tuser`
--
ALTER TABLE `tuser`
  ADD CONSTRAINT `tuser_ibfk_1` FOREIGN KEY (`fk_tTipoCliente`) REFERENCES `ttipodecliente` (`id`),
  ADD CONSTRAINT `tuser_ibfk_2` FOREIGN KEY (`fk_tNacionalidade`) REFERENCES `tnacionalidade` (`idtnacionalidade`),
  ADD CONSTRAINT `tuser_ibfk_3` FOREIGN KEY (`fk_tTipoDeUsuario`) REFERENCES `ttipodeusuario` (`id`),
  ADD CONSTRAINT `tuser_ibfk_4` FOREIGN KEY (`fk_tEstadoConta`) REFERENCES `testadocliente` (`id`),
  ADD CONSTRAINT `tuser_ibfk_5` FOREIGN KEY (`fk_com`) REFERENCES `tcomuna` (`idtcomuna`),
  ADD CONSTRAINT `tuser_ibfk_6` FOREIGN KEY (`fk_mun`) REFERENCES `tmunicipio` (`idtmunicipio`),
  ADD CONSTRAINT `tuser_ibfk_7` FOREIGN KEY (`fk_prov`) REFERENCES `tprovincia` (`idtprovincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
