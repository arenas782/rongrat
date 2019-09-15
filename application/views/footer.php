<footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">            
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="<?=base_url('assets/js/core/jquery.min.js');?>"></script>
  <script src="<?=base_url('assets/js/core/popper.min.js');?>"></script>
  <script src="<?=base_url('assets/js/core/bootstrap.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>

  <!-- Chart JS -->
  <script src="<?=base_url('assets/js/plugins/chartjs.min.js');?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
  <script src="<?=base_url('assets/demo/demo.js');?>"></script>
  <script src="<?=base_url('assets/js/paper-dashboard.min.js?v=2.0.0');?>" type="text/javascript"></script>
  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
