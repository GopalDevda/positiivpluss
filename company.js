const base_url = 'https://positiivplus.com/';
const companyInput = document.getElementById('company-input');
const suggestionsContainer = document.getElementById('suggestions-container');
if (companyInput) companyInput.addEventListener('input', debounce(searchCompany, 300));

function debounce(func, delay) {
  let timeout;
  return function () {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      func.apply(this, arguments);
    }, delay);
  };
}

async function searchCompany() {
  const query = companyInput.value;

  if (query.trim() === '') {
    suggestionsContainer.style.display = 'none';
    return;
  }

  try {
    const response = await fetch(base_url + 'MarketPlace/companydata_api?filter=' + query);
    const data = await response.json();

    if (data && data.data.length > 0) {
      suggestionsContainer.innerHTML = '';

      data.data.forEach(company => {
        const option = createSuggestionElement(company);
        option.setAttribute('onclick', 'location.href="' + base_url + 'search-profile.php?cin=' + company[6] + '"')
        suggestionsContainer.appendChild(option);
      });
      suggestionsContainer.style.display = 'block';
    } else {
      // No results found
      const noResults = document.createElement('div');
      noResults.classList.add('suggestion');
      noResults.innerText = 'No results found';
      suggestionsContainer.appendChild(noResults);
      suggestionsContainer.style.display = 'block';
    }
  } catch (error) {
    console.error('Error fetching data:', error);
    suggestionsContainer.style.display = 'none';
  }
}


// function createSuggestionElement(company) {
//   const option = document.createElement('div');
//   option.classList.add('suggestion');
//   const link = document.createElement('a');
//   link.href = 'search-profile.php?cin=' + company[6];
//   link.style.color = '#333333';
//   link.style.fontWeight = '500';
//   link.innerText = company[2];
//   option.appendChild(link);
//   return option;
// }
function createSuggestionElement(company) {
  const option = document.createElement('div');
  option.classList.add('suggestion');

  const link = document.createElement('a');
  link.href = 'search-profile.php?cin=' + company[6];
  link.style.color = '#333333';
  link.style.fontWeight = '500';
  link.innerText = company[2];
  option.appendChild(link);
  const spandiv = document.createElement('div');
  spandiv.classList.add('pt-1');
  spandiv.innerText = company[6];
  option.appendChild(spandiv);
  const span = document.createElement('p');
  span.style.fontSize = '15px';
  span.style.paddingTop = '2px';
  span.innerText = company[7];
  spandiv.appendChild(span);

  return option;
}
function single_inp_mail(email, mail_type) {
  if ($(email).val() === '') $(email).focus();
  else {
    $.ajax({
      type: "post",
      url: base_url + "/MarketPlace/connect_with_us",
      data: {
        email: $(email).val(),
        mail_type: mail_type
      },
      dataType: 'json',
      success: function (res) {
        if (res.success) {
          location.reload();
        } else alert('Failed');
      }
    });
  }
}

function form_submit(email, mail_type) {
  $('.form-error').remove();
  let emptyCount = 0;
  $(".form-validate").each(function () {
    if ($(this).val() === "") {
      $(this).after("<div class='form-error'>Please fill out this field</div>");
      emptyCount = 1;
    }
  });
  if ($(email).val() === '') $(email).after("<div class='form-error'>Please fill out this field</div>");
  if (emptyCount == 0) {
    $.ajax({
      type: "post",
      url: base_url + "/MarketPlace/connect_with_us",
      data: {
        fullname: $('#fullname').val(),
        email: $(email).val(),
        Companyname: $('#Companyname').val(),
        phone: $('#phone').val(),
        designation: $('#designation').val(),
        mail_type: mail_type
      },
      dataType: 'json',
      success: function (res) {
        if (res.success) {
          location.reload();
        } else alert('Failed');
      }
    });
  }
}
