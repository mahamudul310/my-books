<?php  
  global $wpdb;
  $all_books = $wpdb->get_results(
    $wpdb->prepare(
      "SELECT * FROM " .my_book_table(). " ORDER BY id DESC", ""
    ),ARRAY_A
  );
 // print_r($all_books);
  
?>
<div class="container">
    <div class="row">
        <div class="alert alert-info">
            <h5>My Book List</h5>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">My Book List</div>
            <div class="panel-body">
                <table id="my-book" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Sr No</th>
                          <th>Name</th>
                          <th>Author</th>
                          <th>About Us</th>
                          <th>Book Image</th>
                          <th>Created At</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <?php if(count($all_books) > 0){
                    $i = 1;
                    foreach ($all_books as $key => $value) {
                      ?>
                      <tbody>
                      <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['author']; ?></td>
                          <td><?php echo $value['about']; ?></td>
                          <td><img src="<?php echo $value['book_image']; ?>" style="height:80px; width:80px;" ></td>
                          <td><?php echo $value['created_at']; ?></td>
                          <td>
                            <a class="btn btn-info btn-xs" href="javascript:void(0)">Edit</a>
                            <a class="btn btn-danger btn-xs" href="javascript:void(0)">Delete</a>
                          </td>
                      </tr>
                  </tbody>
                   <?php }
                  } ?>
                  <tfoot>
                      <tr>
                          <th>Sr No</th>
                          <th>Name</th>
                          <th>Author</th>
                          <th>About Us</th>
                          <th>Book Image</th>
                          <th>Created At</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
              </table>
            </div>
        </div>
    </div>
</div>