<?php $this->load->view('templates/auth_pages_header.php') ?>
        <span>Já possui uma conta?</span>
        <header>Faça login</header>
      </div>

      <hr>

      <form action="" method="POST" name="form">
        <div class="input-field">
          <label class="label has-text-light" for="">Seu usuário</label>
          <input autocomplete="off" type="text" placeholder="Ex:. joao.silva" name="user" value="<?= $user ?>">
          <i class="bx bx-user"></i>
        </div>

        <div class="input-field">
          <label class="label has-text-light" for="">Sua senha</label>
          <input class="passwordInput" autocomplete="off" type="password" placeholder="********" name="password" value="<?= $password ?>">
          <i class="bx bx-hide show-hide"></i>
        </div>

        <div class="input-field">
          <input type="submit" class="submit" name="send" value="Entrar">
        </div>

        <div class="bottom">
          <div class="left">
            <label for="">
              <a class="links" href="<?= base_url('/job/signup') ?>">Não possui cadastro?</a>
            </label>
          </div>
          <div class="right">
            <label for=""><a class="links" href="<?= base_url('/job/forgot-password') ?>">Esqueceu a senha?</a></label>
          </div>

        </div>
      </form>

<?php $this->load->view('templates/auth_pages_footer.php') ?>