-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 13-01-2021 a las 12:48:11
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
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE `balance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `monto` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `categoria` enum('Diezmo_Total','Diezmo_Pastor','Diezmo_Ministro','Damas','Jovenes','Niños','DLD','Caballeros','Patrimonio_Historico','Domingo_2','Domingo_3','Domingo_4','Impulso_Mundial','Impulso_Nacional','Tabernaculo_Nacional','Pago_Prestamos','Otros_Propositos','Diezmo_Restante','Fondo_Local') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 1, 'Damas', 5000, '2020-12-10', NULL, 'Activo', NULL, NULL),
(2, 1, 'Damas', 1000, '2020-12-10', NULL, 'Pasivo', NULL, NULL),
(3, 1, 'Damas', 2000, '2021-05-13', NULL, 'Inicial', NULL, NULL);

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
(1, 'Prueba', 'Prueba', NULL, '2020-12-21 07:24:39'),
(2, 'Makro', 'Makros', '2020-12-20 09:23:02', '2020-12-24 05:30:24'),
(3, 'Paseo', 'Paseo', '2020-12-20 09:25:24', '2020-12-20 09:25:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iglesia_user`
--

CREATE TABLE `iglesia_user` (
  `id` bigint(20) NOT NULL,
  `iglesia_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `iglesia_user`
--

INSERT INTO `iglesia_user` (`id`, `iglesia_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, 10, '2020-12-22 01:37:29', '2020-12-22 01:37:29'),
(12, 1, 16, '2020-12-24 04:28:15', '2020-12-24 04:28:15');

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2015_01_20_084450_create_roles_table', 1),
(18, '2015_01_20_084525_create_role_user_table', 1),
(19, '2015_01_24_080208_create_permissions_table', 1),
(20, '2015_01_24_080433_create_permission_role_table', 1),
(21, '2015_12_04_003040_add_special_role_column', 1),
(22, '2017_10_17_170735_create_permission_user_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2020_12_16_052506_create_users_date', 1),
(25, '2020_12_16_052638_create_iglesias', 1),
(26, '2020_12_16_052739_create_iglesia_user', 1),
(32, '2020_12_24_085123_create_finanzas', 2),
(33, '2021_01_13_090743_create_balance', 3);

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
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(2, 'Ver detalles de usuario', 'users.show', 'Ver en detalle cada usuario del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(3, 'Creación de datos de usuario', 'users.create', 'Registrar datos de un usuario', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(4, 'Edicion de usuarios', 'users.edit', 'Editar cualquier dato de un usuario del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(5, 'Eliminar usuario', 'users.destroy', 'Eliminar cualquier usuario del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(6, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(7, 'Ver detalles de rol', 'roles.show', 'Ver en detalle cada rol del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(8, 'Creación de roles', 'roles.create', 'Crear un rol en el sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(9, 'Edición de roles', 'roles.edit', 'Editar cualquier dato de un rol del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(10, 'Eliminar rol', 'roles.destroy', 'Eliminar cualquier rol del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(11, 'Navegar iglesias', 'iglesias.index', 'Lista y navega todas las iglesias del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(12, 'Ver detalles de iglesia', 'iglesias.show', 'Ver en detalle cada iglesia del sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(13, 'Creación de iglesias', 'iglesias.create', 'Crear una iglesia en el sistema', '2020-12-18 06:30:40', '2020-12-18 06:30:40'),
(14, 'Edición de iglesias', 'iglesias.edit', 'Editar cualquier dato de una iglesia del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(15, 'Eliminar iglesia', 'iglesias.destroy', 'Eliminar cualquier iglesia del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(16, 'Navegar Finanzas', 'finanzas.index', 'Lista y navega todas las Finanzas del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(17, 'Ver detalles de finanza', 'finanzas.show', 'Ver en detalle cada finanza del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(18, 'Creación de Finanzas', 'finanzas.create', 'Crear una finanza en el sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(19, 'Edición de Finanzas', 'finanzas.edit', 'Editar cualquier dato de una finanza del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(20, 'Eliminar finanza', 'finanzas.destroy', 'Eliminar cualquier finanza del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(21, 'Navegar noticias', 'noticias.index', 'Lista y navega todas las noticias del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(22, 'Ver detalles de noticia', 'noticias.show', 'Ver en detalle cada noticia del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(23, 'Creación de noticias', 'noticias.create', 'Crear una noticia en el sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(24, 'Edición de noticias', 'noticias.edit', 'Editar cualquier dato de una noticia del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(25, 'Eliminar noticia', 'noticias.destroy', 'Eliminar cualquier noticia del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(26, 'Navegar eventos', 'eventos.index', 'Lista y navega todos los eventos del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(27, 'Ver detalles de evento', 'eventos.show', 'Ver en detalle cada evento del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(28, 'Creación de eventos', 'eventos.create', 'Crear un evento en el sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(29, 'Edición de eventos', 'eventos.edit', 'Editar cualquier dato de un evento del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(30, 'Eliminar evento', 'eventos.destroy', 'Eliminar cualquier evento del sistema', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(31, 'Navegar ', 'admin.index', 'Lista y navega ', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(32, 'Ver detalles ', 'admin.show', 'Ver en detalle ', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(33, 'Creación ', 'admin.create', 'Crear ', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(34, 'Edición ', 'admin.edit', 'Editar ', '2020-12-18 06:30:41', '2020-12-18 06:30:41'),
(35, 'Eliminar', 'admin.destroy', 'Eliminar ', '2020-12-18 06:30:41', '2020-12-18 06:30:41');

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
(2, 2, 3, '2020-12-20 05:57:43', '2020-12-20 05:57:43'),
(3, 3, 3, '2020-12-20 05:57:43', '2020-12-20 05:57:43'),
(4, 4, 3, '2020-12-20 05:57:43', '2020-12-20 05:57:43'),
(5, 12, 3, '2020-12-20 05:57:43', '2020-12-20 05:57:43'),
(7, 16, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(8, 17, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(9, 18, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(10, 19, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(11, 21, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(12, 22, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(15, 26, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(16, 27, 3, '2020-12-20 05:57:44', '2020-12-20 05:57:44'),
(17, 2, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(18, 3, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(19, 4, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(20, 12, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(21, 16, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(22, 17, 4, '2020-12-20 07:39:53', '2020-12-20 07:39:53'),
(23, 18, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(24, 19, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(25, 21, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(26, 22, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(27, 26, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(28, 27, 4, '2020-12-20 07:39:54', '2020-12-20 07:39:54'),
(29, 2, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(30, 3, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(31, 4, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(32, 12, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(33, 21, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(34, 22, 2, '2020-12-22 00:41:40', '2020-12-22 00:41:40'),
(35, 26, 2, '2020-12-22 00:41:41', '2020-12-22 00:41:41'),
(36, 27, 2, '2020-12-22 00:41:41', '2020-12-22 00:41:41'),
(37, 28, 3, '2020-12-22 08:55:02', '2020-12-22 08:55:02'),
(38, 29, 3, '2020-12-22 08:55:02', '2020-12-22 08:55:02');

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
(1, 'Administrador', 'admin', NULL, '2020-12-16 20:52:02', '2020-12-16 20:52:02', 'all-access'),
(2, 'Usuario', 'user', 'Sin Descripción', NULL, '2020-12-22 00:41:40', NULL),
(3, 'Pastor', 'pastor', 'Sin Descripción', '2020-12-20 05:57:43', '2020-12-20 08:11:14', NULL),
(4, 'Tesorera', 'tesorera', 'Administra las finanzas de la congregación', '2020-12-20 07:39:53', '2020-12-20 07:39:53', NULL);

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
(3, 1, 10, '2020-12-18 02:13:18', '2020-12-18 02:13:18'),
(15, 4, 14, '2020-12-22 08:51:51', '2020-12-22 08:51:51'),
(17, 3, 16, '2021-01-09 00:26:12', '2021-01-09 00:26:12');

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
(10, 'Enriquee', 'Fonseca', 'eduardom@mail.com', NULL, 'default.png', '$2y$10$1D7lhAZW57LsbmT/bVO7u.QVowp.HLOUMuBjAXq77JJy5luprz20W', NULL, '2020-12-18 02:13:18', '2020-12-24 05:20:54'),
(11, 'Ismael rodarte', 'Daniela olmos', 'yceballos@example.net', '2020-12-20 03:53:20', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6irimfiGzA', '2020-12-20 03:53:20', '2020-12-20 03:53:20'),
(12, 'Ing. lidia cavazos segundo', 'Manuel pedroza', 'hvillalba@example.org', '2020-12-20 03:53:20', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1YyhayGEFc', '2020-12-20 03:53:20', '2020-12-20 03:53:20'),
(14, 'Ainara', 'De la cruz', 'montalvo.omar@example.org', '2020-12-20 04:04:21', 'default.png', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lvSeWoaRO4', '2020-12-20 04:04:22', '2020-12-20 04:04:22'),
(15, 'Miguel', 'Robles', 'asisneros@example.net', '2020-12-20 04:04:21', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6jYUGVFln8', '2020-12-20 04:04:22', '2020-12-20 04:04:22'),
(16, 'Eduardoo', 'Fonsecaaa', 'eduardo@mail.com', NULL, 'default.png', '$2y$10$VsTPFxXF3AbmoogszUoePeW0z/9zIzXdGJ.thT2lnlyjSKN.uo1EO', 'omRZ3xTRj2GZqVExFJMTXzoNMnUFEvxXNleRpkIOlMRVJPkXFSBRPOqkyeMm', '2020-12-24 04:27:25', '2020-12-24 06:13:29');

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
(16, '2020-12-02', 'Aadas', '04160000000', 'Masculino', '00000000', 'Adasdasda', 'Asdasda', '45asda', 'Adasdadad', 'Casado', '2020-12-24 04:30:17', '2020-12-24 04:30:17'),
(10, '2020-12-03', 'Asdas', '12345678467', 'Masculino', '21111897', 'Asdasd', 'Asdasd', 'Asdasd', 'Asdasd', 'Casado', '2020-12-20 10:34:10', '2020-12-20 10:34:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_iglesia_id_foreign` (`iglesia_id`);

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
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `iglesias`
--
ALTER TABLE `iglesias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `iglesia_user`
--
ALTER TABLE `iglesia_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_iglesia_id_foreign` FOREIGN KEY (`iglesia_id`) REFERENCES `iglesias` (`id`) ON DELETE CASCADE;

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
