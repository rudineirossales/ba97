<?php

include 'mpdf/mpdf.php';


 include "conn.php";


 $ba =$_GET['ba'];
  

$select = mysql_query ("SELECT * FROM cadastro  
							WHERE ba ='$ba'
			");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	
	$row = mysql_num_rows($select);
  
  $html2 .= "<img src='img/logo_serede.png' alt='' width='80' height='80'  > <br><br>
  <H3>Relatorio BA97 - BA - $linha[ba]</H3> 
  	";
  do  
  {
    $html .= "
    
<span>MÊS:  $linha[mes]   </span><br>
<span>ESTAÇÃO:  $linha[estacao]   </span><br>
<span>MNTFO:  $linha[mntfo]   </span><br>
<span>INDICADOR:  $linha[indicador]   </span><br>
<span>ABERTURA:  $linha[abertura]   </span><br>
<span>PROMESSA:  $linha[promessa]   </span><br>
<span>ACIONAMENTO:  $linha[acionamento]   </span><br>
<span>SLA:  $linha[sla]   </span><br>
<span>CÓDIGO:  $linha[cod]   </span><br>
<span>NOME DO CABO:  $linha[nome_cabo]   </span><br>
<span>ENTRE LOCALIDADES:  $linha[entre_local]   </span><br>
<span>MA:  $linha[ma]   </span><br>
<span>TIPO DE UTILIZAÇÃO:  $linha[tipo_utilizacao]   </span><br>
<span>CAUSA:  $linha[causa_rompimento]   </span><br>
<span>SUBCAUSA:  $linha[sub_causa]   </span><br>
<span>BA COMUM:  $linha[ba_comum]   </span><br>
<span>PRAZO:  $linha[prazo]   </span><br>
<span>METRO CABO:  $linha[metro_cabo]   </span><br>
<span>LOTE DO CABO:  $linha[lote_cabo]   </span><br>
<span>CÓDIGO SAP:  $linha[cod_sap]   </span><br>
<span>CGR:  $linha[cgr]   </span><br>
<span>N° prot BO:  $linha[n_prot_bo]   </span><br>
<span>REMANEJO FIBRA:  $linha[remanejo_fibra]   </span><br>
<span>QUANTIDADE DE CX:  $linha[qtd_cx_usada]   </span><br>
<span>N° EMENDA ENPE:  $linha[n_emenda_enpe]   </span><br>
<span>ENDEREÇO ENPE:  $linha[endereco_enpe]   </span><br>
<span>PENDÊNCIA 35 DIAS:  $linha[pendencia_35d]   </span><br>
<span>JM:  $linha[jm]   </span><br>
<span>NÚMERO JM:  $linha[n_jm]   </span><br>
<span>ABERTURA JANELA:  $linha[data_abert_jan]   </span><br>
<span>PREVISÃO REGULARIZAÇÃO:  $linha[prev_regula]   </span><br>
<span>COORDENADAS CABO:  $linha[coord_cabo]   </span><br>
<span>COORDENADAS ENPE:  $linha[coord_enpe]   </span><br>
<span>MATERIAL 35 DIAS:  $linha[material_35d]   </span><br>
<span>DATA DO CADASTRO:  $linha[data_cad]   </span><br>
<span>GA:  $linha[ga]   </span><br><br><br><br><br><br><br><br><br>





<span>JUSTIFICATIVA FORA DO PRAZO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[just_fora_prazo]  </span></fieldset><br><br>
<span>CIRCUITOS E CLIENTES ENVOLVIDOS: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[ccto_cli]   </span></fieldset><br><br>
<span>DESCRIÇÃO: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[descricao]   </span></fieldset><br><br>
<span>INFORMAÇÃO DA PENDÊNCIA: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[informe_pendencia]   </span></fieldset><br><br>
<span>INFORMAÇÃO DA PENDÊNCIA: <br> <fieldset style='border: 1px solid; padding: 12px;'>$linha[informe_pendencia]   </span></fieldset><br><br>



    
    <table border=1 >
    
    <tr>
    
    
    </tr>
    <tr>
     
      
    </tr>	
    <tr>
    <td> <img src='arquivo/$linha[foto]' width='300' height='300'><br>FOTO</td>
    <td> <img src='arquivo/$linha[croqui]' width='300' height='300'><br> CROQUI </td>
    
    </tr>
    
    
   
   
</table>";
  } while ($linha = mysql_fetch_array($select));

	
//==============================================================
//==============================================================
//==============================================================

include("../mpdf/mpdf.php");

$mpdf=new mPDF(); 
$css = file_get_contents("../css/styleRelatotio.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html2.$html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>