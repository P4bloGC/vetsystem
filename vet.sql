-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2022 a las 18:04:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_categoria_articulos` int(11) DEFAULT NULL,
  `id_proveedores` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `id_unidad_medidas` int(11) DEFAULT NULL,
  `cantidad_unidad` float DEFAULT NULL,
  `precio1` float DEFAULT 0,
  `precio2` float DEFAULT 0,
  `precio3` float DEFAULT 0,
  `precio4` float DEFAULT 0,
  `cantidad_minima` float DEFAULT NULL,
  `codigo_barras` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `vencimiento` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `control_stock` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `id_categoria_articulos`, `id_proveedores`, `cantidad`, `id_unidad_medidas`, `cantidad_unidad`, `precio1`, `precio2`, `precio3`, `precio4`, `cantidad_minima`, `codigo_barras`, `fecha_vencimiento`, `vencimiento`, `activo`, `control_stock`) VALUES
(1, 'VACUNA ANTIRÁBICA', 1, 1, 19, 1, 1, 5000, 0, 0, 0, 20, NULL, '2022-05-31', NULL, 'Si', 'Si'),
(2, 'TRONCAL GATOS', 2, 1, 20, 1, 1, 3000, 0, 0, 0, 10, NULL, NULL, NULL, 'Si', 'Si'),
(3, 'SINCELAR 1 ML', 3, 1, 24, 1, 0, 10000, 0, 0, 0, NULL, NULL, NULL, NULL, 'Si', 'Si'),
(4, 'PELUQUERÍA CANINA', 4, NULL, 999, 1, 0, 15000, 0, 0, 0, 1, NULL, NULL, NULL, 'Si', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_articulos`
--

CREATE TABLE `categoria_articulos` (
  `id` int(11) NOT NULL,
  `categoria_articulo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_articulos`
--

INSERT INTO `categoria_articulos` (`id`, `categoria_articulo`, `activo`) VALUES
(1, 'VACUNAS', 'Si'),
(2, 'ANTIPARASITARIOS', 'Si'),
(3, 'ANTICONCEPTIVOS', 'Si'),
(4, 'SERVICIOS', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `id_mascotas` int(11) DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha_completa` datetime DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `id_clientes`, `id_mascotas`, `id_cms_users`, `id_articulos`, `fecha`, `hora`, `fecha_completa`, `descripcion`) VALUES
(1, 1, NULL, 1, 4, '2022-03-24', '14:00:00', '2022-03-24 14:00:00', NULL),
(2, 1, NULL, 1, 4, '2022-03-24', '10:00:00', '2022-03-24 10:00:00', 'Perro Labrador'),
(3, 1, NULL, 1, 4, '2022-03-24', '10:30:00', '2022-03-24 10:30:00', 'prueba'),
(4, 1, NULL, 1, 4, '2022-03-01', '10:00:00', '2022-03-01 10:00:00', 'Perro grande con mucho pelaje'),
(5, 1, NULL, 1, 4, '2022-03-29', '11:00:00', '2022-03-29 11:00:00', 'qweqweqweqw'),
(7, 1, 1, 1, 4, '2022-03-30', '08:00:00', '2022-03-30 08:00:00', 'ddasdasdasdasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `dni` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_principal` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_secundario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_completo`, `email`, `direccion`, `telefono_principal`, `telefono_secundario`, `observaciones`) VALUES
(1, '16767726-6', 'Pablo', 'González', 'Cid', 'Pablo González Cid ', 'cliente1@gmail.com', 'Calle 1', '+56912345678', '0', 'prueba1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responses` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2022-02-18 04:33:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', 'http://localhost/vet/public/admin/login', 'admin@crudbooster.com login with IP Address ::1', '', 1, '2022-02-18 04:35:01', NULL),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', 'http://localhost/vet/public/admin/especies/add-save', 'Añadir nueva información  en Especies', '', 1, '2022-02-18 04:51:10', NULL),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', 'http://localhost/vet/public/admin/especies/add-save', 'Añadir nueva información  en Especies', '', 1, '2022-02-18 04:51:19', NULL),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', 'http://localhost/vet/public/admin/especies/edit-save/1', 'Actualizar información  en Especies', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>especie</td><td>Perro</td><td>PERRO</td></tr></tbody></table>', 1, '2022-02-18 04:51:32', NULL),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', 'http://localhost/vet/public/admin/razas/add-save', 'Añadir nueva información  en Razas', '', 1, '2022-02-18 07:58:17', NULL),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-02-18 18:02:47', NULL),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/clientes/add-save', 'Añadir nueva información  en Clientes', '', 1, '2022-02-18 20:46:20', NULL),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/users/edit-save/1', 'Actualizar información Super Admin en Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2022-02/avatar.png</td></tr><tr><td>password</td><td>$2y$10$MUr2c6vvNm5cIepqDqjiYuNMyFbRXDnyomLgcpOqixPh8zgU9bZlS</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2022-02-18 21:39:11', NULL),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/logout', 'admin@crudbooster.com se desconectó', '', 1, '2022-02-18 21:39:36', NULL),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-02-18 21:39:52', NULL),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/mascotas/add-save', 'Añadir nueva información  en mascotas', '', 1, '2022-02-18 22:33:06', NULL),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/mascotas/edit-save/1', 'Actualizar información  en mascotas', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>id_clientes</td><td></td><td>1</td></tr></tbody></table>', 1, '2022-02-18 22:35:01', NULL),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/especies/edit-save/2', 'Actualizar información  en Especies', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>avatar</td><td></td><td>uploads/1/2022-02/avatar_gato.png</td></tr></tbody></table>', 1, '2022-02-18 22:49:36', NULL),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/logout', 'admin@crudbooster.com se desconectó', '', 1, '2022-02-18 22:56:22', NULL),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-02-18 22:56:27', NULL),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/especies/edit-save/1', 'Actualizar información  en Especies', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2022-02-18 23:04:07', NULL),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/especies/edit-save/1', 'Actualizar información  en Especies', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>avatar</td><td></td><td>uploads/1/2022-02/avatar_perro.png</td></tr></tbody></table>', 1, '2022-02-18 23:09:24', NULL),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/categoria_articulos/add-save', 'Añadir nueva información  en Categorías Artículos', '', 1, '2022-02-19 04:49:48', NULL),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/unidad_medidas/add-save', 'Añadir nueva información  en Unidad de Medidas', '', 1, '2022-02-19 05:39:26', NULL),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/unidad_medidas/add-save', 'Añadir nueva información  en Unidad de Medidas', '', 1, '2022-02-19 05:39:37', NULL),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.55', 'http://localhost/vet/public/admin/unidad_medidas/add-save', 'Añadir nueva información  en Unidad de Medidas', '', 1, '2022-02-19 05:39:42', NULL),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-08 21:46:28', NULL),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/mascotas/edit-save/1', 'Actualizar información  en mascotas', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>activo</td><td></td><td>Si</td></tr></tbody></table>', 1, '2022-03-08 21:52:43', NULL),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/menu_management/edit-save/4', 'Actualizar información Mascotas en Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>name</td><td>mascotas</td><td>Mascotas</td></tr><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2022-03-08 22:02:02', NULL),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>observaciones</td><td></td><td>prueba</td></tr></tbody></table>', 1, '2022-03-08 23:51:10', NULL),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>observaciones</td><td>prueba</td><td>prueba2</td></tr></tbody></table>', 1, '2022-03-09 00:03:59', NULL),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>observaciones</td><td>prueba2</td><td></td></tr></tbody></table>', 1, '2022-03-09 00:04:08', NULL),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>observaciones</td><td>prueba2</td><td>prueba</td></tr></tbody></table>', 1, '2022-03-09 00:04:21', NULL),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>observaciones</td><td>prueba</td><td>prueba1</td></tr></tbody></table>', 1, '2022-03-09 00:04:27', NULL),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>direccion</td><td>Conjunto Nonguén 662</td><td>Conjunto Nonguén, Pasaje 1, 662</td></tr></tbody></table>', 1, '2022-03-09 00:05:52', NULL),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/add-save', 'Añadir nueva información  en Artículos/Servicios', '', 1, '2022-03-09 00:57:09', NULL),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/1', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>precio1</td><td>255</td><td>5000</td></tr><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr></tbody></table>', 1, '2022-03-09 00:58:31', NULL),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/1', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr><tr><td>activo</td><td></td><td>Si</td></tr></tbody></table>', 1, '2022-03-09 01:02:53', NULL),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/categoria_articulos/add-save', 'Añadir nueva información  en Categorías Artículos', '', 1, '2022-03-09 03:16:31', NULL),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/add-save', 'Añadir nueva información  en Artículos/Servicios', '', 1, '2022-03-09 03:39:42', NULL),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/2', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre</td><td>TROCAL GATOS</td><td>TRONCAL GATOS</td></tr><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>fecha_vencimiento</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr></tbody></table>', 1, '2022-03-09 03:40:19', NULL),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/categoria_articulos/add-save', 'Añadir nueva información  en Categorías Artículos', '', 1, '2022-03-09 04:29:02', NULL),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.30', 'http://localhost/vet/public/admin/articulos-servicios/add-save', 'Añadir nueva información  en Artículos/Servicios', '', 1, '2022-03-09 04:30:32', NULL),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-09 17:16:13', NULL),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_movimientos/add-save', 'Añadir nueva información  en Tipo de Movimientos', '', 1, '2022-03-09 17:33:02', NULL),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_movimientos/add-save', 'Añadir nueva información  en Tipo de Movimientos', '', 1, '2022-03-09 17:33:11', NULL),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_movimientos/add-save', 'Añadir nueva información  en Tipo de Movimientos', '', 1, '2022-03-09 17:33:31', NULL),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_documento_tributario/add-save', 'Añadir nueva información  en Tipo de Documento Tributario', '', 1, '2022-03-09 17:39:18', NULL),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_documento_tributario/add-save', 'Añadir nueva información  en Tipo de Documento Tributario', '', 1, '2022-03-09 17:39:27', NULL),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_documento_tributario/add-save', 'Añadir nueva información  en Tipo de Documento Tributario', '', 1, '2022-03-09 17:39:51', NULL),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_documento_tributario/add-save', 'Añadir nueva información  en Tipo de Documento Tributario', '', 1, '2022-03-09 17:40:29', NULL),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/tipo_documento_tributario/add-save', 'Añadir nueva información  en Tipo de Documento Tributario', '', 1, '2022-03-09 17:40:48', NULL),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/kardex/add-save', 'Añadir nueva información  en Kardex', '', 1, '2022-03-09 18:19:50', NULL),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/kardex/add-save', 'Añadir nueva información  en Kardex', '', 1, '2022-03-09 18:27:51', NULL),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/proveedores/add-save', 'Añadir nueva información  en Proveedores', '', 1, '2022-03-09 18:55:16', NULL),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 02:30:32', NULL),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/delete/1', 'Eliminar información 1 en Ventas', '', 1, '2022-03-10 02:32:31', NULL),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 02:35:00', NULL),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 03:05:11', NULL),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/kardex/delete/3', 'Eliminar información 3 en Kardex', '', 1, '2022-03-10 03:09:04', NULL),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/kardex/delete/4', 'Eliminar información 4 en Kardex', '', 1, '2022-03-10 03:09:10', NULL),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/kardex/delete/5', 'Eliminar información 5 en Kardex', '', 1, '2022-03-10 03:09:12', NULL),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 03:09:38', NULL),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/categoria_articulos/add-save', 'Añadir nueva información  en Categorías Artículos', '', 1, '2022-03-10 03:24:07', NULL),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/articulos-servicios/add-save', 'Añadir nueva información  en Artículos/Servicios', '', 1, '2022-03-10 03:25:30', NULL),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-10 17:59:09', NULL),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 21:25:30', NULL),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/delete/5', 'Eliminar información 5 en Ventas', '', 1, '2022-03-10 21:27:20', NULL),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.36', 'http://localhost/vet/public/admin/ventas/add-save', 'Añadir nueva información  en Ventas', '', 1, '2022-03-10 21:31:35', NULL),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-16 17:23:05', NULL),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/compras/add-save', 'Añadir nueva información  en Compras', '', 1, '2022-03-16 17:24:06', NULL),
(67, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/menu_management/add-save', 'Añadir nueva información Maestros en Menu Management', '', 1, '2022-03-16 18:14:39', NULL),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/clientes/edit-save/1', 'Actualizar información  en Clientes', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>nombre_completo</td><td>Pablo González Cid </td><td></td></tr><tr><td>email</td><td>pablo.gc662@gmail.com</td><td>cliente1@gmail.com</td></tr><tr><td>direccion</td><td>Conjunto Nonguén, Pasaje 1, 662</td><td>Calle 1</td></tr><tr><td>telefono_principal</td><td>+56979889817</td><td>+56912345678</td></tr></tbody></table>', 1, '2022-03-16 18:37:14', NULL),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/especies/add-save', 'Añadir nueva información  en Especies', '', 1, '2022-03-17 03:42:26', NULL),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 Edg/99.0.1150.39', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-18 06:22:48', NULL),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-23 16:59:40', NULL),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/menu_management/edit-save/10', 'Actualizar información Kardex en Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2022-03-23 20:28:35', NULL),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/menu_management/edit-save/2', 'Actualizar información Razas en Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>14</td><td></td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2022-03-23 20:28:54', NULL),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/menu_management/add-save', 'Añadir nueva información Citas en Menu Management', '', 1, '2022-03-24 03:08:25', NULL),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-24 22:23:49', NULL),
(76, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-25 18:23:05', NULL),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-29 17:50:30', NULL),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-03-30 17:48:49', NULL),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.55', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-04-01 18:56:00', NULL),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.55', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/1', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>cantidad_minima</td><td>10</td><td>20</td></tr><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr></tbody></table>', 1, '2022-04-01 19:23:43', NULL),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-04-07 03:45:15', NULL),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/logout', ' se desconectó', '', NULL, '2022-04-08 00:13:49', NULL),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-04-08 00:13:55', NULL),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/1', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>cantidad</td><td>19</td><td>0</td></tr><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr></tbody></table>', 1, '2022-04-08 00:22:34', NULL),
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/articulos-servicios/edit-save/1', 'Actualizar información  en Artículos/Servicios', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>codigo_barras</td><td></td><td></td></tr><tr><td>vencimiento</td><td></td><td></td></tr></tbody></table>', 1, '2022-04-08 00:22:45', NULL),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36 Edg/100.0.1185.29', 'http://localhost/vet/public/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP ::1', '', 1, '2022-04-08 18:55:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_dashboard` tinyint(1) NOT NULL DEFAULT 0,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Especies', 'Route', 'AdminEspeciesControllerGetIndex', NULL, 'fa fa-tag', 14, 1, 0, 1, 6, '2022-02-18 04:48:55', NULL),
(2, 'Razas', 'Route', 'AdminRazasControllerGetIndex', 'normal', 'fa fa-tags', 14, 0, 0, 1, 4, '2022-02-18 07:50:08', '2022-03-23 20:28:54'),
(3, 'Clientes', 'Route', 'AdminClientesControllerGetIndex', NULL, 'fa fa-users', 0, 1, 0, 1, 3, '2022-02-18 18:13:44', NULL),
(4, 'Mascotas', 'Route', 'AdminMascotasControllerGetIndex', 'normal', 'fa fa-github', 0, 1, 0, 1, 4, '2022-02-18 22:25:22', '2022-03-08 22:02:02'),
(5, 'Categorías Artículos', 'Route', 'AdminCategoriaArticulosControllerGetIndex', NULL, 'fa fa-tags', 14, 1, 0, 1, 3, '2022-02-19 04:48:25', NULL),
(6, 'Unidad de Medidas', 'Route', 'AdminUnidadMedidasControllerGetIndex', NULL, 'fa fa-tags', 14, 1, 0, 1, 1, '2022-02-19 05:38:36', NULL),
(7, 'Artículos/Servicios', 'Route', 'AdminArticulosServiciosControllerGetIndex', NULL, 'fa fa-shopping-cart', 0, 1, 0, 1, 5, '2022-03-09 00:48:51', NULL),
(8, 'Tipo de Movimientos', 'Route', 'AdminTipoMovimientosControllerGetIndex', NULL, 'fa fa-tags', 14, 1, 0, 1, 2, '2022-03-09 17:31:59', NULL),
(9, 'Tipo de Documento Tributario', 'Route', 'AdminTipoDocumentoTributarioControllerGetIndex', NULL, 'fa fa-paper-plane', 14, 1, 0, 1, 5, '2022-03-09 17:38:28', NULL),
(10, 'Kardex', 'Route', 'AdminKardexControllerGetIndex', 'normal', 'fa fa-arrows-h', 0, 0, 0, 1, 6, '2022-03-09 17:46:27', '2022-03-23 20:28:35'),
(11, 'Proveedores', 'Route', 'AdminProveedoresControllerGetIndex', NULL, 'fa fa-building-o', 0, 1, 0, 1, 7, '2022-03-09 18:51:33', NULL),
(12, 'Ventas', 'Route', 'AdminVentasControllerGetIndex', NULL, 'fa fa-money', 0, 1, 0, 1, 1, '2022-03-09 19:42:06', NULL),
(13, 'Compras', 'Route', 'AdminComprasControllerGetIndex', NULL, 'fa fa-money', 0, 1, 0, 1, 2, '2022-03-10 20:12:48', NULL),
(14, 'Maestros', 'URL', '/', 'normal', 'fa fa-database', 0, 1, 0, 1, 8, '2022-03-16 18:14:39', NULL),
(15, 'Citas', 'Route', 'citas', 'normal', 'fa fa-calendar', 0, 1, 0, 1, NULL, '2022-03-24 03:08:25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(3, 3, 1),
(5, 5, 1),
(6, 6, 1),
(7, 4, 1),
(8, 7, 1),
(9, 8, 1),
(10, 9, 1),
(12, 11, 1),
(13, 12, 1),
(14, 13, 1),
(15, 14, 1),
(16, 10, 1),
(17, 2, 1),
(18, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2022-02-18 04:33:52', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2022-02-18 04:33:52', NULL, NULL),
(12, 'Especies', 'fa fa-tag', 'especies', 'especies', 'AdminEspeciesController', 0, 0, '2022-02-18 04:48:55', NULL, NULL),
(13, 'Razas', 'fa fa-tags', 'razas', 'razas', 'AdminRazasController', 0, 0, '2022-02-18 07:50:07', NULL, NULL),
(14, 'Clientes', 'fa fa-users', 'clientes', 'clientes', 'AdminClientesController', 0, 0, '2022-02-18 18:13:44', NULL, NULL),
(15, 'mascotas', 'fa fa-github', 'mascotas', 'mascotas', 'AdminMascotasController', 0, 0, '2022-02-18 22:25:22', NULL, NULL),
(16, 'Categorías Artículos', 'fa fa-tags', 'categoria_articulos', 'categoria_articulos', 'AdminCategoriaArticulosController', 0, 0, '2022-02-19 04:48:25', NULL, NULL),
(17, 'Unidad de Medidas', 'fa fa-tags', 'unidad_medidas', 'unidad_medidas', 'AdminUnidadMedidasController', 0, 0, '2022-02-19 05:38:36', NULL, NULL),
(18, 'Artículos/Servicios', 'fa fa-shopping-cart', 'articulos-servicios', 'articulos', 'AdminArticulosServiciosController', 0, 0, '2022-03-09 00:48:51', NULL, NULL),
(19, 'Tipo de Movimientos', 'fa fa-tags', 'tipo_movimientos', 'tipo_movimientos', 'AdminTipoMovimientosController', 0, 0, '2022-03-09 17:31:59', NULL, NULL),
(20, 'Tipo de Documento Tributario', 'fa fa-paper-plane', 'tipo_documento_tributario', 'tipo_documento_tributario', 'AdminTipoDocumentoTributarioController', 0, 0, '2022-03-09 17:38:28', NULL, NULL),
(21, 'Kardex', 'fa fa-arrows-h', 'kardex', 'movimiento_articulos', 'AdminKardexController', 0, 0, '2022-03-09 17:46:26', NULL, NULL),
(22, 'Proveedores', 'fa fa-building-o', 'proveedores', 'proveedores', 'AdminProveedoresController', 0, 0, '2022-03-09 18:51:33', NULL, NULL),
(23, 'Ventas', 'fa fa-money', 'ventas', 'ventas', 'AdminVentasController', 0, 0, '2022-03-09 19:42:05', NULL, NULL),
(24, 'Compras', 'fa fa-money', 'compras', 'compras', 'AdminComprasController', 0, 0, '2022-03-10 20:12:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-yellow', '2022-02-18 04:33:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(16, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(19, 1, 1, 1, 1, 1, 1, 4, NULL, NULL),
(20, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(21, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(22, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(23, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(24, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(25, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(26, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(27, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
(28, 1, 1, 1, 1, 1, 1, 23, NULL, NULL),
(29, 1, 1, 1, 1, 1, 1, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2022-02-18 04:33:52', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2022-02-18 04:33:52', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2022-02-18 04:33:52', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2022-02-18 04:33:52', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'DoctorVet', 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2022-02-18 04:33:52', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', NULL, 'upload_image', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', NULL, 'upload_image', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2022-02-18 04:33:52', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'uploads/1/2022-02/avatar.png', 'admin@crudbooster.com', '$2y$10$MUr2c6vvNm5cIepqDqjiYuNMyFbRXDnyomLgcpOqixPh8zgU9bZlS', 1, '2022-02-18 04:33:52', '2022-02-18 21:39:11', 'Active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `secret_id` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_proveedores` int(11) DEFAULT NULL,
  `id_medio_pagos` int(11) DEFAULT NULL,
  `id_tipo_documento_tributario` int(11) DEFAULT NULL,
  `monto_venta` float DEFAULT NULL,
  `monto_pagado` float DEFAULT NULL,
  `vuelto` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `nro_documento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentarios` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `secret_id`, `id_proveedores`, `id_medio_pagos`, `id_tipo_documento_tributario`, `monto_venta`, `monto_pagado`, `vuelto`, `descuento`, `subtotal`, `nro_documento`, `comentarios`, `fecha`) VALUES
(1, '6231f2d5d8d43', 1, 1, 2, 30000, 30000, 0, 0, 30000, '333', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id` int(11) NOT NULL,
  `secret_id` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id`, `secret_id`, `id_articulos`, `precio`, `cantidad`, `total`) VALUES
(5, '6231f2d5d8d43', 3, 10000, 1, 10000),
(6, '6231f2d5d8d43', 2, 10000, 1, 10000),
(7, '6231f2d5d8d43', 1, 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL,
  `secret_id` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `secret_id`, `id_articulos`, `precio`, `cantidad`, `total`) VALUES
(22, '62293993759cb', 3, 10000, 1, 10000),
(23, '62293993759cb', 2, 3000, 1, 3000),
(24, '62293993759cb', 1, 5000, 1, 5000),
(25, '62294097b8519', 3, 10000, 1, 10000),
(26, '62294097b8519', 2, 3000, 1, 3000),
(27, '62294097b8519', 1, 5000, 1, 5000),
(28, '622941ad5d114', 3, 10000, 1, 10000),
(29, '622941ad5d114', 2, 3000, 1, 3000),
(30, '622941ad5d114', 1, 5000, 1, 5000),
(40, '622a43f38b845', 4, 15000, 1, 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_mascotas`
--

CREATE TABLE `documentos_mascotas` (
  `id` int(11) NOT NULL,
  `id_mascotas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extension` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_documentos` int(11) DEFAULT NULL,
  `comentarios` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `documentos_mascotas`
--

INSERT INTO `documentos_mascotas` (`id`, `id_mascotas`, `fecha`, `archivo`, `extension`, `id_tipo_documentos`, `comentarios`) VALUES
(1, 1, '2022-03-09', 'uploads/1/2022-03/6228266b8b724.jpg', 'jpg', 1, 'Huesos rotos.'),
(2, 1, '2022-03-09', 'uploads/1/2022-03/622827f3d29e7.gif', 'gif', 2, 'Nada anormal.'),
(3, 1, '2022-03-30', 'uploads/documentos/6243b377d2d4a.png', NULL, 1, 'prueba'),
(4, 1, '2022-03-30', 'uploads/documentos/6243b968aa60c.png', NULL, 1, NULL),
(5, 1, '2022-03-30', 'uploads/documentos/6243c1a043b8d.png', NULL, 1, NULL),
(6, 1, '2022-03-30', 'uploads/documentos/6243d1260526f.png', NULL, 1, NULL),
(7, 1, '2022-03-30', 'uploads/documentos/6243d163af312.png', NULL, 1, 'holaa'),
(8, 1, '2022-03-30', 'uploads/documentos/6243d2137a40b.png', NULL, 1, 'sdfsdfsdf'),
(9, 1, '2022-03-30', 'uploads/documentos/6243d226c9fdf.png', NULL, 1, NULL),
(10, 1, '2022-03-30', 'uploads/documentos/6243d27780791.png', NULL, 1, NULL),
(11, 1, '2022-03-30', 'uploads/documentos/6243d2c086176.jpg', NULL, 1, NULL),
(12, 1, '2022-03-30', 'uploads/documentos/6243d3119aa0e.png', NULL, 1, NULL),
(13, 1, '2022-03-30', 'uploads/documentos/6243d47785ec1.png', NULL, 1, NULL),
(14, 1, '2022-03-30', 'uploads/documentos/6243d5ac862b0.png', NULL, 1, NULL),
(15, 1, '2022-03-30', 'uploads/documentos/6243d6107554c.png', NULL, 1, NULL),
(16, 1, '2022-03-30', 'uploads/documentos/6243dabe75514.png', NULL, 1, NULL),
(17, 1, '2022-03-30', 'uploads/documentos/6243dae66959d.png', NULL, 1, 'sdfsdfsdsdfsd'),
(18, 1, '2022-03-30', 'uploads/documentos/6243db1e52a37.png', NULL, 1, NULL),
(19, 1, '2022-03-30', 'uploads/documentos/6243e68acfb6e.png', NULL, 1, NULL),
(20, 1, '2022-03-30', 'uploads/documentos/6243e94e78575.png', NULL, 1, 'sdfsdfsdfsdfds'),
(21, 1, '2022-03-30', 'uploads/documentos/6243e97698ea8.png', NULL, 1, 'sdfgsdfsfsf'),
(22, 1, '2022-03-30', 'uploads/documentos/6243e9f622744.png', NULL, 2, 'aaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id` int(11) NOT NULL,
  `especie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id`, `especie`, `activo`, `avatar`) VALUES
(1, 'PERRO', 'Si', 'uploads/1/2022-02/avatar_perro.png'),
(2, 'GATO', 'Si', 'uploads/1/2022-02/avatar_gato.png'),
(3, 'CABALLO', 'Si', 'uploads/1/2022-03/iconfinder_horse_4591889_122122.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_vacunas`
--

CREATE TABLE `estado_vacunas` (
  `id` int(11) NOT NULL,
  `estado_vacuna` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `class` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_vacunas`
--

INSERT INTO `estado_vacunas` (`id`, `estado_vacuna`, `class`) VALUES
(1, 'PENDIENTE', 'warning'),
(2, 'COLOCADA', 'success');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_clinico`
--

CREATE TABLE `historial_clinico` (
  `id` int(11) NOT NULL,
  `id_mascotas` int(11) DEFAULT NULL,
  `temperatura` float DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `comentarios` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha_completa` datetime DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_clinico`
--

INSERT INTO `historial_clinico` (`id`, `id_mascotas`, `temperatura`, `peso`, `comentarios`, `fecha`, `hora`, `fecha_completa`, `id_cms_users`) VALUES
(5, NULL, 1, 1, 'sdfsdfsd', '2022-03-16', NULL, NULL, 1),
(12, 1, 36, 4, '<p>EDAD:&nbsp;<span style=\"color: rgb(51, 51, 51); text-align: center; text-transform: uppercase;\">04 AÑOS Y 8 MESES.</span></p><p><br></p><p><br></p>', '2022-04-08', '04:47:25', '2022-04-08 04:47:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_especies` int(11) DEFAULT NULL,
  `id_razas` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_sexos` int(11) DEFAULT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `id_especies`, `id_razas`, `fecha_nacimiento`, `id_sexos`, `id_clientes`, `activo`) VALUES
(1, 'Noah', 2, 8, '2017-08-07', 1, 1, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pagos`
--

CREATE TABLE `medio_pagos` (
  `id` int(11) NOT NULL,
  `medio_pago` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medio_pagos`
--

INSERT INTO `medio_pagos` (`id`, `medio_pago`) VALUES
(1, 'CONTADO'),
(2, 'DÉBITO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_145904_add_table_cms_apicustom', 1),
(4, '2016_08_07_150834_add_table_cms_dashboard', 1),
(5, '2016_08_07_151210_add_table_cms_logs', 1),
(6, '2016_08_07_151211_add_details_cms_logs', 1),
(7, '2016_08_07_152014_add_table_cms_privileges', 1),
(8, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(9, '2016_08_07_152320_add_table_cms_settings', 1),
(10, '2016_08_07_152421_add_table_cms_users', 1),
(11, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(12, '2016_08_07_154624_add_table_cms_moduls', 1),
(13, '2016_08_17_225409_add_status_cms_users', 1),
(14, '2016_08_20_125418_add_table_cms_notifications', 1),
(15, '2016_09_04_033706_add_table_cms_email_queues', 1),
(16, '2016_09_16_035347_add_group_setting', 1),
(17, '2016_09_16_045425_add_label_setting', 1),
(18, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(19, '2016_10_01_141740_add_method_type_apicustom', 1),
(20, '2016_10_01_141846_add_parameters_apicustom', 1),
(21, '2016_10_01_141934_add_responses_apicustom', 1),
(22, '2016_10_01_144826_add_table_apikey', 1),
(23, '2016_11_14_141657_create_cms_menus', 1),
(24, '2016_11_15_132350_create_cms_email_templates', 1),
(25, '2016_11_15_190410_create_cms_statistics', 1),
(26, '2016_11_17_102740_create_cms_statistic_components', 1),
(27, '2017_06_06_164501_add_deleted_at_cms_moduls', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_articulos`
--

CREATE TABLE `movimiento_articulos` (
  `id` int(11) NOT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `movimiento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `entrada` float DEFAULT NULL,
  `salida` float DEFAULT NULL,
  `cantidad_actual` float DEFAULT NULL,
  `id_tipo_movimientos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_tipo_documentos` int(11) DEFAULT NULL,
  `nro_documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimiento_articulos`
--

INSERT INTO `movimiento_articulos` (`id`, `id_articulos`, `movimiento`, `entrada`, `salida`, `cantidad_actual`, `id_tipo_movimientos`, `fecha`, `id_tipo_documentos`, `nro_documento`) VALUES
(1, 2, 'SALIDA', 0, 1, 19, 3, '2022-03-09', 1, 123),
(2, 3, 'ENTRADA', 5, 0, 25, 2, '2022-03-09', 2, 662),
(6, 3, 'SALIDA', 0, 1, 24, 3, '2022-03-10', 1, 111),
(7, 2, 'SALIDA', 0, 1, 18, 3, '2022-03-10', 1, 111),
(8, 1, 'SALIDA', 0, 1, 19, 3, '2022-03-10', 1, 111),
(9, 3, 'ENTRADA', 1, 0, 25, 2, '2022-03-10', 1, 222),
(10, 2, 'ENTRADA', 2, 0, 20, 2, '2022-03-10', 1, 222),
(11, 1, 'ENTRADA', 1, 0, 20, 2, '2022-03-10', 1, 222),
(12, 2, 'ENTRADA', 1, 0, 21, 2, '2022-03-10', 1, 222),
(13, 1, 'SALIDA', 0, 1, 19, 3, '2022-03-10', 1, 222),
(14, 2, 'SALIDA', 0, 1, 20, 3, '2022-03-10', 1, 222),
(15, 3, 'SALIDA', 0, 1, 24, 3, '2022-03-10', 1, 222),
(16, 1, 'SALIDA', 0, 1, 18, 3, '2022-03-10', 1, 222),
(17, 2, 'SALIDA', 0, 1, 19, 3, '2022-03-10', 1, 222),
(18, 3, 'SALIDA', 0, 1, 23, 3, '2022-03-10', 1, 222),
(19, 1, 'SALIDA', 0, 1, 17, 3, '2022-03-10', 1, 222),
(20, 2, 'SALIDA', 0, 1, 18, 3, '2022-03-10', 1, 222),
(21, 3, 'SALIDA', 0, 1, 22, 3, '2022-03-10', 1, 222),
(22, 3, 'ENTRADA', 1, 0, 23, 2, '2022-03-16', 2, 333),
(23, 2, 'ENTRADA', 1, 0, 19, 2, '2022-03-16', 2, 333),
(24, 1, 'ENTRADA', 1, 0, 18, 2, '2022-03-16', 2, 333),
(25, 3, 'ENTRADA', 1, 0, 24, 5, '2022-03-29', 1, NULL),
(26, 2, 'ENTRADA', 1, 0, 20, 5, '2022-03-29', 1, NULL),
(27, 1, 'ENTRADA', 1, 0, 19, 5, '2022-03-29', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `id` int(11) NOT NULL,
  `id_mascotas` int(11) DEFAULT NULL,
  `id_articulos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_estado_vacunas` int(11) DEFAULT NULL,
  `id_categoria_articulos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planificacion`
--

INSERT INTO `planificacion` (`id`, `id_mascotas`, `id_articulos`, `fecha`, `id_estado_vacunas`, `id_categoria_articulos`) VALUES
(1, 1, 1, '2022-03-08', 2, 1),
(3, 1, 2, '2022-03-08', 2, 2),
(4, 1, 2, '2022-09-08', 2, 2),
(13, 1, 3, '2022-03-08', 2, 3),
(14, 1, 3, '2022-04-08', 1, 3),
(15, 1, 1, '2023-03-03', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_principal` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_secundario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rut` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_social`, `direccion`, `telefono_principal`, `telefono_secundario`, `rut`, `contacto`, `email`, `activo`) VALUES
(1, 'LABORATORIO 1', 'Calle 1', '+56912345678', NULL, '11.111.111-1', 'Victor Lara', 'ventas@laboratorio1.com', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `id_especies` int(11) DEFAULT NULL,
  `raza` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `id_especies`, `raza`, `activo`) VALUES
(1, 1, 'BEAGLE', 'Si'),
(2, 1, 'PASTOR ALEMÁN', 'Si'),
(3, 1, 'BULLDOG', 'Si'),
(4, 1, 'AKITA', 'Si'),
(5, 2, 'PERSA', 'Si'),
(6, 2, 'BIRMANO', 'Si'),
(7, 2, 'SIAMÉS', 'Si'),
(8, 2, 'MESTIZO', 'Si'),
(9, 3, 'FRISÓN', 'Si'),
(10, 3, 'SHIRE', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `id` int(11) NOT NULL,
  `sexo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id`, `sexo`) VALUES
(1, 'MACHO'),
(2, 'HEMBRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`id`, `tipo_documento`) VALUES
(1, 'RADIOGRAFÍA'),
(2, 'ECOGRAFÍA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_tributario`
--

CREATE TABLE `tipo_documento_tributario` (
  `id` int(11) NOT NULL,
  `tipo_documento_tributario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento_tributario`
--

INSERT INTO `tipo_documento_tributario` (`id`, `tipo_documento_tributario`) VALUES
(1, 'BOLETA ELECTRONICA'),
(2, 'FACTURA ELECTRONICA'),
(3, 'FACTURA EXENTA'),
(4, 'FACTURA VENTA ZOFRI'),
(5, 'GUÍA DESPACHO ELECTRÓNICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimientos`
--

CREATE TABLE `tipo_movimientos` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_movimientos`
--

INSERT INTO `tipo_movimientos` (`id`, `tipo_movimiento`) VALUES
(1, 'AJUSTE MANUAL'),
(2, 'RECEPCIÓN POR COMPRAS'),
(3, 'VENTA'),
(4, 'ANULACIÓN DE VENTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidas`
--

CREATE TABLE `unidad_medidas` (
  `id` int(11) NOT NULL,
  `unidad_medida` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidad_medidas`
--

INSERT INTO `unidad_medidas` (`id`, `unidad_medida`, `activo`) VALUES
(1, 'Unidad', 'Si'),
(2, 'KG', 'Si'),
(3, 'GR', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `secret_id` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `id_medio_pagos` int(11) DEFAULT NULL,
  `id_tipo_documento_tributario` int(11) DEFAULT NULL,
  `monto_venta` float DEFAULT NULL,
  `monto_pagado` float DEFAULT NULL,
  `vuelto` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `nro_documento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentarios` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `anulado` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `secret_id`, `id_clientes`, `id_medio_pagos`, `id_tipo_documento_tributario`, `monto_venta`, `monto_pagado`, `vuelto`, `descuento`, `subtotal`, `nro_documento`, `comentarios`, `fecha`, `anulado`) VALUES
(2, '62293993759cb', 1, 1, 1, 16200, 20000, 3800, 10, 18000, NULL, NULL, NULL, 'Si'),
(3, '62294097b8519', 1, 1, 1, 16200, 20000, 3800, 10, 18000, '111', NULL, NULL, 'No'),
(4, '622941ad5d114', 1, 1, 1, 16200, 20000, 3800, 10, 18000, '111', NULL, NULL, 'No'),
(6, '622a43f38b845', 1, 1, 1, 15000, 0, 0, 0, 15000, '222', 'prueba.', '2022-03-10 06:31:35', 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_articulos`
--
ALTER TABLE `categoria_articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos_mascotas`
--
ALTER TABLE `documentos_mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_vacunas`
--
ALTER TABLE `estado_vacunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medio_pagos`
--
ALTER TABLE `medio_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_articulos`
--
ALTER TABLE `movimiento_articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento_tributario`
--
ALTER TABLE `tipo_documento_tributario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_movimientos`
--
ALTER TABLE `tipo_movimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_articulos`
--
ALTER TABLE `categoria_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `documentos_mascotas`
--
ALTER TABLE `documentos_mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_vacunas`
--
ALTER TABLE `estado_vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medio_pagos`
--
ALTER TABLE `medio_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `movimiento_articulos`
--
ALTER TABLE `movimiento_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_tributario`
--
ALTER TABLE `tipo_documento_tributario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_movimientos`
--
ALTER TABLE `tipo_movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
