<?php include('header.php'); ?>
<?php include('site_header.php'); ?>

<div class="page step step_4 m-0">

<div class="left_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="step_content">                    
                    <div class="step_title">04.<br>Travel</div>    
                    <div class="single_q">
                        <div class="q_title">
                            Car/Bike & Petrol/Diesel
                        </div>
                        <form class="single_radio" action="#">                            
                            <p>
                                <input type="radio" id="test1" name="radio-group" checked>
                                <label for="test1">Petrol Car</label>
                            </p>
                            <p>
                                <input type="radio" id="test2" name="radio-group">
                                <label for="test2">Diesel Car</label>
                            </p>
                            <p>
                                <input type="radio" id="test3" name="radio-group">
                                <label for="test3">Bike</label>
                            </p>
                        </form>
                    </div>            
                    <div class="single_q">
                        <div class="q_title">
                            Distance Travelled Annually
                        </div>
                        <form>
                            <div class="single_q_inner">
                                <div class="sq_lable_left">Homebody</div>
                                <div class="sq_lable_center">                                
                                    <input id="range4" name="range4" type="range" min="0" max="300" value="150">
                                </div>    
                                <div class="sq_lable_right">Wanderlust</div>
                            </div>
                        </form>
                    </div>
                    <div class="single_q custom_top_margin">
                        <div class="q_title">
                            Public Transport
                        </div>
                        <form class="single_radio" action="#">                            
                            <p>
                                <input type="radio" id="test4" name="radio-group" checked>
                                <label for="test4">Yes</label>
                            </p>
                            <p>
                                <input type="radio" id="test5" name="radio-group">
                                <label for="test5">No</label>
                            </p>                            
                        </form>
                    </div>  
                    <div class="single_q custom_top_minus">                        
                        <form>
                            <div class="single_q_inner">
                            <div class="select_q">
                                <select class="form-control" id="sel1" name="sellist1">
                                    <option>If Yes, KMS Annually</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="single_q custom_range">    
                        <div class="q_title">
                            Air Travel Yearly
                        </div>                    
                        <form>
                            <div class="single_q_inner">
                                <div class="sq_lable_left">Short Haul<br><span class="short">(Upto 300 KMS)</span></div>
                                <div class="sq_lable_center">                                
                                    <input id="range5" name="range5" type="range" min="0" max="300" value="150">
                                </div>    
                                <div class="sq_lable_right"></div>
                            </div>
                        </form>
                        <form>
                            <div class="single_q_inner">
                                <div class="sq_lable_left">Medium Haul<br><span class="short">(300-800 KMS)</span></div>
                                <div class="sq_lable_center">                                
                                    <input id="range6" name="range6" type="range" min="0" max="300" value="150">
                                </div>    
                                <div class="sq_lable_right"></div>
                            </div>
                        </form>
                        <form>
                            <div class="single_q_inner">
                                <div class="sq_lable_left">Long Haul<br><span class="short">(About 800 KMS)</span></div>
                                <div class="sq_lable_center">                                
                                    <input id="range7" name="range7" type="range" min="0" max="300" value="150">
                                </div>    
                                <div class="sq_lable_right"></div>
                            </div>
                        </form>
                    </div>                       
                    <div class="single_q">
                        <div class="form_field join_btn btn_link">
                            <a href="result.php"><input type="button" value="Calculate Your Footprint"></a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="free_box free_box_right">
    Did you know that a business class escape seat is 
    responsible for up to 3x more emissions than an 
    economy seat, since you also take up relatively more space!
</div>

</div>

<?php include('site_footer.php'); ?> 