$(document).ready(function () {
	$(".has-datatable").DataTable({
		language: {
			url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json",
		},
	});
});

window.history.replaceState && window.history.replaceState(null, null, window.location.href);

let notificationBox = document.querySelector("#reportPost");

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

const showMessage = document.querySelector(".showMessage");

if (document.body.contains(showMessage)) {
	setTimeout(() => {
		showMessage.classList.add("removeMessage");
	}, 7500);
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