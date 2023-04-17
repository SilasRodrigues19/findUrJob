<?php if($this->session->userdata('usuario')): ?>
  <p class="level-item has-text-grey">
    <a href="<?= base_url('logout') ?>" class="button is-light is-small ml-3" title="<?= "Deseja sair, " . $this->session->userdata('usuario')->user_name . " ?" ?>">Deslogar</a>
  </p>
<?php endif; ?>
