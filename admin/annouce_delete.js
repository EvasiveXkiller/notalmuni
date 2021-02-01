let parent = document.querySelector("#annoucement-parent");
let selector = ".card";

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
