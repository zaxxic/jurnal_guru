@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <form class="position-relative mb-3 col-3">
            <input type="text" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Cari tahun ajaran">
            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>


        <div class="d-flex justify-content-end col-8">

        </div>
    </div>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Tahun ajaran </h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Alamat</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Aksi </h6>
                </th>
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

    </div>


    <!-- modal edit -->
    <div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <form class="modal-content" id="form-update">
                @method('PATCH')
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Aktifkan Card Master
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mt-1">
                        <div class="form-group">
                            <small id="name" class="form-text text-muted">Masukan RFID</small>
                            <input type="number" class="form-control" id="update-card_id" name="card_id" aria-describedby="name"
                                placeholder="Mauskan tahun ajaran">
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
                url: "{{ config('app.api_url') }}/unregistered-schools?page=" + page,
                type: 'GET',
                dataType: "JSON",
                data: {
                    pagination: $('#pagination-page').val(),
                    name: $('#search-name').val(),
                },
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },

                success: function(response) {
                    // console.log(response)
                    if (response.data.data.length > 0) {
                        $('#data').html('')
                        $.each(response.data.data, function(index, item) {
                            var buttonText = item.card_id ? 'Ganti Card ID' : 'Daftar Card ID';
                            var row = `<tr>
                                                <td>
                                                    ${item.name}
                                                </td>
                                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    ${item.address}
                                                </td>
                                                <td>
                            <button class="btn btn-primary btn-edit" id="btn-edit-${item.id}" data-id="${item.id}" data-name="${item.name}">
                                ${buttonText}
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
                        $('#loading').html(showNoData())
                    }
                }
            })
        }

        $('#form-update').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/register-rfid-school/" + id,
                type: 'POST',
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
                    window.location.reload();
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
    </script>
@endsection
