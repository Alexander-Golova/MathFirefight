<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body>
    {include file="header.tpl"}
    <section class="content">
      <div class="block_best">
        <h2 align="center">Победители</h2>
          <table>
            <tbody>
              {foreach $best_users as $best_user}
                <tr class="player">
                  <td class="left">{$best_user.first_name} {$best_user.last_name}</td>
                  <td class="right">{$best_user.lives}</td>
                </tr>
              {/foreach}
            </tbody>
        </table>
      </div>
      <div class="block_best">
        <h2 align="center">Популярные мишени</h2>
          <table>
            <tbody>
              {foreach $popular_targets as $popular_target}
                <tr class="player">
                  <td class="left">{$popular_target.first_name} {$popular_target.last_name}</td>
                  <td class="right">{$popular_target.target}</td>
                </tr>
              {/foreach}
            </tbody>
        </table>
      </div>
    </section>
    {include file="footer.tpl"}
  </body>
</html>