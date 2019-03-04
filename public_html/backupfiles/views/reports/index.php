<?php
    $reports = $this->report;
?>
<div class="search-box mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="pe-7s-search pe-lg"></i></span>
        </div>
        <input type="text" class="form-control search-box-input" placeholder="Search">
        <div class="input-group-prepend input-group-left">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box-title row">
                <div class="col-lg-3">
                    <h5 class="mb-3 float-left"> Reports</h5>
                </div>
                <div class="col-lg-9">
                    <form class="form-standard" method="get">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">From:</label>
                            <div class="col-sm-3">
                                <input required type="date" class="form-control" name="from" value="<?= isset($_GET['from']) ? $_GET['from'] : date('Y-m-d')?>" style="font-size: 9px;">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">To:</label>
                            <div class="col-sm-3">
                                <input required type="date" class="form-control" name="to" value="<?= isset($_GET['to']) ? $_GET['to'] : date('Y-m-d')?>" style="font-size: 9px;">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-standard btn-sm btn-block" type="submit">
                                    <i class="pe-7s-refresh-2 pe-va pe-lg"></i> <span>Generate</span>
                                </button>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-standard btn-sm btn-block btn-all" type="button">
                                     <span>All</span>
                                </button>
                            </div>
                        </div> 
                    </form>
                 </div>
            </div>
            <div class="card card-standard card-pad card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th>Name</th>                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($reports as $each){ ?>
                                    <tr>
                                        <td><?= $each['patient_name']?></td> 
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
        $('.btn-all').click(function(){
            $.post(URL+'reports/report')
            .done(function(returnData){
                var data = $.parseJSON(returnData);
                var append = '';
                $.each(data, function(key,a){
                    append += '<tr>'+
                                    '<td>'+a.patient_name+'</td>'+
                                '</tr>';
                                    
                })
                $('table').find('tbody').html(append);
            })
        })
    })
</script>