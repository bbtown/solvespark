<?php

  // load rethinkdb php library
  require_once __DIR__.'/vendor/autoload.php';

  $conn = r\connect('34.239.185.58');
  //$result = r\db("web")->table('problems')->run($conn);
  //foreach ($result as $doc) {
  //  print_r($doc);
  //}

  $prob_desc = $_POST['prob_desc']; 
  $prob_more = $_POST['prob_more']; 
  $perspective = $_POST['perspective'];  
  $url = $_POST['url'];
  $tags = $_POST['tags'];
  $prob_cat = $_POST['prob_cat'];
  $affect_desc = $_POST['affect_desc'];
  $affect_num = $_POST['affect_num'];
  $geo_loc = $_POST['geo_loc'];
  $spec_loc = $_POST['spec_loc'];
  $factors= $_POST['factors'];
  $problem_ts = time();//Use UTC time for easier parsing
//  $prob_cat2 = $_POST['prob_cat2'];
//  $problemID = $_['id'];

  $document = Array('ProblemDescription' => $prob_desc,
                    'MoreDescription' => $prob_more,
                    'Perspective' => $perspective,
                    'URL' => $url,
		    'Tags' => $tags,
		    'ProblemCategory' => $prob_cat,
		    'AffectedDescription' => $affect_desc,
		    'AffectedNumber' => $affect_num,
		    'GeographicLocation' => $geo_loc,
		    'SpecificLocation' => $spec_loc,
		    'Factors' => $factors,
		    'ProblemTS' => $problem_ts);
   //		    'ProblemCategory2' => $prob_cat2);
   //		    'id' => $problemID);  

  $result = r\db("web")->table('problems')->insert($document)->run($conn);
  echo "Thank you for submitting your problem!";
?>
