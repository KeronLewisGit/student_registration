<?php
require 'vendor/league/csv/autoload.php';
use League\Csv\Reader;
use League\Csv\Statement;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<style>
div{
    padding-top:10px;
    padding-bottom:10px;
}

*{
    font-family:"Lato", sans-serif;
   
}

.container{
    background-image:url('Official Document1.png');
    background-position: bottom center; 
    background-repeat: no-repeat;
    padding:20px 50px;
}

.filterHeader{
    padding:0 0 30px; 
    display:block;
    margin:0 auto; 
    width:1100px;
}
@page 
{ 
    size: letter;
    margin-top: 10px;  
    margin-bottom: 10x; 
}
body { margin: 1px;}
.card
{ 
    margin-top: 20px;
    z-index:-1;
}
@media print {
  footer {page-break-after: always;}
  .end {page-break-after: always;}
  .filterHeader, .filterHeader *{
    display:none !important;
  }

}
.pagestyle{
    margin:0 auto; 
    width:1100px; 
    min-height:1056px; 
    padding:0 0 30px; 
    box-sizing: border-box;
}

</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="successlogo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Success Student Management System</title>

    </head>

    <body>
        
        <?php
        function filterByStudentClass(array $record): bool
        {
            return (bool) filter_var($record["Form 1 Class"] == "1A");
        }

        function sortByStudentClass(array $recordA, array $recordB): int
        {
            return strcmp($recordB["Form 1 Class"], $recordA["Form 1 Class"]);
        }

        //load the CSV document from a file path
        $reader = Reader::createFromPath('2023/Form1-Registration-Data-Updated.csv', 'r');
        $reader->setHeaderOffset(0);
        $records = Statement::create()
        ->where('filterByStudentClass')
        ->orderBy('sortByStudentClass')
        ->process($reader);
        $title = $records->getHeader(); 
        
        ?>
        <div class="filterHeader ">
            <form class="row g-3">
                    <div class=" col-md-6">
                        <label class="visually-hidden" for="student_class">Select Student Class:</label>
                        <select id="student_class" class="form-select">
                            <option selected>Student Class</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class=" col-md-6">
                        <label class="visually-hidden" for="student_name">Select Student Name:</label>
                        <select id="student_name" class="form-select">
                            <option selected>Student Name</option>
                            <option value="1">.</option>
                        </select>
                    </div>
            </form>
        </div>

        

        
        <?php
        
        foreach ($records as $record) {
            
            //if path exists get path information 
            if (!empty($record["Student Photo(Passport Size)"])){
                $info = pathinfo($record["Student Photo(Passport Size)"]);
                $headerimg = $info['extension'];
            }
            
            echo '<div class="pagestyle">';
            echo '<div class="container end">';
                echo '<div style="padding-top:50px" class="row">';
                if(!empty($record['Student Photo(Passport Size)']) && $headerimg!='pdf'){
                    echo '<div class="col-3"> <h6>Passport Size Photo</h6><img src='.$record['Student Photo(Passport Size)'].' width="150" height="150"></div>';//Passport-size photo
                }
                else{
                    echo '<div class="col-3"> <h6>Passport Size Photo</h6><img src="noimage.jpg" width="150" height="150"></div>';
                }          
                echo '<div class="col-6"><h2>Success Laventille Secondary School Eastern Main Road</h2><br><p>Official Student Record.</p></div>';
                echo '<div class= "col-3"><img src="successlogo.png"  width="180" height="150"></div>';
                echo '</div>';
                echo '<div class="card">';
                echo '<div class="card-header">Student Information </div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                echo  '<div class="col-4"><h5 class="card-title">'.$title[1].'</h5> <p class="card-text">'.$record['Form 1 Class'].'</p></div>';//Form1 Class
                echo  '<div class="col-4"><h5 class="card-title">'.$title[2].'</h5> <p class="card-text">'.$record['Student Name'].'</p></div>';//Student Name
                echo  '<div class="col-4"><h5 class="card-title">'.$title[3].'</h5> <p class="card-text">'.$record['Student Gender'].'</p></div>';//Student Gender
                echo '</div>';       
                echo '<div class="row">';
                echo  '<div class="col-4"> <h5 class="card-title">'.$title[4].'</h5> <p class="card-text">'.ucwords(strtolower($record['Student Current Address'])).'</p></div>';//Current Address
                if (!empty($record['Student Current Address'] && empty($record['Residential (Permanent) Address, IF DIFFERENT from Current Address provided above.']))){
                    echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5> <p class="card-text"> Same as Current Address.</p></div>';
                }else{
                    echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5>  <p class="card-text">' .ucwords(strtolower($record['Residential (Permanent) Address, IF DIFFERENT from Current Address provided above.'])).'</p></div>';//Residential Address
                }
                echo '<div class="col-4"> <h5 class="card-title">Date of Birth  </h5> <p class="card-text">'.$record['Student Date of Birth'].'</p></div>';//Date of Birth
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Birth Cirtificate Pin </h5> <p class="card-text">'.$record['Student Birth Certificate Pin'].'</p></div>';//Birth Cirtificate Pin
                echo '<div class="col-4"> <h5 class="card-title">Religion </h5> <p class="card-text">'.$record['Student Religion'].'</p></div>';//Student Religion
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Country of Birth </h5> <p class="card-text">'.$record['Student Country of Birth'].'</p></div>';//Country of Birth
                if (!empty($record['Student Nationality'] && empty($record['Other Nationality']))){
                    echo '<div class="col-4"> <h5 class="card-title">Nationality </h5> <p class="card-text">'.$record['Student Nationality'].'</p></div>';//Student Nationality
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Nationality </h5> <p class="card-text">'.$record['Other Nationality'].'</p></div>';//Other Student Nationality
                }
                if (!empty($record['Student Ethnicity'])){
                    echo '<div class="col-4"> <h5 class="card-title">Student Ethnicity</h5> <p class="card-text">'.$record['Student Ethnicity'].'</p></div>';//Student Ethnicity
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Student Ethnicity</h5> <p class="card-text">'.$record['Other Etnicity'].'</p></div>';//Other Student Ethnicity
                }   
                echo '</div>';
                echo '<div class="row">';
                if(!empty($record[18])){
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text">'.$record['Student Contact'].'</p></div>';//Student Contact
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text"> None Provided.</p></div>';
                }  
                if(!empty($record[18])){
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[19].'</h5> <p class="card-text">'.$record['Student Email'].'</p></div>';//Student Email
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[19].'</h5> <p class="card-text"> None Provided.</p></div>';
                } 
                echo '</div></div></div>';
                echo '<div class="card">';
                echo '<div class="card-header">SEA Information </div>';
                echo '<div class="card-body">';
                
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title"> SEA Exam Date</h5> <p class="card-text">'.$record['Year Student Wrote S.E.A Exam'].'</p></div>';//Year Student Wrote SEA
                echo '<div class="col-4"> <h5 class="card-title">'.$title[21].'</h5> <p class="card-text">'.ucwords(strtolower($record['Primary School'])).'</p></div>';//Previous Primary School Attended
                echo '<div class="col-4"> <h5 class="card-title">'.$title[23].'</h5> <p class="card-text">'.$record['Student S.E.A Number'].'</p></div>';//Student S.E.A Number
                
                echo '</div>';
                echo'</div></div>';
                echo '<div class="card end">';
                echo '<div class="card-header">Medical Information </div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Medical Complications </h5> <p class="card-text">'.$record['Does your child/ward have any medical complications?'].'</p></div>';//Medical Complications
                if($record['Does your child/ward have any medical complications?']!='No'){
                    if (!empty($record['Please specify medical condition:'])){
                        echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text">'.$record['Please specify medical condition:'].'</p></div>';//Type of Medical Complications
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    
                }
                echo '<div class="col-4"> <h5 class="card-title">Blood Group </h5> <p class="card-text">'.$record["What is your child's/ ward's blood group?"].'</p></div>';//Blood Group
                echo '<div class="col-4"> <h5 class="card-title">Alergies </h5> <p class="card-text">'.$record["Does your child/ ward have any allergies?"].'</p></div>';//Alergies
                if($record["Does your child/ ward have any allergies?"]!='No'){
                    echo '<div class="col-4"> <h5 class="card-title">Type of Alergies </h5> <p class="card-text">'.$record["Please specify allergies:"].'</p></div>';//Type of Alergies
                }
                echo '</div>';
                echo '</div>';
                echo '</div></div>';
                echo '<div class="container">';
                echo '<div class="card">';
                echo '<div class="card-header">Personal Information</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Boxlunch Preference </h5> <p class="card-text">'.$record['The School Feeding Programme provides meals to the most neediest students. Which meal(s) does your child require?'].'</p></div>';//Boxlunch
                echo '<div class="col-4"> <h5 class="card-title">Social Welfare</h5> <p class="card-text">'.$record['Do you receive Social Welfare Services?'].'</p></div>';//Social Welfare Services
                echo '<div class="col-4"> <h5 class="card-title">Mode of Transport</h5> <p class="card-text">'.$record['What mode of transport will your child/ ward be using to commute to/ from school?'].'</p></div>';//Mode of Transport
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Imunnized</h5> <p class="card-text">'.$record['Is your child/ ward fully immunised?'].'</p></div>';//Immunization Status
                echo '<div class="col-4"> <h5 class="card-title">Continuous Access to Device</h5> <p class="card-text">'.$record['Does your child/ ward have continuous access to a device?'].'</p></div>';//Continued Access to Device
                echo '<div class="col-4"> <h5 class="card-title">Reliable Internet Access</h5> <p class="card-text">'.$record['Does your child/ ward have reliable internet access?'].'</p></div>';//Reliable Internet Access
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-4"> <h5 class="card-title">Type of Device Used</h5> <p class="card-text">'.$record['What is the device being used by your child/ ward to do online classes?'].'</p></div>';//Type of Device Used
                echo '<div class="col-8"> <h5 class="card-title">E-Learning Applications with Experience</h5> <p class="card-text">'.$record['Do you or your child/ ward know how to use  the following : (tick  which one you know)'].'</p></div>';//Type of Applications with Experience 
                echo '</div>';  
                echo '</div></div>';
                echo '<div class="card">';
                echo '<div class="card-header">Parent/Guardian Information (Mother)</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                if(!empty($record["Mother's Name"])){
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[45].'</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Name"])).'</p></div>';//Mother's Name
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[45].'</h5> <p class="card-text font-italic"> No record provided </p></div>';
                } 
                if(!empty($record["Is Mother Deceased?"]) && $record["Is Mother Deceased?"]=="No" ){
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Alive </p></div>';//Mother's Status     
                }
                else if (!empty($record["Is Mother Deceased?"]) && $record["Is Mother Deceased?"]=="Yes" ){
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Deceased </p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Mother's Identification Number:"])){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record["Mother's Identification Type"].')</br>'.$record["Mother's Identification Number:"].'</p></div>';//Identification
                }else if($record["Is Mother Deceased?"]=="Yes"){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$record["Mother's Death Certificate Pin"].'</p></div>';//Identification
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';                 
                echo '<div class="row">';
                if(!empty($record["Mother's Home Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Home Address"])).'</p></div>';//Mother's Address
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                
                if(!empty($record["Mother's Contact"])){
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record["Mother's Contact"].'</p></div>';//Mother's Contact
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Mother's Profession/Job"])){
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.$record["Mother's Profession/Job"].'</p></div>';//Mother's Profession
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';
                echo '<div class="row">';
                if(!empty($record["Mother's Work Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Work Address"])).'</p></div>';//Mother's Work Address
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Mother's Email Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$record["Mother's Email Address"].'</p></div>';//Mother's Email
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo "</div>";
                echo '</div></div>';
                echo '<div class="card end">';
                echo '<div class="card-header">Parent/Guardian Information (Father)</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                if(!empty($record["Father's Name"])){
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Name"])).'</p></div>';//Father's Name
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }     
                if(!empty($record["Is Father Deceased?"]) && $record["Is Father Deceased?"]=="No" ){
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Alive </p></div>';//Father's Status     
                }
                else if (!empty($record["Is Father Deceased?"]) && $record[57]=="Yes" ){
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Deceased </p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Father's Identification Number:"])){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record["Father's Identification Type"].')</br>'.$record["Father's Identification Number:"].'</p></div>';//Identification
                }else if($record["Is Father Deceased?"]=="Yes"){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$record["Father's Death Certificate Pin"].'</p></div>';//Identification
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No record provided </p></div>';
                } 
                echo '</div>';   
                echo '<div class="row">';         
                if(($record["Same Home Address as Mother?"]) == "No"){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Home Address"])).'</p></div>';//Father's Address
                }
                else if (($record["Same Home Address as Mother?"]) == "Yes"){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> Same Address as Mother </p></div>';
                }
                else if (empty($record["Same Home Address as Mother?"]) && !empty($record["Father's Home Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic">'.$record["Father's Home Address"].'</p></div>';
                }
                else{  
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record Provided</p></div>';
                }
                if(!empty($record["Father's Contact"])){
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record["Father's Contact"].'</p></div>';//Father's Contact
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Father's Profession/Job"])){
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Profession/Job"])).'</p></div>';//Father's Profession
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';   
                echo '<div class="row">';
                if(!empty($record["Father's Work Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Work Address"])).'</p></div>';//Father's Work Address
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Father's Email Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$record["Father's Email Address"].'</p></div>';//Father's Email
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div></div>';
                echo '<div class="container">';
                echo '<div class="card">';
                echo '<div class="card-header">Emergency Contact Information</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                if(!empty($record["Emergency Contact Name"])){
                    echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text">'.ucwords(strtolower($record["Emergency Contact Name"])).'</p></div>';//Emergency Contact Name
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text font-italic"> No record provided </p></div>';
                } 
                if(!empty($record["Relation to Student"])){
                    echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text">'.ucwords(strtolower($record["Relation to Student"])).'</p></div>';//Relation to Student
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if(!empty($record["Emergency Contact"])){
                    echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text">'.$record["Emergency Contact"].'</p></div>';//Emergency Contact
                }else{
                    echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';                   
                echo '<div class="row">';
                if(!empty($record["Emergency Contact Address"])){
                    echo '<div class="col-4"> <h5 class="card-title">Address</h5> <p class="card-text">'.ucwords(strtolower($record["Emergency Contact Address"])).'</p></div>';//Emergency Contact Address
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                } 
                echo '</div>';
                echo '</div></div>';
                echo '<div class="card end">';
                echo '<div class="card-header">Registrant Information</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';                    
                if(!empty($record["Date of Registration"])){
                    echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text">'.$record["Date of Registration"].'</p></div>';//Date of Registration
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if($record["Registrant's relation to student"]=="Mother"){
                    echo '<div class="col-4"> <h5 class="card-title">Registrant (Mother)</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Name"])).'</p></div>';//Name of Registrant
                }
                else if($record["Registrant's relation to student"]=="Father"){
                    echo '<div class="col-4"> <h5 class="card-title">Registrant (Father)</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Name"])).'</p></div>';
                }
                else if($record["Registrant's relation to student"]=="Other"){
                    echo '<div class="col-4"> <h5 class="card-title">Registrant ('.$record["State relation to student:"].')</h5> <p class="card-text">'.ucwords(strtolower($record["Name of Registrant"])).'</p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Registrant Name</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if($record["State relation to student:"]=="Mother"){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record["Mother's Identification Type"].')</br>'.$record["Mother's Identification Number:"].'</p></div>';//Registrant's Identification
                }
                else if($record["State relation to student:"]=="Father"){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record["Father's Identification Type"].')</br>'.$record["Father's Identification Number:"].'</p></div>';
                }
                else if($record["State relation to student:"]=="Other"){
                    echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record["Registrant Identification Type:"].')</br>'.$record["Registrant's Identification Number:"].'</p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">'.$title[69].'</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>';
                echo '<div class="row" style="padding-bottom:400px">'; 
                if($record["State relation to student:"]=="Mother"){
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Profession/Job"])).'</p></div>';//Registrant's Profession 
                }
                else if($record["State relation to student:"]=="Father"){
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Profession/Job"])).'</p></div>';
                }else if($record["State relation to student:"]=="Other"){
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record["Registrant Profession"])).'</p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if($record["State relation to student:"]=="Mother"){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.$record["Mother's Home Address"].'</p></div>';//Registrant's Address
                }
                else if($record["State relation to student:"]=="Father"){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record["Father's Home Address"])).'</p></div>';
                }
                else if($record["State relation to student:"]=="Father" && $record["Same Home Address as Mother?"]=="Yes" ){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record["Mother's Home Address"])).'</p></div>';
                }
                else if($record["State relation to student:"]=="Other"){
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record["Registrant Current Address"])).'</p></div>';
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                if($record["State relation to student:"]=="Mother"){
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record["Mother's Contact"].'</p></div>';//Registrant's Contact
                }
                else if($record["State relation to student:"]=="Father"){
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record["Father's Contact"].'</p></div>';//Registrant's Contact
                }
                else if($record["State relation to student:"]=="Other"){
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record["Registrant Contact:"].'</p></div>';//Registrant's Contact
                }
                else{
                    echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No record provided </p></div>';
                }
                echo '</div>'; 
                echo '</div>';      
                echo '</div>';
                echo '<div class="end">';
                
                echo '</div>'; 
                echo '</div>';      
                echo '</div></div>';
                echo '</div>';
        }
        
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>