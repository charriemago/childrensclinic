<?php
    $bill = $this->bill;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Update Vaccine Bill</h5>
                </div>
                <div class="float-right">
                    <a class="btn btn-standard btn-sm" href="<?= URL?>vaccine">< <span>Back</span></a>
                    <button class="btn btn-standard-success btn-sm" form="updateVaccineBill"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="updateVaccineBill">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Bill</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> 1st</label>
                            <div class="col-sm-10">
                                <input required type="hidden" class="form-control" name="id" value="<?= $_GET['id']?>">
                                <input required type="number" class="form-control" name="bill1" value="<?= $bill[0]['1st']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> 2nd</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="bill2" value="<?= $bill[0]['2nd']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> 3rd</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="bill3" value="<?= $bill[0]['3rd']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Booster 1</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="billBooster1" value="<?= $bill[0]['booster_1']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Booster 2</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="billBooster2" value="<?= $bill[0]['booster_2']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Booster 3</label>
                            <div class="col-sm-10">
                                <input required type="number" class="form-control" name="billBooster3" value="<?= $bill[0]['booster_3']?>">
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
        $('#updateVaccineBill').submit(function(){
            var form = $(this).serialize();
            validateForm("Are you sure you want to update this data?" , function(){
                $.post(URL+'vaccine/updateBill', form)
                .done(function(returnData){
                    alert('Vaccine Successfully Updated.')
                    location.href = URL + 'vaccine';
                })
            })
            return false;
        })
    })
</script>