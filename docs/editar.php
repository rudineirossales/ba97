<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
            {
                 header("Location: index.html");
                  exit;
            }


            $ba =$_GET['ba'];

            $sql = mysql_query ("select * from cadastro where ba = '$ba'" );

            $row = mysql_num_rows($sql);


    if (mysql_num_rows($sql) > 0)

    {
         while ($dado = mysql_fetch_assoc($sql))
         {
            $backbone = $dado["backbone"];
            $mes = $dado["mes"];
            $estacao = $dado["estacao"];
            
            $indicador = $dado["indicador"];
            $abertura = $dado["abertura"];
            $acionamento = $dado["acionamento"];
            $promessa = $dado["promessa"];
            $baixa = $dado["baixa"];
            $sla = $dado["sla"];
            $tipo_utilizacao = $dado["tipo_utilizacao"];
            $causa_rompimento = $dado["causa_rompimento"];
            $sub_causa = $dado["sub_causa"];
            $usu_cabo = $dado["usu_cabo"];
            $ba_comum = $dado["ba_comum"];
            $prazo = $dado["prazo"];
            $metro_cabo = $dado["metro_cabo"];
            $lote_cabo = $dado["lote_cabo"];
            $cod_sap = $dado["cod_sap"];
            $cgr = $dado["cgr"];
            $n_prot_bo = $dado["n_prot_bo"];
            $obs_nao_abertura_bo = $dado["obs_nao_abertura_bo"];
            $remanejo_fibra = $dado["remanejo_fibra"];
            $qtd_cx_usada = $dado["qtd_cx_usada"];
            $n_emenda_enpe = $dado["n_emenda_enpe"];
            $endereco_enpe = $dado["endereco_enpe"];
            $pendencia_35d = $dado["pendencia_35d"];
            $jm = $dado["jm"];
            $n_jm = $dado["n_jm"];
            $data_abert_jan = $dado["data_abert_jan"];
            $prev_regula = $dado["prev_regula"];
            $just_fora_prazo = $dado["just_fora_prazo"];
            $ccto_cli = $dado["ccto_cli"];
            $descricao = $dado["descricao"];
            $coord_cabo = $dado["coord_cabo"];
            $coord_enpe = $dado["coord_enpe"];
            $informe_pendencia = $dado["informe_pendencia"];
            $material_35d = $dado["material_35d"];
            $material_35d = $dado["material_35d"];

            
            


            

          }
    
    }


?>



<!DOCTYPE html>
<html lang="en">
  <head>

  <link rel="icon" href="img/serede.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



<script type="text/javascript">
       
      $(document).ready(function(){
          
         $("select[name=causa]").change(function(){
            $("select[name=sub]").html('<option value="0">Carregando...</option>');
             
            $.post("causa.php",
                  {causa:$(this).val()},
                  function(valor){
                     $("select[name=sub]").html(valor);
                  }
                  )

                 
             
         })



         $("select[name=cdo]").change(function(){
            $("select[name=logradouro]").html('<option value="0">Carregando...</option>');
            $.post("cdo.php",
                  {cdo:$(this).val()},
                    function(valor){
                      $("select[name=logradouro]").html(valor);
                  }
                  )


          })


          

          




         $("select[name=cdo]").change(function(){
            $("select[name=fachada]").html('<option value="0">Carregando...</option>');
            $.post("cdo.php",
                  {cdo:$(this).val()},
                    function(valor){
                      $("select[name=fachada]").html(valor);
                  }
                  )
          })
      })
       
</script>

  
<style>
  #loading
{
  
width:70px;
height:70px;  
  
  
  
  
}
</style>


<script type="text/javascript">
function completar_campos(){
document.getElementById("loading").style.display = "block";
var con_consulta;
if (window.XMLHttpRequest){

con_consulta = new XMLHttpRequest();

}else{


con_consulta  = new ActiveXObject("Microsoft.XMLHTTP");



}

con_consulta.onreadystatechange = function(){

if(con_consulta.readyState ==  4 && con_consulta.status == 200){

document.getElementById("principal").innerHTML = con_consulta.responseText;
document.getElementById("loading").style.display = "none";

}

}

var cabo = document.getElementById("cabo").value;

con_consulta.open("GET","processar_cabo.php?cabo="+cabo,true);
con_consulta.send(null);






}
</script>

<link rel="stylesheet"  href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet"  href="/resources/demos/style.css">



<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="validacaoid.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>




    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>BA97</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Serede</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
       
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="width:38px; height:40px;" src="img/serede.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['nome'];?> </p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['area'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
            <li><a class="treeview-item" href="table-data-table.php"><i class="icon fa fa-circle-o"></i> Pendências</a></li>
            <li><a class="treeview-item" href="table-data-table.php"><i class="icon fa fa-circle-o"></i> Pesquisa</a></li>
          </ul>
        </li>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registro BA97</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method="post" enctype="multipart/form-data" action="enviar_edit.php ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ba</label>
                    <input class="form-control" id="exampleInputEmail1" readonly name="ba" id="ba" value="<?php echo $ba;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mês</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="mes" id="mes" value="<?php echo $mes;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Estação</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="estacao" id="estacao" value="<?php echo $estacao;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Indicador</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="indicador" value="<?php echo $indicador;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Abertura</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="abertura" value="<?php echo $abertura;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Promessa</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="promessa" value="<?php echo $promessa;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Acionamento</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="acionamento" value="<?php echo $acionamento;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Baixa</label>
                    <input class="form-control" readonly id="exampleInputEmail1" name="baixa" value="<?php echo $baixa;?>" type="text" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sla</label>
                    <input class="form-control" readonly value="<?php echo $sla;?>" name="sla" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" >
                  </div>
                  
                  <!--
                  <div class="form-group">
                    <label for="exampleSelect1">Nome N° cabo</label>
                   
                    <input type="text" class="form-control" id="cabo" name="cabo" onblur="completar_campos();"  required>
                    <img src="img/loading.gif" id="loading" style="display:none " />
                  </div>
                  <div id="principal" >
                  </div>  -->

                  
                  
                  
                  <div class="form-group">
                    <label for="exampleSelect1">Tipo utilização</label>
                    <select class="form-control" id="exampleSelect1" name="tipo">
                          <option value="<?php echo $tipo_utilizacao;?>" ><?php echo $tipo_utilizacao;?></option>
                          <option value="Aereo"  >Aereo</option>
                          <option value="Diretamente Enterrado"  >Diretamente Enterrado</option>
                          <option value="Canalizado"  >Canalizado</option>
                          <option value="Submarino"  >Submarino</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Causa rompimento</label>
                    <select class="form-control" id="exampleSelect1" name="causa">
                    <option value="<?php echo $causa_rompimento;?>" ><?php echo $causa_rompimento;?></option>

                          <?php

                            
                          $sql = "SELECT * FROM codigo  group by causa order by causa
                          ";
                          $qr = mysql_query($sql) or die(mysql_error());
                          while($ln = mysql_fetch_assoc($qr)) 
                          {
                              echo '<option value="'.$ln['causa'].'">'.$ln['causa'].'</option>';
                          }
                          ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Sub causa</label>
                    <select class="form-control" id="exampleSelect1" name="sub">
                    <option value="<?php echo $sub_causa;?>" ><?php echo $sub_causa;?></option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelect1">Usou cabo?</label>
                    <select class="form-control" id="exampleSelect1" name="usou">
                      <option value="<?php echo $usu_cabo;?>" ><?php echo $usu_cabo;?></option>
                      <option>SIM</option>
                      <option>NAO</option>
                      
                      
                    </select>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleTextarea">Justificativa do fora prazo</label>
                    <textarea class="form-control" maxlength="500" id="exampleTextarea" rows="3" name="justi"><?php echo $just_fora_prazo;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Cctto e cli envolvidos</label>
                    <textarea class="form-control" maxlength="500" id="exampleTextarea" rows="3" name="cctos"><?php echo $ccto_cli;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Descrição ocorrido</label>
                    <textarea class="form-control" maxlength="500" id="exampleTextarea" rows="3" name="desc"><?php echo $descricao;?></textarea>
                  </div>
                  
                  

                  <div class="form-group">
                    <label for="exampleInputFile">Croqui</label>
                    <input class="form-control-file"  id="exampleInputFile" name="croqui" type="file" aria-describedby="fileHelp"><small  class="form-text text-muted" id="fileHelp">Tamanho máximo permitido 1 MB</small>
                  </div>
               
              </div>
              <div class="col-lg-4 offset-lg-1">
                
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ba causa comum</label>
                      <input class="form-control"  value="<?php echo $ba_comum;?>" id="exampleInputEmail1" maxlength="11" type="text" name="ba_causa" aria-describedby="emailHelp" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prazo</label>
                    <input class="form-control"  value="<?php echo $prazo;?>" id="exampleInputEmail1" maxlength="45" type="text" name="prazo" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Metro cabo utilizado</label>
                    <input class="form-control"  id="exampleInputEmail1" value="<?php echo $metro_cabo;?>" maxlength="45" type="text" name="metro_cabo" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lote do cabo</label>
                    <input class="form-control"  id="exampleInputEmail1" value="<?php echo $lote_cabo;?>" maxlength="45" type="text" name="lote_cabo" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Cod sap cabo</label>
                    <select class="form-control" id="exampleSelect1" name="sap">
                    <option value="<?php echo $cod_sap;?>" ><?php echo $cod_sap;?></option>
                    <?php

                            
                              $sql = "SELECT * FROM cod_sap  group by descr order by descr
                              ";
                              $qr = mysql_query($sql) or die(mysql_error());
                               while($ln = mysql_fetch_assoc($qr))
                                {
                                  echo '<option value="'.$ln['descr'].'">'.$ln['cod'].' // '.$ln['descr'].'</option>';
                                }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempo CGR/ENC</label>
                    <input class="form-control"  maxlength="45"  value="<?php echo $cgr;?>" id="exampleInputEmail1" type="text" name="cgr" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">N° prot BO</label>
                    <input class="form-control"  maxlength="45" id="exampleInputEmail1" value="<?php echo $n_prot_bo;?>" type="text" name="prot_bo" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">OBS não abert. BO</label>
                    
                    <textarea class="form-control"  maxlength="500" id="exampleTextarea"  rows="3" name="obs_bo"><?php echo $obs_nao_abertura_bo;?></textarea>
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Remanejo de fibra de</label>
                    <input class="form-control"  maxlength="45" id="exampleInputEmail1" value="<?php echo $remanejo_fibra;?>" type="text" name="remanejo" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Qtd. caixa usada</label>
                    <input class="form-control"  maxlength="45" value="<?php echo $qtd_cx_usada;?>"   id="exampleInputEmail1" type="text" name="qtd_cx" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Número emenda ENPE</label>
                    <input class="form-control"  maxlength="45" value="<?php echo $n_emenda_enpe;?>" id="exampleInputEmail1" type="text" name="n_enpe" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço ENPE/CABO</label>
                    <input class="form-control" maxlength="45"  value="<?php echo $endereco_enpe;?>" id="exampleInputEmail1" type="text" name="end_enpe" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Coordenadas cabo</label>
                    <textarea class="form-control" maxlength="45" id="exampleTextarea" name="coord_cabo" rows="3"><?php echo $coord_cabo;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Coordenadas ENPE</label>
                    <textarea class="form-control" maxlength="45" id="exampleTextarea" name="coord_enpe" rows="3"><?php echo $coord_enpe;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Informe pendencia</label>
                    <textarea class="form-control" maxlength="500" id="exampleTextarea" name="pendencia" rows="3"><?php echo $informe_pendencia;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea">Material pendência 35d</label>
                    <textarea class="form-control" maxlength="45" id="exampleTextarea" name="mat_35d" rows="3"><?php echo $material_35d;?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleSelect1">Há pendencia 35d?</label>
                    <select class="form-control" id="exampleSelect1" name="pend_35d">
                      <option value="<?php echo $pendencia_35d;?>" ><?php echo $pendencia_35d;?></option>
                      <option>SIM</option>
                      <option>NÃO</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Necessário JM?</label>
                    <select class="form-control" id="exampleSelect1" name="jm">
                      <option value="<?php echo $jm;?>" ><?php echo $jm;?></option>
                      <option>SIM</option>
                      <option>NÃO</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Número JM</label>
                    <input class="form-control"  maxlength="45" value="<?php echo $n_jm;?>" id="exampleInputEmail1" type="text" name="n_jm" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data abertura Janela</label>
                                          <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

                              <!--Font Awesome (added because you use icons in your prepend/append)-->
                              <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

                              <!-- Inline CSS based on choices in "Settings" tab -->
                              <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

                              <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                              <div class="bootstrap-iso">

                                <div class="row">


                                  <div class="form-group ">

                                    <div class="col-sm-10">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar">
                                          </i>
                                        </div>
                                        <input class="form-control" id="data_aber" value="<?php echo $data_abert_jan;?>" name="data_aber" autocomplete="off" placeholder="DD/MM/AAAA" type="text" />
                                      </div>
                                    </div>
                                  </div>



                                </div>

                              </div>


                              <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
                              <!-- Include jQuery -->
                              

                              <!-- Include Date Range Picker -->
                              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

                              <script>
                                $(document).ready(function(){
                        var date_input=$('input[name="data_aber"]'); //our date input has the name "date"
                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                        date_input.datepicker({
                        format: 'yyyy-mm-dd',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                        })
                      })
                      </script>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prev. regularização</label>
                    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">

  <div class="row">


    <div class="form-group ">

      <div class="col-sm-10">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar">
            </i>
          </div>
          <input class="form-control" id="prev_regr" name="prev_reg" value="<?php echo $prev_regula;?>" autocomplete="off" placeholder="DD/MM/AAAA" type="text" />
        </div>
      </div>
    </div>



  </div>

</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->


<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<script>
  $(document).ready(function(){
var date_input=$('input[name="prev_reg"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'yyyy-mm-dd',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto Rompimento</label>
                    <input class="form-control-file" id="foto"  name="foto" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Tamanho máximo permitido 1 MB</small>
                  </div>
                  
                    </div>
                  </div>
                  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
  
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>


<script>
$(function() {

/*var  availableTags = [

"ajskkdp",
"iiisosoa",
"ooiismsm",
"aassdddd",
"ooedmmmd",
"iisoosoos"
];

$( "#cabo" ).autocomplete({
  source: availableTags

  });
*/

$.getJSON("listar_cabos.php", function(data){
//console.log(data);
var retorno = [];


$(data).each( function (key, value){

 // console.log(value.cabo);

 retorno.push(value.cabo);


});
$("#cabo").autocomplete({
  source: retorno ,

 

  });




  });
});






</script>