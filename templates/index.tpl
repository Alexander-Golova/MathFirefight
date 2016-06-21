<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body>
    {include file="header.tpl"}
    <section class="content">
	  <div class="block_caption"><h1 align="center">ИГРА</h1></div>
	  <div class="players">
		<h2 align="center">Игроки</h2>
        <table>
          <tbody>
            {foreach $users as $user}
              <tr class="player" id="user{$user.user_game_id}" onclick="onPlayerClick()">
                <td class="left">{$user.first_name} {$user.last_name}</td>
                <td class="right">{$user.lives}</td>
              </tr>
            {/foreach}
          </tbody>
        </table>
	  </div>

	  <div class="block_center">
		<h2 align="center">Шанс</h2>
		<div class="chance">
		  {$chances}
		</div>
		<p>
		  Выбери слева игрока, в которого желаешь выстрелить, а справа задачу, которую хочешь решить.
		  Набери ответ и нажми на кнопку выстрел.
		</p>
		<form name="response_form" action="php/response.php" method="post" class="response_form">
		  <div class="block_response">
            <input type="text" name="answer" placeholder="Ответ"/>
          </div>
          <div class="button_response">
            <button {if !$isAuth} disabled {/if}>Выстрелить</button>
		  </div>
		</form>
	  </div>

	  <div class="tasks">
	    <h2 align="center">Задачи</h2>
        {foreach $tasks as $task}
          <div class="task" id="task{$task.task_id}" onclick="onTaskClick()">{$task.text_problem}</div>
        {/foreach}
      </div>
    </section>
    {include file="footer.tpl"}
  </body>
</html>