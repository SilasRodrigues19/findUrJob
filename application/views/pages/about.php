
<section class="hero is-link banner">
  <?= showMessage(); ?>
  <div class="hero-body">
    <p class="title">
      Sobre
    </p>
    <p class="subtitle mt-4">
      Como surgiu o projeto e qual é o seu propósito.
    </p>
    <div class="level-right item-menu">
      <p class="level-item">
        <span class="iconify mb-.1 mr-2" data-icon="entypo:home"></span>
        <a href="<?= base_url('/') ?>">
          <strong>
            Início
          </strong>
        </a>
      </p>
      <p class="level-item">
        <span class="iconify mb-.1 mr-2" data-icon="majesticons:textbox-plus"></span>
        <a href="<?= base_url('/job/new') ?>">
          Publicar
        </a>
      </p>
      <p class="level-item">
        <span class="iconify mb-.1 mr-2" data-icon="bxs:archive-in"></span>
        <a href="<?= base_url('/job/archived') ?>">
          Arquivadas
        </a>
      </p>
      <?php $this->load->view('templates/logged_in_header.php') ?>
    </div>
  </div>
</section>

<section class="section my-6">
  <h1 class="title has-text-grey-dark">Sobre o projeto.</h1>
  <h2 class="subtitle mt-4 about-text">
    Este projeto foi feito com o objetivo de organizar em um único lugar diversas vagas que são encontradas em outros sites de vagas.
  </h2>

  <h2 class="subtitle mt-4 about-text">
    Aqui, qualquer pessoa pode publicar uma vaga que viu em algum lugar, basta preencher os campos necessários e publicar. Essas vagas publicadas
    são listadas na página inicial em formato de cartões e a pessoa que acessar para visualizar pode facilmente encontrar as informações que ela
    está a procura, inclusive existe um filtro no cabeçalho que pode auxilizar para encontrar mais facilmente alguma informação.
  </h2>

</section>

<hr>

<section class="section my-6">
  <h1 class="title has-text-grey-dark">Informações para desenvolvedores.</h1>
  <h2 class="subtitle mt-4 about-text">
    O projeto foi feito utilizando o framework CodeIgniter 4, que é um framework PHP que utiliza o padrão MVC (Model, View, Controller) e
    foi feito com o objetivo de ser um framework leve e simples de usar, porém com muitas funcionalidades que facilitam o desenvolvimento de
    aplicações web. Para a parte de estilização foi utilizado o framework Bulma e algumas coisas mais especificas feitas a mão com a ajuda do 
    pré processador SASS e os dados são salvos em um banco de dados MySQL.
  </h2>

  <h2 class="subtitle mt-4 about-text">
    O projeto é <em>open-source</em> e está hospedado no GitHub que pode ser acessado através 
    <a href="https://github.com/SilasRodrigues19/findUrJob" target="_blank">deste link.</a>
  </h2>
</section>