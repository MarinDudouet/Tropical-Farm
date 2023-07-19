-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 juil. 2023 à 17:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tropicalfarm`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(1, 'marin.dudouet@gmail.com', '1234', 'lézards.png', '#245033', 'Marin Dudouet', '15 rue Isambard', '16', 'Franconville-la-garenne', 'France', '95130', '0627726871', 'master', '0102323157849275', '09', '2026', '987'),
(6, 'heloise.maiche@gmail.com', '1234', 'amphibiens.png', '#245033', 'Héloise Maiche', '27 rue Eugène Derrien', '20', 'Vitry sur Seine', 'France', '94400', '0782786454', 'visa', '3234565478980102', '04', '2024', '350');

-- --------------------------------------------------------

--
-- Structure de la table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `id_auction` int NOT NULL AUTO_INCREMENT,
  `id_seller` varchar(50) DEFAULT NULL,
  `id_buyer` varchar(50) DEFAULT NULL,
  `id_admin` varchar(50) DEFAULT NULL,
  `id_item` varchar(50) DEFAULT NULL,
  `price` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`id_auction`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auction`
--

INSERT INTO `auction` (`id_auction`, `id_seller`, `id_buyer`, `id_admin`, `id_item`, `price`, `state`) VALUES
(179, NULL, NULL, '1', '14', '150', 'firstbid'),
(102, 'test', NULL, NULL, NULL, '', 'autte');

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `idbasket` int NOT NULL AUTO_INCREMENT,
  `id_seller` int DEFAULT NULL,
  `id_buyer` int DEFAULT NULL,
  `id_admin` int DEFAULT NULL,
  `id_item` int NOT NULL,
  `id_session` int DEFAULT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`idbasket`),
  KEY `fk_nouvelle_table_seller` (`id_seller`),
  KEY `fk_nouvelle_table_buyer` (`id_buyer`),
  KEY `fk_nouvelle_table_admin` (`id_admin`),
  KEY `fk_nouvelle_table_item` (`id_item`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`idbasket`, `id_seller`, `id_buyer`, `id_admin`, `id_item`, `id_session`, `quantity`) VALUES
(1, 0, 0, 0, 10, NULL, 0),
(2, 0, 0, 0, 10, NULL, 0),
(3, 0, 0, 0, 9, NULL, 0),
(4, 0, 0, 0, 9, NULL, 0),
(5, 0, 0, 0, 9, NULL, 0),
(6, 0, 0, 0, 9, NULL, 0),
(7, 0, 0, 0, 9, NULL, 0),
(8, 0, 0, 0, 9, NULL, 0),
(9, 0, 0, 0, 9, NULL, 0),
(10, 0, 0, 0, 9, NULL, 0),
(11, 0, 0, 0, 9, NULL, 0),
(12, 0, 0, 0, 9, NULL, 0),
(13, 0, 0, 0, 9, NULL, 0),
(14, 0, 0, 0, 9, NULL, 0),
(15, 0, 0, 0, 13, NULL, 0),
(16, 0, 0, 0, 13, NULL, 0),
(17, 0, 0, 0, 9, NULL, 0),
(18, 0, 0, 0, 9, NULL, 0),
(19, 0, 0, 0, 13, NULL, 0),
(20, 0, 0, 0, 25, NULL, 0),
(21, 0, 0, 0, 47, NULL, 0),
(22, 0, 0, 0, 51, NULL, 0),
(23, 0, 0, 0, 56, NULL, 0),
(24, 0, 0, 0, 17, NULL, 0),
(49, 9, NULL, NULL, 14, NULL, 1),
(48, 9, NULL, NULL, 21, NULL, 1),
(47, 9, NULL, NULL, 48, NULL, 1),
(46, 9, NULL, NULL, 14, NULL, 1),
(33, 1, NULL, NULL, 16, NULL, 0),
(34, 1, NULL, NULL, 26, NULL, 0),
(35, 1, NULL, NULL, 19, NULL, 0),
(45, 9, NULL, NULL, 17, NULL, 1),
(44, NULL, NULL, 1, 16, NULL, 1),
(38, 1, NULL, NULL, 25, NULL, 0),
(43, 8, NULL, NULL, 16, NULL, 1),
(42, NULL, NULL, 1, 16, NULL, 1),
(41, NULL, NULL, 1, 53, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `idbuyer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  PRIMARY KEY (`idbuyer`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `buyer`
--

INSERT INTO `buyer` (`idbuyer`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(10, 'user2@gmail.com', '1234', 'snake.png', 'black', 'Tiffany Jodene', '176 Victoria Road', '4', 'London', 'England', 'NW39 1WB', '', 'master', '9867453602468161', '08', '2025', '125'),
(9, 'user1@gmail.com', '1234', 'mouse.png', 'darkslategray', 'John Adam', '88 Kingsway', '34', 'London', 'England', 'EC84 6YQ', '', 'visa', '2345947637593932', '04', '2026', '350');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `second_category` varchar(50) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `stock` varchar(50) NOT NULL,
  `sell` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `auction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `trade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `name`, `category`, `second_category`, `description`, `photo`, `price`, `stock`, `sell`, `auction`, `trade`) VALUES
(21, 'Anolis carolinensis', 'reptiles', 'lizards', 'The Green Anolis (Anolis carolinensis) is a small Iguanid native to the subtropics of the south-eastern United States. Its appearance is typical of lizards of this genus, with a slender body and triangular head. Its colours range from bright green to grey-brown, varying greatly and rapidly according to parameters such as its internal temperature or its state of stress.  This is a good candidate to start breeding diurnal lizards. It is a very active and curious species, and observing its many behaviours is very interesting. Groups should contain just one male, as they are very territorial. They can be kept in a tropical tree terrarium, with temperatures of 32-35°C at the hot end and 24°C at the cold end. The recommended humidity level is around 70%, with morning sprays to reproduce the dew. It will feed easily on live insects of various species.', 'produit7.jpg', 15, '14', 'sell', 'auction', 'trade'),
(14, 'Ahaetulla nasuta', 'reptiles', 'snakes', 'This 100 cm long liana snake relies on its perfect camouflage to catch the small lizards and amphibians that make up its diet.', 'produit1.jpg', 49, '3', 'sell', 'auction', NULL),
(16, 'Boa c. constrictor, Guyana', 'reptiles', 'snakes', 'The \"Guyana\" form is one of the most beautiful forms of boa, with an impressive red colour on its tail.  This boa constrictor reaches an average adult size of 215 cm, but can reach 300 cm. Rarer, it is also more sensitive to breeding than Boa c. imperator. Specimens of this species are generally quite defensive.  When feeding, it is advisable not to offer it too large a prey.  The boa constrictor originates from the tropical forests of South and Central America. It needs a warm, humid environment. Whether terrestrial or semi-terrestrial, the terrarium should be high enough for the boa to climb. You need to think carefully about the size of the final installation that an adult will need.', 'produit2.jpg', 395, '1', 'sell', NULL, NULL),
(17, 'Boaedon (Lamprophis) fuliginosus, albinos', 'reptiles', 'snakes', 'Boaedon fuliginosus, also known as Lamprophis fuliginosus, is a small snake (between 50 and 100 cm) in the Lamprophidae family. It occupies a large part of western and central Africa. Females are larger than males.  Abundant in the wild, it is found in rural areas and dry savannahs. It is particularly common around dwellings, which is why it is commonly known as the \"African house snake\". Its colour can vary from orange-brown to black, depending on its geographical origin.  Semi-furrowing, it likes to take refuge in burrows or hide in damp substrate. However, it is not uncommon to see it climbing when it has the chance.  In captivity, this is a prolific species (up to four clutches of eggs a year!) that is easy to breed. Reproduction must be limited so as not to exhaust the female. It is therefore advisable not to keep pairs together all year round.', 'produit3.jpg', 99, '6', NULL, 'auction', NULL),
(18, 'Boaedon (Lamprophis) fuliginosus, Black', 'reptiles', 'snakes', 'Boaedon fuliginosus, also known as Lamprophis fuliginosus, is a small snake (between 50 and 100 cm) in the Lamprophidae family. It occupies a large part of western and central Africa. Females are larger than males.  Abundant in the wild, it is found in rural areas and dry savannahs. It is particularly common around dwellings, which is why it is commonly known as the \"African house snake\". Its colour can vary from orange-brown to black, depending on its geographical origin.  Semi-furrowing, it likes to take refuge in burrows or hide in damp substrate. However, it is not uncommon to see it climbing when it has the chance.  In captivity, this is a prolific species (up to four clutches of eggs a year!) that is easy to breed. Reproduction must be limited so as not to exhaust the female. It is therefore advisable not to keep pairs together all year round.', 'produit4.jpg', 89, '4', 'sell', 'auction', NULL),
(19, 'Corallus batesii', 'reptiles', 'snakes', 'The Amazonian emerald boa is slightly larger than its cousin the canine boa (Corallus caninus), up to 270cm for the largest females. Now classified as a species, this snake is not subject to the ban in French Guiana and can therefore be bred without a certificate of competence, up to a limit of 10 specimens.', 'produit5.jpg', 4900, '1', 'sell', 'auction', NULL),
(20, 'Elaphe (Orthriophis) taeniura taeniura, albinos T+', 'reptiles', 'snakes', 'This Asian snake, which originated in eastern China, is a species that is rarely farmed. Still widely consumed for human consumption, it has virtually ceased to be exported in recent years. It is a small subspecies, but can grow to over 160 cm!  This particular form of albino is T+.', 'produit6.jpg', 245, '5', 'sell', 'auction', NULL),
(22, 'Bronchocela cristatella', 'reptiles', 'lizards', 'The Green Anolis (Anolis carolinensis) is a small Iguanid native to the subtropics of the south-eastern United States. Its appearance is typical of lizards of this genus, with a slender body and triangular head. Its colours range from bright green to grey-brown, varying greatly and rapidly according to parameters such as its internal temperature or its state of stress.  This is a good candidate to start breeding diurnal lizards. It is a very active and curious species, and observing its many behaviours is very interesting. Groups should contain just one male, as they are very territorial. They can be kept in a tropical tree terrarium, with temperatures of 32-35°C at the hot end and 24°C at the cold end. The recommended humidity level is around 70%, with morning sprays to reproduce the dew. It will feed easily on live insects of various species.', 'produit8.jpg', 59, '3', 'sell', 'auction', 'trade'),
(23, 'Calumma parsonii', 'reptiles', 'lizards', 'This extremely rare chameleon is a giant of its kind. Indolent, maintenance poses no particular difficulties. However, a certain amount of experience is essential to successfully breed this species. Reproduction, on the other hand, poses far more problems.', 'produit9.jpg', 1850, '1', 'sell', 'auction', 'trade'),
(24, 'Broadleysaurus (Gerrhosaurus) major', 'reptiles', 'lizards', 'Broadleysaurus (formerly Gerrhosaurus) major is a large lizard, around forty centimetres long, found throughout much of sub-Saharan Africa. It lives in semi-arid savannahs and rocky areas. It is tolerant of urbanisation and is often found in seaside residences. Its flat body and the \"plates\" that cover it allow it to take refuge in burrows or abandoned termite mounds during the hottest hours of the day. Sexing is easy, as males have femoral pores.  This is a docile species that is easy to keep in captivity. Because of its large size, it will need a terrarium of at least 120 cm. ', 'produit10.jpg', 75, '4', 'sell', 'auction', 'trade'),
(25, 'Geochelone elegans, 10-11 cm', 'reptiles', 'turtles', 'The Indian star tortoise (Geochelone elegans) has a magnificent shell that makes it very popular with tortoise lovers. This star pattern is actually a camouflage that makes it virtually invisible in the dry grasses of the savannah biotopes it occupies. While females generally reach a size of 25 cm (38 cm maximum), males are smaller and less broad. This turtle is active mainly in the early morning and late afternoon, and hides under vegetation for the rest of the time. During the rainy season, however, it can often be seen foraging all day long. Its diet consists mainly of grasses, flowers and fruit in very limited quantities.', 'produit11.jpg', 595, '6', 'sell', 'auction', 'trade'),
(26, 'Kinosternon baurii', 'reptiles', 'turtles', 'Kinosternon baurii is a small aquatic turtle (7 to 12 cm) found in stagnant or slow-moving waters on the Atlantic coast of the United States, from Florida to Virginia. Their plastrons are hinged in two places, like those of box turtles. While juveniles have a carapace decorated with 3 yellow lines, that of adults is generally plainer, although there are variations depending on the specimen\'s geographical origin. They are omnivorous turtles, although they show a clear preference for meaty foods. Fish, snails, worms, insects, algae and other aquatic plants make up their diet.  This is an aquatic turtle that is relatively easy to keep in captivity if its basic parameters are respected. One individual can be placed in an 80 cm aquarium, with a beach overhung by a hot spot at 30-32°.', 'produit12.jpg', 145, '8', 'sell', 'auction', 'trade'),
(27, 'Kinosternon scorpioides cruentatum', 'reptiles', 'turtles', 'This subspecies lives from southern Mexico to El Salvador, Guatemala and Honduras. Like all Kinosternon, it is a small species, usually no larger than 12 cm. This species does not swim very well and the water height should not exceed 10 to 20 cm, depending on the size of the animal. Good water quality is essential for long-term maintenance. This is a mainly carnivorous species. The typically red colouration on the head of adults is more pronounced in females and appears at maturity.', 'produit13.jpg', 99, '12', 'sell', 'auction', 'trade'),
(28, 'Rhinoclemmys areolata', 'reptiles', 'turtles', 'Rhinoclemmys areolata is a species of forest tortoise belonging to the Geoemydidae family, native to the Yucatán Peninsula and adjacent regions of Central America.', 'produit14.jpg', 295, '4', 'sell', 'auction', 'trade'),
(29, 'Stigmochelys (Geochelone) pardalis babcocki, 5-6 c', 'reptiles', 'turtles', 'The leopard tortoise is a large species from eastern and southern Africa. Size varies greatly depending on geographical origin. The hatchlings currently available were born in captivity in Salvador to parents from Zambia, and will usually measure between 30 and 40 cm and weigh between 5 and 15 kg. This is a savannah species with specific dietary requirements. A diet rich in fibre and largely composed of grass is essential.  Classified in column B of Annex 2 of the Order of 8 October 2018, the keeping of up to 10 specimens of this species is subject to declaration. These animals are identified by microchip or photo in accordance with legal obligations.', 'produit15.jpg', 169, '6', 'sell', 'auction', 'trade'),
(30, 'Ambystoma (tigrinum) mavortium', 'reptiles', 'amphibians', 'This is a relatively easy species to keep in captivity. As they do not tolerate heat, they should be kept at a temperature of between 15 and 22°C. Temperatures above 25°C can be tolerated for short periods if the substrate allows them to bury themselves in humidity, but can cause disease in the long term. The terrarium should be a minimum of 80 cm for a pair, with a good layer of moist substrate and hiding places. This opportunistic species readily accepts live insects and worms. Breeding will take place after a wintering period at around 5°C.', 'produit16.jpg', 89, '13', 'sell', 'auction', 'trade'),
(31, 'Ceratophrys cranwelli, albinos', 'reptiles', 'amphibians', 'Americans call it the Pacman frog because of its gluttonous appetite. Inhabiting Argentina, Paraguay and Uruguay, this amphibian is not very mobile. Regularly reproduced in captivity, it must be isolated from all other animals. Be careful not to overfeed adults.', 'produit17.jpg', 39, '12', 'sell', 'auction', 'trade'),
(32, 'Ceratophrys cranwelli, abricot', 'reptiles', 'amphibians', 'Americans call it the Pacman frog because of its gluttonous appetite. Inhabiting Argentina, Paraguay and Uruguay, this amphibian is not very mobile. Regularly reproduced in captivity, it must be isolated from all other animals. Be careful not to overfeed adults.', 'produit18.jpg', 59, '7', NULL, NULL, NULL),
(33, 'Dendrobates auratus, \"Capurgana\"', 'reptiles', 'amphibians', 'Dendrobates auratus is one of the most common frogs found in terrariums. Native to rainforests from Nicaragua to Colombia, this species varies greatly in size and colour depending on where it comes from. Exclusively terrestrial and diurnal, these frogs are constantly active during the day, always on the lookout for food. They feed on small insects that they capture with their sticky tongue, and particularly on ants, which provide them with the alkaloids they need to produce the toxins that coat their skin.  In captivity, they lose this toxicity due to the lack of a similar diet. This species is well-suited to begin breeding dendrobates, although it is rather shy. Its maintenance in captivity is similar to that of other dendrobates.', 'produit19.jpg', 69, '9', 'sell', 'auction', 'trade'),
(34, 'Epipedobates anthonyi', 'reptiles', 'amphibians', 'This Ecuadorian species measures 2 to 3 cm when fully grown.', 'produit20.jpg', 36, '4', 'sell', 'auction', 'trade'),
(35, 'Hyperolius riggenbachi', 'reptiles', 'amphibians', 'This species is found in north-west Cameroon at altitudes of between 900 and 1,800 metres. There are two very different-looking subspecies. Juveniles are green, as shown in the photo, and will change in appearance, especially females. The adult size is 27 to 30 mm for males and up to 40 mm for females.', 'produit201.jpg', 19, '14', 'sell', 'auction', 'trade'),
(36, 'Chamaeleo calyptratus, juvénile', 'reptiles', 'chameleons', '69', 'produit21.jpg', 0, '5', 'sell', 'auction', 'trade'),
(37, '   Chamaeleo calyptratus, mâle adulte Chamaeleo c', 'reptiles', 'chameleons', 'La principale caractéristique de ce grand caméléon est la présence d\'un \"casque\" sur le crâne, 2 fois plus grand chez les mâles que chez les femelles, et pouvant atteindre 8 cm. La coloration de base, verte et jaune, peut changer pour une gamme impressionnante de couleurs différentes. Contrairement aux idées reçues, ces changements n\'ont pas lieu pour se fondre dans l\'environnement, mais pour suivre des facteurs internes (état émotionnel, état de santé) ou externes (par exemple, une couleur plus sombre lui permet de mieux absorber la chaleur du soleil). Il peut la propulser sa langue pour attraper ses proies grâce à son extrémité collante.  En captivité, son maintien est aisé tant que l\'on respecte scrupuleusement les bons paramètres environnementaux. Attention, les mâles sont très territoriaux et ne peuvent être maintenus à plusieurs. Les animaux peuvent être sexés jeunes : les mâles disposent d\'ergots sur les pattes arrières que les femelles n\'ont pas.', 'produit22.jpg', 155, '3', 'sell', 'auction', 'trade'),
(38, 'Furcifer pardalis, Ambilobe, juvénile', 'reptiles', 'chameleons', 'The panther chameleon has been regularly available for some years now, bred over several generations. More difficult to reproduce than the helmeted chameleons, it is nevertheless easy to breed.  It is one of the very few species suitable for beginners. It occupies the coastal areas of Madagascar, and has been introduced to Mauritius and Réunion, where it is locally protected.  It is a large species, with males reaching 50 cm, while females are significantly smaller. There are many variations in colouring depending on the geographical origin of the specimens.', 'produit23.jpg', 145, '6', 'sell', 'auction', 'trade'),
(39, 'Collemboles', 'food', 'living_food', 'Collembola are very small arthropods, averaging 2 to 3 mm in size. They live in soil humus and help to break down decomposing living matter. Their small size and high nutritional value make them the ideal food for breeding dendrobates.  Tin of approx. 65 g.', 'produit24.jpg', 4, '20', 'sell', NULL, NULL),
(40, 'Blattes Red Runners', 'food', 'living_food', 'This cockroach is undoubtedly one of the favourite insects of all reptiles. It has excellent nutritional qualities and can therefore be distributed as a food base without contraindication.  - A very quick cockroach, around 2 cm long, nutritious, balanced and easy to store.  - Box of 30 to 40 adult cockroaches.  Once you\'ve received your insects, place them in a larger container (e.g. Cricket Pen) and feed them with a suitable powdered food, gelled water and vegetables. We recommend that you wait 48 hours before feeding them to your pets.', 'produit25.jpg', 5, '15', 'sell', NULL, NULL),
(41, 'Criquets migrateurs', 'food', 'living_food', 'Around 10 pieces per box for adults (5/6cm) and medium-sized (3/4cm), and around 20 pieces for small ones (2cm).  Locusta migratoria has a high calcium content, making it a favourite food for lizards, tarantulas, certain amphibians and turtles. We offer a range of sizes to ensure the correct insect/animal ratio.  Once you\'ve received your insects, place them in a larger container (e.g. Cricket Pen) and feed them with a suitable powdered food, gelled water and vegetables. We recommend that you wait 48 hours before feeding them to your pets.', 'produit26.jpg', 5, '17', 'sell', NULL, NULL),
(42, 'Drosophiles', 'food', 'living_food', 'Drosophila are also known as vinegar flies and fruit flies. They are used to feed small amphibians or lizard hatchlings. Sold in a box with a nutrient medium that allows several generations of insects to reproduce. Drosophila hydei is a small, wingless species, while D. melanogaster is larger and flies.  Box containing approximately 150 g of nutrient mix and several breeding individuals.', 'produit27.jpg', 4, '12', 'sell', NULL, NULL),
(43, 'Grillons Noir', 'food', 'living_food', 'Box of Gryllus bimaculatus crickets. This cricket has good nutritional value and can therefore be used as a food base for most insectivores. It is also ideal for all reptiles, amphibians and invertebrates capable of ingesting it. Each box contains around thirty adult individuals measuring around 25-30 mm.  The species Gryllus bimaculatus is an alternative food to Achetea domestica crickets.  Once you have received your insects, it is advisable to place them in a larger container (e.g. Cricket Pen) and feed them with suitable powdered food, gelled water and vegetables. We recommend that you wait 48 hours before feeding them to your pets.', 'produit28.jpg', 2, '22', 'sell', NULL, NULL),
(44, 'Aquatic Turtle Food ', 'food', 'dry_food', 'Floating pellet food for aquatic turtles between 10 and 15 cm in size. Adapted in size and composition to meet the needs of growing turtles.  Recommended by zoo managers and professional turtle breeders.  - Complete floating pellets.  - 35% protein 4.8 mm pellets.  - For tortoises from 5 \' 15 cm.', 'produit29.jpg', 3, '16', 'sell', NULL, NULL),
(45, 'Day Gecko Food - 71 g', 'food', 'dry_food', 'Powdered food for all geckos that feed on fruit/nectar, such as day geckos (Phelsuma sp.) and crested geckos (Rhacodactylus sp.). Enriched with vitamins.', 'produit30.jpg', 5, '14', 'sell', NULL, NULL),
(46, 'Floating Pellets Aquatic Turtle food', 'food', 'dry_food', 'Exo Terra Floating Pellets for Aquatic Turtles are a nutritious food enriched with gammarids, minerals and multivitamins.  Exo Terra Aquatic Turtle Pellets provide all aquatic and semi-aquatic turtles with a rich source of nutrients including vitamins, calcium (from multiple sources), quality protein and more. These high quality floating extruded pellets help turtles develop and maintain hard shells thanks to natural and enriched sources of calcium. Vitamin D3 is included and is essential to ensure adequate calcium absorption.  These extremely tasty floating pellets provide quality nutrition. Exo Terra Aquatic Turtle Food includes \'Superior Yeast Extract\' for long-term turtle well-being; this extract helps support a healthy digestive tract.', 'produit31.jpg', 6, '16', 'sell', NULL, NULL),
(47, 'Frozen rodents', 'food', 'frozen_food', 'Our frozen prey comes from specialist farms and is transported in compliance with the cold chain. This category offers a wide choice of weights, sizes and types of prey.', 'produit32.jpg', 35, '3', 'sell', NULL, NULL),
(48, 'Breeding Box', 'materials', 'terrarium', 'Transparent plastic box.   The special feeding door on the front of the lid provides access for feeding and water supply. This makes feeding easier and reduces stress for the animals because the boxes are not moved to gain access. Angled ventilation ensures optimum airflow at all times, even when boxes are stacked.', 'produit33.jpg', 13, '5', 'sell', NULL, NULL),
(49, 'Transparent acrylic breeding box', 'materials', 'terrarium', 'Transparent walls and lid.  Perfect for showcasing animals or maintaining small species of reptiles or invertebrates.', 'produit34.jpg', 9, '7', 'sell', NULL, NULL),
(50, 'Karapas Terra', 'materials', 'terrarium', 'Karapas habitats are available in two colours and different sizes to suit the size of the animals.  The \"terra\" habitats are sold with the following equipment:  A grid with a locking system (except 70 cm model): positioned at the top of the terrarium, the grid provides security against the risk of escape as well as external intrusions (cats, children...) or falling objects. Four locking corners: the grid is locked at all four corners to prevent accidental removal. An adhesive strip: to place around the bottom of the terrarium if the tortoise is disturbed by its own reflection in the glass. Decorations and accessories sold separately.', 'produit35.jpg', 75, '9', 'sell', NULL, NULL),
(51, 'Turtle-Tarrium black', 'materials', 'aquarium', 'The TurtleTarrium is an aquarium with a B-shaped front.  Its corrugated glass gives it a distinctive design that\'s more aesthetically pleasing than a traditional rectangular aquarium.  Supplied without furniture', 'produit36.jpg', 145, '5', 'sell', NULL, NULL),
(52, 'Abutilon Jungle plante', 'materials', 'decoration', 'Decorative silk plant to recreate a tropical biotope in your terrarium. It also provides natural resting places for your reptiles or amphibians. Easy to clean.', 'produit37.jpg', 8, '45', 'sell', NULL, NULL),
(53, 'Bonsaï', 'materials', 'decoration', 'These magnificent decorative bansai made from natural wood are hand-crafted.  This original decoration can be used in dry, damp or even aquatic environments (can be planted with aquatic plants).', 'produit38.jpg', 38, '12', 'sell', NULL, NULL),
(54, 'Hideaway with integrated bowl', 'materials', 'decoration', 'A suitable hiding place is an essential feature of a natural terrarium. Without a safe place to hide and sleep, reptiles and amphibians will easily develop stress, which will interfere with their activities and appetite. Hiding places provide both shelter and a cool, moist place in the terrarium.  Thanks to its natural appearance, this hideaway fits into any type of terrarium. The integrated water bowl means your animals can find their watering hole as soon as they leave the hideaway, reducing stress by avoiding them having to wander all over the terrarium looking for a watering hole.  Dimensions: 29 x 17.5 x 13.5 cm', 'produit39.jpg', 29, '7', 'sell', NULL, NULL),
(55, 'Decorative resin cache', 'materials', 'decoration', 'This hideaway will provide an attractive, solid shelter for many species in dry, wet or aquatic environments.  Has 2 entrances for easy access for your animals.  Realistic rock imitation.  Dimensions: 19 x 9 x 9 cm', 'produit40.jpg', 19, '9', 'sell', NULL, NULL),
(56, 'Cactus Atacama', 'materials', 'decoration', 'Ideal for sterile environments (e.g. quarantine terrariums) or for use in areas of the terrarium where natural plants cannot survive and thrive.', 'produit41.jpg', 8, '18', 'sell', NULL, NULL),
(57, 'Cactus Great Basin', 'materials', 'decoration', 'Ideal for sterile environments (e.g. quarantine terrariums) or for use in areas of the terrarium where natural plants cannot survive and thrive.', 'produit42.jpg', 11, '14', 'sell', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `idseller` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(50) NOT NULL,
  PRIMARY KEY (`idseller`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`idseller`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(9, 'seller2@gmail.com', '1234', 'amphibiens.png', 'black', '', '', '', 'London', 'Englanc', '', '', '', '', '', '', ''),
(8, 'seller1@gmail.com', '1234', 'tortues.png', 'grey', '', '', '', '', '', 'SW74 5QP', '0603483622', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
