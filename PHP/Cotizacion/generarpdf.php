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
   
     
    <table  cellpadding="2" cellspacing="2" >
        <tr>
            <td rowspan="3"  >  <img style="width:80px" src="../../images/unnamed.jpg"   ></td>
            <td></td><td></td>
                 
            <td style="height:10px">  <p style="font-size:10px"> FYLSA CONTROL Y AUTOMATIZACION</p></td>
        </tr>
        <tr>
            
                 <td></td>
                 <td></td>
           <td style="height:10px" >  <p style="font-size:10px" >FRANCISCO JULIAN BOLAÑOS</p></td>
            
        </tr>
            <tr>
               <td><p class="default">qwertyuiopqwertyuiop</p></td> 
               <td><p class="default">qwertyuiopqwertyuiop</p></td> 
           <td style="height:10px">  <p style="font-size:10px">RFC:JUBF650904AY1</p></td>
            
        </tr>
        
        
    </table>
    <hr widh="80%">
    <?php
echo date("d/m/Y") . "<br>";

?>
   
    <p><?php echo "Cotización: ".$_POST["factura"]; ?></p> 
    <b><?php echo $_POST["cliente"]; ?></b> 
    <br>
      <b><?php echo $_POST["dirigido"]; ?></b> 
    <br>
    <p  style="font-size: 12px;">ESTIMADO(S)  INGENIERO(S): <br>EN ATENCION A SU AMABLE SOLICITUD ME PERMITO ENTREGAR A USTED LA SIGUIENTE COTIZACION</p>
    <h4 align="center"  style="font-size: 12px;"><?php echo $_POST["descripcion"]; ?></h4>    
    <br>
    <table border=".1"    cellpadding="2" cellspacing="2" style="border-spacing: 2px 2px;" >
        <tr>
            <th style=" text-align: center;font-size: 12px;">PARTIDA</th>
            <th style=" text-align: center; font-size: 12px;"><?php echo strtoupper($_POST["thdescripcion"]); ?> </th>
           <!-- <th><?php echo $_POST["thsum"]; ?> </th>-->
             <th style=" text-align: center;font-size: 12px;">U/M</th>
            <th style=" text-align: center;font-size: 12px;"><?php echo strtoupper($_POST["thcantidad"]); ?> </th>
            <th  style="width:100px; text-align: center;font-size: 12px;">PRECIO UNITARIO</th>
            <th style=" text-align: center;font-size: 12px;">SUBTOTAL </th>
        </tr>
       <?php
        $i;
      for ($x =1; $x <= $_POST["length"]; $x++) {
        ?>
            <tr>
                <td style="width:60px;text-align: center; font-size: 10px;"><?php echo $x?></td>
                  <td style="width:200px;text-align: center;font-size: 10px;"><?php echo  strtoupper($_POST["tablasum".$x])." DE ".$_POST["tabladescripcion".$x]?></td>
                <!--<td style="width:150px"><?php echo  $_POST["tablasum".$x]?></td>-->
                    <td style="width:50px;text-align: center;font-size: 10px;">Pza</td>
                     <td style="width:50px;text-align: center;font-size: 10px;"><?php echo  $_POST["tablacantidad".$x]?></td>
                <td style="width:100px;text-align: center;font-size: 10px;"><?php echo  ($_POST["tablaprecio".$x]/ $_POST["tablacantidad".$x])?></td>
                  <td style="width:50px;text-align: center;font-size: 10px;"><?php echo  $_POST["tablaprecio".$x]?></td>
                
            
            </tr>
            <?php   
        }

     ?>
    </table>
   
   <br>
    
    <h4 align="center"  style="font-size: 14px;">COSTO TOTAL: <?php echo "$".$_POST["totalt"]; ?> MXN</h4>
  <?php
    
   /* switch( $_POST["length"])
    {
        case 10:echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            break;
    }*/
    ?>
    <b style="font-size:12px">LOS PRECIOS SON EN PESOS Y ES MAS 16% DE IVA </b>
    <br>
    <b style="font-size:12px">TIEMPO DE ENTREGA: <?php echo $_POST["tiempo"]; ?></b>
    <br>
    <b style="font-size:12px">CONDICIONES DE PAGO: <?php echo $_POST["condiciones"]; ?></b>
    <br>
    <p style="font-size:12px">CABE ACLARAR QUE ESTA COTIZACION SOLO TIENE VIGENCIA DE 20 DIAS SALUDOS CORDIALES,
        PARA CUALQUIER DUDA O ACLARACION, QUEDO DE USTED. </p>
   <!-- <br>
    <h4 align="center" style="font-size: 12px;">Atentamente</h4>
     <h4 align="center">___________</h4>
 
     <h4 align="center" style="font-size: 12px;">DIANA RUIZ</h4>-->
       
           
       



  
  
    <page_footer>
         <hr widh="80%">
        <table style="width:100%" >
            <tr>
                <td><p  style="font-size: 12px;">IZCALLI CUAHTEMOC V HIGO 38-B</p></td>
                <td><p class="default" >IZCALLI CUAH</p></td>
                
                <td><p  style="font-size: 12px;"> METEPEC EDO.DE MEXICO</p></td>
                <td><p  style="font-size: 12px;">CP:52176</p></td>
            </tr>
              <tr>
                <td><p  style="font-size: 12px;">TEL:01(722)2-16-62-04</p></td>
                    <td><p class="default">IZCALLI CUAH</p></td>
                <td><p  style="font-size: 12px;">E-MAIL:fylsaservicios@gmail.com</p></td>
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
      $html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', 3);
      $html2pdf->pdf->SetDisplayMode('fullpage');
      $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
      $html2pdf->Output($_POST["factura"].".pdf");
  }
  catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
  }
  ?>
