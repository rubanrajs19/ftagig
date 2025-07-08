<?php $currentUrl = current_url(); ?>
<section id="fta-onboarding-wrapper" class="container py-5">
  <!-- Step 1 -->
  <div id="fta-step-1" class="text-center">
    <h2 class="fta-title-1 mb-3 display-4 fw-bold text-purple">Higher Rankings and More Revenue Starts Here.</h2>
    <p class="fta-subtitle-1 mb-4 fs-5">How about a free, no-obligation SEO strategy call for your business with FTA gigs experts?<br>Enter your web address to get started.</p>
    <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
      <input type="text" name="tracked_url" id="tracked_url" class="form-control fta-url-input border border-2 border-purple rounded-3 px-4 py-3" placeholder="Enter your website URL" style="max-width: 340px;">
      <button class="btn btn-warning text-dark fw-semibold px-4 py-3 rounded-3 fta-btn-go">Let's Go &#8594;</button>
    </div>
    <div class="fta-brand-card mt-4 mx-auto p-4 bg-light rounded-3 shadow-sm" style="max-width: 640px;">
      <h5 class="mb-1 fw-bold text-dark text-start">//fta.gig</h5>
      <p class="mb-0 text-muted small text-start">Your dedicated, growth-driven digital solutions partner with a penchant for excellence.</p>
    </div>
  </div>

  <!-- Step 2 -->
  <div id="fta-step-2" class="text-center d-none">
    <h3 class="fta-title-2 mb-4 display-6 fw-bold text-purple">Congrats! You're one step away from your 7-week action plan. How would you prefer to implement it?</h3>
    <div class="d-flex justify-content-center flex-wrap gap-3">
      <button class="btn btn-outline-primary border-2 px-4 py-3 rounded-3 fta-impl-btn" data-choice="self">I'll implement it myself</button>
      <button class="btn btn-outline-primary border-2 px-4 py-3 rounded-3 fta-impl-btn" data-choice="partial">I plan on outsourcing part of it</button>
      <button class="btn btn-outline-primary border-2 px-4 py-3 rounded-3 fta-impl-btn" data-choice="full">I want FTA's team to help me</button>
    </div>
    <div class="fta-brand-note mt-4 mx-auto p-4 bg-light rounded-3 shadow-sm" style="max-width: 640px;">
      <h6 class="mb-1 fw-bold text-dark text-start">//fta.gig</h6>
      <p class="mb-0 text-muted small text-start">This helps us determine how much you should take on in your action plan.</p>
    </div>
  </div>

  <!-- Step 3 -->
  <div id="fta-step-3" class="d-none">
    <h3 class="fta-title-3 text-center mb-4 display-6 fw-bold text-purple">Your results are ready!</h3>
    <p class="fta-subtitle-3 text-center mb-4 fs-5">To get your results and a step-by-step guide on increasing your traffic, just enter in your name and email.</p>
    <form id="fta-results-form" action="<?= base_url('onboarding/submit') ?>" method="post" class="row g-3 justify-content-center" style="max-width: 960px; margin: 0 auto;">
      <input type="hidden" name="page_url" id="page_url" value="<?= esc($currentUrl) ?>">
      <input type="hidden" name="tracked_url_hidden" id="tracked_url_hidden">
      <input type="hidden" name="implementation_choice" id="implementation_choice">

      <div class="col-6 col-md-3">
        <input type="text" name="first_name" class="form-control rounded-3 px-3 py-2" placeholder="First Name">
      </div>
      <div class="col-6 col-md-3">
        <input type="text" name="business_territory" class="form-control rounded-3 px-3 py-2" placeholder="Business Territory">
      </div>
      <div class="col-6 col-md-3">
        <input type="text" name="last_name" class="form-control rounded-3 px-3 py-2" placeholder="Last Name">
      </div>
      <div class="col-6 col-md-3">
        <input type="text" name="marketing_team_size" class="form-control rounded-3 px-3 py-2" placeholder="Marketing team size">
      </div>
      <div class="col-6 col-md-3">
        <input type="email" name="email" class="form-control rounded-3 px-3 py-2" placeholder="Your Email">
      </div>
      <div class="col-6 col-md-3">
        <input type="text" name="monthly_traffic" class="form-control rounded-3 px-3 py-2" placeholder="Monthly Organic Traffic">
      </div>
      <div class="col-6 col-md-3">
        <div class="input-group">
          <span class="input-group-text bg-light px-3">+91</span>
          <input type="tel" name="phone" class="form-control rounded-end-3 px-3 py-2" placeholder="Phone Number">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <input type="text" name="challenges" class="form-control rounded-3 px-3 py-2" placeholder="Challenges">
      </div>
      <div class="col-12 text-start">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="agree" value="yes" id="fta-agree">
          <label class="form-check-label small" for="fta-agree">
            I agree to receive my quiz results and a series of emails that will teach me how to get more traffic. I also have read and agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>.
          </label>
        </div>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-warning text-dark fw-semibold px-5 py-3 rounded-3">Yes, Send me the results</button>
      </div>
    </form>
  </div>
</section>

<script>
  // Step navigation logic
  document.querySelector('.fta-btn-go').addEventListener('click', () => {
    const trackedInput = document.getElementById('tracked_url');
    document.getElementById('tracked_url_hidden').value = trackedInput.value;
    document.getElementById('fta-step-1').classList.add('d-none');
    document.getElementById('fta-step-2').classList.remove('d-none');
  });

  document.querySelectorAll('.fta-impl-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('implementation_choice').value = btn.dataset.choice;
      document.getElementById('fta-step-2').classList.add('d-none');
      document.getElementById('fta-step-3').classList.remove('d-none');
    });
  });

  // AJAX form submission
  document.getElementById('fta-results-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = this;
    const formData = new FormData(form);

    fetch('<?= base_url('onboarding/submit') ?>', {
      method: 'POST',
      body: formData
    }).then(response => response.json())
      .then(data => {
        if (data.success) {
          form.innerHTML = `<div class=\"alert alert-success text-center fw-semibold\">${data.message}</div>`;
        } else {
          let errorHTML = '<div class=\"alert alert-danger\"><ul>';
          for (let field in data.errors) {
            errorHTML += `<li>${data.errors[field]}</li>`;
          }
          errorHTML += '</ul></div>';
          form.insertAdjacentHTML('afterbegin', errorHTML);
        }
      });
  });

  setTimeout(() => {
  const alert = document.querySelector('.alert');
  if (alert) alert.remove();
}, 6000);
</script>


<style>
  .text-purple { color: #8000ff; }
  .border-purple { border-color: #a668ff !important; }
  .fta-url-input::placeholder { color: #aaa; font-weight: 400; }
</style>
