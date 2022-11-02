let notificationBox = document.querySelector("#reportPost"),
	rollBackPost = document.querySelector("#rollBackPost");

$(document).ready(function () {
	rollBackPost.classList.add('d-none');
	$(".has-datatable").DataTable({
		language: {
			url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json",
		},
	});
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
		showMessage.classList.add("removeMessage");
	}, 5000);
}

const job_description = document.querySelector('#job_description'),
	  job_link = document.querySelector('#job_link'),
	  job_level = document.querySelector('#job_level'),
	  job_currency = document.querySelector('#job_currency'),
	  job_salary = document.querySelector('#job_salary'),
	  job_mode = document.querySelector('#job_mode'),
	  job_contract = document.querySelector('#job_contract');


const validateFields = () => {
	if (job_description.value == "" || job_link.value == "" || job_level.value == "" || job_currency.value == "" 
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

