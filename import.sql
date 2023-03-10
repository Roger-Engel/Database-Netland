-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 mrt 2023 om 11:22
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netland`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` enum('movie','series') DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `length_in_minutes` int(11) DEFAULT NULL,
  `released_at` date DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `youtube_trailer_id` varchar(20) DEFAULT NULL,
  `has_won_awards` int(11) DEFAULT NULL,
  `seasons` int(11) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `spoken_in_language` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `media`
--

INSERT INTO `media` (`id`, `title`, `type`, `rating`, `length_in_minutes`, `released_at`, `summary`, `youtube_trailer_id`, `has_won_awards`, `seasons`, `country`, `spoken_in_language`) VALUES
(1, 'John wick', 'movie', NULL, 110, '2014-11-20', 'John Wick is een legende in het misdaadcircuit als voormalige huurmoordenaar voor de Russische maffia. Hij trok zich terug uit deze wereld om te trouwen met zijn geliefde Helen. Wanneer zij vijf jaar later overlijdt aan kanker, krijgt hij in haar opdracht een puppy met de naam Daisy thuisbezorgd. Bij het cadeau zit een brief van Helen waarin ze hem vertelt dat ze hem het hondje geeft omdat ze wil dat hij iets heeft om van te houden. Wick weet niet meteen wat hij met Daisy aan moet, maar het beestje is zo speels, af- en aanhankelijk dat hij van haar gaat houden.', '2AUmvWm5ZDQ', NULL, NULL, NULL, NULL),
(2, 'Frozen', 'movie', NULL, 102, '0000-00-00', 'Er zijn twee prinsessen in het koninkrijk Arendelle: Elsa (Idina Menzel), de troonopvolgster, en haar jongere zus Anna (Kristen Bell). Elsa heeft magische krachten, waarmee ze sneeuw en ijs kan creëren. Als kleine meisjes spelen ze samen met Elsa haar krachten. Het spel loopt uit de hand, wanneer Elsa per ongeluk Annas hoofd raakt. Anna raakt hierdoor bewusteloos. Elsa roept haar ouders en die weten hoe ze het leven van Anna kunnen redden. Ze brengen een bezoek aan de trollen die Anna kunnen helpen. Ze wissen haar geheugen gedeeltelijk waardoor ze niet meer weet dat Elsa magische krachten heeft. De trol vraagt de koning en koningin om de krachten van Elsa te verbergen voor de buitenwereld en ook voor haar zusje. Hierdoor leven ze voortaan allebei een apart bestaan in hetzelfde gesloten kasteel.', '2AUmvWm5ZDQ', NULL, NULL, NULL, NULL),
(4, 'Moana', 'movie', NULL, 103, '2016-11-30', 'De tiener Vaiana, dochter van een opperhoofd gaat op zoek naar de halfgod Maui. Samen met Maui vertrekt ze op een avontuurlijke reis over de oceaan op zoek naar het legendarisch eiland Te Fiti om haar volk van de ondergang te redden.', 'FpNcGOB_qVQ', NULL, NULL, NULL, NULL),
(5, 'Sint', 'movie', NULL, 85, '2010-11-11', 'In de 15e eeuw leefde St. Niklas, een in ongenade gevallen bisschop die met een bende rovers plunderend en moordend door de straten trok. Wanneer hij eraan kwam, riepen de dorpsmensen hun families naar binnen en barricadeerden ze hun huizen. De knechten van Niklas trapten de gesloten deuren niettemin in en klommen ook via de schoorstenen naar binnen. Nadat Niklas op 5 december 1492 weer nietsontziend had toegeslagen, sloegen de dorpelingen terug. Zodra Niklas en zijn trawanten zich in hun boot bevonden, stak de woedende menigte die in brand. De bisschop en zijn handlangers kwamen om in de vlammen.', 'Xv3G70mm18k', NULL, NULL, NULL, NULL),
(6, 'The good place', 'series', '4.5', NULL, NULL, 'De serie gaat over een vrouw, Eleanor Shellstrop, die zich in het hiernamaals bevindt. Ze wordt verwelkomd door Michael, de architect van het utopische dorpje waar ze voor eeuwig gaat wonen. Er zijn twee delen in het hiernamaals, The Good Place goede plek en The Bad Place slechte plek welke wordt bepaald door ethische punten voor elke handeling op aarde.', NULL, 0, 4, 'UK', 'EN'),
(7, 'Game of Thrones', 'series', '5.0', 111, '2019-02-14', 'Op het continent Westeros regeert koning Robert Baratheon al meer dan zeventien jaar lang over de Zeven Koninkrijken, na zijn opstand tegen koning Aerys II Targaryen \"De Krankzinnige\". Als zijn adviseur Jon Arryn wordt vermoord, vraagt hij zijn oude vriend Eddard Stark, de Heer van Winterfell en Landvoogd van het Noorden, om zijn plaats in te nemen. Eddard gaat met tegenzin akkoord, en trekt met zijn twee dochters, Sansa en Arya (Maisie Williams), naar de hoofdstad in het zuiden. Vlak voor hun vertrek wordt een van zijn jongste zonen, Bran Stark, uit een van de torens van Winterfell geduwd, na getuige te zijn geweest van de incestueuze affaire tussen koningin Cersei en haar tweelingbroer, Jaime Lannister.', '123456', 1, 7, 'UK', 'EN'),
(8, 'The breaking bad', 'series', '2.0', NULL, NULL, 'Walter White is in 2008 een overgekwalificeerde scheikundeleraar op een middelbare school in Albuquerque. Op het moment dat zijn vrouw onverwacht zwanger is van hun tweede kind, stort Walters wereld in. De dokter heeft vastgesteld dat hij terminaal ziek is. Walter heeft longkanker en lijkt niet lang meer te zullen leven. Om ervoor te zorgen dat zijn gezin na zijn dood niet in een financiële crisis belandt en tevens om zijn eigen behandelingen te betalen, besluit Walter over te schakelen op een leven als misdadiger. Met de hulp van Jesse Pinkman, een uitgevallen leerling die hij nog scheikunde gegeven heeft, maakt en verkoopt hij de drug crystal meth. Terwijl hij doorgaat met lesgeven, komt het belang van scheikunde in de moderne maatschappij prangend in zijn lessen naar voren. Zijn product is meer dan 99% zuiver en dit feit loopt als een rode draad door de hele serie heen.', NULL, 1, 3, 'UK', 'EN'),
(9, 'Penoza', 'series', '3.2', NULL, NULL, 'Hoofdrolspeelster Carmen van Walraven (Monic Hendrickx) ontdekt dat haar man Frans (Thomas Acda) een veel belangrijker rol in de onderwereld speelt dan ze dacht. Ze dwingt hem dan ook ermee te stoppen. Net wanneer alles weer goed lijkt te gaan, wordt haar man voor de ogen van hun jongste zoon Boris (Stijn Taverne) geliquideerd. Carmen krijgt last van schuldeisers en bedreigingen. Ook justitie zit achter haar aan omdat die wil dat zij gaat getuigen tegen de compagnons van haar man.Carmen wil niet als beschermd getuige door het leven gaan en kiest voor een moeilijk alternatief: ze werkt zich naar de top van de georganiseerde misdaad, waar niemand nog aan haar of haar gezin durft te komen. In het vervolg daarop weet ze al snel niet meer wie ze moet vertrouwen, en worden de grenzen tussen goed en kwaad steeds onduidelijker.', NULL, 0, 3, 'NL', 'NL'),
(10, 'My little pony', 'series', '1.0', NULL, NULL, 'De serie begint met een eenhoorn genaamd Twilight Sparkle, een student van Equestrias heerser, prinses Celestia. Nadat ze ziet hoe haar student zich alleen maar bezighoudt met boeken, stuurt prinses Celestia haar naar Ponyville met de opdracht een paar vrienden te maken. Twilight Sparkle, samen met haar assistent, een babydraak genaamd Spike, raakt bevriend met de ponys Pinkie Pie, Applejack, Rainbow Dash, Rarity en Fluttershy. Samen beleven ze avonturen binnen en buiten de stad en lossen ze diverse problemen op. De meeste afleveringen eindigen met Twilight Sparkle of iemand anders die een brief schrijft aan de prinses over wat ze die aflevering geleerd heeft over de magie van de vriendschap. Ook zit er in iedere aflevering een belangrijke les over vriendschap.', NULL, 0, 25, 'UK', 'NL');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
