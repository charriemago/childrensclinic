
<div class="search-box mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="pe-7s-search pe-lg"></i></span>
        </div>
        <input type="text" class="form-control search-box-input" placeholder="Search">
        <div class="input-group-prepend input-group-left">
            <button class="btn btn-standard btn-sm"><i class="pe-7s-print pe-va pe-lg"></i> <span>Export</span></button>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box-title clearfix">
                <div class="float-left">
                    <h5 class="mb-3 float-left"> Follow Up-Visit - Patients</h5>
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
                                    <th>Name</th>                  
                                    <th>Address</th>                                
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Jan Lawrence Tolentino</a></td>      
                                    <td>City</td>        
                                </tr>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Rejie Salvador</a></td>      
                                    <td>City</td>                    
                                </tr>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Khariza Fe Gapuz</a></td>      
                                    <td>City</td>             
                                </tr>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Shie Ann Dao</a></td>      
                                    <td>City</td>             
                                </tr>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Joan Rivera</a></td>      
                                    <td>City</td>             
                                </tr>
                                <tr>
                                    <td><a href="<?= URL?>followup/visit" class="text-standard">Mary Flor Velasquez</a></td>  
                                    <td>City</td>        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="form-standard" id="addDepartmentForm">
    <div class="modal modal-standard fade addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="modal-title">
                        Add Position
                    </span><hr>
                    <div class="form-group form-standard row">
                        <label class="col-sm-2 col-form-label">Position:</label>
                        <div class="col-sm-10">
                            <input class="form-control input-standard">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status:</label>
                        <div class="col-sm-10">
                            <label class="custom-control border-switch">
                                <input type="checkbox" class="border-switch-control-input">
                                <span class="border-switch-control-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-standard" data-dismiss="modal"><i class="pe-7s-close-circle pe-va pe-lg"></i> Cancel</button>
                    <button type="button" class="btn btn-standard-success"><i class="pe-7s-check pe-va pe-lg"></i> Save</button>
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
