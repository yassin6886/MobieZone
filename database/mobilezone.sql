-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 18:54:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mobilezone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_image`) VALUES
(1, 'Apple', 'apple.png'),
(2, 'SAMSUNG', 'samsungl.png'),
(3, 'ONEPLUS', 'OnePlus.png'),
(4, 'OPPO', 'oppo.png'),
(5, 'XIAOMI', 'xiaomi.png'),
(6, 'SONY', 'sony.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cardnumber` varchar(255) DEFAULT NULL,
  `cardname` text DEFAULT NULL,
  `expdate` int(11) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `cardnumber`, `cardname`, `expdate`, `cvv`) VALUES
(1, 2, '0987 6543 2108 7654', 'yassin aalili', 112027, 456),
(3, 4, '1234 5678 9009 8654', 'usuario', 12023, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(61, 0, '127.0.0.1', 13, 41),
(63, 0, '127.0.0.1', 4, 1),
(99, 2, '127.0.0.1', 13, 7),
(101, 1, '127.0.0.1', 13, 1),
(102, 6, '127.0.0.1', 13, 2),
(109, 12, '127.0.0.1', 13, 4),
(110, 11, '127.0.0.1', 13, 3),
(114, 2, '127.0.0.1', 14, 2),
(115, 12, '127.0.0.1', 14, 1),
(120, 11, '127.0.0.1', 15, 1),
(154, 5, '::1', 1, 3),
(155, 1, '::1', 1, 2),
(156, 12, '::1', -1, 2),
(157, 11, '::1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_us`
--

CREATE TABLE `contact_us` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contact_us`
--

INSERT INTO `contact_us` (`email_id`, `email`, `user_id`, `name`, `phone_number`, `message`) VALUES
(8, 'usuario@gmail.com', '4', 'Usuario', '673512854', 'Problemas con la compra de productos'),
(9, 'usuario@gmail.com', '4', 'Usuario', '785162783', 'pedir devolucion de producto'),
(10, 'usuario@gmail.com', '4', 'Usuario', '689543094', 'devolucion de productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Preparando',
  `order_date` date DEFAULT NULL,
  `user_info` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `order_code`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `status`, `order_date`, `user_info`) VALUES
(1, 'MZ6476fe749a0f1', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'calle', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 4, 4519, 456, 'En Camino', '2023-05-26', 0),
(2, 'MZ6476fe749a110', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 7, 6177, 456, 'Preparando', '2023-05-29', 0),
(3, 'MZ6476fe749a119', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1899, 456, 'Recibido', '2023-05-30', 0),
(4, 'MZ6476fe749a121', 2, ' Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 220, 456, 'Preparando', '2023-05-30', 0),
(5, 'MZ6476fe749a129', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 950, 456, 'Cancelado', '2023-05-31', 0),
(6, 'MZ64772f2cef66b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1880, 456, 'Recibido', '2023-05-31', 0),
(7, 'MZ647730527d4ca', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1850, 456, 'Preparando', '2023-05-31', 0),
(8, 'MZ647731611083b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 3199, 456, 'Preparando', '2023-05-31', 0),
(9, 'MZ647738c2746cc', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Enviado', '2023-05-31', 0),
(11, 'MZ647739ab38b65', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Preparando', '2023-05-31', 0),
(12, 'MZ64773bea0f96b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Preparando', '2023-05-31', 0),
(13, 'MZ647b76b65adda', 1, 'admin', 'admin@gmail.com', 'ES', 'ciudad', 'Madrid', 12345, 'visa', '1234567890987', '12/22', 1, 900, 123, 'Preparando', '2023-06-03', 0),
(14, 'MZ647efbed651f1', 1, 'admin', 'admin@gmail.com', 'ES', 'Fuenlabrada', 'MAdrid', 20912, 'visa', '1234', '12/23', 2, 2019, 12, 'Preparando', '2023-06-06', 0),
(15, 'MZ647efc391410d', 1, 'admin', 'admin@gmail.com', 'ES', 'Fuenlabrada', 'MAdrid', 20912, 'visa', '1', '12/22', 1, 989, 1, 'Preparando', '2023-06-06', 0),
(16, 'MZ647efde0cbdf0', 1, 'admin', 'admin@gmail.com', 'ES', 'Fuenlabrada', 'MAdrid', 20912, 'visa', '12345', '12/62', 1, 900, 123, 'Preparando', '2023-06-06', 0),
(17, 'MZ647effcf5ba5c', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'visa', '1', '12/45', 1, 989, 123, 'Preparando', '2023-06-06', 0),
(18, 'MZ647f012380a8c', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'visa', '123', '12/89', 1, 1500, 12, 'Preparando', '2023-06-06', 0),
(19, 'MZ647f01771f650', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'visa', '1', '12/12', 1, 220, 21, 'Preparando', '2023-06-06', 0),
(20, 'MZ647f0371711c7', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'visa', 'ñ', '12/54', 1, 1799, 123, 'Preparando', '2023-06-06', 0),
(21, 'MZ647f1062b02c4', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'visa', 'ES12345678901234', '12/10', 1, 380, 123, 'Cancelado', '2023-06-06', 0),
(22, 'MZ647f10f6797ab', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'Discover', 'ES12345678900987', '12/89', 1, 1500, 123, 'Enviado', '2023-06-06', 0),
(23, 'MZ647f122bc37ad', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'Paypal', 'ES12345678901234', '01/27', 1, 1000, 123, 'Recibido', '2023-06-06', 0),
(24, 'MZ647f13b9016be', 1, 'admin', 'admin@gmail.com', 'ES', 'Madrid', 'Comunidad De Madrid', 28001, 'MASTERCARD', 'ES12345678900987', '01/23', 1, 989, 123, 'En Camino', '2023-06-06', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Preparando'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`, `status`) VALUES
(91, 1, 5, 3, 1140, 'Enviado'),
(92, 1, 8, 1, 1000, 'Cancelado'),
(93, 1, 10, 1, 1400, 'Preparando'),
(94, 1, 6, 2, 3598, 'En Camino'),
(95, 2, 1, 2, 1900, 'Preparando'),
(96, 2, 3, 2, 1858, 'Preparando'),
(97, 2, 4, 2, 1998, 'Preparando'),
(98, 2, 5, 1, 380, 'Preparando'),
(99, 2, 11, 3, 5397, 'Preparando'),
(100, 2, 12, 4, 880, 'Preparando'),
(101, 2, 2, 4, 3600, 'Preparando'),
(102, 3, 2, 1, 900, 'Preparando'),
(103, 3, 4, 1, 999, 'Preparando'),
(104, 4, 12, 1, 220, 'Preparando'),
(105, 5, 1, 1, 950, 'Preparando'),
(106, 6, 5, 1, 380, 'Preparando'),
(107, 6, 7, 1, 1500, 'Preparando'),
(108, 7, 2, 1, 900, 'Preparando'),
(109, 7, 1, 1, 950, 'Preparando'),
(110, 8, 10, 1, 1400, 'Preparando'),
(111, 8, 11, 1, 1799, 'Preparando'),
(112, 9, 11, 1, 1799, 'Preparando'),
(113, 10, 7, 1, 1500, 'Preparando'),
(114, 11, 6, 1, 1799, 'Preparando'),
(115, 12, 6, 1, 1799, 'Preparando'),
(116, 13, 2, 4, 3600, 'Preparando'),
(117, 14, 6, 1, 1799, 'Preparando'),
(118, 14, 12, 1, 220, 'Preparando'),
(119, 15, 15, 1, 989, 'Preparando'),
(120, 16, 2, 1, 900, 'Preparando'),
(121, 17, 15, 1, 989, 'Preparando'),
(122, 18, 7, 1, 1500, 'Preparando'),
(123, 19, 12, 1, 220, 'Preparando'),
(124, 20, 11, 1, 1799, 'Preparando'),
(125, 21, 5, 1, 380, 'Cancelado'),
(126, 22, 7, 1, 1500, 'Enviado'),
(127, 23, 8, 1, 1000, 'Recibido'),
(128, 24, 15, 1, 989, 'En Camino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_keywords` text NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_keywords`, `subcategory`) VALUES
(1, 1, 1, 'Iphone 12', 950, 'PANTALLA  OLED Retina 2.532 x 1.170 píxeles, Super Retina XDR, 19.5:9 460ppp True-tone  PROCESADOR  Apple A14 Bionic, 5nm NPU Neural Engine de 4ª gen  VERSIONES  64 / 128 / 256 GB  DIMENSIONES Y PESO  146,7 mm x 71,5 mm x 7,4mm 162g  SOFTWARE  iOS 14  CÁMARAS TRASERAS  Principal: 12MP, f/1.6, OIS, QuadLED flash Secundaria gran angular: 12MP, f/2.4 Vídeo: 4K Dolby Vision, 1080p/240fps, HDR  CÁMARA FRONTAL  12MP, f/2.2, TOF 3D, slow-motion  BATERÍA  Carga rápida 18W e inalámbrica MagSafe 15W  OTROS  WiFi 6, 5G, BT 5.0, NFC, GPS, dualSIM, eSIM, altavoces estéreo Dolby Atmos, reconocimiento facial, resistencia al agua IP68', '1686039785_iphone121.jpg', '1686039550_iphone12.jpg', 'Iphone movil electronica', 'mobile'),
(2, 1, 3, 'oneplus 10 pro', 900, 'PANTALLA   6,7 pulgadas AMOLED Tasa de refresco: 120 Hz Tecnología LTPO  PROCESADOR  Snapdragon 8 Gen 1  RAM  12 GB LPDDR5  ALMACENAMIENTO  256 GB UFS 3.1  CÁMARA FRONTAL  32 MP  CÁMARA TRASERA  Principal: 48 MP Gran angular: 50 MP Teleobjetivo: 8 MP  BATERÍA  5.000 mAh Carga rápida 80 W Carga inalámbrica 50 W  SISTEMA OPERATIVO  OxygenOS 12 basado en Android 12  CONECTIVIDAD  5G Wi-Fi Bluetooth5.2 NFC USB-C  OTROS  Lector de huellas en pantalla Altavoces duales estéreo  DIMENSIONES Y PESO  116,3 x 73,9 x 8,55 mm Peso: 200,5 gramos  PRECIO', '1682688759_oneplus10pro.jpg', '1686039991_oneplus10pro2.jpg', 'oneplus movil electronica', 'mobile'),
(3, 1, 2, 'Samsung galaxy s23', 929, 'PANTALLA  Panel Dynamic AMOLED 2X de 6,1 pulgadas  Refresco de 48 a 120 Hz  Resolución FHD+ de 2.340 x 1.080 píxeles  Brillo pico de 1.750 nits  Always-on Display  DIMENSIONES Y PESO  146,3 x 70,9 x 7,6 mm  168 gramos  PROCESADOR  Snapdragon 8 Gen 2 for Samsung  RAM  8 GB LPDDR5X  ALMACENAMIENTO  128 GB UFS 3.1  256 o 512 GB UFS 4.0  CÁMARA FRONTAL  12 Mpx f/2.2  CÁMARA TRASERA  Principal de 50 Mpx f/1.8 OIS  Telefoto de 10 Mpx f/2.4 OIS 3x  Gran angular de 12 Mpx f/2.2  BATERÍA  3.900 mAh  Carga de 25 W (cargador no incluido)  Carga inalámbrica de 15 W  Carga inalámbrica inversa de 4,5 W  SISTEMA OPERATIVO  Android 13 + One UI 5.1  CONECTIVIDAD  5G  Wi-Fi 6E  Bluetooth 5.3  NFC  OTROS  Sensor de huella ultrasónico en pantalla  Certificación IP68  Pantalla Gorilla Glass Victus 2  Sonido Dolby Atmos estéreo', '1686041008_s23.jpg', '1686040868_samsun_galaxy_s23.jpg', 'samsung movil electronica', 'mobile'),
(4, 1, 4, 'OPPO Find x5 pro', 999, 'DIMENSIONES Y PESO  163,7 mm x 73,9 mm x 8,6 mm 226g  PANTALLA  6,7 pulgadas 120 Hz adaptativos Resolución Quad HD+ AMOLED de tipo LTPO Gorilla Glass Victus  PROCESADOR  Qualcomm Snapdragon 8 Gen 1  MEMORIAS  12 + 256 GB (UFS 3.1 / DDR5)  CÁMARA TRASERA  50 MP 50 MP UGA 13 MP teleobjetivo 2X (5X híbrido)  CÁMARA DELANTERA  32 MP  SOFTWARE  Android 12 ColorOS 12.1  BATERÍA  5.000mAh Carga rápida de 80W 50W AirVooc  CONECTIVIDAD  Dual 5G WiFi 6 NFC GLONASS QZSS', '1682704719_oppo_find_x5_pro.jpg', '1686041111_x5.jpg', 'oppo movil electronica', 'mobile'),
(5, 1, 5, 'XiIAOMI 12 PRO', 380, 'Pantalla  AMOLED LTPO de 6,73 pulgadas  2K a 3.300 x 1.440 píxeles  Refresco de 1 a 120Hz  Corning Gorilla Glass Victus  Procesador  Snapdragon 8 Gen 1  Memoria RAM  12 GB LPDDR5  Almacenamiento  256 GB UFS 3.1  Cámaras traseras  Principal: 50 megapíxeles Sony IMX707  Gran angular: 50 megapíxeles con f/1,9  Teleobjetivo: 50 megapíxeles  Cámara frontal  32 megapíxeles  Batería  4.600 mAh  Carga rápida de 120 W  Carga rápida inalámbrica de 50 W  Carga inalámbrica inversa de 10 W  Sistema operativo  Android 12 con MIUI 13  Conectividad  WiFi 6 Bluetooth 5.2  GPS  NFC  USB tipo C  Dimensiones  163,6 x 74,6 x 8,16 mm (en cuero el grosor es de 8,88 mm)  Peso  204 gramos (205 gramos en cuero)  Otros  Lector de huellas bajo la pantalla  Altavoces estéreo Harman Kardon', '1682705171_Xiaomi-12pro.jpg', '1686041171_xiaomi12pro.jpg', 'Xiaomi movil electronica', 'mobile'),
(6, 1, 6, 'Sony Xperia PRO-I', 1799, 'PANTALLA  166 x 72 x 8.9 mm 221 g  PROCESADOR  Qualcomm Snapdragon 888  MEMORIA INTERNA  512 GB ampliables mediante tarjetas microSD  MEMORIA RAM  12 GB  BATERÍA  4.500mAh 30W  CÁMARA TRASERA  12 MP, f/2.0-4-0, 24mm 12 MP, f/2.4, 50mm, telefoto 2X 12 MP, f/2.2, 16mm, UGA 0.3 MP, TOF 3D  CÁMARA DELANTERA  8 MP  CONECTIVIDAD  5G SA/NSA WiFi 6 Bluetooth 5.2 USB C  SOFTWARE  Android 11', '1682705526_sony_xperia_pro-I.jpg', '1686041262_xperiapro1.jpg', 'Sony movil electronica', 'mobile'),
(7, 1, 1, 'Iphone 14 pro max', 1500, 'DIMENSIONES Y PESO  160,7 x 77,6 x 7,85 mm 240g  PANTALLA  Super Retina XDR 6,7 pulgadas True Tone, HDR ProMotion 120 Hz 2.778 x 1.284 px, 458 ppp 2.000 nits, contraste 2.000.000:1 Pantalla siempre activa Isla dinámica  PROCESADOR  Apple A16 Bionic  RAM  6 GB LPDDR5X  ALMACENAMIENTO  128/256/512 GB/1 TB  CÁMARAS TRASERAS  Principal:48MP, f/1.78, 24mm, Sensor Shift de segunda generación Ultra angular: 12MP, f/2.2, 13mm Teleobjetivo: 12MP, f/2.8, 77mm, OIS CÁMARA FRONTAL  12MP, f1.9, enfoque automático  SISTEMA OPERATIVO  iOS 16  CONECTIVIDAD  5G (sub-6 GHz) LTE Gigabit con MIMO 4x4 y LAA Wifi 802.11ax (6.ª gen.) con MIMO 2x2 Bluetooth 5.3 Chip de banda ultraancha NFC  BATERÍA  4.323 mAh Carga rápida 20W Carga inalámbrica 15W  OTROS  IP68 Sonido estéreo FaceID', '1682705642_iphone14ProMax.jpg', '1686041316_iphone14promax.jpg', 'Iphone movil electronica', 'mobile'),
(8, 1, 3, 'oneplus 11 pro', 1000, 'DIMENSIONES Y PESO  168,1mm x 74,1 x 8,53mm 205 gramos de peso  PANTALLA  AMOLED LTPO de 6,7 pulgadas Resolución QHD+ 1- 120 Hz de tasa de refresco Brillo pico de 1.300 nits  PROCESADOR  Qualcomm Snapdragon 8 Gen 2  RAM  8/16 GB LPDDR5X  ALMACENAMIENTO  128/256 GB UFS4.0  CÁMARA DELANTERA  16 Mpx  CÁMARAS TRASERAS  Principal: 50 MP Gran angular: 48 MP Teleobjetivo: 32 MP, zoom 2x  BATERÍA  5.000 mAh Carga rápida de hasta 100 W  SOFTWARE  OxygenOS 13 basado en Android 13  CONECTIVIDAD  5G WiFi 6e Bluetooth 5.3 GPS NFC USB-C  OTROS  Sensor de huellas en pantalla Certificación IP68 frente al agua y al polvo Alert Slider', '1682705756_oneplus11pro.jpg', '1686041384_op11pro.jpg', 'oneplus movil electronica', 'mobile'),
(9, 1, 2, 'Samsung galaxy s22 Ultra', 1300, 'PANTALLA  AMOLED de 6,8 pulgadas Resolución QHD+ a 3.080 x 1.440 Refresco adaptativo de 1 a 120Hz Refresco táctil de 240Hz en Modo Juego Brillo de 1.750 nits Contraste de 3.000.000:1 100% DCI-P3 Panel perforado Gorilla Glass Victus  PROCESADOR  Exynos 2200 a 2,8GHz GPU AMD  VERSIONES  8GB/128GB 12GB/256GB 12GB/512GB 12GB/1TB  CÁMARAS TRASERAS  Principal: 108 megapíxeles f/1.8 OIS Angular: 12 megapíxeles f/.22 120º 13mm Zoom: 10 megapíxeles f/2.4 OIS 3X 69mm Zoom: 10 megapíxeles f/4.9 OIS 10X 230mm  CÁMARA FRONTAL  40 megapíxeles f/2.2 25mm  BATERÍA  5.000 mAh Carga rápida de 45W Carga inalámbrica de 15W  SISTEMA  Android 12 One UI 4.1  CONECTIVIDAD  5G (2xNano + eSIM) WiFi 6E Bluetooth 5.2 GPS NFC UWB USB tipo C 3.2  DIMENSIONES Y PESO  163,3 x 77,9 x 8,9 milímetros 227 gramos  OTROS  IP68 Compatible con Samsung DeX S-Pen con 2,8ms de latencia', '1682705904_samsung_galaxy_s22Ultra.jpg', '1686041447_s22ultra.jpg', 'samsung movil electronica', 'mobile'),
(10, 1, 5, 'XiIAOMI 13 PRO', 1400, 'PANTALLA  OLED 6,73\" 3200 x 1440 120 Hz 240 Hz respuesta táctil  DIMENSIONES Y PESO  162,8 x 74,6 x 8,38 mm 229 g.  PROCESADOR  Snapdragon 8 Gen 2  RAM  12 GB  ALMACENAMIENTO  256 GB  CÁMARA FRONTAL  32 MP  CÁMARA TRASERA  50 MP f/1.9 50 MP f/2.0 tele 50 MP f/2.2 UGA  BATERÍA  4820 mAh Carga rápida 120W Carga inalámbrica 50W Carga inalámbrica inversa 10W  SISTEMA OPERATIVO  MIUI 14  CONECTIVIDAD  5G Wi-Fi 6E Bluetooth 5.3 NFC IR-Blaster  OTROS  Lector de huellas en la pantalla Altavoces estéreo Dolby Atmos IP68', '1682706014_Xiaomi-13pro.jpg', '1686041491_x13pro.jpg', 'Xiaomi movil electronica', 'mobile'),
(11, 1, 2, 'Galaxy Tab S8 Ultra 5G', 1799, 'DIMENSIONES Y PESO\r\n\r\n326,4 x 208,6 x 5,5 mm\r\n726 g (Wi-Fi)\r\n\r\nPANTALLA\r\n\r\n14,6\" SuperAMOLED\r\n2.960 x 1.848 px\r\n120 Hz\r\nGorilla Glass 5\r\n\r\nPROCESADOR\r\n\r\nQualcomm Snapdragon 8 Gen 1\r\n\r\nRAM\r\n\r\n8 / 12 / 16 GB\r\n\r\nMEMORIA INTERNA\r\n\r\n128 / 256 / 512 GB + microSD\r\n\r\nBATERÍA\r\n\r\n11.200 mAh\r\nCarga rápida hasta 45W\r\n\r\nCÁMARAS\r\n\r\nTrasera: 13 MP + 6 MP gran angular\r\nFrontal: 12 MP + 12 MP gran angular\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 12.0\r\nOne UI 4 Tab\r\n\r\nAUDIO\r\n\r\nCuatro altavoces estéreo, Dolby Atmos, AKG, tres micrófonos\r\n\r\nCONECTIVIDAD\r\n\r\n5G, LTE, Wi-Fi 6E, BT 5.2\r\n\r\nOTRO\r\n\r\nUSB tipo C, lector de huellas bajo pantalla, compatible con S Pen, Samsung Knox', 'Galaxy Tab S8 Ultra 5G.jpg', '1686041556_tabsamsungalaxy.jpg', 'samsung tablet electronica', 'tablet'),
(12, 1, 1, 'Airpods 3', 220, 'DIMENSIONES Y PESO\r\n\r\n30,8 x 18,3 mm\r\n4,28 g\r\n\r\nDIMENSIONES Y PESO DE LA BASE DE CARGA\r\n\r\n46,4 x 54,4 x 21,4 mm\r\n37,9 g\r\n\r\nBATERÍA\r\n\r\nHasta 6 horas (con una sola carga)\r\nHasta 30 horas de reproducción (con la base de carga)\r\n\r\nRESISTENCIA\r\n\r\nIPX4\r\n\r\nCHIP\r\n\r\nH1 para auriculares\r\n\r\nTECNOLOGÍA\r\n\r\nEcualización adaptativa, soporte audio espacial con seguimiento de la cabeza y Dolby Atmos, códec AAC-ELD, Bluetooth 5.0\r\n\r\nSENSORES\r\n\r\nDos micrófonos, sensor de piel, sensor de presión, acelerómetro con detección de movimiento y voz', '1685805760_airpods3.jpg', '1686041625_airpods3.jpg', 'airpods accesorios electronica', 'accesories'),
(15, 1, 1, 'ipad pro 11', 989, '247,6 x 178,5 x 5,9 mm\r\n471 gramos, Liquid Retina de 11 pulgadas\r\nResolución 2.388 x 1.668 píxeles\r\n264 ppp\r\n600 nits, Apple A12Z Bionic de 64 bits\r\nNeural Engine, Por determinar, 128/256/512/1.024 GB, Angular de 12 MP f/1.8\r\nGran angular (125º) de 10 MP f/2.5\r\nZoom x2, TrueDepth de 7 MP f/2.2, 	\r\n28,65 Wh, iPad OS, WiFi 6\r\nBluetooth 5.0\r\n4G (opcional)\r\nNanoSIM\r\neSIM\r\nGPS\r\nUSB tipo C, 	\r\nFace ID\r\nEscáner LiDAR, ', '1686039067_ipad1.jpg', '1686039067_ipad2.jpg', 'ipad ios electronica apple', 'tablet'),
(16, 1, 1, 'Iphone 13', 909, 'DIMENSIONES Y PESO\r\n\r\n146,7 x 71,5 x 7,6 mm\r\n173 gramos\r\n\r\nPANTALLA\r\n\r\nSuper Retina XDR OLED de 6,1 pulgadas\r\nResolución FullHD+ (2.532 x 1.170 píxeles)\r\n460 ppp\r\nTrue-Tone\r\nHDR\r\n800 nits\r\n\r\nPROCESADOR\r\n\r\nApple A15 Bionic\r\nGPU cuatro núcleos\r\nNeural Engine\r\n\r\nMEMORIA RAM\r\n\r\n4 GB\r\n\r\nALMACENAMIENTO INTERNO\r\n\r\n128/256/512 GB\r\n\r\nCÁMARA TRASERA\r\n\r\n12 MP f/1.6, OIS\r\nGran angular: 12 MP f/2.4, 120º FOV\r\nVídeo: 4K Dolby Vision\r\n\r\nCÁMARA DELANTERA\r\n\r\n12 MP f/2.2\r\n\r\nBATERÍA\r\n\r\n3.227 mAh\r\nCarga rápida 20W\r\nCarga inalámbrica 7,5W\r\nCarga MagSafe 15W\r\n\r\nSISTEMA OPERATIVO\r\n\r\niOS 15\r\n\r\nCONECTIVIDAD\r\n\r\n5G (sub-6 GHz)\r\nLTE Gigabit MIMO 4x4\r\n\r\nWiFi 6 MIMO 2x2\r\nBluetooth 5.0\r\nChip UWB\r\nNFC\r\nGPS, GLONASS, Galileo, QZSS, BeiDou\r\nNanoSIM y eSIM\r\n\r\nOTROS\r\n\r\nResistencia IP68\r\nFaceID\r\nAltavoces estéreo\r\nDolby Atmos', '1686667449_iphone13.jpg', '1686667449_iphone13 2.jpg', 'iphone ios electronica apple', 'mobile'),
(17, 1, 2, 'samsung galaxy s21 ultra', 859, 'PANTALLA\r\n\r\nDynamic AMOLED 2X de 6,2\"\r\nRatio 20:9\r\nFHD+ a 2.400 x 1.080\r\nRefresco a 120Hz\r\nGorilla Glass Victus\r\nHDR10+\r\n\r\nPROCESADOR\r\n\r\nExynos 2100 a 2,9GHz\r\nGPU Mali G78 MP14\r\n\r\nVERSIONES\r\n\r\n8GB/128GB\r\n8GB/256GB\r\nLPDDR5\r\nUFS 3.1\r\n\r\nCÁMARAS TRASERAS\r\n\r\nPrincipal: 12 megapíxeles f/1.8\r\nAngular: 12 megapíxeles f/2.2\r\nZoom: 64 megapíxeles f/2.0 1.1X\r\n\r\nCÁMARA FRONTAL\r\n\r\n10 megapíxeles f/2.2\r\n\r\nBATERÍA\r\n\r\n4.000 mAh\r\nCarga rápida de 25W\r\nCarga inalámbrica de 15W\r\nCarga inalámbrica inversa de 4.5W\r\n\r\nSISTEMA\r\n\r\nAndroid 11\r\nOne UI 3.0\r\n\r\nCONECTIVIDAD\r\n\r\nDual 5G\r\nWiFi 6E\r\nBluetooth 5.0\r\nGPS\r\nNFC\r\nUSB tipo C 3.2\r\n\r\nDIMENSIONES Y PESO\r\n\r\n151,7 x 71,2 x 7,9 milímetros\r\n171 gramos\r\n\r\nOTROS\r\n\r\nLector de huellas en pantalla\r\nSamsung DeX\r\nSonido ANT+\r\nIP68', '1686667763_samsung s21 u.jpg', '1686667763_samsung s21 u2.jpg', 'samsung androi electronica movil', 'mobile'),
(18, 1, 1, 'ipad Air (2022)', 880, 'PANTALLA\r\n\r\n10,9 pulgadas\r\n2.360 x 1.640 píxeles (264 ppp)\r\nTrue Tone, 500 nits\r\nGama cromática amplia (P3)\r\n\r\nPROCESADOR\r\n\r\nApple A14 Bionic\r\n\r\nRAM\r\n\r\nN.d.\r\n\r\nALMACENAMIENTO\r\n\r\n64 / 256 GB\r\n\r\nCÁMARA TRASERA\r\n\r\n12 MP f/1.8\r\n\r\nCÁMARA FRONTAL\r\n\r\n7 MP f/2.2\r\n\r\nBATERÍA\r\n\r\n28,6 Wh\r\nHasta 10 horas\r\n\r\nSISTEMA OPERATIVO\r\n\r\niPadOS 14\r\n\r\nCONECTIVIDAD\r\n\r\nWi-Fi 6\r\nWi-Fi 6 + LTE\r\nBluetooth 5.0\r\n\r\nDIMENSIONES Y PESO\r\n\r\n24,76x17,85x0,61 cm\r\n458 gramos\r\nOTROS\r\n\r\nUSB-C, Touch ID en el lateral', '1686668112_ipad air.jpg', '1686668112_ipad air2.jpg', 'ipad ios electronica apple', 'tablet'),
(19, 1, 1, 'Airpods Max', 629, 'ARQUITECTURA	Auriculares circumaurales cerrados con transductor electrodinámico\r\nRECINTO	Aluminio anodizado\r\nALMOHADILLAS	Espuma viscoelástica\r\nMOTOR MAGNÉTICO	Imán de neodimio\r\nMICROPROCESADOR	Dos chips H1 con 10 núcleos cada uno\r\nCANCELACIÓN DEL RUIDO	Sí (activa)\r\nMICRÓFONOS	Ocho micrófonos para la cancelación activa de ruido\r\nTres micrófonos para capturar la voz (dos compartidos con la cancelación activa de ruido y uno adicional)\r\nCONECTIVIDAD	Bluetooth 5.0\r\nSENSORES	Óptico (2), posición (2), funda (2), acelerómetro (2) y giroscopio\r\nCARACTERÍSTICAS ADICIONALES	Modo de sonido de ambiente, ecualización adaptativa y sonido espacial con seguimiento dinámico de la cabeza\r\nAUTONOMÍA	Hasta 20 horas de reproducción de audio, vídeo y conversación\r\nCONECTIVIDAD	Lightning\r\nCOLORES	Gris espacial, plata, verde, azul cielo y rosa\r\nDIMENSIONES	16,86 x 8,34 x 18,73 cm\r\nPESO	384,8 g (auriculares) / 134,5 g (funda Smart Case)', '1686668276_airpods max.jpg', '1686668276_airpods max2.jpg', 'airpods ios electronica apple', 'accesories'),
(20, 1, 1, 'Beats Studio Buds', 150, 'DIMENSIONES Y PESO\r\n\r\nAuriculares: 15 x 20,5 x 18,5 mm - 5 gramos\r\nEstuche: 25,5 x 72 x 51 mm - 50 gramos\r\n\r\nUNIDAD DE DIAFRAGMA\r\n\r\n8,2 mm\r\n\r\nCONEXIÓN\r\n\r\nBluetooth clase 1\r\n\r\nCOMPATIBILIDAD\r\n\r\niOS, Android\r\n\r\nBATERÍA\r\n\r\nN/D Carga rápida\r\n\r\nAUTONOMÍA\r\n\r\nAuriculares: hasta 5 horas con ANC\r\nEstuche: hasta 15 horas con ANC\r\n\r\nCARGA DEL ESTUCHE\r\n\r\nUSB tipo C\r\n\r\nEXTRAS\r\n\r\nCancelación de ruido activa\r\nGoogle Fast Pair\r\nControl gestual\r\nCompatible con asistentes virtuales\r\nResistencia IPX4', '1686668573_beats studio buds.jpg', '1686668573_beats studio buds2.jpg', 'airpods ios electronica apple', 'accesories'),
(21, 1, 2, 'Samsung Galaxy Note 20', 959, 'PANTALLA\r\n\r\nSuper AMOLED Plus 6,7” (plana)\r\n2.400 x 1.080 px FullHD+\r\n393 ppp, 60 Hz, 20:9\r\n\r\nPROCESADOR\r\n\r\nExynos 990\r\n\r\n\r\nRAM\r\n\r\n8 GB RAM\r\n\r\n\r\nRAM Y ALMACENAMIENTO\r\n\r\n256 GB\r\n\r\n\r\nCÁMARA FRONTAL\r\n\r\n10 MP (1/3,24”, 1,22 µm), AF, f/2.2\r\n\r\n\r\nCÁMARAS TRASERAS\r\n\r\nTriple cámara:\r\nPrincipal: 12 MP (1/1,76”, 1,8 µm), f/1.8, OIS\r\nGran angular: 12 MP (1/2,55”, 1,4 µm), f/2.2\r\nTelefoto: 64 MP (1/1,72” 0,8 µm), f/2.0, OIS\r\n\r\n\r\nCONECTIVIDAD\r\n\r\n5G (NSA y SA), Sub6 / mmWave\r\nWi-Fi 802.11 a/b/g/n/ac/ax 2.4G+5GHz, HE80, MIMO, 1024-QAM\r\nBluetooth 5.0, ANT+, NFC\r\nGPS, Galileo, Glonass, BeiDou\r\n\r\nBATERÍA\r\n\r\n4.300 mAh 25W\r\nCarga inalámbrica 15 W\r\n\r\n\r\nBIOMETRÍA\r\n\r\nLector de huellas dactilares ultrasónico y procesador de seguridad\r\n\r\n\r\n\r\nSOFTWARE\r\n\r\nAndroid 10 + One UI\r\n\r\nDIMENSIONES Y PESO\r\n\r\n75,2 x 161,6 x 8,3 mm\r\n192 g (4G) / 194 g (5G)\r\n\r\nAltavoces estéreo con decodificación Dolby Atmos, IP68, S Pen', '1686668942_samsung note 20.jpg', NULL, 'samsung note android electronica movil', 'movil'),
(22, 1, 2, 'Samsung Galaxy A52', 450, 'DIMENSIONES Y PESO\r\n\r\n159,9 x 75,1 x 8,4 mm\r\n189 g\r\n\r\nPANTALLA\r\n\r\nSuper AMOLED 6,5\"\r\nFullHD+ (1.080 x 2.400 px)\r\n407 ppp, 120 Hz\r\n\r\nPROCESADOR\r\n\r\nSnapdragon 750G 5G\r\n\r\nRAM\r\n\r\n6/8 GB\r\n\r\nALMACENAMIENTO\r\n\r\n128/256 GB (microSD hasta 1 TB)\r\n\r\nCÁMARAS TRASERAS\r\n\r\nPrincipal: AF OIS de 64 MP (f/1.8, 0,8 ?m)\r\nGA: 12 MP FF (f/2.2, 1,12 µm)\r\nMacro: 5 MP FF (f/2.4, 1,12 µm)\r\nProfundidad: 5 MP AF (f/2.4)\r\n\r\nCÁMARA FRONTAL\r\n\r\n32 MP FF (f/2.2, 0,8 µm)\r\n\r\nBATERÍA\r\n\r\n4.500 mAh + carga rápida 25 W\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 11 + One UI\r\n\r\nCONECTIVIDAD\r\n\r\n5G, Wi-Fi 802.11 a/b/g/n/ac (2.4G+5GHz)\r\nBluetooth 5.0, NFC\r\nGPS, Glonass, BeiDou, Galileo\r\n\r\nOTROS\r\n\r\nLector de huellas en pantalla, IP67, dual SIM, Dolby Atmos, Altavoces estéreo AKG', '1686669051_samsung note 20.jpg', '1686669051_samsung note 20 2.jpg', 'samsung A52 android electronica movil', 'mobile'),
(23, 1, 2, 'Samsung Galaxy Z Fold 3.', 1809, 'PANTALLA INTERIOR\r\n\r\nDynamic AMOLED 2X de 7,6 pulgadas Infinity Flex Display QXGA+ (2208 x 1768 puntos), 120 Hz, 374 ppp y soporte para S Pen\r\n\r\nPANTALLA EXTERIOR\r\n\r\nDynamic AMOLED 2X de 6,2 pulgadas (2268 x 832 puntos), 120 Hz y 387 ppp\r\n\r\nPROCESADOR\r\n\r\nSnapdragon 888 5G con 8 núcleos, 64 bits y litografía de 5 nm (2,84 GHz + 2,4 GHz + 1,8 GHz)\r\n\r\nMEMORIA PRINCIPAL\r\n\r\n12 GB\r\n\r\nALMACENAMIENTO\r\n\r\n256 o 512 GB UFS 3.1\r\n\r\nCÁMARA FRONTAL\r\n\r\n10 megapíxeles, f/2.2, FOV 80º y fotodiodos de 1,22 µm\r\n\r\nCÁMARA INTERIOR\r\n\r\n4 megapíxeles, f/1.8, FOV 80º y fotodiodos de 2 µm\r\n\r\nCÁMARAS TRASERAS\r\n\r\n- Principal: 12 megapíxeles, f/1.8, fotodiodos de 1,8 µm, Dual Pixel AF, FOV 83º y estabilización óptica\r\n\r\n- Ultra gran angular: 12 megapíxeles, f/2.2, FOV 123º y fotodiodos de 1,12 µm\r\n\r\n- Teleobjetivo: 12 megapíxeles, f/2.4, PDAF, fotodiodos de 1 µm, Dual OIS, FOV 45º y 2x zoom\r\n\r\nCONECTIVIDAD INALÁMBRICA\r\n\r\n5G NSA y SA, Sub6 / mmWave\r\n\r\nLTE Enhanced 4X4 MIMO\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 11\r\n\r\nSIM\r\n\r\n2 x nano-SIM y 1 x eSIM\r\n\r\nSONIDO\r\n\r\nAltavoces estéreo\r\n\r\nDolby Atmos\r\n\r\nBATERÍA\r\n\r\n4.400 mAh\r\n\r\nIDENTIFICACIÓN BIOMÉTRICA\r\n\r\nSensor de huellas lateral\r\nReconocimiento facial\r\nIPX8\r\n\r\nDIMENSIONES\r\n\r\n67,1 x 158,2 x 16 mm (plegado)\r\n\r\n128,1 x 158,2 x 6,4 mm (desplegado)\r\n\r\nPESO\r\n\r\n271 g\r\n\r\nCOLORES\r\n\r\nPhantom Black, Phantom Green y Phantom Silver', '1686669201_fold3.jpg', '1686669201_fold3 2.jpg', 'samsung Galaxy Fold android electronica movil', 'mobile'),
(24, 1, 2, 'Samsung Galaxy Tab S7', 499, 'La Samsung Galaxy Tab S7 es una tableta con pantalla LTPS IPS LCD de 11 pulgadas con resolución 1.600 x 2.560 píxeles, compatibilidad con HDR10+ y alta tasa de refresco a 120Hz para una buena experiencia consumiendo contenido multimedia, navegando por Internet o jugando. En el apartado del sonido encontramos cuatro altavoces firmados por AKG con Dolby Atmos para un audio \"de película\".\r\n\r\nIncorpora el potente procesador Snapdragon 865+ con 6 GB de memoria RAM y 128 GB de almacenamiento interno (ampliable por microSDXC) para mover con soltura el sistema operativo Android con la capa de personalización One UI, un desarrollo de Samsung para sacar el máximo provecho del S Pen, el stylus de la compañía para tomar notas o dibujar con precisión.\r\n\r\nDispone de doble cámara trasera de 13 + 5 MP y una frontal de 8 MP para videollamadas. Se puede conectar a redes Wi-Fi 6 y su batería de 8.000 mAh es compatible con carga rápida a 45W.', '1686669331_tabs s7.jpg', '1686669331_tabs s7 2.jpg', 'Samsung Galaxy Tab S7 android movil electronica tablet', 'tablet'),
(25, 1, 2, 'Samsung Galaxy Tab A7', 289, 'PANTALLA\r\n\r\nTFT de 10,4 pulgadas\r\nFullHD+ a 2.000 x 1.200\r\nRatio 5:3\r\n\r\nPROCESADOR\r\n\r\nOcho núcleos a 2GHz\r\n\r\nVERSIONES\r\n\r\n3GB/32GB\r\n3GB/64GB\r\nMicroSD hasta 1TB\r\n\r\nCÁMARAS FRONTALES\r\n\r\n5 megapíxeles\r\n\r\nCÁMARAS TRASERAS\r\n\r\n8 megapíxeles\r\n\r\nBATERÍA\r\n\r\n7.040 mAh\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 10\r\nOneUI\r\n\r\nCONECTIVIDAD\r\n\r\n4G/WiFi 5\r\nBluetooth 5.0\r\nConector de auriculares\r\nUSB tipo C\r\n\r\nDIMENSIONES Y PESO\r\n\r\n247,6 x 157,4 x 7.0 milímetros\r\n476 gramos\r\n\r\nOTROS\r\n\r\nDolby Atmos\r\nCuatro altavoces', '1686669432_a7.jpg', '1686669432_a7 2.jpg', 'Samsung Galaxy Tab A7 tablet electronica android ', 'tablet'),
(26, 1, 2, 'Samsung Galaxy Buds Pro', 239, 'DIMENSIONES Y PESO\r\n\r\nAuricular: 19,5 x 20,5 x 20,8 mm -. 6,3 gramos\r\nEstuche: 50 x 50,2 x 27,8 mm - 44,9 gramos\r\n\r\nALTAVOZ\r\n\r\nWoofer 11 mm\r\nTweeter 6,5 mm\r\n\r\nCONEXIÓN\r\n\r\nBluetooth 5.0\r\nScalable, AAC, SBC\r\n\r\nCOMPATIBILIDAD\r\n\r\nAndroid 7.0 o superior\r\n\r\nBATERÍA\r\n\r\nAuriculares: 61 mAh\r\nEstuche: 472 mAh\r\n\r\nAUTONOMÍA\r\n\r\nAuriculares: hasta 5 horas con ANC\r\nEstuche: hasta 20 horas con ANC\r\n\r\nCARGA DEL ESTUCHE\r\n\r\nUSB tipo C\r\nCarga inalámbrica\r\n\r\nEXTRAS\r\n\r\nCancelación de ruido activa\r\nAmbient Sound\r\nDetección de voz automática\r\nAuto Switch\r\n3 x micrófonos\r\nIPX7 hasta 30 minutos', '1686669537_buds.jpg', '1686669537_buds2.jpg', 'Samsung Galaxy Buds Pro accesorio electronica', 'accesories'),
(27, 1, 2, 'Samsung Galaxy Watch 4', 269, 'DIMENSIONES Y PESO\r\n\r\n44mm: 44,4 x 43,3 x 9,8 mm - 30,3 gramos\r\n\r\n40 mm: 40,4 x 39,3 x 9,8 mm - 25.9 gramos\r\nPANTALLA\r\n\r\nSuperAMOLED\r\n\r\nGorilla Glass DX\r\n\r\n44mm:\r\n\r\n1, 36 pulgadas\r\n\r\nResolución 450 x 450 píxeles\r\n\r\n330 PPI\r\n\r\n40mm:\r\n\r\n1,19 pulgadas\r\n\r\nResolución 396 x 396 píxeles\r\n\r\n330 PPI\r\nPROCESADOR\r\n\r\nSamsung Exynos W920 5 nm\r\nMEMORIA RAM\r\n\r\n1,5 GB\r\nALMACENAMIENTO INTERNO\r\n\r\n16 GB\r\nBATERÍA\r\n\r\n44mm: 361 mAh\r\n\r\n40mm: 247 mAh\r\nSISTEMA OPERATIVO\r\n\r\nWearOS con One UI Watch\r\nCONECTIVIDAD\r\n\r\nWiFi 2,4+5 GHz\r\n\r\nBluetooth 5.0\r\n\r\nNFC\r\n\r\nGPS\r\n\r\n4G (opcional)\r\nRESISTENCIA AL AGUA\r\n\r\n5 ATM\r\n\r\nIP68\r\n\r\nMIL-STD-810G\r\nBOTONES\r\n\r\n?	\r\nSí, dos\r\nSENSORES\r\n\r\nBioActive Sensor (PPG)\r\n\r\nElectrocardiograma (ECG)\r\n\r\nSensor de análisis de impedancia bioeléctrica (BIA)\r\n\r\nSPo2\r\n\r\nAcelerómetro\r\n\r\nBarómetro\r\n\r\nGiroscopio\r\n\r\nGeomagnético\r\n\r\nLuz ambiente\r\nEXTRAS\r\n\r\n100 modos deportivos\r\n\r\nDetección de ronquidos\r\n\r\nControl gestual\r\n\r\nAuto Switch', '1686669768_watch4.jpg', '1686669768_watch4 2.jpg', 'Samsung Galaxy Watch 4 reloj accesorios', 'accesories'),
(28, 1, 2, 'Samsung Galaxy Fit2', 34, 'DIMENSIONES Y PESO\r\n\r\n46,6 x 18,6 x 11,1 mm\r\n21 gramos (sin correa)\r\n\r\nPANTALLA\r\n\r\nAMOLED de 1,1 pulgadas\r\nCristal curvado 3D\r\nResolución 126 x 294 píxeles\r\n\r\nMATERIAL\r\n\r\nPlástico\r\nColores negro y escarlata\r\n\r\nMEMORIA\r\n\r\n2+32 MB\r\n\r\nBATERÍA\r\n\r\n159 mAh\r\n\r\nSENSORES\r\n\r\nRitmo cardíaco\r\nAcelerómetro\r\nGiroscopio\r\n\r\nRESISTENCIA AL AGUA\r\n\r\n5 ATM\r\nIP68\r\n\r\nCONECTIVIDAD\r\n\r\nBluetooth 5.0\r\nWiFi ac\r\n\r\nCOMPATIBILIDAD\r\n\r\nAndroid 5.0 o superior\r\niOS 10.0 o superior', '1686669862_fit2.jpg', '1686669862_fit2 2.jpg', ' Samsung Galaxy Fit2 accesorios reloj', 'accesories'),
(29, 1, 2, 'Apple Watch Series 8', 550, 'CAJA\r\n\r\n41 o 45 mm\r\n\r\nDIMENSIONES Y PESO\r\n\r\n41 x 35 x 10,7 mm (41 mm), 32 gramos\r\n\r\n45 x 38 x 10,7 mm (45 mm), 38,8 gramos\r\n\r\nPANTALLA\r\n\r\nRetina LTPO OLED\r\n\r\n41mm: 1,6 pulgadas, 352 x 430 píxeles\r\n\r\n45 mm: 1,8 pulgadas, 396 x 484 píxeles\r\n\r\nHasta 1.000 nits de brillo\r\n\r\nPantalla siempre activa\r\n\r\nPROCESADOR\r\n\r\nApple S8 (doble núcleo de 64 bits)\r\n\r\nChip W3 inalámbrico\r\n\r\nChip U1 (banda ultraancha)\r\n\r\nALMACENAMIENTO\r\n\r\n32 GB\r\n\r\nCONECTIVIDAD\r\n\r\nWi-Fi (802.11b/g/n 2.4 GHz)\r\n\r\nBluetooth 5.3\r\n\r\nSENSORES\r\n\r\nSpO2\r\nRitmo cardiaco, ECG\r\nAcelerómetro (fuerzas de hasta 256g con detección de caídas y accidentes)\r\nGiroscopio de alto rango dinámico\r\nAltímetro\r\nGPS/GNSS\r\nBrújula\r\nSensor de luz ambiental\r\n\r\nVO2max\r\n\r\nDetección de accidentes\r\n\r\nSensor de temperatura\r\n\r\nRESISTENCIA AL AGUA\r\n\r\n50 metros\r\n\r\nBATERÍA\r\n\r\nHasta 18 horas de autonomía.\r\n\r\nHasta 36 horas de autonomía en modo de bajo consumo.\r\n\r\nCarga rápida\r\n\r\nOTROS\r\n\r\nFunción de llamada de emergencia\r\n\r\nUWB\r\n\r\nResistente al polvo IP6X', '1686670081_watch.jpg', '1686670081_watch2.jpg', 'apple watch series 8 ios apple reloj', 'accesories'),
(30, 1, 6, 'Sony Xperia Z4 Tablet', 549, 'DIMENSIONES FÍSICAS	254 x 167 x 1,1 mm, 392 gramos\r\nPANTALLA	IPS LCD 10,1 pulgadas\r\nRESOLUCIÓN	2.560 x 1.600 píxeles (299 ppp)\r\nPROCESADOR	Snapdragon 810 MSM8994\r\nCPU: 4 cores 64 bits a 2 GHz\r\nGPU: Adreno 430\r\nRAM	3 GB\r\nMEMORIA	32 GB\r\nAmpliable con tarjetas MicroSD de hasta 128 GB)\r\nVERSIÓN SOFTWARE	Android 5.0.2\r\nCONECTIVIDAD	LTE, NFC, Bluetooth 4.1, Wi?Fi ac, GPS\r\nCERTIFICACIONES	IP65 e IP68 (agua y polvo)\r\nCÁMARAS	Principal de 8,1 MPx Flash LED // Frontal 5,1 MPx\r\nBATERÍA	6.000 mAh (no accesible)', '1686670261_z4.jpg', '1686670261_z4 2.jpg', 'Sony Xperia Z4 Tablet android ', 'tablet'),
(31, 1, 6, 'Sony Xperia 1 III', 1299, 'DIMENSIONES Y PESO\r\n\r\n165 x 71 x 8,2 milímetros\r\n186 gramos\r\n\r\nPANTALLA\r\n\r\nOLED de 6,5 pulgadas\r\n21:9, 120 Hz\r\nResolución 4K, HDR\r\n\r\nPROCESADOR\r\n\r\nSnapdragon 888\r\n\r\nMEMORIA RAM\r\n\r\n12 GB\r\n\r\nALMACENAMIENTO INTERNO\r\n\r\n256/512 GB\r\n\r\nCÁMARAS TRASERAS\r\n\r\nGran angular de 12 MP f/2.6, 16 mm, Dual PD\r\nPrincipal de 12 MP f/1.7, 24 mm, Dual PD OIS\r\nTelefoto de 12 MP f/2.3, 70/105 mm, Dual PD OIS\r\nSensor iToF\r\n\r\nCÁMARA DELANTERA\r\n\r\n8 MP, f/2.0\r\n\r\nBATERÍA\r\n\r\n4.500 mAh\r\n30 vatios\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 11\r\n\r\nCONECTIVIDAD\r\n\r\nWiFi IEEE802.11a/b/g/n(2,4 GHz)/n(5 GHz)/ac/ax\r\nA-GPS, A-GLONASS, Beidou, Galileo, QZSS\r\nBluetooth 5.2\r\n5G\r\n\r\nOTROS\r\n\r\nIP65/68, sonido estéreo 360 Reality Audio, jack 3,5 mm, altavoces estéreo, lector de huellas lateral, botón cámara', '1686672643_xperia11.jpg', '1686672643_xperia11 2.jpg', 'movil sony electromica android xperia', 'mobile'),
(32, 1, 2, 'Sony Xperia Z2 Tablet', 485, 'PANTALLA	TFT IPS de 10,1 pulgadas\r\nRESOLUCIÓN	1920 x 1200 píxeles, 224ppp\r\nPROCESADOR	Qualcomm 801 de cuatro núcleos a 2,3 GHz\r\nPROCESADOR GRÁFICO	Adreno 330\r\nRAM	3 GB RAM\r\nMEMORIA	16 GB. Permite microSD hasta 64 GB\r\nVERSIÓN S.O.	Android 4.4.2\r\nCONECTIVIDAD	GPS + GLONASS, WiFi (802.11 a/b/g/n/ac), BT4.0; en la versión analizada también LTE\r\nCÁMARAS	Trasera: 8 MP Exmor RS/ Frontal: 2 MP\r\nDIMENSIONES	172 x 266 x 6,4 mm\r\nPESO	439 gramos la versión analizada con LTE\r\nPRECIO OFICIAL DE SALIDA	A partir de 489 euros la versión con 16 gigas sólo Wifi. En En', '1686672862_z2 1.jpg', '1686672862_z2 2.jpg', 'Sony Xperia Z2 Tablet android electonica', 'tablet'),
(33, 1, 6, 'Sony WH-1000XM4', 379, 'ACOPLAMIENTO\r\n\r\nCircumaural cerrado\r\n\r\nDIAFRAGMA\r\n\r\nLCP revestido de aluminio de 40 mm, de tipo cúpula (bobina de CCAW)\r\n\r\nIMÁN\r\n\r\nNeodimio\r\n\r\nCONECTIVIDAD\r\n\r\nBluetooth 5.0, NFC, multiconexión (hasta 2 dispositivos)\r\n\r\nCANCELACIÓN DE RUIDO\r\n\r\nSony Noise Cancelling Processor QN1\r\n\r\nRESPUESTA EN FRECUENCIA\r\n\r\n4 Hz a 40 kHz\r\n20 Hz a 40 kHz (BT)\r\n\r\nPROCESADO\r\n\r\nHi-Res Audio, DSEE Extreme, Edge AI\r\n\r\nPERFIL DE SONIDO\r\n\r\nA2DP, AVRCP, HFP y HSP\r\nSBC, AAC y LDAC\r\n\r\nBATERÍA\r\n\r\nHasta 30 horas teóricas\r\nCarga a través de USB tipo C\r\n\r\nPESO\r\n\r\n254 g', '1686673016_wh 1.jpg', '1686673016_wh.jpg', 'Sony WH-1000XM4 ', 'accesories'),
(34, 1, 6, 'WF-1000XM4', 279, 'DIMENSIONES Y PESO\r\n\r\nN/D\r\n\r\nUNIDAD DE DIAFRAGMA\r\n\r\n6 mm\r\n\r\nSONIDO\r\n\r\nSoporte LDAC\r\nHi-Res Audio\r\nDSEE Extreme\r\nDAC + ASP 24 bit\r\n\r\nCONEXIÓN\r\n\r\nBluetooth 5.2\r\n\r\nCOMPATIBILIDAD\r\n\r\niOS, Android\r\n\r\nBATERÍA\r\n\r\nN/D\r\n\r\nAUTONOMÍA\r\n\r\nAuriculares: hasta 8 horas con ANC\r\nEstuche: hasta 24 horas\r\n\r\nCARGA DEL ESTUCHE\r\n\r\nUSB tipo C\r\nCarga inalámbrica Qi\r\n\r\nEXTRAS\r\n\r\nCancelación de ruido activa\r\nSpeak to chat\r\nDetección de posición\r\nCarga rápida\r\nResistencia IPX4\r\n3 x micrófonos\r\nControl gestual\r\nGoogle Fast Pair\r\nSonido adaptivo', '1686673359_wf 1.jpg', '1686673359_wf 2.jpg', 'WF-1000XM4 acceorios sony ariculares', 'accesories'),
(35, 1, 3, 'OnePlus Buds Pro', 149, 'AURICULARES\r\n\r\nTransductores dinámicos de 11mm\r\n\r\nCANCELACIÓN DE RUIDO\r\n\r\nActiva (hasta 40 dB)\r\nTres micrófonos\r\n\r\nCALIBRACIÓN\r\n\r\nOnePlus Audio ID\r\nDolby Atmos\r\n\r\nBATERÍA\r\n\r\nHasta 38 horas (estuche de carga)\r\nHasta 28 horas (cancelación de ruido)\r\nHasta 10 horas (carga 10 minutos)\r\n\r\nCARGA\r\n\r\nCarga rápida Warp Charge\r\nCarga inalámbrica Qi\r\n\r\nCONECTIVIDAD\r\n\r\nBluetooth 5.2', '1686674594_buds.jpg', '1686674594_buds 2.jpg', 'OnePlus Buds Pro accesorios oneplus auriculares', 'accesories'),
(36, 1, 5, 'Xiaomi Mi Pad 5', 369, 'PANTALLA\r\n\r\nLCD IPS de 11 pulgadas con resolución WQHD+ (2560 x 1600 puntos), refresco de 120 Hz, relación de contraste de 1500:1, relación de aspecto 16:10 y compatibilidad con contenidos Dolby Vision\r\n\r\nPROCESADOR\r\n\r\nQualcomm Snapdragon 860 con 8 núcleos y fotolitografía de 7 nm\r\n\r\nGRÁFICOS\r\n\r\nAdreno 640\r\n\r\nMEMORIA PRINCIPAL\r\n\r\n6 GB\r\n\r\nALMACENAMIENTO\r\n\r\n128 o 256 GB UFS 3.1\r\n\r\nCÁMARA FRONTAL\r\n\r\nSensor de 8 megapíxeles y óptica con valor de apertura f/2.0\r\n\r\nGrabación de vídeo a 1080p y 30 FPS\r\n\r\nCÁMARA TRASERA\r\n\r\nSensor de 13 megapíxeles y óptica con valor de apertura f/2.0\r\n\r\nGrabación de vídeo hasta 4K a 30 FPS\r\n\r\nACCESORIOS\r\n\r\nLápiz digital Xiaomi Smart Pen. No está incluido en el paquete y cuesta 99,99 euros\r\n\r\nSONIDO\r\n\r\nAudio estereofónico\r\n\r\nCuatro altavoces de 16 x 20 mm\r\n\r\nProcesado Dolby Atmos\r\n\r\nHi-Res Audio\r\n\r\nSISTEMA OPERATIVO\r\n\r\nMIUI 12.5 para Xiaomi Pad basado en Android 11\r\n\r\nCONECTIVIDAD\r\n\r\nUSB-C\r\n\r\nCONECTIVIDAD INALÁMBRICA\r\n\r\nWi-Fi 802.11ac\r\n\r\nBluetooth 5.0\r\n\r\nSENSORES\r\n\r\nGiroscopio, acelerómetro, sensor de proximidad y brújula digital\r\n\r\nBATERÍA\r\n\r\n8720 mAh\r\n\r\nCargador de 22,5 vatios incluido en el paquete (la tablet puede cargar con una potencia máxima de 33 vatios)\r\n\r\nDIMENSIONES\r\n\r\n254,7 x 166,3 x 6,9 mm\r\n\r\nPESO\r\n\r\n511 g\r\n\r\nCOLORES\r\n\r\nGris cósmico y blanco perla', '1686674774_pad5 2.jpg', '1686674774_pad5 1.jpg', 'Xiaomi Mi Pad 5 tablet electronica android', 'tablet'),
(37, 1, 5, ' Xiaomi Mi Pad 4.', 1100, 'PANTALLA\r\n\r\n8 pulgadas\r\nFormato 16:10\r\n1.920 x 1.200 píxeles\r\n\r\nPROCESADOR\r\n\r\nSnapdragon 660\r\n\r\nMEMORIA\r\n\r\n3 / 4 GB LPDDR4X\r\n\r\nALMACENAMIENTO\r\n\r\n32 / 64 GB (ampliables vía microSD)\r\n\r\nCÁMARAS\r\n\r\nTrasera: 13 MP f/2.0\r\nFrontal: 5 MP f/2.2\r\n\r\nBATERÍA\r\n\r\n6.000 mAh\r\n\r\nSOFTWARE\r\n\r\nAndroid 8.1 Oreo\r\nMIUI 10 (vía actualización)\r\n\r\nDIMENSIONES Y PESO\r\n\r\n200,2 x 120,3 x 7,9 mm\r\n345 g\r\n\r\nOTROS\r\n\r\nUSB tipo C, conector auriculares, WiFi 802.11a/b/g/n/ac, conectividad 4G/LTE, Bluetooth 5.0', '1686674928_pad 4 2.jpg', '1686674928_pad 4 1.jpg', ' Xiaomi Mi Pad 4 tablet android electronica', 'tablet'),
(38, 1, 3, 'OnePlus Pad', 499, 'DIMENSIONES Y PESO\r\n\r\n258,03 x 189,41 x 6,54 mm\r\n\r\n6,54mm de grosor\r\n\r\nPANTALLA\r\n\r\nLCD 11.61 pulgadas\r\n\r\n144 Hz\r\n\r\nRelación de aspecto 7:5\r\n\r\nDolby Vision\r\n\r\n2,5D\r\n\r\nResolución 2800x2000\r\n\r\n500 nits\r\n\r\nPROCESADOR\r\n\r\nMediaTek Dimensity 9000\r\n\r\nMEMORIAS\r\n\r\n8/12 GB de RAM\r\n\r\nBATERÍA\r\n\r\n9.510mAh\r\n\r\n67W\r\n\r\nSOFTWARE\r\n\r\nOxygenOS 13.1 basado en Android 13\r\n\r\nCONECTIVIDAD\r\n\r\nWiFi 6\r\n\r\nBluetooth 5.3\r\n\r\nUSB-C\r\n\r\nOTROS\r\n\r\nSonido Dolby Atmos\r\n\r\nCompatible con teclado con trackpad (se vende aparte)\r\n\r\nCompatible con Stylus (se vende aparte', '1686675159_onepluspad 1.jpg', '1686675159_onepluspad 2.jpg', 'OnePlus Pad tablet electronica android', 'tablet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `star` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `response` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `review`
--

INSERT INTO `review` (`id`, `user_id`, `product_id`, `review`, `star`, `date`, `response`) VALUES
(1, 1, 12, 'review 1', 0, NULL, 'wefwefkdwnoeihfe9 eifhe9fh9efhrfbrhf87hgr'),
(2, 1, 12, 'review 2', 0, NULL, 'oaxnunuwehfuwehfu9he'),
(3, 0, 12, 'reseña 3', 0, NULL, ''),
(4, 0, 12, '', 0, NULL, ''),
(5, 0, 12, '', 0, NULL, ''),
(7, 1, 15, '', 0, NULL, ''),
(8, 1, 15, '', 0, NULL, ''),
(9, 1, 11, 'reseña2e1', 0, NULL, ''),
(10, 1, 11, 'as', 1, NULL, ''),
(11, 1, 1, 'muy buen movil lo recomiendo mucho', 3, '2023-06-08', ''),
(12, 1, 1, 'Muy Malo', 1, '2023-06-08', 'siento mucho su mala experiencia'),
(13, 1, 1, 'MEjorable', 2, '2023-06-08', ''),
(14, 1, 1, 'Muy Bueno', 4, '2023-06-08', ''),
(15, 1, 1, 'Increible', 5, '2023-06-08', ''),
(16, 1, 12, 'nwsjwkqns', 3, '2023-06-09', ''),
(17, 1, 12, 'm,bkjbjkb', 5, '2023-06-09', ''),
(18, 1, 12, 'mnbjk', 3, '2023-06-09', ''),
(19, 1, 12, 'fewgfewgew', 5, '2023-06-09', ''),
(20, 1, 12, 'feqfgqeg', 5, '2023-06-09', ''),
(21, 1, 10, 'ohfeoipfh 9', 5, '2023-06-09', ''),
(22, 1, 1, 'jdineiufbnew', 1, '0000-00-00', ''),
(23, 1, 1, 'sacwcewdvre', 1, '2023-06-09', ''),
(24, 1, 1, 'sxwsce', 1, '2023-06-09', ''),
(25, 1, 2, 'dncewuhcew', 1, '2023-06-09', 'dc9uwhdnciunduc'),
(26, 1, 15, 'kcxioewhcuiwebve', 1, '2023-06-09', 'dcnwu9dncue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `user_image` text NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `city`, `zip`, `state`, `user_image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '000', 'ES', '', 'Madrid', '28001', 'Comunidad De Madrid', 'admins.jpg'),
(2, 'Yassin', 'Aalili', 'yassin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '698707829', 'C/ Castilla La Vieja', '', 'Fuenlabrada', '28941', 'Comunidad De Madrid', 'venom.png'),
(4, 'Usuario', 'Generico', 'usuario@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456789', 'Addres', 'City', '', '', '', 'user.png'),
(9, 'otro', 'usuario', 'otro@gmail.com', 'a1da106dfc67e74b885d8ae72de62d41ce5278cc', '1234567890', 'Address', 'Ciudad', '', '', '', ''),
(16, 'admin2', 'admin', 'admin2@gmail.com', '9dbf7c1488382487931d10235fc84a74bff5d2f4', '', '', '', '', '', '', 'user.png'),
(17, 'Aitor', '', 'aitor@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '', '', '', 'user.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indices de la tabla `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
