


//HTML  <!--<script>document.addEventListener("DOMContentLoaded", function(){init()})</script>-->


function send_to_php(data) {
  var connect = new XMLHttpRequest();
  connect.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      document.getElementById().innerHTML = this.responseText;
    } else {
      document.getElementById().innerHTML = "";
    }
  }
  connect.open("POST", "index.php" + data, true)
  connect.send();
}