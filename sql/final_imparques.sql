-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2015 a las 12:33:26
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `final_imparques`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_auditori`(us int, tab varchar(10), ope varchar(10), reg int)
BEGIN
INSERT INTO tbl_auditori(usua,tabl,oper,regi,fecha) VALUES (us,tab,ope,reg,NOW());
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sf_actiparq`(ide int, des varchar(255), parq int, op int, usu int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_actiparq where acpa_acti=des and acpa_parq=parq;
if tot>0 then 
set res = 'Actividad ya registrado para este parque';
else 
insert into tbl_actiparq (acpa_acti,acpa_parq) values (des,parq);
CALL sp_auditori(usu,'actiparq','insert',LAST_INSERT_ID());
end if;
else 
delete from tbl_actiparq  where acpa_ide=ide;
CALL sp_auditori(usu,'actiparq','delete',ide);
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_activida`(ide int, des varchar(255), op int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_activida where acti_descrip=des;
if tot>0 then 
set res = 'Actividad ya registrada';
else 
insert into tbl_activida (acti_descrip) values (des);
end if;
ELSEIF op=2 then 
select count(*) into tot from tbl_activida where acti_descrip=des and acti_ide!=ide;
if tot>0 then 
set res = 'Actividad ya registrada';
else 
update tbl_activida set acti_descrip=des where acti_ide=ide;
end if;
else 
delete from tbl_activida  where acti_ide=ide;
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_atraccio`(ide int, des varchar(255), parq int, lat varchar(50), lon varchar(50), op int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_atraccio where atra_descrip=des and atra_parq=parq;
if tot>0 then 
set res = 'Atracci&oacute;n ya registrado para este parque';
else 
insert into tbl_atraccio (atra_descrip,atra_parq,atra_latitud,atra_longitu) values (des,parq,lat,lon);
end if;
ELSEIF op=2 then 
select count(*) into tot from tbl_atraccio where atra_descrip=des and atra_parq=parq and atra_ide!=ide;
if tot>0 then 
set res = 'Atracci&oacute;n ya registrado para este parque';
else 
update tbl_atraccio set atra_descrip=des, atra_latitud=lat, atra_longitu=lon where atra_ide=ide;
end if;
else 
delete from tbl_atraccio  where atra_ide=ide;
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_contenido`(ide int4, cont varchar(100), tit varchar(100), img varchar(100), op int) RETURNS smallint(6)
begin 
update tbl_contenid set cont_conteni=cont, cont_titulo=tit, cont_imagen=img where cont_ide=ide;
return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_estado`(ide int, des varchar(255), op int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_estado where esta_descrip=des;
if tot>0 then 
set res = 'Estado ya registrado';
else 
insert into tbl_estado (esta_descrip) values (des);
end if;
ELSEIF op=2 then 
select count(*) into tot from tbl_estado where esta_descrip=des and esta_ide!=ide;
if tot>0 then 
set res = 'Estado ya registrado';
else 
update tbl_estado set esta_descrip=des where esta_ide=ide;
end if;
else 
delete from tbl_estado  where esta_ide=ide;
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_experien`(nom varchar(100), com text, cor varchar(50)) RETURNS int(11)
BEGIN
DECLARE ult INT;
INSERT INTO tbl_experien(expe_nombre,expe_comenta,expe_fecha,expe_aprobad,expe_correo) VALUES(nom,com,now(),0,cor);
SET ult = LAST_INSERT_ID();
RETURN ult;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_municipi`(ide int, des varchar(255), esta int, op int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_municipi where muni_descrip=des and muni_esta=esta;
if tot>0 then 
set res = 'Municipio ya registrado para este estado';
else 
insert into tbl_municipi (muni_descrip,muni_esta) values (des,esta);
end if;
ELSEIF op=2 then 
select count(*) into tot from tbl_municipi where muni_descrip=des and muni_esta=esta and muni_ide!=ide;
if tot>0 then 
set res = 'Municipio ya registrado para este estado';
else 
update tbl_municipi set muni_descrip=des where muni_ide=ide;
end if;
else 
delete from tbl_municipi  where muni_ide=ide;
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_muniparq`(ide int4, parq int, muni int, op int4) RETURNS varchar(100) CHARSET utf8
BEGIN
declare rep varchar(100) default 1;
declare tot int;
if op=1 then 
select count(*) into tot from tbl_muniparqu where mupa_muni=muni and mupa_parq=parq;
if tot>0 THEN
set rep='Municipio ya asignado';
ELSE
insert into tbl_muniparqu(mupa_muni,mupa_parq) values (muni,parq);
end if;
elseif op=2 then 
select count(*) into tot from tbl_muniparqu where mupa_muni=muni and mupa_parq=parq and mupa_ide!=ide;
if tot>0 THEN
set rep='Municipio ya asignado';
ELSE
update tbl_muniparqu  set mupa_muni=muni where mupa_ide=ide;
end if;
else 
delete from tbl_muniparqu where mupa_ide=ide;
end if;
return rep;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_parques`(ide int,nom varchar(100),car varchar(255),lat varchar(20),lon varchar(20),cli varchar(100),msn varchar(20),nor varchar(255),sur varchar(255),est varchar(255),oes varchar(255),det varchar(255),ubi varchar(255), usua int, op int) RETURNS varchar(100) CHARSET utf8
BEGIN
declare tot int;
declare res varchar(100) default 1;
if op=1 then 
select COUNT(*) into tot from tbl_parques where parq_nombre=nom;
if tot>0 then 
set res = 'Parque ya registrado';
else 
insert into tbl_parques (parq_nombre,parq_detalle,parq_ubicaci,parq_caracte,parq_clima,parq_msnm,parq_norte,parq_sur,parq_este,parq_oeste,parq_usua,parq_latitud,parq_longitu) values (nom,det,ubi,car,cli,msn,nor,sur,est,oes,usua,lat,lon);
CALL sp_auditori(usua,'parques','insert',LAST_INSERT_ID());
end if;
ELSEIF op=2 then 
select count(*) into tot from tbl_parques where parq_nombre=nom and parq_ide!=ide;
if tot>0 then 
set res = 'Parque ya registrado';
else 
update  tbl_parques set parq_nombre=nom, parq_detalle=det, parq_ubicaci=ubi, parq_caracte=car, parq_clima=cli, parq_msnm=msn, parq_norte=nor, parq_sur=sur, parq_este=est, parq_oeste=oes, parq_usua=usua, parq_latitud=lat, parq_longitu=lon where parq_ide=ide;
CALL sp_auditori(usua,'parques','update',ide);
end if;
else 
delete from tbl_parques  where parq_ide=ide;
CALL sp_auditori(usua,'parques','delete',ide);
end if;
return res;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_permisos`(tius int4, subm int4, val int4) RETURNS smallint(6)
begin 
declare tot int;
select count(*) into tot from tbl_permisos where perm_sumo=subm and perm_tius=tius;
if tot>0 then 
update tbl_permisos set perm_estado=val where perm_sumo=subm and perm_tius=tius;
else 
insert into tbl_permisos(perm_sumo,perm_tius,perm_estado) values (subm,tius,val);
end if;
return null;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_tipousua`(ide int4, des varchar(255), op int4) RETURNS varchar(100) CHARSET utf8
BEGIN
declare rep varchar(100) default 1;
declare tot int;
if op=1 then 
select count(*) into tot from tbl_tipousua where tius_descrip=des;
if tot>0 THEN
set rep='Tipo de usuario ya registrado';
ELSE
insert into tbl_tipousua(tius_descrip) values (des);
end if;
elseif op=2 then 
select count(*) into tot from tbl_tipousua where tius_descrip=des and tius_ide!=ide;
if tot>0 THEN
set rep='Tipo de usuario ya registrado';
ELSE
update tbl_tipousua  set tius_descrip=des where tius_ide=ide;
end if;
else 
delete from tbl_tipousua where tius_ide=ide;
end if;
return rep;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_usuarios`(ide int4, naciona char, cedula int4, nombres varchar(100), apellid varchar(100), telefon varchar(12), correo varchar(150), nombre varchar(100), clave varchar(32), tius int4, op int4, usu int) RETURNS varchar(100) CHARSET utf8
begin
declare tot integer;
declare tot2 integer;
declare ult integer;
declare rep varchar(100) default 1;
if op=1 then
select count(*) into tot from vw_usuarios where usua_naciona=naciona
and usua_cedula=cedula;
select count(*) into tot2 from vw_usuarios where acce_nombre=nombre;
if tot>0 then
set rep= 'Cédula de identidad ya registrada';
elseif tot2>0 then
set rep= 'Nombre de usuario ya registrado';
else
insert into tbl_usuarios (usua_naciona,usua_cedula,usua_nombres,
usua_apellid,usua_telefon,usua_correo) values (naciona,cedula,nombres,
apellid, telefon, correo);
set ult= LAST_INSERT_ID();
insert into tbl_acceso(acce_usua,acce_nombre,acce_clave,acce_tius,
acce_estado) values (ult,nombre,clave,tius,1);
CALL sp_auditori(usu,'usuarios','insert',ult);
set rep=ult;
end if;
elseif op=2 then
select count(*) into tot from vw_usuarios where usua_naciona=naciona
and usua_cedula=cedula and usua_ide!=ide;
select count(*) into tot2 from vw_usuarios where acce_nombre=nombre
 and usua_ide!=ide;
if tot>0 then
set rep= 'Cédula de identidad ya registrada';
elseif tot2>0 then
set rep= 'Nombre de usuario ya registrado';
else
update tbl_usuarios set usua_naciona=naciona,usua_cedula=cedula,
usua_nombres=nombres,usua_apellid=apellid,usua_telefon=telefon,usua_correo=correo 
where usua_ide=ide;
update tbl_acceso set acce_nombre=nombre,acce_clave=clave,acce_tius=tius
 where acce_usua=ide;
CALL sp_auditori(usu,'usuarios','update',ide);
end if;
else
update tbl_acceso set acce_estado=0 where acce_usua=ide;
CALL sp_auditori(usu,'usuarios','delete',ide);
end if;
return rep;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_acceso`
--

CREATE TABLE IF NOT EXISTS `tbl_acceso` (
  `acce_ide` int(11) NOT NULL COMMENT 'Identificador',
  `acce_usua` int(11) NOT NULL COMMENT 'Foránea de usuarios',
  `acce_nombre` varchar(15) DEFAULT NULL COMMENT 'Nombre',
  `acce_clave` varchar(32) DEFAULT NULL COMMENT 'Clave de acceso',
  `acce_tius` int(11) DEFAULT NULL COMMENT 'Foránea de tipo de usuario',
  `acce_estado` int(11) unsigned DEFAULT '1' COMMENT 'Estado de acceso - 1 permitido, 0 denegado'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Información sobre datos de acceso al sistema';

--
-- Volcado de datos para la tabla `tbl_acceso`
--

INSERT INTO `tbl_acceso` (`acce_ide`, `acce_usua`, `acce_nombre`, `acce_clave`, `acce_tius`, `acce_estado`) VALUES
(1, 1, 'root', 'root', 1, 1),
(2, 2, 'andrea', '1234', 2, 1),
(3, 3, 'borrar', '1234', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actiparq`
--

CREATE TABLE IF NOT EXISTS `tbl_actiparq` (
  `acpa_ide` int(11) NOT NULL COMMENT 'Identificador',
  `acpa_parq` int(11) DEFAULT NULL COMMENT 'Foránea de parque',
  `acpa_acti` int(11) DEFAULT NULL COMMENT 'Foránea de actividades'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_actiparq`
--

INSERT INTO `tbl_actiparq` (`acpa_ide`, `acpa_parq`, `acpa_acti`) VALUES
(1, 1, 1),
(3, 1, 5),
(4, 2, 1),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activida`
--

CREATE TABLE IF NOT EXISTS `tbl_activida` (
  `acti_ide` int(11) NOT NULL COMMENT 'Identificador',
  `acti_descrip` varchar(100) DEFAULT NULL COMMENT 'Descripción',
  `acti_icono` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Actividades que pueden desarrollarse como parte de atracción en los parques';

--
-- Volcado de datos para la tabla `tbl_activida`
--

INSERT INTO `tbl_activida` (`acti_ide`, `acti_descrip`, `acti_icono`) VALUES
(1, 'Agroturismo', '1_s4q1o0rmccctlscrqsog5p4r90.jpeg'),
(2, 'Cicloturismo', '2.jpeg'),
(3, 'Tirolina', '3_k9mo0iedbougk0mbpvg12h2271.jpeg'),
(4, 'Excursi&oacute;n', '4_45ft621qgul0kua0r3c56cnlh7.jpeg'),
(5, 'Acampar', '5_mkvelplo8ltkk3g1n1d97iu7i0.jpeg'),
(6, 'Parapente', '6_uln93je185s1inki55rt5j84r0.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_atraccio`
--

CREATE TABLE IF NOT EXISTS `tbl_atraccio` (
  `atra_ide` int(11) NOT NULL COMMENT 'Identificador',
  `atra_parq` int(11) DEFAULT NULL COMMENT 'Foránea de parque',
  `atra_descrip` text COMMENT 'Descripción',
  `atra_latitud` varchar(255) DEFAULT NULL,
  `atra_longitu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Atracciones de los parques';

--
-- Volcado de datos para la tabla `tbl_atraccio`
--

INSERT INTO `tbl_atraccio` (`atra_ide`, `atra_parq`, `atra_descrip`, `atra_latitud`, `atra_longitu`) VALUES
(1, 1, 'Ver el cÃ³ndor andino', '100', '-100'),
(2, 1, 'sdsd', '23', '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auditori`
--

CREATE TABLE IF NOT EXISTS `tbl_auditori` (
  `ide` int(11) NOT NULL,
  `usua` int(11) DEFAULT NULL,
  `tabl` varchar(10) DEFAULT NULL,
  `oper` varchar(10) DEFAULT NULL,
  `regi` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_auditori`
--

INSERT INTO `tbl_auditori` (`ide`, `usua`, `tabl`, `oper`, `regi`, `fecha`) VALUES
(1, 1, 'usuarios', 'update', 1, '2015-09-19'),
(2, 1, 'actiparq', 'insert', 5, '2015-09-19'),
(3, 1, 'parques', 'update', 1, '2015-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clima`
--

CREATE TABLE IF NOT EXISTS `tbl_clima` (
  `clim_ide` int(11) NOT NULL COMMENT 'Identificador',
  `clim_parq` int(11) DEFAULT NULL COMMENT 'Foránea de parque',
  `clim_manana` varchar(5) DEFAULT NULL COMMENT 'Clima por la mañana',
  `clim_tarde` varchar(5) DEFAULT NULL COMMENT 'Clima por la tarde',
  `clim_noche` varchar(5) DEFAULT NULL COMMENT 'Clima por la noche',
  `clim_fecha` date DEFAULT NULL COMMENT 'Fecha',
  `clim_hora` time DEFAULT NULL COMMENT 'Hora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Detalles sobre la información diaria del clima en las zonas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contenid`
--

CREATE TABLE IF NOT EXISTS `tbl_contenid` (
  `cont_ide` int(11) NOT NULL COMMENT 'Identificador',
  `cont_conteni` text COMMENT 'Contenido',
  `cont_imagen` varchar(255) DEFAULT NULL COMMENT 'Imagen',
  `cont_titulo` varchar(100) DEFAULT NULL COMMENT 'Título'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Detalle sobre el contenido de los enlaces básicos';

--
-- Volcado de datos para la tabla `tbl_contenid`
--

INSERT INTO `tbl_contenid` (`cont_ide`, `cont_conteni`, `cont_imagen`, `cont_titulo`) VALUES
(1, '<i><b>sdsdsdsd</b></i><br>', 'mmm', 'Â¿QuiÃ©nes Somos?'),
(2, '<div align="center">MisiÃ³n y VisiÃ³n</div>', 'mmm', 'MisiÃ³n y VisiÃ³n'),
(3, '<b>sdsdsdsdsd</b>', 'mmm', 'ContÃ¡ctanos'),
(4, 'InformaciÃ³n Adicional<br>', 'mmm', 'InformaciÃ³n Adicional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE IF NOT EXISTS `tbl_estado` (
  `esta_ide` int(11) NOT NULL COMMENT 'Identificador',
  `esta_descrip` varchar(255) DEFAULT NULL COMMENT 'Descripción'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Almacena la información de los estados que serán usados para ubicación de las rutas';

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`esta_ide`, `esta_descrip`) VALUES
(1, 'TÃ¡chira'),
(2, 'MÃ©rida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_experien`
--

CREATE TABLE IF NOT EXISTS `tbl_experien` (
  `expe_ide` int(11) NOT NULL COMMENT 'Identificador',
  `expe_nombre` varchar(100) DEFAULT NULL COMMENT 'Nombres',
  `expe_comenta` text COMMENT 'Comentario',
  `expe_fecha` date DEFAULT NULL COMMENT 'Fecha de creación del registro',
  `expe_aprobad` int(11) DEFAULT '0' COMMENT '1 si, 0 no',
  `expe_correo` varchar(255) DEFAULT NULL COMMENT 'Correo de contacto',
  `expe_foto` varchar(255) DEFAULT NULL COMMENT 'Fotografía'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Almacena las experiencias de la gente';

--
-- Volcado de datos para la tabla `tbl_experien`
--

INSERT INTO `tbl_experien` (`expe_ide`, `expe_nombre`, `expe_comenta`, `expe_fecha`, `expe_aprobad`, `expe_correo`, `expe_foto`) VALUES
(13, 'jesus Martinez', 'ssdsdsdsdsdsdsd', '2015-09-09', 1, 'jesu@gmail.com', NULL),
(14, NULL, NULL, '2015-09-09', 2, NULL, NULL),
(15, 'h is given and is n', ' If length is given and is positive, the string returned will contain at most length characters beginning from start (depending on the length of string).\r\n\r\nIf length is given and is negative, then that many characters will be omitted from the end of string (after the start position has been calculated when a start is negative). If start denotes the position of this truncation or beyond, FALSE will be returned.\r\n\r\nIf length is given and is 0, FALSE or NULL, an empty string will be returned.\r\n\r\nIf length is omitted, the substring starting from start until the end of the string will be returned.\r\n\r\nExample #2 Using a negative length', '2015-09-09', 1, 'length@length.sd', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_modulos`
--

CREATE TABLE IF NOT EXISTS `tbl_modulos` (
  `modu_ide` int(11) NOT NULL COMMENT 'Identificador',
  `modu_descrip` varchar(50) DEFAULT NULL COMMENT 'Descripción',
  `modu_visible` int(11) DEFAULT NULL COMMENT 'Visibilidad (Si el módulo está activo para el sistema)',
  `modu_icono` varchar(50) DEFAULT NULL COMMENT 'Icono o imagen de identificación del módulo'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Categorías o módulos para opciones del sistema';

--
-- Volcado de datos para la tabla `tbl_modulos`
--

INSERT INTO `tbl_modulos` (`modu_ide`, `modu_descrip`, `modu_visible`, `modu_icono`) VALUES
(1, 'Usuarios', 1, NULL),
(2, 'Listas', 1, NULL),
(3, 'Contenido', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipi`
--

CREATE TABLE IF NOT EXISTS `tbl_municipi` (
  `muni_ide` int(11) NOT NULL COMMENT 'Identificador',
  `muni_esta` int(11) DEFAULT NULL COMMENT 'Foránea de estados',
  `muni_descrip` varchar(255) DEFAULT NULL COMMENT 'Descripción'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la información acerca de los lugares o municipios pertenecientes a los estados donde se ubican los parques';

--
-- Volcado de datos para la tabla `tbl_municipi`
--

INSERT INTO `tbl_municipi` (`muni_ide`, `muni_esta`, `muni_descrip`) VALUES
(1, 1, 'San CristÃ³bal'),
(2, 1, 'Lobatera'),
(3, NULL, 'Concordia'),
(4, 2, 'aaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_muniparqu`
--

CREATE TABLE IF NOT EXISTS `tbl_muniparqu` (
  `mupa_ide` int(11) NOT NULL COMMENT 'Identificador',
  `mupa_muni` int(11) DEFAULT NULL COMMENT 'Foránea de municipios',
  `mupa_parq` int(11) DEFAULT NULL COMMENT 'Foránea de parques'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Almacena la información sobre los municipios que abarca cada parque';

--
-- Volcado de datos para la tabla `tbl_muniparqu`
--

INSERT INTO `tbl_muniparqu` (`mupa_ide`, `mupa_muni`, `mupa_parq`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parques`
--

CREATE TABLE IF NOT EXISTS `tbl_parques` (
  `parq_ide` int(11) NOT NULL COMMENT 'Identificador',
  `parq_nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre',
  `parq_detalle` varchar(255) DEFAULT NULL COMMENT 'Detalle',
  `parq_ubicaci` varchar(255) DEFAULT NULL COMMENT 'Ubicación',
  `parq_caracte` text COMMENT 'Características',
  `parq_clima` varchar(255) DEFAULT NULL COMMENT 'Clima',
  `parq_msnm` decimal(10,0) DEFAULT NULL COMMENT 'Metros sobre el nivel del mar',
  `parq_norte` varchar(255) DEFAULT NULL COMMENT 'Limite norte',
  `parq_sur` varchar(255) DEFAULT NULL COMMENT 'Límite sur',
  `parq_este` varchar(255) DEFAULT NULL COMMENT 'Límite este',
  `parq_oeste` varchar(255) DEFAULT NULL COMMENT 'Límite oeste',
  `parq_usua` int(255) DEFAULT NULL,
  `parq_latitud` varchar(20) DEFAULT NULL,
  `parq_longitu` varchar(20) DEFAULT NULL,
  `parq_busqued` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Almacena la información sobre los parques';

--
-- Volcado de datos para la tabla `tbl_parques`
--

INSERT INTO `tbl_parques` (`parq_ide`, `parq_nombre`, `parq_detalle`, `parq_ubicaci`, `parq_caracte`, `parq_clima`, `parq_msnm`, `parq_norte`, `parq_sur`, `parq_este`, `parq_oeste`, `parq_usua`, `parq_latitud`, `parq_longitu`, `parq_busqued`) VALUES
(1, 'Parque Nacional El TamÃ¡', 'nada especial', 'Sierra TamÃ¡', 'Cubierto de niebla', 'Templado', '3344', 'MÃ©rida', 'CÃºcuta', 'Maracaibo', 'Barinas', 1, '7.522621', '-69.601935', 2),
(2, 'Parque Canaima', 'sd', 'd', 'MontaÃ±as', 'aaaa', '0', 'tales', 'pascuales', 'sd', 'sd', 1, '12', '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos`
--

CREATE TABLE IF NOT EXISTS `tbl_permisos` (
  `perm_ide` int(11) NOT NULL COMMENT 'Identificador',
  `perm_sumo` int(11) DEFAULT NULL COMMENT 'Foránea de submodulos',
  `perm_tius` int(11) DEFAULT NULL COMMENT 'Foránea de tipos de usuario',
  `perm_estado` int(11) DEFAULT NULL COMMENT 'Estado del permiso - 1 activo, 0 inactivo'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Información sobre los permisos de acceso a los submodulos del sistema';

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`perm_ide`, `perm_sumo`, `perm_tius`, `perm_estado`) VALUES
(1, 1, 1, 1),
(6, 2, 1, 1),
(7, 3, 1, 1),
(8, 4, 1, 1),
(9, 5, 1, 1),
(10, 6, 1, 1),
(12, 8, 1, 1),
(13, 9, 1, 1),
(14, 10, 1, 1),
(15, 11, 1, 1),
(16, 12, 1, 1),
(17, 13, 1, 1),
(18, 14, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_submodul`
--

CREATE TABLE IF NOT EXISTS `tbl_submodul` (
  `sumo_ide` int(11) NOT NULL,
  `sumo_descrip` varchar(50) DEFAULT NULL,
  `sumo_url` varchar(100) DEFAULT NULL,
  `sumo_icono` varchar(50) DEFAULT NULL,
  `sumo_orden` int(11) DEFAULT NULL,
  `sumo_modu` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_submodul`
--

INSERT INTO `tbl_submodul` (`sumo_ide`, `sumo_descrip`, `sumo_url`, `sumo_icono`, `sumo_orden`, `sumo_modu`) VALUES
(1, 'Usuarios', 'usua/vst/', 'users', 1, 1),
(2, 'Tipos de Usuario', 'tius/vst/', 'gears', 2, 1),
(3, 'Qui&eacute;nes Somos', 'page2/quie', 'question', 1, 3),
(4, 'Misi&oacute;n y Visi&oacute;n', 'page2/misi', 'list', 1, 3),
(5, 'Cont&aacute;ctanos', 'page2/cont', 'phone', 1, 3),
(6, 'Estados', 'esta/vst', 'globe', 1, 2),
(8, 'Actividades', 'acti/vst', 'cube', 3, 2),
(9, 'Parques', 'parq/vst', 'building', 4, 2),
(10, 'Experiencias', 'expe/vst', 'check', 5, 2),
(11, 'Folletos', 'folle/vst', 'book', 6, 2),
(12, 'Informaci&oacute;n Adicional', 'page2/info', 'info', 7, 3),
(13, 'Respaldo', 'resp/vst', 'database', 8, 1),
(14, 'Auditor&iacute;a', 'audi/vst', 'coffee', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipousua`
--

CREATE TABLE IF NOT EXISTS `tbl_tipousua` (
  `tius_ide` int(11) NOT NULL COMMENT 'Identificador',
  `tius_descrip` varchar(20) DEFAULT NULL COMMENT 'Descripción'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tipo de usuarios que hacen vida en el sistema';

--
-- Volcado de datos para la tabla `tbl_tipousua`
--

INSERT INTO `tbl_tipousua` (`tius_ide`, `tius_descrip`) VALUES
(1, 'administrador'),
(2, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `usua_ide` int(11) NOT NULL,
  `usua_naciona` char(1) DEFAULT NULL,
  `usua_cedula` int(11) DEFAULT NULL,
  `usua_nombres` varchar(100) DEFAULT NULL,
  `usua_apellid` varchar(100) DEFAULT NULL,
  `usua_telefon` varchar(11) DEFAULT NULL,
  `usua_correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usua_ide`, `usua_naciona`, `usua_cedula`, `usua_nombres`, `usua_apellid`, `usua_telefon`, `usua_correo`) VALUES
(1, 'V', 17811174, 'Publio A', 'Quintero M', '04147180817', 'publio.quintero@gmail.com'),
(2, 'V', 18089183, 'Andrea', 'SÃ¡nchez', '04147001144', 'andrea.sanchez-@hotmail.com'),
(3, 'V', 1111111, 'borrar', 'borrar', '1234567', 'borrar@borrar.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_modulos`
--
CREATE TABLE IF NOT EXISTS `vw_modulos` (
`sumo_ide` int(11)
,`sumo_descrip` varchar(50)
,`sumo_url` varchar(100)
,`sumo_icono` varchar(50)
,`sumo_orden` int(11)
,`sumo_modu` int(11)
,`modu_ide` int(11)
,`modu_descrip` varchar(50)
,`modu_visible` int(11)
,`modu_icono` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_permisos`
--
CREATE TABLE IF NOT EXISTS `vw_permisos` (
`perm_ide` int(11)
,`perm_sumo` int(11)
,`perm_tius` int(11)
,`perm_estado` int(11)
,`sumo_ide` int(11)
,`sumo_descrip` varchar(50)
,`sumo_url` varchar(100)
,`sumo_icono` varchar(50)
,`sumo_orden` int(11)
,`sumo_modu` int(11)
,`modu_ide` int(11)
,`modu_descrip` varchar(50)
,`modu_visible` int(11)
,`modu_icono` varchar(50)
,`tius_ide` int(11)
,`tius_descrip` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_usuarios`
--
CREATE TABLE IF NOT EXISTS `vw_usuarios` (
`usua_ide` int(11)
,`usua_naciona` char(1)
,`usua_cedula` int(11)
,`usua_nombres` varchar(100)
,`usua_apellid` varchar(100)
,`usua_telefon` varchar(11)
,`usua_correo` varchar(100)
,`acce_ide` int(11)
,`acce_usua` int(11)
,`acce_nombre` varchar(15)
,`acce_clave` varchar(32)
,`acce_tius` int(11)
,`acce_estado` int(11) unsigned
,`tius_ide` int(11)
,`tius_descrip` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_modulos`
--
DROP TABLE IF EXISTS `vw_modulos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_modulos` AS select `a`.`sumo_ide` AS `sumo_ide`,`a`.`sumo_descrip` AS `sumo_descrip`,`a`.`sumo_url` AS `sumo_url`,`a`.`sumo_icono` AS `sumo_icono`,`a`.`sumo_orden` AS `sumo_orden`,`a`.`sumo_modu` AS `sumo_modu`,`b`.`modu_ide` AS `modu_ide`,`b`.`modu_descrip` AS `modu_descrip`,`b`.`modu_visible` AS `modu_visible`,`b`.`modu_icono` AS `modu_icono` from (`tbl_submodul` `a` join `tbl_modulos` `b` on((`a`.`sumo_modu` = `b`.`modu_ide`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_permisos`
--
DROP TABLE IF EXISTS `vw_permisos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permisos` AS select `a`.`perm_ide` AS `perm_ide`,`a`.`perm_sumo` AS `perm_sumo`,`a`.`perm_tius` AS `perm_tius`,`a`.`perm_estado` AS `perm_estado`,`b`.`sumo_ide` AS `sumo_ide`,`b`.`sumo_descrip` AS `sumo_descrip`,`b`.`sumo_url` AS `sumo_url`,`b`.`sumo_icono` AS `sumo_icono`,`b`.`sumo_orden` AS `sumo_orden`,`b`.`sumo_modu` AS `sumo_modu`,`c`.`modu_ide` AS `modu_ide`,`c`.`modu_descrip` AS `modu_descrip`,`c`.`modu_visible` AS `modu_visible`,`c`.`modu_icono` AS `modu_icono`,`d`.`tius_ide` AS `tius_ide`,`d`.`tius_descrip` AS `tius_descrip` from (((`tbl_permisos` `a` join `tbl_submodul` `b` on((`a`.`perm_sumo` = `b`.`sumo_ide`))) join `tbl_modulos` `c` on((`b`.`sumo_modu` = `c`.`modu_ide`))) join `tbl_tipousua` `d` on((`a`.`perm_tius` = `d`.`tius_ide`))) where ((`a`.`perm_estado` = 1) and (`c`.`modu_visible` = 1));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios` AS select `a`.`usua_ide` AS `usua_ide`,`a`.`usua_naciona` AS `usua_naciona`,`a`.`usua_cedula` AS `usua_cedula`,`a`.`usua_nombres` AS `usua_nombres`,`a`.`usua_apellid` AS `usua_apellid`,`a`.`usua_telefon` AS `usua_telefon`,`a`.`usua_correo` AS `usua_correo`,`b`.`acce_ide` AS `acce_ide`,`b`.`acce_usua` AS `acce_usua`,`b`.`acce_nombre` AS `acce_nombre`,`b`.`acce_clave` AS `acce_clave`,`b`.`acce_tius` AS `acce_tius`,`b`.`acce_estado` AS `acce_estado`,`c`.`tius_ide` AS `tius_ide`,`c`.`tius_descrip` AS `tius_descrip` from ((`tbl_usuarios` `a` join `tbl_acceso` `b` on((`a`.`usua_ide` = `b`.`acce_usua`))) join `tbl_tipousua` `c` on((`b`.`acce_tius` = `c`.`tius_ide`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_acceso`
--
ALTER TABLE `tbl_acceso`
  ADD PRIMARY KEY (`acce_ide`),
  ADD KEY `acce_usua` (`acce_usua`),
  ADD KEY `acce_tius` (`acce_tius`);

--
-- Indices de la tabla `tbl_actiparq`
--
ALTER TABLE `tbl_actiparq`
  ADD PRIMARY KEY (`acpa_ide`),
  ADD KEY `acpa_parq` (`acpa_parq`),
  ADD KEY `acpa_acti` (`acpa_acti`);

--
-- Indices de la tabla `tbl_activida`
--
ALTER TABLE `tbl_activida`
  ADD PRIMARY KEY (`acti_ide`);

--
-- Indices de la tabla `tbl_atraccio`
--
ALTER TABLE `tbl_atraccio`
  ADD PRIMARY KEY (`atra_ide`),
  ADD KEY `atra_parq` (`atra_parq`);

--
-- Indices de la tabla `tbl_auditori`
--
ALTER TABLE `tbl_auditori`
  ADD PRIMARY KEY (`ide`);

--
-- Indices de la tabla `tbl_clima`
--
ALTER TABLE `tbl_clima`
  ADD PRIMARY KEY (`clim_ide`),
  ADD KEY `clim_parq` (`clim_parq`);

--
-- Indices de la tabla `tbl_contenid`
--
ALTER TABLE `tbl_contenid`
  ADD PRIMARY KEY (`cont_ide`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`esta_ide`);

--
-- Indices de la tabla `tbl_experien`
--
ALTER TABLE `tbl_experien`
  ADD PRIMARY KEY (`expe_ide`);

--
-- Indices de la tabla `tbl_modulos`
--
ALTER TABLE `tbl_modulos`
  ADD PRIMARY KEY (`modu_ide`);

--
-- Indices de la tabla `tbl_municipi`
--
ALTER TABLE `tbl_municipi`
  ADD PRIMARY KEY (`muni_ide`),
  ADD KEY `esta_ide` (`muni_esta`);

--
-- Indices de la tabla `tbl_muniparqu`
--
ALTER TABLE `tbl_muniparqu`
  ADD PRIMARY KEY (`mupa_ide`),
  ADD KEY `mupa_muni` (`mupa_muni`),
  ADD KEY `mupa_parq` (`mupa_parq`);

--
-- Indices de la tabla `tbl_parques`
--
ALTER TABLE `tbl_parques`
  ADD PRIMARY KEY (`parq_ide`),
  ADD KEY `parq_usua` (`parq_usua`);

--
-- Indices de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`perm_ide`),
  ADD KEY `perm_sumo` (`perm_sumo`),
  ADD KEY `perm_tius` (`perm_tius`);

--
-- Indices de la tabla `tbl_submodul`
--
ALTER TABLE `tbl_submodul`
  ADD PRIMARY KEY (`sumo_ide`),
  ADD KEY `sumo_modu` (`sumo_modu`);

--
-- Indices de la tabla `tbl_tipousua`
--
ALTER TABLE `tbl_tipousua`
  ADD PRIMARY KEY (`tius_ide`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`usua_ide`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_acceso`
--
ALTER TABLE `tbl_acceso`
  MODIFY `acce_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_actiparq`
--
ALTER TABLE `tbl_actiparq`
  MODIFY `acpa_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_activida`
--
ALTER TABLE `tbl_activida`
  MODIFY `acti_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_atraccio`
--
ALTER TABLE `tbl_atraccio`
  MODIFY `atra_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_auditori`
--
ALTER TABLE `tbl_auditori`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_clima`
--
ALTER TABLE `tbl_clima`
  MODIFY `clim_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
--
-- AUTO_INCREMENT de la tabla `tbl_contenid`
--
ALTER TABLE `tbl_contenid`
  MODIFY `cont_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `esta_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_experien`
--
ALTER TABLE `tbl_experien`
  MODIFY `expe_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbl_modulos`
--
ALTER TABLE `tbl_modulos`
  MODIFY `modu_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_municipi`
--
ALTER TABLE `tbl_municipi`
  MODIFY `muni_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_muniparqu`
--
ALTER TABLE `tbl_muniparqu`
  MODIFY `mupa_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_parques`
--
ALTER TABLE `tbl_parques`
  MODIFY `parq_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `perm_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbl_submodul`
--
ALTER TABLE `tbl_submodul`
  MODIFY `sumo_ide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tbl_tipousua`
--
ALTER TABLE `tbl_tipousua`
  MODIFY `tius_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `usua_ide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_acceso`
--
ALTER TABLE `tbl_acceso`
  ADD CONSTRAINT `tbl_acceso_ibfk_1` FOREIGN KEY (`acce_usua`) REFERENCES `tbl_usuarios` (`usua_ide`),
  ADD CONSTRAINT `tbl_acceso_ibfk_2` FOREIGN KEY (`acce_tius`) REFERENCES `tbl_tipousua` (`tius_ide`);

--
-- Filtros para la tabla `tbl_actiparq`
--
ALTER TABLE `tbl_actiparq`
  ADD CONSTRAINT `tbl_actiparq_ibfk_1` FOREIGN KEY (`acpa_parq`) REFERENCES `tbl_parques` (`parq_ide`),
  ADD CONSTRAINT `tbl_actiparq_ibfk_2` FOREIGN KEY (`acpa_acti`) REFERENCES `tbl_activida` (`acti_ide`);

--
-- Filtros para la tabla `tbl_atraccio`
--
ALTER TABLE `tbl_atraccio`
  ADD CONSTRAINT `tbl_atraccio_ibfk_1` FOREIGN KEY (`atra_parq`) REFERENCES `tbl_parques` (`parq_ide`);

--
-- Filtros para la tabla `tbl_clima`
--
ALTER TABLE `tbl_clima`
  ADD CONSTRAINT `tbl_clima_ibfk_1` FOREIGN KEY (`clim_parq`) REFERENCES `tbl_parques` (`parq_ide`);

--
-- Filtros para la tabla `tbl_municipi`
--
ALTER TABLE `tbl_municipi`
  ADD CONSTRAINT `tbl_municipi_ibfk_1` FOREIGN KEY (`muni_esta`) REFERENCES `tbl_estado` (`esta_ide`);

--
-- Filtros para la tabla `tbl_muniparqu`
--
ALTER TABLE `tbl_muniparqu`
  ADD CONSTRAINT `tbl_muniparqu_ibfk_1` FOREIGN KEY (`mupa_muni`) REFERENCES `tbl_municipi` (`muni_ide`),
  ADD CONSTRAINT `tbl_muniparqu_ibfk_2` FOREIGN KEY (`mupa_parq`) REFERENCES `tbl_parques` (`parq_ide`);

--
-- Filtros para la tabla `tbl_parques`
--
ALTER TABLE `tbl_parques`
  ADD CONSTRAINT `tbl_parques_ibfk_2` FOREIGN KEY (`parq_usua`) REFERENCES `tbl_usuarios` (`usua_ide`);

--
-- Filtros para la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD CONSTRAINT `tbl_permisos_ibfk_1` FOREIGN KEY (`perm_sumo`) REFERENCES `tbl_submodul` (`sumo_ide`),
  ADD CONSTRAINT `tbl_permisos_ibfk_2` FOREIGN KEY (`perm_tius`) REFERENCES `tbl_tipousua` (`tius_ide`);

--
-- Filtros para la tabla `tbl_submodul`
--
ALTER TABLE `tbl_submodul`
  ADD CONSTRAINT `tbl_submodul_ibfk_1` FOREIGN KEY (`sumo_modu`) REFERENCES `tbl_modulos` (`modu_ide`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
