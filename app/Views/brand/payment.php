<div class="hide_header"><?php include("header.php"); ?></div>

<div class="pay_bg">
    <div class="pay_box">
        <div class="pay_left">
            <div class="pay_back">
                <img src="dist-assets/custom_img/back_short.png">
            </div>
            <div class="pay_left_desc">
                <div class="p_left_header">
                    <img src="dist-assets/custom_img/pay_1.png" class="p_left_img">
                    Powdur
                </div>
                <div class="pay_plan"> 
                    Subscribe to Starter
                    <div class="d-flex">
                        <div class="pay_plan_value">$12.00</div>
                        <div class="pay_per_month">per<br>month</div>
                    </div> 
                </div>
                <div class="pay_center_img">
                    <img src="dist-assets/custom_img/pay_img1.jpg">
                </div>
                <div class="pay_left_footer">
                    <a href="" class="right_border">Powered by <span>Stripe</span></a>
                    <a href="">Terms</a>
                    <a href="">Policy</a>
                </div>
            </div>
        </div>
        <div class="pay_right">
            <div class="pay_apple_btn">
                <a href="">
                    <img src="dist-assets/custom_img/apple.png">Pay
                </a>
            </div>
            <div class="pay_right_line">
                <hr>
                <span>Or pay with card</span>
            </div>
            <div class="pay_form">
                <div class="pay_field">
                    <div class="pay_label">Email</div>
                    <input type="email" class="form-control">
                </div>
                <div class="pay_field mt-3">
                    <div class="pay_label">Card Information</div>
                    <input id="card_number" class="form-control border_1" required pattern="(\d{4}\s?){4}" placeholder="1234 1234 1234 1234" maxlength="19">
                    <img src="dist-assets/custom_img/card_logos.png" class="card_logos">
                    <div class="two_field">
                        <input type="text" id="inputExpDate" placeholder="MM / YY" maxlength='7'  class="form-control half_field border_2">
                        <input type="password" id="cvc" placeholder="CVC" class="form-control half_field border_3  cvc">
                    </div>
                </div>
                <div class="pay_field mt-3">
                    <div class="pay_label">Name on card</div>
                    <input type="text" class="form-control">
                </div>
                <div class="pay_field mt-3">
                    <div class="pay_label">Country of region</div>
                    <select class="form-control border_1" id="exampleFormControlSelect1">
                      <option>United States</option>
                      <option>UK</option>
                      <option>Asia</option>
                      <option>Africa</option>
                    </select>
                    <input type="number" placeholder="ZIP" class="form-control border_4">
                </div>
                <div class="subs_btn">
                    <input type="button" value="Subscribe">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
card_number.addEventListener('keyup',function (e) {
  // console.log(e.keyCode);
  if (e.keyCode !== 8) {
    if (this.value.length === 4 || this.value.length === 9 || this.value.length === 14) {
      this.value = this.value += ' ';
    }
  }
});
</script>

<script>
var app;

(function() {
  'use strict';
  
  app = {
    monthAndSlashRegex: /^\d\d \/ $/, // regex to match "MM / "
    monthRegex: /^\d\d$/, // regex to match "MM"
    
    el_cardNumber: '.ccFormatMonitor',
    el_expDate: '#inputExpDate',
    el_cvv: '.cvv',
    el_ccUnknown: 'cc_type_unknown',
    el_ccTypePrefix: 'cc_type_',
    el_monthSelect: '#monthSelect',
    el_yearSelect: '#yearSelect',
    
    cardTypes: {
      'American Express': {
        name: 'American Express',
        code: 'ax',
        security: 4,
        pattern: /^3[47]/,
        valid_length: [15],
        formats: {
          length: 15,
          format: 'xxxx xxxxxxx xxxx'
        }
      },
      'Visa': {
				name: 'Visa',
				code: 'vs',
        security: 3,
				pattern: /^4/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			},
      'Maestro': {
				name: 'Maestro',
				code: 'ma',
        security: 3,
				pattern: /^(50(18|20|38)|5612|5893|63(04|90)|67(59|6[1-3])|0604)/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			},
      'Mastercard': {
				name: 'Mastercard',
				code: 'mc',
        security: 3,
				pattern: /^5[1-5]/,
				valid_length: [16],
				formats: {
						length: 16,
						format: 'xxxx xxxx xxxx xxxx'
					}
			} 
    }
  };
  
  app.addListeners = function() {
      $(app.el_expDate).on('keydown', function(e) {
        app.removeSlash(e);
      });

      $(app.el_expDate).on('keyup', function(e) {
        app.addSlash(e);
      });

      $(app.el_expDate).on('blur', function(e) {
        app.populateDate(e);
      });

      $(app.el_cvv +', '+ app.el_expDate).on('keypress', function(e) {
        return e.charCode >= 48 && e.charCode <= 57;
      });  
  };
  
  app.addSlash = function (e) {
    var isMonthEntered = app.monthRegex.exec(e.target.value);
    if (e.key >= 0 && e.key <= 9 && isMonthEntered) {
      e.target.value = e.target.value + " / ";
    }
  };
  
  app.removeSlash = function(e) {
    var isMonthAndSlashEntered = app.monthAndSlashRegex.exec(e.target.value);
    if (isMonthAndSlashEntered && e.key === 'Backspace') {
      e.target.value = e.target.value.slice(0, -3);
    }
  };
  
  app.populateDate = function(e) {
    var month, year;
    
    if (e.target.value.length == 7) {
      month = parseInt(e.target.value.slice(0, -5));
      year = "20" + e.target.value.slice(5);
      
      if (app.checkMonth(month)) {
        $(app.el_monthSelect).val(month);
      } else {
        $(app.el_monthSelect).val(0);
      }
      
      if (app.checkYear(year)) {
        $(app.el_yearSelect).val(year);
      } else {
        $(app.el_yearSelect).val(0);
      }
      
    }
  };
  
  app.checkMonth = function(month) {
    if (month <= 12) {
      var monthSelectOptions = app.getSelectOptions($(app.el_monthSelect));
      month = month.toString();
      if (monthSelectOptions.includes(month)) {
        return true; 
      }
    }
  };
  
  app.checkYear = function(year) {
    var yearSelectOptions = app.getSelectOptions($(app.el_yearSelect));
    if (yearSelectOptions.includes(year)) {
      return true; 
    }
  };
          
  app.getSelectOptions = function(select) {
    var options = select.find('option');
    var optionValues = [];
    for (var i = 0; i < options.length; i++) {
      optionValues[i] = options[i].value;
    }
    return optionValues;
  };
  
  app.setMaxLength = function ($elem, length) {
    if($elem.length && app.isInteger(length)) {
      $elem.attr('maxlength', length);
    }else if($elem.length){
      $elem.attr('maxlength', '');
    }
  };
  
  app.isInteger = function(x) {
    return (typeof x === 'number') && (x % 1 === 0);
  };

  app.createExpDateField = function() {
    $(app.el_monthSelect +', '+ app.el_yearSelect).hide();
    $(app.el_monthSelect).parent().prepend('<input type="text" class="ccFormatMonitor">');
  };
  
  
  app.isValidLength = function(cc_num, card_type) {
    for(var i in card_type.valid_length) {
      if (cc_num.length <= card_type.valid_length[i]) {
        return true;
      }
    }
    return false;
  };

  app.getCardType = function(cc_num) {
    for(var i in app.cardTypes) {
      var card_type = app.cardTypes[i];
      if (cc_num.match(card_type.pattern) && app.isValidLength(cc_num, card_type)) {
        return card_type;
      }
    }
  };

  

 

  
  app.init = function() {

    $(document).find(app.el_cardNumber).each(function() {
      var $elem = $(this);
      if ($elem.is('input')) {
        $elem.on('input', function() {
          app.monitorCcFormat($elem);
        });
      }
    });
    
    app.addListeners();
    
  }();
  
})();
</script>

<?php include("footer.php"); ?>