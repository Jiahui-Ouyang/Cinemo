let star = document.querySelectorAll('input');
let showValue = document.querySelector('#rating-value');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('onclick', function () {
		i = this.value;
		//localStorage.setItem("Ratingstars", i);
		showValue.innerHTML = i + " out of 5";

	});
}