<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<form method="post" action=" ">
    <button 
        style=""
        class="bg-blue-400 rounded-md px-4 py-3 m-2 text-white"
        type="submit" name="fetch">
        Generate Tenants Report
    </button>
</form>
<?php
ob_start();
require "app/database.php"; // Assuming this file contains your database connection code
require_once('tcpdf/tcpdf.php');

$connection = $GLOBALS['connection'];

if (isset($_POST['fetch'])) {

    // Get the database connection
    $connection = $GLOBALS['connection'];
    // Query to fetch data from the 'user' table where user_type is 'tenant'
    $query = "SELECT * FROM tenants";

    $search_query = mysqli_query($connection, $query);
    if (!$search_query) {
        die("Query Failed: " . mysqli_error($connection));
    }
    // Create new TCPDF instance
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

    // Add header title
    $header = '<h1 style="text-align: center; margin-bottom: 20px;">Tenants Report</h1>';
    $pdf->writeHTML($header, true, false, true, false, '');

    // Add content to the PDF
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
    ";
    while ($row = mysqli_fetch_array($search_query)) {
        $fname = $row['tenant_first_name'];
        $lname = $row['tenant_last_name'];
        $email = $row['tenant_email'];
        $html .= "
            <tr>
                <td>$fname</td>
                <td>$lname</td>
                <td>$email</td>
            </tr>
        ";
    }
    $html .= "
            </tbody>
        </table>
    ";
    // Write HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();
    // Output the PDF as a file for download
   
    $pdf->Output('tenantpdf.pdf', 'D'); // 'D' forces download
    $pdf->Output('tenantpdf.pdf', 'I');

    // Stop further execution
    exit;
}
?>
    
</body>
</html>

