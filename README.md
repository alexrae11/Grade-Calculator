# Grade-Calculator
As part of my cyber security coursework I had to implement a web-based grading system by applying OWASP principles.

The following was the specification provided to achieve this.

The system should allow to specify the marks for each of the module of the Computing course, which include:
-COMP7001 Object-Oriented Programming
-COMP7002 Modern Computer Systems
-TECH7005 Research, Scholarship and Professional Skills
-DALT7002 Data Science Foundations 
-SOFT7003 Advanced Software Development
-TECH7004 Cyber Security and the Web
-TECH7009 MSc Dissertation in Computing Subjects

System should be able to specify:
-Marks for each of the module, for example, 60, 70, etc. Each module has a total mark of 100.
-Credits for each module. Each taught module is worth 20 credits. Dissertation has 60 credits

Based on the information entered the web-based system should perform the following tasks:
-Calculate the grade for each module based on the marks obtained. 
-Grade can be calculated as follows, Grade A(70+ marks): Grade B(60-69 marks); Grade C(50-59 marks): F (Fail) (less than 50 marks). 
-How many A, B, C or F grades have been obtained by a student?
-How many credits have been earned by student? 
-If a student passes a taught module then the credits earned are 20. For passing dissertation module, credits earned are 60.
-Based on the number of credits the system should recommend the award of the qualification, 180 credits for MSc in Computing, 120 credits for PG Diploma in Computing
-Calculate the total average marks obtained (from all of the modules)
