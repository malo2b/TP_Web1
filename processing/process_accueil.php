<?php

echo $_POST['timeStart'];

$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');

xmlwriter_start_document($xw, '1.0', 'UTF-8');

// Un premier élément
xmlwriter_start_element($xw, 'tag1');

// Attribut 'att1' pour élément 'tag1'
xmlwriter_start_attribute($xw, 'att1');
xmlwriter_text($xw, 'valueofatt1');
xmlwriter_end_attribute($xw);

xmlwriter_write_comment($xw, 'ceci est un commentaire.');

// Début d'un élément enfant
xmlwriter_start_element($xw, 'tag11');
xmlwriter_text($xw, 'Ceci est du texte, ä');
xmlwriter_end_element($xw); // tag11

xmlwriter_end_element($xw); // tag1


// CDATA
xmlwriter_start_element($xw, 'testc');
xmlwriter_write_cdata($xw, "Ceci est du contenu cdata");
xmlwriter_end_element($xw); // testc

xmlwriter_start_element($xw, 'testc');
xmlwriter_start_cdata($xw);
xmlwriter_text($xw, "test cdata2");
xmlwriter_end_cdata($xw);
xmlwriter_end_element($xw); // testc

// Une instruction de traitement
xmlwriter_start_pi($xw, 'php');
xmlwriter_text($xw, '$foo=2;echo $foo;');
xmlwriter_end_pi($xw);

xmlwriter_end_document($xw);


$file=fopen("fichier.xml", "w");
fwrite($file, xmlwriter_output_memory($xw));
fclose($file);
