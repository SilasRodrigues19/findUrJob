<section class="hero is-link banner">
  <?= showMessage(); ?>
  <div class="hero-body">
    <p class="title">
      Arquivadas
    </p>
    <p class="subtitle mt-4">
      As vagas que passarem do período de inscrição ficaram arquivadas nessa lista.
    </p>
     <div class="level-right item-menu">
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

  <hr>

  <div>
      <?php if($archivedJobs): ?>
        <?php foreach($archivedJobs as $idx => $value): ?>
          <?php if($archivedJobs[$idx]['job_is_archived']): ?>
          <div class="card my-4">
            <header class="card-header py-4">
              <p class="card-header-title">
                <?= $archivedJobs[$idx]['job_description']; ?>
              </p>
            </header>
            <div class="card-content">
              <div class="content">
                <p><strong>Link da vaga</strong></p>
                <p><?= '<a class="job-link" href="'.$archivedJobs[$idx]['job_link'].'" target="_blank">'.$archivedJobs[$idx]['job_link'].'</a>'; ?></p>
              </div>
              <div class="content">
                <p><strong>Senioridade</strong></p>
                <p><?= ($archivedJobs[$idx]['job_level'] ? $archivedJobs[$idx]['job_level'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Salário</strong></p>
                <p><?= ($archivedJobs[$idx]['job_salary'] == '0.00' ? 'Não informado' : $archivedJobs[$idx]['job_currency_symbol'] . ' ' . $archivedJobs[$idx]['job_salary']); ?></p>
              </div>
              <div class="content">
                <p><strong>Modalidade</strong></p>
                <p><?= ($archivedJobs[$idx]['job_mode'] ? $archivedJobs[$idx]['job_mode'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Contrato</strong></p>
                <p><?= ($archivedJobs[$idx]['job_contract'] ? $archivedJobs[$idx]['job_contract'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Requer experiência?</strong></p>
                <p><?= ($archivedJobs[$idx]['job_experience'] ? 'Sim' : 'Não') ?></p>
              </div>
            </div>
            <footer class="card-footer py-4">
              <p class="card-footer-item d-block has-text-left">Publicado no dia
                <strong class="mx-2"><?= date_format(new DateTime($archivedJobs[$idx]['created_at']), 'd/m/Y');?></strong> às 
                <strong class="ml-2"><?= date_format(new DateTime($archivedJobs[$idx]['created_at']), 'H:i:s'); ?></strong>
              </p>
            </footer>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>
        
        <?php else: ?>
          <article class="message is-info">
            <div class="message-header">
              <p>Ainda não há nada por aqui.</p>
            </div>
            <div class="message-body">
              Não encontramos nenhuma vaga arquivada, que tal dar uma olhada nas <a href="<?= base_url('/job') ?>">vagas publicadas?</a>
            </div>
          </article>
      <?php endif; ?>
    </div>

  

</section>