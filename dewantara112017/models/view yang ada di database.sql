-- view yang ada di database.sql
/*INI adalah view yang ada didatabase ya*/

-- terakhir ngapdet ini
DROP VIEW IF EXISTS `004-view-tarif`;
CREATE VIEW `004-view-tarif` AS 
SELECT
	`a`.`id` AS `id`,
	`a`.`KodeT` AS `kodetarif`,
	`a`.`Tarif` AS `tarif`,
	LEFT (`a`.`KodeT`, 4) AS `kodemhs`,
	substr(`a`.`KodeT`, 8, 4) AS `tahun`,

IF (
	(RIGHT(`a`.`KodeT`, 1) = 1),
	1,
	2
) AS `kdsmster`,

IF (
	(RIGHT(`a`.`KodeT`, 1) = 1),
	'ganjil',
	'genap'
) AS `smster`
FROM
	`tarif` `a` ;

