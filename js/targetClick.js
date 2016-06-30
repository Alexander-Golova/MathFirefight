function onPlayerClick()
{
    $(".player").click(function() {
        $(".player").css("background", "#6cf0c1");
        $(this).css("background", "#ff8940");
        document.cookie = "targetPlayer = " + this.id;
    });
}

function onTaskClick()
{
    $(".task").click(function() {
        $(".task").css("background", "#6cf0c1");
        $(this).css("background", "#ff8940");
        document.cookie = "targetTask = " + this.id;
    });
}

function clearCookie()
{
    document.cookie = "targetTask = " + "";
    document.cookie = "targetPlayer = " + "";
}