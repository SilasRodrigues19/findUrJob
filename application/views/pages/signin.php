<section class="loginSection">
  <div class="wrapperLogin">
    <div class="boxLogin">
      <div class="top-header">
        <?= showMessage(); ?>
        <span>Já possui uma conta?</span>
        <header>Faça login</header>
      </div>

      <hr>

      <div class="input-field">
        <label class="label has-text-light" for="">Seu e-mail ou usuário</label>
        <input autocomplete="off" type="text" placeholder="Email ou usuário" required>
        <i class="bx bx-user"></i>
      </div>

      <div class="input-field">
        <label class="label has-text-light" for="">Sua senha</label>
        <input class="passwordInput" autocomplete="off" type="password" placeholder="********" required>
        <i class="bx bx-hide show-hide"></i>
      </div>

      <div class="input-field">
        <input type="submit" class="submit" value="Entrar">
      </div>

      <div class="bottom">
        <div class="left">
          <label for="">
            <a class="links" href="<?= base_url('/job/signup') ?>">Não possui cadastro?</a>
          </label>
        </div>
        <div class="right">
          <label for=""><a class="links" href="#">Esqueceu a senha?</a></label>
        </div>

      </div>


    </div>
  </div>
</section>