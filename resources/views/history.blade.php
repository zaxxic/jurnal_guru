@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/dist/css/flatpickr.min.css') }}">


@section('content')
    <!-- Default Daterange Picker -->


    {{-- <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <label for="start-date">Start Date</label>
                <input type="text" class="form-control" id="start-date" placeholder="Select start date">
            </div>
            <div class="col-md-6">
                <label for="end-date">End Date</label>
                <input type="text" class="form-control" id="end-date" placeholder="Select end date">
            </div>
        </div>
    </div> --}}


    <form class="position-relative col-6 mb-3" target="_blank" action="{{ route('print.history') }}" method="GET">

        <div class="row">
            <div class="col-md-5">
                <label for="start-date">Start Date</label>
                <input type="text" class="form-control" name="start_date" id="start-date"
                    placeholder="Select start date">
            </div>
            <div class="col-md-5">
                <label for="end-date">End Date</label>
                <input type="text" class="form-control" name="end_date" id="end-date" placeholder="Select end date">
            </div>
            <div class="col-md-2 mt-4">
                <button class="btn btn-primary btn-md" type="submit">Print</button>
            </div>
        </div>
    </form>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama Sekolah</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Paket Di Beli</h6>
                    </th>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Via </h6>
                    </th>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Harga Paket </h6>
                    </th>

                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Code Transaksi</h6>
                    </th>


                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Tanggal Pembelian</h6>
                    </th>

                </tr>
            </thead>
            <tbody id="data">


            </tbody>
        </table>
        {{-- paginate --}}

        <nav id="pagination" class="mt-5">


        </nav>

        <!-- modal tambah -->
    </div>

    <!-- modal delete-->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Hapus data
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Apakah anda yakin akan menghapus paket ini </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-light-danger text-secondery font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal delete --}}

    <!-- modal SHOW -->

    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dist/js/plugins/npm-flatpickr.js') }}"></script>

    <script>
        get(1)

        let debounceTimer;

        $('#start-date, #end-date').change(function() {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {

                get(1);
            }, 500);
        });



        function get(page) {
            const token = localStorage.getItem('token');
            const startDate = $('#start-date').val();
            const endDate = $('#end-date').val();
            console.log(startDate);
            console.log(endDate);

            $.ajax({
                url: "{{ config('app.api_url') }}/transactions?page=" + page,
                type: 'GET',
                data: {
                    pagination: $('#pagination-page').val(),
                    start_date: startDate,
                    end_date: endDate
                },
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + token,
                },

                success: function(response) {
                    console.log(response)
                    $('#data').html('')
                    var schoolCount = 0;
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, item) {
                            var row = `
                        <tr>

                    <td>
                        ${item.school}
                    </td>
                    <td>
                        ${item.name_feature}
                    </td>
                    <td>
                        ${item.via}
                    </td>
                    <td>                    
                            Rp. ${parseFloat(item.fee_amount).toLocaleString('id-ID')}
                    </td>
                    <td>
                            ${item.code_transaction.slice(0, 6)}
                    </td>
                    <td id="formatted-date">${formatDate(item.date)}</td>
                    </tr>
                        `
                            $('#data').append(row);
                            schoolCount++;

                        });
                        $('#school-count').text(`Total Sekolah: ${schoolCount}`);

                        function formatDate(dateString) {
                            const date = new Date(dateString);
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            return date.toLocaleDateString('id-ID', options);
                        }

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
                        $('#loading').html(showNoData('Tahun ajaran Tidak Ada!'))
                    }
                }
            })
        }

        flatpickr("#start-date", {
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                const endDatePicker = document.getElementById("end-date")._flatpickr;
                endDatePicker.set("minDate", dateStr);
                get(1);
            }
        });

        flatpickr("#end-date", {
            dateFormat: "Y-m-d",
        });

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
