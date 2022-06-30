
</div>
</div>
<!-- Trigger/Open The Modal -->
<p style="text-align:center;"><button id="quizModalBtn" class="btn btn-orange">Take Quiz</button></p>
<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("quizModal");

// Get the button that opens the modal
var btn = document.getElementById("quizModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("quiz-modal-close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {

  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// } 
</script>