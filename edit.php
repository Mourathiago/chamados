<?php
  session_start();

  if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true){
    header("Location: entrar.php?mensagem=Usuário não logado");
  }

  function __autoload($classe){

    require_once 'classes/'.$classe.'.class.php';
  }
  
  if (!empty($_GET['mensagem']) || !$_GET['mensagem'] == null) {
    $mensagem = $_GET['mensagem'];
  }

  $id = $_GET['id'];

  $sql = "SELECT * FROM user WHERE userid =".$id;
  $stmt = db::prepare($sql);
  $stmt->execute();
   
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
          <a href="index.php" class="brand-logo">CDM - Chamados</a>
          <?php if($_SESSION['user_setor'] == "informatica") { ?>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="user.php">Usuários</a></li>
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
              <span class="card-title center">Cadastrar Usuário</span>
              <div class="row">
                <form class="col s12" method="post" action="update.php?id=<?php echo $id; ?>">
                  <?php if($stmt->rowcount() <= 0){ ?>
                    <h2 class="center">Usuário inexistente</h2>
                  <?php }?>
                  <?php foreach ($stmt as $value) { ?>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="nome" type="text" name="nome" value="<?php echo $value['nome_user']; ?>" required>
                      <label for="nome">Nome do usuário</label>
                    </div>
                    <div class="input-field col s6">
                      <select name="setor" required>
                        <option value="<?php echo $value['setor_user']; ?>" disabled selected><?php echo $value['setor_user']; ?></option>
                        <option value="informatica">Informatica</option>
                        <option value="rh">RH</option>
                        <option value="recepcao">Recepção</option>
                      </select>
                      <label>Setor</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="login" type="text" name="login" value="<?php echo $value['login_user']; ?>" required>
                      <label for="login">Login do usuário</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="senha" type="password" name="senha" required>
                      <label for="senha">Senha do usuário</label>
                    </div>
                  </div>
                  <div>
                    <button type="submit" class="btn waves-effect waves-light right">Cadastrar</button>
                  </div>
                  <?php } ?>
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