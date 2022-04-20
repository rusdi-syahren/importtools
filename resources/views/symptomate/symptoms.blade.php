<div id="test-nlf-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="mainsteppertrigger3">

    <div id="symptomstepper" class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#symptom-nlf-1" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="symptomsteppertrigger1"
                    aria-controls="symptom-nlf-1">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">symptom</span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#symptom-nlf-2" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="symptomsteppertrigger2"
                    aria-controls="symptom-nlf-2">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">symptom</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#symptom-nlf-3" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="symptomsteppertrigger2"
                    aria-controls="symptom-nlf-3">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">symptom</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form onSubmit="return false">
                <div id="symptom-nlf-1" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="symptomsteppertrigger1">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4>Tambahkan Gejala Anda</h4>
                        </div>
                        <div class="form-group col-md-6" style="text-align: left;">
                            <p>
                                Tambahkan gejala sebanyak mungkin untuk mendapatkan hasil yang paling akurat.</p>
                            <select class="form-control select2" style="width: 100%;" name="symptoms" id="symptoms"
                                data-dropdown-css-class="select2-orange" multiple="multiple">
                                <option value="">Pilih Symptom</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="text-align: center;">
                            <img src="/images/anatomi.png" onclick="return symptomstepper.next()">
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="return setSymptome()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="mainstepper.previous()" style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>

                <div id="symptom-nlf-3" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="symptomsteppertrigger3">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4><Strong>Jenis perawatan apa yang Anda pertimbangkan untuk gejala-gejala ini?</Strong>
                            </h4>
                        </div>
                        <div class="form-group col-md-12" style="text-align: left;">
                            <p>
                                Pilih salah satu jawaban
                            <table class="table table-striped" style="font-size: 13px;">

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare1" name="typeofcare"
                                                    value="stay_home_and_observe_the_symptoms">
                                                <label for="typeofcare1">
                                                    Tetap di rumah dan amati gejalanya
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare2" name="typeofcare"
                                                    value="self_treat">
                                                <label for="typeofcare2">
                                                    Self-treatment / Perawatan mandiri
                                                </label>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare3" name="typeofcare"
                                                    value="consult_a_doctor">
                                                <label for="typeofcare3">
                                                    Konsultasi dengan dokter
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare4" name="typeofcare"
                                                    value="go_to_the_emergency_room">
                                                <label for="typeofcare4">
                                                    Pergi ke ruang gawat darurat
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare5" name="typeofcare"
                                                    value="call_an_ambulance">
                                                <label for="typeofcare5">
                                                    Memanggil Ambulan
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare6" name="typeofcare" value="not_sure">
                                                <label for="typeofcare6">
                                                    Tidak Tahu
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="typeofcare7" name="typeofcare"
                                                    value="none_of_these">
                                                <label for="typeofcare7">
                                                    Bukan dari salah satu di atas
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>

                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="return settypeofcare()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="symptomstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>
                <div id="symptom-nlf-2" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="symptomsteppertrigger2">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4><Strong>Apakah Anda memiliki salah satu gejala berikut?</Strong>
                            </h4>
                        </div>
                        <div class="form-group col-md-12" style="text-align: left;">
                            <p>
                                Pilih semua jawaban yang sesuai
                            <table class="table table-striped" id="tbl_suggest" style="font-size: 13px;">
                                <tbody>
                                </tbody>
                            </table>
                            </p>
                        </div>

                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="setSuggest()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="symptomstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>



        </div>
    </div>

</div>

<script>
    function setSuggest() {

        var listSuggest = []

        var selected = new Array();
        $("#tbl_suggest input[type=checkbox]:checked").each(function() {
            selected.push(this.value);
        });
        selected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'present';
            listSuggest.push(dict);
        });

        var unselected = new Array();
        $("#tbl_suggest input[type=checkbox]:not(:checked)").each(function() {
            unselected.push(this.value);
        });
        unselected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'absent';
            listSuggest.push(dict);
        });

        localStorage.setItem('suggest', JSON.stringify(listSuggest));
        var risk_factor = JSON.parse(localStorage.getItem('risk_factor'));
        var symptoms = JSON.parse(localStorage.getItem('symptoms'));
        var listevidence = symptoms.concat(risk_factor, listSuggest);
        localStorage.setItem('evidence', JSON.stringify(listevidence));
        symptomstepper.next()
    }

    function setSymptome() {
        if ($("#symptoms option:selected").length < 1){
            alert ('Maaf, Silahkan tambahkan gejala terlebih dahulu!');
            return false;
        }
        var symptomeList = [];
        var symptoms = [];
        $.each($("#symptoms option:selected"), function() {
            symptomeList.push($(this).val());
        });

        var risk_factor = JSON.parse(localStorage.getItem('risk_factor'));

        no = 1;
        symptomeList.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['source'] = "initial";
            dict['choice_id'] = 'present';
            symptoms.push(dict);
            no++;
        });


        localStorage.setItem('symptoms', JSON.stringify(symptoms));
        var evidence = risk_factor.concat(symptoms);
        localStorage.setItem('evidence', JSON.stringify(evidence));
        gestSuggest();
        symptomstepper.next();

    }

    function gestSuggest() {
        var evidence = JSON.parse(localStorage.getItem('evidence'));
        var age = localStorage.getItem('age');
        var gender = localStorage.getItem('gender');
        $.ajax({

            url: '/suggest-list',
            type: 'get',
            data: {
                sex: gender,
                age: {
                    value: age
                },
                evidence: evidence

            },
            beforeSend: function() {
                // Show image container
                $(".preloader").show();
            },
            complete: function(data) {
                $(".preloader").hide();
                var data = data.responseJSON;
                var html_suggest = '';
                no = 1;
                data.forEach(element => {


                    html_suggest += '<tr>' +
                        '<td>' +
                        '<div class="icheck-primary d-inline">' +
                        '<input type="checkbox" id="' + element.id + '" name="suggests"' +
                        'value="' + element.id + '">' +
                        '<label for="' + element.id + '">' + element.common_name + '</label>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    no++;

                });


                $('#tbl_suggest').html(html_suggest);
            }

        });
    }

    function settypeofcare() {
        var typeofcare = $("input[name='typeofcare']:checked").val();
        localStorage.setItem('typeofcare', typeofcare);
        var valAge = localStorage.getItem('age')

        $.ajax({
            url: '/location-riskfactor-list',
            type: 'get',
            data: {
                age: valAge,
            },
            beforeSend: function() {
                // Show image container
                $(".preloader").show();
            },
            complete: function(data) {
                $(".preloader").hide();
                var data = JSON.parse(data.responseText);
                var html_loc_risk_factor = '';
                no = 1;
                $.each(data, function(key, value) {

                    html_loc_risk_factor += "<option value='" + key + "'>" + value + "</option>";

                });
                $('#loc_risk_factor').append(html_loc_risk_factor);
            }

        });
        mainstepper.next();

    }
</script>
