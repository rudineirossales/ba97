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
$back =$_POST['back']; 
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
$ocorrencia =$_POST['ocorrencia']; 









   

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

$query = "insert into cadastro (ba,mes,estacao,indicador,abertura,promessa,acionamento,baixa,sla,nome_cabo,entre_local,tipo_utilizacao,causa_rompimento,sub_causa,usu_cabo,ba_comum,prazo,metro_cabo,lote_cabo,cod_sap,cgr,n_prot_bo,obs_nao_abertura_bo,remanejo_fibra,qtd_cx_usada,n_emenda_enpe,endereco_enpe,pendencia_35d,jm,n_jm,data_abert_jan,prev_regula,just_fora_prazo,ccto_cli,descricao,coord_cabo,coord_enpe,informe_pendencia,material_35d,croqui,foto,data_cad,ga,validacao,ocorrencia,nome_ga)";

$query.= "values ('$ba','$mes','$estacao','$indicador','$abertura','$promessa','$acionamento','$baixa','$sla','$cabo','$entre_local','$tipo','$causa','$sub','$usou','$ba_causa','$prazo','$metro_cabo','$lote_cabo','$sap','$cgr','$prot_bo','$obs_bo','$remanejo','$qtd_cx','$n_enpe','$end_enpe','$pend_35d','$jm','$n_jm','$data_aber','$prev_reg','$justi','$cctos','$desc','$coord_cabo','$coord_enpe','$pendencia','$mat_35d','$novo_nome2','$novo_nome',NOW(),'".$_SESSION['id']."', 'P','$ocorrencia','".$_SESSION['nome']."')";


$query2 = "update base set cadastrado = 'S' where ba = '$ba'";


$query3 = "update base set prioridade = '97' where prioridade = '98'";















$sql = mysql_query($query);
$sql2 = mysql_query($query2);
$sql3 = mysql_query($query3);


if($sql && $sql)
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