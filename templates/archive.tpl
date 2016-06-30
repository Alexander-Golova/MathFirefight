<!DOCTYPE HTML>
<html>
  {include file="head.tpl"}
  <body>
    {include file="header.tpl"}
    <section class="content">
      <div class="block_caption"><h1 align="center">Архив задач</h1></div>
        <div class="archive">
          {foreach $archive_tasks as $archive_task}
            <div class="tasks_archive">
              <p>
                {$archive_task.text_problem}
              </p>
              <a href="#" class="solution_button" id="solution_button{$archive_task.archive_task_id}">
                Ответ:<p class="solution" id="solution{$archive_task.archive_task_id}">{$archive_task.response_task}</p>
              </a>
            </div>
          {/foreach}
        </div>
    </section>
    {include file="footer.tpl"}
    <script src="js/showTaskSolution.js"></script>
  </body>
</html>