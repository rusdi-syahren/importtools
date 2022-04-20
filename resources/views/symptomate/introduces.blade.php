<div id="test-nlf-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="mainsteppertrigger1">
    <div id="introductionstepper" class="bs-stepper">

        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#intro-nlf-1" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="introsteppertrigger1"
                    aria-controls="intro-nlf-1">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Introduction</span>
                </button>
            </div>

            <div class="step" data-target="#intro-nlf-2" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="introsteppertrigger2"
                    aria-controls="intro-nlf-1">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Introduction</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form onSubmit="return false">
                <div id="intro-nlf-1" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="introsteppertrigger1">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6><Strong>Halo!</Strong></h6>
                            <p>
                                Anda akan menggunakan pemeriksaan kesehatan singkat (3 menit). Jawaban
                                Anda akan dianalisis dengan cermat dan Anda akan belajar tentang kemungkinan penyebab
                                gejala Anda.
                            </p>

                        </div>
                        <div class="form-group col-md-6" style="text-align: center;">
                            <img src="/images/intro.png">
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success " onclick="introductionstepper.next()" style="float:right;">
                        Next
                    </button>
                </div>

                <div id="intro-nlf-2" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="introsteppertrigger2">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6><Strong>Term of Conditions</Strong></h6>
                            <p>
                                Sebelum menggunakan pemeriksaan, harap baca Persyaratan Layanan. Ingat bahwa:
                            </p>
                            <p>
                            <ul>
                                <li><strong>Bukan merupakan diagnosis.</strong> Pemeriksaan adalah untuk tujuan
                                    informasi dan bukan opini medis yang memenuhi syarat.</li>
                                <li><strong>Jangan gunakan dalam keadaan darurat.</strong> Dalam keadaan darurat
                                    kesehatan, segera hubungi nomor darurat setempat.
                                </li>
                                <li><strong>Data Anda aman.</strong> Informasi yang Anda berikan bersifat anonim dan
                                    tidak dibagikan kepada siapa pun.</li>
                            </ul>
                            </p>
                            <p>
                            <div class="form-check mb-2">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary1">
                                    <label for="checkboxPrimary1">

                                        Saya membaca dan menyetujui <a href="#">Persyaratan Layanan</a> dan <a
                                            href="#">Kebijakan Privasi </a>

                                    </label>
                                    <div class="invalid-feedback pl-4" id="invalid-feedback-term"> Saya menyetujui
                                        pemrosesan informasi kesehatan saya untuk keperluan wawancara.
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="icheck-primary d-inline is-invalid">
                                    <input type="checkbox" id="checkboxPrimary2">
                                    <label for="checkboxPrimary2">
                                        I agree to
                                        the
                                        processing of
                                        my
                                        health information for the purpose of performing the
                                        interview.
                                    </label>
                                    <div class="invalid-feedback pl-4" id="invalid-feedback-info"> Please agree to the
                                        processing of your health information.
                                        Policy.
                                    </div>
                                </div>

                            </div>
                            </p>
                        </div>
                        <div class="form-group col-md-6" style="text-align: center;">
                            <img src="/images/introduction.png">
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="checkterm()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="introductionstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
    function checkterm() {

        if (!$("#checkboxPrimary1").prop("checked")) {
            $("#invalid-feedback-term").show();
            return false
        } else {
            $("#invalid-feedback-term").hide();
        }
        if (!$("#checkboxPrimary2").prop("checked")) {
            $("#invalid-feedback-info").show();
            return false
        } else {
            $("#invalid-feedback-info").hide();
        }
        mainstepper.next()
    }
</script>
