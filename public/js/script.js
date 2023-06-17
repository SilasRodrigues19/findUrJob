let notificationBox = document.querySelector("#reportPost"),
	rollBackPost = document.querySelector("#rollBackPost");

document.addEventListener("DOMContentLoaded", () => {
	document.body.contains(rollBackPost) && rollBackPost.classList.add("d-none");
});

const levelItems = document.querySelectorAll(".level-item");

const isMobile = navigator.userAgent.match(
	/Tablet|iPad|iPod|iPhone|Android|webOS|BlackBerry|Windows Phone/i
);

levelItems.forEach((levelItem) => {
	levelItem.classList.add(isMobile ? "mx-1" : "mx-4");
});


window.history.replaceState &&
	window.history.replaceState(null, null, window.location.href);

const showAlertBox = (title, text, icon) => {
	Swal.fire({
		title: title,
		html: text,
		icon: icon,
		showClass: {
			popup: "animate__animated animate__zoomIn",
		},
		hideClass: {
			popup: "animate__animated animate__zoomOut",
		},
		allowOutsideClick: false,
		allowEscapeKey: false,
		allowEnterKey: false,
		confirmButtonText: "Fechar",
	});
};

const removeFilter = () => {
	let search = document.querySelector("#search"),
		formFilter = document.querySelector("#form-filter");
	search.value = "";
	setTimeout(() => {
		formFilter.submit();
		location.reload();
	}, 1000);
};

const closeWarning = () => {
	notificationBox.classList.add("d-none");
	rollBackPost.classList.remove("d-none");
};

const revertWarning = () => {
	notificationBox.classList.remove("d-none");
	rollBackPost.classList.add("d-none");
};

const showMessage = document.querySelector(".showMessage");

if (document.body.contains(showMessage)) {
	setTimeout(() => {
		showMessage.classList.add("d-none");
	}, 5000);
}

const job_title = document.querySelector("#job_title"),
	job_link = document.querySelector("#job_link"),
	job_level = document.querySelector("#job_level"),
	job_currency = document.querySelector("#job_currency"),
	job_salary = document.querySelector("#job_salary"),
	job_mode = document.querySelector("#job_mode"),
	job_contract = document.querySelector("#job_contract");

	
const formatCurrency = () => {
	let salary = Number(job_salary.value);
	salary = Number(salary).toLocaleString("pt-br", {
		minimumFractionDigits: 2,
	});

	job_salary.value = salary;
};


const handleDelete = (job_id, job_title) => {
	
	const deleteId = document.querySelector('#deleteId'),
	formFilter = document.querySelector("#form-filter");

	Swal.fire({
		title: `Tem certeza que deseja deletar a vaga ${job_title} ?`,
		confirmButtonText: "Confirmar",
		showCancelButton: true,
		cancelButtonText: "Cancelar",
		allowOutsideClick: false,
		allowEscapeKey: true,
	}).then(({ value }) => {
		if (value) {
			deleteId.value = job_id;
			setTimeout(() => {
				formFilter.submit();
			}, 1000);
		}
	});
};

const handleArchiving = (job_id, job_title) => {
	let archivejob = document.querySelector("#archivejob"),
		archivejob_id = document.querySelector("#archivejob_id"),
		formFilter = document.querySelector("#form-filter");

	Swal.fire({
		title: "Insira a chave de acesso para arquivar a vaga",
		input: "password",
		confirmButtonText: "Confirmar",
		allowOutsideClick: false,
		allowEscapeKey: true,
	}).then(({ value }) => {
		archivejob.value = value;
		archivejob_id.value = job_id.toString();
		setTimeout(() => {
			formFilter.submit();
		}, 3000);
		if (value == 123) {
			Swal.fire({
				icon: "success",
				html: `O status da vaga ${job_title} foi alterado`,
			});
			return;
		}
		Swal.fire({
			icon: "error",
			html: `O status da vaga ${job_title} não foi alterado`,
		});
	});
};

let observation = document.querySelector("#observation"),
	btnObservation = document.querySelector("#btnObservation");

const toggleObservation = () => {
	observation.classList.toggle("d-none");
	if (!observation.classList.contains("d-none")) {
		btnObservation.innerText = "Remover observação";
	} else {
		btnObservation.innerText = "Adicionar observação";
	}
};

const burger = document.querySelector(".nav-toggle"),
	menu = document.querySelector(".nav-menu");


if (isMobile && document.title.includes("Vagas publicadas (")) {
	menu.classList.add("is-hidden");
	burger.addEventListener("click", () => {
		burger.classList.toggle("is-active");
		menu.classList.toggle("is-hidden");
	});
}

// Login
const eyeIcons = document.querySelectorAll(".show-hide");

eyeIcons.forEach((eyeIcon, i) => {
	eyeIcon.addEventListener("click", () => {
		const pInputs = document.querySelectorAll(".passwordInput");

		const pInput = pInputs[i];

		if (pInput.type === "password") {
			eyeIcon.classList.replace("bx-hide", "bx-show");
			pInput.type = "text";
		} else {
			eyeIcon.classList.replace("bx-show", "bx-hide");
			pInput.type = "password";
		}
	});
});


// GSAP Animations
const inputs = document.querySelectorAll(".input-field");
const icons = document.querySelectorAll(".bx");
const homeIcon = document.querySelector(".backToHome");

gsap.from(".boxLogin, .showMessage", {
	opacity: 0,
	y: 50,
	duration: 0.5,
	ease: "power2.out",
});

gsap.set([...inputs, ...icons], { opacity: 0, y: 30 });

inputs.forEach((input, i) => {
	gsap.fromTo(
		input,
		{ opacity: 0, y: 30 },
		{ opacity: 1, y: 0, delay: i * 0.25, duration: 0.8, ease: "power2.out" }
	);
});

icons.forEach((icon, i) => {
	gsap.fromTo(
		icon,
		{ opacity: 0, y: 30 },
		{ opacity: 1, y: 0, delay: i * 0.25, duration: 0.8, ease: "power2.out" }
	);
});

gsap.fromTo(
	homeIcon,
	{ opacity: 0, top: "5%", left: "20px" },
	{
		opacity: 1,
		top: "20px",
		left: "20px",
		delay: icons.length * 0.25,
		duration: 0.8,
		ease: "power2.out",
	}
);

const smoothScroll = document.querySelector("#smoothScroll");

document.addEventListener('scroll', () => {
	let scroll_position = window.scrollY;

	if (scroll_position < 600) {
		smoothScroll.style.cssText = 'bottom: -30rem';
		return;
	} 
	smoothScroll.style.cssText = 'bottom: 5rem';
})