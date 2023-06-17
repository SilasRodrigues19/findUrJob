<section class="loginSection">
  <div class="backToHome">
    <a href="<?= base_url() ?>" aria-label="Voltar para a página inicial" title="Início">
      <span class="iconify" data-icon="majesticons:home" role="img" aria-hidden="true"></span>
    </a>
  </div>
  <div class="wrapperLogin">
    <div class="boxLogin">
      <div class="top-header">
        <?= showMessage(); ?>
        <span>Não possui uma conta?</span>
        <header>Cadastre-se</header>
      </div>

      <hr>

      <form action="" method="POST">
        <div class="input-field">
          <label class="label has-text-light" for="email">Seu e-mail</label>
          <input autocomplete="off" type="email" placeholder="Ex:. joao@domain.com" name="email" value="<?= $email; ?>">
          <i class="bx bx-envelope"></i>
        </div>

        <div class="input-field">
          <label class="label has-text-light" for="user">Seu usuário</label>
          <input autocomplete="off" type="text" placeholder="Ex:. joao.silva" name="user" value="<?= $user; ?>">
          <i class="bx bx-user"></i>
        </div>

        <div class="input-field">
          <label class="label has-text-light" for="password">Sua senha</label>
          <input class="passwordInput" autocomplete="off" type="password" placeholder="********" name="password" value="<?= $password; ?>">
          <i class="bx bx-hide show-hide"></i>
        </div>

        <div class="input-field">
          <input type="submit" class="submit" name="send" value="Cadastrar">
        </div>

        <div class="bottom">
          <div class="left">
            <label for="">
              <a class="links" href="<?= base_url('/job/signin') ?>">Já possui cadastro?</a>
            </label>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>