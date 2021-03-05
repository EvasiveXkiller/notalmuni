class TxtRotate {
    constructor(element, toRotate, period) {
        this.toRotate = toRotate;
        this.internal = element;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = "";
        this.tick();
        this.isDeleting = false;
    }
    tick() {
        var length = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[length];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.internal.innerHTML = '<span class="wrap">' + this.txt + "</span>";

        let this2 = this;
        let rngTime = 300 - Math.random() * 100;

        if (this.isDeleting) {
            rngTime /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            rngTime = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === "") {
            this.isDeleting = false;
            this.loopNum++;
            rngTime = 500;
        }

        setTimeout(function () {
            this2.tick();
        }, rngTime);
    }
}

function redirectToSignup(){
    window.location.href = "./registerpage.php"
}
function redirectToLogin(){
    window.location.href = "./loginpage.php"
}

window.addEventListener("load",() => {
    let elements = document.getElementsByClassName("txt-rotate");
	for (let i = 0; i < elements.length; i++) {
		var toRotate = elements[i].getAttribute("data-rotate");
		var period = elements[i].getAttribute("data-period");
		if (toRotate) {
			new TxtRotate(elements[i], JSON.parse(toRotate), period);
		}
	}
})
