<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_header.php"; ?>

<div class="container">
<form class="row g-3 needs-validation" action="contact-us/store" method="post" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" name="name" class="form-control" id="validationCustom01" value="John" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" name="surename" class="form-control" id="validationCustom02" value="Doe" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
    </div>
   </div>

  <div class="col-md-3">
   <label class="form-label" for="customFile">Default file input example</label>
   <input name="file" type="file" class="form-control" id="customFile" />
  </div>

  <div class="col-md-3">
  <label class="form-label" for="customFile">Gender</label>
  <div class="form-check">
  <input name="gender" value="male" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
  <label class="form-check-label" for="flexRadioDefault1">
        Male
  </label>
  </div>
      <div class="form-check">
      <input name="gender" value="female" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
      <label class="form-check-label" for="flexRadioDefault2">
          Famele
      </label>
      </div>
  </div>

  <div class="col-md-3">
    <select class="form-select" name="options" aria-label="Default select example">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="agreement" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>

  <div class="col-12 mt-4">
    <button class="btn btn-secondary" type="reset">Reset All</button>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>

</form>
</div>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_footer.php"; ?>
