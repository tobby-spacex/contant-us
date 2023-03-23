<?php session_start(); ?>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_header.php"; ?>

<div class="container contact-us">

<figure class="text-center mb-0 mt-3">
    <blockquote class="blockquote">
      <p class="pb-3">
        <i class="fas fa-quote-left fa-xs text-primary"></i>
        <span class="lead font-italic">Many of life's failures are people who did not realize how close they were to success 
          when they wanted to contact us, but never got in touch</span>
        <i class="fas fa-quote-right fa-xs text-primary"></i>
      </p>
    </blockquote>
    <figcaption class="blockquote-footer mb-0">
        Unknown Author
    </figcaption>
</figure>

<form class="row g-3 needs-validation" action="contact-us/store" method="post" enctype="multipart/form-data" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" name="name" class="form-control" id="validationCustom01" required>
    <div class="valid-feedback">
      Looks good!
    </div>
      <div class="invalid-feedback">
        Cannot be an empty name
      </div>
    <?php if(!empty($_SESSION['errors']['name_error'])): ?>
      <div class="alert alert-danger" role="alert">
         Please, insert valid name
      </div>
    <?php endif; ?>  
  </div>

  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" name="surename" class="form-control" id="validationCustom02" required>
    <div class="invalid-feedback">
        Cannot be an empty surname
      </div>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="inputGroupPrepend" required>
      <div class="valid-feedback">
         Looks good!
      </div>

      <div class="invalid-feedback">
        Cannot be an empty email
      </div>
      <?php if(!empty($_SESSION['errors']['email_error'])): ?>
        <div class="alert alert-danger" role="alert">
         Please, insert valid email
      </div>
    <?php endif; ?>  
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea name="comment" class="form-control" rows="5" id="comment" required></textarea>
      <div class="invalid-feedback">
        Please let us know what's on your mind.
      </div>
    </div>
   </div>

  <div class="col-md-3">
   <label class="form-label" for="customFile">Default file input example</label>
   <input name="file" type="file" class="form-control" id="file" />
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
    <label>Location: </label>
    <select class="form-select" name="location" aria-label="Default select example">
    <option value="Moscow">Moscow</option>
    <option value="Saint Petersburg">Saint Petersburg</option>
    <option value="Ulyanovsk">Ulyanovsk</option>
    <option value="Other">Other</option>
    </select>
  </div>

  <div class="col-12">
  <div class="col-md-6 paragraph-content">
    <p class="terms-paragraph">I agree that my data can be processed and stored in the company's database</p>
  </div>

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

<?php session_destroy(); ?>

<?php include_once  trim(str_replace("public", "", VIEW_PATH)) . "/app/views/partials/_footer.php"; ?>
