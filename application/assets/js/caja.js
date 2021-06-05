$(document).ready(() => {
	verTabla()
	$('#table_listaProductos').on('draw.dt', function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
})
function verTabla() {
	var table = $('#table_listaProductos').DataTable({
		"ajax": {
			"url": "application/controllers/administracion/controller_getListaInventario.php"
		},
		"columns": [{
				"data": "idInventario"
			},
			{
				"data": "nombre"
			},
			{
				"data": "cantidad"
			},
            {
				"data": "precio"
			},
			{
				"data": "nomProveedor"
			},
			{
				"defaultContent": "<div style='display: flex; flex-wrap: no-wrap; justify-content: center;'>" +
					"<span data-toggle='tooltip' data-placement='top' title='Agragar'>" + //Agregar
					"<i class='fas fa-shopping-cart' id='editBtn' style='cursor: pointer; padding: 3px; font-size: 20px;'></i>" +
					"</span>" + "</div>"
			}
		],
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		}
	})
	$("#table_listaProductos").css('width', '100%')
	//getDataEditar("#table_listaInventario tbody", table)
}


