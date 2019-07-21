  </div>
  <footer class="Footer">
    <section class="Footer-container">
      <div class="Footer-widgets">
        <?php get_template_part('parts-template/footer-widgets'); ?>
      </div>
      <div class="Card-copy">
        <p class="Small-text">Copyright &copy; <?php echo date('Y');?> Paltolim.</p>
        <p class="Small-text">Todos los derechos reservados.</p>
      </div>
    </section>
    <div class="Box-creditos">
      <p class="Small-text">Diseñado y desarrollado por<a class="Link-text-creditos" href="https://esferadigital.cl" target="_blank">esferadigital.cl</a></p>
    </div>
    <button id="ButtonTop">Subir</button>
  </footer>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5d2caf219b94cd38bbe77977/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  <?php wp_footer();?>
</body>
</html>
