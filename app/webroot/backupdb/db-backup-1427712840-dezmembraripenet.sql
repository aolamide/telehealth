DROP TABLE IF EXISTS add_credits;

CREATE TABLE `add_credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_id` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `credits_by` int(11) NOT NULL COMMENT '0=> User, 1=> Admin',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO add_credits VALUES("1","1","29","0","2015-03-19 14:38:39","2015-03-19 14:38:39");
INSERT INTO add_credits VALUES("2","2","50","0","2015-03-19 14:42:23","2015-03-19 14:42:23");
INSERT INTO add_credits VALUES("3","3","29","0","2015-03-25 11:24:25","2015-03-25 11:24:25");



DROP TABLE IF EXISTS admin_block_ip;

CREATE TABLE `admin_block_ip` (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_ip` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`ip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS admin_langs;

CREATE TABLE `admin_langs` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `en_label` text NOT NULL,
  `roman_label` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

INSERT INTO admin_langs VALUES("1","Auto Parts","Piese Auto");
INSERT INTO admin_langs VALUES("2","Requests Parts","Cereri Piese");
INSERT INTO admin_langs VALUES("3","parks truck","Parcuri dezmembrÄƒri");
INSERT INTO admin_langs VALUES("4","Companies pieces","Firme piese");
INSERT INTO admin_langs VALUES("5","My Account ","Contul Meu");
INSERT INTO admin_langs VALUES("6","Welcome Dezmembraripenet.ro","Bine ati venit Dezmembraripenet.ro");
INSERT INTO admin_langs VALUES("7","authentication","Autentificare");
INSERT INTO admin_langs VALUES("8","Register","Inregistrare");
INSERT INTO admin_langs VALUES("9","merchant account","Contul comerciantului");
INSERT INTO admin_langs VALUES("10","Trade","Expozitii");
INSERT INTO admin_langs VALUES("11","Success stories","Povesti de succes");
INSERT INTO admin_langs VALUES("12","your account","Contul tau");
INSERT INTO admin_langs VALUES("13","Enquiry Parts","Cere Oferta Piese");
INSERT INTO admin_langs VALUES("14","Post Ads","Publica AnunÈ›uri");
INSERT INTO admin_langs VALUES("15","Search","cÄƒutare");
INSERT INTO admin_langs VALUES("16","Select Category","SelecteazÄƒ o categorie");
INSERT INTO admin_langs VALUES("17","Products Promoted","Produse promovate");
INSERT INTO admin_langs VALUES("18","All Categories","Toate categoriile");
INSERT INTO admin_langs VALUES("19","trade Statistics","Statistici comerciale");
INSERT INTO admin_langs VALUES("20","Buyers","Cumparatori");
INSERT INTO admin_langs VALUES("21","For suppliers","Pentru furnizori");
INSERT INTO admin_langs VALUES("22","Sign up for free","Inscrie-te gratuit");
INSERT INTO admin_langs VALUES("23","Please Sign In","VÄƒ rugÄƒm sÄƒ vÄƒ Ã®nregistraÈ›i");
INSERT INTO admin_langs VALUES("24","Recent publicity","publicitate recente");
INSERT INTO admin_langs VALUES("25","Recent parts","Piese recente");
INSERT INTO admin_langs VALUES("26","promoted Ads","AnunÈ›uri promovate");
INSERT INTO admin_langs VALUES("27"," Favourite ads","anunÈ›uri favorite");
INSERT INTO admin_langs VALUES("28","Popular models","modele populare");
INSERT INTO admin_langs VALUES("29","Premium Suppliers Profile","Furnizori Premium Profil");
INSERT INTO admin_langs VALUES("30","Publish your story","Publica povestea ta");
INSERT INTO admin_langs VALUES("31","Social Icon","Icon Social");
INSERT INTO admin_langs VALUES("32","Type your name and email address to get weekly updates on your favorite products and stores","IntroduceÈ›i numele dvs. È™i adresa de e-mail pentru a primi actualizÄƒri sÄƒptÄƒmÃ¢nale pe produsele tale preferate si magazine");
INSERT INTO admin_langs VALUES("33","user name","Nume utilizator");
INSERT INTO admin_langs VALUES("34","email","Adresa email");
INSERT INTO admin_langs VALUES("35","SUBSCRIBE NOW","Aboneaza-te ACUM");
INSERT INTO admin_langs VALUES("36","Trade News & Notice","Comert È˜tiri & ObservaÈ›ii");
INSERT INTO admin_langs VALUES("37","Processing","prelucrare");
INSERT INTO admin_langs VALUES("38","Brands","MÄƒrci");
INSERT INTO admin_langs VALUES("39","Categories","Categorii");
INSERT INTO admin_langs VALUES("40","Login","Log In");
INSERT INTO admin_langs VALUES("41","New User","utilizator nou");
INSERT INTO admin_langs VALUES("42","Create Your Account","CreaÈ›i Contul dvs.");
INSERT INTO admin_langs VALUES("43","My Purchases","AchiziÈ›ii mele");
INSERT INTO admin_langs VALUES("44","My Requests","Cereri mele");
INSERT INTO admin_langs VALUES("45","Favorites","Favorite");
INSERT INTO admin_langs VALUES("46","Settings","SetÄƒri");
INSERT INTO admin_langs VALUES("47","Car Parts","Piese pentru maÈ™ini");
INSERT INTO admin_langs VALUES("48","Sort By:","FiltreazÄƒ DupÄƒ:");
INSERT INTO admin_langs VALUES("49","Trade Shows with Us","TÃ¢rguri cu noi");
INSERT INTO admin_langs VALUES("50","Model","model");
INSERT INTO admin_langs VALUES("51","Price Range:","Interval preÈ›:");
INSERT INTO admin_langs VALUES("52","County","judeÈ›");
INSERT INTO admin_langs VALUES("53","Seller","vÃ¢nzÄƒtor");
INSERT INTO admin_langs VALUES("54","Details","Detalii");
INSERT INTO admin_langs VALUES("55","Continue","continua");
INSERT INTO admin_langs VALUES("56","Date (ascending)","Data ( crescator )");
INSERT INTO admin_langs VALUES("57","Date (descending)\n","Data ( descrescator )");
INSERT INTO admin_langs VALUES("58","Price (low to high)","PreÈ› ( crescÄƒtor )");
INSERT INTO admin_langs VALUES("59","Price (high to low)","PreÈ› ( descrescÄƒtor)");
INSERT INTO admin_langs VALUES("60","View all solved requests","Vezi toate cererile rezolvate");
INSERT INTO admin_langs VALUES("61","Request resolved","cerere de rezolvat");
INSERT INTO admin_langs VALUES("62","Last call for tenders resolved","Ultima cerere de ofertÄƒ rezolvate");
INSERT INTO admin_langs VALUES("63","Request Parts","Piese de schimb cerere");
INSERT INTO admin_langs VALUES("64","Home","acasÄƒ");
INSERT INTO admin_langs VALUES("65","click me","click me");
INSERT INTO admin_langs VALUES("66","Latest calls for proposals added","Ultimele cereri de propuneri adÄƒugat");
INSERT INTO admin_langs VALUES("67","The play required","Piesa este necesar");
INSERT INTO admin_langs VALUES("68","Pose","pune");
INSERT INTO admin_langs VALUES("69","Car","maÈ™inÄƒ");
INSERT INTO admin_langs VALUES("70","Nr. Deals","Nr . oferte");
INSERT INTO admin_langs VALUES("71","Status","Stare");
INSERT INTO admin_langs VALUES("72","Active Request","cerere activÄƒ");
INSERT INTO admin_langs VALUES("73","Offer","ofertÄƒ");
INSERT INTO admin_langs VALUES("74","View all requests","Vezi toate cererile");
INSERT INTO admin_langs VALUES("75","Add a fleet of truck","AdÄƒugaÈ›i o flotÄƒ de camioane");
INSERT INTO admin_langs VALUES("76","COMPANY DATA","COMPANIE DE DATE");
INSERT INTO admin_langs VALUES("77","The commercial name of the park","Numele comercial al parcului");
INSERT INTO admin_langs VALUES("78","Enter name of company","IntroduceÈ›i numele companiei");
INSERT INTO admin_langs VALUES("79","Code fiscal","Codul fiscal");
INSERT INTO admin_langs VALUES("80","Enter name of the park","IntroduceÈ›i numele parcului");
INSERT INTO admin_langs VALUES("81","Enter your Code","IntroduceÈ›i codul");
INSERT INTO admin_langs VALUES("82","Locality","localitate");
INSERT INTO admin_langs VALUES("83","Postal Code","Cod PoÈ™tal");
INSERT INTO admin_langs VALUES("84","Enter Postal Code","Introduceti codul poÈ™tal");
INSERT INTO admin_langs VALUES("85","Select City","Alege Oras");
INSERT INTO admin_langs VALUES("86","Select County","SelectaÈ›i judeÈ›ul");
INSERT INTO admin_langs VALUES("87","Street","stradÄƒ");
INSERT INTO admin_langs VALUES("88","No","Nu Face");
INSERT INTO admin_langs VALUES("89","Other details address","Alte detalii adresa");
INSERT INTO admin_langs VALUES("90","Enter Other details","IntroduceÈ›i Alte detalii");
INSERT INTO admin_langs VALUES("91","Enter No","IntrÄƒ nr");
INSERT INTO admin_langs VALUES("92","Enter Street Name","IntroduceÈ›i numele Street");
INSERT INTO admin_langs VALUES("93","Contact","contact");
INSERT INTO admin_langs VALUES("94","Phone","telefon");
INSERT INTO admin_langs VALUES("95","Fax","fax");
INSERT INTO admin_langs VALUES("96","Email Address","Adresa De E-Mail");
INSERT INTO admin_langs VALUES("97","Enter email","IntroduceÈ›i e-mail");
INSERT INTO admin_langs VALUES("98","Enter your Fax","IntroduceÈ›i fax ta");
INSERT INTO admin_langs VALUES("99","Enter Phone","IntroduceÈ›i Telefon");
INSERT INTO admin_langs VALUES("100","Company Banner","companie Banner");
INSERT INTO admin_langs VALUES("101","Logo ","Logo");
INSERT INTO admin_langs VALUES("102","Description","descriere");
INSERT INTO admin_langs VALUES("103","Enter Description","IntrÄƒ Descriere");
INSERT INTO admin_langs VALUES("104","Upload Image","ÃŽncÄƒrcaÈ›i imagine");
INSERT INTO admin_langs VALUES("105","Describe the conditions of the warranty provided by your auto parts company, the period of return, delivery or other contractual conditions.","DescrieÈ›i condiÈ›iile de garanÈ›ie oferit de compania dvs. piese auto , perioada de returnare , livrare sau alte condiÈ›ii contractuale .");
INSERT INTO admin_langs VALUES("106","WARRANTY, TRANSPORT, DELIVERY, RETURN","GARANÈšIE , transport, distributie , RETURN");
INSERT INTO admin_langs VALUES("107","SELECT BRANDS","SELECT BRANDS");
INSERT INTO admin_langs VALUES("108","Select your brands","SelectaÈ›i brandurile tale");
INSERT INTO admin_langs VALUES("109","CONTACT PERSON AT DEZMEMBRARIPENET","PERSOANA DE CONTACT AT DEZMEMBRARIPENET");
INSERT INTO admin_langs VALUES("110","Have you talked to a representative of Dezmembraripenet before making this sign?","Ai vorbit cu un reprezentant de Dezmembraripenet Ã®nainte de a face acest semn ?");
INSERT INTO admin_langs VALUES("111","Yes","da");
INSERT INTO admin_langs VALUES("112","Location","locaÈ›ie");
INSERT INTO admin_langs VALUES("113","SUBMIT","TRIMITE");
INSERT INTO admin_langs VALUES("114","Truck Parks","camioane Parcuri");
INSERT INTO admin_langs VALUES("115","All ads","Toate anunÈ›urile");
INSERT INTO admin_langs VALUES("116","Add to park truck","Adauga la parc camion");
INSERT INTO admin_langs VALUES("117","Recent Parks Truck","RecentÄƒ Parcuri Truck");
INSERT INTO admin_langs VALUES("118","Company Parts","Piese de schimb companie");
INSERT INTO admin_langs VALUES("119","  Add to Company Parts","Adauga la piese companie");
INSERT INTO admin_langs VALUES("120","Recent Company Parts","Piese de schimb recente ale companiei");
INSERT INTO admin_langs VALUES("121","test company ","companie de testare");
INSERT INTO admin_langs VALUES("122","Add Company Parts","AdÄƒugaÈ›i Piese de schimb companie");
INSERT INTO admin_langs VALUES("123","DESCRIPTION AND LOGO","DESCRIERE SI LOGO");
INSERT INTO admin_langs VALUES("124","Select Brand","SelectaÈ›i Marca ");
INSERT INTO admin_langs VALUES("125","Welcome","bun venit");
INSERT INTO admin_langs VALUES("126","Name","nume");
INSERT INTO admin_langs VALUES("127","Edit Profile","Editare profil");
INSERT INTO admin_langs VALUES("128","Sell a song","Vindem o melodie");
INSERT INTO admin_langs VALUES("129","Purchase","cumpÄƒrare");
INSERT INTO admin_langs VALUES("130","My Purchase","CumpÄƒrare meu");
INSERT INTO admin_langs VALUES("131","My Question","ÃŽntrebarea mea");
INSERT INTO admin_langs VALUES("132","Sales","VÃ¢nzÄƒri");
INSERT INTO admin_langs VALUES("133","Post Ad","Mesaj publicitar");
INSERT INTO admin_langs VALUES("134","Active sales","vÃ¢nzÄƒri active");
INSERT INTO admin_langs VALUES("135","Asks for sales","AdresaÈ›i-vÄƒ pentru vÃ¢nzÄƒri");
INSERT INTO admin_langs VALUES("136","Order","comandÄƒ");
INSERT INTO admin_langs VALUES("137","Commands","Comenzi");
INSERT INTO admin_langs VALUES("138","Out of Stock","Epuizat");
INSERT INTO admin_langs VALUES("139","Deleted ads","anunÈ›uri È™terse");
INSERT INTO admin_langs VALUES("140","Add Offer","Adauga Oferta");
INSERT INTO admin_langs VALUES("141","My requests of parts","Cererile mele de piese");
INSERT INTO admin_langs VALUES("142","Bidding","Licitarea");
INSERT INTO admin_langs VALUES("143","Supply & Demand","Oferta & cerere");
INSERT INTO admin_langs VALUES("144","New Question on Offer","Noua Ã®ntrebare pe oferta");
INSERT INTO admin_langs VALUES("145","Offer Winning","Oferta cÃ¢È™tigÄƒtoare");
INSERT INTO admin_langs VALUES("146","Offers to my requests","Oferte de cererile mele");
INSERT INTO admin_langs VALUES("147","Posts","Posturi");
INSERT INTO admin_langs VALUES("148","Inbox","Inbox");
INSERT INTO admin_langs VALUES("149","Submissions","Subscrieri");
INSERT INTO admin_langs VALUES("150","Archived Posts","arhivate mesaje");
INSERT INTO admin_langs VALUES("151","Email History","Istoria e-mail");
INSERT INTO admin_langs VALUES("152","Send a private message","Trimite un mesaj privat");
INSERT INTO admin_langs VALUES("153","Rating Given","Rating-ul AvÃ¢nd Ã®n vedere");
INSERT INTO admin_langs VALUES("154","Rating as Buyer","Scor CumpÄƒrÄƒtor");
INSERT INTO admin_langs VALUES("155","Seller Rating","VÃ¢nzÄƒtor Evaluare");
INSERT INTO admin_langs VALUES("156","Rating Received","Rating-ul primit");
INSERT INTO admin_langs VALUES("157","My Rating","Rating-ul meu");
INSERT INTO admin_langs VALUES("158","Total Positive,Negative, Neutre Rating ","Raport pozitiv, negativ , Neutre Evaluare");
INSERT INTO admin_langs VALUES("159","Financial","financiar");
INSERT INTO admin_langs VALUES("160","Accounts Credits","Conturi Credite");
INSERT INTO admin_langs VALUES("161","History Account","Istoricul contului");
INSERT INTO admin_langs VALUES("162","Feeds Accounts","Feeds Conturi");
INSERT INTO admin_langs VALUES("163","Pay as individua","Pay as individ");
INSERT INTO admin_langs VALUES("164","Pay as Legal Personl","Pay as Personl juridic");
INSERT INTO admin_langs VALUES("165","Profile personal Information  management","Profil gestionarea informaÈ›iilor personale");
INSERT INTO admin_langs VALUES("166","Alerts auto parts requests ","Alerte cereri piese auto");
INSERT INTO admin_langs VALUES("167","Warranty / Return / Shipping / Payment","GaranÈ›ie / returnare / de transport / de platÄƒ");
INSERT INTO admin_langs VALUES("168","Change Password","SchimbaÈ›i Parola");
INSERT INTO admin_langs VALUES("169","Change email address","Schimbarea adresa de e-mail");
INSERT INTO admin_langs VALUES("170","Company Settings / Parc Parts","SetÄƒri companie / Piese Parc");
INSERT INTO admin_langs VALUES("171","Manage Success Stories","GestionaÈ›i PoveÈ™ti de succes");
INSERT INTO admin_langs VALUES("172","Add Success stories","AdÄƒugaÈ›i PoveÈ™ti de succes");
INSERT INTO admin_langs VALUES("173","My Profile","Profilul meu");
INSERT INTO admin_langs VALUES("174","Profile Page","Profilul Page");
INSERT INTO admin_langs VALUES("175","Statistics views","Statistici Vizualizari");
INSERT INTO admin_langs VALUES("176","Logout","Logout");
INSERT INTO admin_langs VALUES("177","Edit Profile Picture","Editeaza poza profilului");
INSERT INTO admin_langs VALUES("178","Choose category","Alege categorie");
INSERT INTO admin_langs VALUES("179","Preview ad","cautare Previzualizare");
INSERT INTO admin_langs VALUES("180","Ready","gata");
INSERT INTO admin_langs VALUES("181","Category","Categoria");
INSERT INTO admin_langs VALUES("182","Carry On","ContinuÄƒ");
INSERT INTO admin_langs VALUES("183","You have selected category","Ati selectat categoria");
INSERT INTO admin_langs VALUES("184","Dashboard","Tabloul de bord");
INSERT INTO admin_langs VALUES("185","My request Solved","Cererea mea Rezolvat");
INSERT INTO admin_langs VALUES("186","Date of purchase","Data de cumpÄƒrare");
INSERT INTO admin_langs VALUES("187","Qty. X Price","Cantitate . X PreÈ›");
INSERT INTO admin_langs VALUES("188","Notice","aviz");
INSERT INTO admin_langs VALUES("189","Sale Clerk","Vanzare Clerk");
INSERT INTO admin_langs VALUES("190","Sl #","Sl #");
INSERT INTO admin_langs VALUES("191","Details seller","Detalii vÃ¢nzÄƒtor");



DROP TABLE IF EXISTS admin_menu;

CREATE TABLE `admin_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0=>menu,1=>submenu',
  `status` tinyint(4) NOT NULL COMMENT '1=>Active, 2=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS admin_pages;

CREATE TABLE `admin_pages` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `page_slug` text CHARACTER SET utf8,
  `page_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `page_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `meta_title` text CHARACTER SET utf8,
  `meta_desc` text CHARACTER SET utf8,
  `meta_keywords` text CHARACTER SET utf8,
  `page_desc` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin_pages VALUES("1","about-us","about-us","About Us","dssgs","gdfg","gdfgdf","dfgd","2015-03-25 13:40:24","2015-03-25 13:40:24","1");



DROP TABLE IF EXISTS admin_theme;

CREATE TABLE `admin_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS admin_users;

CREATE TABLE `admin_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) DEFAULT NULL,
  `mail_id` varchar(250) DEFAULT NULL,
  `user_id` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1' COMMENT '0=No, 1= Yes',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO admin_users VALUES("2","Super Admin","admin@admin.com","admin","12345","1","2015-01-16 08:27:40");
INSERT INTO admin_users VALUES("3","admin1","admin1@gmail.com","admin1","123456","1","2015-03-04 05:48:44");



DROP TABLE IF EXISTS advertisements;

CREATE TABLE `advertisements` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `ad_type` int(11) NOT NULL COMMENT '1->Banner , 2->Script',
  `banner_title` varchar(200) NOT NULL,
  `banner_link` varchar(200) NOT NULL,
  `banner_image` varchar(250) NOT NULL,
  `ad_script` text NOT NULL,
  `show_position` tinyint(4) NOT NULL COMMENT '''1''=> ''Top'',''2''=> ''left1'', ''3'' => ''left2'', 4=>Middle, 5 => right sidebar 6 => footer',
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS audit_logins;

CREATE TABLE `audit_logins` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `session_time` int(11) DEFAULT NULL COMMENT 'Session time in minutes and seconds',
  `ip_address` text,
  PRIMARY KEY (`audit_id`),
  KEY `audit_logins_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

INSERT INTO audit_logins VALUES("1","0","","2015-03-19 01:06:04","","");
INSERT INTO audit_logins VALUES("2","0","","2015-03-19 01:17:26","","");
INSERT INTO audit_logins VALUES("3","0","","2015-03-19 01:19:48","","");
INSERT INTO audit_logins VALUES("4","0","","2015-03-19 01:22:00","","");
INSERT INTO audit_logins VALUES("5","1","2015-03-19 01:22:11","2015-03-19 02:19:27","","127.0.0.1");
INSERT INTO audit_logins VALUES("6","3","2015-03-19 02:19:44","2015-03-19 02:20:14","","127.0.0.1");
INSERT INTO audit_logins VALUES("7","1","2015-03-19 02:20:26","2015-03-19 02:26:50","","127.0.0.1");
INSERT INTO audit_logins VALUES("8","2","2015-03-19 02:27:04","","","127.0.0.1");
INSERT INTO audit_logins VALUES("9","2","2015-03-19 02:36:27","2015-03-19 02:39:43","","127.0.0.1");
INSERT INTO audit_logins VALUES("10","3","2015-03-19 02:40:06","2015-03-19 02:42:38","","127.0.0.1");
INSERT INTO audit_logins VALUES("11","1","2015-03-19 02:42:50","2015-03-19 03:12:06","","127.0.0.1");
INSERT INTO audit_logins VALUES("12","1","2015-03-19 03:12:16","2015-03-19 03:12:52","","127.0.0.1");
INSERT INTO audit_logins VALUES("13","1","2015-03-19 03:14:13","2015-03-19 03:22:08","","127.0.0.1");
INSERT INTO audit_logins VALUES("14","1","2015-03-20 01:12:38","","","127.0.0.1");
INSERT INTO audit_logins VALUES("15","1","2015-03-20 02:28:32","2015-03-20 02:49:23","","127.0.0.1");
INSERT INTO audit_logins VALUES("16","3","2015-03-20 02:49:48","","","127.0.0.1");
INSERT INTO audit_logins VALUES("17","1","2015-03-21 05:57:10","","","127.0.0.1");
INSERT INTO audit_logins VALUES("18","1","2015-03-21 10:39:42","","","127.0.0.1");
INSERT INTO audit_logins VALUES("19","1","2015-03-23 05:50:25","2015-03-23 06:22:52","","127.0.0.1");
INSERT INTO audit_logins VALUES("20","2","2015-03-23 06:24:15","","","127.0.0.1");
INSERT INTO audit_logins VALUES("21","1","2015-03-23 07:25:36","2015-03-23 07:34:10","","127.0.0.1");
INSERT INTO audit_logins VALUES("22","3","2015-03-23 07:34:38","","","127.0.0.1");
INSERT INTO audit_logins VALUES("23","2","2015-03-23 10:26:10","","","127.0.0.1");
INSERT INTO audit_logins VALUES("24","2","2015-03-23 02:16:08","","","127.0.0.1");
INSERT INTO audit_logins VALUES("25","1","2015-03-24 05:45:10","","","127.0.0.1");
INSERT INTO audit_logins VALUES("26","3","2015-03-24 06:01:29","","","127.0.0.1");
INSERT INTO audit_logins VALUES("27","1","2015-03-24 10:15:34","2015-03-24 11:46:25","","127.0.0.1");
INSERT INTO audit_logins VALUES("28","3","2015-03-24 11:46:54","2015-03-24 11:50:20","","127.0.0.1");
INSERT INTO audit_logins VALUES("29","1","2015-03-24 11:51:09","2015-03-24 11:51:35","","127.0.0.1");
INSERT INTO audit_logins VALUES("30","2","2015-03-24 11:51:48","2015-03-24 11:52:47","","127.0.0.1");
INSERT INTO audit_logins VALUES("31","3","2015-03-24 11:52:59","2015-03-24 12:22:17","","127.0.0.1");
INSERT INTO audit_logins VALUES("32","1","2015-03-26 05:33:09","","","127.0.0.1");
INSERT INTO audit_logins VALUES("33","2","2015-03-26 11:37:51","2015-03-26 11:37:59","","127.0.0.1");
INSERT INTO audit_logins VALUES("34","1","2015-03-26 11:38:08","2015-03-26 11:41:26","","127.0.0.1");
INSERT INTO audit_logins VALUES("35","0","","2015-03-26 12:03:03","","");
INSERT INTO audit_logins VALUES("36","1","2015-03-26 12:36:58","2015-03-26 01:39:14","","127.0.0.1");
INSERT INTO audit_logins VALUES("37","1","2015-03-26 02:08:43","","","127.0.0.1");
INSERT INTO audit_logins VALUES("38","1","2015-03-27 06:16:51","2015-03-27 06:19:15","","127.0.0.1");
INSERT INTO audit_logins VALUES("39","1","2015-03-27 07:06:41","","","192.168.1.29");
INSERT INTO audit_logins VALUES("40","0","","2015-03-27 07:14:26","","");
INSERT INTO audit_logins VALUES("41","0","","2015-03-27 08:50:09","","");
INSERT INTO audit_logins VALUES("42","2","2015-03-27 08:50:24","","","127.0.0.1");
INSERT INTO audit_logins VALUES("43","1","2015-03-27 08:51:36","","","127.0.0.1");
INSERT INTO audit_logins VALUES("44","2","2015-03-27 10:21:49","2015-03-27 10:55:53","","127.0.0.1");
INSERT INTO audit_logins VALUES("45","1","2015-03-27 10:25:13","","","192.168.1.29");
INSERT INTO audit_logins VALUES("46","2","2015-03-27 11:20:32","2015-03-27 11:21:07","","127.0.0.1");
INSERT INTO audit_logins VALUES("47","2","2015-03-27 11:21:43","","","127.0.0.1");
INSERT INTO audit_logins VALUES("48","1","2015-03-27 02:22:33","2015-03-27 02:25:06","","127.0.0.1");
INSERT INTO audit_logins VALUES("49","1","2015-03-27 02:24:55","","","192.168.1.29");
INSERT INTO audit_logins VALUES("50","1","2015-03-27 03:06:08","2015-03-27 03:40:30","","127.0.0.1");
INSERT INTO audit_logins VALUES("51","1","2015-03-27 03:43:00","","","127.0.0.1");
INSERT INTO audit_logins VALUES("52","1","2015-03-30 06:56:59","2015-03-30 07:04:08","","127.0.0.1");
INSERT INTO audit_logins VALUES("53","1","2015-03-30 07:09:53","","","127.0.0.1");
INSERT INTO audit_logins VALUES("54","1","2015-03-30 07:28:30","2015-03-30 08:30:52","","127.0.0.1");
INSERT INTO audit_logins VALUES("55","1","2015-03-30 08:57:40","2015-03-30 08:57:50","","127.0.0.1");
INSERT INTO audit_logins VALUES("56","1","2015-03-30 08:58:01","2015-03-30 08:58:05","","127.0.0.1");
INSERT INTO audit_logins VALUES("57","1","2015-03-30 08:59:58","2015-03-30 09:00:04","","127.0.0.1");
INSERT INTO audit_logins VALUES("58","1","2015-03-30 09:00:15","2015-03-30 09:00:20","","127.0.0.1");
INSERT INTO audit_logins VALUES("59","1","2015-03-30 09:00:39","2015-03-30 09:00:45","","127.0.0.1");



DROP TABLE IF EXISTS backup_db;

CREATE TABLE `backup_db` (
  `backup_id` int(11) NOT NULL AUTO_INCREMENT,
  `backup_file` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS banners;

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(100) NOT NULL,
  `banner_caption` text NOT NULL,
  `banner_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `orderno` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS bid_img;

CREATE TABLE `bid_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO bid_img VALUES("1","1","2","1","2","1426771729d1.jpg");
INSERT INTO bid_img VALUES("2","1","2","1","2","1426771729car.jpg");
INSERT INTO bid_img VALUES("3","2","3","1","2","14267724631368332789_Employment.jpg");
INSERT INTO bid_img VALUES("4","2","3","1","2","1426772463promt4.jpg");
INSERT INTO bid_img VALUES("5","2","3","1","2","1426772463promt6.jpg");
INSERT INTO bid_img VALUES("6","2","3","1","2","1426772463promt10.jpg");



DROP TABLE IF EXISTS bid_offers;

CREATE TABLE `bid_offers` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `piece` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `currency` varchar(10) NOT NULL,
  `um` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `offers` varchar(20) NOT NULL,
  `availbility` int(11) NOT NULL COMMENT '1=>in stock, 2=> custom made',
  `personal_teaching` int(11) NOT NULL,
  `courier` int(11) NOT NULL,
  `courier_cost` double DEFAULT NULL,
  `free_courier` int(11) NOT NULL,
  `roman_mail` int(11) NOT NULL,
  `roman_mail_cost` double DEFAULT NULL,
  `free_roman_mail` int(11) NOT NULL,
  `time_required` int(11) NOT NULL,
  `terms_of_delivery` text NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>approved, 1=>winning, 2=> cancel',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO bid_offers VALUES("1","2","1","2","BarÄƒ faÅ£Äƒ Dacia Logan roÅŸie fÄƒrÄƒ zgÃ¢rieturi","235","RON","buc","vezi doar tu","New","2","1","0","","0","0","","0","1","test term delivery","Cash on delivery","1","2015-03-19 14:38:50","2015-03-19 14:43:58");
INSERT INTO bid_offers VALUES("2","3","1","2","test offer request by praneet","43","RON","buc","fdgbdf fdgfd","Used","1","1","0","","0","0","","0","3","dhfd","Cash on delivery","0","2015-03-19 14:42:30","2015-03-19 14:42:30");
INSERT INTO bid_offers VALUES("3","2","1","1","dfgfd","12","RON","buc","","New","2","1","0","","0","0","","0","1","","Wire Transfer","0","2015-03-27 07:14:55","2015-03-27 07:14:55");



DROP TABLE IF EXISTS bid_temp_file;

CREATE TABLE `bid_temp_file` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_pth` varchar(200) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS mail_to_subscriber;

CREATE TABLE `mail_to_subscriber` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL COMMENT '1 => Buyer, 2=> Seller, 3=> Subscriber',
  `brandlist` varchar(200) NOT NULL,
  `categorylist` varchar(250) NOT NULL,
  `countylist` varchar(250) NOT NULL,
  `compose_id` int(11) NOT NULL,
  `mail_list` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO mail_to_subscriber VALUES("1","1","3","","","2","all","2015-03-20 10:35:55");
INSERT INTO mail_to_subscriber VALUES("9","1","1","1,2","1,3,4","2","test@gmail.com","2015-03-21 09:43:55");



DROP TABLE IF EXISTS manage_message;

CREATE TABLE `manage_message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 => Inactive, 1 => Active, 2 => trash',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO manage_message VALUES("1","1","3","test message","0","1","2015-03-26 14:24:44","2015-03-26 14:24:44");



DROP TABLE IF EXISTS master_countries;

CREATE TABLE `master_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_short_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

INSERT INTO master_countries VALUES("1","Afghanistan","AF");
INSERT INTO master_countries VALUES("2","&Aring;land Islands","AX");
INSERT INTO master_countries VALUES("3","Albania","AL");
INSERT INTO master_countries VALUES("4","Algeria","DZ");
INSERT INTO master_countries VALUES("5","American Samoa","AS");
INSERT INTO master_countries VALUES("6","Andorra","AD");
INSERT INTO master_countries VALUES("7","Angola","AO");
INSERT INTO master_countries VALUES("8","Anguilla","AI");
INSERT INTO master_countries VALUES("9","Antarctica","AQ");
INSERT INTO master_countries VALUES("10","Antigua and Barbuda","AG");
INSERT INTO master_countries VALUES("11","Argentina","AR");
INSERT INTO master_countries VALUES("12","Armenia","AM");
INSERT INTO master_countries VALUES("13","Aruba","AW");
INSERT INTO master_countries VALUES("14","Australia","AU");
INSERT INTO master_countries VALUES("15","Austria","AT");
INSERT INTO master_countries VALUES("16","Azerbaijan","AZ");
INSERT INTO master_countries VALUES("17","Bahamas","BS");
INSERT INTO master_countries VALUES("18","Bahrain","BH");
INSERT INTO master_countries VALUES("19","Bangladesh","BD");
INSERT INTO master_countries VALUES("20","Barbados","BB");
INSERT INTO master_countries VALUES("21","Belarus","BY");
INSERT INTO master_countries VALUES("22","Belgium","BE");
INSERT INTO master_countries VALUES("23","Belize","BZ");
INSERT INTO master_countries VALUES("24","Benin","BJ");
INSERT INTO master_countries VALUES("25","Bermuda","BM");
INSERT INTO master_countries VALUES("26","Bhutan","BT");
INSERT INTO master_countries VALUES("27","Bolivia","BO");
INSERT INTO master_countries VALUES("28","Bosnia and Herzegovina","BA");
INSERT INTO master_countries VALUES("29","Botswana","BW");
INSERT INTO master_countries VALUES("30","Bouvet Island","BV");
INSERT INTO master_countries VALUES("31","Brazil","BR");
INSERT INTO master_countries VALUES("32","British Indian Ocean territory","IO");
INSERT INTO master_countries VALUES("33","Brunei Darussalam","BN");
INSERT INTO master_countries VALUES("34","Bulgaria","BG");
INSERT INTO master_countries VALUES("35","Burkina Faso","BF");
INSERT INTO master_countries VALUES("36","Burundi","BI");
INSERT INTO master_countries VALUES("37","Cambodia","KH");
INSERT INTO master_countries VALUES("38","Cameroon","CM");
INSERT INTO master_countries VALUES("39","Canada","CA");
INSERT INTO master_countries VALUES("40","Cape Verde","CV");
INSERT INTO master_countries VALUES("41","Cayman Islands","KY");
INSERT INTO master_countries VALUES("42","Central African Republic","CF");
INSERT INTO master_countries VALUES("43","Chad","TD");
INSERT INTO master_countries VALUES("44","Chile","CL");
INSERT INTO master_countries VALUES("45","China","CN");
INSERT INTO master_countries VALUES("46","Christmas Island","CX");
INSERT INTO master_countries VALUES("47","Cocos (Keeling) Islands","CC");
INSERT INTO master_countries VALUES("48","Colombia","CO");
INSERT INTO master_countries VALUES("49","Comoros","KM");
INSERT INTO master_countries VALUES("50","Congo","CG");
INSERT INTO master_countries VALUES("51","South Sudan","SS");
INSERT INTO master_countries VALUES("52","Zaire","ZR");
INSERT INTO master_countries VALUES("53","Cook Islands","CK");
INSERT INTO master_countries VALUES("54","Costa Rica","CR");
INSERT INTO master_countries VALUES("55","Ivoire (Ivory Coast)","CI");
INSERT INTO master_countries VALUES("56","Croatia (Hrvatska)","HR");
INSERT INTO master_countries VALUES("57","Cuba","CU");
INSERT INTO master_countries VALUES("58","Cyprus","CY");
INSERT INTO master_countries VALUES("59","Czech Republic","CZ");
INSERT INTO master_countries VALUES("60","Denmark","DK");
INSERT INTO master_countries VALUES("61","Djibouti","DJ");
INSERT INTO master_countries VALUES("62","Dominica","DM");
INSERT INTO master_countries VALUES("63","Dominican Republic","DO");
INSERT INTO master_countries VALUES("64","East Timor","TP");
INSERT INTO master_countries VALUES("65","Ecuador","EC");
INSERT INTO master_countries VALUES("66","Egypt","EG");
INSERT INTO master_countries VALUES("67","El Salvador","SV");
INSERT INTO master_countries VALUES("68","Equatorial Guinea","GQ");
INSERT INTO master_countries VALUES("69","Eritrea","ER");
INSERT INTO master_countries VALUES("70","Estonia","EE");
INSERT INTO master_countries VALUES("71","Ethiopia","ET");
INSERT INTO master_countries VALUES("72","Falkland Islands","FK");
INSERT INTO master_countries VALUES("73","Faroe Islands","FO");
INSERT INTO master_countries VALUES("74","Fiji","FJ");
INSERT INTO master_countries VALUES("75","Finland","FI");
INSERT INTO master_countries VALUES("76","France","FR");
INSERT INTO master_countries VALUES("77","French Guiana","GF");
INSERT INTO master_countries VALUES("78","French Polynesia","PF");
INSERT INTO master_countries VALUES("79","French Southern Territories","TF");
INSERT INTO master_countries VALUES("80","Gabon","GA");
INSERT INTO master_countries VALUES("81","Gambia","GM");
INSERT INTO master_countries VALUES("82","Georgia","GE");
INSERT INTO master_countries VALUES("83","Germany","DE");
INSERT INTO master_countries VALUES("84","Ghana","GH");
INSERT INTO master_countries VALUES("85","Gibraltar","GI");
INSERT INTO master_countries VALUES("86","Greece","GR");
INSERT INTO master_countries VALUES("87","Greenland","GL");
INSERT INTO master_countries VALUES("88","Grenada","GD");
INSERT INTO master_countries VALUES("89","Guadeloupe","GP");
INSERT INTO master_countries VALUES("90","Guam","GU");
INSERT INTO master_countries VALUES("91","Guatemala","GT");
INSERT INTO master_countries VALUES("92","Guinea","GN");
INSERT INTO master_countries VALUES("93","Guinea-Bissau","GW");
INSERT INTO master_countries VALUES("94","Guyana","GY");
INSERT INTO master_countries VALUES("95","Haiti","HT");
INSERT INTO master_countries VALUES("96","Heard and McDonald Islands","HM");
INSERT INTO master_countries VALUES("97","Honduras","HN");
INSERT INTO master_countries VALUES("98","Hong Kong","HK");
INSERT INTO master_countries VALUES("99","Hungary","HU");
INSERT INTO master_countries VALUES("100","Iceland","IS");
INSERT INTO master_countries VALUES("101","India","IN");
INSERT INTO master_countries VALUES("102","Indonesia","ID");
INSERT INTO master_countries VALUES("103","Iran","IR");
INSERT INTO master_countries VALUES("104","Iraq","IQ");
INSERT INTO master_countries VALUES("105","Ireland","IE");
INSERT INTO master_countries VALUES("106","Israel","IL");
INSERT INTO master_countries VALUES("107","Italy","IT");
INSERT INTO master_countries VALUES("108","Jamaica","JM");
INSERT INTO master_countries VALUES("109","Japan","JP");
INSERT INTO master_countries VALUES("110","Jordan","JO");
INSERT INTO master_countries VALUES("111","Kazakhstan","KZ");
INSERT INTO master_countries VALUES("112","Kenya","KE");
INSERT INTO master_countries VALUES("113","Kiribati","KI");
INSERT INTO master_countries VALUES("114","Korea (north)","KP");
INSERT INTO master_countries VALUES("115","Korea (south)","KR");
INSERT INTO master_countries VALUES("116","Kuwait","KW");
INSERT INTO master_countries VALUES("117","Kyrgyzstan","KG");
INSERT INTO master_countries VALUES("118","Lao People\'s Democratic Republic","LA");
INSERT INTO master_countries VALUES("119","Latvia","LV");
INSERT INTO master_countries VALUES("120","Lebanon","LB");
INSERT INTO master_countries VALUES("121","Lesotho","LS");
INSERT INTO master_countries VALUES("122","Liberia","LR");
INSERT INTO master_countries VALUES("123","Libyan Arab Jamahiriya","LY");
INSERT INTO master_countries VALUES("124","Liechtenstein","LI");
INSERT INTO master_countries VALUES("125","Lithuania","LT");
INSERT INTO master_countries VALUES("126","Luxembourg","LU");
INSERT INTO master_countries VALUES("127","Macao","MO");
INSERT INTO master_countries VALUES("128","Macedonia","MK");
INSERT INTO master_countries VALUES("129","Madagascar","MG");
INSERT INTO master_countries VALUES("130","Malawi","MW");
INSERT INTO master_countries VALUES("131","Malaysia","MY");
INSERT INTO master_countries VALUES("132","Maldives","MV");
INSERT INTO master_countries VALUES("133","Mali","ML");
INSERT INTO master_countries VALUES("134","Malta","MT");
INSERT INTO master_countries VALUES("135","Marshall Islands","MH");
INSERT INTO master_countries VALUES("136","Martinique","MQ");
INSERT INTO master_countries VALUES("137","Mauritania","MR");
INSERT INTO master_countries VALUES("138","Mauritius","MU");
INSERT INTO master_countries VALUES("139","Mayotte","YT");
INSERT INTO master_countries VALUES("140","Mexico","MX");
INSERT INTO master_countries VALUES("141","Micronesia","FM");
INSERT INTO master_countries VALUES("142","Moldova","MD");
INSERT INTO master_countries VALUES("143","Monaco","MC");
INSERT INTO master_countries VALUES("144","Mongolia","MN");
INSERT INTO master_countries VALUES("145","Montserrat","MS");
INSERT INTO master_countries VALUES("146","Morocco","MA");
INSERT INTO master_countries VALUES("147","Mozambique","MZ");
INSERT INTO master_countries VALUES("148","Myanmar","MM");
INSERT INTO master_countries VALUES("149","Namibia","NA");
INSERT INTO master_countries VALUES("150","Nauru","NR");
INSERT INTO master_countries VALUES("151","Nepal","NP");
INSERT INTO master_countries VALUES("152","Netherlands","NL");
INSERT INTO master_countries VALUES("153","Netherlands Antilles","AN");
INSERT INTO master_countries VALUES("154","New Caledonia","NC");
INSERT INTO master_countries VALUES("155","New Zealand","NZ");
INSERT INTO master_countries VALUES("156","Nicaragua","NI");
INSERT INTO master_countries VALUES("157","Niger","NE");
INSERT INTO master_countries VALUES("158","Nigeria","NG");
INSERT INTO master_countries VALUES("159","Niue","NU");
INSERT INTO master_countries VALUES("160","Norfolk Island","NF");
INSERT INTO master_countries VALUES("161","Northern Mariana Islands","MP");
INSERT INTO master_countries VALUES("162","Norway","NO");
INSERT INTO master_countries VALUES("163","Oman","OM");
INSERT INTO master_countries VALUES("164","Pakistan","PK");
INSERT INTO master_countries VALUES("165","Palau","PW");
INSERT INTO master_countries VALUES("166","Palestinian Territories","PS");
INSERT INTO master_countries VALUES("167","Panama","PA");
INSERT INTO master_countries VALUES("168","Papua New Guinea","PG");
INSERT INTO master_countries VALUES("169","Paraguay","PY");
INSERT INTO master_countries VALUES("170","Peru","PE");
INSERT INTO master_countries VALUES("171","Philippines","PH");
INSERT INTO master_countries VALUES("172","Pitcairn","PN");
INSERT INTO master_countries VALUES("173","Poland","PL");
INSERT INTO master_countries VALUES("174","Portugal","PT");
INSERT INTO master_countries VALUES("175","Puerto Rico","PR");
INSERT INTO master_countries VALUES("176","Qatar","QA");
INSERT INTO master_countries VALUES("177","Reacute union","RE");
INSERT INTO master_countries VALUES("178","Romania","RO");
INSERT INTO master_countries VALUES("179","Russian Federation","RU");
INSERT INTO master_countries VALUES("180","Rwanda","RW");
INSERT INTO master_countries VALUES("181","Saint Helena","SH");
INSERT INTO master_countries VALUES("182","Saint Kitts and Nevis","KN");
INSERT INTO master_countries VALUES("183","Saint Lucia","LC");
INSERT INTO master_countries VALUES("184","Saint Pierre and Miquelon","PM");
INSERT INTO master_countries VALUES("185","Saint Vincent and the Grenadines","VC");
INSERT INTO master_countries VALUES("186","Samoa","WS");
INSERT INTO master_countries VALUES("187","San Marino","SM");
INSERT INTO master_countries VALUES("188","Sao Tome and Principe","ST");
INSERT INTO master_countries VALUES("189","Saudi Arabia","SA");
INSERT INTO master_countries VALUES("190","Senegal","SN");
INSERT INTO master_countries VALUES("191","Serbia and Montenegro","RS");
INSERT INTO master_countries VALUES("192","Seychelles","SC");
INSERT INTO master_countries VALUES("193","Sierra Leone","SL");
INSERT INTO master_countries VALUES("194","Singapore","SG");
INSERT INTO master_countries VALUES("195","Slovakia","SK");
INSERT INTO master_countries VALUES("196","Slovenia","SI");
INSERT INTO master_countries VALUES("197","Solomon Islands","SB");
INSERT INTO master_countries VALUES("198","Somalia","SO");
INSERT INTO master_countries VALUES("199","South Africa","ZA");
INSERT INTO master_countries VALUES("200","South Georgia and the South Sandwich Islands","GS");
INSERT INTO master_countries VALUES("201","Spain","ES");
INSERT INTO master_countries VALUES("202","Sri Lanka","LK");
INSERT INTO master_countries VALUES("203","Sudan","SD");
INSERT INTO master_countries VALUES("204","Suriname","SR");
INSERT INTO master_countries VALUES("205","Svalbard and Jan Mayen Islands","SJ");
INSERT INTO master_countries VALUES("206","Swaziland","SZ");
INSERT INTO master_countries VALUES("207","Sweden","SE");
INSERT INTO master_countries VALUES("208","Switzerland","CH");
INSERT INTO master_countries VALUES("209","Syria","SY");
INSERT INTO master_countries VALUES("210","Taiwan","TW");
INSERT INTO master_countries VALUES("211","Tajikistan","TJ");
INSERT INTO master_countries VALUES("212","Tanzania","TZ");
INSERT INTO master_countries VALUES("213","Thailand","TH");
INSERT INTO master_countries VALUES("214","Togo","TG");
INSERT INTO master_countries VALUES("215","Tokelau","TK");
INSERT INTO master_countries VALUES("216","Tonga","TO");
INSERT INTO master_countries VALUES("217","Trinidad and Tobago","TT");
INSERT INTO master_countries VALUES("218","Tunisia","TN");
INSERT INTO master_countries VALUES("219","Turkey","TR");
INSERT INTO master_countries VALUES("220","Turkmenistan","TM");
INSERT INTO master_countries VALUES("221","Turks and Caicos Islands","TC");
INSERT INTO master_countries VALUES("222","Tuvalu","TV");
INSERT INTO master_countries VALUES("223","Uganda","UG");
INSERT INTO master_countries VALUES("224","Ukraine","UA");
INSERT INTO master_countries VALUES("225","United Arab Emirates","AE");
INSERT INTO master_countries VALUES("226","United Kingdom","GB");
INSERT INTO master_countries VALUES("227","United States of America","US");
INSERT INTO master_countries VALUES("228","Uruguay","UY");
INSERT INTO master_countries VALUES("229","Uzbekistan","UZ");
INSERT INTO master_countries VALUES("230","Vanuatu","VU");
INSERT INTO master_countries VALUES("231","Vatican City(Holy See)","VA");
INSERT INTO master_countries VALUES("232","Venezuela","VE");
INSERT INTO master_countries VALUES("233","Vietnam","VN");
INSERT INTO master_countries VALUES("234","Virgin Islands (British)","VG");
INSERT INTO master_countries VALUES("235","Virgin Islands (US)","VI");
INSERT INTO master_countries VALUES("236","Wallis and Futuna Islands","WF");
INSERT INTO master_countries VALUES("237","Western Sahara","EH");
INSERT INTO master_countries VALUES("238","Yemen","YE");
INSERT INTO master_countries VALUES("239","Congo Democratic Republic","CD");
INSERT INTO master_countries VALUES("240","Zambia","ZM");
INSERT INTO master_countries VALUES("241","Zimbabwe","ZW");



DROP TABLE IF EXISTS master_locations;

CREATE TABLE `master_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `location_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4496 DEFAULT CHARSET=latin1;

INSERT INTO master_locations VALUES("1","226","Archway");
INSERT INTO master_locations VALUES("2","226","Bounds Green");
INSERT INTO master_locations VALUES("3","226","Bethnal Green");
INSERT INTO master_locations VALUES("4","226","Clapton");
INSERT INTO master_locations VALUES("5","226","Camden");
INSERT INTO master_locations VALUES("6","226","Camden Town");
INSERT INTO master_locations VALUES("7","226","Caledonia Road");
INSERT INTO master_locations VALUES("8","226","Dalston");
INSERT INTO master_locations VALUES("9","226","Edmonton");
INSERT INTO master_locations VALUES("10","226","Enfield");
INSERT INTO master_locations VALUES("11","226","Finsbury Park");
INSERT INTO master_locations VALUES("12","226","Hackney");
INSERT INTO master_locations VALUES("13","226","Hoxton");
INSERT INTO master_locations VALUES("14","226","Hornsey");
INSERT INTO master_locations VALUES("15","226","Homerton");
INSERT INTO master_locations VALUES("16","226","Haringey");
INSERT INTO master_locations VALUES("17","226","Highbury");
INSERT INTO master_locations VALUES("18","226","Holloway");
INSERT INTO master_locations VALUES("19","226","Islington");
INSERT INTO master_locations VALUES("20","226","Leyton");
INSERT INTO master_locations VALUES("21","226","Leytonstone");
INSERT INTO master_locations VALUES("22","226","Manor House");
INSERT INTO master_locations VALUES("23","226","Newington Green");
INSERT INTO master_locations VALUES("24","226","Ponders End");
INSERT INTO master_locations VALUES("25","226","Palmers Green");
INSERT INTO master_locations VALUES("26","226","Stoke Newington");
INSERT INTO master_locations VALUES("27","226","Shoreditch");
INSERT INTO master_locations VALUES("28","226","Seven Sisters");
INSERT INTO master_locations VALUES("29","226","Stamford Hill");
INSERT INTO master_locations VALUES("30","226","Tottenham");
INSERT INTO master_locations VALUES("31","226","Turnpike Lane");
INSERT INTO master_locations VALUES("32","226","Wood Green");
INSERT INTO master_locations VALUES("33","226","E2");
INSERT INTO master_locations VALUES("34","226","E5");
INSERT INTO master_locations VALUES("35","226","E8,E9");
INSERT INTO master_locations VALUES("36","226","N1");
INSERT INTO master_locations VALUES("37","226","N5");
INSERT INTO master_locations VALUES("38","226","N7");
INSERT INTO master_locations VALUES("39","226","N16");
INSERT INTO master_locations VALUES("40","226","Walthamstow");
INSERT INTO master_locations VALUES("41","226","Hackney Fields");
INSERT INTO master_locations VALUES("42","226","Barnet");
INSERT INTO master_locations VALUES("43","19","Dhaka");
INSERT INTO master_locations VALUES("44","19","Chittagong");
INSERT INTO master_locations VALUES("45","19","Sylhet");
INSERT INTO master_locations VALUES("46","19","Rajshahi");
INSERT INTO master_locations VALUES("47","227","New York");
INSERT INTO master_locations VALUES("48","227","Illinois");
INSERT INTO master_locations VALUES("49","227","Florida");
INSERT INTO master_locations VALUES("50","227","Kansas");
INSERT INTO master_locations VALUES("51","227","Kentucky");
INSERT INTO master_locations VALUES("52","227","California");
INSERT INTO master_locations VALUES("53","227","Pennsylvania");
INSERT INTO master_locations VALUES("54","227","Texas");
INSERT INTO master_locations VALUES("55","227","New Mexico");
INSERT INTO master_locations VALUES("56","227","South Dakota");
INSERT INTO master_locations VALUES("57","227","Georgia");
INSERT INTO master_locations VALUES("58","227","Michigan");
INSERT INTO master_locations VALUES("59","227","Massachusetts");
INSERT INTO master_locations VALUES("60","227","Louisiana");
INSERT INTO master_locations VALUES("61","227","Minnesota");
INSERT INTO master_locations VALUES("62","227","New Jersey");
INSERT INTO master_locations VALUES("63","227","North Carolina");
INSERT INTO master_locations VALUES("64","227","Oklahoma");
INSERT INTO master_locations VALUES("65","227","Maryland");
INSERT INTO master_locations VALUES("66","227","Colorado");
INSERT INTO master_locations VALUES("67","227","Nebraska");
INSERT INTO master_locations VALUES("68","227","New Hampshire");
INSERT INTO master_locations VALUES("69","227","Wyoming");
INSERT INTO master_locations VALUES("70","227","Arkansas");
INSERT INTO master_locations VALUES("71","227","Wisconsin");
INSERT INTO master_locations VALUES("72","227","Indiana");
INSERT INTO master_locations VALUES("73","227","South Carolina");
INSERT INTO master_locations VALUES("74","227","Iowa");
INSERT INTO master_locations VALUES("75","227","Alabama");
INSERT INTO master_locations VALUES("76","227","Missouri");
INSERT INTO master_locations VALUES("77","227","Virginia");
INSERT INTO master_locations VALUES("78","227","Ohio");
INSERT INTO master_locations VALUES("79","227","Washington");
INSERT INTO master_locations VALUES("80","227","Idaho");
INSERT INTO master_locations VALUES("81","227","Colorado (near Denver)");
INSERT INTO master_locations VALUES("82","227","Tennessee");
INSERT INTO master_locations VALUES("83","227","Oregon");
INSERT INTO master_locations VALUES("84","227","North Dakota");
INSERT INTO master_locations VALUES("85","227","Wisconsin near Appleton");
INSERT INTO master_locations VALUES("86","227","Maine");
INSERT INTO master_locations VALUES("87","227","near Asheville");
INSERT INTO master_locations VALUES("88","227","Arizona (near Tucson)");
INSERT INTO master_locations VALUES("89","227","Arizona");
INSERT INTO master_locations VALUES("90","227","Nevada");
INSERT INTO master_locations VALUES("91","227","Utah");
INSERT INTO master_locations VALUES("92","227","Connecticut (near Hartford)");
INSERT INTO master_locations VALUES("93","227","Connecticut");
INSERT INTO master_locations VALUES("94","227","Montana");
INSERT INTO master_locations VALUES("95","227","Rhode Island");
INSERT INTO master_locations VALUES("96","227","Mississippi");
INSERT INTO master_locations VALUES("97","227","West Virginia");
INSERT INTO master_locations VALUES("98","227","Texas (near Beaumont & Port Arthur)");
INSERT INTO master_locations VALUES("99","227","Vermont");
INSERT INTO master_locations VALUES("100","227","DC");
INSERT INTO master_locations VALUES("101","227","South Carolina (near Columbia)");
INSERT INTO master_locations VALUES("102","227","Ohio (near Canton)");
INSERT INTO master_locations VALUES("103","227","Illinois (Champaign-Urbana area)");
INSERT INTO master_locations VALUES("104","227","Illinois (near St. Louis, Missouri)");
INSERT INTO master_locations VALUES("105","227","Kentucky ");
INSERT INTO master_locations VALUES("106","227","Virginia ");
INSERT INTO master_locations VALUES("107","227","Delaware");
INSERT INTO master_locations VALUES("108","227","Michigan near Detroit");
INSERT INTO master_locations VALUES("109","227","Colorado (near Vail)");
INSERT INTO master_locations VALUES("110","227","New York (near Elmira & Corning)");
INSERT INTO master_locations VALUES("111","227","Pennsylvania (suburb of Pittsburgh)");
INSERT INTO master_locations VALUES("112","227","Maine converted to civilian use see KBXM");
INSERT INTO master_locations VALUES("113","227","FL");
INSERT INTO master_locations VALUES("114","227","Camp Pendleton");
INSERT INTO master_locations VALUES("115","1","Oruzgan");
INSERT INTO master_locations VALUES("116","104","Al Diwaniyah");
INSERT INTO master_locations VALUES("117","104","Babil");
INSERT INTO master_locations VALUES("118","104","Al Anbar");
INSERT INTO master_locations VALUES("119","104","Taji");
INSERT INTO master_locations VALUES("120","104","Camp Victory (BIAP)");
INSERT INTO master_locations VALUES("121","116","Camp Arifjan");
INSERT INTO master_locations VALUES("122","104","Mosul");
INSERT INTO master_locations VALUES("123","104","Baghdad");
INSERT INTO master_locations VALUES("124","1","FOB Salerno");
INSERT INTO master_locations VALUES("125","1","Balkh");
INSERT INTO master_locations VALUES("126","116","Ali Al Salem AB");
INSERT INTO master_locations VALUES("127","225","Abu Dhabi");
INSERT INTO master_locations VALUES("128","176","Doha");
INSERT INTO master_locations VALUES("129","1","Paktika");
INSERT INTO master_locations VALUES("130","1","Nangarhar");
INSERT INTO master_locations VALUES("131","104","Camp Fallujah");
INSERT INTO master_locations VALUES("132","104","Anbar");
INSERT INTO master_locations VALUES("133","104","Al-Anbar");
INSERT INTO master_locations VALUES("134","86","Crete");
INSERT INTO master_locations VALUES("135","107","Southern Italy");
INSERT INTO master_locations VALUES("136","107","Sicily");
INSERT INTO master_locations VALUES("137","100","Reykjanes");
INSERT INTO master_locations VALUES("138","104","Husaybah");
INSERT INTO master_locations VALUES("139","1","Ghazni");
INSERT INTO master_locations VALUES("140","1","Bagram");
INSERT INTO master_locations VALUES("141","109","Misawa");
INSERT INTO master_locations VALUES("142","109","Kanagawa");
INSERT INTO master_locations VALUES("143","104","Tal Afar");
INSERT INTO master_locations VALUES("144","104","Balad");
INSERT INTO master_locations VALUES("145","104","Kirkuk");
INSERT INTO master_locations VALUES("146","116","Camp Buehring");
INSERT INTO master_locations VALUES("147","178","Faurei");
INSERT INTO master_locations VALUES("148","197","Afutara");
INSERT INTO master_locations VALUES("149","197","Ulawa Island");
INSERT INTO master_locations VALUES("150","197","Malaita");
INSERT INTO master_locations VALUES("151","197","Barakoma");
INSERT INTO master_locations VALUES("152","197","Batuna");
INSERT INTO master_locations VALUES("153","197","Geva");
INSERT INTO master_locations VALUES("154","197","Auki");
INSERT INTO master_locations VALUES("155","197","Bellona/Anua");
INSERT INTO master_locations VALUES("156","197","Taro Island");
INSERT INTO master_locations VALUES("157","197","Mbambanakira");
INSERT INTO master_locations VALUES("158","197","Shortland Island");
INSERT INTO master_locations VALUES("159","197","Santa Isabel Island");
INSERT INTO master_locations VALUES("160","197","Guadalcanal");
INSERT INTO master_locations VALUES("161","197","Babanakira");
INSERT INTO master_locations VALUES("162","197","Avu Avu");
INSERT INTO master_locations VALUES("163","197","Kirakira");
INSERT INTO master_locations VALUES("164","197","Santa Cruz Island");
INSERT INTO master_locations VALUES("165","197","New Georgia Island");
INSERT INTO master_locations VALUES("166","197","Gizo Island");
INSERT INTO master_locations VALUES("167","197","Mono Island");
INSERT INTO master_locations VALUES("168","197","Marau Sound");
INSERT INTO master_locations VALUES("169","197","Ontong Java");
INSERT INTO master_locations VALUES("170","197","Rennell Island");
INSERT INTO master_locations VALUES("171","197","Seghe");
INSERT INTO master_locations VALUES("172","197","Santa Ana");
INSERT INTO master_locations VALUES("173","197","Marau");
INSERT INTO master_locations VALUES("174","197","Suavanao");
INSERT INTO master_locations VALUES("175","197","Yandina");
INSERT INTO master_locations VALUES("176","197","Isuna");
INSERT INTO master_locations VALUES("177","197","Kaghau");
INSERT INTO master_locations VALUES("178","197","Kukudu");
INSERT INTO master_locations VALUES("179","197","Gatokae");
INSERT INTO master_locations VALUES("180","197","Ringi Cove");
INSERT INTO master_locations VALUES("181","197","Ramata");
INSERT INTO master_locations VALUES("182","150","Yaren");
INSERT INTO master_locations VALUES("183","168","Buka");
INSERT INTO master_locations VALUES("184","168","Kundiawa");
INSERT INTO master_locations VALUES("185","168","Daru");
INSERT INTO master_locations VALUES("186","168","Alotau");
INSERT INTO master_locations VALUES("187","168","Popondetta");
INSERT INTO master_locations VALUES("188","168","Hoskins");
INSERT INTO master_locations VALUES("189","197","Kiriwini");
INSERT INTO master_locations VALUES("190","168","Kiunga");
INSERT INTO master_locations VALUES("191","168","Kikori");
INSERT INTO master_locations VALUES("192","168","Kerema");
INSERT INTO master_locations VALUES("193","168","Kieta");
INSERT INTO master_locations VALUES("194","168","Kavieng");
INSERT INTO master_locations VALUES("195","168","Kunaye");
INSERT INTO master_locations VALUES("196","168","Lae");
INSERT INTO master_locations VALUES("197","168","Madang");
INSERT INTO master_locations VALUES("198","168","Mount Hagen");
INSERT INTO master_locations VALUES("199","168","Mendi");
INSERT INTO master_locations VALUES("200","168","Manus Island");
INSERT INTO master_locations VALUES("201","168","Moro");
INSERT INTO master_locations VALUES("202","168","Misima");
INSERT INTO master_locations VALUES("203","168","Lae / Nadzab");
INSERT INTO master_locations VALUES("204","168","Port Moresby");
INSERT INTO master_locations VALUES("205","168","New Britain");
INSERT INTO master_locations VALUES("206","168","Tari");
INSERT INTO master_locations VALUES("207","168","Tabubil");
INSERT INTO master_locations VALUES("208","168","Rabaul / Tokua");
INSERT INTO master_locations VALUES("209","168","Vanimo");
INSERT INTO master_locations VALUES("210","168","Wapenamanda");
INSERT INTO master_locations VALUES("211","168","Wewak");
INSERT INTO master_locations VALUES("212","87","Aasiaat");
INSERT INTO master_locations VALUES("213","87","Qaasuitsup");
INSERT INTO master_locations VALUES("214","87","Akunnaaq");
INSERT INTO master_locations VALUES("215","87","Tasiilaq");
INSERT INTO master_locations VALUES("216","87","Alluitsup Paa");
INSERT INTO master_locations VALUES("217","87","Kujalleq");
INSERT INTO master_locations VALUES("218","87","Arsuk");
INSERT INTO master_locations VALUES("219","87","Ammassivik");
INSERT INTO master_locations VALUES("220","87","Attu");
INSERT INTO master_locations VALUES("221","87","Narsarsuaq");
INSERT INTO master_locations VALUES("222","87","Qasigiannguit");
INSERT INTO master_locations VALUES("223","87","Jameson Land");
INSERT INTO master_locations VALUES("224","87","Eqalugaarsuit");
INSERT INTO master_locations VALUES("225","87","Narsaq Kujalleq");
INSERT INTO master_locations VALUES("226","87","Kangilinnguit (Gronnedal)");
INSERT INTO master_locations VALUES("227","87","Nuuk (Godthab )");
INSERT INTO master_locations VALUES("228","87","Qeqertarsuaq (Godhavn)");
INSERT INTO master_locations VALUES("229","87","Ikerasak");
INSERT INTO master_locations VALUES("230","87","Iginniarfik");
INSERT INTO master_locations VALUES("231","87","Ikerasaarsuk");
INSERT INTO master_locations VALUES("232","87","Ilimanaq");
INSERT INTO master_locations VALUES("233","87","Innarsuit");
INSERT INTO master_locations VALUES("234","87","Isortoq");
INSERT INTO master_locations VALUES("235","87","Ikamiut");
INSERT INTO master_locations VALUES("236","87","Qaqortoq (Julianehab)");
INSERT INTO master_locations VALUES("237","87","Ilulissat (Jakobshavn)");
INSERT INTO master_locations VALUES("238","87","Kangaatsiaq");
INSERT INTO master_locations VALUES("239","87","Kulusuk");
INSERT INTO master_locations VALUES("240","87","Upernavik Kujalleq");
INSERT INTO master_locations VALUES("241","87","Kuummiit");
INSERT INTO master_locations VALUES("242","87","Kullorsuaq");
INSERT INTO master_locations VALUES("243","87","Kangersuatsiaq");
INSERT INTO master_locations VALUES("244","87","Kitsissuarsuit");
INSERT INTO master_locations VALUES("245","87","Illorsuit");
INSERT INTO master_locations VALUES("246","87","Moriusaq");
INSERT INTO master_locations VALUES("247","87","Maniitsoq (Sukkertoppen)");
INSERT INTO master_locations VALUES("248","87","Niaqornaarsuk");
INSERT INTO master_locations VALUES("249","87","Nalunaq");
INSERT INTO master_locations VALUES("250","87","Nanortalik");
INSERT INTO master_locations VALUES("251","87","Nuugaatsiaq");
INSERT INTO master_locations VALUES("252","87","Narsaq");
INSERT INTO master_locations VALUES("253","87","Niaqornat");
INSERT INTO master_locations VALUES("254","87","Nuussuaq");
INSERT INTO master_locations VALUES("255","87","Paamiut (Frederikshab)");
INSERT INTO master_locations VALUES("256","87","Qeqertaq");
INSERT INTO master_locations VALUES("257","87","Qaanaaq");
INSERT INTO master_locations VALUES("258","87","Qassimiut");
INSERT INTO master_locations VALUES("259","87","Ittoqqortoormiit (Scoresbysund)");
INSERT INTO master_locations VALUES("260","87","Kangerlussuaq (Sondre Stromfjord)");
INSERT INTO master_locations VALUES("261","87","Sermiligaaq");
INSERT INTO master_locations VALUES("262","87","Siorapaluk");
INSERT INTO master_locations VALUES("263","87","Saqqaq");
INSERT INTO master_locations VALUES("264","87","Sisimiut (Holsteinsborg)");
INSERT INTO master_locations VALUES("265","87","Saattut");
INSERT INTO master_locations VALUES("266","87","Savissivik");
INSERT INTO master_locations VALUES("267","87","Tiniteqilaaq");
INSERT INTO master_locations VALUES("268","87","Upernavik");
INSERT INTO master_locations VALUES("269","87","Uummannaq");
INSERT INTO master_locations VALUES("270","87","Qaarsut");
INSERT INTO master_locations VALUES("271","87","Ukkusissat");
INSERT INTO master_locations VALUES("272","100","Akureyri");
INSERT INTO master_locations VALUES("273","100","Bakki");
INSERT INTO master_locations VALUES("274","100","Bildudalur");
INSERT INTO master_locations VALUES("275","100"," Bakkafjorour");
INSERT INTO master_locations VALUES("276","100","Blonduos");
INSERT INTO master_locations VALUES("277","100","Djupivogur");
INSERT INTO master_locations VALUES("278","100","Egilsstair");
INSERT INTO master_locations VALUES("279","100","Gjogur ");
INSERT INTO master_locations VALUES("280","100","Grimsey");
INSERT INTO master_locations VALUES("281","100","Hornafjordur");
INSERT INTO master_locations VALUES("282","100","Husavik ");
INSERT INTO master_locations VALUES("283","100","Isafjorour");
INSERT INTO master_locations VALUES("284","100","Keflavik");
INSERT INTO master_locations VALUES("285","100","Kopasker");
INSERT INTO master_locations VALUES("286","100"," Sauoarkrokur");
INSERT INTO master_locations VALUES("287","100","Nordfjordur");
INSERT INTO master_locations VALUES("288","100","Patreksfjorour");
INSERT INTO master_locations VALUES("289","100","Olafsvik");
INSERT INTO master_locations VALUES("290","100","Raufarhofn");
INSERT INTO master_locations VALUES("291","100","Reykjavik");
INSERT INTO master_locations VALUES("292","100","Selfoss");
INSERT INTO master_locations VALUES("293","100","Siglufjorour");
INSERT INTO master_locations VALUES("294","100","Stykkisholmur ");
INSERT INTO master_locations VALUES("295","100"," Thingeyri ( Singeyri )");
INSERT INTO master_locations VALUES("296","100","Torshofn");
INSERT INTO master_locations VALUES("297","100","Vestmannaeyjar");
INSERT INTO master_locations VALUES("298","100"," Vopnafjorour");
INSERT INTO master_locations VALUES("299","191","Pristina");
INSERT INTO master_locations VALUES("300","39","Ontario");
INSERT INTO master_locations VALUES("301","39","Quebec");
INSERT INTO master_locations VALUES("302","39","British Columbia");
INSERT INTO master_locations VALUES("303","39","Nova Scotia");
INSERT INTO master_locations VALUES("304","39","Manitoba");
INSERT INTO master_locations VALUES("305","39","Newfoundland and Labrador");
INSERT INTO master_locations VALUES("306","39","Alberta");
INSERT INTO master_locations VALUES("307","39","Nunavut");
INSERT INTO master_locations VALUES("308","39","Saskatchewan");
INSERT INTO master_locations VALUES("309","39","New Brunswick");
INSERT INTO master_locations VALUES("310","39","Yukon");
INSERT INTO master_locations VALUES("311","39","Northwest Territories");
INSERT INTO master_locations VALUES("312","39","Prince Edward Island");
INSERT INTO master_locations VALUES("313","4","Blida");
INSERT INTO master_locations VALUES("314","4","Bejaia");
INSERT INTO master_locations VALUES("315","4","Algiers");
INSERT INTO master_locations VALUES("316","4","Djanet");
INSERT INTO master_locations VALUES("317","4","Boufarik");
INSERT INTO master_locations VALUES("318","4","Illizi");
INSERT INTO master_locations VALUES("319","4","Setif");
INSERT INTO master_locations VALUES("320","4","Tamanrasset");
INSERT INTO master_locations VALUES("321","4","Jijel");
INSERT INTO master_locations VALUES("322","4","Mecheria");
INSERT INTO master_locations VALUES("323","4","Relizane");
INSERT INTO master_locations VALUES("324","4","Annaba");
INSERT INTO master_locations VALUES("325","4","Constantine");
INSERT INTO master_locations VALUES("326","4","Skikda");
INSERT INTO master_locations VALUES("327","4","Tebessa");
INSERT INTO master_locations VALUES("328","4","Batna");
INSERT INTO master_locations VALUES("329","4","Hassi R\\\'Mel");
INSERT INTO master_locations VALUES("330","4","Djelfa");
INSERT INTO master_locations VALUES("331","4","Tiaret");
INSERT INTO master_locations VALUES("332","39","Tindouf");
INSERT INTO master_locations VALUES("333","39","Chlef");
INSERT INTO master_locations VALUES("334","39","Oran");
INSERT INTO master_locations VALUES("335","39","Tlemcen");
INSERT INTO master_locations VALUES("336","4","Bechar");
INSERT INTO master_locations VALUES("337","4","Ghriss");
INSERT INTO master_locations VALUES("338","4","In Guezzam");
INSERT INTO master_locations VALUES("339","4","Bordj Mokhtar");
INSERT INTO master_locations VALUES("340","4","Adrar");
INSERT INTO master_locations VALUES("341","4","Biskra");
INSERT INTO master_locations VALUES("342","4","El Golea");
INSERT INTO master_locations VALUES("343","4","Ghardaia");
INSERT INTO master_locations VALUES("344","4","Hassi Messaoud");
INSERT INTO master_locations VALUES("345","4","In Salah");
INSERT INTO master_locations VALUES("346","4","Touggourt");
INSERT INTO master_locations VALUES("347","4","Laghouat");
INSERT INTO master_locations VALUES("348","4","El Oued");
INSERT INTO master_locations VALUES("349","4","Timimoun");
INSERT INTO master_locations VALUES("350","4","Ouargla");
INSERT INTO master_locations VALUES("351","4","In Amenas");
INSERT INTO master_locations VALUES("352","24","Cotonou");
INSERT INTO master_locations VALUES("353","24","Bohicon");
INSERT INTO master_locations VALUES("354","24","Djougou");
INSERT INTO master_locations VALUES("355","24","Kandi");
INSERT INTO master_locations VALUES("356","24","Natitingou");
INSERT INTO master_locations VALUES("357","24","Porga");
INSERT INTO master_locations VALUES("358","24","Parakou");
INSERT INTO master_locations VALUES("359","24","Bembereke");
INSERT INTO master_locations VALUES("360","24","Save");
INSERT INTO master_locations VALUES("361","35","Kaya");
INSERT INTO master_locations VALUES("362","35","Ouahigouya");
INSERT INTO master_locations VALUES("363","35","Djibo");
INSERT INTO master_locations VALUES("364","35","Leo");
INSERT INTO master_locations VALUES("365","35","Boulsa");
INSERT INTO master_locations VALUES("366","35","Bogande");
INSERT INTO master_locations VALUES("367","35","Diapaga");
INSERT INTO master_locations VALUES("368","35","Dori");
INSERT INTO master_locations VALUES("369","35","Fada N\\\'gourma");
INSERT INTO master_locations VALUES("370","35","Gorom Gorom");
INSERT INTO master_locations VALUES("371","35","Kantchari");
INSERT INTO master_locations VALUES("372","35","Tambao");
INSERT INTO master_locations VALUES("373","35","Pama");
INSERT INTO master_locations VALUES("374","35","Sebba");
INSERT INTO master_locations VALUES("375","35","Tenkodogo");
INSERT INTO master_locations VALUES("376","35","Zabre");
INSERT INTO master_locations VALUES("377","35","Ouagadougou");
INSERT INTO master_locations VALUES("378","35","Banfora");
INSERT INTO master_locations VALUES("379","35","Dedougou");
INSERT INTO master_locations VALUES("380","35","Nouna");
INSERT INTO master_locations VALUES("381","35","Bobo Dioulasso");
INSERT INTO master_locations VALUES("382","35","Tougan");
INSERT INTO master_locations VALUES("383","35","Diebougou");
INSERT INTO master_locations VALUES("384","35","Aribinda");
INSERT INTO master_locations VALUES("385","84","Accra");
INSERT INTO master_locations VALUES("386","84","Tamale");
INSERT INTO master_locations VALUES("387","84","Navrongo");
INSERT INTO master_locations VALUES("388","84","Wa");
INSERT INTO master_locations VALUES("389","84","Yendi");
INSERT INTO master_locations VALUES("390","84","Kumasi");
INSERT INTO master_locations VALUES("391","84","Sunyani");
INSERT INTO master_locations VALUES("392","84","Takoradi");
INSERT INTO master_locations VALUES("393","55","Aboisso");
INSERT INTO master_locations VALUES("394","55","Abidjan");
INSERT INTO master_locations VALUES("395","55","Abengourou");
INSERT INTO master_locations VALUES("396","55","Boundiali");
INSERT INTO master_locations VALUES("397","55","Bouake");
INSERT INTO master_locations VALUES("398","55","Bouna");
INSERT INTO master_locations VALUES("399","55","Bondoukou");
INSERT INTO master_locations VALUES("400","55","Dimbokro");
INSERT INTO master_locations VALUES("401","55","Daloa");
INSERT INTO master_locations VALUES("402","55","Divo");
INSERT INTO master_locations VALUES("403","55","Ferkessedougou");
INSERT INTO master_locations VALUES("404","55","Gagnoa");
INSERT INTO master_locations VALUES("405","55","Guiglo");
INSERT INTO master_locations VALUES("406","55","Korhogo");
INSERT INTO master_locations VALUES("407","55","Man");
INSERT INTO master_locations VALUES("408","55","Odienne");
INSERT INTO master_locations VALUES("409","55","Ouango Fitini");
INSERT INTO master_locations VALUES("410","55","Seguela");
INSERT INTO master_locations VALUES("411","55","San Pedro");
INSERT INTO master_locations VALUES("412","55","Sassandra");
INSERT INTO master_locations VALUES("413","55","Tabou");
INSERT INTO master_locations VALUES("414","55","Touba");
INSERT INTO master_locations VALUES("415","55","Yamoussoukro");
INSERT INTO master_locations VALUES("416","158","FCT");
INSERT INTO master_locations VALUES("417","158","Dogondoutchi");
INSERT INTO master_locations VALUES("418","158","Dosso");
INSERT INTO master_locations VALUES("419","158","Tra");
INSERT INTO master_locations VALUES("420","158","Gaya");
INSERT INTO master_locations VALUES("421","158","Tillabery");
INSERT INTO master_locations VALUES("422","158","Maradi");
INSERT INTO master_locations VALUES("423","158","Niamey");
INSERT INTO master_locations VALUES("424","158","La Tapoa");
INSERT INTO master_locations VALUES("425","158","Tahoua");
INSERT INTO master_locations VALUES("426","158","Ouallam");
INSERT INTO master_locations VALUES("427","158","Agades South");
INSERT INTO master_locations VALUES("428","158","Dirkou");
INSERT INTO master_locations VALUES("429","158","Diffa");
INSERT INTO master_locations VALUES("430","158","Goure");
INSERT INTO master_locations VALUES("431","158","Iferouane");
INSERT INTO master_locations VALUES("432","158","Arlit");
INSERT INTO master_locations VALUES("433","158","Maine-Soroa");
INSERT INTO master_locations VALUES("434","158","Zinder");
INSERT INTO master_locations VALUES("435","218","Tabarka");
INSERT INTO master_locations VALUES("436","218","Monastir");
INSERT INTO master_locations VALUES("437","218","Tunis");
INSERT INTO master_locations VALUES("438","218","Bizerte");
INSERT INTO master_locations VALUES("439","218","Gafsa");
INSERT INTO master_locations VALUES("440","218","Gabes");
INSERT INTO master_locations VALUES("441","218","Djerba");
INSERT INTO master_locations VALUES("442","218","Sfax");
INSERT INTO master_locations VALUES("443","218","Tozeur");
INSERT INTO master_locations VALUES("444","218","Enfidha");
INSERT INTO master_locations VALUES("445","214","Atakpame");
INSERT INTO master_locations VALUES("446","214","Dapaong");
INSERT INTO master_locations VALUES("447","214","Anie");
INSERT INTO master_locations VALUES("448","214","Sansanne-Mango");
INSERT INTO master_locations VALUES("449","214","Niamtougou");
INSERT INTO master_locations VALUES("450","214","Sokode");
INSERT INTO master_locations VALUES("451","214","Lome");
INSERT INTO master_locations VALUES("452","22","Amougies");
INSERT INTO master_locations VALUES("453","22","Antwerp / Deurne");
INSERT INTO master_locations VALUES("454","22","Beauvechain");
INSERT INTO master_locations VALUES("455","22","Kleine Brogel");
INSERT INTO master_locations VALUES("456","22","Brussels / Zaventem");
INSERT INTO master_locations VALUES("457","22","Brasschaat");
INSERT INTO master_locations VALUES("458","22","Bertrix");
INSERT INTO master_locations VALUES("459","22","Thy Ulmodrome");
INSERT INTO master_locations VALUES("460","22","Buzet Ulmodrome");
INSERT INTO master_locations VALUES("461","22","Charleroi");
INSERT INTO master_locations VALUES("462","22","Cerfontaine");
INSERT INTO master_locations VALUES("463","22","Chievres");
INSERT INTO master_locations VALUES("464","22","Diest");
INSERT INTO master_locations VALUES("465","22","Koksijde");
INSERT INTO master_locations VALUES("466","22","Florennes");
INSERT INTO master_locations VALUES("467","22","Grimbergen");
INSERT INTO master_locations VALUES("468","22","Hoevenen");
INSERT INTO master_locations VALUES("469","22","Balen-Keiheuvel");
INSERT INTO master_locations VALUES("470","22","Kortrijk / Wevelgem");
INSERT INTO master_locations VALUES("471","22","Liege");
INSERT INTO master_locations VALUES("472","22","Leopoldsburg");
INSERT INTO master_locations VALUES("473","22","Brussels");
INSERT INTO master_locations VALUES("474","22","Namur");
INSERT INTO master_locations VALUES("475","22","Ostend");
INSERT INTO master_locations VALUES("476","22","Saint-Ghislain");
INSERT INTO master_locations VALUES("477","22","Saint-Hubert");
INSERT INTO master_locations VALUES("478","22","Zutendaal");
INSERT INTO master_locations VALUES("479","22","Spa");
INSERT INTO master_locations VALUES("480","22","Sint-Truiden");
INSERT INTO master_locations VALUES("481","22","Goetsenhoven");
INSERT INTO master_locations VALUES("482","22","Theux");
INSERT INTO master_locations VALUES("483","22","Tournai");
INSERT INTO master_locations VALUES("484","22","Ursel");
INSERT INTO master_locations VALUES("485","22","Weelde");
INSERT INTO master_locations VALUES("486","22","Hasselt");
INSERT INTO master_locations VALUES("487","22","Zoersel / Oostmalle");
INSERT INTO master_locations VALUES("488","22","Genk");
INSERT INTO master_locations VALUES("489","83","Altenburg/Leipzig");
INSERT INTO master_locations VALUES("490","83","Dessau");
INSERT INTO master_locations VALUES("491","83","Cottbus");
INSERT INTO master_locations VALUES("492","83","Finow");
INSERT INTO master_locations VALUES("493","83","Rechlin");
INSERT INTO master_locations VALUES("494","83","Magdeburg");
INSERT INTO master_locations VALUES("495","83","Bautzen");
INSERT INTO master_locations VALUES("496","83","Berlin");
INSERT INTO master_locations VALUES("497","83","Dresden");
INSERT INTO master_locations VALUES("498","83","Erfurt");
INSERT INTO master_locations VALUES("499","83","Frankfurt am Main");
INSERT INTO master_locations VALUES("500","83","Greven");
INSERT INTO master_locations VALUES("501","83","Hamburg");
INSERT INTO master_locations VALUES("502","83","Cologne/Bonn");
INSERT INTO master_locations VALUES("503","83","Dusseldorf");
INSERT INTO master_locations VALUES("504","83","Munich");
INSERT INTO master_locations VALUES("505","83","Nuremberg");
INSERT INTO master_locations VALUES("506","83","Leipzig/Halle");
INSERT INTO master_locations VALUES("507","83","Saarbrucken");
INSERT INTO master_locations VALUES("508","83","Stuttgart");
INSERT INTO master_locations VALUES("509","83","Hanover");
INSERT INTO master_locations VALUES("510","83","Bremen");
INSERT INTO master_locations VALUES("511","83","Reichelsheim");
INSERT INTO master_locations VALUES("512","83","Rhineland-Palatinate");
INSERT INTO master_locations VALUES("513","83","Mannheim");
INSERT INTO master_locations VALUES("514","83","Waldeck-Frankenberg");
INSERT INTO master_locations VALUES("515","83","Mainz");
INSERT INTO master_locations VALUES("516","83","Horselberg-Hainich");
INSERT INTO master_locations VALUES("517","83","Oedheim");
INSERT INTO master_locations VALUES("518","83","Oppenheim");
INSERT INTO master_locations VALUES("519","83","Burbach");
INSERT INTO master_locations VALUES("520","83","Walldorf (Baden)");
INSERT INTO master_locations VALUES("521","83","Heist");
INSERT INTO master_locations VALUES("522","83","Kiel");
INSERT INTO master_locations VALUES("523","83","Lubeck");
INSERT INTO master_locations VALUES("524","83","Heidelberg");
INSERT INTO master_locations VALUES("525","83","Memmingen");
INSERT INTO master_locations VALUES("526","83","Aachen");
INSERT INTO master_locations VALUES("527","83","Sankt Augustin");
INSERT INTO master_locations VALUES("528","83","Leverkusen");
INSERT INTO master_locations VALUES("529","83","Finnentrop");
INSERT INTO master_locations VALUES("530","83","Dahlem");
INSERT INTO master_locations VALUES("531","83","Wesel");
INSERT INTO master_locations VALUES("532","83","Goch");
INSERT INTO master_locations VALUES("533","83","Krefeld");
INSERT INTO master_locations VALUES("534","83","Monchengladbach");
INSERT INTO master_locations VALUES("535","83","Paderborn / Lippstadt");
INSERT INTO master_locations VALUES("536","83","Paderborn");
INSERT INTO master_locations VALUES("537","83","Stadtlohn");
INSERT INTO master_locations VALUES("538","83","Weeze");
INSERT INTO master_locations VALUES("539","83","Dortmund");
INSERT INTO master_locations VALUES("540","83","Pfarrkirchen");
INSERT INTO master_locations VALUES("541","83","Oberpfaffenhofen");
INSERT INTO master_locations VALUES("542","83","Friedrichshafen");
INSERT INTO master_locations VALUES("543","83","Augsburg");
INSERT INTO master_locations VALUES("544","83","Genderkingen");
INSERT INTO master_locations VALUES("545","83","Straubing");
INSERT INTO master_locations VALUES("546","83","Flugplatz Tannheim");
INSERT INTO master_locations VALUES("547","83","Vilshofen");
INSERT INTO master_locations VALUES("548","83","Lsse");
INSERT INTO master_locations VALUES("549","83","Parchim");
INSERT INTO master_locations VALUES("550","83","Coburg");
INSERT INTO master_locations VALUES("551","83","Bayreuth");
INSERT INTO master_locations VALUES("552","83","Burg Feuerstein");
INSERT INTO master_locations VALUES("553","83","Giebelstadt");
INSERT INTO master_locations VALUES("554","83","Hof/Plauen");
INSERT INTO master_locations VALUES("555","83","Bitburg");
INSERT INTO master_locations VALUES("556","83","Linkenheim-Hochstetten");
INSERT INTO master_locations VALUES("557","83","Mosel");
INSERT INTO master_locations VALUES("558","83","Trier");
INSERT INTO master_locations VALUES("559","83","Speyer");
INSERT INTO master_locations VALUES("560","83","Zweibrucken");
INSERT INTO master_locations VALUES("561","83","Baden-Baden");
INSERT INTO master_locations VALUES("562","83","Donaueschingen");
INSERT INTO master_locations VALUES("563","83","Freiburg");
INSERT INTO master_locations VALUES("564","83","Bremgarten");
INSERT INTO master_locations VALUES("565","83","Lahr");
INSERT INTO master_locations VALUES("566","83","Mengen");
INSERT INTO master_locations VALUES("567","83","Pattonville");
INSERT INTO master_locations VALUES("568","83","Schwabisch Hall");
INSERT INTO master_locations VALUES("569","83","Kassel");
INSERT INTO master_locations VALUES("570","83","Bremerhaven");
INSERT INTO master_locations VALUES("571","83","Damme");
INSERT INTO master_locations VALUES("572","83","Wilhelmshaven-Mariensiel");
INSERT INTO master_locations VALUES("573","83","Heide");
INSERT INTO master_locations VALUES("574","83","Heligoland");
INSERT INTO master_locations VALUES("575","83","St. Michaelisdonn");
INSERT INTO master_locations VALUES("576","83","Sylt");
INSERT INTO master_locations VALUES("577","83","Spangdahlem");
INSERT INTO master_locations VALUES("578","83","Ramstein");
INSERT INTO master_locations VALUES("579","83","Bamberg");
INSERT INTO master_locations VALUES("580","83","Altenstadt");
INSERT INTO master_locations VALUES("581","83","Buckeburg");
INSERT INTO master_locations VALUES("582","83","Celle");
INSERT INTO master_locations VALUES("583","83","Rheine");
INSERT INTO master_locations VALUES("584","83","Fritzlar");
INSERT INTO master_locations VALUES("585","83","Laupheim");
INSERT INTO master_locations VALUES("586","83","Niedermendig");
INSERT INTO master_locations VALUES("587","83","Roth");
INSERT INTO master_locations VALUES("588","83","Fassberg");
INSERT INTO master_locations VALUES("589","83","Nordholz");
INSERT INTO master_locations VALUES("590","83","Diepholz");
INSERT INTO master_locations VALUES("591","83","Geilenkirchen");
INSERT INTO master_locations VALUES("592","83","Hohn");
INSERT INTO master_locations VALUES("593","83","Schortens");
INSERT INTO master_locations VALUES("594","83","Rostock");
INSERT INTO master_locations VALUES("595","83","Norvenich");
INSERT INTO master_locations VALUES("596","83","Schleswig");
INSERT INTO master_locations VALUES("597","83","Wittmund");
INSERT INTO master_locations VALUES("598","83","Neubrandenburg");
INSERT INTO master_locations VALUES("599","83","Wunstorf");
INSERT INTO master_locations VALUES("600","83","Wiesbaden");
INSERT INTO master_locations VALUES("601","83","Landsberg am Lech");
INSERT INTO master_locations VALUES("602","83","Buchel / Cochem");
INSERT INTO master_locations VALUES("603","83","Erding");
INSERT INTO master_locations VALUES("604","83","Furstenfeldbruck");
INSERT INTO master_locations VALUES("605","83","Jessen (Elster)");
INSERT INTO master_locations VALUES("606","83","Ingolstadt");
INSERT INTO master_locations VALUES("607","83","Lechfeld");
INSERT INTO master_locations VALUES("608","83","Weeze ");
INSERT INTO master_locations VALUES("609","83","Gutersloh ");
INSERT INTO master_locations VALUES("610","83","Bruggen ");
INSERT INTO master_locations VALUES("611","83","Meppen");
INSERT INTO master_locations VALUES("612","70","Tallinn");
INSERT INTO master_locations VALUES("613","70","Omari");
INSERT INTO master_locations VALUES("614","70","Hiiumaa");
INSERT INTO master_locations VALUES("615","70","Saaremaa");
INSERT INTO master_locations VALUES("616","70","Kihnu");
INSERT INTO master_locations VALUES("617","70","Nurmsi");
INSERT INTO master_locations VALUES("618","70","Narva");
INSERT INTO master_locations VALUES("619","70","Parnu");
INSERT INTO master_locations VALUES("620","70","Rapla");
INSERT INTO master_locations VALUES("621","70","Ridali");
INSERT INTO master_locations VALUES("622","70","Ruhnu");
INSERT INTO master_locations VALUES("623","70","Tapa");
INSERT INTO master_locations VALUES("624","70","Tartu");
INSERT INTO master_locations VALUES("625","70","Viljandi");
INSERT INTO master_locations VALUES("626","75","Ahmosuo");
INSERT INTO master_locations VALUES("627","75","Alavus");
INSERT INTO master_locations VALUES("628","75","Enontekio");
INSERT INTO master_locations VALUES("629","75","Eura");
INSERT INTO master_locations VALUES("630","75","Forssa");
INSERT INTO master_locations VALUES("631","75","Kuorevesi");
INSERT INTO master_locations VALUES("632","75","Helsinki");
INSERT INTO master_locations VALUES("633","75","Vantaa");
INSERT INTO master_locations VALUES("634","75"," Hameenkyro");
INSERT INTO master_locations VALUES("635","75","Hanko ");
INSERT INTO master_locations VALUES("636","75","Hyvinkaa");
INSERT INTO master_locations VALUES("637","75","Kiikala");
INSERT INTO master_locations VALUES("638","75","Seinajoki / Ilmajoki");
INSERT INTO master_locations VALUES("639","75","Immola");
INSERT INTO master_locations VALUES("640","75","Kitee");
INSERT INTO master_locations VALUES("641","75","Ivalo / Inari");
INSERT INTO master_locations VALUES("642","75","Jamijarvi");
INSERT INTO master_locations VALUES("643","75","Joensuu / Liperi");
INSERT INTO master_locations VALUES("644","75","Jyvaskylan maalaiskunta");
INSERT INTO master_locations VALUES("645","75","Kauhava");
INSERT INTO master_locations VALUES("646","75","Kemi / Tornio");
INSERT INTO master_locations VALUES("647","75","Kajaani");
INSERT INTO master_locations VALUES("648","75","Kauhajoki");
INSERT INTO master_locations VALUES("649","75","Kronoby");
INSERT INTO master_locations VALUES("650","75","Kemijarvi");
INSERT INTO master_locations VALUES("651","75","Kalajoki");
INSERT INTO master_locations VALUES("652","75","Kuusamo");
INSERT INTO master_locations VALUES("653","75"," Kittila");
INSERT INTO master_locations VALUES("654","75","Kuopio / Siilinjarvi");
INSERT INTO master_locations VALUES("655","75","Kivijarvi");
INSERT INTO master_locations VALUES("656","75","Kymi");
INSERT INTO master_locations VALUES("657","75","Lahti");
INSERT INTO master_locations VALUES("658","75","Lappeenranta");
INSERT INTO master_locations VALUES("659","75","Mariehamn");
INSERT INTO master_locations VALUES("660","75","Menkijarvi");
INSERT INTO master_locations VALUES("661","75","Mikkeli");
INSERT INTO master_locations VALUES("662","75","Nummela");
INSERT INTO master_locations VALUES("663","75","Oulunsalo");
INSERT INTO master_locations VALUES("664","75","Piikajarvi");
INSERT INTO master_locations VALUES("665","75","Pieksamaki");
INSERT INTO master_locations VALUES("666","75","Pori");
INSERT INTO master_locations VALUES("667","75","Pudasjarvi");
INSERT INTO master_locations VALUES("668","75","Pyhiisalmi");
INSERT INTO master_locations VALUES("669","75","Raahe");
INSERT INTO master_locations VALUES("670","75","Rantasalmi");
INSERT INTO master_locations VALUES("671","75","Rovaniemi");
INSERT INTO master_locations VALUES("672","75","Ranua");
INSERT INTO master_locations VALUES("673","75","Kiuruvesi");
INSERT INTO master_locations VALUES("674","75","Rayskala");
INSERT INTO master_locations VALUES("675","75","Savonlinna");
INSERT INTO master_locations VALUES("676","75","Selanpaa");
INSERT INTO master_locations VALUES("677","75","Seinajoki");
INSERT INTO master_locations VALUES("678","75","Sodankyla");
INSERT INTO master_locations VALUES("679","75","Tampere / Pirkkala");
INSERT INTO master_locations VALUES("680","75","Teisko");
INSERT INTO master_locations VALUES("681","75","Turku");
INSERT INTO master_locations VALUES("682","75","Utti / Valkeala");
INSERT INTO master_locations VALUES("683","75","Vaasa");
INSERT INTO master_locations VALUES("684","75","Varkaus / Joroinen");
INSERT INTO master_locations VALUES("685","75","Ylivieska");
INSERT INTO master_locations VALUES("686","226","Northern Ireland");
INSERT INTO master_locations VALUES("687","226","England");
INSERT INTO master_locations VALUES("688","226","Wales");
INSERT INTO master_locations VALUES("689","226","Scotland");
INSERT INTO master_locations VALUES("690","226","Channel Islands");
INSERT INTO master_locations VALUES("691","226","Isle of Man");
INSERT INTO master_locations VALUES("692","226","Falkland Islands");
INSERT INTO master_locations VALUES("693","152","near Amsterdam");
INSERT INTO master_locations VALUES("694","152","Weert");
INSERT INTO master_locations VALUES("695","152","De Bilt");
INSERT INTO master_locations VALUES("696","152","Maastricht");
INSERT INTO master_locations VALUES("697","152","Deelen");
INSERT INTO master_locations VALUES("698","152","Venraij");
INSERT INTO master_locations VALUES("699","152","Drachten");
INSERT INTO master_locations VALUES("700","152","Eindhoven");
INSERT INTO master_locations VALUES("701","152","Eelde");
INSERT INTO master_locations VALUES("702","152","Gilze and Rijen");
INSERT INTO master_locations VALUES("703","152","Hoogeveen");
INSERT INTO master_locations VALUES("704","152","Hilversum");
INSERT INTO master_locations VALUES("705","152","De Kooy");
INSERT INTO master_locations VALUES("706","152","Uden");
INSERT INTO master_locations VALUES("707","152","Lelystad");
INSERT INTO master_locations VALUES("708","152","Leeuwarden");
INSERT INTO master_locations VALUES("709","152","Nieuw-Milligen");
INSERT INTO master_locations VALUES("710","152","Zeeland");
INSERT INTO master_locations VALUES("711","152","Scheemda");
INSERT INTO master_locations VALUES("712","152","Rotterdam");
INSERT INTO master_locations VALUES("713","152","Soesterberg");
INSERT INTO master_locations VALUES("714","152","Hoeven");
INSERT INTO master_locations VALUES("715","152","Stadskanaal");
INSERT INTO master_locations VALUES("716","152","Deventer");
INSERT INTO master_locations VALUES("717","152","Terlet");
INSERT INTO master_locations VALUES("718","152","Enschede");
INSERT INTO master_locations VALUES("719","152","Texel");
INSERT INTO master_locations VALUES("720","152","Valkenburg");
INSERT INTO master_locations VALUES("721","152","Woensdrecht");
INSERT INTO master_locations VALUES("722","152","The_Hague");
INSERT INTO master_locations VALUES("723","105","County Longford");
INSERT INTO master_locations VALUES("724","105","County Cork");
INSERT INTO master_locations VALUES("725","105","County Offaly");
INSERT INTO master_locations VALUES("726","105","Connemara");
INSERT INTO master_locations VALUES("727","105","Cork");
INSERT INTO master_locations VALUES("728","105","County Galway");
INSERT INTO master_locations VALUES("729","105","County Limerick");
INSERT INTO master_locations VALUES("730","105","County Donegal");
INSERT INTO master_locations VALUES("731","105","Dublin");
INSERT INTO master_locations VALUES("732","105","County Kilkenny");
INSERT INTO master_locations VALUES("733","105","County Mayo");
INSERT INTO master_locations VALUES("734","105","County Kerry");
INSERT INTO master_locations VALUES("735","105","Baldonnel");
INSERT INTO master_locations VALUES("736","105","County Meath");
INSERT INTO master_locations VALUES("737","105","County Tipperary");
INSERT INTO master_locations VALUES("738","105","County Clare");
INSERT INTO master_locations VALUES("739","105","County Cork ");
INSERT INTO master_locations VALUES("740","105","near Sligo");
INSERT INTO master_locations VALUES("741","105","Waterford");
INSERT INTO master_locations VALUES("742","105","County Kildare");
INSERT INTO master_locations VALUES("743","60","Tirstrup near Aarhus");
INSERT INTO master_locations VALUES("744","60","Billund");
INSERT INTO master_locations VALUES("745","60","Kastrup near Copenhagen");
INSERT INTO master_locations VALUES("746","60","Esbjerg");
INSERT INTO master_locations VALUES("747","60","Herning");
INSERT INTO master_locations VALUES("748","60","Karup");
INSERT INTO master_locations VALUES("749","60","Lolland Falster Maribo");
INSERT INTO master_locations VALUES("750","60","Odense");
INSERT INTO master_locations VALUES("751","60","Tune near Roskilde");
INSERT INTO master_locations VALUES("752","60","Ronne");
INSERT INTO master_locations VALUES("753","60","Sonderborg");
INSERT INTO master_locations VALUES("754","60","Sindal");
INSERT INTO master_locations VALUES("755","60","Vojens");
INSERT INTO master_locations VALUES("756","60","Skive");
INSERT INTO master_locations VALUES("757","60","Thisted");
INSERT INTO master_locations VALUES("758","60","Aars");
INSERT INTO master_locations VALUES("759","60","Skjern");
INSERT INTO master_locations VALUES("760","60","Aalborg");
INSERT INTO master_locations VALUES("761","60","Kolding");
INSERT INTO master_locations VALUES("762","73","Faroe Islands");
INSERT INTO master_locations VALUES("763","126","Luxembourg");
INSERT INTO master_locations VALUES("764","126","Medernach Ulmodrome");
INSERT INTO master_locations VALUES("765","126","Useldange glider field");
INSERT INTO master_locations VALUES("766","162","More og Romsdal");
INSERT INTO master_locations VALUES("767","162","Nordland");
INSERT INTO master_locations VALUES("768","162","Svalbard");
INSERT INTO master_locations VALUES("769","162","Finnmark");
INSERT INTO master_locations VALUES("770","162","Arctic");
INSERT INTO master_locations VALUES("771","162","Sogn og Fjordane");
INSERT INTO master_locations VALUES("772","162","Hordaland");
INSERT INTO master_locations VALUES("773","162","Vest-Agder");
INSERT INTO master_locations VALUES("774","162","Buskerud");
INSERT INTO master_locations VALUES("775","162","Norwegian Sea");
INSERT INTO master_locations VALUES("776","162","Troms");
INSERT INTO master_locations VALUES("777","162","Nordland / Troms");
INSERT INTO master_locations VALUES("778","162","Akershus");
INSERT INTO master_locations VALUES("779","162","Oppland");
INSERT INTO master_locations VALUES("780","162","North Sea");
INSERT INTO master_locations VALUES("781","162","Hedmark");
INSERT INTO master_locations VALUES("782","162","Rogaland");
INSERT INTO master_locations VALUES("783","162","Jan Mayen");
INSERT INTO master_locations VALUES("784","162","Vestfold");
INSERT INTO master_locations VALUES("785","162","Nord-Trondelag ");
INSERT INTO master_locations VALUES("786","162","Telemark");
INSERT INTO master_locations VALUES("787","162","Sor-Trondelag");
INSERT INTO master_locations VALUES("788","162"," Ostfold");
INSERT INTO master_locations VALUES("789","173","Bydgoszcz");
INSERT INTO master_locations VALUES("790","173","Gda&#324;sk");
INSERT INTO master_locations VALUES("791","173","Krakow");
INSERT INTO master_locations VALUES("792","173","Katowice");
INSERT INTO master_locations VALUES("793","173","Lodz");
INSERT INTO master_locations VALUES("794","173","Nowy Dwor Mazowiecki");
INSERT INTO master_locations VALUES("795","173","Poznan");
INSERT INTO master_locations VALUES("796","173","Rzeszow ");
INSERT INTO master_locations VALUES("797","173","Szczecin");
INSERT INTO master_locations VALUES("798","173","Szczytno");
INSERT INTO master_locations VALUES("799","173","Warsaw");
INSERT INTO master_locations VALUES("800","173","Wroc&#322;aw");
INSERT INTO master_locations VALUES("801","173","Zielona Gora");
INSERT INTO master_locations VALUES("802","207","Linkoping");
INSERT INTO master_locations VALUES("803","207","Norrkoping");
INSERT INTO master_locations VALUES("804","207","Uppsala");
INSERT INTO master_locations VALUES("805","207","Stockholm");
INSERT INTO master_locations VALUES("806","207","Ronneby");
INSERT INTO master_locations VALUES("807","207","Hassleholm");
INSERT INTO master_locations VALUES("808","207","Hasslosa");
INSERT INTO master_locations VALUES("809","207","Knislinge");
INSERT INTO master_locations VALUES("810","207","Sjobo");
INSERT INTO master_locations VALUES("811","207","Moholm");
INSERT INTO master_locations VALUES("812","207","Kosta");
INSERT INTO master_locations VALUES("813","207","Ruda");
INSERT INTO master_locations VALUES("814","207","Sandvik");
INSERT INTO master_locations VALUES("815","207","Vaxjo");
INSERT INTO master_locations VALUES("816","207","Byholma");
INSERT INTO master_locations VALUES("817","207","Uddevalla");
INSERT INTO master_locations VALUES("818","207","Balleberg");
INSERT INTO master_locations VALUES("819","207","Tidaholm");
INSERT INTO master_locations VALUES("820","207","Boras");
INSERT INTO master_locations VALUES("821","207","Falkenberg");
INSERT INTO master_locations VALUES("822","207","Goteborg");
INSERT INTO master_locations VALUES("823","207","Herrljunga");
INSERT INTO master_locations VALUES("824","207"," Alingsas");
INSERT INTO master_locations VALUES("825","207","Jonkoping");
INSERT INTO master_locations VALUES("826","207","Falkoeping");
INSERT INTO master_locations VALUES("827","207","Lidkoping");
INSERT INTO master_locations VALUES("828","207","Ovre Resten");
INSERT INTO master_locations VALUES("829","207","Gotene");
INSERT INTO master_locations VALUES("830","207","Skovde");
INSERT INTO master_locations VALUES("831","207","Stromstad");
INSERT INTO master_locations VALUES("832","207","Trollhattan / Vanersborg");
INSERT INTO master_locations VALUES("833","207","Varberg");
INSERT INTO master_locations VALUES("834","207","Saffle");
INSERT INTO master_locations VALUES("835","207","Karlsborg");
INSERT INTO master_locations VALUES("836","207","Satenas");
INSERT INTO master_locations VALUES("837","207","Gimo");
INSERT INTO master_locations VALUES("838","207","Sundbro");
INSERT INTO master_locations VALUES("839","207","Dala-Jarna");
INSERT INTO master_locations VALUES("840","207","Gryttjom");
INSERT INTO master_locations VALUES("841","207","Eksharad");
INSERT INTO master_locations VALUES("842","207","Karlskoga");
INSERT INTO master_locations VALUES("843","207","Mora");
INSERT INTO master_locations VALUES("844","207","Stockholm / Nykoping");
INSERT INTO master_locations VALUES("845","207","Munkfors");
INSERT INTO master_locations VALUES("846","207","Strangnas");
INSERT INTO master_locations VALUES("847","207","Tierp");
INSERT INTO master_locations VALUES("848","207","Sunne");
INSERT INTO master_locations VALUES("849","207","Arvika");
INSERT INTO master_locations VALUES("850","207","Bjorkvik");
INSERT INTO master_locations VALUES("851","207","Emmaboda");
INSERT INTO master_locations VALUES("852","207","Borglanda");
INSERT INTO master_locations VALUES("853","207","Eksjo");
INSERT INTO master_locations VALUES("854","207","Eslov");
INSERT INTO master_locations VALUES("855","207","Fagerhult");
INSERT INTO master_locations VALUES("856","207","Ljungby");
INSERT INTO master_locations VALUES("857","207","Haganas");
INSERT INTO master_locations VALUES("858","207","Sovdeborg");
INSERT INTO master_locations VALUES("859","207","Kagerod");
INSERT INTO master_locations VALUES("860","207","Kristianstad");
INSERT INTO master_locations VALUES("861","207","Landskrona");
INSERT INTO master_locations VALUES("862","207","Lund");
INSERT INTO master_locations VALUES("863","207","Oskarshamn");
INSERT INTO master_locations VALUES("864","207","Anderstorp");
INSERT INTO master_locations VALUES("865","207","Kalmar");
INSERT INTO master_locations VALUES("866","207","Trelleborg");
INSERT INTO master_locations VALUES("867","207","Malmo");
INSERT INTO master_locations VALUES("868","207","Halmstad");
INSERT INTO master_locations VALUES("869","207","Almhult");
INSERT INTO master_locations VALUES("870","207","Hagshult");
INSERT INTO master_locations VALUES("871","207","Tingsryd");
INSERT INTO master_locations VALUES("872","207","Smalandsstenar");
INSERT INTO master_locations VALUES("873","207","Olanda");
INSERT INTO master_locations VALUES("874","207","Hallviken");
INSERT INTO master_locations VALUES("875","207","Solleftea");
INSERT INTO master_locations VALUES("876","207","Hede");
INSERT INTO master_locations VALUES("877","207","Sveg");
INSERT INTO master_locations VALUES("878","207","Overkalix");
INSERT INTO master_locations VALUES("879","207","Farila");
INSERT INTO master_locations VALUES("880","207","Gallivare");
INSERT INTO master_locations VALUES("881","207","Hudiksvall");
INSERT INTO master_locations VALUES("882","207","Kubbe");
INSERT INTO master_locations VALUES("883","207","Jokkmokk");
INSERT INTO master_locations VALUES("884","207","Kramfors / Solleftea");
INSERT INTO master_locations VALUES("885","207","Lycksele");
INSERT INTO master_locations VALUES("886","207","Optand");
INSERT INTO master_locations VALUES("887","207","Sundsvall / Harnosand");
INSERT INTO master_locations VALUES("888","207","Ornskoldsvik");
INSERT INTO master_locations VALUES("889","207","Pitea");
INSERT INTO master_locations VALUES("890","207","Kiruna");
INSERT INTO master_locations VALUES("891","207","Orsa");
INSERT INTO master_locations VALUES("892","207","Skelleftea");
INSERT INTO master_locations VALUES("893","207","Sattna");
INSERT INTO master_locations VALUES("894","207","Umea");
INSERT INTO master_locations VALUES("895","207","Vilhelmina");
INSERT INTO master_locations VALUES("896","207","Arvidsjaur");
INSERT INTO master_locations VALUES("897","207","Soderhamn");
INSERT INTO master_locations VALUES("898","207","Ostersund");
INSERT INTO master_locations VALUES("899","207","Orebro");
INSERT INTO master_locations VALUES("900","207","Hagfors");
INSERT INTO master_locations VALUES("901","207","Karlstad");
INSERT INTO master_locations VALUES("902","207","Storvik");
INSERT INTO master_locations VALUES("903","207","Stockholm / Vasteras");
INSERT INTO master_locations VALUES("904","207","Lulea");
INSERT INTO master_locations VALUES("905","207","Vidsel");
INSERT INTO master_locations VALUES("906","207","Boden");
INSERT INTO master_locations VALUES("907","207","Heden");
INSERT INTO master_locations VALUES("908","207","Arboga");
INSERT INTO master_locations VALUES("909","207","Berga");
INSERT INTO master_locations VALUES("910","207","Eskilstuna");
INSERT INTO master_locations VALUES("911","207","Borlange");
INSERT INTO master_locations VALUES("912","207","Hultsfred / Vimmerby");
INSERT INTO master_locations VALUES("913","207","Ludvika");
INSERT INTO master_locations VALUES("914","207","Laxo");
INSERT INTO master_locations VALUES("915","207","Visingso");
INSERT INTO master_locations VALUES("916","207","Gavle  / Sandviken");
INSERT INTO master_locations VALUES("917","207","Brattforsheden");
INSERT INTO master_locations VALUES("918","207","Norrtelje");
INSERT INTO master_locations VALUES("919","207","Torsby");
INSERT INTO master_locations VALUES("920","207","Visby");
INSERT INTO master_locations VALUES("921","207","Vastervik");
INSERT INTO master_locations VALUES("922","207"," Vasteras");
INSERT INTO master_locations VALUES("923","207","Vangso");
INSERT INTO master_locations VALUES("924","207","Angelholm / Helsingborg");
INSERT INTO master_locations VALUES("925","207","Fjallbacka");
INSERT INTO master_locations VALUES("926","207"," Gronhogen");
INSERT INTO master_locations VALUES("927","207","Ljungbyhed");
INSERT INTO master_locations VALUES("928","207","Tomelilla");
INSERT INTO master_locations VALUES("929","207","Vellinge");
INSERT INTO master_locations VALUES("930","207","Amsele");
INSERT INTO master_locations VALUES("931","207","Arbra");
INSERT INTO master_locations VALUES("932","207","Storuman");
INSERT INTO master_locations VALUES("933","207","Idre");
INSERT INTO master_locations VALUES("934","207","Fallfors");
INSERT INTO master_locations VALUES("935","207","Gargnas");
INSERT INTO master_locations VALUES("936","207","Harnosand");
INSERT INTO master_locations VALUES("937","207","Mellansel");
INSERT INTO master_locations VALUES("938","207","Ange");
INSERT INTO master_locations VALUES("939","207","Kalixfors");
INSERT INTO master_locations VALUES("940","207","Ljusdal");
INSERT INTO master_locations VALUES("941","207","Mohed");
INSERT INTO master_locations VALUES("942","207","Oviken");
INSERT INTO master_locations VALUES("943","207","Pajala");
INSERT INTO master_locations VALUES("944","207","Ramsele");
INSERT INTO master_locations VALUES("945","207","Asele");
INSERT INTO master_locations VALUES("946","207","Hemavan");
INSERT INTO master_locations VALUES("947","207","Alvsbyn");
INSERT INTO master_locations VALUES("948","207","Edsbyn");
INSERT INTO master_locations VALUES("949","207","Avesta");
INSERT INTO master_locations VALUES("950","207","Bunge");
INSERT INTO master_locations VALUES("951","207","Gagnef");
INSERT INTO master_locations VALUES("952","207","Hallefors");
INSERT INTO master_locations VALUES("953","207","Katrineholm");
INSERT INTO master_locations VALUES("954","207","Malung");
INSERT INTO master_locations VALUES("955","207","Koping");
INSERT INTO master_locations VALUES("956","207","Siljansnas");
INSERT INTO master_locations VALUES("957","119","Adas");
INSERT INTO master_locations VALUES("958","119","Daugavpils");
INSERT INTO master_locations VALUES("959","119","Jelgava");
INSERT INTO master_locations VALUES("960","119","Vainode");
INSERT INTO master_locations VALUES("961","119","Lielvarde");
INSERT INTO master_locations VALUES("962","119","Jekabpils");
INSERT INTO master_locations VALUES("963","119","Liepaja");
INSERT INTO master_locations VALUES("964","119","Riga");
INSERT INTO master_locations VALUES("965","119","Riga");
INSERT INTO master_locations VALUES("966","119","Tukums");
INSERT INTO master_locations VALUES("967","119","Ventspils");
INSERT INTO master_locations VALUES("968","125","Alytus");
INSERT INTO master_locations VALUES("969","125","Birzai");
INSERT INTO master_locations VALUES("970","125","Jurbarkas");
INSERT INTO master_locations VALUES("971","125","Kaunas");
INSERT INTO master_locations VALUES("972","125","Kedainiai");
INSERT INTO master_locations VALUES("973","125","Klaipeda");
INSERT INTO master_locations VALUES("974","125","KazlÃƒâ€¦Ã‚Â³ Ruda");
INSERT INTO master_locations VALUES("975","125","Kartena");
INSERT INTO master_locations VALUES("976","125","Tirksliai");
INSERT INTO master_locations VALUES("977","125","Sasnava");
INSERT INTO master_locations VALUES("978","125","Akmene");
INSERT INTO master_locations VALUES("979","125","Nida");
INSERT INTO master_locations VALUES("980","125","Nemirseta");
INSERT INTO master_locations VALUES("981","125","Palanga");
INSERT INTO master_locations VALUES("982","125","Panevezys");
INSERT INTO master_locations VALUES("983","125","Pikeliskes ");
INSERT INTO master_locations VALUES("984","125","Pajuostis");
INSERT INTO master_locations VALUES("985","125","Pociunai");
INSERT INTO master_locations VALUES("986","125","Rokishkis");
INSERT INTO master_locations VALUES("987","125","Jonava");
INSERT INTO master_locations VALUES("988","125","Siauliai ");
INSERT INTO master_locations VALUES("989","125","Barysiai");
INSERT INTO master_locations VALUES("990","125","Seduva");
INSERT INTO master_locations VALUES("991","125","Silute");
INSERT INTO master_locations VALUES("992","125","Telsiai ");
INSERT INTO master_locations VALUES("993","125","Utena");
INSERT INTO master_locations VALUES("994","125","Vilnius (MOT/CAD)");
INSERT INTO master_locations VALUES("995","125","Vilnius (ACC/FIC/COM/RCC)");
INSERT INTO master_locations VALUES("996","125","Vilnius");
INSERT INTO master_locations VALUES("997","125","Kyviskes");
INSERT INTO master_locations VALUES("998","125","Vilnius (FIR)");
INSERT INTO master_locations VALUES("999","125","Vilnius (NOF/AIS)");
INSERT INTO master_locations VALUES("1000","125","Paluknys");
INSERT INTO master_locations VALUES("1001","125","Zarasai");
INSERT INTO master_locations VALUES("1002","125","Oekiokes");
INSERT INTO master_locations VALUES("1003","199","Bisho");
INSERT INTO master_locations VALUES("1004","199","Bloemfontein");
INSERT INTO master_locations VALUES("1005","199","Bethlehem");
INSERT INTO master_locations VALUES("1006","199","Butterworth");
INSERT INTO master_locations VALUES("1007","199","Cradock");
INSERT INTO master_locations VALUES("1008","199","Cape Town");
INSERT INTO master_locations VALUES("1009","199","Durban");
INSERT INTO master_locations VALUES("1010","199","East London");
INSERT INTO master_locations VALUES("1011","199","Empangeni");
INSERT INTO master_locations VALUES("1012","199","Ellisras");
INSERT INTO master_locations VALUES("1013","199","Ficksburg");
INSERT INTO master_locations VALUES("1014","199","Durbanville");
INSERT INTO master_locations VALUES("1015","199","Johannesburg");
INSERT INTO master_locations VALUES("1016","199","George");
INSERT INTO master_locations VALUES("1017","199","Giyani");
INSERT INTO master_locations VALUES("1018","199","Hluhluwe");
INSERT INTO master_locations VALUES("1019","199","Harrismith");
INSERT INTO master_locations VALUES("1020","199","Hoedspruit");
INSERT INTO master_locations VALUES("1021","199","Klerksdorp");
INSERT INTO master_locations VALUES("1022","199","Hopefield");
INSERT INTO master_locations VALUES("1023","199","Kimberley");
INSERT INTO master_locations VALUES("1024","199","Nelspruit (Kruger National Park)");
INSERT INTO master_locations VALUES("1025","199","Komga");
INSERT INTO master_locations VALUES("1026","199","Komatipoort");
INSERT INTO master_locations VALUES("1027","199","Krugersdorp");
INSERT INTO master_locations VALUES("1028","199","Kuruman");
INSERT INTO master_locations VALUES("1029","199","Kleinsee");
INSERT INTO master_locations VALUES("1030","199","Lanseria");
INSERT INTO master_locations VALUES("1031","199","Lime Acres");
INSERT INTO master_locations VALUES("1032","199","Lusikisiki");
INSERT INTO master_locations VALUES("1033","199","Makhado");
INSERT INTO master_locations VALUES("1034","199","Langebaan");
INSERT INTO master_locations VALUES("1035","199","Ladysmith");
INSERT INTO master_locations VALUES("1036","199","Malamala");
INSERT INTO master_locations VALUES("1037","199","Margate");
INSERT INTO master_locations VALUES("1038","199","Mmabatho");
INSERT INTO master_locations VALUES("1039","199","Malelane");
INSERT INTO master_locations VALUES("1040","199","Mossel Bay");
INSERT INTO master_locations VALUES("1041","199","Messina");
INSERT INTO master_locations VALUES("1042","199","Mkuze");
INSERT INTO master_locations VALUES("1043","199","Mzamba");
INSERT INTO master_locations VALUES("1044","199","Newcastle");
INSERT INTO master_locations VALUES("1045","199","Ngala");
INSERT INTO master_locations VALUES("1046","199","Nelspruit");
INSERT INTO master_locations VALUES("1047","199","Magaliesburg");
INSERT INTO master_locations VALUES("1048","199","Oudtshoorn");
INSERT INTO master_locations VALUES("1049","199","Port Alfred");
INSERT INTO master_locations VALUES("1050","199","Port Elizabeth");
INSERT INTO master_locations VALUES("1051","199","Plettenberg Bay");
INSERT INTO master_locations VALUES("1052","199","Phalaborwa");
INSERT INTO master_locations VALUES("1053","199","Port St. Johns");
INSERT INTO master_locations VALUES("1054","199","Prieska");
INSERT INTO master_locations VALUES("1055","199","Pietermaritzburg");
INSERT INTO master_locations VALUES("1056","199","Pilanesberg (near Sun City)");
INSERT INTO master_locations VALUES("1057","199","Polokwane");
INSERT INTO master_locations VALUES("1058","199","Queenstown");
INSERT INTO master_locations VALUES("1059","199","Richards Bay");
INSERT INTO master_locations VALUES("1060","199","Rustenburg");
INSERT INTO master_locations VALUES("1061","199","Robertson");
INSERT INTO master_locations VALUES("1062","199","Springbok");
INSERT INTO master_locations VALUES("1063","199","Secunda");
INSERT INTO master_locations VALUES("1064","199","Saldanha Bay");
INSERT INTO master_locations VALUES("1065","199","Sabi Sabi");
INSERT INTO master_locations VALUES("1066","199","Stellenbosch");
INSERT INTO master_locations VALUES("1067","199","Sishen");
INSERT INTO master_locations VALUES("1068","199","Skukuza");
INSERT INTO master_locations VALUES("1069","199","Teddarfield Airpark");
INSERT INTO master_locations VALUES("1070","199","Thohoyandou");
INSERT INTO master_locations VALUES("1071","199","Thaba Nchu");
INSERT INTO master_locations VALUES("1072","199","Tzaneen");
INSERT INTO master_locations VALUES("1073","199","Ulundi");
INSERT INTO master_locations VALUES("1074","199","Upington");
INSERT INTO master_locations VALUES("1075","199","Umtata");
INSERT INTO master_locations VALUES("1076","199","Vryburg");
INSERT INTO master_locations VALUES("1077","199","Vredendal");
INSERT INTO master_locations VALUES("1078","199","Vryheid");
INSERT INTO master_locations VALUES("1079","199","Pretoria");
INSERT INTO master_locations VALUES("1080","199","Tshwane");
INSERT INTO master_locations VALUES("1081","199","Welkom");
INSERT INTO master_locations VALUES("1082","29","Francistown");
INSERT INTO master_locations VALUES("1083","29","Gumare");
INSERT INTO master_locations VALUES("1084","29","Ghanzi");
INSERT INTO master_locations VALUES("1085","29","Jwaneng");
INSERT INTO master_locations VALUES("1086","29","Kasane");
INSERT INTO master_locations VALUES("1087","29","Kang");
INSERT INTO master_locations VALUES("1088","29","Khwai River");
INSERT INTO master_locations VALUES("1089","29","Kanye");
INSERT INTO master_locations VALUES("1090","29","Lobatse");
INSERT INTO master_locations VALUES("1091","29","Makalamabedi");
INSERT INTO master_locations VALUES("1092","29","Maun");
INSERT INTO master_locations VALUES("1093","29","Nokaneng");
INSERT INTO master_locations VALUES("1094","29","Nata");
INSERT INTO master_locations VALUES("1095","29","Orapa");
INSERT INTO master_locations VALUES("1096","29","Palapye");
INSERT INTO master_locations VALUES("1097","29","Rakops");
INSERT INTO master_locations VALUES("1098","29","Gaborone");
INSERT INTO master_locations VALUES("1099","29","Sua Pan");
INSERT INTO master_locations VALUES("1100","29","Selebi-Phikwe");
INSERT INTO master_locations VALUES("1101","29","Serowe");
INSERT INTO master_locations VALUES("1102","29","Savuti");
INSERT INTO master_locations VALUES("1103","29","Shakawe");
INSERT INTO master_locations VALUES("1104","29","Tshane");
INSERT INTO master_locations VALUES("1105","29","Tuli Lodge");
INSERT INTO master_locations VALUES("1106","29","Tshabong");
INSERT INTO master_locations VALUES("1107","29","Xugana");
INSERT INTO master_locations VALUES("1108","50","Brazzaville");
INSERT INTO master_locations VALUES("1109","50","Djambala");
INSERT INTO master_locations VALUES("1110","50","Kindamba");
INSERT INTO master_locations VALUES("1111","50","Lague");
INSERT INTO master_locations VALUES("1112","50","Mouyondzi");
INSERT INTO master_locations VALUES("1113","50","Sibiti");
INSERT INTO master_locations VALUES("1114","50","Nkayi");
INSERT INTO master_locations VALUES("1115","50","Zanaga");
INSERT INTO master_locations VALUES("1116","50","Mossendjo");
INSERT INTO master_locations VALUES("1117","50","Boundji");
INSERT INTO master_locations VALUES("1118","50","Ewo");
INSERT INTO master_locations VALUES("1119","50","Gamboma");
INSERT INTO master_locations VALUES("1120","50","Impfondo");
INSERT INTO master_locations VALUES("1121","50","Kelle");
INSERT INTO master_locations VALUES("1122","50","Makoua");
INSERT INTO master_locations VALUES("1123","50","Owando");
INSERT INTO master_locations VALUES("1124","50","Souanke");
INSERT INTO master_locations VALUES("1125","50","Betou");
INSERT INTO master_locations VALUES("1126","50","Ouesso");
INSERT INTO master_locations VALUES("1127","50","Makabana");
INSERT INTO master_locations VALUES("1128","50","Loubomo");
INSERT INTO master_locations VALUES("1129","50","Pointe-Noire");
INSERT INTO master_locations VALUES("1130","206","Ngonini");
INSERT INTO master_locations VALUES("1131","206","Kubuta");
INSERT INTO master_locations VALUES("1132","206","Lavumisa");
INSERT INTO master_locations VALUES("1133","206","Mhlume");
INSERT INTO master_locations VALUES("1134","206","Manzini");
INSERT INTO master_locations VALUES("1135","206","Nhlangano");
INSERT INTO master_locations VALUES("1136","206","Nsoko");
INSERT INTO master_locations VALUES("1137","206","Simunye");
INSERT INTO master_locations VALUES("1138","206","Siteki");
INSERT INTO master_locations VALUES("1139","206","Tambankula");
INSERT INTO master_locations VALUES("1140","206","Tshaneni");
INSERT INTO master_locations VALUES("1141","206","Big Bend");
INSERT INTO master_locations VALUES("1142","42","Alindao");
INSERT INTO master_locations VALUES("1143","42","Obo");
INSERT INTO master_locations VALUES("1144","42","Carnot");
INSERT INTO master_locations VALUES("1145","42","Mobaye");
INSERT INTO master_locations VALUES("1146","42","Bangui");
INSERT INTO master_locations VALUES("1147","42","Bangassou");
INSERT INTO master_locations VALUES("1148","42","Birao");
INSERT INTO master_locations VALUES("1149","42","Bossembele");
INSERT INTO master_locations VALUES("1150","42","Bambari");
INSERT INTO master_locations VALUES("1151","42","N\\\\\\\'Dela");
INSERT INTO master_locations VALUES("1152","42","Bouar");
INSERT INTO master_locations VALUES("1153","42","Paoua");
INSERT INTO master_locations VALUES("1154","42","Bria");
INSERT INTO master_locations VALUES("1155","42","Bossangoa");
INSERT INTO master_locations VALUES("1156","42","Berberati ");
INSERT INTO master_locations VALUES("1157","42","Sibut");
INSERT INTO master_locations VALUES("1158","42","Ouadda");
INSERT INTO master_locations VALUES("1159","42","Yalinga");
INSERT INTO master_locations VALUES("1160","42","Zemio");
INSERT INTO master_locations VALUES("1161","42","Bocaranga");
INSERT INTO master_locations VALUES("1162","42","Batangafo");
INSERT INTO master_locations VALUES("1163","42","Gordil");
INSERT INTO master_locations VALUES("1164","42","Bakouma");
INSERT INTO master_locations VALUES("1165","42","Ouanda Djalle");
INSERT INTO master_locations VALUES("1166","42","Rafai");
INSERT INTO master_locations VALUES("1167","42","Bouca");
INSERT INTO master_locations VALUES("1168","42","Bozoum");
INSERT INTO master_locations VALUES("1169","68","San Antonio de Pale");
INSERT INTO master_locations VALUES("1170","68","Bata");
INSERT INTO master_locations VALUES("1171","68","Malabo");
INSERT INTO master_locations VALUES("1172","226","Georgetown");
INSERT INTO master_locations VALUES("1173","138","Plaine Magnien");
INSERT INTO master_locations VALUES("1174","138","Rodrigues Island");
INSERT INTO master_locations VALUES("1175","32","Diego Garcia");
INSERT INTO master_locations VALUES("1176","38","Kribi");
INSERT INTO master_locations VALUES("1177","38","Tiko");
INSERT INTO master_locations VALUES("1178","38","Douala");
INSERT INTO master_locations VALUES("1179","38","Mamfe");
INSERT INTO master_locations VALUES("1180","38","Bali");
INSERT INTO master_locations VALUES("1181","38","Kaela");
INSERT INTO master_locations VALUES("1182","38","Batouri");
INSERT INTO master_locations VALUES("1183","38","Yagoua");
INSERT INTO master_locations VALUES("1184","38","Maroua");
INSERT INTO master_locations VALUES("1185","38","Foumban");
INSERT INTO master_locations VALUES("1186","38","Ngaoundere");
INSERT INTO master_locations VALUES("1187","38","Bertoua");
INSERT INTO master_locations VALUES("1188","38","Garoua");
INSERT INTO master_locations VALUES("1189","38","Dschang");
INSERT INTO master_locations VALUES("1190","38","Bafoussam");
INSERT INTO master_locations VALUES("1191","38","Bamenda");
INSERT INTO master_locations VALUES("1192","38","Ebolowa");
INSERT INTO master_locations VALUES("1193","38","Yaounde");
INSERT INTO master_locations VALUES("1194","240","Mbala");
INSERT INTO master_locations VALUES("1195","240","Chipata");
INSERT INTO master_locations VALUES("1196","240","Kasompe");
INSERT INTO master_locations VALUES("1197","240","Kalabo");
INSERT INTO master_locations VALUES("1198","240","Kaoma");
INSERT INTO master_locations VALUES("1199","240","Kasama");
INSERT INTO master_locations VALUES("1200","240","Kabwe");
INSERT INTO master_locations VALUES("1201","240","Livingstone");
INSERT INTO master_locations VALUES("1202","240","Lukulu");
INSERT INTO master_locations VALUES("1203","240","Lusaka");
INSERT INTO master_locations VALUES("1204","240","Mansa");
INSERT INTO master_locations VALUES("1205","240","Mfuwe");
INSERT INTO master_locations VALUES("1206","240","Mongu");
INSERT INTO master_locations VALUES("1207","240","Ndola");
INSERT INTO master_locations VALUES("1208","240","Senanga");
INSERT INTO master_locations VALUES("1209","240","Kitwe");
INSERT INTO master_locations VALUES("1210","240","Sesheke");
INSERT INTO master_locations VALUES("1211","240","Solwezi");
INSERT INTO master_locations VALUES("1212","240","Zambezi");
INSERT INTO master_locations VALUES("1213","49","Comoros");
INSERT INTO master_locations VALUES("1214","139","Mayotte");
INSERT INTO master_locations VALUES("1215","76","Reunion");
INSERT INTO master_locations VALUES("1216","129","Madagascar");
INSERT INTO master_locations VALUES("1217","7","Ambriz");
INSERT INTO master_locations VALUES("1218","7","Mbanza Congo");
INSERT INTO master_locations VALUES("1219","7","Benguela");
INSERT INTO master_locations VALUES("1220","7","Cabinda");
INSERT INTO master_locations VALUES("1221","7","Cafunfo");
INSERT INTO master_locations VALUES("1222","7","Chitato");
INSERT INTO master_locations VALUES("1223","7","Catumbela");
INSERT INTO master_locations VALUES("1224","7","Cuito Cuanavale");
INSERT INTO master_locations VALUES("1225","7","Cazombo");
INSERT INTO master_locations VALUES("1226","7","Dundo");
INSERT INTO master_locations VALUES("1227","7","Ondjiva (Ongiva, Ngiva, N\\\'giva)");
INSERT INTO master_locations VALUES("1228","7","Huambo");
INSERT INTO master_locations VALUES("1229","7","Kuito");
INSERT INTO master_locations VALUES("1230","7","Lucapa (Lukapa)");
INSERT INTO master_locations VALUES("1231","7","Luanda");
INSERT INTO master_locations VALUES("1232","7","Malanje");
INSERT INTO master_locations VALUES("1233","7","Menongue");
INSERT INTO master_locations VALUES("1234","7","Namibe");
INSERT INTO master_locations VALUES("1235","7","Negage");
INSERT INTO master_locations VALUES("1236","7","Porto Amboim");
INSERT INTO master_locations VALUES("1237","7","Saurimo");
INSERT INTO master_locations VALUES("1238","7","Soyo");
INSERT INTO master_locations VALUES("1239","7","Luau");
INSERT INTO master_locations VALUES("1240","7","Lubango");
INSERT INTO master_locations VALUES("1241","7","Luena");
INSERT INTO master_locations VALUES("1242","7","Uige");
INSERT INTO master_locations VALUES("1243","7","Waco Kungo");
INSERT INTO master_locations VALUES("1244","7","Xangongo");
INSERT INTO master_locations VALUES("1245","7","N\\\'zeto");
INSERT INTO master_locations VALUES("1246","80","Akieni");
INSERT INTO master_locations VALUES("1247","80","Booue");
INSERT INTO master_locations VALUES("1248","80","Ndende");
INSERT INTO master_locations VALUES("1249","80","Fougamou");
INSERT INTO master_locations VALUES("1250","80","Mbigou");
INSERT INTO master_locations VALUES("1251","80","Moabi");
INSERT INTO master_locations VALUES("1252","80","Koulamoutou");
INSERT INTO master_locations VALUES("1253","80","Mouila");
INSERT INTO master_locations VALUES("1254","80","Oyem");
INSERT INTO master_locations VALUES("1255","80","Okondja");
INSERT INTO master_locations VALUES("1256","80","Lambarene");
INSERT INTO master_locations VALUES("1257","80","Bitam");
INSERT INTO master_locations VALUES("1258","80","Moanda");
INSERT INTO master_locations VALUES("1259","80","Mekambo");
INSERT INTO master_locations VALUES("1260","80","Port-Gentil");
INSERT INTO master_locations VALUES("1261","80","Omboue");
INSERT INTO master_locations VALUES("1262","80","Iguela");
INSERT INTO master_locations VALUES("1263","80","Makokou");
INSERT INTO master_locations VALUES("1264","80","Libreville");
INSERT INTO master_locations VALUES("1265","80","Mitzic");
INSERT INTO master_locations VALUES("1266","80","Franceville");
INSERT INTO master_locations VALUES("1267","80","Lastourville");
INSERT INTO master_locations VALUES("1268","80","Sette Cama");
INSERT INTO master_locations VALUES("1269","80","Tchibanga");
INSERT INTO master_locations VALUES("1270","80","Mayumba");
INSERT INTO master_locations VALUES("1271","188","Sao Tome");
INSERT INTO master_locations VALUES("1272","188","principe");
INSERT INTO master_locations VALUES("1273","147","Angoche");
INSERT INTO master_locations VALUES("1274","147","Beira");
INSERT INTO master_locations VALUES("1275","147","Cuamba");
INSERT INTO master_locations VALUES("1276","147","Chimoio");
INSERT INTO master_locations VALUES("1277","147","Inhambane");
INSERT INTO master_locations VALUES("1278","147","Lichinga");
INSERT INTO master_locations VALUES("1279","147","Lumbo");
INSERT INTO master_locations VALUES("1280","147","Maputo");
INSERT INTO master_locations VALUES("1281","147","Mueda");
INSERT INTO master_locations VALUES("1282","147","Mocimboa da Praia");
INSERT INTO master_locations VALUES("1283","147","Nacala");
INSERT INTO master_locations VALUES("1284","147","Nampula");
INSERT INTO master_locations VALUES("1285","147","Pemba");
INSERT INTO master_locations VALUES("1286","147","Quelimane");
INSERT INTO master_locations VALUES("1287","147","Tete");
INSERT INTO master_locations VALUES("1288","147","Vilankulo");
INSERT INTO master_locations VALUES("1289","192","Alphonse Island");
INSERT INTO master_locations VALUES("1290","192","Assumption Island");
INSERT INTO master_locations VALUES("1291","192","D\\\'Arros Island");
INSERT INTO master_locations VALUES("1292","192","Desroches Island ");
INSERT INTO master_locations VALUES("1293","192","Farquhar Islands");
INSERT INTO master_locations VALUES("1294","192","Mahe Island");
INSERT INTO master_locations VALUES("1295","192","Marie Louise Island");
INSERT INTO master_locations VALUES("1296","192","Platte Island ");
INSERT INTO master_locations VALUES("1297","192","Praslin Island");
INSERT INTO master_locations VALUES("1298","192","Astove Island");
INSERT INTO master_locations VALUES("1299","192","Bird Island");
INSERT INTO master_locations VALUES("1300","192","Coetivy Island");
INSERT INTO master_locations VALUES("1301","192","Denis Island");
INSERT INTO master_locations VALUES("1302","192","Fregate Island");
INSERT INTO master_locations VALUES("1303","192","Remire Island (Eagle Island)");
INSERT INTO master_locations VALUES("1304","43","Sarh Airport");
INSERT INTO master_locations VALUES("1305","43","Sarh");
INSERT INTO master_locations VALUES("1306","43","Bongor");
INSERT INTO master_locations VALUES("1307","43","Abeche");
INSERT INTO master_locations VALUES("1308","43","Moundou");
INSERT INTO master_locations VALUES("1309","43","Biltine");
INSERT INTO master_locations VALUES("1310","43","Fada");
INSERT INTO master_locations VALUES("1311","43","Gozbeida");
INSERT INTO master_locations VALUES("1312","43","Lai");
INSERT INTO master_locations VALUES("1313","43","Ati");
INSERT INTO master_locations VALUES("1314","43","N\\\'Djamena");
INSERT INTO master_locations VALUES("1315","43","Bokoro");
INSERT INTO master_locations VALUES("1316","43","Bol");
INSERT INTO master_locations VALUES("1317","43","Mongo");
INSERT INTO master_locations VALUES("1318","43","Am-Timan");
INSERT INTO master_locations VALUES("1319","43","Pala");
INSERT INTO master_locations VALUES("1320","43","Zouar");
INSERT INTO master_locations VALUES("1321","43","Bousso");
INSERT INTO master_locations VALUES("1322","43","Mao");
INSERT INTO master_locations VALUES("1323","43","Faya-Largeau");
INSERT INTO master_locations VALUES("1324","43","Bardai");
INSERT INTO master_locations VALUES("1325","241","Bulawayo");
INSERT INTO master_locations VALUES("1326","241","Chipinge");
INSERT INTO master_locations VALUES("1327","241","Harare");
INSERT INTO master_locations VALUES("1328","241","Chiredzi");
INSERT INTO master_locations VALUES("1329","241","Victoria Falls");
INSERT INTO master_locations VALUES("1330","241","Mutare");
INSERT INTO master_locations VALUES("1331","241","Kariba");
INSERT INTO master_locations VALUES("1332","241","Masvingo");
INSERT INTO master_locations VALUES("1333","241","Gweru");
INSERT INTO master_locations VALUES("1334","241","Hwange (Hwange National Park)");
INSERT INTO master_locations VALUES("1335","241","Hwange Town");
INSERT INTO master_locations VALUES("1336","130","Chelinda");
INSERT INTO master_locations VALUES("1337","130","Blantyre");
INSERT INTO master_locations VALUES("1338","130","Club Makokola");
INSERT INTO master_locations VALUES("1339","130","Ntchisi");
INSERT INTO master_locations VALUES("1340","130","Chitipa");
INSERT INTO master_locations VALUES("1341","130","Dwanga");
INSERT INTO master_locations VALUES("1342","130","Karonga");
INSERT INTO master_locations VALUES("1343","130","Katumbi");
INSERT INTO master_locations VALUES("1344","130","Kasungu");
INSERT INTO master_locations VALUES("1345","130","Lilongwe");
INSERT INTO master_locations VALUES("1346","130","Likoma");
INSERT INTO master_locations VALUES("1347","130","Mchinji");
INSERT INTO master_locations VALUES("1348","130","Mangochi");
INSERT INTO master_locations VALUES("1349","130","Monkey Bay");
INSERT INTO master_locations VALUES("1350","130","Nsanje");
INSERT INTO master_locations VALUES("1351","130","Salima");
INSERT INTO master_locations VALUES("1352","130","Nchalo");
INSERT INTO master_locations VALUES("1353","130","Mzuzu");
INSERT INTO master_locations VALUES("1354","130","Zomba");
INSERT INTO master_locations VALUES("1355","121","Lebakeng");
INSERT INTO master_locations VALUES("1356","121","Leribe");
INSERT INTO master_locations VALUES("1357","121","Lesobeng");
INSERT INTO master_locations VALUES("1358","121","Matsaile");
INSERT INTO master_locations VALUES("1359","121","Mafeteng");
INSERT INTO master_locations VALUES("1360","121","Mokhotlong");
INSERT INTO master_locations VALUES("1361","121","Maseru");
INSERT INTO master_locations VALUES("1362","121","Nkaus");
INSERT INTO master_locations VALUES("1363","121","Pelaneng");
INSERT INTO master_locations VALUES("1364","121","Quthing");
INSERT INTO master_locations VALUES("1365","121","Qachas\\\' Nek");
INSERT INTO master_locations VALUES("1366","121","Sekake");
INSERT INTO master_locations VALUES("1367","121","Semongkong");
INSERT INTO master_locations VALUES("1368","121","Thaba Tseka");
INSERT INTO master_locations VALUES("1369","121","Tlokoeng");
INSERT INTO master_locations VALUES("1370","149","Arandis");
INSERT INTO master_locations VALUES("1371","149","Grootfontein");
INSERT INTO master_locations VALUES("1372","149","Halali");
INSERT INTO master_locations VALUES("1373","149","Helmeringhausen");
INSERT INTO master_locations VALUES("1374","149","Karasburg");
INSERT INTO master_locations VALUES("1375","149","Keetmanshoop");
INSERT INTO master_locations VALUES("1376","149","Luderitz");
INSERT INTO master_locations VALUES("1377","149","Mokuti Lodge");
INSERT INTO master_locations VALUES("1378","149","Mpacha");
INSERT INTO master_locations VALUES("1379","149","Namutoni");
INSERT INTO master_locations VALUES("1380","149","Nkurenkuru");
INSERT INTO master_locations VALUES("1381","149","Ondangwa");
INSERT INTO master_locations VALUES("1382","149","Omega");
INSERT INTO master_locations VALUES("1383","149","Oranjemund");
INSERT INTO master_locations VALUES("1384","149","Okahao");
INSERT INTO master_locations VALUES("1385","149","Okaukuejo");
INSERT INTO master_locations VALUES("1386","149","Opuwa");
INSERT INTO master_locations VALUES("1387","149","Oshakati");
INSERT INTO master_locations VALUES("1388","149","Rundu");
INSERT INTO master_locations VALUES("1389","149","Swakopmund");
INSERT INTO master_locations VALUES("1390","149","Tsumeb");
INSERT INTO master_locations VALUES("1391","149","Walvis Bay");
INSERT INTO master_locations VALUES("1392","149","Windhoek");
INSERT INTO master_locations VALUES("1393","239","Kinshasa");
INSERT INTO master_locations VALUES("1394","239","Boma");
INSERT INTO master_locations VALUES("1395","239","Luozi");
INSERT INTO master_locations VALUES("1396","239","Matadi");
INSERT INTO master_locations VALUES("1397","239","Nkolo-Fuma");
INSERT INTO master_locations VALUES("1398","239","Inongo");
INSERT INTO master_locations VALUES("1399","239","Nioki");
INSERT INTO master_locations VALUES("1400","239","Bandundu");
INSERT INTO master_locations VALUES("1401","239","Kiri");
INSERT INTO master_locations VALUES("1402","239","Kikwit");
INSERT INTO master_locations VALUES("1403","239","Idiofa");
INSERT INTO master_locations VALUES("1404","239","Lusanga");
INSERT INTO master_locations VALUES("1405","239","Masi-Manimba");
INSERT INTO master_locations VALUES("1406","239","Mbandaka");
INSERT INTO master_locations VALUES("1407","239","Basankusu");
INSERT INTO master_locations VALUES("1408","239","Libenge");
INSERT INTO master_locations VALUES("1409","239","Gbadolite");
INSERT INTO master_locations VALUES("1410","239","Gemena");
INSERT INTO master_locations VALUES("1411","239","Bumba");
INSERT INTO master_locations VALUES("1412","239","Lisala");
INSERT INTO master_locations VALUES("1413","239","Boende");
INSERT INTO master_locations VALUES("1414","239","Ikela");
INSERT INTO master_locations VALUES("1415","239","Kisangani");
INSERT INTO master_locations VALUES("1416","239","Yangambi");
INSERT INTO master_locations VALUES("1417","239","Isiro");
INSERT INTO master_locations VALUES("1418","239","Bunia");
INSERT INTO master_locations VALUES("1419","239","Buta Zega");
INSERT INTO master_locations VALUES("1420","239","Bukavu");
INSERT INTO master_locations VALUES("1421","239","Goma");
INSERT INTO master_locations VALUES("1422","239","Beni");
INSERT INTO master_locations VALUES("1423","239","Kindu");
INSERT INTO master_locations VALUES("1424","239","Kalima");
INSERT INTO master_locations VALUES("1425","239","Punia");
INSERT INTO master_locations VALUES("1426","239","Lubumbashi");
INSERT INTO master_locations VALUES("1427","239","Pweto");
INSERT INTO master_locations VALUES("1428","239","Kasenga");
INSERT INTO master_locations VALUES("1429","239","Kolwezi");
INSERT INTO master_locations VALUES("1430","239","Manono");
INSERT INTO master_locations VALUES("1431","239","Moba");
INSERT INTO master_locations VALUES("1432","239","Kalemie");
INSERT INTO master_locations VALUES("1433","239","Kabalo");
INSERT INTO master_locations VALUES("1434","239","Kongolo");
INSERT INTO master_locations VALUES("1435","239","Kamina");
INSERT INTO master_locations VALUES("1436","239","Kapanga");
INSERT INTO master_locations VALUES("1437","239","Kaniama");
INSERT INTO master_locations VALUES("1438","239","Kananga");
INSERT INTO master_locations VALUES("1439","239","Kasonga");
INSERT INTO master_locations VALUES("1440","239","Luisa");
INSERT INTO master_locations VALUES("1441","239","Moma");
INSERT INTO master_locations VALUES("1442","239","Tshikapa");
INSERT INTO master_locations VALUES("1443","239","Lodja");
INSERT INTO master_locations VALUES("1444","239","Lusambo");
INSERT INTO master_locations VALUES("1445","239","Mweka");
INSERT INTO master_locations VALUES("1446","239","Basongo");
INSERT INTO master_locations VALUES("1447","239","Mbuji Mayi");
INSERT INTO master_locations VALUES("1448","239","Gandajika");
INSERT INTO master_locations VALUES("1449","133","Ansongo");
INSERT INTO master_locations VALUES("1450","133","Bandiagara");
INSERT INTO master_locations VALUES("1451","133","Bafoulabe");
INSERT INTO master_locations VALUES("1452","133","Bougouni");
INSERT INTO master_locations VALUES("1453","133","Bourem");
INSERT INTO master_locations VALUES("1454","133","Bamako");
INSERT INTO master_locations VALUES("1455","133","Douentza");
INSERT INTO master_locations VALUES("1456","133","Goundam");
INSERT INTO master_locations VALUES("1457","133","Gao");
INSERT INTO master_locations VALUES("1458","133","Kenieba");
INSERT INTO master_locations VALUES("1459","133","Kidal");
INSERT INTO master_locations VALUES("1460","133","Kolokani");
INSERT INTO master_locations VALUES("1461","133","Koutiala");
INSERT INTO master_locations VALUES("1462","133","Kita");
INSERT INTO master_locations VALUES("1463","133","Kayes");
INSERT INTO master_locations VALUES("1464","133","Markala");
INSERT INTO master_locations VALUES("1465","133","Mopti");
INSERT INTO master_locations VALUES("1466","133","Menaka Cercle");
INSERT INTO master_locations VALUES("1467","133","Niafunke");
INSERT INTO master_locations VALUES("1468","133","Nara");
INSERT INTO master_locations VALUES("1469","133","Nioro");
INSERT INTO master_locations VALUES("1470","133","Sikasso");
INSERT INTO master_locations VALUES("1471","133","Tombouctou");
INSERT INTO master_locations VALUES("1472","133","Tessalit");
INSERT INTO master_locations VALUES("1473","133","Yelimane");
INSERT INTO master_locations VALUES("1474","81","Banjul");
INSERT INTO master_locations VALUES("1475","201","Fuerteventura");
INSERT INTO master_locations VALUES("1476","201","El Hierro");
INSERT INTO master_locations VALUES("1477","201","La Palma");
INSERT INTO master_locations VALUES("1478","201","Gran Canaria");
INSERT INTO master_locations VALUES("1479","201","La Gomera");
INSERT INTO master_locations VALUES("1480","201","Arrecife");
INSERT INTO master_locations VALUES("1481","201","Tenerife");
INSERT INTO master_locations VALUES("1482","201","Ceuta");
INSERT INTO master_locations VALUES("1483","201","Melilla");
INSERT INTO master_locations VALUES("1484","193","Bonthe");
INSERT INTO master_locations VALUES("1485","193","Bo");
INSERT INTO master_locations VALUES("1486","193","Gbangbatok");
INSERT INTO master_locations VALUES("1487","193","Freetown");
INSERT INTO master_locations VALUES("1488","193","Kabala");
INSERT INTO master_locations VALUES("1489","193","Kenema");
INSERT INTO master_locations VALUES("1490","193","Yengema");
INSERT INTO master_locations VALUES("1491","93","Bubaque");
INSERT INTO master_locations VALUES("1492","93","Bissau");
INSERT INTO master_locations VALUES("1493","93","Cufar");
INSERT INTO master_locations VALUES("1494","122","Buchanan");
INSERT INTO master_locations VALUES("1495","122","Harper");
INSERT INTO master_locations VALUES("1496","122","Greenville (Sinoe)");
INSERT INTO master_locations VALUES("1497","122","Monrovia");
INSERT INTO master_locations VALUES("1498","122","Nimba");
INSERT INTO master_locations VALUES("1499","122","Sasstown");
INSERT INTO master_locations VALUES("1500","122","Tchien");
INSERT INTO master_locations VALUES("1501","122","Voinjama");
INSERT INTO master_locations VALUES("1502","146","Souss-Massa-Draa");
INSERT INTO master_locations VALUES("1503","146","Guelmim-Es Semara");
INSERT INTO master_locations VALUES("1504","146","Gharb-Chrarda-Beni Hssen");
INSERT INTO master_locations VALUES("1505","146","Fes-Boulemane");
INSERT INTO master_locations VALUES("1506","146","Meknes-Tafilalet");
INSERT INTO master_locations VALUES("1507","146","Oriental");
INSERT INTO master_locations VALUES("1508","146","Taza-Al Hoceima-Taounate");
INSERT INTO master_locations VALUES("1509","146","Chaouia-Ouardigha");
INSERT INTO master_locations VALUES("1510","146","Greater Casablanca");
INSERT INTO master_locations VALUES("1511","146","Tadla-Azilal");
INSERT INTO master_locations VALUES("1512","146","Rabat-Sale-Zemmour-Zaer");
INSERT INTO master_locations VALUES("1513","146","Marrakech-Tensift-El Haouz");
INSERT INTO master_locations VALUES("1514","146","Doukkala-Abda");
INSERT INTO master_locations VALUES("1515","146","Tangier-Tetouan");
INSERT INTO master_locations VALUES("1516","237","Western Sahara");
INSERT INTO master_locations VALUES("1517","190","Ziguinchor");
INSERT INTO master_locations VALUES("1518","190","Kolda");
INSERT INTO master_locations VALUES("1519","190","Cap Skiring");
INSERT INTO master_locations VALUES("1520","190","Kaolack");
INSERT INTO master_locations VALUES("1521","190","Dakar");
INSERT INTO master_locations VALUES("1522","190","Matam");
INSERT INTO master_locations VALUES("1523","190","Podor");
INSERT INTO master_locations VALUES("1524","190","Richard Toll");
INSERT INTO master_locations VALUES("1525","190","Saint-Louis");
INSERT INTO master_locations VALUES("1526","190","Bakel");
INSERT INTO master_locations VALUES("1527","190","Kedougou");
INSERT INTO master_locations VALUES("1528","190","Simenti");
INSERT INTO master_locations VALUES("1529","190","Tambacounda");
INSERT INTO master_locations VALUES("1530","137","Aioun el Atrouss");
INSERT INTO master_locations VALUES("1531","137","Boutilimit");
INSERT INTO master_locations VALUES("1532","137","Tichitt");
INSERT INTO master_locations VALUES("1533","137","Tidjikja");
INSERT INTO master_locations VALUES("1534","137","Boghe");
INSERT INTO master_locations VALUES("1535","137","Kiffa");
INSERT INTO master_locations VALUES("1536","137","Timbedra");
INSERT INTO master_locations VALUES("1537","137","Nima");
INSERT INTO master_locations VALUES("1538","137","Akjoujt");
INSERT INTO master_locations VALUES("1539","137","Kaedi");
INSERT INTO master_locations VALUES("1540","137","Moudjeria");
INSERT INTO master_locations VALUES("1541","137","Nouakchott");
INSERT INTO master_locations VALUES("1542","137","Selibaby");
INSERT INTO master_locations VALUES("1543","137","Tamchakett");
INSERT INTO master_locations VALUES("1544","137","Atar");
INSERT INTO master_locations VALUES("1545","137","Fderik");
INSERT INTO master_locations VALUES("1546","137","Nouadhibou");
INSERT INTO master_locations VALUES("1547","137","Bir Moghrein");
INSERT INTO master_locations VALUES("1548","137","Zouerat");
INSERT INTO master_locations VALUES("1549","237","El Aaiun (Laayoune)");
INSERT INTO master_locations VALUES("1550","92","Conakry");
INSERT INTO master_locations VALUES("1551","92","Fria");
INSERT INTO master_locations VALUES("1552","92","Faranah");
INSERT INTO master_locations VALUES("1553","92","Banankoro");
INSERT INTO master_locations VALUES("1554","92","Port Kamsar");
INSERT INTO master_locations VALUES("1555","92","Kissidougou");
INSERT INTO master_locations VALUES("1556","92","Labe");
INSERT INTO master_locations VALUES("1557","92","Macenta");
INSERT INTO master_locations VALUES("1558","92","N\\\'zerekore");
INSERT INTO master_locations VALUES("1559","92","Boki");
INSERT INTO master_locations VALUES("1560","92","Guinea");
INSERT INTO master_locations VALUES("1561","92","Koundara");
INSERT INTO master_locations VALUES("1562","92","Siguiri");
INSERT INTO master_locations VALUES("1563","92","Kankan");
INSERT INTO master_locations VALUES("1564","40","Espargos");
INSERT INTO master_locations VALUES("1565","40","Santo Antao");
INSERT INTO master_locations VALUES("1566","40","Rabil");
INSERT INTO master_locations VALUES("1567","40","Praia");
INSERT INTO master_locations VALUES("1568","40","Vila do Maio");
INSERT INTO master_locations VALUES("1569","40","Mosteiros");
INSERT INTO master_locations VALUES("1570","40","Sao Filipe");
INSERT INTO master_locations VALUES("1571","40","Preguica");
INSERT INTO master_locations VALUES("1572","40","Sao Pedro");
INSERT INTO master_locations VALUES("1573","71","Addis Ababa");
INSERT INTO master_locations VALUES("1574","71","Arba Minch");
INSERT INTO master_locations VALUES("1575","71","Axum");
INSERT INTO master_locations VALUES("1576","71","Bahir Dar");
INSERT INTO master_locations VALUES("1577","71","Beica");
INSERT INTO master_locations VALUES("1578","71","Bulchi");
INSERT INTO master_locations VALUES("1579","71","Dessie");
INSERT INTO master_locations VALUES("1580","71","Dembidolo");
INSERT INTO master_locations VALUES("1581","71","Debre Marqos");
INSERT INTO master_locations VALUES("1582","71","Dire Dawa");
INSERT INTO master_locations VALUES("1583","71","Debre Tabor");
INSERT INTO master_locations VALUES("1584","71","Finicha\\\'a");
INSERT INTO master_locations VALUES("1585","71","Goba");
INSERT INTO master_locations VALUES("1586","71","Gambela");
INSERT INTO master_locations VALUES("1587","71","Gondar");
INSERT INTO master_locations VALUES("1588","71","Gode");
INSERT INTO master_locations VALUES("1589","71","Gore");
INSERT INTO master_locations VALUES("1590","71","Debre Zeyit");
INSERT INTO master_locations VALUES("1591","71","Humera");
INSERT INTO master_locations VALUES("1592","71","Jimma");
INSERT INTO master_locations VALUES("1593","71","Kabri Dar");
INSERT INTO master_locations VALUES("1594","71","Kelafo");
INSERT INTO master_locations VALUES("1595","71","Awasa");
INSERT INTO master_locations VALUES("1596","71","Mek\\\'ele");
INSERT INTO master_locations VALUES("1597","71","Mizan Teferi");
INSERT INTO master_locations VALUES("1598","71","Negele Boran");
INSERT INTO master_locations VALUES("1599","71","Nejo");
INSERT INTO master_locations VALUES("1600","71","Nekemte");
INSERT INTO master_locations VALUES("1601","71","Asosa");
INSERT INTO master_locations VALUES("1602","71","Tippi");
INSERT INTO master_locations VALUES("1603","71","Wacca");
INSERT INTO master_locations VALUES("1604","36","Bujumbura");
INSERT INTO master_locations VALUES("1605","36","Gitega");
INSERT INTO master_locations VALUES("1606","36","Kirundo");
INSERT INTO master_locations VALUES("1607","198","Alula");
INSERT INTO master_locations VALUES("1608","36","Baidoa");
INSERT INTO master_locations VALUES("1609","36","Candala");
INSERT INTO master_locations VALUES("1610","36","Bardera");
INSERT INTO master_locations VALUES("1611","36","Eil");
INSERT INTO master_locations VALUES("1612","36","Boosaaso");
INSERT INTO master_locations VALUES("1613","36","Gardo");
INSERT INTO master_locations VALUES("1614","36","Hargeisa");
INSERT INTO master_locations VALUES("1615","36","Berbera");
INSERT INTO master_locations VALUES("1616","36","Kisimayu");
INSERT INTO master_locations VALUES("1617","36","Mogadishu");
INSERT INTO master_locations VALUES("1618","36","Obbia");
INSERT INTO master_locations VALUES("1619","36","Galcaio");
INSERT INTO master_locations VALUES("1620","36","Scusciuban");
INSERT INTO master_locations VALUES("1621","36","Erigavo");
INSERT INTO master_locations VALUES("1622","36","Burao");
INSERT INTO master_locations VALUES("1623","61","Assa-Gueyla");
INSERT INTO master_locations VALUES("1624","61","Djibouti City");
INSERT INTO master_locations VALUES("1625","61","Ali-Sabieh");
INSERT INTO master_locations VALUES("1626","61","Chabelley");
INSERT INTO master_locations VALUES("1627","61","Dikhil");
INSERT INTO master_locations VALUES("1628","61","Herkale");
INSERT INTO master_locations VALUES("1629","61","Moucha Island");
INSERT INTO master_locations VALUES("1630","61","Obock");
INSERT INTO master_locations VALUES("1631","61","Tadjoura");
INSERT INTO master_locations VALUES("1632","66","El Arish");
INSERT INTO master_locations VALUES("1633","66","Assiut");
INSERT INTO master_locations VALUES("1634","66","Alexandria");
INSERT INTO master_locations VALUES("1635","66","Abu Simbel");
INSERT INTO master_locations VALUES("1636","66","Cairo");
INSERT INTO master_locations VALUES("1637","66","Cairo West");
INSERT INTO master_locations VALUES("1638","66","Hurghada");
INSERT INTO master_locations VALUES("1639","66","El Gora");
INSERT INTO master_locations VALUES("1640","66","Luxor");
INSERT INTO master_locations VALUES("1641","66","Marsa Alam");
INSERT INTO master_locations VALUES("1642","66","Mersa Matruh");
INSERT INTO master_locations VALUES("1643","66","New Valley");
INSERT INTO master_locations VALUES("1644","66","Egypt");
INSERT INTO master_locations VALUES("1645","66","Port Said");
INSERT INTO master_locations VALUES("1646","66","St. Catherine");
INSERT INTO master_locations VALUES("1647","66","Sharm El Sheikh");
INSERT INTO master_locations VALUES("1648","66","Aswan");
INSERT INTO master_locations VALUES("1649","66","Taba");
INSERT INTO master_locations VALUES("1650","69","Asmara");
INSERT INTO master_locations VALUES("1651","69","Massawa");
INSERT INTO master_locations VALUES("1652","69","Assab");
INSERT INTO master_locations VALUES("1653","69","Teseney");
INSERT INTO master_locations VALUES("1654","112","Amboseli");
INSERT INTO master_locations VALUES("1655","112","Eldoret");
INSERT INTO master_locations VALUES("1656","112","Eliye Springs");
INSERT INTO master_locations VALUES("1657","112","Kalokol");
INSERT INTO master_locations VALUES("1658","112","Garissa");
INSERT INTO master_locations VALUES("1659","112","Hola");
INSERT INTO master_locations VALUES("1660","112","Nairobi");
INSERT INTO master_locations VALUES("1661","112","Kisumu");
INSERT INTO master_locations VALUES("1662","112","Kilaguni");
INSERT INTO master_locations VALUES("1663","112","Kericho");
INSERT INTO master_locations VALUES("1664","112","Kitale");
INSERT INTO master_locations VALUES("1665","112","Lodwar");
INSERT INTO master_locations VALUES("1666","112","Lamu");
INSERT INTO master_locations VALUES("1667","112","Loiyangalani");
INSERT INTO master_locations VALUES("1668","112","Mandera");
INSERT INTO master_locations VALUES("1669","112","Marsabit");
INSERT INTO master_locations VALUES("1670","112","Malindi");
INSERT INTO master_locations VALUES("1671","112","Mombasa");
INSERT INTO master_locations VALUES("1672","112","Moyale");
INSERT INTO master_locations VALUES("1673","112","Nyeri");
INSERT INTO master_locations VALUES("1674","112","Nakuru");
INSERT INTO master_locations VALUES("1675","112","Nanyuki");
INSERT INTO master_locations VALUES("1676","112","Samburu");
INSERT INTO master_locations VALUES("1677","112","Wajir");
INSERT INTO master_locations VALUES("1678","123","Ghat");
INSERT INTO master_locations VALUES("1679","123","Kufra");
INSERT INTO master_locations VALUES("1680","123","Benghazi");
INSERT INTO master_locations VALUES("1681","123","Tripoli");
INSERT INTO master_locations VALUES("1682","123","Bayda");
INSERT INTO master_locations VALUES("1683","123","Sabha");
INSERT INTO master_locations VALUES("1684","123","Brega");
INSERT INTO master_locations VALUES("1685","123","Ghadames");
INSERT INTO master_locations VALUES("1686","180","Gisenyi");
INSERT INTO master_locations VALUES("1687","180","Butare");
INSERT INTO master_locations VALUES("1688","180","Kigali");
INSERT INTO master_locations VALUES("1689","180","Ruhengeri");
INSERT INTO master_locations VALUES("1690","180","Cyangugu");
INSERT INTO master_locations VALUES("1691","203","Atbara");
INSERT INTO master_locations VALUES("1692","203","Eldebba");
INSERT INTO master_locations VALUES("1693","203","Dongola");
INSERT INTO master_locations VALUES("1694","203","El Fasher");
INSERT INTO master_locations VALUES("1695","203","Dinder");
INSERT INTO master_locations VALUES("1696","203","Geneina");
INSERT INTO master_locations VALUES("1697","203","Kassala");
INSERT INTO master_locations VALUES("1698","203","Khashm El Girba");
INSERT INTO master_locations VALUES("1699","203","Kosti");
INSERT INTO master_locations VALUES("1700","203","Maridi");
INSERT INTO master_locations VALUES("1701","203","Merowe");
INSERT INTO master_locations VALUES("1702","203","En Nahud");
INSERT INTO master_locations VALUES("1703","203","Nyala");
INSERT INTO master_locations VALUES("1704","203","El Obeid");
INSERT INTO master_locations VALUES("1705","203","Port Sudan");
INSERT INTO master_locations VALUES("1706","203","Juba");
INSERT INTO master_locations VALUES("1707","203","Malakal");
INSERT INTO master_locations VALUES("1708","203","Khartoum");
INSERT INTO master_locations VALUES("1709","203","Wadi Halfa");
INSERT INTO master_locations VALUES("1710","203","Wau");
INSERT INTO master_locations VALUES("1711","212","Arusha");
INSERT INTO master_locations VALUES("1712","212","Bukoba");
INSERT INTO master_locations VALUES("1713","212","Dar es Salaam");
INSERT INTO master_locations VALUES("1714","212","Dodoma");
INSERT INTO master_locations VALUES("1715","212","Iringa");
INSERT INTO master_locations VALUES("1716","212","Kigoma");
INSERT INTO master_locations VALUES("1717","212","Kilwa Masoko");
INSERT INTO master_locations VALUES("1718","212","Mount Kilimanjaro");
INSERT INTO master_locations VALUES("1719","212","Lindi");
INSERT INTO master_locations VALUES("1720","212","Lake Manyara");
INSERT INTO master_locations VALUES("1721","212","Mafia");
INSERT INTO master_locations VALUES("1722","212","Mbeya");
INSERT INTO master_locations VALUES("1723","212","Mwadui");
INSERT INTO master_locations VALUES("1724","212","Masasi");
INSERT INTO master_locations VALUES("1725","212","Moshi");
INSERT INTO master_locations VALUES("1726","212","Mtwara");
INSERT INTO master_locations VALUES("1727","212","Musoma");
INSERT INTO master_locations VALUES("1728","212","Mwanza");
INSERT INTO master_locations VALUES("1729","212","Nachingwea");
INSERT INTO master_locations VALUES("1730","212","Njombe");
INSERT INTO master_locations VALUES("1731","212","Seronera");
INSERT INTO master_locations VALUES("1732","212","Songea");
INSERT INTO master_locations VALUES("1733","212","Sumbawanga");
INSERT INTO master_locations VALUES("1734","212","Shinyanga");
INSERT INTO master_locations VALUES("1735","212","Tabora");
INSERT INTO master_locations VALUES("1736","212","Tanga");
INSERT INTO master_locations VALUES("1737","212","Zanzibar");
INSERT INTO master_locations VALUES("1738","223","Adjumani");
INSERT INTO master_locations VALUES("1739","223","Arua");
INSERT INTO master_locations VALUES("1740","223","Bundibugyo");
INSERT INTO master_locations VALUES("1741","223","Entebbe (near Kampala)");
INSERT INTO master_locations VALUES("1742","223","Gulu");
INSERT INTO master_locations VALUES("1743","223","Jinja");
INSERT INTO master_locations VALUES("1744","223","Kampala");
INSERT INTO master_locations VALUES("1745","223","Kabale");
INSERT INTO master_locations VALUES("1746","223","Kabalega Falls");
INSERT INTO master_locations VALUES("1747","223","Kasese");
INSERT INTO master_locations VALUES("1748","223","Kotido");
INSERT INTO master_locations VALUES("1749","223","Mbarara");
INSERT INTO master_locations VALUES("1750","223","Masindi");
INSERT INTO master_locations VALUES("1751","223","Pakuba");
INSERT INTO master_locations VALUES("1752","223","Soroti");
INSERT INTO master_locations VALUES("1753","223","Tororo");
INSERT INTO master_locations VALUES("1754","3","Tirana");
INSERT INTO master_locations VALUES("1755","3","Gjader");
INSERT INTO master_locations VALUES("1756","3","Korce");
INSERT INTO master_locations VALUES("1757","3","Kukes");
INSERT INTO master_locations VALUES("1758","3","Kucove");
INSERT INTO master_locations VALUES("1759","3","Shkoder (Shkodra)");
INSERT INTO master_locations VALUES("1760","3","Sarande (Saranda)");
INSERT INTO master_locations VALUES("1761","3","Vlore (Vlora)");
INSERT INTO master_locations VALUES("1762","34","Burgas");
INSERT INTO master_locations VALUES("1763","34","Burgas Province");
INSERT INTO master_locations VALUES("1764","34","Sofia");
INSERT INTO master_locations VALUES("1765","34","Gorna Oryahovitsa");
INSERT INTO master_locations VALUES("1766","34","Haskovo");
INSERT INTO master_locations VALUES("1767","34","Yambol Province");
INSERT INTO master_locations VALUES("1768","34","Kyrdjali");
INSERT INTO master_locations VALUES("1769","34","Kazanlyk");
INSERT INTO master_locations VALUES("1770","34","Gabrovnitsa (Gabrovnica)");
INSERT INTO master_locations VALUES("1771","34","Plovdiv");
INSERT INTO master_locations VALUES("1772","34","Graf Ignatievo / Plovdiv");
INSERT INTO master_locations VALUES("1773","34","Pernik");
INSERT INTO master_locations VALUES("1774","34","Dolna Mitropoliia / Pleven");
INSERT INTO master_locations VALUES("1775","34","Primorsko (private)");
INSERT INTO master_locations VALUES("1776","34","Rousse");
INSERT INTO master_locations VALUES("1777","34","Dobroslavtsi (Dobroslavci)");
INSERT INTO master_locations VALUES("1778","34","Sliven");
INSERT INTO master_locations VALUES("1779","34","Silistra");
INSERT INTO master_locations VALUES("1780","34","Stara Zagora");
INSERT INTO master_locations VALUES("1781","34","Targovishte");
INSERT INTO master_locations VALUES("1782","34","Voden");
INSERT INTO master_locations VALUES("1783","34","Vidin");
INSERT INTO master_locations VALUES("1784","34","Balchik");
INSERT INTO master_locations VALUES("1785","34","Varna");
INSERT INTO master_locations VALUES("1786","58","Lefkosa");
INSERT INTO master_locations VALUES("1787","58","Larnaca");
INSERT INTO master_locations VALUES("1788","58","Nicosia");
INSERT INTO master_locations VALUES("1789","58","Paphos");
INSERT INTO master_locations VALUES("1790","58","Akrotiri");
INSERT INTO master_locations VALUES("1791","56","Daruvar");
INSERT INTO master_locations VALUES("1792","56","Zagreb");
INSERT INTO master_locations VALUES("1793","56","Ploce");
INSERT INTO master_locations VALUES("1794","56","Dubrovnik");
INSERT INTO master_locations VALUES("1795","56","Losinj");
INSERT INTO master_locations VALUES("1796","56","Borovo");
INSERT INTO master_locations VALUES("1797","56","Cepin");
INSERT INTO master_locations VALUES("1798","56","Slavonski Brod");
INSERT INTO master_locations VALUES("1799","56","Osijek");
INSERT INTO master_locations VALUES("1800","56","Pula");
INSERT INTO master_locations VALUES("1801","56","Medulin");
INSERT INTO master_locations VALUES("1802","56","Unije");
INSERT INTO master_locations VALUES("1803","56","Vrsar");
INSERT INTO master_locations VALUES("1804","56","Grobnik");
INSERT INTO master_locations VALUES("1805","56","Rijeka");
INSERT INTO master_locations VALUES("1806","56","Otocac");
INSERT INTO master_locations VALUES("1807","56","Brac");
INSERT INTO master_locations VALUES("1808","56","Hvar");
INSERT INTO master_locations VALUES("1809","56","Split");
INSERT INTO master_locations VALUES("1810","56","Sinj");
INSERT INTO master_locations VALUES("1811","56","Varazdin");
INSERT INTO master_locations VALUES("1812","56","Cakovec");
INSERT INTO master_locations VALUES("1813","56","Koprivnica");
INSERT INTO master_locations VALUES("1814","56","Zadar");
INSERT INTO master_locations VALUES("1815","56","Udbina");
INSERT INTO master_locations VALUES("1816","201","Alicante");
INSERT INTO master_locations VALUES("1817","201","Almeria");
INSERT INTO master_locations VALUES("1818","201","Asturias");
INSERT INTO master_locations VALUES("1819","201","Cordoba Andalucia");
INSERT INTO master_locations VALUES("1820","201","Biscay");
INSERT INTO master_locations VALUES("1821","201","Spain");
INSERT INTO master_locations VALUES("1822","201","Barcelona / El Prat de Llobregat");
INSERT INTO master_locations VALUES("1823","201","Badajoz");
INSERT INTO master_locations VALUES("1824","201","Galicia");
INSERT INTO master_locations VALUES("1825","201","Madrid");
INSERT INTO master_locations VALUES("1826","201","Girona");
INSERT INTO master_locations VALUES("1827","201","Granada");
INSERT INTO master_locations VALUES("1828","201","Huesca");
INSERT INTO master_locations VALUES("1829","201","Balearic Islands");
INSERT INTO master_locations VALUES("1830","201","Cadiz");
INSERT INTO master_locations VALUES("1831","201","Region de Murcia");
INSERT INTO master_locations VALUES("1832","201","Barcelona");
INSERT INTO master_locations VALUES("1833","201","Leon");
INSERT INTO master_locations VALUES("1834","201","Ciudad Real");
INSERT INTO master_locations VALUES("1835","201","Malaga");
INSERT INTO master_locations VALUES("1836","201","Palma de Mallorca");
INSERT INTO master_locations VALUES("1837","201","Navarre");
INSERT INTO master_locations VALUES("1838","201","Murcia");
INSERT INTO master_locations VALUES("1839","201","Logrono");
INSERT INTO master_locations VALUES("1840","201","Tarragona");
INSERT INTO master_locations VALUES("1841","201","Rota");
INSERT INTO master_locations VALUES("1842","201","Gipuzkoa");
INSERT INTO master_locations VALUES("1843","201","Valencia");
INSERT INTO master_locations VALUES("1844","201","Valladolid");
INSERT INTO master_locations VALUES("1845","201","Alava");
INSERT INTO master_locations VALUES("1846","201","Cantabria");
INSERT INTO master_locations VALUES("1847","201","Zaragoza");
INSERT INTO master_locations VALUES("1848","201","Sevilla");
INSERT INTO master_locations VALUES("1849","76","Dieppe");
INSERT INTO master_locations VALUES("1850","76","Dunkerque");
INSERT INTO master_locations VALUES("1851","76","Compiegne");
INSERT INTO master_locations VALUES("1852","76","Le Treport");
INSERT INTO master_locations VALUES("1853","76","Laon");
INSERT INTO master_locations VALUES("1854","76","Peronne");
INSERT INTO master_locations VALUES("1855","76","Nangis");
INSERT INTO master_locations VALUES("1856","76","Argentan");
INSERT INTO master_locations VALUES("1857","76","La Fleche");
INSERT INTO master_locations VALUES("1858","76","Berck-sur-Mer");
INSERT INTO master_locations VALUES("1859","76","Bagnoles-de-l\\\'Orne");
INSERT INTO master_locations VALUES("1860","76","Rethel");
INSERT INTO master_locations VALUES("1861","76","Albert");
INSERT INTO master_locations VALUES("1862","76","Montdidier");
INSERT INTO master_locations VALUES("1863","76","Falaise");
INSERT INTO master_locations VALUES("1864","76","Le Touquet-Paris-Plage");
INSERT INTO master_locations VALUES("1865","76","Vauville");
INSERT INTO master_locations VALUES("1866","76","Valenciennes");
INSERT INTO master_locations VALUES("1867","76","Villerupt");
INSERT INTO master_locations VALUES("1868","76","Mortagne-au-Perche");
INSERT INTO master_locations VALUES("1869","76","Amiens");
INSERT INTO master_locations VALUES("1870","76","Saint-Brieuc");
INSERT INTO master_locations VALUES("1871","76","Agen");
INSERT INTO master_locations VALUES("1872","76","Bordeaux");
INSERT INTO master_locations VALUES("1873","76","Bergerac");
INSERT INTO master_locations VALUES("1874","76","Cognac");
INSERT INTO master_locations VALUES("1875","76","La Rochelle");
INSERT INTO master_locations VALUES("1876","76","Poitiers");
INSERT INTO master_locations VALUES("1877","76","Saint-Junien");
INSERT INTO master_locations VALUES("1878","76","Montlucon ");
INSERT INTO master_locations VALUES("1879","76","Limoges");
INSERT INTO master_locations VALUES("1880","76","Mont-de-Marsan");
INSERT INTO master_locations VALUES("1881","76","Niort");
INSERT INTO master_locations VALUES("1882","76","Toulouse");
INSERT INTO master_locations VALUES("1883","76","Pyrenees");
INSERT INTO master_locations VALUES("1884","76","Lherm");
INSERT INTO master_locations VALUES("1885","76","Biscarrosse");
INSERT INTO master_locations VALUES("1886","76","Tarbes");
INSERT INTO master_locations VALUES("1887","76","Angouleme");
INSERT INTO master_locations VALUES("1888","76","Brive");
INSERT INTO master_locations VALUES("1889","76","Perigueux");
INSERT INTO master_locations VALUES("1890","76","Dax");
INSERT INTO master_locations VALUES("1891","76","Biarritz");
INSERT INTO master_locations VALUES("1892","76","Chatellerault");
INSERT INTO master_locations VALUES("1893","76","Bagneres-de-Luchon");
INSERT INTO master_locations VALUES("1894","76","Cahors");
INSERT INTO master_locations VALUES("1895","76","Andernos-les-Bains");
INSERT INTO master_locations VALUES("1896","76","Gueret");
INSERT INTO master_locations VALUES("1897","76","Figeac");
INSERT INTO master_locations VALUES("1898","76","Saint-Girons");
INSERT INTO master_locations VALUES("1899","76","Arcachon");
INSERT INTO master_locations VALUES("1900","76","Albi");
INSERT INTO master_locations VALUES("1901","76","Jonzac");
INSERT INTO master_locations VALUES("1902","76","Mazamet");
INSERT INTO master_locations VALUES("1903","76","Millau");
INSERT INTO master_locations VALUES("1904","76","Nogaro");
INSERT INTO master_locations VALUES("1905","76","Oloron");
INSERT INTO master_locations VALUES("1906","76","Pons");
INSERT INTO master_locations VALUES("1907","76","Graulhet");
INSERT INTO master_locations VALUES("1908","76","Rodez");
INSERT INTO master_locations VALUES("1909","76","Thouars");
INSERT INTO master_locations VALUES("1910","76","Thalamy");
INSERT INTO master_locations VALUES("1911","76","Villefranche-de-Rouergue");
INSERT INTO master_locations VALUES("1912","76","Villeneuve-sur-Lot");
INSERT INTO master_locations VALUES("1913","76","Castelsarrasin");
INSERT INTO master_locations VALUES("1914","76","Royan");
INSERT INTO master_locations VALUES("1915","76","Mimizan");
INSERT INTO master_locations VALUES("1916","76","Aire-sur-l\\\'Adour");
INSERT INTO master_locations VALUES("1917","76","Montauban");
INSERT INTO master_locations VALUES("1918","76","Montendre");
INSERT INTO master_locations VALUES("1919","76","Egletons");
INSERT INTO master_locations VALUES("1920","76","Sainte-Foy-la-Grande");
INSERT INTO master_locations VALUES("1921","76","Gaillac");
INSERT INTO master_locations VALUES("1922","76","Auch");
INSERT INTO master_locations VALUES("1923","76","Libourne");
INSERT INTO master_locations VALUES("1924","76","Pamiers");
INSERT INTO master_locations VALUES("1925","76","Soulac-sur-Mer");
INSERT INTO master_locations VALUES("1926","76","Loudun");
INSERT INTO master_locations VALUES("1927","76","Marmande");
INSERT INTO master_locations VALUES("1928","76","Rochefort");
INSERT INTO master_locations VALUES("1929","76","Saint-Pierre d\\\\\\\'Oleron");
INSERT INTO master_locations VALUES("1930","76","Castelnau");
INSERT INTO master_locations VALUES("1931","76","La Reole");
INSERT INTO master_locations VALUES("1932","76","Sarlat");
INSERT INTO master_locations VALUES("1933","76","Lesparre-Medoc");
INSERT INTO master_locations VALUES("1934","76","Couhe");
INSERT INTO master_locations VALUES("1935","76","Chauvigny");
INSERT INTO master_locations VALUES("1936","76","Fumel");
INSERT INTO master_locations VALUES("1937","76","Belle Ile");
INSERT INTO master_locations VALUES("1938","76","Dinan");
INSERT INTO master_locations VALUES("1939","76","Ouessant");
INSERT INTO master_locations VALUES("1940","76","Pontivy");
INSERT INTO master_locations VALUES("1941","76","Amboise");
INSERT INTO master_locations VALUES("1942","76","Argenton-sur-Creuse");
INSERT INTO master_locations VALUES("1943","76","Aubigny-sur-Nere");
INSERT INTO master_locations VALUES("1944","76","Briare");
INSERT INTO master_locations VALUES("1945","76","Chateauroux ");
INSERT INTO master_locations VALUES("1946","76","Issoudun");
INSERT INTO master_locations VALUES("1947","76","Le Blanc");
INSERT INTO master_locations VALUES("1948","76","Montargis");
INSERT INTO master_locations VALUES("1949","76","Tours");
INSERT INTO master_locations VALUES("1950","76","Saint-Malo");
INSERT INTO master_locations VALUES("1951","76","Pouilly-en-Auxois");
INSERT INTO master_locations VALUES("1952","76","Quiberon");
INSERT INTO master_locations VALUES("1953","76","Redon");
INSERT INTO master_locations VALUES("1954","76","Guiscriff");
INSERT INTO master_locations VALUES("1955","76","Til Chatel ");
INSERT INTO master_locations VALUES("1956","76","Bar-le-Duc");
INSERT INTO master_locations VALUES("1957","76","Gray");
INSERT INTO master_locations VALUES("1958","76","Saulieu");
INSERT INTO master_locations VALUES("1959","76","Nancy");
INSERT INTO master_locations VALUES("1960","76","Ile d\\\\\\\'Yeu");
INSERT INTO master_locations VALUES("1961","76","Buno");
INSERT INTO master_locations VALUES("1962","76","Mantes");
INSERT INTO master_locations VALUES("1963","76","Saint-Andre-de-l\\\\\\\'Eure");
INSERT INTO master_locations VALUES("1964","76","Enghien");
INSERT INTO master_locations VALUES("1965","76","La Ferte-Gaucher ");
INSERT INTO master_locations VALUES("1966","76","Chateau-Thierry");
INSERT INTO master_locations VALUES("1967","76","Ancenis");
INSERT INTO master_locations VALUES("1968","76","Joinville");
INSERT INTO master_locations VALUES("1969","76","Fontenay-le-Comte");
INSERT INTO master_locations VALUES("1970","76","Bailleau-Armenonville");
INSERT INTO master_locations VALUES("1971","76","Lamotte-Beuvron");
INSERT INTO master_locations VALUES("1972","76"," Brienne-Le-Chateau");
INSERT INTO master_locations VALUES("1973","76","Pithiviers");
INSERT INTO master_locations VALUES("1974","76"," La Ferte-Alais");
INSERT INTO master_locations VALUES("1975","76","Bar-sur-Seine");
INSERT INTO master_locations VALUES("1976","76","Neufchateau");
INSERT INTO master_locations VALUES("1977","76","Chateauneuf-sur-Cher");
INSERT INTO master_locations VALUES("1978","76","Vierzon");
INSERT INTO master_locations VALUES("1979","76","Montaigu");
INSERT INTO master_locations VALUES("1980","76","Tournus");
INSERT INTO master_locations VALUES("1981","76","Etrepagny");
INSERT INTO master_locations VALUES("1982","76","Sezanne");
INSERT INTO master_locations VALUES("1983","76","Colmar");
INSERT INTO master_locations VALUES("1984","76","Mulhouse");
INSERT INTO master_locations VALUES("1985","76","Strasbourg");
INSERT INTO master_locations VALUES("1986","76","Arbois");
INSERT INTO master_locations VALUES("1987","76","Avallon");
INSERT INTO master_locations VALUES("1988","76","Beaune");
INSERT INTO master_locations VALUES("1989","76","Belfort");
INSERT INTO master_locations VALUES("1990","76","Cosne-Cours-sur-Loire");
INSERT INTO master_locations VALUES("1991","76","Dijon");
INSERT INTO master_locations VALUES("1992","76","Dole");
INSERT INTO master_locations VALUES("1993","76","Joigny");
INSERT INTO master_locations VALUES("1994","76","Lons-le-Saunier");
INSERT INTO master_locations VALUES("1995","76","Montceau-les-Mines");
INSERT INTO master_locations VALUES("1996","76","Paray-le-Monial");
INSERT INTO master_locations VALUES("1997","76","Pont-sur-Yonne");
INSERT INTO master_locations VALUES("1998","76","Saint-Florentin");
INSERT INTO master_locations VALUES("1999","76","Semur-en-Auxois");
INSERT INTO master_locations VALUES("2000","76","Doncourt Les Conflans");
INSERT INTO master_locations VALUES("2001","76","Longuyon");
INSERT INTO master_locations VALUES("2002","76","Sarrebourg");
INSERT INTO master_locations VALUES("2003","76","Sarreguemines");
INSERT INTO master_locations VALUES("2004","76","Thionville");
INSERT INTO master_locations VALUES("2005","76","Verdun");
INSERT INTO master_locations VALUES("2006","76","Champagnole");
INSERT INTO master_locations VALUES("2007","76","Saint-Die");
INSERT INTO master_locations VALUES("2008","76","Nuits-Saint-Georges");
INSERT INTO master_locations VALUES("2009","76","Issoire");
INSERT INTO master_locations VALUES("2010","76","Perouges");
INSERT INTO master_locations VALUES("2011","76","Pierrelatte");
INSERT INTO master_locations VALUES("2012","76","Romans-sur-Isere");
INSERT INTO master_locations VALUES("2013","76","Ruoms");
INSERT INTO master_locations VALUES("2014","76","Saint-Chamond");
INSERT INTO master_locations VALUES("2015","76","Vienne");
INSERT INTO master_locations VALUES("2016","76","Morestel");
INSERT INTO master_locations VALUES("2017","76","Lyon");
INSERT INTO master_locations VALUES("2018","76","Langogne");
INSERT INTO master_locations VALUES("2019","76","Megeve");
INSERT INTO master_locations VALUES("2020","76","Bellegarde");
INSERT INTO master_locations VALUES("2021","76","Aubenas");
INSERT INTO master_locations VALUES("2022","76","Le Puy-en-Velay");
INSERT INTO master_locations VALUES("2023","76","Saint-Flour");
INSERT INTO master_locations VALUES("2024","76","Brioude");
INSERT INTO master_locations VALUES("2025","76","Bourg-en-Bresse");
INSERT INTO master_locations VALUES("2026","76","Ambert");
INSERT INTO master_locations VALUES("2027","76","L\\\'Alpe d\\\'Huez");
INSERT INTO master_locations VALUES("2028","76","Tarare");
INSERT INTO master_locations VALUES("2029","76","Rhone");
INSERT INTO master_locations VALUES("2030","76","Lapalisse");
INSERT INTO master_locations VALUES("2031","76","Moulins");
INSERT INTO master_locations VALUES("2032","76","Sallanches");
INSERT INTO master_locations VALUES("2033","76","Belves");
INSERT INTO master_locations VALUES("2034","76","Condom");
INSERT INTO master_locations VALUES("2035","76","Saint-Affrique");
INSERT INTO master_locations VALUES("2036","76","Cassagnes-Begonhes");
INSERT INTO master_locations VALUES("2037","76","Chalais");
INSERT INTO master_locations VALUES("2038","76","Riberac");
INSERT INTO master_locations VALUES("2039","76","Rion-des-Landes");
INSERT INTO master_locations VALUES("2040","76","Saint-Gaudens");
INSERT INTO master_locations VALUES("2041","76","Toulouse-Montaudran");
INSERT INTO master_locations VALUES("2042","76","Peyresourde");
INSERT INTO master_locations VALUES("2043","76","Revel");
INSERT INTO master_locations VALUES("2044","76","Saint-Inglevert");
INSERT INTO master_locations VALUES("2045","76","Vendays-Montalivet");
INSERT INTO master_locations VALUES("2046","76","Itxassou");
INSERT INTO master_locations VALUES("2047","76","Saint Jean d\\\\\\\'Angely");
INSERT INTO master_locations VALUES("2048","76","Chaumont");
INSERT INTO master_locations VALUES("2049","76","Mauleon");
INSERT INTO master_locations VALUES("2050","76","Clamecy");
INSERT INTO master_locations VALUES("2051","76","Corlier");
INSERT INTO master_locations VALUES("2052","76","La Motte-Chalancon");
INSERT INTO master_locations VALUES("2053","76","Aubenasson");
INSERT INTO master_locations VALUES("2054","76","Cazeres");
INSERT INTO master_locations VALUES("2055","76","Marennes");
INSERT INTO master_locations VALUES("2056","76","Metz");
INSERT INTO master_locations VALUES("2057","76","Angers");
INSERT INTO master_locations VALUES("2058","76","Soissons");
INSERT INTO master_locations VALUES("2059","76","Lurcy");
INSERT INTO master_locations VALUES("2060","76","Albertville");
INSERT INTO master_locations VALUES("2061","76","Bastia");
INSERT INTO master_locations VALUES("2062","76","Calvi");
INSERT INTO master_locations VALUES("2063","76","Sollieres-Sardieres");
INSERT INTO master_locations VALUES("2064","76","Saint-Jean-en-Royans");
INSERT INTO master_locations VALUES("2065","76","Figari");
INSERT INTO master_locations VALUES("2066","76","Ghisonaccia");
INSERT INTO master_locations VALUES("2067","76","Saint-Jean-d\\\'Avelanne");
INSERT INTO master_locations VALUES("2068","76","Ajaccio");
INSERT INTO master_locations VALUES("2069","76","Saint-Galmier");
INSERT INTO master_locations VALUES("2070","76","Propriano");
INSERT INTO master_locations VALUES("2071","76","La Tour-du-Pin");
INSERT INTO master_locations VALUES("2072","76","Saint-Remy-de-Maurienne");
INSERT INTO master_locations VALUES("2073","76","Solenzara");
INSERT INTO master_locations VALUES("2074","76","Corte");
INSERT INTO master_locations VALUES("2075","76","Meribel ");
INSERT INTO master_locations VALUES("2076","76","Belley");
INSERT INTO master_locations VALUES("2077","76","Saint-Claude");
INSERT INTO master_locations VALUES("2078","76","Auxerre");
INSERT INTO master_locations VALUES("2079","76","Aix-les-Bains");
INSERT INTO master_locations VALUES("2080","76","Clermont-Ferrand");
INSERT INTO master_locations VALUES("2081","76","Bourges");
INSERT INTO master_locations VALUES("2082","76","Chambery ");
INSERT INTO master_locations VALUES("2083","76","Grenoble");
INSERT INTO master_locations VALUES("2084","76","Chalon");
INSERT INTO master_locations VALUES("2085","76","Annemasse");
INSERT INTO master_locations VALUES("2086","76","Courchevel");
INSERT INTO master_locations VALUES("2087","76","Oyonnax");
INSERT INTO master_locations VALUES("2088","76","Macon");
INSERT INTO master_locations VALUES("2089","76","Saint-Yan");
INSERT INTO master_locations VALUES("2090","76","Roanne");
INSERT INTO master_locations VALUES("2091","76","Annecy");
INSERT INTO master_locations VALUES("2092","76","Montelimar");
INSERT INTO master_locations VALUES("2093","76","Saint-Rambert-d\\\'Albon");
INSERT INTO master_locations VALUES("2094","76","Valence");
INSERT INTO master_locations VALUES("2095","76","Vichy");
INSERT INTO master_locations VALUES("2096","76","Aurillac");
INSERT INTO master_locations VALUES("2097","76","Deols");
INSERT INTO master_locations VALUES("2098","76","Feurs");
INSERT INTO master_locations VALUES("2099","76","Aix-les-Milles");
INSERT INTO master_locations VALUES("2100","76","Le Luc");
INSERT INTO master_locations VALUES("2101","76","Cannes");
INSERT INTO master_locations VALUES("2102","76"," Nimes");
INSERT INTO master_locations VALUES("2103","76","Fayence");
INSERT INTO master_locations VALUES("2104","76","La Montagne Noire");
INSERT INTO master_locations VALUES("2105","76","Saint Etienne");
INSERT INTO master_locations VALUES("2106","76","Istres");
INSERT INTO master_locations VALUES("2107","76","Carcassonne");
INSERT INTO master_locations VALUES("2108","76","Marseille");
INSERT INTO master_locations VALUES("2109","76","Aix-en-Provence");
INSERT INTO master_locations VALUES("2110","76","Nice");
INSERT INTO master_locations VALUES("2111","76","Orange");
INSERT INTO master_locations VALUES("2112","76","Perpignan");
INSERT INTO master_locations VALUES("2113","76","Le Castellet");
INSERT INTO master_locations VALUES("2114","76","Barcelonnette");
INSERT INTO master_locations VALUES("2115","76","Ales");
INSERT INTO master_locations VALUES("2116","76","Montpellier");
INSERT INTO master_locations VALUES("2117","76","Beziers");
INSERT INTO master_locations VALUES("2118","76","Avignon");
INSERT INTO master_locations VALUES("2119","76","Castelnaudary");
INSERT INTO master_locations VALUES("2120","76","Chateau-Arnoux");
INSERT INTO master_locations VALUES("2121","76","Lezignan-Corbieres");
INSERT INTO master_locations VALUES("2122","76","Gap");
INSERT INTO master_locations VALUES("2123","76","Mende");
INSERT INTO master_locations VALUES("2124","76","Mont-Dauphin");
INSERT INTO master_locations VALUES("2125","76","Pont-Saint-Esprit");
INSERT INTO master_locations VALUES("2126","76","Salon");
INSERT INTO master_locations VALUES("2127","76","Vinon");
INSERT INTO master_locations VALUES("2128","76","Carpentras");
INSERT INTO master_locations VALUES("2129","76","Aspres-sur-Buech");
INSERT INTO master_locations VALUES("2130","76","Saint-Martin-de-Londres");
INSERT INTO master_locations VALUES("2131","76","Florac");
INSERT INTO master_locations VALUES("2132","76","Pezenas");
INSERT INTO master_locations VALUES("2133","76","Mont-Louis");
INSERT INTO master_locations VALUES("2134","76","Berre");
INSERT INTO master_locations VALUES("2135","76","Sisteron");
INSERT INTO master_locations VALUES("2136","76","Uzes");
INSERT INTO master_locations VALUES("2137","76","Valreas");
INSERT INTO master_locations VALUES("2138","76","Puivert");
INSERT INTO master_locations VALUES("2139","76","Bedarieux");
INSERT INTO master_locations VALUES("2140","76","Le Mazet");
INSERT INTO master_locations VALUES("2141","76","Beauvais");
INSERT INTO master_locations VALUES("2142","76","Chateaudun");
INSERT INTO master_locations VALUES("2143","76","Saumur");
INSERT INTO master_locations VALUES("2144","76","Evreux");
INSERT INTO master_locations VALUES("2145","76","Aleneon");
INSERT INTO master_locations VALUES("2146","76","Flers");
INSERT INTO master_locations VALUES("2147","76","Le Havre");
INSERT INTO master_locations VALUES("2148","76","Abbeville");
INSERT INTO master_locations VALUES("2149","76","Orleans");
INSERT INTO master_locations VALUES("2150","76","Chalons-en-Champagne");
INSERT INTO master_locations VALUES("2151","76","L\\\'Aigle");
INSERT INTO master_locations VALUES("2152","76","Lessay");
INSERT INTO master_locations VALUES("2153","76","Dreux");
INSERT INTO master_locations VALUES("2154","76","Les Sables-d\\\'Olonne");
INSERT INTO master_locations VALUES("2155","76","Rouen");
INSERT INTO master_locations VALUES("2156","76","Blois");
INSERT INTO master_locations VALUES("2157","76","Chartres");
INSERT INTO master_locations VALUES("2158","76","Saint-Valery");
INSERT INTO master_locations VALUES("2159","76","Cholet");
INSERT INTO master_locations VALUES("2160","76","Laval");
INSERT INTO master_locations VALUES("2161","76","Saint-Quentin");
INSERT INTO master_locations VALUES("2162","76","Etampes");
INSERT INTO master_locations VALUES("2163","76","Beaumont");
INSERT INTO master_locations VALUES("2164","76","Paris");
INSERT INTO master_locations VALUES("2165","76","Creil");
INSERT INTO master_locations VALUES("2166","76","Eure");
INSERT INTO master_locations VALUES("2167","76","Meaux");
INSERT INTO master_locations VALUES("2168","76","Beynes");
INSERT INTO master_locations VALUES("2169","76","Chelles");
INSERT INTO master_locations VALUES("2170","76","Coulommiers");
INSERT INTO master_locations VALUES("2171","76","Lognes");
INSERT INTO master_locations VALUES("2172","76","Melun");
INSERT INTO master_locations VALUES("2173","76","Toussus-le-Noble");
INSERT INTO master_locations VALUES("2174","76","Orly (near Paris)");
INSERT INTO master_locations VALUES("2175","76","Le Plessis-Belleville");
INSERT INTO master_locations VALUES("2176","76","Fontenay Tresigny");
INSERT INTO master_locations VALUES("2177","76","Pontoise");
INSERT INTO master_locations VALUES("2178","76","Moret-sur-Loing");
INSERT INTO master_locations VALUES("2179","76","Villacoublay");
INSERT INTO master_locations VALUES("2180","76","Chavenay");
INSERT INTO master_locations VALUES("2181","76","Bretigny-sur-Orge");
INSERT INTO master_locations VALUES("2182","76","Saint Cyr l\\\\\\\'Ecole");
INSERT INTO master_locations VALUES("2183","76","Reims");
INSERT INTO master_locations VALUES("2184","76","Troyes");
INSERT INTO master_locations VALUES("2185","76","Luneville");
INSERT INTO master_locations VALUES("2186","76","Arras");
INSERT INTO master_locations VALUES("2187","76","Autun");
INSERT INTO master_locations VALUES("2188","76","Nevers");
INSERT INTO master_locations VALUES("2189","76"," Chatillon sur Seine");
INSERT INTO master_locations VALUES("2190","76","Cambrai");
INSERT INTO master_locations VALUES("2191","76","Maubeuge");
INSERT INTO master_locations VALUES("2192","76","Lens");
INSERT INTO master_locations VALUES("2193","76","Besancon");
INSERT INTO master_locations VALUES("2194","76","Saint-Omer");
INSERT INTO master_locations VALUES("2195","76","Lille");
INSERT INTO master_locations VALUES("2196","76","Romilly-sur-Seine");
INSERT INTO master_locations VALUES("2197","76","Vitry-en-Artois");
INSERT INTO master_locations VALUES("2198","76","Merville / Hazebrouck");
INSERT INTO master_locations VALUES("2199","76","Sarre-Union");
INSERT INTO master_locations VALUES("2200","76","Charleville-Mezieres ");
INSERT INTO master_locations VALUES("2201","76","Vesoul");
INSERT INTO master_locations VALUES("2202","76","Juvancourt");
INSERT INTO master_locations VALUES("2203","76","Saverne");
INSERT INTO master_locations VALUES("2204","76","Dieuze");
INSERT INTO master_locations VALUES("2205","76","Brest");
INSERT INTO master_locations VALUES("2206","76","Cherbourg");
INSERT INTO master_locations VALUES("2207","76","Dinard");
INSERT INTO master_locations VALUES("2208","76","La Baule-Escoublac");
INSERT INTO master_locations VALUES("2209","76","Granville");
INSERT INTO master_locations VALUES("2210","76","Deauville");
INSERT INTO master_locations VALUES("2211","76","Lorient");
INSERT INTO master_locations VALUES("2212","76","La Roche-sur-Yon");
INSERT INTO master_locations VALUES("2213","76","Landivisiau");
INSERT INTO master_locations VALUES("2214","76","Caen");
INSERT INTO master_locations VALUES("2215","76","Le Mans");
INSERT INTO master_locations VALUES("2216","76","Rennes");
INSERT INTO master_locations VALUES("2217","76","Lannion");
INSERT INTO master_locations VALUES("2218","76","Ploermel ");
INSERT INTO master_locations VALUES("2219","76","Quimper");
INSERT INTO master_locations VALUES("2220","76","Nantes");
INSERT INTO master_locations VALUES("2221","76","Morlaix");
INSERT INTO master_locations VALUES("2222","76","Vannes");
INSERT INTO master_locations VALUES("2223","76","Avranches");
INSERT INTO master_locations VALUES("2224","76","Saint-Nazaire");
INSERT INTO master_locations VALUES("2225","76","Basel (Switzerland) / Mulhouse");
INSERT INTO master_locations VALUES("2226","76","Epinal");
INSERT INTO master_locations VALUES("2227","76","Haguenau");
INSERT INTO master_locations VALUES("2228","76","Sedan");
INSERT INTO master_locations VALUES("2229","76","Vitry-le-Francois ");
INSERT INTO master_locations VALUES("2230","76","Montbeliard");
INSERT INTO master_locations VALUES("2231","76","Pontarlier");
INSERT INTO master_locations VALUES("2232","76","Langres");
INSERT INTO master_locations VALUES("2233","76","Pont-Saint-Vincent");
INSERT INTO master_locations VALUES("2234","76","Epernay");
INSERT INTO master_locations VALUES("2235","76","Vittel");
INSERT INTO master_locations VALUES("2236","76","Marignane");
INSERT INTO master_locations VALUES("2237","76","Cuers");
INSERT INTO master_locations VALUES("2238","76","Toulon");
INSERT INTO master_locations VALUES("2239","76","Serres-la-Batie");
INSERT INTO master_locations VALUES("2240","76","La Grand\\\'Combe");
INSERT INTO master_locations VALUES("2241","76","Puimoisson");
INSERT INTO master_locations VALUES("2242","76","Chateaubriant");
INSERT INTO master_locations VALUES("2243","76","Saint-Mandrier-sur-Mer");
INSERT INTO master_locations VALUES("2244","76","Frejus");
INSERT INTO master_locations VALUES("2245","76","La Mole");
INSERT INTO master_locations VALUES("2246","76","Amberieu-en-Bugey");
INSERT INTO master_locations VALUES("2247","76","Saintes");
INSERT INTO master_locations VALUES("2248","76","Mourmelon");
INSERT INTO master_locations VALUES("2249","76","Narbonne");
INSERT INTO master_locations VALUES("2250","76","Les Mureaux");
INSERT INTO master_locations VALUES("2251","76","Romorantin");
INSERT INTO master_locations VALUES("2252","76","Sainte-Leocadie");
INSERT INTO master_locations VALUES("2253","184","Miquelon");
INSERT INTO master_locations VALUES("2254","184","Saint-Pierre");
INSERT INTO master_locations VALUES("2255","86","Agrinion");
INSERT INTO master_locations VALUES("2256","86","Alexandroupolis");
INSERT INTO master_locations VALUES("2257","86","Andravida");
INSERT INTO master_locations VALUES("2258","86","Athens (Athina)");
INSERT INTO master_locations VALUES("2259","86","Thessaly");
INSERT INTO master_locations VALUES("2260","86","Athens");
INSERT INTO master_locations VALUES("2261","86","Chios");
INSERT INTO master_locations VALUES("2262","86","Ikaria");
INSERT INTO master_locations VALUES("2263","86","Ioannina");
INSERT INTO master_locations VALUES("2264","86","Kastoria");
INSERT INTO master_locations VALUES("2265","86","Kythira (Kithira)");
INSERT INTO master_locations VALUES("2266","86","Kefalonia (Kefallinia, Cephallonia)");
INSERT INTO master_locations VALUES("2267","86","Kastelorizo");
INSERT INTO master_locations VALUES("2268","86","Kalamata");
INSERT INTO master_locations VALUES("2269","86","Marathon");
INSERT INTO master_locations VALUES("2270","86","Kos");
INSERT INTO master_locations VALUES("2271","86","Karpathos");
INSERT INTO master_locations VALUES("2272","86","Corfu (Kerkyra, Kerkira)");
INSERT INTO master_locations VALUES("2273","86","Kasos (Kassos)");
INSERT INTO master_locations VALUES("2274","86","Kavala");
INSERT INTO master_locations VALUES("2275","86","Kozani");
INSERT INTO master_locations VALUES("2276","86","Lemnos (Limnos)");
INSERT INTO master_locations VALUES("2277","86","Mykonos (Mikonos)");
INSERT INTO master_locations VALUES("2278","86","Milos");
INSERT INTO master_locations VALUES("2279","86","Lesbos");
INSERT INTO master_locations VALUES("2280","86","Naxos");
INSERT INTO master_locations VALUES("2281","86","Paros");
INSERT INTO master_locations VALUES("2282","86","Astypalaia");
INSERT INTO master_locations VALUES("2283","86","Preveza");
INSERT INTO master_locations VALUES("2284","86","Rhodes (Rhodos, Rodos)");
INSERT INTO master_locations VALUES("2285","86","Araxos");
INSERT INTO master_locations VALUES("2286","86","Skiathos");
INSERT INTO master_locations VALUES("2287","86","Samos");
INSERT INTO master_locations VALUES("2288","86","Syros (Siros)");
INSERT INTO master_locations VALUES("2289","86","Laconia");
INSERT INTO master_locations VALUES("2290","86","Santorini (Thira)");
INSERT INTO master_locations VALUES("2291","86","Skyros (Skiros)");
INSERT INTO master_locations VALUES("2292","86","Thessaloniki");
INSERT INTO master_locations VALUES("2293","86","Decelea");
INSERT INTO master_locations VALUES("2294","86","Zakynthos (Zakinthos)");
INSERT INTO master_locations VALUES("2295","99","Budapest");
INSERT INTO master_locations VALUES("2296","99","Budaors");
INSERT INTO master_locations VALUES("2297","99","Debrecen");
INSERT INTO master_locations VALUES("2298","99","Dunakeszi");
INSERT INTO master_locations VALUES("2299","99","Dunaujvaros");
INSERT INTO master_locations VALUES("2300","99","Ersekcsanad");
INSERT INTO master_locations VALUES("2301","99","Esztergom");
INSERT INTO master_locations VALUES("2302","99","Fertoszentmiklos");
INSERT INTO master_locations VALUES("2303","99","Kecskemet");
INSERT INTO master_locations VALUES("2304","99","Nyiregyhaza");
INSERT INTO master_locations VALUES("2305","99","Ocseny");
INSERT INTO master_locations VALUES("2306","99","Papa");
INSERT INTO master_locations VALUES("2307","99","Pecs");
INSERT INTO master_locations VALUES("2308","99","Per");
INSERT INTO master_locations VALUES("2309","99","Szentkiralyszabadja");
INSERT INTO master_locations VALUES("2310","99","Sarmellek");
INSERT INTO master_locations VALUES("2311","99","Szolnok");
INSERT INTO master_locations VALUES("2312","99","Szegvar");
INSERT INTO master_locations VALUES("2313","99","Tasza");
INSERT INTO master_locations VALUES("2314","99","Tokol");
INSERT INTO master_locations VALUES("2315","99","Szeged");
INSERT INTO master_locations VALUES("2316","107","Foligno");
INSERT INTO master_locations VALUES("2317","107","L\\\'Aquila");
INSERT INTO master_locations VALUES("2318","107","Pisa");
INSERT INTO master_locations VALUES("2319","107","Capua");
INSERT INTO master_locations VALUES("2320","107","Foggia");
INSERT INTO master_locations VALUES("2321","107","Crotone");
INSERT INTO master_locations VALUES("2322","107","Bari");
INSERT INTO master_locations VALUES("2323","107","Taranto");
INSERT INTO master_locations VALUES("2324","107","Lecce");
INSERT INTO master_locations VALUES("2325","107","Pescara");
INSERT INTO master_locations VALUES("2326","107","Brindisi");
INSERT INTO master_locations VALUES("2327","107","Catanzaro");
INSERT INTO master_locations VALUES("2328","107","Comiso");
INSERT INTO master_locations VALUES("2329","107","Catania");
INSERT INTO master_locations VALUES("2330","107","Lampedusa");
INSERT INTO master_locations VALUES("2331","107","Trapani");
INSERT INTO master_locations VALUES("2332","107","Palermo / Punta Raisi");
INSERT INTO master_locations VALUES("2333","107","Palermo");
INSERT INTO master_locations VALUES("2334","107","Reggio Calabria");
INSERT INTO master_locations VALUES("2335","107","Vicenza");
INSERT INTO master_locations VALUES("2336","107","Belluno");
INSERT INTO master_locations VALUES("2337","107","Reggio Emilia");
INSERT INTO master_locations VALUES("2338","107","Pesaro & Urbino");
INSERT INTO master_locations VALUES("2339","107","Ravenna");
INSERT INTO master_locations VALUES("2340","107","Trento");
INSERT INTO master_locations VALUES("2341","107","Carpi");
INSERT INTO master_locations VALUES("2342","107","Sassari");
INSERT INTO master_locations VALUES("2343","107","Cagliari");
INSERT INTO master_locations VALUES("2344","107","Olbia");
INSERT INTO master_locations VALUES("2345","107","Oristano");
INSERT INTO master_locations VALUES("2346","107","Tortola");
INSERT INTO master_locations VALUES("2347","107","Biella");
INSERT INTO master_locations VALUES("2348","107","Varese");
INSERT INTO master_locations VALUES("2349","107","Pavia");
INSERT INTO master_locations VALUES("2350","107","Cremona");
INSERT INTO master_locations VALUES("2351","107","Turin (Torino)");
INSERT INTO master_locations VALUES("2352","107","Milan");
INSERT INTO master_locations VALUES("2353","107","Bergamo");
INSERT INTO master_locations VALUES("2354","107","Savona");
INSERT INTO master_locations VALUES("2355","107","Genoa (Genova)");
INSERT INTO master_locations VALUES("2356","107","Novara");
INSERT INTO master_locations VALUES("2357","107","Parma");
INSERT INTO master_locations VALUES("2358","107","Piacenza");
INSERT INTO master_locations VALUES("2359","107","Aosta");
INSERT INTO master_locations VALUES("2360","107","Cuneo");
INSERT INTO master_locations VALUES("2361","107","Pordenone");
INSERT INTO master_locations VALUES("2362","107","South Tyrol");
INSERT INTO master_locations VALUES("2363","107","Campoformido / Udine");
INSERT INTO master_locations VALUES("2364","107","Bologna");
INSERT INTO master_locations VALUES("2365","107","Ferrara");
INSERT INTO master_locations VALUES("2366","107","Treviso");
INSERT INTO master_locations VALUES("2367","107","Rivolto / Udine");
INSERT INTO master_locations VALUES("2368","107","Forli");
INSERT INTO master_locations VALUES("2369","107","Brescia");
INSERT INTO master_locations VALUES("2370","107","Modena");
INSERT INTO master_locations VALUES("2371","107","Verona");
INSERT INTO master_locations VALUES("2372","107","Ronchi dei Legionari / Trieste");
INSERT INTO master_locations VALUES("2373","107","Rimini");
INSERT INTO master_locations VALUES("2374","107","Padua (Padova)");
INSERT INTO master_locations VALUES("2375","107","Venice (Venezia)");
INSERT INTO master_locations VALUES("2376","107","Ancona");
INSERT INTO master_locations VALUES("2377","107","Arezzo");
INSERT INTO master_locations VALUES("2378","107","Lucca");
INSERT INTO master_locations VALUES("2379","107","Siena");
INSERT INTO master_locations VALUES("2380","107","Genoa");
INSERT INTO master_locations VALUES("2381","107","Rome");
INSERT INTO master_locations VALUES("2382","107","Salerno");
INSERT INTO master_locations VALUES("2383","107","Elba");
INSERT INTO master_locations VALUES("2384","107","Latina");
INSERT INTO master_locations VALUES("2385","107","Caserta");
INSERT INTO master_locations VALUES("2386","107","Naples");
INSERT INTO master_locations VALUES("2387","107","Florence (Firenze)");
INSERT INTO master_locations VALUES("2388","107","Grosseto");
INSERT INTO master_locations VALUES("2389","107","Viterbo");
INSERT INTO master_locations VALUES("2390","107","Perugia");
INSERT INTO master_locations VALUES("2391","107"," Ajdovscina");
INSERT INTO master_locations VALUES("2392","196","Lesce");
INSERT INTO master_locations VALUES("2393","196","Bovec");
INSERT INTO master_locations VALUES("2394","196","Brezice");
INSERT INTO master_locations VALUES("2395","196","Celje (Levec)");
INSERT INTO master_locations VALUES("2396","196","Ljubljana");
INSERT INTO master_locations VALUES("2397","196","Maribor");
INSERT INTO master_locations VALUES("2398","196","Murska Sobota (Rakican)");
INSERT INTO master_locations VALUES("2399","196","Novo Mesto (Precna)");
INSERT INTO master_locations VALUES("2400","196","Postojna");
INSERT INTO master_locations VALUES("2401","196","Ptuj (Moskanjci)");
INSERT INTO master_locations VALUES("2402","196","Portoroz");
INSERT INTO master_locations VALUES("2403","196","Slovenj Gradec");
INSERT INTO master_locations VALUES("2404","196","Velenje ");
INSERT INTO master_locations VALUES("2405","59","Breclav");
INSERT INTO master_locations VALUES("2406","59","Benesov");
INSERT INTO master_locations VALUES("2407","59","Broumov");
INSERT INTO master_locations VALUES("2408","59","Bubovice");
INSERT INTO master_locations VALUES("2409","59","Cheb");
INSERT INTO master_locations VALUES("2410","59","Ceska Lipa");
INSERT INTO master_locations VALUES("2411","59","Chomutov");
INSERT INTO master_locations VALUES("2412","59","Medlanky");
INSERT INTO master_locations VALUES("2413","59","Ceske Budejovice");
INSERT INTO master_locations VALUES("2414","59","Chotebor");
INSERT INTO master_locations VALUES("2415","59","Dvur Kralove  nad Labem");
INSERT INTO master_locations VALUES("2416","59","Havlickuv Brod");
INSERT INTO master_locations VALUES("2417","59","Horice");
INSERT INTO master_locations VALUES("2418","59","Hodkovice nad Mohelkou");
INSERT INTO master_locations VALUES("2419","59","Hranice");
INSERT INTO master_locations VALUES("2420","59","Holesov");
INSERT INTO master_locations VALUES("2421","59","Jaromer");
INSERT INTO master_locations VALUES("2422","59","Jicin");
INSERT INTO master_locations VALUES("2423","59","Jindrichuv Hradec");
INSERT INTO master_locations VALUES("2424","59","Jihlava");
INSERT INTO master_locations VALUES("2425","59","Praha");
INSERT INTO master_locations VALUES("2426","59","Kladno");
INSERT INTO master_locations VALUES("2427","59","Kolin");
INSERT INTO master_locations VALUES("2428","59","Krnov");
INSERT INTO master_locations VALUES("2429","59","Krizanov");
INSERT INTO master_locations VALUES("2430","59","Klatovy");
INSERT INTO master_locations VALUES("2431","59","Kunovice");
INSERT INTO master_locations VALUES("2432","59","Karlovy Vary");
INSERT INTO master_locations VALUES("2433","59","Kyjov");
INSERT INTO master_locations VALUES("2434","59","Let&#328;any");
INSERT INTO master_locations VALUES("2435","59","Mlada Boleslav");
INSERT INTO master_locations VALUES("2436","59","Mnichovo Hradiste");
INSERT INTO master_locations VALUES("2437","59","Mikulovice");
INSERT INTO master_locations VALUES("2438","59","Moravska Trebova");
INSERT INTO master_locations VALUES("2439","59","Most");
INSERT INTO master_locations VALUES("2440","59","Marianske Lazne");
INSERT INTO master_locations VALUES("2441","59","Ostrava");
INSERT INTO master_locations VALUES("2442","59","Nove Mesto nad Metuji");
INSERT INTO master_locations VALUES("2443","59","Olomouc");
INSERT INTO master_locations VALUES("2444","59","Otrokovice");
INSERT INTO master_locations VALUES("2445","59","Policka");
INSERT INTO master_locations VALUES("2446","59","Pardubice");
INSERT INTO master_locations VALUES("2447","59","P&#345;ibyslav");
INSERT INTO master_locations VALUES("2448","59","Letkov");
INSERT INTO master_locations VALUES("2449","59","Pribram");
INSERT INTO master_locations VALUES("2450","59","Podhorany");
INSERT INTO master_locations VALUES("2451","59","Prerov");
INSERT INTO master_locations VALUES("2452","59","Prague");
INSERT INTO master_locations VALUES("2453","59","Plasy");
INSERT INTO master_locations VALUES("2454","59","Rana u Loun");
INSERT INTO master_locations VALUES("2455","59","Rakovnik");
INSERT INTO master_locations VALUES("2456","59","Roudnice");
INSERT INTO master_locations VALUES("2457","59","Sta&#328;kov");
INSERT INTO master_locations VALUES("2458","59","Skutec");
INSERT INTO master_locations VALUES("2459","59","Slana");
INSERT INTO master_locations VALUES("2460","59","Sobeslav");
INSERT INTO master_locations VALUES("2461","59","Strunkovice");
INSERT INTO master_locations VALUES("2462","59","Strakonice");
INSERT INTO master_locations VALUES("2463","59","A umperk");
INSERT INTO master_locations VALUES("2464","59","Sazena");
INSERT INTO master_locations VALUES("2465","59","Tabor");
INSERT INTO master_locations VALUES("2466","59","Brno");
INSERT INTO master_locations VALUES("2467","59","Tocna");
INSERT INTO master_locations VALUES("2468","59","Touzim");
INSERT INTO master_locations VALUES("2469","59","Usti nad Orlici");
INSERT INTO master_locations VALUES("2470","59","Vlasim");
INSERT INTO master_locations VALUES("2471","59","Vysoke Myto");
INSERT INTO master_locations VALUES("2472","59","Vodochody");
INSERT INTO master_locations VALUES("2473","59","Velke Porici ");
INSERT INTO master_locations VALUES("2474","59","Vrchlabi");
INSERT INTO master_locations VALUES("2475","59","Vyskov");
INSERT INTO master_locations VALUES("2476","59","Zabreh");
INSERT INTO master_locations VALUES("2477","59","Zbraslavice");
INSERT INTO master_locations VALUES("2478","106","Lod / Tel Aviv");
INSERT INTO master_locations VALUES("2479","106","Beersheba (Be\\\'er Sheva)");
INSERT INTO master_locations VALUES("2480","106","Tel Nof (Tel Nov)");
INSERT INTO master_locations VALUES("2481","106","Ein Shemer (Eyn-Shemer)");
INSERT INTO master_locations VALUES("2482","106","Eilat");
INSERT INTO master_locations VALUES("2483","106","Ein Yahav (Eyn-Yahav)");
INSERT INTO master_locations VALUES("2484","106","Fiq, Golan Heights");
INSERT INTO master_locations VALUES("2485","106","Haifa");
INSERT INTO master_locations VALUES("2486","106","Hatzor");
INSERT INTO master_locations VALUES("2487","106","Herzliya (Herzlia)");
INSERT INTO master_locations VALUES("2488","106","Rosh-Pina");
INSERT INTO master_locations VALUES("2489","106","Jerusalem (currently closed)");
INSERT INTO master_locations VALUES("2490","106","Qiryat Shemona (Kiryat-Shmona)");
INSERT INTO master_locations VALUES("2491","106","Megiddo (Meggido)");
INSERT INTO master_locations VALUES("2492","106","Mitzpe Ramon");
INSERT INTO master_locations VALUES("2493","106","Masada");
INSERT INTO master_locations VALUES("2494","106","Nevatim");
INSERT INTO master_locations VALUES("2495","106","Negev");
INSERT INTO master_locations VALUES("2496","106","Megiddo");
INSERT INTO master_locations VALUES("2497","106","Tel Aviv");
INSERT INTO master_locations VALUES("2498","106","Yotvata");
INSERT INTO master_locations VALUES("2499","134","Luqa");
INSERT INTO master_locations VALUES("2500","143","Monte Carlo");
INSERT INTO master_locations VALUES("2501","15","Lower Austria");
INSERT INTO master_locations VALUES("2502","15","Carinthia");
INSERT INTO master_locations VALUES("2503","15","Upper Austria");
INSERT INTO master_locations VALUES("2504","15","Styria");
INSERT INTO master_locations VALUES("2505","15","Tyrol");
INSERT INTO master_locations VALUES("2506","15","Salzburg");
INSERT INTO master_locations VALUES("2507","15","Graz");
INSERT INTO master_locations VALUES("2508","15","Linz");
INSERT INTO master_locations VALUES("2509","15","Vienna");
INSERT INTO master_locations VALUES("2510","174","Vila Franca de Xira");
INSERT INTO master_locations VALUES("2511","174","Aveiro");
INSERT INTO master_locations VALUES("2512","174","Braganca");
INSERT INTO master_locations VALUES("2513","174","Beja");
INSERT INTO master_locations VALUES("2514","174","Braga");
INSERT INTO master_locations VALUES("2515","174","Chaves");
INSERT INTO master_locations VALUES("2516","174","Coimbra");
INSERT INTO master_locations VALUES("2517","174","Sintra Coast / Greater Lisbon");
INSERT INTO master_locations VALUES("2518","174","Castelo Branco");
INSERT INTO master_locations VALUES("2519","174","Alentejo Central");
INSERT INTO master_locations VALUES("2520","174","Faro");
INSERT INTO master_locations VALUES("2521","174","Paramos / Silvalde/Espinho");
INSERT INTO master_locations VALUES("2522","174","Braganca");
INSERT INTO master_locations VALUES("2523","174","Idanha-a-Nova");
INSERT INTO master_locations VALUES("2524","174","Mirandela");
INSERT INTO master_locations VALUES("2525","174","Ponte de Sor");
INSERT INTO master_locations VALUES("2526","174","Leiria");
INSERT INTO master_locations VALUES("2527","174","Montijo");
INSERT INTO master_locations VALUES("2528","174","Mogadouro");
INSERT INTO master_locations VALUES("2529","174","Alenquer");
INSERT INTO master_locations VALUES("2530","174","Ovar");
INSERT INTO master_locations VALUES("2531","174","Porto");
INSERT INTO master_locations VALUES("2532","174","Lisbon");
INSERT INTO master_locations VALUES("2533","174","Torres Vedras");
INSERT INTO master_locations VALUES("2534","174","Setubal");
INSERT INTO master_locations VALUES("2535","174","Santarem");
INSERT INTO master_locations VALUES("2536","174","Sintra");
INSERT INTO master_locations VALUES("2537","174","Medio Tejo");
INSERT INTO master_locations VALUES("2538","174","Maia");
INSERT INTO master_locations VALUES("2539","174","Loule  TERMINATED");
INSERT INTO master_locations VALUES("2540","174","Vila Real / Alto Douro");
INSERT INTO master_locations VALUES("2541","174","Viseu ");
INSERT INTO master_locations VALUES("2542","174","Santa Maria Island / Vila do Porto");
INSERT INTO master_locations VALUES("2543","174","Corvo Island / Vila do Corvo");
INSERT INTO master_locations VALUES("2544","174","Flores Island / Santa Cruz das Flores");
INSERT INTO master_locations VALUES("2545","174","Graciosa Island / Santa Cruz da Graciosa");
INSERT INTO master_locations VALUES("2546","174","Faial Island");
INSERT INTO master_locations VALUES("2547","174","Azores");
INSERT INTO master_locations VALUES("2548","174","Sao Miguel Island");
INSERT INTO master_locations VALUES("2549","174","Pico Island ");
INSERT INTO master_locations VALUES("2550","174","Sao Jorge Island /Velas");
INSERT INTO master_locations VALUES("2551","174","Madeira Island (Santa Cruz) /Funchal area ");
INSERT INTO master_locations VALUES("2552","174","Porto Santo Island / Vila Baleira ");
INSERT INTO master_locations VALUES("2553","28","Bihac");
INSERT INTO master_locations VALUES("2554","28","Banja Luka");
INSERT INTO master_locations VALUES("2555","28","Sarajevo");
INSERT INTO master_locations VALUES("2556","28","Coralici");
INSERT INTO master_locations VALUES("2557","28","Glamoc");
INSERT INTO master_locations VALUES("2558","28","Tuzla");
INSERT INTO master_locations VALUES("2559","28","Kupres");
INSERT INTO master_locations VALUES("2560","28","Livno");
INSERT INTO master_locations VALUES("2561","28","Mostar");
INSERT INTO master_locations VALUES("2562","28","Prijedor");
INSERT INTO master_locations VALUES("2563","28","Tomislavgrad");
INSERT INTO master_locations VALUES("2564","28","Novi Travnik");
INSERT INTO master_locations VALUES("2565","28","Visoko");
INSERT INTO master_locations VALUES("2566","178","Arad");
INSERT INTO master_locations VALUES("2567","178","Bacau");
INSERT INTO master_locations VALUES("2568","178","Brasov");
INSERT INTO master_locations VALUES("2569","178","Baia Mare");
INSERT INTO master_locations VALUES("2570","178","Bucharest");
INSERT INTO master_locations VALUES("2571","178","Constanta");
INSERT INTO master_locations VALUES("2572","178","Cluj-Napoca");
INSERT INTO master_locations VALUES("2573","178","Resita");
INSERT INTO master_locations VALUES("2574","178","Craiova");
INSERT INTO master_locations VALUES("2575","178","Ia&#351;i");
INSERT INTO master_locations VALUES("2576","178","Oradea");
INSERT INTO master_locations VALUES("2577","178","Sibiu");
INSERT INTO master_locations VALUES("2578","178","Satu Mare");
INSERT INTO master_locations VALUES("2579","178","Suceava");
INSERT INTO master_locations VALUES("2580","178","Tulcea");
INSERT INTO master_locations VALUES("2581","178","Targu-Mures");
INSERT INTO master_locations VALUES("2582","178","Timi&#351;oara");
INSERT INTO master_locations VALUES("2583","206","Raron");
INSERT INTO master_locations VALUES("2584","208","Zermatt");
INSERT INTO master_locations VALUES("2585","208","Bex");
INSERT INTO master_locations VALUES("2586","208","La Chaux-de-Fonds");
INSERT INTO master_locations VALUES("2587","208","Ecuvillens");
INSERT INTO master_locations VALUES("2588","208","Geneva");
INSERT INTO master_locations VALUES("2589","208","Saanen");
INSERT INTO master_locations VALUES("2590","208","Lausanne / Blecherette");
INSERT INTO master_locations VALUES("2591","208","Neuchatel");
INSERT INTO master_locations VALUES("2592","208","La Cote ");
INSERT INTO master_locations VALUES("2593","208","Reichenbach");
INSERT INTO master_locations VALUES("2594","208","Sion (ICAO code applies to civilian airport)");
INSERT INTO master_locations VALUES("2595","208","Gruyere");
INSERT INTO master_locations VALUES("2596","208","Yverdon-les-Bains");
INSERT INTO master_locations VALUES("2597","208","Collombey-Muraz");
INSERT INTO master_locations VALUES("2598","208","Gampel");
INSERT INTO master_locations VALUES("2599","208","Alpnach (military)");
INSERT INTO master_locations VALUES("2600","208","Dubendorf(military)");
INSERT INTO master_locations VALUES("2601","208","Emmen (military)");
INSERT INTO master_locations VALUES("2602","208","Mollis");
INSERT INTO master_locations VALUES("2603","208","Meiringen (military)");
INSERT INTO master_locations VALUES("2604","208","Payerne (military)");
INSERT INTO master_locations VALUES("2605","208","Sion (military)");
INSERT INTO master_locations VALUES("2606","208","Amlikon");
INSERT INTO master_locations VALUES("2607","208","Dittingen");
INSERT INTO master_locations VALUES("2608","208","Schaffhausen");
INSERT INTO master_locations VALUES("2609","208","Kagiswil");
INSERT INTO master_locations VALUES("2610","208","Winterthur");
INSERT INTO master_locations VALUES("2611","208","Hasenstrick");
INSERT INTO master_locations VALUES("2612","208","Langenthal");
INSERT INTO master_locations VALUES("2613","208","Ambri");
INSERT INTO master_locations VALUES("2614","208","Triengen");
INSERT INTO master_locations VALUES("2615","208","Olten");
INSERT INTO master_locations VALUES("2616","208","Wangen-Lachen");
INSERT INTO master_locations VALUES("2617","208","Canton of Fribourg");
INSERT INTO master_locations VALUES("2618","208","Matiers");
INSERT INTO master_locations VALUES("2619","208","Montricher");
INSERT INTO master_locations VALUES("2620","208","St. Stephan");
INSERT INTO master_locations VALUES("2621","208","Balzers");
INSERT INTO master_locations VALUES("2622","208","Gsteigwiler");
INSERT INTO master_locations VALUES("2623","208","Interlaken");
INSERT INTO master_locations VALUES("2624","208","Benken");
INSERT INTO master_locations VALUES("2625","208","Lauterbrunnen");
INSERT INTO master_locations VALUES("2626","208","Trogen");
INSERT INTO master_locations VALUES("2627","208","Schindellegi");
INSERT INTO master_locations VALUES("2628","208","Untervaz");
INSERT INTO master_locations VALUES("2629","208","Wurenlingen");
INSERT INTO master_locations VALUES("2630","208","Leysin");
INSERT INTO master_locations VALUES("2631","208","Lugano / Agno");
INSERT INTO master_locations VALUES("2632","208","Berne / Belp");
INSERT INTO master_locations VALUES("2633","208","Buochs");
INSERT INTO master_locations VALUES("2634","208","Ascona");
INSERT INTO master_locations VALUES("2635","208","Bad Ragaz");
INSERT INTO master_locations VALUES("2636","208","Birrfeld");
INSERT INTO master_locations VALUES("2637","208","Grenchen");
INSERT INTO master_locations VALUES("2638","208"," Zurich / Kloten");
INSERT INTO master_locations VALUES("2639","208","Fricktal-Schupfart");
INSERT INTO master_locations VALUES("2640","208","Courtelary");
INSERT INTO master_locations VALUES("2641","208","Speck-Fehraltorf");
INSERT INTO master_locations VALUES("2642","208","Locarno");
INSERT INTO master_locations VALUES("2643","208","Hausen am Albis");
INSERT INTO master_locations VALUES("2644","208","Luzern-Beromunster");
INSERT INTO master_locations VALUES("2645","208","Biel-Kappelen");
INSERT INTO master_locations VALUES("2646","208","St. Gallen / Altenrhein");
INSERT INTO master_locations VALUES("2647","208","Samedan");
INSERT INTO master_locations VALUES("2648","208","Lommis");
INSERT INTO master_locations VALUES("2649","208","Buttwil");
INSERT INTO master_locations VALUES("2650","208","Sitterdorf");
INSERT INTO master_locations VALUES("2651","208","Thun");
INSERT INTO master_locations VALUES("2652","208","Schanis");
INSERT INTO master_locations VALUES("2653","208","Porrentruy");
INSERT INTO master_locations VALUES("2654","208","Mulhouse (France) and Freiburg (Germany)");
INSERT INTO master_locations VALUES("2655","219","Ankara");
INSERT INTO master_locations VALUES("2656","219","Adana");
INSERT INTO master_locations VALUES("2657","219","Afyonkarahisar");
INSERT INTO master_locations VALUES("2658","219","Antalya");
INSERT INTO master_locations VALUES("2659","219","Gaziantep");
INSERT INTO master_locations VALUES("2660","219","Hatay");
INSERT INTO master_locations VALUES("2661","219","Kastamonu");
INSERT INTO master_locations VALUES("2662","219","Kayseri");
INSERT INTO master_locations VALUES("2663","219","Konya");
INSERT INTO master_locations VALUES("2664","219","Malatya");
INSERT INTO master_locations VALUES("2665","219","Amasya");
INSERT INTO master_locations VALUES("2666","219","Samsun");
INSERT INTO master_locations VALUES("2667","219","Sivas");
INSERT INTO master_locations VALUES("2668","219","Zonguldak");
INSERT INTO master_locations VALUES("2669","219","Eski&#351;ehir");
INSERT INTO master_locations VALUES("2670","219","Tokat");
INSERT INTO master_locations VALUES("2671","219","Denizli");
INSERT INTO master_locations VALUES("2672","219","Nev&#351;ehir");
INSERT INTO master_locations VALUES("2673","219","Istanbul");
INSERT INTO master_locations VALUES("2674","219","Manisa");
INSERT INTO master_locations VALUES("2675","219","Ayd&#305;n");
INSERT INTO master_locations VALUES("2676","219","Bursa");
INSERT INTO master_locations VALUES("2677","219","Bal&#305;kesir");
INSERT INTO master_locations VALUES("2678","219","Canakkale");
INSERT INTO master_locations VALUES("2679","219","&#304;zmir");
INSERT INTO master_locations VALUES("2680","219","Isparta");
INSERT INTO master_locations VALUES("2681","219","Kutahya");
INSERT INTO master_locations VALUES("2682","219","Usak");
INSERT INTO master_locations VALUES("2683","219","Yalova");
INSERT INTO master_locations VALUES("2684","219","Kocaeli");
INSERT INTO master_locations VALUES("2685","219","Mugla");
INSERT INTO master_locations VALUES("2686","219","Tekirdag");
INSERT INTO master_locations VALUES("2687","219","Bodrum");
INSERT INTO master_locations VALUES("2688","219","Istanbu");
INSERT INTO master_locations VALUES("2689","219","ElazÃƒâ€žÃ‚Â±g");
INSERT INTO master_locations VALUES("2690","219","AgrÃƒâ€žÃ‚Â±");
INSERT INTO master_locations VALUES("2691","219","Diyarbak&#305;r");
INSERT INTO master_locations VALUES("2692","219","Erzincan");
INSERT INTO master_locations VALUES("2693","219","Erzurum");
INSERT INTO master_locations VALUES("2694","219","Kars");
INSERT INTO master_locations VALUES("2695","219","Trabzon");
INSERT INTO master_locations VALUES("2696","219","SanlÃƒâ€žÃ‚Â±urfa");
INSERT INTO master_locations VALUES("2697","219","Van");
INSERT INTO master_locations VALUES("2698","219","Batman");
INSERT INTO master_locations VALUES("2699","219","Mus");
INSERT INTO master_locations VALUES("2700","219","Siirt");
INSERT INTO master_locations VALUES("2701","219","Sinop");
INSERT INTO master_locations VALUES("2702","219","Kahramanmaras");
INSERT INTO master_locations VALUES("2703","219","Ad&#305;yaman");
INSERT INTO master_locations VALUES("2704","219","Mardin");
INSERT INTO master_locations VALUES("2705","142","Balti");
INSERT INTO master_locations VALUES("2706","142","Marculesti");
INSERT INTO master_locations VALUES("2707","142","Cahul");
INSERT INTO master_locations VALUES("2708","142","Chadyr Lunga");
INSERT INTO master_locations VALUES("2709","142","Camenca");
INSERT INTO master_locations VALUES("2710","142","Chisinau");
INSERT INTO master_locations VALUES("2711","142","Soroca");
INSERT INTO master_locations VALUES("2712","142","Tighina");
INSERT INTO master_locations VALUES("2713","142","Tiraspol");
INSERT INTO master_locations VALUES("2714","166","Rafah");
INSERT INTO master_locations VALUES("2715","128","Ohrid");
INSERT INTO master_locations VALUES("2716","128","Skopje");
INSERT INTO master_locations VALUES("2717","85","Gibraltar");
INSERT INTO master_locations VALUES("2718","191","Belgrade");
INSERT INTO master_locations VALUES("2719","191","Batajnica / Belgrade");
INSERT INTO master_locations VALUES("2720","191","Kraljevo");
INSERT INTO master_locations VALUES("2721","191","Nis");
INSERT INTO master_locations VALUES("2722","191","Novi Sad");
INSERT INTO master_locations VALUES("2723","191","Trstenik");
INSERT INTO master_locations VALUES("2724","191","Uzice");
INSERT INTO master_locations VALUES("2725","191","Vrsac");
INSERT INTO master_locations VALUES("2726","191","Zrenjanin");
INSERT INTO master_locations VALUES("2727","191","Montenegro");
INSERT INTO master_locations VALUES("2728","195","Bratislava");
INSERT INTO master_locations VALUES("2729","195","Kosice");
INSERT INTO master_locations VALUES("2730","195","Martin");
INSERT INTO master_locations VALUES("2731","195","Malacky");
INSERT INTO master_locations VALUES("2732","195"," Zilina");
INSERT INTO master_locations VALUES("2733","195","Nitra");
INSERT INTO master_locations VALUES("2734","195","Nove Zamky");
INSERT INTO master_locations VALUES("2735","195","PiesÃƒâ€¦Ã‚Â¥any ");
INSERT INTO master_locations VALUES("2736","195","Senica");
INSERT INTO master_locations VALUES("2737","195","Sliac");
INSERT INTO master_locations VALUES("2738","195","Surany");
INSERT INTO master_locations VALUES("2739","195","Trencin");
INSERT INTO master_locations VALUES("2740","195","Trnava");
INSERT INTO master_locations VALUES("2741","195","Poprad");
INSERT INTO master_locations VALUES("2742","221","Ambergris Cay");
INSERT INTO master_locations VALUES("2743","221","Grand Turk Island");
INSERT INTO master_locations VALUES("2744","221","Middle Caicos");
INSERT INTO master_locations VALUES("2745","221","North Caicos");
INSERT INTO master_locations VALUES("2746","221","Pine Cay");
INSERT INTO master_locations VALUES("2747","221","Providenciales");
INSERT INTO master_locations VALUES("2748","221","South Caicos");
INSERT INTO master_locations VALUES("2749","221","Salt Cay");
INSERT INTO master_locations VALUES("2750","63","Samana");
INSERT INTO master_locations VALUES("2751","63","Barahona");
INSERT INTO master_locations VALUES("2752","63","Pedernales");
INSERT INTO master_locations VALUES("2753","63","Constanza");
INSERT INTO master_locations VALUES("2754","63","Santo Domingo");
INSERT INTO master_locations VALUES("2755","63","La Romana");
INSERT INTO master_locations VALUES("2756","63","Punta Cana / Higuey");
INSERT INTO master_locations VALUES("2757","63","Puerto Plata");
INSERT INTO master_locations VALUES("2758","63","Sabana de la Mar");
INSERT INTO master_locations VALUES("2759","63","Punta Caucedo (near Santo Domingo)");
INSERT INTO master_locations VALUES("2760","63","San Isidro");
INSERT INTO master_locations VALUES("2761","63","San Juan de la Maguana");
INSERT INTO master_locations VALUES("2762","63","Santiago");
INSERT INTO master_locations VALUES("2763","91","Izabal");
INSERT INTO master_locations VALUES("2764","91","Alta Verapaz");
INSERT INTO master_locations VALUES("2765","91","El Peten");
INSERT INTO master_locations VALUES("2766","91","Quetzaltenango");
INSERT INTO master_locations VALUES("2767","91","Chiquimula");
INSERT INTO master_locations VALUES("2768","91","Guatemala");
INSERT INTO master_locations VALUES("2769","91","Huehuetenango");
INSERT INTO master_locations VALUES("2770","91","San Marcos");
INSERT INTO master_locations VALUES("2771","91","El Quiche");
INSERT INTO master_locations VALUES("2772","91","Retalhuleu");
INSERT INTO master_locations VALUES("2773","91","Escuintla");
INSERT INTO master_locations VALUES("2774","91","Zacapa");
INSERT INTO master_locations VALUES("2775","91","Amapala");
INSERT INTO master_locations VALUES("2776","97","Catacamas");
INSERT INTO master_locations VALUES("2777","97","Cenamer");
INSERT INTO master_locations VALUES("2778","97","Comayagua");
INSERT INTO master_locations VALUES("2779","97","Choluteca");
INSERT INTO master_locations VALUES("2780","97","Puerto Castilla");
INSERT INTO master_locations VALUES("2781","97","Mocoron");
INSERT INTO master_locations VALUES("2782","97","Isla del Cisne");
INSERT INTO master_locations VALUES("2783","97","Juticalpa");
INSERT INTO master_locations VALUES("2784","97","La Ceiba");
INSERT INTO master_locations VALUES("2785","97","La Esperanza");
INSERT INTO master_locations VALUES("2786","97","La Mesa ");
INSERT INTO master_locations VALUES("2787","97","Marcala");
INSERT INTO master_locations VALUES("2788","97","Guanaja");
INSERT INTO master_locations VALUES("2789","97","Nuevo Ocotepeque");
INSERT INTO master_locations VALUES("2790","97","Olanchito");
INSERT INTO master_locations VALUES("2791","97","El Progreso");
INSERT INTO master_locations VALUES("2792","97","Puerto Lempira");
INSERT INTO master_locations VALUES("2793","97","Puerto Cortes");
INSERT INTO master_locations VALUES("2794","97","Roatan");
INSERT INTO master_locations VALUES("2795","97","Ruinas de Copan");
INSERT INTO master_locations VALUES("2796","97","Santa Barbara ");
INSERT INTO master_locations VALUES("2797","97","Comayagua ");
INSERT INTO master_locations VALUES("2798","97","Santa Rosa de Copan");
INSERT INTO master_locations VALUES("2799","97","Tegucigalpa");
INSERT INTO master_locations VALUES("2800","97","Trujillo");
INSERT INTO master_locations VALUES("2801","97","Tela (MHTE)");
INSERT INTO master_locations VALUES("2802","97","Utila");
INSERT INTO master_locations VALUES("2803","97","Yoro");
INSERT INTO master_locations VALUES("2804","108","Ocho Rios");
INSERT INTO master_locations VALUES("2805","108","Kingston");
INSERT INTO master_locations VALUES("2806","108","Montego Bay");
INSERT INTO master_locations VALUES("2807","108","Port Antonio");
INSERT INTO master_locations VALUES("2808","108","Negril");
INSERT INTO master_locations VALUES("2809","140","Guerrero");
INSERT INTO master_locations VALUES("2810","140","Nuevo Leon");
INSERT INTO master_locations VALUES("2811","140","Aguascalientes");
INSERT INTO master_locations VALUES("2812","140","Oaxaca");
INSERT INTO master_locations VALUES("2813","140","Morelos");
INSERT INTO master_locations VALUES("2814","140","Coahuila");
INSERT INTO master_locations VALUES("2815","140","Campeche");
INSERT INTO master_locations VALUES("2816","140","Sinaloa");
INSERT INTO master_locations VALUES("2817","140","Quintana Roo");
INSERT INTO master_locations VALUES("2818","140","Sonora");
INSERT INTO master_locations VALUES("2819","140","Chihuahua");
INSERT INTO master_locations VALUES("2820","140","Yucatan");
INSERT INTO master_locations VALUES("2821","140","Tamaulipas");
INSERT INTO master_locations VALUES("2822","140","Guanajuato");
INSERT INTO master_locations VALUES("2823","140","Durango");
INSERT INTO master_locations VALUES("2824","140","Nayarit");
INSERT INTO master_locations VALUES("2825","140","Baja California");
INSERT INTO master_locations VALUES("2826","140","Jalisco");
INSERT INTO master_locations VALUES("2827","140","Baja California Sur");
INSERT INTO master_locations VALUES("2828","140","Colima");
INSERT INTO master_locations VALUES("2829","140","Veracruz");
INSERT INTO master_locations VALUES("2830","140","Michoacan");
INSERT INTO master_locations VALUES("2831","140","Distrito Federal");
INSERT INTO master_locations VALUES("2832","140","Puebla");
INSERT INTO master_locations VALUES("2833","140","Queretaro");
INSERT INTO master_locations VALUES("2834","140","Chiapas");
INSERT INTO master_locations VALUES("2835","140","San Luis Potosi");
INSERT INTO master_locations VALUES("2836","140","Estado de Mexico ");
INSERT INTO master_locations VALUES("2837","140","Tabasco");
INSERT INTO master_locations VALUES("2838","140","Zacatecas");
INSERT INTO master_locations VALUES("2839","156","RAAN (Zelaya)");
INSERT INTO master_locations VALUES("2840","156","Boaco");
INSERT INTO master_locations VALUES("2841","156","RAAS (Zelaya)");
INSERT INTO master_locations VALUES("2842","156","Managua");
INSERT INTO master_locations VALUES("2843","156","Chinandega");
INSERT INTO master_locations VALUES("2844","156","Esteli");
INSERT INTO master_locations VALUES("2845","156","Chontales");
INSERT INTO master_locations VALUES("2846","156","Jinotega");
INSERT INTO master_locations VALUES("2847","156","Rivas");
INSERT INTO master_locations VALUES("2848","156","Rio San Juan");
INSERT INTO master_locations VALUES("2849","167","Bocas del Toro");
INSERT INTO master_locations VALUES("2850","167","Chitre");
INSERT INTO master_locations VALUES("2851","167","Changuinola");
INSERT INTO master_locations VALUES("2852","167","David");
INSERT INTO master_locations VALUES("2853","167","Colon");
INSERT INTO master_locations VALUES("2854","167","Fuerte Sherman");
INSERT INTO master_locations VALUES("2855","167","Balboa");
INSERT INTO master_locations VALUES("2856","167","Jaque");
INSERT INTO master_locations VALUES("2857","167","Panama City");
INSERT INTO master_locations VALUES("2858","167","Los Santos");
INSERT INTO master_locations VALUES("2859","167","Puerto Obaldia");
INSERT INTO master_locations VALUES("2860","167","Rio Hato");
INSERT INTO master_locations VALUES("2861","167","El Porvenir");
INSERT INTO master_locations VALUES("2862","167","Wannukandi");
INSERT INTO master_locations VALUES("2863","54","La Fortuna");
INSERT INTO master_locations VALUES("2864","54","Tortuguero");
INSERT INTO master_locations VALUES("2865","54","Buenos Aires");
INSERT INTO master_locations VALUES("2866","54","Barra del Colorado");
INSERT INTO master_locations VALUES("2867","54","Canas");
INSERT INTO master_locations VALUES("2868","54","Coto 47");
INSERT INTO master_locations VALUES("2869","54","Chacarita");
INSERT INTO master_locations VALUES("2870","54","Carrillo");
INSERT INTO master_locations VALUES("2871","54","Cabo Velas");
INSERT INTO master_locations VALUES("2872","54","Drake Bay");
INSERT INTO master_locations VALUES("2873","54","Dieciocho");
INSERT INTO master_locations VALUES("2874","54","El Carmen de Siquirres");
INSERT INTO master_locations VALUES("2875","54","Nuevo Palmar Sur");
INSERT INTO master_locations VALUES("2876","54","Flamingo");
INSERT INTO master_locations VALUES("2877","54","Finca 63");
INSERT INTO master_locations VALUES("2878","54","Golfito");
INSERT INTO master_locations VALUES("2879","54","Guapiles");
INSERT INTO master_locations VALUES("2880","54","Punta Islita");
INSERT INTO master_locations VALUES("2881","54","Liberia");
INSERT INTO master_locations VALUES("2882","54","Los Chiles");
INSERT INTO master_locations VALUES("2883","54","Laurel");
INSERT INTO master_locations VALUES("2884","54","La Flor");
INSERT INTO master_locations VALUES("2885","54","Limon");
INSERT INTO master_locations VALUES("2886","54","Las Piedras");
INSERT INTO master_locations VALUES("2887","54","Las Trancas");
INSERT INTO master_locations VALUES("2888","54","Nicoya Guanacaste");
INSERT INTO master_locations VALUES("2889","54","Nosara");
INSERT INTO master_locations VALUES("2890","54","San Jose");
INSERT INTO master_locations VALUES("2891","54","Palo Arco");
INSERT INTO master_locations VALUES("2892","54","Pandora");
INSERT INTO master_locations VALUES("2893","54","Puerto Jimenez");
INSERT INTO master_locations VALUES("2894","54","Palmar Sur");
INSERT INTO master_locations VALUES("2895","54","Quepos");
INSERT INTO master_locations VALUES("2896","54","Rio Frio O Progreso");
INSERT INTO master_locations VALUES("2897","54","San Alberto");
INSERT INTO master_locations VALUES("2898","54","Santa Clara de Guapiles");
INSERT INTO master_locations VALUES("2899","54","Salama");
INSERT INTO master_locations VALUES("2900","54","Santa Maria de Guacimo");
INSERT INTO master_locations VALUES("2901","54","San Vito de Java");
INSERT INTO master_locations VALUES("2902","54","Tamarindo");
INSERT INTO master_locations VALUES("2903","54","Tambor");
INSERT INTO master_locations VALUES("2904","54","Upala");
INSERT INTO master_locations VALUES("2905","67","Barrillas");
INSERT INTO master_locations VALUES("2906","67","La Cabana");
INSERT INTO master_locations VALUES("2907","67","Ceiba Doblada");
INSERT INTO master_locations VALUES("2908","67","La Chepona");
INSERT INTO master_locations VALUES("2909","67","Corral De Mulas");
INSERT INTO master_locations VALUES("2910","67","Cumichin");
INSERT INTO master_locations VALUES("2911","67","La Carrera");
INSERT INTO master_locations VALUES("2912","67","Las Cachas");
INSERT INTO master_locations VALUES("2913","67","El Jocotillo");
INSERT INTO master_locations VALUES("2914","67","Entre Rios");
INSERT INTO master_locations VALUES("2915","67","Espiritu Santo");
INSERT INTO master_locations VALUES("2916","67","El Tamarindo");
INSERT INTO master_locations VALUES("2917","67","Los Comandos ");
INSERT INTO master_locations VALUES("2918","67","San Salvador");
INSERT INTO master_locations VALUES("2919","67","El Papalon");
INSERT INTO master_locations VALUES("2920","67","El Platanar");
INSERT INTO master_locations VALUES("2921","67","El Ronco");
INSERT INTO master_locations VALUES("2922","67","Santa Clara");
INSERT INTO master_locations VALUES("2923","67","Punta San Juan");
INSERT INTO master_locations VALUES("2924","67","San Miguel");
INSERT INTO master_locations VALUES("2925","67","El Zapote");
INSERT INTO master_locations VALUES("2926","95","Les Cayes");
INSERT INTO master_locations VALUES("2927","95","Cap-Haitien ");
INSERT INTO master_locations VALUES("2928","95","Jacmel");
INSERT INTO master_locations VALUES("2929","95","Jeremie");
INSERT INTO master_locations VALUES("2930","95","Port-au-Prince");
INSERT INTO master_locations VALUES("2931","95","Port-de-Paix");
INSERT INTO master_locations VALUES("2932","57","Guantanamo");
INSERT INTO master_locations VALUES("2933","57","Villa Clara");
INSERT INTO master_locations VALUES("2934","57","Granma");
INSERT INTO master_locations VALUES("2935","57","Ciego de Avila");
INSERT INTO master_locations VALUES("2936","57","Cienfuegos");
INSERT INTO master_locations VALUES("2937","57","Isla de la Juventud");
INSERT INTO master_locations VALUES("2938","57","Camaguey");
INSERT INTO master_locations VALUES("2939","57","Santiago de Cuba");
INSERT INTO master_locations VALUES("2940","57","Holguin");
INSERT INTO master_locations VALUES("2941","57","Havana (La Habana)");
INSERT INTO master_locations VALUES("2942","57","Matanzas");
INSERT INTO master_locations VALUES("2943","57","Pinar del Rio");
INSERT INTO master_locations VALUES("2944","57","Nicaro");
INSERT INTO master_locations VALUES("2945","57","Sancti Sparitus");
INSERT INTO master_locations VALUES("2946","57","Las Tunas");
INSERT INTO master_locations VALUES("2947","41","Cayman Brac");
INSERT INTO master_locations VALUES("2948","41","Grand Cayman");
INSERT INTO master_locations VALUES("2949","41","Little Cayman");
INSERT INTO master_locations VALUES("2950","17","Andros");
INSERT INTO master_locations VALUES("2951","17","Abaco");
INSERT INTO master_locations VALUES("2952","17","Acklins");
INSERT INTO master_locations VALUES("2953","17","Berry Islands");
INSERT INTO master_locations VALUES("2954","17","Bimini");
INSERT INTO master_locations VALUES("2955","17","Cat Island");
INSERT INTO master_locations VALUES("2956","17","Crooked Island");
INSERT INTO master_locations VALUES("2957","17","Cay Sal");
INSERT INTO master_locations VALUES("2958","17","Exuma");
INSERT INTO master_locations VALUES("2959","17","Eleuthera");
INSERT INTO master_locations VALUES("2960","17","Grand Bahama");
INSERT INTO master_locations VALUES("2961","17","Inagua");
INSERT INTO master_locations VALUES("2962","17","Long Island");
INSERT INTO master_locations VALUES("2963","17","Mayaguana");
INSERT INTO master_locations VALUES("2964","17","New Providence");
INSERT INTO master_locations VALUES("2965","17","Ragged Island");
INSERT INTO master_locations VALUES("2966","17","Rum Cay");
INSERT INTO master_locations VALUES("2967","17","San Salvador Island");
INSERT INTO master_locations VALUES("2968","23","Belize City");
INSERT INTO master_locations VALUES("2969","53","Aitutaki (Araura)");
INSERT INTO master_locations VALUES("2970","53","Atiu (Enua Manu)");
INSERT INTO master_locations VALUES("2971","53","Mangaia (Auau Enua)");
INSERT INTO master_locations VALUES("2972","53","Manihiki (Humphrey Island)");
INSERT INTO master_locations VALUES("2973","53","Mauke (Akatoka Manava)");
INSERT INTO master_locations VALUES("2974","53","Manuae Island");
INSERT INTO master_locations VALUES("2975","53","Mitiaro (Nukuroa)");
INSERT INTO master_locations VALUES("2976","53","Penrhyn Island (Tongareva)");
INSERT INTO master_locations VALUES("2977","53","Rarotonga");
INSERT INTO master_locations VALUES("2978","74","Cicia");
INSERT INTO master_locations VALUES("2979","74","Mamanuca Islands");
INSERT INTO master_locations VALUES("2980","74","Viti Levu");
INSERT INTO master_locations VALUES("2981","74","Malolo Lailai");
INSERT INTO master_locations VALUES("2982","74","Rabi");
INSERT INTO master_locations VALUES("2983","74","Kaibu Island");
INSERT INTO master_locations VALUES("2984","74","Kadavu");
INSERT INTO master_locations VALUES("2985","74","Mana Island");
INSERT INTO master_locations VALUES("2986","74","Moala");
INSERT INTO master_locations VALUES("2987","74","Bureta");
INSERT INTO master_locations VALUES("2988","74","Ngau Island");
INSERT INTO master_locations VALUES("2989","74","Laucala Island (Lauthala Island)");
INSERT INTO master_locations VALUES("2990","74","Lakeba (Lakemba)");
INSERT INTO master_locations VALUES("2991","74","Vanua Levu");
INSERT INTO master_locations VALUES("2992","74","Taveuni");
INSERT INTO master_locations VALUES("2993","74","Koro");
INSERT INTO master_locations VALUES("2994","74","Rotuma");
INSERT INTO master_locations VALUES("2995","74","Savu Savu");
INSERT INTO master_locations VALUES("2996","74","Wakaya");
INSERT INTO master_locations VALUES("2997","74","Ono-i-Lau");
INSERT INTO master_locations VALUES("2998","74","Yasawa");
INSERT INTO master_locations VALUES("2999","74","Vanua Balavu (Vanuabalavu)");
INSERT INTO master_locations VALUES("3000","74","Vatulele");
INSERT INTO master_locations VALUES("3001","216","Eua");
INSERT INTO master_locations VALUES("3002","216","Tongatapu");
INSERT INTO master_locations VALUES("3003","216","Ha\\\'apai");
INSERT INTO master_locations VALUES("3004","216","Niuafo\\\'ou");
INSERT INTO master_locations VALUES("3005","216","Niuatoputapu");
INSERT INTO master_locations VALUES("3006","216","Vava\\\'u");
INSERT INTO master_locations VALUES("3007","113","Abaiang");
INSERT INTO master_locations VALUES("3008","113","Beru Island");
INSERT INTO master_locations VALUES("3009","113","Kuria");
INSERT INTO master_locations VALUES("3010","113","Maiana");
INSERT INTO master_locations VALUES("3011","113","Marakei");
INSERT INTO master_locations VALUES("3012","113","Makin");
INSERT INTO master_locations VALUES("3013","113","Nikunau");
INSERT INTO master_locations VALUES("3014","113","Onotoa");
INSERT INTO master_locations VALUES("3015","113","Tarawa");
INSERT INTO master_locations VALUES("3016","113","Abemama");
INSERT INTO master_locations VALUES("3017","113","Tabiteuea North");
INSERT INTO master_locations VALUES("3018","113","Tamana");
INSERT INTO master_locations VALUES("3019","113","Nonouti");
INSERT INTO master_locations VALUES("3020","113","Arorae");
INSERT INTO master_locations VALUES("3021","113","Tabiteuea South");
INSERT INTO master_locations VALUES("3022","113","Butaritari");
INSERT INTO master_locations VALUES("3023","113","Aranuka");
INSERT INTO master_locations VALUES("3024","222","Funafuti");
INSERT INTO master_locations VALUES("3025","159","Alofi");
INSERT INTO master_locations VALUES("3026","236","Futuna Island");
INSERT INTO master_locations VALUES("3027","236","Wallis Island");
INSERT INTO master_locations VALUES("3028","186","Asau");
INSERT INTO master_locations VALUES("3029","186","Apia");
INSERT INTO master_locations VALUES("3030","186","Fagali\\\'i");
INSERT INTO master_locations VALUES("3031","186","Salelologa");
INSERT INTO master_locations VALUES("3032","186","Ofu Island");
INSERT INTO master_locations VALUES("3033","186","Fitiuta");
INSERT INTO master_locations VALUES("3034","186","Pago Pago");
INSERT INTO master_locations VALUES("3035","78","Tahiti");
INSERT INTO master_locations VALUES("3036","78","Austral Islands");
INSERT INTO master_locations VALUES("3037","78","Tuamotus");
INSERT INTO master_locations VALUES("3038","78","Tikehau");
INSERT INTO master_locations VALUES("3039","78","Fakarava");
INSERT INTO master_locations VALUES("3040","78","Gambier Islands");
INSERT INTO master_locations VALUES("3041","78","Kaukura Atoll");
INSERT INTO master_locations VALUES("3042","78","Disappointment Islands");
INSERT INTO master_locations VALUES("3043","78","Tatakoto");
INSERT INTO master_locations VALUES("3044","78","Arutua");
INSERT INTO master_locations VALUES("3045","78","Nukutavake");
INSERT INTO master_locations VALUES("3046","78","Fakahina");
INSERT INTO master_locations VALUES("3047","78","Niau");
INSERT INTO master_locations VALUES("3048","78","Raroia");
INSERT INTO master_locations VALUES("3049","78","Takaroa");
INSERT INTO master_locations VALUES("3050","78","Marquesas Islands");
INSERT INTO master_locations VALUES("3051","78","located on Moto Mute");
INSERT INTO master_locations VALUES("3052","78","Society Islands");
INSERT INTO master_locations VALUES("3053","78","Leeward Islands (Society Islands)");
INSERT INTO master_locations VALUES("3054","78","Windward Islands (Society Islands)");
INSERT INTO master_locations VALUES("3055","78","Hao Island");
INSERT INTO master_locations VALUES("3056","78","Maupiti");
INSERT INTO master_locations VALUES("3057","78","Vahitahi");
INSERT INTO master_locations VALUES("3058","230","Mota Lava");
INSERT INTO master_locations VALUES("3059","230","Sola");
INSERT INTO master_locations VALUES("3060","230","Imao");
INSERT INTO master_locations VALUES("3061","230","Craig Cove");
INSERT INTO master_locations VALUES("3062","230","Longana");
INSERT INTO master_locations VALUES("3063","230","Sara");
INSERT INTO master_locations VALUES("3064","230","Lamap");
INSERT INTO master_locations VALUES("3065","230","Lamen-Bay");
INSERT INTO master_locations VALUES("3066","230","Maewo");
INSERT INTO master_locations VALUES("3067","230","Lonorore");
INSERT INTO master_locations VALUES("3068","230","Norsup");
INSERT INTO master_locations VALUES("3069","230","Gaua");
INSERT INTO master_locations VALUES("3070","230","Redcliff");
INSERT INTO master_locations VALUES("3071","230","Tongoa");
INSERT INTO master_locations VALUES("3072","230","Ulei");
INSERT INTO master_locations VALUES("3073","230","Valesdir");
INSERT INTO master_locations VALUES("3074","230","Walaha");
INSERT INTO master_locations VALUES("3075","230","South West Bay");
INSERT INTO master_locations VALUES("3076","230","Anatom");
INSERT INTO master_locations VALUES("3077","230","Aniwa");
INSERT INTO master_locations VALUES("3078","230","Dillon\\\'s Bay");
INSERT INTO master_locations VALUES("3079","230","Futuna");
INSERT INTO master_locations VALUES("3080","230","Ipota");
INSERT INTO master_locations VALUES("3081","230","Quoin Hill");
INSERT INTO master_locations VALUES("3082","230","Port Vila");
INSERT INTO master_locations VALUES("3083","230","Tanna");
INSERT INTO master_locations VALUES("3084","154","Tiga Island");
INSERT INTO master_locations VALUES("3085","154","Belep");
INSERT INTO master_locations VALUES("3086","154","Kone");
INSERT INTO master_locations VALUES("3087","154"," L\\\\\\\'Ile des Pins");
INSERT INTO master_locations VALUES("3088","154","Houailou");
INSERT INTO master_locations VALUES("3089","154","Koumac");
INSERT INTO master_locations VALUES("3090","154","Lifou");
INSERT INTO master_locations VALUES("3091","154","Noumea");
INSERT INTO master_locations VALUES("3092","154","Ile Ouen");
INSERT INTO master_locations VALUES("3093","154","Poum");
INSERT INTO master_locations VALUES("3094","154","Mueo");
INSERT INTO master_locations VALUES("3095","154","Mara");
INSERT INTO master_locations VALUES("3096","154","La Foa");
INSERT INTO master_locations VALUES("3097","154","Touho");
INSERT INTO master_locations VALUES("3098","154","Ouvea");
INSERT INTO master_locations VALUES("3099","154","Canala");
INSERT INTO master_locations VALUES("3100","155","Auckland");
INSERT INTO master_locations VALUES("3101","155","Wellington");
INSERT INTO master_locations VALUES("3102","155","Taupo");
INSERT INTO master_locations VALUES("3103","155","Ashburton");
INSERT INTO master_locations VALUES("3104","155","Waiouru");
INSERT INTO master_locations VALUES("3105","155","Balclutha");
INSERT INTO master_locations VALUES("3106","155","Christchurch");
INSERT INTO master_locations VALUES("3107","155","Chatham Islands");
INSERT INTO master_locations VALUES("3108","155","Cromwell");
INSERT INTO master_locations VALUES("3109","155","North Island");
INSERT INTO master_locations VALUES("3110","155","Dargaville");
INSERT INTO master_locations VALUES("3111","155","Dunedin");
INSERT INTO master_locations VALUES("3112","155","Dannevirke");
INSERT INTO master_locations VALUES("3113","155","Rangiora");
INSERT INTO master_locations VALUES("3114","155","Feilding");
INSERT INTO master_locations VALUES("3115","155","Franz Josef Village");
INSERT INTO master_locations VALUES("3116","155","Foxton");
INSERT INTO master_locations VALUES("3117","155","Galatea");
INSERT INTO master_locations VALUES("3118","155","Great Barrier Island");
INSERT INTO master_locations VALUES("3119","155","Greymouth");
INSERT INTO master_locations VALUES("3120","155","Great Mercury Island");
INSERT INTO master_locations VALUES("3121","155","Gisborne");
INSERT INTO master_locations VALUES("3122","155","Lake Pukaki");
INSERT INTO master_locations VALUES("3123","155","Glenorchy");
INSERT INTO master_locations VALUES("3124","155","Hawera");
INSERT INTO master_locations VALUES("3125","155","Hokitika");
INSERT INTO master_locations VALUES("3126","155","Hamilton");
INSERT INTO master_locations VALUES("3127","155","Hanmer Springs");
INSERT INTO master_locations VALUES("3128","155","Hastings");
INSERT INTO master_locations VALUES("3129","155","Haast");
INSERT INTO master_locations VALUES("3130","155","Antarctica");
INSERT INTO master_locations VALUES("3131","155","Tauranga");
INSERT INTO master_locations VALUES("3132","155","Kerikeri");
INSERT INTO master_locations VALUES("3133","155","Kaitaia");
INSERT INTO master_locations VALUES("3134","155","Palmerston North");
INSERT INTO master_locations VALUES("3135","155","Rotorua");
INSERT INTO master_locations VALUES("3136","155","New Plymouth");
INSERT INTO master_locations VALUES("3137","155","Whangarei");
INSERT INTO master_locations VALUES("3138","155","Invercargill");
INSERT INTO master_locations VALUES("3139","155","Taumarunui");
INSERT INTO master_locations VALUES("3140","155","Wanganui");
INSERT INTO master_locations VALUES("3141","155","Wairoa");
INSERT INTO master_locations VALUES("3142","155","Waiheke Island");
INSERT INTO master_locations VALUES("3143","155","Kaipara District");
INSERT INTO master_locations VALUES("3144","155","Kaikoura");
INSERT INTO master_locations VALUES("3145","155","Kerikeri / Bay of Islands");
INSERT INTO master_locations VALUES("3146","155","Karamea");
INSERT INTO master_locations VALUES("3147","155","Kaikohe");
INSERT INTO master_locations VALUES("3148","155","Lake Taupo");
INSERT INTO master_locations VALUES("3149","155","Alexandra");
INSERT INTO master_locations VALUES("3150","155","Matamata");
INSERT INTO master_locations VALUES("3151","155","Aoraki/Mount Cook");
INSERT INTO master_locations VALUES("3152","155","Mercer");
INSERT INTO master_locations VALUES("3153","155","Milford Sound");
INSERT INTO master_locations VALUES("3154","155","Masterton");
INSERT INTO master_locations VALUES("3155","155","Motueka");
INSERT INTO master_locations VALUES("3156","155","Te Anau / Manapouri");
INSERT INTO master_locations VALUES("3157","155","Murchison");
INSERT INTO master_locations VALUES("3158","155","Martinborough");
INSERT INTO master_locations VALUES("3159","155","Makarora");
INSERT INTO master_locations VALUES("3160","155","Nelson");
INSERT INTO master_locations VALUES("3161","155","Napier");
INSERT INTO master_locations VALUES("3162","155","Omarama");
INSERT INTO master_locations VALUES("3163","155","Ohakea");
INSERT INTO master_locations VALUES("3164","155","Blenheim");
INSERT INTO master_locations VALUES("3165","155","Opotiki");
INSERT INTO master_locations VALUES("3166","155","Oamaru");
INSERT INTO master_locations VALUES("3167","155","Paihia");
INSERT INTO master_locations VALUES("3168","155","Parakai");
INSERT INTO master_locations VALUES("3169","155","Picton - Koromiko");
INSERT INTO master_locations VALUES("3170","155","Paraparaumu");
INSERT INTO master_locations VALUES("3171","155","Raglan");
INSERT INTO master_locations VALUES("3172","155","Stewart Island");
INSERT INTO master_locations VALUES("3173","155","Rangitaiki");
INSERT INTO master_locations VALUES("3174","155","Ruawai");
INSERT INTO master_locations VALUES("3175","155","Roxburgh");
INSERT INTO master_locations VALUES("3176","155","Stratford");
INSERT INTO master_locations VALUES("3177","155","Thames");
INSERT INTO master_locations VALUES("3178","155","Takaka");
INSERT INTO master_locations VALUES("3179","155","Tekapo");
INSERT INTO master_locations VALUES("3180","155","Turangi");
INSERT INTO master_locations VALUES("3181","155","Tokoroa");
INSERT INTO master_locations VALUES("3182","155","Te Kuiti");
INSERT INTO master_locations VALUES("3183","155","Timaru");
INSERT INTO master_locations VALUES("3184","155","Te Anau");
INSERT INTO master_locations VALUES("3185","155","Twizel");
INSERT INTO master_locations VALUES("3186","155","Pauanui");
INSERT INTO master_locations VALUES("3187","155","Taihape");
INSERT INTO master_locations VALUES("3188","155","Blenheim ");
INSERT INTO master_locations VALUES("3189","155","Wanaka");
INSERT INTO master_locations VALUES("3190","155","Whakatane");
INSERT INTO master_locations VALUES("3191","155","Waimate");
INSERT INTO master_locations VALUES("3192","155","West Melton");
INSERT INTO master_locations VALUES("3193","155","Westport");
INSERT INTO master_locations VALUES("3194","155","Whitianga");
INSERT INTO master_locations VALUES("3195","155","Waihi Beach");
INSERT INTO master_locations VALUES("3196","155","Waipukurau");
INSERT INTO master_locations VALUES("3197","1","Bamyan");
INSERT INTO master_locations VALUES("3198","1","Bost");
INSERT INTO master_locations VALUES("3199","1","Chaghcharan");
INSERT INTO master_locations VALUES("3200","1","Darwaz");
INSERT INTO master_locations VALUES("3201","1","Farah");
INSERT INTO master_locations VALUES("3202","1","Faizabad");
INSERT INTO master_locations VALUES("3203","1","Khwahan");
INSERT INTO master_locations VALUES("3204","1","Herat");
INSERT INTO master_locations VALUES("3205","1","Bagram near Charikar");
INSERT INTO master_locations VALUES("3206","1","Jalalabad");
INSERT INTO master_locations VALUES("3207","1","Kabul");
INSERT INTO master_locations VALUES("3208","1","Kandahar");
INSERT INTO master_locations VALUES("3209","1","Khost");
INSERT INTO master_locations VALUES("3210","1","Maymana");
INSERT INTO master_locations VALUES("3211","1","Mazari Sharif");
INSERT INTO master_locations VALUES("3212","1","Qala i Naw");
INSERT INTO master_locations VALUES("3213","1","Sheghnan");
INSERT INTO master_locations VALUES("3214","1","Tereen");
INSERT INTO master_locations VALUES("3215","1","Taloqan");
INSERT INTO master_locations VALUES("3216","1","Kunduz");
INSERT INTO master_locations VALUES("3217","1","Helmand near Lashkar Gah");
INSERT INTO master_locations VALUES("3218","1","Zaranj");
INSERT INTO master_locations VALUES("3219","18","Manama");
INSERT INTO master_locations VALUES("3220","18","Bahrain");
INSERT INTO master_locations VALUES("3221","189","Jubail");
INSERT INTO master_locations VALUES("3222","189","Abha");
INSERT INTO master_locations VALUES("3223","189","Al-Ahsa");
INSERT INTO master_locations VALUES("3224","189","al-Baha");
INSERT INTO master_locations VALUES("3225","189","Bisha");
INSERT INTO master_locations VALUES("3226","189","Abqaiq");
INSERT INTO master_locations VALUES("3227","189","Dammam");
INSERT INTO master_locations VALUES("3228","189","Dhahran");
INSERT INTO master_locations VALUES("3229","189","Dawadmi");
INSERT INTO master_locations VALUES("3230","189","Gizan");
INSERT INTO master_locations VALUES("3231","189","Gassim ");
INSERT INTO master_locations VALUES("3232","189","Gurayat ");
INSERT INTO master_locations VALUES("3233","189","Ha\\\'il");
INSERT INTO master_locations VALUES("3234","189","Haradh");
INSERT INTO master_locations VALUES("3235","189","Jeddah");
INSERT INTO master_locations VALUES("3236","189","KKMC");
INSERT INTO master_locations VALUES("3237","189","Medina");
INSERT INTO master_locations VALUES("3238","189","Najran ");
INSERT INTO master_locations VALUES("3239","189","Qaisumah ");
INSERT INTO master_locations VALUES("3240","189","Rafha");
INSERT INTO master_locations VALUES("3241","189","Riyadh");
INSERT INTO master_locations VALUES("3242","189","Ras Al-Mishab");
INSERT INTO master_locations VALUES("3243","189","Arar ");
INSERT INTO master_locations VALUES("3244","189","Ras Tanura");
INSERT INTO master_locations VALUES("3245","189","Shaybah");
INSERT INTO master_locations VALUES("3246","189","Sharurah ");
INSERT INTO master_locations VALUES("3247","189","al-Jouf ");
INSERT INTO master_locations VALUES("3248","189","Tabuk");
INSERT INTO master_locations VALUES("3249","189","Taeif");
INSERT INTO master_locations VALUES("3250","189","Ath Thumamah");
INSERT INTO master_locations VALUES("3251","189","Tanajib");
INSERT INTO master_locations VALUES("3252","189","Turaif");
INSERT INTO master_locations VALUES("3253","189","Udhayliyah");
INSERT INTO master_locations VALUES("3254","189","Wadi al-Dawasir");
INSERT INTO master_locations VALUES("3255","189","Wedjh ");
INSERT INTO master_locations VALUES("3256","189","Yanbu ");
INSERT INTO master_locations VALUES("3257","103","Abadan");
INSERT INTO master_locations VALUES("3258","103","Dezful");
INSERT INTO master_locations VALUES("3259","103","Omidiyeh");
INSERT INTO master_locations VALUES("3260","103","Mahshahr");
INSERT INTO master_locations VALUES("3261","103","Ahwaz");
INSERT INTO master_locations VALUES("3262","103","Bushehr");
INSERT INTO master_locations VALUES("3263","103","Asalouyeh");
INSERT INTO master_locations VALUES("3264","103","Kish Island");
INSERT INTO master_locations VALUES("3265","103","Bandar Lengeh");
INSERT INTO master_locations VALUES("3266","103","Khalije Fars");
INSERT INTO master_locations VALUES("3267","103","Khark Island");
INSERT INTO master_locations VALUES("3268","103","Sirri Island");
INSERT INTO master_locations VALUES("3269","103","Lavan Island");
INSERT INTO master_locations VALUES("3270","103","Kermanshah");
INSERT INTO master_locations VALUES("3271","103","Ilam");
INSERT INTO master_locations VALUES("3272","103","Khorramabad");
INSERT INTO master_locations VALUES("3273","103","Sanandaj");
INSERT INTO master_locations VALUES("3274","103","Isfahan (Esfahan)");
INSERT INTO master_locations VALUES("3275","103","Shahrekord");
INSERT INTO master_locations VALUES("3276","103","Rasht");
INSERT INTO master_locations VALUES("3277","103","Hamadan");
INSERT INTO master_locations VALUES("3278","103","Tehran");
INSERT INTO master_locations VALUES("3279","103","Bandar Abbas");
INSERT INTO master_locations VALUES("3280","103","Jiroft");
INSERT INTO master_locations VALUES("3281","103","Kerman");
INSERT INTO master_locations VALUES("3282","103","Bam");
INSERT INTO master_locations VALUES("3283","103","Qeshm");
INSERT INTO master_locations VALUES("3284","103","Rafsanjan");
INSERT INTO master_locations VALUES("3285","103","Sirjan");
INSERT INTO master_locations VALUES("3286","103","Birjand");
INSERT INTO master_locations VALUES("3287","103","Sarakhs");
INSERT INTO master_locations VALUES("3288","103","Mashhad");
INSERT INTO master_locations VALUES("3289","103","Bojnourd");
INSERT INTO master_locations VALUES("3290","103","Sabzevar");
INSERT INTO master_locations VALUES("3291","103","Tabas");
INSERT INTO master_locations VALUES("3292","103","Gorgan");
INSERT INTO master_locations VALUES("3293","103","Noshahr");
INSERT INTO master_locations VALUES("3294","103","Ramsar");
INSERT INTO master_locations VALUES("3295","103","Sari");
INSERT INTO master_locations VALUES("3296","103","Abadeh");
INSERT INTO master_locations VALUES("3297","103","Lar");
INSERT INTO master_locations VALUES("3298","103","Lamerd");
INSERT INTO master_locations VALUES("3299","103","Shiraz");
INSERT INTO master_locations VALUES("3300","103","Yasuj");
INSERT INTO master_locations VALUES("3301","103","Khoy");
INSERT INTO master_locations VALUES("3302","103","Ardabil");
INSERT INTO master_locations VALUES("3303","103","Parsabad");
INSERT INTO master_locations VALUES("3304","103","Urmia");
INSERT INTO master_locations VALUES("3305","103","Tabriz");
INSERT INTO master_locations VALUES("3306","103","Yazd");
INSERT INTO master_locations VALUES("3307","103","Zabol");
INSERT INTO master_locations VALUES("3308","103","Chah Bahar");
INSERT INTO master_locations VALUES("3309","103","Zahedan");
INSERT INTO master_locations VALUES("3310","110","Amman");
INSERT INTO master_locations VALUES("3311","110","Aqaba");
INSERT INTO master_locations VALUES("3312","116","Kuwait");
INSERT INTO master_locations VALUES("3313","116","Al-Maqwa, near Kuwait City");
INSERT INTO master_locations VALUES("3314","120","Beirut");
INSERT INTO master_locations VALUES("3315","120","Kleyate");
INSERT INTO master_locations VALUES("3316","120","Rayak");
INSERT INTO master_locations VALUES("3317","225","Al Ain");
INSERT INTO master_locations VALUES("3318","225","Muqatra");
INSERT INTO master_locations VALUES("3319","225","Dubai");
INSERT INTO master_locations VALUES("3320","225","Fujairah");
INSERT INTO master_locations VALUES("3321","225","Ras al-Khaimah");
INSERT INTO master_locations VALUES("3322","225","Sharjah");
INSERT INTO master_locations VALUES("3323","163","Khasab");
INSERT INTO master_locations VALUES("3324","163","Masirah");
INSERT INTO master_locations VALUES("3325","163","Muscat");
INSERT INTO master_locations VALUES("3326","163","Marmul");
INSERT INTO master_locations VALUES("3327","163","Salalah");
INSERT INTO master_locations VALUES("3328","163","Thumrait");
INSERT INTO master_locations VALUES("3329","164","Abbottabad");
INSERT INTO master_locations VALUES("3330","164","Bannu");
INSERT INTO master_locations VALUES("3331","164","Bahawalpur");
INSERT INTO master_locations VALUES("3332","164","Chitral");
INSERT INTO master_locations VALUES("3333","164","Chilas");
INSERT INTO master_locations VALUES("3334","164","Dalbandin");
INSERT INTO master_locations VALUES("3335","164","Dera Ghazi Khan");
INSERT INTO master_locations VALUES("3336","164","Dera Ismail Khan");
INSERT INTO master_locations VALUES("3337","164","Faisalabad");
INSERT INTO master_locations VALUES("3338","164","Gwadar");
INSERT INTO master_locations VALUES("3339","164","Gilgit");
INSERT INTO master_locations VALUES("3340","164","Jacobabad");
INSERT INTO master_locations VALUES("3341","164","Jiwani");
INSERT INTO master_locations VALUES("3342","164","Karachi");
INSERT INTO master_locations VALUES("3343","164","Hyderabad");
INSERT INTO master_locations VALUES("3344","164","Khuzdar");
INSERT INTO master_locations VALUES("3345","164","Kohat");
INSERT INTO master_locations VALUES("3346","164","Lahore");
INSERT INTO master_locations VALUES("3347","164","Mangla");
INSERT INTO master_locations VALUES("3348","164","Muzaffarabad");
INSERT INTO master_locations VALUES("3349","164","Mianwali");
INSERT INTO master_locations VALUES("3350","164","Mohenjo-daro");
INSERT INTO master_locations VALUES("3351","164","Sindhri Tharparkar");
INSERT INTO master_locations VALUES("3352","164","Kamra");
INSERT INTO master_locations VALUES("3353","164","Multan");
INSERT INTO master_locations VALUES("3354","164","Nawabshah");
INSERT INTO master_locations VALUES("3355","164","Ormara");
INSERT INTO master_locations VALUES("3356","164","Parachinar");
INSERT INTO master_locations VALUES("3357","164","Panjgur");
INSERT INTO master_locations VALUES("3358","164","Pasni City");
INSERT INTO master_locations VALUES("3359","164","Peshawar");
INSERT INTO master_locations VALUES("3360","164","Rawalpindi");
INSERT INTO master_locations VALUES("3361","164","Quetta");
INSERT INTO master_locations VALUES("3362","164","Rahim Yar Khan");
INSERT INTO master_locations VALUES("3363","164","Islamabad");
INSERT INTO master_locations VALUES("3364","164","Shorkot");
INSERT INTO master_locations VALUES("3365","164","Rawalakot");
INSERT INTO master_locations VALUES("3366","164","Sawan Gas Field");
INSERT INTO master_locations VALUES("3367","164","Sibi");
INSERT INTO master_locations VALUES("3368","164","Skardu");
INSERT INTO master_locations VALUES("3369","164","Sukkur");
INSERT INTO master_locations VALUES("3370","164","Sehwan Sharif");
INSERT INTO master_locations VALUES("3371","164","Sargodha");
INSERT INTO master_locations VALUES("3372","164","Saidu Sharif");
INSERT INTO master_locations VALUES("3373","164","Sialkot");
INSERT INTO master_locations VALUES("3374","164","Sui");
INSERT INTO master_locations VALUES("3375","164","Sahiwal");
INSERT INTO master_locations VALUES("3376","164","Tarbela Dam");
INSERT INTO master_locations VALUES("3377","164","Turbat");
INSERT INTO master_locations VALUES("3378","164","Zhob");
INSERT INTO master_locations VALUES("3379","104","Al Anbarv");
INSERT INTO master_locations VALUES("3380","104","Al Iskandariyah Airport");
INSERT INTO master_locations VALUES("3381","104","An Numaniyah Airport");
INSERT INTO master_locations VALUES("3382","104","Al Bakr");
INSERT INTO master_locations VALUES("3383","104","Baghdad");
INSERT INTO master_locations VALUES("3384","104","Bashur");
INSERT INTO master_locations VALUES("3385","104","Erbil ");
INSERT INTO master_locations VALUES("3386","104","Jalibah");
INSERT INTO master_locations VALUES("3387","104","Basrah");
INSERT INTO master_locations VALUES("3388","104","Qasr Tall Mihl");
INSERT INTO master_locations VALUES("3389","104","Qayyarah");
INSERT INTO master_locations VALUES("3390","104","Tikrit");
INSERT INTO master_locations VALUES("3391","104","Iraqi Kurdistan");
INSERT INTO master_locations VALUES("3392","104","Tall Afar");
INSERT INTO master_locations VALUES("3393","104","Al Taji");
INSERT INTO master_locations VALUES("3394","104","Nasiriyah");
INSERT INTO master_locations VALUES("3395","104","Al Kut");
INSERT INTO master_locations VALUES("3396","104","Umm Qasr");
INSERT INTO master_locations VALUES("3397","209","Aleppo");
INSERT INTO master_locations VALUES("3398","209","Damascus");
INSERT INTO master_locations VALUES("3399","209","Deir ez-Zor");
INSERT INTO master_locations VALUES("3400","209","Kamishly");
INSERT INTO master_locations VALUES("3401","209","Latakia");
INSERT INTO master_locations VALUES("3402","209","Palmyra");
INSERT INTO master_locations VALUES("3403","238","Aden");
INSERT INTO master_locations VALUES("3404","238","Abbs");
INSERT INTO master_locations VALUES("3405","238","Ataq");
INSERT INTO master_locations VALUES("3406","238","Beihan");
INSERT INTO master_locations VALUES("3407","238","Al-Bough");
INSERT INTO master_locations VALUES("3408","238","Al-Ghaidah");
INSERT INTO master_locations VALUES("3409","238","Hodeidah");
INSERT INTO master_locations VALUES("3410","238","Marib");
INSERT INTO master_locations VALUES("3411","238","Mukeiras");
INSERT INTO master_locations VALUES("3412","238","Qishn");
INSERT INTO master_locations VALUES("3413","238","Mukalla");
INSERT INTO master_locations VALUES("3414","238","Saadah");
INSERT INTO master_locations VALUES("3415","238","Sana\\\'a");
INSERT INTO master_locations VALUES("3416","238","Socotra");
INSERT INTO master_locations VALUES("3417","238","Sayun");
INSERT INTO master_locations VALUES("3418","238","Taiz");
INSERT INTO master_locations VALUES("3419","227","Alaska");
INSERT INTO master_locations VALUES("3420","227","Alaska / Fort Wainwright");
INSERT INTO master_locations VALUES("3421","227","Fort Richardson");
INSERT INTO master_locations VALUES("3422","113","Canton Island");
INSERT INTO master_locations VALUES("3423","227","Agana");
INSERT INTO master_locations VALUES("3424","227","Rota Island");
INSERT INTO master_locations VALUES("3425","227","Saipan Island");
INSERT INTO master_locations VALUES("3426","227","Tinian Island");
INSERT INTO master_locations VALUES("3427","227","Hawaii");
INSERT INTO master_locations VALUES("3428","135","Enewetak");
INSERT INTO master_locations VALUES("3429","135","Majuro");
INSERT INTO master_locations VALUES("3430","135","Roi-Namur");
INSERT INTO master_locations VALUES("3431","135","Kwajalein");
INSERT INTO master_locations VALUES("3432","113","Kiritimati (Christmas Island)");
INSERT INTO master_locations VALUES("3433","113","Palmyra Atoll");
INSERT INTO master_locations VALUES("3434","227","Sand Island");
INSERT INTO master_locations VALUES("3435","141","Chuuk");
INSERT INTO master_locations VALUES("3436","141","Pohnpei");
INSERT INTO master_locations VALUES("3437","141","Kosrae");
INSERT INTO master_locations VALUES("3438","141","Yap");
INSERT INTO master_locations VALUES("3439","165","Palau");
INSERT INTO master_locations VALUES("3440","227","Wake Island");
INSERT INTO master_locations VALUES("3441","45","Kinmen");
INSERT INTO master_locations VALUES("3442","45","Penghu");
INSERT INTO master_locations VALUES("3443","45","Lianchiang");
INSERT INTO master_locations VALUES("3444","45","Taitung");
INSERT INTO master_locations VALUES("3445","45","Kaohsiung City");
INSERT INTO master_locations VALUES("3446","45","Chiayi");
INSERT INTO master_locations VALUES("3447","45","Pingtung");
INSERT INTO master_locations VALUES("3448","45","Taichung");
INSERT INTO master_locations VALUES("3449","45","Tainan City");
INSERT INTO master_locations VALUES("3450","45","Hsinchu");
INSERT INTO master_locations VALUES("3451","45","Taipei City");
INSERT INTO master_locations VALUES("3452","45","Taoyuan");
INSERT INTO master_locations VALUES("3453","45","Hualien");
INSERT INTO master_locations VALUES("3454","109","Chiba");
INSERT INTO master_locations VALUES("3455","109","Nagano");
INSERT INTO master_locations VALUES("3456","109","Ibaraki");
INSERT INTO master_locations VALUES("3457","109","Tokyo");
INSERT INTO master_locations VALUES("3458","109","Osaka");
INSERT INTO master_locations VALUES("3459","109","Wakayama");
INSERT INTO master_locations VALUES("3460","109","Hyogo");
INSERT INTO master_locations VALUES("3461","109","Hiroshima");
INSERT INTO master_locations VALUES("3462","109","Okayama");
INSERT INTO master_locations VALUES("3463","109","Kyoto");
INSERT INTO master_locations VALUES("3464","109","Hokkaid&#333;");
INSERT INTO master_locations VALUES("3465","109","Kumamoto");
INSERT INTO master_locations VALUES("3466","109","Nagasaki");
INSERT INTO master_locations VALUES("3467","109","Yamaguchi");
INSERT INTO master_locations VALUES("3468","109","Saga");
INSERT INTO master_locations VALUES("3469","109","Fukuoka");
INSERT INTO master_locations VALUES("3470","109","Kagoshima");
INSERT INTO master_locations VALUES("3471","109","Miyazaki");
INSERT INTO master_locations VALUES("3472","109","Oita");
INSERT INTO master_locations VALUES("3473","109","Aichi");
INSERT INTO master_locations VALUES("3474","109","Fukui");
INSERT INTO master_locations VALUES("3475","109","Gifu");
INSERT INTO master_locations VALUES("3476","109","Shizuoka");
INSERT INTO master_locations VALUES("3477","109","Ishikawa");
INSERT INTO master_locations VALUES("3478","109","Shimane");
INSERT INTO master_locations VALUES("3479","109","Toyama");
INSERT INTO master_locations VALUES("3480","109","Mie");
INSERT INTO master_locations VALUES("3481","109","Tottori");
INSERT INTO master_locations VALUES("3482","109","Kochi");
INSERT INTO master_locations VALUES("3483","109","Ehime");
INSERT INTO master_locations VALUES("3484","109","Tokushima");
INSERT INTO master_locations VALUES("3485","109","Kagawa");
INSERT INTO master_locations VALUES("3486","109","Aomori");
INSERT INTO master_locations VALUES("3487","109","Yamagata");
INSERT INTO master_locations VALUES("3488","109","Niigata");
INSERT INTO master_locations VALUES("3489","109","Fukushima");
INSERT INTO master_locations VALUES("3490","109","Iwate");
INSERT INTO master_locations VALUES("3491","109","Akita");
INSERT INTO master_locations VALUES("3492","109","Miyagi");
INSERT INTO master_locations VALUES("3493","109","Saitama");
INSERT INTO master_locations VALUES("3494","109","Gunma");
INSERT INTO master_locations VALUES("3495","109","Tochigi");
INSERT INTO master_locations VALUES("3496","109","Okinawa");
INSERT INTO master_locations VALUES("3497","115","Dokdo");
INSERT INTO master_locations VALUES("3498","115","Muan");
INSERT INTO master_locations VALUES("3499","115","Gwangju");
INSERT INTO master_locations VALUES("3500","115","Gunsan");
INSERT INTO master_locations VALUES("3501","115","Yeongam County (near Mokpo)");
INSERT INTO master_locations VALUES("3502","115","Kunsan");
INSERT INTO master_locations VALUES("3503","115","Yeosu");
INSERT INTO master_locations VALUES("3504","115","Sokcho");
INSERT INTO master_locations VALUES("3505","115","Kangnung");
INSERT INTO master_locations VALUES("3506","115","Wonju");
INSERT INTO master_locations VALUES("3507","115","Yangyang County");
INSERT INTO master_locations VALUES("3508","115","Jeju");
INSERT INTO master_locations VALUES("3509","115","Pusan");
INSERT INTO master_locations VALUES("3510","115","Sacheon");
INSERT INTO master_locations VALUES("3511","115","Ulsan");
INSERT INTO master_locations VALUES("3512","115","Pyeongtaek");
INSERT INTO master_locations VALUES("3513","115","Incheon (near Seoul)");
INSERT INTO master_locations VALUES("3514","115","Seongnam");
INSERT INTO master_locations VALUES("3515","115","Osan");
INSERT INTO master_locations VALUES("3516","115","Seoul");
INSERT INTO master_locations VALUES("3517","115","Seongmu");
INSERT INTO master_locations VALUES("3518","115","Pohang");
INSERT INTO master_locations VALUES("3519","115","Daegu");
INSERT INTO master_locations VALUES("3520","115","Cheongju");
INSERT INTO master_locations VALUES("3521","171","Palawan");
INSERT INTO master_locations VALUES("3522","171","Oriental Mindoro");
INSERT INTO master_locations VALUES("3523","171","Bataan");
INSERT INTO master_locations VALUES("3524","171","Angeles City");
INSERT INTO master_locations VALUES("3525","171","Ilocos Norte");
INSERT INTO master_locations VALUES("3526","171","Quezon");
INSERT INTO master_locations VALUES("3527","171","Metro Manila");
INSERT INTO master_locations VALUES("3528","171","Isabela");
INSERT INTO master_locations VALUES("3529","171","Albay");
INSERT INTO master_locations VALUES("3530","171","Tarlac");
INSERT INTO master_locations VALUES("3531","171","Pangasinan");
INSERT INTO master_locations VALUES("3532","171","Cavite");
INSERT INTO master_locations VALUES("3533","171","Batanes");
INSERT INTO master_locations VALUES("3534","171","Occidental Mindoro");
INSERT INTO master_locations VALUES("3535","171","Nueva Ecija");
INSERT INTO master_locations VALUES("3536","171","Sorsogon");
INSERT INTO master_locations VALUES("3537","171","South Cotabato");
INSERT INTO master_locations VALUES("3538","171","Maguindanao ");
INSERT INTO master_locations VALUES("3539","171","Davao City");
INSERT INTO master_locations VALUES("3540","171","Butuan City");
INSERT INTO master_locations VALUES("3541","171","Surigao del Sur");
INSERT INTO master_locations VALUES("3542","171","Zamboanga del Norte");
INSERT INTO master_locations VALUES("3543","171","Camiguin");
INSERT INTO master_locations VALUES("3544","171","Lanao del Norte");
INSERT INTO master_locations VALUES("3545","171","Sulu");
INSERT INTO master_locations VALUES("3546","171","Sultan Kudarat");
INSERT INTO master_locations VALUES("3547","171","Misamis Oriental");
INSERT INTO master_locations VALUES("3548","171","Lanao del Sur");
INSERT INTO master_locations VALUES("3549","171","Tawi-Tawi");
INSERT INTO master_locations VALUES("3550","171","Misamis Occidental");
INSERT INTO master_locations VALUES("3551","171","Zamboanga del Sur");
INSERT INTO master_locations VALUES("3552","171","Davao Oriental");
INSERT INTO master_locations VALUES("3553","171","Surigao del Norte");
INSERT INTO master_locations VALUES("3554","171","Bukidnon");
INSERT INTO master_locations VALUES("3555","171","Zamboanga Sibugay");
INSERT INTO master_locations VALUES("3556","171","Mindanao");
INSERT INTO master_locations VALUES("3557","171","Cebu");
INSERT INTO master_locations VALUES("3558","171","Iloilo");
INSERT INTO master_locations VALUES("3559","171","Southern Leyte");
INSERT INTO master_locations VALUES("3560","171","Bohol");
INSERT INTO master_locations VALUES("3561","171","Antique");
INSERT INTO master_locations VALUES("3562","171","Cagayan");
INSERT INTO master_locations VALUES("3563","171","Baguio City");
INSERT INTO master_locations VALUES("3564","171","Camarines Norte");
INSERT INTO master_locations VALUES("3565","171","Lucena City");
INSERT INTO master_locations VALUES("3566","171","Pampanga");
INSERT INTO master_locations VALUES("3567","171","Zambales");
INSERT INTO master_locations VALUES("3568","171","Batangas");
INSERT INTO master_locations VALUES("3569","171","Camarines Sur");
INSERT INTO master_locations VALUES("3570","171","Ilocos Sur");
INSERT INTO master_locations VALUES("3571","171","Aurora");
INSERT INTO master_locations VALUES("3572","171","La Union");
INSERT INTO master_locations VALUES("3573","171","Catanduanes");
INSERT INTO master_locations VALUES("3574","171","Marinduque");
INSERT INTO master_locations VALUES("3575","171","Bulacan");
INSERT INTO master_locations VALUES("3576","171","Nueva Vizcaya");
INSERT INTO master_locations VALUES("3577","171","Tacloban City");
INSERT INTO master_locations VALUES("3578","171","Negros Occidental");
INSERT INTO master_locations VALUES("3579","171","Samar");
INSERT INTO master_locations VALUES("3580","171","Negros Oriental");
INSERT INTO master_locations VALUES("3581","171","Aklan");
INSERT INTO master_locations VALUES("3582","171","Northern Samar");
INSERT INTO master_locations VALUES("3583","171","Eastern Samar");
INSERT INTO master_locations VALUES("3584","171","Leyte");
INSERT INTO master_locations VALUES("3585","171","Masbate");
INSERT INTO master_locations VALUES("3586","171","Lapu-Lapu City");
INSERT INTO master_locations VALUES("3587","171","Ormoc City");
INSERT INTO master_locations VALUES("3588","171","Puerto Princesa City");
INSERT INTO master_locations VALUES("3589","171","Biliran");
INSERT INTO master_locations VALUES("3590","171","Capiz");
INSERT INTO master_locations VALUES("3591","171","Romblon");
INSERT INTO master_locations VALUES("3592","171","Siquijor");
INSERT INTO master_locations VALUES("3593","171","Agusan del Norte");
INSERT INTO master_locations VALUES("3594","171","Manila");
INSERT INTO master_locations VALUES("3595","171","Ubay Airport (now RPSN)");
INSERT INTO master_locations VALUES("3596","171","Rajah Buayan Air Base (now RPMB)");
INSERT INTO master_locations VALUES("3597","171","Maguindanao");
INSERT INTO master_locations VALUES("3598","171","Tacurong");
INSERT INTO master_locations VALUES("3599","171","Malabang");
INSERT INTO master_locations VALUES("3600","171","Surigao City");
INSERT INTO master_locations VALUES("3601","171","Malaybalay");
INSERT INTO master_locations VALUES("3602","171","Itbayat");
INSERT INTO master_locations VALUES("3603","171","Jomalig");
INSERT INTO master_locations VALUES("3604","171","Nueva Ecija");
INSERT INTO master_locations VALUES("3605","171","Luzon Island");
INSERT INTO master_locations VALUES("3606","171","Alabat");
INSERT INTO master_locations VALUES("3607","11","Entre Rios Province");
INSERT INTO master_locations VALUES("3608","11","Buenos Aires Province");
INSERT INTO master_locations VALUES("3609","11","Santa Fe Province");
INSERT INTO master_locations VALUES("3610","11","Cordoba Province");
INSERT INTO master_locations VALUES("3611","11","La Rioja Province");
INSERT INTO master_locations VALUES("3612","11","El Palomar");
INSERT INTO master_locations VALUES("3613","11","Neuquen Province");
INSERT INTO master_locations VALUES("3614","11","Mendoza Province");
INSERT INTO master_locations VALUES("3615","11","Catamarca Province");
INSERT INTO master_locations VALUES("3616","11","Santiago del Estero Province");
INSERT INTO master_locations VALUES("3617","11","Tucuman Province");
INSERT INTO master_locations VALUES("3618","11","San Juan Province");
INSERT INTO master_locations VALUES("3619","11","San Luis Province");
INSERT INTO master_locations VALUES("3620","11","Corrientes Province");
INSERT INTO master_locations VALUES("3621","11","Chaco Province");
INSERT INTO master_locations VALUES("3622","11","Formosa Province");
INSERT INTO master_locations VALUES("3623","11","Misiones Province");
INSERT INTO master_locations VALUES("3624","11","Salta Province");
INSERT INTO master_locations VALUES("3625","11","Jujuy Province");
INSERT INTO master_locations VALUES("3626","11","Rio Negro Province");
INSERT INTO master_locations VALUES("3627","11","Chubut Province");
INSERT INTO master_locations VALUES("3628","11","Santa Cruz Province");
INSERT INTO master_locations VALUES("3629","11","Tierra del Fuego Province");
INSERT INTO master_locations VALUES("3630","11","La Pampa Province");
INSERT INTO master_locations VALUES("3631","31","Para");
INSERT INTO master_locations VALUES("3632","31","Goias");
INSERT INTO master_locations VALUES("3633","31","Sao Paulo");
INSERT INTO master_locations VALUES("3634","31","Sergipe");
INSERT INTO master_locations VALUES("3635","31","Mato Grosso");
INSERT INTO master_locations VALUES("3636","31","Rio Grande do Sul");
INSERT INTO master_locations VALUES("3637","31","Minas Gerais");
INSERT INTO master_locations VALUES("3638","31","Parana");
INSERT INTO master_locations VALUES("3639","31","Brazilian Federal District");
INSERT INTO master_locations VALUES("3640","31","Roraima");
INSERT INTO master_locations VALUES("3641","31","Rio de Janeiro");
INSERT INTO master_locations VALUES("3642","31","Brazil");
INSERT INTO master_locations VALUES("3643","31","Mato Grosso do Sul");
INSERT INTO master_locations VALUES("3644","31","Santa Catarina");
INSERT INTO master_locations VALUES("3645","31","Maranhao");
INSERT INTO master_locations VALUES("3646","31","Bahia");
INSERT INTO master_locations VALUES("3647","31","Acre");
INSERT INTO master_locations VALUES("3648","31","Amazonas");
INSERT INTO master_locations VALUES("3649","31","Pernambuco");
INSERT INTO master_locations VALUES("3650","31","Ceara");
INSERT INTO master_locations VALUES("3651","31","Rondonia");
INSERT INTO master_locations VALUES("3652","31","Paraiba");
INSERT INTO master_locations VALUES("3653","31","Alagoas");
INSERT INTO master_locations VALUES("3654","31","Amapa");
INSERT INTO master_locations VALUES("3655","31","Rio Grande do Norte");
INSERT INTO master_locations VALUES("3656","31","Parnaiba");
INSERT INTO master_locations VALUES("3657","31","Tocantins");
INSERT INTO master_locations VALUES("3658","31","Piaui");
INSERT INTO master_locations VALUES("3659","31","Espirito Santo");
INSERT INTO master_locations VALUES("3660","44","Ancud");
INSERT INTO master_locations VALUES("3661","44","Los Angeles");
INSERT INTO master_locations VALUES("3662","44","Alto Palena");
INSERT INTO master_locations VALUES("3663","44","Arica");
INSERT INTO master_locations VALUES("3664","44","Balmaceda");
INSERT INTO master_locations VALUES("3665","44","Tocopilla");
INSERT INTO master_locations VALUES("3666","44","Chile Chico");
INSERT INTO master_locations VALUES("3667","44","Calama");
INSERT INTO master_locations VALUES("3668","44","Chillin");
INSERT INTO master_locations VALUES("3669","44","Punta Arenas");
INSERT INTO master_locations VALUES("3670","44","Coyhaique");
INSERT INTO master_locations VALUES("3671","44","Iquique");
INSERT INTO master_locations VALUES("3672","44","Valparaiso");
INSERT INTO master_locations VALUES("3673","44","El Salvador");
INSERT INTO master_locations VALUES("3674","44","Antofagasta");
INSERT INTO master_locations VALUES("3675","44","Porvenir");
INSERT INTO master_locations VALUES("3676","44","Puerto Williams");
INSERT INTO master_locations VALUES("3677","44","Copiapo");
INSERT INTO master_locations VALUES("3678","44","Cochrane");
INSERT INTO master_locations VALUES("3679","44","Curica");
INSERT INTO master_locations VALUES("3680","44","Concepcion");
INSERT INTO master_locations VALUES("3681","44","Easter Island (Isla de Pascua)");
INSERT INTO master_locations VALUES("3682","44","Juan Fernandez Islands");
INSERT INTO master_locations VALUES("3683","44","Osorno");
INSERT INTO master_locations VALUES("3684","44","Chuquicamata");
INSERT INTO master_locations VALUES("3685","44","Vallenar");
INSERT INTO master_locations VALUES("3686","44","Puerto Natales");
INSERT INTO master_locations VALUES("3687","44","Ovalle Tuqui");
INSERT INTO master_locations VALUES("3688","44","Pucon");
INSERT INTO master_locations VALUES("3689","44","Chanaral");
INSERT INTO master_locations VALUES("3690","44","Rancagua");
INSERT INTO master_locations VALUES("3691","44","Antartica Chilena");
INSERT INTO master_locations VALUES("3692","44","Cerro Sombrero");
INSERT INTO master_locations VALUES("3693","44","La Serena");
INSERT INTO master_locations VALUES("3694","44","Castro");
INSERT INTO master_locations VALUES("3695","44","Temuco");
INSERT INTO master_locations VALUES("3696","44","Puerto Montt");
INSERT INTO master_locations VALUES("3697","44","Talca");
INSERT INTO master_locations VALUES("3698","44","Chaiten");
INSERT INTO master_locations VALUES("3699","44","Victoria");
INSERT INTO master_locations VALUES("3700","44","Taltal");
INSERT INTO master_locations VALUES("3701","44","Valdivia");
INSERT INTO master_locations VALUES("3702","44","Vina del Mar");
INSERT INTO master_locations VALUES("3703","65","Ambato");
INSERT INTO master_locations VALUES("3704","65","Bahia de Caraquez");
INSERT INTO master_locations VALUES("3705","65","Santa Cecilia");
INSERT INTO master_locations VALUES("3706","65","Coca");
INSERT INTO master_locations VALUES("3707","65","Cuenca");
INSERT INTO master_locations VALUES("3708","65","Esmeraldas");
INSERT INTO master_locations VALUES("3709","65","Galapagos (Baltra)");
INSERT INTO master_locations VALUES("3710","65","Guayaquil");
INSERT INTO master_locations VALUES("3711","65","Jipijapa");
INSERT INTO master_locations VALUES("3712","65","Latacunga");
INSERT INTO master_locations VALUES("3713","65","Lago Agrio");
INSERT INTO master_locations VALUES("3714","65","Loja");
INSERT INTO master_locations VALUES("3715","65","Macara");
INSERT INTO master_locations VALUES("3716","65","Macas");
INSERT INTO master_locations VALUES("3717","65","Machala");
INSERT INTO master_locations VALUES("3718","65","Manta");
INSERT INTO master_locations VALUES("3719","65","Pastaza");
INSERT INTO master_locations VALUES("3720","65","Putumayo");
INSERT INTO master_locations VALUES("3721","65","Portoviejo");
INSERT INTO master_locations VALUES("3722","65","Quito");
INSERT INTO master_locations VALUES("3723","65","Salinas");
INSERT INTO master_locations VALUES("3724","65","Sucua");
INSERT INTO master_locations VALUES("3725","65","Galapagos Islands");
INSERT INTO master_locations VALUES("3726","65","Taisha");
INSERT INTO master_locations VALUES("3727","65","Tiputini");
INSERT INTO master_locations VALUES("3728","65","Tarapoa");
INSERT INTO master_locations VALUES("3729","65","Tulcan");
INSERT INTO master_locations VALUES("3730","169","Asuncion");
INSERT INTO master_locations VALUES("3731","169","Ayolas");
INSERT INTO master_locations VALUES("3732","169","Encarnacion");
INSERT INTO master_locations VALUES("3733","169","Ciudad Del Este");
INSERT INTO master_locations VALUES("3734","169","Filadelfia");
INSERT INTO master_locations VALUES("3735","169","Mariscal Estigarribia");
INSERT INTO master_locations VALUES("3736","169","Pilar");
INSERT INTO master_locations VALUES("3737","169","Pedro Juan Caballero");
INSERT INTO master_locations VALUES("3738","48","Araracuara");
INSERT INTO master_locations VALUES("3739","48","Acandi");
INSERT INTO master_locations VALUES("3740","48","Aguachica");
INSERT INTO master_locations VALUES("3741","48","Amalfi");
INSERT INTO master_locations VALUES("3742","48","Andes");
INSERT INTO master_locations VALUES("3743","48","Apiay");
INSERT INTO master_locations VALUES("3744","48","Armenia");
INSERT INTO master_locations VALUES("3745","48","Puerto Asis");
INSERT INTO master_locations VALUES("3746","48","El Banco");
INSERT INTO master_locations VALUES("3747","48","Lebrija (near Bucaramanga)");
INSERT INTO master_locations VALUES("3748","48","Bogota");
INSERT INTO master_locations VALUES("3749","48","Barranquilla");
INSERT INTO master_locations VALUES("3750","48","Bahia Solano");
INSERT INTO master_locations VALUES("3751","48","Buenaventura");
INSERT INTO master_locations VALUES("3752","48","Capurgana");
INSERT INTO master_locations VALUES("3753","48","Cucuta");
INSERT INTO master_locations VALUES("3754","48","Condoto");
INSERT INTO master_locations VALUES("3755","48","Cartagena");
INSERT INTO master_locations VALUES("3756","48","Carimagua");
INSERT INTO master_locations VALUES("3757","48","Cali");
INSERT INTO master_locations VALUES("3758","48","Cimitarra");
INSERT INTO master_locations VALUES("3759","48","Tumaco");
INSERT INTO master_locations VALUES("3760","48","Caucasia");
INSERT INTO master_locations VALUES("3761","48","Covenas");
INSERT INTO master_locations VALUES("3762","48","Corozal");
INSERT INTO master_locations VALUES("3763","48","El Bagre");
INSERT INTO master_locations VALUES("3764","48","Barrancabermeja");
INSERT INTO master_locations VALUES("3765","48","Florencia");
INSERT INTO master_locations VALUES("3766","48","Girardot");
INSERT INTO master_locations VALUES("3767","48","Cartago");
INSERT INTO master_locations VALUES("3768","48","Guapi");
INSERT INTO master_locations VALUES("3769","48","Chaparral");
INSERT INTO master_locations VALUES("3770","48","Hato Corozal");
INSERT INTO master_locations VALUES("3771","48","Ibague");
INSERT INTO master_locations VALUES("3772","48","Chigorodo");
INSERT INTO master_locations VALUES("3773","48","Ipiales");
INSERT INTO master_locations VALUES("3774","48","Tibu");
INSERT INTO master_locations VALUES("3775","48","Apartado");
INSERT INTO master_locations VALUES("3776","48","Puerto Leguizamo");
INSERT INTO master_locations VALUES("3777","48","Maicao");
INSERT INTO master_locations VALUES("3778","48","La Pedrera");
INSERT INTO master_locations VALUES("3779","48","Leticia");
INSERT INTO master_locations VALUES("3780","48","Medellin");
INSERT INTO master_locations VALUES("3781","48","Miraflores");
INSERT INTO master_locations VALUES("3782","48","Magangue");
INSERT INTO master_locations VALUES("3783","48","Monteria");
INSERT INTO master_locations VALUES("3784","48","Mitu");
INSERT INTO master_locations VALUES("3785","48","Manizales");
INSERT INTO master_locations VALUES("3786","48","Necocli");
INSERT INTO master_locations VALUES("3787","48","Nuqui");
INSERT INTO master_locations VALUES("3788","48","Neiva");
INSERT INTO master_locations VALUES("3789","48","Ocana");
INSERT INTO master_locations VALUES("3790","48","Orocue");
INSERT INTO master_locations VALUES("3791","48","Otu");
INSERT INTO master_locations VALUES("3792","48","Guajira Department");
INSERT INTO master_locations VALUES("3793","48","Puerto Carreno");
INSERT INTO master_locations VALUES("3794","48","Puerto Inirida");
INSERT INTO master_locations VALUES("3795","48","Pereira");
INSERT INTO master_locations VALUES("3796","48","Pitalito");
INSERT INTO master_locations VALUES("3797","48","Plato");
INSERT INTO master_locations VALUES("3798","48","Popayan");
INSERT INTO master_locations VALUES("3799","48","Palanquero");
INSERT INTO master_locations VALUES("3800","48","Pasto");
INSERT INTO master_locations VALUES("3801","48","Providencia Island");
INSERT INTO master_locations VALUES("3802","48","Paz de Ariporo");
INSERT INTO master_locations VALUES("3803","48","Mariquita");
INSERT INTO master_locations VALUES("3804","48","Medellin/Rionegro");
INSERT INTO master_locations VALUES("3805","48","Riohacha");
INSERT INTO master_locations VALUES("3806","48","Saravena");
INSERT INTO master_locations VALUES("3807","48","San Jose del Guaviare");
INSERT INTO master_locations VALUES("3808","48","Santa Marta");
INSERT INTO master_locations VALUES("3809","48","San Andres Island");
INSERT INTO master_locations VALUES("3810","48","San Vicente del Caguan");
INSERT INTO master_locations VALUES("3811","48","Trinidad");
INSERT INTO master_locations VALUES("3812","48","Tunja");
INSERT INTO master_locations VALUES("3813","48","Tame");
INSERT INTO master_locations VALUES("3814","48","Tres Esquinas");
INSERT INTO master_locations VALUES("3815","48","Turbo");
INSERT INTO master_locations VALUES("3816","48","Marandua");
INSERT INTO master_locations VALUES("3817","48","Arauca");
INSERT INTO master_locations VALUES("3818","48","Quibdo");
INSERT INTO master_locations VALUES("3819","48","Tulua");
INSERT INTO master_locations VALUES("3820","48","Urrao");
INSERT INTO master_locations VALUES("3821","48","Villa Garzon");
INSERT INTO master_locations VALUES("3822","48","Valledupar");
INSERT INTO master_locations VALUES("3823","48","Villavicencio");
INSERT INTO master_locations VALUES("3824","48","Yaguara");
INSERT INTO master_locations VALUES("3825","48","Yopal");
INSERT INTO master_locations VALUES("3826","27","Apolo");
INSERT INTO master_locations VALUES("3827","27","Ascencion de Guarayos");
INSERT INTO master_locations VALUES("3828","27","Bermejo");
INSERT INTO master_locations VALUES("3829","27","Bella Union");
INSERT INTO master_locations VALUES("3830","27","Camiri");
INSERT INTO master_locations VALUES("3831","27","Cochabamba");
INSERT INTO master_locations VALUES("3832","27","Cobija");
INSERT INTO master_locations VALUES("3833","27","Santa Cruz");
INSERT INTO master_locations VALUES("3834","27","Guayaramerin");
INSERT INTO master_locations VALUES("3835","27","San Jose de Chiquitos");
INSERT INTO master_locations VALUES("3836","27","San Joaquin");
INSERT INTO master_locations VALUES("3837","27","San Javier");
INSERT INTO master_locations VALUES("3838","27","La Paz");
INSERT INTO master_locations VALUES("3839","27","Magdalena");
INSERT INTO master_locations VALUES("3840","27","Oruro");
INSERT INTO master_locations VALUES("3841","27","Potosi");
INSERT INTO master_locations VALUES("3842","27","Puerto Rico");
INSERT INTO master_locations VALUES("3843","27","Puerto Suarez");
INSERT INTO master_locations VALUES("3844","27","San Ramon");
INSERT INTO master_locations VALUES("3845","27","Robore");
INSERT INTO master_locations VALUES("3846","27","Riberalta");
INSERT INTO master_locations VALUES("3847","27","Rurrenabaque");
INSERT INTO master_locations VALUES("3848","27","Reyes");
INSERT INTO master_locations VALUES("3849","27","Santa Ana del Yacuma");
INSERT INTO master_locations VALUES("3850","27","San Borja");
INSERT INTO master_locations VALUES("3851","27","San Ignacio de Velas");
INSERT INTO master_locations VALUES("3852","27","San Ignacio de Moxos");
INSERT INTO master_locations VALUES("3853","27","Sucre");
INSERT INTO master_locations VALUES("3854","27","Tarija");
INSERT INTO master_locations VALUES("3855","27","Villamontes");
INSERT INTO master_locations VALUES("3856","27","Yacuiba");
INSERT INTO master_locations VALUES("3857","204","Albina");
INSERT INTO master_locations VALUES("3858","204","Coeroeni");
INSERT INTO master_locations VALUES("3859","204","Coronie District");
INSERT INTO master_locations VALUES("3860","204","Drietabbetje");
INSERT INTO master_locations VALUES("3861","204","Zanderij");
INSERT INTO master_locations VALUES("3862","204","Kabalebo");
INSERT INTO master_locations VALUES("3863","204","Nieuw-Nickerie (New Nickerie)");
INSERT INTO master_locations VALUES("3864","204","Paloemeu");
INSERT INTO master_locations VALUES("3865","204","Stoelmans Eiland");
INSERT INTO master_locations VALUES("3866","204","Tafelberg");
INSERT INTO master_locations VALUES("3867","204","Wageningen");
INSERT INTO master_locations VALUES("3868","204","Paramaribo");
INSERT INTO master_locations VALUES("3869","77","Cayenne");
INSERT INTO master_locations VALUES("3870","77","Grand-Santi");
INSERT INTO master_locations VALUES("3871","77","Maripasoula");
INSERT INTO master_locations VALUES("3872","77","Saint-Georges-de-l\\\'Oyapock");
INSERT INTO master_locations VALUES("3873","77","Saint-Laurent-du-Maroni");
INSERT INTO master_locations VALUES("3874","77","Regina");
INSERT INTO master_locations VALUES("3875","77","Saul");
INSERT INTO master_locations VALUES("3876","77","Sinnamary");
INSERT INTO master_locations VALUES("3877","170","San Juan Aposento");
INSERT INTO master_locations VALUES("3878","170","Ucayali Region");
INSERT INTO master_locations VALUES("3879","170","Loreto Region");
INSERT INTO master_locations VALUES("3880","170","San Martin Region");
INSERT INTO master_locations VALUES("3881","170","Iberia");
INSERT INTO master_locations VALUES("3882","170","Corrientes");
INSERT INTO master_locations VALUES("3883","170","Ancash Region");
INSERT INTO master_locations VALUES("3884","170","Moquegua Region");
INSERT INTO master_locations VALUES("3885","170","Huanuco Region");
INSERT INTO master_locations VALUES("3886","170","Lambayeque Region");
INSERT INTO master_locations VALUES("3887","170","Ayacucho Region");
INSERT INTO master_locations VALUES("3888","170","Junin Region");
INSERT INTO master_locations VALUES("3889","170","Apurimac Region");
INSERT INTO master_locations VALUES("3890","170","Cusco Region");
INSERT INTO master_locations VALUES("3891","170","Lima Metropolitan Area");
INSERT INTO master_locations VALUES("3892","170","Satipo");
INSERT INTO master_locations VALUES("3893","170","Uchiza");
INSERT INTO master_locations VALUES("3894","170","Cajamarca Region");
INSERT INTO master_locations VALUES("3895","170","Puno Region");
INSERT INTO master_locations VALUES("3896","170","San Juan de Marcona");
INSERT INTO master_locations VALUES("3897","170","Arequipa Region");
INSERT INTO master_locations VALUES("3898","170","Rodriquez de Mendoza");
INSERT INTO master_locations VALUES("3899","170","Lima Province");
INSERT INTO master_locations VALUES("3900","170","Tumbes Region");
INSERT INTO master_locations VALUES("3901","170","Santa Maria");
INSERT INTO master_locations VALUES("3902","170","Saposoa");
INSERT INTO master_locations VALUES("3903","170","Leon Velarde");
INSERT INTO master_locations VALUES("3904","170","Amazonas Region");
INSERT INTO master_locations VALUES("3905","170","San Rafael");
INSERT INTO master_locations VALUES("3906","170","La Libertad Region");
INSERT INTO master_locations VALUES("3907","170","San Francisco");
INSERT INTO master_locations VALUES("3908","170","Ica Region");
INSERT INTO master_locations VALUES("3909","170","Shiringayoc");
INSERT INTO master_locations VALUES("3910","170","Tacna Region");
INSERT INTO master_locations VALUES("3911","170","Piura Region");
INSERT INTO master_locations VALUES("3912","170","Madre de Dios Region");
INSERT INTO master_locations VALUES("3913","170","Vitor");
INSERT INTO master_locations VALUES("3914","228","Artigas");
INSERT INTO master_locations VALUES("3915","228","Colonia");
INSERT INTO master_locations VALUES("3916","228","Durazno");
INSERT INTO master_locations VALUES("3917","228","Maldonado");
INSERT INTO master_locations VALUES("3918","228","Melo");
INSERT INTO master_locations VALUES("3919","228","Montevideo");
INSERT INTO master_locations VALUES("3920","228","Punta del Este");
INSERT INTO master_locations VALUES("3921","228","Paysandu");
INSERT INTO master_locations VALUES("3922","228","Rivera");
INSERT INTO master_locations VALUES("3923","228","Salto");
INSERT INTO master_locations VALUES("3924","228","Tacuarembo");
INSERT INTO master_locations VALUES("3925","228","Treinta y Tres");
INSERT INTO master_locations VALUES("3926","228","Vichadero");
INSERT INTO master_locations VALUES("3927","232","Acarigua");
INSERT INTO master_locations VALUES("3928","232","Anzoategui");
INSERT INTO master_locations VALUES("3929","232","Barinas State");
INSERT INTO master_locations VALUES("3930","232","Aragua");
INSERT INTO master_locations VALUES("3931","232","Barquisimeto");
INSERT INTO master_locations VALUES("3932","232","Bolivar");
INSERT INTO master_locations VALUES("3933","232","Caicara del Orinoco");
INSERT INTO master_locations VALUES("3934","232","Guarico");
INSERT INTO master_locations VALUES("3935","232","Canaima");
INSERT INTO master_locations VALUES("3936","232","Lara");
INSERT INTO master_locations VALUES("3937","232","Carupano");
INSERT INTO master_locations VALUES("3938","232","Falcon");
INSERT INTO master_locations VALUES("3939","232","El Dorado");
INSERT INTO master_locations VALUES("3940","232","Apure");
INSERT INTO master_locations VALUES("3941","232","Caracas Lacar");
INSERT INTO master_locations VALUES("3942","232","Portuguesa");
INSERT INTO master_locations VALUES("3943","232","Tachira");
INSERT INTO master_locations VALUES("3944","232","Zulia");
INSERT INTO master_locations VALUES("3945","232","Merida");
INSERT INTO master_locations VALUES("3946","232","Isla Margarita");
INSERT INTO master_locations VALUES("3947","232","Vargas (near Caracas)");
INSERT INTO master_locations VALUES("3948","232","Monagas");
INSERT INTO master_locations VALUES("3949","232","Carabobo");
INSERT INTO master_locations VALUES("3950","232","Yaracuy");
INSERT INTO master_locations VALUES("3951","232","San Tome");
INSERT INTO master_locations VALUES("3952","232","Santa Barbara del Zulia");
INSERT INTO master_locations VALUES("3953","232","Delta Amacuro");
INSERT INTO master_locations VALUES("3954","232","Tumeremo");
INSERT INTO master_locations VALUES("3955","232","El Vigia");
INSERT INTO master_locations VALUES("3956","94","Annai");
INSERT INTO master_locations VALUES("3957","94","Baramita");
INSERT INTO master_locations VALUES("3958","94","Bartica");
INSERT INTO master_locations VALUES("3959","94","Ogle");
INSERT INTO master_locations VALUES("3960","94","Imbaimadai");
INSERT INTO master_locations VALUES("3961","94","Kamarang");
INSERT INTO master_locations VALUES("3962","94","Karanambo");
INSERT INTO master_locations VALUES("3963","94","Karasabai");
INSERT INTO master_locations VALUES("3964","94","Kato");
INSERT INTO master_locations VALUES("3965","94","Lethem");
INSERT INTO master_locations VALUES("3966","94","Mabaruma");
INSERT INTO master_locations VALUES("3967","94","Mahdia");
INSERT INTO master_locations VALUES("3968","94","Guyana");
INSERT INTO master_locations VALUES("3969","94","New Amsterdam");
INSERT INTO master_locations VALUES("3970","94","Orinduik");
INSERT INTO master_locations VALUES("3971","94","Paruima");
INSERT INTO master_locations VALUES("3972","10","Antigua");
INSERT INTO master_locations VALUES("3973","10","Barbuda");
INSERT INTO master_locations VALUES("3974","20","Bridgetown");
INSERT INTO master_locations VALUES("3975","62","Roseau");
INSERT INTO master_locations VALUES("3976","62","Marigot");
INSERT INTO master_locations VALUES("3977","89","La Desirade");
INSERT INTO master_locations VALUES("3978","89","Basse-Terre");
INSERT INTO master_locations VALUES("3979","89","Grande-Terre");
INSERT INTO master_locations VALUES("3980","89","Marie-Galante");
INSERT INTO master_locations VALUES("3981","89","Les Saintes");
INSERT INTO master_locations VALUES("3982","136","Fort-de-France");
INSERT INTO master_locations VALUES("3983","88","Grenville");
INSERT INTO master_locations VALUES("3984","88","St. George\\\'s");
INSERT INTO master_locations VALUES("3985","88","Carriacou Island");
INSERT INTO master_locations VALUES("3986","235","St. Thomas");
INSERT INTO master_locations VALUES("3987","235","St. Croix");
INSERT INTO master_locations VALUES("3988","175","Arecibo");
INSERT INTO master_locations VALUES("3989","175","Aquadilla Borinquen");
INSERT INTO master_locations VALUES("3990","175","Vieques");
INSERT INTO master_locations VALUES("3991","175","Culebra");
INSERT INTO master_locations VALUES("3992","175","Fajardo");
INSERT INTO master_locations VALUES("3993","175","San Juan");
INSERT INTO master_locations VALUES("3994","175","Mayaguez");
INSERT INTO master_locations VALUES("3995","175","Ceiba");
INSERT INTO master_locations VALUES("3996","175","Ponce");
INSERT INTO master_locations VALUES("3997","182","Saint Kitts");
INSERT INTO master_locations VALUES("3998","182","Nevis");
INSERT INTO master_locations VALUES("3999","183","Saint Lucia");
INSERT INTO master_locations VALUES("4000","152","Bonaire");
INSERT INTO master_locations VALUES("4001","152","Sint Eustatius");
INSERT INTO master_locations VALUES("4002","152","Saba");
INSERT INTO master_locations VALUES("4003","13","Aruba");
INSERT INTO master_locations VALUES("4004","152","Curacao");
INSERT INTO master_locations VALUES("4005","152","Curacao");
INSERT INTO master_locations VALUES("4006","152","Sint Maarten");
INSERT INTO master_locations VALUES("4007","8","The Valley");
INSERT INTO master_locations VALUES("4008","145","Gerald\\\'s Park");
INSERT INTO master_locations VALUES("4009","217","Tobago");
INSERT INTO master_locations VALUES("4010","234","Anegada");
INSERT INTO master_locations VALUES("4011","234","Beef Island / Tortola");
INSERT INTO master_locations VALUES("4012","234","Virgin Gorda");
INSERT INTO master_locations VALUES("4013","185","Grenadines");
INSERT INTO master_locations VALUES("4014","185","Saint Vincent");
INSERT INTO master_locations VALUES("4015","25","Ferry Reach");
INSERT INTO master_locations VALUES("4016","152","Grand Case");
INSERT INTO master_locations VALUES("4017","179","Russia");
INSERT INTO master_locations VALUES("4018","179","Belarus");
INSERT INTO master_locations VALUES("4019","111","Kazakhstan");
INSERT INTO master_locations VALUES("4020","117","Kyrgyzstan");
INSERT INTO master_locations VALUES("4021","117","Tamchy, Kyrgyzstan");
INSERT INTO master_locations VALUES("4022","16","Baku");
INSERT INTO master_locations VALUES("4023","16","Ganja");
INSERT INTO master_locations VALUES("4024","16","Nakhchivan");
INSERT INTO master_locations VALUES("4025","16","Lenkoran");
INSERT INTO master_locations VALUES("4026","16","Zagatala");
INSERT INTO master_locations VALUES("4027","16","Yevlakh");
INSERT INTO master_locations VALUES("4028","82","Abkhazia");
INSERT INTO master_locations VALUES("4029","224","Ukraine");
INSERT INTO master_locations VALUES("4030","220","Turkmenistan");
INSERT INTO master_locations VALUES("4031","211","Tajikistan");
INSERT INTO master_locations VALUES("4032","229","Uzbekistan");
INSERT INTO master_locations VALUES("4033","101","Karnataka");
INSERT INTO master_locations VALUES("4034","101","Gujarat");
INSERT INTO master_locations VALUES("4035","101","Maharashtra");
INSERT INTO master_locations VALUES("4036","101","Chhattisgarh");
INSERT INTO master_locations VALUES("4037","101","Gujarat, India");
INSERT INTO master_locations VALUES("4038","101","Madhya Pradesh");
INSERT INTO master_locations VALUES("4039","101","Daman & Diu");
INSERT INTO master_locations VALUES("4040","101","Daparizo");
INSERT INTO master_locations VALUES("4041","101","Guna");
INSERT INTO master_locations VALUES("4042","101","Goa");
INSERT INTO master_locations VALUES("4043","101","Rajasthan");
INSERT INTO master_locations VALUES("4044","101","Arunachal Pradesh");
INSERT INTO master_locations VALUES("4045","101","Tripura");
INSERT INTO master_locations VALUES("4046","101","Mizoram");
INSERT INTO master_locations VALUES("4047","101","West Bengal");
INSERT INTO master_locations VALUES("4048","101","Meghalaya");
INSERT INTO master_locations VALUES("4049","101","Orissa");
INSERT INTO master_locations VALUES("4050","101","Assam");
INSERT INTO master_locations VALUES("4051","101","Jharkhand");
INSERT INTO master_locations VALUES("4052","101","Uttar Pradesh");
INSERT INTO master_locations VALUES("4053","101","Bihar");
INSERT INTO master_locations VALUES("4054","101","Manipur");
INSERT INTO master_locations VALUES("4055","101","Nagaland");
INSERT INTO master_locations VALUES("4056","101","Andhra Pradesh");
INSERT INTO master_locations VALUES("4057","101","Haryana");
INSERT INTO master_locations VALUES("4058","101","Punjab");
INSERT INTO master_locations VALUES("4059","101","Himachal Pradesh");
INSERT INTO master_locations VALUES("4060","101","Haryana and Punjab");
INSERT INTO master_locations VALUES("4061","101","Delhi");
INSERT INTO master_locations VALUES("4062","101","Uttarakhand");
INSERT INTO master_locations VALUES("4063","101","New Delhi");
INSERT INTO master_locations VALUES("4064","101","Jammu");
INSERT INTO master_locations VALUES("4065","101","Jammu and Kashmir");
INSERT INTO master_locations VALUES("4066","101","Uttarlai");
INSERT INTO master_locations VALUES("4067","101","Tamil Nadu");
INSERT INTO master_locations VALUES("4068","101","Kerala");
INSERT INTO master_locations VALUES("4069","101","Car Nicobar");
INSERT INTO master_locations VALUES("4070","101","Neyvafli");
INSERT INTO master_locations VALUES("4071","101","Port Blair");
INSERT INTO master_locations VALUES("4072","101","Puducherry");
INSERT INTO master_locations VALUES("4073","202","Western Province");
INSERT INTO master_locations VALUES("4074","202","North Central Province");
INSERT INTO master_locations VALUES("4075","202","Eastern");
INSERT INTO master_locations VALUES("4076","202","Gal Oya");
INSERT INTO master_locations VALUES("4077","202","Northern");
INSERT INTO master_locations VALUES("4078","202","Southern Province");
INSERT INTO master_locations VALUES("4079","202","Hambantota");
INSERT INTO master_locations VALUES("4080","37","Battambang");
INSERT INTO master_locations VALUES("4081","37","Kampong Cham");
INSERT INTO master_locations VALUES("4082","37","Kompong Chhnang");
INSERT INTO master_locations VALUES("4083","37","Koh Kong Province");
INSERT INTO master_locations VALUES("4084","37","Kratie");
INSERT INTO master_locations VALUES("4085","37","Mondulkiri");
INSERT INTO master_locations VALUES("4086","37","Phnom Penh");
INSERT INTO master_locations VALUES("4087","37","Ratanankiri");
INSERT INTO master_locations VALUES("4088","37","Siem Reap");
INSERT INTO master_locations VALUES("4089","37","Stung Treng");
INSERT INTO master_locations VALUES("4090","37","Sihanoukville");
INSERT INTO master_locations VALUES("4091","19","Barisal");
INSERT INTO master_locations VALUES("4092","19","Cox\\\'s Bazar");
INSERT INTO master_locations VALUES("4093","19","Ishurdi");
INSERT INTO master_locations VALUES("4094","19","Khulna");
INSERT INTO master_locations VALUES("4095","19","Shamshernagar");
INSERT INTO master_locations VALUES("4096","98","Chek Lap Kok");
INSERT INTO master_locations VALUES("4097","98","Kowloon");
INSERT INTO master_locations VALUES("4098","98","Shek Kong");
INSERT INTO master_locations VALUES("4099","98","Sheung Wan");
INSERT INTO master_locations VALUES("4100","118","Vientiane");
INSERT INTO master_locations VALUES("4101","118","Attopeu");
INSERT INTO master_locations VALUES("4102","118","Ban Hat Tai");
INSERT INTO master_locations VALUES("4103","118","Khong Island");
INSERT INTO master_locations VALUES("4104","118","Luang Prabang");
INSERT INTO master_locations VALUES("4105","118","Luang Namtha");
INSERT INTO master_locations VALUES("4106","118","Muang Xay");
INSERT INTO master_locations VALUES("4107","118","Pakse");
INSERT INTO master_locations VALUES("4108","118","Sayaboury");
INSERT INTO master_locations VALUES("4109","118","Savannakhet");
INSERT INTO master_locations VALUES("4110","118","Sam Neua");
INSERT INTO master_locations VALUES("4111","118","Saravane");
INSERT INTO master_locations VALUES("4112","118","Thakhek");
INSERT INTO master_locations VALUES("4113","118","Vientiane (Viangchan)");
INSERT INTO master_locations VALUES("4114","118","Xieng Khouang");
INSERT INTO master_locations VALUES("4115","127","Taipa Island (Ilha da Taipa)");
INSERT INTO master_locations VALUES("4116","151","Bajhang");
INSERT INTO master_locations VALUES("4117","151","Bhojpur");
INSERT INTO master_locations VALUES("4118","151","Baglung");
INSERT INTO master_locations VALUES("4119","151","Bharatpur");
INSERT INTO master_locations VALUES("4120","151","Bajura");
INSERT INTO master_locations VALUES("4121","151","Baitadi");
INSERT INTO master_locations VALUES("4122","151","Bhairahawa");
INSERT INTO master_locations VALUES("4123","151","Dolpa");
INSERT INTO master_locations VALUES("4124","151","Jumla");
INSERT INTO master_locations VALUES("4125","151","Kathmandu");
INSERT INTO master_locations VALUES("4126","151","Lamidanda");
INSERT INTO master_locations VALUES("4127","151","Lukla");
INSERT INTO master_locations VALUES("4128","151","Langtang");
INSERT INTO master_locations VALUES("4129","151","Manang");
INSERT INTO master_locations VALUES("4130","151","Meghauli");
INSERT INTO master_locations VALUES("4131","151","Mahendranagar");
INSERT INTO master_locations VALUES("4132","151","Nepalgunj");
INSERT INTO master_locations VALUES("4133","151","Pokhara");
INSERT INTO master_locations VALUES("4134","151","Phaplu");
INSERT INTO master_locations VALUES("4135","151","Rajbiraj");
INSERT INTO master_locations VALUES("4136","151","Ramechhap");
INSERT INTO master_locations VALUES("4137","151","Rukumkot");
INSERT INTO master_locations VALUES("4138","151","Rolpa");
INSERT INTO master_locations VALUES("4139","151","Rumjatar");
INSERT INTO master_locations VALUES("4140","151","Syanboche");
INSERT INTO master_locations VALUES("4141","151","Surkhet");
INSERT INTO master_locations VALUES("4142","151","Sanfebagar");
INSERT INTO master_locations VALUES("4143","151","Simikot");
INSERT INTO master_locations VALUES("4144","151","Taplejung");
INSERT INTO master_locations VALUES("4145","151","Tikapur");
INSERT INTO master_locations VALUES("4146","151","Tumlingtar");
INSERT INTO master_locations VALUES("4147","151","Biratnagar");
INSERT INTO master_locations VALUES("4148","26","Paro");
INSERT INTO master_locations VALUES("4149","26","Thimbu");
INSERT INTO master_locations VALUES("4150","132","Seenu Atoll");
INSERT INTO master_locations VALUES("4151","132","Haa Dhaalu Atoll");
INSERT INTO master_locations VALUES("4152","132","Laamu Atoll");
INSERT INTO master_locations VALUES("4153","132","North Male Atoll");
INSERT INTO master_locations VALUES("4154","132","Gaafu Dhaalu Atoll");
INSERT INTO master_locations VALUES("4155","213","Chantaburi (Chanthaburi)");
INSERT INTO master_locations VALUES("4156","213","Bangkok");
INSERT INTO master_locations VALUES("4157","213","Pattaya");
INSERT INTO master_locations VALUES("4158","213","Kanchanaburi");
INSERT INTO master_locations VALUES("4159","213","Lopburi");
INSERT INTO master_locations VALUES("4160","213","Prachuap Khiri Khan");
INSERT INTO master_locations VALUES("4161","213","Trat");
INSERT INTO master_locations VALUES("4162","213","Samut Prakan (near Bangkok)");
INSERT INTO master_locations VALUES("4163","213","Chonburi (Chon Buri)");
INSERT INTO master_locations VALUES("4164","213","Rayong (near Pattaya)");
INSERT INTO master_locations VALUES("4165","213","Watthana Nakhon / Prachin Buri");
INSERT INTO master_locations VALUES("4166","213","Chiang Mai");
INSERT INTO master_locations VALUES("4167","213","Mae Hong Son");
INSERT INTO master_locations VALUES("4168","213","Lampang");
INSERT INTO master_locations VALUES("4169","213","Nan");
INSERT INTO master_locations VALUES("4170","213","Lamphun");
INSERT INTO master_locations VALUES("4171","213","Phrae");
INSERT INTO master_locations VALUES("4172","213","Chiang Rai");
INSERT INTO master_locations VALUES("4173","213","Mae Sariang");
INSERT INTO master_locations VALUES("4174","213","Phetchabun");
INSERT INTO master_locations VALUES("4175","213","Hua Hin / Prachuap Khiri Khan");
INSERT INTO master_locations VALUES("4176","213","Nakhon Sawan");
INSERT INTO master_locations VALUES("4177","213","Lom Sak / Phetchabun");
INSERT INTO master_locations VALUES("4178","213","Mae Sot");
INSERT INTO master_locations VALUES("4179","213","Sukhothai");
INSERT INTO master_locations VALUES("4180","213","Phitsanulok");
INSERT INTO master_locations VALUES("4181","213","Photharam");
INSERT INTO master_locations VALUES("4182","213","Tak");
INSERT INTO master_locations VALUES("4183","213","Uttaradit");
INSERT INTO master_locations VALUES("4184","213","Phumipol Dam / Khuan Phumiphon");
INSERT INTO master_locations VALUES("4185","213","Surat Thani");
INSERT INTO master_locations VALUES("4186","213","Narathiwat");
INSERT INTO master_locations VALUES("4187","213","Chumphon");
INSERT INTO master_locations VALUES("4188","213","Nakhon Si Thammarat");
INSERT INTO master_locations VALUES("4189","213","Krabi");
INSERT INTO master_locations VALUES("4190","213","Songkhla");
INSERT INTO master_locations VALUES("4191","213","Pattani");
INSERT INTO master_locations VALUES("4192","213","Ko Samui (Ko Samui)");
INSERT INTO master_locations VALUES("4193","213","Phuket");
INSERT INTO master_locations VALUES("4194","213","Ranong");
INSERT INTO master_locations VALUES("4195","213","Hat Yai / Songkhla");
INSERT INTO master_locations VALUES("4196","213","Trang");
INSERT INTO master_locations VALUES("4197","213","Udon Thani");
INSERT INTO master_locations VALUES("4198","213","Sakon Nakhon");
INSERT INTO master_locations VALUES("4199","213","Surin");
INSERT INTO master_locations VALUES("4200","213","Khon Kaen");
INSERT INTO master_locations VALUES("4201","213","Loei");
INSERT INTO master_locations VALUES("4202","213","Nakhon Ratchasima (Khorat)");
INSERT INTO master_locations VALUES("4203","213","Buriram (Buri Ram)");
INSERT INTO master_locations VALUES("4204","213","Roi Et (Roiet)");
INSERT INTO master_locations VALUES("4205","213","Ubon Ratchathani");
INSERT INTO master_locations VALUES("4206","213","Nakhon Phanom");
INSERT INTO master_locations VALUES("4207","233","Buon Ma Thuot");
INSERT INTO master_locations VALUES("4208","233","Hai Phong");
INSERT INTO master_locations VALUES("4209","233","Da Lat");
INSERT INTO master_locations VALUES("4210","233","Ca Mau");
INSERT INTO master_locations VALUES("4211","233","Nha Trang");
INSERT INTO master_locations VALUES("4212","233","Con Dao");
INSERT INTO master_locations VALUES("4213","233","Can Tho");
INSERT INTO master_locations VALUES("4214","233","Dien Bien Phu");
INSERT INTO master_locations VALUES("4215","233","Da Nang");
INSERT INTO master_locations VALUES("4216","233","Hanoi");
INSERT INTO master_locations VALUES("4217","233","Son La");
INSERT INTO master_locations VALUES("4218","233","Hue");
INSERT INTO master_locations VALUES("4219","233","Qui Nhon");
INSERT INTO master_locations VALUES("4220","233","Pleiku");
INSERT INTO master_locations VALUES("4221","233","Phu Quoc");
INSERT INTO master_locations VALUES("4222","233","Phan Thiet");
INSERT INTO master_locations VALUES("4223","233","Rach Gia");
INSERT INTO master_locations VALUES("4224","233","Tuy Hoa");
INSERT INTO master_locations VALUES("4225","233","Ho Chi Minh City");
INSERT INTO master_locations VALUES("4226","233","Vinh");
INSERT INTO master_locations VALUES("4227","148","Anisakan");
INSERT INTO master_locations VALUES("4228","148","Bagan (Pagan)");
INSERT INTO master_locations VALUES("4229","148","Bhamo");
INSERT INTO master_locations VALUES("4230","148","Coco Island");
INSERT INTO master_locations VALUES("4231","148","Mandalay");
INSERT INTO master_locations VALUES("4232","148","Dawei (Tavoy)");
INSERT INTO master_locations VALUES("4233","148","Naypyidaw");
INSERT INTO master_locations VALUES("4234","148","Gangaw");
INSERT INTO master_locations VALUES("4235","148","Gwa");
INSERT INTO master_locations VALUES("4236","148","Hmawby");
INSERT INTO master_locations VALUES("4237","148","Heho");
INSERT INTO master_locations VALUES("4238","148","Homalin (Hommalin)");
INSERT INTO master_locations VALUES("4239","148","Tilin");
INSERT INTO master_locations VALUES("4240","148","Kengtung (Kengtong)");
INSERT INTO master_locations VALUES("4241","148","Khamti");
INSERT INTO master_locations VALUES("4242","148","Kalaymyo (Kalemyo)");
INSERT INTO master_locations VALUES("4243","148","Kyaukpyu");
INSERT INTO master_locations VALUES("4244","148","Kawthaung (Kawthoung)");
INSERT INTO master_locations VALUES("4245","148","Kyauktu");
INSERT INTO master_locations VALUES("4246","148","Loikaw");
INSERT INTO master_locations VALUES("4247","148","Lashio");
INSERT INTO master_locations VALUES("4248","148","Lanywa");
INSERT INTO master_locations VALUES("4249","148","Myeik (Mergui)");
INSERT INTO master_locations VALUES("4250","148","Myitkyina (Pamti)");
INSERT INTO master_locations VALUES("4251","148","Meiktila");
INSERT INTO master_locations VALUES("4252","148","Mawlamyaing (Mawlamyine)");
INSERT INTO master_locations VALUES("4253","148","Manaung");
INSERT INTO master_locations VALUES("4254","148","Momeik");
INSERT INTO master_locations VALUES("4255","148","Monghsat (Mong Hsat)");
INSERT INTO master_locations VALUES("4256","148","Mong-Tong (Hong Ton)");
INSERT INTO master_locations VALUES("4257","148","Magwe");
INSERT INTO master_locations VALUES("4258","148","Monywar");
INSERT INTO master_locations VALUES("4259","148","Myitkyina");
INSERT INTO master_locations VALUES("4260","148","Namsang");
INSERT INTO master_locations VALUES("4261","148","Namtu");
INSERT INTO master_locations VALUES("4262","148","Hpa-An (Pa-An)");
INSERT INTO master_locations VALUES("4263","148","Pauk");
INSERT INTO master_locations VALUES("4264","148","Pathein (Bassein)");
INSERT INTO master_locations VALUES("4265","148","Hpapun");
INSERT INTO master_locations VALUES("4266","148","Putao");
INSERT INTO master_locations VALUES("4267","148","Pakokku");
INSERT INTO master_locations VALUES("4268","148","Pyay (Prome)");
INSERT INTO master_locations VALUES("4269","148","Shante");
INSERT INTO master_locations VALUES("4270","148","Sittwe");
INSERT INTO master_locations VALUES("4271","148","Thandwe");
INSERT INTO master_locations VALUES("4272","148","Tachilek (Tachileik)");
INSERT INTO master_locations VALUES("4273","148","Ye");
INSERT INTO master_locations VALUES("4274","148","Yangon (Rangoon)");
INSERT INTO master_locations VALUES("4275","102","South Sulawesi");
INSERT INTO master_locations VALUES("4276","102","Bau Bau");
INSERT INTO master_locations VALUES("4277","102","West Sulawesi");
INSERT INTO master_locations VALUES("4278","102","Masamba");
INSERT INTO master_locations VALUES("4279","102","Soroako");
INSERT INTO master_locations VALUES("4280","102","South East Sulawesi");
INSERT INTO master_locations VALUES("4281","102","Papua");
INSERT INTO master_locations VALUES("4282","102","Moanamani");
INSERT INTO master_locations VALUES("4283","102","Noemfoor");
INSERT INTO master_locations VALUES("4284","102","Wagethe");
INSERT INTO master_locations VALUES("4285","102","Nabire");
INSERT INTO master_locations VALUES("4286","102","Ilaga (Papua)");
INSERT INTO master_locations VALUES("4287","102","Tembagapura");
INSERT INTO master_locations VALUES("4288","102","Enarotali");
INSERT INTO master_locations VALUES("4289","102","Lombok");
INSERT INTO master_locations VALUES("4290","102","Arso");
INSERT INTO master_locations VALUES("4291","102","Bokondini");
INSERT INTO master_locations VALUES("4292","102","Lereh");
INSERT INTO master_locations VALUES("4293","102","Mulia");
INSERT INTO master_locations VALUES("4294","102","Oksibil");
INSERT INTO master_locations VALUES("4295","102","Waris");
INSERT INTO master_locations VALUES("4296","102","Senggeh");
INSERT INTO master_locations VALUES("4297","102","Wamena");
INSERT INTO master_locations VALUES("4298","102","Mindiptana");
INSERT INTO master_locations VALUES("4299","102","Bade");
INSERT INTO master_locations VALUES("4300","102","Merauke");
INSERT INTO master_locations VALUES("4301","102","Okaba");
INSERT INTO master_locations VALUES("4302","102","Kepi");
INSERT INTO master_locations VALUES("4303","102","Tanah Merah");
INSERT INTO master_locations VALUES("4304","102","East Kalimantan");
INSERT INTO master_locations VALUES("4305","102","Galela");
INSERT INTO master_locations VALUES("4306","102","Naha");
INSERT INTO master_locations VALUES("4307","102","Toli Toli");
INSERT INTO master_locations VALUES("4308","102","Central Sulawesi");
INSERT INTO master_locations VALUES("4309","102","North Sulawesi");
INSERT INTO master_locations VALUES("4310","102","Melangguane");
INSERT INTO master_locations VALUES("4311","102","Maluku Islands");
INSERT INTO master_locations VALUES("4312","102","West Papua");
INSERT INTO master_locations VALUES("4313","102","Dobo");
INSERT INTO master_locations VALUES("4314","102","Mangole Island");
INSERT INTO master_locations VALUES("4315","102","Saumlaki");
INSERT INTO master_locations VALUES("4316","102","Langgur");
INSERT INTO master_locations VALUES("4317","102","Sanana");
INSERT INTO master_locations VALUES("4318","102","Maluku");
INSERT INTO master_locations VALUES("4319","102","Namlea");
INSERT INTO master_locations VALUES("4320","102","Taliabu");
INSERT INTO master_locations VALUES("4321","102","Madiun");
INSERT INTO master_locations VALUES("4322","102","Sidoarjo (near Surabaya)");
INSERT INTO master_locations VALUES("4323","102","Ransiki");
INSERT INTO master_locations VALUES("4324","102","Kebar");
INSERT INTO master_locations VALUES("4325","102","Fak Fak");
INSERT INTO master_locations VALUES("4326","102","Inanwatan");
INSERT INTO master_locations VALUES("4327","102","Kaimana");
INSERT INTO master_locations VALUES("4328","102","Merdei");
INSERT INTO master_locations VALUES("4329","102","Babo");
INSERT INTO master_locations VALUES("4330","102","Manokwari");
INSERT INTO master_locations VALUES("4331","102","Sorong");
INSERT INTO master_locations VALUES("4332","102","Teminabuan");
INSERT INTO master_locations VALUES("4333","102","Wasior");
INSERT INTO master_locations VALUES("4334","102","East Nusa Tenggara");
INSERT INTO master_locations VALUES("4335","102","Aceh");
INSERT INTO master_locations VALUES("4336","102","East Java");
INSERT INTO master_locations VALUES("4337","102","Riau");
INSERT INTO master_locations VALUES("4338","102","Sipura");
INSERT INTO master_locations VALUES("4339","102","Tanjung Balai");
INSERT INTO master_locations VALUES("4340","102","Banten");
INSERT INTO master_locations VALUES("4341","102","West Java");
INSERT INTO master_locations VALUES("4342","102","Riau Islands");
INSERT INTO master_locations VALUES("4343","102","Jakarta");
INSERT INTO master_locations VALUES("4344","102","Central Java");
INSERT INTO master_locations VALUES("4345","102","Banten (near Jakarta)");
INSERT INTO master_locations VALUES("4346","102","Yogyakarta (special region)");
INSERT INTO master_locations VALUES("4347","102","Lampung");
INSERT INTO master_locations VALUES("4348","102","Tanjung Pandan");
INSERT INTO master_locations VALUES("4349","102","Bangka-Belitung Islands");
INSERT INTO master_locations VALUES("4350","102","South Sumatra");
INSERT INTO master_locations VALUES("4351","102","North Sumatra");
INSERT INTO master_locations VALUES("4352","102","Padang Sidempuan");
INSERT INTO master_locations VALUES("4353","102","West Sumatra");
INSERT INTO master_locations VALUES("4354","102","Kalimantan");
INSERT INTO master_locations VALUES("4355","102","Ketapang");
INSERT INTO master_locations VALUES("4356","102","Riau Province");
INSERT INTO master_locations VALUES("4357","102","West Kalimantan");
INSERT INTO master_locations VALUES("4358","102","Putussibau");
INSERT INTO master_locations VALUES("4359","102","Sintang");
INSERT INTO master_locations VALUES("4360","102","Jambi");
INSERT INTO master_locations VALUES("4361","102","Bengkulu");
INSERT INTO master_locations VALUES("4362","102","Pendopo");
INSERT INTO master_locations VALUES("4363","102","Sumatra");
INSERT INTO master_locations VALUES("4364","102","Keluang");
INSERT INTO master_locations VALUES("4365","102","Tapak Tuan");
INSERT INTO master_locations VALUES("4366","102","Primapun");
INSERT INTO master_locations VALUES("4367","102","South Kalimantan");
INSERT INTO master_locations VALUES("4368","102","Pangkalan Bun");
INSERT INTO master_locations VALUES("4369","102","Kotabaru");
INSERT INTO master_locations VALUES("4370","102","Central Kalimantan");
INSERT INTO master_locations VALUES("4371","102","Sampit");
INSERT INTO master_locations VALUES("4372","102","Atambua");
INSERT INTO master_locations VALUES("4373","102","Bajawa");
INSERT INTO master_locations VALUES("4374","102","Maumere");
INSERT INTO master_locations VALUES("4375","102","Ruteng");
INSERT INTO master_locations VALUES("4376","102","Larantuka");
INSERT INTO master_locations VALUES("4377","102","Labuhan Bajo");
INSERT INTO master_locations VALUES("4378","102","Long Bawan");
INSERT INTO master_locations VALUES("4379","102","Bontang");
INSERT INTO master_locations VALUES("4380","102","Tanah Grogot");
INSERT INTO master_locations VALUES("4381","102","Long Apung");
INSERT INTO master_locations VALUES("4382","102","Tanjung Santan");
INSERT INTO master_locations VALUES("4383","102","West Nusa Tenggara");
INSERT INTO master_locations VALUES("4384","102","Bima");
INSERT INTO master_locations VALUES("4385","102","Cepu");
INSERT INTO master_locations VALUES("4386","102","Sumenep");
INSERT INTO master_locations VALUES("4387","33","Anduki / Seria");
INSERT INTO master_locations VALUES("4388","33","Bandar Seri Begawan");
INSERT INTO master_locations VALUES("4389","131","Long Atip");
INSERT INTO master_locations VALUES("4390","131","Sarawak");
INSERT INTO master_locations VALUES("4391","131","Long Geng");
INSERT INTO master_locations VALUES("4392","131","Long Akah");
INSERT INTO master_locations VALUES("4393","131","Sematan");
INSERT INTO master_locations VALUES("4394","131","Lio Matu");
INSERT INTO master_locations VALUES("4395","131","Tanjung Manis");
INSERT INTO master_locations VALUES("4396","131","Sabah");
INSERT INTO master_locations VALUES("4397","131","Telupid");
INSERT INTO master_locations VALUES("4398","131","Tommanggong");
INSERT INTO master_locations VALUES("4399","131","Sepulot");
INSERT INTO master_locations VALUES("4400","131","Pamol");
INSERT INTO master_locations VALUES("4401","131","Negeri Sembilan");
INSERT INTO master_locations VALUES("4402","131","Johor");
INSERT INTO master_locations VALUES("4403","131","Pahang");
INSERT INTO master_locations VALUES("4404","131","Perak");
INSERT INTO master_locations VALUES("4405","131","Grik");
INSERT INTO master_locations VALUES("4406","131","Jendarata");
INSERT INTO master_locations VALUES("4407","131","Sungai Tiang");
INSERT INTO master_locations VALUES("4408","131","Sungei Patani");
INSERT INTO master_locations VALUES("4409","131","Ulu Bernam");
INSERT INTO master_locations VALUES("4410","131","Kroh");
INSERT INTO master_locations VALUES("4411","131","Selangor");
INSERT INTO master_locations VALUES("4412","131","Gong Kedak Terengganu");
INSERT INTO master_locations VALUES("4413","131","Kedah");
INSERT INTO master_locations VALUES("4414","131","Penang");
INSERT INTO master_locations VALUES("4415","131","Kelantan");
INSERT INTO master_locations VALUES("4416","131","Terengganu");
INSERT INTO master_locations VALUES("4417","131","Kuala Lumpur");
INSERT INTO master_locations VALUES("4418","131","Malacca");
INSERT INTO master_locations VALUES("4419","131","Lutong");
INSERT INTO master_locations VALUES("4420","131","Pulau Pangkor");
INSERT INTO master_locations VALUES("4421","131","Pulau Redang");
INSERT INTO master_locations VALUES("4422","64","Atauro");
INSERT INTO master_locations VALUES("4423","64","Suai");
INSERT INTO master_locations VALUES("4424","64","Dili");
INSERT INTO master_locations VALUES("4425","64","Baucau");
INSERT INTO master_locations VALUES("4426","64","Fuiloro");
INSERT INTO master_locations VALUES("4427","64","Maliana");
INSERT INTO master_locations VALUES("4428","64","Oecussi");
INSERT INTO master_locations VALUES("4429","64","Viqueque");
INSERT INTO master_locations VALUES("4430","194","Singapore");
INSERT INTO master_locations VALUES("4431","194","Tengah");
INSERT INTO master_locations VALUES("4432","194","Seletar");
INSERT INTO master_locations VALUES("4433","194","Changi");
INSERT INTO master_locations VALUES("4434","14","Western Australia");
INSERT INTO master_locations VALUES("4435","14","Queensland");
INSERT INTO master_locations VALUES("4436","14","New South Wales");
INSERT INTO master_locations VALUES("4437","14","Northern Territory");
INSERT INTO master_locations VALUES("4438","14","Cobar");
INSERT INTO master_locations VALUES("4439","14","Tasmania");
INSERT INTO master_locations VALUES("4440","14","South Australia");
INSERT INTO master_locations VALUES("4441","14","Australia");
INSERT INTO master_locations VALUES("4442","14","Victoria near Ballan");
INSERT INTO master_locations VALUES("4443","14","Cocos (Keeling) Islands");
INSERT INTO master_locations VALUES("4444","14","Christmas Island");
INSERT INTO master_locations VALUES("4445","14","Australian Capital Territory");
INSERT INTO master_locations VALUES("4446","14","Norfolk Island");
INSERT INTO master_locations VALUES("4447","45","Beijing");
INSERT INTO master_locations VALUES("4448","45","Inner Mongolia");
INSERT INTO master_locations VALUES("4449","45","Shanxi");
INSERT INTO master_locations VALUES("4450","45","Hebei");
INSERT INTO master_locations VALUES("4451","45","Tianjin");
INSERT INTO master_locations VALUES("4452","45","Guangxi");
INSERT INTO master_locations VALUES("4453","45","Guangdong");
INSERT INTO master_locations VALUES("4454","45","Hunan");
INSERT INTO master_locations VALUES("4455","45","Henan");
INSERT INTO master_locations VALUES("4456","45","Hubei");
INSERT INTO master_locations VALUES("4457","45","Hainan");
INSERT INTO master_locations VALUES("4458","45","Gansu");
INSERT INTO master_locations VALUES("4459","45","Qinghai");
INSERT INTO master_locations VALUES("4460","45","Shaanxi");
INSERT INTO master_locations VALUES("4461","45","Ningxia");
INSERT INTO master_locations VALUES("4462","45","Shandong");
INSERT INTO master_locations VALUES("4463","45","Yunnan");
INSERT INTO master_locations VALUES("4464","45","Fujian");
INSERT INTO master_locations VALUES("4465","45","Anhui");
INSERT INTO master_locations VALUES("4466","45","Jiangsu");
INSERT INTO master_locations VALUES("4467","45","Jiangxi");
INSERT INTO master_locations VALUES("4468","45","Zhejiang");
INSERT INTO master_locations VALUES("4469","45","Shanghai");
INSERT INTO master_locations VALUES("4470","45","Tibet Autonomous Region");
INSERT INTO master_locations VALUES("4471","45","Chongqing");
INSERT INTO master_locations VALUES("4472","45","Sichuan");
INSERT INTO master_locations VALUES("4473","45","Guizhou");
INSERT INTO master_locations VALUES("4474","45","Xinjiang");
INSERT INTO master_locations VALUES("4475","45","Liaoning");
INSERT INTO master_locations VALUES("4476","45","Jilin");
INSERT INTO master_locations VALUES("4477","45","Heilongjiang");
INSERT INTO master_locations VALUES("4478","114","Pyongyang");
INSERT INTO master_locations VALUES("4479","144","Ovorkhangai");
INSERT INTO master_locations VALUES("4480","144","Govi-Altai");
INSERT INTO master_locations VALUES("4481","144","Bayankhongor");
INSERT INTO master_locations VALUES("4482","144","Bulgan");
INSERT INTO master_locations VALUES("4483","144","Khovd");
INSERT INTO master_locations VALUES("4484","144","Sukhbaatar ");
INSERT INTO master_locations VALUES("4485","144","Dornod");
INSERT INTO master_locations VALUES("4486","144","Omnogovi");
INSERT INTO master_locations VALUES("4487","144","Dundgovi");
INSERT INTO master_locations VALUES("4488","144","Khovsgol");
INSERT INTO master_locations VALUES("4489","144","Arkhangai");
INSERT INTO master_locations VALUES("4490","144","Ulan Bator (Ulaanbaatar)");
INSERT INTO master_locations VALUES("4491","144","Uvs");
INSERT INTO master_locations VALUES("4492","144","Khentii");
INSERT INTO master_locations VALUES("4493","144","Bayan Olgii");
INSERT INTO master_locations VALUES("4494","76","St. Jean");
INSERT INTO master_locations VALUES("4495","19","Magura");



DROP TABLE IF EXISTS master_messages;

CREATE TABLE `master_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_name` varchar(200) NOT NULL,
  `msg` varchar(200) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

INSERT INTO master_messages VALUES("1","Register Success","You have registered successfully");
INSERT INTO master_messages VALUES("2","Register Failed","Registration Failed");
INSERT INTO master_messages VALUES("3","Incorrect Security Code","Incorrect Security Code");
INSERT INTO master_messages VALUES("4","Login: 3 Attempts","Account has inactive due to three times wrong password, for active please send request to Admin.");
INSERT INTO master_messages VALUES("5","Login: failed","Login Failed ! Invalid Identity.");
INSERT INTO master_messages VALUES("6","Login: accout Inactive","Account has inactive , for active please send request to Admin.");
INSERT INTO master_messages VALUES("7","Forgot Password: success","A new password has been sent to your given email id");
INSERT INTO master_messages VALUES("8","Forgot Password: wrong Mail Id","Wrong mail id given.");
INSERT INTO master_messages VALUES("9","PostAd: description length","Description length must be minimum 45 character");
INSERT INTO master_messages VALUES("10","PostAd: description blank","write your description");
INSERT INTO master_messages VALUES("11","PostAd: brand blank","Select your Ad brand");
INSERT INTO master_messages VALUES("12","PostAd: Model blank","Select your Ad Model");
INSERT INTO master_messages VALUES("13","PostAd: price blank","Price must be fill out");
INSERT INTO master_messages VALUES("14","PostAd: quantity blank","Quantity must be fill out");
INSERT INTO master_messages VALUES("15","PostAd: payment Mode blank","Choose a payment Mode");
INSERT INTO master_messages VALUES("16","PostAd: delivery method blank","Choose a Delivery Method");
INSERT INTO master_messages VALUES("17","PostAd: cost blank","Delivery cost must be fill out");
INSERT INTO master_messages VALUES("18","PostAd: second step success","successfully completed the second step");
INSERT INTO master_messages VALUES("19","PostAd: Update Message","successfully Updated");
INSERT INTO master_messages VALUES("20","Post Ad: blank Image","upload your post Ad image");
INSERT INTO master_messages VALUES("21","Post Ad: upto 8 image","Upload Upto 8 images");
INSERT INTO master_messages VALUES("22","Post Ad:More than 8 image","You have already {count} images on your Ad so, delete some image to add new image");
INSERT INTO master_messages VALUES("23","Post Ad: failed","The post ad could not be saved. Please, try again.");
INSERT INTO master_messages VALUES("24","Reqauest Parts: Year Blank","Enter year");
INSERT INTO master_messages VALUES("25","Reqauest Parts: i_offer Blank","Choose an offer parts");
INSERT INTO master_messages VALUES("26","Reqauest Parts: Save Success","The request part has been saved.");
INSERT INTO master_messages VALUES("27","Reqauest Parts: save Failed","The request part could not be saved. Please, try again.");
INSERT INTO master_messages VALUES("28","Reqauest Parts: Invalid Login ","Invalid Login Credential");
INSERT INTO master_messages VALUES("29","Reqauest Parts: Login Blank","Fill the login form to proceed");
INSERT INTO master_messages VALUES("30","Reqauest Parts:  Edit: Success","The Request parts updated successfully.");
INSERT INTO master_messages VALUES("31","Reqauest Parts:  Edit: Fail","The request parts could not be updated. Please, try again.");
INSERT INTO master_messages VALUES("32","Profile: Success","Uploaded Image successfully.");
INSERT INTO master_messages VALUES("33","Profile: Failed","Uploading Failed");
INSERT INTO master_messages VALUES("34","To Rate: Success","Rating successfully give to {UserType}");
INSERT INTO master_messages VALUES("35","To Rate: Fail","Rating failed.");
INSERT INTO master_messages VALUES("36","Posts: sent Message: Success","Message sent successfully");
INSERT INTO master_messages VALUES("37","Posts: sent Message: Fail","Message Sending Failed");
INSERT INTO master_messages VALUES("38","Posts: Delete message: Success","Message Deleted Successfully");
INSERT INTO master_messages VALUES("39","Posts: Delete message: Failed","Message deleting Failed");
INSERT INTO master_messages VALUES("40","Edit Account: Success","Account updated successfully.");
INSERT INTO master_messages VALUES("41","Edit Account: Failed","Account Updating Failed");
INSERT INTO master_messages VALUES("42","Ask question: success","Question asked successfully");
INSERT INTO master_messages VALUES("43","Ask question: fail ","Question asking failed");
INSERT INTO master_messages VALUES("44","Request parts: Bid offer: offer to own parts","You can not bid offer to your post parts");
INSERT INTO master_messages VALUES("45","Request Parts:  bid offer: Offer field Blank","Choose a Offer");
INSERT INTO master_messages VALUES("46","Request Parts: bid offer: Availability field Blank","Choose a Availability ");
INSERT INTO master_messages VALUES("47","Request Parts: bid offer: delivery field Blank ","Choose a Delivery Method");
INSERT INTO master_messages VALUES("48","Request Parts: bid offer: delivery cost field Blank","Delivery cost must be fill out");
INSERT INTO master_messages VALUES("49","Request Parts: bid offer: payment Methods field Blank ","Choose a payment Methods");
INSERT INTO master_messages VALUES("50","Request Parts: bid offer:success","Offer bid successfully");
INSERT INTO master_messages VALUES("51","Request Parts: bid offer: fail","Offer Bidding Failed");
INSERT INTO master_messages VALUES("52","Request Parts: bid offer: Not sufficient credit","Your account has no sufficient credits to Bid this offer");
INSERT INTO master_messages VALUES("53","Sales Order: own Product validation","You can not order your sales");
INSERT INTO master_messages VALUES("54","Sales Order: Already order","You have already ordered this sales");
INSERT INTO master_messages VALUES("55","Sales Order: Success","Your order booked successfully");
INSERT INTO master_messages VALUES("56","Sales Order: Fail","Ordering failed");
INSERT INTO master_messages VALUES("57","Truck Parks: Success","The Truk parks saved successfully.");
INSERT INTO master_messages VALUES("58","Truck Parks: Failed","The Truk parks saving failed.");
INSERT INTO master_messages VALUES("59","Company Parts: Success","Company Parts saved successfully.");
INSERT INTO master_messages VALUES("60","Company Parts: Fail","Company Parts saving failed.");
INSERT INTO master_messages VALUES("61","News Letter: email Exist Message","Email ID Already Exists!");
INSERT INTO master_messages VALUES("62","News Letter: Success","News Letter Subscribed successfully. Check your email to confirm your Email ID");
INSERT INTO master_messages VALUES("63","News Letter: Success Failed","News Letter Subscribed Failed");
INSERT INTO master_messages VALUES("64","News Letter: Verified:  Success","E-Mail Verified Successfully");
INSERT INTO master_messages VALUES("65","News Letter: Verified: Fail","E-Mail Verified failed");
INSERT INTO master_messages VALUES("66","Reply Question : success","Reply successfully");
INSERT INTO master_messages VALUES("67","Reply Question : fail","Reply failed");
INSERT INTO master_messages VALUES("68","Edit Email: success","Email changed successfully.");
INSERT INTO master_messages VALUES("69","Edit Email: fail","Updating Failed");
INSERT INTO master_messages VALUES("70","change Password: password length","Password length should be minimum 5 characters long. ");
INSERT INTO master_messages VALUES("71","change Password: incorrect current password","Incorrect current password");
INSERT INTO master_messages VALUES("72","Change Password: success","Password changed successfully");
INSERT INTO master_messages VALUES("73","change password: fail","Updating Failed");
INSERT INTO master_messages VALUES("74","change password: pwd mismatch","Retype password should match to new password.");
INSERT INTO master_messages VALUES("75","Alert Auto Parts: Success","Subscribe Alert successfully submited");
INSERT INTO master_messages VALUES("76","Alert Auto Parts: Failed","Subscribe alert submiting failed");
INSERT INTO master_messages VALUES("77","Warranty: success","Your settings has been updated\n");
INSERT INTO master_messages VALUES("78","Warranty: fail","Your settings updating failed");
INSERT INTO master_messages VALUES("79","Success Stories: Success","The success story has been saved.");
INSERT INTO master_messages VALUES("80","Success Stories: Failed","The success story could not be saved. Please, try again.");



DROP TABLE IF EXISTS master_user_types;

CREATE TABLE `master_user_types` (
  `ut_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO master_user_types VALUES("1","Buyer");
INSERT INTO master_user_types VALUES("2","Seller");



DROP TABLE IF EXISTS master_users;

CREATE TABLE `master_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone2` varchar(20) DEFAULT NULL,
  `telephone3` varchar(20) DEFAULT NULL,
  `telephone4` varchar(20) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `locality_id` int(11) NOT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `other_add` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type_id` tinyint(4) NOT NULL COMMENT '1 => buyer, 2=> Seller',
  `profile_img` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_facebook` tinyint(4) NOT NULL DEFAULT '0',
  `wrong_login_attempt` int(11) NOT NULL,
  `last_login` date DEFAULT NULL,
  `is_premium` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO master_users VALUES("1","chittaranjan","sahoo","test@gmail.com","e10adc3949ba59abbe56e057f20f883e","2334534","","","","14","0","","","1","1427375004Lighthouse.jpg","1","0","0","0","2015-03-30","0","2015-03-19 13:13:34","2015-03-30 09:00:39");
INSERT INTO master_users VALUES("2","biswonath","Nishra","abcd@gmail.com","e10adc3949ba59abbe56e057f20f883e","1234567890","","","","3","1755","","","1","","1","0","0","0","2015-03-27","0","2015-03-19 13:18:24","2015-03-27 13:59:44");
INSERT INTO master_users VALUES("3","praneet","mohanty","wxyz@gmail.com","e10adc3949ba59abbe56e057f20f883e","21423","","","","17","2966","","","1","","1","0","0","0","2015-03-24","0","2015-03-19 13:20:59","2015-03-25 08:58:44");
INSERT INTO master_users VALUES("4","ramesh","raja","test@test.com","e10adc3949ba59abbe56e057f20f883e","1234567890","","","","3","0","","Eicra Soft Ltd. is professional web development and offshore outsourcingg","2","","1","0","0","0","","0","2015-03-25 10:05:24","2015-03-26 14:58:17");
INSERT INTO master_users VALUES("5","gfhfg","fghfg","dfdg@sdfgds.com","827ccb0eea8a706c4c34a16891f84e7b","32534534","","","","60","0","","","1","","1","0","0","0","","0","2015-03-26 12:00:06","2015-03-26 12:00:06");



DROP TABLE IF EXISTS news;

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) NOT NULL,
  `news_content` text NOT NULL,
  `news_img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO news VALUES("2","Customization of search","<p>Dezmembraripenet.ro is a good portal for people to search and we are getting lot of enquiries. This is a good indication of the response we are getting from customers. So it is helping grow our business.</p>\n","1427284220details.jpg","1","2015-03-25 12:50:20","2015-03-26 14:59:43");



DROP TABLE IF EXISTS news_letters;

CREATE TABLE `news_letters` (
  `news_letter_id` int(10) NOT NULL AUTO_INCREMENT,
  `news_name` varchar(150) NOT NULL,
  `news_email` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`news_letter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO news_letters VALUES("1","chittaranjan sahoo","chittas970@gmail.com","1","2015-03-20 10:34:04");
INSERT INTO news_letters VALUES("2","fvfgfdg","sdfs@fgd.com","0","2015-03-27 08:36:51");
INSERT INTO news_letters VALUES("3","sdfds","chittas970@gmail.comsdf","0","2015-03-27 08:49:38");



DROP TABLE IF EXISTS newsletter_template;

CREATE TABLE `newsletter_template` (
  `compose_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL COMMENT '1 => Buyer, 2=> Seller, 3=> Subscriber',
  `mail_subject` varchar(200) NOT NULL,
  `mail_body` text NOT NULL,
  `compose_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`compose_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO newsletter_template VALUES("1","3","Template for you","<p>Dear&nbsp;{Name},</p>\n\n<p>this template is only for u</p>\n","1","2015-03-20 06:49:26");
INSERT INTO newsletter_template VALUES("2","1","Template for Buyer","<p>Dear {Name},</p>\n\n<p>Hi user this buyer template</p>\n\n<p>Regards</p>\n\n<p>Dezmembraripenet</p>\n","1","2015-03-20 10:28:54");
INSERT INTO newsletter_template VALUES("3","2","Template for Seller","<p>Dear {Name},</p>\n\n<p>Hi user this the seller template</p>\n\n<p>Regards</p>\n\n<p>Dezmembraripenet</p>\n","1","2015-03-20 10:31:27");



DROP TABLE IF EXISTS park_imgs;

CREATE TABLE `park_imgs` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `park_id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO park_imgs VALUES("1","1","1426766635d4.jpg");
INSERT INTO park_imgs VALUES("2","1","1426766635d3.jpg");
INSERT INTO park_imgs VALUES("3","1","1426766635d2.jpg");
INSERT INTO park_imgs VALUES("4","1","1426766635d1.jpg");



DROP TABLE IF EXISTS park_ratings;

CREATE TABLE `park_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `park_id` int(11) NOT NULL,
  `rating_from` int(11) NOT NULL COMMENT '1=> truck park, 2 => company parts',
  `ratingno` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS postad_img;

CREATE TABLE `postad_img` (
  `imgid` int(11) NOT NULL AUTO_INCREMENT,
  `post_ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO postad_img VALUES("2","1","0","1426767325d3.jpg");
INSERT INTO postad_img VALUES("3","1","0","1426767325d2.jpg");
INSERT INTO postad_img VALUES("4","1","0","1426767325d1.jpg");
INSERT INTO postad_img VALUES("5","3","0","1427092585dezmembrez-mitsubishi-pajero-3-2did-ff6951510b3b0941d4-300-300-2-95-1.jpg");
INSERT INTO postad_img VALUES("6","5","0","1427194180details.jpg");
INSERT INTO postad_img VALUES("7","5","0","1427194180dezmembrez_rover.jpg");
INSERT INTO postad_img VALUES("9","6","0","1427372112Desert.jpg");
INSERT INTO postad_img VALUES("10","6","0","1427372112Hydrangeas.jpg");
INSERT INTO postad_img VALUES("11","6","0","1427372112Jellyfish.jpg");
INSERT INTO postad_img VALUES("12","6","0","1427372112Koala.jpg");
INSERT INTO postad_img VALUES("13","6","0","1427372112Lighthouse.jpg");
INSERT INTO postad_img VALUES("16","6","0","1427372232Koala.jpg");
INSERT INTO postad_img VALUES("17","6","0","1427372232Lighthouse.jpg");
INSERT INTO postad_img VALUES("18","6","0","1427372232Penguins.jpg");
INSERT INTO postad_img VALUES("19","7","0","1427452882Hydrangeas.jpg");
INSERT INTO postad_img VALUES("20","7","0","1427452882Tulips.jpg");



DROP TABLE IF EXISTS request_accessories;

CREATE TABLE `request_accessories` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `name_piece` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `part_no` varchar(100) NOT NULL,
  `max_price` int(20) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `part_img` varchar(200) NOT NULL,
  `offerno` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>inactive, 1=> active, 2=>resolved',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO request_accessories VALUES("1","1","test insert","test-insert","sdfgvdk nsdflnglfd nfdslgnd nsdfg sd nfdsdffndsvgnfdl nlsfdgd","123","230","RON","1","1","1","2015-03-19 14:26:10","2015-03-27 07:14:55");
INSERT INTO request_accessories VALUES("2","1","Mirror","mirror","Mirror with 3d efect","1233","312","RON","2","2","2","2015-03-19 14:26:10","2015-03-19 14:43:58");
INSERT INTO request_accessories VALUES("3","2","geer box","geer-box","ghjgh","ghjg","0","RON","1","0","1","2015-03-26 13:41:50","2015-03-26 13:55:13");



DROP TABLE IF EXISTS request_img;

CREATE TABLE `request_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `parts_id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO request_img VALUES("1","1","1426771506d3.jpg");
INSERT INTO request_img VALUES("2","1","1426771506d2.jpg");
INSERT INTO request_img VALUES("3","1","1426771507d1.jpg");
INSERT INTO request_img VALUES("4","2","1426771560d4.jpg");
INSERT INTO request_img VALUES("5","2","1426771561car.jpg");
INSERT INTO request_img VALUES("6","3","1427373739Lighthouse.jpg");
INSERT INTO request_img VALUES("7","3","1427373739Penguins.jpg");



DROP TABLE IF EXISTS request_parts;

CREATE TABLE `request_parts` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `version` varchar(200) NOT NULL,
  `yr_of_manufacture` varchar(20) NOT NULL,
  `engines` varchar(100) NOT NULL,
  `vehicle_identy_no` varchar(50) NOT NULL,
  `i_offer_parts` varchar(100) NOT NULL,
  `county` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 => pending, 1=> active, 2=>solved,3=> inactive',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO request_parts VALUES("1","1","1","2","v 1.2","2013","Honda","2342","0,We,0","18","3220","2015-03-19 14:26:10","2015-03-19 14:26:10","1");
INSERT INTO request_parts VALUES("2","1","1","3","v 1.2","2010","Ewwe","","0,We,0","1","125","2015-03-26 13:41:50","2015-03-26 13:55:13","1");



DROP TABLE IF EXISTS request_question;

CREATE TABLE `request_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(10) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO request_question VALUES("1","0","2","1","1","dgjghjg","2015-03-27 06:40:32");
INSERT INTO request_question VALUES("2","0","2","1","1","gfh","2015-03-27 06:44:57");
INSERT INTO request_question VALUES("3","0","2","1","1","htyf","2015-03-27 06:48:49");



DROP TABLE IF EXISTS request_temp_img;

CREATE TABLE `request_temp_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seqno` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_add_parts;

CREATE TABLE `sales_add_parts` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `version` varchar(100) NOT NULL,
  `manufacture_yr` int(11) NOT NULL,
  `engine` int(11) NOT NULL,
  `identification_no` int(11) DEFAULT NULL,
  `name_piece` varchar(100) NOT NULL,
  `description` text,
  `part_no` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `offer_parts` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `is_solved` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_add_to_favourites;

CREATE TABLE `sales_add_to_favourites` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `favcount` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO sales_add_to_favourites VALUES("1","3","1","127.0.0.1","1","2015-03-24 11:47:13","2015-03-24 11:47:13");
INSERT INTO sales_add_to_favourites VALUES("2","1","5","127.0.0.1","1","2015-03-24 11:51:29","2015-03-24 11:51:29");
INSERT INTO sales_add_to_favourites VALUES("3","2","5","127.0.0.1","1","2015-03-24 11:51:55","2015-03-24 11:51:55");
INSERT INTO sales_add_to_favourites VALUES("4","2","1","127.0.0.1","1","2015-03-24 11:52:12","2015-03-24 11:52:12");
INSERT INTO sales_add_to_favourites VALUES("5","2","3","127.0.0.1","1","2015-03-24 11:52:21","2015-03-24 11:52:21");



DROP TABLE IF EXISTS sales_advertisements;

CREATE TABLE `sales_advertisements` (
  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `adv_name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `adv_details` text,
  `adv_img` varchar(255) DEFAULT NULL,
  `adv_brand_id` varchar(100) DEFAULT NULL,
  `adv_model_id` varchar(100) NOT NULL,
  `product_cond` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `currency` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `personal_teaching` int(11) NOT NULL,
  `courier` int(11) NOT NULL,
  `courier_cost` double DEFAULT NULL,
  `free_courier` int(11) NOT NULL,
  `romanian_mail` int(11) NOT NULL,
  `romanian_mail_cost` double DEFAULT NULL,
  `free_romanian_mail` int(11) NOT NULL,
  `time_required` int(11) NOT NULL,
  `adv_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO sales_advertisements VALUES("1","1","1","4","BMW 3 Series E46 front bumper year in 2001 with projectors and green grid","bmw-3-series-e46-front-bumper-year-in-2001-with-projectors-and-green-grid","<p>Describe as detailed piece on sale. The more customers,&nbsp;<br />\nthe chances of selling increase exponentially.</p>\n","","1","2","new","150","RON","3","Upon delivery,Wire Transfer","1","0","","0","0","","0","1","1","2015-03-19 13:15:06","2015-03-27 06:17:39");
INSERT INTO sales_advertisements VALUES("2","1","2","3","","","","","","","","0","","0","","0","0","","0","0","","0","0","0","2015-03-21 06:47:49","2015-03-21 06:47:49");
INSERT INTO sales_advertisements VALUES("3","3","2","3","Dezmembrez Mitsubishi Pajero 3.2DID","dezmembrez-mitsubishi-pajero-32did","<p>Dezmembrez 3.2DID Mitsubishi Pajero, year 2006.</p>\n","","1","2","Used","150","RON","3","Cash on delivery,Others","1","1","30","0","0","","0","1","1","2015-03-23 07:34:47","2015-03-24 06:56:42");
INSERT INTO sales_advertisements VALUES("4","1","1","4","","","","","","","","0","","0","","0","0","","0","0","","0","0","0","2015-03-24 05:54:27","2015-03-24 05:54:27");
INSERT INTO sales_advertisements VALUES("5","3","1","4","Honda CRV sell 2.2 CDTI engine complete model after 2007/2009 Honda Civic","honda-crv-sell-22-cdti-engine-complete-model-after-20072009-honda-civic","<p>Honda CRV sell 2.2 CDTI engine complete model after 2007/2009 Honda Civic</p>\n","","1","2","Used","321","RON","2","Cash on delivery,Upon delivery","1","0","","0","0","","0","3","1","2015-03-24 11:48:38","2015-03-24 11:50:11");
INSERT INTO sales_advertisements VALUES("6","1","1","4","ghfgh","ghfgh","<p>Describe as detailed piece on sale. The more customers,&nbsp;<br />\nthe chances of selling increase exponentially.</p>\n","","4","5","Used","15","RON","2","Cash on delivery","1","0","","0","0","","0","1","2","2015-03-26 12:37:11","2015-03-26 13:17:57");
INSERT INTO sales_advertisements VALUES("7","2","1","4","BMW 3 Series E46 front bumper year in 2001 with projectors and green grid","bmw-3-series-e46-front-bumper-year-in-2001-with-projectors-and-green-grid-1","<p>BMW 3 Series E46 front bumper year in 2001 with projectors and green grid</p>\n","","1","2","Used","20","RON","2","Upon delivery,Wire Transfer","1","0","","0","0","","0","1","1","2015-03-27 11:41:02","2015-03-27 11:57:40");
INSERT INTO sales_advertisements VALUES("8","1","1","4","","","","","","","","0","","0","","0","0","","0","0","","0","0","0","2015-03-27 15:32:13","2015-03-27 15:32:13");



DROP TABLE IF EXISTS sales_brands;

CREATE TABLE `sales_brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO sales_brands VALUES("1","BMW","0","1","2015-03-19 13:00:37","2015-03-19 13:00:37");
INSERT INTO sales_brands VALUES("2","100","1","1","2015-03-19 13:00:46","2015-03-19 13:00:46");
INSERT INTO sales_brands VALUES("3","80","1","1","2015-03-19 13:01:02","2015-03-19 13:01:02");
INSERT INTO sales_brands VALUES("4","MarutiSuzki","0","1","2015-03-19 13:01:23","2015-03-19 13:01:23");
INSERT INTO sales_brands VALUES("5","800","4","1","2015-03-19 13:01:34","2015-03-19 13:01:34");
INSERT INTO sales_brands VALUES("6","Alto","4","1","2015-03-19 13:01:45","2015-03-25 12:22:02");



DROP TABLE IF EXISTS sales_categories;

CREATE TABLE `sales_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `flag` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO sales_categories VALUES("1","Auto parts","0","1","2015-03-19 13:02:03","2015-03-19 13:02:03");
INSERT INTO sales_categories VALUES("2","car parts","0","1","2015-03-19 13:02:15","2015-03-19 13:02:15");
INSERT INTO sales_categories VALUES("3","test parts","2","1","2015-03-19 13:02:30","2015-03-19 13:02:30");
INSERT INTO sales_categories VALUES("4","test 2 parts","1","1","2015-03-19 13:02:44","2015-03-19 13:02:44");



DROP TABLE IF EXISTS sales_email_alerts;

CREATE TABLE `sales_email_alerts` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `brand_ids` varchar(100) DEFAULT NULL,
  `application_type` varchar(50) NOT NULL COMMENT '1->Requests for new parts ,2->Requests Parts sh,3->All applications',
  `country_id` varchar(250) NOT NULL,
  `app_relist_alert` tinyint(4) NOT NULL COMMENT '1->Yup,2->Not',
  `category_ids` varchar(100) NOT NULL,
  `app_separate_email` tinyint(4) NOT NULL COMMENT '1->Yup,2->Not',
  `alert_type` varchar(100) NOT NULL COMMENT '1->Instant ,2->Of 10 in 10 minutes ,3->Hourly ,4->Once a day at ',
  `email_send_time` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_email_texts;

CREATE TABLE `sales_email_texts` (
  `email_text_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`email_text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_firm_parts;

CREATE TABLE `sales_firm_parts` (
  `parts_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commercial_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vat` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `nr` varchar(100) NOT NULL,
  `other_add` text,
  `phone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `description` text,
  `logo` varchar(100) DEFAULT NULL,
  `parts_pics` varchar(100) DEFAULT NULL,
  `warranty_detail` text,
  `brand_id` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>Active, 0=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`parts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_firmparts_comments;

CREATE TABLE `sales_firmparts_comments` (
  `firmparts_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `parts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`firmparts_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_fleet_comments;

CREATE TABLE `sales_fleet_comments` (
  `fleet_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `fleet_truck_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`fleet_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_fleet_trucks;

CREATE TABLE `sales_fleet_trucks` (
  `fleet_id` int(11) NOT NULL AUTO_INCREMENT,
  `park_name` varchar(100) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `nr` varchar(100) NOT NULL,
  `other_add` text,
  `phone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `description` text,
  `logo` varchar(100) DEFAULT NULL,
  `fleet_pics` varchar(100) DEFAULT NULL,
  `warranty_detail` text,
  `brand_id` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=>Active, 0=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`fleet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_garage;

CREATE TABLE `sales_garage` (
  `garage_id` int(11) NOT NULL AUTO_INCREMENT,
  `sevice_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `nr` varchar(200) NOT NULL,
  `other_add` text,
  `postal_code` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `service_type` int(11) NOT NULL,
  `open_yr` int(11) NOT NULL,
  `service_desc` text NOT NULL,
  `mechanics` int(11) DEFAULT NULL,
  `elevators` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `avg_price` int(11) NOT NULL,
  `mon_fri_open_close` varchar(100) NOT NULL,
  `sat_open_close` varchar(100) DEFAULT NULL,
  `sun_open_close` varchar(100) DEFAULT NULL,
  `email_appointment` varchar(100) DEFAULT NULL,
  `phone_appointment` varchar(100) DEFAULT NULL,
  `brand_ids` varchar(100) NOT NULL,
  `machine_type` varchar(100) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_facility_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`garage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_order;

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totprice` double NOT NULL,
  `delivery_method` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `county` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `postcode` int(11) NOT NULL,
  `delivery_add` text NOT NULL,
  `note_command` text NOT NULL,
  `save_info` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '''0'' => New order, ''1'' => confirmed order, ''2'' => completed order, 3=> ''shipped order'', 4=> cancel Order',
  `delivery_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO sales_order VALUES("1","OR10001","2","1","1","150","Personal Teaching","biswo","sahoo","2334534 ","17","2964","42342","sdfsd rgtrfh","dghrt","0","4","0","2015-03-19 13:18:56","2015-03-23 08:07:06");
INSERT INTO sales_order VALUES("2","OR10002","3","1","1","150","Personal Teaching","praneet","mohanty","2334534 ","16","4023","2424","xcbcbc","","0","1","0","2015-03-19 13:21:38","2015-03-19 13:21:38");
INSERT INTO sales_order VALUES("3","OR10003","3","1","1","150","Personal Teaching","wxyz","sahoo","2334534 ","15","2504","2443","dgdf fhfgh","","0","1","0","2015-03-20 14:52:46","2015-03-20 14:52:46");
INSERT INTO sales_order VALUES("4","OR10004","2","3","2","300","Personal Teaching","chittaranjan","sahoo","21423 ","17","2967","12312","test address","","0","0","0","2015-03-23 07:39:50","2015-03-23 07:39:50");
INSERT INTO sales_order VALUES("8","OR10005","1","3","1","150","Personal Teaching","chittaranjan","sahoo","21423 ","16","4023","123321","fjghgh","","0","0","0","2015-03-24 08:35:00","2015-03-24 08:35:00");
INSERT INTO sales_order VALUES("9","OR10006","2","5","1","321","Personal Teaching","dgd","dfhdf","21423 ","1","3205","42234","fhjg","","0","0","0","2015-03-27 08:03:44","2015-03-27 08:03:44");



DROP TABLE IF EXISTS sales_parks;

CREATE TABLE `sales_parks` (
  `park_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_type` int(11) NOT NULL COMMENT '1=> ''Park Trucks'', 2 => ''Company Parts''',
  `user_id` int(11) NOT NULL,
  `park_name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `nr` varchar(100) NOT NULL,
  `other_add` text,
  `phone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `description` text,
  `logo` varchar(100) DEFAULT NULL,
  `fleet_pics` varchar(100) DEFAULT NULL,
  `warranty_detail` text,
  `brand_id` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=>Active, 0=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`park_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sales_parks VALUES("1","2","16","test park","test-park","test company","12312","14","4440","21342","test street","32543","dfhbfg","12312","234","dgdg@dfgfd.com","","of the warranty provided by your auto parts company, the period of return, delivery or other contractual conditions.of the warranty provided by your auto parts company, the period of return, delivery or other contractual conditions.","1426766655logo2.jpg","","\nCOMPANY DATA\nThe commercial name of the park *\n\nEnter name of company*\n\nCode fiscal*\n\nLOCATION\nCounty*\n\nLocality*\n\nPostal Code\n\nStreet\n\nNo *\n\nOther details address\n\nCONTACT\nPhone*\n\nFax\n\nEmail Address\n\nDESCRIPTION AND LOGO\nDescription\n\nLogo / Company Banner\n\nUpload Image:\n\nXXXX\nWARRANTY, TRANSPORT, DELIVERY, RETURN\nDescribe the conditions of the warranty provided by your auto parts company, the period of return, delivery or other contractual conditions.","6,1,4","","1","2015-03-19 13:04:15","2015-03-19 13:04:15");
INSERT INTO sales_parks VALUES("2","1","2","dsfsd","dsfsd","sdfsdf","sdfsd","3","1756","","sdfsdg","dgdfgfd","","0","","dfgd@fdgfdg.com","","fdgdfg","1427440866Hydrangeas.jpg","","","1","","1","2015-03-27 08:21:06","2015-03-27 08:21:06");



DROP TABLE IF EXISTS sales_payment_details;

CREATE TABLE `sales_payment_details` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `paid_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_payment_modes;

CREATE TABLE `sales_payment_modes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_questions;

CREATE TABLE `sales_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `question` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=>Active, 2=>Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO sales_questions VALUES("1","1","5","0","","Test question by me","1","2015-03-26 14:10:27","2015-03-26 14:10:27");
INSERT INTO sales_questions VALUES("2","2","1","0","","test question chittaranjan","1","2015-03-27 08:53:19","2015-03-27 08:53:19");
INSERT INTO sales_questions VALUES("3","1","1","2","","hi","1","2015-03-27 08:58:32","2015-03-27 08:58:32");
INSERT INTO sales_questions VALUES("4","2","1","3","","ok chitta hi and what is the reaction about my question","1","2015-03-27 09:01:22","2015-03-27 09:01:22");



DROP TABLE IF EXISTS sales_rating;

CREATE TABLE `sales_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO sales_rating VALUES("1","5","1","3","2015-03-26 11:39:27","2015-03-26 11:39:27");



DROP TABLE IF EXISTS sales_service_facilities;

CREATE TABLE `sales_service_facilities` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_service_types;

CREATE TABLE `sales_service_types` (
  `service_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=>Active, 2=>Inactive',
  PRIMARY KEY (`service_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_specialities;

CREATE TABLE `sales_specialities` (
  `speciality_id` int(11) NOT NULL,
  `speciality_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_subcategories;

CREATE TABLE `sales_subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sales_view;

CREATE TABLE `sales_view` (
  `view_id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`view_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO sales_view VALUES("1","3","127.0.0.1","2015-03-24 10:10:10","2015-03-24 10:10:10");
INSERT INTO sales_view VALUES("2","1","127.0.0.1","2015-03-24 10:10:31","2015-03-24 10:10:31");
INSERT INTO sales_view VALUES("3","3","127.0.0.1","2015-03-24 10:12:50","2015-03-24 10:12:50");
INSERT INTO sales_view VALUES("4","1","127.0.0.1","2015-03-24 10:38:04","2015-03-24 10:38:04");
INSERT INTO sales_view VALUES("5","1","127.0.0.1","2015-03-24 11:46:30","2015-03-24 11:46:30");
INSERT INTO sales_view VALUES("6","5","127.0.0.1","2015-03-24 11:50:28","2015-03-24 11:50:28");
INSERT INTO sales_view VALUES("7","5","127.0.0.1","2015-03-24 11:50:38","2015-03-24 11:50:38");
INSERT INTO sales_view VALUES("8","5","127.0.0.1","2015-03-24 11:50:42","2015-03-24 11:50:42");
INSERT INTO sales_view VALUES("9","5","127.0.0.1","2015-03-24 11:51:13","2015-03-24 11:51:13");
INSERT INTO sales_view VALUES("10","5","127.0.0.1","2015-03-24 11:51:52","2015-03-24 11:51:52");
INSERT INTO sales_view VALUES("11","1","127.0.0.1","2015-03-24 11:52:04","2015-03-24 11:52:04");
INSERT INTO sales_view VALUES("12","3","127.0.0.1","2015-03-24 11:52:17","2015-03-24 11:52:17");
INSERT INTO sales_view VALUES("13","3","127.0.0.1","2015-03-24 12:22:22","2015-03-24 12:22:22");
INSERT INTO sales_view VALUES("14","5","127.0.0.1","2015-03-24 12:40:44","2015-03-24 12:40:44");
INSERT INTO sales_view VALUES("15","3","127.0.0.1","2015-03-24 12:42:53","2015-03-24 12:42:53");
INSERT INTO sales_view VALUES("16","3","127.0.0.1","2015-03-24 12:43:52","2015-03-24 12:43:52");
INSERT INTO sales_view VALUES("17","1","127.0.0.1","2015-03-24 12:44:00","2015-03-24 12:44:00");
INSERT INTO sales_view VALUES("18","3","127.0.0.1","2015-03-24 12:46:07","2015-03-24 12:46:07");
INSERT INTO sales_view VALUES("19","3","127.0.0.1","2015-03-24 14:36:29","2015-03-24 14:36:29");
INSERT INTO sales_view VALUES("20","5","127.0.0.1","2015-03-24 15:07:48","2015-03-24 15:07:48");
INSERT INTO sales_view VALUES("21","5","127.0.0.1","2015-03-24 15:38:19","2015-03-24 15:38:19");
INSERT INTO sales_view VALUES("22","5","127.0.0.1","2015-03-24 15:38:33","2015-03-24 15:38:33");
INSERT INTO sales_view VALUES("23","3","127.0.0.1","2015-03-24 15:38:41","2015-03-24 15:38:41");
INSERT INTO sales_view VALUES("24","5","127.0.0.1","2015-03-25 08:03:53","2015-03-25 08:03:53");
INSERT INTO sales_view VALUES("25","5","127.0.0.1","2015-03-25 08:05:11","2015-03-25 08:05:11");
INSERT INTO sales_view VALUES("26","1","127.0.0.1","2015-03-26 08:19:58","2015-03-26 08:19:58");
INSERT INTO sales_view VALUES("27","5","127.0.0.1","2015-03-26 10:08:51","2015-03-26 10:08:51");
INSERT INTO sales_view VALUES("28","1","127.0.0.1","2015-03-26 11:31:39","2015-03-26 11:31:39");
INSERT INTO sales_view VALUES("29","1","127.0.0.1","2015-03-26 11:38:40","2015-03-26 11:38:40");
INSERT INTO sales_view VALUES("30","5","127.0.0.1","2015-03-26 11:39:18","2015-03-26 11:39:18");
INSERT INTO sales_view VALUES("31","5","127.0.0.1","2015-03-26 14:09:59","2015-03-26 14:09:59");
INSERT INTO sales_view VALUES("32","1","127.0.0.1","2015-03-26 16:18:26","2015-03-26 16:18:26");
INSERT INTO sales_view VALUES("33","1","127.0.0.1","2015-03-27 06:16:09","2015-03-27 06:16:09");
INSERT INTO sales_view VALUES("34","5","192.168.1.145","2015-03-27 06:24:33","2015-03-27 06:24:33");
INSERT INTO sales_view VALUES("35","1","192.168.1.239","2015-03-27 06:26:49","2015-03-27 06:26:49");
INSERT INTO sales_view VALUES("36","1","192.168.1.239","2015-03-27 06:29:20","2015-03-27 06:29:20");
INSERT INTO sales_view VALUES("37","5","192.168.1.239","2015-03-27 06:29:32","2015-03-27 06:29:32");
INSERT INTO sales_view VALUES("38","3","192.168.1.239","2015-03-27 06:30:19","2015-03-27 06:30:19");
INSERT INTO sales_view VALUES("39","5","192.168.1.239","2015-03-27 06:30:24","2015-03-27 06:30:24");
INSERT INTO sales_view VALUES("40","3","192.168.1.239","2015-03-27 06:31:26","2015-03-27 06:31:26");
INSERT INTO sales_view VALUES("41","1","127.0.0.1","2015-03-27 07:15:13","2015-03-27 07:15:13");
INSERT INTO sales_view VALUES("42","1","192.168.1.145","2015-03-27 07:21:04","2015-03-27 07:21:04");
INSERT INTO sales_view VALUES("43","3","192.168.1.239","2015-03-27 07:39:49","2015-03-27 07:39:49");
INSERT INTO sales_view VALUES("44","1","192.168.1.145","2015-03-27 07:41:02","2015-03-27 07:41:02");
INSERT INTO sales_view VALUES("45","3","192.168.1.239","2015-03-27 08:00:46","2015-03-27 08:00:46");
INSERT INTO sales_view VALUES("46","5","192.168.1.239","2015-03-27 08:00:51","2015-03-27 08:00:51");
INSERT INTO sales_view VALUES("47","1","127.0.0.1","2015-03-27 08:52:13","2015-03-27 08:52:13");
INSERT INTO sales_view VALUES("48","5","127.0.0.1","2015-03-27 11:30:47","2015-03-27 11:30:47");
INSERT INTO sales_view VALUES("49","1","127.0.0.1","2015-03-27 11:34:40","2015-03-27 11:34:40");
INSERT INTO sales_view VALUES("50","5","127.0.0.1","2015-03-27 11:36:40","2015-03-27 11:36:40");
INSERT INTO sales_view VALUES("51","7","127.0.0.1","2015-03-30 07:20:27","2015-03-30 07:20:27");
INSERT INTO sales_view VALUES("52","7","127.0.0.1","2015-03-30 07:25:33","2015-03-30 07:25:33");
INSERT INTO sales_view VALUES("53","7","127.0.0.1","2015-03-30 07:28:08","2015-03-30 07:28:08");
INSERT INTO sales_view VALUES("54","3","127.0.0.1","2015-03-30 07:33:46","2015-03-30 07:33:46");
INSERT INTO sales_view VALUES("55","3","127.0.0.1","2015-03-30 07:34:02","2015-03-30 07:34:02");
INSERT INTO sales_view VALUES("56","3","127.0.0.1","2015-03-30 07:36:44","2015-03-30 07:36:44");
INSERT INTO sales_view VALUES("57","1","127.0.0.1","2015-03-30 07:37:03","2015-03-30 07:37:03");
INSERT INTO sales_view VALUES("58","1","127.0.0.1","2015-03-30 07:37:09","2015-03-30 07:37:09");
INSERT INTO sales_view VALUES("59","1","127.0.0.1","2015-03-30 07:37:28","2015-03-30 07:37:28");
INSERT INTO sales_view VALUES("60","3","127.0.0.1","2015-03-30 07:37:45","2015-03-30 07:37:45");
INSERT INTO sales_view VALUES("61","1","127.0.0.1","2015-03-30 07:41:14","2015-03-30 07:41:14");
INSERT INTO sales_view VALUES("62","1","127.0.0.1","2015-03-30 07:41:20","2015-03-30 07:41:20");
INSERT INTO sales_view VALUES("63","1","127.0.0.1","2015-03-30 07:41:26","2015-03-30 07:41:26");
INSERT INTO sales_view VALUES("64","1","127.0.0.1","2015-03-30 07:48:44","2015-03-30 07:48:44");
INSERT INTO sales_view VALUES("65","1","127.0.0.1","2015-03-30 07:48:52","2015-03-30 07:48:52");
INSERT INTO sales_view VALUES("66","1","127.0.0.1","2015-03-30 07:49:05","2015-03-30 07:49:05");



DROP TABLE IF EXISTS sales_warranties;

CREATE TABLE `sales_warranties` (
  `warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `disclaimer_of_warranty` int(11) NOT NULL COMMENT '0=> we do not offer warranty, 1=> offer warranty',
  `discaimer_warranty_mth` varchar(100) NOT NULL,
  `terms_of_warranty` text NOT NULL,
  `return_policy` int(11) NOT NULL COMMENT '0=> I do not accept return, 1 => Accept return',
  `return_policy_days` int(11) NOT NULL,
  `method_return_accepted` varchar(100) NOT NULL,
  `transportation_cost` varchar(20) NOT NULL,
  `return_policy_info` text NOT NULL,
  `personal_teaching` int(11) NOT NULL,
  `courier` int(11) NOT NULL,
  `courier_cost` double DEFAULT '0',
  `free_courier` int(11) NOT NULL,
  `romanian_mail` int(11) NOT NULL,
  `romanian_cost` double DEFAULT '0',
  `free_romanian` int(11) NOT NULL,
  `time_required` int(11) NOT NULL,
  `sending_package` text NOT NULL,
  `payment_methods` varchar(100) NOT NULL,
  `product_condition` varchar(5) NOT NULL,
  `invoice` varchar(5) NOT NULL,
  `message_response` text NOT NULL COMMENT '0=> do not send automated message, 1 => send automated message',
  `message_content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`warranty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sales_warranties VALUES("1","2","1","15","dsbfgvisd knvsdfngvd nsdlfgnldfn","1","15","Cash consideration product,Replacement product","Customer","fdgdfgd","1","1","30","0","0","","0","3","dfgdf","Cash on delivery,Others","new","NOT","1","dfgdfhb dghfgh","2015-03-23 14:34:11","2015-03-27 13:59:24");
INSERT INTO sales_warranties VALUES("2","3","1","12"," test term delivery of praneet","1","15","Cash consideration product,Replacement product","Customer","test information","1","1","30","0","0","","0","1","","Cash on delivery,Others","Used","NOT","1","Thank you for order made. In the shortest possible time colleague will contact you to confirm order details and the date can be shipped.\nWe are open Monday to Friday from 9.00 to 18.00.\nIf you order made outside these hours, please be aware that we will process your orders in the order in which they were made.\nIf you forgot to tell us something through field observations, you can do the buttons below to contact this email.\nWe treat all orders very seriously and we guarantee that the products delivered will be described.\nGood luck shopping!\n","2015-03-24 06:04:55","2015-03-24 06:45:38");



DROP TABLE IF EXISTS sales_warranty_details;

CREATE TABLE `sales_warranty_details` (
  `warranty_id` int(11) NOT NULL AUTO_INCREMENT,
  `warranty_disclaimer` tinyint(4) DEFAULT '2' COMMENT '1=>offer warranty,2=>do nt offer warranty',
  `warrent_month` int(11) DEFAULT NULL,
  `warrent_term` varchar(100) DEFAULT NULL,
  `return_days` int(11) DEFAULT NULL,
  `return_method` varchar(100) DEFAULT NULL,
  `transportation_cost_support` varchar(100) DEFAULT NULL,
  `additional_info` varchar(100) DEFAULT NULL,
  `delivery_type` varchar(50) DEFAULT NULL,
  `delivery_cost` float DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `package_details` text,
  `payment_id` int(11) DEFAULT NULL,
  `product_condition` varchar(30) DEFAULT NULL,
  `send_invoice` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>Yes, 2=>No',
  `order_response` varchar(50) DEFAULT NULL,
  `msg_content` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`warranty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sales_warranty_details VALUES("1","1","","","","","","","courier,free","","1","","1","new","0","1","","2015-03-23 08:19:56","2015-03-23 08:19:56");
INSERT INTO sales_warranty_details VALUES("2","2","0","df","0","replacement","1","dfhfdh","cash,courier,free","","1","fdghdf","1","new","0","2","dghfg","2015-03-23 08:29:42","2015-03-23 08:29:42");



DROP TABLE IF EXISTS sales_workmanship_quotations;

CREATE TABLE `sales_workmanship_quotations` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  `manufacture_yr` int(11) NOT NULL,
  `engines` int(11) NOT NULL,
  `chassis` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `supply_by` tinyint(4) DEFAULT NULL COMMENT '1=>by me, 2=>service',
  `images` varchar(100) DEFAULT NULL,
  `speciality_id` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS social_icons;

CREATE TABLE `social_icons` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(50) NOT NULL,
  `social_img` varchar(200) NOT NULL,
  `social_link` varchar(70) NOT NULL,
  `orderno` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO social_icons VALUES("1","Facebook","1427265939_facebook.png","http://www.facebook.com","1","2015-03-25 07:45:39");
INSERT INTO social_icons VALUES("2","Twitter","1427266037_twitter.png","http://www.twitter.com","0","2015-03-25 07:47:17");



DROP TABLE IF EXISTS subscribe_alert;

CREATE TABLE `subscribe_alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `brand_list` varchar(200) NOT NULL,
  `categories` varchar(250) NOT NULL,
  `couties` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO subscribe_alert VALUES("1","2","1,4","1","1,3,4,5,6","2015-03-20 15:24:52","2015-03-27 13:55:16");
INSERT INTO subscribe_alert VALUES("2","2","2,3,6","","","2015-03-20 16:31:34","2015-03-20 16:31:37");



DROP TABLE IF EXISTS success_stories;

CREATE TABLE `success_stories` (
  `success_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `submit_from` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`success_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO success_stories VALUES("1","2","<p>Dezmembraripenet.ro is a good portal for people to search and we are getting lot of enquiries. This is a good indication of the response we are getting from customers. So it is helping grow our business.</p>\n","0","1","2015-03-25 14:12:31");
INSERT INTO success_stories VALUES("2","1","<p>test story by user test</p>\n","1","0","2015-03-26 05:55:06");
INSERT INTO success_stories VALUES("4","1","<p>gjkhjkh</p>\n","1","0","2015-03-26 07:05:24");
INSERT INTO success_stories VALUES("5","2","<p>sdgfdgf</p>\n","1","0","2015-03-27 14:03:38");



DROP TABLE IF EXISTS temp_img;

CREATE TABLE `temp_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `random_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS temp_membership_details;

CREATE TABLE `temp_membership_details` (
  `temp_mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `randomid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `copydetails` int(11) NOT NULL,
  `shipping_fname` varchar(50) NOT NULL,
  `shipping_email` varchar(30) NOT NULL,
  `shipping_phone` varchar(20) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `shipping_city` int(11) NOT NULL,
  `shipping_state` int(11) NOT NULL,
  `shipping_zip` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`temp_mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO temp_membership_details VALUES("1","23347","cb c","bcv@ddf.com","2423"," hfhfghh","824","3","3543","0","cb c","bcv@ddf.com","2423"," hfhfghh","824","3","3543","2015-03-27 10:23:17","2015-03-27 10:23:17");



DROP TABLE IF EXISTS themes;

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `html_tag` varchar(20) NOT NULL,
  `font_size` varchar(10) NOT NULL,
  `font_color` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS upgrade_membership;

CREATE TABLE `upgrade_membership` (
  `upgrade_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `county` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `shipping_different` int(11) NOT NULL,
  `shipping_name` varchar(100) NOT NULL,
  `shipping_email` varchar(50) NOT NULL,
  `shipping_phone` varchar(20) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `shipping_county` int(11) NOT NULL,
  `shipping_city` int(11) NOT NULL,
  `shipping_zip` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `transfer_id` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `plan_status` int(11) NOT NULL,
  `price` double NOT NULL,
  `credit` int(11) NOT NULL,
  PRIMARY KEY (`upgrade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO upgrade_membership VALUES("1","2","3","card","biswonath Nishra","chittas970@gmail.com","2354324534","satyanagar","17","2638","24324","0","biswonath Nishra","chittas970@gmail.com","2354324534","satyanagar","17","2638","24324","1","24666","2015-03-19 14:38:38","2015-03-19 14:38:38","1","80","29");
INSERT INTO upgrade_membership VALUES("2","3","2","card","chittaranjan sahoo","chittas970@gmail.com","2354324534","satyanagar, bbsr","17","2732","23423","0","chittaranjan sahoo","chittas970@gmail.com","2354324534","satyanagar, bbsr","17","2732","23423","1","22073","2015-03-19 14:42:23","2015-03-19 14:42:23","1","120","50");
INSERT INTO upgrade_membership VALUES("3","4","3","card","Ramesh Raja","test@tedasst.com","2354324534","satyanagar","17","2638","23423","0","Ramesh Raja","test@tedasst.com","2354324534","satyanagar","17","2638","23423","1","19718","2015-03-25 11:24:25","2015-03-25 11:24:25","1","80","29");



DROP TABLE IF EXISTS user_credit_account;

CREATE TABLE `user_credit_account` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `upgrade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user_credit_account VALUES("1","1","2","27","0","0000-00-00","2015-03-19 14:38:39","2015-03-27 07:14:55");
INSERT INTO user_credit_account VALUES("2","2","3","49","0","0000-00-00","2015-03-19 14:42:23","2015-03-19 14:42:30");
INSERT INTO user_credit_account VALUES("3","3","4","29","0","0000-00-00","2015-03-25 11:24:25","2015-03-25 11:24:25");



DROP TABLE IF EXISTS user_memberships;

CREATE TABLE `user_memberships` (
  `memb_id` int(10) NOT NULL AUTO_INCREMENT,
  `memb_type` varchar(150) CHARACTER SET utf8 NOT NULL,
  `price` float(9,2) NOT NULL,
  `credits` int(10) NOT NULL,
  `plan_img` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0->inactive,1->active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`memb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user_memberships VALUES("1","platinum","250.00","100","1426771816_platinum_icon.png","1","2015-03-19 14:30:16","2015-03-19 14:30:16");
INSERT INTO user_memberships VALUES("2","gold","120.00","50","1426771857_gold_icon.png","1","2015-03-19 14:30:57","2015-03-19 14:30:57");
INSERT INTO user_memberships VALUES("3","Silver","80.00","29","1426772047_silver_icon.png","1","2015-03-19 14:34:07","2015-03-19 14:34:43");



DROP TABLE IF EXISTS user_rating;

CREATE TABLE `user_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL COMMENT '1 for ''positive'', 0 for ''neutral'',-1 for ''negative''',
  `how_to_know` text NOT NULL,
  `productdescribedval` float NOT NULL,
  `communicationval` float NOT NULL,
  `deliverytimeval` float NOT NULL,
  `cost_of_transportval` float NOT NULL,
  `rating_type` int(11) NOT NULL COMMENT '2=> seller, 1=> buyer',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user_rating VALUES("1","1","2","1","1","1","i knew from my frnd","4","4.5","5","3.5","1","2015-03-19 13:19:30","2015-03-19 13:19:30");
INSERT INTO user_rating VALUES("2","1","3","2","1","0","gh ghkhjkhj","3.5","3","3.5","3","1","2015-03-19 14:20:09","2015-03-19 14:20:09");
INSERT INTO user_rating VALUES("3","3","1","8","3","1","dfhfghg","3.5","3.5","3","4","1","2015-03-26 14:09:02","2015-03-26 14:09:02");



