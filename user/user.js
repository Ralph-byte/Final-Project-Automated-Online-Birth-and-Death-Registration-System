//pop up messages
// window.addEventListener("load", function(){
//   setTimeout(
//       function open(event){
//           document.querySelector(".popup").style.display = "block";
//       },
//       1000
//   )
// });


// document.querySelector("#close").addEventListener("click", function(){
//   document.querySelector(".popup").style.display = "none";
// });

const popup = document.querySelector('.popup');
const x = document.querySelector('.popup-content img')

window.addEventListener('load', () => {
    popup.classList.add('showPopup');
    popup.childNodes[1].classList.add('showPopup');
})
x.addEventListener('click', () => {
    popup.classList.remove('showPopup');
    popup.childNodes[1].classList.remove('showPopup');
})


// User Login Validations
function validate(){
    var mobileNumber = document.getElementById("mobno").value;
    var password = document.getElementById("password").value;

    //Perform Number & Password Validation
    if(mobileNumber === "" || password === ""){
        alert("Mobile Number and Password field is empty."); // Empty Field
        return false;
    } 
    else if(isNaN(mobileNumber)){      
        alert("Mobile Number should be a valid number.");  // Valid Number
        return false;
    }
    else if(!/^[0-9]{10}$/.test(mobileNumber)){
        alert("Mobile Number should be 10 digits long."); // 10 digits Long
        return false;
    }
    else if(/\D/.test(mobileNumber)){
        alert("Mobile Number should only contain numbers.");  //Number Field Should not be characters
        return false;
    }
    
    // if(password.length < 5){
    //     alert("Password should be at least 5 characters long."); // 5 Characters Long
    //     return false;
    //}

    return true;


}

// Handle form submission
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var amount = document.getElementById('amount').value;
    var email = document.getElementById('email').value;
    
    // Make a request to the server to create the payment
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'pay-process.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        
        // If payment creation was successful, redirect to Paystack
        if (response.status === 'success') {
          window.location.href = response.data.authorization_url;
        } else {
          alert('Payment request failed. Please try again later.');
        }
      }
    };
    
    // Send the request
    xhr.send('amount=' + encodeURIComponent(amount) + '&email=' + encodeURIComponent(email));
  });
  