<?php
    $vaccine = $this->vaccine;
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
            <a class="btn btn-standard btn-sm btn-add" href="#">
                <i class="pe-7s-plus pe-va pe-lg"></i> <span>Add Vaccine</span
            ></a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box-title clearfix">
                <div class="float-left">
                    <h5 class="mb-3 float-left"> Vaccine List</h5>
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
                                    <th>Vaccine</th>                   
                                    <th><i class="ti-settings"></i></th>                                  
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach ($vaccine as $key => $each) : ?>
                                    <tr>
                                        <td><?=$each['vaccine']?></td>      
                                        <td>
                                            <a href="#" class="btn-edit" data-id="<?=$each['id']?>"><i class="ti-pencil text-info"></i></a>
                                            <a href="#" class="btn-delete" data-id="<?=$each['id']?>"><i class="ti-trash text-danger"></i></a>
                                            <a href="<?= URL?>vaccine/bill/?id=<?= $each['id']?>" ><i class="ti-money text-success"></i></a>
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
<form method="post" id="addVaccineForm" class="form-standard">
    <div class="modal fade" id="addVaccineModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Vaccine
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Vaccine:</label>
                        <input class="form-control" name="vaccine">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-standard" data-dismiss="modal"  role="button">
                        <i class="pe-7s-close-circle pe-va pe-lg" aria-hidden="true"></i> CANCEL</button>
                    <button type="submit" class="btn btn-standard-success" data-action="save">
                        <i class="pe-7s-check pe-va pe-lg" aria-hidden="true"></i> YES</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" id="updateVaccineForm" class="form-standard">
    <div class="modal fade" id="updateVaccineModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Update Vaccine
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Vaccine:</label>
                        <input class="form-control" name="id" type="hidden">
                        <input class="form-control" name="vaccine" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-standard" data-dismiss="modal"  role="button">
                        <i class="pe-7s-close-circle pe-va pe-lg" aria-hidden="true"></i> CANCEL</button>
                    <button type="submit" class="btn btn-standard-success" data-action="save">
                        <i class="pe-7s-check pe-va pe-lg" aria-hidden="true"></i> YES</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(function(){
        var table = $('table').DataTable();
        $('.search-box-input').on( 'keyup', function () {
            table.search( this.value ).draw();
        });
    })
</script>
<script src="<?=URL?>public/js/vaccine.js"></script>