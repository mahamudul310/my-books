<?php wp_enqueue_media(); ?>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Panel Heading</div>
      <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required id="name" name="name" placeholder="Enter Name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required id="author" name="author" placeholder="Enter Author">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="col-sm-10">
              <textarea name="about" id="about" placeholder="Enter About" class="form-control"></textarea>
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-sm-2" for="image">Upload Book Image:</label>
            <div class="col-sm-10">
              <input type="button" class="btn btn-info" id="btn-upload" value="Upload Image" name="image" />
               <span id="show-image"></span>
              <input type="hidden" id="image_name" name="image" />
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>