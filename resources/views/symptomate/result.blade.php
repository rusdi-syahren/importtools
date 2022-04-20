<style>
    .checklist-ul {
        list-style-type: none;
        padding: 0;

        li {
            padding: 0 0 0 25px;
            position: relative;
            margin-bottom: 5px;

            &:before {
                position: absolute;
                left: 5px;
                content: "\2713";
                color: #666;
            }
        }
    }

</style>
<div id="test-nlf-6" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="mainsteppertrigger6">

    <div class="row">
        <div class="form-group col-md-8">
            <h6 class="ml-4"><Strong>Hasil Pengkajian Awal</Strong></h6>
            <p class="ml-4">
                Harap dicatat bahwa daftar di bawah ini mungkin tidak lengkap dan disediakan semata-mata untuk tujuan
                informasi dan bukan merupakan opini medis yang memenuhi syarat.
            </p>
            <div id="summary">

            </div>
        </div>
        <div class="form-group col-md-4" style="text-align: center;">
            <h6 class="ml-4"><Strong>Jawaban Pasien</Strong></h6>
            <p class="ml-4">
            <div class="row" style="font-size: 14px">
                <div style="text-align: left;"><label>- Jenis Kelamin :</label>
                    <label id="result_gender">Laki-Laki</label>
                </div>
            </div>
            <div class="row" style="font-size: 14px;border-bottom: 1px  dotted;">
                <div style="text-align: left;">
                    <label>- Usia : </label>
                    <label id="result_age">33</label> Tahun
                </div>

            </div>

            </p>


            <h6 class="ml-4"><Strong>Gejala</Strong></h6>
            <p class="ml-4">
            <div class="row" style="font-size: 14px">
                <ul style="list-style-type: square; color:#666;text-align: left;" id="result_gejala">
                    <li>Tidak Ada</li>
                </ul>
            </div>
            <div class="row" style="font-size: 14px;border-bottom: 1px  dotted;">
            </div>

            </p>

            <h6 class="ml-4"><Strong>Gejala Lain</Strong></h6>
            <p class="ml-4">
            <div class="row" style="font-size: 14px;border-bottom: 1px  dotted;">
                <Strong style="width: 100%;text-align: left;margin-bottom: 5px;">Dirasakan</Strong>
                <ul style="list-style-type: square; color:green;text-align: left;" id="result_dirasakan">
                    <li>Tidak Ada</li>
                </ul>
                <Strong style="width: 100%;text-align: left;margin-bottom: 5px;">Tidak Dirasakan</Strong>
                <ul style="list-style-type: square; color:crimson;text-align: left;" id="result_tidakdirasakan">
                    <li>Tidak Ada</li>
                </ul>
                <Strong style="width: 100%;text-align: left;margin-bottom: 5px">DiLewati</Strong>
                <ul style="list-style-type: square;color:cornflowerblue;text-align: left;" id="result_dilewati">
                    <li>Tidak Ada</li>
                </ul>
            </div>
            </p>

            <h6 class="ml-4"><Strong>Rekomendasi</Strong></h6>
            <p class="ml-4">
            <div class="row" style="font-size: 14px">
                <ul style="list-style-type: square; color:black;text-align: left;" id="result_rekomendasi">
                    <li>Tidak Ada</li>
                </ul>
            </div>
            <div class="row" style="font-size: 14px;border-bottom: 1px  dotted;">
            </div>

            </p>


        </div>

    </div>
    <hr>
    <div>
        <button class="btn btn-primary ml-2" onclick="return finish()" style="float: right;">
            Finish
        </button>
    </div>
</div>

<script>
    function finish() {
        localStorage.clear();
        location.reload();
    }
</script>
