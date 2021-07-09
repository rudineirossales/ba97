<?php 
include "conn.php"; 


$sql = mysql_query ("select * from localidades where ga = 'ALDINO' " );


$row = mysql_num_rows($sql);


if (mysql_num_rows($sql) > 0)

{
  while ($dado = mysql_fetch_assoc($sql))
  {
     $local = $dado['id'];

    $query1 = mysql_query ("update base set ga = 'ALDINO' where localidade = '$local' and ga <> 'ALDINO' " );
    $sql1 = mysql_query($query1);

    // and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO'


  }

}



$sql2 = mysql_query ("select * from localidades where ga = 'CASSIANO' " );


$row2 = mysql_num_rows($sql2);


if (mysql_num_rows($sql2) > 0)

{
  while ($dado = mysql_fetch_assoc($sql2))
  {
     $local = $dado['id'];

    $query1 = mysql_query ("update base set ga = 'CASSIANO' where localidade = '$local' and ga <> 'CASSIANO'" );
    $sql1 = mysql_query($query1);




  }

}


$sql3 = mysql_query ("select * from localidades where ga = 'JOSE' " );


$row3 = mysql_num_rows($sql3);


if (mysql_num_rows($sql3) > 0)

{
  while ($dado = mysql_fetch_assoc($sql3))
  {
     $local = $dado['id'];

    $query1 = mysql_query ("update base set ga = 'JOSE' where localidade = '$local' and ga <> 'JOSE'" );
    $sql1 = mysql_query($query1);




  }

}


$sql4 = mysql_query ("select * from localidades where ga = 'WAGNER' " );


$row4 = mysql_num_rows($sql4);


if (mysql_num_rows($sql4) > 0)

{
  while ($dado = mysql_fetch_assoc($sql4))
  {
     $local = $dado['id'];

    $query1 = mysql_query ("update base set ga = 'WAGNER' where localidade = '$local' and ga <> 'WAGNER'" );
    $sql1 = mysql_query($query1);




  }

}


$sql5 = mysql_query ("select * from localidades where ga = 'MARCOS' " );


$row5 = mysql_num_rows($sql5);


if (mysql_num_rows($sql5) > 0)

{
  while ($dado = mysql_fetch_assoc($sql5))
  {
     $local = $dado['id'];

    $query1 = mysql_query ("update base set ga = 'MARCOS' where localidade = '$local' and ga <> 'MARCOS'" );
    $sql1 = mysql_query($query1);




  }

}

?>