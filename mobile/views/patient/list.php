<?php
    $patients = $this->patients;
    // print_r($patients);
?>
<div class="search-box mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="pe-7s-search pe-lg"></i></span>
        </div>
        <input type="text" class="form-control search-box-input" placeholder="Search">
        <div class="input-group-prepend input-group-left">
            <!-- <button class="btn btn-standard btn-sm"><i class="pe-7s-print pe-va pe-lg"></i> <span>Export</span></button> -->
            <a class="btn btn-standard btn-sm" href="<?=URL?>patient/add">
                <i class="pe-7s-plus pe-va pe-lg"></i> <span>Add Patient</span
            ></a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box-title clearfix">
                <div class="float-left">
                    <h5 class="mb-3 float-left"> Patient Record</h5>
                </div>
                <div class="float-right">
                   
                </div>
            </div>
            <div class="card card-standard card-pad card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-pad table-striped table-hover table-standard" id="patientListTable">
                            <thead>
                                <tr>
                                    <th>Name</th>                  
                                    <th>Address</th>                   
                                    <th><i class="ti-settings"></i></th>                                  
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach ($patients as $key => $patient) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= URL?>patient/info/<?=$patient['id']?>" class="text-standard">
                                                <?=$patient['patient_name']?>
                                            </a>
                                        </td>      
                                        <td><?=$patient['address']?></td>      
                                        <td>
                                            <a href="#" class="btn-delete" data-id="<?=$patient['id']?>"><i class="ti-trash text-danger"></i></a>
                                        </td>              
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<script>
    $(function(){
        var table = $('table').DataTable();
        $('.search-box-input').on( 'keyup', function () {
            table.search( this.value ).draw();
        });
    })
</script>
<script src="<?=URL?>public/js/patient.js"></script>