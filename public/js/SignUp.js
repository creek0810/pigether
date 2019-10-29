function goToHome(event){
	window.location=`http://127.0.0.1:8000/pigether`;
}

function goToSignIn() {
	window.location=`http://127.0.0.1:8000/pigether/signIn`;
}

function buttonCheck() {
	document.getElementById("signIn").onclick = goToSignIn;
	//document.getElementById("signUp").onclick = goToHome;
}

window.onload = buttonCheck;