<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_header.php"; ?>

<div class="container">
<form class="row g-3 needs-validation" action="contact-us/store" method="post" novalidate>
  <div class="col-md-6 mt-3">
    <label for="validationCustom01" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="validationCustom01" placeholder="Email" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    
  </div>

  <div class="col-md-6 mt-3">
    <label for="validationCustom02" class="form-label">Username</label>
    <input name="username" type="text" class="form-control" id="validationCustom02" placeholder="Username" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-6 mt-3">
   <label class="form-label" for="customFile">Default file input example</label>
   <input name="file" type="file" class="form-control" id="customFile" />
  </div>

  <div class="col-md-6 mt-3">
  <label class="form-label" for="customFile">Gender</label>
  <div class="form-check">
  <input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
        Male
  </label>
</div>
    <div class="form-check">
    <input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
    <label class="form-check-label" for="flexRadioDefault2">
        Famele
    </label>
    </div>
</div>

   <div class="col-md-6 mt-3">
    <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
    </div>
   </div>

  <div class="col-md-6 mt-5">
    <select class="form-select" aria-label="Default select example">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
  </div>

  <div class="col-12">
  <div class="form-check">
  <input name="checkbox" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
    Checkbox
  </label>
   </div>
   </div>
   
  <div class="col-12 mt-4">
    <button class="btn btn-secondary" type="reset">Reset All</button>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>

</form>
</div>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_footer.php"; ?>
