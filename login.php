<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>FYLSA</title>
  <meta name="author" content="Ravikumar Chauhan">
 

  <!-- Meta and Opengraph tags -->
  <meta name="description" content="Material Design Login Form for Mediahawkz.com">
  <meta name="keywords" content="html, html5, css, css3, material, form, login, google material design, material design, mediahawkz, mediahawkz.com">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:300'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <!-- Main content -->
<main role="main">
  <div class="mediahawkz-login">
    <div class="div-left"></div>
    <div class="div-right">
      <div class="rkmd-form login">
        <h2 class="form-title">Iniciar Sesion</h2>
        <form id="login"  method="post">
          <div class="form-field">
            <label class="field-label" for="emailid" >Usuario</label>
            <input id="user" name="user" type="text" name="emailid" class="field-input">
            <i class="material-icons md-18">error_outline</i>
          </div>
          <div class="form-field">
            <label class="field-label" for="pass" >Contraseña</label>
            <input id="pass" type="password" name="pass" class="field-input">
            <i class="material-icons md-18">error_outline</i>
          </div>
          <div class="form-row">
            <div class="msg">
              <!-- <span class="error">We can't find that email address. Have you registered?.</span> -->
            </div>
          </div>
          <div class="form-row clearfix">
              <form  method="post">
            <div class="remember float-left">
              <input type="checkbox" name="rem" id="rem">
              <label for="rem">Administrador</label>
            </div>
            <button id="btnlogin" class="rkmd-btn btn-lightBlue ripple-effect float-right" >Iniciar Sesion</button>
                  </form>
          </div>
       
        </form>
      </div>
     
    </div>
  </div>
</main>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
