<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body onload="clearCookie()">
    {include file="header.tpl"}
    <section class="content">
	  <div class="block_caption"><h1 align="center">ИГРА</h1></div>
	  <div class="players">
		<h2 align="center">Игроки</h2>
		<div class="player_list">
          <table>
            <tbody class="players_container">
              {foreach $players as $player}
                <tr class="player" id="player{$player.player_id}" onclick="onPlayerClick()">
                  <td class="left">{$player.first_name} {$player.last_name}</td>
                  <td class="right">{$player.lives}</td>
                </tr>
              {/foreach}
            </tbody>
          </table>
        </div>
	  </div>

	  <div class="block_center">
		<h2 align="center">Шансы</h2>
		<div class="chance_container">
		  <p class="chance">{$chances}</p>
		</div>
		<p>
		  Выбери слева игрока, в которого желаешь выстрелить, а справа задачу, которую хочешь решить.
		  Набери ответ и нажми на кнопку выстрел.
		</p>
		<div class="response">
		  <div class="block_response">
            <input id="answer" type="text" name="answer" placeholder="Ответ" autocomplete="off" />
          </div>
          <div class="button_response">
            <button {if !$isAuth} disabled {else} onclick="fire()" {/if}>Выстрелить</button>
		  </div>
		</div>
	  </div>

	  <div class="tasks">
	    <h2 align="center">Задачи</h2>
	    <div class="tasks_list">
          {foreach $tasks as $task}
            <div class="task" id="task{$task.task_id}" onclick="onTaskClick()">{$task.text_problem}</div>
          {/foreach}
        </div>
      </div>
    </section>
    {include file="footer.tpl"}
    <script>viewTasks();</script>
    <script>viewPlayer();</script>
  </body>
</html>