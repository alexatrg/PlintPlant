<?php
    require_once( 'sparqlib.php' );
    
    $db = sparql_connect( "http://localhost:3030/plant/sparql" );
    if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
    
    sparql_ns("dbo", "http://dbpedia.org/ontology/#");
    sparql_ns("dc", "http://purl.org/dc/elements/1.1#");
    sparql_ns("wo", "https://www.bbc.co.uk/ontologies/wo#");
    
    $sparql = "
    prefix dbo:   <http://dbpedia.org/ontology/>
    prefix wo:    <https://www.bbc.co.uk/ontologies/wo>
    prefix dc:    <http://purl.org/dc/elements/1.1/>
    
        SELECT ?name ?image
        WHERE {
            ?x dbo:name ?name.
            ?x dc:image ?image.
            FILTER NOT EXISTS{?x dbo:latinName ?latin}
        } 	
    ";
    $result = sparql_query( $sparql ); 
    while($row = sparql_fetch_array( $result )){
        // Item
        echo '<div class="item listing-item">' ;
            echo '<div class="item-inner">' ;
                // Gambar
                echo '<div class="image">' ;
                    echo '<img src="'; echo $row["image"]; echo '" alt="..." class="img-fluid" style="height:250px; object-fit:cover;">';
                echo '</div>';
                echo '<div class="info d-flex align-items-end justify-content-between">' ;
                    echo '<div class="content">' ;
                        echo '<a href="#">';
                            echo '<h3>'; echo $row["name"]; '</h3>';
                        echo '</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
}