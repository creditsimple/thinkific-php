<?php

namespace Thinkific\Api;

class Enrollments extends AbstractApi {

    public function getAll()
    {
        $class_name = preg_split( '/\\\/', get_class( $this ) );

        return json_decode( $this->client->request( [
            "endpoint" => strtolower( array_pop( $class_name ) ),
            "query"       => ['page' => 1, 'limit' => 25],
        ] ) );
    }

    public function add( $data ) {
        $class_name = preg_split( '/\\\/', get_class( $this ) );
        return json_decode( $this->client->request( [
            "endpoint"   => strtolower( array_pop( $class_name ) ),
            "httpmethod" => "POST",
            "body"      => $data
        ] ), true );
    }

    public function query( $data ) {
        $class_name = preg_split( '/\\\/', get_class( $this ) );
        return json_decode( $request = $this->client->request( [
            "endpoint"   => strtolower( array_pop( $class_name ) ),
            "httpmethod" => "GET",
            "query"      => $data
        ] ), true );
    }

}
