<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            <!-- Use the route() helper function to generate the form action URL -->
                            @csrf
                            <!-- Add the CSRF token -->
                            <!-- <input type="hidden" name="_token" value="3DRGApjGStoGmxlNfRqQFIzlZg1Np3HHX8uVKbcG"> -->
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama" value=""
                                    placeholder="Masukkan Nama Anda">
                                <!-- error message untuk title -->
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" name="kelas">
                                    <option value="X PPLG">X PPLG </option>
                                    <option value="XI PPLG">XI RPL </option>
                                    <option value="XII PPLG">XII RPL </option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end "> <!-- Added class justify-content-end -->
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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>