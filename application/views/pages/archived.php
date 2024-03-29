<section class="hero is-link banner">
  <div class="hero-body">
    <p class="title">
      Arquivadas
    </p>
    <p class="subtitle mt-4">
      As vagas que passarem do período de inscrição ficarão arquivadas nessa lista.
    </p>
    <div class="level-right item-menu">
      <p class="level-item">
        <a href="<?= base_url('/') ?>">
          <span class="iconify mr-2" data-icon="entypo:home"></span>
          <strong class="is-hidden-mobile">
            Início
          </strong>
        </a>
      </p>
      <p class="level-item">
        <a href="<?= base_url('/job/new') ?>">
          <span class="iconify mr-2" data-icon="majesticons:textbox-plus"></span>
          <span class="is-hidden-mobile">
            Publicar
          </span>
        </a>
      </p>
      <p class="level-item">
        <a href="<?= base_url('/job/published') ?>">
          <span class="iconify mr-2" data-icon="mdi:list-box"></span>
          <span class="is-hidden-mobile">
            Minhas vagas
          </span>
        </a>
      </p>
      <p class="level-item">
        <a href="<?= base_url('/job/about') ?>">
          <span class="iconify mr-2" data-icon="akar-icons:info-fill"></span>
          <span class="is-hidden-mobile">
            Sobre
          </span>
        </a>
      </p>
      <?php $this->load->view('templates/logged_in_header.php') ?>
    </div>
  </div>
</section>

<section class="section my-6">

  <ol class="breadcrumb is-right" aria-label="breadcrumbs">
    <?php echo $breadcrumb_default_style; ?>
  </ol>

  <?= showMessage(); ?>
  <?php $count = $countArchivedJobs['countArchivedJobs']; ?>
  <h1 class="title has-text-grey-dark">
    <?= ($count == 1) ? $count . ' Vaga Expirada' : $count . ' Vagas Expiradas' ?>
  </h1>

  <h2 class="subtitle mt-4">
    As vagas que encerraram o tempo para candidaturas aparecerão aqui.
  </h2>

  <hr>

  <form method="POST" id="form-filter">
    <input type="hidden" name="archivejob" id="archivejob">
    <input type="hidden" name="archivejob_id" id="archivejob_id">
  </form>

  <div>
    <?php if ($archivedJobs) : ?>
      <?php foreach ($archivedJobs as $idx => $value) : ?>
        <?php if ($archivedJobs[$idx]['job_is_archived']) : ?>
          <div class="card my-4">
            <header class="card-header py-4">
              <p class="card-header-title">
                <?= $archivedJobs[$idx]['job_title']; ?>
              </p>
              <?php
              $user = $this->session->userdata('usuario');
              if ($user && ($user->user_level === 'Mod' || $user->user_level === 'Admin')) :
              ?>
                <button class="card-header-icon" aria-label="Archive item">
                  <span class="icon">
                    <span onclick="return handleArchiving( '<?= $archivedJobs[$idx]['job_id'] ?>' , '<?= $archivedJobs[$idx]['job_title'] ?>' )" class="iconify" data-icon="material-symbols:archive"></span>
                  </span>
                </button>
              <?php endif; ?>
            </header>
            <div class="card-content">
              <div class="content">
                <p><strong>Requisitos da vaga</strong></p>
                <p><?= ($archivedJobs[$idx]['job_requirements'] ? $archivedJobs[$idx]['job_requirements'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Link da vaga</strong></p>
                <p><?= '<a class="job-link" href="' . $archivedJobs[$idx]['job_link'] . '" target="_blank">' . $archivedJobs[$idx]['job_link'] . '</a>'; ?></p>
              </div>
              <div class="content">
                <p><strong>Senioridade</strong></p>
                <p><?= ($archivedJobs[$idx]['job_level'] ? $archivedJobs[$idx]['job_level'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Salário</strong></p>
                <p><?= ($archivedJobs[$idx]['job_salary'] == '0,00' || $archivedJobs[$idx]['job_salary'] == 'NaN'  ? 'Não informado' : $archivedJobs[$idx]['job_currency_symbol'] . ' ' . $archivedJobs[$idx]['job_salary']); ?></p>
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
                <p><strong>E-mail para contato</strong></p>
                <p><?= ($archivedJobs[$idx]['job_email'] ? '<a href="mailto:' . $archivedJobs[$idx]['job_email'] . '">' . $archivedJobs[$idx]['job_email'] . '</a>' : 'E-mail não informado, consulte o link da vaga'); ?></p>
              </div>
              <div class="content">
                <p><strong>Requer experiência?</strong></p>
                <p><?= ($archivedJobs[$idx]['job_experience'] ? 'Sim' : 'Não') ?></p>
              </div>
              <?php if ($archivedJobs[$idx]['job_observation']) : ?>
                <div class="content">
                  <p><strong>Observação</strong></p>
                  <p><?= ($archivedJobs[$idx]['job_observation']) ?></p>
                </div>
              <?php endif; ?>
            </div>
            <footer class="card-footer py-4">
              <p class="card-footer-item d-block has-text-left">Publicado no dia
                <strong class="mx-2"><?= date_format(new DateTime($archivedJobs[$idx]['created_at']), 'd/m/Y'); ?></strong> às
                <strong class="ml-2"><?= date_format(new DateTime($archivedJobs[$idx]['created_at']), 'H:i:s'); ?></strong>
              </p>
            </footer>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

    <?php else : ?>
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