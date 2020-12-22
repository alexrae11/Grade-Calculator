<?php
require "header.php";                                                                                        // includes the header on the calculator page

if (!isset($_SESSION['id'])) {                                                                               // if the user tries to access the site incorrectly they are sent back to the main page
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
                <td>Object-Oriented Programming</td>
                <td>
                    <input type="text" id="COMP7001" size=2 value="87">
                </td>
                <td>
                    <div id="letterGrade1"></div>
                </td>
                <td>
                    <div id="credits1"></div>
                </td>
            </tr>
            <tr>
                <td>Modern Computer Systems</td>
                <td>
                    <input type="text" id="COMP7002" size=2 value="74">
                </td>
                <td>
                    <div id="letterGrade2"></div>
                </td>
                <td>
                    <div id="credits2"></div>
                </td>
            </tr>
            <tr>
                <td>Research, Scholarship and Professional Skills</td>
                <td>
                    <input type="text" id="TECH7005" size=2 value="56">
                </td>
                <td>
                    <div id="letterGrade3"></div>
                </td>
                <td>
                    <div id="credits3"></div>
                </td>
            </tr>
            <tr>
                <td>Data Science Foundations</td>
                <td>
                    <input type="text" id="DALT7002" size=2 value="74">
                </td>
                <td>
                    <div id="letterGrade4"></div>
                </td>
                <td>
                    <div id="credits4"></div>
                </td>
            </tr>
            <tr>
                <td>Advanced Software Development</td>
                <td>
                    <input type="text" id="SOFT7003" size=2 value="56">
                </td>
                <td>
                    <div id="letterGrade5"></div>
                </td>
                <td>
                    <div id="credits5"></div>
                </td>
            </tr>
            <tr>
                <td>Cyber Security and the Web</td>
                <td>
                    <input type="text" id="TECH7004" size=2 value="75">
                </td>
                <td>
                    <div id="letterGrade6"></div>
                </td>
                <td>
                    <div id="credits6"></div>
                </td>
            </tr>
            <tr>
                <td>MSc Dissertation in Computing Subjects</td>
                <td>
                    <input type="text" id="TECH7009" size=2 value="56">
                </td>
                <td>
                    <div id="letterGrade7"></div>
                </td>
                <td>
                    <div id="credits7"></div>
                </td>
            </tr>
            <tr class="btn" align=center>
                <td colspan=4>
                    <input type="button" value="Calculate Grades" name="CalcButton" OnClick="process()">
                </td>
            </tr>
        </table>
    </div>
    <div class="average" id="outputMessage" style="height: 50px; width: 100%;"></div>
    <div class="average" id="outputMessage2" style="height: 50px; width: 100%;"></div>
    <table>
        <tr>
            <th>Number of A's</th>
            <th>Number of B's</th>
            <th>Number of C's</th>
            <th>Number of F's</th>
        </tr>

        <tr>
            <td>
                <div id="totalA"></div>
            </td>
            <td>
                <div id="totalB"></div>
            </td>
            <td>
                <div id="totalC"></div>
            </td>
            <td>
                <div id="totalF"></div>
            </td>
        </tr>

    </table>
</body>

</html>

<script src="functions.js" type="text/javascript"></script>
