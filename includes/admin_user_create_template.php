<form action="createUser.php" method="post">
    <div class="form-group">
      <label>User's Name</label>
      <input type="text" class="form-control" name="name" required minlength="2" >
    </div>
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" required minlength="8" >
    </div>
    <div class="form-group">
      <label>User Level</label>
      <input type="text" class="form-control" name="userLevel" placeholder="Enter 1 for standard user, 2 for manager, 3 for admin" >
    </div>
    <br>
    <hr/>
    <br>
    <div class="form-group row">
        <label class="col-md-3" for="household-age">Age:</label>
        <input type="number" class="form-control col-sm-4" name="household-age" required>
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
        <input type="url" class="form-control col-sm-4" name="household-img" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-cleanliness">Cleanliness:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-cleanliness" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-bedtime">Bedtime:</label>
        <input type="time" class="form-control col-sm-4" name="lifestyle-bedtime" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-food">Food preference:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-food" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="lifestyle-occupation">Occupation:</label>
        <input type="text" class="form-control col-sm-4" name="lifestyle-occupation" required>
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="flatmate-expectation">Flatmate Expectation:</label>
        <input type="text" class="form-control col-sm-4" name="flatmate-expectation">
    </div>
    <div class="form-group row">
        <label class="col-md-3" for="phone-number">Phone number:</label>
        <input type="tel" class="form-control col-md-4" name="phone-number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>