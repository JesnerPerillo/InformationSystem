<?php
require_once "connect.php";
require_once "fpdf/fpdf.php";

$result = "SELECT ID, Date, Department, Name, Status, Evaluation FROM report ORDER by ID";
$sql = $conn->query($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 11);

$pdf->Cell(170, 10, 'Faculty Report', 0, 1, 'C');
$pdf->Ln();

$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Date', 1);
$pdf->Cell(30, 10, 'Department', 1);
$pdf->Cell(40, 10, 'Name', 1);
$pdf->Cell(30, 10, 'Status', 1);
$pdf->Cell(30, 10, 'Evaluation', 1);
$pdf->Ln();

while ($row = $sql->fetch_object()) {
    $id = $row->ID;
    $Date = $row->Date;
    $Department = $row->Department;
    $Name = $row->Name;
    $Status = $row->Status;
    $Evaluation = $row->Evaluation;

    $pdf->Cell(20, 10, $id, 1);
    $pdf->Cell(30, 10, $Date, 1);
    $pdf->Cell(30, 10, $Department, 1);
    $pdf->Cell(40, 10, $Name, 1);
    $pdf->Cell(30, 10, $Status, 1);
    $pdf->Cell(30, 10, $Evaluation, 1);
    $pdf->Ln();
}

$pdf->Output();
?>
