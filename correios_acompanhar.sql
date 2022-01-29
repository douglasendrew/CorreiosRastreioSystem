
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `correspondencias` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `ac` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `pessoa_responsavel` varchar(255) NOT NULL,
  `tipo_envio` varchar(255) NOT NULL,
  `ar` varchar(255) NOT NULL,
  `data_envio` varchar(255) NOT NULL,
  `cod_rastreio` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `data_create` varchar(255) NOT NULL,
  `data_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `correspondencias`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `correspondencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;