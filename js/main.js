// Imports
import './form.js';
import './add-another-set.js';

; (function ($, document, window, undefined) {
	// doc ready
	$(document).ready(function () {

		/**
			* [fillSelectionFields description]
			*
			* @param   {[Array]}  data  [data description]
			* @param   {[String]}  id    [id description]
			*
			* @return  {[Void]}        [return description]
			*/
		function fillSelectionFields(data, id) {
			data.forEach(el => {
				let select = $(`#${id}`);
				let labelText = $(`label[for="${select.attr('id')}"]`).text();

				select.append(`<option value="${labelText}/${el.name}/${el.price}">— ${el.name} —</option>`);
			});
		}

		// Array of specification names
		const fetchItemsList = ['cpu','case','cpu-cooler','memory','motherboard','power-supply','storage','video-card'];

		// Each array and fetch
		fetchItemsList.forEach(el=>{
			fetchItems(el)
				.done(function (response) {
					const data = JSON.parse(response);

					// Fill selection fields
					fillSelectionFields(data, el);
				});
		})
	});

	function fetchItems(type) {
		return $.ajax({
			url: 'inc/fetch-parts.php',
			type: 'GET',
			data: {
				type: type
			}
		});
	}
})(jQuery, document, window);





