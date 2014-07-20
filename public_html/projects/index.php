<?php require('../header-navbar.php'); ?>

<div class="row">
  <div class="col-md-12">
    <h1>Projects</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <h3>Garage-Pi</h3>
    <p>A webserver written in golang to display the output of a Raspberry Pi camera module and trigger gpio.</p>
    <p>A typical use would be to display the interior of a garage and trigger the garage door via gpio.</p>
    <a href="https://github.com/robdimsdale/garage-pi/">View the GitHub project</a>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <h3>Rentchecker</h3>
    <p>Java command-line and android app to check rent owed at <a href="http://myequityapartments.com">myequityapartments.com</a></p>
    <p>Built with Spring Web MVC and Spring for Android, and uses Gradle as the build tool.</p>
    <p>It behaves like a browser, interacting with the website the same way a human would. Therefore it is likely to break if/when the website changes. It is only useful to those with accounts with Equity Apartments, as a valid log-in is required.</p>
    <a href="https://github.com/robdimsdale/rentchecker/">View the GitHub project</a>
  </div>
</div>

<br/>

<?php require('../footer.php'); ?>
