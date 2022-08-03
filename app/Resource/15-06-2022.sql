ALTER TABLE `Membro` ADD `dataRecepcao` DATETIME NULL AFTER `dataBatismo`;
ALTER TABLE `Membro` ADD `dataSaida` DATETIME NULL AFTER `instituicaoId`;
ALTER TABLE `Membro` ADD `motivoExclusaoId` INT NULL AFTER `dataSaida`;

ALTER TABLE `MembroHistorico` CHANGE `dataMovimentacao` `dataHistorico` DATETIME NULL DEFAULT NULL;
ALTER TABLE `MembroHistorico` ADD `motivoExclusaoId` INT NULL AFTER `descricao`;