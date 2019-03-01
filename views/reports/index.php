<?php
    $reports = $this->report;
    function age($date){
        $birthDate = explode("-", $date);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
          ? ((date("Y") - $birthDate[0]) - 1)
          : (date("Y") - $birthDate[0]));
        return ($age == 0) ? $age+1 : $age;
    }
?>
<div class="search-box mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="pe-7s-search pe-lg"></i></span>
        </div>
        <input type="text" class="form-control search-box-input" placeholder="Search">
        <div class="input-group-prepend input-group-left">
            <button class="btn btn-standard btn-sm btn-export"><i class="pe-7s-print pe-va pe-lg"></i> <span>Export</span></button>
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
                                    <th>Age</th>                                                  
                                    <th>Birthday</th>                                                  
                                    <th>Gender</th>                                                  
                                    <th>Address</th>                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($reports as $each){ ?>
                                    <tr>
                                        <td><?= $each['patient_name']?></td> 
                                        <td><?= age($each['birthday'])?></td> 
                                        <td><?= date('F d, Y', strtotime($each['birthday']))?></td> 
                                        <td><?= $each['gender']?></td> 
                                        <td><?= $each['address']?></td> 
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
                                    '<td>'+calculateAge(a.birthday)+'</td>'+
                                    '<td>'+convertDate(a.birthday)+'</td>'+
                                    '<td>'+a.gender+'</td>'+
                                    '<td>'+a.address+'</td>'+
                                '</tr>';
                                    
                })
                $('table').find('tbody').html(append);
            })
        })
        $('.btn-export').click(function(){
            let tabledata = `
                <style>
                    table {
                    border-collapse: collapse;
                    }

                    table, th, td {
                    border: 1px solid black;
                    }

                    table th {
                        background: #0d47a1;
                        color: white;
                    }
                <style>`+
                $("table").clone().wrap('<div>').parent().html()
            ;
            fnExcelReport('Report', tabledata);
        })
    })
    function convertDate(date){
        var date = date.split('-');
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months[date[1]-1]+' '+date[2]+', '+date[0];
    }
    function calculateAge(birthday) {
        var date = birthday.split('-');
        var today = new Date();
        var birthDate = new Date(date[1]+'/'+date[2]+'/'+date[0]);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age = age - 1;
        }
        return (age == 0) ? age+1 : age;
    }
</script>