@extends('layouts.app')

@section('content')
    <form class="position-relative mb-3 col-3">
        <input type="text" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Cari sekolah">
        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
    </form>
    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama Paket</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama Sekolah</h6>
                    </th>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">NPSN </h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0"></h6>Status Sekolah
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Jenjang Pendidikan</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nomer Telp</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                    </th>
                    <th colspan="2">
                        <h6 class="fs-4 fw-semibold mb-0">Detail</h6>

                    </th>
                </tr>
            </thead>
            <tbody id="data">


            </tbody>
        </table>
        <div id="loading"></div>

        {{-- paginate --}}
        <nav id="pagination" class="mt-5">

        </nav>
    </div>




    <x-delete-modal-component />


    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Detail sekolah
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="text-center mb-3">
                        <img src="{{ asset('photo_sekolah.jpg') }}" alt="Foto Sekolah" width="250">
                    </div>
                    <h4><span id="detail-name"></span></h4>
                    <p>Status: <span id="detail-status"></span></p>
                    <p>Jenjang Pendidikan: <span id="detail-level"></span></p>
                    <p>Akreditasi: <span id="detail-accreditation"></span></p>
                    <p>Deskripsi: <span id="detail-description"></span></p>
                    <p>No Telepon: <span id="detail-phone"></span></p>
                    <p> <a href="${link}">School Website</a><span id="detail-web"></span></p>
                    <p>Kode Pos: <span id="detail-postal_code"></span></p>
                    <p>Nama Kepala Sekolah: <span id="detail-headmaster"></span></p>
                    <p>Alamat: <span id="detail-village"></span>,<span id="detail-district"></span>,<span
                            id="detail-regency"></span>,<span id="detail-province"></span> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- modal edit -->
    <div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">

        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="form-update">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myModalLabel">
                            Terima data
                        </h4>
                        @method('PATCH')
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menonaktifkan sekolah ini ? </p>
                        <input type="hidden" class="form-control" name="is_verified" id="update-is_verified"
                            aria-describedby="name">

                        <textarea class="form-control" rows="3" name="message" placeholder="Masukan Alasan di nonaktifkan"></textarea>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Terima
                        </button>
                    </div>
            </div>
        </div>
        </form>
    </div>
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
                url: "{{ config('app.api_url') }}/verification-school-active?page=" + page,
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
                    console.log(response)
                    $('#data').html('')
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, item) {
                            var link = item.web;
                            var row = `<tr>
                            <td>
                        Belum beli
                    </td>
                    <td>
                        ${item.user_id}
                    </td>
                    <td> ${item.national_school_id}</td>
                    <td>${item.status}</td>
                    <td>
                        ${item.level}
                    </td>
                    <td>
                        ${item.phone}
                    </td>
                                                <td>
                                                    <button  class="btn-edit"  id="btn-edit-${item.id}" data-id="${item.id}" 
                                                        style="background: transparent;border:transparent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="32" viewBox="0 0 24 24"><path fill="none" stroke="#fa896b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.048 16.033A9 9 0 0 0 7.954 3.958M5.633 5.64a9 9 0 0 0 12.733 12.723M3 3l18 18"/></svg>
                                                    </button>
    
                                                </td>

                                                <td>
                        {{-- eye --}}
                        <button  class="btn-detail" id="btn-detail-${item.id}" data-name="${item.user_id}"  data-status="${item.status}" data-level="${item.level}" data-accreditation="${item.accreditation}"data-description="${item.description} "data-phone="${item.phone}" data-web="${item.web}"  data-postal_code="${item.postal_code}" data-headmaster="${item.headmaster}" data-village="${item.village}" data-district="${item.district}" data-regency="${item.regency}" data-province="${item.province}"
                                                        style="background: transparent;border:transparent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24"><g fill="none" stroke="#7db5ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0-4 0"/><path d="M21 12c-2.4 4-5.4 6-9 6c-3.6 0-6.6-2-9-6c2.4-4 5.4-6 9-6c3.6 0 6.6 2 9 6"/></g></svg>
                                                    </button>
                        {{-- eye end --}}
                    </td>
                                            </tr>`
                            $('#data').append(row)
                        })

                        $('.btn-edit').click(function() {
                            var formData = getDataAttributes($(this).attr('id'))
                            setFormValues('form-update', formData)
                            $('#form-update').data('id', formData['id'])
                            $('#modal-edit').modal('show')
                        })

                        $('#pagination').html(handlePaginate(response.data.paginate))

                        $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                        $('.btn-detail').click(function() {
                            const data = getDataAttributes($(this).attr('id'))
                            handleDetail(data)
                            $('#modal-detail').modal('show')
                        })
                    } else {
                        $('#loading').html(showNoData('Sekolah Tidak Ada!'))
                    }
                }
            })
        }

        $('#form-update').submit(function(e) {
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "{{ config('app.api_url') }}/nonactive-verification-schools/" + id,
                type: 'PATCH',
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
