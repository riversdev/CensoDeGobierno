
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_apepa` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_apema` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_register` datetime NOT NULL,
  `user_phone` varchar(234) COLLATE utf8_unicode_ci NOT NULL,
  `user_tipe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_dirge` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_selfme` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

INSERT INTO `users` (`user_id`, `user_name`, `user_apepa`, `user_apema`, `user_password_hash`, `user_email`, `user_register`, `user_phone`, `user_tipe`, `user_status`, `user_dirge`, `user_selfme`) VALUES
(26, 'Alberto', 'Sánchez', 'Ríos', '$2y$10$zEhoKJBPieA3aMirmgDvy.ncbrvugcDMjZg814z0ZYA/v6pYmMN7e', 'Albert_s_a@outlook.com', '2019-01-23 21:59:24', '7711592217', 'Usuario', 'Inactivo', 'Oficialia', ''),
(34, 'zully', 'ortega', 'tellez', '$2y$10$CvlDVl3mzojQL1Kf.ViYO.oVtiqMt4aKu.hI4ZFGK9RpYqgbB8jDu', 'zullyortegatellez@gmail.com', '2019-02-07 22:11:27', '7711437963', 'Administrador', 'Activo', 'Secretaria Tecnica de Oficilia Mayor', ''),
(35, 'Lady', 'Cuellar', 'Arenas', '$2y$10$zEhoKJBPieA3aMirmgDvy.ncbrvugcDMjZg814z0ZYA/v6pYmMN7e', 'lecuellar25@gmail.com', '2019-02-14 22:04:26', '7711800338', 'Administrador', 'Inactivo', 'Admin', ''),
(36, 'Roberto', 'Bautista', 'Martinez', '$2y$10$G3iL3xSIeDDhugq/vG8YLO1hj4W0M37H2lYJNiaRN0tGlaru4v8nm', 'sambueza_beto@hotmail.com', '2020-02-04 20:05:34', '7711889528', 'Administrador', 'Activo', 'Secretaria Técnica', ''),
(37, 'J. Alejandro', 'Ríos', 'Téllez', '$2y$10$e/oKQwS0vQkm9LtmShTP/OdppHVwRytnuU8FxCqdy8uIh87YjIOhW', 'jesus.alejandro.rios.tellez@gmail.com', '2020-10-28 16:11:35', '7713523938', 'Administrador', 'Activo', 'Secretaría Técnica', ''),
(62, 'Carlos', 'c', 'b', '$2y$10$1A0rVuAGGt6WfY2anTk5quTHmYiKoxuWPoX2MCD8J3xUI8pdLQZk.', 'kn@jn', '2020-11-18 04:31:00', '00000000', 'Administrador', 'Activo', 'kjbsdv', ''),
(63, 'Carlos', 'jn', 'njm', '$2y$10$e/oKQwS0vQkm9LtmShTP/OdppHVwRytnuU8FxCqdy8uIh87YjIOhW', 'm@m.com', '2021-02-03 21:04:22', '2345678987', 'Administrador', 'Activo', 'eifgbujk', '');

CREATE TABLE `altas_instituciones` (
  `Id_Clave` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Clave` int(11) NOT NULL,
  `Institucion` varchar(1000) NOT NULL,
  `Clasificacion_Adm` int(5) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_instituciones` (
  `idTable` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `clasificacionAd` int(11) NOT NULL,
  `funcionPr` varchar(200) DEFAULT NULL,
  `secUno` varchar(200) DEFAULT NULL,
  `secDos` varchar(200) DEFAULT NULL,
  `secTres` varchar(200) DEFAULT NULL,
  `secCuatro` varchar(200) DEFAULT NULL,
  `secCinco` varchar(200) DEFAULT NULL,
  `totalh1` int(11) DEFAULT NULL,
  `toatlm1` int(11) DEFAULT NULL,
  `totalh2` int(11) DEFAULT NULL,
  `totalm2` int(11) DEFAULT NULL,
  `comen2` varchar(800) DEFAULT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta2` (
  `id2` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_intu` int(11) NOT NULL,
  `nombre_intu` varchar(200) NOT NULL,
  `sexo` varchar(200) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `rangoMensu` varchar(200) DEFAULT NULL,
  `grad` varchar(200) DEFAULT NULL,
  `stats` varchar(200) DEFAULT NULL,
  `especialidad` int(5) DEFAULT NULL,
  `antigueda` int(11) DEFAULT NULL,
  `empreoAnter` varchar(200) DEFAULT NULL,
  `designacion` int(5) DEFAULT NULL,
  `institular` varchar(100) DEFAULT NULL,
  `vacant` varchar(10) DEFAULT NULL,
  `tituloo` varchar(200) DEFAULT NULL,
  `cedula` varchar(200) DEFAULT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta4` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_inst` int(11) NOT NULL,
  `nombre_inst` varchar(500) NOT NULL,
  `confianzah` int(11) NOT NULL,
  `confianzam` int(11) NOT NULL,
  `baseh` int(11) NOT NULL,
  `basem` int(11) NOT NULL,
  `eventualh` int(11) NOT NULL,
  `eventualm` int(11) NOT NULL,
  `honorariosh` int(11) NOT NULL,
  `honorariosm` int(11) NOT NULL,
  `otroh` int(11) NOT NULL,
  `otrom` int(11) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta5` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIns` int(11) NOT NULL,
  `nombreIns` varchar(500) NOT NULL,
  `isssteh` int(11) NOT NULL,
  `isstem` int(11) NOT NULL,
  `issefhh` int(11) NOT NULL,
  `issefhm` int(11) NOT NULL,
  `imssh` int(11) NOT NULL,
  `imssm` int(11) NOT NULL,
  `otroh` int(11) NOT NULL,
  `otrom` int(11) NOT NULL,
  `sinseguroh` int(11) NOT NULL,
  `sinsegurom` int(11) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta6` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_inti` int(11) NOT NULL,
  `intitucion` varchar(200) NOT NULL,
  `1824H` int(11) NOT NULL,
  `1824M` int(11) NOT NULL,
  `2529H` int(11) NOT NULL,
  `2529M` int(11) NOT NULL,
  `3034H` int(11) NOT NULL,
  `3034M` int(11) NOT NULL,
  `3539H` int(11) NOT NULL,
  `3539M` int(11) NOT NULL,
  `4044H` int(11) NOT NULL,
  `4044M` int(11) NOT NULL,
  `4549H` int(11) NOT NULL,
  `4549M` int(11) NOT NULL,
  `5054H` int(11) NOT NULL,
  `5054M` int(11) NOT NULL,
  `5559H` int(11) NOT NULL,
  `5559M` int(11) NOT NULL,
  `60H` int(11) NOT NULL,
  `60M` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta7` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIns` int(11) NOT NULL,
  `nombreIns` varchar(500) NOT NULL,
  `sinpagoh` int(11) NOT NULL,
  `sinpagom` int(11) NOT NULL,
  `pago2h` int(11) NOT NULL,
  `pago2m` int(11) NOT NULL,
  `pago3h` int(11) NOT NULL,
  `pago3m` int(11) NOT NULL,
  `pago4h` int(11) NOT NULL,
  `pago4m` int(11) NOT NULL,
  `pago5h` int(11) NOT NULL,
  `pago5m` int(11) NOT NULL,
  `pago6h` int(11) NOT NULL,
  `pago6m` int(11) NOT NULL,
  `pago7h` int(11) NOT NULL,
  `pago7m` int(11) NOT NULL,
  `pago8h` int(11) NOT NULL,
  `pago8m` int(11) NOT NULL,
  `pago9h` int(11) NOT NULL,
  `pago9m` int(11) NOT NULL,
  `pago10h` int(11) NOT NULL,
  `pago10m` int(11) NOT NULL,
  `pago11h` int(11) NOT NULL,
  `pago11m` int(11) NOT NULL,
  `pago12h` int(11) NOT NULL,
  `pago12m` int(11) NOT NULL,
  `pago13h` int(11) NOT NULL,
  `pago13m` int(11) NOT NULL,
  `pago14h` int(11) NOT NULL,
  `pago14m` int(11) NOT NULL,
  `pago15h` int(11) NOT NULL,
  `pago15m` int(11) NOT NULL,
  `pago16h` int(11) NOT NULL,
  `pago16m` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL,
  `comentarios` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta8` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_inst` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `h1` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `h2` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `h3` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `h4` int(11) NOT NULL,
  `m4` int(11) NOT NULL,
  `h5` int(11) NOT NULL,
  `m5` int(11) NOT NULL,
  `h6` int(11) NOT NULL,
  `m6` int(11) NOT NULL,
  `h7` int(11) NOT NULL,
  `m7` int(11) NOT NULL,
  `h8` int(11) NOT NULL,
  `m8` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta9` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_intitu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `hombre` int(11) NOT NULL,
  `mujer` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta9-1` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta9-2` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `eduBasica` int(11) NOT NULL,
  `eduMedia` int(11) NOT NULL,
  `eduSuperior` int(11) NOT NULL,
  `total2` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta9-4` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `fondo` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta10` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `sele` varchar(200) NOT NULL,
  `nombreInti` varchar(200) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta11` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `opti` varchar(200) NOT NULL,
  `eleme1` varchar(200) NOT NULL,
  `eleme2` varchar(200) NOT NULL,
  `eleme3` varchar(200) NOT NULL,
  `eleme4` varchar(200) NOT NULL,
  `eleme5` varchar(200) NOT NULL,
  `eleme6` varchar(200) NOT NULL,
  `eleme7` varchar(200) NOT NULL,
  `eleme8` varchar(200) NOT NULL,
  `eleme9` varchar(200) NOT NULL,
  `eleme10` varchar(200) NOT NULL,
  `eleme11` varchar(200) NOT NULL,
  `eleme12` varchar(200) NOT NULL,
  `eleme13` varchar(200) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta15` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreIns` varchar(500) NOT NULL,
  `admcpropio` int(11) NOT NULL,
  `admcrenta` int(11) NOT NULL,
  `admncotro` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `propios` int(11) NOT NULL,
  `retados` int(11) NOT NULL,
  `otro` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-1` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIsnt` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `opcion1` varchar(10) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-2` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `eduBasica` int(11) DEFAULT NULL,
  `edMedSup` int(11) DEFAULT NULL,
  `edSup` int(11) DEFAULT NULL,
  `otroescuela` int(10) DEFAULT NULL,
  `otroeducbasic` int(8) DEFAULT NULL,
  `otroedmedsup` int(8) DEFAULT NULL,
  `otroedusup` int(8) DEFAULT NULL,
  `otrofuncpri` int(8) DEFAULT NULL,
  `Total` int(11) NOT NULL,
  `otroTotal` int(8) NOT NULL,
  `Totalgraldir` int(10) NOT NULL,
  `Comentario` varchar(1000) DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-3` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIsnt` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `opcion1` varchar(10) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-4` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `totalBienesInm` int(11) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-5` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIsnt` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `opcion1` varchar(10) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-6` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `totalClinicas` int(11) NOT NULL,
  `totalCentroSalud` int(11) NOT NULL,
  `totalHospitales` int(11) NOT NULL,
  `totalotrosalud` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `totalotrafunclinica` int(11) NOT NULL,
  `totalotrafuncsa` int(11) NOT NULL,
  `totalotrafunchos` int(11) NOT NULL,
  `totalotrafuncotro` int(11) NOT NULL,
  `totalotra` int(11) NOT NULL,
  `Totalgral` int(11) NOT NULL,
  `Comentario` varchar(500) DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-7` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `opcion1` varchar(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta16-8` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `bienesInActFi` int(11) NOT NULL,
  `bienesInActRec` int(11) NOT NULL,
  `bienesInDep` int(11) NOT NULL,
  `bienesInDepRend` int(11) NOT NULL,
  `bienesInEventDep` int(11) NOT NULL,
  `bienescinco` int(11) NOT NULL,
  `otros` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bienesotrotipfis` int(11) NOT NULL,
  `bienesotrotiprec` int(11) NOT NULL,
  `bienesotrotipdeps` int(11) NOT NULL,
  `bienesotrotipalto` int(11) NOT NULL,
  `bienesotrotipeven` int(11) NOT NULL,
  `bienesotrotipcinco` int(11) NOT NULL,
  `bienesotrotipotros` int(11) NOT NULL,
  `totalotros` int(11) NOT NULL,
  `Totalgral` int(11) NOT NULL,
  `Comentario` varchar(1000) DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta17` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIns` int(11) NOT NULL,
  `nombreIns` varchar(500) NOT NULL,
  `admcauto` int(11) NOT NULL,
  `admccamioneta` int(11) NOT NULL,
  `admcmoto` int(11) NOT NULL,
  `admcotro` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta18` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `automoviles` int(11) NOT NULL,
  `camionetas` int(11) NOT NULL,
  `motocicletas` int(11) NOT NULL,
  `otro` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta19` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIns` int(11) NOT NULL,
  `nombreIns` varchar(500) NOT NULL,
  `admcfijos1` int(11) NOT NULL,
  `admcmoviles1` int(11) NOT NULL,
  `admcfijos2` int(11) NOT NULL,
  `admcmoviles2` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `comentarios` varchar(1000) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta20` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `lineasfijas` int(11) NOT NULL,
  `lineasmoviles` int(11) NOT NULL,
  `total1` int(11) NOT NULL,
  `aparatosfijos` int(11) NOT NULL,
  `aparatosmoviles` int(11) NOT NULL,
  `total2` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta21` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idIns` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `admccompues` int(11) NOT NULL,
  `admccomppo` int(11) NOT NULL,
  `admcimpper` int(11) NOT NULL,
  `admcimpcom` int(11) NOT NULL,
  `totalcmultf` int(11) NOT NULL,
  `totalcserv` int(11) NOT NULL,
  `totalctablet` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta22` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `cumpuEscritorio` int(11) NOT NULL,
  `compuPortatil` int(11) NOT NULL,
  `totalC` int(11) NOT NULL,
  `impresoraPersonal` int(11) NOT NULL,
  `impresoraCompartida` int(11) NOT NULL,
  `totalI` int(11) NOT NULL,
  `multifuncionales` int(11) NOT NULL,
  `servidores` int(11) NOT NULL,
  `tabletas` int(11) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta22-1` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `opcion1` varchar(10) NOT NULL,
  `enviado` varchar(100) DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_pregunta22-2` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idInst` int(11) NOT NULL,
  `nombreInst` varchar(500) NOT NULL,
  `totalComFEduc` int(11) NOT NULL,
  `CompuEdBasica` int(11) NOT NULL,
  `CompuEdMediaS` int(11) NOT NULL,
  `CompuEdSup` int(11) NOT NULL,
  `CompuEdotro` int(10) NOT NULL,
  `totalImpFEduc` int(11) NOT NULL,
  `ImpreEdBasica` int(11) NOT NULL,
  `ImpreEdMediaS` int(11) NOT NULL,
  `ImpreEdSup` int(11) NOT NULL,
  `ImpreEdotro` int(11) NOT NULL,
  `totalMultifFEduc` int(11) NOT NULL,
  `MultifEdBasica` int(11) NOT NULL,
  `MultifEdMediaS` int(11) NOT NULL,
  `MultifEdSup` int(11) NOT NULL,
  `MultifEdotro` int(11) NOT NULL,
  `totalServidoresFEduc` int(11) NOT NULL,
  `ServEdBasica` int(11) NOT NULL,
  `ServEdMediaS` int(11) NOT NULL,
  `ServEdSup` int(11) NOT NULL,
  `ServEdotro` int(11) NOT NULL,
  `totalTabletsFEduc` int(11) NOT NULL,
  `TabletsEdBasica` int(11) NOT NULL,
  `TabletsEdMediaS` int(11) NOT NULL,
  `TabletsEdSup` int(11) NOT NULL,
  `TabletsEdotro` int(11) NOT NULL,
  `enviado` varchar(30) NOT NULL,
  `comentarios` longtext DEFAULT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `tbl_preguntas9-3` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_institu` int(11) NOT NULL,
  `institucion` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `Status` int(5) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;