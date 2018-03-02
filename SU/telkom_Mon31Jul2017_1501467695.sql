DROP TABLE IF EXISTS ccan;

CREATE TABLE `ccan` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `od` varchar(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `cus` varchar(255) NOT NULL,
  `service` varchar(50) NOT NULL,
  `koor` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `wk` varchar(255) NOT NULL,
  `stts` varchar(25) NOT NULL,
  `waktu_ccan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("1","superadmin","17c4520f6cfd1ab53d8745e84681eb49","rendiliaw@gmail.com","superduperadmin","");



DROP TABLE IF EXISTS notif;

CREATE TABLE `notif` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `no_ccann` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL,
  `komentar` longtext NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis` varchar(1) NOT NULL,
  `S_P` int(1) NOT NULL,
  `S_V` int(11) NOT NULL,
  `S_C` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS optima;

CREATE TABLE `optima` (
  `no_optima` int(20) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `rab` varchar(255) NOT NULL,
  `tgs` varchar(12) NOT NULL,
  `vdr` varchar(12) NOT NULL,
  `wk_op` varchar(255) NOT NULL,
  `stts_op` varchar(12) NOT NULL,
  `no_ccan` int(11) NOT NULL,
  `waktu_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_optima`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS vendor;

CREATE TABLE `vendor` (
  `id_v` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `stts_v` varchar(255) NOT NULL,
  `wk_v` varchar(255) NOT NULL,
  `no_ccanw` int(11) NOT NULL,
  `waktu_ven` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_v`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO vendor VALUES("4","30-07-2017 11:55:06 WITA","Optima Gs","test1","Pelaksanaan","Vendor","6","2017-07-30 11:55:39");
INSERT INTO vendor VALUES("5","30-07-2017 11:55:06 WITA","Optima Gs","","Pelaksanaan","Vendor","6","2017-07-30 11:55:40");



