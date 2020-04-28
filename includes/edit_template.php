<form action="edit.php?id=<? echo $id; ?>" method="POST" role="form">
    <!-- <div class="form-group row">
        <label class="col-md-3" for="household-name">Name:</label>
        <input type="text" class="form-control col-sm-4" name="household-name" 
        value="<.?= //$apartments[$id]['household-name'] ?>" required minlength="2">
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="household-age">Age:</label>
        <input type="number" class="form-control col-sm-4" name="household-age" 
        value="<.?= //$apartments[$id]['household-age'] ?>" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="household-sex">Sex:</label>
        <select class="form-control col-sm-4" name="household-sex">
            <option selected>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="household-img">Profile picture:</label>
        <input type="url" class="form-control col-sm-4" name="household-img" 
        value="<.?= $apartments[$id]['household-img'] ?>" required>
    </div> -->
    <div class="form-group row">
        <label class="col-md-3" for="house-img">House picture:</label>
        <input type="url" class="form-control col-sm-4" name="house-img" 
        value="<?= $room->picture ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea type="text" class="form-control col-sm-7" rows="4" cols="50" name="description" required><?= $room->description ?></textarea>
    </div>
    <!-- <div class="form-group row">
        <label class="col-md-3" for="lifestyle-cleanliness">Cleanliness:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-cleanliness" 
        value="<.?= $apartments[$id]['lifestyle-cleanliness'] ?>" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-bedtime">Bedtime:</label>
        <input type="time" class="form-control col-sm-4" name="lifestyle-bedtime" 
        value="<.?= $apartments[$id]['lifestyle-bedtime'] ?>" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-food">Food preference:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-food" 
        value="<.?= $apartments[$id]['lifestyle-food'] ?>" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-occupation">Occupation:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-occupation" 
        value="<.?= $apartments[$id]['lifestyle-occupation'] ?>" required>
    </div>
    <div class="form-group">
        <label for="flatmate-expectation">Flatmate Expectation:</label>
        <textarea type="text" class="form-control col-sm-7" rows="4" cols="50" name="flatmate-expectation" required><.?= $apartments[$id]['flatmate-expectation'] ?></textarea>
    </div> -->
    <div class="form-group row">
        <label class="col-md-3" for="price">Price per month:</label>
        <input type="text" class="form-control col-sm-4" name="price" 
        value="<?= $room->price ?>" required>
    </div>
    <!-- <div class="form-group row">
        <label class="col-md-3" for="phone-number">Phone number:</label>
        <input type="tel" class="form-control col-md-4" name="phone-number" 
        value="<.?= $apartments[$id]['phone-number'] ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
    </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>