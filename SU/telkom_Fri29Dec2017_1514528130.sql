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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO ccan VALUES("1","123456","135790","2017-12-26","Rendy Liauw","24680","-3.3250372, 114.5917009","Rendy/082353741274","C.Tel. 303/LG 210/R6W-6E100003/2016\n","Vendor","Cancel","2017-12-28 18:37:45");
INSERT INTO ccan VALUES("2","234","2342423","2017-12-28","Asdfasf","asdfasf","asdfasdfasdf","asdfasdfsafd","","Optima Gs","Order","2017-12-28 22:17:12");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("1","superadmin","17c4520f6cfd1ab53d8745e84681eb49","rendiliaw@gmail.com","superduperadmin","");
INSERT INTO login VALUES("2","ccan","1e235f9484f7435b72b2ae8f0fcf665b","rendiliaw@gmail.com","Ccan","");
INSERT INTO login VALUES("3","opgs","50fafdf64d44b68f74ac8d91133ea0ca","rendiliaw@gmail.com","Optimags","");
INSERT INTO login VALUES("4","cui","0b7ce76033a6756b91f5bfb12602e20b","cui@gmail.com","Vendor","Cui");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO notif VALUES("1","1","Ccan","Order telah dikirim dengan nomor 123456 pada tanggal 2017-12-26, tolong segera periksa","2017-12-28 23:12:38","N","1","0","0");
INSERT INTO notif VALUES("2","1","Ccan","komentar dengan nomor 123456 ditambahkan pada tanggal 2017-12-26, tolong segera periksa","2017-12-28 23:12:38","T","1","0","0");
INSERT INTO notif VALUES("3","1","Optima Gs","Rancangan dan anggaran biaya untuk vendor Cui telah ditambah dengan nomor order 123456 pada tanggal 26 desember 2017, tolong segera periksa","2017-12-28 21:18:07","N","0","1","1");
INSERT INTO notif VALUES("4","2","Ccan","Order telah dikirim dengan nomor 234 pada tanggal 2017-12-28, tolong segera periksa","2017-12-28 23:12:38","N","1","0","0");
INSERT INTO notif VALUES("5","2","Ccan","komentar dengan nomor 234 ditambahkan pada tanggal 2017-12-28, tolong segera periksa","2017-12-28 23:12:38","T","1","0","0");



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
  PRIMARY KEY (`no_optima`),
  KEY `no_ccan` (`no_ccan`),
  CONSTRAINT `optima_ibfk_1` FOREIGN KEY (`no_ccan`) REFERENCES `ccan` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO optima VALUES("1","-downloadfiles-wallpapers-3840_2160-summer_red_flowers_15794.jpg","4678783-cloud-wallpaper.jpg","Vendor","Cui","Vendor","Pelaksanaan","1","2017-12-26 23:36:45");



DROP TABLE IF EXISTS vendor;

CREATE TABLE `vendor` (
  `id_v` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(60) NOT NULL,
  `id` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `stts_v` varchar(255) NOT NULL,
  `wk_v` varchar(255) NOT NULL,
  `no_ccanw` int(11) NOT NULL,
  `waktu_ven` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_v`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO vendor VALUES("1","26-12-2017 21:30:22 WITA ","Ccan","Kerjakan dengan benar","Cancel","OPTIMA GS","1","2017-12-28 18:38:07");



