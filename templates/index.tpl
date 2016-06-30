<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body onload="clearCookie();">
    {include file="header.tpl"}
    <section class="content">

	  <div class="block_caption"><h1 align="center">Войти в игру</h1></div>
	  <div class="players">
		<h2 align="center">Игроки</h2>
		<div class="player_list">
          <table>
            <tbody class="players_container">
              {foreach $players as $player}
                <tr class="player" id="player{$player.player_id}">
                  <td class="left">{$player.first_name} {$player.last_name}</td>
                  <td class="right">{$player.lives}</td>
                </tr>
              {/foreach}
            </tbody>
          </table>
        </div>
	  </div>

	  <div class="add_game">
		<p>
		  Для того, чтобы начать играть в интеллектуальной игре Математическая перестрелка, вам необходимо:
		</p>
		<p>
		  1. Зарегистрироваться, если вы ещё не зарегистрированы. <a href="registration.php">Регистрация</a>
		</p>
		<p>
		  2. Войти на сайт за 20 минут до начала игры. <a href="login.php">Вход</a>
		</p>
		<p>
		  3. Вступить в игру.
		</p>
		{if !$doesGameStart}
		  <form name="enter_game" action="php/enter_game.php" method="post" class="enter_game">
            <div class="enter_game">
              <button {if !$isAuth} disabled {/if}>Вступить в игру</button>
		    </div>
		  </form>
        {/if}
	  </div>

	  <div class="start_time">
        <p align="center">
          Ближайшая игра состоится
        </p>
        <p align="center">
          <b>{$startDateGame.day} {$startDateGame.month} {$startDateGame.year} в {$startTimeGame}</b>
        </p>
        <p>
          <b>Тема игры:</b> основные комбинаторные принципы.
        </p>
        <p>
          Перед игрой повторите правило суммы и произведения, разупорядочивание, перестановки, размещения
          и сочетания без повторения.
        </p>
      </div>
    </section>
    {include file="footer.tpl"}
  </body>
</html>