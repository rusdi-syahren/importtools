<div id="test-nlf-5" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="mainsteppertrigger5">

    <div class="row">
        <div class="form-group col-md-12" style="text-align: center;">
            <h4><label id="interview_question">Do you have any of the following symptoms?</label></h4>
        </div>
        <div class="form-group col-md-12" style="text-align: left;" id="question">


        </div>

    </div>
    <hr>
    {{-- <button class="btn btn-success" id="finish-interview" onclick="return getInterview()" style="float: right;">
        Finish
    </button> --}}

    <button class="btn btn-default" onclick="mainstepper.previous()" style="float:left;color:#2272c9;">
        <i class="fas fa-angle-left"></i>
        Back
    </button>
</div>


<script>
    function getInterview() {

        var evidence = JSON.parse(localStorage.getItem('evidence'));
        var age = localStorage.getItem('age');
        var gender = localStorage.getItem('gender');
        var getGender = 'Perempuan';
        if (gender == 'male') {
            getGender = 'Laki-Laki';
        }
        $('#result_age').text(age)
        $('#result_gender').text(getGender)
        $.ajax({

            url: '/interview',
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

                if (data.responseJSON.should_stop == true) {

                    var result = '<ul>';


                    var conditions = data.responseJSON.conditions;

                    conditions.forEach(element => {
                        var width = Math.floor(element.probability * 100);
                        var color = 'danger';
                        if (width >= 35) {
                            color = 'success';
                        } else if (width < 35 && width >= 20) {
                            color = 'warning';
                        }
                        result += '<li><strong>' + element.name +
                            '</strong> - <span class="badge badge-' + color + ' right">' + width +
                            '%' +
                            '</span><div class="progress mb-3">' +
                            '<div class="progress-bar bg-' + color +
                            '" role="progressbar" aria-valuenow="' +
                            width + '" aria-valuemin="0" aria-valuemax="100" style="width: ' +
                            width + '%">' +
                            '<span class="sr-only">' + width + '%</span>' +
                            '</div>' +
                            '</div></li>'
                    });

                    result += '</ul>';

                    $('#summary').html(result)


                    $.ajax({
                        url: '/symptome-filter',
                        type: 'get',
                        data: {
                            age: age,
                            evidence: evidence
                        },
                        beforeSend: function() {
                            $(".preloader").show();
                        },
                        complete: function(data) {
                            $(".preloader").hide();
                            var data = JSON.parse(data.responseText);

                            // append gejala

                            var gejala = '';
                            if (data.gejala.length > 0) {
                                data.gejala.forEach(element => {
                                    gejala += '<li>' + element + '</li>'
                                });

                                $('#result_gejala').html(gejala)
                            }

                            var dirasakan = '';
                            if (data.dirasakan.length > 0) {
                                data.dirasakan.forEach(element => {
                                    dirasakan += '<li>' + element + '</li>'
                                });

                                $('#result_dirasakan').html(dirasakan)
                            }

                            var tidakdirasakan = '';
                            if (data.tidakdirasakan.length > 0) {

                                data.tidakdirasakan.forEach(element => {
                                    tidakdirasakan += '<li>' + element + '</li>'
                                });

                                $('#result_tidakdirasakan').html(tidakdirasakan)
                            }
                            var dilewati = '';
                            if (data.dilewati.length > 0) {

                                data.dilewati.forEach(element => {
                                    dilewati += '<li>' + element + '</li>'
                                });

                                $('#result_dilewati').html(dilewati)
                            }
                        }

                    });

                    $.ajax({
                        url: '/rekomendasi',
                        type: 'get',
                        data: {
                            sex: gender,
                            age: {
                                value: age
                            },
                            evidence: evidence
                        },
                        beforeSend: function() {
                            $(".preloader").show();
                        },
                        complete: function(data) {
                            $(".preloader").hide();
                            var spesialist = data.responseJSON.recommended_specialist;

                            // append gejala
                            var html_spesialist = '<li>' + spesialist.name + '</li>';
                            $('#result_rekomendasi').html(html_spesialist);
                        }




                    });


                    mainstepper.next();

                } else {
                    var question_type = data.responseJSON.question.type
                    var question = '';
                    if (question_type == 'single') {
                        var choices = data.responseJSON.question.items[0].choices;
                        var evidence_id = data.responseJSON.question.items[0].id;
                        var html = '<p style="text-align: center" id="single">' +
                            '<input tyep hidden name="evidence_single" value="' +
                            evidence_id + '" id="evidence_single">';
                        choices.forEach(element => {
                            var color = 'info';
                            if (element.id == 'present') {
                                color = 'success';
                            } else if (element.id == 'absent') {
                                color = 'danger';
                            }
                            html += '<button onclick="return addEvidence(\'' + element.id +
                                '\')"  class="btn btn-' + color + ' ml-2" value="' + element.id +
                                '">' + element.label + '</button>';
                        });

                        html += '</p>';
                        $('#question').html(html);
                    }

                    if (question_type == 'group_single') {
                        var html = ' <p style="text-align: center" id="group_single">' +
                            '<table class="table table-striped" style="font-size: 13px;" id="tbl_evidence_group_single">' +
                            '<tbody>';

                        var evidences = data.responseJSON.question.items;
                        evidences.forEach(element => {

                            html += '<tr>' +
                                '<td>' +
                                '<div class="icheck-primary d-inline">' +
                                '<input type="radio" id="' + element.id +
                                '" name="evidence_group_single" value="' + element.id + '">' +
                                '<label for="' + element.id + '"> ' + element.name +
                                '</label>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        });
                        html +=
                            '</tbody>' +
                            '</table>' +
                            '</p>';

                        if (data.responseJSON.should_stop == false) {
                            html +=
                                ' <button class="btn btn-success" onclick="return addEvidenceSingle()" style="float: right;"> Next </button>';
                        }
                        $('#question').html(html);
                    }

                    if (question_type == 'group_multiple') {

                        var evidences = data.responseJSON.question.items;
                        var html = '<p style="text-align: center" id="group_multiple">' +
                            '<table class="table table-striped" style="font-size: 13px;" id="tbl_evidence_group_multi">' +
                            '<tbody>';
                        evidences.forEach(element => {
                            html +=
                                '<tr>' +
                                '<td>' +
                                '<div class="icheck-primary d-inline">' +
                                '<input class="evidence_group_multi" type="checkbox" id="' +
                                element
                                .id +
                                '" name="evidence_group_multi[]" value="' + element.id +
                                '">' +
                                '<label for="' + element.id + '">' + element.name +
                                '</label>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        });

                        html +=
                            '</tbody>' +
                            '</table>' +
                            '</p>';

                        if (data.responseJSON.should_stop == false) {
                            html +=
                                ' <button class="btn btn-success" onclick="return addEvidenceGroup()" style="float: right;"> Next </button>';
                        }
                        $('#question').html(html);
                    }

                    $('#interview_question').text(data.responseJSON.question.text)
                }
            }

        });
    }

    function addEvidence(answer) {

        var listevidence = JSON.parse(localStorage.getItem('evidence'));
        var evidence_single = $('#evidence_single').val();
        var dict = {};
        dict['id'] = evidence_single;
        dict['choice_id'] = answer;
        listevidence.push(dict);
        localStorage.setItem('evidence', JSON.stringify(listevidence));

        getInterview()
    }

    function addEvidenceGroup() {
        var listevidence = JSON.parse(localStorage.getItem('evidence'));

        var selected = new Array();
        $("#tbl_evidence_group_multi input[type=checkbox]:checked").each(function() {
            selected.push(this.value);
        });

        selected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'present';
            listevidence.push(dict);
        });
        localStorage.setItem('evidence', JSON.stringify(listevidence));


        var unselected = new Array();
        $("#tbl_evidence_group_multi input[type=checkbox]:not(:checked)").each(function() {
            unselected.push(this.value);
        });

        unselected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'absent';
            listevidence.push(dict);
        });
        localStorage.setItem('evidence', JSON.stringify(listevidence));
        getInterview()
    }

    function addEvidenceSingle() {
        var listevidence = JSON.parse(localStorage.getItem('evidence'));

        var selected = new Array();
        $("#tbl_evidence_group_single input[type=radio]:checked").each(function() {
            selected.push(this.value);
        });

        selected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'present';
            listevidence.push(dict);
        });
        localStorage.setItem('evidence', JSON.stringify(listevidence));

        var unselected = new Array();
        $("#tbl_evidence_group_single input[type=radio]:not(:checked)").each(function() {
            unselected.push(this.value);
        });

        unselected.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'absent';
            listevidence.push(dict);
        });
        localStorage.setItem('evidence', JSON.stringify(listevidence));
        getInterview()
    }
</script>
