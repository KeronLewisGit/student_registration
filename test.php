<style>
@page { margin: 1px; }
body { margin: 1px; }
.card{ margin-top: 10px;}
@media print {
  footer {page-break-after: always;}
  .end {page-break-after: always;}
}

</style>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>




<body>
    <?php
    /**
     * parse-csv.php
     */

    $err_upTmpName = 'Success- Form 1A.csv';
    $t=0;
    $row = 0;
    $p= 0;

    if (($handle = fopen($err_upTmpName, "r")) !== FALSE) {
        echo '<div style="margin:0 auto; width:816px; min-height:1056px; padding:0 0 30px;font-family: "Open Sans", sans-serif; box-sizing: border-box;">';
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
            $csv[] = $data;
            for ($t=0;$t<84;$t++){
                
                $title[] = $csv[0][$t];
            }
            if($row == 0){ 
            $row++; 
            
            } else {
            
                $p++;
                    
                    echo '<div class="row">';
          
 
                    echo '<div class="col-3"> <h6>Passport Size Photo</h6><img src="noimage.jpg" width="150" height="150"></div>';//Passport Size Photo
         
                    echo '<div class="col-6"><h2>Success Laventille Secondary School Eastern Main Road</h2><br><p>Official Student Record.</p></div>';
                    echo '<div class= "col-3"><img src="successlogo.png"  width="180" height="150"></div>';
                    echo '</div>';
                    echo '<div class="card">';
                    echo '<div class="card-header">Student Information </div>';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo  '<div class="col-4"><h5 class="card-title">'.$title[3].'</h5> <p class="card-text">'.$data[3].'</p></div>';//First Name
                    echo  '<div class="col-4"><h5 class="card-title">'.$title[4].'</h5> <p class="card-text">'.$data[4].'</p></div>';//Middle Name  
                    echo  '<div class="col-4"><h5 class="card-title">'.$title[2].'</h5> <p class="card-text">'.$data[2].'</p></div>';//Last Name 
                    echo '</div>';       
                    echo  ' <div><h5 class="card-title">'.$title[5].'</h5> <p class="card-text">'.$data[5].'</p></div>';//Gender
                    echo '<div class="row">';
                    echo  '<div class="col-8"> <h5 class="card-title">'.$title[6].'</h5> <p class="card-text">'.$data[6].'</p></div>';//Current Address
                    if (!empty($data[6] && empty($data[7]))){
                        echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5> <p class="card-text"> Same as Current Address.</p></div>';
                    }else{
                        echo  '<div class="col-4"> <h5 class="card-title"> Residential Address </h5>  <p class="card-text">' .$data[7].'</p></div>';//Residential Address
                    }
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-8"> <h5 class="card-title">Date of Birth  </h5> <p class="card-text">'.$data[8].'</p></div>';//Date of Birth
                    //echo '<p><b>'.$title[9].'</b> '.$data[9].'</p>';//Birth Cirtificate
                    echo '<div class="col-4"> <h5 class="card-title">Birth Cirtificate Pin </h5> <p class="card-text">'.$data[10].'</p></div>';//Birth Cirtificate Pin
                    echo '</div>';
                    echo '<div><h5 class="card-title">Religion </h5><p class="card-text">'.$data[11].'</p></div>';//Student Religion
                    echo '<div class="row">';
                    echo '<div class="col-4"> <h5 class="card-title">Country of Birth </h5> <p class="card-text">'.$data[12].'</p></div>';//Country of Birth
                    echo '<div class="col-4"> <h5 class="card-title">Nationality </h5> <p class="card-text">'.$data[13].'</p></div>';//Student Nationality
                    if (!empty($data[14])){
                        echo '<div class="col-4"> <h5 class="card-title">Immigation Status</h5> <p class="card-text">'.$data[14].'</p></div>';//Immigration Status
                    }else{
                        echo '<div class="col-4"> <h5 class="card-title">Immigation Status</h5> <p class="card-text"> N/A</p></div>';
                    }      
                    echo '</div>';    
                    if (!empty($data[15])){
                        echo '<div> <h5 class="card-title">Student Permit Date of Issuance </h5> <p class="card-text">'.$data[15].'</p></div>';//Student Permit Date of Issuance 
                    }else{
                        echo '<div> <h5 class="card-title">Student Permit Date of Issuance </h5> <p class="card-text"> N/A</p></div>';
                    }
                    if(!empty($data[16])){
                        echo '<div> <h5 class="card-title">Student Permit Date of Expiration </h5> <p class="card-text">'.$data[16].'</p></div>';//Student Permit Date of Expiration
                    }else{
                        echo '<div> <h5 class="card-title">Student Permit Date of Expiration </h5> <p class="card-text"> N/A</p></div>';
                    }
                    if(!empty($data[17])){
                        echo '<div> <h5 class="card-title">'.$title[17].'</h5> <p class="card-text">'.$data[17].'</p></div>';//Student Contact
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[17].'</h5> <p class="card-text"> None Provided.</p></div>';
                    }  
                    if(!empty($data[18])){
                        echo '<div> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text">'.$data[18].'</p></div>';//Student Email
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[18].'</h5> <p class="card-text"> None Provided.</p></div>';
                    } 
                    echo '</div></div>';
                    echo '<div class="card">';
                    echo '<div class="card-header">SEA Information </div>';
                    echo '<div class="card-body">';
                    echo '<div> <h5 class="card-title">'.$title[19].'</h5> <p class="card-text">'.$data[19].'</p></div>';//Year Student Wrote SEA
                    echo '<div class="row">';
                    echo '<div class="col-6"> <h5 class="card-title">'.$title[20].'</h5> <p class="card-text">'.$data[20].'</p></div>';//Previous Primary School Attended
                    //echo '<p><b>'.$title[21].'</b> '.$data[21].'</p>';//Address of Last Primary School Attended
                    //echo '<p><b>'.$title[22].'</b> '.$data[22].'</p>';//Student S.E.A Slip
                    echo '<div class="col-6"> <h5 class="card-title">'.$title[23].'</h5> <p class="card-text">'.$data[23].'</p></div>';//Student S.E.A Number
                    echo '</div>';
                    if(!empty($data[24])){
                        echo '<div> <h5 class="card-title">'.$title[24].'</h5> <p class="card-text">'.$data[24].'</p></div>';//Are you a Transfer Student
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[24].'</h5> <p class="card-text"></b> N/A</p></div>';
                    }
                    if(!empty($data[25])){
                        echo '<p><b>'.$title[25].'</b> '.$data[25].'</p>';//Transfer Slip
                    }
                    if($data[24]!='No'){
                        echo '<p><b>'.$title[26].'</b> '.$data[26].'</p>';
                    }
                    if($data[24]!='No'){
                        echo '<p><b>'.$title[27].'</b> '.$data[27].'</p>';//Previous School Name
                    }
                    if($data[24]!='No'){
                        echo '<p><b>'.$title[28].'</b> '.$data[28].'</p>';//Previous School Location
                    }
                    echo'</div></div>';
                    echo '<div class="card end">';
                    echo '<div class="card-header">Medical Information </div>';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo '<div class="col-4"> <h5 class="card-title">Medical Complications </h5> <p class="card-text">'.$data[29].'</p></div>';//Medical Complications
                    if($data[29]!='No'){
                        if (!empty($data[30])){
                            echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text">'.$data[30].'</p></div>';//Type of Medical Complications
                        }
                        else{
                            echo '<div class="col-4"> <h5 class="card-title">Complication Type </h5> <p class="card-text font-italic"> No data provided </p></div>';
                        }
                        
                    }
                    echo '<div class="col-4"> <h5 class="card-title">Blood Group </h5> <p class="card-text">'.$data[31].'</p></div>';//Blood Group
                    echo '<div class="col-4"> <h5 class="card-title">Alergies </h5> <p class="card-text">'.$data[32].'</p></div>';//Alergies
                    if($data[32]!='No'){
                        echo '<div class="col-4"> <h5 class="card-title">Type of Alergies </h5> <p class="card-text">'.$data[33].'</p></div>';//Type of Alergies
                    }
                    echo '</div>';
                    echo '</div></div>';
                    echo '<div class="card">';
                    echo '<div class="card-header">Personal Information</div>';
                    echo '<div class="card-body">';
                    echo '<div> <h5 class="card-title">Types of Boxlunch Meals to Provide </h5> <p class="card-text">'.$data[34].'</p></div>';//Boxlunch
                    echo '<div> <h5 class="card-title">'.$title[35].'</h5> <p class="card-text">'.$data[35].'</p></div>';//Social Welfare Services
                    echo '<div> <h5 class="card-title">'.$title[36].'</h5> <p class="card-text">'.$data[36].'</p></div>';//Transfer Application
                    echo '<div> <h5 class="card-title">'.$title[37].'</h5> <p class="card-text">'.$data[37].'</p></div>';//Mode of Transport
                    echo '<div> <h5 class="card-title">'.$title[38].'</h5> <p class="card-text">'.$data[38].'</p></div>';//Immunization Status
                    echo '<div> <h5 class="card-title">'.$title[39].'</h5> <p class="card-text">'.$data[39].'</p></div>';//Continued Access to Device
                    echo '<div> <h5 class="card-title">'.$title[40].'</h5> <p class="card-text">'.$data[40].'</p></div>';//Reliable Internet Access
                    echo '<div> <h5 class="card-title">'.$title[41].'</h5> <p class="card-text">'.$data[41].'</p></div>';//Type of Device Used
                    echo '<div> <h5 class="card-title">'.$title[43].'</h5> <p class="card-text">'.$data[43].'</p></div>';//Is the Device Shared By Others
                    if ($data[43]!='No'){
                        echo '<div> <h5 class="card-title">'.$title[44].'</h5> <p class="card-text">'.$data[44].'</p></div>';
                    }
                    if (empty($data[42])){
                        echo '<div> <h5 class="card-title">'.$title[42].'</h5> <p class="card-text">N/A</p></div>';//Learning Package
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[42].'</h5> <p class="card-text">'.$data[42].'</p></div>';
                    }
                    echo '<div> <h5 class="card-title">'.$title[45].'</h5> <p class="card-text">'.$data[45].'</p></div>';//Partial Employment due to Covid-19
                    echo '<div> <h5 class="card-title">Type of E-Learning Applications with Experience</h5> <p class="card-text">'.$data[46].'</p></div>';//Type of Applications with Experience
                    echo '</div></div>';
                    echo '<div class="card end">';
                    echo '<div class="card-header">Parent/Guardian Information (Mother)</div>';
                    echo '<div class="card-body">';
                    if(!empty($data[47])){
                        echo '<div> <h5 class="card-title">'.$title[47].'</h5> <p class="card-text">'.$data[47].'</p></div>';//Mother's Name
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[47].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }                    
                    echo '<div class="row">';
                    if(!empty($data[48])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type</h5> <p class="card-text">'.$data[48].'</p></div>';//Type of Identificaiton
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[49])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number</h5> <p class="card-text">'.$data[49].'</p></div>';//Identification Number
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(!empty($data[50])){
                        echo '<div> <h5 class="card-title">'.$title[50].'</h5> <p class="card-text">'.$data[50].'</p></div>';//Mother's Address
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[49].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '<div class="row">';
                    if(!empty($data[51])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[51].'</h5> <p class="card-text">'.$data[51].'</p></div>';//Mother's Contact
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[51].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[52])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[52].'</h5> <p class="card-text">'.$data[52].'</p></div>';//Mother's Profession
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[52].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo "</div>";
                    if(!empty($data[53])){
                        echo '<div> <h5 class="card-title">'.$title[53].'</h5> <p class="card-text">'.$data[53].'</p></div>';//Mother's Work Address
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[53].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[53])){
                        echo '<div> <h5 class="card-title">'.$title[54].'</h5> <p class="card-text">'.$data[54].'</p></div>';//Mother's Email
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[54].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div></div>';
                    echo '<div class="card">';
                    echo '<div class="card-header">Parent/Guardian Information (Father)</div>';
                    echo '<div class="card-body">';
                    if(!empty($data[55])){
                        echo '<div> <h5 class="card-title">'.$title[55].'</h5> <p class="card-text">'.$data[55].'</p></div>';//Mother's Name
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[55].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }                    
                    echo '<div class="row">';
                    if(!empty($data[56])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type</h5> <p class="card-text">'.$data[56].'</p></div>';//Type of Identificaiton
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[57])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number</h5> <p class="card-text">'.$data[57].'</p></div>';//Identification Number
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(!empty($data[58])){
                        echo '<div> <h5 class="card-title">'.$title[58].'</h5> <p class="card-text">'.$data[58].'</p></div>';//Mother's Address
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[58].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[59])){
                        echo '<div> <h5 class="card-title">'.$title[59].'</h5> <p class="card-text">'.$data[59].'</p></div>';//Father's Home Address
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[59].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '<div class="row">';
                    if(!empty($data[60])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[60].'</h5> <p class="card-text">'.$data[60].'</p></div>';//Father's Contact
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[60].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[61])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[61].'</h5> <p class="card-text">'.$data[61].'</p></div>';//Father's Profession
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[61].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(!empty($data[62])){
                        echo '<div> <h5 class="card-title">'.$title[62].'</h5> <p class="card-text">'.$data[62].'</p></div>';//Mother's Email
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[62].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                     if(!empty($data[63])){
                        echo '<div> <h5 class="card-title">'.$title[63].'</h5> <p class="card-text">'.$data[63].'</p></div>';//Mother's Email
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[63].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div></div>';
                    echo '<div class="card">';
                    echo '<div class="card-header">Emergency Contact Information</div>';
                    echo '<div class="card-body">';
                    if(!empty($data[64])){
                        echo '<div> <h5 class="card-title">'.$title[64].'</h5> <p class="card-text">'.$data[64].'</p></div>';//Emergency Contact Name
                    }else{
                        echo '<div> <h5 class="card-title">'.$title[64].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }                    
                    echo '<div class="row">';
                    if(!empty($data[66])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[66].'</h5> <p class="card-text">'.$data[66].'</p></div>';//Relation to Student
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[66].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[67])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[67].'</h5> <p class="card-text">'.$data[67].'</p></div>';//Emergency Contact
                    }else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[67].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(!empty($data[65])){
                        echo '<div> <h5 class="card-title">'.$title[65].'</h5> <p class="card-text">'.$data[65].'</p></div>';//Emergency Contact Address
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[65].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div></div>';
                    echo '<div class="card end">';
                    echo '<div class="card-header">Registrant Information</div>';
                    echo '<div class="card-body">';
                    echo '<div class="row">';                    
                    if(!empty($data[68])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[68].'</h5> <p class="card-text">'.$data[68].'</p></div>';//Date of Registration
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[68].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[69])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[69].'</h5> <p class="card-text">'.$data[69].'</p></div>';//Registrant's Relation to Student
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[69].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(empty($data[69])){
                        echo '<div> <h5 class="card-title">'.$title[70].'</h5> <p class="card-text">'.$data[70].'</p></div>';//Other Type of relation
                    }
                    echo '<div class="row">';
                    if(!empty($data[71])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[71].'</h5> <p class="card-text">'.$data[71].'</p></div>';//Name of Registrant
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[71].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                     if(!empty($data[72])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[72].'</h5> <p class="card-text">'.$data[72].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[72].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    echo '<div class="row">';
                    if(!empty($data[73])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type </h5> <p class="card-text">'.$data[73].'</p></div>';//Registrant Identification Type
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Type </h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                     if(!empty($data[74])){
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number </h5> <p class="card-text">'.$data[74].'</p></div>';//Registrant Identification Number
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">Identification Number </h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    echo '<div class="row">';
                    if(!empty($data[75])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[75].'</h5> <p class="card-text">'.$data[75].'</p></div>';//Name of Registrant
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[75].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                     if(!empty($data[76])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[76].'</h5> <p class="card-text">'.$data[76].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[76].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    echo '<div class="row">';
                    if(!empty($data[77])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[77].'</h5> <p class="card-text">'.$data[77].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[77].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[79])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[79].'</h5> <p class="card-text">'.$data[79].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[79].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';
                    if(!empty($data[78])){
                        echo '<div> <h5 class="card-title">'.$title[78].'</h5> <p class="card-text">'.$data[78].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div> <h5 class="card-title">'.$title[78].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '<div class="row">';
                    if(!empty($data[80])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[80].'</h5> <p class="card-text">'.$data[80].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[80].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[81])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[81].'</h5> <p class="card-text">'.$data[81].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[81].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>'; 
                    echo '<div class="row">';
                    if(!empty($data[82])){
                        echo '<div class="col-6"> <h5 class="card-title"> Primary Device </h5> <p class="card-text">'.$data[82].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title"> Primary Device </h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    if(!empty($data[83])){
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[83].'</h5> <p class="card-text">'.$data[83].'</p></div>';//Proof of Guardianship
                    }
                    else{
                        echo '<div class="col-6"> <h5 class="card-title">'.$title[83].'</h5> <p class="card-text font-italic"> No data provided </p></div>';
                    }
                    echo '</div>';      
                    echo '</div></div>';
                   
       
            }

        }

    } else {

        echo 'File could not be opened.';
    }   
    echo '</div>';
    fclose($handle);
    ?>
</body>
</html>