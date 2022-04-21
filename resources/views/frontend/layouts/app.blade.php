<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cargoup</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5dbe98442b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <livewire:styles />

    <style>
        .button {
            background-color: #929292;
            color: white;
        }

        .button:hover {
            background-color: #268C82;
            color: white;
        }

        .active {
            background-color: #268C82;
            color: white;
        }

        .bg {
            background-color: #268C82;
            color: white;
        }

        .bg-driver {
            background-color: #ff8716;
            color: white;
        }

        .btn-primary {
            border-color: #268C82;
            background-color: #268C82;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff8716;
            border-color: #ff8716;
            color: white;
        }

        #my-profile-tabsContent .active {
            background-color: white;
            color: black;
        }

        #myTabDirections .active {
            background-color: white;
            color: black;
        }

        label {
            font: 1rem 'Fira Sans', sans-serif;
        }

        input {
            margin: .4rem;
        }

        .tbl {
            border: 1px solid;
            border-collapse: collapse;
        }

        .title {
            color:  #268C82;
        }

        .subtitle {
            color:  #268C82;
        }

    </style>

    @stack('after-styles')
</head>

<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    {{-- @include('includes.partials.announcements') --}}



    <div id="app">
        @include('frontend.includes.nav')

        <main>
            {{-- @include('includes.partials.messages') --}}
            @yield('content')
        </main>
    </div>
    <!--app-->


    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
    <livewire:scripts />
    @stack('after-scripts')

    @if ($logged_in_user)
        <script>
            var price1 = 0;
            var price2 = 0;
            var price3 = 0;

            window.onload = function() {

                getDepartments();
                if ($('#municipality_id').val() != '') {
                    getMunicipalities();
                } else {
                    $('#municipalities').prop("disabled", true);
                }

                getTypeDocuments();
                getGenders();

                changeFormatPrice();
                changeFormatPrice2();
                changeFormatPrice3();

                habilitarDeshabilitar();
            }

            function getTypeDocuments() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.typedocuments.gettypedocuments') }}",
                    success: function(documentType_json) {

                        let documentType = JSON.parse(documentType_json);


                        $.each(documentType, function(index, value) {
                            $("#document_type").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                        documentTypeId = $('#document_type_id').val();

                        if (documentTypeId != '') {
                            $("#document_type option[value=" + documentTypeId + "]").prop('selected', true);
                        }


                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            function getDepartments() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.departments.getdepartments') }}",
                    success: function(department_json) {

                        let department = JSON.parse(department_json);


                        $.each(department, function(index, value) {
                            $("#departments").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                        departmentId = $('#department_id').val();

                        if (departmentId != '') {
                            $("#departments option[value=" + departmentId + "]").prop('selected', true);
                        }


                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            function getMunicipalities() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.municipalities.getmunicipalities') }}",
                    success: function(municipality_json) {

                        let municipality = JSON.parse(municipality_json);


                        $.each(municipality, function(index, value) {
                            $("#municipalities").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                        municipalityId = $('#municipality_id').val();

                        if (municipalityId != '') {
                            $("#municipalities option[value=" + municipalityId + "]").prop('selected', true);
                        }


                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            $("#departments").change(function() {
                let departmentId = $(this).val();

                $('#municipalities').prop("disabled", false);

                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.municipalities.getmunicipalitiesfordpt') }}",
                    data: {
                        departmentId: departmentId
                    },
                    contentType: 'application/json',
                    success: function($municipioIdData_json) {

                        let munfordpt = JSON.parse($municipioIdData_json); // Parsing the json string.

                        $('#municipalities').empty();

                        $.each(munfordpt, function(index, value) {
                            $("#municipalities").append('<option value=' + value.id + '>' + value
                                .name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            })

            function getGenders() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('frontend.genders.getgenders') }}",
                    success: function(gender_json) {

                        let gender = JSON.parse(gender_json);


                        $.each(gender, function(index, value) {
                            $("#genders").append('<option value=' + value.id + '>' + value.name +
                                '</option>');
                        });

                        genderId = $('#gender_id').val();

                        if (genderId != '') {
                            $("#genders option[value=" + genderId + "]").prop('selected', true);
                        }


                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert('Error - ' + errorMessage + ' status: ' + status + '  error: ' + error);
                    }
                });
            }

            function changeFormatPrice() {
                let monto1 = $("#monto1").prop('value');
                price1 = monto1;

                monto1 = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(monto1);

                $("#monto1").prop('value', monto1);
            }

            function changeFormatPrice2() {
                let monto2 = $("#monto2").prop('value');
                price2 = monto2;

                monto2 = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(monto2);

                $("#monto2").prop('value', monto2);
            }

            function changeFormatPrice3() {
                let monto3 = $("#monto3").prop('value');
                price3 = monto3;

                monto3 = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(monto3);

                $("#monto3").prop('value', monto3);
            }

            $('#1').change(function() {
                let numQuota = $(this).val();

                let valCredit = price1 * 1.01;

                let valQuota = valCredit / numQuota;

                let valDiscount = valCredit - price1;

                valQuota = Math.floor(valQuota);
                valDiscount = Math.floor(valDiscount);

                valQuota = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valQuota);
                $("#quota1").prop('value', valQuota);

                valDiscount = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valDiscount);
                $("#desc1").prop('value', valDiscount);
            })

            $('#2').change(function() {
                let numQuota = $(this).val();

                let valCredit = price2 * 1.01;
                let valQuota = valCredit / numQuota;
                let valDiscount = valCredit - price2;

                valQuota = Math.floor(valQuota);
                valDiscount = Math.floor(valDiscount);

                valQuota = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valQuota);
                $("#quota2").prop('value', valQuota);

                valDiscount = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valDiscount);
                $("#desc2").prop('value', valDiscount);
            })

            $('#3').change(function() {
                let numQuota = $(this).val();

                let valCredit = price3 * 1.01;
                let valQuota = valCredit / numQuota;
                let valDiscount = valCredit - price3;

                valQuota = Math.floor(valQuota);
                valDiscount = Math.floor(valDiscount);

                valQuota = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valQuota);
                $("#quota3").prop('value', valQuota);

                valDiscount = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP'
                }).format(valDiscount);
                $("#desc3").prop('value', valDiscount);
            })

            //Para mostrar la url del archivo seleccionado
            $('.custom-file-input').on('change', function(event) {
                var inputFile = event.currentTarget;
                $(inputFile).parent()
                    .find('.custom-file-label')
                    .html(inputFile.files[0].name);
            });

            var paquete = document.getElementById('paquete');
            var sobre = document.getElementById('sobre');

            function habilitarDeshabilitar() {

                if (paquete.checked) {
                    document.getElementById('height').disabled = false;
                    document.getElementById('width').disabled = false;
                    document.getElementById('length').disabled = false;

                    document.getElementById('height').value = "";
                    document.getElementById('width').value = "";
                    document.getElementById('length').value = "";
                } else {
                    document.getElementById('height').disabled = true;
                    document.getElementById('width').disabled = true;
                    document.getElementById('length').disabled = true;

                    document.getElementById('height').value = 0;
                    document.getElementById('width').value = 0;
                    document.getElementById('length').value = 0;
                }
            }
        </script>
    @endif
</body>

</html>
