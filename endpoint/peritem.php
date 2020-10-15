<?php
    require_once( 'sparqlib.php' );

    $item = $_GET['item'];
    
    $db = sparql_connect( "http://localhost:3030/plant/sparql" );
    if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
    
    sparql_ns("dbo", "http://dbpedia.org/ontology/#");
    sparql_ns("dc", "http://purl.org/dc/elements/1.1#");
    sparql_ns("wo", "https://www.bbc.co.uk/ontologies/wo#");
    
    $sparql = "
    prefix dbo:   <http://dbpedia.org/ontology/>
    prefix wo:    <https://www.bbc.co.uk/ontologies/wo>
    prefix dc:    <http://purl.org/dc/elements/1.1/>

    SELECT ?image ?name ?latinName ?class ?family ?genus ?kingdom ?order ?description
    WHERE {
        ?x dc:image ?image.
        ?x dbo:name ?name.
        ?x dbo:latinName ?latinName.
        ?x wo:class ?class.
        ?x wo:family ?family.
        ?x wo:genus ?genus.
        ?x wo:kingdom ?kingdom.
        ?x wo:order ?order.
        ?x dc:description ?description.
    }	
    ";
    $result = sparql_query( $sparql ); 
    while($row = sparql_fetch_array( $result )){
        if($row['name'] == $item){
            echo '<div class="col-md-4">';
                echo '<img src="'; echo $row["image"]; echo '" alt="..." class="img-fluid" style="height:300px; width:300px; object-fit:cover;">';
            echo '</div>';
            
            echo '<div class="col-md-8">';
                echo '<header>';
                    echo '<h4 class="has-lines" style="color: green;">';
                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Nama';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['name'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Nama Latin';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['latinName'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Kelas';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['class'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Famili';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['family'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Genus';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['genus'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Kingdom';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['kingdom'];
                            echo '</span>';
                            echo '<br>' ;
                        echo '</div>';

                        echo '<div class="row">';
                            echo '<div class="col-3">';
                                echo 'Ordo';
                            echo '</div>';
                            echo '<div class="col-1">';
                                echo ':';
                            echo '</div>';
                            echo '<span style="color: black;">';
                                echo $row['order'];
                            echo '</span>';
                            echo '<br>' ;
                    echo'</h4>';

                    echo '<br>' ;

                    echo '<p class="lead">'; 
                        echo $row['description'];
                    echo '</p>';
                echo '</header>';
            echo '</div>';
        }
    }