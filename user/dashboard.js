let announceCount = 2;
function loadmoreannoucements() {
    announceCount = announceCount + 2
	let ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
        if(ajax.readyState === 4) {
            document.getElementById("annoucements").innerHTML = ajax.response;
            
        }
    };
    ajax.open("GET" , "annoucements.php?announceCount=" + announceCount, true)
    ajax.send()
}
