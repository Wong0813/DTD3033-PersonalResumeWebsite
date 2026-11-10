-- Database Schema and Sample Data for DTD3033 Personal Resume Website
-- Compatible with MySQL 5.7+ / MariaDB 10.3+

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for home
-- ----------------------------
DROP TABLE IF EXISTS `home`;
CREATE TABLE `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `introduction` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of home
-- ----------------------------
INSERT INTO `home` (`id`, `full_name`, `tagline`, `introduction`, `profile_image`) VALUES
(1, 'Wong Chun Liang', 'Software Engineer, Full-Stack Developer, Tech Enthusiast', 'Passionate educational software engineer dedicated to building efficient, reliable, and user-centric web applications and software systems.', 'uploads/1766208785_home_image.jpg');

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subtitle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `availability` varchar(100) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` (`id`, `subtitle`, `title`, `description`, `experience`, `degree`, `university`, `email`, `phone`, `availability`, `skills`) VALUES
(2, 'Get To Know More', 'About Me', 'I am an aspiring Software Engineer with a deep interest in full-stack development, modern database management, and interactive web application design.', '2+ Years Academic & Project Experience', 'Diploma in Information Technology', 'Southern University College', 'wongchunliang8158@gmail.com', '+60 11-1068 8158', 'Available for Internships / Full-time', '[{"name":"PHP / MySQL","level":"85%"},{"name":"HTML / CSS / Bootstrap","level":"90%"},{"name":"JavaScript","level":"80%"},{"name":"System Architecture","level":"75%"}]');

-- ----------------------------
-- Table structure for resume
-- ----------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subtitle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of resume
-- ----------------------------
INSERT INTO `resume` (`id`, `subtitle`, `title`, `description`, `experience`, `education`, `skills`) VALUES
(1, 'My Qualifications', 'Resume', 'Overview of educational background, hands-on development experience, and specialized skill sets.', '[{"title":"Educational Software Engineer","company":"Academic Projects","period":"2023 - Present","description":"Developed multi-tier management systems and database-backed web applications with responsive design and CRUD functionality."}]', '[{"degree":"Diploma in Information Technology","institution":"Southern University College","period":"2022 - 2025","description":"Focused on Software Engineering, Database Systems, Web Development, and Object-Oriented Programming."}]', '[{"category":"Backend","items":["PHP","MySQL","REST APIs"]},{"category":"Frontend","items":["HTML5","CSS3","JavaScript","Bootstrap"]}]');

-- ----------------------------
-- Table structure for portfolio
-- ----------------------------
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of portfolio
-- ----------------------------
INSERT INTO `portfolio` (`id`, `title`, `description`, `image`, `pdf`, `category`, `year`) VALUES
(1, 'Clinic Management System', 'A clinic operation management solution with patient records and appointment scheduling.', 'assets/img/portfolio/Clinic-Management-System.jpg', 'assets/file/profolio/Clinic Management System.pdf', 'system', 2024),
(2, 'Kolej Hostel Registration System', 'A web-based student hostel registration and room allocation management system.', 'assets/img/portfolio/Kolej_Registration_System.jpg', 'assets/file/profolio/Kolej Hostel Registration.pdf', 'system', 2024),
(3, 'Meta Event Application & SDD', 'An event organization platform with complete Software Design Documentation (SDD).', 'assets/img/portfolio/META EVENT LOGO.png', 'assets/file/profolio/META EVENT APPLICATION.docx.pdf', 'app', 2024);

-- ----------------------------
-- Table structure for contact_info
-- ----------------------------
DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of contact_info
-- ----------------------------
INSERT INTO `contact_info` (`id`, `address`, `phone`, `email`) VALUES
(1, 'Johor Bahru, Johor, Malaysia', '+60 11-1068 8158', 'wongchunliang8158@gmail.com');

-- ----------------------------
-- Table structure for contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
