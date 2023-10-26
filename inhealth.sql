-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2022 at 03:17 AM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0=>menu,1=>submenu',
  `status` tinyint(4) NOT NULL COMMENT '1=>Active, 2=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_pages`
--

CREATE TABLE `admin_pages` (
  `pid` int(11) NOT NULL,
  `page_slug` text CHARACTER SET utf8,
  `page_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `page_name` text,
  `meta_title` text CHARACTER SET utf8,
  `meta_desc` text CHARACTER SET utf8,
  `meta_keywords` text CHARACTER SET utf8,
  `page_desc` text CHARACTER SET utf8,
  `sor_desc` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pages`
--

INSERT INTO `admin_pages` (`pid`, `page_slug`, `page_title`, `page_name`, `meta_title`, `meta_desc`, `meta_keywords`, `page_desc`, `sor_desc`, `created`, `modified`, `is_active`) VALUES
(3, 'about-us', 'Welcome to <big>InHealth</big>', 'About Us', 'About Us', 'About Us', 'About Us', '<p>The use of telemedicine to deliver medical care to the nation&rsquo;s populace offers tremendous benefits which include improved medical care reach, patient treatment in their home communities, expanded emergency services in rural communities, cost savings in time and travel expenses, access to specialists in cities from remote locations and reduction in cost of establishing and running health centre&rsquo;s in these remote locations amongst others.</p>\r\n\r\n<p>&nbsp;Inhealth intends to achieve the building of telemedicine network and its wide usage to deliver medical services, integrate telemedicine into clinical practice in Nigeria, create participation of medical health insurance schemes in insuring telemedicine, removal of barriers to telemedicine practice, and public/private collaboration in telemedicine delivery.</p>\r\n\r\n<h3><a name=\"_Toc381792909\">Vision</a></h3>\r\n\r\n<p>To improve access to affordable health care, and quality of health care delivered to Nigerians in any location, in line with the actualization of the 2015 Millennium Development Goals (MDGs) Articles (4) (5) and (6).</p>\r\n\r\n<h3><a name=\"_Toc381792910\">Mission</a></h3>\r\n\r\n<p>We will facilitate the deployment of telemedicine services in the six geo-political regions of Nigeria with great emphasis on:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;home telemedicine and vital signs monitoring</li>\r\n	<li>&nbsp;telemedicine for organizations</li>\r\n	<li>&nbsp;rural and underserved communities</li>\r\n</ol>\r\n\r\n<p>We will use internet protocol based communication, telecommunication infrastructure and video conferencing to any extent possible</p>\r\n\r\n<p>We will broaden our scope to home vital signs monitoring and telemedicine for organizations with health insurance coverage.</p>\r\n\r\n<h3><a name=\"_Toc381792911\">Guiding Principles for the telemedicine network</a></h3>\r\n\r\n<ol>\r\n	<li>We will collaborate with all stakeholders to ensure the success of this telemedicine initiative</li>\r\n	<li>Telemedicine will be integrated into the Nigeria healthcare system and will support other initiatives</li>\r\n	<li>Health care providers, participators and general public will be educated on the tremendous benefits of telemedicine</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 'If you need a doctor for to consectetuer Lorem ipsum dolor, consectetur adipiscing elit. Ut volutpat eros adipiscing nonummy.Lorem ipsum dolor amet,', '2015-02-27 07:41:12', '2015-12-24 13:28:27', 1),
(4, 'term-conditions', '', 'Term & conditions', 'Term & conditions', 'Term & conditions', 'Term & conditions', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur auctor nunc, sit amet volutpat nibh. Nunc feugiat, nunc id posuere egestas, mauris nisi viverra nibh, at elementum risus ligula vitae urna. Praesent eget nibh sit amet leo tincidunt facilisis non eu nisi. Nam sed diam erat. Proin malesuada vestibulum bibendum. Sed accumsan ante sapien, vel volutpat arcu volutpat sit amet. Integer tincidunt tempor nulla eu consectetur. Nam vitae venenatis dui, sed dictum nisi. Etiam sagittis ullamcorper ligula quis hendrerit.</p>\r\n\r\n<p>Curabitur blandit enim ut leo cursus viverra. Ut elementum mi id massa pharetra feugiat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce in ultrices mi. Etiam vehicula dui auctor justo imperdiet, a rutrum ligula vehicula. Sed rhoncus facilisis aliquet. Aliquam luctus justo eget libero vehicula, non mollis erat convallis. Phasellus risus urna, posuere id magna id, maximus tincidunt elit. Pellentesque in neque vitae ante ornare malesuada non congue dolor. Duis pellentesque scelerisque aliquet. In hac habitasse platea dictumst. Phasellus magna lacus, viverra eu est a, maximus vehicula lorem. Pellentesque eget erat imperdiet, malesuada felis sed, auctor lectus. Suspendisse sit amet arcu accumsan, interdum mi nec, vulputate turpis. Fusce consectetur nec leo et consequat. Ut vehicula tristique ante vel imperdiet.</p>\r\n\r\n<p>Nulla laoreet malesuada libero sed lobortis. Aliquam dignissim euismod luctus. Quisque et rhoncus diam. Integer turpis nulla, dictum ut maximus vel, mattis dictum lorem. In at vulputate dolor, vitae consectetur est. Donec congue risus faucibus magna rhoncus tristique. Morbi id ex a dui fermentum gravida at fermentum leo. Maecenas metus dui, congue sed erat non, vulputate pulvinar nisl. Maecenas eu augue id elit fermentum convallis. Etiam arcu est, elementum ac aliquam at, pellentesque ac sapien.</p>\r\n\r\n<p>Pellentesque dapibus suscipit urna. Praesent consectetur vitae arcu vel consectetur. Phasellus venenatis nisl ligula, nec iaculis tortor rhoncus et. Vivamus augue erat, finibus eget eros nec, finibus convallis quam. Curabitur volutpat, turpis non mattis semper, nisl sem convallis lectus, eu varius neque justo sed sapien. In commodo commodo urna in aliquam. In id leo eget odio tristique accumsan. In vestibulum justo in magna interdum, ut varius lacus porta. Nulla ut ante luctus, pellentesque massa faucibus, consectetur turpis. Ut in erat vel mauris ultrices gravida. Praesent eget lorem quis elit viverra commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam dolor odio, convallis sit amet pellentesque quis, auctor eget nulla. Sed vitae erat dapibus est fermentum pretium.</p>\r\n\r\n<p>Donec felis metus, aliquam quis consectetur eu, vehicula at elit. Aenean aliquet turpis eget ligula venenatis, eget dictum nulla consectetur. Aliquam tristique pellentesque rhoncus. Nam ut pulvinar libero, eu laoreet massa. Nulla eleifend lorem velit, ut hendrerit eros maximus eget. Nunc vehicula, nunc eget dignissim gravida, odio est tincidunt diam, eu accumsan tortor turpis et nunc. Maecenas pretium, nibh id ullamcorper tincidunt, eros diam lobortis dui, et finibus mauris dolor ut est. Aliquam bibendum non tellus ut tincidunt. Integer posuere est nec massa lobortis pharetra. Etiam tincidunt purus nunc, ut facilisis purus luctus quis. Donec vitae vehicula eros. Sed tempus massa id semper tempor. Duis eu nisl at lacus suscipit vulputate elementum et sem.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur auctor nunc, sit amet volutpat nibh. Nunc feugiat, nunc id posuere egestas, mauris nisi viverra nibh, at elementum risus ligula vitae urna. ', '2015-07-08 12:04:41', '2016-01-08 15:44:12', 1),
(5, 'whats-new-in-medicalpro', 'news', 'WHATâ€™S NEW IN MEDICALPRO', '', '', '', '<p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>\r\n', 'Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.', '2015-12-16 07:41:34', '2015-12-16 12:00:36', 1),
(6, 'product', 'product', 'product', '', '', '', '<p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>\r\n', 'Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.', '2015-12-16 07:42:31', '2015-12-16 11:44:13', 1),
(7, 'telehealth-solutions', 'Telehealth Solutions', 'Telehealth Solutions', '', '', '', '<p>Telemedicine is the ability to provide interactive healthcare utilizing modern technology and telecommunications.</p>\r\n\r\n<p>Telemedicine can also be seen as a means of providing clinical healthcare at a distance by the use of telecommunications and information technology. It helps eliminates distance barrier, and make for improved medical services to areas that will ordinarily not be reached. For example, some rural areas in Nigeria may never have access to quality health care services because doctors may never want to live in these areas. Specialist care will also be far from many.</p>\r\n\r\n<p>Telemedicine is massively utilized in many developing countries such as India, China, Indonesia, and South Africa which all have similar population density and economic</p>\r\n\r\n<p>Telemedicine involves videoconferencing, transmission of still images, e-health including patient portals, remote monitoring of vital signs, continuing medical education and nursing call centers.</p>\r\n\r\n<p>Telemedicine is a means of facilitating patient consultations with doctors and specialists real time over video and still pictures for immediate diagnosis and follow up treatment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><a name=\"_Toc381792902\">Benefits of Telehealth</a></h2>\r\n\r\n<h3><a name=\"_Toc381792903\"> To individual patients</a></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Improved access to specialist (tertiary and Secondary) and general (primary) medical care</li>\r\n	<li>Improved medical reach to underserved individuals and areas and communities.</li>\r\n	<li>Time and cost saving from considerable reduction in time spent, travel expenses and admission cost</li>\r\n	<li>Early diagnosis</li>\r\n	<li>Community wide patient education courses (Antenatal, postnatal, tobacco addition, sexually transmitted diseases and various common disease prevention and management etc)</li>\r\n	<li>Improved home health care, vital signs monitoring and post surgery care and follow up.</li>\r\n	<li>Better access to medical education and training for medical practitioners</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Employment opportunities.</li>\r\n	<li>\r\n	<h3><a name=\"_Toc381792904\">To Provider </a></h3>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>Better health management and outcomes from patients</li>\r\n	<li>Considerable reduction in critical cases as patients in the rural areas are motivated to seek early medical help</li>\r\n	<li>Improved communication, information sharing and virtual medical training for medical practitioners and specialists.</li>\r\n	<li>Enhanced community confidence in local healthcare</li>\r\n	<li>Improved collaboration among providers</li>\r\n</ol>\r\n\r\n<p><strong>Becoming a Provider</strong></p>\r\n\r\n<p>Inhealth is searching for healthcare providers located within West Africa to engage in telehealth consultations with our patients in:</p>\r\n\r\n<ol>\r\n	<li>General Consulting</li>\r\n	<li>Pediatrics</li>\r\n	<li>Cardiology</li>\r\n	<li>Immunization</li>\r\n	<li>Pathology</li>\r\n	<li>Radiology</li>\r\n	<li>Pharmacy</li>\r\n	<li>Nursing</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are interested in dynamic medical providers who have the desire and creativity to see patients while using the latest advances in telemedicine, telecommunications and streaming video technology</p>\r\n\r\n<p>Inhealth will interest you if you desire a system that has</p>\r\n\r\n<p>Online Scheduling</p>\r\n\r\n<p>Work from home, the office or anywhere.<br />\r\nOur convenient inhealth online scheduling system allows you to be available anytime, from anywhere.</p>\r\n\r\n<p><strong>&nbsp;Increased Revenue</strong></p>\r\n\r\n<p>Free up exam rooms and office staff while shifting routine encounters into shorter online visits and monetizing your expertise off-hours.</p>\r\n\r\n<p><strong>Better Patient Care</strong></p>\r\n\r\n<p>Improve quality of care, compliance, convenience of treatment and patient satisfaction by improving access to care.</p>\r\n\r\n<p>&nbsp;<strong>Technology</strong></p>\r\n\r\n<p>Inhealth can assist your medical practice increase efficiency by delivering more services with your current resources in a safe and secure way</p>\r\n\r\n<h3><a name=\"_Toc381792905\">To Governments</a></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>It will help governments in the actualization of the 2015 Millennium Development Goals (MDGs) Articles (4) (5) and (6) goals for health delivery</li>\r\n	<li>It considerably reduces the cost of establishing health centers&nbsp; and the overhead cost involved for salaries and running cost of these centers</li>\r\n	<li>It improves the work efficiency for medical practitioners as it improves the number of patients they can attend to.</li>\r\n	<li>Its creates a wow effect on the rural population and endears their hearts to the facilitators of the project which will be very useful in the upcoming elections</li>\r\n	<li>Governments can easily get funding for it from international donor organizations</li>\r\n	<li>Helps local communities retain their financial resources within.</li>\r\n	<li>It has been proven that telemedicine consultations for prisoners have tremendously improved their wellbeing with about 70% reduction in cost of medical care if a doctor were to visit.</li>\r\n</ol>\r\n', 'Telehealth Solutions', '2015-12-16 07:52:24', '2015-12-24 11:41:10', 1),
(8, 'contact-us-', 'CONTACT US', 'CONTACT US ', '', '', '', '<p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>\r\n', 'Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.', '2015-12-16 07:53:02', '2015-12-16 11:44:42', 1),
(9, 'news-detail', 'WHATâ€™S NEW IN MEDICALPRO', 'News Detail', '', '', '', '<p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>\r\n', 'Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.', '2015-12-16 12:53:23', '2015-12-16 12:53:23', 1),
(10, 'privacy', '', 'Privacy', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur auctor nunc, sit amet volutpat nibh. Nunc feugiat, nunc id posuere egestas, mauris nisi viverra nibh, at elementum risus ligula vitae urna. Praesent eget nibh sit amet leo tincidunt facilisis non eu nisi. Nam sed diam erat. Proin malesuada vestibulum bibendum. Sed accumsan ante sapien, vel volutpat arcu volutpat sit amet. Integer tincidunt tempor nulla eu consectetur. Nam vitae venenatis dui, sed dictum nisi. Etiam sagittis ullamcorper ligula quis hendrerit.</p>\r\n\r\n<p>Curabitur blandit enim ut leo cursus viverra. Ut elementum mi id massa pharetra feugiat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce in ultrices mi. Etiam vehicula dui auctor justo imperdiet, a rutrum ligula vehicula. Sed rhoncus facilisis aliquet. Aliquam luctus justo eget libero vehicula, non mollis erat convallis. Phasellus risus urna, posuere id magna id, maximus tincidunt elit. Pellentesque in neque vitae ante ornare malesuada non congue dolor. Duis pellentesque scelerisque aliquet. In hac habitasse platea dictumst. Phasellus magna lacus, viverra eu est a, maximus vehicula lorem. Pellentesque eget erat imperdiet, malesuada felis sed, auctor lectus. Suspendisse sit amet arcu accumsan, interdum mi nec, vulputate turpis. Fusce consectetur nec leo et consequat. Ut vehicula tristique ante vel imperdiet.</p>\r\n\r\n<p>Nulla laoreet malesuada libero sed lobortis. Aliquam dignissim euismod luctus. Quisque et rhoncus diam. Integer turpis nulla, dictum ut maximus vel, mattis dictum lorem. In at vulputate dolor, vitae consectetur est. Donec congue risus faucibus magna rhoncus tristique. Morbi id ex a dui fermentum gravida at fermentum leo. Maecenas metus dui, congue sed erat non, vulputate pulvinar nisl. Maecenas eu augue id elit fermentum convallis. Etiam arcu est, elementum ac aliquam at, pellentesque ac sapien.</p>\r\n\r\n<p>Pellentesque dapibus suscipit urna. Praesent consectetur vitae arcu vel consectetur. Phasellus venenatis nisl ligula, nec iaculis tortor rhoncus et. Vivamus augue erat, finibus eget eros nec, finibus convallis quam. Curabitur volutpat, turpis non mattis semper, nisl sem convallis lectus, eu varius neque justo sed sapien. In commodo commodo urna in aliquam. In id leo eget odio tristique accumsan. In vestibulum justo in magna interdum, ut varius lacus porta. Nulla ut ante luctus, pellentesque massa faucibus, consectetur turpis. Ut in erat vel mauris ultrices gravida. Praesent eget lorem quis elit viverra commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam dolor odio, convallis sit amet pellentesque quis, auctor eget nulla. Sed vitae erat dapibus est fermentum pretium.</p>\r\n\r\n<p>Donec felis metus, aliquam quis consectetur eu, vehicula at elit. Aenean aliquet turpis eget ligula venenatis, eget dictum nulla consectetur. Aliquam tristique pellentesque rhoncus. Nam ut pulvinar libero, eu laoreet massa. Nulla eleifend lorem velit, ut hendrerit eros maximus eget. Nunc vehicula, nunc eget dignissim gravida, odio est tincidunt diam, eu accumsan tortor turpis et nunc. Maecenas pretium, nibh id ullamcorper tincidunt, eros diam lobortis dui, et finibus mauris dolor ut est. Aliquam bibendum non tellus ut tincidunt. Integer posuere est nec massa lobortis pharetra. Etiam tincidunt purus nunc, ut facilisis purus luctus quis. Donec vitae vehicula eros. Sed tempus massa id semper tempor. Duis eu nisl at lacus suscipit vulputate elementum et sem.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur auctor nunc, sit amet volutpat nibh. Nunc feugiat, nunc id posuere egestas, mauris nisi viverra nibh, at elementum risus ligula vitae urna.', '2015-12-16 13:27:39', '2015-12-16 13:36:26', 1),
(11, 'product-detail', 'product detail', 'product detail', 'product detail', 'product detail', 'product detail', '<p>product detail</p>\r\n', 'Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.', '2015-12-17 11:48:56', '2015-12-17 11:48:56', 1),
(12, 'employers', 'Employers', 'Employers', 'Employers', 'Employers', 'Employers', '<p><strong>Welcome Employers</strong>!</p>\r\n', 'Employers', '2015-12-24 11:55:48', '2015-12-24 13:10:48', 1),
(13, 'individual-family', 'Individual/Family', 'Individual/Family', 'Individual/Family', 'Individual/Family', 'Individual/Family', '<p>Welcome &nbsp;Individual/Family</p>\r\n', 'Individual/Family', '2015-12-24 12:12:12', '2015-12-24 12:12:12', 1),
(14, 'remote-clinic', 'Remote Clinic', 'Remote Clinic', 'Remote Clinic', 'Remote Clinic', 'Remote Clinic', '<p>Welcome&nbsp;Remote Clinic</p>\r\n', 'Remote Clinic', '2015-12-24 12:12:58', '2015-12-24 12:12:58', 1),
(15, 'health-provider', 'Health Provider', 'Health Provider', 'Health Provider', 'Health Provider', 'Health Provider', '<p>Welcome&nbsp;Health Provider</p>\r\n', 'Health Provider', '2015-12-24 12:13:40', '2016-01-08 16:37:12', 1),
(17, 'patient-dashboard-content', 'Welcome to Dashboard', 'patient Dashboard Content', '', '', '', '<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office.</p>\r\n', '', '2016-01-08 16:42:52', '2016-01-08 16:42:52', 1),
(18, 'hospital-dashboard-content', 'Welcome to Dashboard', 'hospital Dashboard Content', '', '', '', '<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office.</p>\r\n', '', '2016-01-08 17:12:55', '2016-01-08 17:12:55', 1),
(19, 'newsletter', 'Newsletter', 'Newsletter', '', '', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n', 'Newsletter  is simply dummy text of the printing and typesetting industry.', '2016-01-08 17:29:50', '2016-01-08 17:29:50', 1),
(20, 'faq', 'Frequently Asked Questions', 'Faq', '', '', '', '<p>These Are the frequently Asked Questions!</p>\r\n', '', '2016-02-12 16:25:58', '2016-02-12 16:25:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `uid` int(11) NOT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `mail_id` varchar(250) DEFAULT NULL,
  `user_id` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0=No, 1= Yes',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`uid`, `full_name`, `mail_id`, `user_id`, `pass`, `is_active`, `created`) VALUES
(2, 'Super Admin', 'admin@admin.com', 'admin', 'admin@123!', 1, '2015-01-16 08:27:40'),
(3, 'admin1', 'admin1@gmail.com', 'admin1', '123456', 1, '2015-03-04 05:48:44'),
(4, 'test', 'test@123.com', 'test123', '123456', 1, '2016-01-08 11:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `locationid` int(11) DEFAULT NULL,
  `serviceid` varchar(200) DEFAULT NULL,
  `patientid` int(11) DEFAULT NULL,
  `doctorid` int(11) DEFAULT NULL,
  `hospitalid` int(11) DEFAULT '0',
  `appointment_date` date DEFAULT NULL,
  `appointment_availbility` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 for "Pending", 1 for "Confirm", 2 for "Cancel"',
  `join_status` int(11) DEFAULT '0' COMMENT '''0'' for not joined, ''1'' for create joined, ''2'' for joined, ''3'' for end joined',
  `session_status_type` varchar(5) DEFAULT NULL COMMENT 'P=patient,D=Doctor',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `locationid`, `serviceid`, `patientid`, `doctorid`, `hospitalid`, `appointment_date`, `appointment_availbility`, `status`, `join_status`, `session_status_type`, `created`, `modified`) VALUES
(8, 7, '5,6', 7, 13, 0, '2016-01-05', 24, 1, 3, 'D', '2015-12-24 13:11:41', '2016-01-05 11:44:58'),
(9, 7, '5,6', 16, 13, 0, '2015-12-23', 23, 1, 0, NULL, '2015-12-24 13:20:42', '2015-12-24 13:20:42'),
(10, 5, '5,6', 7, 13, 0, '2015-12-25', 25, 1, 0, NULL, '2015-12-28 15:17:34', '2015-12-28 15:17:34'),
(13, 2, '5,6', 7, 13, 0, '2015-12-28', 26, 1, 0, NULL, '2015-12-28 15:27:19', '2016-01-08 15:24:35'),
(14, 1, '7', 7, 13, 0, '2015-12-31', 28, 1, 0, NULL, '2015-12-29 12:24:51', '2015-12-29 12:24:51'),
(15, 1, '5,6', 6, 13, 30, '2016-01-02', 29, 1, 0, NULL, '2016-01-04 16:09:46', '2016-01-13 13:17:02'),
(16, 1, '5,6', 7, 28, 0, '2016-01-07', 30, 1, 2, 'D', '2016-01-06 17:55:49', '2016-01-07 11:20:08'),
(17, 6, '6', 7, 13, 0, '2016-01-13', 33, 1, 0, '', '2016-01-08 12:15:35', '2016-01-12 20:30:20'),
(20, 1, '5', 36, 13, 0, '2016-01-16', 39, 1, 0, NULL, '2016-01-14 11:48:56', '2016-01-14 11:48:56'),
(21, 1, '5', 6, 13, 0, '2016-01-16', 40, 1, 0, NULL, '2016-01-14 11:50:59', '2016-01-14 11:50:59'),
(25, 1, '5', 6, 13, 0, '2016-01-29', 53, 1, 2, 'D', '2016-01-29 19:58:02', '2016-01-29 20:11:17'),
(26, 1, '5', 36, 37, 0, '2016-02-02', 54, 1, 2, 'P', '2016-02-02 14:57:27', '2016-02-02 14:58:55'),
(27, 11, '5', 6, 13, 0, '2016-02-11', 55, 0, 0, NULL, '2016-02-05 21:07:35', '2016-02-05 21:07:35'),
(28, 5, '11', 6, 51, 0, '2016-02-15', 56, 1, 0, NULL, '2016-02-15 14:19:05', '2016-02-15 18:50:27'),
(29, 1, '11', 49, 51, 0, '2016-02-16', 58, 1, 0, NULL, '2016-02-15 14:23:24', '2016-02-15 18:51:31'),
(30, 1, '11', 52, 51, 0, '2016-02-17', 59, 1, 0, NULL, '2016-02-15 21:07:55', '2016-02-15 21:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `assign_services`
--

CREATE TABLE `assign_services` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT '0',
  `serviceid` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_services`
--

INSERT INTO `assign_services` (`id`, `userid`, `serviceid`) VALUES
(67, 28, 5),
(68, 28, 6),
(69, 28, 9),
(70, 28, 10),
(71, 28, 11),
(72, 28, 12),
(75, 35, 9),
(76, 35, 11),
(85, 37, 5),
(86, 37, 6),
(111, 13, 5),
(112, 13, 6),
(113, 13, 7),
(114, 13, 8),
(118, 48, 5),
(119, 48, 6),
(120, 46, 7),
(121, 51, 11);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `banner_caption` text NOT NULL,
  `banner_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `orderno` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_title`, `banner_caption`, `banner_img`, `status`, `orderno`, `created`) VALUES
(4, 'Banner 44', 'Banner 44', '1450087885banner1.jpg', 1, 0, '2015-02-23 14:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `cid` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `chat_message` text,
  `read_status` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes',
  `is_attachment` smallint(1) DEFAULT '0' COMMENT '0=No, 1=Yes',
  `attachment_path` text,
  `clear_by_from` int(11) NOT NULL DEFAULT '0',
  `clear_by_to` int(11) NOT NULL,
  `chat_date` datetime DEFAULT NULL,
  `clear_status` enum('0','1') NOT NULL,
  `action` int(11) NOT NULL,
  `stratus` varchar(255) NOT NULL,
  `hidden_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`cid`, `from_id`, `to_id`, `chat_message`, `read_status`, `is_attachment`, `attachment_path`, `clear_by_from`, `clear_by_to`, `chat_date`, `clear_status`, `action`, `stratus`, `hidden_id`) VALUES
(1, 7, 13, 'good morning sir<br><br>', 1, 0, NULL, 0, 0, '2016-01-05 11:46:07', '0', 0, '', 0),
(2, 13, 7, 'good morning<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-05 11:46:50', '0', 0, '', 0),
(3, 13, 7, 'what is the issue??<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-05 11:49:31', '0', 0, '', 0),
(4, 7, 13, 'Feeling Lazy<br><br>', 1, 0, NULL, 0, 0, '2016-01-05 11:49:53', '0', 0, '', 0),
(5, 7, 28, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-07 11:40:20', '0', 0, '', 0),
(6, 7, 13, '<a href=# onclick=webcamAccepted(\'samuel\',\'8345ea2f105b8b307cbd47372480e3be7de45538be5e88abb7803b281281012c\')>Click to accept webcam from </a>samuel for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-12 22:54:21', '0', 1, '8345ea2f105b8b307cbd47372480e3be7de45538be5e88abb7803b281281012c', 7),
(7, 7, 13, '<a href=# onclick=webcamAccepted(\'samuel\',\'20a219fa37b8dac3cff811caedbdb8a5feb817c77f8482acb3feba24004736f5\')>Click to accept webcam from </a>samuel for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-12 22:57:04', '0', 1, '20a219fa37b8dac3cff811caedbdb8a5feb817c77f8482acb3feba24004736f5', 7),
(8, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'3cd5ff07e92a0ea630581ba85f266c0b3c21828a6919a93db525af75c0248f95\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-21 02:18:46', '0', 1, '3cd5ff07e92a0ea630581ba85f266c0b3c21828a6919a93db525af75c0248f95', 46),
(9, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'1612c304e395737a892695f2477806b3303d2972d38940f019ef9795d871a610\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-21 02:20:10', '0', 1, '1612c304e395737a892695f2477806b3303d2972d38940f019ef9795d871a610', 46),
(10, 46, 6, 'Hiiii<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-21 02:22:07', '0', 0, '', 0),
(11, 6, 2, '<a href=# onclick=webcamAccepted(\'david\',\'4e445848f60aef0ff6b176462f4f626ce37e3556610d7558c690776a0d8445ef\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-21 02:57:38', '0', 1, '4e445848f60aef0ff6b176462f4f626ce37e3556610d7558c690776a0d8445ef', 6),
(12, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'922febc02586d24da0583c242b82ad13cce351c210a9c98f99a87def9117690f\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-22 01:48:28', '0', 1, '922febc02586d24da0583c242b82ad13cce351c210a9c98f99a87def9117690f', 46),
(13, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'b550102bce6f9705ecdf94fa0e1b9d031dff8d8575484d7705f3cf285acc1e7a\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-22 01:49:11', '0', 1, 'b550102bce6f9705ecdf94fa0e1b9d031dff8d8575484d7705f3cf285acc1e7a', 46),
(14, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'310f4294dbeafee2b7c58e33ec74f71a699ceef0ed70a96c193c51fb4f92c128\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-22 01:50:16', '0', 1, '310f4294dbeafee2b7c58e33ec74f71a699ceef0ed70a96c193c51fb4f92c128', 46),
(15, 46, 2, '<a href=# onclick=webcamAccepted(\'kennedy\',\'919394f757df246bb52b1bd3fd7e3219e057d1b56b5940627f168b02ee739a33\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-22 01:51:07', '0', 1, '919394f757df246bb52b1bd3fd7e3219e057d1b56b5940627f168b02ee739a33', 46),
(16, 7, 48, 'hi alex<br><br>', 1, 0, NULL, 0, 0, '2016-01-22 23:56:54', '0', 0, '', 0),
(17, 48, 7, 'hi sammy<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-22 23:57:03', '0', 0, '', 0),
(18, 7, 48, '<a href=# onclick=webcamAccepted(\'samuel\',\'064ccd8eabccca8af17f7b4fe30e381e9201b8f1ab64ec83be277dce9b950e24\')>Click to accept webcam from </a>samuel for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-22 23:58:02', '0', 1, '064ccd8eabccca8af17f7b4fe30e381e9201b8f1ab64ec83be277dce9b950e24', 7),
(19, 48, 1, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'10869c21bde4d5b316b1dba7fe81a3ca64a817d3f484338aacb9d34c5e8709c3\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-23 00:00:31', '0', 1, '10869c21bde4d5b316b1dba7fe81a3ca64a817d3f484338aacb9d34c5e8709c3', 48),
(20, 48, 1, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'57ae113ce04736659522c2e9d03c95b3e783802cf7062b33e4da266767c3b449\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-23 00:01:15', '0', 1, '57ae113ce04736659522c2e9d03c95b3e783802cf7062b33e4da266767c3b449', 48),
(21, 7, 48, '<a href=# onclick=webcamAccepted(\'samuel\',\'723c4c49da3e38328302de1a8c53676ba245fe55293768c9fe547825602e4eb2\')>Click to accept webcam from </a>samuel for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-23 00:01:54', '0', 1, '723c4c49da3e38328302de1a8c53676ba245fe55293768c9fe547825602e4eb2', 7),
(22, 48, 1, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'e41e264fa7ad0e859a34dae505703761ed7207d1baa933091b6bf8196d2f9c46\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-23 00:02:16', '0', 1, 'e41e264fa7ad0e859a34dae505703761ed7207d1baa933091b6bf8196d2f9c46', 48),
(23, 46, 6, 'hello<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-26 11:32:59', '0', 0, '', 0),
(24, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'fabc012e5147f0a393e5517dab31e3fcdb4f352604500a570172132b90dba8c1\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-26 11:37:34', '0', 1, 'fabc012e5147f0a393e5517dab31e3fcdb4f352604500a570172132b90dba8c1', 46),
(25, 6, 46, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-28 01:03:33', '0', 0, '', 0),
(26, 6, 46, 'how are u today<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-28 01:03:43', '0', 0, '', 0),
(27, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'3883311b2244e79a2776737e5898130106abef0ead852bd64b9ba1bfcc42ef49\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 01:04:10', '0', 1, '3883311b2244e79a2776737e5898130106abef0ead852bd64b9ba1bfcc42ef49', 6),
(28, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'5a9a5128a5a23f103adedb4d6931cb3d44f8c4335aa4be4068c13f3c561f8a5b\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 01:04:46', '0', 1, '5a9a5128a5a23f103adedb4d6931cb3d44f8c4335aa4be4068c13f3c561f8a5b', 46),
(29, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'761ac4b20864491ed93fc905ff2eac6e7c494eec92dbfa729e9216c188c7ad48\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 01:06:02', '0', 1, '761ac4b20864491ed93fc905ff2eac6e7c494eec92dbfa729e9216c188c7ad48', 46),
(30, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'e40d602774a234407051e9e62ed04f10bca5ad9b6a8e049ab684b821d6016f37\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 01:07:28', '0', 1, 'e40d602774a234407051e9e62ed04f10bca5ad9b6a8e049ab684b821d6016f37', 6),
(31, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'e3e7b762236f0a11e0ee2eae670e2271b7acf9fde0d965df607bb135ce83f498\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 01:09:50', '0', 1, 'e3e7b762236f0a11e0ee2eae670e2271b7acf9fde0d965df607bb135ce83f498', 46),
(32, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'89b971e9829941c68ad8fd230f16a9e80af71c54c9666b719b1dd17da2e66cab\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:41:38', '0', 1, '89b971e9829941c68ad8fd230f16a9e80af71c54c9666b719b1dd17da2e66cab', 46),
(33, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'01712a0e801404a1367935333c438c10601de4ea3b54f864c31fd06d294e9911\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:43:19', '0', 1, '01712a0e801404a1367935333c438c10601de4ea3b54f864c31fd06d294e9911', 6),
(34, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'5f08c0cc8147141c084b94d61daf706db9cbbf6b4d5a371f872f0ec4c751945f\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:45:34', '0', 1, '5f08c0cc8147141c084b94d61daf706db9cbbf6b4d5a371f872f0ec4c751945f', 6),
(35, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'f649a29a913c1e2c1c3326b2cb056c41dbce5834285e06d540fae1c59e959e62\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:46:25', '0', 1, 'f649a29a913c1e2c1c3326b2cb056c41dbce5834285e06d540fae1c59e959e62', 6),
(36, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'24fb95a30bdfcb77b41ec90325e9899c33479880a3bc91883ab6539088cbdc80\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:49:26', '0', 1, '24fb95a30bdfcb77b41ec90325e9899c33479880a3bc91883ab6539088cbdc80', 6),
(37, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'09b3963e3e144229b83d2f456c8bb78bf24fb0186a502f67fde006e953760c76\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:53:47', '0', 1, '09b3963e3e144229b83d2f456c8bb78bf24fb0186a502f67fde006e953760c76', 6),
(38, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'348c134f61bbdca3092c25c3ca27085c0b5ebe7a62b65c289ed74d4accc00a39\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:57:40', '0', 1, '348c134f61bbdca3092c25c3ca27085c0b5ebe7a62b65c289ed74d4accc00a39', 6),
(39, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'a5e9375e94e01891d541b349412c3d2dbe83d409101b72fd939ec3db2e518f79\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:58:17', '0', 1, 'a5e9375e94e01891d541b349412c3d2dbe83d409101b72fd939ec3db2e518f79', 6),
(40, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'e53226f5a42373f56afed049d70859a03ccd1e3e5336846606fa187d361f8bb4\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 05:59:29', '0', 1, 'e53226f5a42373f56afed049d70859a03ccd1e3e5336846606fa187d361f8bb4', 46),
(41, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'2007ed7ba8109d6c5ef5cec87c613c1e0173b504cf487cea8ba329fcda57e51b\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 06:00:36', '0', 1, '2007ed7ba8109d6c5ef5cec87c613c1e0173b504cf487cea8ba329fcda57e51b', 46),
(42, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'ce4d1abeb9e2ed82c02ec9aa6d3dc6121e81b17a2597a0fdb36564594b13d032\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 06:33:20', '0', 1, 'ce4d1abeb9e2ed82c02ec9aa6d3dc6121e81b17a2597a0fdb36564594b13d032', 6),
(43, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'b78a3499de8a6aeb54b3e8cd4d4b4951e69557aac602fbc75880fed88853d957\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 06:34:27', '0', 1, 'b78a3499de8a6aeb54b3e8cd4d4b4951e69557aac602fbc75880fed88853d957', 6),
(44, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'c0477427b0d6eae3749cc1d9cb5383813569b3cbbd851b7714a76ab18a72c6d8\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 07:02:30', '0', 1, 'c0477427b0d6eae3749cc1d9cb5383813569b3cbbd851b7714a76ab18a72c6d8', 6),
(45, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'9a49dbcdac59ed3cc96fe6d6e02dcd960a3337dc04f23d346a1c3db382be193f\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 07:04:13', '0', 1, '9a49dbcdac59ed3cc96fe6d6e02dcd960a3337dc04f23d346a1c3db382be193f', 6),
(46, 48, 6, 'this is a test<div>&nbsp;</div>', 1, 0, NULL, 0, 0, '2016-01-28 07:43:26', '0', 0, '', 0),
(47, 6, 48, '<a href=# onclick=webcamAccepted(\'david\',\'6058786d93f8eaebc3dcbf5c1fa480763b0a574aa782f143161179e88f2e9795\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 07:54:31', '0', 1, '6058786d93f8eaebc3dcbf5c1fa480763b0a574aa782f143161179e88f2e9795', 6),
(48, 6, 7, '<a href=# onclick=webcamAccepted(\'david\',\'74b6eafbb4f319782fa4976e4b933f1a3253420a918571d82b98d2cf59a16722\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:00:30', '0', 1, '74b6eafbb4f319782fa4976e4b933f1a3253420a918571d82b98d2cf59a16722', 6),
(49, 7, 48, 'hello<br><br>', 1, 0, NULL, 0, 0, '2016-01-28 08:01:47', '0', 0, '', 0),
(50, 6, 7, '<a href=# onclick=webcamAccepted(\'david\',\'cfbb6e5bd95a3d5da6c7ce89180dc996f2c9d837c72ff7c12dff70d373d4221b\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:05:50', '0', 1, 'cfbb6e5bd95a3d5da6c7ce89180dc996f2c9d837c72ff7c12dff70d373d4221b', 6),
(51, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'c688f4bb8f8073571585b63c87c884cb8eb4c9eb80c6a09285c2a5e927f12baa\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:11:41', '0', 1, 'c688f4bb8f8073571585b63c87c884cb8eb4c9eb80c6a09285c2a5e927f12baa', 46),
(52, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'ce67023c5b1cbb8a34b8650c9c7e5040719acfd3a3707a978be2d208d24c4458\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:12:19', '0', 1, 'ce67023c5b1cbb8a34b8650c9c7e5040719acfd3a3707a978be2d208d24c4458', 46),
(53, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'9c31845a29261a51868a0fc93666729d56d043f5be07b72125db90a44e19490f\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:12:43', '0', 1, '9c31845a29261a51868a0fc93666729d56d043f5be07b72125db90a44e19490f', 46),
(54, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'ab4ed6fd9f0abc7c71d0961938cf11ddf99d5968e5f1ffe7bf82af843c3fb26c\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:15:09', '0', 1, 'ab4ed6fd9f0abc7c71d0961938cf11ddf99d5968e5f1ffe7bf82af843c3fb26c', 46),
(55, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'99ee34ef863395fd07ee16a4fd3aaef80afaabe714f95576db3a70533a28d156\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:15:42', '0', 1, '99ee34ef863395fd07ee16a4fd3aaef80afaabe714f95576db3a70533a28d156', 6),
(56, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'ac9beba3b42f37db8b56c258263095568953e7628e404756cb5363e71c3604a7\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:15:53', '0', 1, 'ac9beba3b42f37db8b56c258263095568953e7628e404756cb5363e71c3604a7', 6),
(57, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'7d321065be780004636cf0b983a3ea1fb4297e64a4437b9549ed803663afa397\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:16:03', '0', 1, '7d321065be780004636cf0b983a3ea1fb4297e64a4437b9549ed803663afa397', 46),
(58, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'bd97fd43735ca6b470a1afcebc5d6df538ef9816cc0202a5794e6bc266ee4afd\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:17:05', '0', 1, 'bd97fd43735ca6b470a1afcebc5d6df538ef9816cc0202a5794e6bc266ee4afd', 46),
(59, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'46203edca7c0fde88e52c126df291ec61046a3710235217fc869fce8bbe48b05\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:18:36', '0', 1, '46203edca7c0fde88e52c126df291ec61046a3710235217fc869fce8bbe48b05', 46),
(60, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'8eb5c249fd12830069e4bc3e9f77e4c72ae7c11370d859606bccf761fb863539\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:18:54', '0', 1, '8eb5c249fd12830069e4bc3e9f77e4c72ae7c11370d859606bccf761fb863539', 46),
(61, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'7c314696c5dc4396fa74c46434adce5f432f7178fed607594bc397251c0f9353\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:19:12', '0', 1, '7c314696c5dc4396fa74c46434adce5f432f7178fed607594bc397251c0f9353', 6),
(62, 6, 7, '<a href=# onclick=webcamAccepted(\'david\',\'df334a0633d31b82e03839d49403e742527212d7913b6304fbe6463862687483\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:21:04', '0', 1, 'df334a0633d31b82e03839d49403e742527212d7913b6304fbe6463862687483', 6),
(63, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'49d4e12d0d1b556bee631ae61190a9ac3866f0f23f57c7b62b055a08029e02d6\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:21:28', '0', 1, '49d4e12d0d1b556bee631ae61190a9ac3866f0f23f57c7b62b055a08029e02d6', 46),
(64, 46, 8, '<a href=# onclick=webcamAccepted(\'kennedy\',\'e83eb25566a7a6658d5e22f95f5391589b4027bccf013727e895a13d8aa458ee\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 08:22:08', '0', 1, 'e83eb25566a7a6658d5e22f95f5391589b4027bccf013727e895a13d8aa458ee', 46),
(65, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'085c6403dfd3b9e7b1b5e4899eb04d782991fa7ebb7d6367c8c1b58c261968c5\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:24:49', '0', 1, '085c6403dfd3b9e7b1b5e4899eb04d782991fa7ebb7d6367c8c1b58c261968c5', 48),
(66, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'779f3417ef1edaccb14108f1ce29fe8fdb6e1c9e38caf49be108c80ae61ffb94\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:29:37', '0', 1, '779f3417ef1edaccb14108f1ce29fe8fdb6e1c9e38caf49be108c80ae61ffb94', 48),
(67, 49, 10, '<a href=# onclick=webcamAccepted(\'prince\',\'c6dad9834ff96c00a88d723ad1a0ecb834c827182bbf149c9f3c10665459ab05\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:29:43', '0', 1, 'c6dad9834ff96c00a88d723ad1a0ecb834c827182bbf149c9f3c10665459ab05', 49),
(68, 49, 48, 'hallo,<div><br></div>', 1, 0, NULL, 48, 0, '2016-01-28 09:31:18', '1', 0, '', 0),
(69, 49, 48, '', 1, 0, NULL, 48, 0, '2016-01-28 09:31:19', '1', 0, '', 0),
(70, 48, 0, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2016-01-28 09:32:01', '0', 0, '', 0),
(71, 49, 10, '<a href=# onclick=webcamAccepted(\'prince\',\'0314806ea92da21f864bd3c990319bd3e279f10e82eda9ada57f1a82080a3fb2\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:35:29', '0', 1, '0314806ea92da21f864bd3c990319bd3e279f10e82eda9ada57f1a82080a3fb2', 49),
(72, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'b2d3eb8383aac32f9c31b8cbb53fed8fd59702f2dc20bd886f2822ba60f38642\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:35:43', '0', 1, 'b2d3eb8383aac32f9c31b8cbb53fed8fd59702f2dc20bd886f2822ba60f38642', 48),
(73, 48, 49, 'hi<div><br></div>', 1, 0, NULL, 48, 0, '2016-01-28 09:36:11', '1', 0, '', 0),
(74, 48, 49, 'hope u are good<div><br></div>', 1, 0, NULL, 48, 0, '2016-01-28 09:36:50', '1', 0, '', 0),
(75, 49, 48, 'hallo', 1, 0, NULL, 48, 0, '2016-01-28 09:36:51', '1', 0, '', 0),
(76, 48, 49, 'hope u are good<div><br></div>', 1, 0, NULL, 48, 0, '2016-01-28 09:36:51', '1', 0, '', 0),
(77, 49, 48, '<a href=# onclick=webcamAccepted(\'prince\',\'f6dff1dc3d6dcbdafd1bac0c4c8ebf5fdadef522fa72b26a4223490475b5c72d\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 48, 0, '2016-01-28 09:36:54', '1', 1, 'f6dff1dc3d6dcbdafd1bac0c4c8ebf5fdadef522fa72b26a4223490475b5c72d', 49),
(78, 48, 49, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'5e9de6d66f0430a92eafddd2eaa9cbf2ac7e950c5f69910c96aeb85bb53c0f0c\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 48, 0, '2016-01-28 09:36:56', '1', 1, '5e9de6d66f0430a92eafddd2eaa9cbf2ac7e950c5f69910c96aeb85bb53c0f0c', 48),
(79, 49, 48, 'hallo', 1, 0, NULL, 48, 0, '2016-01-28 09:40:19', '1', 0, '', 0),
(80, 49, 10, '<a href=# onclick=webcamAccepted(\'prince\',\'029e1f7b6aadc6824d9adb732d2c235190021bfb443eed52c1f12606b69e5b3c\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:40:24', '0', 1, '029e1f7b6aadc6824d9adb732d2c235190021bfb443eed52c1f12606b69e5b3c', 49),
(81, 49, 10, '<a href=# onclick=webcamAccepted(\'prince\',\'0fa41bb7196c58db994033f64734b91c27113772f1535a768dce0662e3ef00f9\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:41:13', '0', 1, '0fa41bb7196c58db994033f64734b91c27113772f1535a768dce0662e3ef00f9', 49),
(82, 48, 49, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'176991d8366ae3b7493ffe588023600d57801570e5a3a60d39e585eff63e4ef9\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 48, 0, '2016-01-28 09:41:44', '1', 1, '176991d8366ae3b7493ffe588023600d57801570e5a3a60d39e585eff63e4ef9', 48),
(83, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'899f01f77a6671d028fc4f655d57200bdc13ec8f0912c1f8b6cf793c324aace8\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:42:04', '0', 1, '899f01f77a6671d028fc4f655d57200bdc13ec8f0912c1f8b6cf793c324aace8', 48),
(84, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'d35a8f311431e88ed764cfeea93e86c7e107a99b59bdb1afc3fd7b21d45ec963\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:42:35', '0', 1, 'd35a8f311431e88ed764cfeea93e86c7e107a99b59bdb1afc3fd7b21d45ec963', 48),
(85, 49, 10, '<a href=# onclick=webcamAccepted(\'prince\',\'8723647dbc50ca4f0ec903d649d1ee778d509918ecd6dc43967a07d4465578bc\')>Click to accept webcam from </a>prince for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:42:48', '0', 1, '8723647dbc50ca4f0ec903d649d1ee778d509918ecd6dc43967a07d4465578bc', 49),
(86, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'71cf0106764dd6f21e499933f3ba6e5474ec9abdb02f664536994de29b197978\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:43:40', '0', 1, '71cf0106764dd6f21e499933f3ba6e5474ec9abdb02f664536994de29b197978', 48),
(87, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'6cf0aee51a7fda0187d8ad13e906ca941d55f8bc344c0f4f816cd4c2e37679c1\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:44:47', '0', 1, '6cf0aee51a7fda0187d8ad13e906ca941d55f8bc344c0f4f816cd4c2e37679c1', 48),
(88, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'7ee188c667ce9384fc333cfadc6c894eb41c9f3293c542549c881a63e532ef57\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:46:55', '0', 1, '7ee188c667ce9384fc333cfadc6c894eb41c9f3293c542549c881a63e532ef57', 48),
(89, 48, 10, '<a href=# onclick=webcamAccepted(\'alexpeter\',\'eb3a840fb7f92ab4751bdb98ace9114cf5a95591c2482d7468ba640ff57143a4\')>Click to accept webcam from </a>alexpeter for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:47:11', '0', 1, 'eb3a840fb7f92ab4751bdb98ace9114cf5a95591c2482d7468ba640ff57143a4', 48),
(90, 6, 8, '<a href=# onclick=webcamAccepted(\'david\',\'632ba883720a2de20055f0b1b8be9ac92aeda8411201e118a3b7381eec061a4f\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:57:22', '0', 1, '632ba883720a2de20055f0b1b8be9ac92aeda8411201e118a3b7381eec061a4f', 6),
(91, 6, 8, '<a href=# onclick=webcamAccepted(\'david\',\'948183fcd7641fd00b7aed439fb60393f6cafefe4143258595998744cbde6c4d\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:58:07', '0', 1, '948183fcd7641fd00b7aed439fb60393f6cafefe4143258595998744cbde6c4d', 6),
(92, 6, 8, '<a href=# onclick=webcamAccepted(\'david\',\'2e9b7e2abea0bd39660cb17b1ee3d0e61692a3f8c2a7b753d130301cc859a7c6\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 09:58:19', '0', 1, '2e9b7e2abea0bd39660cb17b1ee3d0e61692a3f8c2a7b753d130301cc859a7c6', 6),
(93, 6, 8, '<a href=# onclick=webcamAccepted(\'david\',\'b7688f3a5d6986fb749bbf894190f698ff6f005f79a1d436a045f1a731f0eecc\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-28 10:00:51', '0', 1, 'b7688f3a5d6986fb749bbf894190f698ff6f005f79a1d436a045f1a731f0eecc', 6),
(94, 6, 12, '<a href=# onclick=webcamAccepted(\'david\',\'86e0ada5238f7d0c0fb2e4c07b91a7b17212482dedfba93a46b663d909d60771\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 02:19:01', '0', 1, '86e0ada5238f7d0c0fb2e4c07b91a7b17212482dedfba93a46b663d909d60771', 6),
(95, 6, 12, '<a href=# onclick=webcamAccepted(\'david\',\'9657b017a29fdb4d11b8e290132c573f12b23ea6ef21746c804a14a5a4a7f5a8\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 02:19:30', '0', 1, '9657b017a29fdb4d11b8e290132c573f12b23ea6ef21746c804a14a5a4a7f5a8', 6),
(96, 46, 12, '<a href=# onclick=webcamAccepted(\'kennedy\',\'2d01b59896e891361df38f3e426b90a3060cb248be0db8ac5b3584a30ac4c11b\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 02:19:47', '0', 1, '2d01b59896e891361df38f3e426b90a3060cb248be0db8ac5b3584a30ac4c11b', 46),
(97, 6, 12, '<a href=# onclick=webcamAccepted(\'david\',\'13fe4d97b5f7fd473cffc450b03dfed764d4eb9a0b3874093132ebb381f20426\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 02:20:30', '0', 1, '13fe4d97b5f7fd473cffc450b03dfed764d4eb9a0b3874093132ebb381f20426', 6),
(98, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'d1314a65186470f21746a1b908e204125b1e9680a5bdb4a62befae4ac61090d8\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 07:14:18', '0', 1, 'd1314a65186470f21746a1b908e204125b1e9680a5bdb4a62befae4ac61090d8', 6),
(99, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'e019487dec3f0c3cc6f55ff053be39b2e0a7fd87588ff8e22e05d222b8d88573\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-01-29 07:14:56', '0', 1, 'e019487dec3f0c3cc6f55ff053be39b2e0a7fd87588ff8e22e05d222b8d88573', 6),
(100, 6, 13, 'hello<br><br>', 1, 0, NULL, 0, 0, '2016-01-29 08:20:51', '0', 0, '', 0),
(101, 13, 6, 'hi<br><br>', 1, 0, NULL, 0, 0, '2016-01-29 08:21:27', '0', 0, '', 0),
(102, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'7d1c16954c416f5666287930c66c3ed0d29f34fb38ca9816818c622f56f4f580\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 00:22:53', '0', 1, '7d1c16954c416f5666287930c66c3ed0d29f34fb38ca9816818c622f56f4f580', 6),
(103, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'558891426bab4790364ae98c8057a3178d3edce1f53c79911b839609fb65bb21\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 00:23:56', '0', 1, '558891426bab4790364ae98c8057a3178d3edce1f53c79911b839609fb65bb21', 6),
(104, 6, 46, 'hiiiiiiiiiiiiiiiiiiiiii<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-01 00:24:55', '0', 0, '', 0),
(105, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'6fb9dc307857449dcb033214d8495fd09ef8cf2752be696bb08d944e6fc839c4\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 01:05:11', '0', 1, '6fb9dc307857449dcb033214d8495fd09ef8cf2752be696bb08d944e6fc839c4', 46),
(106, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'7907406abc6a7571efb9f92a0b875468131ed1f901fc032d28c046d80713d41b\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 01:05:40', '0', 1, '7907406abc6a7571efb9f92a0b875468131ed1f901fc032d28c046d80713d41b', 46),
(107, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'8c7bf84a48025104220a9dd29e6c268d20ff2c077ac461fd25e35da1c8520d50\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 01:06:54', '0', 1, '8c7bf84a48025104220a9dd29e6c268d20ff2c077ac461fd25e35da1c8520d50', 6),
(108, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'f8104cd963e7415e7c0202566f5faba2d9f751107cff94ad01c54d6d086bfd7a\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 01:07:46', '0', 1, 'f8104cd963e7415e7c0202566f5faba2d9f751107cff94ad01c54d6d086bfd7a', 46),
(109, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'1b013010125a23237610c46888a1dc9893c2b7fb67a051d7995a346d3d00b37c\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-01 13:44:34', '0', 1, '1b013010125a23237610c46888a1dc9893c2b7fb67a051d7995a346d3d00b37c', 6),
(110, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'7186880e28ff4dfe32b83406e9df88ca48eec775f0a417bfcde00eb37dae97fe\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:45:20', '0', 1, '7186880e28ff4dfe32b83406e9df88ca48eec775f0a417bfcde00eb37dae97fe', 46),
(111, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'8b69cc0988e8174965ecccfbd3112bb4b5076f268649f191d6a026371e841660\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:45:47', '0', 1, '8b69cc0988e8174965ecccfbd3112bb4b5076f268649f191d6a026371e841660', 6),
(112, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'8b05b2146c1089a8f0091d3b9e3cee35bdc34a20280fc1a260ac5f7a0e8e0aec\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:46:24', '0', 1, '8b05b2146c1089a8f0091d3b9e3cee35bdc34a20280fc1a260ac5f7a0e8e0aec', 6),
(113, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'42a263b6762354249f3de6584f0c43b0f49d77973d340f53b246b1e0b04add2e\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:47:52', '0', 1, '42a263b6762354249f3de6584f0c43b0f49d77973d340f53b246b1e0b04add2e', 46),
(114, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'55cdf1e7ce0dd42e3801b07304cfb50b53d9a1475f732b9f973817ed38304bfe\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:49:53', '0', 1, '55cdf1e7ce0dd42e3801b07304cfb50b53d9a1475f732b9f973817ed38304bfe', 6),
(115, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'c291d0f667394ff18a67dd724a15e4d4fd6a23141b4a7d7f8c6839406ded5330\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:52:36', '0', 1, 'c291d0f667394ff18a67dd724a15e4d4fd6a23141b4a7d7f8c6839406ded5330', 46),
(116, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'681bc6f2cfd12ac8d9f4d992f78780460e0fd01c88e775b69f9528277f4874d8\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:54:19', '0', 1, '681bc6f2cfd12ac8d9f4d992f78780460e0fd01c88e775b69f9528277f4874d8', 6),
(117, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'fe5fec661175553fe807d7e12e249e825af532a44b8d1ce7b5acee3413904c4b\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-02 13:54:48', '0', 1, 'fe5fec661175553fe807d7e12e249e825af532a44b8d1ce7b5acee3413904c4b', 6),
(118, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'43a173a08bbaefaceb98f5f412c25b868a383986384d239b3eb87dcaf0137266\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-04 01:54:58', '0', 1, '43a173a08bbaefaceb98f5f412c25b868a383986384d239b3eb87dcaf0137266', 6),
(119, 6, 46, '<a href=# onclick=webcamAccepted(\'david\',\'29d54e3ec3ad7c8603baacfdbdab293f63ff00992926c37ff148545768dab1a5\')>Click to accept webcam from </a>david for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-04 01:56:08', '0', 1, '29d54e3ec3ad7c8603baacfdbdab293f63ff00992926c37ff148545768dab1a5', 6),
(120, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'a764a65f9bcfa5c21f35aaba3d4c2744ae5a1acc846fdb0706c361d91ecc56f6\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-04 01:57:07', '0', 1, 'a764a65f9bcfa5c21f35aaba3d4c2744ae5a1acc846fdb0706c361d91ecc56f6', 46),
(121, 46, 6, '<a href=# onclick=webcamAccepted(\'kennedy\',\'a54c14b13bd6d39e48ab3876f2f27bb82cb48d72fbff3b2116b718214d217c2b\')>Click to accept webcam from </a>kennedy for a webcam chat.', 1, 0, NULL, 0, 0, '2016-02-04 01:59:04', '0', 1, 'a54c14b13bd6d39e48ab3876f2f27bb82cb48d72fbff3b2116b718214d217c2b', 46),
(122, 36, 46, 'hi <br><br>', 1, 0, NULL, 0, 0, '2016-02-06 00:02:50', '0', 0, '', 0),
(123, 46, 36, 'hello', 1, 0, NULL, 0, 0, '2016-02-06 00:03:15', '0', 0, '', 0),
(124, 36, 0, 'hello', 1, 0, NULL, 0, 0, '2016-02-06 00:50:49', '0', 0, '', 0),
(125, 46, 36, '<i>hi<br><br></i>', 1, 0, NULL, 0, 0, '2016-02-06 01:02:10', '0', 0, '', 0),
(126, 36, 46, 'hi<br><br>', 1, 0, NULL, 0, 0, '2016-02-08 06:40:46', '0', 0, '', 0),
(127, 46, 36, 'wht\\\'s up?<br><br>', 1, 0, NULL, 0, 0, '2016-02-08 06:41:22', '0', 0, '', 0),
(128, 46, 6, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-09 04:16:23', '0', 0, '', 0),
(129, 6, 46, 'hello sir<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-09 04:17:54', '0', 0, '', 0),
(130, 46, 6, 'ok<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-09 04:18:08', '0', 0, '', 0),
(131, 46, 6, 'hii<br><br>', 1, 0, NULL, 0, 0, '2016-02-09 07:41:39', '0', 0, '', 0),
(132, 46, 6, 'how are you today<br>', 1, 0, NULL, 0, 0, '2016-02-09 07:41:54', '0', 0, '', 0),
(133, 46, 6, 'hi david<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-11 02:44:43', '0', 0, '', 0),
(134, 28, 36, 'hi carry<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-11 02:49:25', '0', 0, '', 0),
(135, 36, 28, 'hello doctor<br><br>', 1, 0, NULL, 0, 0, '2016-02-11 02:52:24', '0', 0, '', 0),
(136, 28, 6, 'hi<br><br>', 1, 0, NULL, 0, 0, '2016-02-11 03:43:30', '0', 0, '', 0),
(137, 28, 36, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2016-02-14 22:01:48', '0', 0, '', 0),
(138, 36, 28, 'testing<br><br>', 1, 0, NULL, 0, 0, '2016-02-14 22:21:19', '0', 0, '', 0),
(139, 6, 46, 'high<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:16', '0', 0, '', 0),
(140, 6, 46, 'hi<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:21', '0', 0, '', 0),
(141, 6, 46, 'hi<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:23', '0', 0, '', 0),
(142, 6, 46, 'whats up<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:40', '0', 0, '', 0),
(143, 6, 46, 'whats up<br><br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:45', '0', 0, '', 0),
(144, 6, 46, 'whats up<br><br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:18:46', '0', 0, '', 0),
(145, 6, 46, 'delay<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:19:01', '0', 0, '', 0),
(146, 6, 46, 'are u there<br><br>', 0, 0, NULL, 0, 0, '2016-02-16 03:24:18', '0', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_status`
--

CREATE TABLE `chat_status` (
  `sid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_type` int(11) DEFAULT '0' COMMENT '0=Online,1=Idele,2=Offline',
  `status_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `user_email`, `phone`, `detail`) VALUES
(4, 'david', 'Funto', 'david@hotmail.com', '4567453434', 'test loreium ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosys_reports`
--

CREATE TABLE `diagnosys_reports` (
  `id` int(11) NOT NULL,
  `doctorid` int(11) DEFAULT NULL,
  `patientid` int(11) DEFAULT NULL,
  `testid` int(11) DEFAULT '0',
  `test_res` varchar(255) DEFAULT '',
  `disease_name` varchar(255) DEFAULT NULL,
  `diagnosys_detail` text,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosys_reports`
--

INSERT INTO `diagnosys_reports` (`id`, `doctorid`, `patientid`, `testid`, `test_res`, `disease_name`, `diagnosys_detail`, `status`, `created`) VALUES
(2, 13, 7, 0, '', 'test Disease ', '<p>test Disease &nbsp;detail</p>\r\n', 1, '2016-01-06 12:38:03'),
(4, 13, 16, 0, '', 'HBFGFGHGF', '<p>GFHFGHFGHF DFHFGHFGHGF</p>\r\n', 1, '2016-01-06 17:35:27'),
(5, 28, 7, 0, '', 'test disease', '<p>test diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest diseasetest disease</p>\r\n', 1, '2016-01-06 18:02:26'),
(6, 13, 16, 0, '', 'test disease from admin', '<p>test disease from admintest disease from admintest disease from admintest disease from admintest disease from admintest disease from admintest disease from admintest disease from admin</p>\r\n', 1, '2016-01-08 17:58:01'),
(7, 46, 6, 0, '', 'malaria', '<p>Go get Fansida</p>\r\n', 1, '2016-01-18 15:54:26'),
(8, 46, 6, 0, '', 'test regular', '<p>Regular doctor tested!</p>\r\n', 1, '2016-02-12 18:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosys_test`
--

CREATE TABLE `diagnosys_test` (
  `id` int(11) NOT NULL,
  `diagnosys_id` int(11) DEFAULT NULL,
  `test_type` int(11) DEFAULT NULL,
  `test_result` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosys_test`
--

INSERT INTO `diagnosys_test` (`id`, `diagnosys_id`, `test_type`, `test_result`) VALUES
(2, 2, 2, 'Negative'),
(3, 3, 1, 'B+'),
(4, 4, 1, 'O+'),
(5, 4, 2, 'B+'),
(21, 6, 1, 'aa+'),
(22, 7, 0, 'Malaria and typhoid test');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `doc_type` int(11) DEFAULT '0' COMMENT '0=appointment Doctor, 1= Regular doctor(Full Time)',
  `mon_start_time` time NOT NULL,
  `mon_end_time` time NOT NULL,
  `tue_start_time` time NOT NULL,
  `tue_end_time` time NOT NULL,
  `wed_start_time` time NOT NULL,
  `wed_end_time` time NOT NULL,
  `thu_start_time` time NOT NULL,
  `thu_end_time` time NOT NULL,
  `fri_start_time` time NOT NULL,
  `fri_end_time` time NOT NULL,
  `sat_start_time` time NOT NULL,
  `sat_end_time` time NOT NULL,
  `sun_start_time` time NOT NULL,
  `sun_end_time` time NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`id`, `doctor_id`, `app_date`, `start_time`, `end_time`, `doc_type`, `mon_start_time`, `mon_end_time`, `tue_start_time`, `tue_end_time`, `wed_start_time`, `wed_end_time`, `thu_start_time`, `thu_end_time`, `fri_start_time`, `fri_end_time`, `sat_start_time`, `sat_end_time`, `sun_start_time`, `sun_end_time`, `status`, `created`, `modified`) VALUES
(5, 13, '2015-12-22', '13:45:00', '16:15:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-21 10:34:43', '2015-12-21 10:39:35'),
(22, 13, '2015-12-22', '17:45:00', '18:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '2015-12-21 13:19:22', '2015-12-21 13:19:22'),
(23, 13, '2015-12-23', '16:30:00', '20:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-22 12:03:42', '2015-12-22 12:04:32'),
(24, 13, '2016-01-05', '10:15:00', '11:50:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-23 19:23:31', '2015-12-23 19:31:53'),
(25, 13, '2015-12-25', '01:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-24 17:34:50', '2015-12-24 17:34:50'),
(26, 13, '2015-12-30', '03:30:00', '04:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-24 17:35:45', '2015-12-24 17:35:45'),
(27, 13, '2015-12-30', '06:30:00', '07:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-24 17:36:50', '2015-12-24 17:36:50'),
(28, 13, '2015-12-31', '12:15:00', '14:15:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2015-12-29 12:24:08', '2015-12-29 12:24:08'),
(29, 13, '2016-01-02', '12:00:00', '16:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-02 12:03:55', '2016-01-02 12:04:33'),
(32, 13, '2016-01-09', '01:00:00', '12:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-08 12:12:30', '2016-01-08 12:14:28'),
(33, 13, '2016-01-13', '11:00:00', '22:00:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-08 12:12:52', '2016-01-08 12:15:03'),
(39, 13, '2016-01-16', '12:45:00', '13:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-14 11:46:33', '2016-01-14 11:46:33'),
(40, 13, '2016-01-16', '14:00:00', '14:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-14 11:46:58', '2016-01-14 11:46:58'),
(48, 48, NULL, NULL, NULL, 1, '16:30:00', '20:30:00', '14:30:00', '20:30:00', '10:30:00', '22:30:00', '11:30:00', '22:30:00', '20:30:00', '17:30:00', '10:30:00', '18:30:00', '20:30:00', '20:30:00', 1, '2016-01-20 20:33:16', '2016-02-01 19:57:15'),
(49, 28, NULL, NULL, NULL, 1, '02:00:00', '19:00:00', '02:00:00', '22:00:00', '03:00:00', '21:00:00', '04:00:00', '20:00:00', '03:00:00', '21:00:00', '10:00:00', '21:00:00', '03:00:00', '22:00:00', 1, '2016-01-21 14:05:28', '2016-01-29 14:31:49'),
(50, 46, NULL, NULL, NULL, 1, '00:00:00', '23:00:00', '00:00:00', '23:00:00', '00:00:00', '23:00:00', '00:00:00', '23:00:00', '00:00:00', '23:00:00', '00:00:00', '23:00:00', '00:00:00', '23:00:00', 1, '2016-01-26 23:01:31', '2016-01-28 21:38:06'),
(53, 13, '2016-01-29', '19:45:00', '21:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-01-29 19:57:36', '2016-01-29 19:57:36'),
(54, 37, '2016-02-02', '14:45:00', '18:45:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-02 14:56:50', '2016-02-02 14:56:50'),
(55, 13, '2016-02-11', '10:30:00', '23:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-05 21:06:19', '2016-02-05 21:06:19'),
(56, 51, '2016-02-15', '09:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:13:44', '2016-02-15 14:15:29'),
(57, 51, '2016-02-15', '09:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:13:50', '2016-02-15 14:15:24'),
(58, 51, '2016-02-16', '09:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:14:06', '2016-02-15 14:15:21'),
(59, 51, '2016-02-17', '09:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:14:14', '2016-02-15 14:15:17'),
(60, 51, '2016-02-18', '09:30:00', '17:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:14:24', '2016-02-15 14:15:13'),
(61, 51, '2016-02-19', '09:30:00', '10:30:00', 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '2016-02-15 14:14:47', '2016-02-15 14:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `orderno` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `status`, `orderno`, `created`) VALUES
(1, 'test question', '<p>testy answer</p>\r\n', 1, 0, '2015-12-30 17:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `apt_id` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `doctorid` int(11) DEFAULT '0',
  `feedback` text NOT NULL,
  `rate` float DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `googleplus_item`
--

CREATE TABLE `googleplus_item` (
  `id` int(11) NOT NULL,
  `post_title` text,
  `post_url` text,
  `published` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  `profile_id` varchar(30) DEFAULT NULL,
  `profile_display_name` varchar(50) DEFAULT NULL,
  `profile_url` text,
  `profile_img` text,
  `google_post_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleplus_item`
--

INSERT INTO `googleplus_item` (`id`, `post_title`, `post_url`, `published`, `updated`, `profile_id`, `profile_display_name`, `profile_url`, `profile_img`, `google_post_id`) VALUES
(1, 'Nice tricks', 'https://plus.google.com/116756010426591070409/posts/eNp4TvGCWFg', '2015-07-25T04:11:41.151Z', '2015-07-25T04:11:41.151Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(2, '', 'https://plus.google.com/116756010426591070409/posts/LFEvK3Q6DiU', '2015-06-05T03:27:49.031Z', '2015-06-05T03:27:49.031Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(3, 'I Think this one is really meaningful', 'https://plus.google.com/116756010426591070409/posts/WfFJks4yeMg', '2015-05-22T03:28:53.765Z', '2015-05-22T03:28:53.765Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(4, 'Need a B.Tech/BCA/B.Sc fresher urjent\nPost: Web Developer / Web Designer\nLocation: Balasore, Odisha', 'https://plus.google.com/116756010426591070409/posts/5XsgFAyeVzK', '2015-03-11T04:41:53.077Z', '2015-03-11T04:41:53.077Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(5, '', 'https://plus.google.com/116756010426591070409/posts/1wK5jNFN6bA', '2015-01-22T10:44:53.682Z', '2015-01-22T10:44:53.682Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(6, '', 'https://plus.google.com/116756010426591070409/posts/1wK5jNFN6bA', '2015-01-22T10:33:43.786Z', '2015-01-22T10:33:43.786Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(7, '', 'https://plus.google.com/116756010426591070409/posts/aqiXRZ8zGyL', '2014-09-03T12:54:29.409Z', '2014-09-03T12:54:29.409Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(8, 'I Bishnu', 'https://plus.google.com/116756010426591070409/posts/5DGfePKK9QT', '2014-09-02T10:14:58.513Z', '2014-09-02T10:14:58.513Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(9, 'its me', 'https://plus.google.com/116756010426591070409/posts/6LQLjVyVYLX', '2012-10-08T05:04:47.854Z', '2012-10-08T05:04:59.000Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', NULL),
(10, 'Nice tricks', 'https://plus.google.com/116756010426591070409/posts/eNp4TvGCWFg', '2015-07-25T04:11:41.151Z', '2015-07-25T04:11:41.151Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12rwpwpbqa3vviqz04chjvidtnrjtwoafs'),
(11, '', 'https://plus.google.com/116756010426591070409/posts/LFEvK3Q6DiU', '2015-06-05T03:27:49.031Z', '2015-06-05T03:27:49.031Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12asjdrqoqwix1vn23fyvmigxvyj51my'),
(12, 'I Think this one is really meaningful', 'https://plus.google.com/116756010426591070409/posts/WfFJks4yeMg', '2015-05-22T03:28:53.765Z', '2015-05-22T03:28:53.765Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z13dw5vhep34dvehl04chjvidtnrjtwoafs'),
(13, 'Need a B.Tech/BCA/B.Sc fresher urjent\nPost: Web Developer / Web Designer\nLocation: Balasore, Odisha', 'https://plus.google.com/116756010426591070409/posts/5XsgFAyeVzK', '2015-03-11T04:41:53.077Z', '2015-03-11T04:41:53.077Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z13ecb2zcn2sfb30v23fyvmigxvyj51my'),
(14, '', 'https://plus.google.com/116756010426591070409/posts/BTb4tQtLHjR', '2015-01-22T10:44:53.682Z', '2015-01-22T10:44:53.682Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12mcnnqjpn2ffkty23fyvmigxvyj51my'),
(15, '', 'https://plus.google.com/116756010426591070409/posts/1wK5jNFN6bA', '2015-01-22T10:33:43.786Z', '2015-01-22T10:33:43.786Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12wxdhrqt3bwtn0523fyvmigxvyj51my'),
(16, '', 'https://plus.google.com/116756010426591070409/posts/aqiXRZ8zGyL', '2014-09-03T12:54:29.409Z', '2014-09-03T12:54:29.409Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12vudcidp3nfdeae04chjvidtnrjtwoafs'),
(17, 'I Bishnu', 'https://plus.google.com/116756010426591070409/posts/5DGfePKK9QT', '2014-09-02T10:14:58.513Z', '2014-09-02T10:14:58.513Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z13kf5dgorj4jl5kt23fyvmigxvyj51my'),
(18, 'its me', 'https://plus.google.com/116756010426591070409/posts/6LQLjVyVYLX', '2012-10-08T05:04:47.854Z', '2012-10-08T05:04:59.000Z', '116756010426591070409', 'Bishnupada Nandi', 'https://plus.google.com/116756010426591070409', 'photo.jpg', 'z12of13hckj2ejwkz23fyvmigxvyj51my');

-- --------------------------------------------------------

--
-- Table structure for table `googleplus_item_attachment`
--

CREATE TABLE `googleplus_item_attachment` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `attach_display_name` varchar(50) DEFAULT NULL,
  `attach_url` text,
  `attach_img` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleplus_item_attachment`
--

INSERT INTO `googleplus_item_attachment` (`id`, `item_id`, `attach_display_name`, `attach_url`, `attach_img`) VALUES
(1, 1, 'How To Deal With A Difficult Boss â€“ Coping With ', 'http://www.slideshare.net/vkool/how-to-deal-with-a-difficult-boss-50672567', 'howtodealwithadifficultboss-150718235144-lva1-app6891-thumbnail-4.jpg'),
(2, 2, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801/6156727620717952066', '2013-09-22+09.42.05.jpg'),
(3, 3, 'Work Rules!', 'http://www.slideshare.net/lxbock/work-rules-48029695', 'work-rules-1-638.jpg'),
(4, 5, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(5, 6, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(6, 7, ' Easy Responsive Design Tutorial in 7 Steps', 'http://www.emailonacid.com/blog/details/C13/a_responsive_design_tutorial', 'example2.jpg'),
(7, 9, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801', ''),
(8, 10, 'How To Deal With A Difficult Boss â€“ Coping With ', 'http://www.slideshare.net/vkool/how-to-deal-with-a-difficult-boss-50672567', 'howtodealwithadifficultboss-150718235144-lva1-app6891-thumbnail-4.jpg'),
(9, 11, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801/6156727620717952066', '2013-09-22+09.42.05.jpg'),
(10, 12, 'Work Rules!', 'http://www.slideshare.net/lxbock/work-rules-48029695', 'work-rules-1-638.jpg'),
(11, 14, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(12, 15, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(13, 16, ' Easy Responsive Design Tutorial in 7 Steps', 'http://www.emailonacid.com/blog/details/C13/a_responsive_design_tutorial', 'example2.jpg'),
(14, 18, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801', ''),
(15, 10, 'How To Deal With A Difficult Boss â€“ Coping With ', 'http://www.slideshare.net/vkool/how-to-deal-with-a-difficult-boss-50672567', 'howtodealwithadifficultboss-150718235144-lva1-app6891-thumbnail-4.jpg'),
(16, 11, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801/6156727620717952066', '2013-09-22+09.42.05.jpg'),
(17, 12, 'Work Rules!', 'http://www.slideshare.net/lxbock/work-rules-48029695', 'work-rules-1-638.jpg'),
(18, 14, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(19, 15, '', 'https://plus.google.com/photos/116756010426591070409/albums/6107111899425861601/6107111902274179378', 'Bishnupada+Nandi+1.jpg'),
(20, 16, ' Easy Responsive Design Tutorial in 7 Steps', 'http://www.emailonacid.com/blog/details/C13/a_responsive_design_tutorial', 'example2.jpg'),
(21, 18, '', 'https://plus.google.com/photos/116756010426591070409/albums/5796799901682474801', '');

-- --------------------------------------------------------

--
-- Table structure for table `gospelcontent`
--

CREATE TABLE `gospelcontent` (
  `id` int(11) NOT NULL,
  `featured_content` text,
  `img_link_featured` text,
  `commentary` text,
  `step_one_content` text,
  `editort_txt` text,
  `top_story_title_one` varchar(250) DEFAULT '',
  `top_story_image_link_one` text,
  `top_story_readmore_one` text,
  `is_article` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gospelcontent`
--

INSERT INTO `gospelcontent` (`id`, `featured_content`, `img_link_featured`, `commentary`, `step_one_content`, `editort_txt`, `top_story_title_one`, `top_story_image_link_one`, `top_story_readmore_one`, `is_article`, `created`, `modified`) VALUES
(1, 'â€œThey made kings, but not through me; they set up prices, but without my knowledge. With their silver and gold they made idols for their own destruction.â€ - Hosea 8:4', 'https://thegospeldaily.org/wp-content/uploads/2017/12/Christmas-night5b.jpg', 'Read that one more time, â€œthey made idols for their own destruction.â€ An idol is anything placed in higher importance than God. Things from food to spouse, money to Netflix, anything can be made into an idol. But, they destroy us. They fill a void in our lives for only a short time. They do not provide us the everlasting fulfillment that only God can provide. Idols make us useless for the kingdom, useless vessels. Let that sink in; a vessel makes you useless.So I ask, what is swallowing you up, consuming your thoughts, demanding your attention? What is holding you back from whole-heartedly following God? Why arenâ€™t you taking that next step He is calling you into?\r\nCommentary by: Kristina Taylor', 'Father, this is so important to us. We want You, we want to follow You, we want to please You, we want to be useful, and we want to help further Your kingdom. Father, I pray that You would help us identify the idols in our lives. Amen.', '<p>This song is a wonderful reminder about what is most important at Christmas, a truly great message.&nbsp;</p>\r\n\r\n<p>Enjoy the video &amp; God bless,<br />\r\nDavid</p>\r\n', 'This Song Has A Beautiful Message Everyone Should Hear This Christmas.', 'https://faithreel.org/wp-content/uploads/2014/12/140-Featured-348x168.jpg', 'https://faithreel.org/song-beautiful-message-everyone-hear-christmas/', 1, '2016-01-27 07:09:45', '2018-12-26 20:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `hometabs`
--

CREATE TABLE `hometabs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hometabs`
--

INSERT INTO `hometabs` (`id`, `title`, `content`, `img`, `status`, `created`, `modified`) VALUES
(4, 'TELEPSYCHIATRY', '<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office.</p>\r\n', '1450090905tabpics1.jpg', 1, '2015-12-09 10:28:57', '2015-12-14 12:26:04'),
(5, 'TELEMEDICINE', '<p>Telemedicine connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office.</p>\r\n', '1450092491pic-3.jpg', 1, '2015-12-14 12:02:33', '2015-12-14 12:28:11'),
(6, 'PATIENT PROGRAMS', '<p>Patient programs connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office</p>\r\n', '1450092713pic-2.jpg', 1, '2015-12-14 12:06:00', '2015-12-14 12:31:53'),
(7, 'SECURITY', '<p>Security connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office. With CloudVisit&#39;s telepsychiatry platform, HIPAA-compliant video sessions can be done from anywhere &ndash; all you need is a broadband internet connection, computer or laptop, and a webcam. This convenience expands your availability and outreach</p>\r\n\r\n<p>Telepsychiatry connects psychiatrists and other mental health providers with their patients via online video sessions. With telepsychiatry, there is no need for either patient or physician to travel to an office.</p>\r\n', '1450092820pic-1.jpg', 1, '2015-12-14 12:06:32', '2015-12-14 12:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `user_id`, `hospital_name`, `hospital_detail`) VALUES
(1, 13, 'Ayush Hospital 2', 'Address: Achrybihar, bbsr\r\nph: 9435735384573\r\nFax: 325346456575'),
(2, 13, 'sum Hospital', 'sum Hospital Address: bharatpur, bbsr'),
(3, 14, 'Ayush Hospital', 'wert'),
(4, 15, 'afsdfsd', 'fsdfsdfds'),
(5, 26, 'dsfsf', 'dfssfs'),
(6, 28, 'Appolo', 'Appolo'),
(7, 30, 'Caradiac LifeScience', 'test test test test'),
(8, 31, 'AMRI', 'Dallas, USA'),
(11, 34, 'AIIMS', 'AIIMS Bhubaneswar');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_item`
--

CREATE TABLE `instagram_item` (
  `id` int(11) NOT NULL,
  `post_title` text,
  `post_url` text,
  `published` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  `profile_id` varchar(30) DEFAULT NULL,
  `screen_name` varchar(50) DEFAULT NULL,
  `profile_url` text,
  `profile_img` text,
  `instagram_post_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instagram_item`
--

INSERT INTO `instagram_item` (`id`, `post_title`, `post_url`, `published`, `updated`, `profile_id`, `screen_name`, `profile_url`, `profile_img`, `instagram_post_id`) VALUES
(1, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(2, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(3, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(4, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(5, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(6, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(7, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(8, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(9, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(10, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(11, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(12, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(13, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(14, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(15, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(16, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(17, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(18, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(19, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(20, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(21, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(22, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(23, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(24, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(25, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(26, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(27, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(28, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(29, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(30, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(31, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(32, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(33, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(34, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(35, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(36, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(37, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(38, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(39, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(40, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(41, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(42, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(43, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(44, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(45, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(46, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(47, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(48, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(49, 'Nothing under the hood.', 'https://www.instagram.com/p/BBxOHK2kksP/', '1455458024', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184790242315619087_4421169'),
(50, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(51, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(52, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(53, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(54, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(55, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(56, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(57, 'Nothing under the hood.', 'https://www.instagram.com/p/BBxOHK2kksP/', '1455458024', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184790242315619087_4421169'),
(58, 'Waiting for ballet class in Centro Habana.', 'https://www.instagram.com/p/BBu9cetkkhf/', '1455382177', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184153990004361311_4421169'),
(59, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(60, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(61, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(62, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(63, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(64, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(65, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(66, 'Nothing under the hood.', 'https://www.instagram.com/p/BBxOHK2kksP/', '1455458024', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184790242315619087_4421169'),
(67, 'Waiting for ballet class in Centro Habana.', 'https://www.instagram.com/p/BBu9cetkkhf/', '1455382177', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184153990004361311_4421169'),
(68, 'Making emergency repairs in Havana.', 'https://www.instagram.com/p/BBfLPX2kkkm/', '1454852539', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1179711062309751078_4421169'),
(69, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(70, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(71, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(72, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(73, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(74, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(75, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(76, 'Nothing under the hood.', 'https://www.instagram.com/p/BBxOHK2kksP/', '1455458024', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184790242315619087_4421169'),
(77, 'Waiting for ballet class in Centro Habana.', 'https://www.instagram.com/p/BBu9cetkkhf/', '1455382177', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184153990004361311_4421169'),
(78, 'Making emergency repairs in Havana.', 'https://www.instagram.com/p/BBfLPX2kkkm/', '1454852539', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1179711062309751078_4421169'),
(79, 'Couple taking a walk in Matanzas, Cuba.', 'https://www.instagram.com/p/BBYc4k_kkll/', '1454626908', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1177818335871650149_4421169'),
(80, 'A six year old Cuban cowboy at work.', 'https://www.instagram.com/p/BCFpBqekklX/', '1456143224', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1190538110745856343_4421169'),
(81, 'A model arrives at the Plaza Mayor in Trinidad, Cuba for a photo shoot.', 'https://www.instagram.com/p/BCDDcoKkkix/', '1456056413', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189809887967856817_4421169'),
(82, 'Hanging out on the lion statue on the Prado in Havana.', 'https://www.instagram.com/p/BCAglfQkkvn/', '1455971026', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1189093615298825191_4421169'),
(83, 'Â¡Viene Obama! The announcement that President Obama will visit Cuba March 21-22 has many Cubans celebrating. I took this photo in 2015 during a US-Cuba football match.', 'https://www.instagram.com/p/BB782sekkjb/', '1455818075', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187810568142211291_4421169'),
(84, 'The hood of a 1950 Austin in Centro Habana. Austins were a British made car and I have never seen another one in Cuba. They stopped making them in 1952.', 'https://www.instagram.com/p/BB7akk6EkgO/', '1455800101', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187659789481691150_4421169'),
(85, 'Old Havana haircut. Just about any small corner in this city can be turned into a barber shop or beauty parlor.', 'https://www.instagram.com/p/BB5k0s4kkhJ/', '1455738367', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1187141928069777481_4421169'),
(86, 'Textures of Havana.', 'https://www.instagram.com/p/BB2ZLZkkknA/', '1455631598', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1186246286392838592_4421169'),
(87, 'Nothing under the hood.', 'https://www.instagram.com/p/BBxOHK2kksP/', '1455458024', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184790242315619087_4421169'),
(88, 'Waiting for ballet class in Centro Habana.', 'https://www.instagram.com/p/BBu9cetkkhf/', '1455382177', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1184153990004361311_4421169'),
(89, 'Making emergency repairs in Havana.', 'https://www.instagram.com/p/BBfLPX2kkkm/', '1454852539', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1179711062309751078_4421169'),
(90, 'Couple taking a walk in Matanzas, Cuba.', 'https://www.instagram.com/p/BBYc4k_kkll/', '1454626908', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1177818335871650149_4421169'),
(91, 'Keeping watch in Centro Habana.', 'https://www.instagram.com/p/BBXpgYqkkg8/', '1454599971', NULL, '4421169', 'cubareporter', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/924274_1738224213078511_53622152_a.jpg', '1177592372994918460_4421169');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(200) DEFAULT '',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `created`) VALUES
(1, 'Amani Hospital', '0000-00-00 00:00:00'),
(2, 'Inpatient Ward', '0000-00-00 00:00:00'),
(5, 'Isolation Ward', '2015-12-17 00:00:00'),
(6, 'Laboratory', '2015-12-17 00:00:00'),
(7, 'Outpatient Clinic', '2015-12-17 00:00:00'),
(8, 'Pharmacy', '2015-12-17 00:00:00'),
(9, 'Registration Desk', '2015-12-17 00:00:00'),
(10, 'Unknown Location', '2015-12-17 00:00:00'),
(11, 'Amani Hospitals', '2015-12-18 07:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT '0',
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `uid`, `login_time`, `logout_time`) VALUES
(1, 6, '2016-01-27 20:17:28', '2016-01-27 20:23:13'),
(2, 6, '2016-01-28 13:22:08', NULL),
(3, 46, '2016-01-28 13:31:54', NULL),
(4, 6, '2016-01-28 13:45:37', NULL),
(5, 46, '2016-01-28 18:22:08', NULL),
(6, 6, '2016-01-28 18:58:24', NULL),
(7, 46, '2016-01-28 18:59:07', NULL),
(8, 6, '2016-01-28 18:59:45', NULL),
(9, 6, '2016-01-28 18:59:55', NULL),
(10, 6, '2016-01-28 19:00:14', NULL),
(11, 6, '2016-01-28 19:00:37', NULL),
(12, 6, '2016-01-28 19:01:07', NULL),
(13, 46, '2016-01-28 19:01:33', NULL),
(14, 46, '2016-01-28 19:02:08', NULL),
(15, 46, '2016-01-28 19:02:52', NULL),
(16, 6, '2016-01-28 19:31:21', NULL),
(17, 46, '2016-01-28 19:32:53', NULL),
(18, 48, '2016-01-28 19:54:55', '2016-01-28 20:01:20'),
(19, 6, '2016-01-28 19:59:16', NULL),
(20, 48, '2016-01-28 20:02:41', NULL),
(21, 6, '2016-01-28 20:22:08', NULL),
(22, 6, '2016-01-28 20:23:37', '2016-01-28 20:23:50'),
(23, 48, '2016-01-28 20:24:18', NULL),
(24, 6, '2016-01-28 20:25:54', NULL),
(25, 46, '2016-01-28 20:28:58', NULL),
(26, 7, '2016-01-28 20:31:13', NULL),
(27, 46, '2016-01-28 20:40:46', NULL),
(28, 46, '2016-01-28 21:31:01', NULL),
(29, 49, '2016-01-28 21:35:50', NULL),
(30, 49, '2016-01-28 21:39:08', NULL),
(31, 48, '2016-01-28 21:45:35', NULL),
(32, 49, '2016-01-28 21:57:00', '2016-01-28 22:04:09'),
(33, 48, '2016-01-28 22:01:28', NULL),
(34, 48, '2016-01-28 22:03:51', NULL),
(35, 49, '2016-01-28 22:04:44', NULL),
(36, 48, '2016-01-28 22:16:03', NULL),
(37, 46, '2016-01-28 22:18:16', NULL),
(38, 6, '2016-01-28 22:25:42', NULL),
(39, 6, '2016-01-28 23:03:09', NULL),
(40, 6, '2016-01-29 13:41:07', NULL),
(41, 46, '2016-01-29 14:46:07', NULL),
(42, 6, '2016-01-29 19:42:17', NULL),
(43, 6, '2016-01-29 19:54:51', '2016-01-29 20:02:51'),
(44, 13, '2016-01-29 19:58:58', '2016-01-29 20:06:21'),
(45, 6, '2016-01-29 20:03:00', '2016-01-29 20:05:12'),
(46, 6, '2016-01-29 20:06:41', NULL),
(47, 6, '2016-01-29 20:07:13', NULL),
(48, 13, '2016-01-29 20:10:48', NULL),
(49, 13, '2016-01-30 14:19:31', NULL),
(50, 6, '2016-01-30 17:48:03', NULL),
(51, 6, '2016-02-01 03:28:36', NULL),
(52, 6, '2016-02-01 12:49:04', NULL),
(53, 46, '2016-02-01 12:50:31', NULL),
(54, 46, '2016-02-01 13:32:14', NULL),
(55, 6, '2016-02-01 13:33:11', NULL),
(56, 48, '2016-02-01 19:56:23', NULL),
(57, 7, '2016-02-01 20:06:53', NULL),
(58, 6, '2016-02-02 01:59:10', NULL),
(59, 46, '2016-02-02 13:30:01', '2016-02-02 14:47:09'),
(60, 36, '2016-02-02 14:42:20', '2016-02-02 15:13:45'),
(61, 48, '2016-02-02 14:48:05', '2016-02-02 14:58:26'),
(62, 37, '2016-02-02 14:58:37', '2016-02-02 14:59:48'),
(63, 6, '2016-02-03 02:05:33', NULL),
(64, 46, '2016-02-03 02:08:53', NULL),
(65, 6, '2016-02-03 14:52:37', NULL),
(66, 46, '2016-02-03 14:54:27', NULL),
(67, 50, '2016-02-03 14:57:33', NULL),
(68, 6, '2016-02-03 17:55:58', NULL),
(69, 6, '2016-02-04 14:22:58', NULL),
(70, 46, '2016-02-04 14:23:06', NULL),
(71, 6, '2016-02-05 21:01:20', NULL),
(72, 46, '2016-02-05 21:03:56', NULL),
(73, 6, '2016-02-05 21:04:44', NULL),
(74, 6, '2016-02-05 21:06:33', NULL),
(75, 36, '2016-02-06 12:20:21', '2016-02-06 12:22:21'),
(76, 36, '2016-02-06 12:23:20', '2016-02-06 13:23:31'),
(77, 46, '2016-02-06 12:30:11', NULL),
(78, 46, '2016-02-06 12:36:44', '2016-02-06 13:18:37'),
(79, 36, '2016-02-06 13:23:54', NULL),
(80, 46, '2016-02-06 13:26:34', NULL),
(81, 36, '2016-02-06 13:28:39', NULL),
(82, 36, '2016-02-06 13:47:33', NULL),
(83, 46, '2016-02-06 14:21:51', NULL),
(84, 46, '2016-02-06 16:46:19', NULL),
(85, 6, '2016-02-06 16:46:37', NULL),
(86, 6, '2016-02-06 16:52:56', NULL),
(87, 48, '2016-02-06 16:53:19', NULL),
(88, 6, '2016-02-06 23:28:26', NULL),
(89, 6, '2016-02-06 23:29:27', NULL),
(90, 46, '2016-02-06 23:31:23', NULL),
(91, 6, '2016-02-06 23:31:28', NULL),
(92, 46, '2016-02-07 00:19:44', NULL),
(93, 6, '2016-02-07 00:24:41', NULL),
(94, 46, '2016-02-07 00:27:08', NULL),
(95, 46, '2016-02-07 19:13:17', NULL),
(96, 6, '2016-02-07 19:13:38', NULL),
(97, 6, '2016-02-07 20:03:12', NULL),
(98, 46, '2016-02-08 16:55:10', NULL),
(99, 6, '2016-02-08 16:56:26', NULL),
(100, 36, '2016-02-08 19:03:14', NULL),
(101, 46, '2016-02-08 19:04:15', NULL),
(102, 46, '2016-02-08 19:09:07', NULL),
(103, 46, '2016-02-08 22:29:50', NULL),
(104, 6, '2016-02-08 22:30:37', NULL),
(105, 48, '2016-02-08 22:35:25', NULL),
(106, 6, '2016-02-08 22:37:37', NULL),
(107, 46, '2016-02-08 22:37:54', NULL),
(108, 6, '2016-02-08 22:55:46', NULL),
(109, 6, '2016-02-08 23:04:13', NULL),
(110, 46, '2016-02-08 23:04:50', NULL),
(111, 46, '2016-02-09 02:41:35', NULL),
(112, 6, '2016-02-09 02:42:44', NULL),
(113, 6, '2016-02-09 03:05:43', NULL),
(114, 46, '2016-02-09 03:06:33', NULL),
(115, 36, '2016-02-09 11:20:25', '2016-02-09 11:24:24'),
(116, 36, '2016-02-09 16:42:48', NULL),
(117, 46, '2016-02-09 16:43:46', NULL),
(118, 6, '2016-02-09 16:45:12', NULL),
(119, 46, '2016-02-09 16:53:45', NULL),
(120, 6, '2016-02-09 16:56:01', NULL),
(121, 46, '2016-02-09 16:56:42', NULL),
(122, 6, '2016-02-09 18:19:30', NULL),
(123, 46, '2016-02-09 18:40:37', '2016-02-09 18:53:36'),
(124, 6, '2016-02-09 19:56:29', NULL),
(125, 46, '2016-02-09 19:57:47', NULL),
(126, 6, '2016-02-09 23:02:25', NULL),
(127, 46, '2016-02-09 23:05:50', NULL),
(128, 46, '2016-02-10 15:38:50', '2016-02-10 16:41:32'),
(129, 6, '2016-02-11 00:36:34', NULL),
(130, 46, '2016-02-11 00:37:39', NULL),
(131, 46, '2016-02-11 00:45:06', NULL),
(132, 6, '2016-02-11 12:48:39', NULL),
(133, 6, '2016-02-11 12:51:22', NULL),
(134, 28, '2016-02-11 13:00:34', NULL),
(135, 28, '2016-02-11 13:06:26', NULL),
(136, 6, '2016-02-11 15:01:23', NULL),
(137, 46, '2016-02-11 15:06:28', NULL),
(138, 6, '2016-02-11 15:07:18', NULL),
(139, 46, '2016-02-11 15:12:05', '2016-02-11 15:17:17'),
(140, 36, '2016-02-11 15:12:22', '2016-02-11 16:07:11'),
(141, 28, '2016-02-11 15:17:46', NULL),
(142, 6, '2016-02-11 16:03:24', NULL),
(143, 28, '2016-02-11 16:07:59', NULL),
(144, 46, '2016-02-12 16:34:55', '2016-02-12 16:39:10'),
(145, 36, '2016-02-12 16:39:17', '2016-02-12 16:39:39'),
(146, 46, '2016-02-12 16:40:12', '2016-02-12 16:40:50'),
(147, 46, '2016-02-12 18:28:01', '2016-02-12 18:31:22'),
(148, 36, '2016-02-12 19:28:34', '2016-02-12 19:28:42'),
(149, 46, '2016-02-12 19:28:49', '2016-02-12 19:29:20'),
(150, 6, '2016-02-12 20:36:06', NULL),
(151, 46, '2016-02-13 16:46:17', NULL),
(152, 36, '2016-02-13 16:46:30', NULL),
(153, 6, '2016-02-14 01:44:52', NULL),
(154, 46, '2016-02-14 01:46:53', NULL),
(155, 6, '2016-02-14 15:45:31', NULL),
(156, 46, '2016-02-14 15:48:04', NULL),
(157, 36, '2016-02-15 10:16:51', '2016-02-15 11:15:55'),
(158, 28, '2016-02-15 10:18:14', '2016-02-15 11:16:10'),
(159, 28, '2016-02-15 11:38:54', NULL),
(160, 36, '2016-02-15 11:39:32', NULL),
(161, 46, '2016-02-15 14:04:19', '2016-02-15 14:05:21'),
(162, 51, '2016-02-15 14:12:37', '2016-02-15 14:17:23'),
(163, 6, '2016-02-15 14:17:36', '2016-02-15 14:19:50'),
(164, 49, '2016-02-15 14:20:49', '2016-02-15 14:23:58'),
(165, 51, '2016-02-15 14:24:24', NULL),
(166, 46, '2016-02-15 16:14:10', '2016-02-15 16:15:16'),
(167, 36, '2016-02-15 16:14:34', '2016-02-15 17:09:16'),
(168, 28, '2016-02-15 16:15:27', '2016-02-15 17:17:43'),
(169, 49, '2016-02-15 18:33:08', '2016-02-15 18:52:47'),
(170, 46, '2016-02-15 18:36:12', '2016-02-15 18:48:19'),
(171, 51, '2016-02-15 18:50:09', NULL),
(172, 6, '2016-02-15 18:53:06', NULL),
(173, 52, '2016-02-15 20:44:58', '2016-02-15 21:09:10'),
(174, 51, '2016-02-15 21:09:49', '2016-02-15 21:34:38'),
(175, 52, '2016-02-15 21:35:30', '2016-02-15 21:40:46'),
(176, 46, '2016-02-15 21:38:06', NULL),
(177, 6, '2016-02-15 21:41:53', NULL),
(178, 6, '2016-02-15 23:28:54', '2016-02-15 23:30:28'),
(179, 46, '2016-02-15 23:29:11', NULL),
(180, 49, '2016-02-15 23:30:44', NULL),
(181, 6, '2016-02-16 13:10:33', NULL),
(182, 46, '2016-02-16 15:45:14', NULL),
(183, 6, '2016-02-16 18:00:42', NULL),
(184, 46, '2016-02-16 18:01:19', NULL),
(185, 6, '2016-02-17 11:49:06', '2016-02-17 14:14:29'),
(186, 46, '2016-02-17 11:54:19', '2016-02-17 14:14:41'),
(187, 6, '2016-02-17 14:15:03', '2016-02-17 14:50:13'),
(188, 46, '2016-02-17 14:15:40', '2016-02-17 14:51:21'),
(189, 6, '2016-02-17 14:50:52', NULL),
(190, 46, '2016-02-17 14:51:33', NULL),
(191, 6, '2016-02-17 14:57:07', '2016-02-17 15:14:16'),
(192, 46, '2016-02-19 16:48:37', '2016-02-19 16:54:14'),
(193, 46, '2016-02-19 16:54:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_to_subscriber`
--

CREATE TABLE `mail_to_subscriber` (
  `mail_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 => Buyer, 2=> Seller, 3=> Subscriber',
  `brandlist` varchar(200) NOT NULL,
  `categorylist` varchar(250) NOT NULL,
  `countylist` varchar(250) NOT NULL,
  `compose_id` int(11) NOT NULL,
  `mail_list` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_to_subscriber`
--

INSERT INTO `mail_to_subscriber` (`mail_id`, `user_type`, `brandlist`, `categorylist`, `countylist`, `compose_id`, `mail_list`, `created`) VALUES
(1, 3, '', '', '', 1, 'maasrajesh2@gmail.com', '2015-12-28 18:50:30'),
(4, 3, '', '', '', 1, 'maasrajesh2@gmail.com', '2016-01-13 13:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `maincontent`
--

CREATE TABLE `maincontent` (
  `id` int(11) NOT NULL,
  `heading_text` text,
  `featured_title` varchar(250) DEFAULT '',
  `featured_content` text,
  `img_link_featured` text,
  `featured_readmore` text,
  `top_story_title_one` varchar(250) DEFAULT '',
  `top_story_image_link_one` text,
  `top_story_readmore_one` text,
  `top_story_title_two` varchar(250) DEFAULT '',
  `top_story_image_link_two` text,
  `top_story_readmore_two` text,
  `top_story_title_three` varchar(250) DEFAULT '',
  `top_story_image_link_three` text,
  `top_story_readmore_three` text,
  `top_story_title_four` varchar(250) DEFAULT '',
  `top_story_image_link_four` text,
  `top_story_readmore_four` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maincontent`
--

INSERT INTO `maincontent` (`id`, `heading_text`, `featured_title`, `featured_content`, `img_link_featured`, `featured_readmore`, `top_story_title_one`, `top_story_image_link_one`, `top_story_readmore_one`, `top_story_title_two`, `top_story_image_link_two`, `top_story_readmore_two`, `top_story_title_three`, `top_story_image_link_three`, `top_story_readmore_three`, `top_story_title_four`, `top_story_image_link_four`, `top_story_readmore_four`, `created`, `modified`) VALUES
(1, 'Test examp', 'Dad Plays Baby A Lullaby & What Happens Next Took Our Breath Away!', 'When 5 month old Samuel couldnâ€™t sleep because of an ear infection his father David Motola strapped him into his baby carrier, sat down with...', 'http://www.puneflowerdelivery.com/images/cakes/india12.jpg', 'https://www.pinterest.com', 'They Spoiled A Baby Deer By Rubbing Its Belly, But Watch When They Try To Stop!', 'http://www.puneflowerdelivery.com/images/cakes/india12.jpg', 'https://www.amazon.com/', 'Babyâ€™s Reaction To Meeting Dadâ€™s Identical Twin For The 1st Time Is The Best!', 'http://www.puneflowerdelivery.com/images/cakes/india12.jpg', 'https://www.youtube.com/', 'Pro Abortion Org. Gives Nasty Critique Of Cute Doritos Super Bowl Ad, & Americanâ€™s Hammer Back!', 'http://www.puneflowerdelivery.com/images/cakes/india12.jpg', 'https://twitter.com/', 'This Very Smart Orangutan Actually Builds Himself A Hammock!?', 'http://www.puneflowerdelivery.com/images/cakes/india12.jpg', 'https://unsplash.com/', '2016-01-21 09:02:22', '2017-08-01 05:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `master_countries`
--

CREATE TABLE `master_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_short_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_countries`
--

INSERT INTO `master_countries` (`country_id`, `country_name`, `country_short_name`) VALUES
(1, 'Alba', ''),
(2, 'Arad', ''),
(3, 'Arges', ''),
(4, 'Bacau', ''),
(5, 'Bihor', ''),
(6, 'Bistrita-Nasaud', ''),
(7, 'Botosani', ''),
(8, 'Brasov', ''),
(9, 'Braila', ''),
(10, 'Bucuresti', ''),
(11, 'Buzau', ''),
(12, 'Caras-Severin', ''),
(13, 'Calarasi', ''),
(14, 'Cluj', ''),
(15, 'Constanta', ''),
(16, 'Covasna', ''),
(17, 'Dambovita', ''),
(18, 'Dolj', ''),
(19, 'Galati', ''),
(20, 'Giurgiu', ''),
(21, 'Gorj', ''),
(22, 'Harghita', ''),
(23, 'Hunedoara', ''),
(24, 'Ialomita', ''),
(25, 'Iasi', ''),
(26, 'Ilfov', ''),
(27, 'Maramures', ''),
(28, 'Mehedinti', ''),
(29, 'Mures', ''),
(30, 'Neamt', ''),
(31, 'Olt', ''),
(32, 'Prahova', ''),
(33, 'Satu Mare', ''),
(34, 'Salaj', ''),
(35, 'Sibiu', ''),
(36, 'Suceava', ''),
(37, 'Teleorman', ''),
(38, 'Timis', ''),
(39, 'Tulcea', ''),
(40, 'Vaslui', ''),
(41, 'Valcea', ''),
(42, 'Vrancea', ''),
(43, 'Nigeria', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_menus`
--

CREATE TABLE `master_menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(200) DEFAULT NULL,
  `assign_type` int(11) DEFAULT '0',
  `menu_link` text,
  `menu_position` varchar(20) DEFAULT NULL,
  `menu_parent` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menus`
--

INSERT INTO `master_menus` (`id`, `menu_name`, `assign_type`, `menu_link`, `menu_position`, `menu_parent`, `ordering`, `created`) VALUES
(2, 'Home', 1, 'http://maasinfotech24x7.com/inhealth', 'top', 0, 1, '2015-12-15 14:45:54'),
(7, 'About Us', 0, '3', 'top', 0, 2, '2015-12-16 08:05:08'),
(8, 'News', 0, '5', 'top', 0, 3, '2015-12-16 08:05:34'),
(9, 'Products', 0, '6', 'top', 0, 4, '2015-12-16 08:05:59'),
(10, 'Telehealth', 0, '7', 'top', 0, 5, '2015-12-16 08:06:26'),
(11, 'Contact Us', 0, '8', 'top', 0, 6, '2015-12-16 08:06:47'),
(16, 'Term & Conditions', 0, '4', 'bottom', 0, 1, '2015-12-16 13:24:46'),
(17, 'Contact', 0, '8', 'bottom', 0, 2, '2015-12-16 13:25:18'),
(18, 'Privacy', 0, '10', 'bottom', 0, 3, '2015-12-16 13:28:04'),
(19, 'Employers', 0, '12', 'telehealth', 0, 1, '2015-12-24 12:21:03'),
(20, 'Individual/Family', 0, '13', 'telehealth', 0, 2, '2015-12-24 12:21:45'),
(21, 'Remote Clinic', 0, '14', 'telehealth', 0, 3, '2015-12-24 12:22:26'),
(22, 'Health Provider', 0, '15', 'telehealth', 0, 4, '2015-12-24 12:22:53'),
(23, 'FAQ', 0, '20', 'bottom', 0, 3, '2016-02-12 16:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `master_states`
--

CREATE TABLE `master_states` (
  `location_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_states`
--

INSERT INTO `master_states` (`location_id`, `country_id`, `location_name`) VALUES
(1, 1, 'Abrud'),
(2, 1, 'Abrud-Sat'),
(3, 1, 'Achimetesti'),
(4, 1, 'Acmariu'),
(5, 1, 'Aiud'),
(6, 1, 'Aiudul de Sus'),
(7, 1, 'Alba Iulia'),
(8, 1, 'Albac'),
(9, 1, 'Alecus'),
(10, 1, 'Almasu de Mijloc'),
(11, 1, 'Almasu Mare'),
(12, 1, 'Ampoita'),
(13, 1, 'Anghelesti'),
(14, 1, 'Arieseni'),
(15, 1, 'Aronesti'),
(16, 1, 'Arti'),
(17, 1, 'Asinip'),
(18, 1, 'Avram Iancu'),
(19, 1, 'Avramesti (Arieseni)'),
(20, 1, 'Avramesti (Avram Iancu)'),
(21, 1, 'Baba'),
(22, 1, 'Bacainti'),
(23, 1, 'Badai'),
(24, 1, 'Bagau'),
(25, 1, 'Bai'),
(26, 1, 'Baia de Aries'),
(27, 1, 'Balcaciu'),
(28, 1, 'Balesti'),
(29, 1, 'Balesti-Catun'),
(30, 1, 'Balmosesti'),
(31, 1, 'Balomiru de Camp'),
(32, 1, 'Barabant'),
(33, 1, 'Barasti'),
(34, 1, 'Barbesti'),
(35, 1, 'Bardesti'),
(36, 1, 'Barlesti (Bistra)'),
(37, 1, 'Barlesti (Mogos)'),
(38, 1, 'Barlesti (Scarisoara)'),
(39, 1, 'Barlesti-Catun'),
(40, 1, 'Barsana'),
(41, 1, 'Barzan'),
(42, 1, 'Barzogani'),
(43, 1, 'Bazesti'),
(44, 1, 'Beldiu'),
(45, 1, 'Benic'),
(46, 1, 'Berghin'),
(47, 1, 'Beta'),
(48, 1, 'Bidigesti'),
(49, 1, 'Biharia'),
(50, 1, 'Biia'),
(51, 1, 'Bilanesti'),
(52, 1, 'Bisericani'),
(53, 1, 'Bistra'),
(54, 1, 'Blaj'),
(55, 1, 'Blandiana'),
(56, 1, 'Blidesti'),
(57, 1, 'Bobaresti (Sohodol)'),
(58, 1, 'Bobaresti (Vidra)'),
(59, 1, 'Bocesti'),
(60, 1, 'Bocsitura'),
(61, 1, 'Bodesti'),
(62, 1, 'Bodresti'),
(63, 1, 'Bogdanesti (Mogos)'),
(64, 1, 'Bogdanesti (Vidra)'),
(65, 1, 'Boglesti'),
(66, 1, 'Boldesti'),
(67, 1, 'Bolovanesti'),
(68, 1, 'Boncesti'),
(69, 1, 'Bordestii Poieni'),
(70, 1, 'Borlesti'),
(71, 1, 'Botani'),
(72, 1, 'Botesti (Campeni)'),
(73, 1, 'Botesti (Scarisoara)'),
(74, 1, 'Botesti (Zlatna)'),
(75, 1, 'Boz'),
(76, 1, 'Bradeana'),
(77, 1, 'Bradesti'),
(78, 1, 'Bradet'),
(79, 1, 'Brazesti'),
(80, 1, 'Bubesti'),
(81, 1, 'Bucerdea Granoasa'),
(82, 1, 'Bucerdea Vinoasa'),
(83, 1, 'Bucium'),
(84, 1, 'Bucium-Sat'),
(85, 1, 'Bucuru'),
(86, 1, 'Budaiesti'),
(87, 1, 'Budeni'),
(88, 1, 'Bulbuc'),
(89, 1, 'Buninginea'),
(90, 1, 'Bunta'),
(91, 1, 'Burzesti'),
(92, 1, 'Burzonesti'),
(93, 1, 'Butesti (Horea)'),
(94, 1, 'Butesti (Mogos)'),
(95, 1, 'Calene'),
(96, 1, 'Calnic'),
(97, 1, 'Calugaresti'),
(98, 1, 'Campeni'),
(99, 1, 'Campu Goblii'),
(100, 1, 'Candesti'),
(101, 1, 'Capalna'),
(102, 1, 'Capalna de Jos'),
(103, 1, 'Captalan'),
(104, 1, 'Capu Dealului'),
(105, 1, 'Capud'),
(106, 1, 'Carasti'),
(107, 1, 'Carpen'),
(108, 1, 'Carpenii de Sus'),
(109, 1, 'Carpinis (Garbova)'),
(110, 1, 'Carpinis (Rosia Montana)'),
(111, 1, 'Cartulesti'),
(112, 1, 'Casa de Piatra'),
(113, 1, 'Casoaia'),
(114, 1, 'Cenade'),
(115, 1, 'Cerbu'),
(116, 1, 'Cergau'),
(117, 1, 'Cergau Mare'),
(118, 1, 'Cergau Mic'),
(119, 1, 'Certege'),
(120, 1, 'Ceru Bacainti'),
(121, 1, 'Cetatea de Balta'),
(122, 1, 'Cetea'),
(123, 1, 'Cheia'),
(124, 1, 'Cheile Cibului'),
(125, 1, 'Cheleteni'),
(126, 1, 'Cib'),
(127, 1, 'Cicard'),
(128, 1, 'Cicau'),
(129, 1, 'Cioara de Sus'),
(130, 1, 'Ciocasu'),
(131, 1, 'Cionesti'),
(132, 1, 'Cistei'),
(133, 1, 'Cisteiu de Mures'),
(134, 1, 'Ciuculesti'),
(135, 1, 'Ciugud'),
(136, 1, 'Ciugudu de Jos'),
(137, 1, 'Ciugudu de Sus'),
(138, 1, 'Ciuguzel'),
(139, 1, 'Ciuldesti'),
(140, 1, 'Ciumbrud'),
(141, 1, 'Ciuruleasa'),
(142, 1, 'Coasta Hentii'),
(143, 1, 'Coasta Vascului'),
(144, 1, 'Cobles'),
(145, 1, 'Cocesti'),
(146, 1, 'Cocosesti'),
(147, 1, 'Cojocani'),
(148, 1, 'Coleseni'),
(149, 1, 'Colibi'),
(150, 1, 'Coltesti'),
(151, 1, 'Copand'),
(152, 1, 'Corna'),
(153, 1, 'Cornu'),
(154, 1, 'Coroiesti'),
(155, 1, 'Cortesti'),
(156, 1, 'Coslariu'),
(157, 1, 'Coslariu Nou'),
(158, 1, 'Costesti (Albac)'),
(159, 1, 'Costesti (Poiana Vadului)'),
(160, 1, 'Cotorasti'),
(161, 1, 'Craciunelu de Jos'),
(162, 1, 'Craciunelu de Sus'),
(163, 1, 'Craiva'),
(164, 1, 'Cretesti'),
(165, 1, 'Cricau'),
(166, 1, 'Criseni'),
(167, 1, 'Cristesti'),
(168, 1, 'Cucuta'),
(169, 1, 'Cugir'),
(170, 1, 'Culdesti'),
(171, 1, 'Cunta'),
(172, 1, 'Curaturi'),
(173, 1, 'Curmatura'),
(174, 1, 'Curpeni'),
(175, 1, 'Cut'),
(176, 1, 'Daia Romana'),
(177, 1, 'Dambureni'),
(178, 1, 'Dandut'),
(179, 1, 'Darlesti'),
(180, 1, 'Daroaia'),
(181, 1, 'Deal'),
(182, 1, 'Dealu Bajului'),
(183, 1, 'Dealu Bistrii'),
(184, 1, 'Dealu Capsei'),
(185, 1, 'Dealu Caselor'),
(186, 1, 'Dealu Crisului'),
(187, 1, 'Dealu Dostatului'),
(188, 1, 'Dealu Ferului'),
(189, 1, 'Dealu Frumos (Garda de Sus)'),
(190, 1, 'Dealu Frumos (Vadu Motilor)'),
(191, 1, 'Dealu Geoagiului'),
(192, 1, 'Dealu Goiesti'),
(193, 1, 'Dealu Lamasoi'),
(194, 1, 'Dealu Muntelui'),
(195, 1, 'Dealu Ordancusii'),
(196, 1, 'Dealu Roatei'),
(197, 1, 'Decea'),
(198, 1, 'Deleni-Obarsie'),
(199, 1, 'Deoncesti'),
(200, 1, 'Deve'),
(201, 1, 'Dilimani'),
(202, 1, 'Dobra'),
(203, 1, 'Dobresti'),
(204, 1, 'Dobrot'),
(205, 1, 'Dogaresti'),
(206, 1, 'Dolesti'),
(207, 1, 'Doptau'),
(208, 1, 'Dos'),
(209, 1, 'Dostat'),
(210, 1, 'Dosu Luncii'),
(211, 1, 'Dosu Vasesti'),
(212, 1, 'Dragoiesti-Lunca'),
(213, 1, 'Drambar'),
(214, 1, 'Drasov'),
(215, 1, 'Dric'),
(216, 1, 'Duduieni'),
(217, 1, 'Dumacesti'),
(218, 1, 'Dumbrava (Ciugud)'),
(219, 1, 'Dumbrava (Sasciori)'),
(220, 1, 'Dumbrava (Unirea)'),
(221, 1, 'Dumbrava (Zlatna)'),
(222, 1, 'Dumbravita'),
(223, 1, 'Dumesti'),
(224, 1, 'Dumitra'),
(225, 1, 'Dupa Deal (Lupsa)'),
(226, 1, 'Dupa Deal (Ponor)'),
(227, 1, 'Dupa Plese'),
(228, 1, 'Durasti'),
(229, 1, 'Faget'),
(230, 1, 'Fagetu de Jos'),
(231, 1, 'Fagetu de Sus'),
(232, 1, 'Fantanele'),
(233, 1, 'Farau'),
(234, 1, 'Fata'),
(235, 1, 'Fata Abrudului'),
(236, 1, 'Fata Cristesei'),
(237, 1, 'Fata Lapusului'),
(238, 1, 'Fata Pietrii'),
(239, 1, 'Fata-Lazesti'),
(240, 1, 'Feisa'),
(241, 1, 'Fenes'),
(242, 1, 'Feresti'),
(243, 1, 'Fericet'),
(244, 1, 'Feteni'),
(245, 1, 'Ficaresti'),
(246, 1, 'Flitesti'),
(247, 1, 'Floresti (Bucium)'),
(248, 1, 'Floresti (Campeni)'),
(249, 1, 'Floresti (Ramet)'),
(250, 1, 'Floresti (Scarisoara)'),
(251, 1, 'Furduiesti (Campeni)'),
(252, 1, 'Furduiesti (Sohodol)'),
(253, 1, 'Gabud'),
(254, 1, 'Galati'),
(255, 1, 'Galbena'),
(256, 1, 'Galda de Jos'),
(257, 1, 'Galda de Sus'),
(258, 1, 'Galtiu'),
(259, 1, 'Gambas'),
(260, 1, 'Ganesti'),
(261, 1, 'Garbova'),
(262, 1, 'Garbova de Jos'),
(263, 1, 'Garbova de Sus'),
(264, 1, 'Garbovita'),
(265, 1, 'Garda de Sus'),
(266, 1, 'Garda Seaca'),
(267, 1, 'Garda-Barbulesti'),
(268, 1, 'Garde'),
(269, 1, 'Geamana'),
(270, 1, 'Geoagiu de Sus'),
(271, 1, 'Geogel'),
(272, 1, 'Geomal'),
(273, 1, 'Ghedulesti'),
(274, 1, 'Ghetari'),
(275, 1, 'Ghioncani'),
(276, 1, 'Ghirbom'),
(277, 1, 'Giurgiut'),
(278, 1, 'Gligoresti'),
(279, 1, 'Glod'),
(280, 1, 'Glogovet'),
(281, 1, 'Goasele'),
(282, 1, 'Goiesti'),
(283, 1, 'Gojeiesti'),
(284, 1, 'Gorgan'),
(285, 1, 'Grosi'),
(286, 1, 'Gura Ariesului'),
(287, 1, 'Gura Cornei'),
(288, 1, 'Gura Cutului'),
(289, 1, 'Gura Izbitei'),
(290, 1, 'Gura Rosiei'),
(291, 1, 'Gura Sohodol'),
(292, 1, 'Hadarau'),
(293, 1, 'Haiducesti'),
(294, 1, 'Hanasesti (Garda de Sus)'),
(295, 1, 'Hanasesti (Poiana Vadului)'),
(296, 1, 'Hanes Mina'),
(297, 1, 'Hapria'),
(298, 1, 'Harasti'),
(299, 1, 'Hategana'),
(300, 1, 'Heleresti'),
(301, 1, 'Helesti'),
(302, 1, 'Henig'),
(303, 1, 'Heria'),
(304, 1, 'Hoanca (Sohodol)'),
(305, 1, 'Hoanca (Vidra)'),
(306, 1, 'Hodisesti'),
(307, 1, 'Hodobana'),
(308, 1, 'Holobani'),
(309, 1, 'Hoparta'),
(310, 1, 'Horea'),
(311, 1, 'Hudricesti'),
(312, 1, 'Huzaresti'),
(313, 1, 'Iacobesti'),
(314, 1, 'Ibru'),
(315, 1, 'Iclod'),
(316, 1, 'Ighiel'),
(317, 1, 'Ighiu'),
(318, 1, 'Ignatesti'),
(319, 1, 'Iliesti'),
(320, 1, 'Incesti (Avram Iancu)'),
(321, 1, 'Incesti (Posaga)'),
(322, 1, 'Inoc'),
(323, 1, 'Intregalde'),
(324, 1, 'Inuri'),
(325, 1, 'Isca'),
(326, 1, 'Ivanis'),
(327, 1, 'Izbicioara'),
(328, 1, 'Izbita'),
(329, 1, 'Izlaz'),
(330, 1, 'Izvoarele (Blaj)'),
(331, 1, 'Izvoarele (Garda de Sus)'),
(332, 1, 'Izvoarele (Livezile)'),
(333, 1, 'Izvoru Ampoiului'),
(334, 1, 'Jeflesti'),
(335, 1, 'Jidostina'),
(336, 1, 'Jidvei'),
(337, 1, 'Jojei'),
(338, 1, 'Joldisesti'),
(339, 1, 'Jurcuiesti'),
(340, 1, 'Lancram'),
(341, 1, 'Laz (Sasciori)'),
(342, 1, 'Laz (Vintu de Jos)'),
(343, 1, 'Lazesti (Scarisoara)'),
(344, 1, 'Lazesti (Vadu Motilor)'),
(345, 1, 'Lazuri (Lupsa)'),
(346, 1, 'Lazuri (Sohodol)'),
(347, 1, 'Lehesti'),
(348, 1, 'Leorint'),
(349, 1, 'Lespezea'),
(350, 1, 'Lipaia'),
(351, 1, 'Livezile'),
(352, 1, 'Lodroman'),
(353, 1, 'Loman'),
(354, 1, 'Lopadea Noua'),
(355, 1, 'Lopadea Veche'),
(356, 1, 'Luminesti'),
(357, 1, 'Lunca (Lupsa)'),
(358, 1, 'Lunca (Posaga)'),
(359, 1, 'Lunca (Valea Lunga)'),
(360, 1, 'Lunca (Vidra)'),
(361, 1, 'Lunca Ampoitei'),
(362, 1, 'Lunca Bisericii'),
(363, 1, 'Lunca de Jos'),
(364, 1, 'Lunca Goiesti'),
(365, 1, 'Lunca Larga (Bistra)'),
(366, 1, 'Lunca Larga (Ocolis)'),
(367, 1, 'Lunca Merilor'),
(368, 1, 'Lunca Metesului'),
(369, 1, 'Lunca Muresului'),
(370, 1, 'Lunca Tarnavei'),
(371, 1, 'Lunca Vesesti'),
(372, 1, 'Lupaiesti'),
(373, 1, 'Lupsa'),
(374, 1, 'Lupseni'),
(375, 1, 'Lupu'),
(376, 1, 'Lupulesti'),
(377, 1, 'Macaresti'),
(378, 1, 'Maghierat'),
(379, 1, 'Magina'),
(380, 1, 'Magura (Bucium)'),
(381, 1, 'Magura (Galda de Jos)'),
(382, 1, 'Mahaceni'),
(383, 1, 'Mamaligani'),
(384, 1, 'Manarade'),
(385, 1, 'Manastire'),
(386, 1, 'Mancesti'),
(387, 1, 'Margaia'),
(388, 1, 'Margineni'),
(389, 1, 'Marinesti'),
(390, 1, 'Martesti'),
(391, 1, 'Martinie'),
(392, 1, 'Matacina'),
(393, 1, 'Matei'),
(394, 1, 'Matisesti (Ciuruleasa)'),
(395, 1, 'Matisesti (Horea)'),
(396, 1, 'Medresti'),
(397, 1, 'Medves'),
(398, 1, 'Mereteu'),
(399, 1, 'Mescreac'),
(400, 1, 'Mesentea'),
(401, 1, 'Metes'),
(402, 1, 'Micesti'),
(403, 1, 'Micoslaca'),
(404, 1, 'Mihaiesti'),
(405, 1, 'Mihalt'),
(406, 1, 'Mihoesti'),
(407, 1, 'Miraslau'),
(408, 1, 'Modolesti (Intregalde)'),
(409, 1, 'Modolesti (Vidra)'),
(410, 1, 'Mogos'),
(411, 1, 'Moraresti (Ciuruleasa)'),
(412, 1, 'Moraresti (Sohodol)'),
(413, 1, 'Morcanesti'),
(414, 1, 'Motorasti'),
(415, 1, 'Mugesti'),
(416, 1, 'Muncelu'),
(417, 1, 'Munesti'),
(418, 1, 'Muntari'),
(419, 1, 'Mununa'),
(420, 1, 'Musca'),
(421, 1, 'Nadastia'),
(422, 1, 'Namas'),
(423, 1, 'Napaiesti'),
(424, 1, 'Necrilesti'),
(425, 1, 'Necsesti'),
(426, 1, 'Negesti'),
(427, 1, 'Negresti'),
(428, 1, 'Nelegesti'),
(429, 1, 'Nemesi'),
(430, 1, 'Nicoresti'),
(431, 1, 'Niculesti'),
(432, 1, 'Noslac'),
(433, 1, 'Novacesti'),
(434, 1, 'Oarda'),
(435, 1, 'Obreja'),
(436, 1, 'Ocna Mures'),
(437, 1, 'Ocnisoara'),
(438, 1, 'Ocoale'),
(439, 1, 'Ocolis'),
(440, 1, 'Odverem'),
(441, 1, 'Ohaba'),
(442, 1, 'Oidesti'),
(443, 1, 'Oiejdea'),
(444, 1, 'Olteni'),
(445, 1, 'Oncesti'),
(446, 1, 'Orasti'),
(447, 1, 'Orgesti'),
(448, 1, 'Ormenis'),
(449, 1, 'Paclisa'),
(450, 1, 'Padure'),
(451, 1, 'Padurea'),
(452, 1, 'Pagida'),
(453, 1, 'Panade'),
(454, 1, 'Panca'),
(455, 1, 'Pantesti'),
(456, 1, 'Parau Gruiului'),
(457, 1, 'Parau lui Mihai'),
(458, 1, 'Parau-Carbunari'),
(459, 1, 'Pastesti'),
(460, 1, 'Patrahaitesti'),
(461, 1, 'Patrangeni'),
(462, 1, 'Patrusesti'),
(463, 1, 'Patrutesti'),
(464, 1, 'Peles'),
(465, 1, 'Perjesti'),
(466, 1, 'Peste Valea Bistrii'),
(467, 1, 'Petelca'),
(468, 1, 'Petelei'),
(469, 1, 'Petreasa'),
(470, 1, 'Petreni'),
(471, 1, 'Petresti'),
(472, 1, 'Petrisat'),
(473, 1, 'Pianu'),
(474, 1, 'Pianu de Jos'),
(475, 1, 'Pianu de Sus'),
(476, 1, 'Pirita'),
(477, 1, 'Pitarcesti'),
(478, 1, 'Pitiga'),
(479, 1, 'Plai (Avram Iancu)'),
(480, 1, 'Plai (Garda de Sus)'),
(481, 1, 'Plaiuri'),
(482, 1, 'Plescuta'),
(483, 1, 'Plesesti'),
(484, 1, 'Plesi'),
(485, 1, 'Plisti'),
(486, 1, 'Podu lui Paul'),
(487, 1, 'Poduri'),
(488, 1, 'Poduri-Bricesti'),
(489, 1, 'Poiana (Bistra)'),
(490, 1, 'Poiana (Bucium)'),
(491, 1, 'Poiana (Sohodol)'),
(492, 1, 'Poiana Aiudului'),
(493, 1, 'Poiana Ampoiului'),
(494, 1, 'Poiana Galdei'),
(495, 1, 'Poiana Ursului'),
(496, 1, 'Poiana Vadului'),
(497, 1, 'Poieni (Blandiana)'),
(498, 1, 'Poieni (Bucium)'),
(499, 1, 'Poieni (Vidra)'),
(500, 1, 'Poienile-Mogos'),
(501, 1, 'Poienita (Arieseni)'),
(502, 1, 'Poienita (Vintu de Jos)'),
(503, 1, 'Poiu'),
(504, 1, 'Ponor'),
(505, 1, 'Ponorel'),
(506, 1, 'Popesti'),
(507, 1, 'Popestii de Jos'),
(508, 1, 'Popestii de Sus'),
(509, 1, 'Posaga'),
(510, 1, 'Posaga de Jos'),
(511, 1, 'Posaga de Sus'),
(512, 1, 'Posogani'),
(513, 1, 'Potionci'),
(514, 1, 'Preluca'),
(515, 1, 'Presaca Ampoiului'),
(516, 1, 'Puiuletesti'),
(517, 1, 'Purcareti'),
(518, 1, 'Puselesti'),
(519, 1, 'Racatau'),
(520, 1, 'Rachis'),
(521, 1, 'Rachita'),
(522, 1, 'Radesti'),
(523, 1, 'Rahau'),
(524, 1, 'Raicani'),
(525, 1, 'Ramet'),
(526, 1, 'Ratitis'),
(527, 1, 'Ravicesti'),
(528, 1, 'Razboieni-Cetate'),
(529, 1, 'Reciu'),
(530, 1, 'Remetea'),
(531, 1, 'Rimetea'),
(532, 1, 'Robesti'),
(533, 1, 'Rogoz'),
(534, 1, 'Rosesti'),
(535, 1, 'Rosia de Secas'),
(536, 1, 'Rosia Montana'),
(537, 1, 'Runc (Ocolis)'),
(538, 1, 'Runc (Scarisoara)'),
(539, 1, 'Runc (Vidra)'),
(540, 1, 'Runc (Zlatna)'),
(541, 1, 'Runcuri'),
(542, 1, 'Rusesti'),
(543, 1, 'Rusi'),
(544, 1, 'Sagagea'),
(545, 1, 'Salagesti'),
(546, 1, 'Salciua'),
(547, 1, 'Salciua de Jos'),
(548, 1, 'Salciua de Sus'),
(549, 1, 'Salistea'),
(550, 1, 'Salistea-Deal'),
(551, 1, 'Sanbenedic'),
(552, 1, 'Sancel'),
(553, 1, 'Sancrai'),
(554, 1, 'Sanmiclaus'),
(555, 1, 'Santamarie'),
(556, 1, 'Santimbru'),
(557, 1, 'Saracsau'),
(558, 1, 'Sard'),
(559, 1, 'Sartas'),
(560, 1, 'Sasa'),
(561, 1, 'Sasciori'),
(562, 1, 'Scarisoara'),
(563, 1, 'Scoarta'),
(564, 1, 'Sebes'),
(565, 1, 'Sebesel'),
(566, 1, 'Sebisesti'),
(567, 1, 'Secasel'),
(568, 1, 'Segaj'),
(569, 1, 'Seusa'),
(570, 1, 'Sfarcea'),
(571, 1, 'Sfoartea'),
(572, 1, 'Sibot'),
(573, 1, 'Sicoiesti'),
(574, 1, 'Silea'),
(575, 1, 'Silivas'),
(576, 1, 'Simocesti'),
(577, 1, 'Simulesti'),
(578, 1, 'Snide'),
(579, 1, 'Soal'),
(580, 1, 'Soharu'),
(581, 1, 'Sohodol'),
(582, 1, 'Sohodol (Albac)'),
(583, 1, 'Soicesti'),
(584, 1, 'Soimus'),
(585, 1, 'Sona'),
(586, 1, 'Sorlita'),
(587, 1, 'Spalnaca'),
(588, 1, 'Spatac'),
(589, 1, 'Spring'),
(590, 1, 'Stalnisoara'),
(591, 1, 'Stana de Mures'),
(592, 1, 'Stanesti'),
(593, 1, 'Stauini'),
(594, 1, 'Stefanca'),
(595, 1, 'Stei-Arieseni'),
(596, 1, 'Stertesti'),
(597, 1, 'Stiuleti'),
(598, 1, 'Straja'),
(599, 1, 'Stremt'),
(600, 1, 'Strungari'),
(601, 1, 'Sturu'),
(602, 1, 'Sub Piatra'),
(603, 1, 'Sucesti'),
(604, 1, 'Sugag'),
(605, 1, 'Surdesti'),
(606, 1, 'Suseni'),
(607, 1, 'Tamboresti'),
(608, 1, 'Taranesti'),
(609, 1, 'Tarina'),
(610, 1, 'Tarsa'),
(611, 1, 'Tarsa-Plai'),
(612, 1, 'Tartaria'),
(613, 1, 'Tatarlaua'),
(614, 1, 'Tau'),
(615, 1, 'Tau Bistra'),
(616, 1, 'Tauni'),
(617, 1, 'Tauti'),
(618, 1, 'Tecsesti'),
(619, 1, 'Teiu'),
(620, 1, 'Teius'),
(621, 1, 'Teleac'),
(622, 1, 'Telna'),
(623, 1, 'Tibru'),
(624, 1, 'Tifra'),
(625, 1, 'Tiur'),
(626, 1, 'Toci'),
(627, 1, 'Tolacesti'),
(628, 1, 'Tomesti'),
(629, 1, 'Tomnatec'),
(630, 1, 'Tomusesti'),
(631, 1, 'Tomutesti'),
(632, 1, 'Tonea'),
(633, 1, 'Totesti'),
(634, 1, 'Totoi'),
(635, 1, 'Trampoiele'),
(636, 1, 'Trancesti'),
(637, 1, 'Trifesti (Horea)'),
(638, 1, 'Trifesti (Lupsa)'),
(639, 1, 'Trisoresti'),
(640, 1, 'Turdas'),
(641, 1, 'Uioara de Jos'),
(642, 1, 'Uioara de Sus'),
(643, 1, 'Ungurei'),
(644, 1, 'Unirea'),
(645, 1, 'Urdes'),
(646, 1, 'Vadu Motilor'),
(647, 1, 'Vai'),
(648, 1, 'Valcaneasa'),
(649, 1, 'Valcea'),
(650, 1, 'Valcesti'),
(651, 1, 'Vale in Jos'),
(652, 1, 'Valea Abruzel'),
(653, 1, 'Valea Alba'),
(654, 1, 'Valea Barlutesti'),
(655, 1, 'Valea Barnii'),
(656, 1, 'Valea Bistrii'),
(657, 1, 'Valea Bucurului'),
(658, 1, 'Valea Caselor'),
(659, 1, 'Valea Cerbului'),
(660, 1, 'Valea Ciuciului'),
(661, 1, 'Valea Cocesti'),
(662, 1, 'Valea Fagetului'),
(663, 1, 'Valea Giogesti'),
(664, 1, 'Valea Goblii'),
(665, 1, 'Valea Holhorii'),
(666, 1, 'Valea Inzelului'),
(667, 1, 'Valea Larga'),
(668, 1, 'Valea lui Mihai'),
(669, 1, 'Valea Lunga'),
(670, 1, 'Valea Lupsii'),
(671, 1, 'Valea Maciului'),
(672, 1, 'Valea Manastirii'),
(673, 1, 'Valea Mare'),
(674, 1, 'Valea Mica'),
(675, 1, 'Valea Mlacii'),
(676, 1, 'Valea Morii'),
(677, 1, 'Valea Negrilesii'),
(678, 1, 'Valea Poienii (Bucium)'),
(679, 1, 'Valea Poienii (Ramet)'),
(680, 1, 'Valea Sasului'),
(681, 1, 'Valea Sesii (Bucium)'),
(682, 1, 'Valea Sesii (Lupsa)'),
(683, 1, 'Valea Tupilor'),
(684, 1, 'Valea Utului'),
(685, 1, 'Valea Uzei'),
(686, 1, 'Valea Verde'),
(687, 1, 'Valea Vintului'),
(688, 1, 'Valeni (Bucium)'),
(689, 1, 'Valeni (Metes)'),
(690, 1, 'Valisoara'),
(691, 1, 'Valtori (Vadu Motilor)'),
(692, 1, 'Valtori (Zlatna)'),
(693, 1, 'Vama Seaca'),
(694, 1, 'Vanvucesti'),
(695, 1, 'Varsi'),
(696, 1, 'Varsi-Rontu'),
(697, 1, 'Varsii Mari'),
(698, 1, 'Varsii Mici'),
(699, 1, 'Vartanesti'),
(700, 1, 'Vartop'),
(701, 1, 'Vasesti'),
(702, 1, 'Verdesti'),
(703, 1, 'Veseus'),
(704, 1, 'Veza'),
(705, 1, 'Vidolm'),
(706, 1, 'Vidra'),
(707, 1, 'Vidrisoara'),
(708, 1, 'Viezuri'),
(709, 1, 'Vinerea'),
(710, 1, 'Vingard'),
(711, 1, 'Vinta'),
(712, 1, 'Vintu de Jos'),
(713, 1, 'Vladesti'),
(714, 1, 'Vladosesti'),
(715, 1, 'Vulcan'),
(716, 1, 'Vurpar'),
(717, 1, 'Zagris'),
(718, 1, 'Zanzesti'),
(719, 1, 'Zaries'),
(720, 1, 'Zlatna'),
(721, 2, 'Aciuta'),
(722, 2, 'Adea'),
(723, 2, 'Agrisu Mare'),
(724, 2, 'Agrisu Mic'),
(725, 2, 'Aldesti'),
(726, 2, 'Almas'),
(727, 2, 'Alunis'),
(728, 2, 'Andrei Saguna'),
(729, 2, 'Apateu'),
(730, 2, 'Arad'),
(731, 2, 'Araneag'),
(732, 2, 'Archis'),
(733, 2, 'Avram Iancu (Cermei)'),
(734, 2, 'Avram Iancu (Varfurile)'),
(735, 2, 'Bacau de Mijloc'),
(736, 2, 'Baia'),
(737, 2, 'Banesti'),
(738, 2, 'Baratca'),
(739, 2, 'Barsa'),
(740, 2, 'Barzava'),
(741, 2, 'Barzesti'),
(742, 2, 'Bata'),
(743, 2, 'Batuta'),
(744, 2, 'Beliu'),
(745, 2, 'Belotint'),
(746, 2, 'Benesti'),
(747, 2, 'Berechiu'),
(748, 2, 'Berindia'),
(749, 2, 'Birchis'),
(750, 2, 'Bochia'),
(751, 2, 'Bocsig'),
(752, 2, 'Bodesti'),
(753, 2, 'Bodrogu Nou'),
(754, 2, 'Bodrogu Vechi'),
(755, 2, 'Bontesti'),
(756, 2, 'Botfei'),
(757, 2, 'Brazii'),
(758, 2, 'Brusturi'),
(759, 2, 'Bruznic'),
(760, 2, 'Buceava-Soimus'),
(761, 2, 'Budesti'),
(762, 2, 'Buhani'),
(763, 2, 'Bulci'),
(764, 2, 'Buteni'),
(765, 2, 'Calugareni'),
(766, 2, 'Camna'),
(767, 2, 'Capalnas'),
(768, 2, 'Caporal Alexa'),
(769, 2, 'Caprioara'),
(770, 2, 'Capruta'),
(771, 2, 'Carand'),
(772, 2, 'Cermei'),
(773, 2, 'Chelmac'),
(774, 2, 'Cherelus'),
(775, 2, 'Chesint'),
(776, 2, 'Chier'),
(777, 2, 'Chisindia'),
(778, 2, 'Chisineu Cris'),
(779, 2, 'Chislaca'),
(780, 2, 'Cicir'),
(781, 2, 'Cil'),
(782, 2, 'Cintei'),
(783, 2, 'Ciuntesti'),
(784, 2, 'Cladova'),
(785, 2, 'Clit'),
(786, 2, 'Cociuba'),
(787, 2, 'Comanesti'),
(788, 2, 'Conop'),
(789, 2, 'Corbesti'),
(790, 2, 'Coroi'),
(791, 2, 'Covasint'),
(792, 2, 'Craiva'),
(793, 2, 'Cristesti'),
(794, 2, 'Crocna'),
(795, 2, 'Cruceni'),
(796, 2, 'Cuias'),
(797, 2, 'Cuied'),
(798, 2, 'Curtici'),
(799, 2, 'Cuvesdia'),
(800, 2, 'Cuvin'),
(801, 2, 'Dezna'),
(802, 2, 'Dieci'),
(803, 2, 'Donceni'),
(804, 2, 'Dorgos'),
(805, 2, 'Dorobanti'),
(806, 2, 'Draut'),
(807, 2, 'Dud'),
(808, 2, 'Dulcele'),
(809, 2, 'Dumbrava'),
(810, 2, 'Dumbravita'),
(811, 2, 'Fantanele'),
(812, 2, 'Felnac'),
(813, 2, 'Fenis'),
(814, 2, 'Firiteaz'),
(815, 2, 'Fiscut'),
(816, 2, 'Frumuseni'),
(817, 2, 'Galsa'),
(818, 2, 'Ghioroc'),
(819, 2, 'Graniceri'),
(820, 2, 'Groseni'),
(821, 2, 'Grosi'),
(822, 2, 'Grosii Noi'),
(823, 2, 'Gura Vaii'),
(824, 2, 'Gurahont'),
(825, 2, 'Gurba'),
(826, 2, 'Halalis'),
(827, 2, 'Halmagel'),
(828, 2, 'Halmagiu'),
(829, 2, 'Hasmas'),
(830, 2, 'Hodis'),
(831, 2, 'Hontisor'),
(832, 2, 'Horia'),
(833, 2, 'Hunedoara Timisana'),
(834, 2, 'Iacobini'),
(835, 2, 'Iercoseni'),
(836, 2, 'Iermata'),
(837, 2, 'Iermata Neagra'),
(838, 2, 'Ignesti'),
(839, 2, 'Ilteu'),
(840, 2, 'Ineu'),
(841, 2, 'Ionesti'),
(842, 2, 'Iosas'),
(843, 2, 'Iratosu'),
(844, 2, 'Joia Mare'),
(845, 2, 'Julita'),
(846, 2, 'Labasint'),
(847, 2, 'Lalasint'),
(848, 2, 'Laz'),
(849, 2, 'Lazuri'),
(850, 2, 'Leasa'),
(851, 2, 'Lestioara'),
(852, 2, 'Lipova'),
(853, 2, 'Livada'),
(854, 2, 'Luguzau'),
(855, 2, 'Luncsoara'),
(856, 2, 'Lupesti'),
(857, 2, 'Macea'),
(858, 2, 'Maderat'),
(859, 2, 'Madrigesti'),
(860, 2, 'Magulicea'),
(861, 2, 'Mailat'),
(862, 2, 'Manastur'),
(863, 2, 'Mandruloc'),
(864, 2, 'Manerau'),
(865, 2, 'Maraus'),
(866, 2, 'Masca'),
(867, 2, 'Mermesti'),
(868, 2, 'Milova'),
(869, 2, 'Minead'),
(870, 2, 'Minis'),
(871, 2, 'Minisel'),
(872, 2, 'Minisu de Sus'),
(873, 2, 'Misca'),
(874, 2, 'Mocrea'),
(875, 2, 'Moneasa'),
(876, 2, 'Monorostia'),
(877, 2, 'Moroda'),
(878, 2, 'Motiori'),
(879, 2, 'Munar'),
(880, 2, 'Mustesti'),
(881, 2, 'Nadab'),
(882, 2, 'Nadalbesti'),
(883, 2, 'Nadas'),
(884, 2, 'Nadlac'),
(885, 2, 'Neagra'),
(886, 2, 'Nermis'),
(887, 2, 'Neudorf'),
(888, 2, 'Nicolae Balcescu'),
(889, 2, 'Obarsia'),
(890, 2, 'Odvos'),
(891, 2, 'Olari'),
(892, 2, 'Ostrov'),
(893, 2, 'Paiuseni'),
(894, 2, 'Pancota'),
(895, 2, 'Parnesti'),
(896, 2, 'Patars'),
(897, 2, 'Paulian'),
(898, 2, 'Paulis'),
(899, 2, 'Pecica'),
(900, 2, 'Peregu Mare'),
(901, 2, 'Peregu Mic'),
(902, 2, 'Pescari'),
(903, 2, 'Petris'),
(904, 2, 'Pilu'),
(905, 2, 'Plescuta'),
(906, 2, 'Poiana'),
(907, 2, 'Poienari'),
(908, 2, 'Prunisor'),
(909, 2, 'Radesti'),
(910, 2, 'Radna'),
(911, 2, 'Ranusa'),
(912, 2, 'Rapsig'),
(913, 2, 'Revetis'),
(914, 2, 'Rogoz de Beliu'),
(915, 2, 'Rosia'),
(916, 2, 'Rosia Noua'),
(917, 2, 'Rostoci'),
(918, 2, 'Sagu'),
(919, 2, 'Salajeni'),
(920, 2, 'Sambateni'),
(921, 2, 'Sanleani'),
(922, 2, 'Sanmartin'),
(923, 2, 'Sanpaul'),
(924, 2, 'Sanpetru German'),
(925, 2, 'Santana'),
(926, 2, 'Sarbi'),
(927, 2, 'Satu Mare'),
(928, 2, 'Satu Mic'),
(929, 2, 'Satu Nou'),
(930, 2, 'Savarsin'),
(931, 2, 'Sebis'),
(932, 2, 'Secaci'),
(933, 2, 'Secas'),
(934, 2, 'Secusigiu'),
(935, 2, 'Sederhat'),
(936, 2, 'Seitin'),
(937, 2, 'Seleus'),
(938, 2, 'Seliste'),
(939, 2, 'Selistea'),
(940, 2, 'Semlac'),
(941, 2, 'Sepreus'),
(942, 2, 'Siad'),
(943, 2, 'Siclau'),
(944, 2, 'Sicula'),
(945, 2, 'Silindia'),
(946, 2, 'Simand'),
(947, 2, 'Sintea Mare'),
(948, 2, 'Sintea Mica'),
(949, 2, 'Siria'),
(950, 2, 'Sistarovat'),
(951, 2, 'Slatina de Cris'),
(952, 2, 'Slatina de Mures'),
(953, 2, 'Socodor'),
(954, 2, 'Sofronea'),
(955, 2, 'Soimos'),
(956, 2, 'Somosches'),
(957, 2, 'Stejar'),
(958, 2, 'Stoinesti'),
(959, 2, 'Susag'),
(960, 2, 'Susani'),
(961, 2, 'Tagadau'),
(962, 2, 'Talagiu'),
(963, 2, 'Talmaci'),
(964, 2, 'Tarmure'),
(965, 2, 'Tarnavita'),
(966, 2, 'Tarnova'),
(967, 2, 'Taut'),
(968, 2, 'Tela'),
(969, 2, 'Temesesti'),
(970, 2, 'Tipar'),
(971, 2, 'Tisa'),
(972, 2, 'Tisa Noua'),
(973, 2, 'Toc'),
(974, 2, 'Tohesti'),
(975, 2, 'Troas'),
(976, 2, 'Turnu'),
(977, 2, 'Urvisu de Beliu'),
(978, 2, 'Ususau'),
(979, 2, 'Valea Mare (Gurahont)'),
(980, 2, 'Valea Mare (Savarsin)'),
(981, 2, 'Vanatori'),
(982, 2, 'Varadia de Mures'),
(983, 2, 'Varfurile'),
(984, 2, 'Variasu Mare'),
(985, 2, 'Variasu Mic'),
(986, 2, 'Varnita'),
(987, 2, 'Varsand'),
(988, 2, 'Vasile Goldis'),
(989, 2, 'Vasoaia'),
(990, 2, 'Vidra'),
(991, 2, 'Vinga'),
(992, 2, 'Virismort'),
(993, 2, 'Vladimirescu'),
(994, 2, 'Voivodeni'),
(995, 2, 'Zabalt'),
(996, 2, 'Zabrani'),
(997, 2, 'Zadareni'),
(998, 2, 'Zarand'),
(999, 2, 'Zerind'),
(1000, 2, 'Zerindu Mic'),
(1001, 2, 'Zimandcuz'),
(1002, 2, 'Zimandu Nou'),
(1004, 3, 'Adunati'),
(1005, 3, 'Afrimesti'),
(1006, 3, 'Albesti'),
(1007, 3, 'Albestii de Arges'),
(1008, 3, 'Albestii de Muscel'),
(1009, 3, 'Albestii Pamanteni'),
(1010, 3, 'Albestii Ungureni'),
(1011, 3, 'Albota'),
(1012, 3, 'Albotele'),
(1013, 3, 'Alunis'),
(1014, 3, 'Alunisu (Baiculesti)'),
(1015, 3, 'Alunisu (Bradulet)'),
(1016, 3, 'Anghinesti'),
(1017, 3, 'Aninoasa'),
(1018, 3, 'Arefu'),
(1019, 3, 'Argesani'),
(1020, 3, 'Argeselu'),
(1021, 3, 'Babana'),
(1022, 3, 'Babaroaga'),
(1023, 3, 'Bacesti'),
(1024, 3, 'Badeni'),
(1025, 3, 'Badesti (Barla)'),
(1026, 3, 'Badesti (Pietrosani)'),
(1027, 3, 'Badicea'),
(1028, 3, 'Badila'),
(1029, 3, 'Badislava'),
(1030, 3, 'Badulesti'),
(1031, 3, 'Baiculesti'),
(1032, 3, 'Baila'),
(1033, 3, 'Bajanesti'),
(1034, 3, 'Bajesti'),
(1035, 3, 'Balabani'),
(1036, 3, 'Balilesti'),
(1037, 3, 'Balilesti (Tigveni)'),
(1038, 3, 'Baloteasca'),
(1039, 3, 'Baltata'),
(1040, 3, 'Balteni'),
(1041, 3, 'Banaresti'),
(1042, 3, 'Banicesti'),
(1043, 3, 'Bantau'),
(1044, 3, 'Baranesti'),
(1045, 3, 'Barasti'),
(1046, 3, 'Barbalani'),
(1047, 3, 'Barbalatesti'),
(1048, 3, 'Barbatesti'),
(1049, 3, 'Barla'),
(1050, 3, 'Barlogu'),
(1051, 3, 'Barloi'),
(1052, 3, 'Barsestii de Jos'),
(1053, 3, 'Barsestii de Sus'),
(1054, 3, 'Barzesti'),
(1055, 3, 'Bascov'),
(1056, 3, 'Bascovele'),
(1057, 3, 'Batrani'),
(1058, 3, 'Beculesti'),
(1059, 3, 'Beleti'),
(1060, 3, 'Beleti Negresti'),
(1061, 3, 'Berevoesti'),
(1062, 3, 'Berindesti'),
(1063, 3, 'Bilcesti'),
(1064, 3, 'Blaju'),
(1065, 3, 'Blejani'),
(1066, 3, 'Bogati'),
(1067, 3, 'Bolculesti'),
(1068, 3, 'Bolovanesti'),
(1069, 3, 'Bordeieni'),
(1070, 3, 'Borlesti'),
(1071, 3, 'Borobanesti'),
(1072, 3, 'Borovinesti'),
(1073, 3, 'Botarcani'),
(1074, 3, 'Boteni'),
(1075, 3, 'Botesti'),
(1076, 3, 'Brabeti'),
(1077, 3, 'Bradetu'),
(1078, 3, 'Bradu'),
(1079, 3, 'Bradulet'),
(1080, 3, 'Braileni'),
(1081, 3, 'Branistea'),
(1082, 3, 'Branzari'),
(1083, 3, 'Brateasca'),
(1084, 3, 'Bratesti'),
(1085, 3, 'Bratia (Berevoesti)'),
(1086, 3, 'Bratia (Ciomagesti)'),
(1087, 3, 'Brosteni (Aninoasa)'),
(1088, 3, 'Brosteni (Costesti)'),
(1089, 3, 'Bucov'),
(1090, 3, 'Bucsenesti'),
(1091, 3, 'Bucsenesti-Lotasi'),
(1092, 3, 'Budeasa'),
(1093, 3, 'Budeasa Mare'),
(1094, 3, 'Budeasa Mica'),
(1095, 3, 'Budisteni'),
(1096, 3, 'Bughea de Jos'),
(1097, 3, 'Bughea de Sus'),
(1098, 3, 'Bujoi'),
(1099, 3, 'Bujoreni'),
(1100, 3, 'Bumbueni'),
(1101, 3, 'Bunesti (Cotmeana)'),
(1102, 3, 'Bunesti (Malureni)'),
(1103, 3, 'Burdea'),
(1104, 3, 'Burdesti'),
(1105, 3, 'Buretesti'),
(1106, 3, 'Burlusi'),
(1107, 3, 'Burnesti'),
(1108, 3, 'Buta'),
(1109, 3, 'Buzoesti'),
(1110, 3, 'Caldararu'),
(1111, 3, 'Calinesti'),
(1112, 3, 'Calotesti'),
(1113, 3, 'Campulung'),
(1114, 3, 'Candesti'),
(1115, 3, 'Capatanenii Pamanteni'),
(1116, 3, 'Capatanenii Ungureni'),
(1117, 3, 'Capu Piscului (Godeni)'),
(1118, 3, 'Capu Piscului (Merisani)'),
(1119, 3, 'Carcesti'),
(1120, 3, 'Carciumaresti'),
(1121, 3, 'Carpenis'),
(1122, 3, 'Carstieni'),
(1123, 3, 'Catane'),
(1124, 3, 'Catanele'),
(1125, 3, 'Cateasca'),
(1126, 3, 'Catunasi'),
(1127, 3, 'Ceauresti'),
(1128, 3, 'Ceausesti'),
(1129, 3, 'Cepari'),
(1130, 3, 'Cepari (Poiana Lacului)'),
(1131, 3, 'Ceparii Pamanteni'),
(1132, 3, 'Ceparii Ungureni'),
(1133, 3, 'Cerbu'),
(1134, 3, 'Cerbureni'),
(1135, 3, 'Cersani'),
(1136, 3, 'Cetateni'),
(1137, 3, 'Chilii'),
(1138, 3, 'Chiritesti (Suseni)'),
(1139, 3, 'Chiritesti (Uda)'),
(1140, 3, 'Chiritesti (Vedea)'),
(1141, 3, 'Chitani'),
(1142, 3, 'Chitesti'),
(1143, 3, 'Cicanesti'),
(1144, 3, 'Ciesti'),
(1145, 3, 'Ciobanesti'),
(1146, 3, 'Ciobani'),
(1147, 3, 'Ciocanai'),
(1148, 3, 'Ciocanesti'),
(1149, 3, 'Ciocanu'),
(1150, 3, 'Ciocesti'),
(1151, 3, 'Ciofrangeni'),
(1152, 3, 'Ciolcesti'),
(1153, 3, 'Ciomagesti'),
(1154, 3, 'Ciresu'),
(1155, 3, 'Cismea'),
(1156, 3, 'Ciulnita'),
(1157, 3, 'Ciupa-Manciulescu'),
(1158, 3, 'Ciuresti'),
(1159, 3, 'Clucereasa'),
(1160, 3, 'Cocenesti'),
(1161, 3, 'Cochinesti'),
(1162, 3, 'Cocu'),
(1163, 3, 'Colibasi'),
(1164, 3, 'Colnic'),
(1165, 3, 'Coltu'),
(1166, 3, 'Contesti'),
(1167, 3, 'Corbeni'),
(1168, 3, 'Corbi'),
(1169, 3, 'Corbsori'),
(1170, 3, 'Cornatel'),
(1171, 3, 'Cosaci'),
(1172, 3, 'Coseri'),
(1173, 3, 'Cosesti'),
(1174, 3, 'Costesti'),
(1175, 3, 'Costesti (Cotmeana)'),
(1176, 3, 'Costesti-Valsan'),
(1177, 3, 'Costita'),
(1178, 3, 'Coteasca'),
(1179, 3, 'Cotenesti'),
(1180, 3, 'Cotesti'),
(1181, 3, 'Cotmeana'),
(1182, 3, 'Cotmeana (Stolnici)'),
(1183, 3, 'Cotmenita'),
(1184, 3, 'Cotu (Cuca)'),
(1185, 3, 'Cotu (Uda)'),
(1186, 3, 'Cotu Malului'),
(1187, 3, 'Crampotani'),
(1188, 3, 'Crintesti'),
(1189, 3, 'Crivatu'),
(1190, 3, 'Crucisoara'),
(1191, 3, 'Cuca'),
(1192, 3, 'Cungrea'),
(1193, 3, 'Curtea de Arges'),
(1194, 3, 'Curteanca'),
(1195, 3, 'Dambovicioara'),
(1196, 3, 'Darmanesti'),
(1197, 3, 'Davidesti'),
(1198, 3, 'Deagu de Jos'),
(1199, 3, 'Deagu de Sus'),
(1200, 3, 'Dealu'),
(1201, 3, 'Dealu Bisericii'),
(1202, 3, 'Dealu Bradului'),
(1203, 3, 'Dealu Frumos'),
(1204, 3, 'Dealu Obejdeanului'),
(1205, 3, 'Dealu Orasului'),
(1206, 3, 'Dealu Padurii'),
(1207, 3, 'Dealu Tolcesii'),
(1208, 3, 'Dealu Viilor (Mosoaia)'),
(1209, 3, 'Dealu Viilor (Poiana Lacului)'),
(1210, 3, 'Dedulesti'),
(1211, 3, 'Diconesti'),
(1212, 3, 'Dincani'),
(1213, 3, 'Dinculesti'),
(1214, 3, 'Doblea'),
(1215, 3, 'Dobresti'),
(1216, 3, 'Dobrogostea'),
(1217, 3, 'Dobrotu'),
(1218, 3, 'Dogari'),
(1219, 3, 'Domnesti'),
(1220, 3, 'Draganu'),
(1221, 3, 'Draganu-Olteni'),
(1222, 3, 'Draghescu'),
(1223, 3, 'Draghicesti'),
(1224, 3, 'Draghici'),
(1225, 3, 'Dragolesti'),
(1226, 3, 'Dragoslavele'),
(1227, 3, 'Dumbrava'),
(1228, 3, 'Dumbravesti'),
(1229, 3, 'Dumiresti'),
(1230, 3, 'Enculesti'),
(1231, 3, 'Facaletesti'),
(1232, 3, 'Fagetu'),
(1233, 3, 'Falfani'),
(1234, 3, 'Fantanea'),
(1235, 3, 'Fata'),
(1236, 3, 'Fedelesoiu'),
(1237, 3, 'Florieni'),
(1238, 3, 'Fratesti'),
(1239, 3, 'Fratici'),
(1240, 3, 'Furduesti'),
(1241, 3, 'Furesti'),
(1242, 3, 'Furnicosi'),
(1243, 3, 'Gainusa'),
(1244, 3, 'Galasesti (Budeasa)'),
(1245, 3, 'Galasesti (Suseni)'),
(1246, 3, 'Galcesti'),
(1247, 3, 'Galesu'),
(1248, 3, 'Galeteanu'),
(1249, 3, 'Gamacesti'),
(1250, 3, 'Ganesti'),
(1251, 3, 'Gardinesti'),
(1252, 3, 'Gaujani'),
(1253, 3, 'Geamana'),
(1254, 3, 'Giuclani'),
(1255, 3, 'Glambocata'),
(1256, 3, 'Glambocata-Deal'),
(1257, 3, 'Glambocel'),
(1258, 3, 'Glambocelu'),
(1259, 3, 'Glambocu'),
(1260, 3, 'Glavacioc'),
(1261, 3, 'Gliganu de Jos'),
(1262, 3, 'Gliganu de Sus'),
(1263, 3, 'Glodu (Calinesti)'),
(1264, 3, 'Glodu (Leordeni)'),
(1265, 3, 'Godeni'),
(1266, 3, 'Goia'),
(1267, 3, 'Goleasca'),
(1268, 3, 'Golesti (Balilesti)'),
(1269, 3, 'Golesti (Stefanesti)'),
(1270, 3, 'Goranesti'),
(1271, 3, 'Gorani'),
(1272, 3, 'Gorganu'),
(1273, 3, 'Greaban'),
(1274, 3, 'Greabanu'),
(1275, 3, 'Grosani'),
(1276, 3, 'Grosi'),
(1277, 3, 'Gruiu (Cateasca)'),
(1278, 3, 'Gruiu (Nucsoara)'),
(1279, 3, 'Gura Pravat'),
(1280, 3, 'Gura Vaii'),
(1281, 3, 'Harsesti'),
(1282, 3, 'Hartiesti'),
(1283, 3, 'Hintesti'),
(1284, 3, 'Huluba'),
(1285, 3, 'Humele'),
(1286, 3, 'Ianculesti'),
(1287, 3, 'Ioanicesti'),
(1288, 3, 'Ionesti'),
(1289, 3, 'Izbasesti'),
(1290, 3, 'Izvorani'),
(1291, 3, 'Izvoru'),
(1292, 3, 'Izvoru de Jos'),
(1293, 3, 'Izvoru de Sus'),
(1294, 3, 'Jgheaburi'),
(1295, 3, 'Jugur'),
(1296, 3, 'Jupanesti'),
(1297, 3, 'Laceni'),
(1298, 3, 'Lacurile'),
(1299, 3, 'Laicai'),
(1300, 3, 'Langesti'),
(1301, 3, 'Lapusani'),
(1302, 3, 'Launele de Sus'),
(1303, 3, 'Lazaresti (Mosoaia)'),
(1304, 3, 'Lazaresti (Schitu Golesti)'),
(1305, 3, 'Leicesti'),
(1306, 3, 'Lentea'),
(1307, 3, 'Leordeni'),
(1308, 3, 'Leresti'),
(1309, 3, 'Lesile'),
(1310, 3, 'Lespezi'),
(1311, 3, 'Lintesti'),
(1312, 3, 'Lipia'),
(1313, 3, 'Livezeni'),
(1314, 3, 'Loturi'),
(1315, 3, 'Lucieni'),
(1316, 3, 'Luminile'),
(1317, 3, 'Lunca'),
(1318, 3, 'Lunca Corbului'),
(1319, 3, 'Lunca Gartii'),
(1320, 3, 'Lungani'),
(1321, 3, 'Lungulesti'),
(1322, 3, 'Lupueni'),
(1323, 3, 'Macai'),
(1324, 3, 'Malu (Barla)'),
(1325, 3, 'Malu (Godeni)'),
(1326, 3, 'Malu Vanat'),
(1327, 3, 'Malureni'),
(1328, 3, 'Mancioiu'),
(1329, 3, 'Mandra'),
(1330, 3, 'Manesti'),
(1331, 3, 'Manicesti'),
(1332, 3, 'Maracineni'),
(1333, 3, 'Mares'),
(1334, 3, 'Marghia de Jos'),
(1335, 3, 'Marghia de Sus'),
(1336, 3, 'Martalogi'),
(1337, 3, 'Martesti'),
(1338, 3, 'Matau'),
(1339, 3, 'Mavrodolu'),
(1340, 3, 'Merisani'),
(1341, 3, 'Metofu'),
(1342, 3, 'Mica'),
(1343, 3, 'Micesti'),
(1344, 3, 'Miercani'),
(1345, 3, 'Mihaesti'),
(1346, 3, 'Mioarele'),
(1347, 3, 'Mioarele (Cicanesti)'),
(1348, 3, 'Mioveni'),
(1349, 3, 'Mirosi'),
(1350, 3, 'Moara Mocanului'),
(1351, 3, 'Mogosesti'),
(1352, 3, 'Moraresti'),
(1353, 3, 'Morasti'),
(1354, 3, 'Mosoaia'),
(1355, 3, 'Mosteni-Greci'),
(1356, 3, 'Mozaceni'),
(1357, 3, 'Mozacenii-Vale'),
(1358, 3, 'Mozacu'),
(1359, 3, 'Musatesti'),
(1360, 3, 'Muscel'),
(1361, 3, 'Mustatesti'),
(1362, 3, 'Namaesti'),
(1363, 3, 'Negesti'),
(1364, 3, 'Negrasi'),
(1365, 3, 'Negreni'),
(1366, 3, 'Negresti'),
(1367, 3, 'Nejlovelu'),
(1368, 3, 'Nigrisoara'),
(1369, 3, 'Noaptes'),
(1370, 3, 'Nucsoara'),
(1371, 3, 'Oarja'),
(1372, 3, 'Odaeni'),
(1373, 3, 'Oestii Pamanteni'),
(1374, 3, 'Oestii Ungureni'),
(1375, 3, 'Ogrezea'),
(1376, 3, 'Opresti'),
(1377, 3, 'Orodel'),
(1378, 3, 'Otelu'),
(1379, 3, 'Pacioiu'),
(1380, 3, 'Padureni'),
(1381, 3, 'Padureti'),
(1382, 3, 'Paduroiu din Deal'),
(1383, 3, 'Paduroiu din Vale'),
(1384, 3, 'Palanga'),
(1385, 3, 'Paltenu'),
(1386, 3, 'Paraschivesti'),
(1387, 3, 'Parvu Rosu'),
(1388, 3, 'Patuleni'),
(1389, 3, 'Pauleasca (Malureni)'),
(1390, 3, 'Pauleasca (Micesti)'),
(1391, 3, 'Pauleni'),
(1392, 3, 'Paunesti'),
(1393, 3, 'Petresti'),
(1394, 3, 'Piatra (Bradulet)'),
(1395, 3, 'Piatra (Ciofrangeni)'),
(1396, 3, 'Piatra (Stoenesti)'),
(1397, 3, 'Pielesti'),
(1398, 3, 'Pietroasa'),
(1399, 3, 'Pietrosani'),
(1400, 3, 'Piscani'),
(1401, 3, 'Pitesti'),
(1402, 3, 'Pitigaia'),
(1403, 3, 'Pitoi'),
(1404, 3, 'Podeni'),
(1405, 3, 'Podisoru'),
(1406, 3, 'Podu Brosteni'),
(1407, 3, 'Podu Dambovitei'),
(1408, 3, 'Poduri'),
(1409, 3, 'Poiana Lacului'),
(1410, 3, 'Poienarei'),
(1411, 3, 'Poienari (Corbeni)'),
(1412, 3, 'Poienari (Poienarii de Arges)'),
(1413, 3, 'Poienari (Poienarii de Muscel)'),
(1414, 3, 'Poienarii de Arges'),
(1415, 3, 'Poienarii de Muscel'),
(1416, 3, 'Poienita'),
(1417, 3, 'Pojorata'),
(1418, 3, 'Popesti'),
(1419, 3, 'Popesti (Cocu)'),
(1420, 3, 'Popesti (Sapata)'),
(1421, 3, 'Priboaia'),
(1422, 3, 'Priboieni'),
(1423, 3, 'Priseaca'),
(1424, 3, 'Prislopu Mare'),
(1425, 3, 'Prislopu Mic'),
(1426, 3, 'Prodani'),
(1427, 3, 'Prosia'),
(1428, 3, 'Purcareni (Micesti)'),
(1429, 3, 'Purcareni (Popesti)'),
(1430, 3, 'Putina'),
(1431, 3, 'Raca'),
(1432, 3, 'Rachitele de Jos'),
(1433, 3, 'Rachitele de Sus'),
(1434, 3, 'Racovita'),
(1435, 3, 'Radesti'),
(1436, 3, 'Radu Negru'),
(1437, 3, 'Radutesti'),
(1438, 3, 'Rajletu-Govora'),
(1439, 3, 'Rancaciov'),
(1440, 3, 'Ratesti'),
(1441, 3, 'Ratoi'),
(1442, 3, 'Recea'),
(1443, 3, 'Recea (Cateasca)'),
(1444, 3, 'Redea'),
(1445, 3, 'Retevoiesti'),
(1446, 3, 'Robaia'),
(1447, 3, 'Rociu'),
(1448, 3, 'Rogojina'),
(1449, 3, 'Romana'),
(1450, 3, 'Rotunda'),
(1451, 3, 'Rucar'),
(1452, 3, 'Rudeni (Mihaesti)'),
(1453, 3, 'Rudeni (Suici)'),
(1454, 3, 'Ruginoasa'),
(1455, 3, 'Salatrucu'),
(1456, 3, 'Salistea'),
(1457, 3, 'Samaila'),
(1458, 3, 'Samara'),
(1459, 3, 'Sandulesti'),
(1460, 3, 'Sapata'),
(1461, 3, 'Sapunari'),
(1462, 3, 'Satic'),
(1463, 3, 'Satu Nou'),
(1464, 3, 'Sboghitesti'),
(1465, 3, 'Schiau'),
(1466, 3, 'Schitu Golesti'),
(1467, 3, 'Schitu Scoicesti'),
(1468, 3, 'Schitu-Matei'),
(1469, 3, 'Selareasca'),
(1470, 3, 'Selari'),
(1471, 3, 'Sendrulesti'),
(1472, 3, 'Serbanesti (Poienarii de Muscel)'),
(1473, 3, 'Serbanesti (Rociu)'),
(1474, 3, 'Serboeni'),
(1475, 3, 'Silistea'),
(1476, 3, 'Silisteni'),
(1477, 3, 'Sinesti'),
(1478, 3, 'Slamnesti'),
(1479, 3, 'Slanic'),
(1480, 3, 'Slatina'),
(1481, 3, 'Slatioarele'),
(1482, 3, 'Slobozia'),
(1483, 3, 'Slobozia (Popesti)'),
(1484, 3, 'Slobozia (Stoenesti)'),
(1485, 3, 'Smei'),
(1486, 3, 'Smeura'),
(1487, 3, 'Spiridoni'),
(1488, 3, 'Stalpeni'),
(1489, 3, 'Stanesti'),
(1490, 3, 'Stanicei'),
(1491, 3, 'Starci'),
(1492, 3, 'Stefan cel Mare'),
(1493, 3, 'Stefanesti'),
(1494, 3, 'Stefanesti (Suseni)'),
(1495, 3, 'Stefanestii Noi'),
(1496, 3, 'Stejari'),
(1497, 3, 'Stoenesti'),
(1498, 3, 'Stolnici'),
(1499, 3, 'Strambeni (Caldararu)'),
(1500, 3, 'Strambeni (Suseni)'),
(1501, 3, 'Stroesti'),
(1502, 3, 'Suici'),
(1503, 3, 'Surdulesti'),
(1504, 3, 'Suseni'),
(1505, 3, 'Suseni (Bogati)'),
(1506, 3, 'Suslanesti'),
(1507, 3, 'Teiu'),
(1508, 3, 'Teodoresti'),
(1509, 3, 'Tiganesti'),
(1510, 3, 'Tigveni'),
(1511, 3, 'Tigveni (Ratesti)'),
(1512, 3, 'Titesti'),
(1513, 3, 'Tomsanca'),
(1514, 3, 'Tomulesti'),
(1515, 3, 'Toplita'),
(1516, 3, 'Topoloveni'),
(1517, 3, 'Turburea'),
(1518, 3, 'Turcesti'),
(1519, 3, 'Tutana'),
(1520, 3, 'Tutulesti'),
(1521, 3, 'Uda'),
(1522, 3, 'Udeni-Zavoi'),
(1523, 3, 'Uiasca'),
(1524, 3, 'Uleni'),
(1525, 3, 'Ulita'),
(1526, 3, 'Ungheni'),
(1527, 3, 'Ungureni (Bradulet)'),
(1528, 3, 'Ungureni (Valea Iasului)'),
(1529, 3, 'Urechesti'),
(1530, 3, 'Urlucea'),
(1531, 3, 'Urlueni'),
(1532, 3, 'Urluiesti'),
(1533, 3, 'Ursoaia'),
(1534, 3, 'Vacarea'),
(1535, 3, 'Valcelele'),
(1536, 3, 'Valea Badenilor'),
(1537, 3, 'Valea Bradului'),
(1538, 3, 'Valea Brazilor'),
(1539, 3, 'Valea Calului'),
(1540, 3, 'Valea Cetatuia'),
(1541, 3, 'Valea Corbului'),
(1542, 3, 'Valea Cucii'),
(1543, 3, 'Valea Danului'),
(1544, 3, 'Valea Faurului'),
(1545, 3, 'Valea Hotarului'),
(1546, 3, 'Valea Iasului'),
(1547, 3, 'Valea Indarat'),
(1548, 3, 'Valea lui Enache'),
(1549, 3, 'Valea lui Mas'),
(1550, 3, 'Valea Magurei'),
(1551, 3, 'Valea Manastirii'),
(1552, 3, 'Valea Mare'),
(1553, 3, 'Valea Mare-Bratia'),
(1554, 3, 'Valea Mare-Podgoria'),
(1555, 3, 'Valea Mare-Pravat'),
(1556, 3, 'Valea Marului'),
(1557, 3, 'Valea Muscelului'),
(1558, 3, 'Valea Nandrii'),
(1559, 3, 'Valea Nenii'),
(1560, 3, 'Valea Pechii'),
(1561, 3, 'Valea Popii (Mihaesti)'),
(1562, 3, 'Valea Popii (Priboieni)'),
(1563, 3, 'Valea Rizii'),
(1564, 3, 'Valea Rumanestilor'),
(1565, 3, 'Valea Silistii'),
(1566, 3, 'Valea Stanii'),
(1567, 3, 'Valea Uleiului'),
(1568, 3, 'Valea Ursului'),
(1569, 3, 'Valeni'),
(1570, 3, 'Valeni-Podgoria'),
(1571, 3, 'Valsanesti'),
(1572, 3, 'Varloveni'),
(1573, 3, 'Varsesti'),
(1574, 3, 'Varzaroaia'),
(1575, 3, 'Varzaru'),
(1576, 3, 'Vata'),
(1577, 3, 'Vedea'),
(1578, 3, 'Vernesti'),
(1579, 3, 'Vetisoara'),
(1580, 3, 'Viisoara'),
(1581, 3, 'Vladesti'),
(1582, 3, 'Vladesti (Tigveni)'),
(1583, 3, 'Vladuta'),
(1584, 3, 'Vlascuta'),
(1585, 3, 'Voinesti'),
(1586, 3, 'Vonigeasa'),
(1587, 3, 'Voroveni'),
(1588, 3, 'Vranesti'),
(1589, 3, 'Vulpesti'),
(1590, 3, 'Vulturesti'),
(1591, 3, 'Zamfiresti (Cepari)'),
(1592, 3, 'Zamfiresti (Cotmeana)'),
(1593, 3, 'Zarnesti'),
(1594, 3, 'Zavoi'),
(1595, 3, 'Zgripcesti'),
(1596, 3, 'Zidurile'),
(1597, 3, 'Zigoneni'),
(1598, 3, 'Zuvelcati'),
(1599, 4, 'Agas'),
(1600, 4, 'Albele'),
(1601, 4, 'Antohesti'),
(1602, 4, 'Apa Asau'),
(1603, 4, 'Ardeoani'),
(1604, 4, 'Arini'),
(1605, 4, 'Asau'),
(1606, 4, 'Bacau'),
(1607, 4, 'Bacioiu'),
(1608, 4, 'Baclesti'),
(1609, 4, 'Bahna'),
(1610, 4, 'Bahnaseni'),
(1611, 4, 'Baimac'),
(1612, 4, 'Balaia'),
(1613, 4, 'Balaneasa'),
(1614, 4, 'Balanesti (Dealu Morii)'),
(1615, 4, 'Balanesti (Podu Turcului)'),
(1616, 4, 'Balca'),
(1617, 4, 'Balcani'),
(1618, 4, 'Balotesti'),
(1619, 4, 'Baltata'),
(1620, 4, 'Balusa'),
(1621, 4, 'Banca'),
(1622, 4, 'Barati'),
(1623, 4, 'Barboasa'),
(1624, 4, 'Barcana'),
(1625, 4, 'Barna'),
(1626, 4, 'Barnesti'),
(1627, 4, 'Barsanesti'),
(1628, 4, 'Bartasesti'),
(1629, 4, 'Barzulesti'),
(1630, 4, 'Basasti'),
(1631, 4, 'Bazga'),
(1632, 4, 'Belciuneasa'),
(1633, 4, 'Beleghet'),
(1634, 4, 'Benesti'),
(1635, 4, 'Berbinceni'),
(1636, 4, 'Beresti'),
(1637, 4, 'Beresti Bistrita'),
(1638, 4, 'Beresti-Tazlau'),
(1639, 4, 'Berzunti'),
(1640, 4, 'Bibiresti'),
(1641, 4, 'Bijghir'),
(1642, 4, 'Blaga'),
(1643, 4, 'Blagesti'),
(1644, 4, 'Blidari'),
(1645, 4, 'Boanta'),
(1646, 4, 'Bobos'),
(1647, 4, 'Bodeasa'),
(1648, 4, 'Bogata'),
(1649, 4, 'Bogdan Voda'),
(1650, 4, 'Bogdana'),
(1651, 4, 'Bogdanesti'),
(1652, 4, 'Bogdanesti (Scorteni)'),
(1653, 4, 'Bogdanesti (Traian)'),
(1654, 4, 'Boistea'),
(1655, 4, 'Boistea de Jos'),
(1656, 4, 'Bolatau'),
(1657, 4, 'Bolovanis'),
(1658, 4, 'Borsani'),
(1659, 4, 'Borzesti'),
(1660, 4, 'Bosia'),
(1661, 4, 'Bosoteni'),
(1662, 4, 'Bostanesti'),
(1663, 4, 'Bota'),
(1664, 4, 'Botesti'),
(1665, 4, 'Brad (Beresti-Bistrita)'),
(1666, 4, 'Brad (Filipeni)'),
(1667, 4, 'Brad (Negri)'),
(1668, 4, 'Bratesti'),
(1669, 4, 'Bratila'),
(1670, 4, 'Brusturoasa'),
(1671, 4, 'Buchila'),
(1672, 4, 'Buciumi'),
(1673, 4, 'Bucsa'),
(1674, 4, 'Bucsesti'),
(1675, 4, 'Buda (Berzunti)'),
(1676, 4, 'Buda (Blagesti)'),
(1677, 4, 'Buda (Rachitoasa)'),
(1678, 4, 'Budesti'),
(1679, 4, 'Buhocel'),
(1680, 4, 'Buhoci'),
(1681, 4, 'Buhusi'),
(1682, 4, 'Burdusaci'),
(1683, 4, 'Buruienis'),
(1684, 4, 'Buruienisu de Sus'),
(1685, 4, 'Cabesti'),
(1686, 4, 'Cadaresti'),
(1687, 4, 'Caiuti'),
(1688, 4, 'Calapodesti'),
(1689, 4, 'Calcai'),
(1690, 4, 'Calinesti'),
(1691, 4, 'Calini'),
(1692, 4, 'Calugareni'),
(1693, 4, 'Camenca'),
(1694, 4, 'Campeni'),
(1695, 4, 'Capata'),
(1696, 4, 'Capotesti'),
(1697, 4, 'Caraclau'),
(1698, 4, 'Carligi'),
(1699, 4, 'Casin'),
(1700, 4, 'Cauia'),
(1701, 4, 'Cerdac'),
(1702, 4, 'Cernu'),
(1703, 4, 'Cetatuia'),
(1704, 4, 'Chetreni'),
(1705, 4, 'Chetris'),
(1706, 4, 'Chicerea'),
(1707, 4, 'Chilia Benei'),
(1708, 4, 'Chiticeni'),
(1709, 4, 'Ciobanus'),
(1710, 4, 'Ciresoaia'),
(1711, 4, 'Ciucani'),
(1712, 4, 'Ciughes'),
(1713, 4, 'Ciumasi'),
(1714, 4, 'Ciuturesti'),
(1715, 4, 'Cleja'),
(1716, 4, 'Climesti'),
(1717, 4, 'Cociu'),
(1718, 4, 'Colonesti'),
(1719, 4, 'Coman'),
(1720, 4, 'Comanesti'),
(1721, 4, 'Contesti'),
(1722, 4, 'Corbasca'),
(1723, 4, 'Cornatel'),
(1724, 4, 'Cornatelu'),
(1725, 4, 'Cornesti'),
(1726, 4, 'Cornet'),
(1727, 4, 'Cornii de Jos'),
(1728, 4, 'Cornii de Sus'),
(1729, 4, 'Cosnea'),
(1730, 4, 'Costei'),
(1731, 4, 'Coteni'),
(1732, 4, 'Cotofanesti'),
(1733, 4, 'Cotu Grosului'),
(1734, 4, 'Cotumba'),
(1735, 4, 'Craiesti'),
(1736, 4, 'Crihan'),
(1737, 4, 'Cuchinis'),
(1738, 4, 'Cucova'),
(1739, 4, 'Cucuieti (Dofteana)'),
(1740, 4, 'Cucuieti (Solont)'),
(1741, 4, 'Curita'),
(1742, 4, 'Dadesti'),
(1743, 4, 'Damienesti'),
(1744, 4, 'Danaila'),
(1745, 4, 'Darmaneasca'),
(1746, 4, 'Darmanesti'),
(1747, 4, 'Dealu Mare'),
(1748, 4, 'Dealu Morii'),
(1749, 4, 'Dealu Perjului'),
(1750, 4, 'Deleni'),
(1751, 4, 'Diaconesti'),
(1752, 4, 'Dienet'),
(1753, 4, 'Dofteana'),
(1754, 4, 'Dorneni (Plopana)'),
(1755, 4, 'Dorneni (Vultureni)'),
(1756, 4, 'Dorofei'),
(1757, 4, 'Dospinesti'),
(1758, 4, 'Dragesti (Damienesti)'),
(1759, 4, 'Dragesti (Tatarasti)'),
(1760, 4, 'Dragomir'),
(1761, 4, 'Dragugesti'),
(1762, 4, 'Dragusani'),
(1763, 4, 'Dumbrava (Beresti-Bistrita)'),
(1764, 4, 'Dumbrava (Gura Vaii)'),
(1765, 4, 'Dumbrava (Rachitoasa)'),
(1766, 4, 'Enachesti'),
(1767, 4, 'Faget'),
(1768, 4, 'Fagetel'),
(1769, 4, 'Fagetu de Sus'),
(1770, 4, 'Faghieni'),
(1771, 4, 'Fantanele (Hemeius)'),
(1772, 4, 'Fantanele (Motoseni)'),
(1773, 4, 'Faraoani'),
(1774, 4, 'Farcasa'),
(1775, 4, 'Ferestrau-Oituz'),
(1776, 4, 'Fichitesti'),
(1777, 4, 'Filipeni'),
(1778, 4, 'Filipesti'),
(1779, 4, 'Filipesti (Bogdanesti)'),
(1780, 4, 'Floresti (Caiuti)'),
(1781, 4, 'Floresti (Huruiesti)'),
(1782, 4, 'Floresti (Scorteni)'),
(1783, 4, 'Frumoasa'),
(1784, 4, 'Frumuselu'),
(1785, 4, 'Fruntesti'),
(1786, 4, 'Fulgeris'),
(1787, 4, 'Fundatura'),
(1788, 4, 'Fundatura Rachitoasa'),
(1789, 4, 'Fundeni'),
(1790, 4, 'Fundoaia'),
(1791, 4, 'Fundu Racaciuni'),
(1792, 4, 'Fundu Tutovei'),
(1793, 4, 'Fundu Vaii'),
(1794, 4, 'Furnicari'),
(1795, 4, 'Gaiceana'),
(1796, 4, 'Galbeni (Filipesti)'),
(1797, 4, 'Galbeni (Nicolae Balcescu)'),
(1798, 4, 'Galeri'),
(1799, 4, 'Garla Anei'),
(1800, 4, 'Garleni'),
(1801, 4, 'Garlenii de Sus'),
(1802, 4, 'Gasteni'),
(1803, 4, 'Gazarie'),
(1804, 4, 'Gheorghe Doja'),
(1805, 4, 'Gherdana'),
(1806, 4, 'Ghilavesti'),
(1807, 4, 'Ghimes'),
(1808, 4, 'Ghimes-Faget'),
(1809, 4, 'Ghionoaia'),
(1810, 4, 'Gioseni'),
(1811, 4, 'Giurgeni'),
(1812, 4, 'Giurgioana'),
(1813, 4, 'Glavanesti'),
(1814, 4, 'Glodisoarele'),
(1815, 4, 'Godinestii de Jos'),
(1816, 4, 'Godinestii de Sus'),
(1817, 4, 'Goioasa'),
(1818, 4, 'Gorghesti'),
(1819, 4, 'Gradesti'),
(1820, 4, 'Grigoreni'),
(1821, 4, 'Gura Craiesti'),
(1822, 4, 'Gura Vaii'),
(1823, 4, 'Gura Vaii (Racova)'),
(1824, 4, 'Gutinas'),
(1825, 4, 'Haghiac (Dofteana)'),
(1826, 4, 'Haghiac (Rachitoasa)'),
(1827, 4, 'Haineala'),
(1828, 4, 'Halmacioaia'),
(1829, 4, 'Hanganesti'),
(1830, 4, 'Hanta'),
(1831, 4, 'Harja'),
(1832, 4, 'Harlesti'),
(1833, 4, 'Helegiu'),
(1834, 4, 'Heltiu'),
(1835, 4, 'Hemeius'),
(1836, 4, 'Hemieni'),
(1837, 4, 'Hertioana de Jos'),
(1838, 4, 'Hertioana-Razesi'),
(1839, 4, 'Holt'),
(1840, 4, 'Horgesti'),
(1841, 4, 'Huruiesti'),
(1842, 4, 'Hutu'),
(1843, 4, 'Iaz'),
(1844, 4, 'Iliesi'),
(1845, 4, 'Itcani'),
(1846, 4, 'Itesti'),
(1847, 4, 'Izvoru Berheciului'),
(1848, 4, 'Lapos'),
(1849, 4, 'Larga'),
(1850, 4, 'Larguta'),
(1851, 4, 'Lehancea'),
(1852, 4, 'Leontinesti'),
(1853, 4, 'Lespezi'),
(1854, 4, 'Letea Veche'),
(1855, 4, 'Lichitiseni'),
(1856, 4, 'Lilieci'),
(1857, 4, 'Lipova'),
(1858, 4, 'Livezi'),
(1859, 4, 'Ludasi'),
(1860, 4, 'Luizi-Calugara'),
(1861, 4, 'Lunca Asau'),
(1862, 4, 'Lunca Dochiei'),
(1863, 4, 'Luncani'),
(1864, 4, 'Lupesti'),
(1865, 4, 'Magazia'),
(1866, 4, 'Magiresti'),
(1867, 4, 'Magla'),
(1868, 4, 'Magura'),
(1869, 4, 'Malosu'),
(1870, 4, 'Manastirea Casin'),
(1871, 4, 'Marascu'),
(1872, 4, 'Marasti'),
(1873, 4, 'Marcesti'),
(1874, 4, 'Marginea (Buhusi)'),
(1875, 4, 'Marginea (Oituz)'),
(1876, 4, 'Margineni'),
(1877, 4, 'Marvila'),
(1878, 4, 'Mateiesti'),
(1879, 4, 'Medeleni'),
(1880, 4, 'Milestii de Jos'),
(1881, 4, 'Milestii de Sus'),
(1882, 4, 'Misihanesti'),
(1883, 4, 'Moinesti'),
(1884, 4, 'Motoc'),
(1885, 4, 'Motocesti'),
(1886, 4, 'Motoseni'),
(1887, 4, 'Movilita'),
(1888, 4, 'Muncelu'),
(1889, 4, 'Nadisa'),
(1890, 4, 'Nanesti'),
(1891, 4, 'Nastaseni'),
(1892, 4, 'Nazarioaia'),
(1893, 4, 'Negoiesti'),
(1894, 4, 'Negreni'),
(1895, 4, 'Negri'),
(1896, 4, 'Negulesti'),
(1897, 4, 'Neguseni'),
(1898, 4, 'Nicolae Balcescu'),
(1899, 4, 'Nicoresti'),
(1900, 4, 'Obarsia'),
(1901, 4, 'Ocheni'),
(1902, 4, 'Odobesti'),
(1903, 4, 'Oituz'),
(1904, 4, 'Oncesti'),
(1905, 4, 'Oncestii Vechi'),
(1906, 4, 'Onesti'),
(1907, 4, 'Oniscani'),
(1908, 4, 'Oprisesti'),
(1909, 4, 'Orasa'),
(1910, 4, 'Orbeni'),
(1911, 4, 'Osebiti'),
(1912, 4, 'Otelesti'),
(1913, 4, 'Padureni (Beresti-Bistrita)'),
(1914, 4, 'Padureni (Damienesti)'),
(1915, 4, 'Padureni (Filipeni)'),
(1916, 4, 'Padureni (Izvoru Berheciului)'),
(1917, 4, 'Padureni (Margineni)'),
(1918, 4, 'Pagubeni'),
(1919, 4, 'Pajistea'),
(1920, 4, 'Palanca'),
(1921, 4, 'Paltinata'),
(1922, 4, 'Paltinis'),
(1923, 4, 'Pancesti'),
(1924, 4, 'Parau Boghii'),
(1925, 4, 'Parava'),
(1926, 4, 'Pargaresti'),
(1927, 4, 'Parincea'),
(1928, 4, 'Parjol'),
(1929, 4, 'Parvulesti'),
(1930, 4, 'Perchiu'),
(1931, 4, 'Petresti'),
(1932, 4, 'Petricica'),
(1933, 4, 'Plopana'),
(1934, 4, 'Plopu (Darmanesti)'),
(1935, 4, 'Plopu (Podu Turcului)'),
(1936, 4, 'Podei'),
(1937, 4, 'Podis'),
(1938, 4, 'Podu Turcului'),
(1939, 4, 'Poduri'),
(1940, 4, 'Poglet'),
(1941, 4, 'Poiana (Colonesti)'),
(1942, 4, 'Poiana (Livezi)'),
(1943, 4, 'Poiana (Margineni)'),
(1944, 4, 'Poiana (Motoseni)'),
(1945, 4, 'Poiana (Negri)'),
(1946, 4, 'Poiana Negustorului'),
(1947, 4, 'Poiana Sarata'),
(1948, 4, 'Poieni (Parincea)'),
(1949, 4, 'Poieni (Rosiori)'),
(1950, 4, 'Poieni (Targu Ocna)'),
(1951, 4, 'Popeni'),
(1952, 4, 'Popesti'),
(1953, 4, 'Popoiu'),
(1954, 4, 'Pradais'),
(1955, 4, 'Praja'),
(1956, 4, 'Prajesti (Magiresti)'),
(1957, 4, 'Prajesti (Traian)'),
(1958, 4, 'Prajoaia'),
(1959, 4, 'Pralea'),
(1960, 4, 'Preluci'),
(1961, 4, 'Prisaca'),
(1962, 4, 'Prohozesti'),
(1963, 4, 'Pustiana'),
(1964, 4, 'Putini'),
(1965, 4, 'Putredeni'),
(1966, 4, 'Racaciuni'),
(1967, 4, 'Racatau de Jos'),
(1968, 4, 'Racatau-Razesi'),
(1969, 4, 'Racauti'),
(1970, 4, 'Rachitis'),
(1971, 4, 'Rachitisu'),
(1972, 4, 'Rachitoasa'),
(1973, 4, 'Racova'),
(1974, 4, 'Racusana'),
(1975, 4, 'Radeana'),
(1976, 4, 'Radoaia'),
(1977, 4, 'Radomiresti'),
(1978, 4, 'Rastoaca'),
(1979, 4, 'Razesu'),
(1980, 4, 'Recea'),
(1981, 4, 'Reprivat'),
(1982, 4, 'Rogoaza'),
(1983, 4, 'Romanesti'),
(1984, 4, 'Rosiori'),
(1985, 4, 'Rotaria'),
(1986, 4, 'Runcu'),
(1987, 4, 'Rusenii de Sus'),
(1988, 4, 'Rusenii Razesi'),
(1989, 4, 'Rusi-Ciutea'),
(1990, 4, 'Salatruc'),
(1991, 4, 'Sanduleni'),
(1992, 4, 'Sarata (Nicolae Balcescu)'),
(1993, 4, 'Sarata (Solont)'),
(1994, 4, 'Sarbi'),
(1995, 4, 'Sascut'),
(1996, 4, 'Sascut-Sat'),
(1997, 4, 'Satu Nou (Colonesti)'),
(1998, 4, 'Satu Nou (Lipova)'),
(1999, 4, 'Satu Nou (Oncesti)'),
(2000, 4, 'Satu Nou (Pargaresti)'),
(2001, 4, 'Satu Nou (Parincea)'),
(2002, 4, 'Satu Nou (Urechesti)'),
(2003, 4, 'Saucesti'),
(2004, 4, 'Scariga'),
(2005, 4, 'Scarisoara'),
(2006, 4, 'Schineni (Sascut)'),
(2007, 4, 'Schineni (Saucesti)'),
(2008, 4, 'Schitu Frumoasa'),
(2009, 4, 'Scorteni'),
(2010, 4, 'Scurta'),
(2011, 4, 'Scutaru'),
(2012, 4, 'Seaca'),
(2013, 4, 'Secuieni'),
(2014, 4, 'Sendresti'),
(2015, 4, 'Serbesti'),
(2016, 4, 'Serpeni'),
(2017, 4, 'Sesuri'),
(2018, 4, 'Siretu (Letea Veche)'),
(2019, 4, 'Siretu (Saucesti)'),
(2020, 4, 'Slanic-Moldova'),
(2021, 4, 'Slobozia (Filipeni)'),
(2022, 4, 'Slobozia (Onesti)'),
(2023, 4, 'Slobozia (Stanisesti)'),
(2024, 4, 'Slobozia (Urechesti)'),
(2025, 4, 'Slobozia Noua'),
(2026, 4, 'Soci'),
(2027, 4, 'Sohodol'),
(2028, 4, 'Sohodor'),
(2029, 4, 'Solont'),
(2030, 4, 'Somusca'),
(2031, 4, 'Spria'),
(2032, 4, 'Stanesti'),
(2033, 4, 'Stanisesti'),
(2034, 4, 'Stefan cel Mare'),
(2035, 4, 'Stefan Voda'),
(2036, 4, 'Stejaru'),
(2037, 4, 'Straja'),
(2038, 4, 'Straminoasa'),
(2039, 4, 'Strugari'),
(2040, 4, 'Stufu'),
(2041, 4, 'Sulta'),
(2042, 4, 'Surina'),
(2043, 4, 'Tagara'),
(2044, 4, 'Tamasi'),
(2045, 4, 'Tamasoaia'),
(2046, 4, 'Tarata'),
(2047, 4, 'Tardenii Mari'),
(2048, 4, 'Targu Ocna'),
(2049, 4, 'Targu Trotus'),
(2050, 4, 'Tarhausi'),
(2051, 4, 'Tarnita'),
(2052, 4, 'Tatarasti'),
(2053, 4, 'Taula'),
(2054, 4, 'Tavadaresti'),
(2055, 4, 'Teius'),
(2056, 4, 'Temelia'),
(2057, 4, 'Tepoaia'),
(2058, 4, 'Tescani'),
(2059, 4, 'Tiganesti'),
(2060, 4, 'Tisa'),
(2061, 4, 'Tisa-Silvestri'),
(2062, 4, 'Tochilea'),
(2063, 4, 'Tomozia'),
(2064, 4, 'Traian'),
(2065, 4, 'Trebes'),
(2066, 4, 'Turluianu'),
(2067, 4, 'Tuta'),
(2068, 4, 'Ungureni'),
(2069, 4, 'Ungureni (Tatarasti)'),
(2070, 4, 'Urechesti'),
(2071, 4, 'Ursoaia'),
(2072, 4, 'Valcele (Corbasca)'),
(2073, 4, 'Valcele (Targu Ocna)'),
(2074, 4, 'Valea Arinilor'),
(2075, 4, 'Valea Botului'),
(2076, 4, 'Valea Budului'),
(2077, 4, 'Valea Caselor'),
(2078, 4, 'Valea Fanatului'),
(2079, 4, 'Valea Hogei'),
(2080, 4, 'Valea lui Ion'),
(2081, 4, 'Valea Lupului'),
(2082, 4, 'Valea Mare (Colonesti)'),
(2083, 4, 'Valea Mare (Rosiori)'),
(2084, 4, 'Valea Marului'),
(2085, 4, 'Valea Merilor'),
(2086, 4, 'Valea Mica (Cleja)'),
(2087, 4, 'Valea Mica (Rosiori)'),
(2088, 4, 'Valea Mosneagului'),
(2089, 4, 'Valea Nacului'),
(2090, 4, 'Valea Salciei'),
(2091, 4, 'Valea Seaca'),
(2092, 4, 'Valea Seaca (Nicolae Balcescu)'),
(2093, 4, 'Valea Sosii'),
(2094, 4, 'Valeni (Parincea)'),
(2095, 4, 'Valeni (Secuieni)'),
(2096, 4, 'Valeni (Stanisesti)'),
(2097, 4, 'Vermesti'),
(2098, 4, 'Versesti'),
(2099, 4, 'Viforeni'),
(2100, 4, 'Viisoara (Stefan cel Mare)'),
(2101, 4, 'Viisoara (Targu Trotus)'),
(2102, 4, 'Vladnic'),
(2103, 4, 'Vranceni'),
(2104, 4, 'Vultureni'),
(2105, 4, 'Zapodia (Colonesti)'),
(2106, 4, 'Zapodia (Traian)'),
(2107, 4, 'Zemes'),
(2108, 4, 'Zlatari'),
(2109, 5, 'Abram'),
(2110, 5, 'Abramut'),
(2111, 5, 'Adoni'),
(2112, 5, 'Albesti'),
(2113, 5, 'Albis'),
(2114, 5, 'Alesd'),
(2115, 5, 'Almasu Mare'),
(2116, 5, 'Almasu Mic (Balc)'),
(2117, 5, 'Almasu Mic (Sarbi)'),
(2118, 5, 'Alparea'),
(2119, 5, 'Ant'),
(2120, 5, 'Apateu'),
(2121, 5, 'Arpasel'),
(2122, 5, 'Astileu'),
(2123, 5, 'Ateas'),
(2124, 5, 'Auseu'),
(2125, 5, 'Avram Iancu'),
(2126, 5, 'Baile 1 Mai'),
(2127, 5, 'Baile Felix'),
(2128, 5, 'Baita'),
(2129, 5, 'Baita-Plai'),
(2130, 5, 'Balaia'),
(2131, 5, 'Balc'),
(2132, 5, 'Baleni'),
(2133, 5, 'Balnaca'),
(2134, 5, 'Balnaca-Grosi'),
(2135, 5, 'Baraj Lesu'),
(2136, 5, 'Batar'),
(2137, 5, 'Beius'),
(2138, 5, 'Beiusele'),
(2139, 5, 'Belejeni'),
(2140, 5, 'Belfir'),
(2141, 5, 'Berechiu'),
(2142, 5, 'Betfia'),
(2143, 5, 'Beznea'),
(2144, 5, 'Bicacel'),
(2145, 5, 'Bicaci'),
(2146, 5, 'Biharia'),
(2147, 5, 'Birtin'),
(2148, 5, 'Bistra'),
(2149, 5, 'Bogei'),
(2150, 5, 'Boianu Mare'),
(2151, 5, 'Boiu'),
(2152, 5, 'Borod'),
(2153, 5, 'Borozel'),
(2154, 5, 'Bors'),
(2155, 5, 'Borsa'),
(2156, 5, 'Borumlaca'),
(2157, 5, 'Borz'),
(2158, 5, 'Botean'),
(2159, 5, 'Bradet'),
(2160, 5, 'Bratca'),
(2161, 5, 'Bratesti'),
(2162, 5, 'Briheni'),
(2163, 5, 'Brusturi'),
(2164, 5, 'Brusturi (Finis)'),
(2165, 5, 'Bucium'),
(2166, 5, 'Bucuroaia'),
(2167, 5, 'Budoi'),
(2168, 5, 'Budureasa'),
(2169, 5, 'Buduslau'),
(2170, 5, 'Bulz'),
(2171, 5, 'Buntesti'),
(2172, 5, 'Burda'),
(2173, 5, 'Burzuc'),
(2174, 5, 'Butani'),
(2175, 5, 'Cabesti'),
(2176, 5, 'Cacuciu Nou'),
(2177, 5, 'Cacuciu Vechi'),
(2178, 5, 'Cadea'),
(2179, 5, 'Calacea'),
(2180, 5, 'Calatani'),
(2181, 5, 'Calatea'),
(2182, 5, 'Calea Mare'),
(2183, 5, 'Calugari'),
(2184, 5, 'Camp'),
(2185, 5, 'Camp-Moti'),
(2186, 5, 'Campani'),
(2187, 5, 'Campani de Pomezeu'),
(2188, 5, 'Capalna'),
(2189, 5, 'Carandeni'),
(2190, 5, 'Caranzel'),
(2191, 5, 'Carasau'),
(2192, 5, 'Carpinet'),
(2193, 5, 'Cauaceu'),
(2194, 5, 'Cauasd'),
(2195, 5, 'Cefa'),
(2196, 5, 'Ceica'),
(2197, 5, 'Ceisoara'),
(2198, 5, 'Cenalos'),
(2199, 5, 'Cetariu'),
(2200, 5, 'Cetea'),
(2201, 5, 'Cherechiu'),
(2202, 5, 'Cheresig'),
(2203, 5, 'Cheriu'),
(2204, 5, 'Chesa'),
(2205, 5, 'Chesereu'),
(2206, 5, 'Chet'),
(2207, 5, 'Chijic'),
(2208, 5, 'Chioag'),
(2209, 5, 'Chiraleu'),
(2210, 5, 'Chiribis'),
(2211, 5, 'Chiscau'),
(2212, 5, 'Chisirid'),
(2213, 5, 'Chislaz'),
(2214, 5, 'Chistag'),
(2215, 5, 'Cihei'),
(2216, 5, 'Ciocaia'),
(2217, 5, 'Ciuhoi'),
(2218, 5, 'Ciulesti'),
(2219, 5, 'Ciumeghiu'),
(2220, 5, 'Ciutelec'),
(2221, 5, 'Cociuba Mare'),
(2222, 5, 'Cociuba Mica'),
(2223, 5, 'Codrisoru'),
(2224, 5, 'Codru'),
(2225, 5, 'Cohani'),
(2226, 5, 'Colesti'),
(2227, 5, 'Copacel'),
(2228, 5, 'Copaceni'),
(2229, 5, 'Corbesti'),
(2230, 5, 'Corboaia'),
(2231, 5, 'Cordau'),
(2232, 5, 'Cornisesti'),
(2233, 5, 'Cornitel'),
(2234, 5, 'Cosdeni'),
(2235, 5, 'Cotiglet'),
(2236, 5, 'Crancesti'),
(2237, 5, 'Crestur'),
(2238, 5, 'Cresuia'),
(2239, 5, 'Cristioru de Jos'),
(2240, 5, 'Cristioru de Sus'),
(2241, 5, 'Cubulcut'),
(2242, 5, 'Cucuceni'),
(2243, 5, 'Cuiesd'),
(2244, 5, 'Curatele'),
(2245, 5, 'Curtuiseni'),
(2246, 5, 'Cusuius'),
(2247, 5, 'Cuzap'),
(2248, 5, 'Damis'),
(2249, 5, 'Delani'),
(2250, 5, 'Derna'),
(2251, 5, 'Dernisoara'),
(2252, 5, 'Dicanesti'),
(2253, 5, 'Dijir'),
(2254, 5, 'Diosig'),
(2255, 5, 'Dobresti'),
(2256, 5, 'Dobricionesti'),
(2257, 5, 'Dolea'),
(2258, 5, 'Draganesti'),
(2259, 5, 'Dragesti'),
(2260, 5, 'Dragoteni'),
(2261, 5, 'Dumbrava'),
(2262, 5, 'Dumbravani'),
(2263, 5, 'Dumbravita'),
(2264, 5, 'Dumbravita de Codru'),
(2265, 5, 'Dusesti'),
(2266, 5, 'Fanate'),
(2267, 5, 'Fancica'),
(2268, 5, 'Fasca'),
(2269, 5, 'Fegernic');
INSERT INTO `master_states` (`location_id`, `country_id`, `location_name`) VALUES
(2270, 5, 'Fegernicu Nou'),
(2271, 5, 'Felcheriu'),
(2272, 5, 'Feneris'),
(2273, 5, 'Ferice'),
(2274, 5, 'Finis'),
(2275, 5, 'Fizis'),
(2276, 5, 'Foglas'),
(2277, 5, 'Fonau'),
(2278, 5, 'Forau'),
(2279, 5, 'Forosig'),
(2280, 5, 'Fughiu'),
(2281, 5, 'Galaseni'),
(2282, 5, 'Galospetreu'),
(2283, 5, 'Gepis'),
(2284, 5, 'Gepiu'),
(2285, 5, 'Gheghie'),
(2286, 5, 'Ghenetea'),
(2287, 5, 'Ghida'),
(2288, 5, 'Ghighiseni'),
(2289, 5, 'Ghiorac'),
(2290, 5, 'Ginta'),
(2291, 5, 'Girisu de Cris'),
(2292, 5, 'Girisu Negru'),
(2293, 5, 'Giulesti'),
(2294, 5, 'Goila'),
(2295, 5, 'Gradinari'),
(2296, 5, 'Grosi'),
(2297, 5, 'Gruilung'),
(2298, 5, 'Gurani'),
(2299, 5, 'Gurbediu'),
(2300, 5, 'Gurbesti (Cabesti)'),
(2301, 5, 'Gurbesti (Spinus)'),
(2302, 5, 'Haieu'),
(2303, 5, 'Harsesti'),
(2304, 5, 'Haucesti'),
(2305, 5, 'Hidis'),
(2306, 5, 'Hidisel'),
(2307, 5, 'Hidiselu de Jos'),
(2308, 5, 'Hidiselu de Sus'),
(2309, 5, 'Hinchiris'),
(2310, 5, 'Hodis'),
(2311, 5, 'Hodisel'),
(2312, 5, 'Hodos'),
(2313, 5, 'Holod'),
(2314, 5, 'Homorog'),
(2315, 5, 'Hotar'),
(2316, 5, 'Hotarel'),
(2317, 5, 'Husasau de Cris'),
(2318, 5, 'Husasau de Tinca'),
(2319, 5, 'Huta'),
(2320, 5, 'Huta Voivozi'),
(2321, 5, 'Ianca'),
(2322, 5, 'Ianosda'),
(2323, 5, 'Inand'),
(2324, 5, 'Incesti'),
(2325, 5, 'Ineu'),
(2326, 5, 'Ioanis'),
(2327, 5, 'Iteu'),
(2328, 5, 'Iteu Nou'),
(2329, 5, 'Izbuc'),
(2330, 5, 'Izvoarele'),
(2331, 5, 'Josani (Cabesti)'),
(2332, 5, 'Josani (Magesti)'),
(2333, 5, 'Lacu Sarat'),
(2334, 5, 'Lazareni'),
(2335, 5, 'Lazuri'),
(2336, 5, 'Lazuri de Beius'),
(2337, 5, 'Leheceni'),
(2338, 5, 'Lelesti'),
(2339, 5, 'Les'),
(2340, 5, 'Livada Beiusului'),
(2341, 5, 'Livada de Bihor'),
(2342, 5, 'Loranta'),
(2343, 5, 'Lorau'),
(2344, 5, 'Lugasu de Jos'),
(2345, 5, 'Lugasu de Sus'),
(2346, 5, 'Lunca'),
(2347, 5, 'Luncasprie'),
(2348, 5, 'Luncsoara'),
(2349, 5, 'Lupoaia'),
(2350, 5, 'Madaras'),
(2351, 5, 'Magesti'),
(2352, 5, 'Magura'),
(2353, 5, 'Marghita'),
(2354, 5, 'Margine'),
(2355, 5, 'Martihaz'),
(2356, 5, 'Meziad'),
(2357, 5, 'Mierag'),
(2358, 5, 'Mierlau'),
(2359, 5, 'Miersig'),
(2360, 5, 'Mihai Bravu'),
(2361, 5, 'Miheleu'),
(2362, 5, 'Misca'),
(2363, 5, 'Mizies'),
(2364, 5, 'Motesti'),
(2365, 5, 'Munteni'),
(2366, 5, 'Nadar'),
(2367, 5, 'Nimaiesti'),
(2368, 5, 'Niuved'),
(2369, 5, 'Nojorid'),
(2370, 5, 'Nucet'),
(2371, 5, 'Ogesti'),
(2372, 5, 'Olcea'),
(2373, 5, 'Olosig'),
(2374, 5, 'Oradea'),
(2375, 5, 'Ortiteag'),
(2376, 5, 'Orvisele'),
(2377, 5, 'Osand'),
(2378, 5, 'Osorhei'),
(2379, 5, 'Otomani'),
(2380, 5, 'Padurea Neagra'),
(2381, 5, 'Padureni'),
(2382, 5, 'Pagaia'),
(2383, 5, 'Paleu'),
(2384, 5, 'Palota'),
(2385, 5, 'Pantasesti'),
(2386, 5, 'Parhida'),
(2387, 5, 'Paulesti'),
(2388, 5, 'Pausa'),
(2389, 5, 'Pestere'),
(2390, 5, 'Pestis'),
(2391, 5, 'Petid'),
(2392, 5, 'Petrani'),
(2393, 5, 'Petreasa'),
(2394, 5, 'Petreu'),
(2395, 5, 'Petrileni'),
(2396, 5, 'Picleu'),
(2397, 5, 'Pietroasa'),
(2398, 5, 'Pocioveliste'),
(2399, 5, 'Poclusa de Barcau'),
(2400, 5, 'Poclusa de Beius'),
(2401, 5, 'Pocola'),
(2402, 5, 'Poiana (Cristioru de Jos)'),
(2403, 5, 'Poiana (Tauteu)'),
(2404, 5, 'Poiana Tasad'),
(2405, 5, 'Poienii de Jos'),
(2406, 5, 'Poienii de Sus'),
(2407, 5, 'Poietari'),
(2408, 5, 'Pomezeu'),
(2409, 5, 'Ponoara'),
(2410, 5, 'Popesti'),
(2411, 5, 'Posoloaca'),
(2412, 5, 'Prisaca'),
(2413, 5, 'Rabagani'),
(2414, 5, 'Racas'),
(2415, 5, 'Rapa'),
(2416, 5, 'Reghea'),
(2417, 5, 'Remetea'),
(2418, 5, 'Remeti'),
(2419, 5, 'Rieni'),
(2420, 5, 'Rogoz'),
(2421, 5, 'Rohani'),
(2422, 5, 'Roit'),
(2423, 5, 'Rontau'),
(2424, 5, 'Rosia'),
(2425, 5, 'Rosiori'),
(2426, 5, 'Rotaresti'),
(2427, 5, 'Rugea'),
(2428, 5, 'Sabolciu'),
(2429, 5, 'Saca'),
(2430, 5, 'Sacadat'),
(2431, 5, 'Sacalasau'),
(2432, 5, 'Sacalasau Nou'),
(2433, 5, 'Sacueni'),
(2434, 5, 'Salacea'),
(2435, 5, 'Salard'),
(2436, 5, 'Saldabagiu de Barcau'),
(2437, 5, 'Saldabagiu de Munte'),
(2438, 5, 'Saldabagiu Mic'),
(2439, 5, 'Saliste'),
(2440, 5, 'Saliste de Beius'),
(2441, 5, 'Saliste de Pomezeu'),
(2442, 5, 'Saliste de Vascau'),
(2443, 5, 'Salonta'),
(2444, 5, 'Sambata'),
(2445, 5, 'Saniob'),
(2446, 5, 'Sanlazar'),
(2447, 5, 'Sanmartin'),
(2448, 5, 'Sanmartin de Beius'),
(2449, 5, 'Sannicolau de Beius'),
(2450, 5, 'Sannicolau de Munte'),
(2451, 5, 'Sannicolau Roman'),
(2452, 5, 'Santandrei'),
(2453, 5, 'Santaul Mare'),
(2454, 5, 'Santaul Mic'),
(2455, 5, 'Santelec'),
(2456, 5, 'Santimreu'),
(2457, 5, 'Santion'),
(2458, 5, 'Sarand'),
(2459, 5, 'Sarbesti'),
(2460, 5, 'Sarbi'),
(2461, 5, 'Sarcau'),
(2462, 5, 'Sarsig'),
(2463, 5, 'Satu Barba'),
(2464, 5, 'Satu Nou'),
(2465, 5, 'Sauaieu'),
(2466, 5, 'Saucani'),
(2467, 5, 'Saud'),
(2468, 5, 'Sebis'),
(2469, 5, 'Seghiste'),
(2470, 5, 'Serani'),
(2471, 5, 'Serghis'),
(2472, 5, 'Sfarnas'),
(2473, 5, 'Sighistel'),
(2474, 5, 'Silindru'),
(2475, 5, 'Simian'),
(2476, 5, 'Sinteu'),
(2477, 5, 'Sisterea'),
(2478, 5, 'Sitani'),
(2479, 5, 'Sititelec'),
(2480, 5, 'Socet'),
(2481, 5, 'Sohodol'),
(2482, 5, 'Soimi'),
(2483, 5, 'Soimus'),
(2484, 5, 'Spinus'),
(2485, 5, 'Spinus de Pomezeu'),
(2486, 5, 'Stancesti'),
(2487, 5, 'Stei'),
(2488, 5, 'Stracos'),
(2489, 5, 'Subpiatra'),
(2490, 5, 'Sudrigiu'),
(2491, 5, 'Suiug'),
(2492, 5, 'Sumugiu'),
(2493, 5, 'Suncuis'),
(2494, 5, 'Suncuius'),
(2495, 5, 'Suplacu de Barcau'),
(2496, 5, 'Suplacu de Tinca'),
(2497, 5, 'Surduc'),
(2498, 5, 'Surducel'),
(2499, 5, 'Sustiu'),
(2500, 5, 'Susturogi'),
(2501, 5, 'Talpe'),
(2502, 5, 'Talpos'),
(2503, 5, 'Tamasda'),
(2504, 5, 'Tamaseu'),
(2505, 5, 'Tarcaia'),
(2506, 5, 'Tarcaita'),
(2507, 5, 'Tarcea'),
(2508, 5, 'Targusor'),
(2509, 5, 'Tarian'),
(2510, 5, 'Tasad'),
(2511, 5, 'Taut'),
(2512, 5, 'Tautelec'),
(2513, 5, 'Tauteu'),
(2514, 5, 'Teleac'),
(2515, 5, 'Telechiu'),
(2516, 5, 'Tetchea'),
(2517, 5, 'Tiganestii de Beius'),
(2518, 5, 'Tiganestii de Cris'),
(2519, 5, 'Tileagd'),
(2520, 5, 'Tilecus'),
(2521, 5, 'Tinaud'),
(2522, 5, 'Tinca'),
(2523, 5, 'Toboliu'),
(2524, 5, 'Tomnatic'),
(2525, 5, 'Topa de Cris'),
(2526, 5, 'Topa de Jos'),
(2527, 5, 'Topa de Sus'),
(2528, 5, 'Topesti'),
(2529, 5, 'Totoreni'),
(2530, 5, 'Tria'),
(2531, 5, 'Tulca'),
(2532, 5, 'Ucuris'),
(2533, 5, 'Uileacu de Beius'),
(2534, 5, 'Uileacu de Cris'),
(2535, 5, 'Uileacu de Munte'),
(2536, 5, 'Ursad'),
(2537, 5, 'Urvind'),
(2538, 5, 'Urvis de Beius'),
(2539, 5, 'Vadu Crisului'),
(2540, 5, 'Vaida'),
(2541, 5, 'Valani de Pomezeu'),
(2542, 5, 'Valanii de Beius'),
(2543, 5, 'Valcelele'),
(2544, 5, 'Valea Cerului'),
(2545, 5, 'Valea Crisului'),
(2546, 5, 'Valea de Jos'),
(2547, 5, 'Valea de Sus'),
(2548, 5, 'Valea Iadului'),
(2549, 5, 'Valea lui Mihai'),
(2550, 5, 'Valea Mare de Codru'),
(2551, 5, 'Valea Mare de Cris'),
(2552, 5, 'Valea Tarnei'),
(2553, 5, 'Varasau'),
(2554, 5, 'Varaseni'),
(2555, 5, 'Varciorog'),
(2556, 5, 'Varviz'),
(2557, 5, 'Varzari'),
(2558, 5, 'Varzarii de Jos'),
(2559, 5, 'Varzarii de Sus'),
(2560, 5, 'Vasad'),
(2561, 5, 'Vascau'),
(2562, 5, 'Viisoara'),
(2563, 5, 'Vintere'),
(2564, 5, 'Voivozi (Popesti)'),
(2565, 5, 'Voivozi (Simian)'),
(2566, 5, 'Zavoiu'),
(2567, 5, 'Zece Hotare'),
(2568, 6, 'Agries'),
(2569, 6, 'Agriesel'),
(2570, 6, 'Agrisu de Jos'),
(2571, 6, 'Agrisu de Sus'),
(2572, 6, 'Albestii Bistritei'),
(2573, 6, 'Alunisul'),
(2574, 6, 'Anies'),
(2575, 6, 'Apatiu'),
(2576, 6, 'Arcalia'),
(2577, 6, 'Archiud'),
(2578, 6, 'Ardan'),
(2579, 6, 'Arsita'),
(2580, 6, 'Barla'),
(2581, 6, 'Bata'),
(2582, 6, 'Beclean'),
(2583, 6, 'Beudiu'),
(2584, 6, 'Bichigiu'),
(2585, 6, 'Bidiu'),
(2586, 6, 'Bistrita'),
(2587, 6, 'Bistrita Bargaului'),
(2588, 6, 'Blajenii de Jos'),
(2589, 6, 'Blajenii de Sus'),
(2590, 6, 'Borleasa'),
(2591, 6, 'Bozies'),
(2592, 6, 'Branistea'),
(2593, 6, 'Brateni'),
(2594, 6, 'Breaza'),
(2595, 6, 'Bretea'),
(2596, 6, 'Budacu de Jos'),
(2597, 6, 'Budacu de Sus'),
(2598, 6, 'Budesti'),
(2599, 6, 'Budesti-Fanate'),
(2600, 6, 'Budurleni'),
(2601, 6, 'Budus'),
(2602, 6, 'Bungard'),
(2603, 6, 'Buza Catun'),
(2604, 6, 'Caianu Mare'),
(2605, 6, 'Caianu Mic'),
(2606, 6, 'Caila'),
(2607, 6, 'Camp'),
(2608, 6, 'Cepari'),
(2609, 6, 'Cetate'),
(2610, 6, 'Chetiu'),
(2611, 6, 'Chintelnic'),
(2612, 6, 'Chiochis'),
(2613, 6, 'Chirales'),
(2614, 6, 'Chiuza'),
(2615, 6, 'Ciceu-Corabia'),
(2616, 6, 'Ciceu-Giurgesti'),
(2617, 6, 'Ciceu-Mihaiesti'),
(2618, 6, 'Ciceu-Poieni'),
(2619, 6, 'Ciosa'),
(2620, 6, 'Cireasi'),
(2621, 6, 'Ciresoaia'),
(2622, 6, 'Coasta'),
(2623, 6, 'Cociu'),
(2624, 6, 'Coldau'),
(2625, 6, 'Colibita'),
(2626, 6, 'Comlod'),
(2627, 6, 'Cormaia'),
(2628, 6, 'Corvinesti'),
(2629, 6, 'Cosbuc'),
(2630, 6, 'Coseriu'),
(2631, 6, 'Crainimat'),
(2632, 6, 'Cristestii Ciceului'),
(2633, 6, 'Cristur-Sieu'),
(2634, 6, 'Cusma'),
(2635, 6, 'Dealu Stefanitei'),
(2636, 6, 'Delureni'),
(2637, 6, 'Dipsa'),
(2638, 6, 'Dobric'),
(2639, 6, 'Dobricel'),
(2640, 6, 'Domnesti'),
(2641, 6, 'Dorolea'),
(2642, 6, 'Draga'),
(2643, 6, 'Dumbrava (Livezile)'),
(2644, 6, 'Dumbrava (Nuseni)'),
(2645, 6, 'Dumbraveni'),
(2646, 6, 'Dumbravita'),
(2647, 6, 'Dumitra'),
(2648, 6, 'Dumitrita'),
(2649, 6, 'Dupa Deal'),
(2650, 6, 'Enciu'),
(2651, 6, 'Fanate'),
(2652, 6, 'Fanatele Silivasului'),
(2653, 6, 'Fantanele'),
(2654, 6, 'Fantanita'),
(2655, 6, 'Feldru'),
(2656, 6, 'Feleac'),
(2657, 6, 'Fiad'),
(2658, 6, 'Figa'),
(2659, 6, 'Floresti'),
(2660, 6, 'Galatii Bistritei'),
(2661, 6, 'Gersa I'),
(2662, 6, 'Gersa II'),
(2663, 6, 'Ghemes'),
(2664, 6, 'Ghinda'),
(2665, 6, 'Gledin'),
(2666, 6, 'Halmasau'),
(2667, 6, 'Hasmasu Ciceului'),
(2668, 6, 'Herina'),
(2669, 6, 'Hirean'),
(2670, 6, 'Ilisua'),
(2671, 6, 'Ilva Mare'),
(2672, 6, 'Ilva Mica'),
(2673, 6, 'Ivaneasa'),
(2674, 6, 'Jeica'),
(2675, 6, 'Jelna'),
(2676, 6, 'Jimbor'),
(2677, 6, 'Josenii Bargaului'),
(2678, 6, 'La Curte'),
(2679, 6, 'Lechinta'),
(2680, 6, 'Lelesti'),
(2681, 6, 'Lesu'),
(2682, 6, 'Livezile'),
(2683, 6, 'Liviu Rebreanu'),
(2684, 6, 'Lunca'),
(2685, 6, 'Lunca Borlesei'),
(2686, 6, 'Lunca Ilvei'),
(2687, 6, 'Lunca Lesului'),
(2688, 6, 'Lunca Sateasca'),
(2689, 6, 'Lusca'),
(2690, 6, 'Magura Ilvei'),
(2691, 6, 'Magurele'),
(2692, 6, 'Maieru'),
(2693, 6, 'Malin'),
(2694, 6, 'Malut'),
(2695, 6, 'Manic'),
(2696, 6, 'Mariselu'),
(2697, 6, 'Matei'),
(2698, 6, 'Micestii de Campie'),
(2699, 6, 'Mijlocenii Bargaului'),
(2700, 6, 'Milas'),
(2701, 6, 'Mintiu'),
(2702, 6, 'Mires'),
(2703, 6, 'Mititei'),
(2704, 6, 'Mocod'),
(2705, 6, 'Mogoseni'),
(2706, 6, 'Moliset'),
(2707, 6, 'Monariu'),
(2708, 6, 'Monor'),
(2709, 6, 'Morut'),
(2710, 6, 'Muresenii Bargaului'),
(2711, 6, 'Nasaud'),
(2712, 6, 'Negrilesti'),
(2713, 6, 'Nepos'),
(2714, 6, 'Neteni'),
(2715, 6, 'Nimigea'),
(2716, 6, 'Nimigea de Jos'),
(2717, 6, 'Nimigea de Sus'),
(2718, 6, 'Nuseni'),
(2719, 6, 'Oarzina'),
(2720, 6, 'Ocnita'),
(2721, 6, 'Orheiu Bistritei'),
(2722, 6, 'Orosfaia'),
(2723, 6, 'Paltineasa'),
(2724, 6, 'Parva'),
(2725, 6, 'Perisor'),
(2726, 6, 'Petris'),
(2727, 6, 'Petru Rares'),
(2728, 6, 'Piatra'),
(2729, 6, 'Piatra Fantanele'),
(2730, 6, 'Pinticu'),
(2731, 6, 'Podenii'),
(2732, 6, 'Poderei'),
(2733, 6, 'Podirei'),
(2734, 6, 'Poiana Ilvei'),
(2735, 6, 'Poienile Zagrei'),
(2736, 6, 'Porumbenii'),
(2737, 6, 'Posmus'),
(2738, 6, 'Prundu Bargaului'),
(2739, 6, 'Purcarete'),
(2740, 6, 'Racatesu'),
(2741, 6, 'Ragla'),
(2742, 6, 'Rebra'),
(2743, 6, 'Rebrisoara'),
(2744, 6, 'Reteag'),
(2745, 6, 'Rodna'),
(2746, 6, 'Romuli'),
(2747, 6, 'Runcu Salvei'),
(2748, 6, 'Rustior'),
(2749, 6, 'Rusu Bargaului'),
(2750, 6, 'Rusu de Jos'),
(2751, 6, 'Rusu de Sus'),
(2752, 6, 'Salcuta'),
(2753, 6, 'Salva'),
(2754, 6, 'Sangeorz-Bai'),
(2755, 6, 'Sangeorzu Nou'),
(2756, 6, 'Saniacob'),
(2757, 6, 'Sanmihaiu de Campie'),
(2758, 6, 'Sannicoara'),
(2759, 6, 'Sant'),
(2760, 6, 'Santioana'),
(2761, 6, 'Sarata'),
(2762, 6, 'Saratel'),
(2763, 6, 'Sasarm'),
(2764, 6, 'Satu Nou'),
(2765, 6, 'Scoabe'),
(2766, 6, 'Sebis'),
(2767, 6, 'Sendroaia'),
(2768, 6, 'Sesuri Spermezeu-Vale'),
(2769, 6, 'Sieu'),
(2770, 6, 'Sieu-Magherus'),
(2771, 6, 'Sieu-Odorhei'),
(2772, 6, 'Sieu-Sfantu'),
(2773, 6, 'Sieut'),
(2774, 6, 'Sigmir'),
(2775, 6, 'Silivasu de Campie'),
(2776, 6, 'Simionesti'),
(2777, 6, 'Sintereag'),
(2778, 6, 'Sintereag-Gara'),
(2779, 6, 'Sirioara'),
(2780, 6, 'Sita'),
(2781, 6, 'Slatinita'),
(2782, 6, 'Soimus'),
(2783, 6, 'Sopteriu'),
(2784, 6, 'Spermezeu'),
(2785, 6, 'Stramba'),
(2786, 6, 'Strugureni'),
(2787, 6, 'Stupini'),
(2788, 6, 'Suplai'),
(2789, 6, 'Susenii Bargaului'),
(2790, 6, 'Tagsoru'),
(2791, 6, 'Tagu'),
(2792, 6, 'Tarlisua'),
(2793, 6, 'Tarpiu'),
(2794, 6, 'Taure'),
(2795, 6, 'Teaca'),
(2796, 6, 'Telcisor'),
(2797, 6, 'Telciu'),
(2798, 6, 'Tentea'),
(2799, 6, 'Tigau'),
(2800, 6, 'Tiha Bargaului'),
(2801, 6, 'Tonciu'),
(2802, 6, 'Tureac'),
(2803, 6, 'Unirea'),
(2804, 6, 'Uriu'),
(2805, 6, 'Urmenis'),
(2806, 6, 'Valea'),
(2807, 6, 'Valea Borcutului'),
(2808, 6, 'Valea Magherusului'),
(2809, 6, 'Valea Mare (Sant)'),
(2810, 6, 'Valea Mare (Urmenis)'),
(2811, 6, 'Valea Poenii'),
(2812, 6, 'Valea Vinului'),
(2813, 6, 'Vermes'),
(2814, 6, 'Viile Tecii'),
(2815, 6, 'Viisoara'),
(2816, 6, 'Visuia'),
(2817, 6, 'Vita'),
(2818, 6, 'Zagra'),
(2819, 6, 'Zoreni'),
(2820, 7, 'Adaseni'),
(2821, 43, 'Abia'),
(2822, 43, 'Adamawa'),
(2823, 43, 'Akwa'),
(2824, 43, 'Anambra'),
(2825, 43, 'Bauchi'),
(2826, 43, 'Bayelsa'),
(2827, 43, 'Benue'),
(2828, 43, 'Borno'),
(2829, 43, 'Cross River'),
(2830, 43, 'Delta'),
(2831, 43, 'Ebonyi'),
(2832, 43, 'Edo'),
(2833, 43, 'Ekiti'),
(2834, 43, 'Enugu'),
(2835, 43, 'Federal Capital Territory'),
(2836, 43, 'Gombe'),
(2837, 43, 'Imo'),
(2838, 43, 'Jigawa'),
(2839, 43, 'Kaduna'),
(2840, 43, 'Kano'),
(2841, 43, 'Katsina'),
(2842, 43, 'Kebbi'),
(2843, 43, 'Kogi'),
(2844, 43, 'Kwara'),
(2845, 43, 'Lagos'),
(2846, 43, 'Nasarawa'),
(2847, 43, 'Niger'),
(2848, 43, 'Ogun'),
(2849, 43, 'Ondo'),
(2850, 43, 'Osun'),
(2851, 43, 'Oyo'),
(2852, 43, 'Plateau'),
(2853, 43, 'Rivers'),
(2854, 43, 'Sokoto'),
(2855, 43, 'Taraba'),
(2856, 43, 'Yobe'),
(2857, 43, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `master_users`
--

CREATE TABLE `master_users` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `hospital_id` varchar(50) DEFAULT '0',
  `ref_id` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '1' COMMENT '0 for "female" and 1 for "male"',
  `login_tytpe` varchar(3) NOT NULL COMMENT 'D for doctor and P for Patient, H for Hospital',
  `mobile_no` bigint(30) NOT NULL,
  `emrg_no` varchar(30) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `last_session_date` int(11) NOT NULL,
  `is_online` int(11) DEFAULT '0',
  `avatar_image` text,
  `is_conv` int(11) DEFAULT '0',
  `doc_type` int(11) DEFAULT '0',
  `idle_status` int(11) DEFAULT '0' COMMENT '0= idle, 1=active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_users`
--

INSERT INTO `master_users` (`id`, `patient_id`, `hospital_id`, `ref_id`, `fname`, `lname`, `email_id`, `user_name`, `user_pass`, `dob`, `gender`, `login_tytpe`, `mobile_no`, `emrg_no`, `zipcode`, `status`, `marital_status`, `last_session_date`, `is_online`, `avatar_image`, `is_conv`, `doc_type`, `idle_status`, `created`, `modified`) VALUES
(6, 'INH123', '0', 'PA10003', 'David', 'peter', '', 'david', 'MTIzNDU=', '1986-06-03', 1, 'P', 0, '234535353', '345678', 0, 'single', 0, 0, NULL, 1, 0, 0, '2015-12-05 07:49:11', '2016-02-17 15:14:16'),
(7, 'dSA12', '0', 'PA10004', 'Samuel', 'stephan', '', 'samuel', 'MTIzNDU=', '1989-12-12', 1, 'P', 0, '254353', '751013', 1, 'single', 2016, 1, NULL, 0, 0, 1, '2015-12-07 07:13:29', '2016-02-01 20:06:53'),
(13, '', '0', 'DR10001', 'Joe', 'Mark', 'joemark@gmail.com', 'Joe', 'MTIzNDU=', '1989-06-10', 1, 'D', 0, '', '751013', 0, '', 2016, 1, NULL, 1, 0, 1, '2015-12-07 11:14:43', '2016-02-17 11:51:06'),
(16, 'abcd@123', '0', 'PA10005', 'peter', 'jack', '', 'peter', 'Y2hpdHRhQDEyMw==', '1989-06-12', 1, 'P', 0, '32453', '2112', 1, 'single', 0, 0, NULL, 0, 0, 0, '2015-12-15 11:53:18', '2016-01-02 12:11:25'),
(17, 'PT12QA', '0', 'PA10006', 'JOHN ', 'SMITH', '', 'JOHN', 'cHJhZ3lhYUAxMjM=', '1991-06-30', 0, 'P', 0, '643285675', '32432', 0, 'single', 0, 0, NULL, 0, 0, 0, '2015-12-15 11:56:45', '2015-12-30 11:00:51'),
(28, '', '0', 'DR10002', 'Steve', 'Smith', 'stevesmith@gmail.com', 'Smith', 'Y2hpdHRhQDEyMw==', '1991-02-28', 1, 'D', 0, '', '453535', 0, '', 0, 0, NULL, 0, 1, 0, '2015-12-18 13:36:53', '2016-02-17 11:51:02'),
(29, '', '0', '', '', '', '', '', '', '0000-00-00', 1, '', 0, '', '', 0, '', 0, 0, NULL, 0, 0, 0, '2015-12-24 10:52:19', '2015-12-24 10:52:19'),
(30, '', 'HCA123LS', 'HO10001', '', '', 'caradiac@gmail.com', 'caradiac', 'MTIzNDU2Nw==', '0000-00-00', 1, 'H', 0, '785234566767', '543535435', 1, '', 0, 1, NULL, 0, 0, 0, '2015-12-31 16:15:29', '2016-01-08 17:14:22'),
(31, '', 'HCA123NDA', 'HO10002', '', '', 'info@amri.com', 'amri', 'MTIzNDU2', '0000-00-00', 1, 'H', 0, '54376576532', '454535', 1, '', 0, 1, NULL, 0, 0, 0, '2015-12-31 18:04:18', '2016-01-14 19:43:32'),
(34, '', 'AIMSBD001', 'HO10003', '', '', 'aims@gmail.com', 'aiims', 'MTIzNDU2', '0000-00-00', 1, 'H', 0, '678954', '754764', 1, '', 0, 0, NULL, 0, 0, 0, '2015-12-31 18:43:31', '2016-01-08 15:06:04'),
(35, '', '0', 'DR10003', 'scarlet', 'joe', 'scarlet.joe@gmail.com', 'scarlet', 'MTIzNDU=', '1997-01-01', 1, 'D', 0, '', '535435', 0, '', 0, 0, NULL, 0, 0, 0, '2016-01-02 11:37:29', '2016-02-17 11:50:59'),
(36, 'PA13234CS', '0', 'PA10007', 'carry', ' Sam', '', 'carry', 'MTIzNDU=', '1988-02-17', 0, 'P', 0, '453535435435', '43242342', 1, 'single', 0, 0, NULL, 0, 0, 0, '2016-01-02 12:24:19', '2016-02-15 17:09:16'),
(37, '', '0', 'DR10004', 'Sam', 'Peter', 'sam.peter@gmail.com', 'sam', 'MTIzNDU2', '1986-01-23', 1, 'D', 123456, '', '754764', 0, '', 0, 0, NULL, 0, 0, 0, '2016-01-02 12:45:17', '2016-02-17 11:50:56'),
(38, 'pa424wr', '0', 'PA10008', 'albert', 'Peter', '', 'albert', 'MTIzNDU2', '2006-01-12', 1, 'P', 546463736, '54454747', '754764', 0, 'single', 0, 0, NULL, 0, 0, 0, '2016-01-02 12:51:03', '2016-01-11 20:10:54'),
(46, '', '0', 'DR10005', 'Kennedy', 'Osemeke', 'kenixconsulting@gmail.com', 'kennedy', 'aGlnaA==', '1982-09-13', 1, 'D', 8030843639, '', '234', 1, '', 2016, 1, NULL, 0, 1, 1, '2016-01-12 19:57:41', '2016-02-19 16:58:05'),
(47, '94072', '0', 'PA10009', 'Faith', 'Daniel', 'faith@yahoo.com', 'faith', 'ZmFpdGg=', '1980-07-24', 0, 'P', 8000000231, '', '234', 0, 'single', 0, 1, NULL, 0, 0, 0, '2016-01-14 19:10:43', '2016-01-14 20:35:13'),
(48, '', '0', 'DR10006', 'Alex ', 'Peter', 'alex.peter@gmail.com', 'alexpeter', 'MTIzNDU2', '2016-01-01', 0, 'D', 54365436, '', '654646', 0, '', 2016, 1, NULL, 0, 1, 1, '2016-01-15 18:01:09', '2016-02-17 11:50:44'),
(49, '88387', '0', 'PA10010', 'princewill', 'Ibrahim', 'princewillibrahim@yahoo.com', 'prince', 'MTIzNG11c2E=', '1985-03-01', 1, 'P', 8034490929, '', '123', 1, 'single', 0, 1, NULL, 0, 0, 1, '2016-01-19 02:15:42', '2016-02-15 23:30:44'),
(50, '10024', '0', 'PA10011', 'Shallom', 'Ken', 'kennedyosemeke@gmail.com', 'shallom', 'MTIzNDU=', '1996-01-03', 0, 'P', 8030843639, '07095647634', '234', 1, 'single', 0, 1, NULL, 0, 0, 1, '2016-01-20 18:27:23', '2016-02-03 14:57:33'),
(51, '', '0', 'DR10007', 'Jimmy', 'Kim', 'kennedyosemeke@gmail.com', 'jimmy', 'MTIzNA==', '1982-12-15', 1, 'D', 8030843639, '', '234', 1, '', 0, 0, NULL, 0, 0, 0, '2016-02-15 14:09:59', '2016-02-17 11:51:47'),
(52, '12054', '0', 'PA10012', 'Chidinma', 'Chidinma', '', 'chidinma', 'MTIzNA==', '2016-02-14', 0, 'P', 8030843639, '08030843639', '234', 1, 'single', 0, 0, NULL, 0, 0, 0, '2016-02-15 20:42:23', '2016-02-15 21:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `news_content` text NOT NULL,
  `news_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `slug`, `news_content`, `news_img`, `status`, `created`, `modified`) VALUES
(2, 'Center for Medical', 'center-for-medical', '<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s&nbsp;Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</h3>\r\n', '1450088985latestnews_pics1.jpg', 1, '2015-03-25 12:50:20', '2016-01-08 15:53:35'),
(3, 'Laboratary Test', 'laboratary-test', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s&nbsp;Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '1450089026latestnews_pics2.jpg', 1, '2015-12-14 11:30:26', '2015-12-16 14:07:37'),
(4, 'Research Center', 'research-center', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s&nbsp;Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '1450089068latestnews_pics3.jpg', 1, '2015-12-14 11:31:08', '2015-12-16 14:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_template`
--

CREATE TABLE `newsletter_template` (
  `compose_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 => Buyer, 2=> Seller, 3=> Subscriber',
  `mail_subject` varchar(200) NOT NULL,
  `mail_body` text NOT NULL,
  `compose_status` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_template`
--

INSERT INTO `newsletter_template` (`compose_id`, `user_type`, `mail_subject`, `mail_body`, `compose_status`, `created`) VALUES
(1, 3, 'Test Template', '<p>Dear {Name},</p>\r\n\r\n<p>this is the subscriber template</p>\r\n\r\n<p>Reagards</p>\r\n\r\n<p>Inheath</p>\r\n', 1, '2015-12-28 18:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `news_letter_id` int(10) NOT NULL,
  `news_email` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`news_letter_id`, `news_email`, `status`, `created`) VALUES
(1, 'maasrajesh2@gmail.com', 1, '2015-12-28 18:21:40'),
(2, 'chittas970@gmail.com', 1, '2015-12-29 10:28:08'),
(3, 'maasrajeshtest@gmail.com', 0, '2015-12-29 11:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_type` varchar(20) NOT NULL,
  `postid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=> show, 0 => not show',
  `user_status` int(11) NOT NULL COMMENT '0 => Not ahow, 1 => for show',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_type`, `postid`, `user_id`, `notice_name`, `status`, `user_status`, `created`) VALUES
(1, 'request-parts', 60, 0, 'Reaquest Parts', 1, 0, '2015-04-27 17:50:58'),
(2, 'request-parts', 60, 16, 'Reaquest Parts', 1, 1, '2015-04-27 17:50:58'),
(3, 'sales-add', 173, 0, 'Sales Added', 0, 0, '2015-04-27 21:52:34'),
(4, 'sales-add', 173, 45, 'Sales Added', 0, 1, '2015-04-27 21:52:34'),
(5, 'bid-offer', 57, 0, 'Bid offer', 1, 0, '2015-04-27 21:56:51'),
(6, 'bid-offer', 57, 45, 'Bid offer', 1, 1, '2015-04-27 21:56:51'),
(7, 'sales-add', 174, 0, 'Sales Added', 0, 0, '2015-04-28 07:31:10'),
(8, 'sales-add', 174, 42, 'Sales Added', 0, 0, '2015-04-28 07:31:10'),
(9, 'sales-order', 171, 0, 'Sales Order', 0, 0, '2015-04-28 10:19:02'),
(10, 'sales-order', 171, 59, 'Sales Order', 0, 1, '2015-04-28 10:19:02'),
(11, 'sales-question', 163, 0, 'Sales Comment', 0, 0, '2015-04-28 10:20:04'),
(12, 'sales-question', 163, 59, 'Sales Comment', 0, 1, '2015-04-28 10:20:04'),
(13, 'sales-add', 175, 0, 'Sales Added', 0, 0, '2015-04-28 12:00:35'),
(14, 'sales-add', 175, 59, 'Sales Added', 0, 1, '2015-04-28 12:00:35'),
(15, 'request-parts', 61, 0, 'Reaquest Parts', 1, 0, '2015-04-28 18:08:01'),
(16, 'request-parts', 61, 59, 'Reaquest Parts', 1, 1, '2015-04-28 18:08:01'),
(17, 'sales-add', 177, 0, 'Sales Added', 0, 0, '2015-05-02 17:34:28'),
(18, 'sales-add', 177, 39, 'Sales Added', 0, 1, '2015-05-02 17:34:28'),
(19, 'sales-add', 177, 0, 'Sales Added', 0, 0, '2015-05-02 17:35:58'),
(20, 'sales-add', 177, 39, 'Sales Added', 0, 1, '2015-05-02 17:35:58'),
(21, 'request-parts', 62, 0, 'Reaquest Parts', 1, 0, '2015-05-02 17:44:43'),
(22, 'request-parts', 62, 39, 'Reaquest Parts', 1, 1, '2015-05-02 17:44:43'),
(23, 'sales-order', 56, 0, 'Sales Order', 0, 0, '2015-05-03 09:35:11'),
(24, 'sales-order', 56, 45, 'Sales Order', 0, 1, '2015-05-03 09:35:11'),
(25, 'sales-add', 178, 0, 'Sales Added', 0, 0, '2015-05-07 13:41:19'),
(26, 'sales-add', 178, 39, 'Sales Added', 0, 1, '2015-05-07 13:41:19'),
(27, 'sales-add', 179, 0, 'Sales Added', 0, 0, '2015-05-07 14:48:15'),
(28, 'sales-add', 179, 16, 'Sales Added', 0, 1, '2015-05-07 14:48:15'),
(29, 'request-parts', 63, 0, 'Reaquest Parts', 1, 0, '2015-05-13 16:06:18'),
(30, 'request-parts', 63, 59, 'Reaquest Parts', 1, 1, '2015-05-13 16:06:18'),
(31, 'request-parts', 64, 0, 'Reaquest Parts', 1, 0, '2015-05-13 17:07:34'),
(32, 'request-parts', 64, 16, 'Reaquest Parts', 1, 0, '2015-05-13 17:07:34'),
(33, 'park-question', 12, 0, 'Parks Comment', 1, 0, '2015-05-13 17:20:01'),
(34, 'park-question', 12, 59, 'Parks Comment', 1, 1, '2015-05-13 17:20:01'),
(35, 'park-question', 12, 0, 'Parks Comment', 1, 0, '2015-05-13 17:54:22'),
(36, 'park-question', 12, 59, 'Parks Comment', 1, 1, '2015-05-13 17:54:22'),
(37, 'park-question', 12, 0, 'Parks Comment', 1, 0, '2015-05-13 17:55:00'),
(38, 'park-question', 12, 47, 'Parks Comment', 1, 1, '2015-05-13 17:55:00'),
(39, 'request-parts', 65, 0, 'Reaquest Parts', 1, 0, '2015-05-13 17:59:46'),
(40, 'request-parts', 65, 47, 'Reaquest Parts', 1, 1, '2015-05-13 17:59:46'),
(41, 'request-parts', 66, 0, 'Reaquest Parts', 1, 0, '2015-05-14 08:28:54'),
(42, 'request-parts', 66, 59, 'Reaquest Parts', 1, 1, '2015-05-14 08:28:54'),
(43, 'park-question', 12, 0, 'Parks Comment', 1, 0, '2015-05-14 08:41:37'),
(44, 'park-question', 12, 59, 'Parks Comment', 1, 1, '2015-05-14 08:41:37'),
(45, 'park-question', 12, 0, 'Parks Comment', 1, 0, '2015-05-14 08:42:57'),
(46, 'park-question', 12, 47, 'Parks Comment', 1, 1, '2015-05-14 08:42:57'),
(47, 'request-parts', 67, 0, 'Reaquest Parts', 1, 0, '2015-05-14 08:44:37'),
(48, 'request-parts', 67, 16, 'Reaquest Parts', 1, 0, '2015-05-14 08:44:37'),
(49, 'request-parts', 68, 0, 'Reaquest Parts', 1, 0, '2015-05-14 09:09:24'),
(50, 'request-parts', 68, 47, 'Reaquest Parts', 1, 1, '2015-05-14 09:09:24'),
(51, 'request-parts', 69, 0, 'Reaquest Parts', 1, 0, '2015-05-14 09:10:40'),
(52, 'request-parts', 69, 47, 'Reaquest Parts', 1, 1, '2015-05-14 09:10:40'),
(53, 'request-parts', 70, 0, 'Reaquest Parts', 1, 0, '2015-05-14 09:12:28'),
(54, 'request-parts', 70, 47, 'Reaquest Parts', 1, 1, '2015-05-14 09:12:28'),
(55, 'park-question', 5, 0, 'Parks Comment', 1, 0, '2015-05-14 10:45:21'),
(56, 'park-question', 5, 39, 'Parks Comment', 1, 1, '2015-05-14 10:45:21'),
(57, 'park-question', 5, 0, 'Parks Comment', 1, 0, '2015-05-14 10:46:15'),
(58, 'park-question', 5, 59, 'Parks Comment', 1, 1, '2015-05-14 10:46:15'),
(59, 'request-question', 67, 0, 'Request Parts Comment', 1, 0, '2015-05-14 17:21:43'),
(60, 'request-question', 67, 16, 'Request Parts Comment', 1, 0, '2015-05-14 17:21:43'),
(61, 'request-question', 67, 0, 'Request Parts Comment', 1, 0, '2015-05-14 17:23:37'),
(62, 'request-question', 67, 16, 'Request Parts Comment', 1, 0, '2015-05-14 17:23:37'),
(63, 'request-question', 67, 0, 'Request Parts Comment', 1, 0, '2015-05-14 17:25:16'),
(64, 'request-question', 67, 16, 'Request Parts Comment', 1, 0, '2015-05-14 17:25:16'),
(65, 'request-question', 67, 0, 'Request Parts Comment', 1, 0, '2015-05-14 17:26:23'),
(66, 'request-question', 67, 16, 'Request Parts Comment', 1, 0, '2015-05-14 17:26:23'),
(67, 'bid-offer', 67, 0, 'Bid offer', 1, 0, '2015-05-14 17:37:52'),
(68, 'bid-offer', 67, 16, 'Bid offer', 1, 0, '2015-05-14 17:37:52'),
(69, 'bid-question', 67, 0, 'Request Bid Comment', 0, 0, '2015-05-14 17:39:10'),
(70, 'bid-question', 67, 16, 'Request Bid Comment', 0, 0, '2015-05-14 17:39:10'),
(71, 'bid-question', 67, 0, 'Request Bid Comment', 0, 0, '2015-05-14 17:40:40'),
(72, 'bid-question', 67, 16, 'Request Bid Comment', 0, 0, '2015-05-14 17:40:40'),
(73, 'bid-question', 67, 0, 'Request Bid Comment', 0, 0, '2015-05-14 17:41:38'),
(74, 'bid-question', 67, 16, 'Request Bid Comment', 0, 0, '2015-05-14 17:41:38'),
(75, 'park-question', 11, 0, 'Parks Comment', 1, 0, '2015-05-14 17:44:33'),
(76, 'park-question', 11, 16, 'Parks Comment', 1, 1, '2015-05-14 17:44:33'),
(77, 'park-question', 11, 0, 'Parks Comment', 1, 0, '2015-05-14 17:45:05'),
(78, 'park-question', 11, 16, 'Parks Comment', 1, 1, '2015-05-14 17:45:05'),
(79, 'sales-add', 181, 0, 'Sales Added', 0, 0, '2015-05-15 10:15:34'),
(80, 'sales-add', 181, 16, 'Sales Added', 0, 1, '2015-05-15 10:15:34'),
(81, 'sales-question', 181, 0, 'Sales Comment', 0, 0, '2015-05-15 10:20:40'),
(82, 'sales-question', 181, 16, 'Sales Comment', 0, 1, '2015-05-15 10:20:40'),
(83, 'sales-question', 181, 0, 'Sales Comment', 0, 0, '2015-05-15 10:22:23'),
(84, 'sales-question', 181, 16, 'Sales Comment', 0, 1, '2015-05-15 10:22:23'),
(85, 'sales-question', 181, 0, 'Sales Comment', 0, 0, '2015-05-15 10:24:02'),
(86, 'sales-question', 181, 16, 'Sales Comment', 0, 1, '2015-05-15 10:24:02'),
(87, 'sales-question', 181, 0, 'Sales Comment', 0, 0, '2015-05-15 10:24:46'),
(88, 'sales-question', 181, 16, 'Sales Comment', 0, 1, '2015-05-15 10:24:46'),
(89, 'sales-order', 159, 0, 'Sales Order', 0, 0, '2015-05-16 10:10:47'),
(90, 'sales-order', 159, 59, 'Sales Order', 0, 1, '2015-05-16 10:10:47'),
(91, 'sales-question', 171, 0, 'Sales Comment', 0, 0, '2015-05-18 09:44:05'),
(92, 'sales-question', 171, 59, 'Sales Comment', 0, 1, '2015-05-18 09:44:05'),
(93, 'sales-modified', 175, 0, 'Sales Modified', 0, 0, '2015-05-18 15:50:21'),
(94, 'sales-modified', 175, 0, 'Sales Modified', 0, 0, '2015-05-18 15:51:16'),
(95, 'sales-order', 115, 0, 'Sales Order', 0, 0, '2015-05-19 12:29:39'),
(96, 'sales-order', 115, 16, 'Sales Order', 0, 0, '2015-05-19 12:29:39'),
(97, 'sales-order', 109, 0, 'Sales Order', 0, 0, '2015-05-19 13:07:22'),
(98, 'sales-order', 109, 16, 'Sales Order', 0, 0, '2015-05-19 13:07:22'),
(99, 'sales-question', 177, 0, 'Sales Comment', 0, 0, '2015-05-21 09:22:49'),
(100, 'sales-question', 177, 39, 'Sales Comment', 0, 1, '2015-05-21 09:22:49'),
(101, 'bid-offer', 70, 0, 'Bid offer', 1, 0, '2015-05-28 10:16:56'),
(102, 'bid-offer', 70, 47, 'Bid offer', 1, 1, '2015-05-28 10:16:56'),
(103, 'register', 63, 0, 'Register', 1, 0, '2015-06-01 08:16:11'),
(104, 'sales-order', 46, 0, 'Sales Order', 0, 0, '2015-06-01 08:29:52'),
(105, 'sales-order', 46, 16, 'Sales Order', 0, 0, '2015-06-01 08:29:52'),
(106, 'buyer-rate', 46, 0, 'Rating To Buyer', 0, 0, '2015-06-01 08:32:49'),
(107, 'buyer-rate', 46, 63, 'Rating To Buyer', 0, 1, '2015-06-01 08:32:49'),
(108, 'bid-offer', 70, 0, 'Bid offer', 1, 0, '2015-06-05 01:18:33'),
(109, 'bid-offer', 70, 47, 'Bid offer', 1, 1, '2015-06-05 01:18:33'),
(110, 'bid-offer', 70, 0, 'Bid offer', 1, 0, '2015-06-05 02:08:59'),
(111, 'bid-offer', 70, 47, 'Bid offer', 1, 0, '2015-06-05 02:08:59'),
(112, 'sales-add', 182, 0, 'Sales Added', 0, 0, '2015-06-15 07:56:08'),
(113, 'sales-add', 182, 45, 'Sales Added', 0, 1, '2015-06-15 07:56:08'),
(114, 'sales-order', 175, 0, 'Sales Order', 0, 0, '2015-06-15 07:59:10'),
(115, 'sales-order', 175, 59, 'Sales Order', 0, 1, '2015-06-15 07:59:10'),
(116, 'sales-order', 175, 0, 'Sales Order', 0, 0, '2015-06-15 08:00:07'),
(117, 'sales-order', 175, 59, 'Sales Order', 0, 1, '2015-06-15 08:00:07'),
(118, 'sales-add', 183, 0, 'Sales Added', 0, 0, '2015-06-15 08:10:29'),
(119, 'sales-add', 183, 45, 'Sales Added', 0, 1, '2015-06-15 08:10:29'),
(120, 'sales-add', 184, 0, 'Sales Added', 0, 0, '2015-06-15 08:17:01'),
(121, 'sales-add', 184, 45, 'Sales Added', 0, 1, '2015-06-15 08:17:01'),
(122, 'sales-add', 185, 0, 'Sales Added', 0, 0, '2015-06-15 08:22:44'),
(123, 'sales-add', 185, 45, 'Sales Added', 0, 1, '2015-06-15 08:22:44'),
(124, 'sales-add', 186, 0, 'Sales Added', 0, 0, '2015-06-15 09:28:07'),
(125, 'sales-add', 186, 45, 'Sales Added', 0, 1, '2015-06-15 09:28:07'),
(126, 'sales-order', 185, 0, 'Sales Order', 0, 0, '2015-06-16 04:27:53'),
(127, 'sales-order', 185, 45, 'Sales Order', 0, 1, '2015-06-16 04:27:53'),
(128, 'bid-offer', 68, 0, 'Bid offer', 1, 0, '2015-06-16 05:17:11'),
(129, 'bid-offer', 68, 47, 'Bid offer', 1, 0, '2015-06-16 05:17:11'),
(130, 'seller-rate', 175, 0, 'Rating To Seller', 0, 0, '2015-06-22 22:46:53'),
(131, 'seller-rate', 175, 59, 'Parks Comment', 0, 1, '2015-06-22 22:46:53'),
(132, 'bid-offer', 70, 0, 'Bid offer', 1, 0, '2015-06-22 22:55:48'),
(133, 'bid-offer', 70, 47, 'Bid offer', 1, 0, '2015-06-22 22:55:48'),
(134, 'sales-question', 159, 0, 'Sales Comment', 0, 0, '2015-06-23 02:09:28'),
(135, 'sales-question', 159, 59, 'Sales Comment', 0, 1, '2015-06-23 02:09:28'),
(136, 'sales-question', 159, 0, 'Sales Comment', 0, 0, '2015-06-23 03:26:09'),
(137, 'sales-question', 159, 59, 'Sales Comment', 0, 1, '2015-06-23 03:26:09'),
(138, 'buyer-rate', 175, 0, 'Rating To Buyer', 0, 0, '2015-06-23 06:21:14'),
(139, 'buyer-rate', 175, 45, 'Rating To Buyer', 0, 0, '2015-06-23 06:21:14'),
(140, 'sales-question', 46, 0, 'Sales Comment', 0, 0, '2015-06-24 07:12:07'),
(141, 'sales-question', 46, 16, 'Sales Comment', 0, 1, '2015-06-24 07:12:07'),
(142, 'seller-rate', 159, 0, 'Rating To Seller', 0, 0, '2015-06-24 23:09:23'),
(143, 'seller-rate', 159, 59, 'Parks Comment', 0, 0, '2015-06-24 23:09:23'),
(144, 'sales-add', 189, 0, 'Sales Added', 0, 0, '2015-07-20 09:12:46'),
(145, 'sales-add', 189, 16, 'Sales Added', 0, 1, '2015-07-20 09:12:46'),
(146, 'sales-add', 189, 0, 'Sales Added', 0, 0, '2015-07-20 09:13:09'),
(147, 'sales-add', 189, 16, 'Sales Added', 0, 1, '2015-07-20 09:13:09'),
(148, 'sales-question', 189, 0, 'Sales Comment', 0, 0, '2015-07-20 09:31:32'),
(149, 'sales-question', 189, 16, 'Sales Comment', 0, 1, '2015-07-20 09:31:33'),
(150, 'bid-offer', 69, 0, 'Bid offer', 1, 0, '2015-07-27 09:22:32'),
(151, 'bid-offer', 69, 47, 'Bid offer', 1, 0, '2015-07-27 09:22:32'),
(152, 'bid-offer', 69, 0, 'Bid offer', 1, 0, '2015-07-27 09:35:16'),
(153, 'bid-offer', 69, 47, 'Bid offer', 1, 0, '2015-07-27 09:35:16'),
(154, 'bid-offer', 64, 0, 'Bid offer', 1, 0, '2015-07-27 12:51:45'),
(155, 'bid-offer', 64, 16, 'Bid offer', 1, 0, '2015-07-27 12:51:45'),
(156, 'bid-offer', 64, 0, 'Bid offer', 1, 0, '2015-07-27 13:30:27'),
(157, 'bid-offer', 64, 16, 'Bid offer', 1, 0, '2015-07-27 13:30:27'),
(158, 'parts-order', 50, 0, 'Parts Order', 0, 0, '2015-07-27 14:04:27'),
(159, 'parts-order', 50, 42, 'Parts Order', 0, 0, '2015-07-27 14:04:27'),
(160, 'request-question', 67, 0, 'Request Parts Comment', 1, 0, '2015-07-30 13:34:57'),
(161, 'request-question', 67, 16, 'Request Parts Comment', 1, 0, '2015-07-30 13:34:57'),
(162, 'request-question', 24, 0, 'Request Parts Comment', 1, 0, '2015-08-01 09:15:35'),
(163, 'request-question', 24, 16, 'Request Parts Comment', 1, 0, '2015-08-01 09:15:35'),
(164, 'sales-add', 196, 0, 'Sales Added', 0, 0, '2015-09-09 12:16:24'),
(165, 'sales-add', 196, 16, 'Sales Added', 0, 0, '2015-09-09 12:16:24'),
(166, 'sales-add', 197, 0, 'Sales Added', 0, 0, '2015-09-09 12:40:13'),
(167, 'sales-add', 197, 16, 'Sales Added', 0, 0, '2015-09-09 12:40:13'),
(168, 'sales-modified', 196, 0, 'Sales Modified', 0, 0, '2015-09-09 12:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `patienttest_reports`
--

CREATE TABLE `patienttest_reports` (
  `id` int(11) NOT NULL,
  `doctorid` int(11) DEFAULT '0',
  `patientid` int(11) DEFAULT '0',
  `test_type` int(11) DEFAULT '0',
  `sub_test_type` int(11) DEFAULT '0',
  `test_result` varchar(250) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienttest_reports`
--

INSERT INTO `patienttest_reports` (`id`, `doctorid`, `patientid`, `test_type`, `sub_test_type`, `test_result`, `status`, `created`) VALUES
(2, 13, 16, 2, 0, '+ve', 1, '2016-01-30 14:23:44'),
(3, 48, 36, 1, 2, '-ve', 1, '2016-02-02 14:55:47'),
(4, 37, 36, 1, 2, '-ve', 1, '2016-02-02 14:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) NOT NULL,
  `desc` text,
  `short_desc` text,
  `img` text,
  `pdf` text,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `desc`, `short_desc`, `img`, `pdf`, `status`, `created`, `modified`) VALUES
(3, 'MD100E', 'md100e', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet.</p>\r\n', '1451302082Portable ECG Monitor.png', '1451302057MD100E advertisement_VER4.0.pdf', 1, '2015-12-17 10:59:28', '2015-12-28 16:58:02'),
(4, 'Fetal Doppler', 'fetal-doppler', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '1451301933800.png', '1451301933Fetal Doppler Advertisement.pdf', 1, '2015-12-17 11:24:02', '2015-12-28 16:55:33'),
(5, 'ChoiceMMed Air Compressor Nebulizer', 'choicemmed-air-compressor-nebulizer', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n', '<hr />\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '1451301831Nebulizer.png', '1451301831ChoiceMMed Air Compressor Nebulizer 2013.pdf', 1, '2015-12-17 11:25:06', '2015-12-28 16:53:51'),
(6, 'BP10', 'bp10', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1451301602BP10.png', '1451301602BP10 Advertisement.pdf', 1, '2015-12-17 11:32:51', '2015-12-28 16:50:02'),
(7, 'MD300C63 ', 'md300c63-', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus.</p>\r\n', '1451302228A40.png', '1451302228MD300C63 advertisement_VER4.0.PDF', 1, '2015-12-28 17:00:28', '2015-12-28 17:00:28'),
(8, 'MD300M122', 'md300m122', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet.</p>\r\n', '1451302346300M.png', '1451302346MD300M122 advertisement_VER4.0.pdf', 1, '2015-12-28 17:02:26', '2015-12-28 17:02:26'),
(9, 'Wrist Auto BP Monitor', 'wrist-auto-bp-monitor', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus.</p>\r\n\r\n<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet. Vestibulum eget dolor tincidunt, venenatis tortor sit amet, feugiat purus. Sed luctus vel risus scelerisque venenatis. Phasellus vestibulum, sapien ac sodales facilisis, arcu magna dapibus</p>\r\n', '<p>Suspendisse sed viverra ex. Fusce et lacus a ex rutrum tristique pellentesque vel ipsum. Curabitur pretium sagittis mauris tempus finibus. Donec pretium velit quis urna dictum, in tempor quam laoreet&nbsp;</p>\r\n', '1451302532BP201.png', '1451302496Wrist Auto BP Monitor(BPW12_BPW13) Advertisement.pdf', 1, '2015-12-28 17:04:56', '2016-01-05 13:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `regular_appointments`
--

CREATE TABLE `regular_appointments` (
  `id` int(11) NOT NULL,
  `doctorid` int(11) DEFAULT '0',
  `patientid` int(11) DEFAULT '0',
  `is_conv` int(11) DEFAULT '0' COMMENT '0=no conv,1=inprogress,2=completed',
  `orderno` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `is_connected` int(11) DEFAULT '0' COMMENT '1=connected,0=notconnectd',
  `is_available` int(11) DEFAULT '0' COMMENT '1=doctor Available,0=not Available',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regular_appointments`
--

INSERT INTO `regular_appointments` (`id`, `doctorid`, `patientid`, `is_conv`, `orderno`, `status`, `is_connected`, `is_available`, `created`) VALUES
(1, 48, 7, 2, 1, 1, 0, 1, '2016-01-20 20:40:19'),
(2, 46, 6, 1, 1, 1, 1, 1, '2016-01-21 14:09:03'),
(3, 28, 6, 0, 1, 1, 1, 1, '2016-01-26 23:33:19'),
(4, 48, 6, 0, 1, 0, 0, 1, '2016-01-26 23:33:44'),
(5, 46, 6, 0, 1, 1, 1, 1, '2016-01-27 00:01:41'),
(6, 46, 6, 2, 1, 1, 0, 1, '2016-01-28 13:32:10'),
(7, 48, 6, 2, 1, 1, 0, 1, '2016-01-28 20:05:38'),
(8, 46, 6, 1, 1, 1, 1, 1, '2016-01-28 20:23:50'),
(9, 48, 7, 2, 1, 1, 0, 1, '2016-01-28 20:31:23'),
(10, 48, 49, 1, 1, 1, 1, 1, '2016-01-28 21:36:45'),
(11, 46, 49, 0, 2, 0, 0, 1, '2016-01-28 21:41:45'),
(12, 46, 6, 1, 1, 1, 1, 1, '2016-01-29 14:32:30'),
(13, 28, 6, 0, 1, 1, 1, 1, '2016-01-29 14:47:56'),
(14, 46, 6, 1, 1, 1, 1, 1, '2016-02-01 12:51:05'),
(16, 48, 36, 0, 1, 1, 1, 1, '2016-02-02 14:48:12'),
(17, 46, 6, 1, 1, 1, 1, 1, '2016-02-03 02:09:04'),
(18, 46, 50, 0, 1, 1, 0, 1, '2016-02-03 14:57:54'),
(19, 46, 50, 0, 1, 1, 0, 1, '2016-02-03 14:57:58'),
(20, 46, 6, 1, 1, 1, 1, 1, '2016-02-04 14:23:37'),
(21, 46, 6, 0, 1, 1, 1, 1, '2016-02-05 21:10:28'),
(22, 46, 36, 2, 1, 1, 0, 1, '2016-02-06 12:31:01'),
(23, 46, 36, 1, 1, 1, 1, 1, '2016-02-06 14:08:36'),
(24, 46, 6, 0, 2, 1, 0, 1, '2016-02-06 16:50:49'),
(25, 48, 6, 1, 1, 1, 1, 1, '2016-02-06 16:53:54'),
(26, 46, 6, 2, 1, 1, 0, 1, '2016-02-07 00:20:26'),
(27, 46, 6, 1, 1, 1, 1, 1, '2016-02-07 00:31:21'),
(28, 48, 6, 0, 1, 1, 1, 1, '2016-02-08 16:56:47'),
(29, 46, 36, 1, 1, 1, 1, 1, '2016-02-08 19:04:22'),
(30, 46, 6, 0, 1, 1, 0, 1, '2016-02-08 22:31:46'),
(31, 46, 6, 1, 1, 1, 1, 1, '2016-02-09 02:43:31'),
(32, 46, 36, 0, 1, 1, 0, 1, '2016-02-09 16:44:05'),
(33, 48, 6, 0, 1, 1, 1, 1, '2016-02-09 18:19:50'),
(34, 46, 6, 2, 1, 1, 0, 1, '2016-02-11 00:38:12'),
(35, 28, 6, 2, 1, 1, 0, 1, '2016-02-11 13:01:54'),
(36, 48, 6, 0, 1, 1, 1, 1, '2016-02-11 15:02:33'),
(37, 28, 36, 2, 2, 1, 0, 1, '2016-02-11 15:18:02'),
(38, 28, 6, 1, 1, 1, 1, 1, '2016-02-11 16:11:42'),
(39, 46, 36, 2, 1, 1, 0, 1, '2016-02-13 16:46:52'),
(40, 46, 6, 0, 1, 1, 1, 1, '2016-02-14 01:49:28'),
(41, 28, 36, 2, 1, 1, 0, 1, '2016-02-15 10:19:32'),
(42, 28, 36, 2, 1, 1, 0, 1, '2016-02-15 10:53:55'),
(43, 46, 49, 0, 1, 1, 1, 1, '2016-02-15 18:36:36'),
(44, 46, 6, 0, 2, 1, 0, 1, '2016-02-15 21:42:14'),
(45, 46, 6, 0, 1, 1, 1, 1, '2016-02-16 15:45:48'),
(46, 46, 6, 0, 1, 1, 1, 1, '2016-02-17 11:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_time` varchar(20) NOT NULL,
  `service_desc` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_name`, `service_time`, `service_desc`, `status`, `created`, `modified`) VALUES
(5, 'Dermatology', '20', '', 1, '2015-12-24 13:04:33', '2016-01-08 15:37:59'),
(6, 'Dermatology (New Patient)', '20', '', 1, '2015-12-24 13:04:47', '2015-12-24 13:04:47'),
(7, 'General Medicine', '15', '', 1, '2015-12-24 13:05:08', '2015-12-24 13:05:08'),
(8, 'General Medicine (New Patient)', '30', '', 1, '2015-12-24 13:05:26', '2015-12-24 13:05:26'),
(9, 'Gynecology', '10', '', 1, '2015-12-24 13:05:46', '2015-12-24 13:05:46'),
(10, 'Gynecology (New Patient)', '20', '', 1, '2015-12-24 13:06:02', '2015-12-24 13:06:02'),
(11, 'Infectious Disease', '15', '', 1, '2015-12-24 13:06:23', '2015-12-24 13:06:23'),
(12, 'Infectious Disease (New Patient)', '30', '', 1, '2015-12-24 13:06:42', '2015-12-24 13:06:42'),
(13, 'Mental Health', '60', '', 1, '2015-12-24 13:07:03', '2015-12-24 13:07:03'),
(14, 'Mental Health (New Patient)', '90', '', 1, '2015-12-24 13:07:20', '2015-12-24 13:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `logo_title` varchar(100) NOT NULL,
  `logo_image` varchar(200) NOT NULL,
  `sml_logo_image` text,
  `site_phone` varchar(250) NOT NULL,
  `site_email` varchar(250) NOT NULL,
  `copyright` varchar(250) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `contact_map` text,
  `created` date NOT NULL,
  `contact_address` text,
  `website` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `logo_title`, `logo_image`, `sml_logo_image`, `site_phone`, `site_email`, `copyright`, `meta_title`, `meta_desc`, `meta_keyword`, `contact_map`, `created`, `contact_address`, `website`) VALUES
(1, 'Inhealth', '1450160107inhealth_logo.png', '1450792738inhealth_logo2.png', ' +522 234 56789', 'help@inhelp.com', 'Copyrights Â© 2015 InHealth. All Rights Reserved', 'Inhealth', 'Inhealth', 'Inhealth', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3742.1202936688424!2d85.83007912990105!3d20.295287369377636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1426577386019', '2015-12-15', '12345 North Main Street, New York, NY 555555', 'www.domain.com');

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(50) NOT NULL,
  `is_iamge` int(11) NOT NULL COMMENT '1=iamge, 0=class icon',
  `social_icon` varchar(100) NOT NULL,
  `social_img` varchar(200) NOT NULL,
  `social_link` varchar(70) NOT NULL,
  `orderno` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`social_id`, `social_name`, `is_iamge`, `social_icon`, `social_img`, `social_link`, `orderno`, `created`) VALUES
(1, 'Facebook', 0, '<i class=\"fa fa-facebook\"></i>', '1450158443_1425999792_facebook.png', 'https://www.facebook.com/', 1, '2015-12-15 06:47:23'),
(2, 'Twitter', 0, ' <i class=\"fa fa-twitter\"></i>', '', 'https://www.twitter.com/', 2, '2015-12-15 12:01:07'),
(3, 'face', 0, '<i class=\"fa fa-linkedin\"></i>', '', 'http://www.linkedin.com', 4, '2015-12-15 12:20:48'),
(4, 'Google', 0, '<i class=\"fa fa-google-plus\"></i>', '', 'http://www.google.com', 5, '2015-12-15 12:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `temp_file`
--

CREATE TABLE `temp_file` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `filepath` text NOT NULL,
  `file_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_masters`
--

CREATE TABLE `test_masters` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `test_name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_masters`
--

INSERT INTO `test_masters` (`id`, `parent_id`, `test_name`, `status`, `created`) VALUES
(1, 0, 'Blood Test', 1, '2016-01-05 17:10:14'),
(2, 1, 'Dengu', 1, '2016-01-05 17:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_item`
--

CREATE TABLE `twitter_item` (
  `id` int(11) NOT NULL,
  `post_title` text,
  `post_url` text,
  `published` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  `profile_id` varchar(30) DEFAULT NULL,
  `screen_name` varchar(50) DEFAULT NULL,
  `profile_url` text,
  `profile_img` text,
  `twitter_post_id` varchar(100) DEFAULT NULL,
  `change_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twitter_item`
--

INSERT INTO `twitter_item` (`id`, `post_title`, `post_url`, `published`, `updated`, `profile_id`, `screen_name`, `profile_url`, `profile_img`, `twitter_post_id`, `change_status`) VALUES
(1, 'https://t.co/9qlaBcZrVX', 'https://t.co/9qlaBcZrVX', 'Wed Feb 17 10:38:09 +0000 2016', NULL, '4914664752', 'masashok1', NULL, 'http://pbs.twimg.com/profile_images/699495601684131840/rCnU9tXl_normal.jpg', '699905667289653248', 0),
(2, '@masashok1 hiiiii', '@masashok1 hiiiii', 'Tue Feb 16 14:01:04 +0000 2016', NULL, '2351264552', 'rajeshk75575287', NULL, 'http://abs.twimg.com/sticky/default_profile_images/default_profile_0_normal.png', '699594346962636800', 0),
(3, 'test tweet!', 'test tweet!', 'Tue Feb 16 13:58:28 +0000 2016', NULL, '4914664752', 'masashok1', NULL, 'http://pbs.twimg.com/profile_images/699495601684131840/rCnU9tXl_normal.jpg', '699593690516357120', 0),
(4, 'Maas Test Tweeting!... https://t.co/MDG2OWWqJ6', 'Maas Test Tweeting!... https://t.co/MDG2OWWqJ6', 'Thu Mar 10 06:40:03 +0000 2016', NULL, '4914664752', 'masashok1', NULL, 'http://pbs.twimg.com/profile_images/699495601684131840/rCnU9tXl_normal.jpg', '707818281844019201', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploadtest_results`
--

CREATE TABLE `uploadtest_results` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT '0',
  `doctorid` int(11) DEFAULT '0',
  `uploaded_file` text,
  `status` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadtest_results`
--

INSERT INTO `uploadtest_results` (`id`, `userid`, `doctorid`, `uploaded_file`, `status`, `created`) VALUES
(1, 7, 13, '1451311189Pixalink Issues Continued.docx', 1, '2015-12-28 19:29:49'),
(3, 7, 13, '1451389054ECEV2_Site_Fixes_pending_5th_june.docx', 1, '2015-12-29 13:16:28'),
(4, 7, 13, '1451375605MDN105.png', 1, '2015-12-29 13:23:25'),
(5, 7, 28, '1451375777Nebulizer.png', 1, '2015-12-29 13:26:17'),
(6, 7, 28, '1451375966MDN105.png', 1, '2015-12-29 13:29:26'),
(7, 7, 28, '1451381221Feedback_.txt', 1, '2015-12-29 14:57:01'),
(8, 6, 46, '1452674571cover letter2.docx', 1, '2016-01-13 14:12:51'),
(9, 6, 46, '1453287326MD100B1 Technical Specification-20110302 (2).pdf', 1, '2016-01-20 16:25:26'),
(10, 50, 46, '1453294732ChoiceMMed Air Compressor Nebulizer 2013.pdf', 1, '2016-01-20 18:28:52'),
(11, 50, 46, '1453295061Fetal Doppler Advertisement.pdf', 1, '2016-01-20 18:34:21'),
(12, 7, 13, '1453444719#article2_2.png', 1, '2016-01-22 12:08:39'),
(13, 36, 13, '1454941378img2.png', 1, '2016-02-08 19:52:58'),
(14, 52, 46, '1455549396# Peplum Dresses, Peplum Dresses Picture, Beautif.jpeg', 1, '2016-02-15 20:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(22, 6, 'address', 'fgdf'),
(23, 6, 'work_phone', '27359827923'),
(24, 6, 'country', '1'),
(25, 6, 'state', '16'),
(26, 6, 'city', 'dallas'),
(27, 6, 'guardians_name', 'scott'),
(28, 6, 'emrg_contact_per', 'stephan'),
(29, 7, 'address', 'Orlando, Florida'),
(30, 7, 'work_phone', '07504464140'),
(31, 7, 'country', '1'),
(32, 7, 'state', '5'),
(33, 7, 'city', 'Florida'),
(34, 7, 'guardians_name', 'smith'),
(35, 7, 'emrg_contact_per', 'peter'),
(36, 13, 'address', 'Address: Achrybihar, bbsr'),
(37, 13, 'hospitalid', '7'),
(46, 16, 'address', 'TUCSON AZ 85705-7598'),
(47, 16, 'work_phone', ''),
(48, 16, 'country', '1'),
(49, 16, 'state', '3'),
(50, 16, 'city', 'TUCSON'),
(51, 16, 'guardians_name', 'MARY ROE'),
(52, 16, 'emrg_contact_per', 'JANE ROE'),
(53, 17, 'address', '300 BOYLSTON AVE E'),
(54, 17, 'work_phone', '2343276'),
(55, 17, 'country', '2'),
(56, 17, 'state', '727'),
(57, 17, 'city', 'PHOENIX'),
(58, 17, 'guardians_name', 'MARY'),
(59, 17, 'emrg_contact_per', 'JANE'),
(71, 13, 'passport_photo', '1451454272doctor-2.jpg'),
(72, 13, 'doctor_cv', ''),
(76, 28, 'address', 'test'),
(77, 28, 'passport_photo', ''),
(78, 28, 'doctor_cv', ''),
(79, 28, 'hospitalid', '6'),
(80, 30, 'hospital_logo', '1451889809hospital.jpg'),
(81, 31, 'hospital_logo', '1451565258hospital-logo (4).gif'),
(84, 34, 'hospital_logo', '1451567612hospital-logo (4).gif'),
(85, 35, 'address', 'kalifornia'),
(86, 35, 'hospitalid', '11'),
(87, 35, 'passport_photo', ''),
(88, 35, 'doctor_cv', ''),
(89, 36, 'address', 'UK'),
(90, 36, 'work_phone', '435353535'),
(91, 36, 'country', '3'),
(92, 36, 'state', '1006'),
(93, 36, 'city', 'bhubaneswar'),
(94, 36, 'guardians_name', 'chitta2'),
(95, 36, 'emrg_contact_per', 'stephan'),
(96, 36, 'hospitalid', '7'),
(97, 6, 'hospitalid', '7'),
(98, 37, 'address', 'Orlando, Florida'),
(99, 37, 'hospitalid', '7'),
(100, 37, 'passport_photo', ''),
(101, 37, 'doctor_cv', ''),
(102, 38, 'address', 'Orlando, Florida'),
(103, 38, 'work_phone', '342424'),
(104, 38, 'country', '6'),
(105, 38, 'state', '2577'),
(106, 38, 'city', 'dallas'),
(107, 38, 'guardians_name', 'MARY ROE'),
(108, 38, 'emrg_contact_per', 'stephan'),
(109, 38, 'hospitalid', '8'),
(134, 7, 'hospitalid', ''),
(153, 46, 'address', '1 Ilare Close, Mafoluku'),
(154, 46, 'hospitalid', '7'),
(155, 46, 'passport_photo', '1452608861IMG_20151230_092100.jpg'),
(156, 46, 'doctor_cv', '1452608862Kennedy Osemeke CV.pdf'),
(157, 47, 'address', '7 faramobi street maryland, lagos'),
(158, 47, 'work_phone', ''),
(159, 47, 'country', ''),
(160, 47, 'state', ''),
(161, 47, 'city', ''),
(162, 47, 'guardians_name', ''),
(163, 47, 'emrg_contact_per', ''),
(164, 47, 'hospitalid', ''),
(165, 48, 'address', 'Orlando, Florida'),
(166, 48, 'hospitalid', '8'),
(167, 48, 'passport_photo', ''),
(168, 48, 'doctor_cv', ''),
(169, 49, 'address', '11b tango rivers'),
(170, 49, 'work_phone', ''),
(171, 49, 'country', '33'),
(172, 49, 'state', ''),
(173, 49, 'city', 'potarica'),
(174, 49, 'guardians_name', ''),
(175, 49, 'emrg_contact_per', ''),
(176, 49, 'hospitalid', '7'),
(177, 50, 'address', '2web'),
(178, 50, 'work_phone', ''),
(179, 50, 'country', '30'),
(180, 50, 'state', ''),
(181, 50, 'city', 'Lagos'),
(182, 50, 'guardians_name', 'Osemeke'),
(183, 50, 'emrg_contact_per', 'Sharon'),
(184, 50, 'hospitalid', '7'),
(185, 51, 'address', 'west life'),
(186, 51, 'hospitalid', '7'),
(187, 51, 'passport_photo', ''),
(188, 51, 'doctor_cv', ''),
(189, 52, 'address', 'lara close'),
(190, 52, 'work_phone', ''),
(191, 52, 'country', '43'),
(192, 52, 'state', '2845'),
(193, 52, 'city', 'lagos'),
(194, 52, 'guardians_name', 'chidinma'),
(195, 52, 'emrg_contact_per', 'chidinma'),
(196, 52, 'hospitalid', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `admin_pages`
--
ALTER TABLE `admin_pages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_services`
--
ALTER TABLE `assign_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `chat_status`
--
ALTER TABLE `chat_status`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosys_reports`
--
ALTER TABLE `diagnosys_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosys_test`
--
ALTER TABLE `diagnosys_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googleplus_item`
--
ALTER TABLE `googleplus_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googleplus_item_attachment`
--
ALTER TABLE `googleplus_item_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gospelcontent`
--
ALTER TABLE `gospelcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hometabs`
--
ALTER TABLE `hometabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_item`
--
ALTER TABLE `instagram_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location_name` (`location_name`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_to_subscriber`
--
ALTER TABLE `mail_to_subscriber`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `maincontent`
--
ALTER TABLE `maincontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_countries`
--
ALTER TABLE `master_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `master_menus`
--
ALTER TABLE `master_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_states`
--
ALTER TABLE `master_states`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `master_users`
--
ALTER TABLE `master_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `newsletter_template`
--
ALTER TABLE `newsletter_template`
  ADD PRIMARY KEY (`compose_id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`news_letter_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `patienttest_reports`
--
ALTER TABLE `patienttest_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regular_appointments`
--
ALTER TABLE `regular_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `temp_file`
--
ALTER TABLE `temp_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_masters`
--
ALTER TABLE `test_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twitter_item`
--
ALTER TABLE `twitter_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadtest_results`
--
ALTER TABLE `uploadtest_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_pages`
--
ALTER TABLE `admin_pages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `assign_services`
--
ALTER TABLE `assign_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `chat_status`
--
ALTER TABLE `chat_status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagnosys_reports`
--
ALTER TABLE `diagnosys_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnosys_test`
--
ALTER TABLE `diagnosys_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `googleplus_item`
--
ALTER TABLE `googleplus_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `googleplus_item_attachment`
--
ALTER TABLE `googleplus_item_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gospelcontent`
--
ALTER TABLE `gospelcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hometabs`
--
ALTER TABLE `hometabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `instagram_item`
--
ALTER TABLE `instagram_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `mail_to_subscriber`
--
ALTER TABLE `mail_to_subscriber`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maincontent`
--
ALTER TABLE `maincontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_countries`
--
ALTER TABLE `master_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `master_menus`
--
ALTER TABLE `master_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `master_states`
--
ALTER TABLE `master_states`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2858;

--
-- AUTO_INCREMENT for table `master_users`
--
ALTER TABLE `master_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter_template`
--
ALTER TABLE `newsletter_template`
  MODIFY `compose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `news_letter_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `patienttest_reports`
--
ALTER TABLE `patienttest_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regular_appointments`
--
ALTER TABLE `regular_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_file`
--
ALTER TABLE `temp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_masters`
--
ALTER TABLE `test_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `twitter_item`
--
ALTER TABLE `twitter_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploadtest_results`
--
ALTER TABLE `uploadtest_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_metas`
--
ALTER TABLE `user_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
