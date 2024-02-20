<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .cke {
            visibility: hidden;
        }
    </style>
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/pembayaran/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <select class="form-control " name="id_siswa" id="namaDropdown">
                                    <option value="">Select Nama Siswa</option>
                                    @foreach($data as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{$siswa->kelas}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="font-weight-bold">Tanggal Bayar</label>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                            </div>

                            <!-- Removed duplicated section -->
                            <div class="form-group">
                                <label class="font-weight-bold">Nominal Bayar</label>
                                <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" value=""
                                    placeholder="Masukkan Angka">
                                <!-- error message untuk title -->
                            </div>
                            <div class="d-flex justify-content-end ">
                                <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#namaDropdown').select2({
                placeholder: 'Search for a student...',
                allowClear: true
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script>
        function formatUang(input) {
            // Mengambil nilai input
            let nilai = input.value.replace(/\D/g, "");

            // Format dengan menambahkan titik setiap 3 digit dari belakang
            let formattedValue = Number(nilai).toLocaleString('id-ID');

            // Menetapkan nilai yang telah diformat kembali ke input
            input.value = formattedValue;
        }
    </script>
</body>

</html>