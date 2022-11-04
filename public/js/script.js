let notificationBox = document.querySelector("#reportPost"),
	rollBackPost = document.querySelector("#rollBackPost");

$(document).ready(function () {
	rollBackPost.classList.add('d-none');
});

window.history.replaceState && window.history.replaceState(null, null, window.location.href);

const showAlertBox = (title, text, icon) => {
	Swal.fire({
		title: title,
		html: text,
		icon: icon,
		showClass: {
			popup: 'animate__animated animate__zoomIn',
		},
		hideClass: {
			popup: 'animate__animated animate__zoomOut',
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
	formFilter.submit();
}

const closeWarning = () => {
	notificationBox.classList.add('d-none');
	rollBackPost.classList.remove('d-none');
}

const revertWarning = () => {
	notificationBox.classList.remove('d-none');
	rollBackPost.classList.add('d-none');
}

const showMessage = document.querySelector(".showMessage");

if (document.body.contains(showMessage)) {
	setTimeout(() => {
		showMessage.classList.add("d-none");
	}, 5000);
}

const job_title = document.querySelector('#job_title'),
	  job_link = document.querySelector('#job_link'),
	  job_level = document.querySelector('#job_level'),
	  job_currency = document.querySelector('#job_currency'),
	  job_salary = document.querySelector('#job_salary'),
	  job_mode = document.querySelector('#job_mode'),
	  job_contract = document.querySelector('#job_contract');


const validateFields = () => {
	if (job_title.value == "" || job_link.value == "" || job_level.value == "" || job_currency.value == "" 
		|| job_salary.value == "" || job_mode.value == "" || job_contract.value == "") {
		
		showAlertBox("Erro ao publicar vaga", "Certifique-se de preencher todos os campos", "error");
		return false;
	} 
	return true;
} 

const splitRequirements = () => {
	let splited_job_requirements = document.querySelector('#splited_job_requirements'),
		job_requirements = document.querySelector('#job_requirements');

	splited_job_requirements.value = job_requirements.value.split(',');
}

const handleArchiving = (job_id, job_title) => {


	let archivejob = document.querySelector('#archivejob'),
		archivejob_id = document.querySelector('#archivejob_id'),
		formFilter = document.querySelector("#form-filter");
	
	Swal.fire({
		title: 'Insira a chave de acesso para arquivar a vaga',
		input: 'password',
		confirmButtonText: "Confirmar",
		allowOutsideClick: false,
		allowEscapeKey: false,
	  }).then(({ value }) => {
		archivejob.value = value;
		archivejob_id.value = job_id;
		  setTimeout(() => {
			  formFilter.submit();
		  }, 3000);
		if(value == 123) {
			Swal.fire({
			  icon: 'success',
			  html: `A vaga ${job_title} foi arquivada`
			})
			return;
		}
		Swal.fire({
			icon: 'error',
			html: `A vaga ${job_title} não foi arquivada`
		  })
		})
}


let observation = document.querySelector('#observation'),
	btnObservation = document.querySelector('#btnObservation');

const toggleObservation = () => {
	observation.classList.toggle('d-none');
	if(!observation.classList.contains('d-none')) {
		btnObservation.innerText = 'Remover observação';
	} else {
		btnObservation.innerText = 'Adicionar observação';
	}
}



const burger = document.querySelector('.nav-toggle'),
	  menu = document.querySelector('.nav-menu');

navigator.userAgent.match(/Mobile/) && menu.classList.add('is-hidden');

burger.addEventListener('click', () => {
	burger.classList.toggle('is-active');
	menu.classList.toggle('is-hidden');
});