<?php
    require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        $correo = md5($usuario);

?>
 <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type='application/javascript'>
    function loadGraph() {
      var frm = document.getElementById('post_form');
      if (frm) {
       frm.submit();
      }
    }
  </script>
  </head>
  <body onload="loadGraph()">
    <form action='https://chart.googleapis.com/chart' method='POST' id='post_form'
          onsubmit="this.action = 'https://chart.googleapis.com/chart?chid=' + (new Date()).getMilliseconds(); return true;">  <input type='hidden' name='cht' value='qr' />
      <input type='hidden' name='cht' value='qr' />
      <input type='hidden' name='chs' value='300x300' />
      <input type='hidden' name='chl' value=<?php echo $correo; ?> />
      <input type='submit'  />
    </form>
  </body>
</html>
<?php
    }
?>