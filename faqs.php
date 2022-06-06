<?php
    include('header.php');
?>


<div class="card">
        <h1>Frequently Asked Questions</h1>
        <div class="accordion" >
            <!-- Accordion 1 -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Order Placement Guidelines
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <!-- Accordion 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Delivery & Pickup Guidelines
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>1. When can I expect my orders to be delivered?</strong><br>
                    Currently, we can only do same-day delivery for retail orders (orders by pack). For Wholesale orders, deliveries for this will be subject to our delivery schedule.
                    <br>
                    <strong>2. Where and when can I pick up my orders?</strong><br>
                    Your orders may be picked up at our store at Farmers Market, Araneta Center Cubao, Quezon City 1109 Quezon City, Philippines. Kindly coordinate with your sales representative for your assigned pick up point and pick-up time.
                  </div>
                </div>
              </div>
      </div>

<?php
    include('footer.php');
?>