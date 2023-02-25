<p id="demo{{$count}}"></p>

<script>
// Set the date we're counting down to
var countDownDate{{$count}} = new Date("{{$start}}").getTime();

// Update the count down every 1 second
var x{{$count}} = setInterval(function() {

  // Get today's date and time
  var now{{$count}} = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance{{$count}} =now{{$count}}-countDownDate{{$count}};
    
  // Time calculations for days, hours, minutes and seconds
  var days{{$count}} = Math.floor(distance{{$count}} / (1000 * 60 * 60 * 24));
  var hours{{$count}} = Math.floor((distance{{$count}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes{{$count}} = Math.floor((distance{{$count}} % (1000 * 60 * 60)) / (1000 * 60));
  var seconds{{$count}} = Math.floor((distance{{$count}} % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo{{$count}}").innerHTML = "("+hours{{$count}} + ":"
  + minutes{{$count}} + ": " + seconds{{$count}}+")" ;
    
  // If the count down is over, write some text 
  if (distance{{$count}} < 0) {
    clearInterval(x{{$count}});
    document.getElementById("demo{{$count}}").innerHTML = "EXPIRED";
  }
}, 1000);
</script>