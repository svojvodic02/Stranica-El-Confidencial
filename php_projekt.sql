-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 05:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_projekt`
--
CREATE DATABASE IF NOT EXISTS `php_projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'sara', 's', 'sa', '$2y$10$yA7c/jaxNzS2b/ZGuzIldOVloVa.gLygH2lr/d8lBspBaMhs7rZb2', 1),
(2, 'sa', 's', 's', '$2y$10$hZgGpSPHsWv.Dc5gMZtH7OINuRGef/PnoR6RaVjIF.xlOvW9pMV1a', 0),
(3, 'd', 'd', 'd', '$2y$10$5HAPiX7MIxfeJX9sFdLgCOtZz1Dbt1CI/Ef9RQNXN5w2/PLgBrX92', 0),
(4, '1', '1', '1', '$2y$10$S2E/P5K1KtOW78CjOTd.o.jbKgJu3Tywcw/4REMS6TNVuaSPJsIMG', 0),
(5, '2', '2', '2', '$2y$10$JjwbYhjWE55V9ucj0BM7jeJvh/RkXId800lb35FoE4Ba/PjOW9S86', 0),
(9, 'sara', 'vojvodic', 'svojvodic', '$2y$10$veBfhRHYIRtwYpGgDs9DJesRz.Q7S7ZP6hzP9mAwekmQaq00Uyfoi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(40, '2024-06-13', 'UEFA: Ovo je sastav Hrvatske za Španjolsku', 'UEFA je na službenim stranicama krenula s objavom potencijalnih sastava za utakmice prvoga kruga Europskog prvenstva.', 'UEFA je na službenim stranicama krenula s objavom potencijalnih sastava za utakmice prvoga kruga Europskog prvenstva, koje počinje u petak u 21 sat utakmicom Njemačke i Škotske. Među objavljenima je i sastav Hrvatske za utakmicu prvog kola skupine protiv Španjolske, koja se igra u subotu od 18 sati u Berlinu.\r\n\r\n\"Čitajući između redaka, Dalić će protiv Španjolske startati s istom postavom kojom je počeo u prijateljskoj utakmici s Portugalom. Perišić još uvijek nije na 100% nakon oporavka od ozljede koljena, zato očekujemo Andreja Kramarića na lijevom krilu te na desnom Lovru Majera, koji je u dobroj formi. Za prvu utakmicu trebali bismo vidjeti Marina Pongračića pored Josipa Šutala u sredini obrane te Antu Budimira kao napadača\", piše na službenim stranicama UEFA-e.\r\nSastav Hrvatske prema predviđanju UEFA-e:\r\n\r\nLivaković; Stanišić, Šutalo, Pongračić, Gvardiol - Modrić, Brozović, Kovačić - Majer, Budimir, Kramarić.', 'gvardiol.jpg', 'sport', 0),
(41, '2024-06-13', 'Nadal neće igrati na Wimbledonu, želi se pripremiti za Olimpijsk', 'RAFAEL NADAL potvrdio je da neće nastupiti na trećem ovogodišnjem Grand Slam turniru.', 'LEGENDARNI španjolski tenisač Rafael Nadal (38) odlučio je propustiti nastup na ovogodišnjem izdanju najvećeg svjetskog turnira Wimbledona kako bi se što bolje pripremio za Olimpijske igre, koje krajem srpnja počinju u Parizu. Nadal je slavio u Wimbledonu 2008. i 2010. godine, no čak 14 od svoja 22 Grand Slam naslova osvojio je u Roland Garrosu na zemljanoj podlozi.\r\n\r\nOvogodišnji olimpijski turnir igrat će se upravo na zemlji. Nadal bi na Igrama trebao igrati u konkurenciji muških parova, i to u kombinaciji s ovogodišnjim pobjednikom Roland Garrosa Carlosom Alcarazom.\r\n\r\n\"Žao mi je što neću igrati u Wimbledonu\"\r\n\"Čitavo ovo vrijeme trenirao sam na zemlji, a nakon što sam jučer saznao kako ću nastupiti na Olimpijskim igrama u Parizu smatram da je najbolje za moje tijelo ne mijenjati podlogu sve do tada. Žao mi je što to znači da neću igrati u Wimbledonu zbog sjajne atmosfere na tom velikom turniru koji će uvijek biti u mom srcu\", objavio je Nadal.\r\n\r\nWimbledon će se ove godine igrati od 1. do 14. srpnja, dok će Olimpijske igre biti od 26. srpnja do 11. kolovoza.', 'tenis.jpg', 'sport', 0),
(42, '2024-06-13', 'Sport', 'HAJDUKOV sportski direktor ozbiljno radi na dovođenju legendarnog centarfora.', 'HAJDUKOV sportski direktor Nikola Kalinić pokušava dovesti Edina Džeku (38) u Hajduk. Informacija je potvrđena Indexu, doznajemo od izvora bliskih klubu. Kalinić je kontaktirao centarfora BiH i pokušava ga nagovoriti na dolazak u splitski klub. Nije poznato u kojoj je fazi operacija, no Kalinić je ozbiljan u namjeri da dovede napadača Fenerbahčea.\r\n\r\nDžeko ima još godinu dana ugovora u Turskoj\r\nDžeko je od prošloga ljeta igrač turskog velikana, s kojim ima ugovor do konca lipnja 2025. godine. Minule je sezone u 46 nastupa zabio 25 golova te deset puta asistirao kroz 3288 minuta igre. Džeko je jedan od najboljih europskih napadača posljednjih 15-ak godina. Igrao je za Željezničar, Teplice, Usti nad Labem, Wolfsburg, Manchester City, Romu i Inter.\r\n\r\nTEKST SE NASTAVLJA ISPOD \r\nS Kalinićem je igrao u Romi\r\nZa Romu je igrao od 2015. do 2021. godine, a ondje je igrao s Kalinićem. Bivši hrvatski reprezentativac bio je član rimskog kluba u sezoni 2019./2020., kada je igrao na posudbi iz Atletico Madrida. Kalinić je za Romu u 19 nastupa upisao pet golova i dvije asistencije. Poznata je i Džekina naklonost prema Hajduku. Naime, njegov najbolji prijatelj je Senijad Ibričić, veliki miljenik Torcide. Džeko također ima poveznicu s Hrvatskom tako što je u Dubrovniku vlasnik restorana, a Ibričić je prije dvije godine ovako govorio:\r\n\r\nIbričić prije dvije godine: Sve je moguće...\r\n\"Pa nas se povezuje zbog prijateljstva. Osim toga, Edin je često u Dalmaciji, pa ga navijači često sretnu i zovu. Ja, iskreno, i kao navijač, ali i njegov prijatelj, volio bih da zaigra za naš Hajduk. Ali opet, u ovom trenutku to nije realno. No, tko zna što se može dogoditi u skorije vrijeme.\"', 'buenos.jpg', 'sport', 0),
(43, '2024-06-13', 'Najmoćniji ljudi svijeta na važnom sastanku o Ukrajini. Donesene', 'ČELNICI skupine G7 počeli su danas godišnji samit u Italiji, mnogi opterećeni problemima u svojim zemljama, ali i odlučni ostaviti traga na svjetskoj pozornici, u prvom redu pružanjem pomoći Ukrajini te suprotstavljanjem kineskim gospodarskim ambicijama.', 'ČELNICI skupine G7 počeli su danas godišnji samit u Italiji, mnogi opterećeni problemima u svojim zemljama, ali i odlučni ostaviti traga na svjetskoj pozornici, u prvom redu pružanjem pomoći Ukrajini te suprotstavljanjem kineskim gospodarskim ambicijama.,\r\n\r\nPostignut načelni dogovor o zajmu Ukrajini od 50 milijardi dolara\r\nNa početku dvodnevnih razgovora diplomati su rekli da je postignut načelni dogovor o planovima da se Ukrajini odobri zajam od 50 milijardi dolara za koji bi jamstvo bile kamate od zamrznute ruske imovine.\r\n\r\nUz to, zapadne zemlje dijele zabrinutost zbog prevelikih kineskih industrijskih kapaciteta koji iskrivljuju globalna tržišta te odlučnost da pomognu afričkim zemljama u razvoju, rekli su diplomati. \r\n\r\n\"Čeka nas puno posla, ali...\"\r\n\"Očekuje nas puno posla, ali sigurna sam da će razgovori u ova dva dana dovesti do konkretnih i mjerljivih rezultata\", rekla je talijanska premijerka Giogia Meloni na početku sastanka u luksuznom resortu Borgo Egnazia u Apuliji na jugu Italije.\r\n\r\nDok je Meloni ponesena trijumfom na nedavnim izborima za Europski parlament, čelnici drugih šest zemalja - SAD-a, Kanade, Ujedinjenog Kraljevstva, Francuske, Njemačke i Japana - suočeni su kod kuće s velikim problemima koji bi im mogli potkopati autoritet.\r\n\r\nBidena očekuju neizvjesni izbori. Sunak u problemima, Macron raspustio parlament...\r\nAmeričkog predsjednika Joea Biden očekuju u studenom neizvjesni predsjednički izbori, britanski premijer Rishi Sunak mogao bi izgubiti vlast na parlamentarnim izborima idući mjesec, a francuski predsjednik Emmanuel Macron raspustio je u nedjelju parlament nakon što je njegova stranka potučena na europskim izborima. \r\nSkup G7 će kasnije biti otvoren cijelom nizu svjetskih čelnika uključujući papu Franju, koji će u petak govoriti o rizicima i potencijalima umjetne inteligencije.\r\n\r\nStigao i Zelenski\r\nNa samitu će drugu godinu zaredom sudjelovati i ukrajinski predsjednik Volodimir Zelenski, koji će sudjelovati na razgovorima danas poslijepodne, nakon čega će potpisati novi dugoročni sporazum o sigurnosti s američkim predsjednikom Joeom Bidenom. \r\n\r\nČelnici G7 će gotovo sigurno objaviti da su postigli okvirni dogovor o višegodišnjem zajmu Ukrajini koristeći se profitom od zaplijenjene ruske imovine koji će zatim finalizirati pravni stručnjaci, a novac bi trebao biti prikupljen do kraja godine.\r\n\r\nPomoć Ukrajini neovisno o Trumpu\r\nIzvor blizak pregovorima rekao je da je smisao dogovora osigurati da se Ukrajini nastavi pomagati godinama neovisno o tome tko bude na vlasti u svakoj članici G7, što je znak zabrinutosti da bi američki republikanski predsjednički kandidat Donald Trump mogao biti mnogo manje naklonjen Kijevu ako bi pobijedio Bidena u studenome.\r\n\r\nNa skup su pozvani i čelnici Indije, Brazila, Argentine, Turske, Alžira i Kenije. ', 'ukrajina.jpg', 'politika', 0),
(45, '2024-06-07', 'Novo', 'Novo', 'Novo', 'kalinic.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
