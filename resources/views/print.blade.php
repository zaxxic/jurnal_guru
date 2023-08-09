@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print History {{ $start_date }} - {{ $end_date }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    hr {
        border: 2px solid black;
        /* Atur tebal garis */
        margin: 20px 30px;
    }
</style>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ asset('logo.png') }}" alt="Foto Sekolah" width="170">
                <hr>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Laporan Transaksi</h3> <br>
                @if ($start_date === $end_date)
                    <?php $formatted_date = date('d F Y', strtotime($start_date)); ?>
                    <h3>{{ $formatted_date }}</h3>
                @else
                    <?php
                    $formatted_start_date = date('d F Y', strtotime($start_date));
                    $formatted_end_date = date('d F Y', strtotime($end_date));
                    ?>
                    <h3>{{ $formatted_start_date }} - {{ $formatted_end_date }}</h3>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Di buat pada tanggal {{ Carbon::now('Asia/Jakarta')->locale('id')->isoFormat('D MMMM Y HH:mm:ss') }}
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Paket Dibeli</th>
                        <th>Via</th>
                        <th>Harga Paket</th>
                        <th>Code Transaksi</th>
                        <th>Tanggal Pembelian</th>
                    </tr>
                </thead>
                <tbody id="data"></tbody>

                <tbody>
                    <tr>
                        <td colspan="5">
                            Total transaksi :
                        </td>
                        {{-- <td ></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td>
                            <span id="total-fee-amount"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            Total pendapatan :
                        </td>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td>
                            <span id="school-count"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-md-end">
                <h3 class="fw-bold"><span id="school-count"></span></h3>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your JavaScript code here -->
    <script>
        const authToken = localStorage.getItem('token')
        $.ajaxSetup({
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + authToken,
            }
        });
        getUser()

        function getUser() {
            $.ajax({
                url: "{{ config('app.api_url') }}/user",
                type: 'GET',

                dataType: "JSON",
                success: function(response) {
                    $('.username').html(response.data.name)
                    $('.role').html(response.data.role)
                    $('.email').html(response.data.email)
                    $('.user-profile').attr('src', response.data.photo)
                    $('.preloader').fadeOut();
                },
                error: function(err) {
                    console.log(err)
                    window.location.href = "{{ route('login') }}"
                }
            })
        }

        get(1)

        let debounceTimer;

        $('#start-date, #end-date').change(function() {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {

                get(1);
            }, 500);
        });



        function get() {
            const start_date = @JSON($start_date);
            const end_date = @JSON($end_date)

            console.log(start_date);
            console.log(end_date);

            $.ajax({
                url: "{{ config('app.api_url') }}/transactions",
                type: 'GET',
                data: {
                    start_date: start_date,
                    end_date: end_date
                },

                success: function(response) {

                    console.log(response)
                    $('#data').html('')
                    var schoolCount = 0;
                    if (response.data.data.length > 0) {
                        var totalFeeAmount = 0;
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
                            $('#data').append(row)
                            totalFeeAmount += parseFloat(item.fee_amount);
                            schoolCount++;
                        });
                        $('#school-count').text(`Total : ${schoolCount}`);

                        $('#total-fee-amount').text(totalFeeAmount.toLocaleString('id-ID'));




                        function formatDate(dateString) {
                            const date = new Date(dateString);
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            return date.toLocaleDateString('id-ID', options);
                        }
                        window.print();

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
    </script>
</body>



</html>
