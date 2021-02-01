var parent = document.querySelector("#annoucement-parent");
var selector = ".card";

parent.addEventListener('click', (event) => {
    let closestMatch = event.target.closest(selector);
    if(closestMatch && parent.contains(closestMatch)) {
        console.log(closestMatch.id)

    }
})

function deleteEntry(idOftable) {
    
}