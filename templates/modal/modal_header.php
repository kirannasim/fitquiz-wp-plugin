<style type="text/css">
	 /* The Modal (background) */
.quiz-modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.quiz-modal-content {
  background-color: #fefefe;
  margin: 10% auto 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 800px; /* Could be more or less, depending on screen size */
  max-width:800px;
  height:auto;
  overflow:hidden;
}

.quiz-modal .content {
	min-height:auto-flow;
}

/* The Close Button */
.quiz-modal-close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.quiz-modal-close:hover,
.quiz-modal-close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} 
</style>

<!-- The Modal -->
<div id="quizModal" class="quiz-modal">

  <!-- Modal content -->
  <div class="quiz-modal-content">
    <span class="quiz-modal-close">&times;</span>