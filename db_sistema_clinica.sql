create
    database db_sistema_clinica_04;
use
    db_sistema_clinica_04;

CREATE TABLE entidad
(
    id_entidad     INT         NOT NULL AUTO_INCREMENT,
    nombre_entidad VARCHAR(20) NULL,
    cupos          SMALLINT(3) NULL,
    constraint pk_id_entidad PRIMARY KEY (id_entidad)
) engine = InnoDB;

CREATE TABLE usuario
(
    id_usuario    INT          NOT NULL AUTO_INCREMENT,
    entidad_id    INT          NOT NULL,
    nombre_us     VARCHAR(45)  NULL,
    apellidos_us  VARCHAR(50)  NULL,
    email_us      VARCHAR(100) NULL,
    password      VARCHAR(255) NULL,
    rol           VARCHAR(15)  NULL,
    estado_us     smallint     NULL,
    fecha_alta_us varchar(255)     NULL,
    fecha_baja_us varchar(255)     NULL,
    constraint pk_id_usuario PRIMARY KEY (id_usuario),
    CONSTRAINT fk_usuario_entidad FOREIGN KEY (entidad_id)
        REFERENCES entidad (id_entidad)
) ENGINE = InnoDB;

CREATE TABLE venta
(
    `id_venta`          INT      NOT NULL AUTO_INCREMENT,
    `usuario_id`        int(255) NOT NULL,
    `fecha_llamada`     varchar(255)     NOT NULL,
    `hora_llamada`      time     NOT NULL,
    `lada_tel`          varchar(20)  DEFAULT NULL,
    `razon_llamada`     varchar(50)  DEFAULT NULL,
    `nombre_cont`       varchar(50)  DEFAULT NULL,
    `correo_cont`       varchar(70)  DEFAULT NULL,
    `parentesco_cont`   varchar(20)  DEFAULT NULL,
    `tipo_consumo`      varchar(30)  DEFAULT NULL,
    `edad_cont`         smallint(2)  DEFAULT NULL,
    `aceptacion`        varchar(9)   DEFAULT NULL,
    `detalles_ad`       varchar(100) DEFAULT NULL,
    `fecha_seguimiento` varchar(255)         DEFAULT NULL,
    `medio_de_envio`    varchar(13)  DEFAULT NULL,
    `medio_entero`      varchar(20)  DEFAULT NULL,
    `estado_ve`         smallint(2)  DEFAULT NULL,
    constraint pk_venta primary key (id_venta),
    constraint fk_venta_usuario foreign key (usuario_id) references usuario (id_usuario)
) engine = InnoDB;

CREATE TABLE nota_venta
(
    id_nota_venta  INT     NOT NULL AUTO_INCREMENT,
    `venta_id`     int(255) DEFAULT NULL,
    `usuario_id`   int(11) NOT NULL,
    `nota_desc`    text     DEFAULT NULL,
    `fecha_alta_n` varchar(255)     DEFAULT NULL,
    `hora_alta_n`  time     DEFAULT NULL,
    constraint pk_nota_venta primary key (id_nota_venta),
    constraint fk_nota_venta_venta foreign key (venta_id) references venta (id_venta)
) engine = InnoDB;

CREATE TABLE paciente
(
    id_paciente         INT NOT NULL AUTO_INCREMENT,
    nombre_ip           VARCHAR(30),
    apellido_paterno_ip VARCHAR(50),
    apellido_materno_ip VARCHAR(50),
    fecha_nacimineto_ip varchar(255),
    lugar_nacimiento_ip VARCHAR(50),
    CONSTRAINT pk_paciente PRIMARY KEY (id_paciente)
) ENGINE = InnoDB;

CREATE TABLE ingreso_paciente
(
    id_ingreso_paciente     INT     NOT NULL AUTO_INCREMENT,
    `entidad_id`            int(11)       DEFAULT NULL,
    `paciente_id`           int(11)       DEFAULT NULL,
    `usuario_id`            int(11) NOT NULL,
    `venta_id`              int(11)       DEFAULT NULL,
    `edad_pa`               smallint(3)   DEFAULT NULL,
    `estado_civil_ip`       varchar(15)   DEFAULT NULL,
    `hijos_ip`              smallint(2)   DEFAULT NULL,
    `edades_hijos_ip`       varchar(50)   DEFAULT NULL,
    `ocupacion_ip`          varchar(50)   DEFAULT NULL,
    `escolaridad_ip`        varchar(20)   DEFAULT NULL,
    `vive_con_ip`           varchar(20)   DEFAULT NULL,
    `calle_vive_ip`         varchar(30)   DEFAULT NULL,
    `ext_vive_ip`           varchar(5)    DEFAULT NULL,
    `interior_ip`           varchar(5)    DEFAULT NULL,
    `colonia_ip`            varchar(30)   DEFAULT NULL,
    `ciudad_vive_ip`        varchar(30)   DEFAULT NULL,
    `codigo_postal_ip`      varchar(10)   DEFAULT NULL,
    `estado_vive_ip`        varchar(10)   DEFAULT NULL,
    `pais_vive_ip`          varchar(20)   DEFAULT NULL,
    `modo_se_entero`        varchar(20)   DEFAULT NULL,
    `recomendado_por`       varchar(25)   DEFAULT NULL,
    `resp_legal`            varchar(255)   DEFAULT NULL,
    `estado_actitud`        varchar(50)   DEFAULT NULL,
    `observaciones_ingreso` varchar(100)  DEFAULT NULL,
    `adicion_tratamiento`   varchar(25)   DEFAULT NULL,
    `ingreso_ip`            varchar(255)          DEFAULT NULL,
    `precio_tratamiento_ip` decimal(10, 2) DEFAULT NULL,
    `precio_letra`          varchar(255)   DEFAULT NULL,
    `moneda_ip`             varchar(20)    DEFAULT NULL,
    `duracion_ip`           varchar(50)   DEFAULT NULL,
    `deposito_ip`           decimal(10, 2) DEFAULT NULL,
    `deposito_letra`        varchar(255)   DEFAULT NULL,
    `forma_pago_ip`         varchar(255)   DEFAULT NULL,
    `fecha_alta_ing`        varchar(255)          DEFAULT NULL,
    `hora_alta_ig`          time          DEFAULT NULL,
    `fecha_estadia`         time          DEFAULT NULL,

    CONSTRAINT pk_ingreso_paciente primary key (id_ingreso_paciente),
    CONSTRAINT fk_ingreso_paciente_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente),
    CONSTRAINT fk_ingreso_paciente_entidad FOREIGN KEY (entidad_id) REFERENCES entidad (id_entidad),
    CONSTRAINT fk_infreso_paciente_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_ingreso_paciente_venta FOREIGN KEY (venta_id) REFERENCES venta (id_venta)
) ENGINE = InnoDB;

create table contactos_paciente
(
    id_contactos_paciente INT          NOT NULL AUTO_INCREMENT,
    paciente_id           INT          NOT NULL,
    ingreso_paciente_id   INT          NOT NULL,
    telefono_cp           VARCHAR(15)  NULL,
    correo_cp             VARCHAR(100) NULL,
    parentesco_cp         VARCHAR(20),
    CONSTRAINT pk_id_contactos_paciente PRIMARY KEY (id_contactos_paciente),
    CONSTRAINT fk_contactos_paciente_paciente FOREIGN KEY (paciente_id) references paciente (id_paciente),
    CONSTRAINT fk_contactos_paciente_ingreso_paciente FOREIGN KEY (ingreso_paciente_id) references ingreso_paciente (id_ingreso_paciente)
) ENGINE = InnoDB;

CREATE TABLE asignacion_usuario_paciente
(
    id_asignacion    INT      NOT NULL AUTO_INCREMENT,
    usuario_id       INT      NULL,
    paciente_id      INT      NULL,
    fecha_asignacion varchar(255) NULL,
    CONSTRAINT pk_id_asignacion PRIMARY KEY (id_asignacion),
    CONSTRAINT fk_asignacion_usuario_paciente_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario),
    CONSTRAINT fk_asignacion_usuario_paciente_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente)
) ENGINE = InnoDB;

CREATE TABLE vive_con
(
    id_vive_con     INT         NOT NULL AUTO_INCREMENT,
    paciente_id     INT         NOT NULL,
    nombre_vive     VARCHAR(50) NULL,
    tel_vive        VARCHAR(20) NULL,
    parentesco_vive VARCHAR(15) NULL,
    CONSTRAINT pk_id_vive_con PRIMARY KEY (id_vive_con),
    CONSTRAINT fk_vive_con_paciente FOREIGN KEY (paciente_id) REFERENCES paciente (id_paciente)
) ENGINE = InnoDB;

CREATE TABLE sustancia
(
    `id_sustancia` INT         NOT NULL AUTO_INCREMENT,
    `nombre_sust`  VARCHAR(20) NULL,
    CONSTRAINT pk_sustancia PRIMARY KEY (`id_sustancia`)
) ENGINE = InnoDB;

CREATE TABLE consumo_sustancia
(
    `id_consumo_sustancia` INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`          INT         NOT NULL,
    `sustancia_id`         INT         NOT NULL,
    `consumo_sust`         VARCHAR(2)  NULL,
    `forma_cons`           VARCHAR(15) NULL,
    `frecuencia_cons`      VARCHAR(15) NULL,
    `cant_consumo_sust`    VARCHAR(15) NULL,
    `edad_inicio_cons`     SMALLINT(3) NULL,
    CONSTRAINT pk_id_consumo_sustancia PRIMARY KEY (`id_consumo_sustancia`),
    CONSTRAINT fk_consumo_sustancia_paciente FOREIGN KEY (`paciente_id`) REFERENCES paciente (`id_paciente`)
) ENGINE = InnoDB;

CREATE TABLE consumo_ultimo_year
(
    `id_consumo_ultimo_year` INT           NOT NULL AUTO_INCREMENT,
    `paciente_id`            INT           NOT NULL,
    `principal_sust`         VARCHAR(45)   NULL,
    `alcohol_cons`           VARCHAR(2)    NULL,
    `tipo_alcohol`           VARCHAR(15)   NULL,
    `tiempo_cons_ex`         VARCHAR(15)   NULL,
    `nomarmal_cons`          VARCHAR(15)   NULL,
    `lugar_cons`             VARCHAR(15)   NULL,
    `lugar_frecuencia`       VARCHAR(15)   NULL,
    `consumo_voluntario`     VARCHAR(2)    NULL,
    `sueldo_alcohol`         DECIMAL(6, 2) NULL,
    `sueldo_tabaco`          DECIMAL(6, 2) NULL,
    `sueldo_drogas`          DECIMAL(6, 2) NULL,
    CONSTRAINT pk_id_consumo_ultimo_year PRIMARY KEY (`id_consumo_ultimo_year`),
    CONSTRAINT fk_consumo_ultimo_year_paciente FOREIGN KEY (`paciente_id`) REFERENCES paciente (`id_paciente`)
) ENGINE = InnoDB;

CREATE TABLE situaciones_vida_diaria
(
    `id_situaciones`   INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`      INT         NOT NULL,
    `emociones_des`    SMALLINT(2) NULL,
    `por_enf`          SMALLINT(2) NULL,
    `emociones_ag`     SMALLINT(2) NULL,
    `necesitad_fisica` SMALLINT(2) NULL,
    `probando_auto`    SMALLINT(2) NULL,
    `conflictos_otros` SMALLINT(2) NULL,
    `mom_agradables`   SMALLINT(2) NULL,
    `sesion_social`    SMALLINT(2) NULL,
    CONSTRAINT pk_id_situaciones PRIMARY KEY (`id_situaciones`),
    CONSTRAINT fk_situaciones_vida_diaria_paciente FOREIGN KEY (`paciente_id`)
        REFERENCES paciente (`id_paciente`)
) ENGINE = InnoDB;

CREATE TABLE escala_consumo_mes
(
    `id_escala_consumo_mes` INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`           INT         NULL,
    `sin_problema`          VARCHAR(10) NULL,
    `peq_problema`          VARCHAR(10) NULL,
    `un_problema`           VARCHAR(10) NULL,
    `gran_problema`         VARCHAR(10) NULL,
    CONSTRAINT pk_id_escala_consumo_mes PRIMARY KEY (`id_escala_consumo_mes`),
    CONSTRAINT fk_escala_consumo_mes_paciente FOREIGN KEY (`paciente_id`)
        REFERENCES paciente (id_paciente)
) ENGINE = InnoDB;

CREATE TABLE disposicion_cambio
(
    `id_disposicion_cambio`  INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`            INT         NOT NULL,
    `tiempo_mayor_prop`      VARCHAR(15) NULL,
    `fecha_tiempo_ocurrido`  VARCHAR(15) NULL,
    `tiempo_obstuvo_ocacion` VARCHAR(15) NULL,
    `meses_mayor_sin`        VARCHAR(15) NULL,
    `fecha_meses_ocurrio`    VARCHAR(15) NULL,
    `meses_obstuvo_ocacion`  VARCHAR(15) NULL,
    `ultimos_seis_meses`     VARCHAR(15) NULL,
    `actualmente_dejar_cons` VARCHAR(15) NULL,
    `en_estos_momentos`      VARCHAR(15) NULL,
    `dispuesto_inter`        VARCHAR(15) NULL,
    `razon_uno`              VARCHAR(45) NULL,
    `razon_dos`              VARCHAR(45) NULL,
    `razon_tres`             VARCHAR(45) NULL,
    CONSTRAINT pk_id_disposicion_cambio PRIMARY KEY (`id_disposicion_cambio`),
    CONSTRAINT fk_disposicion_cambio_paciente FOREIGN KEY (`paciente_id`)
        REFERENCES paciente (`id_paciente`)
) ENGINE = InnoDB;

CREATE TABLE situacion_social_familiar
(
    `id_situacion_social_familiar` INT          NOT NULL AUTO_INCREMENT,
    `paciente_id`                  INT          NULL,
    `integran_familia`             VARCHAR(100) NULL,
    `fam_cosas_juntos`             VARCHAR(30)  NULL,
    `fam_sentimientos`             VARCHAR(30)  NULL,
    `fam_apoyo`                    VARCHAR(30)  NULL,
    `fam_opiniones`                VARCHAR(30)  NULL,
    `fam_ambiente`                 VARCHAR(30)  NULL,
    `fam_actividades`              VARCHAR(30)  NULL,
    `fam_escucha`                  VARCHAR(30)  NULL,
    `fam_problema`                 VARCHAR(30)  NULL,
    `fam_expresamos`               VARCHAR(30)  NULL,
    `fam_conflictos`               VARCHAR(30)  NULL,
    `fam_conflicto_grave`          TEXT         NULL,
    CONSTRAINT pk_id_situacion_social_familiar PRIMARY KEY (`id_situacion_social_familiar`),
    CONSTRAINT fk_situacion_social_familiar_paciente FOREIGN KEY (`paciente_id`)
        REFERENCES paciente (`id_paciente`)
) ENGINE = InnoDB;

INSERT INTO entidad
VALUES (NULL, 'CAP1', 50);
INSERT INTO entidad
VALUES (NULL, 'CAP2', 50);
INSERT INTO entidad
VALUES (NULL, 'CAS', 50);

INSERT INTO sustancia
VALUES (NULL, 'Alcohol');
INSERT INTO sustancia
VALUES (NULL, 'Marihuana');
INSERT INTO sustancia
VALUES (NULL, 'Cocaína');
INSERT INTO sustancia
VALUES (NULL, 'Heroína');
INSERT INTO sustancia
VALUES (NULL, 'Metanfetaminas');
INSERT INTO sustancia
VALUES (NULL, 'Inhalables');
