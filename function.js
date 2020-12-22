/**
 * This function is used to calculate the grade after marks have been input.
 */
function process() {
	var modules = ["COMP7001", "COMP7002", "TECH7005", "DALT7002", "SOFT7003", "TECH7004", "TECH7009"];		// array of module names
	var mark = credit = weightedMark = sumWeightedMarks = sumCredits = avgMark = 0;
	var count = 1;
	var grade;
	var sumGrades = [0, 0, 0, 0];

	// loop through each module to calcuate grades
	modules.forEach(module => {
		mark = parseFloat(document.getElementById(module).value);											// get module mark from user input
		if (module == "TECH7009") {
			credit = modCredit(mark, 60);																	// calculate credit with module mark
			weightedMark = mark * 60;																		// calculate weighted mark
		} else {
			credit = modCredit(mark, 20);																	// calculate credit with module mark
			weightedMark = mark * 20;																		// calculate weighted mark
		}
		
		sumWeightedMarks += weightedMark;																	// add mark to running total: sumMarks
		sumCredits += credit;																				// add mark to running total: sumCredits

		grade = getMyGrade(mark);
		if (grade == "A") {
			sumGrades[0] += 1;
		} else if (grade == "B") {
			sumGrades[1] += 1;
		} else if (grade == "C") {
			sumGrades[2] += 1;
		} else {
			sumGrades[3] += 1;
		}

		document.getElementById("letterGrade" + count).innerHTML = grade;									// update mark letter on GUI
		document.getElementById("credits" + count).innerHTML = credit;										// update credit value on GUI
		count++;
	});

	avgMark = sumWeightedMarks / 180;																		// calculate average mark

	document.getElementById('outputMessage').innerHTML = "You have achieved a percentage of " + avgMark.toFixed(2) + "%, giving you an average grade of a " + getMyGrade(avgMark) + ".";
	document.getElementById('outputMessage2').innerHTML = "This gives you " + sumCredits + " total credits and overall, " + reward(sumCredits) + ".";
	document.getElementById('totalA').innerHTML = sumGrades[0];
	document.getElementById('totalB').innerHTML = sumGrades[1];
	document.getElementById('totalB').innerHTML = sumGrades[2];
	document.getElementById('totalF').innerHTML = sumGrades[3];
}


/**
 * 
 * Calculates the letter grade given a mark between 0 and 100.
 * 
 * @param {number} mark
 * @return {string} 
 */
function getMyGrade(mark) {
	var letterGrade = "F";
	switch (true) {
		case (mark < 0 || mark > 100):
			letterGrade = "Invalid";
			break;
		case (mark >= 0 && mark <= 49):
			letterGrade = "F";
			break;
		case (mark >= 50 && mark <= 59):
			letterGrade = "C";
			break;
		case (mark >= 60 && mark <= 69):
			letterGrade = "B";
			break;
		case (mark >= 70 && mark <= 100):
			letterGrade = "A";
			break;
		default:
			alert("Please enter a valid mark.");
			break;
	}
	return letterGrade;
}

/**
 * 
 * Calculates the number of credits the student receives.
 * 
 * @param {number} mark 
 * @param {int} weight 
 * @return {number}
 */
function modCredit(mark, weight) {
	var credits = 0;
	switch (true) {
		case (mark <= 49 && mark >= 0):
			credits = 0;
			break;
		case (mark >= 50 && mark <= 100):
			credits = weight;
			break;
		default:
			alert("Please enter a valid mark.");
			break;
	}
	return credits;
}

/**
 * 
 * Calculates the final award the student recevies given the number of credits acquired.
 * 
 * @param {number} totalCred
 * @return {string}
 */
function reward(totalCred) {
	var reward = "0" ;
	if (totalCred == 180)
		reward = "you have achieved a MSc in Computing Science";
	else if (totalCred < 180 && totalCred >= 120)
		reward = "you have achieved a Postgraduate Diploma in Computing Science";
	else if (totalCred < 120 && totalCred >= 60)
		reward = "you have achieved a Postgraduate Certificate in Computing Science";
	else
		reward = "you have failed";

	return reward;
}
