
<?php 
         include "conn.php"; 
         include "grafico_contagem_atv.php"; 
      
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body class="app sidebar-mini rtl">


  <?php    
  
  $sql = mysql_query ("select * from cadastro where validacao = 'R' and ga = '".$_SESSION['id']."'");
  
  if (mysql_num_rows($sql) > 0)
    { //
  ?>    
    <script>
    swal("Você tem atividades rejeitas. \n VERIFIQUE em \n Validação >> Rejeitadas");
    </script>
  <?php 
    }
  ?>

    
  
  
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
            <li><a class="treeview-item" href="pesq_ba.php"><i class="icon fa fa-circle-o"></i> Pesquisa por BA</a></li>
            <li><a class="treeview-item" href="table-pendencias.php"><i class="icon fa fa-circle-o"></i> Pend. 35 dias</a></li>
            <li><a class="treeview-item" href="atua.php"><i class="icon fa fa-circle-o"></i> Repasse</a></li>
            <li><a class="treeview-item" href="deleta.php"><i class="icon fa fa-circle-o"></i> Delete</a></li>
            <?php if($_SESSION['acesso'] == 'ADM'){ ?>
            <li><a class="treeview-item" href="import2.php"><i class="icon fa fa-circle-o"></i> Upload Base</a></li>
            
            <li><a class="treeview-item" href="/../ftth3/docs/dashboard.php"><i class="icon fa fa-circle-o"></i> FTTH</a></li>
            <?php }?>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Validação</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
            <li><a class="treeview-item" href="validacao.php"><i class="icon fa fa-circle-o"></i> Pendências</a></li>
            <li><a class="treeview-item" href="validacao2.php"><i class="icon fa fa-circle-o"></i> Rejeitadas</a></li>
            
            
          </ul>
        </li>
        
            
    </aside>
    <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-pie-chart"></i> Charts</h1>
          <p>Various type of charts for your project</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">charts</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Atividade Total / Cadastradas <?php echo date("Y"); ?></h3>
           
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Pendencia GAD's </h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo2"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Pendência 35D Total </h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo3"></canvas>
            </div>
          </div>
        </div>

        <?php


          $sql = mysql_query ("select nome_cabo,count(nome_cabo) as soma from cadastro where MONTH(baixa) = MONTH(NOW())  and nome_cabo <> '' group by nome_cabo order by soma desc" );

          $sql4 = mysql_query ("select nome_cabo,count(nome_cabo) as soma from cadastro where MONTH(baixa) = MONTH(NOW()) -1 and nome_cabo <> '' group by nome_cabo order by soma desc" );



          $row4 = mysql_num_rows($sql4);
          $row = mysql_num_rows($sql);


          

        ?>
        <div class="clearfix"></div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Cabos ofensores mês  <?php echo date("m"); ?> </h3>
            <table class="table table-sm">
              <thead>
                <tr>
                  
                  <th>Cabo</th>
                  <th>Total</th>
                 
                </tr>
              </thead>
              <tbody>
                  <?php  if (mysql_num_rows($sql) > 0){ while ($dado = mysql_fetch_assoc($sql)){
                  $dado2 = mysql_fetch_assoc($sql2); if ($dado ["soma"] >= 2){ ?>
                <tr>
                  
                  <td><?php echo $dado ["nome_cabo"];  ?></td>
                  <td><?php echo $dado ["soma"];  ?></td>
                  
                </tr>

                <?php }}} ?> 
               
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>


      <div class="clearfix"></div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Cabos ofensores mês  <?php echo date("m") - 1; ?> </h3>
            <table class="table table-sm">
              <thead>
                <tr>
                  
                  <th>Cabo</th>
                  <th>Total</th>
                 
                </tr>
              </thead>
              <tbody>
                  <?php  if (mysql_num_rows($sql4) > 0){ while ($dado4 = mysql_fetch_assoc($sql4)){
                  $dado2 = mysql_fetch_assoc($sql2); if ($dado4 ["soma"] >= 2){ ?>
                <tr>
                  
                  <td><?php echo $dado4 ["nome_cabo"];  ?></td>
                  <td><?php echo $dado4 ["soma"];  ?></td>
                  
                </tr>

                <?php }}} ?> 
               
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(46,139,87)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [<?php echo $jan_tot ?>, <?php echo $fev_tot ?>, <?php echo $marco_tot ?>, <?php echo $abril_tot ?>, <?php echo $maio_tot ?>,<?php echo $jun_tot ?>,<?php echo $jul_tot ?>,<?php echo $agos_tot ?>,<?php echo $sete_tot ?>,<?php echo $outu_tot ?>,<?php echo $nov_tot ?>,<?php echo $dez_tot ?>]
      		},
      		{
      			label: "teste",
      			fillColor: "rgba(210,105,30)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [<?php echo $jan_cad ?>, <?php echo $fev_cad ?>, <?php echo $marco_cad ?>, <?php echo $abril_cad ?>, <?php echo $maio_cad ?>,<?php echo $jun_cad ?>,<?php echo $jul_cad ?>,<?php echo $agos_cad ?>,<?php echo $sete_cad ?>,<?php echo $outu_cad ?>,<?php echo $nov_cad ?>,<?php echo $dez_cad ?>]
      		}
      	]
      };
      var data2 = {
        labels: ["ALDINO", "JEFERSON", "CASSIANO", "JOSE", "CLEBER", "WAGNER", "SEREDE"],
        datasets: [
          
          {
            label: "My Second dataset",
            fillColor: "rgba(46,139,87)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [ <?php echo $aldino ?>, <?php echo $jeferson ?>, <?php echo $cassiano ?>, <?php echo $jose ?>, <?php echo $cleber ?>,<?php echo $wagner ?>,<?php echo $serede ?>]
          }
        ]
      };

      var data3 = {
        labels: ["ALDINO", "JEFERSON", "CASSIANO", "JOSE", "CLEBER", "WAGNER"],
        datasets: [
          
          {
            label: "My Second dataset",
            fillColor: "rgba(46,139,87)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php echo $aldino_35d ?>, <?php echo $jeferson_35d ?>, <?php echo $cassiano_35d ?>, <?php echo $jose_35d ?>, <?php echo $cleber_35d ?>,<?php echo $wagner_35d ?>]
          }
        ]
      };

      
      var pdata = [
      	{
      		value: 300,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Red"
      	},
      	{
      		value: 50,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Green"
      	},
      	{
      		value: 100,
      		color: "#FDB45C",
      		highlight: "#FFC870",
      		label: "Yellow"
      	}
      ]
      
      
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);

      var ctxb2 = $("#barChartDemo2").get(0).getContext("2d");
      var barChart = new Chart(ctxb2).Bar(data2);

      var ctxb3 = $("#barChartDemo3").get(0).getContext("2d");
      var barChart = new Chart(ctxb3).Bar(data3);
      
     
    </script>
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
    

    
  </body>
</html>