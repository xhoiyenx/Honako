<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 09/03/2016
 *
 * Domain: 
 * Manager
 *
 * Type:
 * Template
 * 
 * Description:
 * Media list, loaded by ajax
 */
?>
@if ( count($media) > 0 )
  @foreach( $media as $file )
  <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
    <div class="thmb">
      <div class="btn-group fm-group">
        <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pull-right fm-menu" role="menu">
          <li><a href="{{ route('manager.catalog.product.media') }}" data-id="{{ $file->id }}" data-action="update" class="btn-form"><i class="fa fa-pencil"></i> Edit</a></li>
          <li><a href="{{ route('manager.catalog.product.media') }}" data-id="{{ $file->id }}" data-action="delete" data-callback="loadMedia" title="{{ $file->name }}" class="btn-delete"><i class="fa fa-trash-o"></i> Delete</a></li>
        </ul>
      </div><!-- btn-group -->
      <div class="thmb-prev">
        <img src="{{ app('media')->getMedia($file->link, $file->mime ) }}" class="img-responsive" alt="" />
      </div>
    </div><!-- thmb -->
  </div><!-- col-xs-6 -->
  @endforeach
@endif