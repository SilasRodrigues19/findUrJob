<section class="hero is-link banner">
  <div class="hero-body">
    <p class="title">
        <?= isset($job) ? 'Editando a vaga: ' . $job['job_title'] : 'Publique uma vaga.' ?>
    </p>
    <p class="subtitle mt-4">
      <?= isset($job) ? 'Confira os campos abaixo e edite o que for necessário.' : 'Viu uma vaga e quer compartilhar com mais pessoas ? Publique ela abaixo.' ?>
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
        <a href="<?= base_url('/job/archived') ?>">
          <span class="iconify mr-2" data-icon="bxs:archive-in"></span>
          <span class="is-hidden-mobile">
            Arquivadas
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
  <?= showMessage(); ?>
  <h1 class="title has-text-grey-dark">Informações da vaga</h1>
  <h2 class="subtitle mt-4">
    Preencha os campos abaixo com os dados referente a vaga que deseja publicar.
  </h2>

  <div class="columns">
    <form action="" method="POST" class="column is-6">
      <div class="field">
        <label class="label has-text-grey-dark">Título</label>
        <div class="control">
          <input autocomplete="off" class="input" type="text" placeholder="Título da vaga" name="job_title" id="job_title"
            value="<?= isset($job) ? $job['job_title'] : $job_title ?>"
          >
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Requisitos</label>
        <div class="control">
          <input autocomplete="off" class="input" type="text" placeholder="Requisitos da vaga" name="job_requirements" 
          value="<?= isset($job) ? $job['job_requirements'] : $job_requirements ?>" 
          id="job_requirements">
        </div>
      </div>

      <div class="field">
        <div class="field has-addons">
          <p class="control">
            <strong class="button is-static">Link:</strong>
          </p>
          <p class="control is-expanded">
            <input autocomplete="off" class="input" type="text" placeholder="https://exemplo.com.br" name="job_link" value="<?= isset($job) ? $job['job_link'] : $job_link ?>" id="job_link">
          </p>
        </div>
        <p class="help">Copie o link da vaga e cole aqui, para evitar escrever errado.</p>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Nível</label>
        <div class="control">
          <div class="select">
            <select class="select" name="job_level" id="job_level">
              <option value="" disabled selected>Selecione o nível exigido pela vaga</option>
              <?php
              $options = [
                'senior' => 'Sênior',
                'pleno' => 'Pleno',
                'junior' => 'Júnior',
                'trainee' => 'Trainee',
                'estagio' => 'Estágio',
                'default' => 'Não informado'
              ];

              foreach ($options as $value => $text) {
                $selected = isset($job) && $job['job_level'] === $value ? 'selected' : '';
                echo "<option value=\"$value\" $selected>$text</option>";
              }

                if (isset($job)) {
                        echo "<option value=\"" . $job['job_level'] . "\" selected>" . $job['job_level'] . "</option>";
                    }              
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark" id="mailLabel">Email</label>
        <div class="control">
          <input autocomplete="off" class="input" type="email" placeholder="Deixar em branco caso não houver" name="job_email" value="<?= isset($job) ? $job['job_email'] : $job_email ?>" id="job_email">
        </div>
      </div>

      <div class="field has-addons">
        <p class="control">
          <span class="select error-wrapper">
            <select class="select" name="job_currency" id="job_currency">
              <option value="real">R$</option>
              <option value="dollar">$</option>
              <option value="euro">€</option>
            </select>
          </span>
        </p>
        <p class="control">
          <input onchange="return formatCurrency();" autocomplete="off" class="input" type="text" name="job_salary" value="<?= isset($job) ? $job['job_salary'] : $job_salary ?>" id="job_salary" placeholder="Salário">
        </p>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Modalidade</label>
        <div class="control">
          <div class="select">
            <select class="select" name="job_mode" id="job_mode">
              <option value="" selected disabled>Selecione a modalidade</option>
              <?php
              $options = [
                'remoto' => 'Remoto',
                'presencial' => 'Presencial',
                'hibrido' => 'Híbrido'
              ];

              foreach ($options as $value => $text) {
                $selected = $job_mode === $value ? 'selected' : '';
                echo "<option value=\"$value\" $selected>$text</option>";
              }

              if (isset($job)) {
                        echo "<option value=\"" . $job['job_mode'] . "\" selected>" . $job['job_mode'] . "</option>";
                    } 
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Contrato</label>
        <div class="control">
          <div class="select">
            <select class="select" name="job_contract" id="job_contract">
                <option value="" disabled>Selecione o tipo de contrato</option>
                <?php
                $contractOptions = ['CLT', 'CLT Flex', 'PJ'];

                foreach ($contractOptions as $option) {
                    $selected = (isset($job) && $job['job_contract'] === $option) ? 'selected' : '';
                    echo "<option value=\"$option\" $selected>" . ucwords($option) . "</option>";
                }

                if (isset($job)) {
                    echo "<option value=\"" . $job['job_contract'] . "\" selected>" . ucwords($job['job_contract']) . "</option>";
                }
                ?>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Requer experiência?</label>
        <div class="field is-narrow">
          <div class="control mt-4">
            <label class="radio">
              <input type="radio" value="1" name="job_experience" value="<?= isset($job) ? $job['job_experience'] : $job_experience ?>">
              Sim
            </label>
            <label class="radio">
              <input type="radio" value="0" name="job_experience" value="<?= isset($job) ? $job['job_experience'] : $job_experience ?>" checked>
              Não
            </label>
          </div>
        </div>
      </div>

      <button onclick="return toggleObservation()" type="button" class="button is-link is-small" id="btnObservation">
        Adicionar observação
      </button>

      <div class="field d-none  my-4" id="observation">
        <div class="field has-addons">
          <p class="control">
            <strong class="button is-static">Observação:</strong>
          </p>
          <p class="control is-expanded">
            <input autocomplete="off" class="input" type="tel" placeholder="Fique a vontade pra escrever algo pertinente a vaga" name="job_observation" value="<?= isset($job) ? $job['job_observation'] : $job_observation ?>" id="job_observation">
          </p>
        </div>
      </div>

      <hr>

      <div class="field is-grouped">
        <p class="control">
          <button name="send" value="<?= $send ?>" type="submit" class="button is-link is-medium">
            Enviar
          </button>
        </p>
        <p class="control">
          <button type="reset" class="button is-light is-medium">
            Limpar
          </button>
        </p>
      </div>

    </form>
  </div>


</section>