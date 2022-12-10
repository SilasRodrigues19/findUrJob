<section class="hero is-link is-fullheight" id="loginSection">
  <div class="hero-body">
    <div class="container loginContainer">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
          <form action="" class="box loginForm">
            <div class="field">
              <label for="" class="label loginLabel">Email ou Usuário</label>
              <div class="control has-icons-left">
                <input type="email" placeholder="mail@domain.com" class="input" required>
                <span class="icon is-small is-left">
                  <span class="iconify" data-icon="mdi:envelope"></span>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="label loginLabel">Senha</label>
              <div class="control has-icons-left">
                <input type="password" placeholder="*******" class="input" required>
                <span class="icon is-small is-left">
                  <span class="iconify" data-icon="mdi:lock"></span>
                </span>
              </div>
            </div>
            <hr class="divider">
            <div class="field">
              <button class="button is-link is-fullwidth">
                Entrar
              </button>
            </div>
          </form>
        </div>
      </div>
      <img id="loginSvg" src="<?= base_url('public/img/animated_login_background.svg') ?>" alt="Background animado">
    </div>
  </div>
</section>