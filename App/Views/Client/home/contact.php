<style>
  .contactform {
    margin: 0 auto;
    width: 100%;
    height: auto;
  }

  .contact_head {
    margin: 0 auto;
    width: 85%;
    height: 400px;
    background-image: url(public/assets/images/banner_contact.jpg);
    background-size: 100% 100%;
  }
  .contact-mb-4{
    margin: 50px auto;
    width: 70%;
  }
</style>

<div class="contactform">
  <div class="contact_head">
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <h4 class="cau2">"Hành khách cần chúng tôi hỗ trợ trong thời gian sớm? Hãy chủ
    động tìm kiếm giải pháp thông qua các chức năng trên website, ứng dụng di động của Vietnam Airlines, hoặc cung cấp
    thông tin theo mẫu để chúng tôi trợ giúp nhanh hơn!"</h4>
  </div>
  <section class="contact-mb-4">

    <!--Section description-->

    <div class="row">

      <!--Grid column-->
      <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-md-6">
              <div class="md-form mb-0">
                <input type="text" id="name" name="name" class="form-control">
                <label for="name" class="">Your name</label>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6">
              <div class="md-form mb-0">
                <input type="text" id="email" name="email" class="form-control">
                <label for="email" class="">Your email</label>
              </div>
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row">
            <div class="col-md-12">
              <div class="md-form mb-0">
                <input type="text" id="subject" name="subject" class="form-control">
                <label for="subject" class="">Subject</label>
              </div>
            </div>
          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-md-12">

              <div class="md-form">
                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                <label for="message">Your message</label>
              </div>

            </div>
          </div>
          <!--Grid row-->

        </form>

        <div class="text-center text-md-left">
          <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
        </div>
        <div class="status"></div>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
          <li><i class="fas fa-map-marker-alt fa-2x"></i>
            <p>San Francisco, CA 94126, USA</p>
          </li>

          <li><i class="fas fa-phone mt-4 fa-2x"></i>
            <p>+ 01 234 567 89</p>
          </li>

          <li><i class="fas fa-envelope mt-4 fa-2x"></i>
            <p>contact@mdbootstrap.com</p>
          </li>
        </ul>
      </div>
      <!--Grid column-->

    </div>

  </section>
  <!--Section: Contact v.2-->
</div>