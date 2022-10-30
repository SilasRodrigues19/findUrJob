<section class="hero is-link">
  <div class="hero-body">
    <p class="title">
      Publique uma vaga.
    </p>
    <p class="subtitle mt-4">
      Viu uma vaga e quer compartilhar com mais pessoas ? Publique ela abaixo.
    </p>
     <div class="level-right">
      <p class="level-item ml-6"><a href="#all"><strong>Início</strong></a></p>
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
    </div>
  </div>
</section>

<section class="section my-6">
  <h1 class="title">Informações da vaga</h1>
  <h2 class="subtitle mt-4">
    Preencha os campos abaixo com os dados referente a vaga que deseja publicar.
  </h2>

  <div class="columns">
    <form action="" method="POST" class="column is-6">
      <div class="field">
        <label class="label">Descrição</label>
        <div class="control">
          <input class="input" type="text" placeholder="Descrição da vaga">
        </div>
      </div>

      <div class="field">
        <div class="field has-addons">
            <p class="control">
            <strong class="button is-static">https://</strong>
            </p>
            <p class="control is-expanded">
              <input class="input" type="tel" placeholder="exemplo.com.br">
            </p>
          </div>
          <p class="help">Copie o link da vaga e cole aqui, para evitar escrever errado.</p>
        </div>
      </div>

      <div class="field">
        <label class="label">Nível</label>
        <div class="control">
          <div class="select">
            <select>
              <option value="" disabled selected>Selecione o nível exigido pela vaga</option>
              <?php foreach($listJobLevel as $idx => $value): ?>

                <?= "<option>".$listJobLevel[$idx]['job_level']."</option>" ?>

              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
  
      <div class="field">
        <label class="label">Requer experiência?</label>
        <div class="field is-narrow">
          <div class="control mt-4">
            <label class="radio">
              <input type="radio" name="member">
              Sim
            </label>
            <label class="radio">
              <input type="radio" name="member">
              Não
            </label>
          </div>
        </div>
      </div>


    </form>
  </div>


</section>