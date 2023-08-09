@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <form class="position-relative col-4">
            <input type="text" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
            <i class="ti ti-search position-absolute translate-middle-y fs-6 text-dark ms-3" style="top: 20px"></i>
        </form>

        <div class="d-flex justify-content-end col-4">
            <button class="btn me-2 mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium btn-sm"
                data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah

            </button>
        </div>
    </div>
    <div class="row" id="data" id="dataContainer">

    </div>

    {{-- paginate end --}}
    <div id="loading"></div>

    <x-delete-modal-component />
    {{-- paginate --}}
    <nav id="pagination" class="mt-5">

    </nav>

    <!-- modal tambah -->
    <div id="tambah" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambah paket
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="mt-1" id="form-create">
                        <div class="form-group">
                            <label for="nametext" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" name="name" id="nametext"
                                placeholder="Masukkan nama paket">
                        </div>

                        <div class="form-group">
                            <label for="pricetext" class="form-label">Harga Paket</label>
                            <input type="number" class="form-control" name="price" id="pricetext"
                                placeholder="Masukkan harga paket">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Detail</label>
                            <div class="repeater-container">
                                <div class="repeater-item d-flex align-items-center mb-2">
                                    <input type="text" name="item[]" class="form-control flex-grow-1"
                                        placeholder="Masukkan nilai">
                                    <button class="remove-item btn btn-danger btn-sm ms-2" type="button">Hapus</button>
                                </div>
                            </div>
                            <button class="add-item btn btn-success btn-sm" type="button">Tambah Baris</button>
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="photo">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pilih Tipe</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="bulan"
                                    value="month" />

                                <label class="form-check-label" for="bulan">Bulan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="item" value="item"
                                    checked="" />

                                <label class="form-check-label" for="item">Item</label>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect">
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




    <!-- modal edit -->
    <div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="mt-1">
                <form id="form-update" class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myModalLabel">
                            Edit paket
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update-name" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" name="name" id="update-name"
                                placeholder="Masukkan nama paket" />
                            <ul class="error-text">
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="update-price" class="form-label">Harga Paket</label>
                            <input type="number" class="form-control" name="price" id="update-price"
                                placeholder="Masukkan harga paket" />
                            <ul class="error-text">
                            </ul>
                        </div>
                        {{-- input reapet --}}
                        <div class="form-group">
                            <label class="form-label">Nama Detail</label>
                            <div class="repeater-container">
                                <!-- Repeater items will be added here -->
                            </div>
                            <button class="add-item btn btn-success btn-sm" type="button">Tambah Baris</button>
                        </div>
                        <input style="margin-top:10px;" class="form-control" type="file" id="formFile"
                            name="photo" />
                        <div class="col-md-8" style="margin-top:10px;">
                            Pilih tipe yang di ambil
                            <div class="form-check form-check-inline" style="margin-left: 9px;">
                                <input class="form-check-input" type="radio" name="status" id="month"
                                    value="month" />

                                <label class="form-check-label" for="bulan">Bulan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="item"
                                    value="item" />
                                <label class="form-check-label" for="item">Item</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Tambah elemen baru
            $('.add-item').click(function() {
                var newItem = $('.repeater-item:first').clone();
                newItem.find('input').val(''); // Reset nilai input
                $('.repeater-container').append(newItem);
            });

            // Hapus elemen
            $('.repeater-container').on('click', '.remove-item', function() {
                $(this).closest('.repeater-item').remove();
            });

            // Dapatkan nilai array dari inputan saat tombol diklik
            $('#submit-btn').click(function() {
                var arrayValues = [];
                $('.repeater-container input[name="item[]"]').each(function() {
                    var value = $(this).val();
                    arrayValues.push(value);
                });
            });
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
                url: "{{ config('app.api_url') }}/feature-packs?page=" + page,
                type: 'GET',
                data: {
                    pagination: $('#pagination-page').val(),
                    name: $('#search-name').val(),
                },
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                success: function(response) {
                    console.log(response);
                    $('#data').html('');



                    $.each(response.data.data, function(index, item) {
                        const priceAsNumber = parseFloat(item.price);
                        const formattedPrice = priceAsNumber.toLocaleString('id-ID');
                        var row = `<div class="col-lg-4 col-md-6">
    <div class="card">
        <h5 class="card-title text-center">${item.name}</h5>
        <img src="{{ asset('coba.jpg') }}" class="card-img-top" alt="..." />

        <!-- Collapsible detail section -->
        <div class="collapse" id="detail-${index}">
            <ul class="list-group list-group-flush text-center">
                ${item.feature_pack_details.map(data => `<li class="list-group-item">${data.item}</li>`).join('')}
            </ul>
        </div>

        <div class="card-body">
            <div style="text-align: center">
                <h6 class="card-text">Harga Rp ${formattedPrice}/${item.status}</h6>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <button class="btn btn-light btn-edit" id="btn-edit-${item.id}" data-id="${item.id}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24">
                        <g fill="none" stroke="#7db5ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                            <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415zM16 5l3 3" />
                        </g>
                    </svg>
                </button>
                <a href="#" class="btn btn-light btn-delete" data-id="${item.id}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="32" viewBox="0 0 24 24">
                        <path fill="#AA4A44" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                    </svg>
                </a>
                <!-- Button to trigger the collapsible detail section -->
                <button class="btn btn-light btn-detail" type="button" data-bs-toggle="collapse" data-bs-target="#detail-${index}" aria-expanded="false" aria-controls="detail-${index}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="#7db5ff" d="M12 8.5l8.5 8.5H3.5z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>`
                        $('#data').append(row);
                    })

                    $('#pagination').html(handlePaginate(response.data.paginate))

                    // Ketika tombol "Detail" ditekan
                    $('.btn-edit').click(function() {
                        var id = $(this).data('id');
                        $('#form-update').data('id', id)

                        // Kirim permintaan GET ke URL dengan ID yang dipilih
                        $.ajax({
                            url: "{{ config('app.api_url') }}/feature-packs/" + id,
                            type: 'GET',
                            dataType: 'JSON',
                            success: function(response) {
                                var detailData = response.data;

                                // Isi nilai input
                                $('#modal-edit #update-name').val(detailData.name);
                                $('#modal-edit #update-price').val(detailData.price);
                                $('#modal-edit #update-id').val(detailData.id);
                                if (detailData.status === "month") {
                                    $('#modal-edit #bulan').prop('checked', true);
                                } else if (detailData.status === "item") {
                                    $('#modal-edit #item').prop('checked', true);
                                }

                                var itemHtml = '';
                                detailData.feature_pack_details.forEach(item => {
                                    itemHtml += `
                <div class="repeater-item d-flex align-items-center mb-2">
                    <input type="text" name="item[]" class="form-control flex-grow-1"
                        placeholder="Masukkan nilai" value="${item.item}">
                    <button class="remove-item btn btn-danger btn-sm ms-2" type="button">Hapus</button>
                </div>`;
                                });
                                $('#modal-edit .repeater-container').html(itemHtml);

                                // ...

                                // Tampilkan modal edit
                                $('#modal-edit').modal('show');
                            },
                            error: function(response) {
                                console.log(response);
                                Swal.fire({
                                    title: 'Terjadi Kesalahan',
                                    icon: 'error',
                                    text: 'Gagal mengambil detail data.'
                                });
                            }
                        });

                    });

                    $('.btn-delete').click(function() {
                        $('#form-delete').data('id', $(this).data('id'))
                        $('#modal-delete').modal('show')
                    })
                }



            })
        }

        $('#form-delete').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/feature-packs/" + id,
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
            e.preventDefault();
            const token = localStorage.getItem('token')
            // Mendapatkan ID dari data yang akan diupdate
            var id = $(this).data('id');

            // Membuat FormData dari formulir
            var formData = new FormData(this);

            // Tambahkan atribut 'status' dari input radio yang dipilih
            formData.append('status', $("input[name='status']:checked").val());
            console.log(formData);
            const apiBaseUrl = "{{ config('app.api_url') }}";
            const apiUrl = `${apiBaseUrl}/feature-packs/${id}?_method=PATCH`;

            // Lakukan proses pengiriman data menggunakan AJAX
            $.ajax({
                url: apiUrl,
                type: "POST", // atau "PATCH" sesuai dengan metode API Anda untuk update data
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                dataType: "JSON",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    console.log(response);
                    get();
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        'title': 'Berhasil!',
                        'icon': 'success',
                        'text': response.message
                    });
                    emptyForm('form-update');
                },
                error: function(response) {
                    console.log(response);
                    var response = response.responseJSON;
                    var status = response.meta.code;
                    if (status == 422) {
                        handleValidate(response.data, 'update');
                    }
                }
            });
        });


        $('#form-create').submit(function(e) {
            e.preventDefault();

            const token = localStorage.getItem('token');
            var formData = new FormData(this);

            // Get the value of the "item[]" input
            const itemValue = formData.get('item[]');

            // Check if the value is not null and not empty
            if (itemValue !== null && itemValue.trim() === '') {
                // Handle error (show validation message or prevent form submission)
                return;
            }

            $.ajax({
                url: "{{ config('app.api_url') }}/feature-packs",
                type: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },
                dataType: "JSON",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    console.log(response);
                    get();
                    $('.btn-close').click();
                    Swal.fire({
                        'title': 'Berhasil!',
                        'icon': 'success',
                        'text': response.message
                    });
                    emptyForm('form-create');
                },
                error: function(response) {
                    console.log(response);
                    var response = response.responseJSON;
                    var status = response.meta.code;
                    if (status == 422) {
                        handleValidate(response.data, 'create');
                    }
                }
            });
        });
    </script>
@endsection
