
  <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}" class="include" type="text/javascript" ></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js')}}"></script>
  <script src="{{ asset('lib/jquery.sparkline.js')}}"></script>
  <script src="{{ asset('lib/gritter/js/jquery.gritter.js')}}" type="text/javascript"></script>
  <script src="{{ asset('lib/gritter-conf.js')}}" type="text/javascript" ></script>
  <!--common script for all pages-->

 <!-- Toastr js -->
 <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>

  @yield('js')

  <script src="{{ asset('lib/common-scripts.js')}}"></script>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

  @if (session('status'))
  <script>
      var status = "{{session('status')}}";
      // Display a success toast, with a title
      toastr.success(status, 'Success')
  </script>
  @elseif (session('warning'))
  <script>
      var status = "{{session('warning')}}";
      // Display a success toast, with a title
      toastr.warning(status, 'Warning!')
  </script>
  @endif
  @if ($errors->any())
    @php
        $er="";
    @endphp
    @foreach ($errors->all() as $error)
        @php
        $er .= "<li>".$error."</li>";
        @endphp
    @endforeach
  <script>
      var error = "<?=$er?>";
      // Display an error toast, with a title
      toastr.error(error, 'Error!!!')
  </script>
  @endif

  @yield('script-js')


