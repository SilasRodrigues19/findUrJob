$(document).ready(function () {
	$(".has-datatable").DataTable({
		language: {
			url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json",
		},
	});
});

let notificationBox = document.querySelector("#reportPost");

const showAlertBox = (title, text, icon) => {
	Swal.fire({
		title: title,
		html: text,
		icon: icon,
		allowOutsideClick: false,
		allowEscapeKey: false,
		allowEnterKey: false,
		showCancelButton: true,
		confirmButtonText: "Sim",
		cancelButtonText: "Não",
	}).then((result) => {
		if (result.isConfirmed) {
			notificationBox.classList.add("d-none");
		} else if (result.isDenied) {
			notificationBox.classList.add("d-block");
		}
	});
};

const removeNotification = () => {
	showAlertBox("", "Deseja remover essa mensagem ?", "error");
};
