<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body>
    {include file="header.tpl"}
    <section class="content">
      <div class="block_caption">
        <h1 align="center">Вход</h1>
      </div>
      <form name="signUpForm" action="php/login.php" method="post" class="sign_up_form">
        <div class="block_login">
          <input type="email" name="email" placeholder="Введите email" />
        </div>
        <div class="block_login">
          <input type="password" name="password" placeholder="Введите пароль" />
        </div>
        <a href="registration.php">Регистрация</a>
        <div class="button_login">
          <button>Ввойти</button>
        </div>
      </form>
    </section>
    {include file="footer.tpl"}
  </body>
</html>