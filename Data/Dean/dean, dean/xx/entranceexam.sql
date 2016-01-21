-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2016 at 06:01 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entranceexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL auto_increment,
  `question_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `image_url` varchar(1000) NOT NULL,
  `correct` enum('1','0') NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=324 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `text`, `image_url`, `correct`) VALUES
(1, 1, 'unclean air', '', '1'),
(2, 1, 'hot air', '', ''),
(3, 1, 'cool air', '', ''),
(4, 2, 'water', '', ''),
(5, 2, 'soil', '', ''),
(6, 2, 'air', '', '1'),
(7, 3, 'full of harm', '', '1'),
(8, 3, 'not useful', '', ''),
(9, 3, 'healthful', '', ''),
(10, 4, 'injurious fog consisting smoke gas ', '', '1'),
(11, 4, 'different kinds of impure gases', '', ''),
(12, 4, 'different kinds of impure smoke', '', ''),
(13, 5, 'accumulated ash', '', '1'),
(14, 5, 'white smoke', '', ''),
(15, 5, 'impure air', '', ''),
(16, 6, 'disease of the lung', '', '1'),
(17, 6, 'disease of the heart', '', ''),
(18, 6, 'disease of the stomach', '', ''),
(19, 7, 'delicious', '', ''),
(20, 7, 'poisonous', '', '1'),
(21, 7, 'nutritious', '', ''),
(22, 8, 'accumulated smoke', '', '1'),
(23, 8, 'smoke pipes', '', ''),
(24, 8, 'warm temperature', '', ''),
(25, 8, 'rising air current', '', ''),
(26, 9, 'it causes air-borne disease', '', ''),
(27, 9, 'it is formed by soot and ash', '', ''),
(28, 9, 'it is toxic or poisonous', '', '1'),
(29, 9, 'it is air pollutant and irritant', '', ''),
(30, 10, 'causes of pollution', '', '1'),
(31, 10, 'effects of pollution', '', ''),
(32, 10, 'prevention of pollution', '', ''),
(33, 10, 'kinds of pollution', '', ''),
(34, 11, 'causes of pollution', '', '1'),
(35, 11, 'Prevention of pollution', '', ''),
(36, 11, 'Cause of pneumonia', '', ''),
(37, 11, 'how soot is formed', '', ''),
(38, 12, 'Toxic materials are poisonous and thus should be avoided.', '', ''),
(39, 12, 'There are no prevention to pollution, anywhere and anytime.', '', ''),
(40, 12, 'The higher the pollution the more diseases will occur.', '', '1'),
(41, 12, 'Pollution occurs to a much lesser degree in rural areas.', '', ''),
(42, 13, 'lowers', '', ''),
(43, 13, 'rises', '', '1'),
(44, 13, 'cools', '', ''),
(45, 14, 'rainy', '', ''),
(46, 14, 'windless', '', '1'),
(47, 14, 'cloudy', '', ''),
(48, 15, 'cooler', '', '1'),
(49, 15, 'hotter', '', ''),
(50, 15, 'warmer', '', ''),
(51, 16, 'warm', '', '1'),
(52, 16, 'cool', '', ''),
(53, 16, 'low', '', ''),
(54, 17, 'stormy weather', '', '1'),
(55, 17, 'hot weather', '', ''),
(56, 17, 'changing weather', '', ''),
(57, 18, 'Conditions of Temperature', '', '1'),
(58, 18, 'Causes of Temperature', '', ''),
(59, 18, 'Kinds of weather', '', ''),
(60, 18, 'Effects of Temperature', '', ''),
(61, 19, 'Windy days are uncomfortable days.', '', ''),
(62, 19, 'Condition of temperature is dependent on the sun.', '', '1'),
(63, 19, 'The sky is clear when there is no rain', '', ''),
(64, 19, 'Effects of Temperature', '', ''),
(65, 20, 'exposed', '', ''),
(66, 20, 'shown', '', ''),
(67, 20, 'hidden', '', '1'),
(68, 20, 'brightened', '', ''),
(69, 21, 'dark', '', '1'),
(70, 21, 'bright', '', ''),
(71, 21, 'brilliant', '', ''),
(72, 21, 'hazy', '', ''),
(73, 22, 'rainy', '', '1'),
(74, 22, 'bright day', '', ''),
(75, 22, 'sunny day', '', ''),
(76, 22, 'pleasant day', '', ''),
(77, 23, 'The Philippines is known Province of the Orient Seas', '', '1'),
(78, 23, 'The rice terraces of Mountain Province is a work of art and a wonder.', '', ''),
(79, 23, 'The Maria Cristina Falls and the Underground River of Palawan Contribute to the Beauty of the Philippines', '', ''),
(80, 23, 'The Beauty of the Philippines is a joy forever and source of pride', '', ''),
(81, 24, 'beauty spots in the Philippines.', '', '1'),
(82, 24, 'regions on the Philippines.', '', ''),
(83, 24, 'business sectors in the Philippines.', '', ''),
(84, 24, 'gifts and wealth in the country.', '', ''),
(85, 25, 'The Pride of the Filipino', '', ''),
(86, 25, 'Sunset at Manila Bay', '', ''),
(87, 25, 'Rice Terraces of the Mountain', '', ''),
(88, 25, 'The Pearl of the Orient Seas', '', '1'),
(89, 26, 'The Reyeses Vacation in Baguio', '', '1'),
(90, 26, 'Boating with Ben''s Freinds', '', ''),
(91, 26, 'Baguio, the Summer Capital of the Philippines', '', ''),
(92, 27, 'Sentence 1', '', ''),
(93, 27, 'Sentence 2', '', '1'),
(94, 27, 'Sentence 3', '', ''),
(95, 28, 'the motor scooter', '', ''),
(96, 28, 'the small boat', '', ''),
(97, 28, 'an umbrella', '', '1'),
(98, 29, 'in the sea water', '', ''),
(99, 29, 'in the shallow lake', '', ''),
(100, 29, 'in the large river', '', '1'),
(101, 30, 'disappointed', '', ''),
(102, 30, 'lonely', '', '1'),
(103, 30, 'happy', '', ''),
(104, 31, 'Everybody hot hur', '', ''),
(105, 31, 'Everybody got wet', '', '1'),
(106, 31, 'Everybody got lost', '', ''),
(107, 32, 'The feast of Saint John the Baptized', '', '1'),
(108, 32, 'Why Jesus Christ Was Baptized', '', ''),
(109, 32, 'The Baptism of Jesus Christ', '', ''),
(110, 33, 'swim in the water', '', ''),
(111, 33, 'take a bath in the water', '', ''),
(112, 33, 'walk through the water', '', '1'),
(113, 34, 'the baptism of Jesus Christ', '', ''),
(114, 34, 'The feast of Saint John the Baptist', '', '1'),
(115, 34, 'the families in the beaches', '', ''),
(116, 35, 'to witness the baptism of Jesus Christ', '', ''),
(117, 35, 'to witness the baptism of John the Baptist', '', '1'),
(118, 35, 'to reenact the baptism of Jesus Christ', '', ''),
(119, 36, 'fear', '', ''),
(120, 36, 'excitement', '', '1'),
(121, 36, 'worry', '', ''),
(122, 37, 'Puerto Rican children receive gifts.', '', '1'),
(123, 37, 'Children put fresh grass under beds.', '', ''),
(124, 37, 'They find candies and toys', '', ''),
(125, 38, 'Celebration of Christmas Eve', '', ''),
(126, 38, 'Celebration of Three Kings Day', '', ''),
(127, 38, 'Gifts of Puerto Rican Children', '', '1'),
(128, 39, 'A night after Christmas Day', '', ''),
(129, 39, 'A night before Christmas Day', '', '1'),
(130, 39, 'A night on Christmas Day', '', ''),
(131, 40, 'fear', '', ''),
(132, 40, 'sad', '', ''),
(133, 40, 'happy', '', '1'),
(134, 41, 'murmured', '', ''),
(135, 41, 'pleaded', '', ''),
(136, 41, 'threatened', '', '1'),
(137, 42, 'rejoiced', '', ''),
(138, 42, 'moaned', '', '1'),
(139, 42, 'giggled', '', ''),
(140, 43, 'sighed', '', ''),
(141, 43, 'shouted', '', ''),
(142, 43, 'giggled', '', '1'),
(143, 44, 'cried', '', ''),
(144, 44, 'shouted', '', '1'),
(145, 44, 'gasped', '', ''),
(146, 45, 'sobbed', '', ''),
(147, 45, 'whispered', '', ''),
(148, 45, 'cheered', '', '1'),
(149, 46, 'sobbed', '', ''),
(150, 46, 'giggled', '', ''),
(151, 46, 'exlaimed', '', '1'),
(152, 47, 'shouted', '', ''),
(153, 47, 'whispered', '', '1'),
(154, 47, 'laughed', '', ''),
(155, 48, 'threatened', '', ''),
(156, 48, 'demanded', '', ''),
(157, 48, 'pleaded', '', '1'),
(158, 49, 'gasped', '', '1'),
(159, 49, 'explained', '', ''),
(160, 49, 'recited', '', ''),
(161, 50, 'exclaimed', '', '1'),
(162, 50, 'sobbed', '', ''),
(163, 50, 'remarked', '', ''),
(164, 51, 'hydrogen', '', ''),
(165, 51, 'smoke', '', '1'),
(166, 51, 'water vapor', '', ''),
(167, 51, 'oxygen', '', ''),
(168, 52, 'salt', '', ''),
(169, 52, 'sugar', '', ''),
(170, 52, 'sand', '', '1'),
(171, 52, 'coffee', '', ''),
(172, 53, 'drink the contents of the glass', '', ''),
(173, 53, 'stir the contents of the glass', '', '1'),
(174, 53, 'turn on the electric fan in front of the glass', '', ''),
(175, 53, 'non of the above', '', ''),
(176, 54, 'Energy is found every where', '', ''),
(177, 54, 'Energy is the ability to do work', '', '1'),
(178, 54, 'Energy comes from inside the Earth', '', ''),
(179, 54, 'Energy destroys matter', '', ''),
(180, 55, 'The food is physically changed', '', ''),
(181, 55, 'The food is spoiled', '', ''),
(182, 55, 'The food is chemically changed', '', '1'),
(183, 55, 'The food does not taste goo', '', ''),
(184, 56, 'It supports the body', '', ''),
(185, 56, 'It allows the body to move', '', ''),
(186, 56, 'It protects some of the body organs', '', ''),
(187, 56, 'It sends messages to the muscles', '', '1'),
(188, 57, 'Ingestion', '', ''),
(189, 57, 'Digestion', '', '1'),
(190, 57, 'Absorption', '', ''),
(191, 57, 'Defecation', '', ''),
(192, 58, 'The bar soap has more surfaces exposed to the water.', '', ''),
(193, 58, 'The bar soap has a shape that make it dissolve faster.', '', ''),
(194, 58, 'The powdered soap has more tiny particles exposed to the water.', '', '1'),
(195, 58, 'All of the Above', '', ''),
(196, 59, 'When the wind blows, it carries the foul air', '', ''),
(197, 59, 'When the garbage decays, it produces foul air.', '', '1'),
(198, 59, 'The garbage contains used cans and bottles.', '', ''),
(199, 59, 'The garbage is buried', '', ''),
(200, 60, 'skull', '', '1'),
(201, 60, 'Ribs', '', ''),
(202, 60, 'Jawbone', '', ''),
(203, 60, 'collarbone', '', ''),
(204, 61, 'Digestive system', '', ''),
(205, 61, 'Skeletal system', '', '1'),
(206, 61, 'Muscular system', '', ''),
(207, 61, 'Nervous system', '', ''),
(208, 62, 'ligaments', '', ''),
(209, 62, 'tendons', '', ''),
(210, 62, 'joints', '', '1'),
(211, 62, 'tough fibers', '', ''),
(212, 63, 'ribs', '', '1'),
(213, 63, 'hipbones', '', ''),
(214, 63, 'skull', '', ''),
(215, 63, 'ankle bones', '', ''),
(216, 64, 'Do not breathe air', '', ''),
(217, 64, 'Breathe fresh and cool air', '', ''),
(218, 64, 'Plant more trees', '', '1'),
(219, 64, 'Throw our garbage anywhere', '', ''),
(220, 65, 'blind', '', ''),
(221, 65, 'paralyzed', '', ''),
(222, 65, 'deaf and mute', '', ''),
(223, 65, 'All of the Above', '', '1'),
(224, 66, 'air', '', ''),
(225, 66, 'carbon dioxide', '', '1'),
(226, 66, 'oxygen', '', ''),
(227, 66, 'water', '', ''),
(228, 67, 'birth', '', '1'),
(229, 67, 'reproduction', '', ''),
(230, 67, 'fertilization', '', ''),
(231, 67, 'hatching', '', ''),
(232, 68, 'sunlight and hear', '', ''),
(233, 68, 'sound and force', '', ''),
(234, 68, 'wind and running water', '', '1'),
(235, 68, 'air and heat', '', ''),
(236, 69, 'air', '', ''),
(237, 69, 'water', '', ''),
(238, 69, 'heat', '', ''),
(239, 69, 'decaying matter', '', '1'),
(240, 70, 'let the faucet leak', '', ''),
(241, 70, 'use as much water as you can', '', ''),
(242, 70, 'fill all your container', '', '1'),
(243, 70, 'use just enough water for your need', '', ''),
(244, 71, 'Earthworms eat harmful insects.', '', ''),
(245, 71, 'Earthworms can be used as food.', '', ''),
(246, 71, 'Earthworms loosen and fertilize the soil.', '', '1'),
(247, 71, 'Earthworms eat garbage', '', ''),
(248, 72, 'frog', '', ''),
(249, 72, 'butterfly', '', ''),
(250, 72, 'cockroach', '', ''),
(251, 72, 'goat', '', '1'),
(252, 73, 'A sperm unites with an egg.', '', '1'),
(253, 73, 'An egg disappears', '', ''),
(254, 73, 'A sperm matures', '', ''),
(255, 73, 'A sperm disappears ', '', ''),
(256, 74, 'stormy weather', '', '1'),
(257, 74, 'hot day', '', ''),
(258, 74, 'fine weather', '', ''),
(259, 74, 'rainy day', '', ''),
(260, 75, 'Dislocation', '', '1'),
(261, 75, 'Fracture', '', ''),
(262, 75, 'bone infection', '', ''),
(263, 75, 'sprain', '', ''),
(264, 76, 'hot calamansi', '', ''),
(265, 76, 'hot tea', '', ''),
(266, 76, 'hot chocolate', '', '1'),
(267, 76, 'hot coffee', '', ''),
(268, 77, 'digestion', '', ''),
(269, 77, 'incubation', '', ''),
(270, 77, 'metamorphosis', '', ''),
(271, 77, 'fertilization', '', '1'),
(272, 78, 'smoke goes up', '', ''),
(273, 78, 'leaves of trees move gently', '', ''),
(274, 78, 'flag move gently', '', ''),
(275, 78, 'branches of trees break', '', '1'),
(276, 79, 'Living things have the same parts.', '', ''),
(277, 79, 'Living things have the same kind of food.', '', ''),
(278, 79, 'Living things reproduce their own kind.', '', '1'),
(279, 79, 'Living things reproduce in the same day', '', ''),
(280, 80, 'rice', '', ''),
(281, 80, 'salt', '', '1'),
(282, 80, 'mango', '', ''),
(283, 80, 'pepper', '', ''),
(284, 81, 'water flow very fast in the fores', '', ''),
(285, 81, 'water does not flow very easily because of the roots', '', ''),
(286, 81, 'there are many dry leaves in the ground', '', ''),
(287, 81, 'trees do not use much water', '', '1'),
(288, 82, 'When people stay away from water', '', ''),
(289, 82, 'When people stay away from sunlight', '', ''),
(290, 82, 'When people stay long in water', '', ''),
(291, 82, 'When people stay long under the sunlight', '', '1'),
(292, 83, 'Ptyalin', '', ''),
(293, 83, 'Digestion', '', ''),
(294, 83, 'Peristalsis', '', '1'),
(295, 83, 'Gastric Juice', '', ''),
(296, 84, 'suspension', '', '1'),
(297, 84, 'colloid', '', ''),
(298, 84, 'solution', '', ''),
(299, 84, 'compound', '', ''),
(300, 85, 'weather affects people''s activites', '', '1'),
(301, 85, 'weather is harmful', '', ''),
(302, 85, 'weather changes from time to time', '', ''),
(303, 85, 'weather gives people the temperature of objects', '', ''),
(304, 86, 'fish', '', ''),
(305, 86, 'frog', '', '1'),
(306, 86, 'butterfly', '', ''),
(307, 86, 'bird', '', ''),
(308, 87, 'sepals and petals', '', ''),
(309, 87, 'pistil and stamen', '', '1'),
(310, 87, 'calyx and anther', '', ''),
(311, 87, 'pistil and petals', '', ''),
(312, 88, 'Sand settled down at the bottom.', '', '1'),
(313, 88, 'Sand spread evenly at the bottom.', '', ''),
(314, 88, ' Sand dissolved in the water.', '', ''),
(315, 88, 'Sand is white and clear', '', ''),
(316, 89, 'All animals are born alive', '', ''),
(317, 89, 'Different animals reproduces in different ways.', '', '1'),
(318, 89, 'All animals are hatched from eggs.', '', ''),
(319, 89, 'Different animals move in different ways.', '', ''),
(320, 90, 'it has much air', '', ''),
(321, 90, 'it has much soil', '', ''),
(322, 90, 'it has much water', '', ''),
(323, 90, 'it has much decayed plants and animals', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `intgwa`
--

CREATE TABLE IF NOT EXISTS `intgwa` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `gwa` varchar(500) NOT NULL,
  `interview` double NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `intgwa`
--


-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE IF NOT EXISTS `percentage` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `percent` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `title`, `percent`) VALUES
(1, 'Exam', 40),
(2, 'GWA', 40),
(3, 'Interview', 20);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL auto_increment,
  `subject_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `question`, `image_url`) VALUES
(1, 1, 'Trees prevent air "polution".', ''),
(2, 1, 'Bird fly as high as the "atmosphere".', ''),
(3, 1, 'Polluted air is "harmful" to man It can cause irritation of the respiratory organs of the body.', ''),
(4, 1, 'Factories emit gasses and this combined with smoke and other gases result to "smog"''', ''),
(5, 1, 'Accumulated smoke in pipes becomes "soot" and is dangerous to our health''', ''),
(6, 1, 'Tuberculosis is a lung "ailment"', ''),
(7, 1, 'Toxic" food causes stomach ache.', ''),
(8, 1, 'As mentioned in the paragraph above. what causes soot?', ''),
(9, 1, 'Why does carbon monoxide causes irritation to the throat and the eyes?', ''),
(10, 1, 'The words in the box refer to the ______________ .', '../question_photo/question_10.png'),
(11, 1, 'What is the selection about?', ''),
(12, 1, 'Based on the information given what conclusion can be made?', ''),
(13, 1, 'When the air is heated by the sun, the temperature _______________ .', ''),
(14, 1, 'Temperature gets warm when the day is _____________.', ''),
(15, 1, 'When the sky is cloudy the air becomes __________', ''),
(16, 1, 'On fine weather the air temperature is', ''),
(17, 1, 'Temperature is low during ___________ .', ''),
(18, 1, 'What title is best for the paragraph?', ''),
(19, 1, 'Based on the information give. what conclusion can be drawn?', ''),
(20, 1, '"Concealed" in sentence 3 means.', ''),
(21, 1, '"Overcast" in sentence 5 means', ''),
(22, 1, '"Stormy day" in sentence 7 means.', ''),
(23, 1, 'What is the main idea of the paragraph?', ''),
(24, 1, 'The ideas in the box are', '../question_photo/sample.png'),
(25, 1, 'What title is best for the paragraph?', ''),
(26, 1, 'which of the following is the best title of the story?', ''),
(27, 1, 'Which sentence is the main idea?', ''),
(28, 1, 'It began to rain. Dina stoop up and signaled mother. What did Dina need to have?', ''),
(29, 1, 'They were riding on a small boat in the lagoon the underlined phrase means?', ''),
(30, 1, 'Ben met new friends. They rode on a motor scooter and went boating. They also rode on a small boat. Ben felt', ''),
(31, 1, 'When mother was giving an umbrella, the boat capsized. What do you think happened to Ben, Dina and friends?', ''),
(32, 1, 'Which of the following is the appropriate of the paragraph?', ''),
(33, 1, 'The "wade in the water" to reenact the baptism of Jesus Christ. The quoted phrase means______.', ''),
(34, 1, 'The paragraph tells about_____________ .', ''),
(35, 1, 'Why do you think there are thousands of families who stay on the beaches?', ''),
(36, 1, 'The general mood of the paragraph is.', ''),
(37, 1, 'What is the main idea of the paragraph?', ''),
(38, 1, 'Choose the correct title of the paragraph', ''),
(39, 1, 'They receive gifts on "Christmas Eve". Which one below is the meaning of the quoted words?', ''),
(40, 1, 'In the morning, children find candies and toys in place of the grass. The children feel__________.', ''),
(41, 1, '" I''m going to spank you if you don''t obey me immediately ",________________ mother.', ''),
(42, 1, '" I can''t sleep. It is too hot! " ______________ Elena.', ''),
(43, 1, '" I have never heard such a funny name, "_________________ Mila.', ''),
(44, 1, '" At last I have finished my project! Now, I can play with my friends." __________________Philip', ''),
(45, 1, '"May you have many Happy birthday to come! " _______________ the guest.', ''),
(46, 1, '" oh i have burned my new dress! "______________ Elsa.', ''),
(47, 1, '"Hush! The baby is sleeping! "', ''),
(48, 1, '"Please, call a doctor! My husband has fainted! " ____________________ Aling Dora.', ''),
(49, 1, '" Oh I have cut my finger! " ______________ Maria.', ''),
(50, 1, '" Father is coming! Father is coming! _________________ Rudy.', ''),
(51, 2, 'Which of the following pollutes the air?', ''),
(52, 2, 'Which of the substances will not dissolve in water?', ''),
(53, 2, 'Mother is preparing some calamansi juice. She squeezed the juice from the calamansi fruits into a glass of water. What should she do after adding sugar to the glass of water to make the sugar dissolve faster?', ''),
(54, 2, 'Which sentence describes energy?', ''),
(55, 2, 'A certain food changes in taste while you are chewing it. What does this show?', ''),
(56, 2, 'Which of the following is not a function of the skeletal system?', ''),
(57, 2, 'The process of breaking down food into simpler substances is called ________?', ''),
(58, 2, 'Powdered soap will dissolve faster than a bar soap. Why?', ''),
(59, 2, 'How does waste in the garbage pollutes the air?', ''),
(60, 2, 'Which of the following bones protect the brain and the eyeballs?', ''),
(61, 2, 'Which of your body systems give shapes and support to your body?', ''),
(62, 2, 'What connects two or more bones together?', ''),
(63, 2, 'What structure protects the heart and lungs?', ''),
(64, 2, 'Which of the following will help reduce pollution of air around us?', ''),
(65, 2, 'Which is a handicapped person?', ''),
(66, 2, 'What do animals give off that is useful to plants?', ''),
(67, 2, 'By what process do animals produce their young?', ''),
(68, 2, 'what forces carry away soil?', ''),
(69, 2, 'Which of the following makes the soil fertile?', ''),
(70, 2, 'How can you save water?', ''),
(71, 2, 'Why  are earthworms useful?', ''),
(72, 2, 'Which of these animals looks like its parent animals when it is born?', ''),
(73, 2, 'What happens during fertilization?', ''),
(74, 2, 'One morning the wind was blowing very string and there was a heavy rain.', ''),
(75, 2, 'It may occur due to a sharp twisting or turning of a joint beyond its natural limits.', ''),
(76, 2, 'To keep people warm during very cold days, they drink beverages rich in carbohydrates and protein. Which of these is the proper drink?', ''),
(77, 2, 'What may happen if a sperm unites with an egg?', ''),
(78, 2, 'Which of the following shows the wind is blowing very strong', ''),
(79, 2, 'Which of the following is a characteristic of all living things?', ''),
(80, 2, 'Which of the following will spread evenly when mixed with water?', ''),
(81, 2, 'How do forest and trees help save water?', ''),
(82, 2, 'When does ultraviolet rays from the sun become harmful to people?', ''),
(83, 2, 'It refers to the muscular contraction in the esophagus through wich the food is pushed down in the stomach.', ''),
(84, 2, 'In a mixture of clay and water, particles of clay are suspended in the water. What is this mixture called?', ''),
(85, 2, 'Why is weather very important to poeple?', ''),
(86, 2, 'Which of these animals fertilizes its egg inside the body?', ''),
(87, 2, 'Which parts of the flower are needed in reproduction?', ''),
(88, 2, 'Arnold put some sand in his aquarium. At first, the water looked cloudy, later on, the water looked clear. Why?', ''),
(89, 2, 'Chicks are hatch eggs. A goat is born alive and looks like its parents. A frog undergoes many changes as it grows. What do these observation prove?', ''),
(90, 2, 'Why do plants grow best in topsoil?', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_category`
--

CREATE TABLE IF NOT EXISTS `question_category` (
  `id` int(11) NOT NULL auto_increment,
  `subject_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `question_category`
--

INSERT INTO `question_category` (`id`, `subject_id`, `name`, `description`, `image_url`) VALUES
(1, 1, 'Test 1', 'The air we breathe can become dirty. Air becomes polluted when impurities mix with it. There are several factors that contribute of atmosphere.Sand and dust storms introduce into the atmosphere various materials that do not belong there. Fores fires release smoke and gases to the atmosphere. Decaying plant and animal remains produce great quantities of gases. Pesticides and insecticides also pollute the air. Spores, molds and bacteria and smoke which harmful to man. Smoke contains air-borne and gas borne particles. The combination of various waste gases with smoke, dust and fog results in a dense  cloud called smog. Smog may remain the same and there are no rising air currents to carry it away. Smoke is unburned carbon. Accumulated smoke in places like smoke pipes becomes soot. Soot and ash in the air makes man susceptible to pneumonia and other lung ailments. Carbon monoxide, the gas is toxic or poisonous. It causes irritation to the throat and the eyes.', ''),
(2, 1, 'Test 2', 'When air is heated by the sun, the temperature rises. It is usually warmest during noontime when the sun''s ray hits the earth''s surface directly. It is usually coolest during the early morning when the sun is still concealed from view. When it is a windless day, the air temperature gets warm. When the sky is generally cloudy or overcast, the air becomes cooler. When it rains, the temperature drops. Temperature is low during stormy weather because the sun does not usually shine on a stormy day. On fine weather, air temperature is warm. When the sun shines brightly, the sky is clear, there is no rain.', ''),
(3, 1, 'Test 3', 'The Philippines is known as the Pearl of the Orient Seas because of its beauty. The land is green throughout the year. Nature has given it many wonders. The Mayon Volcano with Its perfect cone is one of the mos beautiful in the world. Sunset at Manila Bay is one of the beautiful too. The rice terraces of the Mountain Province, the Ma. Cristina Falls and the Underground River of Palawan are wonderful works of art. ', ''),
(4, 1, 'Test 4', '            Baguio City is the summer capital of the Philippines. The Reyeses have spent their vacation there when they were staying in Baguio. Ben met some new friends. They rode on motor scooter and went boating. They were riding on a small boat in the lagoon when it began to rain.\r\n           Dina did not like to get wet. She stood up and signaled mother an umbrella. When mother was giving umbrella, the boat capsized.\r\n\r\n', ''),
(5, 1, 'Test 5', 'The best celebration in Puerto Rico is held on June 24. It is the feast of saints  john the Baptist. In the evening of June 23, thousands of families stay on the beaches. At dawn, the wade in the water to reenact the baptism of Jesus Christ.', ''),
(6, 1, 'Test 6', 'Puerto Rican Children receive gifts both on Christmas Eve and on Three Kings Day. On January 5, children put fresh grass under their beds before they sleep. In the morning, They find candies and toys in place of the grass.', ''),
(7, 1, 'Test 7', 'Read the following sentences. Choose the word under each sentence which best shows the feeling \r\nof the speaker to complete the sentence.', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_joint`
--

CREATE TABLE IF NOT EXISTS `question_joint` (
  `id` int(11) NOT NULL auto_increment,
  `question_id` int(11) NOT NULL,
  `quest_cat_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `question_joint`
--

INSERT INTO `question_joint` (`id`, `question_id`, `quest_cat_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 2),
(19, 19, 2),
(20, 20, 2),
(21, 21, 2),
(22, 22, 2),
(23, 23, 3),
(24, 24, 3),
(25, 25, 3),
(26, 26, 4),
(27, 27, 4),
(28, 28, 4),
(29, 29, 4),
(30, 30, 4),
(31, 31, 4),
(32, 32, 5),
(33, 33, 5),
(34, 34, 5),
(35, 35, 5),
(36, 36, 5),
(37, 37, 6),
(38, 38, 6),
(39, 39, 6),
(40, 40, 6),
(41, 41, 7),
(42, 42, 7),
(43, 43, 7),
(44, 44, 7),
(45, 45, 7),
(46, 46, 7),
(47, 47, 7),
(48, 48, 7),
(49, 49, 7),
(50, 50, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL auto_increment,
  `min` double NOT NULL,
  `max` double NOT NULL,
  `section` varchar(100) NOT NULL,
  `limits` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `min`, `max`, `section`, `limits`) VALUES
(1, 90, 100, 'Dignity', 30),
(2, 80, 90, 'Fedility', 30),
(3, 70, 80, 'Charity', 30),
(4, 60, 70, 'Faithful', 30),
(5, 50, 60, 'Kindness', 30),
(6, 40, 50, 'Humility', 30);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `raw_score` float NOT NULL,
  `total_score` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `students`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE IF NOT EXISTS `student_section` (
  `id` int(11) NOT NULL auto_increment,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `GWA` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_section`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`) VALUES
(1, 'English', ''),
(2, 'Science', 'Science and Technology'),
(3, 'Math', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `userlevels`
--

CREATE TABLE IF NOT EXISTS `userlevels` (
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `userlevels`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `Cnumber` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ULevel` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Mname`, `Lname`, `address`, `Cnumber`, `username`, `password`, `ULevel`, `status`) VALUES
(1, '', '', '', '', '', 'admin', 'admin', 5, '1'),
(2, 'Leo', 'Yap', 'Marapoc', 'Cogon Ormoc City Leyte', '09482086635', 'student', '12345', 1, '1');
