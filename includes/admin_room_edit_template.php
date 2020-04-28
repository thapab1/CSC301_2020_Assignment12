<form action="editRoom.php" method="POST" role="form">
    <div class="form-group row">
        <label class="col-md-3" for="house-img">Room id:</label>
        <input type="text" class="form-control col-sm-4" name="id" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="house-img">House picture:</label>
        <input type="url" class="form-control col-sm-4" name="house-img" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea type="text" class="form-control col-sm-7" rows="4" cols="50" name="description" required></textarea>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="price">Price per month:</label>
        <input type="text" class="form-control col-sm-4" name="price" required>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>