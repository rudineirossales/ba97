<?php 
         include "conn.php"; 
      
         session_start();

         if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
            {
                 header("Location: index.html");
                  exit;
            }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="img/serede.png"> 

    <script type="text/javascript">
function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Relatorio Caixa Fechada</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#myTable').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'Test file.xls');
        }
    } else {
        $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#test').attr('download', 'relatorio.xls');
    }

}





</script> 
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
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tabelas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
            <li><a class="treeview-item" href="table-data-table.php"><i class="icon fa fa-circle-o"></i> Pendências</a></li>
            <li><a class="treeview-item" href="pesq_per.php"><i class="icon fa fa-circle-o"></i> Pesquisa</a></li>
            <li><a class="treeview-item" href="table-pendencias.php"><i class="icon fa fa-circle-o"></i> Pend. 35 dias</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item " href="#" id="test" onClick="javascript:fnExcelReport();">  <i class="app-menu__icon fa fa-table"></i> </i><span class="app-menu__label"> Gerar Excel </span> </a> </li>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Tabela BA97</h1>
          <p>Tabela cumulativa </p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tabelas</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">

        
          <div class="tile">
          
            <div class="table-responsive">
            <form class="form-inline" role="form"   method="POST" action="pesq_per.php" style="margin-left:10%;">
    <div class="form-group">
   

    </div>
     
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;} </style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div style="float:left;" class="bootstrap-iso">
  
  <div class="row">
   <label  for="data">
      Período
      </label>
    
     <div class="form-group ">
      
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" autocomplete="off" id="date" name="date" placeholder="DE" type="text" required/>
        <input class="form-control"  autocomplete="off" id="date2" name="date2" placeholder="ATÉ" type="text" required/>
       </div>
      </div>
     </div>
    
  
   
  </div>

</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="jquery-1.11.3.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" href="bootstrap-datepicker3.css"/>
<script type="text/javascript" src="bootstrap-datepicker.min.js"></script>

<script>
 $(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
   format: 'yyyy-mm-dd',
   container: container,
   todayHighlight: true,
   autoclose: true,
  })
 })
</script>
<script>
 $(document).ready(function(){
  var date_input=$('input[name="date2"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
   format: 'yyyy-mm-dd',
   container: container,
   todayHighlight: true,
   autoclose: true,
  })
 })
</script>

    
    <button type="submit"  name="submit" id="submit" class="btn btn-default">Busca</button> <br><br><br><br>
  </form>
              <table class="table table-hover table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th>Ba</th>
                    <th>Mes</th>
                    <th>Estacao</th>
                    <th>validação</th>
                    <th>indicador</th>
                    <th>abertura</th>
                    <th>promessa</th>
                    <th>acionamento</th>
                    <th>baixa</th>
                    <th>sla</th>
                    <th>cod</th>
                    <th>cabo</th>
                    <th>entre localidade</th>
                    <th>Ma</th>
                    <th>tipo</th>
                    <th>cauda</th>
                    <th>sub causa</th>
                    <th>usu cabo</th>
                    <th>ba comum</th>
                    <th>prazo</th>
                    <th>metro cabo</th>
                    <th>lote cabo</th>
                    <th>sap</th>
                    <th>cgr</th>
                    <th>prot bo</th>
                    <th>obs nao abertura</th>
                    <th>remanejo</th>
                    <th>cx usada</th>
                    <th>emenda enpe</th>
                    <th>endereço enpe</th>
                    <th>pend 35d</th>
                    <th>jm</th>
                    <th>n° jm</th>
                    <th>data abertura</th>
                    <th>previsao regularização</th>
                    <th>just. fora prazo</th>
                    <th>ccto cliente</th>
                    <th>descrição</th>
                    <th>coord. cabo</th>
                    <th>coord. enpe</th>
                    <th>pendência</th>
                    <th>material 35d</th>
                    <th>ga</th>
                    <th>ocorrencia</th>
                    <th>PDF</th>
                    
                    
                  </tr>
                </thead>

<?php
  if (isset($_POST ['submit']) )
  {
  

$data = $_POST['date'];
$data2 = $_POST['date2'];

if ($_SESSION['acesso'] == 'ADM')
{

$sql = mysql_query ("select * from cadastro where baixa   BETWEEN '$data' and '$data2' and validacao = 'OK' order by data_cad desc" );
}
else
{
    $sql = mysql_query ("select * from cadastro where baixa BETWEEN '$data' and '$data2'  and validacao = 'OK' order by data_cad desc" );

}

    $row = mysql_num_rows($sql);

 
 

    if (mysql_num_rows($sql) > 0)
    {
      while ($dado = mysql_fetch_assoc($sql))
      
        {
     
      

?>
                <tbody>
                     



                  <tr>
                    
                    <td><?php echo $dado ["ba"];  ?></td>
                    <td><?php echo $dado ["mes"];  ?></td>
                    <td><?php echo $dado ["estacao"];  ?></td>
                    <td><?php echo $dado ["validacao"];  ?></td>
                    <td><?php echo $dado ["indicador"];  ?></td>
                    <td><?php echo $dado ["abertura"];  ?></td>
                    <td><?php echo $dado ["promessa"];  ?></td>
                    <td><?php echo $dado ["acionamento"];  ?></td>
                    <td><?php echo $dado ["baixa"];  ?></td>
                    <td><?php echo $dado ["sla"];  ?></td>
                    <td><?php echo $dado ["cod"];  ?></td>
                    <td><?php echo $dado ["nome_cabo"];  ?></td>
                    <td><?php echo $dado ["entre_local"];  ?></td>
                    <td><?php echo $dado ["ma"];  ?></td>
                    <td><?php echo $dado ["tipo_utilizacao"];  ?></td>
                    <td><?php echo $dado ["causa_rompimento"];  ?></td>
                    <td><?php echo $dado ["sub_causa"];  ?></td>
                    <td><?php echo $dado ["usu_cabo"];  ?></td>
                    <td><?php echo $dado ["ba_comum"];  ?></td>
                    <td><?php echo $dado ["prazo"];  ?></td>
                    <td><?php echo $dado ["metro_cabo"];  ?></td>
                    <td><?php echo $dado ["lote_cabo"];  ?></td>
                    <td><?php echo $dado ["cod_sap"];  ?></td>
                    <td><?php echo $dado ["cgr"];  ?></td>
                    <td><?php echo $dado ["n_prot_bo"];  ?></td>
                    <td><?php echo $dado ["obs_nao_abertura_bo"];  ?></td>
                    <td><?php echo $dado ["remanejo_fibra"];  ?></td>
                    <td><?php echo $dado ["qtd_cx_usada"];  ?></td>
                    <td><?php echo $dado ["n_emenda_enpe"];  ?></td>
                    <td><?php echo $dado ["endereco_enpe"];  ?></td>
                    <td><?php echo $dado ["pendencia_35d"];  ?></td>
                    <td><?php echo $dado ["jm"];  ?></td>
                    <td><?php echo $dado ["n_jm"];  ?></td>
                    <td><?php echo $dado ["data_abert_jan"];  ?></td>
                    <td><?php echo $dado ["prev_regula"];  ?></td>
                    <td><?php echo $dado ["just_fora_prazo"];  ?></td>
                    <td><?php echo $dado ["ccto_cli"];  ?></td>
                    <td><?php echo $dado ["descricao"];  ?></td>
                    <td><?php echo $dado ["coord_cabo"];  ?></td>
                    <td><?php echo $dado ["coord_enpe"];  ?></td>
                    <td><?php echo $dado ["informe_pendencia"];  ?></td>
                    <td><?php echo $dado ["material_35d"];  ?></td>
                    <td><?php echo $dado ["ga"];  ?></td>
                    <td><?php echo $dado ["ocorrencia"];  ?></td>
                    
                    
                    <td> <a style="color:black;" href="pdf.php?ba=<?php echo $dado["ba"];?>" target="_blank"  role="button" aria-pressed="true"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>


                    
                    
                  </tr>
      <?php 
                      
      } 
         
    } }?>
                </tbody>
              </table>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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