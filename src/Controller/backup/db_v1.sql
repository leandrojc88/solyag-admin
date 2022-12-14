-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2021 a las 05:20:44
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_update`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo_fijo`
--

CREATE TABLE `activo_fijo` (
  `id` int(11) NOT NULL,
  `id_tipo_movimiento_id` int(11) DEFAULT NULL,
  `id_tipo_movimiento_baja_id` int(11) DEFAULT NULL,
  `id_area_responsabilidad_id` int(11) NOT NULL,
  `id_grupo_activo_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nro_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_consecutivo` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `nro_documento_baja` int(11) DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_inicial` double NOT NULL,
  `depreciacion_acumulada` double DEFAULT NULL,
  `valor_real` double DEFAULT NULL,
  `annos_vida_util` double NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_motor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_serie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_chapa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_chasis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `combustible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `fecha_ultima_depreciacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo_fijo_cuentas`
--

CREATE TABLE `activo_fijo_cuentas` (
  `id` int(11) NOT NULL,
  `id_activo_id` int(11) NOT NULL,
  `id_cuenta_activo_id` int(11) NOT NULL,
  `id_subcuenta_activo_id` int(11) NOT NULL,
  `id_centro_costo_activo_id` int(11) NOT NULL,
  `id_area_responsabilidad_activo_id` int(11) NOT NULL,
  `id_cuenta_depreciacion_id` int(11) NOT NULL,
  `id_subcuenta_depreciacion_id` int(11) NOT NULL,
  `id_cuenta_gasto_id` int(11) NOT NULL,
  `id_subcuenta_gasto_id` int(11) NOT NULL,
  `id_centro_costo_gasto_id` int(11) NOT NULL,
  `id_elemento_gasto_gasto_id` int(11) NOT NULL,
  `id_cuenta_acreedora_id` int(11) DEFAULT NULL,
  `id_subcuenta_acreedora_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo_fijo_movimiento_activo_fijo`
--

CREATE TABLE `activo_fijo_movimiento_activo_fijo` (
  `id` int(11) NOT NULL,
  `id_activo_fijo_id` int(11) NOT NULL,
  `id_movimiento_activo_fijo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acumulado_vacaciones`
--

CREATE TABLE `acumulado_vacaciones` (
  `id` int(11) NOT NULL,
  `id_empleado_id` int(11) NOT NULL,
  `dias` double NOT NULL,
  `dinero` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE `aeropuerto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajuste`
--

CREATE TABLE `ajuste` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `nro_cuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_concecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `entrada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `id_unidad_id`, `descripcion`, `activo`, `codigo`) VALUES
(1, 1, 'Almacén de Materiales y Mercancias', 1, '01'),
(2, 1, 'Almacén Mercancias para la Venta', 1, '02'),
(3, 1, 'Almacén de Productos Terminados', 1, '03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_ocupado`
--

CREATE TABLE `almacen_ocupado` (
  `id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenidades`
--

CREATE TABLE `amenidades` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenidades_hotel`
--

CREATE TABLE `amenidades_hotel` (
  `id` int(11) NOT NULL,
  `id_hotel_id` int(11) NOT NULL,
  `id_amenidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apertura`
--

CREATE TABLE `apertura` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `nro_cuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_concecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `entrada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_responsabilidad`
--

CREATE TABLE `area_responsabilidad` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_documento_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_tipo_comprobante_id` int(11) DEFAULT NULL,
  `id_comprobante_id` int(11) DEFAULT NULL,
  `id_factura_id` int(11) DEFAULT NULL,
  `id_activo_fijo_id` int(11) DEFAULT NULL,
  `id_area_responsabilidad_id` int(11) DEFAULT NULL,
  `id_cotizacion_id` int(11) DEFAULT NULL,
  `id_elemento_visa_id` int(11) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `anno` int(11) NOT NULL,
  `credito` double DEFAULT NULL,
  `debito` double DEFAULT NULL,
  `nro_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden_operacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_pagos`
--

CREATE TABLE `avisos_pagos` (
  `id` int(11) NOT NULL,
  `id_plazo_pago_id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios_clientes`
--

CREATE TABLE `beneficiarios_clientes` (
  `id` int(11) NOT NULL,
  `id_cliente_id` int(11) NOT NULL,
  `id_pais_id` int(11) NOT NULL,
  `id_provincia_id` int(11) NOT NULL,
  `id_municipio_id` int(11) NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_alternativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido_alternativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido_alternativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_casa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edificio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reparto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `activo`) VALUES
(1, 'Administrador del Sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `json` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `empleado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_cliente`
--

CREATE TABLE `categoria_cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefijo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_cliente`
--

INSERT INTO `categoria_cliente` (`id`, `nombre`, `prefijo`) VALUES
(1, 'Factura de Crédito Fiscal', 'B01'),
(2, 'Factura de Consumo', 'B02'),
(3, 'Nota de Débito', 'B03'),
(4, 'Nota de Crédito', 'B04'),
(5, 'Comprobante de Compra', 'B11'),
(6, 'Registro Único de Ingreso', 'B12'),
(7, 'Comprobante para Gastos Menor', 'B13'),
(8, 'Comprobante para Regímen Especial', 'B14'),
(9, 'Comprobante Gubernamental', 'B15'),
(10, 'Comprobante para Exportación', 'B16'),
(11, 'Comprobante de Pago al Exterior', 'B17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costo`
--

CREATE TABLE `centro_costo` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `centro_costo`
--

INSERT INTO `centro_costo` (`id`, `id_unidad_id`, `activo`, `codigo`, `nombre`) VALUES
(22, 1, 1, '0150', 'Combo de aseo'),
(23, 1, 1, '0160', 'Combo de Medicamento'),
(24, 1, 1, '0170', 'Combo de Alimento'),
(25, 1, 1, '0180', 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre`
--

CREATE TABLE `cierre` (
  `id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_usuario_id` int(11) DEFAULT NULL,
  `diario` tinyint(1) NOT NULL,
  `mes` int(11) DEFAULT NULL,
  `anno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `saldo` double NOT NULL,
  `abierto` tinyint(1) DEFAULT NULL,
  `debito` double NOT NULL,
  `credito` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_diario`
--

CREATE TABLE `cierre_diario` (
  `id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `fecha_cerrado` date NOT NULL,
  `fecha_cerrado_real` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion_empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `token`, `fecha`, `usuario`, `comentario`, `telefono`, `identificacion_empresa`) VALUES
(1, 'Adrian', 'Gonzalez', 'adrian@solyag.com', NULL, NULL, NULL, NULL, NULL, '8295540346', NULL),
(2, 'Adrian', 'Gonzalez', NULL, 'John F kEENDY', NULL, NULL, NULL, NULL, '829554046', NULL),
(3, 'jesus', 'sole', 'horizontes86@gmail.com', 'sarasota', NULL, NULL, NULL, NULL, '8492690312', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_contabilidad`
--

CREATE TABLE `cliente_contabilidad` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_solicitudes`
--

CREATE TABLE `cliente_solicitudes` (
  `id` int(11) NOT NULL,
  `id_cliente_id` int(11) NOT NULL,
  `id_solicitud_id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros_pagos`
--

CREATE TABLE `cobros_pagos` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) DEFAULT NULL,
  `id_informe_id` int(11) DEFAULT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `id_movimiento_activo_fijo_id` int(11) DEFAULT NULL,
  `debito` double DEFAULT NULL,
  `credito` double DEFAULT NULL,
  `id_tipo_cliente` int(11) DEFAULT NULL,
  `id_cliente_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_cierre`
--

CREATE TABLE `comprobante_cierre` (
  `id` int(11) NOT NULL,
  `id_comprobante_id` int(11) NOT NULL,
  `id_cierre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_movimiento_activo_fijo`
--

CREATE TABLE `comprobante_movimiento_activo_fijo` (
  `id` int(11) NOT NULL,
  `id_registro_comprobante_id` int(11) NOT NULL,
  `id_movimiento_activo_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_salario`
--

CREATE TABLE `comprobante_salario` (
  `id` int(11) NOT NULL,
  `id_registro_comprobante_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `quincena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_inicial`
--

CREATE TABLE `configuracion_inicial` (
  `id` int(11) NOT NULL,
  `id_modulo_id` int(11) NOT NULL,
  `id_tipo_documento_id` int(11) NOT NULL,
  `deudora` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `str_cuentas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_subcuentas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_elemento_gasto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_cuentas_contrapartida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_subcuentas_contrapartida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_reglas_remesas`
--

CREATE TABLE `configuracion_reglas_remesas` (
  `id` int(11) NOT NULL,
  `id_pais_id` int(11) NOT NULL,
  `id_proveedor_id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `minimo` double NOT NULL,
  `maximo` double NOT NULL,
  `valor_fijo_costo` double DEFAULT NULL,
  `porciento_costo` double DEFAULT NULL,
  `valor_fijo_venta` double DEFAULT NULL,
  `porciento_venta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_precio_venta_servicio`
--

CREATE TABLE `config_precio_venta_servicio` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `identificador_servicio` int(11) NOT NULL,
  `prociento` double DEFAULT NULL,
  `valor_fijo` double DEFAULT NULL,
  `precio_venta_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_servicios`
--

CREATE TABLE `config_servicios` (
  `id` int(11) NOT NULL,
  `id_servicio_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `minimo` double NOT NULL,
  `porciento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivo_servicio`
--

CREATE TABLE `consecutivo_servicio` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_servicio_id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `consecutivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos_cliente`
--

CREATE TABLE `contratos_cliente` (
  `id` int(11) NOT NULL,
  `id_cliente_id` int(11) NOT NULL,
  `id_moneda_id` int(11) NOT NULL,
  `nro_contrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `fecha_aprobado` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `importe` double NOT NULL,
  `resto` double DEFAULT NULL,
  `id_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `edit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `empleado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagado` tinyint(1) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `fecha_factura` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `nro_consecutivo` int(11) NOT NULL,
  `tipo_plazo_pago` int(11) DEFAULT NULL,
  `fecha_maxima_pago` date DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos_precio_venta`
--

CREATE TABLE `creditos_precio_venta` (
  `id` int(11) NOT NULL,
  `id_config_precio_venta_id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `identificador_servicio` int(11) NOT NULL,
  `credito` tinyint(1) DEFAULT NULL,
  `importe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio_analisis`
--

CREATE TABLE `criterio_analisis` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `criterio_analisis`
--

INSERT INTO `criterio_analisis` (`id`, `nombre`, `abreviatura`, `activo`) VALUES
(1, 'ALMACéN', 'ALM', 1),
(2, 'UNIDADES', 'UNID', 1),
(3, 'CENTROS DE COSTO', 'CCT', 1),
(4, 'OBJETOS DE OBRAS', 'OBO', 1),
(5, 'ELEMENTOS DE GASTOS', 'EG', 1),
(6, 'CLIENTES Y PROVEEDORES', 'CLIPRO', 1),
(7, 'TARJETAS MAGNETICAS', 'TM', 1),
(8, 'TRABAJADORES', 'TRAB', 1),
(9, 'PROYECTOS', 'PRO', 1),
(10, 'ORDEN DE TRABAJO', 'OT', 1),
(11, 'EXPEDIENTE', 'EXP', 1),
(12, 'AREAS DE RESPONSABILIDAD', 'AR', 1),
(13, 'GRUPOS DE ACTIVOS FIJOS', 'GA', 1),
(14, 'CREDITOS  BANCARIOS', 'CRB', 1),
(15, 'ACCIONISTAS', 'ACC', 1),
(16, 'CUENTAS DE INGRESOS', 'ING', 1),
(17, 'CUENTAS DE GASTOS', 'GAT', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadre_diario`
--

CREATE TABLE `cuadre_diario` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_cierre_id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `str_analisis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `debito` double NOT NULL,
  `credito` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `id_tipo_cuenta_id` int(11) NOT NULL,
  `nro_cuenta` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deudora` tinyint(1) NOT NULL,
  `mixta` tinyint(1) NOT NULL,
  `obligacion_deudora` tinyint(1) NOT NULL,
  `obligacion_acreedora` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `produccion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `id_tipo_cuenta_id`, `nro_cuenta`, `nombre`, `deudora`, `mixta`, `obligacion_deudora`, `obligacion_acreedora`, `activo`, `produccion`) VALUES
(1, 1, 103, 'Efectivo en Caja', 1, 0, 0, 0, 1, 0),
(2, 1, 109, 'Efectivo en Banco', 1, 0, 0, 0, 1, 0),
(3, 1, 131, 'Efectos por Cobrar a Corto Plazo', 1, 0, 1, 0, 1, 0),
(4, 1, 134, 'Cuenta en Participacion', 1, 0, 1, 0, 1, 0),
(5, 1, 142, 'Prestamos y Otras Operaciones Crediticias', 1, 0, 0, 0, 1, 0),
(6, 1, 146, 'Pagos Anticipados a Suministradores', 1, 0, 0, 0, 1, 0),
(7, 1, 160, 'Anticipos a Justificar', 1, 0, 0, 0, 1, 0),
(8, 1, 135, 'Cuentas por Cobrar', 1, 0, 1, 0, 1, 0),
(9, 1, 164, 'Adeudos con el  Estado', 1, 0, 0, 0, 1, 0),
(10, 1, 183, 'Materias Primas y Materiales', 1, 0, 0, 0, 1, 0),
(11, 1, 184, 'Combustible  Lubricantes', 1, 0, 0, 0, 1, 0),
(12, 1, 185, 'Partes  y  Piezas de  Repuesto', 1, 0, 0, 0, 1, 0),
(13, 1, 187, 'Utiles y Herramientas', 1, 0, 0, 0, 1, 0),
(14, 1, 188, 'Produccion Terminada', 1, 0, 0, 0, 1, 0),
(15, 1, 189, 'Mercancias para la Venta', 1, 0, 0, 0, 1, 0),
(16, 1, 190, 'Medicamentos', 1, 0, 0, 0, 1, 0),
(17, 1, 193, 'Alimentos', 1, 0, 0, 0, 1, 0),
(18, 2, 216, 'Efectos por Cobrar a Largo Plazo', 1, 0, 1, 0, 1, 0),
(19, 2, 220, 'Cuentas por Cobrar a Largo Plazo', 1, 0, 1, 0, 1, 0),
(20, 2, 225, 'Prestamos Concedidos a Largo Plazo', 1, 0, 1, 0, 1, 0),
(21, 2, 227, 'Inversiones a Largo Plazo', 1, 0, 0, 0, 1, 0),
(22, 3, 240, 'Activos Fijos', 1, 0, 0, 0, 1, 0),
(23, 3, 255, 'Activos Fijos Intangibles', 1, 0, 0, 0, 1, 0),
(24, 3, 265, 'Inversiones en Proceso', 1, 0, 0, 0, 1, 0),
(25, 3, 290, 'Compra de Activos Fijos', 1, 0, 1, 0, 1, 0),
(26, 3, 292, 'Compra de Activos Fijos Intangibles', 1, 0, 1, 0, 1, 0),
(27, 4, 300, 'Gastos de Produccion y Servicios Diferidos', 1, 0, 0, 0, 1, 0),
(28, 4, 306, 'Gastos Financieros Diferidos', 1, 0, 0, 0, 1, 0),
(29, 5, 330, 'Perdida en Investigacion', 1, 0, 0, 0, 1, 0),
(30, 5, 332, 'Faltantes de Bienes', 1, 0, 0, 0, 1, 0),
(31, 2, 335, 'Cuentas por Cobrar Diversas', 1, 0, 1, 0, 1, 0),
(32, 6, 373, 'Desgaste de Utiles y Herramientas', 0, 0, 0, 0, 1, 0),
(33, 6, 375, 'Depreciacion de Activos Fijos Tangibles', 0, 0, 0, 0, 1, 0),
(34, 6, 390, 'Amortizacion de Activos Fijos Intangibles', 0, 0, 0, 0, 1, 0),
(35, 7, 401, 'Efectos por pagar a Corto Plazo', 0, 0, 0, 1, 1, 0),
(36, 7, 405, 'Cuentas por pagar a Corto Plazo', 0, 0, 0, 1, 1, 0),
(37, 7, 421, 'Cuentas por Pagar - Activos Fijos', 0, 0, 0, 1, 1, 0),
(38, 7, 425, 'Cuentas por Pagar del Proceso Inversionista', 0, 0, 0, 1, 1, 0),
(39, 7, 430, 'Cobros Anticipados', 0, 0, 0, 1, 1, 0),
(40, 7, 435, 'Depositos Recibidos', 0, 0, 0, 1, 1, 0),
(41, 7, 440, 'Obligacion con el Estado', 0, 0, 0, 1, 1, 0),
(42, 7, 455, 'Nominas por Pagar', 0, 0, 0, 1, 1, 0),
(43, 7, 470, 'Prestamos Recibidos', 0, 0, 0, 1, 1, 0),
(44, 7, 492, 'Provision para Vacaciones', 0, 0, 0, 0, 1, 0),
(45, 8, 510, 'Efectos por pagar a largo plazo', 0, 0, 0, 1, 1, 0),
(46, 8, 515, 'Cuentas por Pagar a Largo Plazo', 0, 0, 0, 1, 1, 0),
(47, 8, 520, 'Prestamos Recibidos a Largo Plazo', 0, 0, 0, 1, 1, 0),
(48, 8, 540, 'Bonos por Pagar', 0, 0, 0, 1, 1, 0),
(49, 9, 545, 'Ingresos Diferidos', 0, 0, 0, 0, 1, 0),
(50, 10, 555, 'Sobrantes en Investigacion', 0, 0, 0, 0, 1, 0),
(51, 10, 565, 'Cuentas por Pagar Diversas', 0, 0, 0, 0, 1, 0),
(52, 10, 569, 'Cuentas por Pagar Compra de Monedas', 0, 0, 0, 0, 1, 0),
(53, 10, 570, 'Ingresos de Periodos Futuros', 0, 0, 0, 0, 1, 0),
(54, 11, 600, 'Capital Contable', 0, 0, 0, 0, 1, 0),
(55, 11, 605, 'Acciones por Emitir', 1, 0, 0, 0, 1, 0),
(56, 11, 608, 'Acciones Suscritas', 0, 0, 0, 0, 1, 0),
(57, 11, 615, 'Revalorizacion de Activos Fijos Tangibles', 1, 0, 0, 0, 1, 0),
(58, 11, 620, 'Donaciones Recibidas', 0, 0, 0, 0, 1, 0),
(59, 11, 630, 'Utilidades Retenidas', 0, 0, 0, 0, 1, 0),
(60, 11, 640, 'Perdidas', 1, 0, 0, 0, 1, 0),
(61, 11, 696, 'Operaciones entre Dependencias Activos', 1, 0, 0, 0, 1, 0),
(62, 11, 697, 'Operaciones entre Dependencia Pasivo', 0, 0, 0, 0, 1, 0),
(63, 2, 700, 'Producciones en Proceso', 1, 0, 0, 0, 1, 1),
(64, 12, 730, 'Reparaciones Capitales con Medios Propios', 1, 0, 0, 0, 1, 0),
(65, 13, 800, 'Devoluciones en Ventas', 1, 0, 0, 0, 1, 0),
(66, 13, 806, 'Impuestos por las Ventas', 1, 0, 0, 0, 1, 0),
(67, 13, 810, 'Costo de Ventas de Produccion', 1, 0, 0, 0, 1, 0),
(68, 13, 815, 'Costo de Ventas de Mercancias', 1, 0, 0, 0, 1, 0),
(69, 13, 823, 'Gastos de Administracion', 1, 0, 0, 0, 1, 0),
(70, 13, 819, 'Gastos de Distribucion y Ventas', 1, 0, 0, 0, 1, 0),
(71, 13, 839, 'Gastos por Perdidas en Tasas de Cambio', 1, 0, 0, 0, 1, 0),
(72, 13, 845, 'Gastos por Perdidas', 1, 0, 0, 0, 1, 0),
(73, 13, 850, 'Gastos por Faltantes', 1, 0, 0, 0, 1, 0),
(74, 13, 855, 'Otros Impuestos y Contribuciones', 1, 0, 0, 0, 1, 0),
(75, 14, 901, 'Ventas de Mercancias', 0, 0, 0, 0, 1, 0),
(76, 14, 900, 'Ventas de Produccion', 0, 0, 0, 0, 1, 0),
(77, 14, 920, 'Ingresos Financieros', 0, 0, 0, 0, 1, 0),
(78, 14, 924, 'Ingresos por Variacion de Tasas de Cambio', 0, 0, 0, 0, 1, 0),
(79, 14, 930, 'Ingresos por Sobrantes de Bienes', 0, 0, 0, 0, 1, 0),
(80, 14, 950, 'Otros Ingresos', 0, 0, 0, 0, 1, 0),
(81, 14, 953, 'Ingresos por Donaciones Recibidas', 0, 0, 0, 0, 1, 0),
(82, 15, 999, 'Resultados', 0, 1, 0, 0, 1, 0),
(83, 14, 903, 'Venta de Servicios Prestados', 0, 0, 0, 0, 1, 0),
(84, 13, 816, 'Costo de Venta de Servicios Prestados', 1, 0, 0, 0, 1, 0),
(85, 11, 646, 'Reservas para Inversiones', 0, 0, 0, 0, 1, 0),
(86, 8, 526, 'Obligaciones a Largo Plazo', 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cliente`
--

CREATE TABLE `cuentas_cliente` (
  `id` int(11) NOT NULL,
  `id_moneda_id` int(11) NOT NULL,
  `id_cliente_id` int(11) NOT NULL,
  `id_banco_id` int(11) DEFAULT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_unidad`
--

CREATE TABLE `cuentas_unidad` (
  `id` int(11) NOT NULL,
  `id_banco_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_moneda_id` int(11) NOT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_criterio_analisis`
--

CREATE TABLE `cuenta_criterio_analisis` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_criterio_analisis_id` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta_criterio_analisis`
--

INSERT INTO `cuenta_criterio_analisis` (`id`, `id_cuenta_id`, `id_criterio_analisis_id`, `orden`) VALUES
(10, 3, 6, NULL),
(11, 5, 14, NULL),
(13, 6, 6, NULL),
(14, 4, 15, NULL),
(15, 7, 8, NULL),
(16, 8, 6, NULL),
(18, 10, 1, NULL),
(19, 11, 1, NULL),
(21, 13, 1, NULL),
(23, 12, 1, NULL),
(26, 14, 1, NULL),
(28, 16, 1, NULL),
(29, 17, 1, NULL),
(30, 18, 6, NULL),
(31, 19, 6, NULL),
(32, 20, 6, NULL),
(33, 21, 4, NULL),
(36, 23, 2, NULL),
(37, 24, 4, NULL),
(38, 25, 6, NULL),
(39, 26, 6, NULL),
(43, 35, 6, NULL),
(48, 38, 6, NULL),
(51, 36, 6, NULL),
(52, 37, 6, NULL),
(54, 39, 6, NULL),
(55, 40, 6, NULL),
(57, 43, 6, NULL),
(58, 44, 8, NULL),
(59, 45, 6, NULL),
(60, 46, 6, NULL),
(65, 48, 6, NULL),
(66, 50, 11, NULL),
(67, 51, 6, NULL),
(68, 52, 6, NULL),
(69, 55, 15, NULL),
(74, 15, 1, NULL),
(79, 27, 5, NULL),
(80, 28, 11, NULL),
(81, 29, 11, NULL),
(82, 30, 11, NULL),
(83, 31, 6, NULL),
(84, 31, 8, NULL),
(85, 56, 15, NULL),
(96, 64, 4, NULL),
(97, 64, 5, NULL),
(136, 61, 2, 1),
(137, 61, 1, 2),
(138, 63, 3, 1),
(139, 63, 10, 2),
(140, 63, 5, 3),
(141, 62, 2, 1),
(142, 62, 1, 2),
(148, 70, 3, 1),
(149, 70, 5, 2),
(155, 69, 3, 1),
(156, 69, 5, 2),
(160, 22, 12, 2),
(161, 22, 3, 3),
(162, 86, 6, 1),
(164, 42, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_user`
--

CREATE TABLE `custom_user` (
  `id` int(11) NOT NULL,
  `id_user_id` int(11) NOT NULL,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depreciacion`
--

CREATE TABLE `depreciacion` (
  `id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `anno` int(11) NOT NULL,
  `fundamentacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuestos_servicios_cotizacion`
--

CREATE TABLE `descuestos_servicios_cotizacion` (
  `id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `id_servicio_id` int(11) NOT NULL,
  `descuento` double NOT NULL,
  `fijo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_orden_tabajo_id` int(11) DEFAULT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nro_concecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`id`, `pais_id`, `moneda_id`, `nombre`, `telefono`, `email`, `identificacion`, `activo`) VALUES
(1, 1, 4, 'Camilo Alberto', '55816826', 'kahveahd@gmail.com', '89102815009', 0),
(2, 1, 4, 'Maikel Exposito Martinez', '54730685', 'maikelexpmartinez@gmail.com', '92092928189', 1),
(3, 1, 4, 'gkhjgn yfhjg ylhgjk', '54824547', 'horizontes86@gmail.com', '45784754845', 0),
(4, 1, 4, 'jb', '1424', 'no.@gmail.com', 'no', 0),
(5, 1, 4, 'Elizardo Ríos Morales', '52714739', 'no@gmail.com', 'no', 1),
(6, 1, 4, 'Mario Martin Pages', '55776339', 'no@gmail.com', 'no', 1),
(7, 1, 4, 'José Carlos Pérez Moreno', '54602465', 'no@gmail.com', 'no', 1),
(8, 1, 4, 'Ramon Martínez Vidal', '52538840', 'no@gmail.com', 'no', 1),
(9, 1, 4, 'Lázaro López Hernández', '53693714', 'no@gmail.com', 'no', 1),
(10, 1, 4, 'Jessica Morales Paradela', '53519871', 'no@gmail.com', 'no', 1),
(11, 1, 4, 'Saidel Quintana Charbonier', '54545233', 'no@gmail.com', 'no', 1),
(12, 1, 4, 'Daymara Molina Gomez', '58031968', 'no@gmail.com', 'no', 1),
(13, 1, 4, 'Yordanka Fagundo Borrego', '58407584', 'no@gmail.com', 'no', 1),
(14, 1, 4, 'Marisvel Orozco Betancourt', '54763181', 'no@gmail.com', 'no', 1),
(15, 1, 4, 'Katerin Alonso Arencibia', '58117743', 'no@gmail.com', 'no', 1),
(16, 1, 4, 'Sergio Aguila Guerra', '52837250', 'no@gmail.com', 'no', 1),
(17, 1, 4, 'Javier Alejandro Ferrer Prado', '58527495', 'no@gmail.com', 'no', 1),
(18, 1, 4, 'Antonio Luis Valdivia Valdivis', '53068957', 'no@gmail.com', 'no', 1),
(19, 1, 4, 'Miriulky Oliva Bastida', '54474687', 'no@gmail.com', 'no', 1),
(20, 1, 4, 'Orisbel Fuentes Gonzalez', '54476870', 'no@gmail.com', 'no', 1),
(21, 1, 4, 'Iris Morales Buchillon', '58918362', 'no@gmail.com', 'no', 1),
(22, 1, 4, 'Karen Caceres Gomez', '53936639', 'no@gmail.com', 'no', 1),
(23, 1, 4, 'Sergio Gonzalez Castro', '58252628', 'no@gmail.com', 'no', 1),
(24, 1, 4, 'Marcos Omelio Sanchez Roldan', '58636944', 'no@gmail.com', 'no', 1),
(25, 1, 4, 'Reinaldo Rivero Marrero', '52614104', 'no@gmail.com', 'no', 1),
(26, 1, 4, 'Karina Pupo Quiala', '55047677', 'no@gmail.com', 'no', 1),
(27, 1, 4, 'Miriela Perez Silva', '52046412', 'no@gmail.com', 'no', 1),
(28, 1, 4, 'Marisol Socarras Sariol', '58222778', 'no@gmail.com', 'no', 1),
(29, 1, 4, 'Yordan Carcases Cedeno', '58552369', 'no@gmail.com', 'no', 1),
(30, 1, 4, 'Jose Luis Sensat De La Paz', '53088577', 'no@gmail.com', 'no', 1),
(31, 1, 4, 'Pedro Jose Sanchez Rodriguez', '52152017', 'no@gmail.com', 'no', 1),
(32, 1, 4, 'Lourdes Calvo Garcia', '58289967', 'no@gmail.com', 'NO', 1),
(33, 1, 4, 'Senia Almaguer Cuenca', '54558908', 'no@gmail.com', 'NO', 1),
(34, 1, 4, 'Milagros Marteatus Guerra', '55791157', 'no@gmail.com', 'no', 1),
(35, 1, 4, 'saddsada', 'dasadds', 'asdassd@gmail.com', 'ssada', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor_provincias`
--

CREATE TABLE `distribuidor_provincias` (
  `id` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `provincias_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidor_provincias`
--

INSERT INTO `distribuidor_provincias` (`id`, `distribuidor_id`, `provincias_id`, `activo`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 0),
(3, 2, 6, 0),
(4, 2, 7, 1),
(5, 2, 8, 0),
(6, 3, 2, 1),
(7, 4, 5, 1),
(8, 5, 2, 1),
(9, 6, 2, 1),
(10, 7, 2, 1),
(11, 8, 2, 1),
(12, 9, 2, 1),
(13, 10, 6, 1),
(14, 11, 6, 1),
(15, 12, 8, 1),
(16, 13, 3, 1),
(17, 14, 3, 1),
(18, 15, 3, 1),
(19, 16, 5, 1),
(20, 17, 5, 1),
(21, 18, 10, 1),
(22, 19, 10, 1),
(23, 20, 10, 1),
(24, 21, 11, 1),
(25, 22, 9, 1),
(26, 23, 9, 1),
(27, 24, 12, 1),
(28, 25, 14, 1),
(29, 26, 14, 1),
(30, 27, 13, 1),
(31, 28, 15, 1),
(32, 29, 4, 1),
(33, 30, 4, 1),
(34, 31, 16, 1),
(35, 32, 2, 1),
(36, 33, 3, 1),
(37, 34, 3, 1),
(38, 35, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor_saldo`
--

CREATE TABLE `distribuidor_saldo` (
  `id` int(11) NOT NULL,
  `distribuidor_id` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidor_saldo`
--

INSERT INTO `distribuidor_saldo` (`id`, `distribuidor_id`, `moneda_id`, `saldo`) VALUES
(1, 1, 4, 0),
(2, 2, 4, 0),
(3, 3, 4, 0),
(4, 4, 4, 0),
(5, 5, 4, 0),
(6, 6, 4, 0),
(7, 7, 4, 0),
(8, 8, 4, 0),
(9, 9, 4, 0),
(10, 10, 4, 0),
(11, 11, 4, 0),
(12, 12, 4, 0),
(13, 13, 4, 0),
(14, 14, 4, 0),
(15, 15, 4, 0),
(16, 16, 4, 0),
(17, 17, 4, 0),
(18, 18, 4, 0),
(19, 19, 4, 0),
(20, 20, 4, 0),
(21, 21, 4, 0),
(22, 22, 4, 0),
(23, 23, 4, 0),
(24, 24, 4, 0),
(25, 25, 4, 0),
(26, 26, 4, 0),
(27, 27, 4, 0),
(28, 28, 4, 0),
(29, 29, 4, 0),
(30, 30, 4, 0),
(31, 31, 4, 0),
(32, 32, 4, 0),
(33, 33, 4, 0),
(34, 34, 4, 0),
(35, 34, 1, 0),
(36, 35, 4, 0),
(37, 35, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor_zona`
--

CREATE TABLE `distribuidor_zona` (
  `id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `comision` double NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidor_zona`
--

INSERT INTO `distribuidor_zona` (`id`, `zona_id`, `distribuidor_id`, `comision`, `activo`) VALUES
(1, 1, 1, 2, 1),
(2, 2, 18, 3, 0),
(3, 3, 18, 2, 0),
(4, 4, 18, 3, 0),
(5, 3, 7, 50, 1),
(6, 2, 7, 75, 1),
(7, 4, 7, 75, 1),
(8, 5, 7, 75, 1),
(9, 6, 7, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210519021953', '2021-05-19 04:20:37', 603796);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_moneda_id` int(11) NOT NULL,
  `id_tipo_documento_id` int(11) DEFAULT NULL,
  `id_documento_cancelado_id` int(11) DEFAULT NULL,
  `importe_total` double NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `anno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos_visa`
--

CREATE TABLE `elementos_visa` (
  `id` int(11) NOT NULL,
  `id_proveedor_id` int(11) NOT NULL,
  `id_servicio_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento_gasto`
--

CREATE TABLE `elemento_gasto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elemento_gasto`
--

INSERT INTO `elemento_gasto` (`id`, `codigo`, `descripcion`, `activo`) VALUES
(1, '1001', 'Materiales de Oficina', 1),
(2, '1002', 'Materiales y Productos de Aseo', 1),
(3, '1003', 'Alimentos', 1),
(4, '1004', 'Materiales de Limpieza', 1),
(5, '1005', 'Desgaste de Utiles y Herramientas', 1),
(6, '1006', 'Piezas de Repuestos', 1),
(7, '1007', 'Otros Materiales', 1),
(8, '3001', 'Gasolina', 1),
(9, '3002', 'Diesel', 1),
(10, '3003', 'Grasas y Lubricantes', 1),
(11, '3004', 'Otros Combustibles', 1),
(12, '4001', 'Energia Electrica', 1),
(13, '5001', 'Gasto de Sueldo', 1),
(14, '5002', 'Seguridad Social', 1),
(15, '5003', 'Vacaciones', 1),
(16, '6001', 'Impuestos Utilizacion Fuerza de Trabajo', 1),
(17, '7001', 'Depreciacion de Activos Fijos', 1),
(18, '7002', 'Amortizacion de Gastos Diferidos', 1),
(19, '8001', 'Servicios de Reparacion y Mantenimiento', 1),
(20, '8002', 'Servicios de Comunicaciones', 1),
(21, '8003', 'Servicios de Transportacion', 1),
(22, '8004', 'Viaticos', 1),
(23, '8005', 'Otros Servicios', 1),
(24, 'Traspasos de Gastos Indirectos', '9000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_cargo_id` int(11) DEFAULT NULL,
  `id_usuario_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `baja` tinyint(1) NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `direccion_particular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo_bruto_mensual` double DEFAULT NULL,
  `salario_x_hora` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `id_unidad_id`, `id_cargo_id`, `id_usuario_id`, `nombre`, `correo`, `fecha_alta`, `baja`, `fecha_baja`, `direccion_particular`, `telefono`, `rol`, `activo`, `identificacion`, `sueldo_bruto_mensual`, `salario_x_hora`) VALUES
(1, 1, 1, 1, 'root@solyag.com', 'admin@solyag.com', '2020-10-28', 0, NULL, 'Calle A', '555555555', 'ROLE_ADMIN', 1, '89102815009', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`, `orden`, `activo`, `color`) VALUES
(1, 'Pendiente', 1, 1, '#DDDBDB'),
(2, 'Asignada', 2, 1, '#0C2EC0'),
(3, 'En Proceso', 3, 1, '#84C0F7'),
(4, 'Distribución', 4, 1, '#18B437'),
(5, 'Entregada', 5, 1, '#9A710A'),
(6, 'Cancelada', 6, 1, '#F10000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_solicitudes`
--

CREATE TABLE `estado_solicitudes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilidades`
--

CREATE TABLE `facilidades` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilidades_hotel`
--

CREATE TABLE `facilidades_hotel` (
  `id` int(11) NOT NULL,
  `id_hotel_id` int(11) NOT NULL,
  `id_facilidades_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `id_contrato_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_categoria_cliente_id` int(11) DEFAULT NULL,
  `id_termino_pago_id` int(11) DEFAULT NULL,
  `id_moneda_id` int(11) DEFAULT NULL,
  `id_factura_cancela_id` int(11) DEFAULT NULL,
  `fecha_factura` date NOT NULL,
  `tipo_cliente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `cuenta_obligacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcuenta_obligacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `importe` double NOT NULL,
  `contabilizada` tinyint(1) DEFAULT NULL,
  `ncf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelada` tinyint(1) DEFAULT NULL,
  `motivo_cancelacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servicio` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_comprobante`
--

CREATE TABLE `facturas_comprobante` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) NOT NULL,
  `id_comprobante_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_cotizacion`
--

CREATE TABLE `factura_cotizacion` (
  `id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_categoria_cliente_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `ncf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_documento`
--

CREATE TABLE `factura_documento` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_movimiento_venta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_activos`
--

CREATE TABLE `grupo_activos` (
  `id` int(11) NOT NULL,
  `porciento_deprecia_anno` double NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones_hotel`
--

CREATE TABLE `habitaciones_hotel` (
  `id` int(11) NOT NULL,
  `id_amenidades_id` int(11) NOT NULL,
  `id_hotel_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locacion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `descripcion_hotel` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `politicas_hotel` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresora`
--

CREATE TABLE `impresora` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nombre_impresora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `impresora`
--

INSERT INTO `impresora` (`id`, `id_unidad_id`, `nombre_impresora`, `puesto_trabajo`, `activo`) VALUES
(1, 1, 'PS-80', 'Puesto de Trabajo 1', 1),
(2, 1, 'PS-81', 'Puesto de Trabajo 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto`
--

CREATE TABLE `impuesto` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos_servicio_cotizacion`
--

CREATE TABLE `impuestos_servicio_cotizacion` (
  `id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `id_servicio_id` int(11) NOT NULL,
  `id_impuesto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto_sobre_renta`
--

CREATE TABLE `impuesto_sobre_renta` (
  `id` int(11) NOT NULL,
  `id_empleado_id` int(11) NOT NULL,
  `id_nomina_pago_id` int(11) NOT NULL,
  `id_rango_escala_id` int(11) NOT NULL,
  `seguridad_social_mensual` double DEFAULT NULL,
  `salario_bruto_anual` double NOT NULL,
  `seguridad_social_anual` double DEFAULT NULL,
  `salario_despues_seguridad_social` double NOT NULL,
  `monto_segun_rango` double DEFAULT NULL,
  `monto_segun_rango_escala` double DEFAULT NULL,
  `excedente_segun_rango_escala` double DEFAULT NULL,
  `por_ciento_impuesto_excedente` double DEFAULT NULL,
  `monto_adicional_rango_escala` double DEFAULT NULL,
  `impuesto_renta_pagar_anual` double DEFAULT NULL,
  `impuesto_renta_pagar_mensual` double DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_recepcion`
--

CREATE TABLE `informe_recepcion` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `nro_cuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_concecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `codigo_factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `producto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento_cobro`
--

CREATE TABLE `instrumento_cobro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instrumento_cobro`
--

INSERT INTO `instrumento_cobro` (`id`, `nombre`, `activo`) VALUES
(1, 'Cheque', 1),
(2, 'Transferencia', 1),
(3, 'Efectivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `zona_id`, `nombre`, `habilitado`, `activo`) VALUES
(1, 1, 'Zona Colonial', 1, 1),
(2, 2, 'Bavaro Palace', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancia`
--

CREATE TABLE `mercancia` (
  `id` int(11) NOT NULL,
  `id_amlacen_id` int(11) NOT NULL,
  `id_unidad_medida_id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `existencia` double NOT NULL,
  `importe` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_venta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancia_impuesto`
--

CREATE TABLE `mercancia_impuesto` (
  `id` int(11) NOT NULL,
  `mercancia_id` int(11) DEFAULT NULL,
  `impuesto_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancia_producto`
--

CREATE TABLE `mercancia_producto` (
  `id` int(11) NOT NULL,
  `id_mercancia_id` int(11) NOT NULL,
  `id_producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `nombre`, `activo`) VALUES
(1, 'USD', 1),
(2, 'EUR', 1),
(3, 'RD$', 1),
(4, 'CUP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda_pais`
--

CREATE TABLE `moneda_pais` (
  `id` int(11) NOT NULL,
  `id_pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `moneda_pais`
--

INSERT INTO `moneda_pais` (`id`, `id_pais`, `id_moneda`, `status`) VALUES
(1, '1', '4', '1'),
(2, '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `id_tipo_documento_activo_fijo_id` int(11) NOT NULL,
  `id_tipo_movimiento_id` int(11) NOT NULL,
  `id_unidad_origen_id` int(11) NOT NULL,
  `id_unidad_destino_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_activo_fijo`
--

CREATE TABLE `movimiento_activo_fijo` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_activo_fijo_id` int(11) NOT NULL,
  `id_tipo_movimiento_id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `id_unidad_destino_origen_id` int(11) DEFAULT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `id_movimiento_cancelado_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `fundamentacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrada` tinyint(1) NOT NULL,
  `nro_consecutivo` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_tipo_cliente` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `nro_factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_mercancia`
--

CREATE TABLE `movimiento_mercancia` (
  `id` int(11) NOT NULL,
  `id_mercancia_id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_tipo_documento_id` int(11) NOT NULL,
  `id_usuario_id` int(11) DEFAULT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `id_factura_id` int(11) DEFAULT NULL,
  `id_movimiento_cancelado_id` int(11) DEFAULT NULL,
  `cantidad` double NOT NULL,
  `importe` double NOT NULL,
  `existencia` double NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `entrada` tinyint(1) NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_subcuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_producto`
--

CREATE TABLE `movimiento_producto` (
  `id` int(11) NOT NULL,
  `id_producto_id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_tipo_documento_id` int(11) NOT NULL,
  `id_usuario_id` int(11) DEFAULT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_factura_id` int(11) DEFAULT NULL,
  `id_movimiento_cancelado_id` int(11) DEFAULT NULL,
  `cantidad` double NOT NULL,
  `importe` double NOT NULL,
  `existencia` double NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `entrada` tinyint(1) NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_subcuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_servicio`
--

CREATE TABLE `movimiento_servicio` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `impuesto` double DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta_nominal_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcuenta_nominal_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double DEFAULT NULL,
  `anno` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_venta`
--

CREATE TABLE `movimiento_venta` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) NOT NULL,
  `id_almacen_id` int(11) NOT NULL,
  `id_centro_costo_acreedor_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_acreedor_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_acreedor_id` int(11) DEFAULT NULL,
  `id_expediente_acreedor_id` int(11) DEFAULT NULL,
  `mercancia` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `descuento_recarga` double DEFAULT NULL,
  `existencia` double DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `cuenta_nominal_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcuenta_nominal_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mercancia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `provincia_id`, `code`, `nombre`, `activo`) VALUES
(1, 1, 'Habana', 'Playa', 1),
(2, 1, 'Habana', 'Marianao', 1),
(3, 1, 'Habana', 'La Lisa', 1),
(4, 2, 'Pinar del Rio', 'Consolación del Sur', 1),
(5, 2, 'Pinar del Rio', 'Guane', 1),
(6, 2, 'Pinar del Rio', 'La Palma', 1),
(7, 2, 'Pinar del Rio', 'Los Palacios', 1),
(8, 2, 'Pinar del Rio', 'Mantua', 1),
(9, 2, 'Pinar del Rio', 'Minas de Matahambre', 1),
(10, 2, 'Pinar del Rio', 'Pinar del Río', 1),
(11, 2, 'Pinar del Rio', 'San Juan y Martínez', 1),
(12, 2, 'Pinar del Rio', 'San Luis', 1),
(13, 2, 'Pinar del Rio', 'Sandino', 1),
(14, 2, 'Pinar del Rio', 'Viñales', 1),
(15, 6, 'Artemisa', 'Alquízar', 1),
(16, 6, 'Artemisa', 'Artemisa', 1),
(17, 6, 'Artemisa', 'Bahía Honda', 1),
(18, 6, 'Artemisa', 'Bauta', 1),
(19, 6, 'Artemisa', 'Caimito', 1),
(20, 6, 'Artemisa', 'Candelaria', 1),
(21, 6, 'Artemisa', 'Guanajay', 1),
(22, 6, 'Artemisa', 'Güira de Melena', 1),
(23, 6, 'Artemisa', 'Mariel', 1),
(24, 6, 'Artemisa', 'San Antonio de los Baños', 1),
(25, 6, 'Artemisa', 'San Cristóbal', 1),
(26, 7, 'La Habana', 'Arroyo Naranjo', 1),
(27, 7, 'La Habana', 'Boyeros', 1),
(28, 7, 'La Habana', 'Centro Habana', 1),
(29, 7, 'La Habana', 'Cerro', 1),
(30, 7, 'La Habana', 'Cotorro', 1),
(31, 7, 'La Habana', 'Diez de Octubre', 1),
(32, 7, 'La Habana', 'Guanabacoa', 1),
(33, 7, 'La Habana', 'La Habana del Este', 1),
(34, 7, 'La Habana', 'La Habana Vieja', 1),
(35, 7, 'La Habana', 'La Lisa', 1),
(36, 7, 'La Habana', 'Marianao', 1),
(37, 7, 'La Habana', 'Playa', 1),
(38, 7, 'La Habana', 'Plaza de la Revolución', 1),
(39, 7, 'La Habana', 'Regla', 1),
(40, 7, 'La Habana', 'San Miguel del Padrón', 1),
(41, 8, 'Mayabeque', 'Batabanó', 1),
(42, 8, 'Mayabeque', 'Bejucal', 1),
(43, 8, 'Mayabeque', 'Güines', 1),
(44, 8, 'Mayabeque', 'Jaruco', 1),
(45, 8, 'Mayabeque', 'Madruga', 1),
(46, 8, 'Mayabeque', 'Melena del Sur', 1),
(47, 8, 'Mayabeque', 'Nueva Paz', 1),
(48, 8, 'Mayabeque', 'Quivicán', 1),
(49, 8, 'Mayabeque', 'San José de las Lajas', 1),
(50, 8, 'Mayabeque', 'San Nicolás', 1),
(51, 8, 'Mayabeque', 'Santa Cruz del Norte', 1),
(52, 3, 'Matanzas', 'Calimete', 1),
(53, 3, 'Matanzas', 'Cárdenas', 1),
(54, 3, 'Matanzas', 'Varadero', 1),
(55, 3, 'Matanzas', 'Ciénaga de Zapata', 1),
(56, 3, 'Matanzas', 'Colón', 1),
(57, 3, 'Matanzas', 'Jagüey Grande', 1),
(58, 3, 'Matanzas', 'Jovellanos', 1),
(59, 3, 'Matanzas', 'Limonar', 1),
(60, 3, 'Matanzas', 'Los Arabos', 1),
(61, 3, 'Matanzas', 'Martí', 1),
(62, 3, 'Matanzas', 'Matanzas', 1),
(63, 3, 'Matanzas', 'Pedro Betancourt', 1),
(64, 3, 'Matanzas', 'Perico', 1),
(65, 3, 'Matanzas', 'Unión de Reyes', 1),
(66, 5, 'Cienfuegos', 'Abreus', 1),
(67, 5, 'Cienfuegos', 'Aguada de Pasajeros', 1),
(68, 5, 'Cienfuegos', 'Cruces', 1),
(69, 5, 'Cienfuegos', 'Cumanayagua', 1),
(70, 5, 'Cienfuegos', 'Lajas', 1),
(71, 5, 'Cienfuegos', 'Palmira', 1),
(72, 5, 'Cienfuegos', 'Rodas', 1),
(73, 5, 'Cienfuegos', 'Cienfuegos', 1),
(74, 5, 'Cienfuegos', 'Santa Isabel de las Lajas', 1),
(75, 9, 'Villa Clara', 'Caibarién', 1),
(76, 9, 'Villa Clara', 'Cayo Santa María', 1),
(77, 9, 'Villa Clara', 'Camajuaní', 1),
(78, 9, 'Villa Clara', 'Cifuentes', 1),
(79, 9, 'Villa Clara', 'Corralillo', 1),
(80, 9, 'Villa Clara', 'Encrucijada', 1),
(81, 9, 'Villa Clara', 'Manicaragua', 1),
(82, 9, 'Villa Clara', 'Placetas', 1),
(83, 9, 'Villa Clara', 'Quemado de Güines', 1),
(84, 9, 'Villa Clara', 'Ranchuelo', 1),
(85, 9, 'Villa Clara', 'Remedios', 1),
(86, 9, 'Villa Clara', 'Sagua la Grande', 1),
(87, 9, 'Villa Clara', 'Santa Clara', 1),
(88, 9, 'Villa Clara', 'Santo Domingo', 1),
(89, 10, 'Sancti Spíritus', 'Cabaiguán', 1),
(90, 10, 'Sancti Spíritus', 'Fomento', 1),
(91, 10, 'Sancti Spíritus', 'Jatibonico', 1),
(92, 10, 'Sancti Spíritus', 'La Sierpe', 1),
(93, 10, 'Sancti Spíritus', 'Sancti Spíritus', 1),
(94, 10, 'Sancti Spíritus', 'Taguasco', 1),
(95, 10, 'Sancti Spíritus', 'Trinidad', 1),
(96, 10, 'Sancti Spíritus', 'Yaguajay', 1),
(97, 11, 'Ciego de Ávila', 'Baraguá', 1),
(98, 11, 'Ciego de Ávila', 'Bolivia', 1),
(99, 11, 'Ciego de Ávila', 'Chambas', 1),
(100, 11, 'Ciego de Ávila', 'Ciego de Ávila', 1),
(101, 11, 'Ciego de Ávila', 'Ciro Redondo', 1),
(102, 11, 'Ciego de Ávila', 'Majagua', 1),
(103, 11, 'Ciego de Ávila', 'Florencia', 1),
(104, 11, 'Ciego de Ávila', 'Morón', 1),
(105, 11, 'Ciego de Ávila', 'Primero de Enero', 1),
(106, 11, 'Ciego de Ávila', 'Venezuela', 1),
(107, 12, 'Camagüey', 'Camagüey', 1),
(108, 12, 'Camagüey', 'Carlos M. de Céspedes', 1),
(109, 12, 'Camagüey', 'Esmeralda', 1),
(110, 12, 'Camagüey', 'Florida', 1),
(111, 12, 'Camagüey', 'Guáimaro', 1),
(112, 12, 'Camagüey', 'Jimaguayú', 1),
(113, 12, 'Camagüey', 'Minas', 1),
(114, 12, 'Camagüey', 'Najasa', 1),
(115, 12, 'Camagüey', 'Nuevitas', 1),
(116, 12, 'Camagüey', 'Santa Cruz del Sur', 1),
(117, 12, 'Camagüey', 'Sibanicú', 1),
(118, 12, 'Camagüey', 'Sierra de Cubitas', 1),
(119, 12, 'Camagüey', 'Vertientes', 1),
(120, 13, 'Las Tunas', 'Amancio', 1),
(121, 13, 'Las Tunas', 'Colombia', 1),
(122, 13, 'Las Tunas', 'Jesús Menéndez', 1),
(123, 13, 'Las Tunas', 'Las Tunas', 1),
(124, 13, 'Las Tunas', 'Jobabo', 1),
(125, 13, 'Las Tunas', 'Majibacoa', 1),
(126, 13, 'Las Tunas', 'Manatí', 1),
(127, 13, 'Las Tunas', 'Puerto Padre', 1),
(128, 14, 'Holguín', 'Antilla', 1),
(129, 14, 'Holguín', 'Báguanos', 1),
(130, 14, 'Holguín', 'Banes', 1),
(131, 14, 'Holguín', 'Guardalavaca', 1),
(132, 14, 'Holguín', 'Cacocum', 1),
(133, 14, 'Holguín', 'Calixto García', 1),
(134, 14, 'Holguín', 'Frank País', 1),
(135, 14, 'Holguín', 'Cueto', 1),
(136, 14, 'Holguín', 'Gibara', 1),
(137, 14, 'Holguín', 'Holguín', 1),
(138, 14, 'Holguín', 'Mayarí', 1),
(139, 14, 'Holguín', 'Rafael Freyre', 1),
(140, 14, 'Holguín', 'Moa', 1),
(141, 14, 'Holguín', 'Sagua de Tánamo', 1),
(142, 14, 'Holguín', 'Urbano Noris', 1),
(143, 15, 'Granma', 'Bartolomé Masó', 1),
(144, 15, 'Granma', 'Bayamo', 1),
(145, 15, 'Granma', 'Buey Arriba', 1),
(146, 15, 'Granma', 'Campechuela', 1),
(147, 15, 'Granma', 'Cauto Cristo', 1),
(148, 15, 'Granma', 'Guisa', 1),
(149, 15, 'Granma', 'Jiguaní', 1),
(150, 15, 'Granma', 'Manzanillo', 1),
(151, 15, 'Granma', 'Media Luna', 1),
(152, 15, 'Granma', 'Niquero', 1),
(153, 15, 'Granma', 'Pilón', 1),
(154, 15, 'Granma', 'Río Cauto', 1),
(155, 15, 'Granma', 'Yara', 1),
(156, 4, 'Santiago de Cuba', 'Contramaestre', 1),
(157, 4, 'Santiago de Cuba', 'Guamá', 1),
(158, 4, 'Santiago de Cuba', 'Mella', 1),
(159, 4, 'Santiago de Cuba', 'Palma Soriano', 1),
(160, 4, 'Santiago de Cuba', 'San Luis', 1),
(161, 4, 'Santiago de Cuba', 'Santiago de Cuba', 1),
(162, 4, 'Santiago de Cuba', 'Segundo Frente', 1),
(163, 4, 'Santiago de Cuba', 'Songo-La Maya', 1),
(164, 4, 'Santiago de Cuba', 'Tercer Frente', 1),
(165, 16, 'Guantánamo', 'Baracoa', 1),
(166, 16, 'Guantánamo', 'Caimanera', 1),
(167, 16, 'Guantánamo', 'El Salvador', 1),
(168, 16, 'Guantánamo', 'Guantánamo', 1),
(169, 16, 'Guantánamo', 'Imías', 1),
(170, 16, 'Guantánamo', 'Maisí', 1),
(171, 16, 'Guantánamo', 'Manuel Tames', 1),
(172, 16, 'Guantánamo', 'Niceto Pérez', 1),
(173, 16, 'Guantánamo', 'San Antonio del Sur', 1),
(174, 16, 'Guantánamo', 'Yateras', 1),
(175, 17, 'Isla de la Juventud', 'Nueva Gerona', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas_consecutivos`
--

CREATE TABLE `nominas_consecutivos` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `nro_consecutivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina_pago`
--

CREATE TABLE `nomina_pago` (
  `id` int(11) NOT NULL,
  `id_empleado_id` int(11) NOT NULL,
  `id_usuario_aprueba_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `comision` double DEFAULT NULL,
  `vacaciones` double DEFAULT NULL,
  `horas_extra` double DEFAULT NULL,
  `otros` double DEFAULT NULL,
  `total_ingresos` double NOT NULL,
  `ingresos_cotizables_tss` double NOT NULL,
  `isr` double DEFAULT NULL,
  `ars` double DEFAULT NULL,
  `afp` double DEFAULT NULL,
  `cooperativa` double DEFAULT NULL,
  `plan_medico_complementario` double DEFAULT NULL,
  `restaurant` double DEFAULT NULL,
  `total_deducido` double DEFAULT NULL,
  `sueldo_neto_pagar` double DEFAULT NULL,
  `afp_empleador` double DEFAULT NULL,
  `sfs_empleador` double DEFAULT NULL,
  `srl_empleador` double DEFAULT NULL,
  `infotep_empleador` double DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `elaborada` tinyint(1) DEFAULT NULL,
  `aprobada` tinyint(1) DEFAULT NULL,
  `quincena` int(11) NOT NULL,
  `salario_bruto` double DEFAULT NULL,
  `cant_horas_trabajadas` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina_tercero_comprobante`
--

CREATE TABLE `nomina_tercero_comprobante` (
  `id` int(11) NOT NULL,
  `id_nomina_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_comprobante_id` int(11) DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obligacion_cobro`
--

CREATE TABLE `obligacion_cobro` (
  `id` int(11) NOT NULL,
  `id_factura_id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tipo_cliente` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `importe_factura` double NOT NULL,
  `cuenta_obligacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcuenta_obligacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resto_pagar` double NOT NULL,
  `liquidada` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obligacion_pago`
--

CREATE TABLE `obligacion_pago` (
  `id` int(11) NOT NULL,
  `id_proveedor_id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_pagado` double DEFAULT NULL,
  `resto` double NOT NULL,
  `liquidado` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_factura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones_comprobante_operaciones`
--

CREATE TABLE `operaciones_comprobante_operaciones` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `id_registro_comprobantes_id` int(11) NOT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `id_instrumento_cobro_id` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tipo_cliente` int(11) DEFAULT NULL,
  `credito` double NOT NULL,
  `debito` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE `orden_trabajo` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_cotizacion`
--

CREATE TABLE `pagos_cotizacion` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `monto` double NOT NULL,
  `cambio` double DEFAULT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_moneda` int(11) NOT NULL,
  `id_tipo_de_pago` int(11) NOT NULL,
  `id_banco` int(11) DEFAULT NULL,
  `id_cuenta_bancaria` int(11) DEFAULT NULL,
  `numero_confirmacion_deposito` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last4_tarjeta` int(11) DEFAULT NULL,
  `codigo_confirmacion_tarjeta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_de_tarjeta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_transaccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `activo`) VALUES
(1, 'Cuba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_sistema`
--

CREATE TABLE `periodo_sistema` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cerrado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_hotel`
--

CREATE TABLE `plan_hotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazos_pago_cotizacion`
--

CREATE TABLE `plazos_pago_cotizacion` (
  `id` int(11) NOT NULL,
  `id_cotizacion_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cuota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `por_ciento_nominas`
--

CREATE TABLE `por_ciento_nominas` (
  `id` int(11) NOT NULL,
  `por_ciento` double NOT NULL,
  `criterio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denominacion` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_venta`
--

CREATE TABLE `precio_venta` (
  `id` int(11) NOT NULL,
  `tramo` int(11) DEFAULT NULL,
  `poerciento` double DEFAULT NULL,
  `fijo` double DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `id_amlacen_id` int(11) NOT NULL,
  `id_unidad_medida_id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `existencia` double NOT NULL,
  `importe` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_venta` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_impuesto`
--

CREATE TABLE `producto_impuesto` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `impuesto_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_unidad`
--

CREATE TABLE `proveedor_unidad` (
  `id` int(11) NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `unidad_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_unidad_servicios`
--

CREATE TABLE `proveedor_unidad_servicios` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `proveedor_unidad_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `pais_id`, `code`, `nombre`, `id_pais`, `activo`) VALUES
(1, 1, 'Habana', 'Habana', 1, 0),
(2, 1, 'Pinar del Rio', 'Pinar del Rio', 1, 1),
(3, 1, 'Matanzas', 'Matanzas', 1, 1),
(4, 1, 'Santiago de Cuba', 'Santiago de Cuba', 1, 1),
(5, 1, 'Cienfuegos', 'Cienfuegos', 1, 1),
(6, 1, 'Artemisa', 'Artemisa', 1, 1),
(7, 1, 'La Habana', 'La Habana', 1, 1),
(8, 1, 'Mayabeque', 'Mayabeque', 1, 1),
(9, 1, 'Villa Clara', 'Villa Clara', 1, 1),
(10, 1, 'Sancti Spíritus', 'Sancti Spíritus', 1, 1),
(11, 1, 'Ciego de Ávila', 'Ciego de Ávila', 1, 1),
(12, 1, 'Camagüey', 'Camagüey', 1, 1),
(13, 1, 'Las Tunas', 'Las Tunas', 1, 1),
(14, 1, 'Holguín', 'Holguín', 1, 1),
(15, 1, 'Granma', 'Granma', 1, 1),
(16, 1, 'Guantánamo', 'Guantánamo', 1, 1),
(17, 1, 'Isla de la Juventud', 'Isla de la Juventud', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_escala_dgii`
--

CREATE TABLE `rango_escala_dgii` (
  `id` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `escala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `por_ciento` double NOT NULL,
  `minimo` double DEFAULT NULL,
  `maximo` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `valor_fijo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_comprobantes`
--

CREATE TABLE `registro_comprobantes` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_tipo_comprobante_id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_instrumento_cobro_id` int(11) DEFAULT NULL,
  `nro_consecutivo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debito` double NOT NULL,
  `credito` double NOT NULL,
  `anno` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo_cuentas`
--

CREATE TABLE `saldo_cuentas` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_centro_costo_id` int(11) DEFAULT NULL,
  `id_elemento_gasto_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `id_unidad_id` int(11) NOT NULL,
  `id_proveedor_id` int(11) DEFAULT NULL,
  `id_expediente_id` int(11) DEFAULT NULL,
  `id_orden_trabajo_id` int(11) DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `saldo` double NOT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`) VALUES
(1, 'Recarga Cubacell', '0010', 'RC'),
(2, 'Recarga Nauta', '0020', 'RN'),
(3, 'Larga Distancia', '0030', 'LD'),
(4, 'Envio de Remesas', '0040', 'ER'),
(5, 'Boletos Aéreos', '0050', 'BA'),
(6, 'Renta de Hoteles', '0060', 'RH'),
(7, 'Renta de Autos', '0070', 'RA'),
(8, 'Excursiones', '0080', 'E'),
(9, 'Envio de paquetes', '0090', 'EP'),
(10, 'Paquetes Turísticos', '0100', 'PT'),
(11, 'Paquete Turístico Básico', '0110', 'PTB'),
(12, 'Desarrollo de Software', '0120', 'DS'),
(13, 'Diseño', '0130', 'D'),
(14, 'Marketing y redes Sociales', '0140', 'MRS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stripe_factura`
--

CREATE TABLE `stripe_factura` (
  `id` int(11) NOT NULL,
  `auth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_empleado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcuenta`
--

CREATE TABLE `subcuenta` (
  `id` int(11) NOT NULL,
  `id_cuenta_id` int(11) NOT NULL,
  `nro_subcuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elemento_gasto` tinyint(1) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deudora` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcuenta`
--

INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`) VALUES
(1, 1, '0001', 0, 'Efectivo', 1, 1),
(2, 13, '00001', 0, 'En Almacen', 1, 1),
(3, 13, '0002', 0, 'En Uso', 1, 1),
(4, 14, '0020', 0, 'Produccion', 1, 1),
(5, 14, '0030', 0, 'Ventas', 0, 1),
(6, 14, '0040', 0, 'Otros Aumentos', 1, 1),
(7, 14, '0050', 0, 'Otras Disminuciones', 0, 1),
(8, 24, '01', 0, 'Saldo de Inico', 1, 1),
(9, 24, '0010', 0, 'Construccion y Montaje', 1, 1),
(10, 24, '00020', 0, 'Equipos', 1, 1),
(11, 24, '00030', 0, 'Otros Gastos', 1, 1),
(12, 24, '0999', 0, 'Traspaso a Activos Fijos', 0, 1),
(13, 25, '0100', 0, 'Compras del Periodo', 1, 1),
(14, 25, '0300', 0, 'Adquisicion del Periodo por Donaciones', 1, 1),
(15, 25, '0999', 0, 'Traspaso a Activos Fijos Tangibles', 0, 1),
(16, 2, '001', 0, 'fkldjskfljdslkf', 1, 0),
(17, 9, '0001', 0, 'Impuesto sobre las ventas', 1, 1),
(18, 9, '0002', 0, 'Aranceles de Aduana', 1, 1),
(19, 9, '0004', 0, 'Impuesto sobre Utilidades', 1, 1),
(20, 26, '0100', 0, 'Compras del Periodo', 1, 1),
(21, 26, '0999', 0, 'Traspaso a activos fijos intangibles', 0, 1),
(22, 27, '0010', 0, 'Saldo al Incio', 1, 1),
(23, 27, '0020', 1, 'Gastos por Elementos del Periodo', 1, 1),
(24, 27, '0030', 0, 'Amortizacion de Gastos', 0, 1),
(25, 28, '0010', 0, 'Saldo al Inicio', 1, 1),
(26, 28, '0020', 0, 'Gastos del Periodo', 1, 1),
(27, 28, '0030', 0, 'Amortizacion de Gastos', 0, 1),
(28, 29, '0010', 0, 'Perdidas por Deterioros', 1, 1),
(29, 29, '0020', 0, 'Perdidas de Cuentas por Cobrar', 1, 1),
(30, 30, '0010', 0, 'Medios Monetarios', 1, 1),
(31, 30, '0020', 0, 'Medios  Materiales', 1, 1),
(32, 31, '0010', 0, 'Ventas a Entidades', 1, 1),
(33, 31, '0020', 0, 'Ventas a Trabajadores', 1, 1),
(34, 41, '0001', 0, 'Impuesto sobre Ventas', 0, 1),
(35, 41, '0003', 0, 'Aranceles de Aduana', 0, 1),
(36, 41, '0004', 0, 'Impuesto sobre Utilidades', 0, 1),
(37, 41, '0005', 0, 'Impuesto Sobre la Renta', 0, 1),
(38, 54, '0010', 0, 'Compra o Adquisición de Activos Fijos', 0, 1),
(39, 54, '0020', 0, 'Activos Fijos Intangibles', 0, 1),
(40, 54, '0030', 0, 'Recursos Monetarios', 0, 1),
(41, 54, '0040', 0, 'Recursos Materiales-Inventarios', 0, 1),
(42, 47, '0010', 0, 'Prestamos Recibidos de Entidades', 0, 1),
(43, 47, '0020', 0, 'Prestamos Recibidos de Bancos', 0, 1),
(44, 61, '0010', 0, 'Transferencias Recibidas de Unidades', 1, 1),
(45, 61, '0020', 0, 'Transferencias entre Almacenes', 1, 1),
(46, 61, '0099', 0, 'Operaciones de Ajustes en Inventarios', 1, 1),
(47, 62, '0010', 0, 'Transferencias entre Unidades', 0, 1),
(48, 62, '0020', 0, 'Transferencias de Inventarios entre almacenes', 0, 1),
(49, 62, '0099', 0, 'Operaciones de Ajustes de Inventarios', 0, 1),
(50, 63, '0010', 0, 'Saldo Inicio', 1, 1),
(51, 63, '0020', 1, 'Gastos del Periodo', 1, 1),
(52, 63, '0030', 0, 'Aumentos', 1, 1),
(53, 63, '0040', 0, 'Disminuciones', 0, 1),
(54, 63, '0050', 0, 'Traspaso a Produccion Terminada', 0, 1),
(55, 64, '0010', 0, 'Con Terceros', 1, 1),
(56, 64, '0020', 1, 'Con Medios Propios', 1, 1),
(57, 65, '0010', 0, 'Produccion', 1, 1),
(58, 65, '0020', 0, 'Mercancias', 1, 1),
(59, 15, '0010', 0, 'Recargas', 1, 1),
(60, 15, '0020', 0, 'Productos de Aseo y Perfumeria', 1, 1),
(61, 15, '0030', 0, 'Productos Alimenticios', 1, 1),
(62, 15, '0040', 0, 'Otros Productos', 1, 1),
(63, 36, '0010', 0, 'Proveedores Principales', 0, 1),
(64, 36, '0020', 0, 'Otros Proveedores', 0, 1),
(65, 10, '0010', 0, 'Materiales y Productos Aseo', 1, 1),
(66, 10, '0020', 0, 'Materiales y Produtos de Alimentos', 1, 1),
(67, 10, '0030', 0, 'Materiales y Productos de Medicamentos', 1, 1),
(68, 10, '0999', 0, 'Otros Materiales', 1, 1),
(69, 50, '0010', 0, 'Medios Monetarios', 0, 1),
(70, 50, '0020', 0, 'Recursos Materiales', 0, 1),
(71, 8, '0030', 0, 'Clientes Externos', 1, 1),
(72, 8, '0010', 0, 'Personas Naturales', 1, 1),
(73, 67, '0150', 0, 'Combo de Aseo', 1, 1),
(74, 67, '0170', 0, 'Combo de Alimentos', 1, 1),
(75, 67, '0160', 0, 'Combo de Medicamentos', 1, 1),
(76, 76, '0020', 0, 'Combo de Alimento', 1, 0),
(77, 76, '0010', 0, 'Combo de Aseo', 1, 0),
(78, 76, '0030', 0, 'Combo de Medicamentos', 1, 0),
(79, 76, '0150', 0, 'Combo de Aseo', 0, 1),
(80, 76, '0160', 0, 'Combo de Medicamento', 0, 1),
(81, 76, '0170', 0, 'Combo de Alimento', 0, 1),
(82, 75, '0010', 0, 'Recargas', 0, 1),
(83, 75, '0020', 0, 'Producción', 0, 1),
(84, 75, '0030', 0, 'Alimento', 0, 1),
(85, 75, '0040', 0, 'Otros Productos', 0, 1),
(86, 75, '0050', 0, 'Medicamentos', 0, 0),
(87, 68, '0010', 0, 'Recargas', 1, 1),
(88, 68, '0020', 0, 'Producción', 1, 1),
(89, 68, '0030', 0, 'Alimento', 1, 1),
(90, 68, '0040', 0, 'Otros Productos', 1, 1),
(91, 68, '0050', 0, 'Medicamentos', 1, 0),
(92, 66, '0010', 0, 'Mercancias', 1, 1),
(93, 66, '0020', 0, 'Produccion', 1, 1),
(94, 70, '0010', 0, '0010 Distribucion', 1, 0),
(95, 70, '0010', 1, 'Ventas', 1, 1),
(96, 70, '0020', 1, 'Distribucion', 1, 1),
(97, 69, '0010', 1, 'Agencia Horizontes', 1, 1),
(98, 83, '0010', 0, 'Venta de boletos de avion', 0, 0),
(99, 83, '0020', 0, 'Servicio de Remesas', 0, 0),
(100, 83, '0030', 0, 'Servicio de paqueteria', 0, 0),
(101, 84, '0010', 0, 'Costo de Venta de Boletos de Avion', 1, 0),
(102, 84, '0020', 0, 'Costo de Servicios de Remesa', 1, 0),
(103, 84, '0030', 0, 'Costo de Paqueteria', 1, 0),
(104, 8, '0020', 0, 'Clientes Internos', 1, 1),
(105, 84, '0010', 0, 'Recarga Cubacell', 1, 1),
(106, 84, '0020', 0, 'Recarga Nauta', 1, 1),
(107, 84, '0030', 0, 'Larga Distancia', 1, 1),
(108, 84, '0040', 0, 'Envio de Remesas', 1, 1),
(109, 84, '0050', 0, 'Boletos Aéreos', 1, 1),
(110, 84, '0060', 0, 'Renta de Hoteles', 1, 1),
(111, 84, '0070', 0, 'Renta de Autos', 1, 1),
(112, 84, '0080', 0, 'Excursiones', 1, 1),
(113, 84, '0090', 0, 'Envio de paquetes', 1, 1),
(114, 84, '0100', 0, 'Paquetes Turísticos', 1, 1),
(115, 84, '0110', 0, 'Trámites Migratorios', 1, 1),
(116, 84, '0120', 0, 'Desarrollo de Software', 1, 1),
(117, 84, '0130', 0, 'Diseño', 1, 1),
(118, 84, '0140', 0, 'Marketing y redes Sociales', 1, 1),
(119, 83, '0010', 0, 'Recarga Cubacell', 0, 1),
(120, 83, '0020', 0, 'Recarga Nauta', 0, 1),
(121, 83, '0030', 0, 'Larga Distancia', 0, 1),
(122, 83, '0040', 0, 'Envio de Remesas', 0, 1),
(123, 83, '0050', 0, 'Boletos Aéreos', 0, 1),
(124, 83, '0060', 0, 'Renta de Hoteles', 0, 1),
(125, 83, '0070', 0, 'Renta de Autos', 0, 1),
(126, 83, '0080', 0, 'Excursiones', 0, 1),
(127, 83, '0090', 0, 'Envio de paquetes', 0, 1),
(128, 83, '0100', 0, 'Paquetes Turísticos', 0, 1),
(129, 83, '0110', 0, 'Trámites Migratorios', 0, 1),
(130, 83, '0120', 0, 'Desarrollo de Software', 0, 1),
(131, 83, '0130', 0, 'Diseño', 0, 1),
(132, 83, '0140', 0, 'Marketing y redes Sociales', 0, 1),
(133, 2, '0001', 0, 'Efectivo', 1, 1),
(134, 33, '0010', 0, 'Depreciacion de Activos Fijos Tangibles', 0, 1),
(135, 80, '0010', 0, 'Otros ingresos', 1, 1),
(136, 85, '0010', 0, 'Compra de Activo Fijo', 0, 1),
(137, 54, '0050', 0, 'Entrega o Vaja de Activos Fijos', 1, 1),
(138, 22, '0010', 0, 'Activo Fijos', 1, 1),
(139, 74, '0010', 0, 'Gastos de ARS Patrimonial', 1, 1),
(140, 74, '0020', 0, 'Gastos AFP Patrimonial', 1, 1),
(141, 74, '0030', 0, 'Gastos  SRL-1.1%', 1, 1),
(142, 74, '0040', 0, 'Gastos Infotep-1%', 1, 1),
(143, 41, '0006', 0, 'ARS por Pagar', 0, 1),
(144, 41, '0007', 0, 'AFP por Pagar', 0, 1),
(145, 41, '0008', 0, 'Cooperativa por Pagar', 0, 1),
(146, 41, '0009', 0, 'Plan Médico Adicional  por Pagar', 0, 1),
(147, 41, '0010', 0, 'Restaurant por Pagar', 0, 1),
(148, 41, '0011', 0, 'ARS Patrimonial por Pagar', 0, 1),
(149, 41, '0012', 0, 'AFP Patrimonial por Pagar', 0, 1),
(150, 41, '0013', 0, 'SRL-1.1% por Pagar', 0, 1),
(151, 41, '0014', 0, 'Infotep-1.1% por Pagar', 0, 1),
(152, 42, '0010', 0, 'Nominas por Pagar', 0, 1),
(153, 86, '0010', 0, 'Recarga Cubacell', 0, 1),
(154, 86, '0020', 0, 'Recarga Nauta', 0, 1),
(155, 86, '0030', 0, 'Larga Distancia', 0, 1),
(156, 86, '0040', 0, 'Envio de Remesas', 0, 1),
(157, 86, '0050', 0, 'Boletos Aéreos', 0, 1),
(158, 86, '0060', 0, 'Renta de Hoteles', 0, 1),
(159, 86, '0070', 0, 'Renta de Autos', 0, 1),
(160, 86, '0080', 0, 'Excursiones', 0, 1),
(161, 86, '0090', 0, 'Envio de paquetes', 0, 1),
(162, 86, '0100', 0, 'Paquetes Turísticos', 0, 1),
(163, 86, '0110', 0, 'Trámites Migratorios', 0, 1),
(164, 86, '0120', 0, 'Desarrollo de Software', 0, 1),
(165, 86, '0130', 0, 'Diseño', 0, 1),
(166, 86, '0140', 0, 'Marketing y redes Sociales', 0, 1),
(167, 39, '0010', 0, 'Cobros Anticipados', 0, 1),
(168, 66, '0030', 0, 'Servicios', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcuenta_criterio_analisis`
--

CREATE TABLE `subcuenta_criterio_analisis` (
  `id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_criterio_analisis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcuenta_criterio_analisis`
--

INSERT INTO `subcuenta_criterio_analisis` (`id`, `id_subcuenta_id`, `id_criterio_analisis_id`) VALUES
(1, 16, 2),
(2, 16, 3),
(3, 16, 4),
(4, 16, 5),
(5, 22, 11),
(7, 24, 11),
(8, 27, 11),
(9, 25, 11),
(10, 26, 11),
(11, 28, 11),
(12, 29, 11),
(13, 30, 11),
(14, 31, 11),
(15, 32, 6),
(16, 33, 8),
(17, 23, 11),
(24, 42, 6),
(25, 43, 14),
(26, 44, 2),
(27, 45, 1),
(28, 46, 1),
(29, 47, 2),
(30, 48, 1),
(31, 49, 1),
(38, 52, 11),
(39, 53, 11),
(41, 55, 4),
(42, 55, 6),
(43, 56, 4),
(44, 59, 1),
(45, 60, 1),
(46, 61, 1),
(47, 62, 1),
(50, 63, 6),
(51, 64, 6),
(54, 66, 1),
(55, 67, 1),
(56, 68, 1),
(57, 65, 1),
(58, 50, 3),
(59, 50, 10),
(64, 69, 11),
(65, 70, 11),
(66, 51, 3),
(67, 51, 5),
(68, 51, 10),
(69, 54, 3),
(70, 54, 10),
(73, 95, 3),
(74, 95, 5),
(75, 96, 3),
(76, 96, 5),
(77, 97, 3),
(78, 97, 5),
(81, 72, 6),
(82, 104, 6),
(83, 71, 6),
(88, 153, 6),
(89, 154, 6),
(91, 155, 6),
(92, 156, 6),
(93, 157, 6),
(94, 158, 6),
(95, 159, 6),
(96, 160, 6),
(97, 161, 6),
(98, 162, 6),
(99, 163, 6),
(100, 164, 6),
(101, 165, 6),
(102, 166, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcuenta_proveedor`
--

CREATE TABLE `subcuenta_proveedor` (
  `id` int(11) NOT NULL,
  `id_subcuenta_id` int(11) NOT NULL,
  `id_proveedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_cambio`
--

CREATE TABLE `tasa_cambio` (
  `id` int(11) NOT NULL,
  `id_moneda_origen_id` int(11) NOT NULL,
  `id_moneda_destino_id` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `valor` double NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tasa_cambio`
--

INSERT INTO `tasa_cambio` (`id`, `id_moneda_origen_id`, `id_moneda_destino_id`, `anno`, `mes`, `valor`, `activo`) VALUES
(1, 1, 4, 2021, 5, 30, 1),
(2, 4, 1, 2021, 5, 0.033333333333333, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `termino_pago`
--

CREATE TABLE `termino_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `termino_pago`
--

INSERT INTO `termino_pago` (`id`, `nombre`) VALUES
(1, 'Contra servicio'),
(2, 'A 7 días'),
(3, 'A 15 días'),
(4, 'A 30 días'),
(5, 'A 45 días');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_comprobante`
--

INSERT INTO `tipo_comprobante` (`id`, `descripcion`, `activo`, `abreviatura`) VALUES
(1, 'COMPROBANTE DE APERTURA', 1, 'AP'),
(2, 'COMPROBANTE DE OPERACIONES', 1, '00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

CREATE TABLE `tipo_cuenta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`id`, `nombre`, `activo`) VALUES
(1, 'Activos Circulantes', 1),
(2, 'Activos a Largo Plazo', 1),
(3, 'Activos Fijos', 1),
(4, 'Activos Diferidos', 1),
(5, 'Otros Activos', 1),
(6, 'Cuentas Reguladoras de Activos', 1),
(7, 'Pasivos Circulantes', 1),
(8, 'Pasivos a Largo Plazo', 1),
(9, 'Pasivos Diferidos', 1),
(10, 'Otros Pasivos', 1),
(11, 'Capital Contable', 1),
(12, 'Gastos de Produccion', 1),
(13, 'Cuentas Nominales Deudoras', 1),
(14, 'Cuentas Nominales Acreedoras', 1),
(15, 'Cuenta de Resultado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `activo`) VALUES
(1, 'INFORME DE RECECIÓN MERCANCIA', 1),
(2, 'INFORME DE RECECIÓN PRODUCTO', 1),
(3, 'AJUSTE DE ENTRADA', 1),
(4, 'AJUSTE DE SALIDA', 1),
(5, 'TRANSFERENCIA DE ENTRADA', 1),
(6, 'TRANSFERENCIA DE SALIDA', 1),
(7, 'VALE DE SALIDA MERCANCIA', 1),
(8, 'VALE DE SALIDA PRODUCTO', 1),
(9, 'DEVOLUCION', 1),
(10, 'VENTA', 1),
(11, 'DEVOLUCION VENTA', 1),
(12, 'APERTURA', 1),
(13, 'APERTURA PRODUCTO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_activo_fijo`
--

CREATE TABLE `tipo_documento_activo_fijo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id`, `descripcion`, `activo`, `codigo`) VALUES
(1, 'APERTURA', 1, 'AP'),
(2, 'COMPRA', 1, 'A'),
(3, 'TRASLADO INTERNO', 1, 'TI'),
(4, 'TRASLADOS ENVIADOS', 1, 'TE'),
(5, 'TRASLADOS RECIBIDOS', 1, 'TR'),
(6, 'BAJAS DE ACTIVOS', 1, 'BA'),
(7, 'VENTA DE ACTIVOS', 1, 'VA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_traslado`
--

CREATE TABLE `tipo_traslado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_traslado`
--

INSERT INTO `tipo_traslado` (`id`, `nombre`, `activo`) VALUES
(1, 'Privado', 1),
(2, 'Colectivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_ini_persona` int(11) NOT NULL,
  `cantidad_fin_persona` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramo`
--

CREATE TABLE `tramo` (
  `id` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `ida_vuelta` tinyint(1) NOT NULL,
  `vehiculo` int(11) NOT NULL,
  `precio` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `traslado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE `transferencia` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `id_unidad_id` int(11) DEFAULT NULL,
  `id_almacen_id` int(11) DEFAULT NULL,
  `nro_cuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_inventario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_acreedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_concecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `entrada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `id_padre_id` int(11) DEFAULT NULL,
  `id_moneda_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rnc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `id_padre_id`, `id_moneda_id`, `nombre`, `activo`, `codigo`, `direccion`, `telefono`, `correo`, `rnc`, `url`) VALUES
(1, NULL, NULL, 'Grupo Horizontes Admin', 1, NULL, 'Calle Juan Sanchez Ramirez esq Wenceslao Alvarez  #52 local B1 Zona Universitaria, Santo  Domingo , República Dominicana', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id`, `nombre`, `abreviatura`, `activo`) VALUES
(1, 'Centímetro', 'cm', 1),
(2, 'Metro', 'm', 1),
(3, 'Milímetro', 'mm', 1),
(4, 'Kilómetro', 'km', 1),
(5, 'Gramo', 'g', 1),
(6, 'Miligramo', 'mg', 1),
(7, 'Libra', 'lb', 1),
(8, 'Kilogramo', 'kg', 1),
(9, 'Mililitro', 'ml', 1),
(10, 'Litro', 'l', 1),
(11, 'Metro cuadrado', 'm²', 1),
(12, 'Metro cúbico', 'm³', 1),
(13, 'Unidad', 'u', 1),
(14, 'Blister', 'Blister', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `status` tinyint(1) NOT NULL,
  `id_moneda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_agencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `status`, `id_moneda`, `id_agencia`, `password`) VALUES
(1, 'root@solyag.com', '[\"ROLE_ADMIN\"]', 1, '1', NULL, '$argon2id$v=19$m=65536,t=4,p=1$b0tTTFd2OTEwZ1pMZXpoYw$4vh7/DGIgA6QKXFZiapxgmhv/OeSfs6ki30/FTLSOx4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_client_tmp`
--

CREATE TABLE `user_client_tmp` (
  `id` int(11) NOT NULL,
  `id_usuario_id` int(11) NOT NULL,
  `id_cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones_disfrutadas`
--

CREATE TABLE `vacaciones_disfrutadas` (
  `id` int(11) NOT NULL,
  `id_empleado_id` int(11) NOT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `cantidad_pagada` double NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vale_salida`
--

CREATE TABLE `vale_salida` (
  `id` int(11) NOT NULL,
  `id_documento_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `producto` tinyint(1) NOT NULL,
  `nro_consecutivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `nro_solicitud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_subcuenta_deudora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `activo`) VALUES
(1, 'Santo domingo', 1),
(2, 'Punta Cana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_remesas`
--

CREATE TABLE `zona_remesas` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zona_remesas`
--

INSERT INTO `zona_remesas` (`id`, `pais_id`, `provincia_id`, `municipio_id`, `nombre`, `activo`) VALUES
(1, 1, 2, 10, 'mismi pinar', 0),
(2, 1, 2, 11, 'Rio Seco', 1),
(3, 1, 2, 11, 'San Juan y Martinez', 1),
(4, 1, 2, 11, 'Punta de Carta', 1),
(5, 1, 2, 11, 'San Juan y Martinez (periferia)', 1),
(6, 1, 7, 32, 'Guanabacoa', 1),
(7, 1, 7, 32, 'La Gallega', 1),
(8, 1, 7, 33, 'Campo Florido', 1),
(9, 1, 2, 5, 'Guane', 1),
(10, 1, 7, 37, 'Jaimanitas', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo_fijo`
--
ALTER TABLE `activo_fijo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EBC93EDB763453` (`id_tipo_movimiento_id`),
  ADD KEY `IDX_75EBC93E6FBA0327` (`id_tipo_movimiento_baja_id`),
  ADD KEY `IDX_75EBC93ED410562` (`id_area_responsabilidad_id`),
  ADD KEY `IDX_75EBC93E4A667A2B` (`id_grupo_activo_id`),
  ADD KEY `IDX_75EBC93E1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `activo_fijo_cuentas`
--
ALTER TABLE `activo_fijo_cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E0DF2901C84BDE84` (`id_activo_id`),
  ADD KEY `IDX_E0DF290186762CC7` (`id_cuenta_activo_id`),
  ADD KEY `IDX_E0DF29014476721E` (`id_subcuenta_activo_id`),
  ADD KEY `IDX_E0DF29012955A16D` (`id_centro_costo_activo_id`),
  ADD KEY `IDX_E0DF29014C675596` (`id_area_responsabilidad_activo_id`),
  ADD KEY `IDX_E0DF290174A5FFBA` (`id_cuenta_depreciacion_id`),
  ADD KEY `IDX_E0DF2901549C81D9` (`id_subcuenta_depreciacion_id`),
  ADD KEY `IDX_E0DF290180C608FA` (`id_cuenta_gasto_id`),
  ADD KEY `IDX_E0DF290157677646` (`id_subcuenta_gasto_id`),
  ADD KEY `IDX_E0DF2901A950EE53` (`id_centro_costo_gasto_id`),
  ADD KEY `IDX_E0DF2901A752F04B` (`id_elemento_gasto_gasto_id`),
  ADD KEY `IDX_E0DF29014D7B4AB9` (`id_cuenta_acreedora_id`),
  ADD KEY `IDX_E0DF2901EB1B341E` (`id_subcuenta_acreedora_id`);

--
-- Indices de la tabla `activo_fijo_movimiento_activo_fijo`
--
ALTER TABLE `activo_fijo_movimiento_activo_fijo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2FA61FF25832E72E` (`id_activo_fijo_id`),
  ADD KEY `IDX_2FA61FF27786CA71` (`id_movimiento_activo_fijo_id`);

--
-- Indices de la tabla `acumulado_vacaciones`
--
ALTER TABLE `acumulado_vacaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_246B9D168D392AC7` (`id_empleado_id`);

--
-- Indices de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ajuste`
--
ALTER TABLE `ajuste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DD35BD326601BA07` (`id_documento_id`);

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D5B2D25020332D99` (`codigo`),
  ADD KEY `IDX_D5B2D2501D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `almacen_ocupado`
--
ALTER TABLE `almacen_ocupado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AA53605839161EBF` (`id_almacen_id`),
  ADD KEY `IDX_AA5360587EB2C349` (`id_usuario_id`);

--
-- Indices de la tabla `amenidades`
--
ALTER TABLE `amenidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6D8A3B4D1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `amenidades_hotel`
--
ALTER TABLE `amenidades_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2EB72C4C6298578D` (`id_hotel_id`),
  ADD KEY `IDX_2EB72C4C91F48FAD` (`id_amenidades_id`);

--
-- Indices de la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DFFB55EB6601BA07` (`id_documento_id`);

--
-- Indices de la tabla `area_responsabilidad`
--
ALTER TABLE `area_responsabilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F469C2BA1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71D6D35C1ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_71D6D35C2D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_71D6D35C6601BA07` (`id_documento_id`),
  ADD KEY `IDX_71D6D35C39161EBF` (`id_almacen_id`),
  ADD KEY `IDX_71D6D35CC59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_71D6D35CF66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_71D6D35C71381BB3` (`id_orden_trabajo_id`),
  ADD KEY `IDX_71D6D35CF5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_71D6D35CE8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_71D6D35C1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_71D6D35CEF5F7851` (`id_tipo_comprobante_id`),
  ADD KEY `IDX_71D6D35C1800963C` (`id_comprobante_id`),
  ADD KEY `IDX_71D6D35C55C5F988` (`id_factura_id`),
  ADD KEY `IDX_71D6D35C5832E72E` (`id_activo_fijo_id`),
  ADD KEY `IDX_71D6D35CD410562` (`id_area_responsabilidad_id`),
  ADD KEY `IDX_71D6D35C8E5841CF` (`id_cotizacion_id`),
  ADD KEY `IDX_71D6D35C4CC57875` (`id_elemento_visa_id`);

--
-- Indices de la tabla `avisos_pagos`
--
ALTER TABLE `avisos_pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F439673A78A65A2` (`id_plazo_pago_id`),
  ADD KEY `IDX_F4396738E5841CF` (`id_cotizacion_id`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiarios_clientes`
--
ALTER TABLE `beneficiarios_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AE9DBD1E7BF9CE86` (`id_cliente_id`),
  ADD KEY `IDX_AE9DBD1E18997CB6` (`id_pais_id`),
  ADD KEY `IDX_AE9DBD1E6DB054DD` (`id_provincia_id`),
  ADD KEY `IDX_AE9DBD1E7B7D6E92` (`id_municipio_id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_cliente`
--
ALTER TABLE `categoria_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_749608CE1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `cierre`
--
ALTER TABLE `cierre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D0DCFCC739161EBF` (`id_almacen_id`),
  ADD KEY `IDX_D0DCFCC77EB2C349` (`id_usuario_id`);

--
-- Indices de la tabla `cierre_diario`
--
ALTER TABLE `cierre_diario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F3D0CD8939161EBF` (`id_almacen_id`),
  ADD KEY `IDX_F3D0CD897EB2C349` (`id_usuario_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_contabilidad`
--
ALTER TABLE `cliente_contabilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_solicitudes`
--
ALTER TABLE `cliente_solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D0874AE67BF9CE86` (`id_cliente_id`),
  ADD KEY `IDX_D0874AE63F78A396` (`id_solicitud_id`),
  ADD KEY `IDX_D0874AE61D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `cobros_pagos`
--
ALTER TABLE `cobros_pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D9581D1655C5F988` (`id_factura_id`),
  ADD KEY `IDX_D9581D1626990C38` (`id_informe_id`),
  ADD KEY `IDX_D9581D16E8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_D9581D167786CA71` (`id_movimiento_activo_fijo_id`);

--
-- Indices de la tabla `comprobante_cierre`
--
ALTER TABLE `comprobante_cierre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D03EA4C51800963C` (`id_comprobante_id`),
  ADD KEY `IDX_D03EA4C545F8C94C` (`id_cierre_id`);

--
-- Indices de la tabla `comprobante_movimiento_activo_fijo`
--
ALTER TABLE `comprobante_movimiento_activo_fijo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_81F5096A1399A3CF` (`id_registro_comprobante_id`),
  ADD KEY `IDX_81F5096A9D00B230` (`id_movimiento_activo_id`),
  ADD KEY `IDX_81F5096A1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `comprobante_salario`
--
ALTER TABLE `comprobante_salario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8C5550701399A3CF` (`id_registro_comprobante_id`),
  ADD KEY `IDX_8C5550701D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `configuracion_inicial`
--
ALTER TABLE `configuracion_inicial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8521BE24404AE9D2` (`id_modulo_id`),
  ADD KEY `IDX_8521BE247A4F962` (`id_tipo_documento_id`);

--
-- Indices de la tabla `configuracion_reglas_remesas`
--
ALTER TABLE `configuracion_reglas_remesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2398566118997CB6` (`id_pais_id`),
  ADD KEY `IDX_23985661E8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_239856611D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `config_precio_venta_servicio`
--
ALTER TABLE `config_precio_venta_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6A244E601D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `config_servicios`
--
ALTER TABLE `config_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A1A8B71269D86E10` (`id_servicio_id`),
  ADD KEY `IDX_A1A8B7121D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `consecutivo_servicio`
--
ALTER TABLE `consecutivo_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EAB6E3871D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_EAB6E38769D86E10` (`id_servicio_id`),
  ADD KEY `IDX_EAB6E3878E5841CF` (`id_cotizacion_id`);

--
-- Indices de la tabla `contratos_cliente`
--
ALTER TABLE `contratos_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5BB477BF9CE86` (`id_cliente_id`),
  ADD KEY `IDX_29A5BB47374388F5` (`id_moneda_id`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_44A5EC031D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `creditos_precio_venta`
--
ALTER TABLE `creditos_precio_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_847FE8A94699DFE5` (`id_config_precio_venta_id`),
  ADD KEY `IDX_847FE8A91D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `criterio_analisis`
--
ALTER TABLE `criterio_analisis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuadre_diario`
--
ALTER TABLE `cuadre_diario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_60ABEFD91ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_60ABEFD92D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_60ABEFD945F8C94C` (`id_cierre_id`),
  ADD KEY `IDX_60ABEFD939161EBF` (`id_almacen_id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_31C7BFCF45E7F350` (`id_tipo_cuenta_id`);

--
-- Indices de la tabla `cuentas_cliente`
--
ALTER TABLE `cuentas_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64653310374388F5` (`id_moneda_id`),
  ADD KEY `IDX_646533107BF9CE86` (`id_cliente_id`),
  ADD KEY `IDX_646533109CDF4BAB` (`id_banco_id`);

--
-- Indices de la tabla `cuentas_unidad`
--
ALTER TABLE `cuentas_unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_355374209CDF4BAB` (`id_banco_id`),
  ADD KEY `IDX_355374201D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_35537420374388F5` (`id_moneda_id`);

--
-- Indices de la tabla `cuenta_criterio_analisis`
--
ALTER TABLE `cuenta_criterio_analisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AF040B091ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_AF040B095ABBE5F6` (`id_criterio_analisis_id`);

--
-- Indices de la tabla `custom_user`
--
ALTER TABLE `custom_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8CE51EB479F37AE5` (`id_user_id`);

--
-- Indices de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D618AE149D01464C` (`unidad_id`);

--
-- Indices de la tabla `descuestos_servicios_cotizacion`
--
ALTER TABLE `descuestos_servicios_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1C606F008E5841CF` (`id_cotizacion_id`),
  ADD KEY `IDX_1C606F0069D86E10` (`id_servicio_id`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_524D9F676601BA07` (`id_documento_id`),
  ADD KEY `IDX_524D9F671D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_524D9F6739161EBF` (`id_almacen_id`),
  ADD KEY `IDX_524D9F67C59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_524D9F67F66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_524D9F675074DD86` (`id_orden_tabajo_id`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1AE277DFC604D5C6` (`pais_id`),
  ADD KEY `IDX_1AE277DFB77634D2` (`moneda_id`);

--
-- Indices de la tabla `distribuidor_provincias`
--
ALTER TABLE `distribuidor_provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8DA1E24DCEEEDB42` (`distribuidor_id`),
  ADD KEY `IDX_8DA1E24DA156727D` (`provincias_id`);

--
-- Indices de la tabla `distribuidor_saldo`
--
ALTER TABLE `distribuidor_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29FECCE6CEEEDB42` (`distribuidor_id`),
  ADD KEY `IDX_29FECCE6B77634D2` (`moneda_id`);

--
-- Indices de la tabla `distribuidor_zona`
--
ALTER TABLE `distribuidor_zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1DA5FABD104EA8FC` (`zona_id`),
  ADD KEY `IDX_1DA5FABDCEEEDB42` (`distribuidor_id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6B12EC739161EBF` (`id_almacen_id`),
  ADD KEY `IDX_B6B12EC71D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_B6B12EC7374388F5` (`id_moneda_id`),
  ADD KEY `IDX_B6B12EC77A4F962` (`id_tipo_documento_id`),
  ADD KEY `IDX_B6B12EC74832F387` (`id_documento_cancelado_id`);

--
-- Indices de la tabla `elementos_visa`
--
ALTER TABLE `elementos_visa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_90B65E04E8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_90B65E0469D86E10` (`id_servicio_id`),
  ADD KEY `IDX_90B65E041D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `elemento_gasto`
--
ALTER TABLE `elemento_gasto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D9D9BF527EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_D9D9BF521D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_D9D9BF52D1E12F15` (`id_cargo_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_solicitudes`
--
ALTER TABLE `estado_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D59CA4131D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `facilidades`
--
ALTER TABLE `facilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_551461581D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `facilidades_hotel`
--
ALTER TABLE `facilidades_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_78E84AB16298578D` (`id_hotel_id`),
  ADD KEY `IDX_78E84AB15FB489F0` (`id_facilidades_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F9EBA00968BCB606` (`id_contrato_id`),
  ADD KEY `IDX_F9EBA0091D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_F9EBA0097EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_F9EBA009C59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_F9EBA00971381BB3` (`id_orden_trabajo_id`),
  ADD KEY `IDX_F9EBA009F66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_F9EBA009F5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_F9EBA0094F4C4E26` (`id_categoria_cliente_id`),
  ADD KEY `IDX_F9EBA009C37A5552` (`id_termino_pago_id`),
  ADD KEY `IDX_F9EBA009374388F5` (`id_moneda_id`),
  ADD KEY `IDX_F9EBA00999274826` (`id_factura_cancela_id`);

--
-- Indices de la tabla `facturas_comprobante`
--
ALTER TABLE `facturas_comprobante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6FD2F19B55C5F988` (`id_factura_id`),
  ADD KEY `IDX_6FD2F19B1800963C` (`id_comprobante_id`),
  ADD KEY `IDX_6FD2F19B1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `factura_cotizacion`
--
ALTER TABLE `factura_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADBC38788E5841CF` (`id_cotizacion_id`),
  ADD KEY `IDX_ADBC38787EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_ADBC38781D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_ADBC38784F4C4E26` (`id_categoria_cliente_id`);

--
-- Indices de la tabla `factura_documento`
--
ALTER TABLE `factura_documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CCC060C155C5F988` (`id_factura_id`),
  ADD KEY `IDX_CCC060C16601BA07` (`id_documento_id`),
  ADD KEY `IDX_CCC060C1EC34F77F` (`id_movimiento_venta_id`);

--
-- Indices de la tabla `grupo_activos`
--
ALTER TABLE `grupo_activos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones_hotel`
--
ALTER TABLE `habitaciones_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_74F394B091F48FAD` (`id_amenidades_id`),
  ADD KEY `IDX_74F394B06298578D` (`id_hotel_id`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresora`
--
ALTER TABLE `impresora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BBCADB321D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6E63AA11D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `impuestos_servicio_cotizacion`
--
ALTER TABLE `impuestos_servicio_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2CA4AD5E8E5841CF` (`id_cotizacion_id`),
  ADD KEY `IDX_2CA4AD5E69D86E10` (`id_servicio_id`),
  ADD KEY `IDX_2CA4AD5ECA29A612` (`id_impuesto_id`);

--
-- Indices de la tabla `impuesto_sobre_renta`
--
ALTER TABLE `impuesto_sobre_renta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5EF11EF48D392AC7` (`id_empleado_id`),
  ADD KEY `IDX_5EF11EF4E9DBC8E8` (`id_nomina_pago_id`),
  ADD KEY `IDX_5EF11EF4A9ECE748` (`id_rango_escala_id`);

--
-- Indices de la tabla `informe_recepcion`
--
ALTER TABLE `informe_recepcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62A4EBD6601BA07` (`id_documento_id`),
  ADD KEY `IDX_62A4EBDE8F12801` (`id_proveedor_id`);

--
-- Indices de la tabla `instrumento_cobro`
--
ALTER TABLE `instrumento_cobro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4EE5DFC104EA8FC` (`zona_id`);

--
-- Indices de la tabla `mercancia`
--
ALTER TABLE `mercancia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9D094AE0E2C70A62` (`id_amlacen_id`),
  ADD KEY `IDX_9D094AE0E16A5625` (`id_unidad_medida_id`);

--
-- Indices de la tabla `mercancia_impuesto`
--
ALTER TABLE `mercancia_impuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E2D6041BCE90A26` (`mercancia_id`),
  ADD KEY `IDX_2E2D6041D23B6BE5` (`impuesto_id`);

--
-- Indices de la tabla `mercancia_producto`
--
ALTER TABLE `mercancia_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3F705CF59F287F54` (`id_mercancia_id`),
  ADD KEY `IDX_3F705CF56E57A479` (`id_producto_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda_pais`
--
ALTER TABLE `moneda_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C8FF107AD1CE493D` (`id_tipo_documento_activo_fijo_id`),
  ADD KEY `IDX_C8FF107ADB763453` (`id_tipo_movimiento_id`),
  ADD KEY `IDX_C8FF107A873C7FC7` (`id_unidad_origen_id`),
  ADD KEY `IDX_C8FF107A4F781EA` (`id_unidad_destino_id`);

--
-- Indices de la tabla `movimiento_activo_fijo`
--
ALTER TABLE `movimiento_activo_fijo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A985A0DA1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_A985A0DA5832E72E` (`id_activo_fijo_id`),
  ADD KEY `IDX_A985A0DADB763453` (`id_tipo_movimiento_id`),
  ADD KEY `IDX_A985A0DA1ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_A985A0DA2D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_A985A0DA7EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_A985A0DA4B1CE99D` (`id_unidad_destino_origen_id`),
  ADD KEY `IDX_A985A0DAE8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_A985A0DA571159DE` (`id_movimiento_cancelado_id`);

--
-- Indices de la tabla `movimiento_mercancia`
--
ALTER TABLE `movimiento_mercancia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_44876BD79F287F54` (`id_mercancia_id`),
  ADD KEY `IDX_44876BD76601BA07` (`id_documento_id`),
  ADD KEY `IDX_44876BD77A4F962` (`id_tipo_documento_id`),
  ADD KEY `IDX_44876BD77EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_44876BD7C59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_44876BD7F66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_44876BD739161EBF` (`id_almacen_id`),
  ADD KEY `IDX_44876BD7F5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_44876BD771381BB3` (`id_orden_trabajo_id`),
  ADD KEY `IDX_44876BD755C5F988` (`id_factura_id`),
  ADD KEY `IDX_44876BD7571159DE` (`id_movimiento_cancelado_id`);

--
-- Indices de la tabla `movimiento_producto`
--
ALTER TABLE `movimiento_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FFC0EDFC6E57A479` (`id_producto_id`),
  ADD KEY `IDX_FFC0EDFC6601BA07` (`id_documento_id`),
  ADD KEY `IDX_FFC0EDFC7A4F962` (`id_tipo_documento_id`),
  ADD KEY `IDX_FFC0EDFC7EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_FFC0EDFCC59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_FFC0EDFCF66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_FFC0EDFC39161EBF` (`id_almacen_id`),
  ADD KEY `IDX_FFC0EDFC71381BB3` (`id_orden_trabajo_id`),
  ADD KEY `IDX_FFC0EDFCF5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_FFC0EDFC55C5F988` (`id_factura_id`),
  ADD KEY `IDX_FFC0EDFC571159DE` (`id_movimiento_cancelado_id`);

--
-- Indices de la tabla `movimiento_servicio`
--
ALTER TABLE `movimiento_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_93FD19C355C5F988` (`id_factura_id`),
  ADD KEY `IDX_93FD19C371CAA3E7` (`servicio_id`);

--
-- Indices de la tabla `movimiento_venta`
--
ALTER TABLE `movimiento_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8E3F7AE555C5F988` (`id_factura_id`),
  ADD KEY `IDX_8E3F7AE539161EBF` (`id_almacen_id`),
  ADD KEY `IDX_8E3F7AE5D8F8B0AD` (`id_centro_costo_acreedor_id`),
  ADD KEY `IDX_8E3F7AE5FA3DF5CD` (`id_orden_trabajo_acreedor_id`),
  ADD KEY `IDX_8E3F7AE5F0821C98` (`id_elemento_gasto_acreedor_id`),
  ADD KEY `IDX_8E3F7AE56EA527F2` (`id_expediente_acreedor_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BBFAB5864E7121AF` (`provincia_id`);

--
-- Indices de la tabla `nominas_consecutivos`
--
ALTER TABLE `nominas_consecutivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9FC8A71A1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `nomina_pago`
--
ALTER TABLE `nomina_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5CB8BD338D392AC7` (`id_empleado_id`),
  ADD KEY `IDX_5CB8BD33AC6A6301` (`id_usuario_aprueba_id`),
  ADD KEY `IDX_5CB8BD331D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `nomina_tercero_comprobante`
--
ALTER TABLE `nomina_tercero_comprobante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D4A77ABF2547677` (`id_nomina_id`),
  ADD KEY `IDX_D4A77ABF1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_D4A77ABF1800963C` (`id_comprobante_id`);

--
-- Indices de la tabla `obligacion_cobro`
--
ALTER TABLE `obligacion_cobro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_807C726D55C5F988` (`id_factura_id`);

--
-- Indices de la tabla `obligacion_pago`
--
ALTER TABLE `obligacion_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_403C9B3BE8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_403C9B3B6601BA07` (`id_documento_id`),
  ADD KEY `IDX_403C9B3B1D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `operaciones_comprobante_operaciones`
--
ALTER TABLE `operaciones_comprobante_operaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E7EA17E1ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_E7EA17E2D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_E7EA17EC59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_E7EA17E71381BB3` (`id_orden_trabajo_id`),
  ADD KEY `IDX_E7EA17EF66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_E7EA17EF5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_E7EA17EE8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_E7EA17EECB9FBA7` (`id_registro_comprobantes_id`),
  ADD KEY `IDX_E7EA17E39161EBF` (`id_almacen_id`),
  ADD KEY `IDX_E7EA17E1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_E7EA17E47B60D7E` (`id_instrumento_cobro_id`);

--
-- Indices de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4158A0241D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_4158A02439161EBF` (`id_almacen_id`);

--
-- Indices de la tabla `pagos_cotizacion`
--
ALTER TABLE `pagos_cotizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periodo_sistema`
--
ALTER TABLE `periodo_sistema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AEF0BAAD1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_AEF0BAAD39161EBF` (`id_almacen_id`),
  ADD KEY `IDX_AEF0BAAD7EB2C349` (`id_usuario_id`);

--
-- Indices de la tabla `plan_hotel`
--
ALTER TABLE `plan_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plazos_pago_cotizacion`
--
ALTER TABLE `plazos_pago_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4A1D3ED28E5841CF` (`id_cotizacion_id`);

--
-- Indices de la tabla `por_ciento_nominas`
--
ALTER TABLE `por_ciento_nominas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precio_venta`
--
ALTER TABLE `precio_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A7BB0615E2C70A62` (`id_amlacen_id`),
  ADD KEY `IDX_A7BB0615E16A5625` (`id_unidad_medida_id`);

--
-- Indices de la tabla `producto_impuesto`
--
ALTER TABLE `producto_impuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9E754B747645698E` (`producto_id`),
  ADD KEY `IDX_9E754B74D23B6BE5` (`impuesto_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16C068CEC604D5C6` (`pais_id`);

--
-- Indices de la tabla `proveedor_unidad`
--
ALTER TABLE `proveedor_unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EE37BED5CB305D73` (`proveedor_id`),
  ADD KEY `IDX_EE37BED59D01464C` (`unidad_id`);

--
-- Indices de la tabla `proveedor_unidad_servicios`
--
ALTER TABLE `proveedor_unidad_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_68EBF91E71CAA3E7` (`servicio_id`),
  ADD KEY `IDX_68EBF91E2FF8143C` (`proveedor_unidad_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9F631427C604D5C6` (`pais_id`);

--
-- Indices de la tabla `rango_escala_dgii`
--
ALTER TABLE `rango_escala_dgii`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_comprobantes`
--
ALTER TABLE `registro_comprobantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B2D1B2B21D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_B2D1B2B2EF5F7851` (`id_tipo_comprobante_id`),
  ADD KEY `IDX_B2D1B2B27EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_B2D1B2B239161EBF` (`id_almacen_id`),
  ADD KEY `IDX_B2D1B2B247B60D7E` (`id_instrumento_cobro_id`);

--
-- Indices de la tabla `saldo_cuentas`
--
ALTER TABLE `saldo_cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BB2B71AE1ADA4D3F` (`id_cuenta_id`),
  ADD KEY `IDX_BB2B71AE2D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_BB2B71AEC59B01FF` (`id_centro_costo_id`),
  ADD KEY `IDX_BB2B71AEF66372E9` (`id_elemento_gasto_id`),
  ADD KEY `IDX_BB2B71AE39161EBF` (`id_almacen_id`),
  ADD KEY `IDX_BB2B71AE1D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_BB2B71AEE8F12801` (`id_proveedor_id`),
  ADD KEY `IDX_BB2B71AEF5DBAF2B` (`id_expediente_id`),
  ADD KEY `IDX_BB2B71AE71381BB3` (`id_orden_trabajo_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_96D27CC01D34FA6B` (`id_unidad_id`);

--
-- Indices de la tabla `stripe_factura`
--
ALTER TABLE `stripe_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcuenta`
--
ALTER TABLE `subcuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_57BB37EA1ADA4D3F` (`id_cuenta_id`);

--
-- Indices de la tabla `subcuenta_criterio_analisis`
--
ALTER TABLE `subcuenta_criterio_analisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_52A4A7682D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_52A4A7685ABBE5F6` (`id_criterio_analisis_id`);

--
-- Indices de la tabla `subcuenta_proveedor`
--
ALTER TABLE `subcuenta_proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5C22E4B82D412F53` (`id_subcuenta_id`),
  ADD KEY `IDX_5C22E4B8E8F12801` (`id_proveedor_id`);

--
-- Indices de la tabla `tasa_cambio`
--
ALTER TABLE `tasa_cambio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DAB48606FA5CADE9` (`id_moneda_origen_id`),
  ADD KEY `IDX_DAB48606D85CECF7` (`id_moneda_destino_id`);

--
-- Indices de la tabla `termino_pago`
--
ALTER TABLE `termino_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento_activo_fijo`
--
ALTER TABLE `tipo_documento_activo_fijo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_traslado`
--
ALTER TABLE `tipo_traslado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramo`
--
ALTER TABLE `tramo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDC227306601BA07` (`id_documento_id`),
  ADD KEY `IDX_EDC227301D34FA6B` (`id_unidad_id`),
  ADD KEY `IDX_EDC2273039161EBF` (`id_almacen_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F3E6D02F3A909126` (`nombre`),
  ADD UNIQUE KEY `UNIQ_F3E6D02F20332D99` (`codigo`),
  ADD KEY `IDX_F3E6D02F31E700CD` (`id_padre_id`),
  ADD KEY `IDX_F3E6D02F374388F5` (`id_moneda_id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Indices de la tabla `user_client_tmp`
--
ALTER TABLE `user_client_tmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC2C28007EB2C349` (`id_usuario_id`),
  ADD KEY `IDX_AC2C28007BF9CE86` (`id_cliente_id`);

--
-- Indices de la tabla `vacaciones_disfrutadas`
--
ALTER TABLE `vacaciones_disfrutadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F02817318D392AC7` (`id_empleado_id`);

--
-- Indices de la tabla `vale_salida`
--
ALTER TABLE `vale_salida`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_90C265C86601BA07` (`id_documento_id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zona_remesas`
--
ALTER TABLE `zona_remesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D37DCA05C604D5C6` (`pais_id`),
  ADD KEY `IDX_D37DCA054E7121AF` (`provincia_id`),
  ADD KEY `IDX_D37DCA0558BC1BE0` (`municipio_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo_fijo`
--
ALTER TABLE `activo_fijo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `activo_fijo_cuentas`
--
ALTER TABLE `activo_fijo_cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `activo_fijo_movimiento_activo_fijo`
--
ALTER TABLE `activo_fijo_movimiento_activo_fijo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acumulado_vacaciones`
--
ALTER TABLE `acumulado_vacaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ajuste`
--
ALTER TABLE `ajuste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `almacen_ocupado`
--
ALTER TABLE `almacen_ocupado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `amenidades`
--
ALTER TABLE `amenidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `amenidades_hotel`
--
ALTER TABLE `amenidades_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apertura`
--
ALTER TABLE `apertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area_responsabilidad`
--
ALTER TABLE `area_responsabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `avisos_pagos`
--
ALTER TABLE `avisos_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `beneficiarios_clientes`
--
ALTER TABLE `beneficiarios_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cierre`
--
ALTER TABLE `cierre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cierre_diario`
--
ALTER TABLE `cierre_diario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente_contabilidad`
--
ALTER TABLE `cliente_contabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_solicitudes`
--
ALTER TABLE `cliente_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobros_pagos`
--
ALTER TABLE `cobros_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobante_cierre`
--
ALTER TABLE `comprobante_cierre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobante_movimiento_activo_fijo`
--
ALTER TABLE `comprobante_movimiento_activo_fijo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobante_salario`
--
ALTER TABLE `comprobante_salario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion_inicial`
--
ALTER TABLE `configuracion_inicial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion_reglas_remesas`
--
ALTER TABLE `configuracion_reglas_remesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `config_precio_venta_servicio`
--
ALTER TABLE `config_precio_venta_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `config_servicios`
--
ALTER TABLE `config_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consecutivo_servicio`
--
ALTER TABLE `consecutivo_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratos_cliente`
--
ALTER TABLE `contratos_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `creditos_precio_venta`
--
ALTER TABLE `creditos_precio_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `criterio_analisis`
--
ALTER TABLE `criterio_analisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cuadre_diario`
--
ALTER TABLE `cuadre_diario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `cuentas_cliente`
--
ALTER TABLE `cuentas_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas_unidad`
--
ALTER TABLE `cuentas_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta_criterio_analisis`
--
ALTER TABLE `cuenta_criterio_analisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `custom_user`
--
ALTER TABLE `custom_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuestos_servicios_cotizacion`
--
ALTER TABLE `descuestos_servicios_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `distribuidor_provincias`
--
ALTER TABLE `distribuidor_provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `distribuidor_saldo`
--
ALTER TABLE `distribuidor_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `distribuidor_zona`
--
ALTER TABLE `distribuidor_zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `elementos_visa`
--
ALTER TABLE `elementos_visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `elemento_gasto`
--
ALTER TABLE `elemento_gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facilidades`
--
ALTER TABLE `facilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facilidades_hotel`
--
ALTER TABLE `facilidades_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas_comprobante`
--
ALTER TABLE `facturas_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_cotizacion`
--
ALTER TABLE `factura_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_documento`
--
ALTER TABLE `factura_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_activos`
--
ALTER TABLE `grupo_activos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones_hotel`
--
ALTER TABLE `habitaciones_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impresora`
--
ALTER TABLE `impresora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impuestos_servicio_cotizacion`
--
ALTER TABLE `impuestos_servicio_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impuesto_sobre_renta`
--
ALTER TABLE `impuesto_sobre_renta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informe_recepcion`
--
ALTER TABLE `informe_recepcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instrumento_cobro`
--
ALTER TABLE `instrumento_cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mercancia`
--
ALTER TABLE `mercancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercancia_impuesto`
--
ALTER TABLE `mercancia_impuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mercancia_producto`
--
ALTER TABLE `mercancia_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `moneda_pais`
--
ALTER TABLE `moneda_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento_activo_fijo`
--
ALTER TABLE `movimiento_activo_fijo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento_mercancia`
--
ALTER TABLE `movimiento_mercancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento_producto`
--
ALTER TABLE `movimiento_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento_servicio`
--
ALTER TABLE `movimiento_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento_venta`
--
ALTER TABLE `movimiento_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `nominas_consecutivos`
--
ALTER TABLE `nominas_consecutivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nomina_pago`
--
ALTER TABLE `nomina_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nomina_tercero_comprobante`
--
ALTER TABLE `nomina_tercero_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obligacion_cobro`
--
ALTER TABLE `obligacion_cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obligacion_pago`
--
ALTER TABLE `obligacion_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operaciones_comprobante_operaciones`
--
ALTER TABLE `operaciones_comprobante_operaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_cotizacion`
--
ALTER TABLE `pagos_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodo_sistema`
--
ALTER TABLE `periodo_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_hotel`
--
ALTER TABLE `plan_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plazos_pago_cotizacion`
--
ALTER TABLE `plazos_pago_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio_venta`
--
ALTER TABLE `precio_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_impuesto`
--
ALTER TABLE `producto_impuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_unidad`
--
ALTER TABLE `proveedor_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_unidad_servicios`
--
ALTER TABLE `proveedor_unidad_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rango_escala_dgii`
--
ALTER TABLE `rango_escala_dgii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_comprobantes`
--
ALTER TABLE `registro_comprobantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saldo_cuentas`
--
ALTER TABLE `saldo_cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stripe_factura`
--
ALTER TABLE `stripe_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcuenta`
--
ALTER TABLE `subcuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `subcuenta_criterio_analisis`
--
ALTER TABLE `subcuenta_criterio_analisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `subcuenta_proveedor`
--
ALTER TABLE `subcuenta_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasa_cambio`
--
ALTER TABLE `tasa_cambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_activo_fijo`
--
ALTER TABLE `tipo_documento_activo_fijo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_traslado`
--
ALTER TABLE `tipo_traslado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tramo`
--
ALTER TABLE `tramo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_client_tmp`
--
ALTER TABLE `user_client_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacaciones_disfrutadas`
--
ALTER TABLE `vacaciones_disfrutadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vale_salida`
--
ALTER TABLE `vale_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona_remesas`
--
ALTER TABLE `zona_remesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activo_fijo`
--
ALTER TABLE `activo_fijo`
  ADD CONSTRAINT `FK_75EBC93E1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_75EBC93E4A667A2B` FOREIGN KEY (`id_grupo_activo_id`) REFERENCES `grupo_activos` (`id`),
  ADD CONSTRAINT `FK_75EBC93E6FBA0327` FOREIGN KEY (`id_tipo_movimiento_baja_id`) REFERENCES `tipo_movimiento` (`id`),
  ADD CONSTRAINT `FK_75EBC93ED410562` FOREIGN KEY (`id_area_responsabilidad_id`) REFERENCES `area_responsabilidad` (`id`),
  ADD CONSTRAINT `FK_75EBC93EDB763453` FOREIGN KEY (`id_tipo_movimiento_id`) REFERENCES `tipo_movimiento` (`id`);

--
-- Filtros para la tabla `activo_fijo_cuentas`
--
ALTER TABLE `activo_fijo_cuentas`
  ADD CONSTRAINT `FK_E0DF29012955A16D` FOREIGN KEY (`id_centro_costo_activo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_E0DF29014476721E` FOREIGN KEY (`id_subcuenta_activo_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF29014C675596` FOREIGN KEY (`id_area_responsabilidad_activo_id`) REFERENCES `area_responsabilidad` (`id`),
  ADD CONSTRAINT `FK_E0DF29014D7B4AB9` FOREIGN KEY (`id_cuenta_acreedora_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF2901549C81D9` FOREIGN KEY (`id_subcuenta_depreciacion_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF290157677646` FOREIGN KEY (`id_subcuenta_gasto_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF290174A5FFBA` FOREIGN KEY (`id_cuenta_depreciacion_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF290180C608FA` FOREIGN KEY (`id_cuenta_gasto_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF290186762CC7` FOREIGN KEY (`id_cuenta_activo_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_E0DF2901A752F04B` FOREIGN KEY (`id_elemento_gasto_gasto_id`) REFERENCES `elemento_gasto` (`id`),
  ADD CONSTRAINT `FK_E0DF2901A950EE53` FOREIGN KEY (`id_centro_costo_gasto_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_E0DF2901C84BDE84` FOREIGN KEY (`id_activo_id`) REFERENCES `activo_fijo` (`id`),
  ADD CONSTRAINT `FK_E0DF2901EB1B341E` FOREIGN KEY (`id_subcuenta_acreedora_id`) REFERENCES `subcuenta` (`id`);

--
-- Filtros para la tabla `activo_fijo_movimiento_activo_fijo`
--
ALTER TABLE `activo_fijo_movimiento_activo_fijo`
  ADD CONSTRAINT `FK_2FA61FF25832E72E` FOREIGN KEY (`id_activo_fijo_id`) REFERENCES `activo_fijo` (`id`),
  ADD CONSTRAINT `FK_2FA61FF27786CA71` FOREIGN KEY (`id_movimiento_activo_fijo_id`) REFERENCES `movimiento` (`id`);

--
-- Filtros para la tabla `acumulado_vacaciones`
--
ALTER TABLE `acumulado_vacaciones`
  ADD CONSTRAINT `FK_246B9D168D392AC7` FOREIGN KEY (`id_empleado_id`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `ajuste`
--
ALTER TABLE `ajuste`
  ADD CONSTRAINT `FK_DD35BD326601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `FK_D5B2D2501D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `almacen_ocupado`
--
ALTER TABLE `almacen_ocupado`
  ADD CONSTRAINT `FK_AA53605839161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_AA5360587EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `amenidades`
--
ALTER TABLE `amenidades`
  ADD CONSTRAINT `FK_6D8A3B4D1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `amenidades_hotel`
--
ALTER TABLE `amenidades_hotel`
  ADD CONSTRAINT `FK_2EB72C4C6298578D` FOREIGN KEY (`id_hotel_id`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `FK_2EB72C4C91F48FAD` FOREIGN KEY (`id_amenidades_id`) REFERENCES `amenidades` (`id`);

--
-- Filtros para la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD CONSTRAINT `FK_DFFB55EB6601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `area_responsabilidad`
--
ALTER TABLE `area_responsabilidad`
  ADD CONSTRAINT `FK_F469C2BA1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `FK_71D6D35C1800963C` FOREIGN KEY (`id_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_71D6D35C1ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_71D6D35C1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_71D6D35C2D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_71D6D35C39161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_71D6D35C4CC57875` FOREIGN KEY (`id_elemento_visa_id`) REFERENCES `elementos_visa` (`id`),
  ADD CONSTRAINT `FK_71D6D35C55C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_71D6D35C5832E72E` FOREIGN KEY (`id_activo_fijo_id`) REFERENCES `activo_fijo` (`id`),
  ADD CONSTRAINT `FK_71D6D35C6601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_71D6D35C71381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_71D6D35C8E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`),
  ADD CONSTRAINT `FK_71D6D35CC59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_71D6D35CD410562` FOREIGN KEY (`id_area_responsabilidad_id`) REFERENCES `area_responsabilidad` (`id`),
  ADD CONSTRAINT `FK_71D6D35CE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `FK_71D6D35CEF5F7851` FOREIGN KEY (`id_tipo_comprobante_id`) REFERENCES `tipo_comprobante` (`id`),
  ADD CONSTRAINT `FK_71D6D35CF5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_71D6D35CF66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `avisos_pagos`
--
ALTER TABLE `avisos_pagos`
  ADD CONSTRAINT `FK_F4396738E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`),
  ADD CONSTRAINT `FK_F439673A78A65A2` FOREIGN KEY (`id_plazo_pago_id`) REFERENCES `plazos_pago_cotizacion` (`id`);

--
-- Filtros para la tabla `beneficiarios_clientes`
--
ALTER TABLE `beneficiarios_clientes`
  ADD CONSTRAINT `FK_AE9DBD1E18997CB6` FOREIGN KEY (`id_pais_id`) REFERENCES `pais` (`id`),
  ADD CONSTRAINT `FK_AE9DBD1E6DB054DD` FOREIGN KEY (`id_provincia_id`) REFERENCES `provincias` (`id`),
  ADD CONSTRAINT `FK_AE9DBD1E7B7D6E92` FOREIGN KEY (`id_municipio_id`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `FK_AE9DBD1E7BF9CE86` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  ADD CONSTRAINT `FK_749608CE1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `cierre`
--
ALTER TABLE `cierre`
  ADD CONSTRAINT `FK_D0DCFCC739161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_D0DCFCC77EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `cierre_diario`
--
ALTER TABLE `cierre_diario`
  ADD CONSTRAINT `FK_F3D0CD8939161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_F3D0CD897EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `cliente_solicitudes`
--
ALTER TABLE `cliente_solicitudes`
  ADD CONSTRAINT `FK_D0874AE61D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_D0874AE63F78A396` FOREIGN KEY (`id_solicitud_id`) REFERENCES `solicitud` (`id`),
  ADD CONSTRAINT `FK_D0874AE67BF9CE86` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `cobros_pagos`
--
ALTER TABLE `cobros_pagos`
  ADD CONSTRAINT `FK_D9581D1626990C38` FOREIGN KEY (`id_informe_id`) REFERENCES `informe_recepcion` (`id`),
  ADD CONSTRAINT `FK_D9581D1655C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_D9581D167786CA71` FOREIGN KEY (`id_movimiento_activo_fijo_id`) REFERENCES `movimiento_activo_fijo` (`id`),
  ADD CONSTRAINT `FK_D9581D16E8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `comprobante_cierre`
--
ALTER TABLE `comprobante_cierre`
  ADD CONSTRAINT `FK_D03EA4C51800963C` FOREIGN KEY (`id_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_D03EA4C545F8C94C` FOREIGN KEY (`id_cierre_id`) REFERENCES `cierre` (`id`);

--
-- Filtros para la tabla `comprobante_movimiento_activo_fijo`
--
ALTER TABLE `comprobante_movimiento_activo_fijo`
  ADD CONSTRAINT `FK_81F5096A1399A3CF` FOREIGN KEY (`id_registro_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_81F5096A1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_81F5096A9D00B230` FOREIGN KEY (`id_movimiento_activo_id`) REFERENCES `movimiento_activo_fijo` (`id`);

--
-- Filtros para la tabla `comprobante_salario`
--
ALTER TABLE `comprobante_salario`
  ADD CONSTRAINT `FK_8C5550701399A3CF` FOREIGN KEY (`id_registro_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_8C5550701D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `configuracion_inicial`
--
ALTER TABLE `configuracion_inicial`
  ADD CONSTRAINT `FK_8521BE24404AE9D2` FOREIGN KEY (`id_modulo_id`) REFERENCES `modulo` (`id`),
  ADD CONSTRAINT `FK_8521BE247A4F962` FOREIGN KEY (`id_tipo_documento_id`) REFERENCES `tipo_documento` (`id`);

--
-- Filtros para la tabla `configuracion_reglas_remesas`
--
ALTER TABLE `configuracion_reglas_remesas`
  ADD CONSTRAINT `FK_2398566118997CB6` FOREIGN KEY (`id_pais_id`) REFERENCES `pais` (`id`),
  ADD CONSTRAINT `FK_239856611D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_23985661E8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `config_precio_venta_servicio`
--
ALTER TABLE `config_precio_venta_servicio`
  ADD CONSTRAINT `FK_6A244E601D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `config_servicios`
--
ALTER TABLE `config_servicios`
  ADD CONSTRAINT `FK_A1A8B7121D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_A1A8B71269D86E10` FOREIGN KEY (`id_servicio_id`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `consecutivo_servicio`
--
ALTER TABLE `consecutivo_servicio`
  ADD CONSTRAINT `FK_EAB6E3871D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_EAB6E38769D86E10` FOREIGN KEY (`id_servicio_id`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `FK_EAB6E3878E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`);

--
-- Filtros para la tabla `contratos_cliente`
--
ALTER TABLE `contratos_cliente`
  ADD CONSTRAINT `FK_29A5BB47374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_29A5BB477BF9CE86` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente_contabilidad` (`id`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `FK_44A5EC031D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `creditos_precio_venta`
--
ALTER TABLE `creditos_precio_venta`
  ADD CONSTRAINT `FK_847FE8A91D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_847FE8A94699DFE5` FOREIGN KEY (`id_config_precio_venta_id`) REFERENCES `config_precio_venta_servicio` (`id`);

--
-- Filtros para la tabla `cuadre_diario`
--
ALTER TABLE `cuadre_diario`
  ADD CONSTRAINT `FK_60ABEFD91ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_60ABEFD92D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_60ABEFD939161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_60ABEFD945F8C94C` FOREIGN KEY (`id_cierre_id`) REFERENCES `cierre` (`id`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `FK_31C7BFCF45E7F350` FOREIGN KEY (`id_tipo_cuenta_id`) REFERENCES `tipo_cuenta` (`id`);

--
-- Filtros para la tabla `cuentas_cliente`
--
ALTER TABLE `cuentas_cliente`
  ADD CONSTRAINT `FK_64653310374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_646533107BF9CE86` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente_contabilidad` (`id`),
  ADD CONSTRAINT `FK_646533109CDF4BAB` FOREIGN KEY (`id_banco_id`) REFERENCES `banco` (`id`);

--
-- Filtros para la tabla `cuentas_unidad`
--
ALTER TABLE `cuentas_unidad`
  ADD CONSTRAINT `FK_355374201D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_35537420374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_355374209CDF4BAB` FOREIGN KEY (`id_banco_id`) REFERENCES `banco` (`id`);

--
-- Filtros para la tabla `cuenta_criterio_analisis`
--
ALTER TABLE `cuenta_criterio_analisis`
  ADD CONSTRAINT `FK_AF040B091ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_AF040B095ABBE5F6` FOREIGN KEY (`id_criterio_analisis_id`) REFERENCES `criterio_analisis` (`id`);

--
-- Filtros para la tabla `custom_user`
--
ALTER TABLE `custom_user`
  ADD CONSTRAINT `FK_8CE51EB479F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD CONSTRAINT `FK_D618AE149D01464C` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `descuestos_servicios_cotizacion`
--
ALTER TABLE `descuestos_servicios_cotizacion`
  ADD CONSTRAINT `FK_1C606F0069D86E10` FOREIGN KEY (`id_servicio_id`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `FK_1C606F008E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `FK_524D9F671D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_524D9F6739161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_524D9F675074DD86` FOREIGN KEY (`id_orden_tabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_524D9F676601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_524D9F67C59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_524D9F67F66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD CONSTRAINT `FK_1AE277DFB77634D2` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_1AE277DFC604D5C6` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `distribuidor_provincias`
--
ALTER TABLE `distribuidor_provincias`
  ADD CONSTRAINT `FK_8DA1E24DA156727D` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`id`),
  ADD CONSTRAINT `FK_8DA1E24DCEEEDB42` FOREIGN KEY (`distribuidor_id`) REFERENCES `distribuidor` (`id`);

--
-- Filtros para la tabla `distribuidor_saldo`
--
ALTER TABLE `distribuidor_saldo`
  ADD CONSTRAINT `FK_29FECCE6B77634D2` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_29FECCE6CEEEDB42` FOREIGN KEY (`distribuidor_id`) REFERENCES `distribuidor` (`id`);

--
-- Filtros para la tabla `distribuidor_zona`
--
ALTER TABLE `distribuidor_zona`
  ADD CONSTRAINT `FK_1DA5FABD104EA8FC` FOREIGN KEY (`zona_id`) REFERENCES `zona_remesas` (`id`),
  ADD CONSTRAINT `FK_1DA5FABDCEEEDB42` FOREIGN KEY (`distribuidor_id`) REFERENCES `distribuidor` (`id`);

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `FK_B6B12EC71D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_B6B12EC7374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_B6B12EC739161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_B6B12EC74832F387` FOREIGN KEY (`id_documento_cancelado_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_B6B12EC77A4F962` FOREIGN KEY (`id_tipo_documento_id`) REFERENCES `tipo_documento` (`id`);

--
-- Filtros para la tabla `elementos_visa`
--
ALTER TABLE `elementos_visa`
  ADD CONSTRAINT `FK_90B65E041D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_90B65E0469D86E10` FOREIGN KEY (`id_servicio_id`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `FK_90B65E04E8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_D9D9BF521D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_D9D9BF527EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D9D9BF52D1E12F15` FOREIGN KEY (`id_cargo_id`) REFERENCES `cargo` (`id`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `FK_D59CA4131D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `facilidades`
--
ALTER TABLE `facilidades`
  ADD CONSTRAINT `FK_551461581D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `facilidades_hotel`
--
ALTER TABLE `facilidades_hotel`
  ADD CONSTRAINT `FK_78E84AB15FB489F0` FOREIGN KEY (`id_facilidades_id`) REFERENCES `facilidades` (`id`),
  ADD CONSTRAINT `FK_78E84AB16298578D` FOREIGN KEY (`id_hotel_id`) REFERENCES `hotel` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_F9EBA0091D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_F9EBA009374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_F9EBA0094F4C4E26` FOREIGN KEY (`id_categoria_cliente_id`) REFERENCES `categoria_cliente` (`id`),
  ADD CONSTRAINT `FK_F9EBA00968BCB606` FOREIGN KEY (`id_contrato_id`) REFERENCES `contratos_cliente` (`id`),
  ADD CONSTRAINT `FK_F9EBA00971381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_F9EBA0097EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F9EBA00999274826` FOREIGN KEY (`id_factura_cancela_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_F9EBA009C37A5552` FOREIGN KEY (`id_termino_pago_id`) REFERENCES `termino_pago` (`id`),
  ADD CONSTRAINT `FK_F9EBA009C59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_F9EBA009F5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_F9EBA009F66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `facturas_comprobante`
--
ALTER TABLE `facturas_comprobante`
  ADD CONSTRAINT `FK_6FD2F19B1800963C` FOREIGN KEY (`id_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_6FD2F19B1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_6FD2F19B55C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`);

--
-- Filtros para la tabla `factura_cotizacion`
--
ALTER TABLE `factura_cotizacion`
  ADD CONSTRAINT `FK_ADBC38781D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_ADBC38784F4C4E26` FOREIGN KEY (`id_categoria_cliente_id`) REFERENCES `categoria_cliente` (`id`),
  ADD CONSTRAINT `FK_ADBC38787EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_ADBC38788E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`);

--
-- Filtros para la tabla `factura_documento`
--
ALTER TABLE `factura_documento`
  ADD CONSTRAINT `FK_CCC060C155C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_CCC060C16601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_CCC060C1EC34F77F` FOREIGN KEY (`id_movimiento_venta_id`) REFERENCES `movimiento_venta` (`id`);

--
-- Filtros para la tabla `habitaciones_hotel`
--
ALTER TABLE `habitaciones_hotel`
  ADD CONSTRAINT `FK_74F394B06298578D` FOREIGN KEY (`id_hotel_id`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `FK_74F394B091F48FAD` FOREIGN KEY (`id_amenidades_id`) REFERENCES `amenidades` (`id`);

--
-- Filtros para la tabla `impresora`
--
ALTER TABLE `impresora`
  ADD CONSTRAINT `FK_BBCADB321D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD CONSTRAINT `FK_B6E63AA11D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `impuestos_servicio_cotizacion`
--
ALTER TABLE `impuestos_servicio_cotizacion`
  ADD CONSTRAINT `FK_2CA4AD5E69D86E10` FOREIGN KEY (`id_servicio_id`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `FK_2CA4AD5E8E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`),
  ADD CONSTRAINT `FK_2CA4AD5ECA29A612` FOREIGN KEY (`id_impuesto_id`) REFERENCES `impuesto` (`id`);

--
-- Filtros para la tabla `impuesto_sobre_renta`
--
ALTER TABLE `impuesto_sobre_renta`
  ADD CONSTRAINT `FK_5EF11EF48D392AC7` FOREIGN KEY (`id_empleado_id`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `FK_5EF11EF4A9ECE748` FOREIGN KEY (`id_rango_escala_id`) REFERENCES `rango_escala_dgii` (`id`),
  ADD CONSTRAINT `FK_5EF11EF4E9DBC8E8` FOREIGN KEY (`id_nomina_pago_id`) REFERENCES `nomina_pago` (`id`);

--
-- Filtros para la tabla `informe_recepcion`
--
ALTER TABLE `informe_recepcion`
  ADD CONSTRAINT `FK_62A4EBD6601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_62A4EBDE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `FK_A4EE5DFC104EA8FC` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`);

--
-- Filtros para la tabla `mercancia`
--
ALTER TABLE `mercancia`
  ADD CONSTRAINT `FK_9D094AE0E16A5625` FOREIGN KEY (`id_unidad_medida_id`) REFERENCES `unidad_medida` (`id`),
  ADD CONSTRAINT `FK_9D094AE0E2C70A62` FOREIGN KEY (`id_amlacen_id`) REFERENCES `almacen` (`id`);

--
-- Filtros para la tabla `mercancia_impuesto`
--
ALTER TABLE `mercancia_impuesto`
  ADD CONSTRAINT `FK_2E2D6041BCE90A26` FOREIGN KEY (`mercancia_id`) REFERENCES `mercancia` (`id`),
  ADD CONSTRAINT `FK_2E2D6041D23B6BE5` FOREIGN KEY (`impuesto_id`) REFERENCES `impuesto` (`id`);

--
-- Filtros para la tabla `mercancia_producto`
--
ALTER TABLE `mercancia_producto`
  ADD CONSTRAINT `FK_3F705CF56E57A479` FOREIGN KEY (`id_producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_3F705CF59F287F54` FOREIGN KEY (`id_mercancia_id`) REFERENCES `mercancia` (`id`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `FK_C8FF107A4F781EA` FOREIGN KEY (`id_unidad_destino_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_C8FF107A873C7FC7` FOREIGN KEY (`id_unidad_origen_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_C8FF107AD1CE493D` FOREIGN KEY (`id_tipo_documento_activo_fijo_id`) REFERENCES `tipo_documento_activo_fijo` (`id`),
  ADD CONSTRAINT `FK_C8FF107ADB763453` FOREIGN KEY (`id_tipo_movimiento_id`) REFERENCES `tipo_movimiento` (`id`);

--
-- Filtros para la tabla `movimiento_activo_fijo`
--
ALTER TABLE `movimiento_activo_fijo`
  ADD CONSTRAINT `FK_A985A0DA1ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_A985A0DA1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_A985A0DA2D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_A985A0DA4B1CE99D` FOREIGN KEY (`id_unidad_destino_origen_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_A985A0DA571159DE` FOREIGN KEY (`id_movimiento_cancelado_id`) REFERENCES `movimiento_activo_fijo` (`id`),
  ADD CONSTRAINT `FK_A985A0DA5832E72E` FOREIGN KEY (`id_activo_fijo_id`) REFERENCES `activo_fijo` (`id`),
  ADD CONSTRAINT `FK_A985A0DA7EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_A985A0DADB763453` FOREIGN KEY (`id_tipo_movimiento_id`) REFERENCES `tipo_movimiento` (`id`),
  ADD CONSTRAINT `FK_A985A0DAE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `movimiento_mercancia`
--
ALTER TABLE `movimiento_mercancia`
  ADD CONSTRAINT `FK_44876BD739161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_44876BD755C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_44876BD7571159DE` FOREIGN KEY (`id_movimiento_cancelado_id`) REFERENCES `movimiento_mercancia` (`id`),
  ADD CONSTRAINT `FK_44876BD76601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_44876BD771381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_44876BD77A4F962` FOREIGN KEY (`id_tipo_documento_id`) REFERENCES `tipo_documento` (`id`),
  ADD CONSTRAINT `FK_44876BD77EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_44876BD79F287F54` FOREIGN KEY (`id_mercancia_id`) REFERENCES `mercancia` (`id`),
  ADD CONSTRAINT `FK_44876BD7C59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_44876BD7F5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_44876BD7F66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `movimiento_producto`
--
ALTER TABLE `movimiento_producto`
  ADD CONSTRAINT `FK_FFC0EDFC39161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC55C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC571159DE` FOREIGN KEY (`id_movimiento_cancelado_id`) REFERENCES `movimiento_producto` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC6601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC6E57A479` FOREIGN KEY (`id_producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC71381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC7A4F962` FOREIGN KEY (`id_tipo_documento_id`) REFERENCES `tipo_documento` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFC7EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFCC59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFCF5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_FFC0EDFCF66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `movimiento_servicio`
--
ALTER TABLE `movimiento_servicio`
  ADD CONSTRAINT `FK_93FD19C355C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_93FD19C371CAA3E7` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `movimiento_venta`
--
ALTER TABLE `movimiento_venta`
  ADD CONSTRAINT `FK_8E3F7AE539161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_8E3F7AE555C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`),
  ADD CONSTRAINT `FK_8E3F7AE56EA527F2` FOREIGN KEY (`id_expediente_acreedor_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_8E3F7AE5D8F8B0AD` FOREIGN KEY (`id_centro_costo_acreedor_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_8E3F7AE5F0821C98` FOREIGN KEY (`id_elemento_gasto_acreedor_id`) REFERENCES `elemento_gasto` (`id`),
  ADD CONSTRAINT `FK_8E3F7AE5FA3DF5CD` FOREIGN KEY (`id_orden_trabajo_acreedor_id`) REFERENCES `orden_trabajo` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `FK_BBFAB5864E7121AF` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`);

--
-- Filtros para la tabla `nominas_consecutivos`
--
ALTER TABLE `nominas_consecutivos`
  ADD CONSTRAINT `FK_9FC8A71A1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `nomina_pago`
--
ALTER TABLE `nomina_pago`
  ADD CONSTRAINT `FK_5CB8BD331D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_5CB8BD338D392AC7` FOREIGN KEY (`id_empleado_id`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `FK_5CB8BD33AC6A6301` FOREIGN KEY (`id_usuario_aprueba_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `nomina_tercero_comprobante`
--
ALTER TABLE `nomina_tercero_comprobante`
  ADD CONSTRAINT `FK_D4A77ABF1800963C` FOREIGN KEY (`id_comprobante_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_D4A77ABF1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_D4A77ABF2547677` FOREIGN KEY (`id_nomina_id`) REFERENCES `nomina_pago` (`id`);

--
-- Filtros para la tabla `obligacion_cobro`
--
ALTER TABLE `obligacion_cobro`
  ADD CONSTRAINT `FK_807C726D55C5F988` FOREIGN KEY (`id_factura_id`) REFERENCES `factura` (`id`);

--
-- Filtros para la tabla `obligacion_pago`
--
ALTER TABLE `obligacion_pago`
  ADD CONSTRAINT `FK_403C9B3B1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_403C9B3B6601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `FK_403C9B3BE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `operaciones_comprobante_operaciones`
--
ALTER TABLE `operaciones_comprobante_operaciones`
  ADD CONSTRAINT `FK_E7EA17E1ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_E7EA17E1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_E7EA17E2D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_E7EA17E39161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_E7EA17E47B60D7E` FOREIGN KEY (`id_instrumento_cobro_id`) REFERENCES `instrumento_cobro` (`id`),
  ADD CONSTRAINT `FK_E7EA17E71381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_E7EA17EC59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_E7EA17EE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `FK_E7EA17EECB9FBA7` FOREIGN KEY (`id_registro_comprobantes_id`) REFERENCES `registro_comprobantes` (`id`),
  ADD CONSTRAINT `FK_E7EA17EF5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_E7EA17EF66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD CONSTRAINT `FK_4158A0241D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_4158A02439161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`);

--
-- Filtros para la tabla `periodo_sistema`
--
ALTER TABLE `periodo_sistema`
  ADD CONSTRAINT `FK_AEF0BAAD1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_AEF0BAAD39161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_AEF0BAAD7EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `plazos_pago_cotizacion`
--
ALTER TABLE `plazos_pago_cotizacion`
  ADD CONSTRAINT `FK_4A1D3ED28E5841CF` FOREIGN KEY (`id_cotizacion_id`) REFERENCES `cotizacion` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_A7BB0615E16A5625` FOREIGN KEY (`id_unidad_medida_id`) REFERENCES `unidad_medida` (`id`),
  ADD CONSTRAINT `FK_A7BB0615E2C70A62` FOREIGN KEY (`id_amlacen_id`) REFERENCES `almacen` (`id`);

--
-- Filtros para la tabla `producto_impuesto`
--
ALTER TABLE `producto_impuesto`
  ADD CONSTRAINT `FK_9E754B747645698E` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_9E754B74D23B6BE5` FOREIGN KEY (`impuesto_id`) REFERENCES `impuesto` (`id`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `FK_16C068CEC604D5C6` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `proveedor_unidad`
--
ALTER TABLE `proveedor_unidad`
  ADD CONSTRAINT `FK_EE37BED59D01464C` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_EE37BED5CB305D73` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `proveedor_unidad_servicios`
--
ALTER TABLE `proveedor_unidad_servicios`
  ADD CONSTRAINT `FK_68EBF91E2FF8143C` FOREIGN KEY (`proveedor_unidad_id`) REFERENCES `proveedor_unidad` (`id`),
  ADD CONSTRAINT `FK_68EBF91E71CAA3E7` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `FK_9F631427C604D5C6` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `registro_comprobantes`
--
ALTER TABLE `registro_comprobantes`
  ADD CONSTRAINT `FK_B2D1B2B21D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_B2D1B2B239161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_B2D1B2B247B60D7E` FOREIGN KEY (`id_instrumento_cobro_id`) REFERENCES `instrumento_cobro` (`id`),
  ADD CONSTRAINT `FK_B2D1B2B27EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B2D1B2B2EF5F7851` FOREIGN KEY (`id_tipo_comprobante_id`) REFERENCES `tipo_comprobante` (`id`);

--
-- Filtros para la tabla `saldo_cuentas`
--
ALTER TABLE `saldo_cuentas`
  ADD CONSTRAINT `FK_BB2B71AE1ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_BB2B71AE1D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_BB2B71AE2D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_BB2B71AE39161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_BB2B71AE71381BB3` FOREIGN KEY (`id_orden_trabajo_id`) REFERENCES `orden_trabajo` (`id`),
  ADD CONSTRAINT `FK_BB2B71AEC59B01FF` FOREIGN KEY (`id_centro_costo_id`) REFERENCES `centro_costo` (`id`),
  ADD CONSTRAINT `FK_BB2B71AEE8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `FK_BB2B71AEF5DBAF2B` FOREIGN KEY (`id_expediente_id`) REFERENCES `expediente` (`id`),
  ADD CONSTRAINT `FK_BB2B71AEF66372E9` FOREIGN KEY (`id_elemento_gasto_id`) REFERENCES `elemento_gasto` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_96D27CC01D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `subcuenta`
--
ALTER TABLE `subcuenta`
  ADD CONSTRAINT `FK_57BB37EA1ADA4D3F` FOREIGN KEY (`id_cuenta_id`) REFERENCES `cuenta` (`id`);

--
-- Filtros para la tabla `subcuenta_criterio_analisis`
--
ALTER TABLE `subcuenta_criterio_analisis`
  ADD CONSTRAINT `FK_52A4A7682D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_52A4A7685ABBE5F6` FOREIGN KEY (`id_criterio_analisis_id`) REFERENCES `criterio_analisis` (`id`);

--
-- Filtros para la tabla `subcuenta_proveedor`
--
ALTER TABLE `subcuenta_proveedor`
  ADD CONSTRAINT `FK_5C22E4B82D412F53` FOREIGN KEY (`id_subcuenta_id`) REFERENCES `subcuenta` (`id`),
  ADD CONSTRAINT `FK_5C22E4B8E8F12801` FOREIGN KEY (`id_proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `tasa_cambio`
--
ALTER TABLE `tasa_cambio`
  ADD CONSTRAINT `FK_DAB48606D85CECF7` FOREIGN KEY (`id_moneda_destino_id`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `FK_DAB48606FA5CADE9` FOREIGN KEY (`id_moneda_origen_id`) REFERENCES `moneda` (`id`);

--
-- Filtros para la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `FK_EDC227301D34FA6B` FOREIGN KEY (`id_unidad_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_EDC2273039161EBF` FOREIGN KEY (`id_almacen_id`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `FK_EDC227306601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `FK_F3E6D02F31E700CD` FOREIGN KEY (`id_padre_id`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `FK_F3E6D02F374388F5` FOREIGN KEY (`id_moneda_id`) REFERENCES `moneda` (`id`);

--
-- Filtros para la tabla `user_client_tmp`
--
ALTER TABLE `user_client_tmp`
  ADD CONSTRAINT `FK_AC2C28007BF9CE86` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_AC2C28007EB2C349` FOREIGN KEY (`id_usuario_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `vacaciones_disfrutadas`
--
ALTER TABLE `vacaciones_disfrutadas`
  ADD CONSTRAINT `FK_F02817318D392AC7` FOREIGN KEY (`id_empleado_id`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `vale_salida`
--
ALTER TABLE `vale_salida`
  ADD CONSTRAINT `FK_90C265C86601BA07` FOREIGN KEY (`id_documento_id`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `zona_remesas`
--
ALTER TABLE `zona_remesas`
  ADD CONSTRAINT `FK_D37DCA054E7121AF` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`),
  ADD CONSTRAINT `FK_D37DCA0558BC1BE0` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `FK_D37DCA05C604D5C6` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
