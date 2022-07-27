-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 11:32 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jrapha`
--

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE IF NOT EXISTS `facts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `fact`) VALUES
(10, 'In a survey of 9th through 12th graders in 2011, 13.1 percent of the teens admitted to skipping breakfast in the past 7 days, while 11.3 percent had drunk 3+ servings of soda per day in the same time frame.'),
(9, 'An unhealthy diet leads to diseases like diabetes, hypertension, certain cancers, obesity, and micronutrient deficiencies.'),
(7, 'More than one-third of adults and over 12.5 million children and teens in the US are obese. In the last 30 years, obesity in children and teens has nearly tripled.'),
(8, 'One can of soda contains 10 teaspoons of sugar and the average American adult drinks 500 cans of soda every year, estimating about 52 pounds of sugar consumed in soft drinks alone.'),
(11, 'Breakfast is the most important meal of the day because it feeds your body and mind with the necessary nutrients and energy to function throughout the day. Eating breakfast regularly will also help keep weight off because it gets your metabolism going.'),
(12, 'In the same survey, more than 15 percent of the students were overweight, and more than 12 percent admitted to starving themselves for 24 hours or more in the last month in an attempt to lose weight.'),
(13, 'Rest is a very important aspect of living a healthy lifestyle. Teenagers need 9 or more hours of sleep per night for their bodies to function properly. Less than a third of high school students in 2011 reported getting 8 or more hours of sleep per night.'),
(14, 'Sleeping the right amount can prevent sickness, obesity, high blood pressure, and injury.'),
(15, 'Physical activity like aerobic exercise (walking, running), muscle-strengthening (weight-lifting), bone-strengthening (jumping rope), and balance and stretching activities (yoga, pilates, dancing) are especially beneficial to a healthy body.'),
(16, 'The more fresh foods you consume, the healthier you will be. Foods that do not expire contain unnatural preservatives, additives, and chemicals that deteriorate your body. Focus on fruits, vegetables, lean meats, whole grains, low-fat dairies, and above all, moderation in whatever you eat.'),
(17, 'Snacking is important. By eating small meals or snacks throughout the day, you will keep your metabolism up and running to burn the calories you eat. Smart snacking means cutting out the vending machine chips and candy bars and adding in the granola, bagged fruits or veggies, protein bars, or nuts.'),
(18, 'Depending upon the amount of physical activity you do, you can calculate how many calories per day are healthy for your weight and lifestyle. For teens, the average recommended caloric intake is 2,100 calories, but it is important to base your diet on your activity.'),
(19, 'The harmful use of alcohol results in 2.5 million deaths each year.'),
(20, '320 000 young people between the age of 15 and 29 die from alcohol-related causes, resulting in 9% of all deaths in that age group.'),
(21, 'Alcohol is the worldâ€™s third largest risk factor for disease burden; it is the leading risk factor in the Western Pacific and the Americas and the second largest in Europe.'),
(22, 'Alcohol is associated with many serious social and developmental issues, including violence, child neglect and abuse, and absenteeism in the workplace.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `description` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` char(70) NOT NULL,
  `image2` char(70) NOT NULL,
  `image3` char(70) NOT NULL,
  `image4` char(70) NOT NULL,
  `image5` char(70) NOT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `image` (`image`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `time_created`, `image`, `image2`, `image3`, `image4`, `image5`, `added_by`) VALUES
(25, 'Phamacy', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2014-02-10 00:32:52', '24396508.jpeg', '57251404.jpeg', '91424647.jpeg', '39026489.jpeg', '71539591.jpeg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(70) NOT NULL DEFAULT '''Bespoke Vacations''',
  `image` char(100) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `time_created`) VALUES
(19, 'J-Rapha Hospital', '81784240.jpeg', '2014-02-06 11:00:16'),
(20, 'J-Rapha Hospital (Professional Staffs)', '15393912.jpeg', '2014-02-06 11:01:47'),
(23, 'J-Rapha Hospital', '59628700.jpeg', '2014-02-09 23:52:03'),
(21, 'J-Rapha Hospital (Caring For The Elderly)', '85229640.jpeg', '2014-02-06 11:04:58'),
(22, 'J-Rapha Hospital', '20743590.jpeg', '2014-02-09 23:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(40) NOT NULL,
  `password` char(60) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `rank` enum('Super','Regular') NOT NULL DEFAULT 'Regular',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `time_created`, `username`, `rank`) VALUES
(11, 'admin@gmail.com', '$2a$07$salt$$$$$$$$$$$$$$$$$.pqCpoLjJBWIF3xn46INN7h00EPIFzDu', '2014-01-30 00:07:06', 'Admin', 'Super'),
(8, 'greendublin007@gmail.com', '$2a$07$salt$$$$$$$$$$$$$$$$$.pqCpoLjJBWIF3xn46INN7h00EPIFzDu', '2014-01-22 11:50:00', 'GreenDev', 'Super');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `end_date` char(50) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `end_date`, `description`, `requirements`, `time_created`) VALUES
(1, '14/02/2014', 'Doctor ', 'Bsc in Biology', '2014-02-04 02:31:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
