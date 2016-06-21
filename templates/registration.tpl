<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body>
    {include file="header.tpl"}
    <section class="content">
      <div class="block_caption">
        <h1 align="center">Регистрация</h1>
      </div>
      <form name="signUpForm" action="php/save_user.php" method="post" class="sign_up_form">
        <div class="block_registration">
          <input type="text" name="firstName" placeholder="Имя"/>
        </div>
        <div class="block_registration">
          <input type="text" name="lastName" placeholder="Фамилия"/>
        </div>
        <div class="block_registration">
          <input type="email" name="email" placeholder="Email"/>
        </div>
        <div class="block_registration">
          <input  type="password" name="password" placeholder="Введите пароль"/>
        </div>
        <div class="block_registration">
          <input  type="password" name="password2" placeholder="Повторите пароль"/>
        </div>
        <div class="button_registration">
          <button>Зарегистрироваться</button>
        </div>
      </form>
    </section>
    {include file="footer.tpl"}
  </body>
</html>