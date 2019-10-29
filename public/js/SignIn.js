function goToHome(event){
	window.location=`http://127.0.0.1:8000/pigether`;
}

function goToSignUp() {
	window.location=`http://127.0.0.1:8000/pigether/signUp`;
}

function buttonCheck() {
	document.getElementById("signUp").onclick = goToSignUp;
	//document.getElementById("signIn").onclick = goToHome;
}

window.onload = buttonCheck;