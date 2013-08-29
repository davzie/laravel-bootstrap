<?php namespace Davzie\LaravelBootstrap\Utilities;
use Davzie\LaravelBootstrap\Uploads\Uploads;
use Illuminate\Support\Facades\File;
use Intervention\Image\Image;

class ImgHelper {

    /**
     * The upload object to work with
     * @var Upload
     */
    protected $uploadObject;

    /**
     * The width of the image
     * @var integer
     */
    public $width;

    /**
     * The height of the image
     * @var integer
     */
    public $height;

    /**
     * Crop the image?
     * @var boolean
     */
    public $crop = true;

    /** 
     * Construct something man!
     */
    public function __construct( Uploads $uploadObject ){
        $this->uploadObject = $uploadObject;
    }

    /**
     * Size up the current record and return the resulting filename
     * @return string           The sized up stored resulting image
     */
    public function get(){
        // Check to see if we're cached already, if not we need to resize the image accordingly
        if( $this->isCached() === false )
            $this->resize();

        return $this->getPublicPathFilename();
    }

    /**
     * Determine whether or not a cache exists for this item and the required dimensions
     * @return boolean True if there is a cached version of this image available
     */
    private function isCached(){
        if( File::exists( $this->getPathFilename() ) )
            return true;

        return false;
    }

    /**
     * Resize the image
     * @return boolean
     */
    private function resize(){
        $filename = $this->uploadObject->getAbsoluteSrc();
        $extension = $this->uploadObject->extension;

        // Does the original file exist? If not return false
        if( !File::exists( $filename ) )
            return false;

        // Check to see our directory for caching exists, if it doesn't recursively create it
        if( !File::isDirectory( $this->getPath() ) )
            File::makeDirectory( $this->getPath() , 0777 , true );

        $img = Image::make($filename);
        if( $this->crop )
            $img->grab( $this->width , $this->height )->save( $this->getPathFilename() );
        else
            $img->resize( $this->width , $this->height , true , true )->resizeCanvas( $this->width , $this->height , null , false , 'ffffff' )->save( $this->getPathFilename() );

        return true;
    }

    /**
     * Strip the extensions from the filename and just return the filename, we need this to append stuff
     * @param  string $filename The filename to strip
     * @return string
     */
    private function stripExtensions( $filename ){
        return preg_replace("/\\.[^.\\s]{3,4}$/", "", $filename);
    }

    /**
     * Return the exact place we should either find or put the image
     * @return string
     */
    private function getPathFilename(){
        return $this->getPath().$this->getFilename();
    }

    /**
     * Get the resulting path that we want to send back to the users
     * @return string
     */
    private function getPublicPathFilename(){
        return $this->getPublicPath().$this->getFilename();
    }

    /**
     * Get just the path to the cached area
     * @return string
     */
    private function getPath(){
        return $this->uploadObject->getAbsolutePath().'cached/';
    }

    /**
     * Get the public path for the user
     * @return string
     */
    private function getPublicPath(){
        return $this->uploadObject->getPath().'/cached/';
    }

    /**
     * Get the filename that we should have
     * @return string
     */
    private function getFilename(){
        $filename = $this->stripExtensions( $this->uploadObject->filename );
        $extension = $this->uploadObject->extension;
        $crop = $this->crop === true ? '_crop' : '';
        return $filename.'_'.$this->width.'_'.$this->height.$crop.'.'.$extension;
    }

}