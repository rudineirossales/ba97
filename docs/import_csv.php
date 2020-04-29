<?php

 $state_csv = false;

 class csv extends mysqli
 {

 function __construct()
 {

    parent::__construct("localhost","root","","ba97");
    if($this->connect_error)
    {

          echo "Conexão falhou". $this->connect_error;

    }


 }
function import($file)
{
   $contador = 0;
   $contador2 = 0;
   $file = fopen($file, 'r');
   echo "<pre> <strong>LOGS:</strong><br></pre>";  
   while ($row = fgetcsv($file))
   {
      
      $value = "'". implode("';'", $row). "'";

      
      
      $value2 = preg_replace("';'","','", $value);


      $value2 =  utf8_decode($value2);

      





      
      
      $q = "insert into base (uf,localidade,estacao,central,ba,area_tec,cos,cos_origem,cod_fabricante,prioridade,cod_ocorrencia,cod_ocorrencia_ac,abertura,ini_anormalidade,acionamento,ence_acio,micro_area,numero_ac,nome_tec,mat_tec,natureza_atv,ramificacao,fonte_info,assinantes,promessa,baixa,doc_associado,cod,desc_alarme,cod_ence,desc_reclamacao,mntfo,cod_info,info_complementar,cod_atv,nome_contato,tel_contato,numero_tel,n_tres,ultimo_aciona,backbone,sla,sla_2016,primeiro_fo,psr,encerrado_fo,tecnica_cos,regiao,proximo_aciona,prazo_psr,prazo_psr_2016,tempo_fibra,indicador,tec_ence,possivel_desvio,expurgo,prazo_35d,tempo_fibra_seg,mes,flag,ftth,cadastrado) values(". $value2 .")";
      if ( $this->query($q) ) 
      {

              $this->state_csv = true;


      } 

      else
      {

                $this->state_csv = false;

      }
             
    if ( $this->state_csv)
    {

           echo "<pre style='color:green;'>$value OK<br></pre>";
           $contador = $contador + 1; 

    }

    else
    {

      echo "<pre style='color:red;'>$value ERRO<br></pre>";
      $contador2 = $contador2 + 1; 

    }

   }
   echo "<pre> Upload de $contador arquivos<br></pre>";
   echo "<pre> Arquivos duplicados $contador2 <br></pre>";
}
}

?> 