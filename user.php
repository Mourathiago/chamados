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

    $sql = "SELECT * FROM user";
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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>


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
          <div class="card grey lighten-4 z-depth-4 bg-opacity-8">
            <div class="card-content black-text">
              <span class="card-title center">Chamados Abertos</span>
              <div class="row">
                <div class="col s12">
                  <table id="example">

                    <thead>

                      <tr>
                        <th>userid</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>setor</th>
                        <th>Ações</th>
                      </tr>

                    </thead>

                    <tbody>
                      
                    <?php foreach ($stmt as $value){ ?>

                      <tr>
                        <td><?php echo $value['userid']; ?></td>
                        <td><?php echo $value['nome_user']; ?></td>
                        <td><?php echo $value['login_user']; ?></td>
                        <td><?php echo $value['setor_user']; ?></td>
                        <td><a href="edit.php?id=<?php echo $value['userid']; ?>" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">edit</i></a><a href="delete.php?id=<?php echo $value['userid']; ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                      </tr>

                      <?php } ?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').formSelect();
        });

        $(document).ready(function() {
          $('#example').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                }
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        });
        });
      </script>
    </body>
  </html>