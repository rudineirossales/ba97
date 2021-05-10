<?php
include "conn.php"; 



$sql = mysql_query ("select * from base where cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' " );

$row = mysql_num_rows($sql);

if (mysql_num_rows($sql) > 0)
   {
      while ($dado = mysql_fetch_assoc($sql)) 
      
        {
         

         $ba = $dado["ba"];

         $sql2 = mysql_query ("select * from expurgo where ba = '$ba' and expurgo = 'S'" );
         $row2 = mysql_num_rows($sql2);
               if (mysql_num_rows($sql2) > 0)
               {
                  while ($dado = mysql_fetch_assoc($sql2))

                  {
                     $sql = mysql_query ("delete from base where ba = '$ba'" );
                     $sql3 = mysql_query ("delete from cadastro where ba = '$ba'" );
                  }

               }

        }

        $sql = mysql_query ("delete from expurgo" );
   }  
 
?> 