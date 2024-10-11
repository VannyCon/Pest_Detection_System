-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 02:41 PM
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
-- Database: `pestdata_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_access`
--

CREATE TABLE `tbl_admin_access` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_access`
--

INSERT INTO `tbl_admin_access` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Admin 1', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pestdata`
--

CREATE TABLE `tbl_pestdata` (
  `id` int(255) NOT NULL,
  `pest_name` varchar(255) NOT NULL,
  `pest_information` varchar(255) NOT NULL,
  `pest_solution` varchar(255) NOT NULL,
  `pest_imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pestdata`
--

INSERT INTO `tbl_pestdata` (`id`, `pest_name`, `pest_information`, `pest_solution`, `pest_imagepath`) VALUES
(1, 'Buboyog', 'Ang mga gagamba ay mga lumilipad na insekto na may payat na katawan at makitid na baywang. May papel sila sa polinasyon at pagkontrol ng peste ngunit maaaring maging agresibo kapag nanganganib.', '1. Alisin ang mga bagay na nag-aakit sa kanila tulad ng bukas na basura. 2. I-seal ang mga pasukan sa mga gusali. 3. Gumamit ng mga patibong para sa gagamba. 4. Para sa matinding pagsalakay, isaalang-alang ang propesyonal na kontrol ng peste.', 'wasp.jpg'),
(2, 'Weevil', 'Ang mga weevil ay maliliit na beetle na may mahahabang pangil. Maaari nilang salakayin ang mga nakaimbak na butil at iba pang tuyong kalakal.', '1. Suriin at itapon ang mga infested na pagkain. 2. Linisin ng mabuti ang mga lugar ng imbakan. 3. Itago ang pagkain sa mga airtight na lalagyan. 4. Gumamit ng bay leaves o diatomaceous earth bilang natural na pang-iwas.', 'weevil.jpg'),
(3, 'Suso', 'Ang mga suso ay mabagal na molusko na maaaring makasira sa mga halaman sa pamamagitan ng pagkain sa mga dahon at tangkay.', '1. Alisin ang mga suso ng mano-mano. 2. Gumamit ng copper tape o mga hadlang. 3. Maglagay ng mga patibong ng beer upang akitin at lunurin ang mga suso.', 'snail.jpg'),
(4, 'Moth', 'Ang mga moth ay maaaring makasira sa mga tela at nakaimbak na produkto, at ang kanilang mga larvae ay kumakain sa iba\'t ibang halaman.', '1. Gumamit ng mothballs sa mga lugar ng imbakan. 2. Alisin ang mga infested na halaman. 3. Mag-set up ng pheromone traps upang mahuli ang mga moth.', 'moth.jpg'),
(5, 'Slug', 'Ang mga slug ay katulad ng mga suso ngunit walang shell. Kumakain sila ng materyal ng halaman at maaaring magdulot ng malawak na pinsala.', '1. Gumamit ng slug pellets o patibong. 2. Gumawa ng mga hadlang gamit ang pinatuyong egg shells o diatomaceous earth. 3. Magdilig ng mga halaman sa umaga upang mabawasan ang kahalumigmigan sa gabi.', 'slug.jpg'),
(6, 'Earwig', 'Ang mga earwig ay nocturnal na insekto na kumakain sa mga halaman at nabubulok na organikong bagay.', '1. Gumamit ng mga patibong mula sa mamasa-masang nakatiklop na diyaryo. 2. Alisin ang mga labi at patay na materyal ng halaman. 3. Mag-apply ng insecticidal soap.', 'earwig.jpg'),
(7, 'Salagubang', 'Ang mga salagubang ay mga insekto na kumakain ng halaman na maaaring magdulot ng malubhang pinsala sa mga tanim at hardin.', '1. Gumamit ng insecticidal sprays. 2. Magpakilala ng mga natural na mandaragit tulad ng mga ibon. 3. Mag-apply ng neem oil sa mga halaman.', 'grasshopper.jpg'),
(8, 'Caterpillar', 'Ang mga caterpillar ay larvae ng mga paru-paro at moth. Maaari nilang ubusin ang mga dahon ng halaman at magdulot ng pinsala.', '1. Alisin ang mga caterpillar mula sa mga halaman ng mano-mano. 2. Gumamit ng Bacillus thuringiensis (Bt) bilang natural na insecticide. 3. Himukin ang mga natural na mandaragit tulad ng mga ibon.', 'caterpillar.jpg'),
(9, 'Laway', 'Ang mga earthworm ay kapaki-pakinabang para sa kalusugan ng lupa dahil tumutulong silang mag-aerate ng lupa at mag-decompose ng organikong materyal.', 'Walang kinakailangang aksyon dahil ang mga earthworm ay kapaki-pakinabang para sa kalusugan ng lupa.', 'earthworms.jpg'),
(10, 'Beetle', 'Ang mga beetle ay karaniwang insekto na maaaring makasira sa mga tanim sa pamamagitan ng pagkain sa mga dahon, tangkay, at ugat.', '1. Alisin ang mga beetle mula sa mga halaman ng mano-mano. 2. Gumamit ng insecticidal soap o neem oil. 3. Mag-rotate ng mga tanim upang mabawasan ang populasyon ng beetle.', 'beetle.jpg'),
(11, 'Langgam', 'Ang mga langgam ay sosyal na insekto na maaaring magdulot ng abala sa pamamagitan ng pagpasok sa mga tahanan para sa pagkain.', '1. I-seal ang mga pasukan sa mga gusali. 2. Gumamit ng ant baits o patibong. 3. Itago ang pagkain sa mga airtight na lalagyan.', 'ants.jpg'),
(12, 'Bubuyog', 'Ang mga bubuyog ay mahalagang pollinators, ngunit ang ilang species ay maaaring maging agresibo kapag ang kanilang mga pugad ay naabala.', '1. Iwasang abalahin ang mga pugad ng bubuyog. 2. Makipag-ugnayan sa mga propesyonal na beekeepers para sa ligtas na pagtanggal kung kinakailangan.', 'bees.jpg'),
(13, 'Borers', 'Ang mga borer ay mga larvae na sumusubok na pumasok sa mga puno at halaman, na nagiging sanhi ng malubhang pinsala.', '1. I-prune at sirain ang mga infested na sanga. 2. Gumamit ng insecticides upang targetin ang mga larvae. 3. Panatilihin ang kalusugan ng halaman upang labanan ang mga borer.', 'borers.jpg'),
(14, 'Cane Grubs', 'Ang mga cane grubs ay larvae ng beetles na kumakain sa ugat ng tubo, na nagiging sanhi ng pagbawas sa ani.', '1. Mag-apply ng soil insecticides. 2. Mag-rotate ng mga tanim upang masira ang siklo ng buhay. 3. Subaybayan ang mga larangan para sa presensya ng grubs.', 'cane_grubs.jpg'),
(15, 'Corn Earworm', 'Ang mga corn earworms ay caterpillar na kumakain sa mga tenga ng mais, na nagbabawas sa kalidad ng ani.', '1. Gumamit ng insecticidal sprays. 2. Magtanim ng mga uri ng mais na lumalaban. 3. Gumamit ng pheromone traps upang subaybayan ang populasyon.', 'corn_earworm.jpg'),
(16, 'Corn Leaf Aphid', 'Ang mga corn leaf aphid ay maliliit na insekto na sumisipsip ng sap mula sa mga dahon ng mais, na nagiging sanhi ng pagka-dehydrate ng halaman.', '1. Gumamit ng insecticidal soaps. 2. Mag-introduce ng mga natural na mandaragit tulad ng ladybugs. 3. Panatilihing malusog ang mga halaman upang labanan ang aphids.', 'corn_leaf_aphid.jpg'),
(17, 'Hindi Tukoy', 'Ang peste ay hindi maaring matukoy. Mangyaring tiyakin na malinaw ang larawan at maayos ang pokus sa insekto.', 'Subukan ang kumuha ng ibang larawan na may mas magandang ilaw at pokus. Kung magpapatuloy ang problema, kumonsulta sa lokal na eksperto sa kontrol ng peste para sa personal na pagtukoy.', 'undefined.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_access`
--
ALTER TABLE `tbl_admin_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pestdata`
--
ALTER TABLE `tbl_pestdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_access`
--
ALTER TABLE `tbl_admin_access`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pestdata`
--
ALTER TABLE `tbl_pestdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
