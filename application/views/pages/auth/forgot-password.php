<?php $hasToken = (isset($token) && strlen(trim($token)) === 64) ?>

<?php $this->load->view('templates/auth_pages_header.php') ?>
        <span class="has-text-centered">
          <?= ($hasToken) ? 'Redefinição de senha solicitada' : 'Não consegue acessar o sistema?' ?>
        </span>

        <?php if ($hasToken) : ?>
          <span class="has-text-centered">Defina sua <strong class="mx-1 has-text-light">nova senha</strong> no campo abaixo</span>
        <?php else : ?>
          <span class="has-text-centered">Gere seu <strong class="mx-1 has-text-light">token</strong> de redefinição abaixo</span>
        <?php endif; ?>

        <header class="has-text-centered">Redefinir sua senha</header>
      </div>


      <hr>

      <form action="" method="POST">

        <div class="input-field">

          <?php if (!$hasToken) : ?>
            <label class="label has-text-light" for="email">Seu e-mail cadastrado</label>
            <input autocomplete="off" type="email" placeholder="Ex:. joao@domain.com" name="email" id="email">
            <i class="bx bx-user"></i>
          <?php else : ?>
            <label class="label has-text-light" for="email">Email cadastrado</label>
            <input autocomplete="off" type="email" placeholder="Ex:. joao@domain.com" name="email" id="email" disabled value="<?= $email ?>">
            <i class="bx bx-user"></i>

            <label class="label has-text-light" for="password">Sua nova senha</label>
            <input class="passwordInput" autocomplete="off" type="password" placeholder="********" name="password" id="password" value="<?= $newPassword ?>">
            <i class="bx bx-hide show-hide"></i>

            <label class="label has-text-light" for="confirm_password">Confirme sua nova senha</label>
            <input class="passwordInput" autocomplete="off" type="password" placeholder="********" name="confirm_password" id="confirm_password" value="<?= $cPassword ?>">
            <i class="bx bx-hide show-hide"></i>
          <?php endif; ?>

        </div>

        <div class="input-field">
          <input type="submit" class="submit" name="send" value="<?= ($hasToken) ? 'Confirmar' : 'Enviar' ?>">
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

<?php $this->load->view('templates/auth_pages_footer.php') ?>