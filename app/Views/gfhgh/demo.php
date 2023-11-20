<!DOCTYPE html>
<html>
  <head>
    <title>www.W3docs.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places,geometry&type=airport"></script>
  </head>
  <body>


<div class="container">
  <div class="row" id="map"></div>
  <div class="row" style="margin-top:10px;">
    <div class="col-md-12">
      <form id="flight_frm" action="<?php echo base_url(); ?>/brand/find_airport" method="post">
        <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="autocomplete">Departure</label>
            <input type="text" class="form-control" id="autocomplete" name="trip_from" />          
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="autocomplete1">Arrival</label>
            <input type="text" class="form-control" id="autocomplete1" name="trip_to" />          
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
<!--      <div class="row" style="margin-bottom: 10px;">
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
      </div> -->


      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
        <div class="col-md-12">
          <h5>
            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;
          Departing from <span id="departing_bus_station"></span></h5>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" id="bus_transfer_departure_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="bus_departure_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="bus_departure_transfer">
                <option value="car" data-title="Driving" data-icon="fa fa-car">car</option>
                <option value="rail" data-title="Train" data-icon="fa fa-train">rail</option>
                <option value="bus" data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option value="bike" data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option value="walk" data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="bus_transfer_departure_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_bus_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="bus_departure_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <i id="bus_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-md-9">
          <div class="row">
        <div class="col-md-3">
          <p>        
            <span>
              <i class="fa fa-bus" aria-hidden="true"></i>
            </span>&nbsp;&nbsp;
            Bus From
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
      <div class="col-md-3" style="text-align:right;">
        <div class="row">
          <div class="col-md-10">
            <p><span id="bus_distance_emission">0</span> kg</p>            
          </div>
          <div class="col-md-2">
            <span>
              <i id="bus_riding_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
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
                <span><i class="fa fa-car" id="bus_transfer_arrival_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="bus_arrival_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="bus_arrival_transfer">
                <option data-title="Driving" data-icon="fa fa-car">car</option>
                <option data-title="Train" data-icon="fa fa-train">rail</option>
                <option data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="bus_transfer_arrival_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_arrival_bus_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="bus_arrival_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="bus_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
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
            Arriving at <span id="arriving_bus_station"></span>
          </h5>          
        </div>
        <div class="col-md-3" style="text-align:right;">
          <div class="row">
            <div class="col-md-10">
              <p><span id="bus_hotel_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="bus_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
              </span>                                                      
            </div>
          </div>
        </div>
      </div>
      <hr/>
        <div class="row">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="bus_round_trip" checked="checked">
            <label class="form-check-label" for="exampleCheck1">
              <h6>Round trip</h6>
              <p>Uncheck if your journey continues on another booking</p>
            </label>
          </div>          
        </div>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <p>We will remove <span id="total_emission_bus"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>
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
<!--      <div class="row" style="margin-bottom: 10px;">
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
      </div> -->

      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
        <div class="col-md-12">
          <h5>
            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;
          Departing from <span id="departing_rail_station"></span></h5>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" id="rail_transfer_departure_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="rail_departure_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="rail_departure_transfer">
                <option value="car" data-title="Driving" data-icon="fa fa-car">car</option>
                <option value="rail" data-title="Train" data-icon="fa fa-train">rail</option>
                <option value="bus" data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option value="bike" data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option value="walk" data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="rail_transfer_departure_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_rail_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="rail_departure_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <i id="rail_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-md-9">
          <div class="row">
        <div class="col-md-3">
          <p>        
            <span>
              <i class="fa fa-bus" aria-hidden="true"></i>
            </span>&nbsp;&nbsp;
            Train From
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
      <div class="col-md-3" style="text-align:right;">
        <div class="row">
          <div class="col-md-10">
            <p><span id="rail_distance_emission">0</span> kg</p>            
          </div>
          <div class="col-md-2">
            <span>
              <i id="rail_riding_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
            </span>                          
          </div>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <p>        
                <span><i class="fa fa-car" id="rail_transfer_arrival_icon" aria-hidden="true"></i>
                </span>&nbsp;&nbsp;
                  <span id="rail_arrival_transfer_spn">Driving</span>
                </p>
            </div>
            <div class="col-md-4">
              <select class="form-control" id="rail_arrival_transfer">
                <option data-title="Driving" data-icon="fa fa-car">car</option>
                <option data-title="Train" data-icon="fa fa-train">rail</option>
                <option data-title="Bus" data-icon="fa fa-bus">bus</option>
                <option data-title="Cycling" data-icon="fa fa-bicycle">bike</option>
                <option data-title="Walking" data-icon="fa fa-male">walk</option>
              </select>              
            </div>
            <div class="col-md-3">
              <select class="form-control" id="rail_transfer_arrival_fuel">
                <option>petrol</option>
                <option>diesel</option>
                <option>hybrid</option>
                <option>electric</option>
              </select>              
            </div>
            <div class="col-md-2">
              <p><span id="location_arrival_rail_distance">0</span> km</p>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="text-align: right">
          <div class="row">
            <div class="col-md-10">
              <p><span id="rail_arrival_distane_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="rail_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
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
            Arriving at <span id="arriving_rail_station"></span>
          </h5>          
        </div>
        <div class="col-md-3" style="text-align:right;">
          <div class="row">
            <div class="col-md-10">
              <p><span id="rail_hotel_emission">0</span> kg</p>              
            </div>
            <div class="col-md-2">
              <span>
                <i id="rail_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            
              </span>                                                      
            </div>
          </div>
        </div>
      </div>
      <hr/>
        <div class="row">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rail_round_trip" checked="checked">
            <label class="form-check-label" for="exampleCheck1">
              <h6>Round trip</h6>
              <p>Uncheck if your journey continues on another booking</p>
            </label>
          </div>          
        </div>
      <hr/>
      <div class="row">
        <div class="col-md-12">
          <p>We will remove <span id="total_emission_rail"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>
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
</div>

    <script>
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);

      var input1 = document.getElementById('autocomplete1');
      var autocomplete1 = new google.maps.places.Autocomplete(input1);

    </script>
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&callback=initMap&libraries=places&v=weekly"
      async
    ></script> -->

    <script>
        function submit_data() {
            $("#trip_div").show();
            $("#bus_station_distance").html("");
            $("#rail_station_distance").html("");
            $("#airport_distance").html("");
            $("#departure_airport").html("<option value=''>Select Airport</option>");
            $("#arrival_airport").html("<option value=''>Select Airport</option>");
            $("#departure_bus_station").html("<option value=''>Select Bus From</option>");
            $("#arrival_bus_station").html("<option value=''>Select Bus To</option>");
            $("#departure_rail_station").html("<option value=''>Select Train From</option>");
            $("#arrival_rail_station").html("<option value=''>Select Train To</option>");
            $("#bus").addClass('active');
            $("#rail").removeClass('active');
            $("#air").removeClass('active');
            $("#home").addClass('active show');
            $("#menu1").removeClass('active show');
            $("#menu2").removeClass('active show');
            $("#air_tab").removeClass('active show');
            var trip_from = $("#autocomplete").val();
            var trip_to = $("#autocomplete1").val();
            var post_url = $("#flight_frm").attr("action"); //get form action url
            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
            departing_from = $("#autocomplete").val();
            arriving_at = $("#autocomplete1").val();
            $("#departing_bus_station").html(departing_from);
            $("#arriving_bus_station").html(arriving_at);
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);

var map;
var service;
var infowindow;

// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['bus_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    var opt = "<option>Select Bus From</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";
      }
    }
    $("#departure_bus_station").html(opt);

// places To

// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['bus_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    console.log(results);
    var opt = "<option>Select Bus To</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";
      }
    }
    $("#arrival_bus_station").html(opt);
    nights = $("#nights").val();
    people = $("#people").val();
    tooltip_text = "<p>Hotel 31 kg<br/>";
    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
    tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";
    tooltip_text+= "<p></p>";
    tooltip_text+= "<p>Meal 3 kg<br/>";
    tooltip_text+= "3 meals a day x 3<br/>";
    tooltip_text+= ""+people+" people x "+people+"<br/>";
    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
    tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";
    tooltip_text+= "<p></p>";
    tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";
    $('#bus_hotel_tooltip').attr('data-original-title', tooltip_text);
    $("#bus_hotel_emission").html(((31*nights)+(3*3*nights*people)));
  }
}

  }
}






// var map;
// var service;
// var infowindow;

// // function initialize() {
//   var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);

//   map = new google.maps.Map(document.getElementById('map'), {
//       center: pyrmont,
//       zoom: 15
//     });

//   var request = {
//     location: pyrmont,
//     radius: '50000',
//     type: ['bus_station']
//   };

//   service = new google.maps.places.PlacesService(map);
//   service.nearbySearch(request, callback);
// // }

// function callback(results, status) {
//   alert('in callback');
//   if (status == google.maps.places.PlacesServiceStatus.OK) {
//     alert('success');
//     console.log(results);
//     alert(results[0].place_id);
// var request = {
//   placeId: results[0].place_id,
//   fields: ['name', 'rating', 'formatted_phone_number', 'geometry']
// };

// service = new google.maps.places.PlacesService(map);
// service.getDetails(request, callback);

// function callback(place, status) {
//   alert('place');
//   if (status == google.maps.places.PlacesServiceStatus.OK) {
//     console.log("----------------");
//     console.log(place);
//     alert(place.geometry.location.lat());
//     alert(place.geometry.location.lng());
//     // createMarker(place);
//   }
// }

//     // for (var i = 0; i < results.length; i++) {
//     //   createMarker(results[i]);
//     // }
//   }
// }

            });
      }


    </script>
    <script>
/*      $(document).ready(function(){
        $( "#autocomplete" ).change(function() {
          var autocomplete1 = $("#autocomplete1").val();
          if(autocomplete1) {
            $("#trip_div").show();
            var post_url = $("#flight_frm").attr("action"); //get form action url
            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
                console.log(rs);
            });


          }
          else {
          }
        });        

        $( "#autocomplete1" ).change(function() {
          var test = $("#autocomplete1").val();
          alert(test);
          var autocomplete = $("#autocomplete").val();
          if(autocomplete) {
            $("#trip_div").show();
            var post_url = $("#flight_frm").attr("action"); //get form action url
            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);


var map;
var service;
var infowindow;

// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['bus_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  alert('in callback');
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    var opt = "<option>Select Train From</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"'>"+results[i].name+"</option>";
      }
    }
    $("#departure_train_station").html(opt);

// places To

// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['bus_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  alert('in callback');
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    console.log(results);
    var opt = "<option>Select Train From</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"'>"+results[i].name+"</option>";
      }
    }
    $("#arrival_train_station").html(opt);
  }
}

  }
}




            });
          }
          else {
          }
        });        
      });      
*/

    $(document).ready(function(){
      $("#rail").click(function(){


            var post_url = $("#flight_frm").attr("action"); //get form action url
            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
            departing_from = $("#autocomplete").val();
            arriving_at = $("#autocomplete1").val();
            $("#departing_rail_station").html(departing_from);
            $("#arriving_rail_station").html(arriving_at);
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
var map;
var service;
var infowindow;
// alert(rs.latitudeFrom);
// alert(rs.longitudeFrom);
// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);
  console.log(pyrmont);
  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['train_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  // alert('testing');
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    console.log(results);
    var opt = "<option>Select Train From</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";
      }
    }
    $("#departure_rail_station").html(opt);

// places To

// function initialize() {
  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var request = {
    location: pyrmont,
    radius: '50000',
    type: ['train_station']
  };

  service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
// }

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    console.log(results);
    var opt = "<option>Select Train To</option>";
    if(results) {
      for(i=0;i<results.length;i++) {
        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";
      }
    }
    $("#arrival_rail_station").html(opt);
  }
  else {
    $("#arrival_rail_station").html(opt);
  }
    nights = $("#nights").val();
    people = $("#people").val();
    tooltip_text = "<p>Hotel 31 kg<br/>";
    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
    tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";
    tooltip_text+= "<p></p>";
    tooltip_text+= "<p>Meal 3 kg<br/>";
    tooltip_text+= "3 meals a day x 3<br/>";
    tooltip_text+= ""+people+" people x "+people+"<br/>";
    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
    tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";
    tooltip_text+= "<p></p>";
    tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";
    $('#rail_hotel_tooltip').attr('data-original-title', tooltip_text);
    $("#rail_hotel_emission").html(((31*nights)+(3*3*nights*people)));
}

  }
}

});


      });


      $("#air").click(function(){


            var post_url = '<?php echo base_url(); ?>/brand/getAirportByLocation'; //get form action url
            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
            departing_from = $("#autocomplete").val();
            arriving_at = $("#autocomplete1").val();
            $("#departing_airport").html(departing_from);
            $("#arriving_airport").html(arriving_at);
            nights = $("#nights").val();
            people = $("#people").val();
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
                opt = "<option value=''>Select Airport</option>";
                if(rs.airports_from) {
                  for(i=0;i<rs.airports_from.length;i++) {
                    // alert(rs.airports_from[i].name);
                    opt+="<option value='"+rs.airports_from[i].code+"' data-nm='"+rs.airports_from[i].name+"'>"+rs.airports_from[i].name+"</option>";
                  }
                }
                $("#departure_airport").html(opt);
                opt = "<option value=''>Select Airport</option>";
                if(rs.airports_to) {
                  for(i=0;i<rs.airports_to.length;i++) {
                    // alert(rs.airports_from[i].name);
                    opt+="<option value='"+rs.airports_to[i].code+"' data-nm='"+rs.airports_to[i].name+"'>"+rs.airports_to[i].name+"</option>";
                  }
                }
                $("#arrival_airport").html(opt);
                tooltip_text = "<p>Hotel 31 kg<br/>";
                tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
                tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";
                tooltip_text+= "<p></p>";
                tooltip_text+= "<p>Meal 3 kg<br/>";
                tooltip_text+= "3 meals a day x 3<br/>";
                tooltip_text+= ""+people+" people x "+people+"<br/>";
                tooltip_text+= ""+nights+" nights x "+nights+"<br/>";
                tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";
                tooltip_text+= "<p></p>";
                tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";
                $('#airport_hotel_tooltip').attr('data-original-title', tooltip_text);
                $("#airport_hotel_emission").html(((31*nights)+(3*3*nights*people)));
            });


      });

      $("#airport_arrival_transfer").change(function(){
        to = $("#autocomplete1").val();
        arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');
        airport_arrival_transfer = $("#airport_arrival_transfer").val();
        var transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');
        var transfer_icon = $("#airport_arrival_transfer").find(':selected').data('icon');
        airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();
        if(transfer_title=="Driving") {
          $("#airport_transfer_arrival_fuel").show();
          $("#airport_transfer_arrival_fuel").parent().show();
        }
        else {
          $("#airport_transfer_arrival_fuel").hide();
          $("#airport_transfer_arrival_fuel").parent().hide();
        }
        $("#airport_arrival_transfer_spn").html(transfer_title);
        $("#transfer_arrival_icon").removeClass();
        $("#transfer_arrival_icon").addClass(transfer_icon);
        if(to && arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel;
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#airport_round_trip').is(":checked")){
                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#airport_distance").html(rs.distance);
                  $("#airport_arrival_distane_emission").html(rs.emission*2);
                  $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#airport_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#airport_distance").html(rs.distance);
                  $("#airport_arrival_distane_emission").html(rs.emission);
                  $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $("#airport_departure_transfer").change(function(){
        from = $("#autocomplete").val();
        departure_airport_name = $("#departure_airport").find(':selected').data('nm');
        airport_departure_transfer = $("#airport_departure_transfer").val();
        var transfer_title = $("#airport_departure_transfer").find(':selected').data('title');
        var transfer_icon = $("#airport_departure_transfer").find(':selected').data('icon');
        airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();
        if(transfer_title=="Driving") {
          $("#airport_transfer_departure_fuel").show();
          $("#airport_transfer_departure_fuel").parent().show();
        }
        else {
          $("#airport_transfer_departure_fuel").hide();
          $("#airport_transfer_departure_fuel").parent().hide();
        }
        $("#airport_departure_transfer_spn").html(transfer_title);
        $("#transfer_departure_icon").removeClass();
        $("#transfer_departure_icon").addClass(transfer_icon);
        if(from && departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#airport_round_trip').is(":checked")){
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#airport_distance").html(rs.distance);
                  $("#airport_departure_distane_emission").html(rs.emission*2);
                  $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#airport_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#airport_distance").html(rs.distance);
                  $("#airport_departure_distane_emission").html(rs.emission);
                  $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $('#airport_round_trip').click(function(){
        departure_code = $("#departure_airport").val();
        arrival_code = $("#arrival_airport").val();
        flying_class = $("#flying_class").val();
        from = $("#autocomplete").val();
        to = $("#autocomplete1").val();
        departure_airport_name = $("#departure_airport").find(':selected').data('nm');
        arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');
        airport_departure_transfer = $("#airport_departure_transfer").val();
        airport_arrival_transfer = $("#airport_arrival_transfer").val();
        airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();
        airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();
        var departure_transfer_title = $("#airport_departure_transfer").find(':selected').data('title');                
        var arrival_transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');                
        if($(this).is(":checked")){
          if(departure_code && arrival_code) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_air_distance',
              type: 'post',
              data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_distance_emission").html(rs.emission*2);
                $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_departure_distane_emission").html(rs.emission*2);
                $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_arrival_distane_emission").html(rs.emission*2);
                $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
        else if($(this).is(":not(:checked)")){
          if(departure_code && arrival_code) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_air_distance',
              type: 'post',
              data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_distance_emission").html(rs.emission);
                $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_departure_distane_emission").html(rs.emission);
                $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#airport_distance").html(rs.distance);
                $("#airport_arrival_distane_emission").html(rs.emission);
                $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
      });

// For Bus station Start

      $("#bus_arrival_transfer").change(function(){
        to = $("#autocomplete1").val();
        arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');
        airport_arrival_transfer = $("#bus_arrival_transfer").val();
        var transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');
        var transfer_icon = $("#bus_arrival_transfer").find(':selected').data('icon');
        airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();
        if(transfer_title=="Driving") {
          $("#bus_transfer_arrival_fuel").show();
          $("#bus_transfer_arrival_fuel").parent().show();
        }
        else {
          $("#bus_transfer_arrival_fuel").hide();
          $("#bus_transfer_arrival_fuel").parent().hide();
        }
        $("#bus_arrival_transfer_spn").html(transfer_title);
        $("#bus_transfer_arrival_icon").removeClass();
        $("#bus_transfer_arrival_icon").addClass(transfer_icon);
        if(to && arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel;
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#bus_round_trip').is(":checked")){
                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#bus_station_distance").html(rs.distance);
                  $("#bus_arrival_distane_emission").html(rs.emission*2);
                  $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#bus_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#bus_station_distance").html(rs.distance);
                  $("#bus_arrival_distane_emission").html(rs.emission);
                  $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $("#bus_departure_transfer").change(function(){
        from = $("#autocomplete").val();
        departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');
        airport_departure_transfer = $("#bus_departure_transfer").val();
        var transfer_title = $("#bus_departure_transfer").find(':selected').data('title');
        var transfer_icon = $("#bus_departure_transfer").find(':selected').data('icon');
        airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();
        if(transfer_title=="Driving") {
          $("#bus_transfer_departure_fuel").show();
          $("#bus_transfer_departure_fuel").parent().show();
        }
        else {
          $("#bus_transfer_departure_fuel").hide();
          $("#bus_transfer_departure_fuel").parent().hide();
        }
        $("#bus_departure_transfer_spn").html(transfer_title);
        $("#bus_transfer_departure_icon").removeClass();
        $("#bus_transfer_departure_icon").addClass(transfer_icon);
        if(from && departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#bus_round_trip').is(":checked")){
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#bus_station_distance").html(rs.distance);
                  $("#bus_departure_distane_emission").html(rs.emission*2);
                  $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#bus_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#bus_station_distance").html(rs.distance);
                  $("#bus_departure_distane_emission").html(rs.emission);
                  $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $('#bus_round_trip').click(function(){
        departure_code = $("#departure_bus_station").val();
        arrival_code = $("#arrival_bus_station").val();
        // flying_class = $("#flying_class").val();
        from = $("#autocomplete").val();
        to = $("#autocomplete1").val();
        departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');
        arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');
        airport_departure_transfer = $("#bus_departure_transfer").val();
        airport_arrival_transfer = $("#bus_arrival_transfer").val();
        airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();
        airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();
        var departure_transfer_title = $("#bus_departure_transfer").find(':selected').data('title');                
        var arrival_transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');                
        if($(this).is(":checked")){
          if(departure_code && arrival_code) {
            // $.ajax({
            //   url: '<?php echo base_url() ?>/brand/find_air_distance',
            //   type: 'post',
            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
            //   success: function(response){
            //     rs = JSON.parse(response);
            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
            //     $("#airport_distance").html(rs.distance);
            //     $("#airport_distance_emission").html(rs.emission*2);
            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            //   }
            // });

    var lat_from = "";
    var long_from = "";
    var lat_to = "";
    var long_to = "";
    var request = {
      placeId: departure_code,
      fields: ['geometry']
    };

    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);

    function callback(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        lat_from = place.geometry.location.lat();
        long_from = place.geometry.location.lng();
        // alert(lat_from);
        // alert(long_from);
        var request = {
          placeId: arrival_code,
          fields: ['geometry']
        };

        service = new google.maps.places.PlacesService(map);
        service.getDetails(request, callback);

        function callback(place, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            lat_to = place.geometry.location.lat();
            long_to = place.geometry.location.lng();
            $.ajax({
               url: '<?php echo base_url() ?>/brand/find_distance',
               type: 'post',
               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
               success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_distance_emission").html(rs.emission*2);
                $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

               }
            });
          }
        }
      }
    }


          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_departure_distane_emission").html(rs.emission*2);
                $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_arrival_distane_emission").html(rs.emission*2);
                $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
        else if($(this).is(":not(:checked)")){
          if(departure_code && arrival_code) {
            // $.ajax({
            //   url: '<?php echo base_url() ?>/brand/find_air_distance',
            //   type: 'post',
            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
            //   success: function(response){
            //     rs = JSON.parse(response);
            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";
            //     $("#airport_distance").html(rs.distance);
            //     $("#airport_distance_emission").html(rs.emission);
            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            //   }
            // });

    var lat_from = "";
    var long_from = "";
    var lat_to = "";
    var long_to = "";
    var request = {
      placeId: departure_code,
      fields: ['geometry']
    };

    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);

    function callback(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        lat_from = place.geometry.location.lat();
        long_from = place.geometry.location.lng();
        // alert(lat_from);
        // alert(long_from);
        var request = {
          placeId: arrival_code,
          fields: ['geometry']
        };

        service = new google.maps.places.PlacesService(map);
        service.getDetails(request, callback);

        function callback(place, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            lat_to = place.geometry.location.lat();
            long_to = place.geometry.location.lng();
            $.ajax({
               url: '<?php echo base_url() ?>/brand/find_distance',
               type: 'post',
               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
               success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Bus ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_distance_emission").html(rs.emission);
                $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);
                // console.log(rs);
                // $("#bus_station_distance").html(response);
               }
            });
          }
        }
      }
    }


          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_departure_distane_emission").html(rs.emission);
                $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#bus_station_distance").html(rs.distance);
                $("#bus_arrival_distane_emission").html(rs.emission);
                $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
      });



// For Bus station End



// For Train station Start

      $("#rail_arrival_transfer").change(function(){
        to = $("#autocomplete1").val();
        arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');
        airport_arrival_transfer = $("#rail_arrival_transfer").val();
        var transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');
        var transfer_icon = $("#rail_arrival_transfer").find(':selected').data('icon');
        airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();
        if(transfer_title=="Driving") {
          $("#rail_transfer_arrival_fuel").show();
          $("#rail_transfer_arrival_fuel").parent().show();
        }
        else {
          $("#rail_transfer_arrival_fuel").hide();
          $("#rail_transfer_arrival_fuel").parent().hide();
        }
        $("#rail_arrival_transfer_spn").html(transfer_title);
        $("#rail_transfer_arrival_icon").removeClass();
        $("#rail_transfer_arrival_icon").addClass(transfer_icon);
        if(to && arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel;
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#rail_round_trip').is(":checked")){
                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#rail_station_distance").html(rs.distance);
                  $("#rail_arrival_distane_emission").html(rs.emission*2);
                  $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#rail_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#rail_station_distance").html(rs.distance);
                  $("#rail_arrival_distane_emission").html(rs.emission);
                  $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $("#rail_departure_transfer").change(function(){
        from = $("#autocomplete").val();
        departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');
        airport_departure_transfer = $("#rail_departure_transfer").val();
        var transfer_title = $("#rail_departure_transfer").find(':selected').data('title');
        var transfer_icon = $("#rail_departure_transfer").find(':selected').data('icon');
        airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();
        if(transfer_title=="Driving") {
          $("#rail_transfer_departure_fuel").show();
          $("#rail_transfer_departure_fuel").parent().show();
        }
        else {
          $("#rail_transfer_departure_fuel").hide();
          $("#rail_transfer_departure_fuel").parent().hide();
        }
        $("#rail_departure_transfer_spn").html(transfer_title);
        $("#rail_transfer_departure_icon").removeClass();
        $("#rail_transfer_departure_icon").addClass(transfer_icon);
        if(from && departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = transfer_title;
                if(transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                if($('#rail_round_trip').is(":checked")){
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                  $("#rail_station_distance").html(rs.distance);
                  $("#rail_departure_distane_emission").html(rs.emission*2);
                  $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
                }
                else if($('#rail_round_trip').is(":not(:checked)")){
                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                  $("#rail_station_distance").html(rs.distance);
                  $("#rail_departure_distane_emission").html(rs.emission);
                  $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
                }
              }
            });          
        }
      });

      $('#rail_round_trip').click(function(){
        departure_code = $("#departure_rail_station").val();
        arrival_code = $("#arrival_rail_station").val();
        // flying_class = $("#flying_class").val();
        from = $("#autocomplete").val();
        to = $("#autocomplete1").val();
        departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');
        arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');
        airport_departure_transfer = $("#rail_departure_transfer").val();
        airport_arrival_transfer = $("#rail_arrival_transfer").val();
        airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();
        airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();
        var departure_transfer_title = $("#rail_departure_transfer").find(':selected').data('title');                
        var arrival_transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');                
        if($(this).is(":checked")){
          if(departure_code && arrival_code) {
            // $.ajax({
            //   url: '<?php echo base_url() ?>/brand/find_air_distance',
            //   type: 'post',
            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
            //   success: function(response){
            //     rs = JSON.parse(response);
            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
            //     $("#airport_distance").html(rs.distance);
            //     $("#airport_distance_emission").html(rs.emission*2);
            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            //   }
            // });

    var lat_from = "";
    var long_from = "";
    var lat_to = "";
    var long_to = "";
    var request = {
      placeId: departure_code,
      fields: ['geometry']
    };

    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);

    function callback(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        lat_from = place.geometry.location.lat();
        long_from = place.geometry.location.lng();
        // alert(lat_from);
        // alert(long_from);
        var request = {
          placeId: arrival_code,
          fields: ['geometry']
        };

        service = new google.maps.places.PlacesService(map);
        service.getDetails(request, callback);

        function callback(place, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            lat_to = place.geometry.location.lat();
            long_to = place.geometry.location.lng();
            $.ajax({
               url: '<?php echo base_url() ?>/brand/find_distance',
               type: 'post',
               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
               success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Train ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_distance_emission").html(rs.emission*2);
                $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

               }
            });
          }
        }
      }
    }


          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_departure_distane_emission").html(rs.emission*2);
                $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_arrival_distane_emission").html(rs.emission*2);
                $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
        else if($(this).is(":not(:checked)")){
          if(departure_code && arrival_code) {
            // $.ajax({
            //   url: '<?php echo base_url() ?>/brand/find_air_distance',
            //   type: 'post',
            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},
            //   success: function(response){
            //     rs = JSON.parse(response);
            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";
            //     $("#airport_distance").html(rs.distance);
            //     $("#airport_distance_emission").html(rs.emission);
            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            //   }
            // });

    var lat_from = "";
    var long_from = "";
    var lat_to = "";
    var long_to = "";
    var request = {
      placeId: departure_code,
      fields: ['geometry']
    };

    service = new google.maps.places.PlacesService(map);
    service.getDetails(request, callback);

    function callback(place, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        lat_from = place.geometry.location.lat();
        long_from = place.geometry.location.lng();
        // alert(lat_from);
        // alert(long_from);
        var request = {
          placeId: arrival_code,
          fields: ['geometry']
        };

        service = new google.maps.places.PlacesService(map);
        service.getDetails(request, callback);

        function callback(place, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            lat_to = place.geometry.location.lat();
            long_to = place.geometry.location.lng();
            $.ajax({
               url: '<?php echo base_url() ?>/brand/find_distance',
               type: 'post',
               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
               success: function(response){
                rs = JSON.parse(response);
                tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_distance_emission").html(rs.emission);
                $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);
                // console.log(rs);
                // $("#bus_station_distance").html(response);
               }
            });
          }
        }
      }
    }


          }
          if(departure_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = departure_transfer_title;
                if(departure_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_departure_fuel
                }
                if(departure_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(departure_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_departure_distane_emission").html(rs.emission);
                $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
          if(arrival_airport_name) {
            $.ajax({
              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
              type: 'post',
              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},
              success: function(response){
                rs = JSON.parse(response);
                tooltip_inner_text = arrival_transfer_title;
                if(arrival_transfer_title=="Driving") {
                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel
                }
                if(arrival_transfer_title=="Train") {
                  tooltip_inner_text+=" ride";
                }
                if(arrival_transfer_title=="Bus") {
                    tooltip_inner_text+=" ride";
                }
                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
                $("#rail_station_distance").html(rs.distance);
                $("#rail_arrival_distane_emission").html(rs.emission);
                $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
              }
            });
          }
        }
      });



// For Rail station End


    });

  function find_distance_between_bus_station() {
    departure = $("#departure_bus_station").val();
    arrival = $("#arrival_bus_station").val();
      from = $("#autocomplete").val();
      to = $("#autocomplete1").val();
      departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');
      airport_departure_transfer = $("#bus_departure_transfer").val();
      airport_arrival_transfer = $("#bus_arrival_transfer").val();
      var arrival_transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');
      var departure_transfer_title = $("#bus_departure_transfer").find(':selected').data('title');
      airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();
      airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();
    if(departure && arrival) {
      var lat_from = "";
      var long_from = "";
      var lat_to = "";
      var long_to = "";
      var request = {
        placeId: departure,
        fields: ['geometry']
      };

      service = new google.maps.places.PlacesService(map);
      service.getDetails(request, callback);

      function callback(place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          lat_from = place.geometry.location.lat();
          long_from = place.geometry.location.lng();
          var request = {
            placeId: arrival,
            fields: ['geometry']
          };

          service = new google.maps.places.PlacesService(map);
          service.getDetails(request, callback);

          function callback(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
              lat_to = place.geometry.location.lat();
              long_to = place.geometry.location.lng();
              $.ajax({
                 url: '<?php echo base_url() ?>/brand/find_distance',
                 type: 'post',
                 data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
                 success: function(response){
                  // $("#bus_station_distance").html(response);

            rs = JSON.parse(response);
            if($('#bus_round_trip').is(":checked")){
              tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#bus_station_distance").html(rs.distance);
              $("#bus_distance_emission").html(rs.emission*2);
              $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);
            }
            else if($('#bus_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p>";
              $("#bus_station_distance").html(rs.distance);
              $("#bus_distance_emission").html(rs.emission);
              $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);
            }

                 }
              });
            }
          }
        }
      }
    }
    if(departure_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = departure_transfer_title;
            if(departure_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(departure_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(departure_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#bus_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_bus_distance").html(rs.distance);
              $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#bus_departure_distane_emission").html(rs.emission*2);
            }
            else if($('#bus_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_bus_distance").html(rs.distance);
              $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#bus_departure_distane_emission").html(rs.emission);
            }

          }
        });        
    }

      if(arrival_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = arrival_transfer_title;
            if(arrival_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(arrival_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(arrival_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#bus_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_arrival_bus_distance").html(rs.distance);
              $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#bus_arrival_distane_emission").html(rs.emission*2);
            }
            else if($('#bus_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_arrival_bus_distance").html(rs.distance);
              $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#bus_arrival_distane_emission").html(rs.emission);
            }
          }
        });        
      }

  }



  function find_distance_between_rail_station() {
    departure = $("#departure_rail_station").val();
    arrival = $("#arrival_rail_station").val();
      from = $("#autocomplete").val();
      to = $("#autocomplete1").val();
      departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');
      airport_departure_transfer = $("#rail_departure_transfer").val();
      airport_arrival_transfer = $("#rail_arrival_transfer").val();
      var arrival_transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');
      var departure_transfer_title = $("#rail_departure_transfer").find(':selected').data('title');
      airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();
      airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();
    if(departure && arrival) {
      var lat_from = "";
      var long_from = "";
      var lat_to = "";
      var long_to = "";
      var request = {
        placeId: departure,
        fields: ['geometry']
      };

      service = new google.maps.places.PlacesService(map);
      service.getDetails(request, callback);

      function callback(place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          lat_from = place.geometry.location.lat();
          long_from = place.geometry.location.lng();
          var request = {
            placeId: arrival,
            fields: ['geometry']
          };

          service = new google.maps.places.PlacesService(map);
          service.getDetails(request, callback);

          function callback(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
              lat_to = place.geometry.location.lat();
              long_to = place.geometry.location.lng();
              $.ajax({
                 url: '<?php echo base_url() ?>/brand/find_distance',
                 type: 'post',
                 data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
                 success: function(response){
                  // $("#bus_station_distance").html(response);

            rs = JSON.parse(response);
            if($('#rail_round_trip').is(":checked")){
              tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#rail_station_distance").html(rs.distance);
              $("#rail_distance_emission").html(rs.emission*2);
              $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);
            }
            else if($('#rail_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";
              $("#rail_station_distance").html(rs.distance);
              $("#rail_distance_emission").html(rs.emission);
              $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);
            }

                 }
              });
            }
          }
        }
      }
    }
    if(departure_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = departure_transfer_title;
            if(departure_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(departure_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(departure_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#rail_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_rail_distance").html(rs.distance);
              $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#rail_departure_distane_emission").html(rs.emission*2);
            }
            else if($('#rail_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_rail_distance").html(rs.distance);
              $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#rail_departure_distane_emission").html(rs.emission);
            }

          }
        });        
    }

      if(arrival_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = arrival_transfer_title;
            if(arrival_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(arrival_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(arrival_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#rail_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_arrival_rail_distance").html(rs.distance);
              $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#rail_arrival_distane_emission").html(rs.emission*2);
            }
            else if($('#rail_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_arrival_rail_distance").html(rs.distance);
              $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#rail_arrival_distane_emission").html(rs.emission);
            }
          }
        });        
      }

  }


    // function find_distance_between_rail_station() {
    //   departure = $("#departure_rail_station").val();
    //   arrival = $("#arrival_rail_station").val();
    //   var lat_from = "";
    //   var long_from = "";
    //   var lat_to = "";
    //   var long_to = "";
    //   var request = {
    //     placeId: departure,
    //     fields: ['geometry']
    //   };

    //   service = new google.maps.places.PlacesService(map);
    //   service.getDetails(request, callback);

    //   function callback(place, status) {
    //     if (status == google.maps.places.PlacesServiceStatus.OK) {
    //       lat_from = place.geometry.location.lat();
    //       long_from = place.geometry.location.lng();
    //       var request = {
    //         placeId: arrival,
    //         fields: ['geometry']
    //       };

    //       service = new google.maps.places.PlacesService(map);
    //       service.getDetails(request, callback);

    //       function callback(place, status) {
    //         if (status == google.maps.places.PlacesServiceStatus.OK) {
    //           lat_to = place.geometry.location.lat();
    //           long_to = place.geometry.location.lng();
    //           // alert(lat_from);
    //           // alert(long_from);
    //           // alert(lat_to);
    //           // alert(long_to);
    //           $.ajax({
    //              url: '<?php echo base_url() ?>/brand/find_distance',
    //              type: 'post',
    //              data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},
    //              success: function(response){
    //               // alert(response);
    //               $("#rail_station_distance").html(response);
    //              }
    //           });
    //         }
    //       }
    //     }
    //   }
    // }

    function find_air_distance() {
      departure_code = $("#departure_airport").val();
      arrival_code = $("#arrival_airport").val();
      from = $("#autocomplete").val();
      to = $("#autocomplete1").val();
      flying_class = $("#flying_class").val();
      departure_airport_name = $("#departure_airport").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');
      airport_departure_transfer = $("#airport_departure_transfer").val();
      airport_arrival_transfer = $("#airport_arrival_transfer").val();
      var arrival_transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');
      var departure_transfer_title = $("#airport_departure_transfer").find(':selected').data('title');
      airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();
      airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();
      if(departure_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = departure_transfer_title;
            if(departure_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(departure_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(departure_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#airport_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_airport_distance").html(rs.distance);
              $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#airport_departure_distane_emission").html(rs.emission*2);
            }
            else if($('#airport_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_airport_distance").html(rs.distance);
              $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);
              $("#airport_departure_distane_emission").html(rs.emission);
            }

          }
        });        
      }
      if(arrival_airport_name) {
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',
          type: 'post',
          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer},
          success: function(response){
            rs = JSON.parse(response);
            tooltip_inner_text = arrival_transfer_title;
            if(arrival_transfer_title=="Driving") {
              tooltip_inner_text+=" "+airport_transfer_departure_fuel
            }
            if(arrival_transfer_title=="Train") {
              tooltip_inner_text+=" ride";
            }
            if(arrival_transfer_title=="Bus") {
              tooltip_inner_text+=" ride";
            }
            if($('#airport_round_trip').is(":checked")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#location_arrival_airport_distance").html(rs.distance);
              $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#airport_arrival_distane_emission").html(rs.emission*2);
            }
            else if($('#airport_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";
              $("#location_arrival_airport_distance").html(rs.distance);
              $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);
              $("#airport_arrival_distane_emission").html(rs.emission);
            }
          }
        });        
      }
      if(departure_code && arrival_code) {
        // alert(departure_code);
        // alert(arrival_code);
        // airport_departure_transfer = $("#airport_departure_transfer").val();
        $.ajax({
          url: '<?php echo base_url() ?>/brand/find_air_distance',
          type: 'post',
          data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class,airport_departure_transfer: airport_departure_transfer},
          success: function(response){
            rs = JSON.parse(response);
            if($('#airport_round_trip').is(":checked")){
              tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";
              $("#airport_distance").html(rs.distance);
              $("#airport_distance_emission").html(rs.emission*2);
              $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            }
            else if($('#airport_round_trip').is(":not(:checked)")){
              tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";
              $("#airport_distance").html(rs.distance);
              $("#airport_distance_emission").html(rs.emission);
              $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);
            }

          }
        });
      }
    }

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
    </script>
  </body>
</html>
