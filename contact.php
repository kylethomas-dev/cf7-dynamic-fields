<?php // Template Name: Contact ?>
<?php get_header(); ?>

<?php echo do_shortcode('[contact-form-7 id="2" title="Contact"]'); ?>

<script>
  $(document).ready(function() {
      $("#dynamic-fields").prepend("<input type='text' name='dynamic-field' id='dynamic-field'>");
  });
</script>