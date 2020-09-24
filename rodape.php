    <script src="assets/js/jquery.min.js" ></script>
    <script src="assets/js/popper.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#menu_restrito a').on('click', function(){

            var $this = $(this);
            //window.localStorage.setItem('objItemMenu', this);
            
            $this.addClass('active');
            $this.siblings('a').removeClass('active');
          });
        });
    </script>
  </body>
</html>