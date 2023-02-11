$(async function () {



    let table = $("#list_productos").DataTable({

        ajax: {
            type: "get",
            url: $("#urlGetProductos").val(),
            dataType: "json",

        },
        columns: [
            {
                data: "producto_id",
                render: function (data, type, row) {

                    $html = `<div class="row" style="margin-left:26px;">
                                <button onclick="sendMsg(${data},1)" style="margin-right: 10px;"><i class="fi fi-rr-envelope"></i></button>
                                <button onclick="detalleEnvio(${data})" style="margin-right: 10px;" ><i id="trash" class="fi fi-rr-list-check"></i></button>
                            </div>`
                        ;
                    return $html;
                },
            },
            { data: "producto_id",},
            { data: "producto_nombre",},
            { data: "producto_referencia"},
            { data: "producto_precio"},
            { data: "producto_peso" },
            { data: "bodega_stock" },
            { data: "producto_fecha" },
            
        ],
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
                "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending:
                    ": Activar para ordenar la columna de manera ascendente",
                sSortDescending:
                    ": Activar para ordenar la columna de manera descendente",
            },
        },
    });
});

