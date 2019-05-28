<button id="buttonId" type="button">0</button>
<script type="text/javascript">

    function savedata() {
      setInterval(function(){
        var pseudo = "Piruru"
        var nbClic = document.getElementById('buttonId').textContent
        console.log(nbClic);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("POST", "savedata.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("nbClic="+nbClic+"&pseudo="+pseudo);
      }, 1000);
    }
    function dps() {
      setInterval(function(){
        var button = document.getElementById('buttonId');
        newVal = parseInt(button.textContent, 10) + 1;
        button.textContent = newVal;
        console.log(newVal);
      }, 100);
    }
    //dps();
    //savedata();
</script>
