--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      sd
-- Project :      sada2.dm1
-- Author :       daniel
--
-- Date Created : Friday, August 21, 2015 10:26:11
-- Target DBMS : MySQL 5.x
--

-- 
-- TABLE: alquileres 
--

CREATE TABLE alquileres(
    idAlquileres    INT            AUTO_INCREMENT,
    Descripcion     VARCHAR(45)    NOT NULL,
    Temporada       VARCHAR(45)    NOT NULL,
    monto           INT            NOT NULL,
    fecha_Activa    DATE           NOT NULL,
    PRIMARY KEY (idAlquileres)
)ENGINE=INNODB
;



-- 
-- TABLE: barrio 
--

CREATE TABLE barrio(
    id_barrio          INT            AUTO_INCREMENT,
    barrio             VARCHAR(35)    DEFAULT 'nombre del barrio' NOT NULL,
    id_ciudad          INT            NOT NULL,
    id_municipio       INT            NOT NULL,
    id_departamento    INT            NOT NULL,
    id_provincia       INT            NOT NULL,
    id_pais            INT            NOT NULL,
    PRIMARY KEY (id_barrio, id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: ciudad 
--

CREATE TABLE ciudad(
    id_ciudad          INT            AUTO_INCREMENT,
    ciudad             VARCHAR(35),
    id_municipio       INT            NOT NULL,
    id_departamento    INT            NOT NULL,
    id_provincia       INT            NOT NULL,
    id_pais            INT            NOT NULL,
    PRIMARY KEY (id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: contratos 
--

CREATE TABLE contratos(
    idcontratos     INT            AUTO_INCREMENT,
    contratoscol    VARCHAR(45),
    idAlquileres    INT            NOT NULL,
    PRIMARY KEY (idcontratos, idAlquileres)
)ENGINE=INNODB
;



-- 
-- TABLE: departamento 
--

CREATE TABLE departamento(
    id_departamento    INT            AUTO_INCREMENT,
    departamento       VARCHAR(45),
    id_provincia       INT            NOT NULL,
    id_pais            INT            NOT NULL,
    PRIMARY KEY (id_departamento, id_provincia, id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: menu 
--

CREATE TABLE menu(
    id       INT            AUTO_INCREMENT,
    nivel    INT            NOT NULL,
    link     VARCHAR(60)    NOT NULL,
    Texto    VARCHAR(20)    NOT NULL,
    PRIMARY KEY (id)
)ENGINE=INNODB
;



-- 
-- TABLE: municipio 
--

CREATE TABLE municipio(
    id_municipio       INT            AUTO_INCREMENT,
    municipio          VARCHAR(30),
    id_departamento    INT            NOT NULL,
    id_provincia       INT            NOT NULL,
    id_pais            INT            NOT NULL,
    PRIMARY KEY (id_municipio, id_departamento, id_provincia, id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: pais 
--

CREATE TABLE pais(
    id_pais    INT            AUTO_INCREMENT,
    pais       VARCHAR(30),
    PRIMARY KEY (id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: perfil 
--

CREATE TABLE perfil(
    id_perfil      INT            AUTO_INCREMENT,
    perfil         VARCHAR(35)    NOT NULL,
    privilegios    INT            NOT NULL,
    nivel          TINYINT        NOT NULL,
    PRIMARY KEY (id_perfil)
)ENGINE=INNODB
;



-- 
-- TABLE: personas 
--

CREATE TABLE personas(
    idpersonas         INT            AUTO_INCREMENT,
    nombre             VARCHAR(45),
    apellido           VARCHAR(45),
    nacimiento         DATE,
    direccion          VARCHAR(45),
    documento          INT,
    id_barrio          INT            NOT NULL,
    id_ciudad          INT            NOT NULL,
    id_municipio       INT            NOT NULL,
    id_departamento    INT            NOT NULL,
    id_provincia       INT            NOT NULL,
    id_pais            INT            NOT NULL,
    PRIMARY KEY (idpersonas)
)ENGINE=INNODB
;



-- 
-- TABLE: `personas usuario` 
--

CREATE TABLE `personas usuario`(
    idpersonas    INT         NOT NULL,
    id_usuario    CHAR(10)    NOT NULL,
    PRIMARY KEY (idpersonas, id_usuario)
)ENGINE=INNODB
;



-- 
-- TABLE: propiedades 
--

CREATE TABLE propiedades(
    id_propiedad                      INT             AUTO_INCREMENT,
    FPublicacion                      DATETIME        NOT NULL,
    superficie                        INT             NOT NULL,
    direccion                         VARCHAR(45)     NOT NULL,
    valor                             INT             NOT NULL,
    Descripcion                       TEXT            NOT NULL,
    banos                             TINYINT,
    habitaciones                      TINYINT,
    pileta                            VARCHAR(45),
    otros                             VARCHAR(145),
    tipopropiedad_id_tipoPropiedad    INT             NOT NULL,
    id_barrio                         INT             NOT NULL,
    id_ciudad                         INT             NOT NULL,
    id_municipio                      INT             NOT NULL,
    id_departamento                   INT             NOT NULL,
    id_provincia                      INT             NOT NULL,
    id_pais                           INT             NOT NULL,
    PRIMARY KEY (id_propiedad, tipopropiedad_id_tipoPropiedad)
)ENGINE=INNODB
;



-- 
-- TABLE: `propiedades alquileres` 
--

CREATE TABLE `propiedades alquileres`(
    id_propiedad                      INT    NOT NULL,
    idAlquileres                      INT    NOT NULL,
    tipopropiedad_id_tipoPropiedad    INT    NOT NULL,
    PRIMARY KEY (id_propiedad, idAlquileres, tipopropiedad_id_tipoPropiedad)
)ENGINE=INNODB
;



-- 
-- TABLE: provincia 
--

CREATE TABLE provincia(
    id_provincia    INT            AUTO_INCREMENT,
    provincia       VARCHAR(30),
    id_pais         INT            NOT NULL,
    PRIMARY KEY (id_provincia, id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: sesiones 
--

CREATE TABLE sesiones(
    id              CHAR(128)    NOT NULL,
    horario         CHAR(10)     NOT NULL,
    data            TEXT         NOT NULL,
    clave_sesion    CHAR(128)    NOT NULL,
    PRIMARY KEY (id)
)ENGINE=INNODB
;



-- 
-- TABLE: tipopropiedad 
--

CREATE TABLE tipopropiedad(
    id_tipoPropiedad    INT            AUTO_INCREMENT,
    Tipo                VARCHAR(45)    NOT NULL,
    PRIMARY KEY (id_tipoPropiedad)
)ENGINE=INNODB
;



-- 
-- TABLE: usuario 
--

CREATE TABLE usuario(
    id_usuario        CHAR(10)    NOT NULL,
    nombre_usuario    CHAR(10),
    clave             CHAR(10),
    mail              CHAR(10),
    fecha             CHAR(10),
    PRIMARY KEY (id_usuario)
)ENGINE=INNODB
;



-- 
-- TABLE: usuarios 
--

CREATE TABLE usuarios(
    id                  INT            AUTO_INCREMENT,
    perfil_id_perfil    INT            NOT NULL,
    nombre              VARCHAR(25)    NOT NULL,
    clave               VARCHAR(16)    NOT NULL,
    nivel               INT            NOT NULL,
    PRIMARY KEY (id)
)ENGINE=INNODB
;



-- 
-- INDEX: Ref428 
--

CREATE INDEX Ref428 ON barrio(id_ciudad, id_provincia, id_departamento, id_municipio, id_pais)
;
-- 
-- INDEX: Ref1916 
--

CREATE INDEX Ref1916 ON ciudad(id_pais, id_municipio, id_provincia, id_departamento)
;
-- 
-- INDEX: Ref123 
--

CREATE INDEX Ref123 ON contratos(idAlquileres)
;
-- 
-- INDEX: Ref1826 
--

CREATE INDEX Ref1826 ON departamento(id_pais, id_provincia)
;
-- 
-- INDEX: Ref2427 
--

CREATE INDEX Ref2427 ON municipio(id_pais, id_provincia, id_departamento)
;
-- 
-- INDEX: Ref331 
--

CREATE INDEX Ref331 ON personas(id_pais, id_provincia, id_departamento, id_municipio, id_ciudad, id_barrio)
;
-- 
-- INDEX: Ref1135 
--

CREATE INDEX Ref1135 ON `personas usuario`(idpersonas)
;
-- 
-- INDEX: Ref2336 
--

CREATE INDEX Ref2336 ON `personas usuario`(id_usuario)
;
-- 
-- INDEX: fk_propiedades_tipopropiedad1_idx 
--

CREATE INDEX fk_propiedades_tipopropiedad1_idx ON propiedades(tipopropiedad_id_tipoPropiedad)
;
-- 
-- INDEX: fk_propiedades_tipopropiedad1 
--

CREATE INDEX fk_propiedades_tipopropiedad1 ON propiedades(tipopropiedad_id_tipoPropiedad)
;
-- 
-- INDEX: Ref329 
--

CREATE INDEX Ref329 ON propiedades(id_pais, id_provincia, id_departamento, id_municipio, id_ciudad, id_barrio)
;
-- 
-- INDEX: Ref1221 
--

CREATE INDEX Ref1221 ON `propiedades alquileres`(tipopropiedad_id_tipoPropiedad, id_propiedad)
;
-- 
-- INDEX: Ref122 
--

CREATE INDEX Ref122 ON `propiedades alquileres`(idAlquileres)
;
-- 
-- INDEX: Ref1714 
--

CREATE INDEX Ref1714 ON provincia(id_pais)
;
-- 
-- INDEX: fk_usuarios_perfil1_idx 
--

CREATE INDEX fk_usuarios_perfil1_idx ON usuarios(perfil_id_perfil)
;
-- 
-- INDEX: fk_usuarios_perfil1 
--

CREATE INDEX fk_usuarios_perfil1 ON usuarios(perfil_id_perfil)
;
-- 
-- TABLE: barrio 
--

ALTER TABLE barrio ADD CONSTRAINT Refciudad28 
    FOREIGN KEY (id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
    REFERENCES ciudad(id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
;


-- 
-- TABLE: ciudad 
--

ALTER TABLE ciudad ADD CONSTRAINT Refmunicipio16 
    FOREIGN KEY (id_municipio, id_departamento, id_provincia, id_pais)
    REFERENCES municipio(id_municipio, id_departamento, id_provincia, id_pais)
;


-- 
-- TABLE: contratos 
--

ALTER TABLE contratos ADD CONSTRAINT Refalquileres23 
    FOREIGN KEY (idAlquileres)
    REFERENCES alquileres(idAlquileres)
;


-- 
-- TABLE: departamento 
--

ALTER TABLE departamento ADD CONSTRAINT Refprovincia26 
    FOREIGN KEY (id_provincia, id_pais)
    REFERENCES provincia(id_provincia, id_pais)
;


-- 
-- TABLE: municipio 
--

ALTER TABLE municipio ADD CONSTRAINT Refdepartamento27 
    FOREIGN KEY (id_departamento, id_provincia, id_pais)
    REFERENCES departamento(id_departamento, id_provincia, id_pais)
;


-- 
-- TABLE: personas 
--

ALTER TABLE personas ADD CONSTRAINT Refbarrio31 
    FOREIGN KEY (id_barrio, id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
    REFERENCES barrio(id_barrio, id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
;


-- 
-- TABLE: `personas usuario` 
--

ALTER TABLE `personas usuario` ADD CONSTRAINT Refpersonas35 
    FOREIGN KEY (idpersonas)
    REFERENCES personas(idpersonas)
;

ALTER TABLE `personas usuario` ADD CONSTRAINT Refusuario36 
    FOREIGN KEY (id_usuario)
    REFERENCES usuario(id_usuario)
;


-- 
-- TABLE: propiedades 
--

ALTER TABLE propiedades ADD CONSTRAINT Refbarrio29 
    FOREIGN KEY (id_barrio, id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
    REFERENCES barrio(id_barrio, id_ciudad, id_municipio, id_departamento, id_provincia, id_pais)
;

ALTER TABLE propiedades ADD CONSTRAINT fk_propiedades_tipopropiedad1 
    FOREIGN KEY (tipopropiedad_id_tipoPropiedad)
    REFERENCES tipopropiedad(id_tipoPropiedad)
;


-- 
-- TABLE: `propiedades alquileres` 
--

ALTER TABLE `propiedades alquileres` ADD CONSTRAINT Refpropiedades21 
    FOREIGN KEY (id_propiedad, tipopropiedad_id_tipoPropiedad)
    REFERENCES propiedades(id_propiedad, tipopropiedad_id_tipoPropiedad)
;

ALTER TABLE `propiedades alquileres` ADD CONSTRAINT Refalquileres22 
    FOREIGN KEY (idAlquileres)
    REFERENCES alquileres(idAlquileres)
;


-- 
-- TABLE: provincia 
--

ALTER TABLE provincia ADD CONSTRAINT Refpais14 
    FOREIGN KEY (id_pais)
    REFERENCES pais(id_pais)
;


-- 
-- TABLE: usuarios 
--

ALTER TABLE usuarios ADD CONSTRAINT fk_usuarios_perfil1 
    FOREIGN KEY (perfil_id_perfil)
    REFERENCES perfil(id_perfil)
;


