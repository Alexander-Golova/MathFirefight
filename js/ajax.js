var GET_TASKS_URL         = "php/get_tasks.php";
var GET_PLAYER_URL        = "php/get_player.php";
var RESPONSE_URL          = "php/response.php";
var GETTER_TIME_INTERVAL  = 10000;

function getCookie(cookieName)
{
    var name = cookieName + "=";
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++)
    {
        var cookie = cookies[i];
        while (cookie.charAt(0) == " ")
        {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) == 0)
        {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}

function viewTasks()
{
    setInterval(getTasks, GETTER_TIME_INTERVAL);
}

function viewPlayer()
{
    setInterval(getPlayer, GETTER_TIME_INTERVAL);
}

function getTasks()
{
    $.ajax({
        url: GET_TASKS_URL,
        method: 'GET',
        dataType: 'json',
        success: onSuccessTasks,
        error: onError
    });
}

function getPlayer()
{
    $.ajax({
        url: GET_PLAYER_URL,
        method: 'GET',
        dataType: 'json',
        success: onSuccessPlayer,
        error: onError
    });
}

function fire()
{
    $.ajax({
        url: RESPONSE_URL,
        method: 'POST',
        dataType: 'json',
        data: {
            "answer": $("#answer").val(),
            "targetTask": getCookie("targetTask"),
            "targetPlayer": getCookie("targetPlayer")
        },
        success: onSuccessFire,
        error: onError
    });
}

function onSuccessTasks(data, jqXhr, textStatus)
{
    var tasks = (data["tasks"] !== undefined) ? data["tasks"] : "undefined";

    $("div.task").remove();
    tasks.forEach(function(item, i, tasks){
        var task_id = "task" + item["task_id"];
        $(".tasks_list").append("<div class='task' id=" + task_id + '" ' + "onclick='onTaskClick();'>" + item["text_problem"] + "</div>");
    });
}

function onSuccessPlayer(data, jqXhr, textStatus)
{
    var players = data["players"];

    $(".player").remove();
    players.forEach(function(item, i, players){
        var id = "user" + item["player_id"];
        $(".players_container").append(
            "<tr class='player' id='" + id + "' " + "onclick='onPlayerClick();'>" +
              "<td class='left'>" + item["first_name"] + ' ' + item["last_name"] + "</td>" +
              "<td class='right'>" + item["lives"] + "</td>" +
            "</tr>");
    });
}

function onSuccessFire(data, jqXhr, textStatus)
{
    $("#answer").val("");
    $(".chance").remove();
    var chances = data["chances"]["hitChance"] + " : " + data["chances"]["missChance"];
    $(".chance_container").append("<p class='chance'>" + chances + "</p>");

    getTasks();
    getPlayer();
}

function onError(jqXhr, textStatus, errorThrown)
{
    var errorInfo = jqXhr.status + ': ' + jqXhr.statusText;
    console.error('Произошла ошибка! ' + errorInfo);
}
