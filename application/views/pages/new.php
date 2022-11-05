<section class="hero is-link banner">
  <?= showMessage(); ?>
  <div class="hero-body">
    <p class="title">
      Publique uma vaga.
    </p>
    <p class="subtitle mt-4">
      Viu uma vaga e quer compartilhar com mais pessoas ? Publique ela abaixo.
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
        <span class="iconify mb-.1 mr-2" data-icon="bxs:archive-in"></span>
        <a href="<?= base_url('/job/archived') ?>">
          Arquivadas
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
  <h1 class="title has-text-grey-dark">Informações da vaga</h1>
  <h2 class="subtitle mt-4">
    Preencha os campos abaixo com os dados referente a vaga que deseja publicar.
  </h2>

  <div class="columns">
    <form action="" method="POST" class="column is-6">
      <div class="field">
        <label class="label has-text-grey-dark">Título</label>
        <div class="control">
          <input autocomplete="off" class="input" type="text" placeholder="Título da vaga" name="job_title" id="job_title">
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Requisitos</label>
        <div class="control">
          <input autocomplete="off" class="input" type="text" placeholder="Requisitos da vaga" name="job_requirements" id="job_requirements">
        </div>
      </div>

      <div class="field">
        <div class="field has-addons">
            <p class="control">
            <strong class="button is-static">Link:</strong>
            </p>
            <p class="control is-expanded">
              <input onblur="return handleLink();" autocomplete="off" class="input" type="text" placeholder="https://exemplo.com.br" name="job_link" id="job_link">
            </p>
          </div>
          <p class="help">Copie o link da vaga e cole aqui, para evitar escrever errado.</p>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Nível</label>
        <div class="control">
          <div class="select">
            <select name="job_level" id="job_level">
              <option value="" disabled selected>Selecione o nível exigido pela vaga</option>
              <option value="senior">Senior</option>
              <option value="pleno">Pleno</option>
              <option value="junior">Júnior</option>
              <option value="trainee">Trainee</option>
              <option value="estagio">Estágio</option>
              <option value="default">Não informado</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Email</label>
        <div class="control">
          <input autocomplete="off" class="input" type="email" placeholder="Email para contato" name="job_email" id="job_email">
        </div>
      </div>

      <div class="field has-addons">
        <p class="control">
          <span class="select">
            <select name="job_currency" id="job_currency">
              <option value="real">R$</option>
              <option value="dollar">$</option>
              <option value="euro">€</option>
            </select>
          </span>
        </p>
        <p class="control">
          <input onchange="return formatCurrency();" autocomplete="off" class="input" type="text" name="job_salary" id="job_salary" placeholder="Salário">
        </p>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Modalidade</label>
        <div class="control">
          <div class="select">
            <select name="job_mode" id="job_mode">
              <option value="" disabled selected>Selecione a modalidade</option>
              <option value="remoto">Remoto</option>
              <option value="presencial">Presencial</option>
              <option value="hibrido">Híbrido</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Contrato</label>
        <div class="control">
          <div class="select">
            <select name="job_contract" id="job_contract">
              <option value="" disabled selected>Selecione o tipo de contrato</option>
              <option value="clt">CLT</option>
              <option value="clt flex">CLT Flex</option>
              <option value="pj">PJ</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label has-text-grey-dark">Requer experiência?</label>
        <div class="field is-narrow">
          <div class="control mt-4">
            <label class="radio">
              <input type="radio" value="1" name="job_experience">
              Sim
            </label>
            <label class="radio">
              <input type="radio" value="0" name="job_experience" checked>
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
              <input autocomplete="off" class="input" type="tel" placeholder="Fique a vontade pra escrever algo pertinente a vaga" name="job_observation" id="job_observation">
            </p>
          </div>
      </div>

      <hr>

      <div class="field is-grouped">
        <p class="control">
          <button onclick="return validateFields()" type="submit" class="button is-link is-medium">
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
