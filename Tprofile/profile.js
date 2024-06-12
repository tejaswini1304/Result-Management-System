document.addEventListener("DOMContentLoaded", function () {
    // Get the current page's URL
    const currentUrl = window.location.href;
  
    // Get all the navbar links
    const navbarLinks = document.querySelectorAll(".navbar a");
  
    // Add click event listener to each link
    navbarLinks.forEach(link => {
      // Check if the link's href matches the current page's URL
      if (link.href === currentUrl) {
        link.classList.add("active");
      }
  
      link.addEventListener("click", function (event) {
        // Remove underline from all links
        navbarLinks.forEach(link => {
          link.classList.remove("active");
        });
  
        // Add underline to the clicked link
        this.classList.add("active");
      });
    });
  });
  