<?php
//I created this code to update movies 
$url = 'jason.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data, TRUE); // decode the JSON feed

//I wrote a function that catched all the emotions for every
// frame, then I created a sum array, to be able to catch 
// every feeling after graphic. Like that we will have a sum
//for every feeling

$anger;
$disgust;
$fear;
$joy;
$sadness;
$surprise;

for ($i = 1; $i <= 296; $i++) {
    $anger = array($characters['frames'][$i]['people']['0']['emotions']['anger']);
    $disgust = array($characters['frames'][$i]['people']['0']['emotions']['disgust']);
    $fear = array($characters['frames'][$i]['people']['0']['emotions']['fear']);
    $joy = array($characters['frames'][$i]['people']['0']['emotions']['joy']);
    $sadness = array($characters['frames'][$i]['people']['0']['emotions']['sadness']);
    $surprise = array($characters['frames'][$i]['people']['0']['emotions']['surprise']);

    
}
$sky_anger = array_sum($anger);
$sky_disgust = array_sum($disgust);
$sky_fear = array_sum($fear);
$sky_joy = array_sum($joy);
$sky_sadness = array_sum($sadness);
$sky_surprise = array_sum($surprise);
//echo $sky_anger . "\n"; 
//echo $sky_disgust . "\n";
//echo $sky_fear . "\n";
//echo $sky_joy . "\n";
//echo $sky_sadness . "\n";
//echo $sky_surprise . "\n";

//Then I created a function to be able to transform the 
//xml file into an array to be able to extract 
//movies and images from our xml file/ films.
$xmlfile = 'films.xml';
$xmlparser = xml_parser_create();

// open a file and read data
$fp = fopen($xmlfile, 'r');
$xmldata = fread($fp, 4096);
xml_parse_into_struct($xmlparser,$xmldata,$values);
xml_parser_free($xmlparser);
//print_r($values);

$movie1=($values["11"]["value"]);
$img1 =($values['13']['value']);
// print_r($img1);
$movie2= ($values['20']['value']);
$img2= ($values['22']['value']);
$movie3 = ($values['29']['value']);
$img3 = ($values['31']['value']);
$movie4 = ($values['38']['value']);
$img4 = ($values['40']['value']);
$movie5 = ($values['47']['value']);
$img5 = ($values['49']['value']);
$movie6 = $values['56']['value']; 
$img6 = $values['58']['value'];


//$mood = [$sky_anger, $sky_disgust, $sky_fear, $sky_joy, $sky_sadness, $sky_surprise];
if (($sky_anger > $sky_disgust)&&($sky_anger > $sky_fear)&&($sky_anger > $sky_joy)&&($sky_anger > $sky_sadness)&&($sky_anger > $sky_surprise))
    
{echo'<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img6" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie6" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img5" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie5" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img4" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie4" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img3" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie3" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img2" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie2" .'</p>
                    </div>
                </div>
            </div>
            
';

} elseif (($sky_disgust > $sky_anger)&&($sky_disgust > $sky_fear)&&($sky_disgust > $sky_joy)&&($sky_disgust > $sky_sadness)&&($sky_disgust > $sky_surprise))
{echo '<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img3" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie3" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img5" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie5" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img1" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie1" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img2" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie2" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img6" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie6" .'</p>
                    </div>
                </div>
            </div>
            
';
} elseif (($sky_fear > $sky_anger)&&($sky_fear > $sky_disgust)&&($sky_fear > $sky_joy)&&($sky_fear > $sky_sadness)&&($sky_fear > $sky_surprise))
{echo '<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img1" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie1" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img2" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie2" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img3" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie3" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img4" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie4" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img5" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie5" .'</p>
                    </div>
                </div>
            </div>
            
';

} elseif (($sky_joy > $sky_anger)&&($sky_joy > $sky_disgust)&&($sky_joy > $sky_fear)&&($sky_joy > $sky_sadness)&&($sky_joy > $sky_surprise))
{echo '<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img4" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie4" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img3" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie3" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img1" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie1" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img6" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie6" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img2" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie2" .'</p>
                    </div>
                </div>
            </div>
            
';
} elseif (($sky_sadness > $sky_anger)&&($sky_sadness > $sky_disgust)&&($sky_sadness > $sky_joy)&&($sky_sadness > $sky_fear)&&($sky_sadness > $sky_surprise))
{echo '<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img2" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie2" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img4" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie4" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img6" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie6" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img1" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie1" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img3" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie3" .'</p>
                    </div>
                </div>
            </div>
            
';
} elseif (($sky_surprise > $sky_anger)&&($sky_surprise > $sky_disgust)&&($sky_surprise > $sky_joy)&&($sky_surprise > $sky_sadness)&&($sky_surprise > $sky_fear))
{echo '<div class="row col-md-12 " id="movies">
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image1" src="'. "$img4" .' "  style=" height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title1" style="text-align: center">'. "$movie4" .'</p>
                        
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image2" src="'. "$img1" .' "   style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title2" style="text-align: center">'. "$movie1" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img4" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie4" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img5" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie5" .'</p>
                    </div>
                </div>
            </div>
            <!-- First movie-->
            <div class="col-md-2 ">
                <div class="thumbnail">
                    <img id="image3" src="'. "$img6" .' " style="height: 150px;"><h2 id="nocontent1"></h2>
                    <div class="caption">
                        <p id="title3" style="text-align: center">'. "$movie6" .'</p>
                    </div>
                </div>
            </div>
            
';}

?>

