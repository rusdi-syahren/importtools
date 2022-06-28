@extends('layouts.main')

@section('container')
    <style>
        .invalid-feedback {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
    <div id="mainstepper" class="bs-stepper">

        <div class="bs-stepper-content">

            <div class="form-group col-md-10" style="margin-top:10px">

                <h6><Strong>Import Skrining</Strong></h6>
                <p>
                    Silahkan import file berdasarkan type data dan format yang sudah di tentukan!
                </p>

                <div class="form-group">
                    <label>Tipe Skrining </label>
                    <select class="form-control" id="skrining_group_id" name="skrining_group_id">
                        <option value="skn-covid">Skrining Covid-19</option>
                        <option value="skn-pem-kes">Skrining kesehatan Diri</option>
                    </select>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control" id="skrining_file" name="skrining_file"
                            style="height: 44px;">
                        {{-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}
                    </div>
                </div>

            </div>

            <hr>
            <div class="form-group col-md-12">
                <button class="btn btn-success" id="upload" style="float:right;">
                    Import
                </button>

            </div>
            <br>

        </div>

        {{-- <div class="bs-stepper-content" style="margin-top:50px">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-10">
                    <h6><Strong>Import Pelayanan Medis</Strong></h6>
                    <p>
                        Silahkan import file berdasarkan type data dan format yang sudah di tentukan!
                    </p>

                    <div class="form-group">
                        <label>Medical Type File</label>
                        <select class="form-control">
                            <option>Anamnesa</option>
                            <option>Resep</option>
                            <option>Anatomi</option>
                            <option>Diagnosa</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="medis_fle" name="medis_file">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>

                    </div>

                </div>
                <hr>
                <div class="form-group col-md-12">
                    <button class="btn btn-success " onclick="introductionstepper.next()" style="float:right;">
                        Import
                    </button>

                </div>
            </form>
        </div> --}}


    </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#upload").click(function() {
                const fileupload = $('#skrining_file').prop('files')[0];
                var skrining_group_id = $('#skrining_group_id').val();
                let formData = new FormData();
                formData.append('skrining_file', fileupload);
                formData.append('skrining_group_id', skrining_group_id);
                formData.append("_token", "{{ csrf_token() }}")

                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url: "/skrining",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(".preloader").show();
                    },
                    success: function(msg) {
                        $(".preloader").hide();
                        window.location.href = '/';
                    },

                    error: function() {
                        alert("Data Gagal DiImport");
                        $(".preloader").hide();
                    }
                });

            });
        });
    </script>
@endsection
