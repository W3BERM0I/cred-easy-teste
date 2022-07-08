<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar a senha</title>
  <link rel="stylesheet" href="../public/assets/css/baseCss/base.css">
  <link rel="stylesheet" href="../public/assets/css/recuperarSenha.css" />
</head>

<body>
  <header class="cabecalhoPrincipal">
    <div class="container">
      <h1><a href="./primeira_tela.php">CredEasy</a></h1>
      <nav>
        <a class="container__item" href="./entrar.php">Entrar</a>
      </nav>
    </div>
  </header>

  <main>
    <div class="card">
      <h2>Recupere a sua senha</h2>
      <form action="recuperar a senha">
        <div class="e-mail">
          <label for="recuperarSenha">Informe o seu <span>e-mail</span> ou <span>cpf</span></label>
          <input type="text" id="recuperar" required />
        </div>
        <div class="submit">
          <input type="submit" value="Recuperar senha" class="enviar" />
        </div>
      </form>
    </div>
  </main>
</body>

</html>