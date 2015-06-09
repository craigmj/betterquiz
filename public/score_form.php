<?php

/**
 * @file
 * score_form.php displays the form with the score.
 * User can elect to submit results for points, or just have completed the quiz for 
 * own purposes.
 */
include_once("lib/include.php");

$examId = BQExam::GetSession();
$exam = BQExam::LoadExamById($db, $examId);
$exam->SetCompleted($db);

include("_header.php");

?>
<h1>Your Results</h1>
<div id="answers">
<?php
	foreach ($exam->Answers() as $a) {
		?>
		<div class="answer">
			<div class="question-text"><?php echo $a->QuestionText(); ?></div>
			<?php
			if ($a->IsCorrect()) {
				?>
				<div class="answer-chosen correct"><?php echo $a->ChosenOption()->Option(); ?></div>
				<?php
			} else {
				?>
				<div class="answer-chosen incorrect"><?php echo $a->ChosenOption()->Option(); ?></div>
				<div class="answer-actual"><?php echo $a->CorrectOption()->Option(); ?></div>
				<?php
			}
			?>
		</div>
		<?php
	}
?>
</div>
<div id="score">
Your Score: <span class="score"><?php echo $exam->Score(); ?> / <?php echo $exam->Total(); ?></span>
<span class="percentage"><?php echo $exam->Percentage(); ?></span>
</span>

<div id="submit">
<form method="post" action="done.php">
<input type="hidden" name="examId" value="<?php echo $examId; ?>" >
<label for="submit_results">Submit these results for points</label>
<input type="checkbox" checked="checked" name="submit_results" id="submit_results" value="1" />
<input type="submit" name="submit" value="Done" />
</form>
<?php

include("_footer.php");