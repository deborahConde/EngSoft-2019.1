CREATE TABLE `usuarios` (
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(40) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(12) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(14) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(40) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `funcionarios` (
  `id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(14) CHARACTER SET latin1 NOT NULL,
  `salario` float NOT NULL,
  `cargo` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `clientes` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(40) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `setor` (
  `codigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(140) CHARACTER SET latin1 NOT NULL,
  `administrador` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`);
  
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_cpf` (`cpf`) USING BTREE;

ALTER TABLE `setor`
  ADD CONSTRAINT `fk_SF` FOREIGN KEY (`administrador`) REFERENCES `funcionarios` (`id`);
COMMIT;

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

ALTER TABLE `setor`
  ADD PRIMARY KEY (`codigo`);

ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_UF` FOREIGN KEY (`cpf`) REFERENCES `usuarios` (`cpf`) ON DELETE CASCADE;
COMMIT;

ALTER TABLE `setor`
  ADD CONSTRAINT `fk_SF` FOREIGN KEY (`administrador`) REFERENCES `funcionarios` (`id`);
COMMIT;

