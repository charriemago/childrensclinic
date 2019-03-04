<?php
    $patient = $this->patient;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> SMS</h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm" id="allMessage"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit to All</span></button>
                    <button class="btn btn-standard-success btn-sm" form="addMessage"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="addMessage">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="patient[]" multiple>
                                    <?php
                                        foreach($patient as $each){
                                    ?>
                                        <option value="<?= $each['contact_no']?>"><?= $each['patient_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="message" rows="15" maxlength="100"></textarea>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/sms.js"></script>