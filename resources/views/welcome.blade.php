<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!-- End Boostrap -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
    </script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css"
        href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    {{-- Select2 4.1.0 --}}
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
    <script src="{{ asset('js/select2/select2.min.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Gestion Inventario') }}
    </h2>
    <div class="row">
        <button>Nuevo Producto</button>
    </div>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive-md">
                        <table class="table table-md" id="list_productos" style="text-align: center;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" style="width:100px;">opciones</th>
                                    <th scope="col" >ID</th>
                                    <th scope="col" >Nombre de producto</th>
                                    <th scope="col" >Referencia</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Peso</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Fecha de creación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

        <!-- Modal adicionar productos -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" id="modal-add">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddTitle">Adicionar Productos</h5>
                        <button id="close_modal-add" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span class="close" aria-hidden="true">
                                <i class="fas fa-window-close"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#add-home"
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <i class="fa-solid fa-barcode">
                                        </i> Datos Basicos
                                    </a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#add-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class="fa-solid fa-outdent"></i>
                                        Profile
                                    </a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#add-image"
                                        role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                        <i class="fa-solid fa-image">
                                        </i> Imagen
                                    </a>
                                </div>
                            </div>
                            <div class="col-9">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="add-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <!-- Formulario crear producto-datos basicos -->
                                        <form method="POST" class="needs-validation" id="create"
                                            enctype="multipart/form-data" novalidate>
                                            <fieldset>
                                                <div class="form-group row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom01">Producto</label>
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Nombre" value="" name="name" id="name"
                                                            required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom02">Tipo</label>
                                                        <input type="text" class="form-control" id="type"
                                                            placeholder="Tipo" value="" name="type" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">Precio Regular</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroupPrepend">$</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="regular_price"
                                                                placeholder="Precio"
                                                                aria-describedby="inputGroupPrepend"
                                                                name="regular_price" required>
                                                            <div class="invalid-feedback">
                                                                Please choose a username.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-9 mb-3">
                                                        <label for="validationCustom03">Descripción</label>
                                                        <input type="text" class="form-control" id="description"
                                                            placeholder="Descripción" name="description" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    <!--                                                 <div class="col-md-3 mb-3">
                                                    <label for="validationCustom05">categories</label>
                                                    <input type="text" class="form-control" id="categories"
                                                        placeholder="Categorias" name="categories" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid zip.
                                                    </div>
                                                </div> -->
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-9 mb-3">
                                                        <label for="validationCustom04">Descripción corta</label>
                                                        <input type="text" class="form-control" id="short_description"
                                                            placeholder="Descripción corta" name="short_description"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom05">Referencia</label>
                                                        <input type="text" class="form-control" id="sku"
                                                            placeholder="Sku" name="sku" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid zip.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="true"
                                                            id="manage_stock" name="manage_stock" required>
                                                        <label class="form-check-label" for="invalidCheck">
                                                            Gestión de Inventario
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            You must agree before submitting.
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- cierre de formulario crear producto-datos basicos -->
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="add-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <form method="POST" id="create2" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class=" row">
                                                    <div class="col-md-12">
                                                        <label for="campo">Nombre del Campo</label>
                                                        <div class="row">
                                                            <select class="form-control fecha_ventas" id="campo">
                                                                <option value="" selected>Seleccionar ....</option>
                                                            </select>
                                                            <div>
                                                                <button type="button" id="add-camp"
                                                                    class="btn btn-primary" onclick="adicionar()">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </button>
                                                                <button type="button" id="delete-camp"
                                                                    class="btn btn-danger" onclick="menos()">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <table class="table" id="table-product">
                                                        <thead class="thead-dark">
                                                            <tr id="head-table">
                                                                <th scope="col">#</th>
                                                                <th scope="col">Campo</th>
                                                                <th scope="col">valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="add-image" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tab">
                                        <form onSubmit="return createProducto(this)" method="POST" id="imag" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div id="carouselExampleControls" class="carousel slide">
                                                        <a class="carousel-control-prev" href="#carouselExampleControls"
                                                            role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExampleControls"
                                                            role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                    <div style="margin-top:100px">
                                                        <label for="inputFile1">Ingresa Tu Imagen</label>
                                                        <input type="file" class="form-control-file" id="archivo"
                                                            name="archivo[]" multiple="">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" value="Guardar" onclick="createProducto()" />
                    </div>
                </div>
            </div>
        </div>


            </div>
        </div>
    </div>
    </div>
    <input type="hidden" id="urlGetProductos" value="{{route('productos.get') }}">

    <script src="{{ asset('js/listProductos.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/Productos.css') }}">
</body>
</html>

