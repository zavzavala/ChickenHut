		<?php 

$pega_usu = "SELECT * FROM usuarios, posto WHERE posto.id_posto=usuarios.id_posto AND usuarios.id_usuarios = '$iduser' limit 0,3";

$pega = $mysqli->query($pega_usu) or die($mysqli->error);

	$data =mysqli_num_rows($pega);

	$pega_usu2 = "SELECT * FROM usuarios, posto WHERE posto.id_posto=usuarios.id_posto limit 3,10";

$pega2 = $mysqli->query($pega_usu2) or die($mysqli->error);

	$data =mysqli_num_rows($pega2);

$post="SELECT posto.posto FROM `posto`, usuarios WHERE usuarios.id_posto=posto.id_posto AND usuarios.id_usuarios = $iduser limit 1 ";
                                $qp = $mysqli->query($post) or die($mysqli->error);
                                $lnposto = mysqli_fetch_assoc($qp);
                                $posto = $lnposto['posto'];


$sqfood = "SELECT * FROM productos WHERE tipo_prod != 'bebida' ";
$fd = $mysqli->query($sqfood) or die($mysqli->error);

$sqDR = "SELECT * FROM productos WHERE tipo_prod = 'bebida'";
$dr = $mysqli->query($sqDR) or die($mysqli->error);


 $somah = "SELECT 
            sum(total) as totalVenda 
            FROM orders 
            WHERE date(Data) = date(current_date)";
            
            $VendaH = $mysqli->query($somah) or die($mysqli->error);
            
            $rh = $VendaH->fetch_object();
            

            $sqltodas = "SELECT 
sum(total) as todasVendas
FROM orders where YEAR( Data ) = YEAR( current_date )";
$tds = $mysqli->query($sqltodas) or die($mysqli->error);

$todas = $tds->fetch_object();

$sqlSemana = "SELECT 
sum(total) as todasemana
FROM orders where week(Data) = week(current_date) AND YEAR( Data ) = YEAR( current_date )";

$tsemana = $mysqli->query($sqlSemana) or die($mysqli->error);
 $todasemana = $tsemana->fetch_object();

$sqlmes = "SELECT MONTHNAME(Data) as mes, 
sum( total ) as totalVenda 
FROM orders where YEAR( Data ) = YEAR( current_date ) GROUP BY MONTH( Data )";
$resultmes = $mysqli->query($sqlmes) or die($mysqli->error);



$qrmes = "SELECT *, 
sum(total) as totalVenda 
FROM orders where month(Data) = month(current_date) AND YEAR( Data ) = YEAR( current_date )";
$resmes = $mysqli->query($qrmes) or die($mysqli->error);
$resM = $resmes->fetch_object();
////////MES


$qrMesB = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE MONTH(Data ) = MONTH(current_date ) AND YEAR( Data ) = YEAR( current_date )";

$resmesBebidas = $mysqli->query($qrMesB) or die($mysqli->error);

$resMBebidas = $resmesBebidas->fetch_object();

$Mbebidas=$resMBebidas->totalB;
//////////////
$qrDB = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE DATE(Data) = DATE(current_date) AND YEAR( Data ) = YEAR( current_date )";

$resDiaBebidas = $mysqli->query($qrDB) or die($mysqli->error);

$DiaBebidas = $resDiaBebidas->fetch_object();

$DFood =$DiaBebidas->totalB;
////////////////TODOS
$qrSomaB = "SELECT SUM( total ) AS totalB
FROM bebida WHERE YEAR( Data ) = YEAR( current_date )";

$reSomaBebidas = $mysqli->query($qrSomaB) or die($mysqli->error);

$SomaBebidas = $reSomaBebidas->fetch_object();

$TFood =$SomaBebidas->totalB;


//////////SEMANA

$qrsemana = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE week(Data) = week(current_date) AND YEAR( Data ) = YEAR( current_date ) ";
            
            $resultadoSemanaB = $mysqli->query($qrsemana) or die($mysqli->error);
            
            $resSemanaB = $resultadoSemanaB->fetch_object();

                $SFood =$resSemanaB->totalB;
//////////DIA
           $somad = "SELECT 
            sum(total) as totalVenda 
            FROM orders 
            WHERE date(Data) = date(current_date)";
            
            $resultadod = $mysqli->query($somad) or die($mysqli->error);
            
            $resd = $resultadod->fetch_object();

            $posto = "SELECT * FROM posto";
$post = $mysqli->query($posto) or die($mysqli->error);

$options = "";
while($linha = mysqli_fetch_array($post)){
$options = $options."<option>$linha[0]</option>";
            }

            
////////////SO FAST FOODS///////////////////////

$qrMesFF = "SELECT SUM( total ) AS totalFF
FROM orders

WHERE MONTH(Data) = MONTH(current_date ) AND YEAR( Data ) = YEAR( current_date )
 ";

$resmesFF = $mysqli->query($qrMesFF) or die($mysqli->error);

$MFFood = $resmesFF->fetch_object();

$MesFFood= $MFFood->totalFF;

    $resMFF=$MesFFood-$Mbebidas;
//////////////
$qrDFF = "SELECT SUM( total ) AS totalFF
FROM orders

WHERE DATE(Data) = DATE(current_date) AND YEAR( Data ) = YEAR( current_date )";

$resDiaFF = $mysqli->query($qrDFF) or die($mysqli->error);

$DFFood = $resDiaFF->fetch_object();

$DiaFFood= $DFFood->totalFF;

    $DiaFF=$DiaFFood-$DFood;
////////////////TODOS
$qrSomaFF = "SELECT SUM(total) AS totalFF
FROM orders WHERE YEAR( Data ) = YEAR( current_date )";

$reSomaFF = $mysqli->query($qrSomaFF) or die($mysqli->error);

$SomaFFood = $reSomaFF->fetch_object();

$SomaFFood= $SomaFFood->totalFF;

    $SomaFF=$SomaFFood-$TFood;
//////////SEMANA

$qrsemanaFF = "SELECT SUM( total ) AS totalFF
FROM orders

WHERE week(Data) = week(current_date) AND YEAR( Data ) = YEAR( current_date )";
            
            $resultadoSemanaFF = $mysqli->query($qrsemanaFF) or die($mysqli->error);
            
            $resSemanaFFood = $resultadoSemanaFF->fetch_object();

$SemanaFFood= $resSemanaFFood->totalFF;

    $resSemanaFF=$SemanaFFood-$SFood;



//SELECT usuarios.nome, usuarios.posto, sum(venda.total) FROM `venda`, usuarios WHERE venda.id_usuarios=usuarios.id_usuarios and week(venda.data_venda) = week(current_date)
?>