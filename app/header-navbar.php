<?php
include 'HeadersHelper.php';

$headersHelper = new HeadersHelper();
$host = $headersHelper->getHost();

print <<< EOT
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rob Dimsdale</title>

  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="/static/css/application.css" type="text/css" />

  <link rel="icon" type="image/png" href="/static/img/favicon-196x196.png" sizes="196x196">
  <link rel="icon" type="image/png" href="/static/img/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="/static/img/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/static/img/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="/static/img/favicon-32x32.png" sizes="32x32">

</head>

<body>
<div id="wrap">
  <div id="header">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <h2><a href="/">$host</a></h2>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>
                <li><a href="/about-me/">About Me</a></li>
                <li><a href="/projects/">Projects</a></li>
                <li><a href="/resume/">Resume</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">more <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="https://garage.dimsdale.net">Garage<i class="fa fa-lock"></i></a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div>
    </nav>
  </div>
  <div class="container page">
EOT;
?>
