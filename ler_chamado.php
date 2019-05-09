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

  $sql = "SELECT * FROM chamado c, user u WHERE c.userid = u.userid and chamadoid = ". $id;
  $stmt = db::prepare($sql);
  $stmt -> execute();

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
              <?php foreach ($stmt as $value) { ?>
              <span class="card-title center"><?php echo $value['titulo_chamado']; ?></span>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s6">
                      <div class="card grey lighten-1 z-depth-4">
                        <div class="card-content">
                          <img class="materialboxed" style="width: 100%; height: 100%;" src="fotos/<?php echo $value['anexo_chamado']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col s6">
                      <h6>Data: <?php echo $value['data_chamado']; ?></h6>
                      <h6>Prioridade: <?php if($value['prioridade_chamado'] == '1' || $value['prioridade_chamado'] == 1){
                                  echo "Baixa";
                                } elseif ($value['prioridade_chamado'] == '2' || $value['prioridade_chamado'] == 2) {
                                  echo "Média";
                                } elseif ($value['prioridade_chamado'] == '3' || $value['prioridade_chamado'] == 3) {
                                  echo "Alta";
                                } ?></h6>
                      <h6>Status: <?php echo $value['status_chamado']; ?></h6>
                      <h6>Usuário requisitou: <?php echo $value['nome_user']; ?></h6>
                      <h6>Setor: <?php echo $value['setor_user']; ?></h6>
                      <p><h6>Descrição do Chamado:</h6> <?php echo $value['descricao_chamado']; ?></p>
                      <div class="section"></div>
                      <?php if($_SESSION['user_setor'] == "informatica" && $value['status_chamado'] == "A fazer") { ?>
                      <a class="btn waves-effect waves-light green right" href="aceitar.php?id=<?php echo $value['chamadoid']; ?>">Aceitar Chamado</a>
                      <?php } elseif ($_SESSION['user_setor'] == "informatica" && $value['status_chamado'] == "Fazendo") { ?>
                      <a class="btn waves-effect waves-light green right" href="finalizar.php?id=<?php echo $value['chamadoid']; ?>">Finalizar Chamado</a>
                      <?php } else{ ?>
                      <a class="btn waves-effect waves-light blue right">Chamado Finalizado</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
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

        $(document).ready(function(){
          $('.materialboxed').materialbox();
        });
      </script>
    </body>
  </html>