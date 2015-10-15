<?php

$Flights = $GLOBALS["flights"];


?>

<div id="main-top-booking">
                    
                    <div id="main-top-booking">
                    
                    <div id="main-top-overlay-booking">
<form>
<select name="element">
<?php

    try
    {

        /*** loop over the results ***/
        foreach($Flights as $Flight)
        {
            /*** create the options ***/
            echo '<option value="'.$Flight['TourType'].'"';
            if($Flight['TourType']=='Geiranger')
            {
                echo ' selected';
                
            }
            echo '>'. $Flight['TourType'] . '</option>'."\n";
            echo '>'. $Flight['FlightDate'] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }


                            
                 