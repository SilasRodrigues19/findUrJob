<section class="hero is-link banner">
  <?= showMessage(); ?>
  <div class="hero-body">
    <p class="title">
      Arquivadas
    </p>
    <p class="subtitle mt-4">
      As vagas que passarem do período de inscrição ficaram arquivadas nessa lista.
    </p>
     <div class="level-right">
      <p class="level-item ml-6">
        <span class="iconify mb-.1 mr-2" data-icon="entypo:home"></span>
        <a href="<?= base_url('/') ?>">
          <strong>
            Início
          </strong>
        </a>
      </p>
      <p class="level-item ml-6">
        <span class="iconify mb-.1 mr-2" data-icon="majesticons:textbox-plus"></span>
        <a href="<?= base_url('/job/new') ?>">
          Publicar
        </a>
      </p>
      <p class="level-item ml-6">
        <span class="iconify mb-.1 mr-2" data-icon="akar-icons:info-fill"></span>
        <a href="<?= base_url('/job/about') ?>">
          Sobre
        </a>
      </p>
    </div>
  </div>
</section>

<section class="section my-6">
  <h1 class="title has-text-grey-dark">Vagas Expiradas.</h1>
  <h2 class="subtitle mt-4">
    As vagas que encerraram o tempo para candidaturas aparecerão aqui.
  </h2>

</section>