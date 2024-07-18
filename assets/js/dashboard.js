document.addEventListener("DOMContentLoaded", function () {
  var listItems = document.querySelectorAll(".list-categories");

  function loadInsituContent() {
    var insituLink = document.querySelector('a[data-target="insitu"]');
    if (insituLink) {
      insituLink.click();
    }
  }

  listItems.forEach(function (item) {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      var link = this.querySelector("a").getAttribute("href");

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.querySelector(".dynamicContent").innerHTML =
            this.responseText;
        }
      };
      xhttp.open("GET", link, true);
      xhttp.send();
    });
  });

  loadInsituContent();
});
