<section class="loginSection">
  <div class="wrapperLogin">
    <div class="boxLogin">
      <div class="top-header">
        <?= showMessage(); ?>
        <span class="has-text-centered">Não consegue acessar o sistema?</span>
        <span class="has-text-centered">Gere seu <strong class="mx-1 has-text-light">token</strong> de redefinição abaixo</span>
        <header class="has-text-centered">Redefinir sua senha</header>
      </div>

      <hr>

      <form action="" method="POST">
        <div class="input-field">
          <label class="label has-text-light" for="">Seu e-mail cadastrado</label>
          <input autocomplete="off" type="email" placeholder="Ex:. joao@domain.com" name="email" required>
          <i class="bx bx-user"></i>
        </div>
  
        <div class="input-field">
          <input type="submit" class="submit" value="Enviar">
        </div>
  
        <div class="bottom">
          <div class="left">
            <label for="">
              <a class="links" href="<?= base_url('/job/signin') ?>">Acessar</a>
            </label>
          </div>
          <div class="right">
            <label for=""><a class="links" href="<?= base_url('/job/signup') ?>">Criar conta</a></label>
          </div>
  
        </div>
      </form>

    </div>
  </div>
</section>