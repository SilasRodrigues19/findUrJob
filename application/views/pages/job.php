<main class="is-widescreen is-fullhd has-background-light	hero is-fullheight">
  <nav class="level p-4">
    <!-- Left side -->
    <div class="level-left">
      <div class="level-item">
        <p class="subtitle is-5">
          <strong><?= $countJobs['countJobs'] ?></strong> <?= ($countJobs['countJobs']) > 1 ? 'vagas publicadas' : 'vaga publicada' ?> 
        </p>
      </div>
      <div class="level-item">
        <div class="field has-addons">
          <p class="control">
            <input class="input" type="text" placeholder="Busque uma vaga">
          </p>
          <p class="control">
            <button class="button">
              <span class="material-symbols-outlined mr-4">
                search
              </span>
              Pesquisar
            </button>
          </p>
        </div>
      </div>
    </div>

    <!-- Right side -->
    <div class="level-right">
      <p class="level-item ml-6"><a href="#all"><strong>Todas</strong></a></p>
      <p class="level-item ml-6">
        <a href="#archived">
          Arquivadas
        </a>
      </p>
      <p class="level-item ml-6">
        <a href="#about">
          Sobre
        </a>
      </p>
      <p class="level-item ml-6">
        <a href="#publish" class="button is-link is-outlined">
          <span class="material-symbols-outlined mr-2">
            add
          </span>
          Publicar
        </a>
      </p>
    </div>
  </nav>

  <section class="section is-full-vh">
    <h1 class="title has-text-grey-dark">Vagas publicadas</h1>
    <h2 class="subtitle mt-6">
      Abaixo você pode encontrar todas as <strong class="has-text-grey-dark">vagas publicadas</strong>, ou utilize o filtro do cabeçalho para buscar por algo.
    </h2>

    <div class="notification is-link is-light" id="reportPost">
      <button onclick="removeNotification();" class="delete m-auto"></button>
      <p>Caso encontre alguma publicação que tenha passado pelo filtro e esteja fora do contexto de publicação de vagas, denuncie <a href="#report"><strong>nesta página.</strong></a></p>
    </div>

    <div>
      <table class="table is-bordered has-background-transparent">
        <thead>
          <tr>
            <td>Descrição da vaga</td>
            <td>Link da vaga</td>
            <td>Senioridade</td>
            <td>Requer experiência?</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach($showJob as $idx => $value): ?>
              <?= '<td>'.$showJob[$idx]['job_description'].'</td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_link'].'</td>';  ?>
              <?= '<td>'.$showJob[$idx]['job_level'].'</td>';  ?>
              <?= '<td>'.($showJob[$idx]['job_experience'] ? 'Sim' : 'Não').'</td>';  ?>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>
    </div>

  </section>
</main>