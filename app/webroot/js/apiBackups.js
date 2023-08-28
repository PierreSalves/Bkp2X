function addElements(url, id) {

	if (!window.sessionStorage['i']) {
		window.sessionStorage['i'] = 1;
	}

	i = parseInt(window.sessionStorage['i']);

	$.ajax({
		type: "GET",
		url: url + '/' + i,
	}).done(function (data) {
		$(id).append(data);
		window.sessionStorage['i'] = parseInt(i + 1);
	});

}

function removeElements(id) {

	$(id).remove();
}
