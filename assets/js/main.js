$(document).ready(function () {
	let sendAjax = function (url, formData, type = "POST") {
		let dataReturn = [];
		$.ajax({
			url: url,
			type: type,
			data: formData,
			dataType: "json",
			processData: false,
			contentType: false,
			async: false,
			success: (res) => {
				console.log(res);
				let status = res.status == "error" ? "danger" : res.status;
				let alertTemplate = `
                    <div class="alert alert-${status} alert-dismissible fade show" role="alert">
                        ${res.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
				$("#alert").html(alertTemplate);
				if (typeof res.data !== "undefined") {
					dataReturn = res.data;
				}
			},
			error: (err) => {
				console.log(err);
			},
		});
		$("input, textarea, select").val("");

		return dataReturn;
	};

	if (typeof absenNeeded !== "undefined") {
		let absenProperty = $.parseJSON(absenNeeded);
		swal({
			title: "Yuk Absen!",
			text: absenProperty.message,
			icon: "warning",
			buttons: {
				confirm: {
					text: "Oke Absen",
					className: "btn btn-success",
				},
				cancel: {
					visible: true,
					text: "Nanti saja",
					className: "btn btn-danger",
				},
			},
		}).then((isDelete) => {
			if (isDelete) {
				window.href.location = absenProperty.href;
			} else {
				swal.close();
			}
		});
		return false;
	}

	$(".custom-file-input").change(function (e) {
		let filename = e.target.files[0].name;
		console.log($(this).closest(".custom-file-label"));
		$(this).next().text(filename);
		console.log(filename);
	});

	$(".btn-edit-jam").click(function () {
		let dataEncode = atob($(this).attr("data-jam"));
		let dataJam = $.parseJSON(dataEncode);

		$("#edit-keterangan").text(dataJam.keterangan);
		$("#edit-id-jam").val(dataJam.id_jam);
		$("#edit-start").val(dataJam.start);
		$("#edit-finish").val(dataJam.finish);
	});

	$("#form-edit-jam").submit(function () {
		let form = document.getElementById("form-edit-jam");
		let url = $(this).attr("action");
		let data = new FormData(form);

		let dataReturn = sendAjax(url, data);
		let targetParent = $("#jam-" + dataReturn.id_jam);
		targetParent.find(".jam-start").text(dataReturn.start);
		targetParent.find(".jam-finish").text(dataReturn.finish);
		targetParent
			.find("a.btn-edit-jam")
			.attr("data-jam", btoa(JSON.stringify(dataReturn)));

		$("#edit-jam").modal("hide");
	});
});
