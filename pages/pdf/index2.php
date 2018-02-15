<?php

require_once("dompdf/dompdf_config.inc.php");

if ( isset( $_POST["html"] ) ) {

  if ( get_magic_quotes_gpc() ) {
    $_POST["html"] = stripslashes($_POST["html"]); // remove unwanted characters
  }
  
  $dompdf = new DOMPDF(); // creating dompdf object
  $dompdf->load_html($_POST["html"]);// load html data from above form
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]); // set print page type
  $dompdf->render(); // generate pdf file

  $dompdf->stream("mypage.pdf", array("Attachment" => false)); // save pdf file.I named it "mypage.pdf".

  exit(0);
}

?>

<form method="post">

    <input type="hidden" name="paper" value="letter" />
    
    <input type="hidden" name="paper" value="portrait" />
    
    
    <img src="../qrcodesabraham@wred.com.mx"/>
    
    <button type="submit">Convert to PDF</button>

</form>