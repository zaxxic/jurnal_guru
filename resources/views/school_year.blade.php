@extends('layouts.app')


@section('content')
    <div class="row mb-3">
        <form class="position-relative mb-3 col-3">
            <input type="text" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Cari tahun ajaran">
            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>


        <div class="d-flex justify-content-end col-8">
            <button class="btn me-2 mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium btn-sm"
                data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah
            </button>
        </div>
    </div>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Tahun ajaran </h6>
                </th>
                <td>
                    <h6 class="fs-4 fw-semibold mb-0">Aksi </h6>
                </td>
            </tr>
        </thead>
        <tbody id="data">

        </tbody>
    </table>
    {{-- paginate --}}
    <nav id="pagination" class="mt-5">

    </nav>
    {{-- paginate end --}}

    <x-delete-modal-component />

    <!-- modal tambah -->
    <div id="modal-create" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambah tahun ajaran
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="form-create" method="POST" class="mt-1">
                        <div class="form-group">
                            <small id="name" class="form-text text-muted">Tahun Ajaran</small>
                            <input type="text" id="create-school_year" class="form-control" name="school_year"
                                id="nametext" aria-describedby="name" placeholder="Mauskan tahun ajaran">
                            <ul class="error-text">
                            </ul>
                        </div>
                        <ul class="error-text">
                        </ul>
                        <div id="failed-login" class="text-center error-text mb-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Tambah
                    </button>
                    </form>
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="loading"></div>



    <!-- modal edit -->
    <div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <form class="modal-content" id="form-update">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Edit tahun ajaran
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mt-1">
                        <div class="form-group">
                            <small id="name" class="form-text text-muted">Tahun Ajaran</small>
                            <input type="text" class="form-control" name="school_year" id="update-school_year"
                                aria-describedby="name" placeholder="Mauskan tahun ajaran">
                            <ul class="error-text">
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary text-primary font-medium waves-effect"
                            data-bs-dismiss="modal">
                            close
                        </button>
            </form>
            <button type="submit" class="btn btn-light-danger text-danger font-medium waves-effect">
                edit
            </button>
        </div>
    </div>

    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>

    {{-- end modal create --}}
@endsection
@section('script')
    <script>
        get(1)

        let debounceTimer;

        $('#search-name').keyup(function() {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });


        function get(page) {
            const token = localStorage.getItem('token')
            $.ajax({
                url: "{{ config('app.api_url') }}/school-year?page=" + page,
                type: 'GET',
                dataType: "JSON",
                data: {
                    pagination: $('#pagination-page').val(),
                    school_year: $('#search-name').val(),
                },
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },

                success: function(response) {
                    // console.log(response)
                    $('#data').html('')
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, item) {
                            var row = `<tr>
                                                <td>
                                                    ${item.school_year}
                                                </td>
                                                <td>
                                                    <button   class="btn-delete"
                                                        style="background: transparent;border:transparent" data-id="${item.id}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24" >
                                                            <path fill="#AA4A44"
                                                                d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                                                        </svg>
                                                        
                                                    </button>
    
                                                    <button  class="btn-edit"  id="btn-edit-${item.id}" data-id="${item.id}" 
                                                    data-school_year="${item.school_year}"
                                                        style="background: transparent;border:transparent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24">
                                                            <g fill="none" stroke="#7db5ff" stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2">
                                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>`
                            $('#data').append(row)
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))


                        $('.btn-edit').click(function() {
                            var formData = getDataAttributes($(this).attr('id'))
                            setFormValues('form-update', formData)
                            $('#form-update').data('id', formData['id'])
                            $('#modal-edit').modal('show')
                        })
                        $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                    } else {
                        $('#loading').html(showNoData('Tahun ajaran Tidak Ada!'))
                    }
                }
            })
        }

        $('#form-delete').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/school-year/" + id,
                type: 'DELETE',
                success: function(response) {
                    console.log(response)
                    get(1)
                    $('#modal-delete').modal('hide')
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: response.message
                    })
                },
                error: function(response) {
                    console.log(response)
                }
            });
        });

        $('#form-update').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/school-year/" + id,
                type: 'PUT',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(response) {
                    get(1)
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: response.message
                    })
                    $('#modal-edit').modal('hide')
                    emptyForm('form-update')
                },
                error: function(response) {
                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data, 'update')
                    }
                }
            })
        })



        $('#form-create').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ config('app.api_url') }}/school-year",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    get(1)
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: response.message
                    })
                    $('#modal-create').modal('hide')
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: 'Terjadi kesalahan saat input data'
                    })
                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data, 'create')
                    }
                }
            })
        })
    </script>
@endsection
