<?php
require "../../app/database.php";

require_once('../../tcpdf/tcpdf.php');

$connection = $GLOBALS['connection'];

if(isset($_POST['fetch'])){
    $query = "SELECT * FROM user where user_type='tenant'";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query){
        die("Query Failed". mysqli_error($connection));
    }

    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Max Bakora');
    $pdf->SetAuthor('Max Bakora');
    $pdf->SetTitle('Tenant Information');
    $pdf->SetSubject('Tenant Information Report');
    $pdf->SetKeywords('Tenant, Information, Report');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add content to the PDF
    $content = '';

    while ($row = mysqli_fetch_array($search_query)) {
        $fname = $row['tenant_first_name'];
        $lname = $row['tenant_last_name'];
        $email = $row['tenant_email'];

        $content .= "
        <tr>
            <td>$fname</td>
            <td>$lname</td>
            <td>$email</td>
        </tr>
        ";
    }

    $html = "
    <table border='1'>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            $content
        </tbody>
    </table>
    ";

    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF as a file
    $pdf->Output('tenant_information.pdf', 'D'); // 'D' forces download

    exit; // Stop further execution
}
?>
