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
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Tabela BA97</h1>
          <p>Tabela cumulativa </p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" >
                <thead>
                  <tr>
                    <th>Ba</th>
                    <th>Backbone</th>
                    <th>Cos</th>
                    <th>Mes</th>
                    <th>Estação</th>
                    <th>MntFO</th>
                    <th>Indicador</th>
                    <th>Abertura</th>
                    <th>Promessa</th>
                    <th>Acionamento</th>
                    <th>Baixa</th>
                    <th>Sla</th>
                    <th>Cod</th>
                  </tr>
                </thead>

<?php


$data = $_POST['date'];
$data2 = $_POST['date2'];

      if ($_SESSION['acesso'] == 'ADM')
      {

        $sql = mysql_query ("select * from base where cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'   order by  cos" );


      }
      else
      {

        if($_SESSION['id'] == '287474') //jose
        {
          $sql = mysql_query ("select * from base where nome_tec = 'FERNANDO DE ASSIS FARIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'FERNANDO DE ASSIS FARIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'



          or nome_tec = 'DIOGO LOPES ROZENO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DIOGO LOPES ROZENO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'IVAN EMMERICH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'IVAN EMMERICH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'VALDINEI JOSE GONCALVES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VALDINEI JOSE GONCALVES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'EDIMIDIO LUCIANO DE NAZARE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EDIMIDIO LUCIANO DE NAZARE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'VINICIUS DA SILVA GRASSI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VINICIUS DA SILVA GRASSI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          
          or nome_tec = 'MATHEUS FELIPE PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MATHEUS FELIPE PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'FERNANDO DE MORAES LOPES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'FERNANDO DE MORAES LOPES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'ALEF BURKOWSKI DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALEF BURKOWSKI DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'MARCELO RODRIGUES DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MARCELO RODRIGUES DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'SANDRO ALVES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'SANDRO ALVES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'CRISTIANO DA SILVA PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CRISTIANO DA SILVA PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'MARCOS ALVES CARDOSO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MARCOS ALVES CARDOSO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'REINALDO FATORI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'REINALDO FATORI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ROGERIO GONCALVES RODRIGUES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ROGERIO GONCALVES RODRIGUES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'EZEQUIEL BERNARDO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EZEQUIEL BERNARDO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'DENNER BARBOSA DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DENNER BARBOSA DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'WILLIAN LUIZ FERREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WILLIAN LUIZ FERREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'CLAUDEMIR DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CLAUDEMIR DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'LEANDRO NEVES DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'LEANDRO NEVES DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JEFFERSON HENRIQUE DO CARMO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JEFFERSON HENRIQUE DO CARMO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or nome_tec = 'JOSE MARCELO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSE MARCELO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");

        }

        if($_SESSION['id'] == '380636') //wagner
        {
         
          $sql = mysql_query ("select * from base where nome_tec = 'ADAIR PADILHA GONCALVES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ADAIR PADILHA GONCALVES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'




          or nome_tec = 'DORIGON RAMALHO CORREIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DORIGON RAMALHO CORREIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'MAURINEY RIBEIRO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MAURINEY RIBEIRO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ALTIMIRO BECKER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALTIMIRO BECKER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JOSE PELEK' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSE PELEK' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'WILLIAN IAREK DE ANDRADE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WILLIAN IAREK DE ANDRADE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JACSON JOSE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JACSON JOSE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'REGINALDO POPENDA DIGNER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'REGINALDO POPENDA DIGNER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ADILSON SANTANA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ADILSON SANTANA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'EMANUEL MENDES MACHADO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EMANUEL MENDES MACHADO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'HELIEZER DE PAULA NUNES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'HELIEZER DE PAULA NUNES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'RICARDO CESAR WALUS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RICARDO CESAR WALUS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'ANTONIO ERICKSON DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ANTONIO ERICKSON DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'WELLINGTON FERREIRA CHAGAS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WELLINGTON FERREIRA CHAGAS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'WILSON JOSE MARTINS DE PAULA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WILSON JOSE MARTINS DE PAULA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JONATAS GLOEDEN SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JONATAS GLOEDEN SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or nome_tec = 'LUIZ CLAUDIO PACHECO DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'LUIZ CLAUDIO PACHECO DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");

        }

        if($_SESSION['id'] == '383304') //aldino
        {
         
          $sql = mysql_query ("select * from base where nome_tec = 'MARCOS VINICIUS VEIGA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MARCOS VINICIUS VEIGA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
          or 
          
          nome_tec = 'CHAILEM PIRES GOMEZ DA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CHAILEM PIRES GOMEZ DA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
          
          
          or
          
          nome_tec = 'ROMOALDO VITOR BRUNETTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ROMOALDO VITOR BRUNETTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or
          
          nome_tec = 'VERINO GLIENKE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VERINO GLIENKE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'JULIO CESAR MAIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JULIO CESAR MAIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'JEFERSON RICARDO CARNEIRO DA LUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JEFERSON RICARDO CARNEIRO DA LUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'IVO MENDES SEGURO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'IVO MENDES SEGURO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
           nome_tec = 'TIAGO TORRES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'TIAGO TORRES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'UBIRAJARA SALES AVILA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'UBIRAJARA SALES AVILA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'MARIO JOSE HERMAN' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MARIO JOSE HERMAN' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          
          nome_tec = 'JOSE EDUILIO TABORDA MIRANDA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSE EDUILIO TABORDA MIRANDA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'ANTONIO MARCOS STUNPF' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ANTONIO MARCOS STUNPF' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'ELI CORREIA DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ELI CORREIA DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'VILMAR DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VILMAR DE LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'CLAUDIO SAUTER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CLAUDIO SAUTER' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'VALDINEI NARCISO DE NOVAIS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VALDINEI NARCISO DE NOVAIS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'JUNIOR CARNEIRO DA LUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JUNIOR CARNEIRO DA LUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'CARLOS ALBERTO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CARLOS ALBERTO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'DIEGO CESAR VAIS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DIEGO CESAR VAIS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'RODRIGO SIMON DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RODRIGO SIMON DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'ALESSANDRO RODRIGUES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALESSANDRO RODRIGUES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'GUSTAVO VITOR DE BONE RIVIERI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GUSTAVO VITOR DE BONE RIVIERI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'ELIAS JOAO DE SOUZA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ELIAS JOAO DE SOUZA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or
          
          nome_tec = 'IDENEUSO FELIX DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'IDENEUSO FELIX DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or
          
          nome_tec = 'RODRIGO HENRIQUE VITORIA LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RODRIGO HENRIQUE VITORIA LIMA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          or
          
          nome_tec = 'JOSIAS LEMES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSIAS LEMES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");


        }

        if($_SESSION['id'] == '389739') //cassiano
        {
         
          $sql = mysql_query ("select * from base where nome_tec = 'ELI LEME DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ELI LEME DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'




          or nome_tec = 'JHONATAN HENRIQUE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JHONATAN HENRIQUE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'KAIQUE JUVENIR MARCONDES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'KAIQUE JUVENIR MARCONDES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ALISSON FELIPE FARIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALISSON FELIPE FARIA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'ADILSON GOMES DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ADILSON GOMES DE OLIVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'FABIO CORDEIRO ROSA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'FABIO CORDEIRO ROSA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'GUSTAVO DE OLIVEIRA ROMAO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GUSTAVO DE OLIVEIRA ROMAO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'RODNEY JESUS PEREIRA DE ALMEIDA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RODNEY JESUS PEREIRA DE ALMEIDA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'FERNANDO HENRIQUE DE MEDEIROS SALES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'FERNANDO HENRIQUE DE MEDEIROS SALES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'WILIAM GERSON FERREIRA DE ANDRADE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WILIAM GERSON FERREIRA DE ANDRADE' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'EVERTON AUGUSTO PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EVERTON AUGUSTO PEREIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'VALDICLEI DE LIMA PIOLA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VALDICLEI DE LIMA PIOLA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'VICTOR HENRIQUE SALES SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VICTOR HENRIQUE SALES SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JEAN RAFAEL DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JEAN RAFAEL DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ADRIANO DOS SANTOS BATISTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ADRIANO DOS SANTOS BATISTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          or nome_tec = 'RONALDO DANIEL DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RONALDO DANIEL DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");

        }


        if($_SESSION['id'] == '391581') //felipe
        {
         
          $sql = mysql_query ("select * from base where nome_tec = 'ADILSON SIQUEIRA GOMES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ADILSON SIQUEIRA GOMES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
 

          or nome_tec = 'WELLINTON MARCELO ROBERTO TONKONOH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'WELLINTON MARCELO ROBERTO TONKONOH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
          
          
          
          or nome_tec = 'CLEVERSON DE JESUS PRENSAK' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CLEVERSON DE JESUS PRENSAK' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'SAOLO FRANCO ASSUNCAO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'SAOLO FRANCO ASSUNCAO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'LUIZ CARLOS RADUNZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'LUIZ CARLOS RADUNZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'IRINEU DE LUCA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'IRINEU DE LUCA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'BRYAN IVES FERREIRA MALVERDEL' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'BRYAN IVES FERREIRA MALVERDEL' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'PAULO ROBERTO DA ROCHA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'PAULO ROBERTO DA ROCHA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'ALISSON BIBIANO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALISSON BIBIANO DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JORGE LUIZ DE OLIVEIRA CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JORGE LUIZ DE OLIVEIRA CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          
          or nome_tec = 'JORGE LUIZ DE OLIVEIRA CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JORGE LUIZ DE OLIVEIRA CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'IGOR SAMUEL KLOSS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'IGOR SAMUEL KLOSS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'ALEXANDRE MARTINS DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALEXANDRE MARTINS DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'SILVIO CESAR DOMINGOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'SILVIO CESAR DOMINGOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'GISALDO ANGELO MONTEIRO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GISALDO ANGELO MONTEIRO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'VITOR HUGO XAVIER DA ROSA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'VITOR HUGO XAVIER DA ROSA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'REGIS CRISTOFFER CUBAS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'REGIS CRISTOFFER CUBAS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'AGUINALDO DE LIMA DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'AGUINALDO DE LIMA DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ELIAS COELHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ELIAS COELHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JOSE LEANDRO PINTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSE LEANDRO PINTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ALESSANDRO NICODEMOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ALESSANDRO NICODEMOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JOSEMIR ANTONIO LOPES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOSEMIR ANTONIO LOPES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");
        }

          if  ($_SESSION['id'] == '391610') //paulo
        {
         
          $sql = mysql_query ("select * from base where nome_tec = 'EDERALDO DELFINO DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EDERALDO DELFINO DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'



          or nome_tec = 'GILSON NATAL LEMES JUNIOR' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GILSON NATAL LEMES JUNIOR' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'SIDNEI CUNHA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'SIDNEI CUNHA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'MAICON DA SILVA PINTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MAICON DA SILVA PINTO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'LUCAS TROTCH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'LUCAS TROTCH' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'NEEMIAS CUNHA DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'NEEMIAS CUNHA DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          
          or nome_tec = 'JOAO CLEITON MACEDO SALES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOAO CLEITON MACEDO SALES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'RODRIGO DE ASSIS MACCAN' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RODRIGO DE ASSIS MACCAN' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'RONALDO MENDES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RONALDO MENDES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'RAFAEL LUGATO VERNASQUI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'RAFAEL LUGATO VERNASQUI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'CRISTIANO CHAVES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CRISTIANO CHAVES DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'EDUARDO APARECIDO SOARES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'EDUARDO APARECIDO SOARES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JULIO RODRIGUES NETO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JULIO RODRIGUES NETO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'DOLAVAN ALAN DIOGO OLIVEIRA TORRES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DOLAVAN ALAN DIOGO OLIVEIRA TORRES' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'GUSTAVO CEZAR DO PRADO FESTI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GUSTAVO CEZAR DO PRADO FESTI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'MARCELO HENRIQUE MACEDO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MARCELO HENRIQUE MACEDO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'CLODOALDO MUNIZ FONSECA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CLODOALDO MUNIZ FONSECA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'ROGERIO DA COSTA GOMES DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ROGERIO DA COSTA GOMES DE CARVALHO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'DIENIFFER FERNANDO LINDOLFO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DIENIFFER FERNANDO LINDOLFO' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JOAO LUIS FELIPE DA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JOAO LUIS FELIPE DA COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'JULIO CESAR ALBUQUERQUE DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JULIO CESAR ALBUQUERQUE DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'MATHEUS LOPES DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'MATHEUS LOPES DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          or nome_tec = 'CESAR CAMILO DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'CESAR CAMILO DOS SANTOS' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");
          

      
    

        }

        if($_SESSION['id'] == '390630') //jeferson
        {
           

          $sql = mysql_query ("select * from base where nome_tec = 'DIOGO CARDOSO DA CRUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DIOGO CARDOSO DA CRUZ' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
 

          or nome_tec = 'ROGGER EDUARD MAGANHOTTI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'ROGGER EDUARD MAGANHOTTI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO' 
          
          
          
          or nome_tec = 'GUSTAVO DEMARI SILVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'GUSTAVO DEMARI SILVEIRA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'TIAGO SCHUSTER JANIACKI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'TIAGO SCHUSTER JANIACKI' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'JEFFERSON ANDRE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'JEFFERSON ANDRE DA SILVA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          or nome_tec = 'DOUGLAS ALVES EVANGELISTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'DOUGLAS ALVES EVANGELISTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'
          
          
          
          
          or nome_tec = 'LUIZ EDUARDO PINTO COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '97' and cos = 'PREFO' or nome_tec = 'LUIZ EDUARDO PINTO COSTA' and cadastrado = 'N' and indicador = 'S' and expurgo = 'N' and  prioridade = '98' and cos = 'PREFO'");


        }
      }
    
    $row = mysql_num_rows($sql);

 
 

    if (mysql_num_rows($sql) > 0)
    {
      while ($dado = mysql_fetch_assoc($sql))
      
        {
     
      

?>
                <tbody>
                     



                  <tr>
                    <td><a href='cadastro.php?ba=<?php echo $dado ["ba"] ?>' ><?php echo $dado ["ba"];  ?></a></td>
                    <td><?php echo $dado ["backbone"];  ?></td>
                    <td><?php echo $dado ["cos"];  ?></td>
                    <td><?php echo $dado ["mes"];  ?></td>
                    <td><?php echo $dado ["estacao"];  ?></td>
                    <td><?php echo $dado ["mntfo"];  ?></td>
                    <td><?php echo $dado ["indicador"];  ?></td>
                    <td><?php echo $dado ["abertura"];  ?></td>
                    <td><?php echo $dado ["promessa"];  ?></td>
                    <td><?php echo $dado ["acionamento"];  ?></td>
                    <td><?php echo $dado ["baixa"];  ?></td>
                    <td><?php echo $dado ["sla"];  ?></td>
                    <td><?php echo $dado ["cod"];  ?></td>
                  </tr>
      <?php 
                      
      } 
         
    }   ?>
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