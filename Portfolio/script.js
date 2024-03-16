document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let message = document.getElementById("message").value;
  
  // Replace this with your desired functionality, e.g., sending the form data to a server
  console.log("Name: " + name);
  console.log("Email: " + email);
  console.log("Message: " + message);
});
