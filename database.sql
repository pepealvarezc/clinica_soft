create database soft_clniica_01;

use soft_clniica_01;

create table usuario
(
    id_usuario    int(255) auto_increment not null,
    nombre_us     varchar(35),
    apellidos_us  varchar(40),
    email_us      varchar(40),
    password      varchar(255),
    rol           varchar(15),
    fecha_alta_us date,
    fecha_baja_us date,
    constraint pk_usuario primary key (id_usuario)
) engine = InnoDB;

create table paciente_ident
(
    id_paciente     int(255) auto_increment not null,
    usuario_id      int(255),
    nombre_pac      varchar(255),
    edad_pac        smallint,
    edo_civil       varchar(15),
    hijos           varchar(15),
    edades_hijos    varchar(30),
    fecha_nac_pac   date,
    domicilio_pac   varchar(50),
    escolaridad_pac varchar(30),
    ocupacion_pac   varchar(30),
    uso_drogas_pac  varchar(100),
    acompanado_por  varchar(50),
    edo_act_ingreso varchar(50),
    medio_entero    varchar(20),
    constraint pk_paciente_ident primary key (id_paciente),
    constraint fk_paciente_ident_usuario foreign key (usuario_id) references usuario (id_usuario)
) engine = InnoDB;

create table asignacion_usuario_paciente
(
    id_asignacion    int(255) auto_increment not null,
    usuario_id       int(255),
    paciente_id      int(255),
    fecha_asignacion datetime,
    constraint pk_asignacion_usuario_paciente primary key (id_asignacion),
    constraint fk_asignacion_usuario_paciente_usuario foreign key (usuario_id) references usuario (id_usuario),
    constraint fk_asignacion_usuario_paciente_paciente foreign key (paciente_id) references
) engine = InnoDB;

create table parentesco
(
    id_parentesco int(255) auto_increment not null,
    paciente_id   int(255),
    nombre_par    varchar(50),
    telefono_par  varchar(50),
    parentesco    varchar(25),
    constraint pk_parentesco primary key (id_parentesco),
    constraint fk_parentesco_paciente_ident foreign key (paciente_id) references paciente_ident (id_paciente)
) engine = InnoDB;

create table ficha_ingreso
(
    id_ficha_ingreso    int(255) auto_increment not null,
    paciente_id         int(255),
    usuario_id          int(255),
    sustancias          varchar(100),
    ultima_vez_uso      varchar(50),
    tiempo_continuo_uso varchar(50),
    alergias            varchar(100),
    ant_infarto         varchar(5),
    hepaticos           varchar(5),
    mayor_de            varchar(5),
    taquicardias        varchar(5),
    obesidad            varchar(5),
    alergicas           varchar(5),
    convulciones        varchar(5),
    psiquiatricos       varchar(5),
    hipertensos         varchar(5),
    diabeticos          varchar(5),
    sangrados           varchar(5),
    med_uso             varchar(5),
    t_a                 varchar(25),
    fc                  varchar(25),
    r_i                 varchar(25),
    temp                varchar(25),
    peso                varchar(25),
    pruebas_de_lab      varchar(25),
    med_recomienda      varchar(25),
    fecha_ex            date,
    laboratorio         varchar(25),
    indicaciones        text,
    constraint pk_ficha_ingreso primary key (id_ficha_ingreso),
    constraint fk_ficha_ingreso foreign key (paciente_id) references paciente_ident (id_paciente),
    constraint fk_ficha_ingreso_usuario foreign key (usuario_id) references usuario (id_usuario)
) engine = InnoDB;

create table familiar
(
    id_familiar    int(255) auto_increment not null,
    paciente_id    int(255),
    fecha_ingreso  date,
    datos_familiar varchar(255),
    parentesco     varchar(50),
    fecha_egreso   date,
    constraint pk_familiar primary key (id_familiar),
    constraint fk_familiar_paciente foreign key (paciente_id) references paciente_ident (id_paciente)
) engine = InnoDB;

create table referencia
(
    id_referencia        int(255) auto_increment not null,
    paciente_id          int(255),
    usuario_id           int(255),
    expediente           int(255),
    unidad_salud         varchar(50),
    telefono_ref         varchar(20),
    fecha_ref            date,
    hora_ref             time,
    fecha_resp           date,
    nombre_medico        varchar(50),
    condiciones_traslado varchar(20),
    edad_ref             smallint,
    no_ident             smallint,
    cual_ref             varchar(25),
    sexo                 varchar(10),
    fecha_nac_ref        date,
    seguro_poular        varchar(5),
    no_intervencion      varchar(25),
    calle_ref            varchar(30),
    colonia_traslado     varchar(30),
    ciudad               varchar(30),
    cp_ref               varchar(15),
    tel_ref              varchar(25),
    especialidad_ref     varchar(25),
    fecha_cita           date,
    prioritario_ref      varchar(2),
    t_a                  varchar(5),
    temp                 varchar(5),
    f_r                  varchar(5),
    f_c                  varchar(5),
    tipo_sangre          varchar(5),
    alergias             varchar(5),
    peso                 varchar(10),
    talla                varchar(10),
    descripcion_ref      text,
    tratamiento_ref      varchar(100),
    diagnostico_ref      text,
    proc_terapeutico     varchar(50),
    ref_tx               varchar(100),
    nompre_prof          varchar(50),
    constraint pk_referencia primary key (id_referencia),
    constraint fk_familiar_paciente_ident foreign key (paciente_id) references paciente_ident (id_paciente),
    constraint fk_referencia_usuario foreign key (usuario_id) references usuario (id_usuario)
) engine = InnoDB;

create table ref_ambulatorio
(
    id_ref_ambularorio int(255) auto_increment not null,
    paciente_id        int(255),
    motivo_envio       varchar(100),
    nombre_est_dev     varchar(50),
    domicilio_est_dev  varchar(50),
    nombre_est_ref     varchar(50),
    domicilio_est_ref  varchar(50),
    nombre_refiere     varchar(40),
    cargo_refiere      varchar(30),
    constraint pk_ref_ambulatorio primary key (id_ref_ambularorio),
    constraint fk_ref_ambulatorio_paciente_ident foreign key (paciente_id) references paciente_ident (id_paciente)
) engine = InnoDB;

/*  soft_clniica_02 */
create database soft_clinica_02;
use soft_clinica_02;

create table usuario
(
    id_usuario    int(255) auto_increment not null,
    nombre_us     varchar(35),
    apellidos_us  varchar(40),
    email_us      varchar(40),
    password      varchar(255),
    rol           varchar(15),
    fecha_alta_us date,
    fecha_baja_us date,
    status_us     varchar(10),
    constraint pk_usuario primary key (id_usuario)
) engine = InnoDB;

create table paciente_datos_generales
(
    id_paciente           int(255) auto_increment not null,
    usuario_id            int(255),
    no_expediente         int(255),
    nombre_pac            varchar(30),
    edad_pac              smallint,
    sexo_pac              varchar(12),
    edo_civil_pac         varchar(12),
    direccion_pac         varchar(100),
    telefono_pac          varchar(20),
    ocupacion_pac         varchar(30),
    escolaridad_pac       varchar(30),
    salario_mensaje       float(6, 2),
    tiempo_actual_trabajo varchar(20),
    desempleo_pac         varchar(2),
    tiempo_desempleo      varchar(20),
    depende_eco           varchar(2),
    depende_de            varchar(25),
    alguien_depende       varchar(2),
    quien_depende         varchar(25),
    tiene_pareja          varchar(2),
    tiempo_relacion       varchar(20),
    nom_responsable       varchar(30),
    direccion_responsable varchar(50),
    tel_responsable       varchar(20),
    constraint pk_paciente_datos_generales primary key (id_paciente),
    constraint fk_paciente_datos_generales_usuario foreign key (usuario_id) references usuario (id_usuario)
) engine = InnoDB;

create table asignacion_usuario_paciente
(
    id_asignacion    int(255) auto_increment not null,
    usuario_id       int(255),
    paciente_id      int(255),
    fecha_asignacion datetime,
    constraint pk_asignacion_usuario_paciente primary key (id_asignacion),
    constraint fk_asignacion_usuario_paciente_usuario foreign key (usuario_id) references usuario (id_usuario),
    constraint fk_asignacion_usuario_paciente_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table vive_con
(
    id_vive_con     int(255) auto_increment not null,
    paciente_id     int(255),
    nombre_vive     varchar(50),
    tel_vive        varchar(20),
    parentesco_vive varchar(15),
    constraint pk_vive_con primary key (id_vive_con),
    constraint fk_vive_con_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table consumo_sustancias
(
    id_consumo_sustancias int(255) auto_increment not null,
    paciente_id           int(255),
    tipo_sust             varchar(40),
    consumo_sust          varchar(2),
    forma_cons            varchar(15),
    frecuencia_cons       varchar(15),
    cant_consumo_sust     varchar(15),
    edad_inicio_cons      smallint,
    constraint pk_consumo_sustancias primary key (id_consumo_sustancias),
    constraint fk_consumo_sustancias_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table consumo_ultimo_year
(
    id_consumo_ultomo_year int(255) auto_increment not null,
    paciente_id            int(255),
    principal_sust         varchar(30),
    alcohol_cons           varchar(2),
    tipo_alcohol           varchar(15),
    tiempo_cons_ex         varchar(15),
    nomarmal_cons          varchar(15),
    lugar_cons             varchar(15),
    lugar_frecuencia       varchar(15),
    consumo_voluntario     varchar(2),
    sualdo_alcohol         float(6, 2),
    sueldo_tabaco          float(6, 2),
    sueldo_drogas          float(6, 2),
    constraint pk_consumo_ultimo_year primary key (id_consumo_ultomo_year),
    constraint fk_consumo_ultimo_year_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table situaciones_vida_diaria
(
    id_situaciones   int(255) auto_increment not null,
    paciente_id      int(255),
    emociones_des    smallint,
    por_enf          smallint,
    emociones_ag     smallint,
    necesitad_fisica smallint,
    probando_auto    smallint,
    conflictos_otros smallint,
    mom_agradables   smallint,
    sesion_social    smallint,
    constraint pk_situaciones_vida_diaria primary key (id_situaciones),
    constraint fk_situaciones_vida_diaria_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table escala_consumo_mes
(
    id_escala     int(255) auto_increment not null,
    paciente_id   int(255),
    sin_problema  varchar(10),
    peq_problema  varchar(10),
    un_problema   varchar(10),
    gran_problema varchar(10),
    constraint pk_escala_consumo_mes primary key (id_escala),
    constraint fk_escala_consumo_mes_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;

create table disposicion_cambio
(
    id_disposicion         int(255) auto_increment not null,
    paciente_id            int(255),
    tiempo_mayor_prop      varchar(15),
    fecha_tiempo_ocurrido  varchar(15),
    tiempo_obstuvo_ocacion varchar(15),
    meses_mayor_sin        varchar(15),
    fecha_meses_ocurrio    varchar(15),
    meses_obstuvo_ocacion  varchar(15),
    ultimos_seis_meses     varchar(15),
    actualmente_dejar_cons varchar(15),
    en_estos_momentos      varchar(15),
    dispuesto_inter        varchar(15),
    razon_uno              varchar(50),
    razon_dos              varchar(50),
    razon_tres             varchar(50),
    constraint pk_disposicion_cambio primary key (id_disposicion),
    constraint fk_disposicion_cambio_paciente_datos_generales foreign key (paciente_id) references paciente_datos_generales (id_paciente)
) engine = InnoDB;



/*===========================================================*/
/*===========================================================*/
/*===========================================================*/
-- MySQL Script generated by MySQL Workbench
-- Mon May 24 11:16:21 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE =
        'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_sistema_clinica
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_sistema_clinica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_sistema_clinica` DEFAULT CHARACTER SET utf8;
USE `db_sistema_clinica`;

-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`entidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`entidad`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`entidad`
(
    `id_entidad`     INT         NOT NULL AUTO_INCREMENT,
    `nombre_entidad` VARCHAR(20) NULL,
    PRIMARY KEY (`id_entidad`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`usuario`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`usuario`
(
    `id_usuario`    INT          NOT NULL AUTO_INCREMENT,
    `entidad_id`    INT          NOT NULL,
    `nombre_us`     VARCHAR(45)  NULL,
    `apellidos_us`  VARCHAR(50)  NULL,
    `email_us`      VARCHAR(100) NULL,
    `password`      VARCHAR(255) NULL,
    `rol`           VARCHAR(15)  NULL,
    `fecha_alta_us` DATETIME     NULL,
    `fecha_baja_us` DATETIME     NULL,
    PRIMARY KEY (`id_usuario`),
    INDEX `entidad_id_idx` (`entidad_id` ASC) VISIBLE,
    CONSTRAINT `fk_usuario_entidad`
        FOREIGN KEY (`entidad_id`)
            REFERENCES `db_sistema_clinica`.`entidad` (`id_entidad`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`paciente_datos_generales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`paciente_datos_generales`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`paciente_datos_generales`
(
    `id_paciente`           INT          NOT NULL AUTO_INCREMENT,
    `usuario_id`            INT          NOT NULL,
    `entidad_id`            INT          NOT NULL,
    `nombre_pac`            VARCHAR(45)  NULL,
    `edad_pac`              SMALLINT(3)  NULL,
    `sexo_pac`              VARCHAR(12)  NULL,
    `edo_civil_pac`         VARCHAR(12)  NULL,
    `direccion_pac`         VARCHAR(100) NULL,
    `telefono_pac`          VARCHAR(20)  NULL,
    `ocupacion_pac`         VARCHAR(30)  NULL,
    `escolaridad_pac`       VARCHAR(30)  NULL,
    `salario_mensaje`       VARCHAR(30)  NULL,
    `tiempo_actual_trabajo` VARCHAR(20)  NULL,
    `desempleo_pac`         VARCHAR(2)   NULL,
    `tiempo_desempleo`      VARCHAR(20)  NULL,
    `depende_eco`           VARCHAR(2)   NULL,
    `depende_de`            VARCHAR(25)  NULL,
    `alguien_depende`       VARCHAR(2)   NULL,
    `quien_depende`         VARCHAR(25)  NULL,
    `tiene_pareja`          VARCHAR(2)   NULL,
    `tiempo_relacion`       VARCHAR(20)  NULL,
    `nom_responsable`       VARCHAR(30)  NULL,
    `direccion_responsable` VARCHAR(45)  NULL,
    `tel_responsable`       VARCHAR(20)  NULL,
    PRIMARY KEY (`id_paciente`),
    INDEX `usuario_id_idx` (`usuario_id` ASC) VISIBLE,
    INDEX `entidad_id_idx` (`entidad_id` ASC) VISIBLE,
    CONSTRAINT `fk_paciente_datos_generales_usuario`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `db_sistema_clinica`.`usuario` (`id_usuario`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_paciente_datos_generales_entidad`
        FOREIGN KEY (`entidad_id`)
            REFERENCES `db_sistema_clinica`.`entidad` (`id_entidad`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`asignacion_usuario_paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`asignacion_usuario_paciente`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`asignacion_usuario_paciente`
(
    `id_asignacion_usuario_paciente` INT      NOT NULL AUTO_INCREMENT,
    `usuario_id`                     INT      NULL,
    `paciente_id`                    INT      NULL,
    `fecha_asignacion`               DATETIME NULL,
    PRIMARY KEY (`id_asignacion_usuario_paciente`),
    INDEX `usuario_id_idx` (`usuario_id` ASC) VISIBLE,
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_asignacion_usuario_paciente_usuario`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `db_sistema_clinica`.`usuario` (`id_usuario`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_asignacion_usuario_paciente_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`vive_con`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`vive_con`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`vive_con`
(
    `id_vive_con`     INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`     INT         NOT NULL,
    `nombre_vive`     VARCHAR(50) NULL,
    `tel_vive`        VARCHAR(20) NULL,
    `parentesco_vive` VARCHAR(15) NULL,
    PRIMARY KEY (`id_vive_con`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_vive_con_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`consumo_sustancias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`consumo_sustancias`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`consumo_sustancias`
(
    `id_consumo_sustancias` INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`           INT         NOT NULL,
    `tipo_sust`             VARCHAR(45) NULL,
    `consumo_sust`          VARCHAR(2)  NULL,
    `forma_cons`            VARCHAR(15) NULL,
    `frecuencia_cons`       VARCHAR(15) NULL,
    `cant_consumo_sust`     VARCHAR(15) NULL,
    `edad_inicio_cons`      SMALLINT(3) NULL,
    PRIMARY KEY (`id_consumo_sustancias`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_consumo_sustancias_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`consumo_ultimo_year`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`consumo_ultimo_year`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`consumo_ultimo_year`
(
    `id_consumo_ultomo_year` INT           NOT NULL AUTO_INCREMENT,
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
    PRIMARY KEY (`id_consumo_ultomo_year`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_consumo_ultimo_year_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`situaciones_vida_diaria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`situaciones_vida_diaria`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`situaciones_vida_diaria`
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
    PRIMARY KEY (`id_situaciones`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_situaciones_vida_diaria_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`escala_consumo_mes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`escala_consumo_mes`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`escala_consumo_mes`
(
    `id_escala_consumo_mes` INT         NOT NULL AUTO_INCREMENT,
    `paciente_id`           INT         NULL,
    `sin_problema`          VARCHAR(10) NULL,
    `peq_problema`          VARCHAR(10) NULL,
    `un_problema`           VARCHAR(10) NULL,
    `gran_problema`         VARCHAR(10) NULL,
    PRIMARY KEY (`id_escala_consumo_mes`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_escala_consumo_mes_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`disposicion_cambio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`disposicion_cambio`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`disposicion_cambio`
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
    PRIMARY KEY (`id_disposicion_cambio`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_disposicion_cambio_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema_clinica`.`situacion_social_familiar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sistema_clinica`.`situacion_social_familiar`;

CREATE TABLE IF NOT EXISTS `db_sistema_clinica`.`situacion_social_familiar`
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
    PRIMARY KEY (`id_situacion_social_familiar`),
    INDEX `paciente_id_idx` (`paciente_id` ASC) VISIBLE,
    CONSTRAINT `fk_situacion_social_familiar_paciente_datos_generales`
        FOREIGN KEY (`paciente_id`)
            REFERENCES `db_sistema_clinica`.`paciente_datos_generales` (`id_paciente`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;



