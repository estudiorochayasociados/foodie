-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 15:07:08
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio-novedades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'facundo@estudiorochayasoc.com.ar', 'faAr2010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `cod`, `titulo`, `area`) VALUES
(1, '45df92d0f2', 'ASFASFA', 'novedades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `contenido` longtext,
  `cod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `contenido`, `cod`) VALUES
(4, '<div class=\"btgrid\">\r\n<div class=\"row row-1\">\r\n<div class=\"col col-md-4\">\r\n<div class=\"content\">\r\n<p style=\"text-align:center\"><img alt=\"ENVIO\" src=\"http://delagro.com.ar/archivos/image/52d220e.png\" style=\"width:20%\" /></p>\r\n\r\n<h3 style=\"text-align:center\">ENV&Iacute;O A CONVENIR CON EL CLIENTE<br />\r\n<strong>ENVIAMOS A TODA LA ARGENTINA</strong></h3>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-4\">\r\n<div class=\"content\">\r\n<h3 style=\"text-align:center\"><img alt=\"PAGOS\" src=\"http://delagro.com.ar/archivos/image/74f54eb.png\" style=\"width:20%\" /></h3>\r\n\r\n<h3 style=\"text-align:center\">SEGUINOS EN LAS REDES<br />\r\n<strong>INGRES&Aacute; A NUESTRO FACEBOOK</strong></h3>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-4\">\r\n<div class=\"content\">\r\n<h3 style=\"text-align:center\"><img alt=\"WHATSAPP\" src=\"http://delagro.com.ar/archivos/image/6665be8.png\" style=\"width:20%\" /></h3>\r\n\r\n<h3 style=\"text-align:center\">CONTACTANOS V&Iacute;A WHATSAPP<br />\r\n<strong>A NUESTROS CELULARES</strong></h3>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n', 'FOOTER BOX'),
(5, '<h3>&iquest;Quer&eacute;s Recibir tu cup&oacute;n de descuento?</h3>\r\n\r\n<p>&iexcl;Si quer&eacute;s recibir tu cup&oacute;n envianos en el cuerpo del mensaje CUP&Oacute;N DE DESCUENTO y cantidad de metros a comprar, luego te enviaremos el CUP&Oacute;N!</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'OFERTAS ESPECIALES CONTACTO'),
(6, '<p>&iexcl;Muchas gracias!<br />\r\n<strong>Agromade</strong><br />\r\n356 469-6748 &nbsp;<br />\r\nLun - Viernes: 9:00 - 18:00 &nbsp;<br />\r\nventas@agro-made.com.ar</p>\r\n', 'PIE CORREOS'),
(7, '<h2 style=\"text-align:center\"><span style=\"color:#27ae60; font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:36px\"><strong>PAGANOS EN<br />\r\n12 CUOTAS</strong></span><br />\r\n<span style=\"font-size:22px\"><strong>CON MERCADOPAGO</strong></span></span></h2>\r\n', 'alerta sesion'),
(8, '<p>fasfa</p>\r\n', 'lknfqw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id`, `cod`, `titulo`, `desarrollo`, `categoria`, `keywords`, `description`, `fecha`) VALUES
(1, 'b407def216', 'a', '<p>asf</p>\r\n', '', '', '                            ', '2018-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `pedido` text NOT NULL,
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0',
  `usuario` varchar(255) NOT NULL,
  `detalle` text,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `precio` float DEFAULT NULL,
  `precioDescuento` float DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `desarrollo` text,
  `categoria` text,
  `subcategoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  `meli` varchar(255) DEFAULT NULL,
  `url` text,
  `cod_producto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `subtitulo` text,
  `categoria` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `nombre` text,
  `apellido` text,
  `doc` text,
  `email` text,
  `password` text,
  `postal` text,
  `localidad` text,
  `provincia` text,
  `pais` text,
  `telefono` text,
  `celular` text,
  `invitado` int(11) NOT NULL DEFAULT '0',
  `descuento` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` text,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
