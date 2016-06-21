<header class="header">
  <div class="header_button logo">
    <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
  </div>
  <div class="header_button">
    <a href="rules.php">Правила</a>
  </div>
  <div class="header_button">
    <a href="best_games.php">Лучшие игроки</a>
  </div>
  <div class="header_button">
    <a href="archive.php">Архив</a>
  </div>
  <div class="header_button">
    {if $isAuth}
       <a href="php/logout.php">Выйти</a>
    {else}
      <a href="login.php">Вход</a>
    {/if}
  </div>
  <div class="clear"></div>
</header>