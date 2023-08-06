<?php

//------------------------------------------------------------------------------
//  Pi.Alert
//  Open Source Network Guard / WIFI & LAN intrusion detector 
//
//  report.php - Front module. Server side. Manage Devices
//------------------------------------------------------------------------------
//  Puche      2021        pi.alert.application@gmail.com   GNU GPLv3
//  jokob-sk   2022        jokob.sk@gmail.com               GNU GPLv3
//  leiweibau  2022        https://github.com/leiweibau     GNU GPLv3
//  cvc90      2023        https://github.com/cvc90         GNU GPLv3
//------------------------------------------------------------------------------

  error_reporting(0);// Turn off php errors
  require 'php/templates/header.php';
  
?>
<!-- Page ------------------------------------------------------------------ -->
<div class="content-wrapper">

<!-- Content header--------------------------------------------------------- -->
    <section class="content-header">
    <?php require 'php/templates/notification.php'; ?>
      <h1 id="pageTitle">
       <?= lang('REPORT_TITLE') ;?>
      </h1>
    </section>

    <!-- Main content ---------------------------------------------------------- -->
    <section class="content">	

<?php
// Check if the page exists
if (file_exists("log/report_output.html")) {
    // Load the page
    include("log/report_output.html");
} else {
    // Display an error message
    echo "<h1>Error</h1>";
    echo "<p>The page you are looking for is temporarily unavailable, please try again after a few seconds</p>";
}
?>

</div>
</section>

    <!-- /.content -->
    <?php
      require 'php/templates/footer.php';
    ?>
  </div>
  <!-- /.content-wrapper -->

<!-- ----------------------------------------------------------------------- -->
