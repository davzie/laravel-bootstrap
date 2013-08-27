<ul class="nav nav-tabs">
    <li><a href="#main" data-toggle="tab">Main</a></li>
    @if( isset($uploadable) and $uploadable )
        <li><a href="#images" data-toggle="tab">Images</a></li>
    @endif
    @if( isset($taggable) and $taggable )
        <li><a href="#tagging" data-toggle="tab">Tags</a></li>
    @endif
</ul>