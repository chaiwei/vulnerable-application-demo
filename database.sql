

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;

INSERT INTO `categories` VALUES (1,'Lifestyle'),(2,'Running'),(3,'Basketball'),(4,'American Football'),(5,'Football'),(6,'Training & Gym'),(7,'Skateboarding'),(8,'Baseball'),(9,'Golf');

UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `description` text NOT NULL,
  `userstamp` int(11) NOT NULL,
  `datestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;

INSERT INTO `products` VALUES (1,'Nike Air Max 96 II',1,600.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(2,'Nike Air VaporMax Evo',1,611.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(3,'Nike Air Max Pre-Day',1,545.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(4,'Air Jordan 1 High Zoom',2,705.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(5,'Jordan LS',2,315.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(6,'Air Jordan XXXV Low PF',2,665.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(7,'Nike Alpha Menace Pro 2 Mid By You',3,665.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27'),(8,'Nike React Metcon Turbo',4,665.00,'For the first time, the Air Max 96 II returns with a 1–1 remake. Bringing back the sporty aesthetic imagined by famed Nike designer Sergio Lorenzo, with retro colours on a classic \'90s construction, it\'s a return to throwback athletics styling. Nike Air cushioning keeps it comfortable. Long live the bubble.',1,'2021-04-17 04:55:27');

UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;

INSERT INTO `users` VALUES (1,'admin','demo@example.com','40be4e59b9a2a2b5dffb918c0e86b3d7','admin');

UNLOCK TABLES;

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;

CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_transactions`
--

LOCK TABLES `wallet_transactions` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;

INSERT INTO `wallets` VALUES (1,1,0.00);

UNLOCK TABLES;