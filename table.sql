 #This is the MySQL for the table, running this script in MySQL workbench will create the table we need for this app
 CREATE TABLE IF NOT EXISTS `tbl_user` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `first_name` varchar(200) NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;