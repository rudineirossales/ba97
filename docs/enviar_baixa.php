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

$justi =$_POST['justi']; 
$mat_35d =$_POST['mat_35d']; 
$jm =$_POST['jm']; 
$n_jm =$_POST['n_jm']; 









/*
   

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
  
  
 
*/

$query = "update  cadastro set pendencia_35d = 'NAO',jm = '$jm',material_35d = '$mat_35d',n_jm = '$n_jm',just_fora_prazo = '$justi' where ba = '$ba'";
 
















$sql = mysql_query($query);



if($sql)
{
  
  
  echo "
  <script language='JavaScript'>
  window.alert('BAIXA EFETUADA SUCESSO!')
  
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








?>

























</body>


</html>