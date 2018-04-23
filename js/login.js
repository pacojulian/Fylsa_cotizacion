


function Error()
{
  document.getElementById('error_login').style.display="true";
}

function login(){
//  alert("login");
}


$(document).ready(function(){
    
    //import swal from 'sweetalert2'
//var swal = require('sweetalert2')
   // alert("pato");
    
  
 //document.getElementById('error_login').style.display="none";
$('#btnlogin').click(function(event){

    
    if($('#rem').prop('checked')){
        
             event.preventDefault();
              var user = $("#user").val();
              var pass = $("#pass").val();
              var form = 'user='+user+'&pass='+pass;



            if ($.trim(user).length>0 && $.trim(pass).length>0) {

              $.ajax({
                  url: '../PHP/Login/login_conn2.php',
                  type: 'POST',
                  data: form,
              }).done(function(form){
            //alert(form);
            if(form==1)
            {
            window.location.href = "index.php";

            }
            else {

            //$("#error").html("<span style='color:#cc0000'>Error:</span><span style='color:#cc0000'> Invalid username or password. </span>");
                //alert("Error");
                $("#ex1").modal('show');
                 
            }
              });

}
    }
    
    else{
        

            



              event.preventDefault();
              var user = $("#user").val();
              var pass = $("#pass").val();
              var form = 'user='+user+'&pass='+pass;



            if ($.trim(user).length>0 && $.trim(pass).length>0) {

              $.ajax({
                  url: '../PHP/Login/login_conn.php',
                  type: 'POST',
                  data: form,
              }).done(function(form){
            //alert(form);
            if(form==1)
            {
            window.location.href = "index.php";

            }
            else {

            //$("#error").html("<span style='color:#cc0000'>Error:</span><span style='color:#cc0000'> Invalid username or password. </span>");
               // alert("Error");
                   $("#ex1").modal('show');
                //swal("Hello world!");
            }
              });

}

}

});

});
