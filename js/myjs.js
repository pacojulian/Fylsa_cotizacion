$(document).ready(function () {
 
    
    //alert("pato");
    var usuario = document.getElementById("usuario").innerHTML;
   
   
    
   // alert(usuario);

    if (usuario === "A001")
        {
            //alert("pato1");
           
             $('#import').show();
        } else {
        //alert("pato2");
        $('#import').hide();
    }
   
    
    
});
var i;
var totalt=0;

$('#tblistado tbody').on('click',"tr", function(){
    var dato="";
 for(i=1;i<=5;i++){
       dato = dato + $(this).find('td:nth-child('+i+')').html()+"_";
     
 }
    alert(dato);
    //alert(res[0]);

var res = dato.split("_");
    document.getElementById("clave1").value = res[0];
     document.getElementById("descripcion").value = res[1];
     document.getElementById("um").value = res[2];
      document.getElementById("pmo").value = res[3];
     document.getElementById("precio").value = res[4];
    
    
    
    
//alert(res[0]);
});

  

function myFunction() {
    
   // alert("pato");
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("busqueda");
  filter = input.value.toUpperCase();
  table = document.getElementById("tblistado");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}




function calcularp(){
  
    var id;
    var clave = document.getElementById("clave1").value;
     var descripcion = document.getElementById("descripcion").value;
    var precio = document.getElementById("precio").value;
    var cantidad = document.getElementById("cant").value;
     var pmo = document.getElementById("pmo").value;
    var sum = document.getElementById("sum").value;
       var nFilas = $("#tbcarrito tr").length;

   
   
      //alert(sum);
// aqui van todas las funciones de precio 
    var total=0;
    
    
   switch (sum)
           {
       case "Suministro":
           total= cantidad * precio;
           break;
             case "Instalacion":
           total= cantidad * pmo;
           break;
             case "Suministro e Instalacion":
           total= (cantidad * precio)+(cantidad * pmo);
           break;
   }
    
     var table = document.getElementById("tbcarrito");
    
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    
    
    var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
     var cell6 = row.insertCell(5);
    var cell7= row.insertCell(6);
    //cell1.innerHTML = clave;
    cell1.innerHTML ="<input type='hidden' name='tablaclave"+nFilas+"' value="+clave+">"+clave;
    cell2.innerHTML = "<input type='hidden' name='tabladescripcion"+nFilas+"' value='"+descripcion+"'>"+descripcion;
      cell3.innerHTML = "<input type='hidden' name='tablasum"+nFilas+"' value='"+sum+"'>"+sum;
     cell4.innerHTML = "<input type='hidden' name='tablacantidad"+nFilas+"' value='"+cantidad+"'>"+cantidad;
    cell5.innerHTML=precio;
    cell6.innerHTML = pmo;
      cell7.innerHTML ="<input type='hidden' name='tablaprecio"+nFilas+"' value='"+total+"'>"+total;
    
    
 document.getElementById("tam").value = nFilas;
    
       totalt =totalt + total;
    
    document.getElementById("totalt").value=totalt;
    
    alert("Se agrego el siguiente producto:"+"\n"+"Descripcion: "+descripcion+"\n"+"Suministro/Instalacion: "+sum+"\n"+"Cantidad: "+cantidad);
    

 document.getElementById("clave1").value="";
 document.getElementById("descripcion").value="";
 document.getElementById("precio").value="";
    document.getElementById("cant").value="";
  document.getElementById("pmo").value="";
   
}
 function key_down(e) {
    if(e.keyCode === 12) {
      alert("pato");
        
    }
  }


function buscar(){
     var search = $("input#busqueda").val();
    
     var form = 'search='+search;
    
    if(search!="")
        {
              $.ajax({
                  url: 'listado.php',
                  type: 'POST',
                  data: form,
              }).done(function(form){
            //alert(form);
            $("#resultadoBusqueda").html(form);
              });
        }
    else{
       alert("algun campo esta vacio")
    }
 

}
