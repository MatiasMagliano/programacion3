-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2025 a las 17:59:44
-- Versión del servidor: 10.11.6-MariaDB-0+deb12u1
-- Versión de PHP: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE `adjuntos` (
  `id` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `path` varchar(250) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id`, `id_contenido`, `titulo`, `path`, `nombre`, `tipo`) VALUES
(1, 1, 'Apunte HTML', 'adjuntos/HTML/', 'apunte_HTML.pdf', 'PDF'),
(2, 1, 'PARCIAL I - HTML', 'adjuntos/HTML/', 'parcial_HTML.pdf', 'PDF'),
(3, 1, 'Ejemplo \"perfil\"', 'adjuntos/HTML/', 'perfil.png', 'PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `tipo_contenido` varchar(9) NOT NULL,
  `nro_contenido` int(2) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `referencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `tipo_contenido`, `nro_contenido`, `titulo`, `fecha_publicacion`, `referencia`) VALUES
(1, 'front-end', 1, 'INTRODUCCIÓN A HTML', '2025-01-23', '<h5>¿Qué es un atributo de etiqueta?</h5>\r\n        <p>Agrega información adicional a los elementos que los contienen. Todas las etiquetas HTML pueden tener atributos. Siempre se define (o declara) en la etiqueta inicial y generalmente se declara en pares, como <code>atributo=\"valor\"</code>.</p>\r\n\r\n        <h5>¿Cómo se estiliza en HTML?</h5>\r\n        <p>Tres formas:</p>\r\n            <ul>\r\n                <li>in-line: también llamado en-etiqueta y se refiere a la declaración de un atributo \"style\" dentro del elemento a declarar. Por ejemplo <code>&lt;p style=\"color:red;\"&gt;</code></li>\r\n                <li>dentro del documento: declarando un tag <code>&lt;style&gt;...&lt;/style&gt;</code> en el encabezado HTML (<code>&lt;head&gt;...&lt;/head&gt;</code>) y utilizando el lenguaje CSS. Ejemplo: <code>propiedad:\"valor\";</code></li>\r\n                <li>en un archivo externo: agregando elemento \"link\" y dos atributos en el encabezado HTML, de la siguiente manera: <code>&lt;link rel=\"stylesheet\" href=\"estilos.css\"&gt;</code></li>\r\n            </ul>\r\n            \r\n        <h5>¿Cómo se redirige un enlace?</h5>\r\n        <p>Los enlaces son la forma más conveniente de redirigir el contenido navegable de una página web. Los enlaces ayudan a estructurar la información de manera lógica y jerárquica y hacen que tu sitio web sea más interactivo y fácil de usar</p>'),
(2, 'front-end', 2, 'INTRODUCCIÓN A CSS', '2025-01-27', 'Perteneciente al mundo del diseño gráfico, el lenguaje CSS (Cascading Style Sheets, Hoja de Estilos en Cascada) y se le denomina estilos en cascada porque se lee, procesa y aplica el código desde arriba hacia abajo, siguiendo patrones como herencia o cascada.'),
(5, 'front-end', 3, 'BOOTSTRAP 5 FRAMEWORK', '2099-01-01', '<h3 class=\"\">BOOTSTRAP 5 COMO MARCO DE TRABAJO</h3><p><br>Ya en su <b>versión 5</b>, se trata de un compendio de clases en <b>CSS</b>, creadas en el <u>2010 por Twitter</u> y liberadas a la comunidad en el 2011. Maneja perfectamente la <b>\"responsividad\"</b>, lo que significa que <u>se adapta a cualquier dispositivo que acceda al sitio web</u>.<br></p>'),
(7, 'front-end', 4, 'GITHUB', '2099-01-01', '<h3 class=\"\">GITHUB</h3>Es una plataforma para desarrolladores construida con el fin de unificar código de <u>colaboradores en un mismo proyecto</u>. De manera <b>gratuita</b>, el código es completamente público y permite distribuir <u>código fuente en cualquier lenguaje</u>. <b>Lo usaremos para los trabajos prácticos durante el año</b>.<p></p>'),
(8, 'back-end', 5, 'PHP - HYPERTEXT PREPROCESSOR', '2099-01-01', '<h3 class=\"\">PHP como lenguaje soporte web</h3><br>En su versión 8.2, el debate se abre alrededor de si es o no un <u>lenguaje de programación</u> puesto que se escribe código directamente entre las <b>etiquetas HTML</b>. Se logran sitios de datos dinámicos e interactivos. El resultado final siempre es un archivo interpretado por el <u>navegador web del cliente</u>.<p></p>'),
(9, 'back-end', 6, 'LARAVEL V11.x SYMPHONY FRAMEWORK', '2099-01-01', 'BLA BLA BLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollo`
--

CREATE TABLE `desarrollo` (
  `id` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `letra_desarrollo` char(1) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `desarrollo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrollo`
--

INSERT INTO `desarrollo` (`id`, `id_contenido`, `letra_desarrollo`, `titulo`, `desarrollo`) VALUES
(1, 1, 'A', '<u>LA ESTRUCTURA HTML</u>', '<p>Todo documento HTML debe poseer una estructura específica que lo define como una página WEB. Las etiquetas que veremos son:\r\n    <pre class=\"bg-light\">\r\n        <code>\r\n            &lt;html&gt;\r\n                &lt;head&gt;\r\n                    &lt;title&gt;TITULO...&lt;/title&gt;\r\n                &lt;/head&gt;\r\n\r\n                &lt;body&gt;\r\n                    <!-- CONTENIDO WEB -->\r\n                &lt;/body&gt;\r\n            &lt;/html&gt;\r\n        </code>\r\n    </pre>'),
(2, 1, 'B', '<u>ATRIBUTOS</u>', '<p>Los atributos nos permiten extender o especificar la funcionalidad del marcado de una etiqueta. Generalmente se escribe: <code>atributo=\"valor\"</code> Por lo que designa si una característica de la etiqueta debe exibir ese atributo o no.</p>\r\n    Algunos ejemplos que veremos: <code>&lt;html lang=\"es\"&gt;, &lt;a href=\"...\"&gt;, &lt;img src=\"...\"&gt;, &lt;img src=\"...\" width=\"...px\" height=\"...px\"&gt;, &lt;p title=\"...\"&gt;</code>\r\n    <p>Puedes encontrar una lista de atributos comunes <a href=\"https://www.w3schools.com/tags/ref_attributes.asp\" target=\"_blank\" rel=\"noopener noreferrer\">aquí</a>.</p>'),
(3, 1, 'C', '<u>ESTILOS</u>', '<p>Hay tres formas de aplicar estilo a un documento HTML:</p>\r\n    <ol>\r\n        <li>\r\n            <b>Estilo en línea (in-line)</b>: Es como pegar un post-it en un mueble para cambiar su color o tamaño. Cada elemento HTML puede tener su propio estilo definido directamente en la etiqueta. Por ejemplo:\r\n            <code>&lt;h1 style=\"color: blue; font-size: 24px;\"&gt;Este es un título azul&lt;/h1&gt;</code><br>\r\n            <b>Ventajas</b>: Es rápido para cambios pequeños y específicos. <br>\r\n            <b>Desventajas</b>: Hace el código HTML más desordenado y difícil de mantener si tienes muchos estilos.\r\n        </li>\r\n        <li>\r\n            <b>Estilo dentro del documento HTML</b>: Es como tener un cuaderno donde escribes todas las reglas de decoración de tu habitación. Creas una sección <code>&lt;style&gt;</code> dentro de la etiqueta <code>&lt;head&gt;</code> de tu documento HTML y ahí defines todos los estilos que quieras usar. Por ejemplo:\r\n            <pre class=\"bg-light\">\r\n                <code>\r\n                    &lt;head&gt;\r\n                        &lt;style&gt;\r\n                            h1 {\r\n                                color: red;\r\n                                text-align: center;\r\n                            }\r\n                        &lt;/style&gt;\r\n                    &lt;/head&gt;\r\n                </code>\r\n            </pre>\r\n            <b>Ventajas</b>: Organiza mejor los estilos y es más fácil de mantener que el estilo en línea.<br>\r\n            <b>Desventajas</b>: Si tienes muchos estilos, el <code>&lt;head&gt;</code> puede volverse muy largo y afectar el rendimiento de la página.\r\n        </li>\r\n        <li>\r\n            <b>Archivo externo de estilos (CSS)</b>: Es como tener un libro de reglas de decoración que puedes usar en todas las habitaciones de tu casa. Creas un archivo separado con extensión <code>.css</code> donde escribes todos tus estilos y luego lo enlazas a tu documento HTML. Por ejemplo:\r\n            <pre class=\"bg-light\">\r\n                <code>\r\n                    &lt;head&gt;\r\n                        &lt;link rel=\"stylesheet\" href=\"styles.css\"&gt;\r\n                    &lt;/head&gt;\r\n                </code>\r\n            </pre>\r\n            <b>Ventajas</b>:\r\n            <ul>\r\n                <li>Separa la estructura (HTML) del diseño (CSS), lo que hace el código más limpio y fácil de mantener.</li>\r\n                <li>Permite reutilizar los estilos en múltiples páginas.</li>\r\n                <li>Mejora el rendimiento de la página, ya que el navegador solo tiene que descargar el archivo CSS una vez.</li>\r\n            </ul>\r\n        </li>\r\n    </ol>'),
(4, 1, 'D', '<u>FORMATO</u>', '<p>Este tipo de etiquetas define formato directo sobre el texto/objeto que rodea, por lo que cambia su apariencia sin definir un estilo. Por ejemplo:</p>\r\n    <ul>\r\n        <li><code>&lt;b&gt;&lt;/b&gt;</code> define un texto en negrita</li>\r\n        <li><code>&lt;strong&gt;&lt;/strong&gt;</code> define visualmente en negrita, pero para los no videntes se interpreta como texto importante</li>\r\n        <li><code>&lt;i&gt;&lt;/i&gt;</code> define texto en itálica</li>\r\n        <li><code>&lt;em&gt;&lt;/em&gt;</code> texto enfatizado</li>\r\n        <li><code>&lt;mark&gt;&lt;/mark&gt;</code> texto marcado</li>\r\n        <li><code>&lt;small&gt;&lt;/small&gt;</code> texto de tipografía pequeña</li>\r\n        <li><code>&lt;del&gt;&lt;/del&gt;</code> texto borrado</li>\r\n        <li><code>&lt;ins&gt;&lt;/ins&gt;</code> texto insertado</li>\r\n        <li><code>&lt;sub&gt;&lt;/sub&gt;</code> texto en formato subíndice</li>\r\n        <li><code>&lt;sup&gt;&lt;/sup&gt;</code> texto en superíndice</li>\r\n    </ul>'),
(5, 1, 'E', '<u>ENLACES</u>', '<p>El marcado de un enlace nos permite agregar funcionalidad interactiva creando un punto de pasaje a otra sección de nuestro sitio WEB. A través de los enlaces, estamos invitando al usuario a \"ir\" a otra página.</p>\r\n    <p>Algunos ejemplos de enlaces que veremos:</p>\r\n    <ul>\r\n        <li><b>Enlace simple</b>: <code>&lt;a href=\"url\"&gt;ENLACE&lt;/a&gt;</code></li>\r\n        <li><b>Enlace con atributos</b>: <code>&lt;a href=\"url\" target=\"_blank, _parent, _self, _top\" title=\"texto\"&gt;ENLACE&lt;/a&gt;</code></li>\r\n        <li><b>Enlaces especiales</b> <code>&lt;a href=\"mailto:ejemplo@ejemplo.com\"&gt;ENLACE&lt;/a&gt; | &lt;button onclick=\"document.location=\'url\'\"&gt;ENLACE&lt;/button&gt;</code></li>\r\n        <li><b>Colores</b>: definible como estilo, se divide en cuatro estados o funcionalidades \"enlace\", \"visitado\", \"encima\" y \"activo\": <code>a:link, a:visited, a:hover, a:active</code> respectivamente.</li>\r\n        <li>\r\n            <b>Marcapágina:</b> es un tipo de enlace que \"salta\" a una sección definida previamente en el cuerpo HTML. Por ejemplo: <br>\r\n            - Marcado de la sección:\r\n                <code>&lt;h2 id=\"C4\"&gt;Capítulo 4&lt;/h2&gt;</code> <br>\r\n            - Enlaces a la sección:\r\n                <code>&lt;a href=\"#C4\"&gt;Ir al Capítulo 4&lt;/a&gt; ó con URL absoluta: &lt;a href=\"index_demo.html#C4\"&gt;Ir al Capítulo 4&lt;/a&gt;</code>\r\n        </li>\r\n        <li>\r\n            <b>Ubicación del enlace</b>: existen enlaces <b>absolutos</b> <code>https://www.google.com</code> o <b>relativos</b> <code>../../segundapagina.html</code> que dependen de la estructura de archivos del sitio.<br>\r\n            Aquí cabe destacar tambiérn la naturaleza de las <strong>rutas o URLs</strong>:\r\n            <ul>\r\n                <li><u>RUTAS POR ARCHIVOS</u>: se debe especificar la <b>ruta completa</b> al archivo, por ejemplo: <code>file:///carpeta1/carpeta2/index.html</code></li>\r\n                <li><u>ENRUTAMIENTO DE URLs</u>: se utiliza un sistema adicional que ayuda a resolver y ocultar las rutas a archivos, por ejemplo: <code>http://sitio/clientes</code><br>\r\n                Como se ve, no hay una ruta a un archivo, sino una ruta sin especificar. Nuestro sistema deberá ser capaz de resolverla y \"despachar\" un determinado archivo.</li>\r\n            </ul>\r\n        </li>\r\n    </ul>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginattempts`
--

CREATE TABLE `loginattempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verified`) VALUES
(3, 'Matías Magliano', 'magliano.matias@gmail.com', '$2y$10$MW6c5IBzB/CquxwMeo9fWOr9iDmNi89uPpOC25wpLQvMnyFzYV2SC', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adjuntos-contenidos` (`id_contenido`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_contenido` (`nro_contenido`);

--
-- Indices de la tabla `desarrollo`
--
ALTER TABLE `desarrollo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contenidos-desarrollo` (`id_contenido`);

--
-- Indices de la tabla `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `desarrollo`
--
ALTER TABLE `desarrollo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
  ADD CONSTRAINT `fk_adjuntos-contenidos` FOREIGN KEY (`id_contenido`) REFERENCES `contenidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `desarrollo`
--
ALTER TABLE `desarrollo`
  ADD CONSTRAINT `fk_contenidos-desarrollo` FOREIGN KEY (`id_contenido`) REFERENCES `contenidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
