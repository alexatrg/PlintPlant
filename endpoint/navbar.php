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
    
        SELECT ?name
        WHERE {
            ?x dbo:name ?name.
            FILTER NOT EXISTS{?x dbo:latinName ?latin}
        } 	
    ";
    $result = sparql_query( $sparql ); 
    while($row = sparql_fetch_array( $result )){
        // echo '<a href="'; echo $row['name']; echo '.php" class="dropdown-item">';
        echo '<a href="kategori.php?kategori='; echo $row['name']; echo '" class="dropdown-item">';
        echo $row['name'];
        echo '</a>';
}