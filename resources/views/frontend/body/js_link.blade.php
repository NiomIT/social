 <!-- Core -->
 <script src="{{ 'frontend' }}/assets/js/jquery/jquery-3.3.1.min.js"></script>
 <script src="{{ 'frontend' }}/assets/js/popper/popper.min.js"></script>
 <script src="{{ 'frontend' }}/assets/js/bootstrap/bootstrap.min.js"></script>
 <!-- Optional -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
 <script type="text/javascript">
     $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
     });
 </script>
 <script src="{{ 'frontend' }}/assets/js/app.js"></script>
 <script src="{{ 'frontend' }}/assets/js/components/components.js"></script>
