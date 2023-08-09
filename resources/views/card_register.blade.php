@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-4 mb-3">
            <form id="form-create">
                <div class="form-group">
                    <input autofocus type="number" id="create-card_id" class="form-control mt-3" name="card_id"
                        aria-describedby="name" placeholder="Tambah RFID">
                    <ul class="error-text">
                    </ul>
                </div>
            </form>
        </div>
        <form class="position-relative mb-3 col-3">
            <input type="text" class="form-control search-chat py-2 ps-5 mt-3" id="search-name" placeholder="Cari kartu">
            <i class="ti ti-search position-absolute top-50 ms-2 start-2 translate-middle-y fs-6 text-dark"></i>
        </form>
    </div>



    <div class="modal-footer">

        </form>



    </div>
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">

            <tr>
                <th>
                    <h6 class="fs-4 fw-semibold">No</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">ID kartu </h6>
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
    <div id="loading"></div>


    <x-delete-modal-component />
@endsection

@section('script')
    <script>
        document.getElementById('search-name').addEventListener('keydown', function(event) {
            if (event.keyCode === 13) { // 13 adalah kode tombol Enter
                event.preventDefault(); // Mencegah perilaku default tombol Enter
            }
        });
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
                url: "{{ config('app.api_url') }}/card?page=" + page,
                type: 'GET',
                data: {
                    pagination: $('#pagination-page').val(),
                    card_id: $('#search-name').val(),
                },
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                success: function(response) {
                    console.log(response)
                    $('#loading').html('')
                    $('#data').html('')
                    if (response.data.data.length > 0) {

                        $.each(response.data.data, function(index, item) {

                            var row = `<tr>
                                                            <td>
                                                                ${index + 1}
                                                            </td>
                                                            <td>
                                                                ${item.card_id}
                                                            </td>
                                                            <td>
                                                                <button   class="btn-delete"
                                                                    style="background: transparent;border:transparent" data-id="${item.id}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24" >
                                                                        <path fill="#AA4A44"
                                                                            d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
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
                        $('#loading').html(showNoData('RFID Tidak Ada!'))
                    }
                }
            })
        }




        $('#form-create').submit(function(e) {
            e.preventDefault()
            const token = localStorage.getItem('token')
            e.preventDefault();
            $.ajax({
                url: "{{ config('app.api_url') }}/card",
                type: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                dataType: "JSON",
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response)
                    get()
                    $('.btn-close').click()
                    Swal.fire({
                        'title': 'Berhasil!',
                        'icon': 'success',
                        'text': response.message
                    })
                    emptyForm('form-create')
                },
                error: function(response) {
                    console.log(response)

                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data, 'create')
                    }
                }
            })
        })

        $('#form-delete').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/card/" + id,
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
    </script>
@endsection
