SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00031709671020508

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00070285797119141

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00073099136352539

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00016498565673828

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00041699409484863

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00051093101501465

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.0001828670501709

select id,KodeJ,Jenis from jenis order by id asc 
 Execution Time:0.0014209747314453

select id,KodeP,Prodi from prodi order by id asc 
 Execution Time:0.00050783157348633

select id,Kodek,Kelompok from kelompokmhs order by id asc 
 Execution Time:0.00040912628173828

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00051403045654297

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00029683113098145

SELECT `id`, `KodeT`, `Tarif`
FROM (`tarif`)
ORDER BY `id` asc
LIMIT 50 
 Execution Time:0.0013659000396729

SELECT *
FROM (`tarif`) 
 Execution Time:0.00013184547424316

SELECT *
FROM (`tarif`) 
 Execution Time:9.1075897216797E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:0.00022101402282715

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:0.00021600723266602

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '62' 
 Execution Time:0.00019693374633789

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '01' 
 Execution Time:9.8228454589844E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:8.6069107055664E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:8.2015991210938E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:9.2029571533203E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:8.2015991210938E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.7009201049805E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:9.0122222900391E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:8.2015991210938E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.5817108154297E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '03' 
 Execution Time:9.4175338745117E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.8201293945312E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.6055526733398E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '03' 
 Execution Time:8.8930130004883E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:8.082389831543E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:8.5115432739258E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '09' 
 Execution Time:8.6069107055664E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.7962875366211E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:8.2015991210938E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '12' 
 Execution Time:8.1062316894531E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '0' 
 Execution Time:8.1062316894531E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.6055526733398E-5

SELECT `id`, `KodeT`, `Tarif`
FROM (`tarif`)
ORDER BY `id` asc
LIMIT 50 
 Execution Time:0.00025296211242676

SELECT *
FROM (`tarif`) 
 Execution Time:0.00011420249938965

SELECT *
FROM (`tarif`) 
 Execution Time:8.2969665527344E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:0.00011014938354492

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:9.0122222900391E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '62' 
 Execution Time:8.7976455688477E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '01' 
 Execution Time:8.392333984375E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.6055526733398E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.0810317993164E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:8.1062316894531E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.0810317993164E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.1048736572266E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '02' 
 Execution Time:0.00010108947753906

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.2002410888672E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.1048736572266E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '03' 
 Execution Time:7.5101852416992E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.0095062255859E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:7.1048736572266E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '03' 
 Execution Time:7.7962875366211E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:6.8902969360352E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:6.6995620727539E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '09' 
 Execution Time:7.319450378418E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '1' 
 Execution Time:7.0810317993164E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:6.8902969360352E-5

SELECT *
FROM (`jenis`)
WHERE `KodeJ` =  '12' 
 Execution Time:7.5101852416992E-5

SELECT *
FROM (`kelompokmhs`)
WHERE `KodeK` =  '0' 
 Execution Time:6.6995620727539E-5

SELECT *
FROM (`prodi`)
WHERE `KodeP` =  '61' 
 Execution Time:6.6995620727539E-5

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00028014183044434

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00023508071899414

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00018095970153809

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00034785270690918

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00020003318786621

SELECT `id`, `KodeT`, `Tarif`
FROM (`tarif`) 
 Execution Time:0.00023984909057617

SELECT *
FROM (`tarif`) 
 Execution Time:0.00016403198242188

SELECT *
FROM (`tarif`) 
 Execution Time:9.3936920166016E-5

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00034785270690918

SELECT `id`, `kode`, `tanggal`, `mhs`, `kodebank`, `refbank`, `isbayar`, `tglbayar`, `isvalidasi`, `tglvalidasi`, `isactive`, `isdeleted`, `datedeleted`, `userid`, `datetime`
FROM (`tagihanmhs`)
ORDER BY `id` asc
LIMIT 50 
 Execution Time:0.00069904327392578

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:0.00011587142944336

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:9.608268737793E-5

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00023484230041504

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00019407272338867

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00023508071899414

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00023007392883301

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00017905235290527

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.0001380443572998

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00030803680419922

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.0002129077911377

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00014805793762207

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00037503242492676

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.0014901161193848

SELECT `users`.*, `users`.`id` as id, `users`.`id` as user_id
FROM (`users`)
WHERE `users`.`id` =  '34'
LIMIT 1 
 Execution Time:0.00057888031005859

SELECT `id`, `KodeT`, `Tarif`
FROM (`tarif`) 
 Execution Time:0.00068902969360352

SELECT *
FROM (`tarif`) 
 Execution Time:0.00011396408081055

SELECT *
FROM (`tarif`) 
 Execution Time:9.0837478637695E-5

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00028800964355469

SELECT `id`, `kode`, `tanggal`, `mhs`, `kodebank`, `refbank`, `isbayar`, `tglbayar`, `isvalidasi`, `tglvalidasi`, `isactive`, `isdeleted`, `datedeleted`, `userid`, `datetime`
FROM (`tagihanmhs`)
ORDER BY `id` asc
LIMIT 50 
 Execution Time:0.00049304962158203

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:0.00010895729064941

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:9.5844268798828E-5

SELECT `id`, `KodeT`, `Tarif`
FROM (`tarif`) 
 Execution Time:0.00037097930908203

SELECT *
FROM (`tarif`) 
 Execution Time:0.00014209747314453

SELECT *
FROM (`tarif`) 
 Execution Time:8.5115432739258E-5

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00037097930908203

SELECT `id`, `kode`, `tanggal`, `mhs`, `kodebank`, `refbank`, `isbayar`, `tglbayar`, `isvalidasi`, `tglvalidasi`, `isactive`, `isdeleted`, `datedeleted`, `userid`, `datetime`
FROM (`tagihanmhs`)
ORDER BY `id` asc
LIMIT 50 
 Execution Time:0.0002598762512207

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:0.00010013580322266

SELECT *
FROM (`tagihanmhs`) 
 Execution Time:8.9883804321289E-5

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00043797492980957

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.000768899917603

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.000775098800659

SELECT `users_groups`.`group_id` as id, `groups`.`name`, `groups`.`description`
FROM (`users_groups`)
JOIN `groups` ON `users_groups`.`group_id`=`groups`.`id`
WHERE `users_groups`.`user_id` =  '34' 
 Execution Time:0.00191879272461

