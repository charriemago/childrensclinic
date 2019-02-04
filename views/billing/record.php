<?php 
    $vaccines = $this->vaccines;
    $patient = $this->patientList;
    $bill = $this->bills;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Bill Record</h5>
                </div>
                <div class="float-right">
                </div>
            </div><hr>
            <form class="form-standard" id="addForm">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="patient" disabled>
                                    <?php
                                        foreach($patient as $each){
                                    ?>
                                        <option value="<?= $each['id']?>" <?= $bill[0]['patient_id'] == $each['id'] ? 'selected' : ''?>><?= $each['patient_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <h6 class="mb-4 mt-5" style="font-weight: 700">Vaccine</h6>
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th><strong>Vaccine</strong></th>                  
                                    <th>Bill</th>                                               
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach ($vaccines as $key => $vaccine) : ?>
                                    <tr>
                                        <td class="text-standard">
                                            <strong><?=$vaccine['vaccine']?></strong>
                                        </td>
                                        <input type="hidden" class="form-control" name="vaccine[]" value="<?=$vaccine['id']?>">    
                                        <?php $vaccineBill = Db::selectByColumn(DATABASE_NAME, 'tbl_billing_vaccine', array('billing_id' => $bill[0]['id'], 'vaccine_id' => $vaccine['id']))?>  
                                        <td><input disabled type="text" class="form-control" name="bill[]" value="<?= !empty($vaccineBill[0]['bill']) ? number_format($vaccineBill[0]['bill'], 2) : 0.00?>"></td>
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        </table>

                        <h6 class="mb-4 mt-5" style="font-weight: 700">Other Fees</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Doctor's Fee</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" type="text" name="doc_fee" value="<?= !empty($bill[0]['doctors_fee']) ? number_format($bill[0]['doctors_fee'],2) : 0.00?>">
                            </div>
                        </div>
                        <hr>
                        <div class="text-right mt-2 mb-2">
                            <span style="font-weight: bolder; font-size: 20px;">Total Fees:</span> 
                            <span class="total_fee" style="font-size: 20px;">P <?= !empty($bill[0]['total_fee']) ? number_format($bill[0]['total_fee'],2) : 0.00?></span>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>