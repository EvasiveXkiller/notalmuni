document.getElementById("searchtype").addEventListener("change", () => {
	let typeselector = document.getElementById("searchtype");
	let type = typeselector.options[typeselector.selectedIndex].text;
	console.log(type);
	let searchbox = document.getElementById("dynamicsearchbox");
	let newinput;
	switch (typeselector.selectedIndex) {
		case 0:
			newinput = document.createElement("input");
			document.getElementById("dynamicsearchheading").innerHTML = "ID:";
			searchbox.innerHTML = "";
			newinput.setAttribute("type", "number");
			newinput.setAttribute("name", "searchbox");
			searchbox.appendChild(newinput);
			break;
		case 1:
			newinput = null;
			newinput = document.createElement("input");
			document.getElementById("dynamicsearchheading").innerHTML = "Name:";
			searchbox.innerHTML = "";
			newinput.setAttribute("type", "text");
			newinput.setAttribute("name", "searchbox");
			newinput.setAttribute("id", "inputoverride");
			newinput.setAttribute("list", "allnames");
			searchbox.appendChild(newinput);
			break;
	}
});

window.addEventListener("load", () => {
	let datalistajax = new XMLHttpRequest();
	datalistajax.onreadystatechange = () => {
		document.getElementById("allnames").innerHTML =
			datalistajax.responseText;
	};
	datalistajax.open("GET", "searchengine.php");
	datalistajax.send();
});
