<?php
  ob_start();


 

?>

<style>
   
    .header{
        color: aquamarine;
     padding-right: 500px;
    }
     .default{
        color: white;
     
    }
</style>


<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
   
     
    <table style="width:100%" >
        <tr>
            <td rowspan="3"  >  <img src="images/unnamed.jpg"   ></td>
            <td></td><td></td>
                 
            <td>  <p > FYLSA CONTROL Y AUTOMATIZACION</p></td>
        </tr>
        <tr>
            
                 <td></td>
                 <td></td>
           <td>  <p >FRANCISCO JULIAN BOLAÑOS</p></td>
            
        </tr>
            <tr>
               <td><p class="default">qwertyuiopqwertyuiop</p></td> 
               <td><p class="default">qwertyuiopqwertyuiop</p></td> 
           <td>  <p >RFC:JUBF650904AY1</p></td>
            
        </tr>
        
        
    </table>
    <hr widh="80%">
    <b style="padding-right:100px">01/01/01</b>
   
    <p><?php echo $_POST["factura"]; ?></p> 
    <br>
    <b><?php echo $_POST["cliente"]; ?></b> 
    <br>
      <b><?php echo $_POST["dirigido"]; ?></b> 
    <br>
    <h1 align="center"><?php echo $_POST["descripcion"]; ?></h1>    
    <br>
    <table border=".1" cellpadding="2" cellspacing="1" style="border-spacing: 2px;" >
        <tr>
            <th>Partida</th>
            <th><?php echo $_POST["thdescripcion"]; ?> </th>
            <th><?php echo $_POST["thsum"]; ?> </th>
            <th><?php echo $_POST["thcantidad"]; ?> </th>
            <th>U/M</th>
            <th><?php echo $_POST["thpreciov"]; ?> </th>
        </tr>
       <?php
        $i;
      for ($x =1; $x <= $_POST["length"]; $x++) {
        ?>
            <tr>
                <td style="width:60px"><?php echo $x?></td>
                  <td style="width:200px;"><?php echo  $_POST["tabladescripcion".$x]?></td>
                  <td style="width:150px"><?php echo  $_POST["tablasum".$x]?></td>
                  <td style="width:50px"><?php echo  $_POST["tablacantidad".$x]?></td>
                    <td style="width:50px">Pza</td>
                  <td style="width:50px"><?php echo  $_POST["tablaprecio".$x]?></td>
                
            
            </tr>
            <?php   
        }

     ?>
    </table>
   <br>
    
    <h3 align="center">COSTO DEL PROYECTO: <?php echo $_POST["totalt"]; ?> MXN</h3>
    <br>
    <b style="font-size:20px">LOS PRECIOS SON EN PESOS Y ES MAS 16% DE IVA </b>
    <br>
    <b style="font-size:20px">TIEMPO DE ENTREGA: <?php echo $_POST["tiempo"]; ?></b>
    <br>
    <b style="font-size:20px">CONDICIONES DE PAGO: <?php echo $_POST["condiciones"]; ?></b>
    <br>
    <p style="font-size:20px">CABE ACLARAR QUE ESTA COTIZACION SOLO TIENE VIGENCIA DE 20 DIAS SALUDOS CORDIALES,
        PARA CUALQUIER DUDA O ACLARACION, QUEDO DE USTED. </p>
    <br>
    <h4 align="center">Atentamente</h4>
     <h4 align="center">___________</h4>
    <br>
     <h4 align="center">DIANA RUIZ</h4>
       
           
       



  
  
    <page_footer>
         <hr widh="80%">
        <table style="width:100%" >
            <tr>
                <td><p>IZCALLI CUAHTEMOC V HIGO 38-B</p></td>
                <td><p class="default">IZCALLI CUAH</p></td>
                
                <td><p> METEPEC EDO.DE MEXICO</p></td>
                <td><p>CP:52176</p></td>
            </tr>
              <tr>
                <td><p>TEL:01(722)2-16-62-04</p></td>
                    <td><p class="default">IZCALLI CUAH</p></td>
                <td><p>E-MAIL:fylsaservicios@gmail.com</p></td>
            </tr>
        </table>
      
    </page_footer>
</page>

<?php

  $content = ob_get_clean();
   require_once(dirname(__FILE__).'/vendor/autoload.php');
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;

  try
  {
      $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
      $html2pdf->pdf->SetDisplayMode('fullpage');
      $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
      $html2pdf->Output('PDF-CF.pdf');
  }
  catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
  }