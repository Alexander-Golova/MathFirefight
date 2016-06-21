function showSolution() // TODO: bad name
{
	/*var button = document.getElementById("solution1");
	if (button.style.display == "inline-block")
	{
		button.style.display = "none";
	}
	else
	{
		button.style.display = "inline-block";
	}
*/
    $(".solution_button").click(function() {
        $(".solution:first-child").css("display", "inline-block");
    });

}
