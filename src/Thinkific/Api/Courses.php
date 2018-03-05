<?php

namespace Thinkific\Api;

class Courses extends AbstractApi {

    /**
     * @throws ApiException
     */
    public function getAll($page=1, $limit = 25)
    {
        $class_name = preg_split( '/\\\/', get_class( $this ) );

        return json_decode( $this->client->request( [
            "endpoint" => strtolower( array_pop( $class_name ) ),
            "query"       => ['page' => 1, 'limit' => 25],
        ] ) );
    }

    /**
     * @param $id
     *
     * @return object
     */
    public function getById( $id ) {
        $class_name = preg_split( '/\\\/', get_class( $this ) );
        return json_decode( $this->client->request( [
            "endpoint" => strtolower( array_pop( $class_name ) ),
            "id"       => $id,
        ] ) );
    }

}
