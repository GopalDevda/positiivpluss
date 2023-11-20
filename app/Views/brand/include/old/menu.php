 <div class="side-content-wrap">

            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">          

                <div class="logo">                    
                    <img src="<?php echo base_url();?>/public/brand/assets/custom_img/logo_positive_short2.png">
                </div>
                <ul class="navigation-left">
                    <li class="nav-item no_line <?php echo isset($pg_nm)?($pg_nm=='Quick Start'?'active':''):'' ?>"><a class="nav-item-hold" href="<?php echo base_url();?>/supplier/quickStart">

                        <i class="nav-icon fa fa-fighter-jet" aria-hidden="true"></i>

                        <span class="nav-text">Quick Start</span></a>

                    </li>
                    <li class="nav-item no_line <?php echo isset($pg_nm)?($pg_nm=='Dashboard'?'active':''):'' ?>"><a class="nav-item-hold" href="<?php echo base_url();?>/supplier">

                        <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>

                        <span class="nav-text">Dashboard</span></a>

                    </li>
                    

                    <?php 

                    if($supplier_mod) {

                        foreach($supplier_mod as $sm) {

                    ?>

                    <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                        <span class="nav-text"><?php echo $sm["supplier_module_name"] ?></span></a>

                    </li>

                    <?php 

                        if($supplier_mod_item) {

                            foreach($supplier_mod_item as $smi) {

                                if($smi["supplier_module_id"]==$sm["id"]) {

                    ?>

                    <li class="nav-item no_line <?php echo isset($pg_nm)?($pg_nm==$smi["item_name"]?'active':''):'' ?>"><a class="nav-item-hold" href="<?php echo base_url();?>/<?php echo $smi['link'] ?>">
                        <img src='<?php echo base_url();?>/public/uploads/menu-icon/<?php echo $smi['img'];?>?v=1'/>

                        <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                        <span class="nav-text"><?php echo $smi["item_name"] ?></span></a>

                    </li>

                    <?php

                                }

                            }

                        }

                    ?>

                    <?php                            

                        }

                    }

                    ?>

<!--                    <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                        <span class="nav-text">Assessment</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url();?>/supplier/baseAssessment">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">Base</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url();?>/admin/advanceAssessment">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">Advanced</span></a>

                    </li>

                    <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                        <span class="nav-text">FOOTPRINTS</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">Company</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">Products</span></a>

                    </li>

                    

                    <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                        <span class="nav-text">DISCLOSURES</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">General</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">Sector</span></a>

                    </li>
                    
                    
                    <li class="nav-item mt-2"><a class="nav-item-hold" href="<?php echo base_url('brand/'); ?>/reporting">

                        <i class="nav-icon fa fa-check-square-o" aria-hidden="true"></i>

                        <span class="nav-text">Reports</span></a>

                    </li>
 -->
 
                <li class="nav-item no_line <?php echo isset($pg_nm)?($pg_nm=='report'?'active':''):'' ?>"><a class="nav-item-hold" href="<?php echo base_url('brand/'); ?>/reporting">

                        <i class="nav-icon fa fa-check-square-o" aria-hidden="true"></i>

                        <span class="nav-text">Reports</span></a>

                    </li>
                   
                   

                    

                    

                </ul>
                

            </div>
            <div class="view_plan"style=" display : none;">
                <?php 
                  $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
         $query = $db->query("select * from supplier where id='".$supplier_info['supplier_id']."'   ");
        $hda = $query->getResultArray();
       
        
        ?>
                Your Plan :  <b style="font-size:11px"> ID <?php echo $hda[0]['stripe_customer_id'];?></b>
                <div class="admin_btn mt-3" data-toggle="modal" data-target="#planModalCenter">
                    <input type="button" value="Upgrade">    
                </div>
            </div>        
            

            <!--<div class="sidebar-overlay"></div>-->

        </div>