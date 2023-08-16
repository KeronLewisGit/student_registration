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
    z-index:-1;
}

.container{
    background-image:url('Official Document1.png');
    background-position: bottom center; 
    background-repeat: no-repeat;
    padding:20px 50px;
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
}
@media print {
  footer {page-break-after: always;}
  .end {page-break-after: always;}
}

</style>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lato-font/3.0.0/css/lato-font.min.css" integrity="sha512-rSWTr6dChYCbhpHaT1hg2tf4re2jUxBWTuZbujxKg96+T87KQJriMzBzW5aqcb8jmzBhhNSx4XYGA6/Y+ok1vQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>




<body>
    <?php

    //load the CSV document from a file path
    $reader = Reader::createFromPath('2023/Form1-Registration-Data-Updated.csv', 'r');
    $reader->setHeaderOffset(0);
    $records = Statement::create()->process($reader);
    $title = $records->getHeader(); 
    
   
    // $err_upTmpName = '2023/Form1-Registration-Data-Updated.csv';
    // $t=0;
    // $row = 0;
    // $p= 0;

    echo '<div style="margin:0 auto; width:1100px; min-height:1056px; padding:0 0 30px; box-sizing: border-box;">';
    
   
    foreach ($records as $record) {
        $info = pathinfo($record['Student Photo(Passport Size)']);
        $headerimg = $info['extension'];
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
                    if(!empty($record[50])){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record[49].')</br>'.$record[50].'</p></div>';//Identification
                    }else if($record["Is Mother Deceased?"]=="Yes"){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$record[48].'</p></div>';//Identification
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    echo '</div>';                 
                    echo '<div class="row">';
                    if(!empty($record[51])){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record[51])).'</p></div>';//Mother's Address
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    
                    if(!empty($record[52])){
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record[52].'</p></div>';//Mother's Contact
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[53])){
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.$record[53].'</p></div>';//Mother's Profession
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    echo '</div>';
                    echo '<div class="row">';
                    if(!empty($record[54])){
                        echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($record[54])).'</p></div>';//Mother's Work Address
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[55])){
                        echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$record[55].'</p></div>';//Mother's Email
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
                    if(!empty($record[56])){
                        echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text">'.ucwords(strtolower($record[56])).'</p></div>';//Father's Name
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }     
                    if(!empty($record[57]) && $record[57]=="No" ){
                        echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Alive </p></div>';//Father's Status     
                    }
                    else if (!empty($record[57]) && $record[57]=="Yes" ){
                        echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Deceased </p></div>';
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[ 61])){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record[60].')</br>'.$record[61].'</p></div>';//Identification
                    }else if($record[57]=="Yes"){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$record[59].'</p></div>';//Identification
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    } 
                    echo '</div>';   
                    echo '<div class="row">';         
                    if(($record[62]) == "No"){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record[63])).'</p></div>';//Father's Address
                    }
                    else if (($record[62]) == "Yes"){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> Same Address as Mother </p></div>';
                    }
                    else if (empty($record[62]) && !empty($record[63])){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic">'.$record[63].'</p></div>';
                    }
                    else{  
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record Provided</p></div>';
                    }
                    if(!empty($record[64])){
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record[64].'</p></div>';//Father's Contact
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[65])){
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record[65])).'</p></div>';//Father's Profession
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    echo '</div>';   
                    echo '<div class="row">';
                    if(!empty($record[66])){
                        echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($record[66])).'</p></div>';//Father's Work Address
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[67])){
                        echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$record[67].'</p></div>';//Father's Email
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
                    if(!empty($record[68])){
                        echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text">'.ucwords(strtolower($record[68])).'</p></div>';//Emergency Contact Name
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    } 
                    if(!empty($record[70])){
                        echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text">'.ucwords(strtolower($record[70])).'</p></div>';//Relation to Student
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if(!empty($record[67])){
                        echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text">'.$record[71].'</p></div>';//Emergency Contact
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    echo '</div>';                   
                    echo '<div class="row">';
                    if(!empty($record[69])){
                        echo '<div class="col-4"> <h5 class="card-title">Address</h5> <p class="card-text">'.ucwords(strtolower($record[69])).'</p></div>';//Emergency Contact Address
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
                    if(!empty($record[72])){
                        echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text">'.$record[72].'</p></div>';//Date of Registration
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if($record[73]=="Mother"){
                        echo '<div class="col-4"> <h5 class="card-title">Registrant (Mother)</h5> <p class="card-text">'.ucwords(strtolower($record[45])).'</p></div>';//Name of Registrant
                    }
                    else if($record[73]=="Father"){
                        echo '<div class="col-4"> <h5 class="card-title">Registrant (Father)</h5> <p class="card-text">'.ucwords(strtolower($record[56])).'</p></div>';
                    }
                    else if($record[73]=="Other"){
                        echo '<div class="col-4"> <h5 class="card-title">Registrant ('.$record[74].')</h5> <p class="card-text">'.ucwords(strtolower($record[75])).'</p></div>';
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Registrant Name</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if($record[73]=="Mother"){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record[49].')</br>'.$record[50].'</p></div>';//Registrant's Identification
                    }
                    else if($record[73]=="Father"){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record[60].')</br>'.$record[61].'</p></div>';
                    }
                    else if($record[73]=="Other"){
                        echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$record[77].')</br>'.$record[78].'</p></div>';
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">'.$title[69].'</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    echo '</div>';
                    echo '<div class="row" style="padding-bottom:400px">'; 
                    if($record[73]=="Mother"){
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record[53])).'</p></div>';//Registrant's Profession 
                    }
                    else if($record[73]=="Father"){
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record[65])).'</p></div>';
                    }else if($record[73]=="Other"){
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($record[81])).'</p></div>';
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if($record[73]=="Mother"){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.$record[51].'</p></div>';//Registrant's Address
                    }
                    else if($record[73]=="Father"){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record[63])).'</p></div>';
                    }
                    else if($record[73]=="Father" && $record[62]=="Yes" ){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record[51])).'</p></div>';
                    }
                    else if($record[73]=="Other"){
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($record[82])).'</p></div>';
                    }
                    else{
                        echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No record provided </p></div>';
                    }
                    if($record[73]=="Mother"){
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record[52].'</p></div>';//Registrant's Contact
                    }
                    else if($record[73]=="Father"){
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record[64].'</p></div>';//Registrant's Contact
                    }
                    else if($record[73]=="Other"){
                        echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$record[83].'</p></div>';//Registrant's Contact
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
        
                }
    // if (($handle = fopen($err_upTmpName, "r")) !== FALSE) {
    //     echo '<div style="margin:0 auto; width:1100px; min-height:1056px; padding:0 0 30px; box-sizing: border-box;">';
    //     while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
    //         $csv[] = $data;
    //         $info = pathinfo($data[0]);
            
    //         $headerimg = $info['extension'];
    //         for ($t=0;$t<84;$t++){
                
    //             $title[] = $csv[0][$t];
    //         }
    //         if($row == 0 ){ 
    //         $row++; 
            
    //         } else if($row != 0 && $data[$row]=='1D') {
            
    //             $p++;
    //                 echo '<div class="container end">';
    //                 echo '<div style="padding-top:50px" class="row">';
    //                 if(!empty($data[0]) && $headerimg!='pdf'){
    //                     echo '<div class="col-3"> <h6>Passport Size Photo</h6><img src='.$data[0].' width="150" height="150"></div>';//Passport-size photo
    //                 }
    //                 else{
    //                     echo '<div class="col-3"> <h6>Passport Size Photo</h6><img src="noimage.jpg" width="150" height="150"></div>';
    //                 }          
    //                 echo '<div class="col-6"><h2>Success Laventille Secondary School Eastern Main Road</h2><br><p>Official Student Record.</p></div>';
    //                 echo '<div class= "col-3"><img src="successlogo.png"  width="180" height="150"></div>';
    //                 echo '</div>';
    //                 echo '<div class="card">';
    //                 echo '<div class="card-header">Student Information </div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 echo  '<div class="col-4"><h5 class="card-title">'.$title[1].'</h5> <p class="card-text">'.$data[1].'</p></div>';//Form1 Class
    //                 echo  '<div class="col-4"><h5 class="card-title">'.$title[2].'</h5> <p class="card-text">'.$data[2].'</p></div>';//Student Name
    //                 echo  '<div class="col-4"><h5 class="card-title">'.$title[3].'</h5> <p class="card-text">'.$data[3].'</p></div>';//Student Gender
    //                 echo '</div>';       
    //                 echo '<div class="row">';
    //                 echo  '<div class="col-4"> <h5 class="card-title">'.$title[4].'</h5> <p class="card-text">'.ucwords(strtolower($data[4])).'</p></div>';//Current Address
    //                 if (!empty($data[4] && empty($data[5]))){
    //                     echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5> <p class="card-text"> Same as Current Address.</p></div>';
    //                 }else{
    //                     echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5>  <p class="card-text">' .ucwords(strtolower($data[5])).'</p></div>';//Residential Address
    //                 }
    //                 echo '<div class="col-4"> <h5 class="card-title">Date of Birth  </h5> <p class="card-text">'.$data[6].'</p></div>';//Date of Birth
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Birth Cirtificate Pin </h5> <p class="card-text">'.$data[8].'</p></div>';//Birth Cirtificate Pin
    //                 echo '<div class="col-4"> <h5 class="card-title">Religion </h5> <p class="card-text">'.$data[9].'</p></div>';//Student Religion
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Country of Birth </h5> <p class="card-text">'.$data[10].'</p></div>';//Country of Birth
    //                 if (!empty($data[11] && empty($data[12]))){
    //                     echo '<div class="col-4"> <h5 class="card-title">Nationality </h5> <p class="card-text">'.$data[11].'</p></div>';//Student Nationality
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Nationality </h5> <p class="card-text">'.$data[12].'</p></div>';//Other Student Nationality
    //                 }
    //                 if (!empty($data[13])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Student Ethnicity</h5> <p class="card-text">'.$data[13].'</p></div>';//Student Ethnicity
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Student Ethnicity</h5> <p class="card-text">'.$data[14].'</p></div>';//Other Student Ethnicity
    //                 }   
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 if(!empty($data[18])){
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text">'.$data[18].'</p></div>';//Student Contact
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text"> None Provided.</p></div>';
    //                 }  
    //                 if(!empty($data[18])){
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[19].'</h5> <p class="card-text">'.$data[19].'</p></div>';//Student Email
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[19].'</h5> <p class="card-text"> None Provided.</p></div>';
    //                 } 
    //                 echo '</div></div></div>';
    //                 echo '<div class="card">';
    //                 echo '<div class="card-header">SEA Information </div>';
    //                 echo '<div class="card-body">';
                    
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title"> SEA Exam Date</h5> <p class="card-text">'.$data[20].'</p></div>';//Year Student Wrote SEA
    //                 echo '<div class="col-4"> <h5 class="card-title">'.$title[21].'</h5> <p class="card-text">'.ucwords(strtolower($data[21])).'</p></div>';//Previous Primary School Attended
    //                 echo '<div class="col-4"> <h5 class="card-title">'.$title[23].'</h5> <p class="card-text">'.$data[23].'</p></div>';//Student S.E.A Number
                   
    //                 echo '</div>';
    //                 echo'</div></div>';
    //                 echo '<div class="card end">';
    //                 echo '<div class="card-header">Medical Information </div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Medical Complications </h5> <p class="card-text">'.$data[29].'</p></div>';//Medical Complications
    //                 if($data[29]!='No'){
    //                     if (!empty($data[30])){
    //                         echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text">'.$data[30].'</p></div>';//Type of Medical Complications
    //                     }
    //                     else{
    //                         echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                     }
                        
    //                 }
    //                 echo '<div class="col-4"> <h5 class="card-title">Blood Group </h5> <p class="card-text">'.$data[31].'</p></div>';//Blood Group
    //                 echo '<div class="col-4"> <h5 class="card-title">Alergies </h5> <p class="card-text">'.$data[32].'</p></div>';//Alergies
    //                 if($data[32]!='No'){
    //                     echo '<div class="col-4"> <h5 class="card-title">Type of Alergies </h5> <p class="card-text">'.$data[33].'</p></div>';//Type of Alergies
    //                 }
    //                 echo '</div>';
    //                 echo '</div>';
    //                 echo '</div></div>';
    //                 echo '<div class="container">';
    //                 echo '<div class="card">';
    //                 echo '<div class="card-header">Personal Information</div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Boxlunch Preference </h5> <p class="card-text">'.$data[34].'</p></div>';//Boxlunch
    //                 echo '<div class="col-4"> <h5 class="card-title">Social Welfare</h5> <p class="card-text">'.$data[35].'</p></div>';//Social Welfare Services
    //                 echo '<div class="col-4"> <h5 class="card-title">Mode of Transport</h5> <p class="card-text">'.$data[37].'</p></div>';//Mode of Transport
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Imunnized</h5> <p class="card-text">'.$data[38].'</p></div>';//Immunization Status
    //                 echo '<div class="col-4"> <h5 class="card-title">Continuous Access to Device</h5> <p class="card-text">'.$data[39].'</p></div>';//Continued Access to Device
    //                 echo '<div class="col-4"> <h5 class="card-title">Reliable Internet Access</h5> <p class="card-text">'.$data[40].'</p></div>';//Reliable Internet Access
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 echo '<div class="col-4"> <h5 class="card-title">Type of Device Used</h5> <p class="card-text">'.$data[41].'</p></div>';//Type of Device Used
    //                 echo '<div class="col-8"> <h5 class="card-title">E-Learning Applications with Experience</h5> <p class="card-text">'.$data[44].'</p></div>';//Type of Applications with Experience 
    //                 echo '</div>';  
    //                 echo '</div></div>';
    //                 echo '<div class="card">';
    //                 echo '<div class="card-header">Parent/Guardian Information (Mother)</div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 if(!empty($data[47])){
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[45].'</h5> <p class="card-text">'.ucwords(strtolower($data[45])).'</p></div>';//Mother's Name
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[45].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 } 
    //                 if(!empty($data[46]) && $data[46]=="No" ){
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Alive </p></div>';//Mother's Status     
    //                 }
    //                 else if (!empty($data[46]) && $data[46]=="Yes" ){
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Deceased </p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[50])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$data[49].')</br>'.$data[50].'</p></div>';//Identification
    //                 }else if($data[46]=="Yes"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$data[48].'</p></div>';//Identification
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';                 
    //                 echo '<div class="row">';
    //                 if(!empty($data[51])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($data[51])).'</p></div>';//Mother's Address
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
                    
    //                 if(!empty($data[52])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$data[52].'</p></div>';//Mother's Contact
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[53])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.$data[53].'</p></div>';//Mother's Profession
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';
    //                 echo '<div class="row">';
    //                 if(!empty($data[54])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($data[54])).'</p></div>';//Mother's Work Address
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[55])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$data[55].'</p></div>';//Mother's Email
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo "</div>";
    //                 echo '</div></div>';
    //                 echo '<div class="card end">';
    //                 echo '<div class="card-header">Parent/Guardian Information (Father)</div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 if(!empty($data[56])){
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text">'.ucwords(strtolower($data[56])).'</p></div>';//Father's Name
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[56].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }     
    //                 if(!empty($data[57]) && $data[57]=="No" ){
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Alive </p></div>';//Father's Status     
    //                 }
    //                 else if (!empty($data[57]) && $data[57]=="Yes" ){
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> Deceased </p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Status</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[ 61])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$data[60].')</br>'.$data[61].'</p></div>';//Identification
    //                 }else if($data[57]=="Yes"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">(Death Certificate No.)</br>'.$data[59].'</p></div>';//Identification
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 } 
    //                 echo '</div>';   
    //                 echo '<div class="row">';         
    //                 if(($data[62]) == "No"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($data[63])).'</p></div>';//Father's Address
    //                 }
    //                 else if (($data[62]) == "Yes"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> Same Address as Mother </p></div>';
    //                 }
    //                 else if (empty($data[62]) && !empty($data[63])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic">'.$data[63].'</p></div>';
    //                 }
    //                 else{  
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No Data Provided</p></div>';
    //                 }
    //                 if(!empty($data[64])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$data[64].'</p></div>';//Father's Contact
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[65])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($data[65])).'</p></div>';//Father's Profession
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';   
    //                 echo '<div class="row">';
    //                 if(!empty($data[66])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text">'.ucwords(strtolower($data[66])).'</p></div>';//Father's Work Address
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Work Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[67])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text">'.$data[67].'</p></div>';//Father's Email
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Email Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';
    //                 echo '</div>';
    //                 echo '</div></div>';
    //                 echo '<div class="container">';
    //                 echo '<div class="card">';
    //                 echo '<div class="card-header">Emergency Contact Information</div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';
    //                 if(!empty($data[68])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text">'.ucwords(strtolower($data[68])).'</p></div>';//Emergency Contact Name
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact Name</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 } 
    //                 if(!empty($data[70])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text">'.ucwords(strtolower($data[70])).'</p></div>';//Relation to Student
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Relation</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if(!empty($data[67])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text">'.$data[71].'</p></div>';//Emergency Contact
    //                 }else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact No.</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';                   
    //                 echo '<div class="row">';
    //                 if(!empty($data[69])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Address</h5> <p class="card-text">'.ucwords(strtolower($data[69])).'</p></div>';//Emergency Contact Address
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 } 
    //                 echo '</div>';
    //                 echo '</div></div>';
    //                 echo '<div class="card end">';
    //                 echo '<div class="card-header">Registrant Information</div>';
    //                 echo '<div class="card-body">';
    //                 echo '<div class="row">';                    
    //                 if(!empty($data[72])){
    //                     echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text">'.$data[72].'</p></div>';//Date of Registration
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Date of Registration</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if($data[73]=="Mother"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Registrant (Mother)</h5> <p class="card-text">'.ucwords(strtolower($data[45])).'</p></div>';//Name of Registrant
    //                 }
    //                 else if($data[73]=="Father"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Registrant (Father)</h5> <p class="card-text">'.ucwords(strtolower($data[56])).'</p></div>';
    //                 }
    //                 else if($data[73]=="Other"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Registrant ('.$data[74].')</h5> <p class="card-text">'.ucwords(strtolower($data[75])).'</p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Registrant Name</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if($data[73]=="Mother"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$data[49].')</br>'.$data[50].'</p></div>';//Registrant's Identification
    //                 }
    //                 else if($data[73]=="Father"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$data[60].')</br>'.$data[61].'</p></div>';
    //                 }
    //                 else if($data[73]=="Other"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Identification</h5> <p class="card-text">('.$data[77].')</br>'.$data[78].'</p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">'.$title[69].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>';
    //                 echo '<div class="row" style="padding-bottom:400px">'; 
    //                 if($data[73]=="Mother"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($data[53])).'</p></div>';//Registrant's Profession 
    //                 }
    //                 else if($data[73]=="Father"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($data[65])).'</p></div>';
    //                 }else if($data[73]=="Other"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text">'.ucwords(strtolower($data[81])).'</p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Profession</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if($data[73]=="Mother"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.$data[51].'</p></div>';//Registrant's Address
    //                 }
    //                 else if($data[73]=="Father"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($data[63])).'</p></div>';
    //                 }
    //                 else if($data[73]=="Father" && $data[62]=="Yes" ){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($data[51])).'</p></div>';
    //                 }
    //                 else if($data[73]=="Other"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text">'.ucwords(strtolower($data[82])).'</p></div>';
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Home Address</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 if($data[73]=="Mother"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$data[52].'</p></div>';//Registrant's Contact
    //                 }
    //                 else if($data[73]=="Father"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$data[64].'</p></div>';//Registrant's Contact
    //                 }
    //                 else if($data[73]=="Other"){
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text">'.$data[83].'</p></div>';//Registrant's Contact
    //                 }
    //                 else{
    //                     echo '<div class="col-4"> <h5 class="card-title">Contact</h5> <p class="card-text font-italic"> No data provided </p></div>';
    //                 }
    //                 echo '</div>'; 
    //                 echo '</div>';      
    //                 echo '</div>';
    //                 echo '<div class="end">';
                 
    //                 echo '</div>'; 
    //                 echo '</div>';      
    //                 echo '</div></div>';
    //         }
    //     }

    // } else {

    //     echo 'File could not be opened.';
    // }   
    // echo '</div>';
    // fclose($handle);
    // ?>
</body>
</html>