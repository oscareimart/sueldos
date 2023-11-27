<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('components.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.jpg" alt="AdminLTELogo" height="100"
                width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                        class="d-block"><button type="button" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i>
                        </button></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <!-- Sidebar -->
            @include('components.sidebar')
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-2024 <a href="https://sgm.com">sgm.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>

    <!-- jQuery -->
    {{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     genReport() {
        //         console.log('ok');
        //     }
        // })
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Verificacion de Normativa',
                    // subtitle: 'Subtitle',
                    body: 'Revisar el capiturlo IV, articulo 55 de la ley General del Trabajo.'
                })
            });
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    extend: 'pdfHtml5',
                    title: 'Reporte de Diferencia en Planilla',
                    text: 'Exportar a PDF',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#dataTableScv').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#dataTableSys').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                // "columnDefs": [{
                //         "width": "100px",
                //         "targets": 0
                //     } // Ajusta el ancho según tus necesidades para la columna 0
                // ],
                // "paging": false,
                // "lengthChange": true,
                // "searching": true,
                // "ordering": true,
                // "info": true,
                // "autoWidth": false,
                // "responsive": true,
                // "autoHeight": false
            });

            function base64ToArrayBuffer(base64) {
                var binaryString = window.atob(base64);
                var binaryLen = binaryString.length;
                var bytes = new Uint8Array(binaryLen);
                for (var i = 0; i < binaryLen; i++) {
                    var ascii = binaryString.charCodeAt(i);
                    bytes[i] = ascii;
                }
                return bytes.buffer;
            }
            $('#btnReport').click(() => {
                const company_id = $('#company_id').val();
                const document_id = $('#document_id').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'generatePdf',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        company_id,
                        document_id
                    },
                    success: function(response) {
                        // Handle the response from the controller method
                        console.log(response);
                        if (response && response.pdf) {
                            var blob = new Blob([base64ToArrayBuffer(response.pdf)], {
                                type: 'application/pdf'
                            });
                            var url = window.URL.createObjectURL(blob);
                            var a = document.createElement('a');
                            a.href = url;
                            a.download = 'reporte.pdf';
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            })




        })
    </script>
    {{-- <script src="http://code.jquery.com/jquery-3.6.1.slim.min.js"></script> --}}
    <script src="js/jquery.simple-tree-picker.js"></script>
    <script>
        // $(function() {
        // $('#companies').change(() => {
        //     console.log('ok');
        //     // $.ajax({
        //     //     headers: {
        //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     //     },
        //     //     url: 'get-menu',
        //     //     type: 'POST',
        //     //     dataType: 'json',
        //     //     success: function(response) {
        //     //         // Handle the response from the controller method
        //     //         // menu = response.modules
        //     //         // return response
        //     //         setMenu(response)
        //     //         // console.log(menu);
        //     //     },
        //     //     error: function(error) {
        //     //         console.error('Error:', error);
        //     //     }

        //     // });
        //     // return menu
        //     // console.log(menu.modules);
        //     // console.log(menu.responseJSON);
        // })
        $('#btnAddRole').click(() => {
            console.log('ok');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'get-menu',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the controller method
                    // menu = response.modules
                    // return response
                    setMenu(response)
                    // console.log(menu);
                },
                error: function(error) {
                    console.error('Error:', error);
                }

            });
            // return menu
            // console.log(menu.modules);
            // console.log(menu.responseJSON);
        })
        // })

        const setMenu = (menu) => {
            var demoTreeData = JSON.parse(
                '{"Number":"KI-125-25","Name":"All","Children":[{"Number":"WA-775-99","Name":"Main House","Children":[{"Number":"JI-105-09","Name":"Downstairs","Children":[]},{"Number":"TR-883-66","Name":"Upstairs","Children":[{"Number":"SS-002-99","Name":"Bedrooms","Children":[{"Number":"JI-656-09","Name":"Master Bedroom","Children":[]},{"Number":"ZZ-654-66","Name":"Guest Bedroom","Children":[]}]},{"Number":"SS-001-99","Name":"Other Rooms","Children":[{"Number":"JI-898-09","Name":"Great Room","Children":[]},{"Number":"ZZ-493-66","Name":"Bonus Room","Children":[]}]}]}]},{"Number":"QQ-542-10","Name":"Garage","Children":[]}]}'
            );
            console.log(menu.modules);
            const modules = menu.modules.map(e => {
                return {
                    Number: e.id,
                    Name: e.name,
                    Children: e.modules.map(el => {
                        return {
                            Number: el.id,
                            Name: el.name,
                        }
                    })
                }
            })
            console.log(modules);
            // menu
            // Initialize Simple Tree Picker
            // Pass it an onclick function to update the view
            // Pass it an initial selected state

            $('#tree').simpleTreePicker({
                "tree": {
                    Number: 0,
                    Name: "Menu",
                    Children: modules
                },
                "onclick": function() {
                    var selected = $(".tree").simpleTreePicker("display");
                    $("#selected").html(!!selected.length ? selected.toString().replace(/,/g, ', ') :
                        "Nothing Selected");
                },
                "selected": ["1"],
                "name": "room-selection-tree"
            });

            // Update view with initial state (onclick isn't called for initial selection)
            $("#selected").html($(".tree").simpleTreePicker("display").toString().replace(/,/g, ', '));
        }

        function formatMyMoney(price) {
            const numericPrice = Number(price.replace(',', '.'))
            var formattedOutput = new Intl.NumberFormat('es-BO', {
                style: 'currency',
                currency: 'BOB',
                minimumFractionDigits: 2,
            });

            return formattedOutput.format(numericPrice)
        }
        $(document).ready(function() {
            $(".f-currency").each(function() {
                let contenido = $(this).text();
                let nuevoContenido = formatMyMoney(contenido);
                $(this).text(nuevoContenido);
            });
        });
        $(".bg-check").click(function() {
            alert("esta obs");
        })
        $("#companies").on("change", function() {
            const value = $(this).val();
            // console.log(value);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-docs-by-company/' + value,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the controller method
                    // menu = response.modules
                    // return response
                    console.log(response);
                    $("#documents").empty();
                    $.each(response.documents, function(index, doc) {
                        console.log(doc);
                        var option = $("<option>").text(doc.name).attr('value', doc
                            .id); //.attr('id', 'document_' + value.id);
                        $("#documents").append(option);
                    });
                    // setMenu(response)
                    // console.log(menu);
                },
                error: function(error) {
                    console.error('Error:', error);
                }

            });
            // setPlanillas(value);
        })
        $("#report").on("change", function() {
            const value = $(this).val();
            console.log(value);
            if (value === "1") {
                $("#col-company-r").show();
                $("#col-document-r").show();
                $("#col-opcion-r").hide();
            }
            if (value === "2") {
                $("#col-company-r").show();
                $("#col-document-r").hide();
                $("#col-opcion-r").show();
            }

        })
        $("#companies-r").on("change", function() {
            const value = $(this).val();
            // console.log(value);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-docs-by-company/' + value,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the controller method
                    // menu = response.modules
                    // return response
                    console.log(response);
                    $("#documents-r").empty();
                    $.each(response.documents, function(index, doc) {
                        console.log(doc);
                        var option = $("<option>").text(doc.name).attr('value', doc
                            .id); //.attr('id', 'document_' + value.id);
                        $("#documents-r").append(option);
                    });
                    // setMenu(response)
                    // console.log(menu);
                },
                error: function(error) {
                    console.error('Error:', error);
                }

            });
            // setPlanillas(value);
        })
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        function getCompanies() {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/get-last-companies',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Trabaja con la respuesta aquí si es necesario
                        // console.log(response);
                        resolve(response);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        reject(error);
                    }
                });
            });
        }

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Función para asignar colores aleatorios a cada elemento en un array
        function assignRandomColors(array) {
            return array.map(function(element) {
                return {
                    value: element,
                    color: getRandomColor()
                };
            });
        }
        getCompanies().then(function(response) {
            // Trabajar con la respuesta (response) aquí
            updateDonutChart(response);
        }).catch(function(error) {
            console.error('Error:', error);
        });

        function updateDonutChart(companies) {
            console.log(companies);
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d');

            // Obtener nombres de empresas y datos para el gráfico
            var companyNames = companies.map(function(company) {
                return company.business_name; // Ajusta esto según la estructura de tu respuesta AJAX
            });
            console.log(companyNames);
            let colors = assignRandomColors(companyNames);
            let documents = companies.map(e => e.documents.length)
            console.log(documents);
            // console.log('coloer ', colors.map(e => e.color));
            var donutData = {
                labels: companyNames,
                datasets: [{
                    data: documents,
                    backgroundColor: colors.map(e => e.color),
                }]
            };

            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
            // Crear o actualizar el gráfico
            // if (window.donutChart) {
            //     // Si ya existe el gráfico, actualiza los datos
            //     window.donutChart.data = donutData;
            //     // window.donutChart.update();
            // } else {
            //     // Si el gráfico no existe, créalo
            //     window.donutChart = new Chart(donutChartCanvas, {
            //         type: 'doughnut',
            //         data: donutData,
            //         options: donutOptions
            //     });
            // }
        }
        // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        // var donutData = {
        //     labels: [
        //         'Chrome',
        //         'IE',
        //         'FireFox',
        //         'Safari',
        //         'Opera',
        //         'Navigator',
        //     ],
        //     datasets: [{
        //         data: [700, 500, 400, 600, 300, 100],
        //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        //     }]
        // }
        // var donutOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        // }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // new Chart(donutChartCanvas, {
        //     type: 'doughnut',
        //     data: donutData,
        //     options: donutOptions
        // })


        // function setPlanillsa(company_id) {
        //     var documentsHtml = $("#documents");

        //     var documents = $("#documents option").map(function() {
        //         let parent = $(this).data('parent');
        //         if (parent == company_id) {
        //             return $(this).val();
        //         }
        //         // console.log($(this).val(), 'parent ', parent);
        //         // return $(this).val();
        //     }).get();
        //     documentsHtml.empty();
        //     console.log(documents);
        //     $.each(documents, function(index, value) {
        //         documentsHtml.append($("<option>").attr('id', value)) //text(value));
        //     });
        //     // Vaciar el segundo select
        //     // select2.empty();

        //     // // Obtener las opciones correspondientes al valor seleccionado
        //     // var opciones = opcionesPorDefecto[valor] || [];

        //     // // Agregar las opciones al segundo select
        //     // $.each(opciones, function(index, value) {
        //     //     select2.append($("<option>").text(value));
        //     // });
        // }
    </script>

</body>

</html>
