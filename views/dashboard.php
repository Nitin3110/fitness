<?php
$user = get_user_by_mail($_SESSION['email']);
// pr($user);
?><header class="header">
    <div class="container">
      <div class="teacher-name" style="padding-top:20px;">

        <div class="row" style="margin-top:0px;">
        <div class="col-md-9">
          <h2 style="font-size:38px"><strong><?= $user[0]['first_name'] ?> <?= $user[0]['last_name'] ?></strong></h2>
        </div>
        <div class="col-md-3">
          <div class="button" style="float:right;">
            <a href="#" class="btn btn-outline-success btn-sm">Edit Profile</a>
          </div>
        </div>
        </div>
      </div>

      <div class="row" style="margin-top:20px;">
        <div class="col-md-3"> <!-- Image -->
          <a href="#"> <img class="rounded-circle" src="images/kamal.jpg" alt="<?= $user[0]['first_name'] ?>" style="width:200px;height:200px"></a>
        </div>

        <div class="col-md-6"> <!-- Rank & Qualifications -->
          <h5 style="color:#3AAA64">Associate Professor, <small>Dept. of CSE, Jatiya Kabi Kazi Nazrul Islam University</small></h5>
          <p>PhD (On study at BUET), M.Sc. in research on ICT(UPC, Spain), M.Sc. in research on ICT(UCL, Belgium).</p>
          <p>Address: Namapara, Trishal, Mymensingh</p>
        </div>

        <div class="col-md-3 text-center"> <!-- Phone & Social -->
          <span class="number" style="font-size:18px">Phone:<strong>+<?= $user[0]['mobile'] ?></strong></span>
          <div class="button" style="padding-top:18px">
            <a href="" class="btn btn-outline-success btn-block">Extra button</a>
          </div>
          <div class="social-icons" style="padding-top:18px">
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
            </span></a>
            <a href="#">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x" style="color:#3AAA64"></i>
              <i class="fa fa-slideshare fa-stack-1x fa-inverse"></i>
            </span></a>

          </div>
        </div>
      </div>
    </div>
  </header>