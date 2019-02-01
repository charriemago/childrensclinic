<?php 
    $id = $this->getId;
    $visit = $this->allVisits;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-visit" method="POST">
                <input type="hidden" name="patient_id" value="<?= $id?>">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Follow-Up Visits</h5>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-standard-success btn-sm"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                        <button type="button" class="btn btn-standard-success btn-add-line"><i class="pe-7s-plus pe-lg"></i> Add Line</button>
                    </div>
                </div><hr>
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 style="font-weight: 700">Records</h6>
                        <div class="table-responsive">
                            <table id="table-visits" class="table table-pad table-striped table-hover table-standard">
                                <thead>
                                    <tr>
                                        <th>Date</th>                  
                                        <th>Age</th>                   
                                        <th>Weight</th>                   
                                        <th>Height</th>                   
                                        <th>Diagnosis and Physician's Notes</th>                                       
                                    </tr>   
                                </thead>
                                <tbody>
                                    <?php foreach ($visit as $key => $v) : ?>
                                        <tr>
                                            <td><?= date('F d, Y', strtotime($v['date_created']))?></td>      
                                            <td><?= $v['age']?></td>      
                                            <td><?= $v['weight']?></td>      
                                            <td><?= $v['height']?></td>      
                                            <td><?= $v['diagnosis_physician_notes']?></td>      
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <td><input class="form-control" type="date" name="date_visit[]" required="required"></td>      
                                        <td><input class="form-control" type="number" name="age[]" required="required"></td>      
                                        <td><input class="form-control" type="text" name="weight[]" required="required"></td>      
                                        <td><input class="form-control" type="text" name="height[]" required="required"></td>      
                                        <td><input class="form-control" type="text" name="diagnosis[]" required="required"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/follow_up.js"></script>