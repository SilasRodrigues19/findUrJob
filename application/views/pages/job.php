<main class="is-widescreen is-fullhd has-background-light	hero is-fullheight">
  <nav class="level p-4 has-position-fixed-on-top w-100">
    <!-- Left side -->
    <div class="level-left">
      <div class="level-item">
        <p class="subtitle is-5">
          <strong><?= $countJobs['countJobs'] ?></strong> <?= ($countJobs['countJobs']) > 1 ? 'vagas publicadas' : 'vaga publicada' ?> 
        </p>
      </div>
      <form action="" method="POST" id="form-filter">
        <div class="level-item">
          <div class="field has-addons">
            <p class="control">
              <input autocomplete="off" class="input" type="text" name="search" id="search" placeholder="Busque uma vaga">
            </p>
            <p class="control">
              <button class="button" type="submit">
                <span class="material-symbols-outlined mr-4">
                  search
                </span>
                Pesquisar
              </button>
            </p>
          </div>
        </div>
      </form>
    </div>

    <!-- Right side -->
    <div class="level-right">
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
          <span class="material-symbols-outlined mr-2">
            add
          </span>
          Publicar
        </a>
      </p>
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
      <button onclick="removeNotification();" class="delete m-auto"></button>
      <p>Caso encontre alguma publicação que tenha passado pelo filtro e esteja fora do contexto de publicação de vagas, denuncie <a target="_blank" href="<?= base_url('/job/report') ?>"><strong>nesta página.</strong></a></p>
    </div>

    <div>
      <table class="table is-hoverable is-fullwidth has-background-transparent has-datatable pt-6 my-4">
        <caption class="subtitle">Painel de vagas.</caption>
        <thead>
          <tr>
            <td class="has-text-centered">
              Descrição da vaga
            </td>
            <td class="has-text-centered">
              Link da vaga
            </td>
            <td class="has-text-centered">
              Nível
            </td>
            <td class="has-text-centered">
              Salário
            </td>
            <td class="has-text-centered">
              Moeda
            </td>
            <td class="has-text-centered">
              Modalidade
            </td>
            <td class="has-text-centered">
              Requer experiência?
            </td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($showJob as $idx => $value): ?>
            <tr class="has-text-centered">
              <?= '<td>'.$showJob[$idx]['job_description'].'</td>';  ?>
              <?= '<td><a class="job-link" href="'.$showJob[$idx]['job_link'].'" target="_blank">'.$showJob[$idx]['job_link'].'</a></td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_level'].'</td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_salary'].'</td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_currency'].'</td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_mode'].'</td>';  ?>
              <?= '<td>'.($showJob[$idx]['job_experience'] ? 'Sim' : 'Não').'</td>';  ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </section>
</main>