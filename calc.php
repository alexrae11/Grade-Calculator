<?php
require "header.php";                                                                                        // includes the header on the calculator page

if (!isset($_SESSION['id'])) {                                                                               // prevents the user from accessing the caluclator page from a link unless already logged in
    header("Location: index.php");
    die();
}
?>

<html>

<head>       
    <title>MSc Computing Science Grading Calculator</title>                                                 
</head>

<body>
    <div>
        <!--headings explaining how to use the calculator-->
        <h2 class="h2">Grade Average Calculator</h2>
        <h3 class="h3">Input your marks for the following modules:</h3>
    </div>
    <div class="table">
        <table class="design" id="table" border=2 cellspacing=2 cellpadding=2>
            <tr>
                <th>Module</th>
                <th>Mark</th>
                <th>Grade</th>
                <th>Credits</th>
            </tr>
            <tr>
                <!--the first cell defines the module-->
                <td>Object-Oriented Programming</td>
                <!--the second cell allows you to input your mark-->
                <td><input type="text" id="COMP7001" size=2"></td>
                <!--the third cell outputs the grade corresponding to the mark inputted in cell 1-->
                <td><div id="letterGrade1"></div></td>
                <!--the fourth cell outputs the number of credits corresponding to the module-->
                <td><div id="credits1"></div></td>
            </tr>
            <tr>
                <td>Modern Computer Systems</td>
                <td><input type="text" id="COMP7002" size=2></td>
                <td><div id="letterGrade2"></div></td>
                <td><div id="credits2"></div></td>
            </tr>
            <tr>
                <td>Research, Scholarship and Professional Skills</td>
                <td><input type="text" id="TECH7005" size=2></td>
                <td><div id="letterGrade3"></div></td>
                <td><div id="credits3"></div></td>
            </tr>
            <tr>
                <td>Data Science Foundations</td>
                <td><input type="text" id="DALT7002" size=2></td>
                <td><div id="letterGrade4"></div></td>
                <td><div id="credits4"></div></td>
            </tr>
            <tr>
                <td>Advanced Software Development</td>
                <td><input type="text" id="SOFT7003" size=2></td>
                <td><div id="letterGrade5"></div></td>
                <td><div id="credits5"></div></td>
            </tr>
            <tr>
                <td>Cyber Security and the Web</td>
                <td><input type="text" id="TECH7004" size=2></td>
                <td><div id="letterGrade6"></div></td>
                <td><div id="credits6"></div></td>
            </tr>
            <tr>
                <td>MSc Dissertation in Computing Subjects</td>
                <td><input type="text" id="TECH7009" size=2></td>
                <td><div id="letterGrade7"></div></td>
                <td><div id="credits7"></div></td>
            </tr>
            <tr class="btn" align=center>
                <!--the final row acts as a button to calculate all the grades and credits-->
                <td colspan=4><input type="button" value="Calculate Grades" name="CalcButton" OnClick="process()"></td>
            </tr>
        </table>
    </div>
    <div class="average" id="outputMessage" style="height: 50px; width: 100%;"></div>
    <div class="average" id="outputMessage2" style="height: 50px; width: 100%;"></div>
    <div class="table">
        <table class="design" id="table" border=2 cellspacing=2 cellpadding=2>
            <tr>
                <th>Number of A's</th>
                <th>Number of B's</th>
                <th>Number of C's</th>
                <th>Number of F's</th>
            </tr>
            <tr>
                <td><div id="totalA"></div></td>
                <td><div id="totalB"></div></td>
                <td><div id="totalC"></div></td>
                <td><div id="totalF"></div></td>
            </tr>
        </table>
    </div>
</body>

</html>

<script src="js/functions.js" type="text/javascript"></script>  
