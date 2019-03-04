<?php
    $bills = $this->bills;
?>
<div class="search-box mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="pe-7s-search pe-lg"></i></span>
        </div>
        <input type="text" class="form-control search-box-input" placeholder="Search">
        <div class="input-group-prepend input-group-left">
            <!-- <button class="btn btn-standard btn-sm"><i class="pe-7s-print pe-va pe-lg"></i> <span>Export</span></button> -->
            <a class="btn btn-standard btn-sm" href="<?=URL?>billing/add">
                <i class="pe-7s-plus pe-va pe-lg"></i> <span>Add Billing</span
            ></a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box-title clearfix">
                <div class="float-left">
                    <h5 class="mb-3 float-left"> Billing List</h5>
                </div>
                <div class="float-right">
                   
                </div>
            </div>
            <div class="card card-standard card-pad card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th>Date</th>                  
                                    <th>Name</th>                                
                                    <th>Total Fee</th>                                
                                    <th><i class="ti-settings"></i></th>                                
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach($bills as $each){
                                ?>
                                    <tr>
                                        <td><?= date('F d, Y',strtotime($each['date_created']))?></td>      
                                        <td><?= $each['patient_name']?></td> 
                                        <td>P<?= number_format($each['total_fee'],2)?></td> 
                                        <td><a href="<?=URL?>billing/record/<?= $each['id']?>" class="text-info"><i class="ti-search"></i></td> 
                                    </tr>
                                <?php } ?>
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
