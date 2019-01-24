<?php 
    $vaccines = $this->vaccines;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Add Bill</h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm" form="addPatientForm"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="addPatientForm">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender">
                                    <option>Jan Lawrence Tolentino</option>
                                    <option>Rejie Salvador</option>
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
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        </table>

                        <h6 class="mb-4 mt-5" style="font-weight: 700">Other Fees</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Doctor's Fee</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/patient.js"></script>