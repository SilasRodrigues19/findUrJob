<section class="hero is-link banner">
  <div class="hero-body">
    <p class="title">
      Vagas reportadas
    </p>
    <p class="subtitle mt-4">
      Gerencie as vagas reportadas pelos usuários
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
        <a href="<?= base_url('/job/archived') ?>">
          <span class="iconify mr-2" data-icon="bxs:archive-in"></span>
          <span class="is-hidden-mobile">
            Arquivadas
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
  <?= showMessage(); ?>

  <h1 class="title has-text-grey-dark">
    <?= (!$listReportedJobs) ?  'Ainda não há nenhuma denúncia' : 'Vagas reportadas'; ?>
  </h1>


  <h2 class="subtitle mt-4">
    <?= (!$listReportedJobs) ?  'Todas as vagas reportadas aparecerão nessa página.' : 'Consulte abaixo as vagas que foram denunciadas'; ?>
  </h2>

  <hr>

  <div>
    <?php if ($listReportedJobs) : ?>
      <?php foreach ($listReportedJobs as $idx => $value) : ?>
          <div class="card my-4">
            <header class="card-header py-4">
              <p class="card-header-title">
                <?= $listReportedJobs[$idx]['job_title']; ?>
              </p>
              <?php
              $user = $this->session->userdata('usuario');
              if ($user && ($user->user_level === 'Mod' || $user->user_level === 'Admin')) :
              ?>
                <button class="card-header-icon" aria-label="Archive item">
                  <span class="icon">
                    <span onclick="return handleArchiving( '<?= $listReportedJobs[$idx]['job_id'] ?>' , '<?= $listReportedJobs[$idx]['job_title'] ?>' )" class="iconify" data-icon="material-symbols:archive"></span>
                  </span>
                </button>
              <?php endif; ?>
            </header>
            <div class="card-content">
              <div class="content">
                <p><strong>ID da vaga</strong></p>
                <p><?= $listReportedJobs[$idx]['report_job_id']; ?></p>
              </div>
              <div class="content">
                <p><strong>Razão da denúncia</strong></p>
                <p><?= $listReportedJobs[$idx]['report_reason']; ?></p>
              </div>
              <div class="content">
                <p><strong>Observação</strong></p>
                <p><?= $listReportedJobs[$idx]['report_obs']; ?></p>
              </div>
              <div class="content">
                <p><strong>Dados de quem publicou</strong></p>
                <p><?= $listReportedJobs[$idx]['user_name']; ?></p>
              </div>
            </div>
            <footer class="card-footer py-4">
              <p class="card-footer-item d-block has-text-left">
                  Denunciada no dia
                  <?= "<strong>" . date_format(new DateTime($listReportedJobs[$idx]['reported_at']), 'd/m/Y') . "</strong>";  ?>
                  às
                  <?= "<strong>" . date_format(new DateTime($listReportedJobs[$idx]['reported_at']), 'H:i:s') . "</strong>"; ?>
                  por
                  <?= "<strong>" . $listReportedJobs[$idx]['user_name'] . "</strong>"; ?>
                </p>
            </footer>
          </div>
      <?php endforeach; ?>

    <?php else : ?>
      <article class="message is-info">
        <div class="message-header">
          <p>Ainda não há nada por aqui.</p>
        </div>
        <div class="message-body">
          Não há nenhuma vaga que foi reportada para ser exibida
        </div>
      </article>
    <?php endif; ?>
  </div>
</section>