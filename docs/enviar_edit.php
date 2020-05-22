<?php  include "conn.php";  ?>


<?php 


session_start();

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"]) )
{
  header("Location: index.html");
  exit;
  
  
}



 


?>



<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='dashboard.php'",7000);
	
	
}


</script> 

<?php

session_start();













	

	
//}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='dashboard.php'",3000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>FTTH</title>


</head>



<body>








<?php



$ba =$_POST['ba'];

$mes =$_POST['mes'];
$estacao =$_POST['estacao'];
$mntfo =$_POST['mntfo']; 
$indicador =$_POST['indicador']; 
$abertura =$_POST['abertura']; 
$promessa =$_POST['promessa']; 
$acionamento =$_POST['acionamento']; 
$baixa =$_POST['baixa']; 
$sla =$_POST['sla']; 
$cod =$_POST['cod']; 
$cabo =$_POST['cabo']; 
$entre_local =$_POST['entre_local']; 
$ma =$_POST['ma']; 
$tipo =$_POST['tipo']; 
$causa =$_POST['causa']; 
$sub =$_POST['sub']; 
$usou =$_POST['usou']; 
$justi =$_POST['justi']; 
 $cctos =$_POST['cctos']; 
 $desc =$_POST['desc']; 
$croqui =$_POST['croqui']; 
 $ba_causa =$_POST['ba_causa']; 
$prazo =$_POST['prazo']; 
$metro_cabo =$_POST['metro_cabo']; 
$lote_cabo =$_POST['lote_cabo']; 
$sap =$_POST['sap']; 
$cgr =$_POST['cgr']; 
$prot_bo =$_POST['prot_bo']; 
$obs_bo =$_POST['obs_bo']; 
$remanejo =$_POST['remanejo'];
 $qtd_cx =$_POST['qtd_cx']; 
$n_enpe =$_POST['n_enpe'];  
$end_enpe =$_POST['end_enpe']; 
$coord_cabo =$_POST['coord_cabo'];
$coord_enpe =$_POST['coord_enpe']; 
$pendencia =$_POST['pendencia']; 
$mat_35d =$_POST['mat_35d']; 
$pend_35d =$_POST['pend_35d']; 
$jm =$_POST['jm']; 
$n_jm =$_POST['n_jm']; 
$data_aber =$_POST['data_aber']; 
$prev_reg =$_POST['prev_reg']; 
$foto =$_POST['foto']; 









   

	$permite = array('image/jpg', 'image/jpeg' , 'image/png');

	  $type =$_FILES['foto'] ['type'];
    $type2 =$_FILES['croqui'] ['type'];
    

    $tamanho1 =$_FILES['foto']['size'];
    $tamanho2 =$_FILES['croqui']['size'];
   

    if (empty($type))
            {

               $type = 'image/png';



            }

             if (empty($type2))
            {

               $type2 = 'image/png';



            }
            



    if (!in_array($type,$permite) || !in_array($type2,$permite )  )
{

echo "EXTENSÃO DA IMAGEM INVALIDA, SUA IMAGEM DEVE SER NO FORMATO JPEG,JPG OU PNG!";
	// echo "<script>saidasuccessfully()</script>";
}
else if ( ($tamanho1 > 1000000) || ($tamanho2 > 1000000)  )
{

echo "TAMANHO MÁXIMO DA IMAGEM 1MB!";
  // echo "<script>saidasuccessfully()</script>";
}


else{



if(isset($_FILES['foto'])) {
	
	$extensao = strtolower (substr($_FILES['foto'] ['name'], -4));
	$novo_nome  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "arquivo/";



move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio.$novo_nome )	;
	}
	
	if(isset($_FILES['croqui'])) {

$extensao = strtolower (substr($_FILES['croqui'] ['name'], -4));
	$novo_nome2  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "arquivo/";



move_uploaded_file($_FILES['croqui'] ['tmp_name'], $diretorio.$novo_nome2 )	;

  }
  
  /*

	if(isset($_FILES['foto'])) {

		if($tamanho3 <= 0){
          $novo_nome3 = "null";

		}else{

$extensao = strtolower (substr($_FILES['foto'] ['name'], -4));
	$novo_nome3  = md5(mt_rand(1, 1000) . microtime()) . $extensao;
    $diretorio = "arquivo/";



move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio.$novo_nome3 )	;

	}
   }
 
*/
if($tamanho1 > 0) 
{
  $query = "update cadastro set    tipo_utilizacao = '$tipo', causa_rompimento = '$causa', sub_causa = '$sub', usu_cabo = '$usou', ba_comum = '$ba_causa', prazo = '$prazo', metro_cabo = '$metro_cabo', lote_cabo =  '$lote_cabo', cod_sap = '$sap', cgr = '$cgr',
  n_prot_bo = '$prot_bo',obs_nao_abertura_bo = '$obs_bo',remanejo_fibra = '$remanejo', qtd_cx_usada =  '$qtd_cx',n_emenda_enpe = '$n_enpe',endereco_enpe = '$end_enpe',pendencia_35d = '$pend_35d',jm = '$jm', n_jm = '$n_jm', data_abert_jan = '$data_aber',prev_regula = '$prev_reg',just_fora_prazo = '$justi',ccto_cli = '$cctos', descricao = '$desc', coord_cabo = '$coord_cabo',coord_enpe = '$coord_enpe',informe_pendencia = '$pendencia',material_35d = '$mat_35d',foto = '$novo_nome',ga = '".$_SESSION['id']."',validacao = 'P' where ba = '$ba'";

}
else if($tamanho2 > 0) 
{

  $query = "update cadastro set    tipo_utilizacao = '$tipo', causa_rompimento = '$causa', sub_causa = '$sub', usu_cabo = '$usou', ba_comum = '$ba_causa', prazo = '$prazo', metro_cabo = '$metro_cabo', lote_cabo =  '$lote_cabo', cod_sap = '$sap', cgr = '$cgr',
  n_prot_bo = '$prot_bo',obs_nao_abertura_bo = '$obs_bo',remanejo_fibra = '$remanejo', qtd_cx_usada =  '$qtd_cx',n_emenda_enpe = '$n_enpe',endereco_enpe = '$end_enpe',pendencia_35d = '$pend_35d',jm = '$jm', n_jm = '$n_jm', data_abert_jan = '$data_aber',prev_regula = '$prev_reg',just_fora_prazo = '$justi',ccto_cli = '$cctos', descricao = '$desc', coord_cabo = '$coord_cabo',coord_enpe = '$coord_enpe',informe_pendencia = '$pendencia',material_35d = '$mat_35d', croqui = '$novo_nome2',ga = '".$_SESSION['id']."',validacao = 'P' where ba = '$ba'";

}

else if($tamanho1  <= 0 && $tamanho2 <= 0  ) 
{
  $query = "update cadastro set    tipo_utilizacao = '$tipo', causa_rompimento = '$causa', sub_causa = '$sub', usu_cabo = '$usou', ba_comum = '$ba_causa', prazo = '$prazo', metro_cabo = '$metro_cabo', lote_cabo =  '$lote_cabo', cod_sap = '$sap', cgr = '$cgr',
  n_prot_bo = '$prot_bo',obs_nao_abertura_bo = '$obs_bo',remanejo_fibra = '$remanejo', qtd_cx_usada =  '$qtd_cx',n_emenda_enpe = '$n_enpe',endereco_enpe = '$end_enpe',pendencia_35d = '$pend_35d',jm = '$jm', n_jm = '$n_jm', data_abert_jan = '$data_aber',prev_regula = '$prev_reg',just_fora_prazo = '$justi',ccto_cli = '$cctos', descricao = '$desc', coord_cabo = '$coord_cabo',coord_enpe = '$coord_enpe',informe_pendencia = '$pendencia',material_35d = '$mat_35d', ga = '".$_SESSION['id']."',validacao = 'P' where ba = '$ba'";

}

else
{


$query = "update cadastro set    tipo_utilizacao = '$tipo', causa_rompimento = '$causa', sub_causa = '$sub', usu_cabo = '$usou', ba_comum = '$ba_causa', prazo = '$prazo', metro_cabo = '$metro_cabo', lote_cabo =  '$lote_cabo', cod_sap = '$sap', cgr = '$cgr',
n_prot_bo = '$prot_bo',obs_nao_abertura_bo = '$obs_bo',remanejo_fibra = '$remanejo', qtd_cx_usada =  '$qtd_cx',n_emenda_enpe = '$n_enpe',endereco_enpe = '$end_enpe',pendencia_35d = '$pend_35d',jm = '$jm', n_jm = '$n_jm', data_abert_jan = '$data_aber',prev_regula = '$prev_reg',just_fora_prazo = '$justi',ccto_cli = '$cctos', descricao = '$desc', coord_cabo = '$coord_cabo',coord_enpe = '$coord_enpe',informe_pendencia = '$pendencia',material_35d = '$mat_35d', croqui = '$novo_nome2',foto = '$novo_nome',ga = '".$_SESSION['id']."',validacao = 'P' where ba = '$ba'";

}

$sql = mysql_query($query);



if($sql )
{
  
  
  echo "
  <script language='JavaScript'>
  window.alert('ENVIADA COM SUCESSO!')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
  

 ;
  

  
}
else
{
  
  echo "<script language='JavaScript'>
   window.alert('ERRO NO ENVIO!');
   </script> " ;
  
}





}


?>

























</body>


</html>