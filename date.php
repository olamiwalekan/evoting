<?php  function date_elements()
                  {
                      $elements = explode(' ', date("Y m d H i s"));

                      $environment = array(

                                              'year'           => $elements[0]
                                             ,'month'          => $elements[1]
                                             ,'day'            => $elements[2]
                                             ,'hour'           => $elements[3]
                                             ,'minute'         => $elements[4]
                                             ,'second'         => $elements[5]

                                             ,'iso_date'       => $elements[0] . '-' . $elements[1] . '-' . $elements[2] . ' (' . $elements[3] . ':' . $elements[4] . ':' . $elements[5] . ')'


                                           );

                      return $environment;
                  }
				  
				  
				  $me = date_elements();
				  echo $me;
				  
				  ?>