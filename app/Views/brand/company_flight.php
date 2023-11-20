  <div class="row" id="map"></div>
  <div class="row" style="margin-top:10px;">
    <div class="col-md-12">
      <form id="flight_frm" action="<?php echo base_url(); ?>/brand/find_airport" method="post">
        <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="autocomplete">Departure</label>
            <input type="text" class="form-control" id="autocomplete" name="from" />          
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="autocomplete1">Arrival</label>
            <input type="text" class="form-control" id="autocomplete1" name="to" />          
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
              <label for="people">People</label>
              <select class="form-control" id="people" name="people">
                <option value="1">1 person</option>
                <option value="2">2 people</option>
                <option value="3">3 people</option>
                <option value="4">4 people</option>
                <option value="5">5 people</option>
                <option value="6">6 people</option>
                <option value="7">7 people</option>
              </select>
          </div>                    
        </div>
        <div class="col-md-2">
          <div class="form-group">
              <label for="nights">Nights</label>
              <select class="form-control" id="nights" name="nights">
                <option value="1">1 night</option>
                <option value="2">2 nights</option>
                <option value="3">3 nights</option>
                <option value="4">4 nights</option>
                <option value="5">5 nights</option>
                <option value="6">6 nights</option>
                <option value="7">7 nights</option>
              </select>
          </div>                              
        </div>
      </div>
        <input type="button" class="btn btn-primary" value="Submit" onclick="submit_data()" />          
      </form>      
    </div>
  </div>
  <div class="row" id="trip_div" style="display:none;margin-top:50px;background-color: #f2f2f2;border-radius: 15px">
    <div class="col-md-12" style="margin:10px;">
  <h4>We carbon neutralize your full trip - for free!</h4>
  <p>Choose the main method of transportation for this trip. It helps us make accurate calculations.</p>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home" id="bus">
        <span>
          <i class="fa fa-bus" aria-hidden="true"></i>
        </span>&nbsp;&nbsp;
      Bus
    </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1" id="rail">
        <span><i class="fa fa-train" aria-hidden="true"></i>
        </span>&nbsp;&nbsp;
      Rail</a>
    </li>
<!--     <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">
        <span><i class="fa fa-car" aria-hidden="true"></i>
        </span>&nbsp;&nbsp;
      Car</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#air_tab" id="air">
      <span>
        <i class="fa fa-plane" aria-hidden="true"></i>
      </span>&nbsp;&nbsp;
      Air</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
          <h5>
            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;
          Departing from <span id="departing_bus_station"></span></h5>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <p>
            <span>
              <i class="fa fa-male" aria-hidden="true"></i>              
            </span>&nbsp;&nbsp;
            Walking 0.2 km
          </p>          
        </div>
        <div class="col-md-4" style="text-align: right;">
          <div class="row">
            <div class="col-md-10">
              <p>0 kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="demo"></i>            
              </span>              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
        <div class="col-md-3">
          <p>        
            <span>
              <i class="fa fa-bus" aria-hidden="true"></i>
            </span>&nbsp;&nbsp;
          Bus from
          </p>
  </div>
        <div class="col-md-4">
          <div class="form-group">
              <select class="form-control" id="departure_bus_station" onchange="find_distance_between_bus_station()">
                <option>Select Bus Station</option>
              </select>
          </div>          
        </div>
        <div class="col-md-1"><p>to</p></div>
        <div class="col-md-4">
          <div class="form-group">
              <select class="form-control" id="arrival_bus_station" onchange="find_distance_between_bus_station()">
                <option>Select Bus Station</option>
              </select>
          </div>          
        </div>          
        </div>
      </div>
      <div class="col-md-4" style="text-align:right;">
        <p>0 kg</p>
      </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  Driving
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p>1.3 km</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="text-align: right">
          <p>0 kg</p>
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-8">
          <h5>
            <span>
              <i class="fa fa-building" aria-hidden="true"></i>              
            </span>&nbsp;&nbsp;
            Arriving at <span id="arriving_bus_station"> Bhopal</span>
          </h5>          
        </div>
        <div class="col-md-4" style="text-align:right;">
          <p>0 kg</p>
        </div>
      </div>
      <hr/>
        <div class="row">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">
              <h6>Round trip</h6>
              <p>Uncheck if your journey continues on another booking</p>
            </label>
          </div>          
        </div>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <p>We will remove 51 kg of CO₂ to make your entire trip Net Zero, for free!</p>
        </div>        
        <div class="col-md-12">
          <h5><a href="#">Hide carbon calculation</a></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <p>Distance: <span id="bus_station_distance"></span></p>
        </div>
      </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
          <h5>
            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;
          Departing from <span id="departing_rail_station"></span></h5>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <p>
            <span>
              <i class="fa fa-male" aria-hidden="true"></i>              
            </span>&nbsp;&nbsp;
            Walking 0.2 km
          </p>          
        </div>
        <div class="col-md-4" style="text-align: right;">
          <p>0 kg</p>
        </div>
      </div>


      <div class="row">
        <div class="col-md-8">
          <div class="row">
        <div class="col-md-3">
          <p>        
            <span>
              <i class="fa fa-bus" aria-hidden="true"></i>
            </span>&nbsp;&nbsp;
          Train from
          </p>
  </div>
        <div class="col-md-4">
          <div class="form-group">
              <select class="form-control" id="departure_rail_station" onchange="find_distance_between_rail_station()">
                <option>Select Rail Station</option>
              </select>
          </div>          
        </div>
        <div class="col-md-1"><p>to</p></div>
        <div class="col-md-4">
          <div class="form-group">
              <select class="form-control" id="arrival_rail_station" onchange="find_distance_between_rail_station()">
                <option>Select Rail Station</option>
              </select>
          </div>          
        </div>          
        </div>
      </div>
      <div class="col-md-4" style="text-align:right;">
        <p>0 kg</p>
      </div>
      </div>


<!--      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label>From</label>
              <select class="form-control" id="departure_rail_station" onchange="find_distance_between_rail_station()">
                <option>Select Rail Station</option>
              </select>
          </div>          
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>To</label>
              <select class="form-control" id="arrival_rail_station" onchange="find_distance_between_rail_station()">
                <option>Select Rail Station</option>
              </select>
          </div>          
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  Driving
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p>1.3 km</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="text-align: right">
          <p>0 kg</p>
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-8">
          <h5>
            <span>
              <i class="fa fa-building" aria-hidden="true"></i>              
            </span>&nbsp;&nbsp;
            Arriving at <span id="arriving_rail_station"></span>
          </h5>          
        </div>
        <div class="col-md-4" style="text-align:right;">
          <p>0 kg</p>
        </div>
      </div>
      <hr/>
        <div class="row">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">
              <h6>Round trip</h6>
              <p>Uncheck if your journey continues on another booking</p>
            </label>
          </div>          
        </div>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <p>We will remove 51 kg of CO₂ to make your entire trip Net Zero, for free!</p>
        </div>        
        <div class="col-md-12">
          <h5><a href="#">Hide carbon calculation</a></h5>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <p>Distance: <span id="rail_station_distance"></span></p>
        </div>
      </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="air_tab" class="container tab-pane fade">
      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
        <div class="col-md-12">
          <h5>
            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;
          Departing from <span id="departing_airport"></span></h5>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" id="transfer_departure_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="airport_departure_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="airport_departure_transfer">
                <option value="car" data-title="Driving" data-icon="fa fa-car">car</option>
                <option value="rail" data-title="Train" data-icon="fa fa-train">rail</option>
                <option value="bus" data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option value="bike" data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option value="walk" data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="airport_transfer_departure_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_airport_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="airport_departure_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <i id="airport_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-md-9">
          <div class="row">
        <div class="col-md-2">
          <p>        
            <span>
              <i class="fa fa-bus" aria-hidden="true"></i>
            </span>&nbsp;&nbsp;
            Flying
          </p>
        </div>
        <div class="col-md-3">
          <div class="form-group">
              <select class="form-control" id="flying_class" onchange="find_air_distance()">
                <option value="economy">economy</option>
                <option value="premium">premium</option>
                <option value="business">business</option>
                <option value="first">first</option>
              </select>
          </div>          
        </div>
        <div class="col-md-3">
          <div class="form-group">
              <select class="form-control" id="departure_airport" onchange="find_air_distance()">
                <option>Select Airport</option>
              </select>
          </div>          
        </div>
        <div class="col-md-1"><p>to</p></div>
        <div class="col-md-3">
          <div class="form-group">
              <select class="form-control" id="arrival_airport" onchange="find_air_distance()">
                <option>Select Airport</option>
              </select>
          </div>          
        </div>          
        </div>
      </div>
      <div class="col-md-3" style="text-align:right;">
        <div class="row">
          <div class="col-md-10">
            <p><span id="airport_distance_emission">0</span> kg</p>            
          </div>
          <div class="col-md-2">
            <span>
              <i id="airport_flying_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
            </span>                          
          </div>
        </div>
      </div>
      </div>
<!--      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label>From</label>
              <select class="form-control" id="departure_airport" onchange="find_air_distance()">
                <option>Select Airport</option>
              </select>
          </div>          
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>To</label>
              <select class="form-control" id="arrival_airport" onchange="find_air_distance()">
                <option>Select Airport</option>
              </select>
          </div>          
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" id="transfer_arrival_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="airport_arrival_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="airport_arrival_transfer">
                <option data-title="Driving" data-icon="fa fa-car">car</option>
                <option data-title="Train" data-icon="fa fa-train">rail</option>
                <option data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="airport_transfer_arrival_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_arrival_airport_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="airport_arrival_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="airport_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
              </span>                                        
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-9">
          <h5>
            <span>
              <i class="fa fa-building" aria-hidden="true"></i>              
            </span>&nbsp;&nbsp;
            Arriving at <span id="arriving_airport"></span>
          </h5>          
        </div>
        <div class="col-md-3" style="text-align:right;">
          <div class="row">
            <div class="col-md-10">
              <p><span id="airport_hotel_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="airport_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
              </span>                                                      
            </div>
          </div>
        </div>
      </div>
      <hr/>
        <div class="row">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="airport_round_trip" checked="checked">
            <label class="form-check-label" for="exampleCheck1">
              <h6>Round trip</h6>
              <p>Uncheck if your journey continues on another booking</p>
            </label>
          </div>          
        </div>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <p>We will remove <span id="total_emission_airport"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>
        </div>        
        <div class="col-md-12">
          <h5><a href="#">Hide carbon calculation</a></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <p>Distance: <span id="airport_distance"></span></p>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>