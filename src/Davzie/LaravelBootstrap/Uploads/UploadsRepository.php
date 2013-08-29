<?php namespace Davzie\LaravelBootstrap\Uploads;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;
use Davzie\LaravelBootstrap\Utilities\ImgHelper;
use Config, File, Input;

class UploadsRepository extends EloquentBaseRepository implements UploadsInterface
{

    /**
     * Get all uploads in order of upload
     * @return Uploads
     */
    public function getInOrder()
    {
        return $this->orderBy('order','asc')->get();
    }

    /**
     * Construct Shit
     * @param Uploads $uploads
     */
    public function __construct( Uploads $uploads )
    {
        $this->model = $uploads;
    }

    /**
     * Set the order of the ID's from 0 to the array length passed in
     * @param array $ids The Upload IDs
     */
    public function setOrder( $ids ){

        // Don't do anything if nothing is passed in
        if(!$ids)
            return;

        // Set single integer to arrays
        if( !is_array($ids) )
            $ids = [ $ids ];

        // Loop through each id and update the database accordingly
        foreach($ids as $order=>$id){
            $this->model->where('id','=',$id)->update( [ 'order'=>$order ] );
        }

        return true;
    }

    /**
     * Delete an upload by it's database ID
     * @param  mixed[integer|array]     $id     The database ID
     * @return boolean                          True if deleted
     */
    public function deleteById( $id ){
        if( !is_array($id) )
            $id = array( $id );

        // Delete The Items From The File Store
        $this->physicallyDelete( $this->model->whereIn( 'id' , $id )->get() );

        // Now delete the items from the database
        $this->model->whereIn( 'id' , $id )->delete();

        return true;
    }

    /**
     * Delete an upload by it's type and link ID
     * @param  integer     $id     The link record ID
     * @param  integer     $type   The link type
     * @return boolean             True if deleted
     */
    public function deleteByIdType( $id , $type ){
        // Delete the images directory for these types / links
        $base_path = Config::get('laravel-bootstrap::app.upload_base_path');
        $toDelete  = public_path().'/'.$base_path.$type.'/'.$id;
        File::deleteDirectory( $toDelete );

        // Now return the result of deleting all the records that match
        return $this->model->where('path','=',$type)->where('uploadable_id','=',$id)->delete();
    }

/**
     * Physically delete all files related to the uploads collection passed in
     * @return boolean
     */
    private function physicallyDelete( $uploads ){

        // Return false if we have no uploads passed in
        if( !$uploads )
            return false;

        // Loop through each upload object
        foreach($uploads as $upload){
            // If the original file actually exists that is specified in the DB, then lets delete if
            if( File::isFile( $upload->getAbsoluteSrc() ) )
                File::delete( $upload->getAbsoluteSrc() );

            // Setup the caching path
            $cache = $upload->getAbsolutePath().'/cached/';

            if( File::isDirectory( $cache ) ){
                // Loop through each item in the cache for this particular product ID
                foreach( File::files($cache) as $cacheItem ){
                    // We want to remove the extension and the . to see if the thing exists
                    $filename = $this->model->stripExtensions( $upload->filename );

                    // If the path we have actually contains the filename we can remove it, given
                    // that the path is always a unique SHA1 checksum we shouldn't have any conflicts,
                    // but if we did it wouldn't matter beacuse it's just a cache
                    if( str_contains( $cacheItem , $filename ) )
                        File::delete($cacheItem);
                }
            }
        }

        return true;
    }

    /**
     * Upload an image to an object type and ID along with key
     * @param  integer $id   The ID of the object to associate with
     * @param  string  $type The class name of the model to associate with
     * @param  string  $key  The key used in the directory heirachy
     * @return void
     */
    public function doUpload( $id , $type , $key )
    {

        $base_path = Config::get('laravel-bootstrap::app.upload_base_path');
        // Setup some useful variables
        $randomKey  = sha1( time() . microtime() );
        $extension  = Input::file('file')->getClientOriginalExtension();
        $filename   = $randomKey.'.'.$extension;
        $path       = '/'.$base_path.'/' . $key . '/' . $id;

        // Move the file and determine if it was succesful or not
        $upload_success = Input::file('file')->move( public_path() . $path , $filename );

        // Do our model insertion activity
        if( $upload_success ){

            $now = date('Y-m-d H:i:s');
            $data = [
                'uploadable_type'   =>  $type,
                'uploadable_id'     =>  $id,
                'path'              =>  $key,
                'filename'          =>  $filename,
                'extension'         =>  $extension,
                'order'             =>  999,
                'created_at'        =>  $now,
                'updated_at'        =>  $now
            ];
            $this->getModel()->insert( $data );
            // Insert the data into the uploads model
            return true;
        }

        return false;
    }

}