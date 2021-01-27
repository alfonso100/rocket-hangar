
$(document).ready(function () {

	$('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true
	});


	$('.rotate').click(function () {
		console.log('si');
		$('.col-6').toggleClass("col-12");
	});

	// highlight active option
	$('#filters button').on('click', function () {
		$('#filters button').removeClass("btn-primary").addClass('btn-outline-dark');
		$(this).removeClass('btn-outline-dark').addClass('btn-primary');

	});

	// init Isotope
	var $grid = $('.grid').isotope({
		// options
	});
	// filter items on button click
	$('.filter-button-group').on('click', 'button', function () {


		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });

	});

	// psi filters checkbox
	const opportunitiesListElement = document.querySelector('#psi-opportunities-list');
	psi_database.forEach((element)=> {
		let htmlElement = htmlToElement(`
		<div class="form-check">
		<input class="form-check-input psicheck" type="checkbox" value="${element.id}" id="${element.id}" name="psi[]">
		<label class="form-check-label" for="${element.id}"> ${element.name}
		</label>
	  	</div>
		`);
		opportunitiesListElement.appendChild(htmlElement)
	});
	// Adding the event listeners to every checkbox
	let check;
	const responseListElement = document.querySelector('#response-psi-opportunities-list');
	$(".psicheck").on("click", function () {
		check = $(this).is(":checked");
		let id = $(this).val();
		if (check) {
			// The oppornunity HTML Element is created
			let opportunityElement = htmlToElement(psi_database.filter((element)=>element.id == id)[0].content);
			$(this).parent('div').addClass('active');
			// The oppornunity HTML Element is added to the DOM
			responseListElement.appendChild(opportunityElement);
		} else {
			// The oppornunity HTML Element is selected in the DOM
			let opportunityElement = document.querySelector('.' + $(this).val());
			$(this).parent('div').removeClass('active');
			// The oppornunity HTML Element is removed from the DOM
			responseListElement.removeChild(opportunityElement);

		}
	});


	// Copy response with Styles
	/*
		The evet click is created for the copy button
	*/
	$("#copy-with-styles-button").on("click", async function () {
		// The HTML in the response block is extranted and saved in a constant
		const response = $("#response-content-to-copy").html();
		// We use this element to insert another element that we will use to copy the HTML content to the clipboard
		const report_box = document.querySelector("#report-box");
		// We execute the function that will copy to the clipboard and we pass the response and the element where the response will be copied temporary
		await copyWithStyle(response, report_box);
		const copyMessage = document.querySelector('#copy-message');
		showCopyMessage('The response was copied!', copyMessage);
	});
	$("#copy-text-button").on("click", async function () {
		// The HTML in the response block is extranted and saved in a constant
		const response = $("#response-content-to-copy").html();
		// We execute the function that will copy to the clipboard and we pass the response
		await copyText(response);
		const copyMessage = document.querySelector('#copy-message');
		showCopyMessage('The response was copied!', copyMessage);
	});
});
/**
 *
 *
 * @param {string} toCopy
 */
async function copyText(toCopy) {
	/**
	The html element is saved in to a constant to get the current scroll possition, this will help to maintain the same scroll position when the "aux.fucus()" is used (the function focus() used in an element will scroll to that element)
	*/
	const html = document.querySelector('html');
	const current_position = {
		left: html.scrollLeft,
		top: html.scrollTop
	};
	const tempInput = document.createElement('textarea');
	tempInput.style.width = '0.1px';
	tempInput.style.height = '0.1px';
	tempInput.value = toCopy;
	document.body.appendChild(tempInput);
	tempInput.select();
	document.execCommand('copy');
	document.body.removeChild(tempInput);
	setScrollPosition(current_position);
}
/**
 *
 *
 * @param {string} toCopy
 * @param {HTMLElement} element
 */
async function copyWithStyle(toCopy, element) {
	/**
	The html element is saved in to a constant to get the current scroll possition, this will help to maintain the same scroll position when the "aux.fucus()" is used (the function focus() used in an element will scroll to that element)
	*/
	const html = document.querySelector('html');
	const current_position = {
		left: html.scrollLeft,
		top: html.scrollTop
	};
	// A div element is created, this div will be "editable", this helps to select the content and make a copy to the clipboard
	let aux = document.createElement('div');
	aux.setAttribute('contentEditable', 'true');
	aux.id = 'toCopy';
	aux.innerHTML = toCopy;
	// The created div is added to the DOM inside the element that the function receives
	element.appendChild(aux);
	// The new div is focused
	aux.focus();
	// The content of the dib is selected
	document.execCommand('selectAll', false, null);
	// The content of the div is copied to the clipboard
	document.execCommand('copy');
	element.removeChild(aux);
	setScrollPosition(current_position);
}
async function setScrollPosition(position) {
	const html = document.querySelector('html');
	// Here, the position original scroll position is set to prevent that the scroll moves to the element that it's being focused
	html.scrollLeft = position.left;
	html.scrollTop = position.top;
}
/**
 *
 *
 * @param {string} message
 * @param {HTMLElement} element
 */
async function showCopyMessage(message, element) {
	element.innerHTML = message;
	element.style.opacity = 1;
	setTimeout(function () {
		element.style.opacity = 0;
		setTimeout(function () {
			element.innerHTML = '';
		}, 1000)
	}, 3000);
}

function htmlToElement(html) {
    let template = document.createElement('template');
    html = html.trim();
    template.innerHTML = html;
    return template.content.firstChild;
}