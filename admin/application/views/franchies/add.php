<section id="middle">    <div id="content" class="dashboard padding-20">        <div class="col-md-12">            <div id="panel-1" class="panel panel-default">                <div class="panel-heading">									<span class="elipsis"><!-- panel title -->										<strong>Add Associates</strong>									</span>                    <!-- right options -->                    <ul class="options pull-right list-inline">                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Colapse"></a></li>                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand"></i></a></li>                        <li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Close"><i class="fa fa-times"></i></a></li>                    </ul>                </div>                <div class="panel-body">                    <?php                    $attributes = array('class' => '', 'id' => 'RecordForm');                    echo form_open('franchies/addfranchies',$attributes);                    ?>                    <div class="col-lg-12 error-box">                    </div>                    <label>Associates Type</label>                    <select class="form-control" required name="AssociatesType" id="AssociatesType">                        <option value="">-select-</option>                        <?php                        $role= $this->session->userdata('logged_role');                        $this->config->item($role);                        $contoller= $this->config->item($role);                        if(isset($contoller) && count($contoller)>0){                            foreach ($contoller as $c){                                ?>                                <option value="<?php echo $c;?>" <?php echo isset($form_data->AssociatesType) && $form_data->AssociatesType==$c?'selected':'' ?>><?php echo $c;?></option>                        <?php                            }                        }                        ?>                    </select>                    <br>                    <div class="AssignParent">                        <label>Parent Associates</label>                        <select class="form-control" required name="AssociatesType" id="AssociatesType">                            <option value="">-select-</option>                            <?php                            $role= $this->session->userdata('logged_role');                            $this->config->item($role);                            $contoller= $this->config->item($role);                            if(isset($contoller) && count($contoller)>0){                                foreach ($contoller as $c){                                    ?>                                    <option value="<?php echo $c;?>" <?php echo isset($form_data->AssociatesType) && $form_data->AssociatesType==$c?'selected':'' ?>><?php echo $c;?></option>                                    <?php                                }                            }                            ?>                        </select>                        <br>                    </div>                    <label>Associates Name</label>                    <input type="text" class="form-control" required name="FranchiesName" value="<?php echo isset($form_data->FranchiesName)?$form_data->FranchiesName:'' ;?>" id="FranchieseName" placeholder="Associates Name">                    <br>                    <label>Owner Name</label>                    <input type="text" class="form-control" name="OwnerName" value="<?php echo isset($form_data->OwnerName)?$form_data->OwnerName:'' ;?>" id="OwnerName" placeholder="Owner Name">                    <br>                    <label>Address</label>                    <textarea name="Address" class="form-control"><?php echo isset($form_data->Address)?$form_data->Address:'' ;?></textarea>                    <br>                    <label>Country</label>                    <select class="form-control" required name="Country" id="Country">                        <option value="">-select-</option>                        <?php foreach ($country_data as $c){                            ?>                            <option value="<?php echo $c['id']; ?>" <?php echo isset($form_data->Country) && $form_data->Country==$c['id']?'selected':'';?>><?php echo $c['name']?></option>                            <?php                        }?>                    </select>                    <br>                    <label>State &nbsp;<i class="fa fa-spinner fa-spin fa-1x fa-fw loading state-loading"></i></label>                    <select class="form-control" required name="State" id="State">                        <option value="">-select-</option>                        <?php                        if(isset($form_data->Country) && $form_data->Country!==""){                            $sql = "SELECT * FROM states WHERE country_id = ?";                            $query = $this->db->query($sql, $form_data->Country);                            $result=$query->result_array();                            foreach ($result as $row){                               ?>                                <option value="<?php echo $row['name']; ?>" <?php echo isset($form_data->State) && $form_data->State==$row['name']?'selected':'';?>><?php echo $row['name']?></option>                                <?php                            }                        } ?>                    </select>                    <br>                    <label>City &nbsp;<i class="fa fa-spinner fa-spin fa-1x fa-fw loading city-loading"></i></label>                    <select class="form-control"  name="City" id="City">                        <option value="">-select-</option>                        <?php                        if(isset($form_data->State) && $form_data->State!==""){                            $sql = "SELECT distinct city_name as name FROM all_population WHERE state_name = ?";                            $query = $this->db->query($sql, $form_data->State);                            $result=$query->result_array();                            foreach ($result as $row){                                ?>                                <option value="<?php echo $row['name']; ?>" <?php echo isset($form_data->City) && $form_data->City==$row['name']?'selected':'';?>><?php echo $row['name']?></option>                                <?php                            }                        } ?>                    </select>                    <br>                    <label>Area &nbsp;<i class="fa fa-spinner fa-spin fa-1x fa-fw loading area-loading"></i></label>                    <select class="form-control" name="Area"  id="Area">                        <option value="">-select-</option>                        <?php                        if(isset($form_data->City) && $form_data->City!==""){                            $sql = "SELECT * FROM all_population WHERE city_name = ?";                            $query = $this->db->query($sql, $form_data->City);                            $result=$query->result_array();                            foreach ($result as $row){                                ?>                                <option value="<?php echo $row['area_name']; ?>" <?php echo isset($form_data->Area) && $form_data->Area==$row['area_name']?'selected':'';?>><?php echo $row['area_name']?></option>                                <?php                            }                        } ?>                    </select>                    <br>                    <label>Phone No</label>                    <input type="text" class="form-control" name="Phone" value="<?php echo isset($form_data->Phone)?$form_data->Phone:'' ;?>" id="Phone" placeholder="Phone">                    <br>                    <label>Email</label>                    <input type="text" class="form-control" name="Email" value="<?php echo isset($form_data->Email)?$form_data->Email:'' ;?>" id="Email" placeholder="Email">                    <br>                    <label title="He will receive Incentives for the litre of the water produced in that particular area.">Incentive(in %)</label>                    <input type="text" class="form-control" name="Incentive" value="<?php echo isset($form_data->Incentive)?$form_data->Incentive:'' ;?>" id="Incentive" placeholder="Incentive">                    <br>                    <label>Basic Pay</label>                    <input type="text" class="form-control" name="BasicPay" value="<?php echo isset($form_data->BasicPay)?$form_data->BasicPay:'' ;?>" id="BasicPay" placeholder="BasicPay">                    <br>                    <label>Description</label>                    <textarea name="Description" class="form-control" id="Description"><?php echo isset($form_data->Description)?$form_data->Description:'' ;?></textarea>                    <br>                    <input type="hidden" id="RecordID" name="RecordID" value="<?php echo isset($form_data->Id)?$form_data->Id:''?>">                    </form>                </div>                <div class="panel-footer">                    <input type="submit" class="btn btn-sm btn-success pull-right submit-btn" form="RecordForm" value="Submit">                    <div class="clearfix"></div>                </div>            </div>            <!-- / -->        </div>    </div></section><script>    $(function () {        $("#RecordForm").submit(function (e) {            console.log('dsg');            e.preventDefault();            $elm=$(".submit-btn");            $elm.hide();            $elm.after('<i class="fa fa-spinner fa-spin fa-1x fa-fw loading submit-loading"></i>');            $.ajax({                type	: "POST",                url		: "addfranchies",                dataType : 'json',                data	:$(this).serialize(),                success	: function (resp) {                    if(resp.success){                        _toastr(resp.msg,"bottom-right","success",false);                        if(resp.redirect_url==""){                            setTimeout(function () {                                location.reload();                            },2000);                        }else{                            setTimeout(function () {                                window.location = "../"+resp.redirect_url;                            },2000);                        }                    }else{                        _toastr(resp.msg,"bottom-right","warning",false);                    }                    $(".submit-loading").remove();                    $elm.show();                }            });        });    });</script>