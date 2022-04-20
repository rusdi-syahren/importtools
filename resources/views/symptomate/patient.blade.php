<div id="test-nlf-2" role="tabpanel" class="bs-stepper-pane fade ml-3 mt-3" aria-labelledby="mainsteppertrigger2">

    <div id="patientstepper" class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#patient-nlf-1" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="patientsteppertrigger1"
                    aria-controls="patient-nlf-1">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Patient</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#patient-nlf-2" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="patientsteppertrigger2"
                    aria-controls="patient-nlf-2">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Patient</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#patient-nlf-3" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="patientsteppertrigger3"
                    aria-controls="patient-nlf-3">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Patient</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#patient-nlf-4" style="display: none;">
                <button type="button" class="step-trigger" role="tab" id="patientsteppertrigger4"
                    aria-controls="patient-nlf-4">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Patient</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form onSubmit="return false">

                <div id="patient-nlf-1" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="patientsteppertrigger1">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4><Strong>Pemeriksaan Untuk Siapa?</Strong></h4>
                        </div>
                        <div class="form-group col-md-6" style="text-align: right;">
                            <a href="#"><img src="/images/self.png" onclick="setpatient('self')"></a>
                        </div>
                        <div class="form-group col-md-6" style="text-align: left;">
                            <a href="#"><img src="/images/someone.png" onclick="setpatient('someone')"></a>
                        </div>
                    </div>
                    <hr>


                    <button class="btn btn-default" onclick="mainstepper.previous()" style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>

                <div id="patient-nlf-2" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="patientsteppertrigger2">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4><Strong>Jenis Kelamin ?</Strong></h4>
                        </div>
                        <div class="form-group col-md-6" style="text-align: right;">
                            <a href="#"><img src="/images/female.png" onclick="setgender('female')"></a>
                        </div>
                        <div class="form-group col-md-6" style="text-align: left;">
                            <a href="#"><img src="/images/male.png" onclick="setgender('male')"></a>
                        </div>
                    </div>
                    <hr>


                    <button class="btn btn-default" onclick="patientstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>

                <div id="patient-nlf-3" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="patientsteppertrigger3">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4><Strong>Berapa tahun umur anda?</Strong></h4>
                        </div>
                        <div class="form-group col-md-12" style="text-align: center;">
                            <input id="ex6" type="text" data-slider-min="18" data-slider-max="120" data-slider-step="1"
                                data-slider-value="30" class="md-10 mb-2" />
                            <br>
                            <span id="ex6CurrentSliderValLabel" style="font-size: 13px">Sekarang Umur
                                : <span id="ex6SliderVal">30 </span> Tahun</span>
                        </div>

                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="setAge()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="patientstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>

                <div id="patient-nlf-4" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="patientsteppertrigger4">
                    <div class="row">
                        <div class="form-group col-md-12" style="text-align: center;">
                            <h4>Silakan periksa semua pernyataan di bawah ini yang berlaku untuk Anda</h4>
                        </div>
                        <p style="font-size: 13px;">
                            Pilih satu jawaban di setiap baris
                        <table class="table table-striped" style="font-size: 13px;" id="tbl_risk_factor">
                            <tbody>

                            </tbody>
                        </table>
                        </p>

                    </div>
                    <hr>
                    <button class="btn btn-success" onclick="return setRiskFactor()" style="float: right;">
                        Next
                    </button>

                    <button class="btn btn-default" onclick="patientstepper.previous()"
                        style="float:left;color:#2272c9;">
                        <i class="fas fa-angle-left"></i>
                        Back
                    </button>
                </div>
        </div>
    </div>

</div>


<script>
    function setpatient(value) {
        localStorage.setItem('patient', value);
        patientstepper.next();
    }

    function setgender(value) {
        localStorage.setItem('gender', value);
        patientstepper.next();
    }

    function setAge() {
        var valAge = $('#ex6').val();
        localStorage.setItem('age', valAge);

        html_risk_factor = '';

        $.getJSON("/symptomate-list", {
                age: valAge,
            })
            .done(function(data) {
                // console.log(JSON.parse(data))
                $.each(data, function(key, value) {
                    $('#symptoms')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(value));

                });


            });


        $.ajax({
            url: '/riskfactor-list',
            type: 'get',
            data: {
                age: valAge,
            },
            beforeSend: function() {
                // Show image container
                $(".preloader").show();
            },
            success: function(response) {
                // $('.response').empty();
                // $('.response').append(response);
            },
            complete: function(data) {
                $(".preloader").hide();
                var data = JSON.parse(data.responseText);
                var html_risk_factor = '';
                no = 1;
                $.each(data, function(key, value) {

                    html_risk_factor += '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + value + '</td>' +
                        '<td>' +
                        '<div class="icheck-primary d-inline">' +
                        '<input type="radio" id="' + key + '_yes" name="' + key +
                        '" value="present">' +
                        '<label for="' + key + '_yes"> Ya' +
                        '</label>' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="icheck-primary d-inline">' +
                        '<input type="radio" id="' + key + '_no" checked name="' + key +
                        '" value="absent">' +
                        '<label for="' + key + '_no"> Tidak' +
                        '</label>' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="icheck-primary d-inline">' +
                        '<input type="radio" id="' + key + '_dontknow"  name="' + key +
                        '" value="unknown">' +
                        '<label for="' + key + '_dontknow">Tidak Tahu' +
                        '</label>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    no++;

                });


                $('#tbl_risk_factor').html(html_risk_factor);
            }

        });
        patientstepper.next()
    }

    function setRiskFactor() {

        var listevidence = [];
        var risk_factor = @php echo json_encode($list_risk_factor) @endphp;

        // save risk factor to local storage
        risk_factor.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = $("input[name='" + element + "']:checked").val();
            listevidence.push(dict);
        });

        localStorage.setItem('risk_factor', JSON.stringify(listevidence));
        var risk_factor_ls = JSON.parse(localStorage.getItem('risk_factor'))
        localStorage.setItem('evidence', JSON.stringify(risk_factor_ls));
        mainstepper.next()
    }
</script>
