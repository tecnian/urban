-- -----------------------------------------------------
-- Table `admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_perfil` TINYINT UNSIGNED NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(100) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `slider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `slider` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `slider_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `slider_item` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_slider` INT UNSIGNED NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `orden` SMALLINT NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_slider_item_slider1_idx` (`id_slider` ASC),
  CONSTRAINT `fk_slider_item_slider1`
    FOREIGN KEY (`id_slider`)
    REFERENCES `slider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `idioma` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(3) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `activo` TINYINT NOT NULL,
  `defecto` TINYINT NOT NULL,
  `activo_admin` TINYINT NOT NULL,
  `defecto_admin` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `slider_item_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `slider_item_idioma` (
  `id_slider_item` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `texto` TEXT NOT NULL,
  `enlace` VARCHAR(100) NOT NULL,
  `id_target` TINYINT NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `img_alt` VARCHAR(100) NOT NULL,
  INDEX `fk_obra_imagen_slider_idx` (`id_slider_item` ASC),
  PRIMARY KEY (`id_slider_item`, `id_idioma`),
  INDEX `fk_obra_imagen_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_obra_imagen_slider`
    FOREIGN KEY (`id_slider_item`)
    REFERENCES `slider_item` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_obra_imagen_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pagina` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_parent` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `orden` SMALLINT NOT NULL,
  `activo` TINYINT NOT NULL,
  `php_file` VARCHAR(100) NOT NULL,
  `id_formato` TINYINT NOT NULL,
  `mostrar_menu` TINYINT NOT NULL,
  `referencia` VARCHAR(100) NOT NULL,
  `meta_robots` VARCHAR(100) NOT NULL,
  `privada` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pagina_idioma` (
  `id_pagina` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(200) NOT NULL,
  `abstract` VARCHAR(200) NOT NULL,
  `friendly_url` VARCHAR(100) NOT NULL,
  `seo_title` VARCHAR(200) NOT NULL,
  `seo_description` VARCHAR(200) NOT NULL,
  `seo_keywords` VARCHAR(400) NOT NULL,
  `php_file` VARCHAR(100) NOT NULL,
  INDEX `fk_seccion_idioma_seccion1_idx` (`id_pagina` ASC),
  PRIMARY KEY (`id_pagina`, `id_idioma`),
  INDEX `fk_seccion_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_seccion_idioma_seccion1`
    FOREIGN KEY (`id_pagina`)
    REFERENCES `pagina` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_seccion_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `seccion` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `icono` VARCHAR(50) NOT NULL,
  `orden` SMALLINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_seccion` INT UNSIGNED NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_parent` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `numero` INT NOT NULL,
  `referencia` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `fichero` VARCHAR(100) NOT NULL,
  `orden` SMALLINT NOT NULL,
  `destacado` TINYINT NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_catalogo_seccion1_idx` (`id_seccion` ASC),
  CONSTRAINT `fk_catalogo_seccion1`
    FOREIGN KEY (`id_seccion`)
    REFERENCES `seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogo_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogo_idioma` (
  `id_catalogo` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(200) NOT NULL,
  `subtitulo` VARCHAR(400) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `friendly_url` VARCHAR(150) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `img_alt` VARCHAR(100) NOT NULL,
  `fichero` VARCHAR(100) NOT NULL,
  INDEX `fk_noticia_idioma_noticia1_idx` (`id_catalogo` ASC),
  PRIMARY KEY (`id_catalogo`, `id_idioma`),
  INDEX `fk_noticia_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_noticia_idioma_noticia1`
    FOREIGN KEY (`id_catalogo`)
    REFERENCES `catalogo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_noticia_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contacto_web`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contacto_web` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `ip` VARCHAR(50) NOT NULL,
  `comentarios` TEXT NOT NULL,
  `gestionado` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `perfil_web`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `perfil_web` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `class_name` VARCHAR(50) NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pais_web`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pais_web` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `codigo` VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(50) NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pais_web_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pais_web_idioma` (
  `id_pais_web` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  INDEX `fk_pais_web_idioma_pais_web1_idx` (`id_pais_web` ASC),
  PRIMARY KEY (`id_pais_web`, `id_idioma`),
  INDEX `fk_pais_web_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_pais_web_idioma_pais_web1`
    FOREIGN KEY (`id_pais_web`)
    REFERENCES `pais_web` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pais_web_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pagina_perfil` (
  `id_pagina` INT UNSIGNED NOT NULL,
  `id_perfil_web` INT UNSIGNED NOT NULL,
  INDEX `fk_pagina_perfil_pagina1_idx` (`id_pagina` ASC),
  PRIMARY KEY (`id_pagina`, `id_perfil_web`),
  INDEX `fk_pagina_perfil_perfil_web1_idx` (`id_perfil_web` ASC),
  CONSTRAINT `fk_pagina_perfil_pagina1`
    FOREIGN KEY (`id_pagina`)
    REFERENCES `pagina` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pagina_perfil_perfil_web1`
    FOREIGN KEY (`id_perfil_web`)
    REFERENCES `perfil_web` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contenido` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pagina` INT UNSIGNED NOT NULL,
  `id_tipo` TINYINT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `fichero` VARCHAR(100) NOT NULL,
  `id_slider` INT NOT NULL,
  `destacado` TINYINT NOT NULL,
  `orden` SMALLINT NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contenido_pagina1_idx` (`id_pagina` ASC),
  CONSTRAINT `fk_contenido_pagina1`
    FOREIGN KEY (`id_pagina`)
    REFERENCES `pagina` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contenido_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contenido_idioma` (
  `id_contenido` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(300) NOT NULL,
  `subtitulo` VARCHAR(200) NOT NULL,
  `texto` TEXT NOT NULL,
  `texto_html` TEXT NOT NULL,
  `enlace` VARCHAR(100) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `id_target` TINYINT NOT NULL,
  `follow` VARCHAR(50) NOT NULL,
  `video` TEXT NOT NULL,
  `fichero` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `img_alt` VARCHAR(100) NOT NULL,
  INDEX `fk_contenido_idioma_contenido1_idx` (`id_contenido` ASC),
  PRIMARY KEY (`id_contenido`, `id_idioma`),
  INDEX `fk_contenido_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_contenido_idioma_contenido1`
    FOREIGN KEY (`id_contenido`)
    REFERENCES `contenido` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contenido_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tipo` TINYINT UNSIGNED NOT NULL,
  `id_parent` INT NOT NULL,
  `orden` SMALLINT NOT NULL,
  `activo` TINYINT NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `categoria_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria_idioma` (
  `id_categoria` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `friendly_url` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id_categoria`, `id_idioma`),
  INDEX `fk_categoria_idioma_categoria1_idx` (`id_categoria` ASC),
  INDEX `fk_categoria_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_categoria_idioma_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `categoria` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_categoria_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogo_foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogo_foto` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_catalogo` INT UNSIGNED NOT NULL,
  `id_categoria` INT NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `principal` TINYINT NOT NULL,
  `tamano` INT NOT NULL,
  `extension` VARCHAR(5) NOT NULL,
  `orden` SMALLINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_noticia_foto_noticia1_idx` (`id_catalogo` ASC),
  CONSTRAINT `fk_noticia_foto_noticia1`
    FOREIGN KEY (`id_catalogo`)
    REFERENCES `catalogo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogo_foto_idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogo_foto_idioma` (
  `id_catalogo_foto` INT UNSIGNED NOT NULL,
  `id_idioma` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `texto` TEXT NOT NULL,
  `enlace` VARCHAR(100) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `id_target` TINYINT NOT NULL,
  `follow` VARCHAR(50) NOT NULL,
  `img_alt` VARCHAR(100) NOT NULL,
  `fichero` VARCHAR(100) NOT NULL,
  INDEX `fk_noticia_foto_idioma_noticia_foto1_idx` (`id_catalogo_foto` ASC),
  PRIMARY KEY (`id_catalogo_foto`, `id_idioma`),
  INDEX `fk_noticia_foto_idioma_idioma1_idx` (`id_idioma` ASC),
  CONSTRAINT `fk_noticia_foto_idioma_noticia_foto1`
    FOREIGN KEY (`id_catalogo_foto`)
    REFERENCES `catalogo_foto` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_noticia_foto_idioma_idioma1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `idioma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tipo` TINYINT UNSIGNED NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  `codigo` VARCHAR(50) NOT NULL,
  `id_documento` TINYINT NOT NULL,
  `nif` VARCHAR(50) NOT NULL,
  `empresa` VARCHAR(100) NOT NULL,
  `cif` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `numero` VARCHAR(50) NOT NULL,
  `piso` VARCHAR(20) NOT NULL,
  `puerta` VARCHAR(20) NOT NULL,
  `cod_postal` VARCHAR(10) NOT NULL,
  `id_poblacion` INT NOT NULL,
  `poblacion` VARCHAR(100) NOT NULL,
  `id_provincia` INT NOT NULL,
  `provincia` VARCHAR(100) NOT NULL,
  `id_pais` INT NOT NULL,
  `pais` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `movil` VARCHAR(20) NOT NULL,
  `fax` VARCHAR(20) NOT NULL,
  `web` VARCHAR(100) NOT NULL,
  `id_tratamiento` TINYINT NOT NULL,
  `fecha_nac` DATE NOT NULL,
  `newsletter` TINYINT NOT NULL,
  `foto` VARCHAR(100) NOT NULL,
  `fecha_alta` DATETIME NOT NULL,
  `activo` TINYINT NOT NULL,
  `ptje_descuento` DECIMAL(5,2) NOT NULL,
  `razon_social` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;




INSERT INTO `admin` (`id`, `id_perfil`, `nombre`, `usuario`, `password`, `email`, `imagen`, `activo`) 
VALUES (1, 0, 'Administrador', 'superadmin', 'WDQzWWZlMTZkaUZxTk9RQ2xWV3Nydz09OjpSpZzxQyMuRo9H/OuHePpo', '', '', 1);

INSERT INTO `idioma` (`id`, `codigo`, `nombre`, `activo`, `defecto`, `activo_admin`, `defecto_admin`) VALUES 
(1, 'es', 'Espa&ntilde;ol', 1, 1, 1, 1),
(2, 'cat', 'Catal&agrave;', 1, 0, 0, 0),
(3, 'en', 'English', 1, 0, 0, 0);

INSERT INTO `pagina` (`id`, `id_parent`, `nombre`, `orden`, `activo`, `php_file`, `mostrar_menu`, `referencia`) VALUES 
(1, 0, 'Home', 1, 1, 'home.php',1,'home'),
(2, 0, 'Error404', 1, 1, 'error404.php',0,'error404'),
(3, 0, 'Aviso Legal', 1, 1, 'legal.php',0,'aviso-legal');

INSERT INTO `pagina_idioma` (`id_pagina`, `id_idioma`, `titulo`, `abstract`, `friendly_url`, `seo_title`, `seo_description`, `seo_keywords`, `php_file`) VALUES
(1, 1, 'Home', '', '', '', '', '', ''),
(2, 1, 'Error404', '', 'error404', '', '', '', ''),
(3, 1, 'Aviso Legal', '', 'aviso-legal', '', '', '', '');
