CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
('USER1', 'sara', 'sarabade30@gmail.com', 'sara'),
('USER14', 'p', 'p', 'p'),
('USER16', '222', '222', '222'),
('USER2', 'neha', 'neha', 'neha'),
('USER3', 'admin', 'admin@gmail.com', 'admin'),
('USER4', 'akshu', 'akshu@gmail.com', 'akshu'),
('USER5', 'akshu', 'akshu', 'akshu'),
('USER6', 'jeevan', 'jeevan', 'jevan'),
('USER7', 'prelu', 'prelu', 'prelu');
