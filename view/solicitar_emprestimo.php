<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitar Emprestimo</title>
  <link rel="stylesheet" href="/assets/css/baseCss/base.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/solicitar_emprestimo.css">
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
          <li><button class="dropdown-item" type="button"><a href="/logout">Sair</a></button></li>
        </ul>
      </div>
    </div>
  </header>
  <main>
    <section id="propaganda">
      <h2>Solicite o seu emprestimo e venha fazer parte do time</h2>
      <p>Apos o envio do formulário a sua proposta vai ser analisada e entraremos em contato em até 24 horas úteis</p>
    </section>
    <section id="formulario">
      <div class="card">
        <h3>Solicitar Emprestimo</h3>
        <form class="form-list" action="#" method="post">
          <div class="mb-3 inputs">
            <label for="formGroupExampleInput" class="form-label labels" id="valor">Valor a ser solicitado</label>
            <input type="text" class="form-control input" id="myInput" placeholder="Informe o valor a ser solicitado" data-tipo="valor" value="R$ 1.000,00" inputmode="numeric" required />
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label labels" id="valor">Quantidade de parcelas</label>
            <select class="form-select input select" aria-label="Default select example" required>
              <option value="1">1x</option>
              <option value="2">2x</option>
              <option value="3">3x</option>
              <option value="4">4x</option>
              <option value="5">5x</option>
              <option value="6">6x</option>
              <option value="7">7x</option>
              <option value="8">8x</option>
              <option value="9">9x</option>
              <option value="10">10x</option>
              <option value="11">11x</option>
              <option value="12">12x</option>
              <option value="13">13x</option>
              <option value="14">14x</option>
              <option value="15">15x</option>
              <option value="16">16x</option>
              <option value="17">17x</option>
              <option value="18">18x</option>
              <option value="19">19x</option>
              <option value="20">20x</option>
              <option value="21">21x</option>
              <option value="22">22x</option>
              <option value="23">23x</option>
              <option value="24">24x</option>
            </select>
          </div>
          <div class="mb-3" id="submit"><button type="submit" class="btn-login">Enviar</button></div>
        </form>
      </div>
    </section>
  </main>
  <?php require 'footer.php';?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="../public/assets/js/solicitar_emprestimo.js"></script>
</body>

</html>