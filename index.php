<?php
  session_start();

  if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true){
    header("Location: entrar.php?mensagem=Usuário não logado");
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

      <nav>
        <div class="nav-wrapper">
          <a href="" class="brand-logo">CDM - Chamados</a>
          <?php if($_SESSION['user_setor'] == "informatica") { ?>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="cadastrar.php">Cadastrar Usuários</a></li>
            <li><a href="chamados.php">Chamados Abertos</a></li>
            <li><a href="sair.php">Sair</a></li>
          <?php }else { ?>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="chamados.php">Meus Chamados Abertos</a></li>
            <li><a href="sair.php">Sair</a></li> 
          <?php } ?>
          </ul>
        </div>
      </nav>

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
        <div class="col s10 offset-s1">
          <div class="card grey lighten-4 z-depth-4 card bg-opacity-8">
            <div class="card-content black-text">
              <span class="card-title center">Abrir Chamado</span>
              <div class="row">
                <form class="col s12" enctype="multipart/form-data" method="post" action="chamado.php">
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="titulo" type="text" name="titulo" required>
                      <label for="titulo">Titulo do chamado</label>
                    </div>
                    <div class="input-field col s6">
                      <select name="nivel" required>
                        <option value="" disabled selected>Escolha o nivel da urgencia do chamado</option>
                        <option value="1">Baixo</option>
                        <option value="2">Medio</option>
                        <option value="3">Alto</option>
                      </select>
                      <label>Nivel do Chamado</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descricao" class="materialize-textarea" name="descricao"></textarea>
                      <label for="descricao">Descrição do chamado</label>
                    </div>
                  </div>
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Anexo</span>
                      <input type="file" name='anexo'>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path" type="text">
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn waves-effect waves-light right">Criar chamado</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').formSelect();
        });
      </script>
    </body>
  </html>