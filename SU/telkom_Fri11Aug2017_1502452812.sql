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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO ccan VALUES("1","991","991","2017-08-04","Rendy","991","991","991","991","Optima Gs","Order","2017-08-04 10:00:48");
INSERT INTO ccan VALUES("2","223","223","2017-08-04","Xxx","223","223","223","223","Optima Gs","Order","2017-08-04 10:06:57");
INSERT INTO ccan VALUES("3","332","332","2017-08-04","332","332","332","332","332","Optima Gs","Order","2017-08-04 10:11:09");
INSERT INTO ccan VALUES("4","123","123","2017-08-05","123","123","123","123","123","Optima Gs","Order","2017-08-05 10:38:47");
INSERT INTO ccan VALUES("5","558","558","2017-08-05","558","558","558","558","558","Optima Gs","Order","2017-08-05 10:42:00");
INSERT INTO ccan VALUES("6","532186","532186","2017-08-05","532186","532186","532186","532186","532186","Optima Gs","Order","2017-08-05 10:45:22");



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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO notif VALUES("1","1","Ccan","Order telah dikirim dengan nomor 991 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:00:48","N","0","0","0");
INSERT INTO notif VALUES("3","2","Ccan","Order telah dikirim dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:06:57","N","0","0","0");
INSERT INTO notif VALUES("4","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:02","T","0","0","0");
INSERT INTO notif VALUES("5","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:02","T","0","0","0");
INSERT INTO notif VALUES("6","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:02","T","0","0","0");
INSERT INTO notif VALUES("7","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:02","T","0","0","0");
INSERT INTO notif VALUES("8","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:02","T","0","0","0");
INSERT INTO notif VALUES("9","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("10","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("11","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("12","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("13","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("14","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("15","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("16","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:03","T","0","0","0");
INSERT INTO notif VALUES("17","0","Ccan","Komentar telah ditambahkan dengan nomor 223 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:07:04","T","0","0","0");
INSERT INTO notif VALUES("18","3","Ccan","Order telah dikirim dengan nomor 332 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:11:09","N","0","0","0");
INSERT INTO notif VALUES("19","3","Ccan","Komentar telah ditambahkan dengan nomor 332 pada tanggal 2017-08-04, tolong segera periksa","2017-08-04 10:11:13","T","0","0","0");
INSERT INTO notif VALUES("20","4","Ccan","Order telah dikirim dengan nomor 123 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:38:47","N","0","0","0");
INSERT INTO notif VALUES("21","5","Ccan","Order telah dikirim dengan nomor 558 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:42:00","N","0","0","0");
INSERT INTO notif VALUES("22","5","Ccan","beta dodol bet dah telah ditambahkan dengan nomor 558 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:42:05","T","0","0","0");
INSERT INTO notif VALUES("23","5","Ccan","beta dodol bet dah telah ditambahkan dengan nomor 558 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:42:06","T","0","0","0");
INSERT INTO notif VALUES("24","5","Ccan","beta dodol bet dah telah ditambahkan dengan nomor 558 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:42:06","T","0","0","0");
INSERT INTO notif VALUES("25","6","Ccan","Order telah dikirim dengan nomor 532186 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:45:22","N","0","0","0");
INSERT INTO notif VALUES("26","6","Ccan","beta dodol bet dah 3 telah ditambahkan dengan nomor 532186 pada tanggal 2017-08-05, tolong segera periksa","2017-08-05 10:45:27","T","0","0","0");



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO vendor VALUES("1","04-08-2017 10:00:12�WITA","Optima Gs","Mantab","Order","OPTIMA GS","0","2017-08-10 20:03:07");
INSERT INTO vendor VALUES("2","04-08-2017 10:06:20 WITA","Ccan","1","Order","OPTIMA GS","0","2017-08-04 10:07:01");
INSERT INTO vendor VALUES("3","04-08-2017 10:06:20 WITA","Optima Gs","2","Order","OPTIMA GS","0","2017-08-04 10:07:02");
INSERT INTO vendor VALUES("4","04-08-2017 10:06:20 WITA","Optima Gs","3","Order","OPTIMA GS","0","2017-08-04 10:07:02");
INSERT INTO vendor VALUES("5","04-08-2017 10:06:20 WITA","Optima Gs","4","Order","OPTIMA GS","0","2017-08-04 10:07:02");
INSERT INTO vendor VALUES("6","04-08-2017 10:06:20 WITA","Optima Gs","5","Order","OPTIMA GS","0","2017-08-04 10:07:02");
INSERT INTO vendor VALUES("7","04-08-2017 10:06:20 WITA","Optima Gs","6","Order","OPTIMA GS","0","2017-08-04 10:07:02");
INSERT INTO vendor VALUES("8","04-08-2017 10:06:20 WITA","Optima Gs","7","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("9","04-08-2017 10:06:20 WITA","Optima Gs","8","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("10","04-08-2017 10:06:20 WITA","Optima Gs","9","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("11","04-08-2017 10:06:20 WITA","Optima Gs","10","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("12","04-08-2017 10:06:20 WITA","Optima Gs","11","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("13","04-08-2017 10:06:20 WITA","Optima Gs","12","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("14","04-08-2017 10:06:20 WITA","Optima Gs","13","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("15","04-08-2017 10:06:20 WITA","Optima Gs","14","Order","OPTIMA GS","0","2017-08-04 10:07:03");
INSERT INTO vendor VALUES("16","04-08-2017 10:10:46 WITA","Ccan","1","Order","OPTIMA GS","3","2017-08-04 10:11:13");
INSERT INTO vendor VALUES("17","05-08-2017 10:38:20 WITA","Ccan","sss","Order","OPTIMA GS","4","2017-08-05 10:38:56");
INSERT INTO vendor VALUES("18","05-08-2017 10:38:20 WITA","Optima Gs","sssss","Order","OPTIMA GS","4","2017-08-05 10:38:56");
INSERT INTO vendor VALUES("19","05-08-2017 10:41:44 WITA","Ccan","ss","Order","OPTIMA GS","5","2017-08-05 10:42:05");
INSERT INTO vendor VALUES("20","05-08-2017 10:41:44 WITA","Optima Gs","dddddd","Order","OPTIMA GS","5","2017-08-05 10:42:06");
INSERT INTO vendor VALUES("21","05-08-2017 10:41:44 WITA","Optima Gs","ffffffffffffffff","Order","OPTIMA GS","5","2017-08-05 10:42:06");
INSERT INTO vendor VALUES("22","05-08-2017 10:44:53 WITA","Ccan","adsfasdfasf","Order","OPTIMA GS","6","2017-08-05 10:45:27");
INSERT INTO vendor VALUES("23","05-08-2017 10:44:53 WITA","Optima Gs","asdfasdfasdfasdfasfasdf","Order","OPTIMA GS","6","2017-08-05 10:45:27");
INSERT INTO vendor VALUES("24","05-08-2017 10:44:53 WITA","Optima Gs","asdfasfddasfasfasfasfasfaf","Order","OPTIMA GS","6","2017-08-05 10:45:27");



