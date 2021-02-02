let parent = document.querySelector("#annoucement-parent");
let selector = ".card";
let sortdropdown = document.getElementById("sortmethod");


parent.addEventListener("click", (event) => {
	let closestMatch = event.target.closest(selector);
	if (closestMatch && parent.contains(closestMatch)) {
        console.log(closestMatch.id);
        if(confirm("Are you sure to delete annoucement with an id of " + closestMatch.id + "?")){
            deleteEntry(closestMatch.id);
        } else {
            alert("Nothing has changed!");
        }
	}
});

sortdropdown.addEventListener("change",() => {
	let ajax = new XMLHttpRequest();
	ajax.onreadystatechange = () => {
		if(ajax.readyState === 4) {
			redraw(ajax.responseText)
		} 
	}
	let urlConstruct = "sortannoucement.php?sort=" + sortdropdown.value
	ajax.open("GET" , urlConstruct, true)
	ajax.send()
	console.log(sortdropdown.value);
})

function deleteEntry(idOftable) {
	let ajax = new XMLHttpRequest();
	ajax.onreadystatechange = () => {
		if (ajax.readyState === 4) {
            console.dir(ajax.responseText);
            if(ajax.responseText == "\"Success\"") {
                location.reload()
            }
		}
	};

	let ajaxConstruct = "deleteAnnoucement=" + idOftable;

	ajax.open("GET", "deleteannouncement.php?" + ajaxConstruct, true);
	ajax.send();
}

function redirectToAdd() {
	window.location.href = "addannoucement.php";
}
function redraw(message) {
	let redraw = document.getElementById("annoucement-parent")
	redraw.innerHTML = message;
}