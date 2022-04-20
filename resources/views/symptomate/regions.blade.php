<div id="test-nlf-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="mainsteppertrigger4">

    <div class="row">
        <div class="form-group col-md-12" style="text-align: center;">
            <h4><Strong>Pilih Wilayah</Strong></h4>
        </div>
        <div class="form-group col-md-6" style="text-align: left;">
            <p>
                Pilih wilayah tempat tinggal Anda dan tempat-tempat yang pernah Anda kunjungi dalam 12 bulan terakhir.
                <select class="form-control select2" style="width: 100%;" name="loc_risk_factor" id="loc_risk_factor"
                    data-dropdown-css-class="select2-orange" multiple="multiple">
                    <option value="">Pilih Region</option>

                </select>
            </p>
        </div>
        <div class="form-group col-md-6" style="text-align: left;">
            <a href="#"><img src="/images/regions.png" width="500" onclick="return patientstepper.next()"></a>
        </div>
    </div>
    <hr>
    <button class="btn btn-success" onclick="return setRegion()" style="float: right;">
        Next
    </button>

    <button class="btn btn-default" onclick="mainstepper.previous()" style="float:left;color:#2272c9;">
        <i class="fas fa-angle-left"></i>
        Back
    </button>
</div>


<script>
    function setRegion() {
        var locList = [];
        $.each($("#loc_risk_factor option:selected"), function() {
            locList.push($(this).val());
        });

        var listLoc = [];
        no = 1;
        locList.forEach(element => {
            var dict = {};
            dict['id'] = element;
            dict['choice_id'] = 'present';
            listLoc.push(dict);
            no++;
        });

        localStorage.setItem('locations', JSON.stringify(listLoc));
        var suggest = JSON.parse(localStorage.getItem('suggest'));
        var risk_factor = JSON.parse(localStorage.getItem('risk_factor'));
        var symptoms = JSON.parse(localStorage.getItem('symptoms'));

        var listevidence = symptoms.concat(risk_factor, suggest, listLoc);
        localStorage.setItem('evidence', JSON.stringify(listevidence));

        getInterview()

        mainstepper.next();

    }
</script>
