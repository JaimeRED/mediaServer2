-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2016 a las 15:39:30
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mediadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `duracion` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_imagen` varchar(15) DEFAULT NULL,
  `id_autor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audio`
--

CREATE TABLE `audio` (
  `id_audio` int(15) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `id_estilo` varchar(6) DEFAULT NULL,
  `duracion` int(5) DEFAULT NULL,
  `id_imagen` varchar(15) DEFAULT NULL,
  `id_album` int(6) DEFAULT NULL,
  `directorio` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `audio`
--

INSERT INTO `audio` (`id_audio`, `titulo`, `id_estilo`, `duracion`, `id_imagen`, `id_album`, `directorio`, `fecha`) VALUES
(1, 'Furcast Archive', 'vivo01', NULL, 'furcast_cover', NULL, 'http://stream.xbn.fm/xbn-fc-archive', NULL),
(2, 'Radio Cooperativa', 'vivo01', NULL, 'cooperativaLogo', NULL, 'http://unlimited1-us.digitalproserver.com/cooperativafm/mp3/icecast.audio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_imagen` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_imagen` varchar(15) DEFAULT NULL,
  `id_director` varchar(15) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilo`
--

CREATE TABLE `estilo` (
  `id_estilo` varchar(6) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estilo`
--

INSERT INTO `estilo` (`id_estilo`, `nombre`) VALUES
('vivo01', 'Señal en Vivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE `estudio` (
  `id_estudio` varchar(15) NOT NULL,
  `id_imagen` varchar(15) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla estudios (los de peliculas)';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` varchar(15) NOT NULL,
  `dir_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Imagenes';

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `dir_imagen`) VALUES
('cooperativaLogo', 'archivos/imagenes/cooperativa_radio_logo.png'),
('furcast_cover', 'archivos/imagenes/furcast-2013.png'),
('howlsCastle01', 'archivos/imagenes/Howls_Moving_Castle/Cover.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_imagen` varchar(15) DEFAULT NULL,
  `id_pelicula` int(10) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `id_estudio` varchar(15) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `id_director` varchar(15) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `directorio` varchar(300) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla peliculas';

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_imagen`, `id_pelicula`, `titulo`, `id_estudio`, `duracion`, `id_director`, `fecha_publicacion`, `directorio`, `descripcion`) VALUES
(NULL, 1, 'grave of the fireflies', NULL, NULL, NULL, NULL, '../archivos/video/Grave_of_the_Fireflies.mp4', NULL),
('howlsCastle01', 2, 'holw''s moving castle', NULL, NULL, NULL, NULL, '../archivos/video/Howls_Moving_Castle.mp4', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuarios de sistema';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `username`, `password`, `categoria`) VALUES
(1, 'Administrador', 'admin', 'd2cf16722044ce37dddcc52548bc40b014646e7adfc19178942c109cb048d30e2b44a546aa1bd24afbd44ee6b2ca8f510e27bee9e2763e0397162b007ac447507THIMWmCbZChfWs/AD7VZZVxYVShltd3LIX6HsWmgWA=', 'admin'),
(5, 'Jaime', 'rojas', 'e65cb48b2f0d5443b4bee9db9da286c3566c8909e5f44d0443cafc0d97290101012086b2790a3363ebcdd6d3f48ea914bdc794e72f924bc167b6da4f93d69290/eWdHA+j6lVqICxviXlIZxiva3ZE4ruiQNYaaNuuYUk=', 'miembro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_imagen` (`id_imagen`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_audio`),
  ADD KEY `idEstilo` (`id_estilo`),
  ADD KEY `id_imagen` (`id_imagen`),
  ADD KEY `id_album` (`id_album`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_imagen` (`id_imagen`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `id_imagen` (`id_imagen`);

--
-- Indices de la tabla `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`id_estilo`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id_estudio`),
  ADD KEY `id_imagen` (`id_imagen`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_imagen` (`id_imagen`),
  ADD KEY `id_estudio` (`id_estudio`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audio`
--
ALTER TABLE `audio`
  MODIFY `id_audio` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `audio_ibfk_1` FOREIGN KEY (`id_estilo`) REFERENCES `estilo` (`id_estilo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `audio_ibfk_2` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `audio_ibfk_3` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD CONSTRAINT `Studio_Image_ID` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `imageID` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id_estudio`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_2` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
