<?php
// We'll be outputting a PDF
header('Content-type: text/csv');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="sample.csv"');

// The PDF source is in original.pdf
readfile('sample.csv');
header("Location: index.php"); /* Redirect browser */
exit();
?>