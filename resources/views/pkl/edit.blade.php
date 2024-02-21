<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pkl - PKL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pkl.update', $pkl->id) }}" method="POST" enctype="multipart/form-data">
                            <a href="{{ route('pkl.index') }}" class="btn btn-md btn-success mb-3">KEMBALI</a>


                            @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="siswaDropdown" class="font-weight-bold">Siswa</label>
                                        <select name="id_siswa" class="form-control" id="siswaDropdown" disabled>
                                            @foreach ($siswa as $data)
                                            <option value="{{ $data->id }}" @if($data->id == $pkl->id_siswa) selected @endif>{{ $data->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dudiDropdown" class="font-weight-bold">Dudi</label>
                                        <select name="id_dudi" class="form-control" id="dudiDropdown" disabled>
                                            @foreach ($dudi as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $pkl->id_dudi) selected @endif>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">TANGGAL MASUK</label>
                                        <input  type="date" class="form-control" name="tgl_masuk" pattern="\d{4}-\d{2}-\d{2}" value="{{$pkl->tgl_masuk}}" disabled>
                                    </div>

                                     <!-- error message untuk tgl_masuk -->
                                     @error('tgl_masuk')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                     @enderror

                                    <div class="form-group">
                                        <label class="font-weight-bold">TANGGAL KELUAR</label>
                                        <input  type="date" class="form-control" name="tgl_keluar" pattern="\d{4}-\d{2}-\d{2}">
                                    </div>

                                     <!-- error message untuk tgl_keluar -->
                                     @error('tgl_keluar')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                     @enderror


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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
