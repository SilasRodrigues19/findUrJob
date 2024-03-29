<section class="hero is-link banner">
  <div class="hero-body">
    <p class="title">
      Minhas vagas
    </p>
    <p class="subtitle mt-4">
      Gerencie suas publicações
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

  <ol class="breadcrumb is-right" aria-label="breadcrumbs">
    <?php echo $breadcrumb_default_style; ?>
  </ol>

  <?= showMessage(); ?>


  <h2 class="subtitle mt-4">
    Todas as vagas publicadas por você aparecerão nessa página.
  </h2>

  <hr>

  <form method="POST" id="form-filter">
    <input type="hidden" name="archivejob" id="archivejob">
    <input type="hidden" name="archivejob_id" id="archivejob_id">
  </form>

  <div>
    <?php if ($showPublishedJobsByLoggedInUser) : ?>
      <?php foreach ($showPublishedJobsByLoggedInUser as $idx => $value) : ?>
        <?php if (!$showPublishedJobsByLoggedInUser[$idx]['job_is_archived']) : ?>
          <div class="card my-4">
            <header class="card-header py-4">
              <p class="card-header-title">
                <?= $showPublishedJobsByLoggedInUser[$idx]['job_title']; ?>
              </p>
              <?php
              $user = $this->session->userdata('usuario');
              if ($user && ($user->user_level === 'Mod' || $user->user_level === 'Admin')) :
              ?>
                <button class="card-header-icon" aria-label="Archive item">
                  <span class="icon">
                    <span onclick="return handleArchiving( '<?= $showPublishedJobsByLoggedInUser[$idx]['job_id'] ?>' , '<?= $showPublishedJobsByLoggedInUser[$idx]['job_title'] ?>' )" class="iconify" data-icon="material-symbols:archive"></span>
                  </span>
                </button>
                <button class="card-header-icon" aria-label="Edit item">
                  <a class="icon" href="<?= base_url('/job/new/' . $showPublishedJobsByLoggedInUser[$idx]['job_id']) ?>">
                    <span class="iconify" data-icon="mingcute:edit-line"></span>
                  </a>
                </button>
              <?php endif; ?>
            </header>
            <div class="card-content">
              <div class="content">
                <p><strong>Requisitos da vaga</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_requirements'] ? $showPublishedJobsByLoggedInUser[$idx]['job_requirements'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Link da vaga</strong></p>
                <p><?= '<a class="job-link" href="' . $showPublishedJobsByLoggedInUser[$idx]['job_link'] . '" target="_blank">' . $showPublishedJobsByLoggedInUser[$idx]['job_link'] . '</a>'; ?></p>
              </div>
              <div class="content">
                <p><strong>Senioridade</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_level'] ? $showPublishedJobsByLoggedInUser[$idx]['job_level'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Salário</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_salary'] == '0,00' || $showPublishedJobsByLoggedInUser[$idx]['job_salary'] == 'NaN'  ? 'Não informado' : $showPublishedJobsByLoggedInUser[$idx]['job_currency'] . ' ' . $showPublishedJobsByLoggedInUser[$idx]['job_salary']); ?></p>
              </div>
              <div class="content">
                <p><strong>Modalidade</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_mode'] ? $showPublishedJobsByLoggedInUser[$idx]['job_mode'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Contrato</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_contract'] ? $showPublishedJobsByLoggedInUser[$idx]['job_contract'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>E-mail para contato</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_email'] ? '<a href="mailto:' . $showPublishedJobsByLoggedInUser[$idx]['job_email'] . '">' . $showPublishedJobsByLoggedInUser[$idx]['job_email'] . '</a>' : 'E-mail não informado, consulte o link da vaga'); ?></p>
              </div>
              <div class="content">
                <p><strong>Requer experiência?</strong></p>
                <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_experience'] ? 'Sim' : 'Não') ?></p>
              </div>
              <?php if ($showPublishedJobsByLoggedInUser[$idx]['job_observation']) : ?>
                <div class="content">
                  <p><strong>Observação</strong></p>
                  <p><?= ($showPublishedJobsByLoggedInUser[$idx]['job_observation']) ?></p>
                </div>
              <?php endif; ?>
            </div>
            <footer class="card-footer py-4">
              <p class="card-footer-item d-block has-text-left">Publicado no dia
                <strong class="mx-2"><?= date_format(new DateTime($showPublishedJobsByLoggedInUser[$idx]['created_at']), 'd/m/Y'); ?></strong> às
                <strong class="ml-2"><?= date_format(new DateTime($showPublishedJobsByLoggedInUser[$idx]['created_at']), 'H:i:s'); ?></strong>
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
          Você ainda não publicou nenhuma vaga, que tal dar uma olhada nas <a href="<?= base_url('/job') ?>">vagas publicadas?</a>
        </div>
      </article>
    <?php endif; ?>
  </div>
</section>