
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                              <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Parent</th>
                                                <th>Level</th>
                                                <th>Type</th>
                                                
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['menu_name'] ?></td>
                                                 <td><?= $row['menu_parent_name'] ?></td>
                                                  <td><?= $row['menu_level'] ?></td>
                                                <td><?php
                                                $type_name = array('', 'Top menu', 'Main menu');
                                                echo $type_name[$row['menu_type']]?></td>
                                                <td style="text-align:center;">

                                                <?php
                                                if($row['menu_type'] == 2 && $row['menu_level'] == 1){
                                                ?>
                                                <a href="menu.php?page=form_sub&menu_parent_id=<?= $row['menu_id']?>" class="btn btn-default " >Add Sub Menu</a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($row['menu_content_type'] == 1){
                                                ?>
                                                 <a href="menu.php?page=form_fix&id=<?= $row['menu_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                               
                                                <?php
                                                }else{
                                                ?>

                                                    <a href="menu.php?page=form&id=<?= $row['menu_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['menu_id']; ?>,'menu.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                <?php
                                                }
                                                ?>
                                                
                                                    
                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="6"><a href="<?= $add_button ?>" class="btn btn-success " >Add Menu</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->