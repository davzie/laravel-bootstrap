@if( isset($taggable) and $taggable )
    <div class="tab-pane" id="tagging">
        <fieldset>
            <p>Tags can be used to identify or categorise objects. Useful for identifying posts or other objects under their own mini-categories.</p>
            <div class="form-group">
                {{ Form::label( "tags" , 'Object Tags' , array( 'class'=>'col-lg-2 control-label' ) ) }}
                
                <div class="col-lg-10">
                    {{ Form::text( "tags" , Input::old( "tags" , $item->tags_csv ) , array( 'class'=>'form-control' , 'placeholder'=>'Comma Separated Tags' ) ) }}
                    <span class="help-block">Press enter or type a comma after each tag to set it.</span>
                </div>
            </div>
        </fieldset>
    </div>
@endif