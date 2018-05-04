<?php

namespace Thinkific\Api;

class Users extends AbstractApi {

    public function query( $data ) {
        $class_name = preg_split( '/\\\/', get_class( $this ) );
        return json_decode( $this->client->request( [
            "endpoint"   => strtolower( array_pop( $class_name ) ),
            "httpmethod" => "GET",
            "query" =>  $data
        ]), true );
    }


    public function update( $id, $data ) {
        $class_name = preg_split( '/\\\/', get_class( $this ) );

        $config = [
            "endpoint"   => strtolower( array_pop( $class_name ) ),
            "httpmethod" => "PUT",
            "id"         => $id,
            "body"       => $data
        ] ;

        $result = $this->client->request( $config );

        if( is_object($result) )
        {
            $result = $result->__toString();
        }

        $result = json_decode( $result, true );

        if ( isset( $result["errors"] ) ) {
            throw new ApiException( $result["errors"] );
        } else {
            return $result;
        }

    }

}
