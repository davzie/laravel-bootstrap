<?php namespace Davzie\LaravelBootstrap\Uploads;

interface UploadsInterface {

    /**
     * Get all uploads in order of upload
     * @return Uploads
     */
    public function getInOrder();

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

    /**
     * Upload an image to an object type and ID along with key
     * @param  integer $id   The ID of the object to associate with
     * @param  string  $type The class name of the model to associate with
     * @param  string  $key  The key used in the directory heirachy
     * @return void
     */
    public function doUpload( $id , $type , $key );

}