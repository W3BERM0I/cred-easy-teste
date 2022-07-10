<?php

use Sicredi\Credeasy\Controller\{Cadastrar, Deslogar, EfetuaCadastro, FormularioLogin, ListarEmprestimos, PrimeiraTela, principal, realizarLogin, SolicitarEmprestimo, SolicitarSenha};

return [
  '/cadastrar' => Cadastrar::class,
  '/efetua-cadastro' => EfetuaCadastro::class,
  '/login' => FormularioLogin::class,
  '/realiza-login' => RealizarLogin::class,
  '/logout' => Deslogar::class,
  '/primeira-tela' => PrimeiraTela::class,
  '/principal' => Principal::class,
  '/solicitar-emprestimo' => SolicitarEmprestimo::class,
  '/recuperar-senha' => SolicitarSenha::class,
  '/listar-emprestimos' => ListarEmprestimos::class
];
