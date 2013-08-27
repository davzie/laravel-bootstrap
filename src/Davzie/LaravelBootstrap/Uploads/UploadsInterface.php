<?php namespace Davzie\LaravelBootstrap\Uploads;

interface UploadsInterface {

    /**
     * Delete an upload by it's database ID
     * @param  mixed[integer|array]     $id     The database ID
     * @return boolean                          True if deleted
     */
    public function deleteById( $id );

    /**
     * Delete an upload by it's type and link ID
     * @param  integer     $id     The link record ID
     * @param  integer     $type   The link type
     * @return boolean             True if deleted
     */
    public function deleteByIdType( $id , $type );

    /**
     * Set the order of the ID's from 0 to the array length passed in
     * @param array $ids The Upload IDs
     */
    public function setOrder( $ids );

}