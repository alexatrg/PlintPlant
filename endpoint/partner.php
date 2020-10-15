<?php
require_once( "sparqlib.php" );

$db = sparql_connect( "http://localhost:3030/usu/sparql" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
sparql_ns("gn", "http://www.geonames.org/ontology#");
sparql_ns("foaf", "http://xmlns.com/foaf/0.1/");
sparql_ns("dc", "http://purl.org/dc/elements/1.1/");

$sparql = 
"
prefix foaf:   <http://xmlns.com/foaf/0.1/>
prefix dc:    <http://purl.org/dc/elements/1.1/>
prefix bio:    <http://purl.org/vocab/bio/0.1/>

    SELECT ?name ?image ?position
    WHERE {
        ?x foaf:name ?name.
        ?x dc:image ?image.
        ?x bio:position ?position.
    } 
";

$result = sparql_query( $sparql ); 
$fields = sparql_field_array( $result );

print "<table class='example_table'>";
print "<tr>";
foreach( $fields as $field )
{
    print "<th>$field</th>";
}
print "</tr>";
while( $row = sparql_fetch_array( $result ) )
{
    print "<tr>";
    foreach( $fields as $field )
    {
        print "<td>$row[$field]</td>";
    }
    print "</tr>";
}
print "</table>";

?>