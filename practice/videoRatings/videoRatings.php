<!DOCTYPE html>
<html>
    <head>
        <title>In-class Practice: Video Ratings</title>
    </head>
    <body>
    <iframe width="420" height="315"
    src="https://youtu.be/gl1aHhXnN1k">
    </iframe><br>
    <h2>Rate from one to five stars:</h2>
    <form>
    <input type="radio" name="rating" value="one" checked> One<br>
      <input type="radio" name="rating" value="two"> Two<br>
      <input type="radio" name="rating" value="three"> Three<br>
      <input type="radio" name="rating" value="four"> Four<br>
      <input type="radio" name="rating" value="four"> Five<br>
      <input type = "submit" value ="Submit" />
      <button type="button" onclick="loadDoc()">Change Content</button>
        <script type="text/javascript" src="">
            function loadDoc() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("demo").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "ajax_info.txt", true);
              xhttp.send();
            }
        </script>
    </form>
    </body>
</html>