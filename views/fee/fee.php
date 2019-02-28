<?php
    $fee = $this->fee;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Doctor's Fee</h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm" form="feeBill"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="feeBill">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Fee</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Fee</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="fee" value="<?= !empty($fee) ? $fee[0]['fee'] : 0 ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#feeBill').submit(function(){
            var form = $(this).serialize();
            validateForm("Are you sure you want to update this data?" , function(){
                $.post(URL+'fee/updateFee', form)
                .done(function(returnData){
                    alert("Doctor's Fee Successfully Updated.")
                    location.href = URL + 'fee';
                })
            })
            return false;
        })
    })
</script>