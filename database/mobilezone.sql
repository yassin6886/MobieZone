-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 17:37:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(60, 0, '127.0.0.1', 1, 12),
(61, 0, '127.0.0.1', 13, 41),
(63, 0, '127.0.0.1', 4, 1),
(99, 2, '127.0.0.1', 13, 7),
(100, 2, '127.0.0.1', 1, 4),
(101, 1, '127.0.0.1', 13, 1),
(102, 6, '127.0.0.1', 13, 2),
(109, 12, '127.0.0.1', 13, 4),
(110, 11, '127.0.0.1', 13, 3),
(114, 2, '127.0.0.1', 14, 2),
(115, 12, '127.0.0.1', 14, 1),
(120, 11, '127.0.0.1', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contact_us`
--

INSERT INTO `contact_us` (`email_id`, `user_id`, `name`, `email`, `phone_number`, `message`) VALUES
(1, '', '', 'admin@gmail.com', '', ''),
(6, '2', 'Yassin', 'yassin@gmail.com', '698707829', 'prueba de insercion de datos desde el formulario contactanos'),
(7, '4', 'Usuario', 'usuario@gmail.com', '781627316', 'prueba de insercion de datos desde el formulario contactanos'),
(8, '4', 'Usuario', 'usuario@gmail.com', '673512854', 'Problemas con la compra de productos'),
(9, '4', 'Usuario', 'usuario@gmail.com', '785162783', 'pedir devolucion de producto'),
(10, '4', 'Usuario', 'usuario@gmail.com', '689543094', 'devolucion de productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `order_code`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `status`, `order_date`) VALUES
(1, 'MZ6476fe749a0f1', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'calle', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 4, 4579, 456, 'Preparando', '2023-05-26'),
(2, 'MZ6476fe749a110', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 7, 6177, 456, 'Preparando', '2023-05-29'),
(3, 'MZ6476fe749a119', 2, 'Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1899, 456, 'Preparando', '2023-05-30'),
(4, 'MZ6476fe749a121', 2, ' Yassin Aalili', 'yassin@gmail.com', 'C/ castilla la vieja', 'Fuenlabrada', 'Madrid', 123456, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 220, 456, 'Preparando', '2023-05-30'),
(5, 'MZ6476fe749a129', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 950, 456, 'Preparando', '2023-05-31'),
(6, 'MZ64772f2cef66b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1880, 456, 'Preparando', '2023-05-31'),
(7, 'MZ647730527d4ca', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 1850, 456, 'Preparando', '2023-05-31'),
(8, 'MZ647731611083b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 2, 3199, 456, 'Preparando', '2023-05-31'),
(9, 'MZ647738c2746cc', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Preparando', '2023-05-31'),
(10, 'MZ6477396c3ea82', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1500, 456, 'Preparando', '2023-05-31'),
(11, 'MZ647739ab38b65', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Preparando', '2023-05-31'),
(12, 'MZ64773bea0f96b', 2, 'Yassin', 'yassin@gmail.com', 'C/ Castilla La Vieja', 'Fuenlabrada', 'Comunidad De Madrid', 28941, 'yassin aalili', '0987 6543 2108 7654', '11/27', 1, 1799, 456, 'Preparando', '2023-05-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(91, 1, 5, 3, 1140),
(92, 1, 8, 1, 1000),
(93, 1, 10, 1, 1400),
(94, 1, 6, 2, 3598),
(95, 2, 1, 2, 1900),
(96, 2, 3, 2, 1858),
(97, 2, 4, 2, 1998),
(98, 2, 5, 1, 380),
(99, 2, 11, 3, 5397),
(100, 2, 12, 4, 880),
(101, 2, 2, 4, 3600),
(102, 3, 2, 1, 900),
(103, 3, 4, 1, 999),
(104, 4, 12, 1, 220),
(105, 5, 1, 1, 950),
(106, 6, 5, 1, 380),
(107, 6, 7, 1, 1500),
(108, 7, 2, 1, 900),
(109, 7, 1, 1, 950),
(110, 8, 10, 1, 1400),
(111, 8, 11, 1, 1799),
(112, 9, 11, 1, 1799),
(113, 10, 7, 1, 1500),
(114, 11, 6, 1, 1799),
(115, 12, 6, 1, 1799);

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
  `product_keywords` text NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `subcategory`) VALUES
(1, 1, 1, 'Iphone 12', 950, 'PANTALLA  OLED Retina 2.532 x 1.170 píxeles, Super Retina XDR, 19.5:9 460ppp True-tone  PROCESADOR  Apple A14 Bionic, 5nm NPU Neural Engine de 4ª gen  VERSIONES  64 / 128 / 256 GB  DIMENSIONES Y PESO  146,7 mm x 71,5 mm x 7,4mm 162g  SOFTWARE  iOS 14  CÁMARAS TRASERAS  Principal: 12MP, f/1.6, OIS, QuadLED flash Secundaria gran angular: 12MP, f/2.4 Vídeo: 4K Dolby Vision, 1080p/240fps, HDR  CÁMARA FRONTAL  12MP, f/2.2, TOF 3D, slow-motion  BATERÍA  Carga rápida 18W e inalámbrica MagSafe 15W  OTROS  WiFi 6, 5G, BT 5.0, NFC, GPS, dualSIM, eSIM, altavoces estéreo Dolby Atmos, reconocimiento facial, resistencia al agua IP68  PRECIO  Desde 909 euros', '1682688519_iphone12.jpg', 'Iphone mobile electronics', 'mobile'),
(2, 1, 3, 'oneplus 10 pro', 900, 'ANTALLA   6,7 pulgadas AMOLED Tasa de refresco: 120 Hz Tecnología LTPO  PROCESADOR  Snapdragon 8 Gen 1  RAM  12 GB LPDDR5  ALMACENAMIENTO  256 GB UFS 3.1  CÁMARA FRONTAL  32 MP  CÁMARA TRASERA  Principal: 48 MP Gran angular: 50 MP Teleobjetivo: 8 MP  BATERÍA  5.000 mAh Carga rápida 80 W Carga inalámbrica 50 W  SISTEMA OPERATIVO  OxygenOS 12 basado en Android 12  CONECTIVIDAD  5G Wi-Fi Bluetooth5.2 NFC USB-C  OTROS  Lector de huellas en pantalla Altavoces duales estéreo  DIMENSIONES Y PESO  116,3 x 73,9 x 8,55 mm Peso: 200,5 gramos  PRECIO', '1682688759_oneplus10pro.jpg', 'oneplus mobile electronics', 'mobile'),
(3, 1, 2, 'Samsung galaxy s23', 929, 'PANTALLA  Panel Dynamic AMOLED 2X de 6,1 pulgadas  Refresco de 48 a 120 Hz  Resolución FHD+ de 2.340 x 1.080 píxeles  Brillo pico de 1.750 nits  Always-on Display  DIMENSIONES Y PESO  146,3 x 70,9 x 7,6 mm  168 gramos  PROCESADOR  Snapdragon 8 Gen 2 for Samsung  RAM  8 GB LPDDR5X  ALMACENAMIENTO  128 GB UFS 3.1  256 o 512 GB UFS 4.0  CÁMARA FRONTAL  12 Mpx f/2.2  CÁMARA TRASERA  Principal de 50 Mpx f/1.8 OIS  Telefoto de 10 Mpx f/2.4 OIS 3x  Gran angular de 12 Mpx f/2.2  BATERÍA  3.900 mAh  Carga de 25 W (cargador no incluido)  Carga inalámbrica de 15 W  Carga inalámbrica inversa de 4,5 W  SISTEMA OPERATIVO  Android 13 + One UI 5.1  CONECTIVIDAD  5G  Wi-Fi 6E  Bluetooth 5.3  NFC  OTROS  Sensor de huella ultrasónico en pantalla  Certificación IP68  Pantalla Gorilla Glass Victus 2  Sonido Dolby Atmos estéreo', '1682704521_samsung_galaxy_s23.jpg', 'samsung mobile electronics', 'mobile'),
(4, 1, 4, 'OPPO', 999, 'DIMENSIONES Y PESO  163,7 mm x 73,9 mm x 8,6 mm 226g  PANTALLA  6,7 pulgadas 120 Hz adaptativos Resolución Quad HD+ AMOLED de tipo LTPO Gorilla Glass Victus  PROCESADOR  Qualcomm Snapdragon 8 Gen 1  MEMORIAS  12 + 256 GB (UFS 3.1 / DDR5)  CÁMARA TRASERA  50 MP 50 MP UGA 13 MP teleobjetivo 2X (5X híbrido)  CÁMARA DELANTERA  32 MP  SOFTWARE  Android 12 ColorOS 12.1  BATERÍA  5.000mAh Carga rápida de 80W 50W AirVooc  CONECTIVIDAD  Dual 5G WiFi 6 NFC GLONASS QZSS', '1682704719_oppo_find_x5_pro.jpg', 'oppo mobile electronics', 'mobile'),
(5, 1, 5, 'XiIAOMI 12 PRO', 380, 'Pantalla  AMOLED LTPO de 6,73 pulgadas  2K a 3.300 x 1.440 píxeles  Refresco de 1 a 120Hz  Corning Gorilla Glass Victus  Procesador  Snapdragon 8 Gen 1  Memoria RAM  12 GB LPDDR5  Almacenamiento  256 GB UFS 3.1  Cámaras traseras  Principal: 50 megapíxeles Sony IMX707  Gran angular: 50 megapíxeles con f/1,9  Teleobjetivo: 50 megapíxeles  Cámara frontal  32 megapíxeles  Batería  4.600 mAh  Carga rápida de 120 W  Carga rápida inalámbrica de 50 W  Carga inalámbrica inversa de 10 W  Sistema operativo  Android 12 con MIUI 13  Conectividad  WiFi 6 Bluetooth 5.2  GPS  NFC  USB tipo C  Dimensiones  163,6 x 74,6 x 8,16 mm (en cuero el grosor es de 8,88 mm)  Peso  204 gramos (205 gramos en cuero)  Otros  Lector de huellas bajo la pantalla  Altavoces estéreo Harman Kardon', '1682705171_Xiaomi-12pro.jpg', 'Xiaomi mobile electronics', 'mobile'),
(6, 1, 6, 'Sony Xperia PRO-I', 1799, 'PANTALLA  166 x 72 x 8.9 mm 221 g  PROCESADOR  Qualcomm Snapdragon 888  MEMORIA INTERNA  512 GB ampliables mediante tarjetas microSD  MEMORIA RAM  12 GB  BATERÍA  4.500mAh 30W  CÁMARA TRASERA  12 MP, f/2.0-4-0, 24mm 12 MP, f/2.4, 50mm, telefoto 2X 12 MP, f/2.2, 16mm, UGA 0.3 MP, TOF 3D  CÁMARA DELANTERA  8 MP  CONECTIVIDAD  5G SA/NSA WiFi 6 Bluetooth 5.2 USB C  SOFTWARE  Android 11', '1682705526_sony_xperia_pro-I.jpg', 'Sony mobile electronics', 'mobile'),
(7, 1, 1, 'Iphone 14 pro max', 1500, 'DIMENSIONES Y PESO  160,7 x 77,6 x 7,85 mm 240g  PANTALLA  Super Retina XDR 6,7 pulgadas True Tone, HDR ProMotion 120 Hz 2.778 x 1.284 px, 458 ppp 2.000 nits, contraste 2.000.000:1 Pantalla siempre activa Isla dinámica  PROCESADOR  Apple A16 Bionic  RAM  6 GB LPDDR5X  ALMACENAMIENTO  128/256/512 GB/1 TB  CÁMARAS TRASERAS  Principal:48MP, f/1.78, 24mm, Sensor Shift de segunda generación Ultra angular: 12MP, f/2.2, 13mm Teleobjetivo: 12MP, f/2.8, 77mm, OIS CÁMARA FRONTAL  12MP, f1.9, enfoque automático  SISTEMA OPERATIVO  iOS 16  CONECTIVIDAD  5G (sub-6 GHz) LTE Gigabit con MIMO 4x4 y LAA Wifi 802.11ax (6.ª gen.) con MIMO 2x2 Bluetooth 5.3 Chip de banda ultraancha NFC  BATERÍA  4.323 mAh Carga rápida 20W Carga inalámbrica 15W  OTROS  IP68 Sonido estéreo FaceID', '1682705642_iphone14ProMax.jpg', 'Iphone mobile electronics', 'mobile'),
(8, 1, 3, 'oneplus 11 pro', 1000, 'DIMENSIONES Y PESO  168,1mm x 74,1 x 8,53mm 205 gramos de peso  PANTALLA  AMOLED LTPO de 6,7 pulgadas Resolución QHD+ 1- 120 Hz de tasa de refresco Brillo pico de 1.300 nits  PROCESADOR  Qualcomm Snapdragon 8 Gen 2  RAM  8/16 GB LPDDR5X  ALMACENAMIENTO  128/256 GB UFS4.0  CÁMARA DELANTERA  16 Mpx  CÁMARAS TRASERAS  Principal: 50 MP Gran angular: 48 MP Teleobjetivo: 32 MP, zoom 2x  BATERÍA  5.000 mAh Carga rápida de hasta 100 W  SOFTWARE  OxygenOS 13 basado en Android 13  CONECTIVIDAD  5G WiFi 6e Bluetooth 5.3 GPS NFC USB-C  OTROS  Sensor de huellas en pantalla Certificación IP68 frente al agua y al polvo Alert Slider', '1682705756_oneplus11pro.jpg', 'oneplus mobile electronics', 'mobile'),
(9, 1, 2, 'Samsung galaxy s22 Ultra', 1300, 'PANTALLA  AMOLED de 6,8 pulgadas Resolución QHD+ a 3.080 x 1.440 Refresco adaptativo de 1 a 120Hz Refresco táctil de 240Hz en Modo Juego Brillo de 1.750 nits Contraste de 3.000.000:1 100% DCI-P3 Panel perforado Gorilla Glass Victus  PROCESADOR  Exynos 2200 a 2,8GHz GPU AMD  VERSIONES  8GB/128GB 12GB/256GB 12GB/512GB 12GB/1TB  CÁMARAS TRASERAS  Principal: 108 megapíxeles f/1.8 OIS Angular: 12 megapíxeles f/.22 120º 13mm Zoom: 10 megapíxeles f/2.4 OIS 3X 69mm Zoom: 10 megapíxeles f/4.9 OIS 10X 230mm  CÁMARA FRONTAL  40 megapíxeles f/2.2 25mm  BATERÍA  5.000 mAh Carga rápida de 45W Carga inalámbrica de 15W  SISTEMA  Android 12 One UI 4.1  CONECTIVIDAD  5G (2xNano + eSIM) WiFi 6E Bluetooth 5.2 GPS NFC UWB USB tipo C 3.2  DIMENSIONES Y PESO  163,3 x 77,9 x 8,9 milímetros 227 gramos  OTROS  IP68 Compatible con Samsung DeX S-Pen con 2,8ms de latencia', '1682705904_samsung_galaxy_s22Ultra.jpg', 'samsung mobile electronics', 'mobile'),
(10, 1, 5, 'XiIAOMI 13 PRO', 1400, 'PANTALLA  OLED 6,73\" 3200 x 1440 120 Hz 240 Hz respuesta táctil  DIMENSIONES Y PESO  162,8 x 74,6 x 8,38 mm 229 g.  PROCESADOR  Snapdragon 8 Gen 2  RAM  12 GB  ALMACENAMIENTO  256 GB  CÁMARA FRONTAL  32 MP  CÁMARA TRASERA  50 MP f/1.9 50 MP f/2.0 tele 50 MP f/2.2 UGA  BATERÍA  4820 mAh Carga rápida 120W Carga inalámbrica 50W Carga inalámbrica inversa 10W  SISTEMA OPERATIVO  MIUI 14  CONECTIVIDAD  5G Wi-Fi 6E Bluetooth 5.3 NFC IR-Blaster  OTROS  Lector de huellas en la pantalla Altavoces estéreo Dolby Atmos IP68', '1682706014_Xiaomi-13pro.jpg', 'Xiaomi mobile electronics', 'mobile'),
(11, 1, 2, 'Galaxy Tab S8 Ultra 5G', 1799, 'DIMENSIONES Y PESO\r\n\r\n326,4 x 208,6 x 5,5 mm\r\n726 g (Wi-Fi)\r\n\r\nPANTALLA\r\n\r\n14,6\" SuperAMOLED\r\n2.960 x 1.848 px\r\n120 Hz\r\nGorilla Glass 5\r\n\r\nPROCESADOR\r\n\r\nQualcomm Snapdragon 8 Gen 1\r\n\r\nRAM\r\n\r\n8 / 12 / 16 GB\r\n\r\nMEMORIA INTERNA\r\n\r\n128 / 256 / 512 GB + microSD\r\n\r\nBATERÍA\r\n\r\n11.200 mAh\r\nCarga rápida hasta 45W\r\n\r\nCÁMARAS\r\n\r\nTrasera: 13 MP + 6 MP gran angular\r\nFrontal: 12 MP + 12 MP gran angular\r\n\r\nSISTEMA OPERATIVO\r\n\r\nAndroid 12.0\r\nOne UI 4 Tab\r\n\r\nAUDIO\r\n\r\nCuatro altavoces estéreo, Dolby Atmos, AKG, tres micrófonos\r\n\r\nCONECTIVIDAD\r\n\r\n5G, LTE, Wi-Fi 6E, BT 5.2\r\n\r\nOTRO\r\n\r\nUSB tipo C, lector de huellas bajo pantalla, compatible con S Pen, Samsung Knox', 'Galaxy Tab S8 Ultra 5G.jpg', 'samsung tablet electronics', 'tablet'),
(12, 1, 1, 'Airpods 3', 220, 'DIMENSIONES Y PESO\r\n\r\n30,8 x 18,3 mm\r\n4,28 g\r\n\r\nDIMENSIONES Y PESO DE LA BASE DE CARGA\r\n\r\n46,4 x 54,4 x 21,4 mm\r\n37,9 g\r\n\r\nBATERÍA\r\n\r\nHasta 6 horas (con una sola carga)\r\nHasta 30 horas de reproducción (con la base de carga)\r\n\r\nRESISTENCIA\r\n\r\nIPX4\r\n\r\nCHIP\r\n\r\nH1 para auriculares\r\n\r\nTECNOLOGÍA\r\n\r\nEcualización adaptativa, soporte audio espacial con seguimiento de la cabeza y Dolby Atmos, códec AAC-ELD, Bluetooth 5.0\r\n\r\nSENSORES\r\n\r\nDos micrófonos, sensor de piel, sensor de presión, acelerómetro con detección de movimiento y voz', 'airpods3.jpg', 'airpods accesories electronics', 'accesories');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `city`, `zip`, `state`, `user_image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '000', 'ES', 'MX', '', '', '', 'admin.png'),
(2, 'Yassin', 'Aalili', 'yassin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '698707829', 'C/ Castilla La Vieja', '', 'Fuenlabrada', '28941', 'Comunidad De Madrid', 'venom.png'),
(4, 'Usuario', 'Generico', 'usuario@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123456789', 'Addres', 'City', '', '', '', 'user.png'),
(7, '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', '', '', 'user.png'),
(8, 'Firs', 'Last', 'first@gmail.com', 'contraseña', '1234567890', 'Addres', 'City', '', '', '', ''),
(9, 'otro', 'usuario', 'otro@gmail.com', 'a1da106dfc67e74b885d8ae72de62d41ce5278cc', '1234567890', 'Address', 'Ciudad', '', '', '', '');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

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
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
