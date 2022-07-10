<?php

use Sicredi\Credeasy\Controller\ListarEmprestimos;

  $emprestimos = (new ListarEmprestimos())->listaEmprestimos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem Vindo</title>
  <link rel="stylesheet" href="/assets/css/baseCss/base.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/listar_emprestimo.css">
</head>

<body>
  <header class="cabecalhoPrincipal" id="principalHeader">
    <div class="container">
      <h1><a href="/principal">CredEasy</a></h1>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">

        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <li><button class="dropdown-item" type="button">Meu Perfil</button></li>
          <li><button class="dropdown-item" type="button">Sair</button></li>
        </ul>
      </div>
    </div>
    </header>
    <main>
      <div class="lista_emprestimos">
        <div class="titulo"><h1>Seus emprestimos</h1></div>
        <table class="table table-borderless">
          <thead class="tbhead">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">valor</th>
              <th scope="col">Parcelas</th>
              <th scope="col">TAXA DE JUROS</th>
              <th scope="col">STATUS</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($emprestimos as $emprestimo){?>
              <tr>
              <th scope="row"><?php echo $emprestimo->getIdEmprestimo();?></th>
              <td><?php echo $emprestimo->getValorDoEmprestimo();?></td>
              <td><?php echo $emprestimo->getQtdParcelas();?></td>
              <td><?php echo $emprestimo->getTaxaDeJuros();?></td>
              <td><?php echo $emprestimo->getStatusEmprestimo();?></td>
              <td><button type="button" class="btn bo">Saiba mais</button></td>
            </tr>
            <?php } ?>
          </tbody>
        </table> 
        <div class="c"><div class="cria_emprestimos"><a class="bnovo" href="/solicitar-emprestimo">Solicitar novo emprestimo</a></div></div>   
      </div>
    </main>
   <?php require 'footer.php';?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>