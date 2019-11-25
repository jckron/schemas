<?php
// Select quiz
function selectQuiz(){
	global $conn; // global connection defined in config
	$sql = "SELECT * FROM b12_quizzes WHERE power = '1' AND (archived = '0' OR archived IS NULL);";
	$result = $conn->query($sql);
	if($result->num_rows == 0){
		echo 'Sorry, no quizzes are available.';
	}
	else{
		while($row = $result->fetch_assoc()){
			$quizID = $row['quizID'];
			$title = $row['title'];
			$description = $row['description'];
			echo '<div>';
			echo '<h3><a href="?quiz='.$quizID.'">'.$title.'</a></h3>';
			echo '</div>';
		}		
	}
}
// Render quiz
function renderQuiz($quizID){
	global $conn;
	$sql = "SELECT * FROM b12_quizzes WHERE quizID = '$quizID' AND power = '1';";
	$result = $conn->query($sql);
	$sql0 = "SELECT * FROM b12_questions WHERE quizID = '$quizID' AND power = '1';";
	$result0 = $conn->query($sql0);
	if($result->num_rows == 0){
		echo 'Sorry, that quiz is no longer available.';
	}
	else{
		while($row = $result->fetch_assoc()){
			$quizID = $row['quizID'];
			$title = $row['title'];
			$description = $row['description'];
			echo '<div class="quiz">';
			echo '<div class="intro">';
			echo '<h1>'.$title.'</h1>';
			echo $description;
			echo '</div>';
			echo '<div class="questions">';
			// add questions
			while($row0 = $result0->fetch_assoc()){
				$questionID = $row0['questionID'];
				$question = $row0['question'];
				echo '<div class="question">'; // wrapper
				echo '<h3>'.$question.'</h3>';
				// get answers
				$sql1 = "SELECT * FROM b12_answers WHERE (questionID = '$questionID' AND power = '1') ORDER BY value DESC;";
				$result1 = $conn->query($sql1);
				while($row1 = $result1->fetch_assoc()){
					$answerID = $row1['answerID'];
					$answer = $row1['answer'];
					$value = $row1['value'];
					echo '<div class="item">';
					echo '<input type="radio" name="answer-'.$questionID.'" value="'.$answerID.'" />';
					echo '&nbsp;<label>'.$answer.'</label>';
					echo '</div>'; 				
				}
				echo '<a class="control nextBtn">Next Question</a><a class="control prevBtn">Previous Question</a>';
				echo '<button class="finish form-button">Get your assessment &#10095;</button>';
				echo '</div>'; // end wrapper
			}
			echo '</div>';
			echo '</div>';
		}		
	}
}
// Get quiz questions to define post vars
function getQuizQuestions($quizID){
	global $conn;
	echo '<input type="hidden" name="quiz" value="'.$quizID.'">';
	$sql = "SELECT * FROM b12_questions WHERE quizID = '$quizID';";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$quid = $row['questionID'];
		#echo "QUID: ".$quid."<br/>"; // DEBUG
		$answer = $_POST['answer-'.$quid.''];
		if($answer == ""){
			$answer = "0";
		}
		echo '<input type="hidden" name="answer-'.$quid.'" value="'.$answer.'">';
	}
}
// -------------------------------------------------------------//
// -------- Capture User, Score & Return Results ---------------//
// -------------------------------------------------------------//
// Get Results based on score & quiz ID
function getResults($score, $quizID){
	global $conn;
	$sql = "SELECT * FROM b12_results WHERE (quizID = '$quizID' AND low_score <= '$score' AND high_score >= '$score');";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$title = $row['title'];
		$description = $row['description'];
	}
	echo '<div class="score">Your score is <span>'.$score.'</span></div>';
	echo '<div class="results">';
	echo '<h2>'.$title.'</h2>';
	echo $description;
	echo '</div>';
}
// Add a User & Response to the system 
// Recursive loop is designed to check if email already exists in system, else add new. Should never loop more than once unless the insert fails for some reason.
function addData($first_name, $last_name, $email_address, $company, $title, $answers, $score, $quizID){
	global $conn;
	$sql0A = "SELECT * FROM b12_users WHERE email_address = '$email_address'";
	$result0A = $conn->query($sql0A);
	if($result0A->num_rows == 0){
		// add the user
		$sql0A1 = "INSERT INTO b12_users (first_name, last_name, email_address, company, title) VALUES ('$first_name','$last_name','$email_address','$company','$title');";
		$result0A1 = $conn->query($sql0A1);
		addData($first_name, $last_name, $email_address, $company, $title, $answers, $score, $quizID);
	}
	else{
		// get the user id and add the response
		while($row0A = $result0A->fetch_assoc()){
			$userID = $row0A['userID'];
			#echo "User ID: ".$userID; // DEBUG
			$sql0B = "INSERT INTO b12_responses (quizID, userID, answers, score) VALUES ('$quizID','$userID','$answers','$score');";
			$conn->query($sql0B);
			#echo "Your score is <strong>".$score."</strong>"; // DEBUG
			getResults($score, $quizID);
		}
	}
}
// Capture User & Response Data
function captureResponse($quizSubmit){
	global $conn;
	$quizID = $quizSubmit;
	// User Vars
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
	$company = $_POST['company'];
	$title = $_POST['title'];
	$q_answers = array();
	$q_scores = array();
	$sql1 = "SELECT * FROM b12_questions WHERE quizID = '$quizID';";
	$result1 = $conn->query($sql1);
	while($row1 = $result1->fetch_assoc()){
		$quid = $row1['questionID'];
		$answerID = $_POST['answer-'.$quid.''];
		$sql2 = "SELECT * FROM b12_answers WHERE answerID = '$answerID';";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()){
			$answerID = $row2['answerID'];
			$answer = $row2['answer'];
			$value = $row2['value'];
			$count = $row2['count']+1;
			array_push($q_answers, $answer); // Capture answers
			array_push($q_scores, $value); // Capture answers
			$conn->query("UPDATE b12_answers SET count = '$count' WHERE answerID = '$answerID';");
		}
		#print_r($answers); // DEBUG
	}
	$answers = implode(',',$q_answers); // Convert to comma separated string for insert
	#echo $answers; // DEBUG
	$score = array_sum($q_scores);
	#echo "Score: ".$score; // DEBUG
	// ... Do the stuff...
	addData($first_name, $last_name, $email_address, $company, $title, $answers, $score, $quizID);
}
?>