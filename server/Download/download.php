<?php


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=lista25%.csv');


readfile('../../client/createCsv/lista25%.csv');

exit;