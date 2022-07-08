<?php

use User06\Mvc\Controller\{Cadastrar, Deslogar, FormularioLogin, PrimeiraTela, principal, realizarLogin};

return [
  '/cadastrar' => Cadastrar::class,
  '/login' => FormularioLogin::class,
  '/realiza-login' => realizarLogin::class,
  '/logout' => Deslogar::class,
  '/primeira-tela' => PrimeiraTela::class,
  '/principal' => principal::class
];
