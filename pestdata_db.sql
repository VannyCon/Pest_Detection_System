-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 02:37 AM
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
  `pest_information` varchar(1000) NOT NULL,
  `pest_solution` varchar(1000) NOT NULL,
  `pest_imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pestdata`
--

INSERT INTO `tbl_pestdata` (`id`, `pest_name`, `pest_information`, `pest_solution`, `pest_imagepath`) VALUES
(0, 'Hindi Tukoy', 'Ang peste ay hindi maaring matukoy. Mangyaring tiyakin na malinaw ang larawan at maayos ang pokus sa insekto.', 'Subukan ang kumuha ng ibang larawan na may mas magandang ilaw at pokus. Kung magpapatuloy ang problema, kumonsulta sa lokal na eksperto sa kontrol ng peste para sa personal na pagtukoy.', 'undefined.jpg'),
(1, 'BEE/BUBUYOG', 'are insects belonging to the order Hymenoptera, typically measuring 0.5-1.5 inches\r\n(1.3-3.8 cm) in length. They display a range of colors, including yellow, black, brown, and\r\nmetallic green, and have fuzzy bodies with six legs and two wings.', 'Non-chemical methods include relocating bees, sealing entry points, removing attractants, using\r\nphysical barriers, and planting bee-repellent plants like mint or lemongrass.\r\nChemical methods, used as a last resort, involve insecticides or bee repellents containing\r\ncitronella or lemongrass. Alternatively, try home remedies like vinegar and water spray,\r\ncinnamon, citrus and water spray, or a homemade bee trap using sugar water and a plastic\r\nbottle.', 'wasp.jpg'),
(2, 'Weevil', 'are insects characterized by their elongated, oval-shaped bodies\r\n(0.1-1.5 inches/2.5-38 mm) and distinctive snouts. They exhibit varied colors, often brown, gray,\r\nor black, and feed on plants, grains, and stored products. As beetles, weevils are notorious\r\n\r\npests, causing damage to crops, gardens, and stored food, contaminating grain, seeds, and\r\nnuts, and spreading plant diseases, resulting in significant economic losses. Their diverse\r\nspecies (over 60,000) and adaptability make them a persistent threat to agriculture and stored\r\nproducts.', 'Non-Chemical Methods include removing infested materials, cleaning and sanitizing storage\r\nareas, using aeration and drying methods, sealing entry points, and introducing natural\r\npredators.\r\nChemical Methods involve insecticides like pyrethroids and fumigation with phosphine or\r\nsulfuryl fluoride. Home Remedies include using bay leaves, diatomaceous earth, essential oils\r\nlike tea tree or lavender, and sticky or pitfall traps.', 'weevil.jpg'),
(3, 'Suso/Snail', 'are mollusks ranging in size from 0.1-12 inches (2.5-30 cm)\r\nwith varied colors, often brown, gray, or white. Their soft, slimy bodies are typically\r\nspiral-shelled, and they feed on plants, algae, and organic matter. As herbivores, snails can\r\ncause significant damage to gardens, crops, and landscapes, spreading plant diseases and\r\ncontaminating water sources, resulting in economic losses.', 'Non-Chemical Methods include hand-picking, copper barriers, beer/yeast/sugar-water traps,\r\nphysical barriers like crushed eggshells, and organic baits. Chemical Methods involve\r\nmolluscicides like metaldehyde and insecticides like carbaryl.\r\nHome Remedies include salt and water spray, garlic spray, coffee grounds, and diatomaceous\r\nearth.', 'snail.jpg'),
(4, 'Moth', 'are insects characterized by their fuzzy bodies, wings, and antennae,\r\nranging in size from 0.1-12 inches (2.5-30 cm). They exhibit varied colors, often brown, gray, or\r\nwhite, and feed on fabrics, grains, and organic matter. With over 160,000 species, moths can\r\ncause significant damage to textiles, stored food, and agricultural products, contaminating food\r\nand leading to economic losses.', 'Non-Chemical Methods include cleaning, vacuuming, sealing entry points, using natural fibers\r\nlike cedar, freezing or heating infested items, and introducing natural predators. Chemical\r\nMethods involve insecticides like pyrethroids and fumigation with phosphine. Home Remedies\r\ninclude mothballs, essential oils like lavender or peppermint, diatomaceous earth, and sticky or\r\npheromone traps.', 'moth.jpg'),
(5, 'Slug/Moluskong', 'are shell-less mollusks ranging from 1-12 inches (2.5-30 cm)\r\nin size, with varied colors like gray, brown, or black. Their soft, slimy bodies feed on plants,\r\nalgae, and organic matter, causing damage to gardens, crops, and landscapes. Slugs can\r\nspread plant diseases, contaminate water sources, and result in economic losses.', 'Non-Chemical Methods include hand-picking, copper barriers, beer/yeast/sugar-water traps,\r\nphysical barriers like crushed eggshells, and organic baits. Chemical Methods involve\r\nmolluscicides like metaldehyde and insecticides like carbaryl. Home Remedies include\r\nsalt-water spray, garlic spray, coffee grounds, and diatomaceous earth.', 'slug.jpg'),
(6, 'Earwig/Salagubang-tenga', 'are nocturnal, elongated, flat insects with a pair of pincers (cerci)\r\nat the rear. They have six legs, antennae, and a hard exoskeleton.', 'Non-Chemical Methods include sealing entry points, removing debris, reducing moisture, using\r\ntraps (sticky, pitfall, or bait), and encouraging natural predators.\r\nChemical Methods involve insecticidal soap, neem oil, pyrethrin sprays, permethrin,\r\ndiatomaceous earth powder, and insect growth regulators. Alternatively, try Home Remedies like\r\ncitrus spray, essential oils (tea tree, lavender, peppermint), bay leaves, and cornstarch paste.', 'earwig.jpg'),
(7, 'Grasshopper/Tipaklong', 'is an insect belonging to the Orthoptera order, characterized by its green or brown body (2-5 inches long), powerful hind legs for jumping, two pairs of wings, large compound eyes, and antennae. \r\n', 'Non-chemical approaches include hand-picking, fine-mesh barriers, sticky traps, crop rotation, and introducing natural predators. Chemical options involve insecticides (pyrethroids, organophosphates), pesticides (neem oil, insecticidal soap), and repellents (citronella, lemongrass oil). Alternatively, organic methods offer diatomaceous earth, garlic spray, hot pepper spray, and neem oil to dehydrate, repel, or inhibit grasshopper growth. ', 'grasshopper.jpg'),
(8, 'Caterpillar/Uod', 'are soft-bodied, segmented, and hairy insect\r\nlarvae, 0.1-5 inches (2.5-13 cm) in size, with varied colors like green, yellow, or white. They feed\r\non plants, leaves, and stems, causing defoliation and crop damage.', 'Non-Chemical Methods include hand-picking, sanitation, sticky/pitfall/pheromone traps,\r\nbiological control, and cultural practices like crop rotation and pruning.\r\nChemical Methods involve insecticides like Bacillus thuringiensis (Bt) and systemic treatments.\r\nHome Remedies include soap and water sprays, neem oil, diatomaceous earth, and essential\r\noils like peppermint or lavender.', 'caterpillar.jpg'),
(9, 'Earthworms/Laway', 'is an invertebrate annelid, typically measuring 2-20 inches\r\n(5-50 cm) in length, with a brown, red, or purple color. Its segmented body is covered in setae\r\n(bristles) and mucus, allowing it to burrow efficiently.', 'Non-Chemical Methods include removing\r\nattractants, modifying soil, using physical barriers, encouraging natural predators, and aerating\r\nsoil.\r\nChemical Methods involve insecticides or earthworm repellents like castor oil and garlic sprays.\r\nHome remedies include vinegar and water spray, coffee grounds, citrus spray, and\r\ndiatomaceous earth.', 'earthworms.jpg'),
(10, 'Beetle/Salagubang', 'are insects, 0.1-5 inches (2.5-13 cm) in size, with varied, often shiny or\r\nmetallic colors, and hardened exoskeletons. They have distinct heads, wings, and feed on\r\nplants, stored products, or organic matter, causing crop damage, stored product infestation,\r\nproperty damage, and disease spread.', 'Non-Chemical Methods include hand-picking, sanitation, sticky/pitfall/pheromone traps,\r\nbiological control, and cultural practices like crop rotation and pruning.\r\nChemical Methods involve insecticides like pyrethroids and systemic treatments. Home\r\nRemedies include diatomaceous earth, neem oil, soap and water sprays, and essential oils like\r\npeppermint or lavender.', 'beetle.jpg'),
(11, 'Langgam/Ant', 'are social, colonial insects, 0.1-2.5 inches (2.5-6.4 cm) in size, with narrow\r\nwaists, distinct heads, and mandibles. They exhibit varied colors, often brown, black, or red, and\r\nare omnivorous, feeding on various food sources. Ants can contaminate food, damage property,\r\nand inflict stings, making management crucial.', 'Non-Chemical Methods include sealing entry points, maintaining cleanliness, using natural\r\ndeterrents like cinnamon or citrus, sugar/protein-based traps, and introducing natural predators.\r\nChemical Methods involve insecticides like pyrethroids and baits. Home Remedies include\r\nvinegar sprays, baking soda and sugar mixtures, essential oils like tea tree or peppermint, and\r\nborax and sugar combinations.', 'ants.jpg'),
(12, 'Wasp/Putakti', 'is a social, flying insect of the Hymenoptera order, characterized by its slender 1-2 inch body, yellow and black stripes (or other colors), two pairs of wings, defensive stinger, and nest-building behavior. They are omnivores, living in colonies with a queen and workers, and are known for their aggressive behavior when threatened or provoked, causing painful stings. ', 'Non-chemical approaches include removing food sources, sealing entry points, using physical barriers, relocating nests, and introducing natural predators. Chemical options involve insecticides, wasp sprays, and repellents like citronella and lemongrass oil. Organic methods offer soap solutions, vinegar sprays, mint leaves, and essential oils like peppermint and tea tree oil to repel or eliminate wasps. ', 'bees.jpg'),
(13, 'Borers/ Insekto ng butas', 'are destructive insects that feed on plants by tunneling into stems, leaves, or roots, causing significant damage. They comprise various species, including beetles, moths, and wasps, with larvae being the primary damaging stage. Characterized by their tunneling behavior, borers feed on plant sap, tissues, or cellulose and can transmit plant diseases. ', 'Non-chemical approaches include crop rotation, sanitation, biological control, cultural controls, and resistant crop varieties. Chemical options involve insecticides, pesticides like Bt and spinosad, and repellents like neem oil and pyrethrin. Organic methods offer diatomaceous earth, Bt, neem oil, insecticidal soap, and essential oils like peppermint and tea tree oil. \r\n', 'borers.jpg'),
(14, 'Cane Grubs/ Mga uod ng tubo', 'larvae of various beetle species, feed on sugarcane, bamboo, and grasses, causing significant damage. Characterized by their white, legless, grub-like appearance, they feed on plant roots, stems, and leaves, reducing growth and yield. They pupate in soil, emerging as adult beetles, with multiple generations per year. ', 'Non-chemical approaches include crop rotation, sanitation, biological control, cultural controls, and resistant crop varieties. Chemical options involve insecticides, pesticides like chlorpyrifos and carbofuran, and repellents like neem oil and pyrethrin. Organic methods offer diatomaceous earth, Bacillus thuringiensis (Bt), neem oil, insecticidal soap, and essential oils like peppermint and tea tree oil. ', 'cane_grubs.jpg'),
(15, 'Corn Earworm/Uod mais', 'is a highly destructive pest affecting corn, cotton, and other crops. Its green or tan caterpillars (1-2 inches long) feed on corn ears, leaves, and flowers, causing significant damage and reducing yields and quality. Adult moths (1-2 inches wingspan) emerge, starting a cycle of multiple generations per year. \r\n', 'Non-chemical approaches include crop rotation, sanitation, biological control, cultural controls, and resistant varieties. Chemical options involve insecticides, pyrethroids, organophosphates, and repellents like neem oil and pyrethrin. Organic methods offer diatomaceous earth, Bacillus thuringiensis (Bt), neem oil, insecticidal soap, and essential oils like peppermint and tea tree oil.', 'corn_earworm.jpg'),
(16, 'Corn Leaf Aphid', 'is a tiny, soft-bodied pest harming corn and cereal crops. It\'s characterized by its small size (1/16 inch), pear-shaped body, and green or yellow color. The aphid feeds on plant sap, transmits viruses, and causes curled or distorted leaves. ', 'Non-chemical approaches include crop rotation, sanitation, biological control, cultural controls, and resistant varieties. Chemical options involve insecticides, pyrethroids, organophosphates, and repellents like neem oil and pyrethrin. Organic methods offer diatomaceous earth, Bacillus thuringiensis (Bt), neem oil, insecticidal soap, and essential oils like peppermint and tea tree oil.', 'corn_leaf_aphid.jpg');

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
