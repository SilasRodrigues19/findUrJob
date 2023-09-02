<section class="hero is-link banner">
  <div class="hero-body">
    <p class="title">
      Denuncias
    </p>
    <p class="subtitle mt-4">
      Preencha os campos abaixo para reportar uma vaga
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
      <?php if ($this->session->userdata('usuario')) : ?>
      <p class="level-item">
        <a href="<?= base_url('/job/published') ?>">
          <span class="iconify mr-2" data-icon="mdi:list-box"></span>
          <span class="is-hidden-mobile">
            Minhas vagas
          </span>
        </a>
      </p>
      <?php endif; ?>
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
  <h2 class="subtitle" id="jobTitle">
    Formulário de denúncias.
  </h2>

  <hr>

  <div class=" columns">
    <form action="" method="POST" class="column is-6">
      <div class="field">
        <label class="label has-text-grey-dark">ID da vaga</label>
        <div class="control">
          <input autocomplete="off" class="input" type="text" placeholder="b540b9753e174c52958a4ddc9783b7fc" name="report_job_id" id="report_job_id">
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Motivo</label>
        <div class="control">
          <div class="select">
            <select name="report_reason" id="report_reason" class="input">
              <option value="" disabled selected>Selecione o motivo da denúncia</option>
              <option value="fraudulent">A vaga parece ser fraudulenta</option>
              <option value="misleading">A vaga parece ser enganosa</option>
              <option value="discriminatory">A vaga parece ser discriminatória</option>
              <option value="illegal">A vaga parece ser ilegal</option>
              <option value="invalid">Não parece ser uma vaga</option>
              <option value="default">Outra informação</option>
            </select>
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
            <input autocomplete="off" class="input" type="tel" placeholder="Fique a vontade pra escrever algo pertinente a vaga" name="report_observation" id="job_observation">
          </p>
        </div>
      </div>

      <hr>

      <div class="field is-grouped">
        <p class="control">
          <button type="submit" class="button is-link is-medium">
            Enviar
          </button>
        </p>
        <p class="control">
          <button id="resetBtn" type="reset" class="button is-light is-medium">
            Limpar
          </button>
        </p>
      </div>

    </form>
  </div>

</section>