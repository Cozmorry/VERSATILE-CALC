#VERSATILE-CALC

Implementation Approach
This documentation outlines the steps to implement a versatile calculator application using PHP, HTML, and CSS. The calculator performs various operations including addition, subtraction, multiplication, division, exponentiation, percentage calculations, square roots, and logarithms.

1. Setting Up the Environment
Install XAMPP:
Download and install XAMPP
Start the Apache and MySQL modules from the XAMPP Control Panel.

2. Creating the Project Structure
Create the project directory inside the XAMPP htdocs folder.

3. PHP Script for Calculator
Create a PHP script to handle the various arithmetic operations and display the form.

4. CSS for Styling (styles.css)
Create a CSS file to style the calculator form and result display.

5. Create the Database
Access phpMyAdmin: Open your web browser and go to http://localhost/phpmyadmin.

6. Create a New Database:
Click on "New" in the left sidebar.
Enter the database name and click "Create".
Create the Calculations Table

Instructions for Testing the Application

1. Verify XAMPP is Running
Open the XAMPP Control Panel.
Ensure Apache and MySQL services are running. If they are not, start them by clicking the "Start" button next to each service.

3. Place Files in the Correct Directory
Save cozycalc.php and cozycss.css in the C:\xampp\htdocs\calculator directory.

5. Access the Application
Open a web browser.
Navigate to http://localhost/cozycalcc/cozycalc.php

7. Perform Calculations
Input Values:
Enter values in the "Number 1" and "Number 2" fields ("Number 2" is optional for operations like square root and logarithm).
Select Operation:
Choose the desired operation from the dropdown menu.
Calculate:
Click the "Calculate" button.
View Result:
The result of the calculation will be displayed on the form.
8. Test error Cases
Division by Zero:
Enter a number in "Number 1" and 0 in "Number 2", then select "Divide" and click "Calculate". The application should say ERROR!.
Square Root of Negative Number:
Enter a negative number in "Number 1", select "Square Root" and click "Calculate". This will display error too.
