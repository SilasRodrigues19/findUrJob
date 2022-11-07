<main class="is-widescreen is-fullhd has-background-light	hero is-fullheight">
  <nav class="level p-4 has-position-fixed-on-top w-100 navbar" role="navigation" aria-label="main navigation">

    <a role="button" class="navbar-burger nav-toggle" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>


    <div id="navbarBasicExample" class="nav-menu"> 

      <div class="navbar-start">
        <!-- Left side -->
        <div class="level-left navbar-item">
          <div class="level-item">
            <p class="subtitle is-5">
              <?= ($countJobs['countJobs'] == 0) ? 'Nenhuma' : "<strong>" . $countJobs['countJobs'] . "</strong>"?> <?= ($countJobs['countJobs'] > 1 ? 'vagas publicadas' : 'vaga publicada') ?> 
            </p>
          </div>
          <form action="" method="POST" id="form-filter">
          <input type="hidden" name="archivejob" id="archivejob">
          <input type="hidden" name="archivejob_id" id="archivejob_id">
            <div class="level-item">
              <div class="field has-addons">
                <p class="control">
                  <input autocomplete="off" class="input" type="text" name="search" id="search" placeholder="Busque uma vaga" value="<?= $search ?>">
                </p>
                <p class="control">
                  <button class="button" type="submit">
                    <span class="iconify mr-1" data-icon="line-md:search" data-rotate="270deg"></span>
                    Pesquisar
                  </button>
                </p>
              </div>
            </div>
          </form>
        </div>
    
        <!-- Right side -->
        <div class="level-right navbar-item navbar-home">
          <p class="level-item ml-6">
            <span class="iconify has-text-grey mb-.1 mr-2" data-icon="bxs:archive-in"></span>
            <a href="<?= base_url('/job/archived') ?>">
              Arquivadas
            </a>
          </p>
          <p class="level-item ml-6">
            <span class="iconify has-text-grey mb-.1 mr-2" data-icon="akar-icons:info-fill"></span>
            <a href="<?= base_url('/job/about') ?>">
              Sobre
            </a>
          </p>
          <p class="level-item ml-6">
            <a href="<?= base_url('/job/new') ?>" class="button is-link is-outlined">
              <span class="iconify mr-2" data-icon="line-md:plus"></span>
              Publicar
            </a>
          </p>
        </div>
      </div>
    </div>

  </nav>

  <section class="section is-full-vh mt-10">

    <?= 
      (isset($search) && strlen($search) > 0) ? 
      '<p class="my-6">Exibindo resultados para: ' . 
        '<strong>' . $search . '</strong>
          <span onclick="removeFilter()" class="removeFilter iconify mb--.2" data-icon="line-md:close-circle"></span>
        </p>' 
        : ''
    ?>


    <h1 class="title has-text-grey-dark">Vagas publicadas</h1>
    <?= showMessage(); ?>
    <h2 class="subtitle my-6">
      Abaixo você pode encontrar todas as <strong class="has-text-grey-dark">vagas publicadas</strong>, ou utilize o filtro do cabeçalho para buscar por algo.
    </h2>

    <div class="notification is-link is-light my-6" id="reportPost">
      <button onclick="closeWarning();" class="delete m-auto"></button>
      <p>Caso encontre alguma publicação que tenha passado pelo filtro e esteja fora do contexto de publicação de vagas, denuncie <a target="_blank" href="<?= base_url('/job/report') ?>"><strong>nesta página.</strong></a></p>
    </div>

    <div class="notification is-transparent my-2" id="rollBackPost">
      <span onclick="revertWarning();" class="iconify rollback" data-icon="grommet-icons:revert"></span>
    </div>

    <div>
      <?php if($showJob): ?>
        <?php foreach($showJob as $idx => $value): ?>
          <?php if(!$showJob[$idx]['job_is_archived']): ?>
          <div class="card my-4">
            <header class="card-header py-4">
              <p class="card-header-title">
                <?= $showJob[$idx]['job_title']; ?>
              </p>
              <button class="card-header-icon" aria-label="Archive item">
                <span class="icon">
                  <span onclick="return handleArchiving( <?=  $showJob[$idx]['job_id'] . ', \'' . $showJob[$idx]['job_title'] . '\' '?> )" class="iconify" data-icon="material-symbols:archive"></span>
                </span>
              </button>
            </header>
            <div class="card-content">
              <div class="content">
                <p><strong>Requisitos da vaga</strong></p>
                <p><?= ($showJob[$idx]['job_requirements'] ? $showJob[$idx]['job_requirements'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Link da vaga</strong></p>
                <p><?= '<a class="job-link" href="'.$showJob[$idx]['job_link'].'" target="_blank">'.$showJob[$idx]['job_link'].'</a>'; ?></p>
              </div>
              <div class="content">
                <p><strong>Senioridade</strong></p>
                <p><?= ($showJob[$idx]['job_level'] ? $showJob[$idx]['job_level'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Salário</strong></p>
                <p><?= ($showJob[$idx]['job_salary'] == '0,00' || $showJob[$idx]['job_salary'] == 'NaN'  ? 'Não informado' : $showJob[$idx]['job_currency_symbol'] . ' ' . $showJob[$idx]['job_salary']); ?></p>
              </div>
              <div class="content">
                <p><strong>Modalidade</strong></p>
                <p><?= ($showJob[$idx]['job_mode'] ? $showJob[$idx]['job_mode'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>Contrato</strong></p>
                <p><?= ($showJob[$idx]['job_contract'] ? $showJob[$idx]['job_contract'] : 'Não informado'); ?></p>
              </div>
              <div class="content">
                <p><strong>E-mail para contato</strong></p>
                <p><?= ($showJob[$idx]['job_email'] ? '<a href="mailto:'.$showJob[$idx]['job_email'].'">'.$showJob[$idx]['job_email'].'</a>' : '<span>E-mail não informado, consulte o <a href="'.$showJob[$idx]['job_link'].'" target="_blank">link da vaga</a></span>'); ?></p>
              </div>
              <div class="content">
                <p><strong>Requer experiência?</strong></p>
                <p><?= ($showJob[$idx]['job_experience'] ? 'Sim' : 'Não') ?></p>
              </div>
              <?php if($showJob[$idx]['job_observation']): ?>
                <div class="content">
                  <p><strong>Observação</strong></p>
                  <p><?= ($showJob[$idx]['job_observation']) ?></p>
                </div>
              <?php endif; ?>
            </div>
            <footer class="card-footer py-4">
              <p class="card-footer-item d-block has-text-left">Publicado no dia
                <strong class="mx-2"><?= date_format(new DateTime($showJob[$idx]['created_at']), 'd/m/Y');?></strong> às 
                <strong class="ml-2"><?= date_format(new DateTime($showJob[$idx]['created_at']), 'H:i:s'); ?></strong>
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
              Não encontramos nenhuma vaga publicada, que tal <a href="<?= base_url('/job/new') ?>">publicar uma?</a>
            </div>
          </article>
      <?php endif; ?>
    </div>

  </section>
</main>