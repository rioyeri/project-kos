<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-9 main-chart">
        <div id="clockDisplay" class="container"></div>
      </div>
      <!-- /col-lg-9 END SECTION MIDDLE -->
      <!-- **********************************************************************************************************************************************************
          RIGHT SIDEBAR CONTENT
          *********************************************************************************************************************************************************** -->
      <div class="col-lg-3 ds">
        <!--COMPLETED ACTIONS DONUTS CHART-->
        <div class="donut-main">
          <h4>COMPLETED ACTIONS & PROGRESS</h4>
          <canvas id="newchart" height="130" width="130"></canvas>
          <script>
            var doughnutData = [{
                value: 70,
                color: "#4ECDC4"
              },
              {
                value: 30,
                color: "#fdfdfd"
              }
            ];
            var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
          </script>
        </div>
        <!--NEW EARNING STATS -->
        <div class="panel terques-chart">
          <div class="panel-body">
            <div class="chart">
              <div class="centered">
                <span>TODAY EARNINGS</span>
                <strong>$ 890,00 | 15%</strong>
              </div>
              <br>
              <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
            </div>
          </div>
        </div>
        <!--new earning end-->
        <!-- RECENT ACTIVITIES SECTION -->
        <h4 class="centered mt">RECENT ACTIVITY</h4>
        <!-- First Activity -->
        <div class="desc">
          <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
          </div>
          <div class="details">
            <p>
              <muted>Just Now</muted>
              <br/>
              <a href="#">Paul Rudd</a> purchased an item.<br/>
            </p>
          </div>
        </div>
        <!-- Second Activity -->
        <div class="desc">
          <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
          </div>
          <div class="details">
            <p>
              <muted>2 Minutes Ago</muted>
              <br/>
              <a href="#">James Brown</a> subscribed to your newsletter.<br/>
            </p>
          </div>
        </div>
        <!-- Third Activity -->
        <div class="desc">
          <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
          </div>
          <div class="details">
            <p>
              <muted>3 Hours Ago</muted>
              <br/>
              <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
            </p>
          </div>
        </div>
        <!-- Fourth Activity -->
        <div class="desc">
          <div class="thumb">
            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
          </div>
          <div class="details">
            <p>
              <muted>7 Hours Ago</muted>
              <br/>
              <a href="#">Brando Page</a> purchased a year subscription.<br/>
            </p>
          </div>
        </div>
        <!-- USERS ONLINE SECTION -->
        <h4 class="centered mt">TEAM MEMBERS ONLINE</h4>
        <!-- First Member -->
        <div class="desc">
          <div class="thumb">
            <img class="img-circle" src="img/ui-divya.jpg" width="35px" height="35px" align="">
          </div>
          <div class="details">
            <p>
              <a href="#">DIVYA MANIAN</a><br/>
              <muted>Available</muted>
            </p>
          </div>
        </div>
        <!-- Second Member -->
        <div class="desc">
          <div class="thumb">
            <img class="img-circle" src="img/ui-sherman.jpg" width="35px" height="35px" align="">
          </div>
          <div class="details">
            <p>
              <a href="#">DJ SHERMAN</a><br/>
              <muted>I am Busy</muted>
            </p>
          </div>
        </div>
        <!-- Third Member -->
        <div class="desc">
          <div class="thumb">
            <img class="img-circle" src="img/ui-danro.jpg" width="35px" height="35px" align="">
          </div>
          <div class="details">
            <p>
              <a href="#">DAN ROGERS</a><br/>
              <muted>Available</muted>
            </p>
          </div>
        </div>
        <!-- Fourth Member -->
        <div class="desc">
          <div class="thumb">
            <img class="img-circle" src="img/ui-zac.jpg" width="35px" height="35px" align="">
          </div>
          <div class="details">
            <p>
              <a href="#">Zac Sniders</a><br/>
              <muted>Available</muted>
            </p>
          </div>
        </div>
        <!-- CALENDAR-->
        <div id="calendar" class="mb">
          <div class="panel green-panel no-margin">
            <div class="panel-body">
              <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                <div class="arrow"></div>
                <h3 class="popover-title" style="disadding: none;"></h3>
                <div id="date-popover-content" class="popover-content"></div>
              </div>
              <div id="my-calendar"></div>
            </div>
          </div>
        </div>
        <!-- / calendar -->
      </div>
      <!-- /col-lg-3 -->
    </div>
    <!-- /row -->
  </section>
</section>
<!--main content end-->
