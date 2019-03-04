<?php
    $patient = $this->patient;
    $vaccines = $this->vaccines;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Patient Information <a href="#" class="update-trigger"><i class="ti-pencil"></i></a></h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm btn-update d-none" form = "updatePatientForm"><i class="ti-pencil"></i> <span>Update</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="updatePatientForm">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient Record</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" name="patient_name" value="<?=$patient['patient_name']?>">
                                <input type="hidden" disabled class="form-control" name="patient_id" value="<?=$patient['id']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" name="address" value="<?=$patient['address']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" value="<?=$patient['gender']?>" name="gender">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birthday</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" value="<?=$patient['birthday']?>" name="birthday" max="<?=date('Y-m-d')?>">
                            </div>
                        </div> 
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Father's Name</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" name="father_name" value="<?= !empty($patient['parent']) ? $patient['parent']['father_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="father_occupation" value="<?= !empty($patient['parent']) ? $patient['parent']['father_occupation'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="father_telephone" value="<?= !empty($patient['parent']) ? $patient['parent']['father_telephone'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mother's Name</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" name="mother_name" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="mother_occupation" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_occupation'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="mother_telephone" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_telephone'] : '' ?>">
                            </div>
                        </div> <hr>
                        <label>In case of emergency</label>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Guardian's Name</label>
                            <div class="col-sm-5">
                                <input required disabled type="text" class="form-control" name="guardian_name" value="<?= !empty($patient) ? $patient['guardian_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-4">
                                <input required disabled type="text" class="form-control" name="contact_no" value="<?= !empty($patient) ? $patient['contact_no'] : '' ?>">
                            </div>
                        </div> 
                        <h6 class="mb-4 mt-5" style="font-weight: 700">Birth History</h6>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Term</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="term" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['term'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">No. Of Months</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="no_of_mos" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['no_of_mos'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Weeks</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="weeks" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['no_of_mos'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Days</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="days" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['days'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Head Circumference</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" name="head_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['head_circumference'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Type of Delivery</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" name="type_of_delivery" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['type_of_delivery'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Chest Circumference</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" name="chest_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['chest_circumference'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birth Weight</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="birth_weight" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['birth_weight'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birth Length</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="birth_length" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['birth_length'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Blood Type</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="blood_type" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['blood_type'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Abdominal Circumference</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" name="abdominal_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['abdominal_circumference'] : '' ?>">
                            </ : '' div>
                        </div> 
                        <h6 class="mb-4 mt-5" style="font-weight: 700">Immunization Record</h6>
                        <div class="table-responsive">
                            <table class="table table-pad table-striped table-hover table-standard">
                                <thead>
                                    <tr>
                                        <th><strong>Vaccine</strong></th>                  
                                        <th>1st</th>                   
                                        <th>2nd</th>                   
                                        <th>3rd</th>                   
                                        <th>Booster 1</th>                   
                                        <th>Booster 2</th>                   
                                        <th>Booster 3</th>                   
                                        <th>Reaction</th>                                                   
                                    </tr>   
                                </thead>
                                <tbody>
                                    <?php foreach ($vaccines as $key => $vaccine) : ?>
                                        <?php $immune = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', array('patient_id' => $this->patient_id, 'vaccine_id' => $vaccine['id']));?>
                                        <tr>
                                            <td class="text-standard">
                                                <strong><?=$vaccine['vaccine']?></strong>
                                            </td>      
                                            <td><input type="checkbox" name="1st[<?=$vaccine['id']?>]" <?= !empty($immune[0]) && $immune[0]['1st'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><input type="checkbox" name="2nd[<?=$vaccine['id']?>]" <?= !empty($immune[0]) && $immune[0]['2nd'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><input type="checkbox" name="3rd[<?=$vaccine['id']?>]" <?= !empty($immune[0]) && $immune[0]['3rd'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><input type="checkbox" name="Booster_1[<?=$vaccine['id']?>]" <?=!empty($immune[0]) &&  $immune[0]['Booster_1'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><input type="checkbox" name="Booster_2[<?=$vaccine['id']?>]" <?=!empty($immune[0]) &&  $immune[0]['Booster_2'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><input type="checkbox" name="Booster_3[<?=$vaccine['id']?>]" <?=!empty($immune[0]) &&  $immune[0]['Booster_3'] == 1 ? 'checked' : '' ?>></td>      
                                            <td><textarea disabled class="form-control" name="reaction[<?=$vaccine['id']?>]" rows="2"><?= !empty($immune[0]) ? $immune[0]['reaction'] : '' ?></textarea></td>              
                                        </tr>
                                    <?php endforeach;?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/patient.js"></script>