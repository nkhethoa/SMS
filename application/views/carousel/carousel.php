<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="panel_Carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
              <div class="item active">
                <img src=<?php echo base_url("assets/images/grad.jpg") ?> alt="" style="width:100%;">
            </div>

            <div class="item">
                <img src=<?php echo base_url("assets/images/banaschool.jpg") ?> alt="" style="width:100%;">
            </div>
            
            <div class="item">
                <img src=<?php echo base_url("assets/images/school.jpg") ?> alt="" style="width:100%;">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
      </div>

