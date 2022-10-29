<!doctype html>
<html>
 <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@200;300&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
   <title><?= $title; ?></title>
   <style>
   * {
    padding: 0;
    margin: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    font-family: Kodchasan, sans-serif, 'Open Sans', sans-serif;
}

body {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    width: 100%;
    height: 100vh;
    background-image: url(<?= base_url('/public/img/404-bg.svg'); ?>), -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a6c1ee));
    background-image: url(<?= base_url('/public/img/404-bg.svg'); ?>), linear-gradient(to top, #fbc2eb 0, #a6c1ee 100%);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: bottom center;
}

header,
footer {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    width: 100%;
    height: 70px;
    background-color: rgba(50, 50, 50, .1);
    -webkit-box-shadow: 0 5px 20px rgba(1, 1, 1, .2);
    box-shadow: 0 5px 20px rgba(1, 1, 1, .2);
    padding: 0 10px;
}

footer {
    position: absolute;
    left: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
    color: #cacaca;
}

.menu {
    list-style: none;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    width: 100%;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    margin: 0 auto;
}

.menu li a {
    font-family: 'Open Sans', sans-serif;
    font-size: 12px;
    text-transform: uppercase;
    color: rgba(71, 11, 169, .6);
    background-color: transparent;
    border: 2px solid rgba(71, 11, 169, .6);
    border-radius: 15px;
    font-weight: 600;
}

.menu li a:hover {
    background-color: rgba(71, 11, 169, .6);
    color: #cacaca;
}

.menu li a {
    font-family: 'Open Sans', sans-serif;
    background-color: transparent;
    border: 2px solid rgba(71, 11, 169, .6);
    text-transform: uppercase;
    color: rgba(71, 11, 169, .6);
    border-radius: 15px;
    font-weight: 600;
    display: block;
    text-decoration: none;
    letter-spacing: 4.5px;
    padding: 10px 20px 10px 20px;
    border-radius: 25px;
}

.menu li a:hover {
    background-color: rgba(71, 11, 169, .6);
    color: #cacaca;
}

.intro {
    width: 100%;
    height: calc(100vh - 210px);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
}

.intro::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: #111;
    opacity: .5;
    z-index: -1;
}

.intro h1,
p {
    letter-spacing: 5.5px;
    color: #ccc;
    margin-top: 55px;
    font-weight: 600;
    text-shadow: #333 2px 4px 6px;
}

h1 {
    font-size: 30px;
}

p {
    font-size: 18px;
}

img {
    width: 100%;
    border-radius: 10px;
}

@media only screen and (max-width:500px) {
    body {
        background-size: contain;
    }
    header {
        padding: 0;
    }
    h1 {
        font-size: 16px;
    }
    p {
        font-size: 14px
    }
    .intro {
        padding: 20px;
    }
    .intro h1,
    p {
        margin-top: 20px;
    }
    .menu {
        -webkit-box-pack: flex-end;
        -ms-flex-pack: right-end;
        justify-content: right-end;
        margin-right: 10px;
    }
    .menu li a {
        font-size: 12px;
    }
}
   </style>
 </head>
 <body>
   <div>
     <header>
        <ul class="menu">
            <li>
                <a href="<?= base_url(); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 4l-8 8l8 8"/></svg>
                </a>
            </li>
        </ul>
    </header>

    <section class="intro">
        <h1>Página não encontrada</h1>
        <p>Utilize o menu para voltar para uma página válida
        </p>
    </section>
    <footer>
            <?= 'Copyright &copy ' . date('Y') .  ' - Silas Rodrigues' ?>
    </footer>
   </div>
 </body>
</html>