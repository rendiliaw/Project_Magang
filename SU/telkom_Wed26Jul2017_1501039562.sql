DROP TABLE IF EXISTS ccan;

CREATE TABLE `ccan` (
  `no` int(4) NOT NULL AUTO_INCREMENT,
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
  `S_P_C` int(1) NOT NULL,
  `waktu_ccan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pem_ccan` varchar(1) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO ccan VALUES("1","001","001","2017-07-26","Rendy","001","001","12345667899","001","SELESAI","Close 2","1","2017-07-26 10:58:25","");
INSERT INTO ccan VALUES("2","002","002","2017-07-26","Rendy","002","002","12345667899","002","PROSES BATAL","Cancel","1","2017-07-26 10:58:46","");
INSERT INTO ccan VALUES("3","003","002","2017-07-26","Rendy","002","002","12345667899","002","SELESAI","Close 2","1","2017-07-26 10:59:02","");
INSERT INTO ccan VALUES("4","004","002","2017-07-26","Rendy","002","002","12345667899","002","Optima Gs","Order","1","2017-07-26 09:48:44","");
INSERT INTO ccan VALUES("5","7","7","2017-07-26","7","7","7","7","7","Optima Gs","Order","1","2017-07-26 10:55:22","");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("1","superadmin","17c4520f6cfd1ab53d8745e84681eb49","rendiliaw@gmail.com","superduperadmin","");
INSERT INTO login VALUES("6","admin","21232f297a57a5a743894a0e4a801fc3","rendiliaw@gmail.com","Ccan","");
INSERT INTO login VALUES("7","yadi","e60838b9f0c0ed98a486f231a4df9c4a","rendiliaw@gmail.com","Optimags","");
INSERT INTO login VALUES("8","cui","0b7ce76033a6756b91f5bfb12602e20b","vekom002@gmail.com","Vendor","Cui");
INSERT INTO login VALUES("9","oop","403a96cff2a323f74bfb1c16992895be","vekom002@gmail.com","Vendor","Oop");
INSERT INTO login VALUES("10","kopegtel","ba874a7ce5ebad2fd4bdc557ad2693ce","vekom003@gmail.com","Vendor","Kopegtel");



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
  `S_P_O` int(4) NOT NULL,
  `waktu_op` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pem_optima` int(1) NOT NULL,
  PRIMARY KEY (`no_optima`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO optima VALUES("1","26989.jpg","26989.jpg","SELESAI","Cui","SELESAI","Close 2","1","1","2017-07-26 10:58:25","0");
INSERT INTO optima VALUES("2","30827.jpg","30827.jpg","PROSES BATAL","Cui","PROSES BATAL","Cancel","2","1","2017-07-26 10:58:46","0");
INSERT INTO optima VALUES("3","30830.jpg","30830.jpg","SELESAI","Cui","SELESAI","Close 2","3","1","2017-07-26 10:59:02","1");



DROP TABLE IF EXISTS vendor;

CREATE TABLE `vendor` (
  `id_v` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `stts_v` varchar(255) NOT NULL,
  `wk_v` varchar(255) NOT NULL,
  `no_ccanw` int(11) NOT NULL,
  `S_P_V` int(4) NOT NULL,
  `waktu_ven` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket_ven` int(1) NOT NULL,
  PRIMARY KEY (`id_v`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO vendor VALUES("1","26-07-2017 10:18:26 WITA","Cui","MANTAB","Close 1","Cui","2","1","2017-07-26 10:27:20","0");
INSERT INTO vendor VALUES("2","26-07-2017 10:24:46 WITA","Cui","Siap kapten","Close 1","Cui","1","1","2017-07-26 10:27:20","0");
INSERT INTO vendor VALUES("3","26-07-2017 10:56:07 WITA","Cui","SUDAH BAGUS INI","Close 1","Cui","3","1","2017-07-26 10:57:00","0");



