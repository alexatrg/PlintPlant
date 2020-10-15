<?php
    require_once( 'sparqlib.php' );

    $kategori = $_GET['kategori'];
    
    $db = sparql_connect( "http://localhost:3030/plant/sparql" );
    if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
    
    sparql_ns("dbo", "http://dbpedia.org/ontology/#");
    sparql_ns("dc", "http://purl.org/dc/elements/1.1#");
    sparql_ns("wo", "https://www.bbc.co.uk/ontologies/wo#");
    
    $sparql = "
    prefix dbo:   <http://dbpedia.org/ontology/>
    prefix wo:    <https://www.bbc.co.uk/ontologies/wo>
    prefix dc:    <http://purl.org/dc/elements/1.1/>
        
        SELECT ?name ?image ?identifier
        WHERE {
            ?x dbo:name ?name.
            ?x dc:image ?image.
            ?x dc:identifier ?identifier.
        }	
    ";
    $result = sparql_query( $sparql ); 
    while($row = sparql_fetch_array( $result )){
        if($row['identifier'] == $kategori){
            echo '<div class="listing-item col-md-3">' ;
                echo '<div class="item-inner">' ;
                    echo '<div class="image">' ;
                        echo '<img src="'; echo $row["image"]; echo '" alt="..." class="img-fluid" style="height:150px; width:260px; object-fit:cover;">';
                    echo '</div>';
                    
                    echo '<div class="info d-flex align-items-end justify-content-between">' ;
                        echo '<div class="content">' ;
                            echo '<a href="item.php?item='; echo $row['name']; echo '">';
                                echo '<h3>'; echo $row["name"]; '</h3>';
                            echo '</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }