<?php namespace Davzie\LaravelBootstrap\Abstracts;
use Illuminate\Support\MessageBag;
use Validator;

abstract class ValidatorBase
{

    /**
     * The rules for the validation
     * @var array
     */
    protected $rules;

    /**
     * The messages generated
     * @var MessageBag
     */
    protected $messages;

    /**
     * The data to validate against
     * @var array
     */
    protected $data;

    /**
     * Construct shit
     * @param array $data The array of data to validate against
     */
    public function __construct( $data )
    {
        $this->data = $data;
        $this->messages = new MessageBag();
    }

    /**
     * Run the validation on the rules in the array
     * @return boolean
     */
    public function passes()
    {
        $validation = Validator::make( $this->data , $this->rules );

        if ( $validation->fails() ){
            foreach( $validation->messages()->all() as $error ){
                $this->messages->add( 'error' , $error );
            }
            return false;
        }

        return true;
    }

    /**
     * Return the MessageBag Instance
     * @return MessageBag
     */
    public function messages(){
        return $this->messages;
    }

}