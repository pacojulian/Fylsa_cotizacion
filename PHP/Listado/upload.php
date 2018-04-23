<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script>
//Declaration of function that will insert data into database
 function senddata(filename){
        var file = filename;
        $.ajax({
            type: "POST",
            url: "senddata.php",
            data: {file},
            async: true,
            success: function(html){
              window.location.href = "index.php"
            }
        })
        }
 </script>
<?php
$csv = array();
$batchsize = 1000; //split huge CSV file by 1,000, you can modify this based on your needs
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $tmpName = $_FILES['csv']['tmp_name'];
    if($ext === 'csv'){ //check if uploaded file is of CSV format
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            set_time_limit(0);
            $row = 0;
            while(($data = fgetcsv($handle)) !== FALSE) {
                $col_count = count($data);
                //splitting of CSV file :
                if ($row % $batchsize == 0):
                    $file = fopen("minpoints$row.csv","w");
                endif;
                $csv[$row]['col1'] = $data[0];
                $csv[$row]['col2'] = $data[1];
                $csv[$row]['col1'] = $data[2];
                $csv[$row]['col2'] = $data[3];
                $csv[$row]['col2'] = $data[4];

                $clave = $data[0];
                $descripcion = $data[1];
                 $um = $data[2];
                $precio_obra = $data[3];
                $precio_sum = $data[4];

                $json = "'$clave', '$descripcion','$um','$precio_obra','$precio_sum'";
                fwrite($file,$json.PHP_EOL);
                //sending the splitted CSV files, batch by batch...
                if ($row % $batchsize == 0):
                    echo "<script> senddata('minpoints$row.csv'); </script>";
                endif;
                $row++;
            }
            fclose($file);
            fclose($handle);
        }
    }
    else
    {
        echo "Only CSV files are allowed.";
    }
    //alert once done.
    echo "<script> alert('CSV imported!') </script>";
}
?>
