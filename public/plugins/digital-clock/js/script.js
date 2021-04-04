$(document).ready(function(){
	function displayTime(){

		var currentTime = new Date(); //Initializing current time
		var hours = currentTime.getHours(); //Initializing current hour
		var minutes = currentTime.getMinutes(); //Initializing current minute
		var seconds = currentTime.getSeconds(); //Initializing current seconds
		var meridiem = "WIB"; //Set default value for meridiem

		//Set clock in 24 hour mode
		if(hours > 24)
		{
			hours = hours - 24;
			meridiem = "WIB"
		}

		//Replace 0 with 24
		if(hours === 0)
		{
			hours = 0;
		}
		//Concat 0 value less than 10
		if(hours < 10)
		{
			hours = "0" + hours;
		}
		if(minutes < 10)
		{
			minutes = "0" + minutes;
		}
		if (seconds < 10) 
		{
			seconds = "0" + seconds;
		}

		var clockDiv = document.getElementById('clock');

		clockDiv.innerText = hours + ":" + minutes + ":" + seconds+" "+meridiem;
	}

	//Calling function after every 1 second
	setInterval(displayTime, 1000);
});