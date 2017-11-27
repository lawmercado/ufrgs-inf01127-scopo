-- MySQL Script generated by MySQL Workbench
-- Qui 16 Nov 2017 21:36:41 -02
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

-- -----------------------------------------------------
-- Schema scopo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema scopo
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `scopo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `scopo` ;

-- -----------------------------------------------------
-- Table `scopo`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Categoria` (
  `categoria_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `descricao` VARCHAR(45) NOT NULL COMMENT 'Descrição',
  PRIMARY KEY (`categoria_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Produto` (
  `produto_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nome` VARCHAR(45) NOT NULL COMMENT 'Nome',
  `categoria_id` INT NOT NULL COMMENT 'Categoria',
  PRIMARY KEY (`produto_id`),
  INDEX `fk_categoria_id_idx` (`categoria_id` ASC),
  FOREIGN KEY (`categoria_id`)
    REFERENCES `scopo`.`Categoria` (`categoria_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Pessoa` (
  `pessoa_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nome` VARCHAR(100) NOT NULL COMMENT 'Nome',
  `email` VARCHAR(50) NOT NULL COMMENT 'Email',
  `endereco` VARCHAR(100) NOT NULL COMMENT 'Endereço',
  `cidade` VARCHAR(50) NOT NULL COMMENT 'Cidade',
  `cep` VARCHAR(8) NOT NULL COMMENT 'CEP',
  `estado` VARCHAR(2) NOT NULL COMMENT 'Estado',
  PRIMARY KEY (`pessoa_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Produtor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Produtor` (
  `produtor_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `cnpj` VARCHAR(14) NOT NULL COMMENT 'CNPJ',
  `pessoa_id` INT NOT NULL COMMENT 'Pessoa associada',
  PRIMARY KEY (`produtor_id`),
  INDEX `fk_produtor_pessoa_id_idx` (`pessoa_id` ASC),
  FOREIGN KEY (`pessoa_id`)
    REFERENCES `scopo`.`Pessoa` (`pessoa_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Oferta` (
  `oferta_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `momento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Momento da criação',
  `quantidade` INT NOT NULL COMMENT 'Quantidade em kg',
  `preco` FLOAT NOT NULL COMMENT 'Preço por kg',
  `corrente` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Corrente',
  `produto_id` INT NOT NULL COMMENT 'Produto associado',
  `produtor_id` INT NOT NULL COMMENT 'Produtor associado',
  PRIMARY KEY (`oferta_id`),
  INDEX `fk_produto_id_idx` (`produto_id` ASC),
  INDEX `fk_produtor_id_idx` (`produtor_id` ASC),
  FOREIGN KEY (`produto_id`)
    REFERENCES `scopo`.`Produto` (`produto_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (`produtor_id`)
    REFERENCES `scopo`.`Produtor` (`produtor_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Consumidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Consumidor` (
  `consumidor_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `cpf` VARCHAR(11) NOT NULL COMMENT 'CPF',
  `pessoa_id` INT NOT NULL COMMENT 'Pessoa associada',
  PRIMARY KEY (`consumidor_id`),
  INDEX `fk_consumidor_pesssoa_id_idx` (`pessoa_id` ASC),
  FOREIGN KEY (`pessoa_id`)
    REFERENCES `scopo`.`Pessoa` (`pessoa_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Pedido` (
  `pedido_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `momento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Momento da criação',
  `quantidade` INT NOT NULL COMMENT 'Quantidade',
  `finalizado` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Finalizado',
  `cancelado` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Cancelado',
  `oferta_id` INT NOT NULL COMMENT 'Oferta associada',
  `consumidor_id` INT NOT NULL COMMENT 'Consumidor associado',
  PRIMARY KEY (`pedido_id`),
  INDEX `fk_oferta_id_idx` (`oferta_id` ASC),
  INDEX `fk_consumidor_id_idx` (`consumidor_id` ASC),
  FOREIGN KEY (`oferta_id`)
    REFERENCES `scopo`.`Oferta` (`oferta_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (`consumidor_id`)
    REFERENCES `scopo`.`Consumidor` (`consumidor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `scopo`.`Mensagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Mensagem` (
  `mensagem_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `momento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Momento da criação',
  `mensagem` VARCHAR(280) NOT NULL COMMENT 'Mensagem',
  `pedido_id` INT NOT NULL COMMENT 'Pedido associado',
  `pessoa_id` INT NOT NULL COMMENT 'Pessoa associada',
  PRIMARY KEY (`mensagem_id`),
  INDEX `fk_pedido_id_idx` (`pedido_id` ASC),
  INDEX `fk_pessoa_id_idx` (`pessoa_id` ASC),
  FOREIGN KEY (`pedido_id`)
    REFERENCES `scopo`.`Pedido` (`pedido_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (`pessoa_id`)
    REFERENCES `scopo`.`Pessoa` (`pessoa_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scopo`.`Papel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Papel` (
  `papel_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `descricao` VARCHAR(20) NOT NULL COMMENT 'Descrição',
  PRIMARY KEY (`papel_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `scopo`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scopo`.`Usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `login` VARCHAR(20) NOT NULL COMMENT 'Login',
  `senha` VARCHAR(32) NOT NULL COMMENT 'Senha',
  `pessoa_id` INT NOT NULL COMMENT 'Pessoa associada',
  `papel_id` INT NOT NULL COMMENT 'Papel associado',
  PRIMARY KEY (`usuario_id`),
  INDEX `fk_usuario_pessoa_id_idx` (`pessoa_id` ASC),
  FOREIGN KEY (`pessoa_id`)
    REFERENCES `scopo`.`Pessoa` (`pessoa_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  INDEX `fk_papel_id_idx` (`papel_id` ASC),
  FOREIGN KEY (`papel_id`)
    REFERENCES `scopo`.`Papel` (`papel_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `scopo`.`Papel` (`descricao`) VALUES ('Administrador'), ('Produtor'), ('Consumidor');
INSERT INTO `scopo`.`Pessoa` (`nome`, `email`, `endereco`, `cidade`, `cep`, `estado`) VALUES ('Administrador', 'admin@scopo.com.br', 'Av. Borges de Medeiros, 1501', 'Porto Alegre', '90111970', 'RS');
INSERT INTO `scopo`.`Usuario` (`login`, `senha`, `pessoa_id`, `papel_id`) VALUES ('admin', '4a86bbb9b0811e4e1b2fa6d4d538375f', 1, 1);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
