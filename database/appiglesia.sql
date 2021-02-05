-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2021 a las 08:54:19
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appiglesia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `categoria` enum('Diezmo_Total','Diezmo_Pastor','Diezmo_Ministros','Damas','Jovenes','Ninos','DLD','Caballeros','Patrimonio_Historico','Domingo_2','Domingo_3','Domingo_4','Impulso_Mundial','Impulso_Nacional','Tabernaculo_Nacional','Pago_Prestamos','Otros_Propositos','Diezmo_Restante','Fondo_Local') COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `inicial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `balances`
--

INSERT INTO `balances` (`id`, `iglesia_id`, `categoria`, `monto`, `fecha`, `inicial`, `created_at`, `updated_at`) VALUES
(1, 3, 'Damas', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(2, 3, 'Jovenes', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(3, 3, 'Ninos', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(4, 3, 'DLD', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(5, 3, 'Caballeros', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(6, 3, 'Patrimonio_Historico', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(7, 3, 'Fondo_Local', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(8, 3, 'Diezmo_Restante', 10000, '2021-02-04', 1, '2021-02-04 06:25:27', '2021-02-04 06:25:27'),
(137, 3, 'Damas', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(138, 3, 'Jovenes', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(139, 3, 'Ninos', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(140, 3, 'DLD', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(141, 3, 'Caballeros', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(142, 3, 'Patrimonio_Historico', 10500, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(143, 3, 'Fondo_Local', 18000, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00'),
(144, 3, 'Diezmo_Restante', 11550, '2021-02-05', NULL, '2021-02-05 07:56:00', '2021-02-05 07:56:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diezmos`
--

CREATE TABLE `diezmos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `monto` int(10) UNSIGNED NOT NULL,
  `referencia` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diezmos`
--

INSERT INTO `diezmos` (`id`, `user_id`, `iglesia_id`, `monto`, `referencia`, `fecha`, `created_at`, `updated_at`) VALUES
(2, 10, 3, 132123132, 123456, '2021-02-05', '2021-02-05 02:28:02', '2021-02-05 02:28:02'),
(3, 10, 3, 1321564, 123457, '2021-02-04', '2021-02-05 02:28:59', '2021-02-05 02:28:59'),
(4, 10, 3, 2121631, 124579, '2021-02-04', '2021-02-05 02:53:53', '2021-02-05 02:53:53'),
(5, 10, 3, 121321, 132132, '2021-02-05', '2021-02-05 02:55:44', '2021-02-05 02:55:44'),
(6, 10, 3, 4567891, 123456, '2021-02-05', '2021-02-05 03:05:25', '2021-02-05 03:05:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `categoria` enum('Diezmo_Total','Diezmo_Pastor','Diezmo_Ministros','Damas','Jovenes','Ninos','DLD','Caballeros','Patrimonio_Historico','Domingo_2','Domingo_3','Domingo_4','Impulso_Mundial','Impulso_Nacional','Tabernaculo_Nacional','Pago_Prestamos','Otros_Propositos','Diezmo_Restante','Fondo_Local') COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('Activo','Pasivo','Inicial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `finanzas`
--

INSERT INTO `finanzas` (`id`, `iglesia_id`, `categoria`, `monto`, `fecha`, `descripcion`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fondo_Local', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:34', '2021-02-04 06:27:34'),
(2, 3, 'Diezmo_Restante', 1000, '2021-02-04', 'preuba', 'Pasivo', '2021-02-04 06:27:34', '2021-02-04 06:27:34'),
(3, 3, 'Damas', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:34', '2021-02-04 06:27:34'),
(4, 3, 'Jovenes', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:34', '2021-02-04 06:27:34'),
(5, 3, 'Ninos', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:35', '2021-02-04 06:27:35'),
(6, 3, 'DLD', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:35', '2021-02-04 06:27:35'),
(7, 3, 'Caballeros', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:35', '2021-02-04 06:27:35'),
(8, 3, 'Patrimonio_Historico', 1000, '2021-02-04', 'prueba', 'Pasivo', '2021-02-04 06:27:35', '2021-02-04 06:27:35'),
(9, 3, 'Damas', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(10, 3, 'Jovenes', 3000, '2021-02-04', 'pruebna', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(11, 3, 'Ninos', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(12, 3, 'DLD', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(13, 3, 'Caballeros', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(14, 3, 'Patrimonio_Historico', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(15, 3, 'Diezmo_Total', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(16, 3, 'Diezmo_Pastor', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(17, 3, 'Diezmo_Ministros', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(18, 3, 'Domingo_2', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(19, 3, 'Domingo_3', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(20, 3, 'Domingo_4', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(21, 3, 'Impulso_Mundial', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(22, 3, 'Impulso_Nacional', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(23, 3, 'Tabernaculo_Nacional', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(24, 3, 'Pago_Prestamos', 3000, '2021-02-04', 'preuba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(25, 3, 'Otros_Propositos', 3000, '2021-02-04', 'prueba', 'Activo', '2021-02-04 06:30:21', '2021-02-04 06:30:21'),
(26, 3, 'Fondo_Local', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(27, 3, 'Diezmo_Restante', 1000, '2021-03-04', 'preuba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(28, 3, 'Damas', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(29, 3, 'Jovenes', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(30, 3, 'Ninos', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(31, 3, 'DLD', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(32, 3, 'Caballeros', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(33, 3, 'Patrimonio_Historico', 1000, '2021-03-04', 'prueba', 'Pasivo', '2021-02-04 06:34:38', '2021-02-04 06:34:38'),
(34, 3, 'Damas', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(35, 3, 'Jovenes', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(36, 3, 'Ninos', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(37, 3, 'DLD', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(38, 3, 'Caballeros', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(39, 3, 'Patrimonio_Historico', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(40, 3, 'Diezmo_Total', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:04', '2021-02-04 06:38:04'),
(41, 3, 'Diezmo_Pastor', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(42, 3, 'Diezmo_Ministros', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(43, 3, 'Domingo_2', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(44, 3, 'Domingo_3', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(45, 3, 'Domingo_4', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(46, 3, 'Impulso_Mundial', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(47, 3, 'Impulso_Nacional', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(48, 3, 'Tabernaculo_Nacional', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(49, 3, 'Pago_Prestamos', 2000, '2021-03-04', 'preuba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05'),
(50, 3, 'Otros_Propositos', 2000, '2021-03-04', 'prueba', 'Activo', '2021-02-04 06:38:05', '2021-02-04 06:38:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesias`
--

CREATE TABLE `iglesias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `iglesias`
--

INSERT INTO `iglesias` (`id`, `name`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Prueba', 'Prueba', NULL, '2020-12-21 11:24:39'),
(2, 'Makro', 'Makros', '2020-12-20 13:23:02', '2020-12-24 09:30:24'),
(3, 'Paseo', 'Paseos', '2020-12-20 13:25:24', '2021-02-04 15:26:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesia_user`
--

CREATE TABLE `iglesia_user` (
  `id` int(11) NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `iglesia_user`
--

INSERT INTO `iglesia_user` (`id`, `iglesia_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 10, '2020-12-22 05:37:29', '2020-12-22 05:37:29'),
(2, 1, 16, '2020-12-24 08:28:15', '2020-12-24 08:28:15'),
(5, 3, 19, '2021-02-05 07:53:23', '2021-02-05 07:53:23'),
(6, 3, 20, '2021-02-05 07:53:50', '2021-02-05 07:53:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_20_084450_create_roles_table', 1),
(4, '2015_01_20_084525_create_role_user_table', 1),
(5, '2015_01_24_080208_create_permissions_table', 1),
(6, '2015_01_24_080433_create_permission_role_table', 1),
(7, '2015_12_04_003040_add_special_role_column', 1),
(8, '2017_10_17_170735_create_permission_user_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_12_16_052506_create_users_date', 1),
(11, '2020_12_16_052638_create_iglesias', 1),
(12, '2020_12_16_052739_create_iglesia_user', 1),
(13, '2020_12_24_085123_create_finanzas', 1),
(14, '2021_01_13_090743_create_balance', 1),
(16, '2021_02_04_205452_create_diezmo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(2, 'Ver detalles de usuario', 'users.show', 'Ver en detalle cada usuario del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(3, 'Creación de datos de usuario', 'users.create', 'Registrar datos de un usuario', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(4, 'Edicion de usuarios', 'users.edit', 'Editar cualquier dato de un usuario del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(5, 'Eliminar usuario', 'users.destroy', 'Eliminar cualquier usuario del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(6, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(7, 'Ver detalles de rol', 'roles.show', 'Ver en detalle cada rol del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(8, 'Creación de roles', 'roles.create', 'Crear un rol en el sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(9, 'Edición de roles', 'roles.edit', 'Editar cualquier dato de un rol del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(10, 'Eliminar rol', 'roles.destroy', 'Eliminar cualquier rol del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(11, 'Navegar iglesias', 'iglesias.index', 'Lista y navega todas las iglesias del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(12, 'Ver detalles de iglesia', 'iglesias.show', 'Ver en detalle cada iglesia del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(13, 'Creación de iglesias', 'iglesias.create', 'Crear una iglesia en el sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(14, 'Edición de iglesias', 'iglesias.edit', 'Editar cualquier dato de una iglesia del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(15, 'Eliminar iglesia', 'iglesias.destroy', 'Eliminar cualquier iglesia del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(16, 'Navegar Finanzas', 'finanzas.index', 'Lista y navega todas las Finanzas del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(17, 'Ver detalles de finanza', 'finanzas.show', 'Ver en detalle cada finanza del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(18, 'Creación de Finanzas', 'finanzas.create', 'Crear una finanza en el sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(19, 'Edición de Finanzas', 'finanzas.edit', 'Editar cualquier dato de una finanza del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(20, 'Eliminar finanza', 'finanzas.destroy', 'Eliminar cualquier finanza del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(21, 'Navegar noticias', 'noticias.index', 'Lista y navega todas las noticias del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(22, 'Ver detalles de noticia', 'noticias.show', 'Ver en detalle cada noticia del sistema', '2021-02-04 22:58:49', '2021-02-04 22:58:49'),
(23, 'Creación de noticias', 'noticias.create', 'Crear una noticia en el sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(24, 'Edición de noticias', 'noticias.edit', 'Editar cualquier dato de una noticia del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(25, 'Eliminar noticia', 'noticias.destroy', 'Eliminar cualquier noticia del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(26, 'Navegar eventos', 'eventos.index', 'Lista y navega todos los eventos del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(27, 'Ver detalles de evento', 'eventos.show', 'Ver en detalle cada evento del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(28, 'Creación de eventos', 'eventos.create', 'Crear un evento en el sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(29, 'Edición de eventos', 'eventos.edit', 'Editar cualquier dato de un evento del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(30, 'Eliminar evento', 'eventos.destroy', 'Eliminar cualquier evento del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(31, 'Navegar diezmos', 'diezmos.index', 'Lista y navega todos los diezmos del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(32, 'Ver detalles de diezmo', 'diezmos.show', 'Ver en detalle cada diezmo del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(33, 'Creación de diezmos', 'diezmos.create', 'Crear un diezmo en el sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(34, 'Edición de diezmos', 'diezmos.edit', 'Editar cualquier dato de un diezmo del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(35, 'Eliminar diezmo', 'diezmos.destroy', 'Eliminar cualquier diezmo del sistema', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(36, 'Navegar ', 'admin.index', 'Lista y navega ', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(37, 'Ver detalles ', 'admin.show', 'Ver en detalle ', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(38, 'Creación ', 'admin.create', 'Crear ', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(39, 'Edición ', 'admin.edit', 'Editar ', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(40, 'Eliminar', 'admin.destroy', 'Eliminar ', '2021-02-04 22:58:50', '2021-02-04 22:58:50'),
(41, 'Crear un nuevo miembro', 'users.createMiembro', 'Crea un nuevo miembro dentro de la iglesia', '2021-02-05 06:47:15', '2021-02-05 06:47:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, '2020-12-20 09:57:43', '2020-12-20 09:57:43'),
(3, 3, 3, '2020-12-20 09:57:43', '2020-12-20 09:57:43'),
(4, 4, 3, '2020-12-20 09:57:43', '2020-12-20 09:57:43'),
(5, 12, 3, '2020-12-20 09:57:43', '2020-12-20 09:57:43'),
(7, 16, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(8, 17, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(9, 18, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(10, 19, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(11, 21, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(12, 22, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(15, 26, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(16, 27, 3, '2020-12-20 09:57:44', '2020-12-20 09:57:44'),
(17, 2, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(18, 3, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(19, 4, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(20, 12, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(21, 16, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(22, 17, 4, '2020-12-20 11:39:53', '2020-12-20 11:39:53'),
(23, 18, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(24, 19, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(25, 21, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(26, 22, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(27, 26, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(28, 27, 4, '2020-12-20 11:39:54', '2020-12-20 11:39:54'),
(29, 2, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(30, 3, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(31, 4, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(32, 12, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(33, 21, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(34, 22, 2, '2020-12-22 04:41:40', '2020-12-22 04:41:40'),
(35, 26, 2, '2020-12-22 04:41:41', '2020-12-22 04:41:41'),
(36, 27, 2, '2020-12-22 04:41:41', '2020-12-22 04:41:41'),
(37, 28, 3, '2020-12-22 12:55:02', '2020-12-22 12:55:02'),
(38, 29, 3, '2020-12-22 12:55:02', '2020-12-22 12:55:02'),
(39, 2, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(40, 4, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(41, 12, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(46, 21, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(47, 22, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(48, 26, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(49, 27, 5, '2021-01-28 20:08:08', '2021-01-28 20:08:08'),
(50, 32, 2, '2021-02-04 23:04:42', '2021-02-04 23:04:42'),
(51, 33, 2, '2021-02-04 23:04:42', '2021-02-04 23:04:42'),
(52, 34, 2, '2021-02-04 23:04:42', '2021-02-04 23:04:42'),
(54, 32, 4, '2021-02-04 23:05:13', '2021-02-04 23:05:13'),
(55, 33, 4, '2021-02-04 23:05:13', '2021-02-04 23:05:13'),
(56, 34, 4, '2021-02-04 23:05:13', '2021-02-04 23:05:13'),
(57, 31, 4, '2021-02-04 23:06:06', '2021-02-04 23:06:06'),
(58, 32, 5, '2021-02-04 23:06:27', '2021-02-04 23:06:27'),
(59, 33, 5, '2021-02-04 23:06:27', '2021-02-04 23:06:27'),
(60, 34, 5, '2021-02-04 23:06:27', '2021-02-04 23:06:27'),
(61, 31, 3, '2021-02-04 23:06:41', '2021-02-04 23:06:41'),
(62, 32, 3, '2021-02-04 23:06:41', '2021-02-04 23:06:41'),
(63, 33, 3, '2021-02-04 23:06:42', '2021-02-04 23:06:42'),
(64, 34, 3, '2021-02-04 23:06:42', '2021-02-04 23:06:42'),
(65, 41, 3, '2021-02-05 07:57:18', '2021-02-05 07:57:18'),
(66, 41, 5, '2021-02-05 08:01:24', '2021-02-05 08:01:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Administrador', 'admin', NULL, '2020-12-17 00:52:02', '2020-12-17 00:52:02', 'all-access'),
(2, 'Usuario', 'user', 'Sin Descripción', NULL, '2020-12-22 04:41:40', NULL),
(3, 'Pastor', 'pastor', 'Sin Descripción', '2020-12-20 09:57:43', '2020-12-20 12:11:14', NULL),
(4, 'Tesorera', 'tesorera', 'Administra las finanzas de la congregación', '2020-12-20 11:39:53', '2020-12-20 11:39:53', NULL),
(5, 'Secretaria', 'secretaria', 'Secretaria del Pastor', '2021-01-28 20:08:07', '2021-01-28 20:08:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 10, '2020-12-18 06:13:18', '2020-12-18 06:13:18'),
(15, 4, 14, '2020-12-22 12:51:51', '2020-12-22 12:51:51'),
(17, 3, 16, '2021-01-09 04:26:12', '2021-01-09 04:26:12'),
(18, 2, 15, '2021-01-26 18:32:53', '2021-01-26 18:32:53'),
(21, 2, 19, '2021-02-05 07:53:23', '2021-02-05 07:53:23'),
(22, 2, 20, '2021-02-05 07:53:50', '2021-02-05 07:53:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `imagen` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `imagen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Enriquee', 'Fonseca', 'eduardom@mail.com', NULL, 'default.png', '$2y$10$ZDxNWpPTU6KFRfrehGu5S.tE1ObT/qZKSCC6ePxxclRwz61CU.GkG', NULL, '2020-12-18 06:13:18', '2021-01-26 18:39:36'),
(11, 'Ismael rodarte', 'Daniela olmos', 'yceballos@example.net', '2020-12-20 07:53:20', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6irimfiGzA', '2020-12-20 07:53:20', '2020-12-20 07:53:20'),
(14, 'Ainara', 'De la cruz', 'montalvo.omar@example.org', '2020-12-20 08:04:21', 'default.png', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lvSeWoaRO4', '2020-12-20 08:04:22', '2020-12-20 08:04:22'),
(15, 'Miguel', 'Robles', 'asisneros@example.net', '2020-12-20 08:04:21', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6jYUGVFln8', '2020-12-20 08:04:22', '2020-12-20 08:04:22'),
(16, 'Eduardoo', 'Fonsecaaa', 'eduardo@mail.com', NULL, 'default.png', '$2y$10$VsTPFxXF3AbmoogszUoePeW0z/9zIzXdGJ.thT2lnlyjSKN.uo1EO', 'Ti6OeQGIrD9VG1tRZ0cSIvHAk6Fj0ZsT75muDspid9wyfaa4fRUEUZqNWNeV', '2020-12-24 08:27:25', '2020-12-24 10:13:29'),
(19, 'Negro', 'Clouse', 'negro@mail.com', NULL, 'default.png', '$2y$10$aOZ4Yn1tU/f336JJewcVTOvbjxMJRcG22U5pwxm3Xkbc7.9tPUp0G', NULL, '2021-02-05 07:53:23', '2021-02-05 07:53:23'),
(20, 'Negrito', 'Menoses', 'negros@mail.com', NULL, 'default.png', '$2y$10$J47J5bKPTqE23aBw3oMH6ul1smzQhQeTUx1XKWUXs9pL7kn9VdEgm', NULL, '2021-02-05 07:53:50', '2021-02-05 07:53:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_date`
--

CREATE TABLE `users_date` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_date`
--

INSERT INTO `users_date` (`user_id`, `fecha_nacimiento`, `lugar_nacimiento`, `telefono`, `sexo`, `cedula`, `estado`, `ciudad`, `direccion`, `nacionalidad`, `estado_civil`, `created_at`, `updated_at`) VALUES
(16, '2020-12-02', 'Aadas', '04160000000', 'Masculino', '00000000', 'Adasdasda', 'Asdasda', '45asda', 'Adasdadad', 'Casado', '2020-12-24 08:30:17', '2020-12-24 08:30:17'),
(10, '2020-12-03', 'Asdas', '12345678467', 'Masculino', '21111897', 'Asdasd', 'Asdasd', 'Asdasd', 'Asdasde', 'Casado', '2020-12-20 14:34:10', '2021-01-26 18:32:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_iglesia_id_foreign` (`iglesia_id`);

--
-- Indices de la tabla `diezmos`
--
ALTER TABLE `diezmos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diezmos_user_id_foreign` (`user_id`),
  ADD KEY `diezmos_iglesia_id_foreign` (`iglesia_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finanzas_iglesia_id_foreign` (`iglesia_id`);

--
-- Indices de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iglesia_user`
--
ALTER TABLE `iglesia_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iglesia_user_iglesia_id_foreign` (`iglesia_id`),
  ADD KEY `iglesia_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_date`
--
ALTER TABLE `users_date`
  ADD UNIQUE KEY `users_date_cedula_unique` (`cedula`),
  ADD KEY `users_date_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `diezmos`
--
ALTER TABLE `diezmos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `iglesia_user`
--
ALTER TABLE `iglesia_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balance_iglesia_id_foreign` FOREIGN KEY (`iglesia_id`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `diezmos`
--
ALTER TABLE `diezmos`
  ADD CONSTRAINT `diezmos_iglesia_id_foreign` FOREIGN KEY (`iglesia_id`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diezmos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD CONSTRAINT `finanzas_iglesia_id_foreign` FOREIGN KEY (`iglesia_id`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `iglesia_user`
--
ALTER TABLE `iglesia_user`
  ADD CONSTRAINT `iglesia_user_iglesia_id_foreign` FOREIGN KEY (`iglesia_id`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `iglesia_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_date`
--
ALTER TABLE `users_date`
  ADD CONSTRAINT `users_date_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
