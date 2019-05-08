<?php 
  session_start();

  if($_SESSION['logged'] == true){
    header("Location: index.php");
  }

  if (!empty($_GET['mensagem']) || !$_GET['mensagem'] == null) {
     $mensagem = $_GET['mensagem'];
   } 
    
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body <?php if(!$mensagem == null){ ?> onload="M.toast({html: '<?php echo$mensagem; ?>'})" <?php } ?>>

      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
      </div>

      <div class="row">
        <div class="col s12 m6 l4 offset-m3 offset-l4">
          <div class="z-depth-4 card bg-opacity-8">
            <div class="card-content black-text">
              <span class="card-title center">Chamados</span>
              <span class="card-title center">Entrar</span>
              <div class="row">
                <form class="col s12" method="post" action="login.php">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">person</i>
                      <input id="login" type="text" class="validate" name="login">
                      <label for="login">Login</label>
                    </div>
                    <div class="input-field col s12">
                      <i class="material-icons prefix">https</i>
                      <input id="senha" type="password" class="validate" name="senha">
                      <label for="senha">Senha</label>
                    </div>
                    <div class="input-field col s12">
                      <button type="submit" class="btn waves-effect waves-light deep-purple col s12">Entrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
  </html>