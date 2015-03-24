
--
-- Database: `carsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE IF NOT EXISTS `appuser` (
  `user_id` int(11) unsigned NOT NULL,
  `user_mobile_id` varchar(128) NOT NULL DEFAULT '',
  `user_ip_address` varchar(128) NOT NULL DEFAULT '',
  `user_last_active_datetime` datetime NOT NULL,
  `user_created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `car_id` int(11) unsigned NOT NULL,
  `car_search_string` varchar(128) NOT NULL DEFAULT '',
  `car_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plate`
--

CREATE TABLE IF NOT EXISTS `plate` (
  `plate_id` int(11) unsigned NOT NULL,
  `plate_image` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Different types of license plates within Kuwait';

--
-- Dumping data for table `plate`
--

INSERT INTO `plate` (`plate_id`, `plate_image`) VALUES
(1, 'dwa');

-- --------------------------------------------------------

--
-- Table structure for table `plate_input_option`
--

CREATE TABLE IF NOT EXISTS `plate_input_option` (
  `option_id` int(11) unsigned NOT NULL,
  `plate_id` int(11) unsigned NOT NULL,
  `option_name` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_abuse`
--

CREATE TABLE IF NOT EXISTS `user_abuse` (
  `abuse_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `post_id` int(11) unsigned NOT NULL,
  `abuse_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE IF NOT EXISTS `user_notification` (
  `notification_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `car_id` int(11) unsigned NOT NULL,
  `notification_sent` int(11) NOT NULL,
  `notification_datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE IF NOT EXISTS `user_post` (
  `post_id` int(11) unsigned NOT NULL,
  `car_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `post_image` varchar(128) NOT NULL DEFAULT '',
  `post_caption` text NOT NULL,
  `post_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE IF NOT EXISTS `user_rating` (
  `rating_id` int(11) unsigned NOT NULL,
  `car_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `rating_hotness` int(11) DEFAULT NULL,
  `rating_driving` int(11) DEFAULT NULL,
  `rating_ride` int(11) DEFAULT NULL,
  `rating_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribe`
--

CREATE TABLE IF NOT EXISTS `user_subscribe` (
  `subscribe_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `car_id` int(11) unsigned NOT NULL,
  `subscribe_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_mobile_id` (`user_mobile_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`), ADD UNIQUE KEY `car_search_string` (`car_search_string`);

--
-- Indexes for table `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`plate_id`);

--
-- Indexes for table `plate_input_option`
--
ALTER TABLE `plate_input_option`
  ADD PRIMARY KEY (`option_id`), ADD KEY `plate_id` (`plate_id`);

--
-- Indexes for table `user_abuse`
--
ALTER TABLE `user_abuse`
  ADD PRIMARY KEY (`abuse_id`), ADD KEY `user_id` (`user_id`), ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`notification_id`), ADD KEY `car_id` (`car_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`), ADD KEY `car_id` (`car_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`rating_id`), ADD KEY `car_id` (`car_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
  ADD PRIMARY KEY (`subscribe_id`), ADD KEY `car_id` (`car_id`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plate`
--
ALTER TABLE `plate`
  MODIFY `plate_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `plate_input_option`
--
ALTER TABLE `plate_input_option`
  MODIFY `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_abuse`
--
ALTER TABLE `user_abuse`
  MODIFY `abuse_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `notification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `rating_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
  MODIFY `subscribe_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `plate_input_option`
--
ALTER TABLE `plate_input_option`
ADD CONSTRAINT `plate_input_option_ibfk_1` FOREIGN KEY (`plate_id`) REFERENCES `plate` (`plate_id`);

--
-- Constraints for table `user_abuse`
--
ALTER TABLE `user_abuse`
ADD CONSTRAINT `user_abuse_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`),
ADD CONSTRAINT `user_abuse_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`);

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
ADD CONSTRAINT `user_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`),
ADD CONSTRAINT `user_notification_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
ADD CONSTRAINT `user_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`);

--
-- Constraints for table `user_rating`
--
ALTER TABLE `user_rating`
ADD CONSTRAINT `user_rating_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
ADD CONSTRAINT `user_rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`);

--
-- Constraints for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
ADD CONSTRAINT `user_subscribe_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `appuser` (`user_id`),
ADD CONSTRAINT `user_subscribe_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
